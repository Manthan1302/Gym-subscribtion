<?php

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

$query = "select * from gym";
$search = mysqli_query($connection , $query);



?>

<!DOCTYPE html>

<head>
    <!-- css link -->
    <link rel="stylesheet" href="../style/membership.css" />
</head>

<!-- body starts -->

<body>
    <div class="nav">
        <div class="nav-left">
        <a href="home.php">Gymnastix</a>
        </div>
        <div class="nav-right">
            <p><a href="">About</a></p>
            <p><a href="profile.php">Profile</a></p>
        </div>
    </div>
    

    <div class="platinum">
        <div class="b-backround">
        <div class="banner">
            <p>3 Month Pass</p>
            <span></span>
            <label>
                Access multiple gyms <br>
                with a single pass;<br>
                A pass for multiple gyms;
            </label>
            <span></span>
            <label>
                SFW , Life Fitness , Aura
            </label>
            <button> &#8377; 4000</button>
        </div>
        </div>

        <div class="b-backround">
        <div class="banner">
            <p>6 Month Pass</p>
            <span></span>
            <label>
                Access multiple gyms <br>
                with a single pass;<br>
                A pass for multiple gyms;
            </label>
            <span></span>
            <label>
                SFW , Life Fitness , Aura ,
                Black the gym , Fitwave
            </label>
            <button> &#8377; 8000</button>
        </div>
        </div>

        <div class="b-backround">
        <div class="banner">
            <p>1 Year Pass</p>
            <span></span>
            <label>
                Access multiple gyms <br>
                with a single pass;
                A pass for multiple gyms:)
            </label>
            <span></span>
            <label>
            SFW , Life Fitness , Aura ,
                Black the gym , Fitwave , unix gym
            </label>
            <button> &#8377; 12000</button>
        </div>
        </div>

        <!--  -->
    </div>

</body>

<!-- font-awesome link -->
<script src="https://kit.fontawesome.com/4384453e56.js" crossorigin="anonymous"></script>


</html>
