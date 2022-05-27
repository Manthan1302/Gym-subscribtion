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

$query = "select * from gym";
$search = mysqli_query($connection , $query);

// $location = $_SESSION['location'];

// echo "location = $location";


?>
<html>
<head>
    
    <link rel="stylesheet" href="../style/search.css" type="text/css">
    <script src="https://kit.fontawesome.com/4228e33b37.js" crossorigin="anonymous"></script>
    
</head>
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

<div class="main">
    <br>
    <div class="near">
        <h2>Find a Gym Near Me</h2>
    </div>
   
    <div class="search">
        <div class="text"> 
            <form method="post">
                <input type="text" name="address" placeholder="Enter your location" class="input">
                <button name="search" class="nav-button" style="background-color: black;color: white; margin-top: 8px; margin-right: 1%"><i class="fa-solid fa-magnifying-glass"></i>Search</button>
            </form>   
        </div>  
       
</div>
<br>
<br>

<div class="gym-container">
    <div class="gyms">
                
    <?php   
            
    
            if(!isset($_POST['search'])){
                if(isset($_SESSION['location'])){
                    $location = $_SESSION['location'];
                    $query = "select * from gym where gymLocation like '%$location%';";
                    $search = mysqli_query($connection , $query);

                while($row = mysqli_fetch_array($search)){
                    $gymid = $row['gymId'];
                    $gymname = $row['gymName'];
                    $gymlocation = $row['gymLocation'];
                    $gymimage = json_decode($row['gymImages']);
                    $gymamenities = json_decode($row['gymAmenities']);
                    $gympass = json_decode($row['gymPass']);
                    // $daypass = $gympass->Daypass;
                    // $monthpass = $gympass->Monthlypass;
                    $aboutgym = $row['aboutGym'];
                    $gymequip = json_decode($row['gymEquipment']);
    
                    echo '<div class="card">';
                        echo "<img src='$gymimage[0]'>";
                    
                        echo "<div class='names'>";
                            echo "<p>$gymname</p>";
                            echo "<p>$gymlocation</p>";
                        echo "</div>";
    
                        echo '<div class="points">';
                            echo '<ul type="bullet">';
                                foreach($gymequip as $equip){
                                    echo "<li>$equip</li>";
                                }
                            echo "</ul>";
                        echo "</div>";
                        echo '<div class="pass-button">';   
                                echo "<section>";
                                    echo "<button class='gyms-button'><a href='viewgym.php?id=$gymid'>View Passes</a></button>";
                                echo "</section>";
                        echo "</div>";
                    echo "</div>";
                }
                }else{
                    while($row = mysqli_fetch_array($search)){
                        $gymid = $row['gymId'];
                        $gymname = $row['gymName'];
                        $gymlocation = $row['gymLocation'];
                        $gymimage = json_decode($row['gymImages']);
                        $gymamenities = json_decode($row['gymAmenities']);
                        $gympass = json_decode($row['gymPass']);
                        // $daypass = $gympass->Daypass;
                        // $monthpass = $gympass->Monthlypass;
                        $aboutgym = $row['aboutGym'];
                        $gymequip = json_decode($row['gymEquipment']);
        
                        echo '<div class="card">';
                            echo "<img src='$gymimage[0]'>";
                        
                            echo "<div class='names'>";
                                echo "<p>$gymname</p>";
                                echo "<p>$gymlocation</p>";
                            echo "</div>";
        
                            echo '<div class="points">';
                                echo '<ul type="bullet">';
                                    foreach($gymequip as $equip){
                                        echo "<li>$equip</li>";
                                    }
                                echo "</ul>";
                            echo "</div>";
                            echo '<div class="pass-button">';   
                                    echo "<section>";
                                        echo "<button class='gyms-button'><a href='viewgym.php?id=$gymid'>View Passes</a></button>";
                                    echo "</section>";
                            echo "</div>";
                        echo "</div>";
                    }
                }
            }
            else{

                session_destroy();

                $address = $_POST['address'];
                
                if(empty($address)){
                    echo '<script>';
                    echo "alert('* Address has not been set! *')";
                    echo '</script>';

                    while($row = mysqli_fetch_array($search)){
                        $gymid = $row['gymId'];
                        $gymname = $row['gymName'];
                        $gymlocation = $row['gymLocation'];
                        $gymimage = json_decode($row['gymImages']);
                        $gymamenities = json_decode($row['gymAmenities']);
                        $gympass = json_decode($row['gymPass']);
                        // $daypass = $gympass->Daypass;
                        // $monthpass = $gympass->Monthlypass;
                        $aboutgym = $row['aboutGym'];
                        $gymequip = json_decode($row['gymEquipment']);
        
                        echo '<div class="card">';
                            echo "<img src='$gymimage[0]'>";
                        
                            echo "<div class='names'>";
                                echo "<p>$gymname</p>";
                                echo "<p>$gymlocation</p>";
                            echo "</div>";
        
                            echo '<div class="points">';
                                echo '<ul type="bullet">';
                                    foreach($gymequip as $equip){
                                        echo "<li>$equip</li>";
                                    }
                                echo "</ul>";
                            echo "</div>";
                            echo '<div class="pass-button">';   
                                    echo "<section>";
                                        echo "<button class='gyms-button'><a href='viewgym.php?id=$gymid'>View Passes</a></button>";
                                    echo "</section>";
                            echo "</div>";
                        echo "</div>";
                    }
                }
                
                else{
                    $query = "select * from gym where gymLocation like '%$address%';";
                    $search = mysqli_query($connection , $query);

                    while($row = mysqli_fetch_array($search)){
                        $gymid = $row['gymId'];
                        $gymname = $row['gymName'];
                        $gymlocation = $row['gymLocation'];
                        $gymimage = json_decode($row['gymImages']);
                        $gymamenities = json_decode($row['gymAmenities']);
                        $gympass = json_decode($row['gymPass']);
                        // $daypass = $gympass->Daypass;
                        // $monthpass = $gympass->Monthlypass;
                        $aboutgym = $row['aboutGym'];
                        $gymequip = json_decode($row['gymEquipment']);
        
                        echo '<div class="card">';
                            echo "<img src='$gymimage[0]'>";
                        
                            echo "<div class='names'>";
                                echo "<p>$gymname</p>";
                                echo "<p>$gymlocation</p>";
                            echo "</div>";
        
                            echo '<div class="points">';
                                echo '<ul type="bullet">';
                                    foreach($gymequip as $equip){
                                        echo "<li>$equip</li>";
                                    }
                                echo "</ul>";
                            echo "</div>";
                            echo '<div class="pass-button">';   
                                    echo "<section>";
                                        echo "<button class='gyms-button'><a href='viewgym.php?id=$gymid'>View Passes</a></button>";
                                    echo "</section>";
                            echo "</div>";
                        echo "</div>";
                    }

                }
            }


                ?>

                
            </div>


</div>

<!-- foooter -->
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

<!-- insert into gym values(7824 , 'Black The Gym' , 'Maninagar' , '["https://images.unsplash.com/photo-1581009146145-b5ef050c2e1e" , "https://images.unsplash.com/photo-1571388208497-71bedc66e932" , "https://images.unsplash.com/photo-1581009146145-b5ef050c2e1e"]' , '{"Daypass": 290, "Monthlypluspass": 2500}' , '["Cardio machines", "Fitness studio", "Resistance machines", "Olympic weights", "Functional Training", "Free weights", "Personal Training", "Towels"]' , '["Changing Rooms", "Lockers", "Showers"]' , "aura fitness wonderfull gym"); -->