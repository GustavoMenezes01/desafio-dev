# Gustavo Menezes - Teste RedCheck

Este projeto faz parte do desafio da RedCheck e nele é processado o arquivo CNAB, extraindo informações financeiras de transações de lojas. Ele armazena esses dados em um banco de dados e fornece uma API para consultar o saldo total de cada loja com base nas transações importadas.

## Estrutura do Projeto

### 1. Importação de Transações CNAB
O projeto inclui uma funcionalidade para ler arquivos CNAB e extrair as seguintes informações:

- Tipo de transação
- Data
- Valor
- CPF
- Cartão
- Hora
- Nome do dono da loja
- Nome da loja

### 2. Banco de Dados
O banco de dados armazena as transações importadas e é utilizado para consultas posteriores. As principais tabelas são:

- **transacoes**: contém as transações financeiras.
- **lojas**: contém as lojas associadas às transações.

### 3. API de Consulta de Saldos
A API expõe um endpoint que permite consultar o saldo total de cada loja com base nas transações processadas.

## Tecnologias Utilizadas

- **PHP**: linguagem de backend.
- **MySQL**: banco de dados relacional.
- **Composer**: gerenciador de dependências.
- **PHPUnit**: testes unitários.
- **Docker**: ambiente de desenvolvimento.

## Instalação

1. Clone o repositório:
    ```bash
    git clone https://github.com/seu-usuario/cnab_project.git
    ```

2. Instale as dependências:
    ```bash
    composer install
    ```

3. Configure o arquivo `.env` com as informações do banco de dados.

## Testes Unitários

Execute os testes unitários com o seguinte comando:
```bash
./vendor/bin/phpunit tests/ --testdox
