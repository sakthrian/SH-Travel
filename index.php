<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php 
            include("php/config.php");

            function sanitize_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            if(isset($_POST['submit'])){
                $email = sanitize_input($_POST['email']);
                $password = sanitize_input($_POST['password']);

                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $stmt = $con->prepare("SELECT * FROM users WHERE Email = ?");
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();

                    if ($row && password_verify($password, $row['Password'])) {
                        $_SESSION['valid'] = $row['Email'];
                        $_SESSION['username'] = $row['Username'];
                        $_SESSION['age'] = $row['Age'];
                        $_SESSION['id'] = $row['Id'];

                        if(isset($_POST['remember'])){
                            setcookie('email', $email, time() + (86400 * 30), "/"); 
                            setcookie('password', $password, time() + (86400 * 30), "/"); 
                        }
                    } else {
                        echo "<div class='message'>
                                <p>Wrong Username or Password</p>
                              </div> <br>";
                        echo "<a href='index.php'><button class='btn'>Go Back</button></a>";
                    }

                    if(isset($_SESSION['valid'])){
                        header("Location: home.php");
                    }

                    $stmt->close();
                } else {
                    echo "<div class='message'>
                            <p>Invalid Email Format</p>
                          </div> <br>";
                    echo "<a href='index.php'><button class='btn'>Go Back</button></a>";
                }
            } else {
                $savedEmail = isset($_COOKIE['email']) ? $_COOKIE['email'] : '';
                $savedPassword = isset($_COOKIE['password']) ? $_COOKIE['password'] : '';
            ?>
            
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" value="<?php echo $savedEmail; ?>" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" value="<?php echo $savedPassword; ?>" required>
                </div>
                
                <div class="checkbox">
                    <input type="checkbox" name="remember" id="remember" <?php if($savedEmail && $savedPassword) echo 'checked'; ?>>
                    <label for="remember">Remember Me</label>
                </div>

                <div class="field">
                    <input type="submit" class="btn submit" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Don't have an account? <a href="register.php">Sign Up Now</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>
