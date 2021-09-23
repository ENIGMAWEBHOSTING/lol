<?php
if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] === "POST") {

    include 'partials/dbconnect.php';
    //   $showSuccess = false;

    if (isset($_POST["username"], $_POST["email"], $_POST["password"])) {

        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $hashpass = password_hash($password, PASSWORD_DEFAULT);

        if (!empty($username) && !empty($email) && !empty($password)) {

            $sql = "SELECT * FROM users WHERE username='$username' AND email='$email' AND password='$password'  AND hash='$hash'";

            $query = mysqli_query($conn, $sql);

            // $numRows = mysqli_num_rows($query);

            if (password_verify($password,$hashpass)) {

                echo 'login as creds are correct';

            } else {

                // header("Location:homepage.php");
                echo 'login failed a creds are not correct';
            }

        } else {

            echo 'failed to login the user';

        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enigma Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<img class="bg" src="bg.jpg" alt="background">
<div class="container">
    <h1>Login</h3>
    <!-- <p>Enter your details</p> -->
    <form action="" method="post">
        <input type="text" name="mail" id="email" placeholder="Enter your email or username" required>
        <input type="text" name="password" id="pass" placeholder="Enter your password" required>
        <button class="btn">Submit</button> 
    </form>

    <login>   
       Dont have an account? <a href="registration.html">Register</a>
    </login>
    <br>


   

</div>
<script src=""></script>

</body>
</html>