<?php

/**
 * Class Database Database requests management
 */
class Database
{
    /**
     * @var string Database configuration
     */
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

    /**
     * Database connection
     * @return $this instance of Database
     */
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
     * Inserts item into a table
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

    /**
     * Gets all elements in a table
     * @param $table
     * @return array Fetched elements
     */
    public function getAll($table)
    {
        $this->connect();
        $stmt = 'SELECT * FROM ' . $this->config['dbname'] . '.' . $table;
        $query = $this->pdo->prepare($stmt);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Deletes an element in a table with his id
     * @param $table
     * @param $id
     */
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