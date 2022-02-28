<?php

abstract class Database
{
    //localhost connection properties
    // private $host="localhost";
    // private $user="root";
    // private $password="";
    // private $db="scandi_products";

    //real connection properties
    private $host="localhost";
    private $user="u9orzhag2dkxz";
    private $password="TestUserPassword123";
    private $db="dbtdemq07kycua";

    //we set the pdo connection
    protected function connect()
    {
        $dsn="mysql:host=".$this->host.";dbname=".$this->db;
        $pdoConn=new PDO($dsn, $this->user, $this->password);
        $pdoConn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdoConn;
    }
}