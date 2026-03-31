<?php

class Database
{
    private static ?PDO $connection = null;

    public static function connection(): PDO
    {
        if (self::$connection instanceof PDO) {
            return self::$connection;
        }

        $dbConfig = require __DIR__ . '/../../config/database.php';

        // ODBC DSN-less connection string (recommended for enterprise)
        // Format: odbc:Driver={driver_name};Server=host;Port=port;Database=dbname;
        $dsn = sprintf(
            'odbc:Driver={MySQL ODBC %s Driver};Server=%s;Port=%d;Database=%s;',
            $dbConfig['odbc_driver_version'] ?? '8.0',
            $dbConfig['host'],
            $dbConfig['port'],
            $dbConfig['dbname']
        );

        self::$connection = new PDO(
            $dsn,
            $dbConfig['username'],
            $dbConfig['password'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
        );

        return self::$connection;
    }
}
