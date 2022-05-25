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
        <form method='post'>
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
                <input type="file" name="image"  id="file" multiple/><br><br>
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
                    <input type="text" placeholder="Enter About gyms" class="input-text" name="about">
                </div>
            </div><br>
            <div>
            <p>Pass Type</p>
                <div class="pass">
                <span>Bronze</span> <input type="text" placeholder="Enter Amount" class="input-text" >
                 </div><br>
               <div  class="pass"> <span>Silver</span> <input type="text" placeholder="Enter Amount" class="input-text"></div><br>
               <div  class="pass"> <span>Gold</span> <input type="text" placeholder="Enter Amount" class="input-text"> </div><br>
               <div  class="pass"> <span>Platinum</span> <input type="text" placeholder="Enter Amount" class="input-text"></div>

          

            </div>
            <div style="text-align: center;" >
                <p>About Gyms</p>
                <textarea  placeholder="Enter Gym Address "  rows="4" cols="70" name="address"></textarea><br><br>
                <button name="addGym">Add Gym</button>
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
if(isset($_POST['addGym']))
$name = $_POST['gymname'];
$equipment = $_POST['equipment'];
$amenities = $_POST['amenities'];
$about = $_POST['about'];
$address = $_POST['address'];
$gid = rand(1000 , 9999);

$filename = $_FILES['image']['name'];
$imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
$extensions_arr = array("jpg","jpeg","png","gif");
if( in_array($imageFileType,$extensions_arr) ){
	if(move_uploaded_file($_FILES["image"]["tmp_name"],'upload/'.$filename)){
		
		$insert = "insert into gym(file_name) values('$gid','$name','$equipment','$amenities','$about','$address')";
		if(mysqli_query($conn, $insert)){
		  echo 'Data inserted successfully';
		}
		else{
		  echo 'Error: '.mysqli_error($conn);
		}
	}else{
		echo 'Error in uploading file - '.$_FILES['image']['name'].'<br/>';
	}
	
} 






$query = "select * from user";
$gyms =  mysqli_query($connection , $query);

while($res = mysqli_fetch_array($gyms)) { 
    
}
?>
<?php
            
    if(isset($_POST['logout'])){
        session_destroy();
        header("Location:login.php");
    }
            
?>