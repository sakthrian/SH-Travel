<?php
require_once 'models/User.php';

class NavbarController {
    public function showNavbar() {
        $id = $_SESSION['id'];
        $user = User::getById($id);
        include 'views/navbar.php';
    }
}
?>
