<?php if (isset($user)): ?>
<a href="home.php" class="logo">Welcome <b><?php echo $user['Username']; ?></b></a>
<nav class="navbar">
    <a href="home.php">Home</a>
    <a href="about.php">About</a>
    <a href="package.php">Package</a>
    <a href="book.php">Book</a>
    <a href='edit.php?Id=<?php echo $user['Id']; ?>'>Change Profile</a>
    <a href="wishlist_view.php">Cart</a>
    <a href="php/logout.php"> <button class="btn">Log Out</button> </a>
</nav>
<div id="menu-btn" class="fas fa-bars"></div>
<?php endif; ?>
