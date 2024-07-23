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
        <title>Package</title>
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <link rel="stylesheet" href="style.css">
        <style>
            .search-container {
                width: 100%;
                display: flex;
                justify-content: center;
                margin-bottom: 20px;
            }

            #search-input {
                width: 60%;
                padding: 10px 20px;
                font-size: 16px;
                border: 1px solid #ccc;
                border-radius: 25px;
                outline: none;
                transition: all 0.3s ease;
            }

            #search-input:focus {
                border-color: #aa25d3; 
                box-shadow: 0 0 5px rgba(170, 37, 211, 0.5);
            }

            
        </style>
        
    </head>
    <body>
<section class="header">
    <?php
    require_once 'controllers/NavbarController.php';

    $navbarController = new NavbarController();
    $navbarController->showNavbar();
    ?>
</section>
    <div class="heading" style="background:url(images/forest.jpeg)no-repeat">
        <h1>Our Package</h1>
    </div>

    <section class="packages">
        <h1 class="heading-title">Top Destination</h1>

        <div class="search-container">
            <input type="text" id="search-input" placeholder="Search for destinations...">
        </div>

        <div class="box-container" id="box-cont">
    
            <?php
            $query = "SELECT * FROM packages";
            $result = mysqli_query($con, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                <div class="box" data-title="' . htmlspecialchars($row['package_name']) . '">
                    <div class="images">
                        <img src="images/' . htmlspecialchars($row['image']) . '" alt="">
                    </div>
                    <div class="content">
                        <h3>' . htmlspecialchars($row['package_name']) . '</h3>
                        <p>' . htmlspecialchars($row['description']) . '</p>
                        <a href="morename.php?package=' . urlencode($row['package_name']) . '" class="btn">More</a>
                        <a href="book.php" class="btn">Book now</a>
                    </div>
                </div>';
            }
            ?>
        </div>
        <div class="load-more"><span class="btn">Load more</span></div>
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
    <script>
        document.getElementById('search-input').addEventListener('input', function() {
            const query = this.value;

            if (query.length > 2) {
                fetch('search.php?query=' + encodeURIComponent(query))
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('box-cont').innerHTML = data;
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                fetch('search.php')
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('box-cont').innerHTML = data;
                    })
                    .catch(error => console.error('Error:', error));
            }
        });
    </script>
</body>
</html>
