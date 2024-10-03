<?php
require 'db.php';

function getTotalByStore($pdo) {
    $sql = "SELECT nome_loja, SUM(CASE WHEN tipo IN (1, 3) THEN valor ELSE -valor END) AS saldo
            FROM transacoes
            GROUP BY nome_loja";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$totals = getTotalByStore($pdo);

echo "<h2>Saldo Total por Loja</h2>";
echo "<table>";
echo "<tr><th>Nome da Loja</th><th>Saldo Total</th></tr>";

foreach ($totals as $total) {
    echo "<tr>
            <td>{$total['nome_loja']}</td>
            <td>R$ " . number_format($total['saldo'], 2, ',', '.') . "</td>
          </tr>";
}

echo "</table>";
?>
