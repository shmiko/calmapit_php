<?php

namespace Travellar\Service;

use PDO;
use PDOException;
use Exception;

class ConnectionService {
    public static function getInstance() {
        try {
            $dbh = ConfigurationService::DB_TYPE . ':host=' . ConfigurationService::DB_HOST . ';dbname=' . ConfigurationService::DB_NAME;
            $dbh = new PDO($dbh, ConfigurationService::DB_USER, ConfigurationService::DB_PASS);
            $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $dbh->exec("SET NAMES utf8");

            return $dbh;
        }
        catch(PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
}