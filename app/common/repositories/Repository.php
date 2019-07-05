<?php

namespace Common\repositories;

use ClientModels\services\ConfigParser;
use ClientModels\services\ErrorRecord;

abstract class Repository
{
    /** @var \PDO */
    private $pdo;

    public function __construct()
    {
        try {
            $dbConfig = new ConfigParser();
            $this->pdo = new \PDO($dbConfig->getPdoDSN(), $dbConfig->getUsername(), $dbConfig->getPassword());
        } catch (\Throwable $error) {
            (new ErrorRecord())->recordError('Connect to DB failed: ' . $error->getMessage());
        }
    }

    /**
     * @return \PDO
     */
    public function getPdo(): \PDO
    {
        return $this->pdo;
    }
}