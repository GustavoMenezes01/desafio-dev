Gustavo Menezes - Teste Redcheck

Este projeto faz parte do desafio da RedCheck e nele é processado o arquivo CNAB e extraída informações financeiras de transações de lojas. Ele armazena esses dados em um banco de dados e fornece uma API para consultar o saldo total de cada loja com base nas transações importadas.

Estrutura do Projeto
1. Importação de Transações CNAB
O projeto inclui uma funcionalidade para ler arquivos CNAB e extrair informações relevantes, como:

[ Tipo de transação , Data, Valor, CPF ,Cartão, Hora, Nome do dono da loja, Nome da loja]

2. Banco de Dados
O banco de dados armazena as transações importadas e é utilizado para consultas posteriores. As principais tabelas são:

transacoes: contém as transações financeiras.
lojas: contém as lojas associadas às transações.

3. API de Consulta de Saldos
A API expõe um endpoint que permite consultar o saldo total de cada loja com base nas transações processadas.

Tecnologias Utilizadas
PHP: linguagem de backend.
MySQL: banco de dados relacional.
Composer: gerenciador de dependências.
PHPUnit: testes unitários.
Docker: ambiente de desenvolvimento.

Instalação:

- git clone https://github.com/seu-usuario/cnab_project.git
- composer install
- Configure o arquivo .env com as informações do banco de dados.

Testes unitários:
./vendor/bin/phpunit tests/ --testdox

API Documentation

A API fornece um endpoint para acessar os dados de transações financeiras relacionadas a lojas. Atualmente, há um endpoint disponível para buscar o saldo total de cada loja.

Endpoints
1. Get Total Balances
Endpoint: /api/totals.php
Método: GET
Descrição: Retorna o saldo total para cada loja com base nos dados de transações importadas.
Exemplo de Resposta:
[
    {
        "nome_loja": "BAR DO JOÃO",
        "saldo_total": -102.00
    },
    {
        "nome_loja": "LOJA DO Ó - MATRIZ",
        "saldo_total": 230.00
    },
    {
        "nome_loja": "MERCADO DA AVENIDA",
        "saldo_total": 489.20
    }
]
Exemplo de Uso:
curl -X GET http://localhost/cnab_project/desafio-dev/api/totals.php


