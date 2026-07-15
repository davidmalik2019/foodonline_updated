cartLink.addEventListener("click", function(e){

    e.preventDefault();

    if(!isLoggedIn){

        window.location.href = "login.php";

        return;

    }

    openCart();

});