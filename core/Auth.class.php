<?php
// Checks for direct script request and exits if found so.
if (!defined('xDEC')) exit;

/**
 * Unique index in $_SESSION for logged in user's id
 * @name USER_ID
 * @since version 1.0
 */
define('USER_ID', SECRET_KEY . '_user_id');
/**
 * Unique index in $_SESSION for logged in user's username
 * @name USERNAME
 * @since version 1.0
 */
define('USERNAME', SECRET_KEY . '_username');

/**
 * Class Auth
 * Application wide authentication - Dependency 'Database.class.php'
 * @since version 1.0
 */
class Auth
{
    /**
     * @var string $table Table dedicated to login authentication
     * @since version 1.0
     */
    private static $table;
    /**
     * @var array $fields Fields/Columns in Login Authentication table
     * @since version 1.0
     */
    private static $fields = array();


    /**
     * Default constructor - Dependency '$MODAL/Login.class.php'; 'Functions.php'
     */
    public function __construct()
    {
        // Initializing static variables Auth::$table and Auth::$fields
        Auth::$table = Login::$name;
        Auth::$fields['id'] = Login::$field_id;
        Auth::$fields['username'] = Login::$field_username;
        Auth::$fields['password'] = Login::$field_password;
        // Check if logged in or not
        if (!$this->logged()) {
            // If not logged in then get Cookies
            $cookie = get('Cookie');
            if ($cookie instanceof Cookie) {
                // check for any active session
                if (isset($_COOKIE['user']) && isset($_COOKIE['userId'])) {
                    // Check if cookies are not tempered
                    if (saltSHA1SecretCheck($_COOKIE['user']) && saltSHA1SecretCheck($_COOKIE['userId'])) {
                        // Extracting data from encrypted cookies
                        $_SESSION[USER_ID] = intval(saltSHA1SecretGetValue($_COOKIE['userId']));
                        $_SESSION[USERNAME] = saltSHA1SecretGetValue($_COOKIE['user']);
                        // Get database
                        $db = get('Database');
                        if ($db instanceof Database) {
                            // Select query to find if user exists
                            $db->select(
                                Auth::$table,
                                '*',
                                "WHERE `?`=? AND `?`='?'",
                                array(
                                    Auth::$fields['id'],
                                    $_SESSION[USER_ID],
                                    Auth::$fields['username'],
                                    $_SESSION[USERNAME]
                                )
                            );
                            // If user exists then number of rows in result of last query would be 1
                            if ($db->num_rows() != 1) {
                                // Logout all user
                                $this->logout();
                                // Remove all cookies
                                $cookie->removeCookie('user');
                                $cookie->removeCookie('userId');
                            }
                        } else throw new ClassNotFoundException('Database object not found.');
                    } else {
                        // Remove all cookies
                        $cookie->removeCookie('user');
                        $cookie->removeCookie('userId');
                    }
                }
            } else throw new ClassNotFoundException('Cookie object not found.');
        }
    }

    /**
     * @param string $user Username for login
     * @param string $pass Password
     * @return bool 'True if logged in successfully'
     * @throws AuthException 'If Database is disabled then authentication is not supported'
     * @throws ClassNotFoundException 'If any of dependency fails'
     */
    public function login($user, $pass)
    {
        try {
            // Get database
            $db = get('Database');
            if ($db instanceof Database) {
                // Select the user
                $db->select(
                    Auth::$table,
                    array(
                        Auth::$fields['user_id'],
                        Auth::$fields['password']
                    ),
                    "WHERE `?`=?",
                    array(
                        Auth::$fields['username'],
                        $user
                    )
                );
                if ($db->num_rows() == 1) {
                    $row = $db->row();
                    if (saltSHA1SecretCheck($row[Auth::$fields['password']], $pass)) {
                        $_SESSION[USER_ID] = $row[Auth::$fields['id']];
                        $_SESSION[USERNAME] = $row[Auth::$fields['username']];
                        $cookie = get('Cookie');
                        if ($cookie instanceof Cookie) {
                            $cookie->setSecureCookie('user', $_SESSION[USERNAME]);
                            $cookie->setSecureCookie('userId', $_SESSION[USER_ID]);
                        } else throw new ClassNotFoundException('Cookie object not found');
                        return true;
                    }
                }
            } else throw new ClassNotFoundException('Database object not found');
        } catch (BadFunctionCallException $e) {
            throw new AuthException('Authentication support is disabled due to database inaccessibility.');
        }
        unset($_SESSION[USER_ID]);
        unset($_SESSION[USERNAME]);
        return false;
    }

    /**
     * logout function
     */
    public function logout()
    {
        unset($_SESSION[USER_ID]);
        unset($_SESSION[USERNAME]);
        $_SESSION = array();
    }

    /**
     * @return bool true for logged in else false
     */
    public function logged()
    {
        return isset($_SESSION[USER_ID]);
    }

    /**
     * @return integer user id of the logged in user
     */
    public function id()
    {
        if (isset($_SESSION[USER_ID]))
            return ($_SESSION[USER_ID]);
        else return -1;
    }

    /**
     * @return mixed user data
     */
    public function user()
    {
        if (isset($_SESSION[USERNAME]))
            return ($_SESSION[USERNAME]);
        return null;
    }

}

/**
 * Class AuthException
 */
class AuthException extends Exception
{
    public function __construct($message = "", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

/**
 * Class ClassNotFoundException
 */
class ClassNotFoundException extends Exception
{
    public function __construct($message = "", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}