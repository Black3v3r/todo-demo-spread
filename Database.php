<?php

class Database
{
    private $config;

    /**
     * Database constructor.
     * @param $config Database configuration file
     */
    public function __construct($config)
    {
        $this->config = $config;
    }

    public function connect()
    {
        session_start();
        if (!isset($this->pdo))
        {
            $this->pdo = new PDO('mysql:dbname=' . $this->config['dbname'] . ';host=' . $this->config['host'], $this->config['username'], $this->config['password']);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        return $this;
    }

    public function insert($table, $fields)
    {
        $this->connect();
        $string = "INSERT INTO " . $this->config['dbname'] . '.' . $table . " (";
        foreach ($fields as $k => $v) {
            $string .= $k . ', ';
        }
        $string = rtrim($string, ', ') . ') VALUES (';
        foreach ($fields as $k => $v) {
            $string .= ':' . $k . ', ';
        }
        $string = rtrim($string, ', ') . ')';

        var_dump($string);


    }
}