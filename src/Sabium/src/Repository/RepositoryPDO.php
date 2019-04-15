<?php

namespace Sabium\Repository;

use PDO;
use PDOStatement;

abstract class RepositoryPDO
{
    protected $connection;

    public function __construct(PDO $pdo)
    {
        $this->connction = $pdo;
    }

    protected function execute(PDOStatement $stmt) : void
    {
        if (!$stmt->execute()) {
            throw new RepositoryPDOException($stmt->errorInfo()[2]);
        }
    }
}
