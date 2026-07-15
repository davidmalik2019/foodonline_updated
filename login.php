<?php
session_start();
include "config/db.php";

$message = "";

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email=?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("s",$email);

    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows > 0){

        $user = $result->fetch_assoc();

        if(password_verify($password,$user['password'])){

            $_SESSION['user_id']=$user['id'];

            $_SESSION['fullname']=$user['fullname'];

            header("Location: menu.php");

            exit();

        }else{

            $message="Incorrect Password";

        }

    }else{

        $message="User does not exist";

    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Customer Login | Foodie Delight</title>

<link rel="stylesheet" href="css/style.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body class="login-page">

<div class="login-container">

    <div class="login-card">

        <div class="login-logo">

            <img src="img/logo.png" alt="Foodie Delight Logo">

            <h2>Foodie Delight</h2>

            <p>Customer Login</p>

        </div>

        <?php
        if($message != ""){
        ?>
        <div class="error-message">
            <?php echo $message; ?>
        </div>
        <?php
        }
        ?>

        <form method="POST">

            <div class="input-group">

                <i class="fas fa-envelope"></i>

                <input
                type="email"
                name="email"
                placeholder="Email Address"
                required>

            </div>

            <div class="input-group">

                <i class="fas fa-lock"></i>

                <input
                type="password"
                name="password"
                placeholder="Password"
                required>

            </div>

            <button
            type="submit"
            name="login"
            class="login-btn">

                Login

            </button>

        </form>

        <div class="register-link">

            Don't have an account?

            <a href="register.php">

                Register Here

            </a>

        </div>

    </div>

</div>

</body>

</html>