<?php

namespace App\Core;

use PDO;

abstract class BaseModel
{
    protected PDO $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }
}