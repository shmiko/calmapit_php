<?php

namespace Travellar\Model;

use Travellar\Service\ConnectionService;
use Travellar\Service\ConfigurationService;
use PDO;
use PDOException;
use Exception;

class UserModel {
    public $dbh;

    public function __construct() {
        $this->dbh = ConnectionService::getInstance();
    }

    public function insertUser($data) {
        if($this->exists($data['email']) === true)
            return "ALREADY_EXISTS";
        else {
            try {
                $sql = '
                INSERT INTO
                    users
                    (email, fname, lname, password, ip, date_created, date_updated)
                VALUES
                    (:e, :fn, :ln, :pw, :ip, NOW(), NOW())
                ';

                $stmt = $this->dbh->prepare($sql);

                $stmt->bindValue(":e", $data['email']);
                $stmt->bindValue(":fn", $data['fname']);
                $stmt->bindValue(":ln", $data['lname']);
                $stmt->bindValue(":ip", $_SERVER['REMOTE_ADDR']);
                $stmt->bindValue(":pw", $this->hashPass($data));

                return $stmt->execute();
            }
            catch(PDOException $e) {
                throw new Exception($e->getMessage());
            }
        }

        return false;
    }

    public function updateUser($id, $data) {
        try {
            $sql = '
            UPDATE
                users
            SET
                email = :e,
                fname = :fn,
                lname = :ln,
                password = :pw,
                date_updated = NOW()
            WHERE
                id = :id
            ';

            $stmt = $this->dbh->prepare($sql);

            $stmt->bindValue(":e", $data['email']);
            $stmt->bindValue(":fn", $data['fname']);
            $stmt->bindValue(":ln", $data['lname']);
            $stmt->bindValue(":pw", $this->hashPass($data));
            $stmt->bindValue(":id", $id);

            $stmt->execute();

            return $this->checkLogin($data);
        }
        catch(PDOException $e) {
            throw new Exception($e->getMessage());
        }

        return false;
    }

    public function getUserById($id) {
        try {
            $sql = '
            SELECT
                *
            FROM
                users
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

    public function getUserByEmail($email) {
        try {
            $sql = '
            SELECT
                *
            FROM
                users
            WHERE
                email = :e
            ';

            $stmt = $this->dbh->prepare($sql);

            $stmt->bindValue(":e", $email);

            if($stmt->execute())
                return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e) {
            throw new Exception($e->getMessage());
        }

        return false;
    }

    public function checkLogin($data) {
        if(!isset($data['email']) || !isset($data['password']))
            return false;

        try {
            $sql = '
            SELECT
                *
            FROM
                users
            WHERE
                email = :e
            AND
                password = :pw
            ';

            $stmt = $this->dbh->prepare($sql);

            $stmt->bindValue(":e", $data['email']);
            $stmt->bindValue(":pw", $this->hashPass($data));

            if($stmt->execute()) {
                if($stmt->rowCount() > 0) {
                    $data = $stmt->fetch(PDO::FETCH_ASSOC);
                    $data['hashed'] = true;
                    return $data;
                }
            }
        }
        catch(PDOException $e) {
            throw new Exception($e->getMessage());
        }

        return false;
    }

    private function exists($email) {
        try {
            $sql = '
            SELECT
                id
            FROM
                users
            WHERE
                email = :e
            ';

            $stmt = $this->dbh->prepare($sql);

            $stmt->bindValue(":e", $email);

            if($stmt->execute()) {
                $exists = false;

                if($stmt->rowCount() > 0)
                    $exists = true;

                return $exists;
            }
        }
        catch(PDOException $e) {
            throw new Exception($e->getMessage());
        }

        return false;
    }

    private function hashPass($data) {
        if(!isset($data['hashed']) || (isset($data['hashed']) && $data['hashed'] !== "true")) {
            return hash('sha256', $data['password'] + ConfigurationService::SALT);
        }

        return $data['password'];
    }

}
