<?php
header("Content-Type: application/json");

require '../db.php';

$query = "SELECT nome_loja, SUM(CASE WHEN tipo IN (1, 3) THEN valor ELSE -valor END) AS saldo_total
          FROM transacoes
          GROUP BY nome_loja";

$stmt = $pdo->prepare($query);
$stmt->execute();
$totals = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($totals);
?>
