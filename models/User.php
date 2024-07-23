<?php
class User {
    public static function getById($id) {
        global $con; 
        $query = mysqli_query($con, "SELECT * FROM users WHERE Id = $id");
        return mysqli_fetch_assoc($query);
    }
}
?>
