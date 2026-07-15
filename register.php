<?php
session_start();
include "config/db.php";

$message = "";
$messageColor = "red";

if(isset($_POST['register'])){

    $fullname = trim($_POST['fullname']);
    $email    = trim($_POST['email']);
    $phone    = trim($_POST['phone']);
    $password = $_POST['password'];
    $confirm  = $_POST['confirm_password'];

    // Check if passwords match
    if($password != $confirm){

        $message = "Passwords do not match.";

    }else{

        // Check if email already exists
        $check = $conn->prepare("SELECT id FROM users WHERE email=?");
        $check->bind_param("s",$email);
        $check->execute();
        $result = $check->get_result();

        if($result->num_rows > 0){

            $message = "Email already exists.";

        }else{

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users(fullname,email,phone,password) VALUES(?,?,?,?)");

            $stmt->bind_param("ssss",$fullname,$email,$phone,$hashedPassword);

            if($stmt->execute()){

                $message = "Registration successful. You can now login.";
                $messageColor = "green";

            }else{

                $message = "Registration failed.";

            }

        }

    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Customer Registration</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{

    background:#f4f4f4;

    display:flex;

    justify-content:center;

    align-items:center;

    height:100vh;

}

.register-box{

    width:420px;

    background:#fff;

    padding:35px;

    border-radius:10px;

    box-shadow:0 5px 20px rgba(0,0,0,.2);

}

.register-box h2{

    text-align:center;

    margin-bottom:25px;

    color:#333;

}

.register-box input{

    width:100%;

    padding:12px;

    margin-bottom:15px;

    border:1px solid #ccc;

    border-radius:5px;

    font-size:16px;

}

.register-box button{

    width:100%;

    padding:12px;

    border:none;

    background:#ff6600;

    color:#fff;

    font-size:18px;

    border-radius:5px;

    cursor:pointer;

}

.register-box button:hover{

    background:#e65c00;

}

.message{

    text-align:center;

    margin-bottom:15px;

    font-weight:bold;

}

.login-link{

    text-align:center;

    margin-top:20px;

}

.login-link a{

    color:#ff6600;

    text-decoration:none;

}

.login-link a:hover{

    text-decoration:underline;

}

</style>

</head>

<body>

<div class="register-box">

<h2>Create Account</h2>

<?php
if($message != ""){
?>
<p class="message" style="color:<?php echo $messageColor; ?>">
<?php echo $message; ?>
</p>
<?php
}
?>

<form method="POST">

<input
type="text"
name="fullname"
placeholder="Full Name"
required>

<input
type="email"
name="email"
placeholder="Email Address"
required>

<input
type="text"
name="phone"
placeholder="Phone Number"
required>

<input
type="password"
name="password"
placeholder="Password"
required>

<input
type="password"
name="confirm_password"
placeholder="Confirm Password"
required>

<button
type="submit"
name="register">
Create Account
</button>

</form>

<div class="login-link">

Already have an account?

<a href="login.php">

Login Here

</a>

</div>

</div>

</body>
</html>