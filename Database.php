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
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
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
    public function deleteById($table, $id)
    {
        $this->connect();
        $stmt = 'DELETE FROM ' . $this->config['dbname'] . '.' . $table . ' WHERE id = :id';
        $query = $this->pdo->prepare($stmt);
        $query->execute(['id' => $id]);
    }

    /**
     * Deletes all elements in a table
     * @param $table
     */
    public function deleteAll($table)
    {
        $this->connect();
        $stmt = 'DELETE FROM ' . $this->config['dbname'] . '.' . $table;
        $query = $this->pdo->prepare($stmt);
        var_dump($query);
        $query->execute();
    }
}