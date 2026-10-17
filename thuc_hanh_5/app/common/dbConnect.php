<?php

function getDbConnection(): mysqli
{
    static $connection = null;

    if ($connection === null) {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $host = getenv('DB_HOST') ?: '127.0.0.1';
        $user = getenv('DB_USER') ?: 'root';
        $password = getenv('DB_PASSWORD') !== false ? getenv('DB_PASSWORD') : '';
        $database = getenv('DB_NAME') ?: 'shopping_cart';
        $port = (int) (getenv('DB_PORT') ?: 3306);

        try {
            $connection = new mysqli($host, $user, $password, $database, $port);
            $connection->set_charset('utf8mb4');
        } catch (mysqli_sql_exception $exception) {
            http_response_code(500);
            exit('Không thể kết nối cơ sở dữ liệu. Hãy kiểm tra MySQL và nhập file database.sql.');
        }
    }

    return $connection;
}
