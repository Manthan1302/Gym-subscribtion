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
    <link rel="stylesheet" href="../style/gyms.css" type="text/css">
    <script src="https://kit.fontawesome.com/4228e33b37.js" crossorigin="anonymous"></script>
    

</head>
<body>
    <div class="admin-nav">
        <div>
            <a href="adminhome.php"> <h2 style="margin-left: 20px; ">Gymasio Dashboard</h2></a>

        </div>
        <div>
            <i class="fas fa-sign-out-alt" style="font-size: 25px; margin-top:20px;margin-right: 20px;"></i>
        </div>
    </div>

    <br><br><br>
    <h2 style="color: white;margin-left: 52px;">Manage Gyms </h2>
    <br><br>
    <div class="form">
        <form method='post' enctype="multipart/form-data" action="">
            <br><br>
           
            <div style="display: flex; justify-content: space-around;">
                <div>
                    <p>Gym Name</p>
                    <input type="text" placeholder="Enter Gym Name" class="input-text" name="gymname">
                </div>
                <div>
                    <p>Gym Equipment</p>
                    <input type="text" placeholder="Enter Gym Equipment " class="input-text" name="equipment">
                </div>
            </div>
            <div style="text-align: center;">
                <div class="upload-btn-wrapper" >
                    <btn class="btn-admin"><i class="fas fa-cloud-upload-alt" style="margin-top:100px;"></i></btn>
                <input type="file" name="image[]"  id="file" multiple/><br><br>
                </div><br>
                <div class="upload-image-button"> 
                        <button class="btn2-admin">UPLOAD IMAGE</button>
                </div><br>
            </div><br>
            <div style="display: flex; justify-content: space-around;">
                <div>
                    <p>Gym Amenities</p>
                    <input type="text" placeholder="Enter Gym Amenities " class="input-text" name="amenities"> 
                </div>
                <div>
                    <p>Gyms Location</p>
                    <input type="text" placeholder="Enter About gyms" class="input-text" name="address">
                </div>
            </div><br>
            <div>
            <p>Pass Type</p>
               <div  class="pass"> <span>Silver</span> <input type="text" name="silver" placeholder="Enter Amount" class="input-text"></div><br>
               <div  class="pass"> <span>Gold</span> <input type="text" name="gold" placeholder="Enter Amount" class="input-text"> </div><br>
            </div>
            <div style="text-align: center;" >
                <p>About Gyms</p>
                <textarea  placeholder="Enter Gym Address "  rows="4" cols="65" name="about"></textarea><br><br>
                <input type=submit name="addGym" value="Add Gym"></input>
            </div>
            
        
        </form>

    </div>

    <br>
    <br>

    <div>
        
    </div>
</body> 
</html>
<?php
    if(isset($_POST['addGym'])){
        $name = $_POST['gymname'];
        $equipment = $_POST['equipment'];
        $amenities = $_POST['amenities'];
        $about = $_POST['about'];
        $location = $_POST['address'];
        $gid = rand(1000 , 9999);
        $gold = $_POST['gold'];
        $silver = $_POST['silver'];

        if(empty($name) or empty($equipment) or empty($amenities) or empty($about) or empty($location)){
            echo '<script>';
            echo "alert('all details are important')";
            echo '</script>';
        }else{

            $gymequipment = json_encode(explode("," , $equipment));
            $gymaminities = json_encode(explode("," , $amenities));
            var_dump($gymequipment);
            $pass = array("Daypass"=>$silver , "Monthlypluspass"=>$gold);
            $gymPass = json_encode($pass);
            // $extension=array('jpeg','jpg','png','gif');
            // foreach ($_FILES['image']['tmp_name'] as $key => $value) {
            //     $filename=$_FILES['image']['name'][$key];
            //     $filename_tmp=$_FILES['image']['tmp_name'][$key];
            //     echo '<br>';
            //     $ext=pathinfo($filename,PATHINFO_EXTENSION);
            //     $finalimg='';
            //     if(in_array($ext,$extension))
            //     {
            //         move_uploaded_file($filename_tmp, 'images/'.$filename);
            //         $finalimg=$filename;
                   
            //     }
                    $addgymquery = "insert into gym values('$gid','$name','$location', '$finalimg' ,'$gymPass','$gymequipment','$gymaminities','$about')";
                    $insertGym = mysqli_query($connection , $addgymquery);
                    if ($insertGym) {
                        echo '<script>';
                        echo "alert('data recorded successfully')";
                        echo '</script>';
                    }else{
                        echo '<script>';
                        echo "alert('something went wrong')";
                        echo '</script>';
                    }
                }
            }
           
            // $gymImage = json_encode(array("https://images.unsplash.com/photo-1581009146145-b5ef050c2e1e" , "https://images.unsplash.com/photo-1571388208497-71bedc66e932" , "https://images.unsplash.com/photo-1581009146145-b5ef050c2e1e"));
            
        
            
            // echo $addgymquery;
        // }

        // insert into gym values(7824 , 'Black The Gym' , 'Maninagar' , '["https://images.unsplash.com/photo-1581009146145-b5ef050c2e1e" , "https://images.unsplash.com/photo-1571388208497-71bedc66e932" , "https://images.unsplash.com/photo-1581009146145-b5ef050c2e1e"]' , '{"Platinum":0}' , '["Cardio machines", "Fitness studio", "Resistance machines", "Olympic weights", "Functional Training", "Free weights", "Personal Training", "Towels"]' , '["Changing Rooms", "Lockers", "Showers"]' , "aura fitness wonderfull gym");
        
    






?>


<div class="gym-container">
    <div class="gyms">
<?php

$query = "select * from gym";
$gyms =  mysqli_query($connection , $query);

while($row = mysqli_fetch_array($gyms)) { 
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
?>




 
<!-- logout -->
<?php
            
    if(isset($_POST['logout'])){
        session_destroy();
        header("Location:login.php");
    }
            
?>