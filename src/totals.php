<?php
require 'db.php';

$query = "SELECT nome_loja, SUM(CASE WHEN tipo IN (1, 3) THEN valor ELSE -valor END) AS saldo_total
          FROM transacoes
          GROUP BY nome_loja";

$stmt = $pdo->prepare($query);
$stmt->execute();
$totals = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saldo total - Gustavo Menezes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Saldo total por loja</h2>
        <table>
            <thead>
                <tr>
                    <th>Nome da loja</th>
                    <th>Saldo total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($totals as $total): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($total['nome_loja']); ?></td>
                        <td>R$ <?php echo number_format($total['saldo_total'], 2, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="index.html" class="btn">Back to Upload</a>
    </div>
</body>
</html>
