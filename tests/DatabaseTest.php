<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/Database.php';

class DatabaseTest extends TestCase
{
    public function testConnection()
    {
        $_ENV['DB_HOST'] = 'localhost';
        $_ENV['DB_NAME'] = 'cnab_db';
        $_ENV['DB_USER'] = 'root';
        $_ENV['DB_PASS'] = 'gustavo01';

        $database = new Database();
        $pdo = $database->getConnection();

        $this->assertInstanceOf(PDO::class, $pdo);
    }
}
