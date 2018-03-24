<?php
class Upload {

    public $id;
    public $title;
    public $description;
    public $filename;
    public $type;
    public $size;
    public $created_at;
    public $update_at;

    public static function find_all_uploads() {
        global $database;
        try {
            $stmt = $database->connection->prepare('SELECT * FROM uploads ORDER BY created_at DESC');
            $stmt->execute();
        } catch (PDOException $e) {
            die('Query Failed! <br>' . $e->getMessage());
        }
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Upload');
        return $result;
    }

    public static function find_upload_by_id($upload_id) {
        global $database;
        try {
            $stmt = $database->connection->prepare('SELECT * FROM uploads WHERE id=? LIMIT ?');
            $stmt->execute([$upload_id, 1]);
        } catch (PDOException $e) {
            die('Query Failed! <br>' . $e->getMessage());
        }
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Upload');
        return !empty($result) ? array_shift($result) : NULL;
    }

    public function create() {
        global $database;
        try {
            $stmt = $database->connection->prepare('INSERT INTO uploads (id, title, description, filename, type, size, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
            $stmt->execute([$this->id, $this->title, $this->description, $this->filename, $this->type, $this->size, $this->created_at, $this->update_at]);
        } catch (PDOException $e) {
            die('Query Failed! <br>' . $e->getMessage());
        }
        return $database->connection->lastInsertId();
    }

    public function update() {
        global $database;
        try {
            $stmt = $database->connection->prepare('UPDATE uploads SET title=?, description=?, updated_at=? WHERE id=?');
            $stmt->execute([$this->title, $this->description, date("Y-m-d H:i:s"), $this->id]);
        } catch (PDOException $e) {
            die('Query Failed! <br>' . $e->getMessage());
        }
        return ($stmt->rowCount() == 1) ? TRUE : FALSE;
    }

    public function delete() {
        global $database;
        try {
            $stmt = $database->connection->prepare('DELETE FROM uploads WHERE id=?');
            $stmt->execute([$this->id]);
            unlink($_SERVER['DOCUMENT_ROOT'] . '/admin/assets/images/uploads/' . $this->filename);
        } catch (PDOException $e) {
            die('Query Failed! <br>' . $e->getMessage());
        }
        return ($stmt->rowCount() == 1) ? TRUE : FALSE;
    }
}
?>