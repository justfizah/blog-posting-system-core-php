<?php
class Post {

    public $id;
    public $category_id;
    public $author;
    public $title;
    public $image;
    public $content;
    public $tags;
    public $comments_count;
    public $status;
    public $created_at;
    public $updated_at;

    public static function total_number_of_posts() {
        global $database;
        try {
            $stmt = $database->connection->prepare('SELECT COUNT(id) FROM posts');
            $stmt->execute();
        } catch (PDOException $e) {
            die('Query Failed! <br>' . $e->getMessage());
        }
        $result = $stmt->fetchAll(PDO::FETCH_NUM)[0][0];
        return $result;
    }

    public static function find_all_posts() {
        global $database;
        try {
            $stmt = $database->connection->prepare('SELECT * FROM posts');
            $stmt->execute();
        } catch(PDOException $e) {
            die('Query Failed! <br>' . $e->getMessage());
        }
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Post');
        return $result;
    }

    public static function find_post_by_id($post_id) {
        global $database;
        try {
            $stmt = $database->connection->prepare('SELECT * FROM posts WHERE id=? LIMIT ?');
            $stmt->execute([$post_id, 1]);
        } catch(PDOException $e) {
            die('Query Failed! <br>' . $e->getMessage());
        }
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Post');
        return !empty($result) ? array_shift($result) : NULL;
    }

    public function find_category_name() {
        global $database;
        try {
            $stmt = $database->connection->prepare('SELECT name FROM categories WHERE id=? LIMIT ?');
            $stmt->execute([$this->category_id, 1]);
        } catch(PDOException $e) {
            die('Query Failed! <br>' . $e->getMessage());
        }
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return !empty($result) ? array_shift($result)['name'] : NULL;
    }

    public function create() {
        global $database;
        try {
            $stmt = $database->connection->prepare('INSERT INTO posts (category_id, author, title, image, content, tags, comments_count, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
            $stmt->execute([$this->category_id, $this->author, $this->title, $this->image, $this->content, $this->tags, $this->comments_count, $this->status]);
        } catch(PDOException $e) {
            die('Query Failed! <br>' . $e->getMessage());
        }
        return $database->connection->lastInsertId();
    }

    public function update() {
        global $database;
        try {
            $stmt = $database->connection->prepare('UPDATE posts SET category_id=?, author=?, title=?, image=?, content=?, tags=?, comments_count=?, status=?, updated_at=?  WHERE id=?');
            $stmt->execute([$this->category_id, $this->author, $this->title, $this->image, $this->content, $this->tags, $this->comments_count, $this->status, date("Y-m-d H:i:s"), $this->id]);
        } catch(PDOException $e) {
            die('Query Failed! <br>' . $e->getMessage());
        }
        return ($stmt->rowCount() == 1) ? TRUE : FALSE;
    }

    public function delete() {
        global $database;
        try {
            $stmt = $database->connection->prepare('DELETE FROM posts WHERE id=?');
            $stmt->execute([$this->id]);
        } catch(PDOException $e) {
            die('Query Failed! <br>' . $e->getMessage());
        }
        return ($stmt->rowCount() == 1) ? TRUE : FALSE;
    }
}
?>