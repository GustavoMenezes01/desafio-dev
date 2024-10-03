<?php
require_once 'vendor/autoload.php';

require_once 'src/Database.php';

try {
    $database = new Database();

    $pdo = $database->getConnection();
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
