<?php

session_start();

if(!empty($_SESSION['userid'])){
    header("Location:profile.php");
}

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "gym_database";

$connection = mysqli_connect($host,$user,$pass,$dbname);

if($connection){
    echo '<script>';
    echo 'console.log(" database connection established")';
    echo '</script>';
}else{
    echo '<script>';
    echo 'console.log(" something went wrong in db connection")';
    echo '</script>';
}

?>

<html>

<head>
    <link rel="stylesheet" href="../style/login.css" type="text/css">
</head>
<body>
<div class="nav">
    <div class="nav-left">Gymnasio</div>
    <div class="nav-right">
        <button class="nav-button"><a href="register.php">Register</a> </button> </div>
</div> 

<div>
    <br>
    <div>
        <div class="login">
            <h2>Log In</h2><br>
        </div>
            <div class="form"><h2>Log In with your email</h2>
            <form method="post">
                <input type="text" name="email" placeholder="Email" class="textbox"><br><br>
                <input type="password" name="password" placeholder="Password" class="textbox">
                <p class="forPass">Forgotten your password?</p><br><br>
                <button class="login-btn" name="login" >Log In</button>
            </form>

            </div>
    </div>
       
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

    if(isset($_POST['login'])){

        $email = $_POST['email'];
        $password = $_POST['password'];

        if(empty($email) && empty($password)){
            echo '<script>';
            echo "alert('all details are important')";
            echo '</script>';
        }else{

            if (!preg_match("/^[A-za-z0-9]+@[A-Za-z]+\.[A-Za-z]{2,6}$/",$email)) {
                echo '<script>';
                echo "alert('ivalid email format')";
                echo '</script>';
            }
            elseif (!preg_match("/^[0-9]+$/",$password)) {
                echo '<script>';
                echo "alert('password should be in numbers')";
                echo '</script>';
            }
            else{
                $search = "select * from user where email = '$email' and password = '$password' ";
                $login = mysqli_query($connection , $search);

                $result = mysqli_num_rows($login);

                if($result > 0){
                    while($row = mysqli_fetch_array($login)){
                        $_SESSION['userid'] = $row['userId'];
                        $_SESSION['firstname'] = $row['firstname'];
                        $_SESSION['lastname'] = $row['lastname'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['postcode'] = $row['postcode'];
                        $_SESSION['password'] = $row['password'];               
                    }
                    header("Location:profile.php");
                }else{
                    // echo "<p> * The details are wrong , please recheck and enter again </p>";
                    echo '<script>';
                    echo "alert('* The details are wrong , please recheck and enter again')";
                    echo '</script>';

                }

                
            }

        }

        if($email == 'admin@gmail.com' && $password=="123456"){
            $_SESSION['adminemail'] = $email;
            $_SESSION['adminpass'] = $password;

            header("Location:adminhome.php");
        }

    }

?>