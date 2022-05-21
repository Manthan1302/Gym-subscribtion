<?php 

session_start();

$host = "localhost";
$user = "root";
$pass = "rohit1979";
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
        <link rel="stylesheet" href="../style/register.css" type="text/css">
    </head>
   

<body>
    <div class="nav">
        <div class="nav-left">Gymnastix</div>
        <div class="nav-right"><button class="nav-button"><a href="login.php"> Login </a></button></div>
    </div> 
    <br>
    <div class="login">
        <h2>Register</h2><br>
    </div>
    <div class="form"><h2>Register with Email</h2>
    <form method="post">
        <input type="text" name="firstname" placeholder="First Name" class="textbox-f" />
        <input type="text" name="lastname" placeholder="Last Name" class="textbox-f" /><br><br>
        <input type="text" name="email" placeholder="Email" class="textbox" /><br><br>
        <input type="password" name="password" placeholder="Password" class="textbox" /><br><br>
        <input type="text" name="postcode" placeholder="Postcode" class="textbox-f" />
        <p class="forPass">
            Already have a Hussle account? Log in.</p><br><br>
        <button class="login-btn" name="register">Register</button>
    </form>
    </div>

    <br>
    <br>
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

</body>
</html>



<?php

if(isset($_POST['register'])){

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $postcode = $_POST['postcode'];
    $uid = rand(1000 , 9999);

    // echo "firstname : $fname <br>";
    // echo "lastename : $lname <br>";
    // echo "email : $email <br>";
    // echo "password : $password <br>";
    // echo "postcode : $postcode <br>";

    if(empty($fname) || empty($lname) || empty($email) || empty($password) || empty($postcode)){
        echo '<script>';
        echo "alert('all details are important')";
        echo '</script>';   
    }else{
        if(!preg_match("/^[a-zA-Z]+$/",$fname)){
            echo '<script>';
            echo "alert('all details are important')";
            echo '</script>'; 
        }elseif (!preg_match("/^[a-zA-Z]+$/",$lname)){
            echo '<script>';
            echo "alert('all details are important')";
            echo '</script>'; 
        }elseif (!preg_match("/^[0-9]+$/",$password)){
            echo '<script>';
            echo "alert('all details are important')";
            echo '</script>'; 
        }elseif (!preg_match("/^[0-9]+$/",$postcode)){
            echo '<script>';
            echo "alert('all details are important')";
            echo '</script>'; 
        }else{
            $_SESSION['userid'] = $uid;
            $_SESSION['firstname'] =  $fname ;
            $_SESSION['lastname'] = $lname ;
            $_SESSION['email'] = $email ;
            $_SESSION['password'] = $password ;
            $_SESSION['postcode'] = $postcode ;


            $insertquery = "insert into user values('$uid','$fname','$lname','$email','$postcode','$password') ";

            $registration = mysqli_query($connection , $insertquery);

            if($registration){
                header("Location:profile.php");
            }else{
                echo '<script>';
                echo "alert('server error:404 , something went wrong')";
                echo '</script>';
            }

        }
    }

}

?>