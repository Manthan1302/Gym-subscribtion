<?php

$gymid = $_REQUEST['id'];

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

$view = "select * from gym where gymId = '$gymid'";
$result = mysqli_query($connection , $view);

while($row = mysqli_fetch_array($result)){
    $gymid = $row['gymId'];
    $gymname = $row['gymName'];
    $gymlocation = $row['gymLocation'];
    $gymimage = json_decode($row['gymImages']);
    $gymamenities = json_decode($row['gymAmenities']);
    $gympass = json_decode($row['gymPass']);
    $daypass = $gympass->Daypass;
    $monthpass = isset($gympass->Monthlypass);
    $monthpluspass = isset($gympass->Monthlypluspass);
    // echo "monthly plus pass = $monthpluspass";
    $aboutgym = $row['aboutGym'];
    $gymequip = json_decode($row['gymEquipment']);

    // foreach($gympass as $type => $pass){
    //     echo "$type = $pass ,";
    // }

}
?>

<html>

<head>

    <link rel="stylesheet" href="../style/viewgym.css" type="text/css">
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


    <div class="view-gym-body">
        <div class="view-gym-container">
            <div class="view-gym-images">
                <?php

                    foreach($gymimage as $img){
                        echo "<img src='$img' class='class1' />";
                    }
                ?>
            </div>
            <div class="view-gym-detail">
                <section class="name">
                    <?php
                        echo "<p>$gymname</p>";
                        echo "<p><i class='fa-solid fa-map-location-dot'>$gymlocation</i></p>";
                    ?>
                    
                </section>
                <section class="disc">
                    <?php
                        echo "<p>$aboutgym</p>";
                    ?>
                </section>

                <section class="parent">
                    <section class="equipment">
                        <?php
                            foreach($gymequip as $equip){
                                echo "<label><i class='fa-solid fa-dumbbell'></i>$equip</label>";
                            }
                        ?>
                    </section>
                    <section class="need">
                        <?php
                            foreach($gymamenities as $need){
                                echo "<label><i class='fa-solid fa-person-walking'></i>$need</label>";
                            }
                        ?>                        
                    </section>
                </section>
            </div>
            <div class="view-gym-passes">
                <?php
                foreach($gympass as $type => $pass){
                    // echo "pass = $pass ,";
                    if($type == "Daypass"){
                        echo '<section class="silver">';
                            echo '<i class="fa-solid fa-ticket-simple"></i>';
                            echo '<p>Day Pass</p>';
                            echo '<p>Visit for a day</p>';
                            echo "<button> &#8377; $pass</button>";
                        echo '</section>';  
                    }

                    if($type == "Monthlypluspass"){
                        echo '<section class="gold">';
                            echo '<i class="fa-solid fa-ticket-simple"></i>';
                            echo '<p>Monthly+ Pass</p>';
                            echo '<p>Access multiple gyms</p>';
                            echo "<button> &#8377;  $pass</button>";
                        echo '</section>';    
                    }
                }
                        
                    
                ?>
            </div>
        </div>
    </div>
</body>

</html>

