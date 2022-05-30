<?php

session_start();

if(empty($_SESSION['userid'])){

    header("Location:login.php");

}

$uid = $_SESSION['userid'];


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

    <link rel="stylesheet" href="../style/editprofile.css" type="text/css">
    <script src="https://kit.fontawesome.com/4228e33b37.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="nav">
        <div class="nav-left">
        <a href="home.php">Gymnastix</a>
        </div>
        <div class="nav-right">
            <p><a href="about.php">About</a></p>
            <p><a href="profile.php">Profile</a></p>
        </div>
    </div>
    
    <div class="form">
        <h2>Edit profile</h2>
        <form method="post">
            <section>
                <label>firstname</label>
                <input type="text" name="firstname" placeholder="First Name"/>
            </section>
            <section>
                <label>Lastname</label>
                <input type="text" name="lastname" placeholder="Last Name"/>
            </section>
            <section>
                <label>Email</label>
                <input type="text" name="email" placeholder="Email"/>
            </section>
            <section>
                <label>Password</label>
                <input type="password" name="password" placeholder="Password"/>
            </section>
            <section>
                <label>Postcode</label>
                <input type="text" name="postcode" placeholder="Postcode" />    
            </section>
            <button class="login-btn" name="edit">Edit</button>
        </form>
    </div>

    <?php
    
        if(isset($_POST['edit'])){
            $fname = $_POST['firstname'];
            $lname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $postcode = $_POST['postcode'];

            if(empty($fname) or empty($lname) or empty($email) or empty($password) or empty($postcode) ){
                echo '<script>';
                echo "alert('all fields are important!')";
                echo '</script>';
            }else{

                $query = "UPDATE user SET firstname='$fname',lastname='$lname',email='$email',postcode='$postcode',password='$password' WHERE userId='$uid'";
                $result = mysqli_query($connection , $query);

                if($result){

                    $_SESSION['firstname'] = $fname;
                    $_SESSION['lastname'] = $lname;
                    $_SESSION['email'] = $email;
                    $_SESSION['postcode'] = $postcode;
                    $_SESSION['password'] = $password;

                    header("Location:profile.php");
                }else{
                    echo '<script>';
                    echo "alert('something wet wrong')";
                    echo '</script>';
                }

                echo $query;

            }
        }
    
    ?>

</body>
</html>