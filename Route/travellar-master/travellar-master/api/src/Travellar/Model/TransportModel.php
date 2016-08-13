<?php

namespace Travellar\Model;

use Travellar\Service\ConnectionService;
use Travellar\Service\ConfigurationService;

use PDO;
use PDOException;
use Exception;

class TransportModel {
    public $dbh;

    public function __construct() {
        $this->dbh = ConnectionService::getInstance();
    }

    public function getAll() {
        try {
            $sql = '
            SELECT
                *
            FROM
                transports
            ';

            $stmt = $this->dbh->query($sql);
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e) {
            throw new Exception($e->getMessage());
        }

        return false;
    }

}
