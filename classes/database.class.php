<?php

/**
 * Database is the abstract class that represent the database connection.
 * The class has 4 properties and 1 method.
 */
abstract class Database
{
    //properties
    private $host = "localhost";
    private $user = "u9orzhag2dkxz";
    private $password = "TestUserPassword123";
    private $db = "dbtdemq07kycua";

    //setting of the pdo connection
    protected function connect()
    {
        $dsn = "mysql:host=".$this->host.";dbname=".$this->db;
        $pdoConn = new PDO($dsn, $this->user, $this->password);
        $pdoConn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdoConn;
    }
}
