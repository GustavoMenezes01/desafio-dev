<?php
require 'db.php';
require_once 'src/CNABProcessor.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $arquivo = $_FILES['file']['tmp_name'];
    
    $cnabProcessor = new CNABProcessor($pdo);
    $cnabProcessor->processFile($arquivo);
} else {
    echo "Please upload a CNAB file.";
}
