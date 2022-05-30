<?php

session_start();

if(empty($_SESSION['userid'])){

    header("Location:login.php");

}

$uid = $_SESSION['userid'];
$fname = $_SESSION['firstname'];
$lname = $_SESSION['lastname'];
$email = $_SESSION['email'];

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "gym_database";

$connection = mysqli_connect($host,$user,$pass,$dbname);

$passquery = "select * from pass where user_id ='$uid'";
$history = mysqli_query($connection,$passquery);

?>
<html>

<head>
    <!-- css link -->
    <link rel="stylesheet" href="../style/profile.css" />
</head>

<body>
    <div class="profile-container">
        <div class="home-nav">
            <label>
                <a href="home.php">Gymnastix</a>
            </label>
            <p><a href="about.php">About us</a></p>
            <p><a href="search.php">View Gyms</a></p>
            <form method="post">
                <button name="logout">Log out</button>
            <form>
        </div>
        <div class="profile-body">

            <div class="user-profile">
                <div class="user-icon">
                    <i class="fa-solid fa-user-gear"></i>
                </div>
                <div class="user-details">
                    <?php

                    echo "<p> $uid </p>";
                    echo "<p> $fname $lname </p>";
                    echo "<p> $email </p>";

                    ?>
                    <button><a href="editprofile.php">edit</a></button>
                </div>
            </div>

            <div class="gym">
                <h3>gym passes history</h3>
            </div>

            <div class="user-pass">

                <?php
                    $result = mysqli_num_rows($history);
                    if($result > 0){
                        while($row = mysqli_fetch_array($history)){
                            $date = $row['date'];
                            $passname = $row['passName'];
                            $passtype = $row['passPrice'];
                            $gymid = $row['gym_id'];

                            if($gymid != NULL){
                                $gymquery = "select * from gym where gymId = '$gymid'";
                                $ans = mysqli_query($connection,$gymquery);

                                while($line = mysqli_fetch_array($ans)){

                                    $gymname = $line['gymName'];
                                    $gymLocation = $line['gymLocation'];
                                    
                                    echo "<div class='pass'>";
                                    echo "<p>$date</p>";
                                    echo "<p>$gymname</p>";
                                    echo "<p>$gymLocation</p>";
                                    echo "<p>$passname</p>";
                                    echo "<p>$passtype</p>";
                                    echo "</div>";
                                }
                            }else{
                                    echo "<div class='pass'>";
                                    echo "<p>$date</p>";
                                    echo "<p>All Gyms</p>";
                                    echo "<p>Ahmedabad</p>";
                                    echo "<p>$passname</p>";
                                    echo "<p>$passtype</p>";
                                    echo "</div>";
                            }

                        }
                    }
                ?>

            </div>

        </div>
    </div>
</body>

<!-- font-awesome link -->
<script src="https://kit.fontawesome.com/4384453e56.js" crossorigin="anonymous"></script>

</html>

<?php
            
    if(isset($_POST['logout'])){
        session_destroy();
        header("Location:home.php");
    }
            
?>