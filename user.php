<?php
// Mark Iya 219600000
require_once('database.php');

class User {

    public function get_all_users() {
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM users");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function userExists($username) {
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM users WHERE username = ?");
        $statement->execute([$username]);
        return $statement->rowCount() > 0;
    }

    public function create_user($username, $password) {
        $db = db_connect();
        $statement = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        return $statement->execute([$username, $password]); // hashed password will come in next commit
    }
}
?>
