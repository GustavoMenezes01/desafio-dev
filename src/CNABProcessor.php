<?php
class CNABProcessor {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    private function processLine($line) {
        return [
            'type' => (int) substr($line, 0, 1),
            'date' => date('Y-m-d', strtotime(substr($line, 1, 8))),
            'value' => (int) substr($line, 9, 10) / 100,
            'cpf' => substr($line, 19, 11),
            'card' => substr($line, 30, 12),
            'time' => date('H:i:s', strtotime(substr($line, 42, 6))),
            'store_owner' => trim(substr($line, 48, 14)),
            'store_name' => trim(substr($line, 62, 19))
        ];
    }

    public function processFile($file) {
        $content = file($file, FILE_IGNORE_NEW_LINES);
        $processedData = array_map([$this, 'processLine'], $content);

        $sql = "INSERT INTO transacoes (tipo, data, valor, cpf, cartao, hora, dono_loja, nome_loja)
                VALUES (:type, :date, :value, :cpf, :card, :time, :store_owner, :store_name)";
        $stmt = $this->pdo->prepare($sql);

        foreach ($processedData as $data) {
            try {
                $stmt->execute([
                    ':type' => $data['type'],
                    ':date' => $data['date'],
                    ':value' => $data['value'],
                    ':cpf' => $data['cpf'],
                    ':card' => $data['card'],
                    ':time' => $data['time'],
                    ':store_owner' => $data['store_owner'],
                    ':store_name' => $data['store_name']
                ]);
            } catch (PDOException $e) {
                echo "Error inserting data: " . $e->getMessage();
            }
        }

        echo "File processed successfully!";
    }
}
