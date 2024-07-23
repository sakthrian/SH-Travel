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
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>About</title>
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
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
<div class="heading" style="background:url(images/panorama-foggy-forest-fairy-tale-260nw-1123858610.webp)no-repeat">
    <h1>About us</h1>
</div>
<section class="about">
    <div class="image">
        <img src="images/couple.jpg" alt="">
    </div>

    <div class="content">
        <h3>why choose us?</h3>
        <p>Honest prices - we have the best prices for tours, 
            and a huge selection of destinations will not leave indifferent even avid tourist.</p>
            <p>
            Reliable partners – We work with the best tour operators who over the years have proven their professionalism.
            </p>
            <div class="icons-container">
                <div class="icons">
                    <i class="fas fa-map"></i>
                    <span>Top Destination</span>
                </div>
                <div class="icons">
                    <i class="fas fa-hand-holding-usd"></i>
                    <span>Affordable Price</span>
                </div>
                <div class="icons">
                    <i class="fas fa-headset"></i>
                    <span>24/7 guide service</span>
                </div>
            

            </div>
    </div>
</section>
<section class="reviews">
    <h1 class="heading-title">clients reviews</h1>
    <div class="swiper reviews-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide slide">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>Unbelievable and safe trip..As a couple honey moon also it was very nice</p>
                <h3>T'Challa</h3>
                <span>BlackPanther</span>
                <img src="images/blackpanther.jpg" alt="">
            </div>
            <div class="swiper-slide slide">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>its was very amazing trip ever.Thank you team</p>
                <h3>Peter Parker</h3>
                <span>SpiderMan</span>
                <img src="images/spiderman.jpg" alt="">
            </div>
            <div class="swiper-slide slide">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>thank you for this amazing tour.my family was so hapy</p>
                <h3>Tony Stark</h3>
                <span>IronMan</span>
                <img src="images/ironman.jfif" alt="">
            </div>
            <div class="swiper-slide slide">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>Definetly it was an amazing travel that we got ever..</p>
                <h3>Natasha Romanoff</h3>
                <span>BlackWidow</span>
                <img src="images/blackwidow.jpg" alt="">
            </div>
        </div>
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