<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
   
?>
<?php
$city = isset($_GET['city']) ? htmlspecialchars($_GET['city']) : '';
?>

<?php 
            
    $id = $_SESSION['id'];
    $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id");

    while($result = mysqli_fetch_assoc($query)){
        $res_Uname = $result['Username'];
        $res_Email = $result['Email'];
        $res_Age = $result['Age'];
        $res_id = $result['Id'];
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Book</title>
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <link rel="stylesheet" href="style.css">
</head>
<body>
<section class="header">
    <?php
    require_once 'controllers/NavbarController.php';

    $navbarController = new NavbarController();
    $navbarController->showNavbar();
    ?>
</section>
<div class="heading" style="background:url(images/footer12.jpg)no-repeat">
    <h1>.</h1>
</div>

<section class="booking">
    <h1 class="heading-title">BOOK YOUR TRIP!!</h1>
    <form action="book_form.php" method="post" class="book-form"  enctype="multipart/form-data">


    <div class="flex">
        <div class="inputbox">
            <span>Name:</span>
            <input type="text" placeholder="enter your name" name="name"  value="<?php echo $res_Uname; ?>">
        </div>
        <div class="inputbox">
            <span>Email:</span>
            <input type="email" placeholder="enter your email" name="email"  value="<?php echo $res_Email; ?>">
        </div>
        <div class="inputbox">
            <span>Phone:</span>
            <input type="number" placeholder="enter your number" name="phone">
        </div>
        <div class="inputbox">
            <span>Address:</span>
            <input type="text" placeholder="enter your address" name="address">
        </div>
        <div class="inputbox">
            <span>Where to:</span>
            <input type="text" placeholder="Place you want to visit" name="location" value="<?php echo $city; ?>">
        </div>
        <div class="inputbox">
            <span>How many:</span>
            <input type="number" placeholder="how many guests" name="guests">
        </div>
        <div class="inputbox">
            <span>Arrivals:</span>
            <input type="date" name="arrivals">
        </div>
        <div class="inputbox">
            <span>Leaving:</span>
            <input type="date" name="leaving">
        </div>
        <div class="inputbox">
            <span>Payment Screenshot:</span>
            <input type="file" name="payment_screenshot" accept="image/*" required>
        </div>
    </div>
    <input type="submit" value="submit" class="btn" name="send">
    </form>

</section>

<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>Quick links</h3>
            <a href="home.php"><i class="fas fa-angle-right"></i>Home</a>
            <a href="about.php"><i class="fas fa-angle-right"></i>About</a>
            <a href="package.php"><i class="fas fa-angle-right"></i>Package</a>
            <a href="book.php"><i class="fas fa-angle-right"></i>Book</a>
        </div>

        <div class="box">
            <h3>Extra links</h3>
            <a href="#"><i class="fas fa-angle-right"></i>Ask questions</a>
            <a href="#"><i class="fas fa-angle-right"></i>About us</a>
            <a href="#"><i class="fas fa-angle-right"></i>Privacy policy</a>
            <a href="#"><i class="fas fa-angle-right"></i>Terms of use</a>
        </div>

        <div class="box">
            <h3>Contact Info</h3>
            <a href="#"><i class="fas fa-phone"></i>+91 6369748760</a>
            <a href="#"><i class="fas fa-phone"></i>+91 9442843823</a>
            <a href="#"><i class="fas fa-envelope"></i>shtraveltrips@gmail.com</a>
            <a href="#"><i class="fas fa-map"></i>Puducherry ,India</a>
           </div>

           <div class="box">
            <h3>Follow Us</h3>
            <a href="#"><i class="fa-brands fa-facebook"></i>Facebook</a>
            <a href="#"><i class="fa-brands fa-twitter"></i>Twitter</a>
            <a href="#"><i class="fa-brands fa-instagram"></i>Instagram</a>
            <a href="#"><i class="fa-brands fa-linkedin"></i>Linkedin</a>
           </div>
    </div>
    <div class="credit">Created by <span>Sakthrian, Hindhuja </span>| all rights reserved</div>
</section>


    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script src="script.js"></script>
</body>
</html>
