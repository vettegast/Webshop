<?php

// Include Database class so we can utilize the connect method later
include 'Database.php';

class login {

    // Create a connection variable so we can save the PDO object and use it in other methods
    public $connection;

    /**
     * Initiate the database connection for this class
     */
    public function __construct()
    {
        $database = new Database();
        $this->connection = $database->connect();
    }

    /**
     * Get all products
     * @return array
     */
    public function index()
    {
        $result = $this->connection->query('SELECT * FROM users WHERE email = "' . $_POST['email-input'] . '";');

        return $result->fetchAll();
    }

    /**
     * Create new product and return the ID
     * @param $naam
     * @param $content
     * @param $datum
     * @return string
     */
    public function create($email, $password, $role)
    {
        $statement = $this->connection->prepare('INSERT INTO users (email, password, role) VALUES (:email, :password, :role)');
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $password);
        $statement->bindParam(':role', $role);
        $statement->execute();

        return $this->connection->lastInsertId();
    }

}