<?php
class Category {

    public $id;
    public $name;
    public $created_at;
    public $updated_at;

    public static function total_number_of_categories() {
        global $database;
        try {
            $stmt = $database->connection->prepare('SELECT COUNT(id) FROM categories');
            $stmt->execute();
        } catch (PDOException $e) {
            die('Query Failed! <br>' . $e->getMessage());
        }
        $result = $stmt->fetchAll(PDO::FETCH_NUM)[0][0];
        return $result;
    }

    public static function find_all_categories() {
        global $database;
        try {
            $stmt = $database->connection->prepare('SELECT * FROM categories');
            $stmt->execute();
        } catch(PDOException $e) {
            die('Query Failed! <br>' . $e->getMessage());
        }
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Category');
        return $result;
    }

    public static function find_category_by_id($category_id) {
        global $database;
        try {
            $stmt = $database->connection->prepare('SELECT * FROM categories WHERE id=? LIMIT ?');
            $stmt->execute([$category_id, 1]);
        } catch(PDOException $e) {
            die('Query Failed! <br>' . $e->getMessage());
        }
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Category');
        return !empty($result) ? array_shift($result) : NULL;
    }

    public function create() {
        global $database;
        try {
            $stmt = $database->connection->prepare('INSERT INTO categories (name) VALUES (?)');
            $stmt->execute([$this->name]);
        } catch(PDOException $e) {
            die('Query Failed! <br>' . $e->getMessage());
        }
        return $database->connection->lastInsertId();
    }

    public function update() {
        global $database;
        try {
            $stmt = $database->connection->prepare('UPDATE categories SET name=?, updated_at=? WHERE id=?');
            $stmt->execute([$this->name, date("Y-m-d H:i:s"), $this->id]);
        } catch(PDOException $e) {
            die('Query Failed! <br>' . $e->getMessage());
        }
        return ($stmt->rowCount() == 1) ? TRUE : FALSE;
    }

    public function delete() {
        global $database;
        try {
            $stmt = $database->connection->prepare('DELETE FROM categories WHERE id=?');
            $stmt->execute([$this->id]);
        } catch(PDOException $e) {
            die('Query Failed! <br>' . $e->getMessage());
        }
        return ($stmt->rowCount() == 1) ? TRUE : FALSE;
    }
}
?>