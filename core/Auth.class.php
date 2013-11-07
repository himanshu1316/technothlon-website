<?php
if(!defined('xDEC')) exit;

/**
 *
 */
define('USER_ID', SECRET_KEY.'_user_id');
/**
 *
 */
define('USERNAME', SECRET_KEY.'_username');
/**
 * Class Auth
 */
class Auth {
    /**
     * @var
     */
    private static $table;
    /**
     * @var array
     */
    private static $fields = array();

    /**
     *
     */
    public function __construct(){
        Auth::$table = Login::$name;
        Auth::$fields['id'] = Login::$field_id;
        Auth::$fields['username'] = Login::$field_username;
        Auth::$fields['password'] = Login::$field_password;
        $cookie = get('Cookie');
        if( $cookie instanceof Cookie){
            if(isset($_COOKIE['user']) && isset($_COOKIE['userId'])){
                if(saltSHA1SecretCheck($_COOKIE['user']) && saltSHA1SecretCheck($_COOKIE['userId'])){
                    $temp = explode('|', $_COOKIE['userId']);
                    $_SESSION[USER_ID] = intval($temp[0]);
                    $temp = explode('|', $_COOKIE['user']);
                    $_SESSION[USERNAME] =  $temp[0];
                    $db = get('Database');
                    if($db instanceof Database){
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
                        if($db->num_rows() != 1){
                            unset($_SESSION[USER_ID]);
                            unset($_SESSION[USERNAME]);
                        }
                    }
                }
            }
        }
    }

    /**
     * @param $user
     * @param $pass
     * @return bool
     * @throws AuthException
     * @throws ClassNotFoundException
     */
    public function login($user, $pass){
        try{
            $db = get('Database');
            if($db instanceof Database){
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
                if($db->num_rows() == 1){
                    $row = $db->row();
                    if(saltSHA1SecretCheck($row[Auth::$fields['password']], $pass)){
                        $_SESSION[USER_ID] = $row[Auth::$fields['id']];
                        $_SESSION[USERNAME] = $row[Auth::$fields['username']];
                        $cookie = get('Cookie');
                        if ($cookie instanceof Cookie){
                            $cookie->setSecureCookie('user', $_SESSION[USERNAME]);
                            $cookie->setSecureCookie('userId', $_SESSION[USER_ID]);
                        } else throw new ClassNotFoundException('Cookie object not found');
                        return true;
                    }
                }
            } else throw new ClassNotFoundException('Database object not found');
        } catch(BadFunctionCallException $e){
            //TODO add temporary cookie based login
            throw new AuthException('Authentication support is disabled due to database inaccessibility.');
        }
        unset($_SESSION[USER_ID]);
        unset($_SESSION[USERNAME]);
        return false;
    }

    /**
     * logout function
     */
    public function logout(){
        unset($_SESSION[USER_ID]);
        unset($_SESSION[USERNAME]);
        $_SESSION = array();
    }

    /**
     * @return bool true for logged in else false
     */
    public function logged(){
        return isset($_SESSION[USER_ID]);
    }

    /**
     * @return mixed
     */
    public function id(){
        if (isset($_SESSION[USER_ID]))
            return($_SESSION[USER_ID]);
        else return -1;
    }

    /**
     * @return null
     */
    public function user(){
        if (isset($_SESSION[USERNAME]))
            return($_SESSION[USERNAME]);
        return null;
    }

}

/**
 * Class AuthException
 */
class AuthException extends Exception{

}

/**
 * Class ClassNotFoundException
 */
class ClassNotFoundException extends Exception{

}