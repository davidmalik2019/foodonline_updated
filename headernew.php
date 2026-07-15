<ul class="nav-links">

    <li><a href="index.php">Home</a></li>

    <li><a href="menu.php">Menu</a></li>

    <li><a href="about.php">About</a></li>

    <li><a href="contact.php">Contact</a></li>

    <!-- Always show Cart -->
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

    <?php } else { ?>

        <li>
            <a href="login.php">Login</a>
        </li>

    <?php } ?>

</ul>

cartLink.addEventListener("click", function(e){

    e.preventDefault();

    if(!isLoggedIn){

        window.location.href = "login.php";

        return;

    }

    openCart();

});