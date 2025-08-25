<?php

namespace App\Core;

use PDO;
use PDOException;
use RuntimeException;

class DB
{
    private ?PDO $conn = null;

    public function __construct() {
        $this->connect();
    }

    private function connect(): void
    {
        $enabled = filter_var(config('database.enable', true), FILTER_VALIDATE_BOOLEAN);
        if (!$enabled) {
            return;
        }

        $host = config('database.hostname');
        $db   = config('database.database');
        $port = (int) config('database.port', 3306);
        $user = config('database.username');
        $pass = config('database.password');

        if (!$host || !$db || !$user) {
            throw new RuntimeException('DB config is incomplete.');
        }

        $dsn = sprintf('mysql:host=%s;dbname=%s;port=%d;charset=utf8mb4', $host, $db, $port);

        try {
            $this->conn = new PDO(
                $dsn,
                $user,
                $pass,
                [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_PERSISTENT         => true,
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4',
                ]
            );
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            if (filter_var(config('app.debug', false), FILTER_VALIDATE_BOOLEAN)) {
                die('DB connection error: ' . $e->getMessage());
            }
            die('Помилка підключення до бази даних');
        }
    }

    public function getConnection(): ?PDO
    {
        return $this->conn;
    }
}