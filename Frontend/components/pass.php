<?php


session_start();
if(empty($_SESSION['adminemail'])){

    header("Location:login.php");

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
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="../style/pass.css" type="text/css">
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

    <br><br><br>

    <h2 style="color: white;margin-left: 52px;">Subscription Pass</h2>
    <br><br>
    <<?php
$query = "select * from pass";
$spass =  mysqli_query($connection , $query);


echo "<table class='table-pass'>";
echo "<tr class='border-tr' style='background-color: white;color:black;'>";
echo "<td>User Name</td>";
echo "<td>User Email</td>";
echo "<td>Pass Type</td>";
echo "<td>Pass Price</td>";

echo " </tr>";
while($res = mysqli_fetch_array($spass)) { 
echo " <tr class='border-tr'>";

    $userId = $res['user_id'];
    $que = "select * from user where userId = '$userId'";
    $user =  mysqli_query($connection , $que);
    while($row = mysqli_fetch_array($user)){
        echo "<td>".$row['firstname']."&nbsp;".$row['lastname']."</td>";
        echo "<td>".$row['email']."</td>";
    } 


echo "<td>".$res['passType']."</td>";
echo "<td>".$res['passPrice']."</td>";

echo " </tr>";

}


echo " </table>"

?>
</body>
</html>
<?php
            
    if(isset($_POST['logout'])){
        session_destroy();
        header("Location:login.php");
    }
            
?>
