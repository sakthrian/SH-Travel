<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    .floating-icon {
    position: fixed;
    bottom: 20px; 
    right: 20px;
    z-index: 9999; 
    background-color: #8e44ad; 
    border-radius: 50%; 
    padding: 10px; 
  }

  .floating-icon img {
    width: 50px; 
    height: 50px; 
    display: block;
  }

  .floating-icon:hover {
    background-color: #222; 
  }

  .floating-icon:focus {
    outline: none;
  }

  </style>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>home</title>
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<a href="websocket/client.php" class="floating-icon" title="Go to Example">
        <img src="images/help.png" alt="Icon">
</a>
<section class="header">
  <?php
  require_once 'controllers/NavbarController.php';

  $navbarController = new NavbarController();
  $navbarController->showNavbar();
  ?>
</section>

<section class="home">
  <div class="swiper home-slider">
  <div class="swiper-wrapper">
  <div class="swiper-slide slide" style="background:url(images/travel.jpg)no-repeat">
  <div class="content">
    <span>Explore, Discover, Travel</span>
    <h3>Travel around the world</h3>
    <a href="package.php" class="btn">Discover more</a>
    </div>
    </div>

    <div class="swiper-slide slide" style="background:url(images/desert.jpg)no-repeat">
  <div class="content">
    <span>Explore, Discover, Travel</span>
    <h3>Discover the new places</h3>
    <a href="package.php" class="btn">Discover more</a>
    </div>
    </div>
    <div class="swiper-slide slide" style="background:url(images/ice.jpg)no-repeat">
  <div class="content">
    <span>Explore, Discover, Travel</span>
    <h3>Make youe tour worthwhile</h3>
    <a href="package.php" class="btn">Discover more</a>
    </div>
    </div>
    </div>
    <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
</div>
</section>

<section class="services">
<h1 class="heading-title">Our Services</h1>
<div class="box-container">
    <div class="box">
      <img src="images/adventure1.png" alt="">
      <h3>Adventures</h3>
    </div>

    <div class="box">
      <img src="images/guide.png" alt="">
      <h3>Tour guide</h3>
    </div>

    <div class="box">
      <img src="images/treking.png" alt="">
      <h3>trekking</h3>
    </div>

    <div class="box">
      <img src="images/campfire.png" alt="">
      <h3>Camp fire</h3>
    </div>

    <div class="box">
      <img src="images/offff.png" alt="">
      <h3>off road</h3>
    </div>

    <div class="box">
      <img src="images/camping.png" alt="">
      <h3>camping</h3>
    </div>
</div>

</section>

<section class="home-about">
    <div class="image">
       <img src="images/couple.jpg" alt="">
    </div>
   <div class="content">
       <h3>about us</h3>
            <p>Our platform makes your travel experience smooth and luxurious. We provide personalized plans and exclusive accommodations, ensuring comfort and style every step of the way. Enjoy a new level of travel sophistication with our services.</p>
            <a href="about.php" class="btn">read more</a>
   </div>   

</section>
<section class="home-packages">

    <h1 class="heading-title">our Package</h1>
<div class="box-container">
<div class="box">
   <div class="images">
      <img src="images/tajj.jpeg" alt="">
    </div>
    <div class="content">
      <h3>Chill & Relax</h3>
      <p>Hello peeps, Check our package, Let's go and Enjoy!</p>
      <a href="book.php" class="btn">Book Now</a>
</div>
</div>

<div class="box">
   <div class="images">
      <img src="images/tour.jpeg" alt="">
    </div>
    <div class="content">
      <h3>Adventure & Tour</h3>
      <p>Hello peeps, Check our package, Let's go and Enjoy!</p>
      <a href="book.php" class="btn">Book Now</a>
</div>
</div>

<div class="box">
   <div class="images">
      <img src="images/tour2.webp" alt="">
    </div>
    <div class="content">
      <h3>Travel & Explore</h3>
      <p>Hello peeps, Check our package, Let's go and Enjoy!</p>
      <a href="book.php" class="btn">Book Now</a>
</div>
</div>
</div>

<div class="load-more"> <a href="package.php" class="btn">Load More</a></div>
</section>

<section class="home-offer">
  <div class="content">
    <h3>upto 50% off</h3>
    <p>Minimum 50 Percent Off - Shop Minimum 50 Percent Off Online at Best Prices in India</p>
    <a href="book.php" class="btn">Book now</a>
  </div>

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