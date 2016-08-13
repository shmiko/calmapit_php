<?php

namespace Travellar\Model;

use Travellar\Service\ConnectionService;
use Travellar\Service\ConfigurationService;

use PDO;
use PDOException;
use Exception;

class LocationModel {
    public $dbh;

    public function __construct() {
        $this->dbh = ConnectionService::getInstance();
    }

    public function insertLocation($data) {
        try {
            $sql = '
            INSERT INTO
                locations
                (lng, lat, date_created, date_updated)
            VALUES
                (:lng, :lat, NOW(), NOW())
            ';

            $stmt = $this->dbh->prepare($sql);

            $stmt->bindValue(":lng", $data['lng']);
            $stmt->bindValue(":lat", $data['lat']);

            if($stmt->execute())
                return $this->getLocationById($this->dbh->lastInsertId());

        }
        catch(PDOException $e) {
            throw new Exception($e->getMessage());
        }

        return false;
    }

    public function getLocationById($id) {
        try {
            $sql = '
            SELECT
                *
            FROM
                locations
            WHERE
                id = :id
            ';

            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(":id", $id);

            if($stmt->execute())
                return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e) {
            throw new Exception($e->getMessage());
        }

        return false;
    }

    public function updateDayById($id, $data) {
        try {
            $sql = '
            UPDATE
                locations
            SET
                lng = :lng, lat = :lat, date_updated = NOW()
            WHERE
                id = :id
            ';

            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(":lng", $data['lng']);
            $stmt->bindValue(":lat", $data['lat']);
            $stmt->bindValue(":id", $id);

            if($stmt->execute())
                return true;
        }
        catch(PDOException $e) {
            throw new Exception($e->getMessage());
        }

        return false;
    }

}
