
<?php
session_start();
?>
<html>

<head>
    <link rel="stylesheet" href="../style/login.css" type="text/css">
</head>
<body>
<div class="nav">
    <div class="nav-left">Gyms</div>
    <div class="nav-right"><button class="nav-button">Login</button>&nbsp;&nbsp;&nbsp;&nbsp;
        <button class="nav-button">Register</button> </div>
</div> 

<div>
    <br>
    <div>
        <div class="login">
            <h2>Log In</h2><br>
        </div>
            <div class="form"><h2>Log In with your email</h2>
            <form method = "post">
                <input type="text" name="email" placeholder="Email" class="textbox"><br><br>
                <input type="text" name="password" placeholder="Password" class="textbox">
                <p class="forPass">Forgotten your password?</p><br><br>
                <input type=submit class="login-btn" name = 'login' value='Log In'></input>
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
<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "gym_database";
$connection = mysqli_connect($host,$user,$pass,$dbname);


    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $pass = $_POST['password'];


        if (empty($email) && empty($pass)){
            echo "<script>";
            echo " alert('we got no information from your side!') ";
            echo "</script>";
        }
        

        if (empty($email) || empty($pass)){
            echo "<script>";
            echo " alert(' every details is mandatory ') ";
            echo "</script>";
        }

        if (!empty($email) && !empty($pass)){
            if (!preg_match("/^[A-za-z0-9]+@[A-Za-z]+\.[A-Za-z]{2,6}$/",$email)) {
                echo "invalid email Id!! <br>";
            }

            if (!preg_match("/^[0-9]+$/",$pass)) {
                echo "invalid password! <br>";
            }
                
            }else{
                
                echo "<script>";
                echo " alert(' invalid details ') ";
                echo "</script>";

            }
        }

    if(!empty($email) && !empty($pass)){
        $query = "select * from user where email = $email";
        $result = mysqli_query($connection,$query);
        header("Location:home.html");
        $_SESSION['email'] = $email;
        $_SESSION['pass'] = $pass;
    }
    else{
        echo "something went wrong";
    }

?>