<?php
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

$query = "select * from gym";
$search = mysqli_query($connection , $query);

$oId = rand(100,7000);
session_start();
$uid = $_SESSION['userid'];


?>

<!DOCTYPE html>

<head>
    <!-- css link -->
    <link rel="stylesheet" href="../style/membership.css" />
</head>

<!-- body starts -->

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
    

    <div class="platinum">
        <div class="b-backround">
        <div class="banner">
            <p>3 Month Pass</p>
            <span></span>
            <label>
                Access multiple gyms <br>
                with a single pass;<br>
                A pass for multiple gyms;
            </label>
            <span></span>
            <label>
                SFW , Life Fitness , Aura
            </label>
            <form method="post" action="../paytmKit/pgRedirect.php">
            <input id="ORDER_ID" type="hidden" tabindex="1" maxlength="20" size="20" name="ORDER_ID"  autocomplete="off"value="<?php echo  $oId?>">
            <input id="CUST_ID" type="hidden"  tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value=<?php echo $uid?>>
            <input id="INDUSTRY_TYPE_ID" type="hidden" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
            <input id="CHANNEL_ID" tabindex="4" type="hidden" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
            <input title="TXN_AMOUNT" tabindex="10" type="hidden" name="TXN_AMOUNT" value=4000 > 
            <input value="&#8377;4000" type="submit" class='button-pay'>

            <!-- <button> &#8377; 4000</button> -->
            </form>	
        </div>
        </div>

        <div class="b-backround">
        <div class="banner">
            <p>6 Month Pass</p>
            <span></span>
            <label>
                Access multiple gyms <br>
                with a single pass;<br>
                A pass for multiple gyms;
            </label>
            <span></span>
            <label>
                SFW , Life Fitness , Aura ,
                Black the gym , Fitwave
            </label>
            <form method="post" action="../paytmKit/pgRedirect.php">
            <input id="ORDER_ID" type="hidden" tabindex="1" maxlength="20" size="20" name="ORDER_ID"  autocomplete="off"value="<?php echo  $oId?>">
            <input id="CUST_ID" type="hidden"  tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value=<?php echo $uid?>>
            <input id="INDUSTRY_TYPE_ID" type="hidden" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
            <input id="CHANNEL_ID" tabindex="4" type="hidden" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
            <input title="TXN_AMOUNT" tabindex="10" type="hidden" name="TXN_AMOUNT" value=8000 > 
            <input value="&#8377;8000" type="submit" class='button-pay'>

            <!-- <button> &#8377; 8000</button> -->
            </form>	
        </div>
        </div>

        <div class="b-backround">
        <div class="banner">
            <p>1 Year Pass</p>
            <span></span>
            <label>
                Access multiple gyms <br>
                with a single pass;
                A pass for multiple gyms:)
            </label>
            <span></span>
            <label>
            SFW , Life Fitness , Aura ,
                Black the gym , Fitwave , unix gym
            </label>
            <form method="post" action="../paytmKit/pgRedirect.php">
            <input id="ORDER_ID" type="hidden" tabindex="1" maxlength="20" size="20" name="ORDER_ID"  autocomplete="off"value="<?php echo  $oId?>">
            <input id="CUST_ID" type="hidden"  tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value=<?php echo $uid?>>
            <input id="INDUSTRY_TYPE_ID" type="hidden" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
            <input id="CHANNEL_ID" tabindex="4" type="hidden" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
            <input title="TXN_AMOUNT" tabindex="10" type="hidden" name="TXN_AMOUNT" value=12000 > 
            <input value="&#8377;12000" type="submit" class='button-pay'>

            <!-- <button> &#8377; 12000</button> -->
            </form>	
        </div>
        </div>

        <!--  -->
    </div>

</body>

<!-- font-awesome link -->
<script src="https://kit.fontawesome.com/4384453e56.js" crossorigin="anonymous"></script>


</html>
