<?php

session_start();

if(!empty($_SESSION['userid'])){
    header("Location:profile.php");
}

?>

<html>

<head>
    <link rel="stylesheet" href="../style/login.css" type="text/css">
</head>
<body>
<div class="nav">
    <div class="nav-left">Gyms</div>
    <div class="nav-right">
        <a href="register.php"><button class="nav-button">Register </button></a> </div>
</div> 

<div>
    <br>
    <div>
        <div class="login">
            <h2>Log In</h2><br>
        </div>
            <div class="form"><h2>Log In with your email</h2>
            <form>
                <input type="text" name="email" placeholder="Email" class="textbox"><br><br>
                <input type="text" name="password" placeholder="Password" class="textbox">
                <p class="forPass">Forgotten your password?</p><br><br>
                <button class="login-btn" >Log In</button>
            </form>
            </div>
    </div>
        <br>
        <br>
</div>

   
    <div class="footer">
        <div class="footer-left">
            <div>Gym passes</div>
            <div>Gyms near me</div>
            <div>Refer a friend</div>
            <div>Student Discount</div>
        </div>
        <div class="footer-center">
            <div>Partnerships</div>
            <div>Partner Portal</div>
            <div>Careers</div>
        </div>
        <div class="footer-right">
            <div>Blog</div>
              <div>Terms</div>
            <div>Privacy Policy</div>
            <div>FAQs & Contact</div>
        </div>

    </div>
</html>