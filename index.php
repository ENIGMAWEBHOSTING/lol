<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

  include 'dbconnect.php';
//   $showSuccess = false;
  $username = $_POST["username"];
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $hashpass = password_hash($password, PASSWORD_DEFAULT);
  if (!empty($username) && !empty($firstname) && !empty($lastname) && !empty($email) && !empty($password)){
  }
  else{
    echo 'failed to register user';
  }

    $user = mysqli_query($conn,"SELECT * from users where username='$username'");
    $result2 = mysqli_num_rows($user);

    if($result2>0){
      echo 'failed as username already registered';
    }

    else{       
    $sql = "INSERT INTO `users` ( `username`, `firstname`, `lastname`, `email`, `password`, `datecreated`) VALUES ('$username', '$firstname', '$lastname', '$email', '$hashpass', current_timestamp())";
    $result = mysqli_query($conn, $sql);
    header("Location:register.php");   //to avoid repeat insertion of data when refreshed
    }

    header("Location:homepage.php");   //to redirect to homepage when registered successfully


}

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enigma Registration</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="background">
    <div class="container">
        <h1>Registration</h3>
        <p>Enter your details</p>
        <form action="register.php" method="post">
            <input type="text" name="username" id="username" placeholder="Enter your username" required>
            <input type="text" name="firstname" id="firstname" placeholder="Enter your first name" required>
            <input type="text" name="lastname" id="lastname" placeholder="Enter your last name" required>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
            <input type="password" name="password" id="pass" placeholder="Enter your password" required>
            <!-- <small id="passHelp" class=text-center">Make sure your password has an uppercase letter, a lowercase letter, a number and a symbol each.</small> -->
            <button type="submit" name="submit">sign up</button>
        </form>

        <login>
           Already have an account? <a href="login.php">login</a>
        </login>
        <br>


        <!-- <warn>
         Note: Your password wont be saved as we respect our user's privacy so kindly remember it 
        </warn> -->
    
       
    
    </div>
    <!-- <script src="index.php"></script> -->
    
</body>
</html
 
