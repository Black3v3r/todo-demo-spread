<?php

class Database
{
    private $config;

    /**
     * @var PDO
     */
    private $pdo;

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
        if (!isset($this->pdo)) {
            $this->pdo = new PDO('mysql:dbname=' . $this->config['dbname'] . ';host=' . $this->config['host'], $this->config['username'], $this->config['password']);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        return $this;
    }

    /**
     * @param $table
     * @param $fields
     */
    public function insert($table, $fields)
    {
        $this->connect();
        $stmt = "INSERT INTO " . $this->config['dbname'] . '.' . $table . " (";
        foreach ($fields as $k => $v) {
            $stmt .= $k . ', ';
        }
        $stmt = rtrim($stmt, ', ') . ') VALUES (';
        foreach ($fields as $k => $v) {
            $stmt .= ':' . $k . ', ';
        }
        $stmt = rtrim($stmt, ', ') . ')';

        $query = $this->pdo->prepare($stmt);

        $query->execute($fields);
    }

    public function get($table)
    {
        $this->connect();
        $stmt = 'SELECT * FROM ' . $this->config['dbname'] . '.' . $table;
        $query = $this->pdo->prepare($stmt);
        $query->execute();
        return $query->fetchAll();
    }
}