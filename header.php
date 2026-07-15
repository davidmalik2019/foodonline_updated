<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodie Delight</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

<header>

<div class="container">

    <div class="logo">
        <img src="img/logo.png" alt="Foodie Delight Logo">
        <h1>Foodie Delight</h1>
    </div>

    <nav>

        <ul class="nav-links">

            <li><a href="index.php">Home</a></li>

            <li><a href="menu.php">Menu</a></li>

            <li><a href="about.php">About</a></li>

            <li><a href="contact.php">Contact</a></li>
			
			 <li>
        <a href="#" id="cartLink">
            Cart
            <span class="cart-count">0</span>
        </a>
    </li>

            <?php if(isset($_SESSION['user_id'])){ ?>

                <li class="welcome-user">
                    Welcome,
                    <strong><?php echo htmlspecialchars($_SESSION['fullname']); ?></strong>
                </li>

              

                <li>
                    <a href="logout.php">Logout</a>
                </li>

            <?php }else{ ?>

                <li>
                    <a href="login.php">Login</a>
                </li>

            <?php } ?>

        </ul>

    </nav>

</div>

</header>