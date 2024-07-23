<?php
session_start();


if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = [];
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['remove_from_wishlist'])) {
    $package = $_POST['package'];

    
    if (($key = array_search($package, $_SESSION['wishlist'])) !== false) {
        unset($_SESSION['wishlist'][$key]);
    }
}

header('Location: wishlist_view.php');
exit();
?>
