<?php

namespace App\Database;

class DB
{
    protected static $instance = null;

    public function __construct() {}
    public function __clone() {}

    public function instance()
    {
        if (self::$instance === null)
        {
            $opt  = array(
                \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES   => FALSE,
            );
            $dsn = 'mysql:host='.env('DB_HOST').';dbname='.env('DB_NAME').';charset='.env('DB_CHAR');
            self::$instance = new \PDO($dsn, env('DB_USER'), env('DB_PASS'), $opt);
        }
        return self::$instance;
    }

    public static function __callStatic($method, $args)
    {
        return call_user_func_array(array(self::instance(), $method), $args);
    }

    public function run($sql, $args = [])
    {
        if (!$args)
        {
             return self::instance()->query($sql);
        }
        $stmt = self::instance()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
}