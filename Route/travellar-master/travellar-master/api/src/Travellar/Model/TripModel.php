<?php

namespace Travellar\Model;

use Travellar\Service\ConnectionService;
use Travellar\Service\ConfigurationService;
use Travellar\Model\UserModel;

use PDO;
use PDOException;
use Exception;

class TripModel {
    public $dbh;

    public function __construct() {
        $this->dbh = ConnectionService::getInstance();
    }

    public function insertTrip($data) {
        try {
            $sql = '
            INSERT INTO
                trips
                (name, start_date, end_date, date_created, date_updated)
            VALUES
                (:n, :sd, :ed, NOW(), NOW())
            ';

            $stmt = $this->dbh->prepare($sql);

            $stmt->bindValue(":n", $data['name']);
            $stmt->bindValue(":sd", $data['start_date']);
            $stmt->bindValue(":ed", $data['end_date']);

            if($stmt->execute()) {
                $trip_id = $this->dbh->lastInsertId();

                $sql = '
                INSERT INTO
                    companions
                    (user_id, trip_id, date_created)
                VALUES
                    (:uid, :tid, NOW())
                ';

                $stmt = $this->dbh->prepare($sql);

                $stmt->bindValue(":tid", $trip_id);
                $stmt->bindValue(":uid", $data['user_id']);

                if($stmt->execute()) {
                    return $this->getTripByTripId($trip_id);
                }
            }
        }
        catch(PDOException $e) {
            throw new Exception($e->getMessage());
        }

        return false;
    }

    public function updateTrip($id, $data) {
        try {
            $sql = '
            UPDATE
                trips
            SET
                name = :n,
                start_date = :sd,
                end_date = :ed
            WHERE
                id = :id
            ';

            $stmt = $this->dbh->prepare($sql);

            $stmt->bindValue(":n", $data['name']);
            $stmt->bindValue(":sd", $data['start_date']);
            $stmt->bindValue(":ed", $data['end_date']);
            $stmt->bindValue(":id", $id);

            if($stmt->execute()) {
                
                $userModel = new UserModel();
                $notRegistered = array();
                $notAdded = array();

                foreach($data['companions'] as $companion) {
                    $sql = '
                    SELECT
                        companions.user_id
                    FROM
                        companions
                    INNER JOIN
                        users ON companions.user_id = users.id
                    WHERE
                        users.email = :e
                        AND
                        companions.trip_id = :id
                    ';

                    $stmt = $this->dbh->prepare($sql);
                    $stmt->bindValue(":e", $companion->email);
                    $stmt->bindValue(":id", $id);

                    if($stmt->execute()) {
                        if($stmt->rowCount() === 0) {
                            $userData = $userModel->getUserByEmail($companion->email);

                            if($userData === false) {
                                $notRegistered[] = $companion->email;
                            }
                            else {
                                $user_id = $userData['id'];

                                $sql = '
                                INSERT INTO
                                    companions
                                (user_id, trip_id, date_created)
                                VALUES(:uid, :tid, NOW())
                                ';

                                $stmt = $this->dbh->prepare($sql);
                                $stmt->bindValue(":uid", $user_id);
                                $stmt->bindValue(":tid", $id);

                                $stmt->execute();

                                $notAdded[] = $userData;
                            }
                        }
                    }
                }

                $data = $this->getTripByTripId($id);
                $data['notRegistered'] = $notRegistered;
                $data['notAdded'] = $notAdded;

                return $data;
            }
        }
        catch(PDOException $e) {
            throw new Exception($e->getMessage());
        }

        return false;
    }

    public function getTripsByUserId($user_id) {
        try {
            $sql = '
            SELECT
                trips.*,
                companions.user_id,
                companions.trip_id
            FROM
                trips
            INNER JOIN
                companions ON companions.trip_id = trips.id
            WHERE
                companions.user_id = :id
            ORDER BY
                trips.start_date ASC
            ';

            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(":id", $user_id);

            if($stmt->execute()) {
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                foreach($rows as $k => $v) {
                    $rows[$k]['companions'] = $this->getCompanionsByTripId($v['id']);
                }

                return $rows;
            }
        }
        catch(PDOException $e) {
            throw new Exception($e->getMessage());
        }

        return false;
    }

    public function getTripByTripId($id) {
        try {
            $sql = '
            SELECT
                trips.*
            FROM
                trips
            INNER JOIN
                companions ON companions.trip_id = trips.id
            WHERE
                companions.trip_id = :id
            ';

            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(":id", $id);

            if($stmt->execute()) {
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                $data['companions'] = $this->getCompanionsByTripId($data['id']);

                return $data;
            }
        }
        catch(PDOException $e) {
            throw new Exception($e->getMessage());
        }

        return false;
    }

    public function deleteTripById($id) {
        try {
            $sql = '
            DELETE
            FROM
                trips
            WHERE
                id = :id
            ';

            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(":id", $id);

            if($stmt->execute()) {
                $sql = '
                DELETE
                FROM
                    companions
                WHERE
                    companions.trip_id = :id
                ';

                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue(":id", $id);

                if($stmt->execute()) {

                    $sql = '
                    DELETE
                    FROM
                        days
                    WHERE
                        days.trip_id = :id
                    ';

                    $stmt = $this->dbh->prepare($sql);
                    $stmt->bindValue(":id", $id);

                    if($stmt->execute())
                        return true;

                }
            }
        }
        catch(PDOException $e) {
            throw new Exception($e->getMessage());
        }

        return false;
    }

    public function getCompanionsByTripId($id) {
        try {
            $sql = '
            SELECT
                users.fname,
                users.lname,
                users.email,
                users.id
            FROM
                companions
            INNER JOIN 
                users ON users.id = companions.user_id
            WHERE
                companions.trip_id = :id
            ';

            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(":id", $id);

            if($stmt->execute()) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        catch(PDOException $e) {
            throw new Exception($e->getMessage());
        }

        return false;
    }

}
