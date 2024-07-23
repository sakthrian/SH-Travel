<?php
include_once 'Database.php';

class User extends Database {
    private $username;
    private $email;
    private $age;
    private $password;

    public function __construct($username, $email, $age, $password) {
        parent::__construct();
        $this->username = htmlspecialchars(trim($username));
        $this->email = htmlspecialchars(trim($email));
        $this->age = intval(trim($age));
        $this->password = htmlspecialchars(trim($password));
    }

    public function isEmailValid() {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    public function isEmailUsed() {
        $query = $this->conn->prepare("SELECT Email FROM users WHERE Email = ?");
        $query->bind_param("s", $this->email);
        $query->execute();
        $query->store_result();
        $result = $query->num_rows > 0;
        $query->close();
        return $result;
    }

    public function register() {
        $passwordHash = password_hash($this->password, PASSWORD_BCRYPT);
        $query = $this->conn->prepare("INSERT INTO users (Username, Email, Age, Password) VALUES (?, ?, ?, ?)");
        $query->bind_param("ssis", $this->username, $this->email, $this->age, $passwordHash);
        $result = $query->execute();
        $query->close();
        return $result;
    }
}
?>
