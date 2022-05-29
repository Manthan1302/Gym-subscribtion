<?php


session_start();
if(empty($_SESSION['userid'])){

  header("Location:login.php");

}
$uid = $_SESSION['userid'];
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
    <!-- css link -->
    <link rel="stylesheet" href="../style/about.css" /><style>
      .button{
    padding:5px;
    background-color:transparent;
    height:40px;
    width:95px;
    font-size:20px;
    outline: none;
    border: 2px solid black;
    transition: 0.6s ease-in-out;
  transform: scale(1.1, 1.1);
  font-family: "Quicksand", sans-serif;
  margin-left: 200px;
}
    </style>
</head>

<body>
    <div class="profile-container">
        <div class="home-nav">
            <label>
                <a href="home.php">Gymnastix</a>
            </label>
            <p><a href="profile.php">Profile</a></p>
            <p><a href="search.php">View Gyms</a></p>
            <form method="post">
                <button name="logout">Log out</button>
            <form>  
        </div>
        <div class="profile-body">
                <h3>About us</h3><br>
                  <p>
                    This project is a Gym membership and also gym passes
                    based web-application. You can buy a monthly and day passes for perticular gym  
                    through this webapp. You can also buy membership pass which include multiple gyms in one pass.
                  </p>

                  <br><br>
                  <h3>Feedback</h3>
                  <form method="post">
                    <textarea name="feed" cols="50" rows="4" placeholder="Give us Feedback"></textarea><br><br>
                    <input type="submit" name="submit" value="Submit" class="button">
                  </form>
        </div>
        </div>
</body>
</html>
 <?php
if(isset($_POST['submit'])){
  $feedbackMessage = $_POST['feed'];
  
  if(empty($feedbackMessage) ){
    echo '<script>';
    echo "alert('Please Fill the Feedback Box')";
    echo '</script>';
  }else{

    $feedback_id = rand(400,9000);
    $insertquery = "insert into feedback values('$feedback_id','$feedbackMessage','$uid') ";
    $feed = mysqli_query($connection , $insertquery);
  }

 
}

?>
<?php
            
    if(isset($_POST['logout'])){
        session_destroy();
        header("Location:home.php");
    }
            
?> 