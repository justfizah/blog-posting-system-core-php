<?php
class User {

    public $id;
    public $role;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $created_at;
    public $updated_at;

    public static function total_number_of_users() {
        global $database;
        try {
            $stmt = $database->connection->prepare('SELECT COUNT(id) FROM users');
            $stmt->execute();
        } catch (PDOException $e) {
            die('Query Failed! <br>' . $e->getMessage());
        }
        $result = $stmt->fetchAll(PDO::FETCH_NUM)[0][0];
        return $result;
    }

    public static function find_role_by_id($user_id) {
        global $database;
        try {
            $stmt = $database->connection->prepare('SELECT role FROM users WHERE id=? LIMIT ?');
            $stmt->execute([$user_id, 1]);
        } catch (PDOException $e) {
            die('Query Failed! <br>' . $e->getMessage());
        }
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return !empty($result) ? array_shift($result)['role'] : NULL;
    }

    public static function find_all_users() {
        global $database;
        try {
            $stmt = $database->connection->prepare('SELECT * FROM users ORDER BY created_at DESC');
            $stmt->execute();
        } catch (PDOException $e) {
            die('Query Failed! <br>' . $e->getMessage());
        }
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'User');
        return $result;
    }

    public static function find_user_by_id($user_id) {
        global $database;
        try {
            $stmt = $database->connection->prepare('SELECT * FROM users WHERE id=? LIMIT ?');
            $stmt->execute([$user_id, 1]);
        } catch (PDOException $e) {
            die('Query Failed! <br>' . $e->getMessage());
        }
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'User');
        return !empty($result) ? array_shift($result) : NULL;
    }

    public static function find_user_by_username($username) {
        global $database;
        try {
            $stmt = $database->connection->prepare('SELECT * FROM users WHERE username=? LIMIT ?');
            $stmt->execute([$username, 1]);
        } catch (PDOException $e) {
            die('Query Failed! <br>' . $e->getMessage());
        }
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'User');
        return !empty($result) ? array_shift($result) : NULL;
    }

    public function create() {
        global $database;
        try {
            $stmt = $database->connection->prepare('INSERT INTO users (username, password, first_name, last_name) VALUES (?, ?, ?, ?)');
            $stmt->execute([$this->username, $this->password, $this->first_name, $this->last_name]);
        } catch (PDOException $e) {
            die('Query Failed! <br>' . $e->getMessage());
        }
        return $database->connection->lastInsertId();
    }

    public function update() {
        global $database;
        try {
            $stmt = $database->connection->prepare('UPDATE users SET username=?, password=?, first_name=?, last_name=?, updated_at=? WHERE id=?');
            $stmt->execute([$this->username, $this->password, $this->first_name, $this->last_name, date("Y-m-d H:i:s"), $this->id]);
        } catch (PDOException $e) {
            die('Query Failed! <br>' . $e->getMessage());
        }
        return ($stmt->rowCount() == 1) ? TRUE : FALSE;
    }

    public function delete() {
        global $database;
        try {
            $stmt = $database->connection->prepare('DELETE FROM users WHERE id=?');
            $stmt->execute([$this->id]);
        } catch (PDOException $e) {
            die('Query Failed! <br>' . $e->getMessage());
        }
        return ($stmt->rowCount() == 1) ? TRUE : FALSE;
    }
}
?>