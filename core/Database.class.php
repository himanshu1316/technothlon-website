<?php
if (!defined('xDEC')) exit;
//TODO add php docs
/**
 * Class Database
 * @package xDec
 * @description MySQL database handler
 */
class Database
{
    /**
     * @var bool
     */
    private $lock = true;

    /**
     * @var
     */
    /**
     * @var
     */
    private $_connection, $_result;

    /**
     * @var
     */
    private $insert_id;

    /**
     * @return mixed
     */
    public function insertId()
    {
        return $this->insert_id;
    }

    /**
     *
     */
    public function __construct()
    {
        if (!(defined('DB_HOST') && defined('DB_USER') && defined('DB_PASS') && defined('DB_NAME')))
            trigger_error("Check `config.ini.php` for database connection definitions", E_USER_ERROR);
    }

    /**
     *
     */
    function __destruct()
    {
        $this->close();
    }

    /**
     * @param $table
     * @param $fields
     * @param $condition
     * @param $args
     */
    public function select($table, $fields, $condition, $args)
    {
        if ($this->lock && null == $this->_connection)
            $this->connect();
        if ($this->_connection instanceof PDO) {
            if (is_array($table)) {
                $table = arrayToString($table, '`, `', '`');
            } else $table = quot($table);
            if (is_array($fields)) {
                $fields = arrayToString($fields, '`, `', '`');
            } else $fields = quot($fields);
            try {
                $this->_result = $statement = $this->_connection->prepare("SELECT {$fields} FROM {$table} {$condition}");
                $statement->execute($args);
            } catch (PDOException $e) {
                get('Logger')->log($e->getMessage());
            }
        } else {

        }
    }

    /**
     * @param $table
     * @param $data
     * @throws InvalidArgumentException
     */
    public function insert($table, $data)
    {
        if ($this->lock && null == $this->_connection)
            $this->connect();
        if ($this->_connection instanceof PDO) {
            if (!is_array($data)) throw new InvalidArgumentException('Invalid argument passed to insert: expected - string, array');
            $cols = arrayToString(array_keys($data), '`, `', '`');
            $values = arrayToString(array_fill(0, count($cols), '?'), ', ');
            try {
                $this->_result = $statement = $this->_connection->prepare("INSERT INTO {$table}( {$cols} ) VALUES({$values})");
                $statement->execute(array_values($data));
                $this->insert_id = $this->_connection->lastInsertId();
            } catch (PDOException $e) {
                get('Logger')->log($e->getMessage());
            }
        } else {

        }
    }

    /**
     * @param $table
     * @param $change
     * @param $condition
     * @param $args
     * @throws InvalidArgumentException
     */
    public function update($table, $change, $condition, $args)
    {
        if ($this->lock && null == $this->_connection)
            $this->connect();
        if ($this->_connection instanceof PDO) {
            if (!is_array($change)) throw new InvalidArgumentException('Invalid argument passed to insert: expected - string, array');

            try {
                $this->_result = $statement = $this->_connection->prepare("UPDATE {$table} SET {} {$condition}");
                $statement->execute($args);
            } catch (PDOException $e) {
                get('Logger')->log($e->getMessage());
            }
        } else {

        }
    }

    /**
     * @param $table
     * @param $condition
     * @param $args
     */
    public function delete($table, $condition, $args)
    {
        if ($this->lock && null == $this->_connection)
            $this->connect();
        if ($this->_connection instanceof PDO) {
            try {
                $this->_result = $statement = $this->_connection->prepare("DELETE FROM {$table} {$condition}");
                $statement->execute($args);

            } catch (PDOException $e) {
                get('Logger')->log($e->getMessage());
            }
        } else {

        }
    }

    /**
     * @return mixed
     */
    public function result()
    {
        return $this->_result;
    }

    /**
     * @return mixed|null
     */
    public function row()
    {
        if ($this->_result instanceof PDOStatement)
            return $this->_result->fetch();
        return null;
    }

    /**
     * @return int
     */
    public function num_rows()
    {
        if ($this->_result instanceof PDOStatement)
            return $this->_result->rowCount();
        return -1;
    }

    /**
     * @param $str
     * @param $args
     */
    public function query($str, $args)
    {
        if ($this->lock && null == $this->_connection)
            $this->connect();
        if ($this->_connection instanceof PDO) {
            try {
                $this->_result = $statement = $this->_connection->prepare($str);
                $statement->execute($args);
            } catch (PDOException $e) {
                get('Logger')->log($e->getMessage());
            }
        } else {

        }
    }

    /**
     * @throws BadFunctionCallException
     */
    private function connect()
    {
        if(defined('DB_ENABLED') && !DB_ENABLED){
            throw new BadFunctionCallException('Database is disabled in config file');
        }
        try {
            $this->_connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        } catch (PDOException $e) {
            $this->lock = false;
            get('Logger')->log($e->getMessage());
        }
    }

    /**
     *
     */
    private function close()
    {
        if ($this->_connection instanceof PDO) $this->_connection = null;
    }

    /**
     *
     */
    private function __clone()
    {
    }
}