<?php
require 'db.php';

function parseCNAB($linha) {
    return [
        'tipo' => (int)substr($linha, 0, 1),
        'data' => substr($linha, 1, 8),
        'valor' => (float)substr($linha, 9, 10) / 100,
        'cpf' => substr($linha, 19, 11),
        'cartao' => substr($linha, 30, 12),
        'hora' => substr($linha, 42, 6),
        'dono_loja' => trim(substr($linha, 48, 14)),
        'nome_loja' => trim(substr($linha, 62, 19))
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $arquivo = $_FILES['file']['tmp_name'];
    $linhas = file($arquivo);

    $stmt = $pdo->prepare("
        INSERT INTO transacoes (tipo, data, valor, cpf, cartao, hora, dono_loja, nome_loja)
        VALUES (:tipo, :data, :valor, :cpf, :cartao, :hora, :dono_loja, :nome_loja)
    ");

    foreach ($linhas as $linha) {
        $dados = parseCNAB($linha);

        $data = DateTime::createFromFormat('Ymd', $dados['data'])->format('Y-m-d');
        $hora = DateTime::createFromFormat('His', $dados['hora'])->format('H:i:s');

        $stmt->execute([
            'tipo' => $dados['tipo'],
            'data' => $data,
            'valor' => $dados['valor'],
            'cpf' => $dados['cpf'],
            'cartao' => $dados['cartao'],
            'hora' => $hora,
            'dono_loja' => $dados['dono_loja'],
            'nome_loja' => $dados['nome_loja']
        ]);
    }

    echo "Arquivo processado com sucesso!";
} else {
    echo "Por favor, envie um arquivo CNAB.";
}
