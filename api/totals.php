<?php
header("Content-Type: application/json");

require '../db.php';

/**
 * Retrieve total balance per store.
 *
 * @param PDO $pdo
 * @return array
 */
function getTotalByStore($pdo) {
    $query = "SELECT nome_loja, SUM(CASE WHEN tipo IN (1, 3) THEN valor ELSE -valor END) AS saldo_total
              FROM transacoes
              GROUP BY nome_loja";

    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$totals = getTotalByStore($pdo);
echo json_encode($totals);
?>
