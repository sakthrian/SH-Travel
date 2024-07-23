<?php
session_start();
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
            text-align: center;
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

        .btnmore{
            display: inline-block;
            background: var(--black);
            margin-top: 3rem;
            margin-bottom: 6rem;
            color: var(--white);
            font-size: 1.7rem;
            padding: 1rem 3rem;
            cursor: pointer;
            
        }
        .btnmore:hover{
            background: var(--main-color);
        }
    </style>
</head>

<body>

<?php

$packageDetails = [
    'coimbatore' => [
        'title' => 'Coimbatore Package',
        'backgroundImage' => 'images/coimbatore1.jpg',
    ],
    'kerala' => [
        'title' => 'Kerala Package',
        'backgroundImage' => 'images/coimbatore2.jpg'
    ],
    'Bangalore' => [
        'title' => 'Bangalore Package',
        'backgroundImage' => 'images/coimbatore3.jpg',
    ],

    'Ooty' => [
        'title' => 'Ooty Package',
        'backgroundImage' => 'images/coimbatore4.jpg',
    ],
    'Kodaikanal' => [
        'title' => 'Kodaikanal Package',
        'backgroundImage' => 'images/coimbatore5.webp'
    ],
    'Shimla' => [
        'title' => 'Shimla Package',
        'backgroundImage' => 'images/coimbatore6.jpg'
    ],
    'Kashmir' => [
        'title' => 'Kashmir Package',
        'backgroundImage' => 'images/coimbatore7.webp'
    ],
    'Delhi' => [
        'title' => 'Delhi Package',
        'backgroundImage' => 'images/coimbatore8.webp'
    ],
    'Munar' => [
        'title' => 'Munnar Package',
        'backgroundImage' => 'images/coimbatore9.jpg'
    ],
    'Goa' => [
        'title' => 'Goa Package',
        'backgroundImage' => 'images/coimbatore10.jpg'
    ],
    'Manali' => [
        'title' => 'Manali Package',
        'backgroundImage' => 'images/manali.jpg'
    ],
    'Mumbai' => [
        'title' => 'Mumbai Package',
        'backgroundImage' => 'images/coimbatore11.jpg'
    ],

   
];

if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = [];
}

echo '<div>';
echo '<h1 style="text-align: center; color: black; font-size:100px;">Your Wishlist</h1>';
echo '</div>';
echo '<div class="content" id="wishlistContainer">';

if (!empty($_SESSION['wishlist'])) {
    foreach ($_SESSION['wishlist'] as $packageKey) {
        if (array_key_exists($packageKey, $packageDetails)) {
            $packageData = $packageDetails[$packageKey];
            echo '<div class="wishlist-item" style="margin-bottom: 20px; padding: 10px; border: 1px solid #ccc;">';
            echo '<h2 style="margin: 0;">' . $packageData['title'] . '</h2>';
            echo '<img src ="' . $packageData['backgroundImage'] . '"; style="height: 300px; margin-top: 10px; width: 500px;">';
            echo '<form method="post" action="remove_from_wishlist.php" style="margin-top: 10px;">';
            echo '<input type="hidden" name="package" value="' . $packageKey . '">';
            echo '<input type="submit" class="btnmore" value="Remove from wishlist" name="remove_from_wishlist">';
            echo '</form>';
            echo '</div>';
        }
    }
} else {
    echo '<p>Your wishlist is empty.</p>';
}

echo '</div>';
?>

</body>
</html>