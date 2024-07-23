<?php
session_start();

if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_wishlist'])) {
    $package = $_POST['package'];


    if (!in_array($package, $_SESSION['wishlist'])) {
        $_SESSION['wishlist'][] = $package;
        echo '<p>Package added to wishlist.</p>';
    } else {
        echo '<p>Package is already in wishlist.</p>';
    }
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
?>
