<?php

namespace App\Database;

/**
 * Database connection class
 */
class DB
{
    // create a static instance
    protected static $instance = null;

    public function __construct() {}
    public function __clone() {}

    /**
     * Manage the database instance
     *
     * @return object
     */
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

    /**
     * This function is triggered when invoking inaccessible methods in a static context.
     *
     * @param string $method
     * @param array $args
     * @return mixed
     */
    public static function __callStatic(string $method, array $args): mixed
    {
        return call_user_func_array(array(self::instance(), $method), $args);
    }

    /**
     * Execute SQL query
     *
     * @param string $sql
     * @param array $args
     * @return void
     */
    public function run(string $sql, array $args = [])
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