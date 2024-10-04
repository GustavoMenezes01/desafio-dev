<?php
require 'db.php';

$sql = "SELECT 
            nome_loja, 
            SUM(CASE 
                WHEN tipo IN (1, 4, 5, 6, 7, 8) THEN valor
                WHEN tipo IN (2, 3, 9) THEN -valor
            END) AS saldo_total
        FROM transacoes
        GROUP BY nome_loja";

$stmt = $pdo->query($sql);
$AllStores = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saldo por Loja</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Saldo Total por Loja</h2>
        <table>
            <thead>
                <tr>
                    <th>Nome da Loja</th>
                    <th>Saldo Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($AllStores as $store): ?>
                    <tr>
                        <td><?= htmlspecialchars($loja['nome_loja']) ?></td>
                        <td>R$ <?= number_format($loja['saldo_total'], 2, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
