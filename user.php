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

}
?>
