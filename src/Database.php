<?php

class Database {
    private $pdo;

    /**
     * Database constructor that initializes the PDO instance.
     */
    public function __construct() {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        try {
            $this->pdo = new PDO(
                "mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'],
                $_ENV['DB_USER'],
                $_ENV['DB_PASS']
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection error: " . $e->getMessage());
        }
    }

    /**
     * Get the PDO instance for database connection.
     *
     * @return PDO The PDO instance.
     */
    public function getConnection() {
        return $this->pdo;
    }
}
?>
