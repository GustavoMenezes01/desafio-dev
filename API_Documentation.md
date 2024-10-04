API Documentation

Overview

This API provides endpoints to access financial transaction data related to stores. Currently, there is one endpoint available to fetch the total balance for each store based on the imported transactions.

Endpoints

Get Total Balances
Endpoint: /totals.php
Method: GET
Description: Retrieves the total balance for each store based on the imported transaction data.
GET http://localhost/cnab_project/desafio-dev/api/totals.php

Response
Content-Type: application/json
Response Format:
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
    },
    {
        "nome_loja": "MERCEARIA 3 IRMÃO",
        "saldo_total": -7023.00
    },
    {
        "nome_loja": "LOJA DO Ó - FILIAL",
        "saldo_total": 152.32
    }
]
Example
To consume this endpoint, you can use any HTTP client. Here’s an example using curl:

curl -X GET http://localhost/cnab_project/desafio-dev/api/totals.php

Notes
Ensure that the database is set up correctly and that there are existing records in the transacoes table for the API to return meaningful data.
The API will return an empty array if there are no transactions recorded.

Conclusion
This API is designed to provide easy access to the total balances of stores based on their transaction data. Future enhancements may include more endpoints for detailed transaction queries, filtering, and additional analytical capabilities.