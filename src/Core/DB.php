<?php

namespace src\Core;

use PDO;
use PDOException;

class DB
{
    private ?PDO $conn = null;

    public function __construct() {
        $this->connect();
    }

    private function connect(): void
    {
        require_once dirname(__DIR__) . '/../bootstrap/env.php';

        $config = require BASE_PATH . '/config/database.php';

        if (strtolower($config['enable']) !== 'on') {
            return;
        }

        try {
            $this->conn = new PDO(
                "mysql:host={$config['hostname']};dbname={$config['database']};port={$config['port']}",
                $config['username'],
                $config['password'],
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_PERSISTENT => true
                ]
            );
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            die('Помилка підключення до бази даних');
        }
    }

    public function getConnection(): ?PDO
    {
        return $this->conn;
    }
}