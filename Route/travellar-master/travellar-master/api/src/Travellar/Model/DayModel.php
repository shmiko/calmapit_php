<?php

namespace Travellar\Model;

use Travellar\Service\ConnectionService;
use Travellar\Service\ConfigurationService;

use PDO;
use PDOException;
use Exception;

class DayModel {
    public $dbh;

    public function __construct() {
        $this->dbh = ConnectionService::getInstance();
    }

    public function insertDay($data) {
        try {
            $sql = '
            INSERT INTO
                days
                (day_date, trip_id, transport_id, location_id, sleep_place_id, date_created, date_updated)
            VALUES
                (:dd, :tid, :trid, :lid, :sid, NOW(), NOW())
            ';

            $stmt = $this->dbh->prepare($sql);

            $stmt->bindValue(":dd", $data['day_date']);
            $stmt->bindValue(":tid", $data['trip_id']);
            $stmt->bindValue(":trid", $data['transport_id']);
            $stmt->bindValue(":lid", $data['location_id']);
            $stmt->bindValue(":sid", $data['sleep_place_id']);

            if($stmt->execute()) {
                $id = $this->dbh->lastInsertId();
                
                $data = $this->getDayById($id);

                return $data;
            }
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
                days
            SET
                day_date = :dd, transport_id = :trid, location_id = :lid, sleep_place_id = :sid, date_updated = NOW()
            WHERE
                id = :id
            ';

            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(":dd", $data['day_date']);
            $stmt->bindValue(":trid", $data['transport_id']);
            $stmt->bindValue(":lid", $data['location_id']);
            $stmt->bindValue(":sid", $data['sleep_place_id']);
            $stmt->bindValue(":id", $id);

            if($stmt->execute())
                return true;
        }
        catch(PDOException $e) {
            throw new Exception($e->getMessage());
        }

        return false;
    }

    public function getDayById($id) {
        try {
            $sql = '
            SELECT
                days.*,
                locations.lng,
                locations.lat
            FROM
                days
            LEFT OUTER JOIN
                locations ON days.location_id = locations.id
            WHERE
                days.id = :id
            ';

            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(":id", $id);

            if($stmt->execute()) {
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                $data['location'] = array("lng" => $data['lng'], "lat" => $data['lat']);
                unset($data['lat'], $data['lng']);

                return $data;
            }
        }
        catch(PDOException $e) {
            throw new Exception($e->getMessage());
        }

        return false;
    }

}
