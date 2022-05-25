<?php


session_start();


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
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="../style/users.css" type="text/css">
    <script src="https://kit.fontawesome.com/4228e33b37.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="admin-nav">
        <div>
            <a href="adminhome.php"> <h2 style="margin-left: 20px; ">Gymasio Dashboard</h2></a>

        </div>
        <div>
            <form method="post">
                <button name="logout" style="background-color: transparent; border: none;">
                    <i class="fas fa-sign-out-alt" style="font-size: 25px; margin-top:20px;margin-right: 20px;"></i>
                </button>
            </form>
        </div>
    </div>

    <br><br>
    <h2 style="color: white;margin-left: 52px;">Users Details</h2><br><br>

</body>
</html>


<?php
    $query = "select * from user";
    $users =  mysqli_query($connection , $query);
    echo "<div class='users'>";
    while($res = mysqli_fetch_array($users)) { 
       
        echo "<div class='user-card'>";
        echo  "<i class='far fa-user-circle' style='font-size: 50px;'></i><br><br>";
        echo "<span>".$res['firstname']."</span>&nbsp;&nbsp;";
        echo "<span>".$res['lastname']."</span> <br><br>";
        echo "<span> <i class='fas fa-envelope'></i> &nbsp;&nbsp;".$res['email']."</span> <br><br>";
        echo "<span> <i class='fas fa-map-marker-alt'></i> &nbsp;&nbsp;".$res['postcode']."</span> <br><br>";
        // echo "<span>".$res['password']."</span> <br><br>";
        echo  "</div>";  
    }
    echo  "</div>";

?>
<?php
            
    if(isset($_POST['logout'])){
        session_destroy();
        header("Location:login.php");
    }
            
?>