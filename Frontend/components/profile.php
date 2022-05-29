<?php

session_start();

if(empty($_SESSION['userid'])){

    header("Location:login.php");

}

$uid = $_SESSION['userid'];
$fname = $_SESSION['firstname'];
$lname = $_SESSION['lastname'];
$email = $_SESSION['email'];

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

                <div class="pass">
                    <p>08-05-2022</p>
                    <p>sfw</p>
                    <p>ahmedabad</p>
                    <p>day pass</p>
                    <p>bronze</p>
                </div>

                <div class="pass">
                    <p>29-05-2022</p>
                    <p>life fitness</p>
                    <p>isanpur</p>
                    <p>month pass</p>
                    <p>silver</p>
                </div>

                <div class="pass">
                    <p>23-07-2022</p>
                    <p>aura fitness</p>
                    <p>gandhinagar</p>
                    <p>monthly + pass</p>
                    <p>gold</p>
                </div>
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