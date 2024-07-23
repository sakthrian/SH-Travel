<?php
session_start();
include("php/config.php");

if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
    exit;
}

$id = $_SESSION['id'];
$query = mysqli_query($con, "SELECT * FROM users WHERE Id=$id");
$result = mysqli_fetch_assoc($query);

$res_Uname = $result['Username'];
$res_Email = $result['Email'];
$res_Age = $result['Age'];
$res_id = $result['Id'];

$packageDetails = [
    
    'coimbatore' => [
        'title' => 'Coimbatore Package',
        'location' => 'Coimbatore, Tamil Nadu, India',
        'knownFor' => 'Known as the "Manchester of South India" for its industrial significance in textiles and engineering.',
        'attractions' => [
            'Marudamalai Murugan Temple',
            'Dhyanalinga Temple',
            'Perur Pateeswarar Temple',
            'Siruvani Waterfalls and Dam',
            'Kovai Kutralam Falls'
        ],
        'backgroundImage' => 'url(images/coimbatore1.jpg) no-repeat'
    ],
    'kerala' => [
    'title' => 'Kerala Package',
    'location' => 'Kerala, India',
    'knownFor' => 'Famous as "God\'s Own Country" for its lush greenery, serene backwaters, and rich cultural heritage.',
    'attractions' => [
        'Backwaters of Alleppey (Alappuzha)',
        'Munnar Hill Station and Tea Gardens',
        'Kerala Backwaters (Kumarakom)',
        'Periyar Wildlife Sanctuary and National Park',
        'Athirapally Waterfalls',
        'Fort Kochi and Mattancherry Palace',
        'Kovalam Beach and Lighthouse',
        'Wayanad Wildlife Sanctuary and Chembra Peak',
        'Ponmudi Hill Station',
        'Varkala Beach and Cliff',
    ],
    'backgroundImage' => 'url(images/coimbatore2.jpg) no-repeat'
],
'Bangalore' => [
    'title' => 'Bangalore Package',
    'location' => 'Bangalore, Karnataka, India',
    'knownFor' => 'Known as the "Garden City" and "Silicon Valley of India" for its pleasant climate, parks, and IT industry hub.',
    'attractions' => [
        'Bangalore Palace',
        'Lalbagh Botanical Garden',
        'Cubbon Park and Bangalore Aquarium',
        'ISKCON Temple Bangalore',
        'Tipu Sultan\'s Summer Palace',
        'Vidhana Soudha and Attara Kacheri',
        'Bannerghatta National Park',
        'Wonderla Amusement Park',
        'Nandi Hills',
        'Commercial Street for shopping',
    ],
    'backgroundImage' => 'url(images/coimbatore3.jpg) no-repeat'
],

    'Ooty' => [
    'title' => 'Ooty Package',
    'location' => 'Ooty, Tamil Nadu, India',
    'knownFor' => 'Famous as the "Queen of Hill Stations" for its picturesque landscapes, tea gardens, and pleasant climate.',
    'attractions' => [
        'Ooty Botanical Gardens',
        'Ooty Lake and Boat House',
        'Doddabetta Peak',
        'Rose Garden',
        'Pykara Lake and Waterfalls',
        'Government Museum',
        'Emerald Lake',
        'Tea Museum',
        'Nilgiri Mountain Railway (Toy Train)',
    ],
    'backgroundImage' => 'url(images/coimbatore4.jpg) no-repeat'
],
'Kodaikanal' => [
    'title' => 'Kodaikanal Package',
    'location' => 'Kodaikanal, Tamil Nadu, India',
    'knownFor' => 'Known as the "Princess of Hill Stations" for its charming weather, mist-covered mountains, and serene lakes.',
    'attractions' => [
        'Kodaikanal Lake and Boating',
        'Coaker\'s Walk',
        'Bryant Park',
        'Pillar Rocks',
        'Green Valley View (Suicide Point)',
        'Bear Shola Falls',
        'Silver Cascade Waterfall',
        'Kurinji Andavar Temple',
        'Dolphin\'s Nose',
        'Shembaganur Museum of Natural History',
    ],
    'backgroundImage' => 'url(images/coimbatore5.webp) no-repeat'
],
'Shimla' => [
    'title' => 'Shimla Package',
    'location' => 'Shimla, Himachal Pradesh, India',
    'knownFor' => 'Famous as the "Queen of Hill Stations" for its colonial architecture, scenic beauty, and pleasant climate.',
    'attractions' => [
        'The Ridge and Mall Road',
        'Jakhu Temple',
        'Christ Church',
        'Shimla State Museum',
        'Summer Hill',
        'Annandale',
        'Indian Institute of Advanced Study',
        'Kufri Hill Station',
        'Chadwick Falls',
        'Tara Devi Temple',
    ],
    'backgroundImage' => 'url(images/coimbatore6.jpg) no-repeat'
],
'Kashmir' => [
    'title' => 'Kashmir Package',
    'location' => 'Kashmir, India',
    'knownFor' => 'Famous as "Paradise on Earth" for its breathtaking natural beauty, serene lakes, and snow-capped mountains.',
    'attractions' => [
        'Dal Lake and Shikara Ride',
        'Mughal Gardens (Shalimar Bagh, Nishat Bagh, Chashme Shahi)',
        'Gulmarg Ski Resort and Gondola Ride',
        'Pahalgam Valley and Betaab Valley',
        'Sonamarg and Thajiwas Glacier',
        'Srinagar Old City and Jama Masjid',
        'Hazratbal Shrine',
        'Pari Mahal',
        'Dachigam National Park',
        'Tulip Garden (Indira Gandhi Memorial Tulip Garden)',
    ],
    'backgroundImage' => 'url(images/coimbatore7.webp) no-repeat'
],
'Delhi' => [
    'title' => 'Delhi Package',
    'location' => 'Delhi, India',
    'knownFor' => 'Known as the capital city of India, Delhi is famous for its rich history, diverse culture, and vibrant markets.',
    'attractions' => [
        'Red Fort (Lal Qila)',
        'Qutub Minar',
        'India Gate',
        'Humayun\'s Tomb',
        'Lotus Temple',
        'Akshardham Temple',
        'Jama Masjid',
        'Raj Ghat (Mahatma Gandhi Memorial)',
        'Chandni Chowk and Paranthe Wali Gali',
        'National Museum and National Gallery of Modern Art',
    ],
    'backgroundImage' => 'url(images/coimbatore8.webp) no-repeat'
],
'Munar' => [
    'title' => 'Munnar Package',
    'location' => 'Munnar, Kerala, India',
    'knownFor' => 'Famous for its picturesque tea plantations, mist-covered hills, and pleasant climate, Munnar is a popular hill station in Kerala.',
    'attractions' => [
        'Tea Gardens and Tea Museum',
        'Eravikulam National Park (Rajamalai)',
        'Mattupetty Dam and Lake',
        'Top Station',
        'Anamudi Peak',
        'Attukal Waterfalls',
        'Pothamedu View Point',
        'Kundala Lake and Dam',
        'Blossom Park',
        'Chinnar Wildlife Sanctuary (nearby)',
    ],
    'backgroundImage' => 'url(images/coimbatore9.jpg) no-repeat'
],
'Goa' => [
    'title' => 'Goa Package',
    'location' => 'Goa, India',
    'knownFor' => 'Famous for its beautiful beaches, vibrant nightlife, Portuguese heritage, and delicious seafood.',
    'attractions' => [
        'Calangute Beach',
        'Baga Beach',
        'Anjuna Beach',
        'Dudhsagar Waterfalls',
        'Basilica of Bom Jesus',
        'Fort Aguada',
        'Dona Paula',
        'Cruise on Mandovi River',
        'Casinos in Panaji',
        'Mapusa Market (for shopping)',
    ],
    'backgroundImage' => 'url(images/coimbatore10.jpg) no-repeat'
],
'Manali' => [
    'title' => 'Manali Package',
    'location' => 'Manali, Himachal Pradesh, India',
    'knownFor' => 'Known for its snow-capped mountains, scenic beauty, and adventurous activities, Manali is a popular hill station in North India.',
    'attractions' => [
        'Rohtang Pass',
        'Solang Valley',
        'Hadimba Devi Temple',
        'Manu Temple',
        'Old Manali',
        'Skiing and Snowboarding in Solang Valley',
        'Vashisht Hot Water Springs and Temple',
        'Manali Sanctuary',
        'Great Himalayan National Park (nearby)',
        'Beas River and River Rafting',
    ],
    'backgroundImage' => 'url(images/manali.jpg) no-repeat'
],
'Mumbai' => [
    'title' => 'Mumbai Package',
    'location' => 'Mumbai, Maharashtra, India',
    'knownFor' => 'Known as the "City of Dreams," Mumbai is famous for its Bollywood industry, bustling markets, colonial architecture, and vibrant nightlife.',
    'attractions' => [
        'Gateway of India',
        'Marine Drive',
        'Juhu Beach',
        'Elephanta Caves',
        'Haji Ali Dargah',
        'Siddhivinayak Temple',
        'Chhatrapati Shivaji Maharaj Terminus (CSMT)',
        'Film City (Goregaon)',
        'Bandra-Worli Sea Link',
        'Colaba Causeway (for shopping)',
    ],
    'backgroundImage' => 'url(images/coimbatore11.jpg) no-repeat'
],
  
];
$packageParam = isset($_GET['package']) ? $_GET['package'] : null;
if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = [];
}

if ($packageParam && array_key_exists($packageParam, $packageDetails)) {
    $packageData = $packageDetails[$packageParam];
    $location = explode(',', $packageData['location'])[0];

    $apiKey = 'ce4e03c486466d82ac0b034cdf52fcdc';
    $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q={$location}&appid={$apiKey}&units=metric";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    if ($response !== false) {
        $weatherData = json_decode($response, true);
        if (json_last_error() !== JSON_ERROR_NONE || (isset($weatherData['cod']) && $weatherData['cod'] != 200)) {
            
            $weatherData = null;
        }
    } else {
   
        $weatherData = null;
    }
} else {
    $weatherData = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>More Details</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .content {
            text-align: start;
            margin: 30px auto;
            max-width: 600px;
        }
        .content h2 {
            color: #333;
            font-size: 28px;
            margin-bottom: 10px;
            margin-top: 30px;
        }
        .content p {
            color: #666;
            font-size: 18px;
            line-height: 1.6;
        }
        .content ul li {
            color: #666;
            font-size: 18px;
            line-height: 1.6;
            margin-left: 10%;
        }
        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px; 
        }
        .btnmore {
            display: inline-block;
            background: var(--black);
            margin-top: 6rem;
            margin-bottom: 6rem;
            color: var(--white);
            font-size: 1.7rem;
            padding: 1rem 3rem;
            cursor: pointer;
        }
        .btnmore:hover {
            background: var(--main-color);
        }
        .weather-container {
            text-align: center;
            margin-top: 30px;
        }
        .weather-container p {
            font-size: 18px;
            color: #666;
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

<?php
if ($packageParam && array_key_exists($packageParam, $packageDetails)) {
    $packageData = $packageDetails[$packageParam];
    echo '<div class="heading" style="background: ' . $packageData['backgroundImage'] . ';">';
    echo '<h1 style="text-align: center; color: #fff;">' . htmlspecialchars($packageData['title'], ENT_QUOTES, 'UTF-8') . '</h1>';
    echo '</div>';
    echo '<h1 class="heading-title" style="text-align: center; margin-top: 20px;">Packages Details</h1>';
    echo '<div class="content" id="detailsContainer">';
    echo '<h2>Location</h2>';
    echo '<p><i class="fa-solid fa-location-dot"></i> ' . htmlspecialchars($packageData['location'], ENT_QUOTES, 'UTF-8') . '</p>';
    echo '<h2>Known For</h2>';
    echo '<p>' . htmlspecialchars($packageData['knownFor'], ENT_QUOTES, 'UTF-8') . '</p>';
    echo '<h2>Key Attractions</h2>';
    echo '<ul>';
    foreach ($packageData['attractions'] as $attraction) {
        echo '<li>' . htmlspecialchars($attraction, ENT_QUOTES, 'UTF-8') . '</li>';
    }
    echo '</ul>';
    echo '<div class="button-container">';
    echo '<a href="book.php" class="btnmore">Book now</a>';
    if (in_array($packageParam, $_SESSION['wishlist'])) {
        echo '<p>This package is already in your wishlist.</p>';
    } else {
        echo '<form method="post" action="wishlist.php" style="display:inline;">';
        echo '<input type="hidden" name="package" value="' . htmlspecialchars($packageParam, ENT_QUOTES, 'UTF-8') . '">';
        echo '<input type="submit" class="btnmore" value="Add to wishlist" name="add_to_wishlist">';
        echo '</form>';
    }
    echo '</div>';
    echo '<div class="weather-container">';
    if ($weatherData) {
        echo '<h2>Current Weather</h2>';
        echo '<p>Temperature: ' . htmlspecialchars($weatherData['main']['temp'], ENT_QUOTES, 'UTF-8') . '°C</p>';
        echo '<p>Weather: ' . htmlspecialchars($weatherData['weather'][0]['description'], ENT_QUOTES, 'UTF-8') . '</p>';
        echo '<p>Humidity: ' . htmlspecialchars($weatherData['main']['humidity'], ENT_QUOTES, 'UTF-8') . '%</p>';
    } else {
        echo '<p>Weather information is not available.</p>';
    }
    echo '</div>';
    echo '</div>';
} else {
    echo '<div class="heading" style="background: url(images/default-bg.jpg) no-repeat;">';
    echo '<h1 style="text-align: center; color: #fff;">Details</h1>';
    echo '</div>';
    echo '<h1 class="heading-title" style="text-align: center; margin-top: 20px;">Packages Details</h1>';
    echo '<div class="content" id="detailsContainer">';
    echo '<p>Package details not found.</p>';
    echo '</div>';
}
?>

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
            <h3>Contact info</h3>
            <a href="mailto:info@example.com"><i class="fas fa-envelope"></i>info@example.com</a>
            <a href="#"><i class="fas fa-map"></i>Pondicherry, India - 605008</a>
        </div>
    </div>
    <div class="credit">Created by <span>Sakthrian C</span> | All rights reserved</div>
</section>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="script.js"></script>

</body>
</html>
