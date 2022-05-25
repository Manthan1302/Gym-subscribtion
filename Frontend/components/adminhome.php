<?php
session_start();

?>
<html>
    <head>
        <link rel="stylesheet" href="../style/adminhome.css" type="text/css">
    <script src="https://kit.fontawesome.com/4228e33b37.js" crossorigin="anonymous"></script>

    </head>
    <body>
        <div class="admin-nav">
            <div>
                <a href="#"><h2 style="margin-left: 20px;">Gymasio Dashboard</h2></a>
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
        <div class="admin-functions">
            <a href="users.php"> 
                <div class="card">
                    <i class="fas fa-users" style="font-size: 50px; margin-top:55px; "></i>
                    <br><br>
                    <span style="font-size: 20px; ">Users</span>
                </div>
            </a>
            <a href="gyms.php">
                <div class="card"> 
                    <i class="fas fa-dumbbell" style="font-size: 50px; margin-top:55px;"></i>
                    <br><br> 
                    <span style="font-size: 20px;">Gyms</span>
                </div>
            </a>
           
        </div>
        <br><br>

        <div  class="admin-functions">
            <a href="pass.html">
                <div class="card"> 
                    <i class="fas fa-ticket-alt" style="font-size: 50px; margin-top:55px;"></i>
                    <br><br>
                    <span style="font-size: 20px;"> Subscription pass</span>
                </div>
            </a>
            <a href="feedback.html">
                <div class="card">
                    <i class="fas fa-comment-alt" style="font-size: 50px; margin-top:55px;"></i>
                    <br><br>
                    <span style="font-size: 20px;">Feedback</span>
                </div>
            </a>
        </div>
    </body>
</html>

<?php
            
    if(isset($_POST['logout'])){
        session_destroy();
        header("Location:login.php");
    }
            
?>