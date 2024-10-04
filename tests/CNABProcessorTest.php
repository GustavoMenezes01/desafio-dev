<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/CNABProcessor.php';

class CNABProcessorTest extends TestCase
{
    private $pdo;
    private $processor;

    protected function setUp(): void
    {
        $this->pdo = $this->createMock(PDO::class);
        $this->processor = new CNABProcessor($this->pdo);
    }

    public function testProcessLine()
    {
        $line = "3201903010000014200096206760174753****3153153453JOÃO MACEDO   BAR DO JOÃO       ";

        $reflection = new ReflectionClass($this->processor);
        $method = $reflection->getMethod('processLine');
        $method->setAccessible(true);

        $result = $method->invokeArgs($this->processor, [$line]);

        $expected = [
            'type' => 3,
            'date' => '2019-03-01',
            'value' => 142.00,
            'cpf' => '09620676017',
            'card' => '4753****3153',
            'time' => '15:34:53',
            'store_owner' => 'JOÃO MACEDO',
            'store_name' => 'BAR DO JOÃO'
        ];

        $this->assertEquals($expected, $result);
    }
}
