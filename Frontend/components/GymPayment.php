<?php

session_start();

$id=base64_decode($_REQUEST['custid']);
$am=$_REQUEST['amount'];
$name=$_REQUEST['name'];
$location=$_REQUEST['location'];
$image=$_REQUEST['image'];
$type=$_REQUEST['type'];

// $am=$_REQUEST['amount'];

$gid = $_REQUEST['gid'];
$color = $_REQUEST['color'];

$oId = rand(1000,9999);

$date = date("d-m-Y");
$_SESSION['buypass'] = "insert into pass values('$oId','Day Pass','$am','$color','$date','$id','$gid')";


?>

<html>
        
        <head><link rel="stylesheet" href="../style/gympayment.css" type="text/css"></head>
        <body>
            <div class="nav">
                <div class="nav-left">
                <a href="home.php">Gymnasio</a>
                </div>
                <div class="nav-right">
                    <p><a href="">About</a></p>
                    <p><a href="profile.php">Profile</a></p>
                </div>
            </div>
<br><br>
<br><br>
        
            <div class="details">
                <h3>Order Id:&nbsp;<?php echo $oId?></h3>
                <img src='<?php echo $image?>' class='class1' />
                <h3>Gym Name:&nbsp;<?php echo $name?></h3>
                <h3>Gym Location:&nbsp;<?php echo $location?></h3>
                <h3>Pass Type:&nbsp;<?php echo $type?></h3>
                <h3>Amount:&nbsp;<?php echo $am?></h3>
                <br><br>
                <span>Are You Sure?<br> You Want To Buy This Pass??</span><br><br>
   
        <form method="post" action="../paytmKit/pgRedirect.php">
        <input id="ORDER_ID" type="hidden" tabindex="1" maxlength="20" size="20" name="ORDER_ID"  autocomplete="off"value="<?php echo  $oId?>">
        <input id="CUST_ID" type="hidden"  tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value=<?php echo $id?>>
        <input id="INDUSTRY_TYPE_ID" type="hidden" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
        <input id="CHANNEL_ID" tabindex="4" type="hidden" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
        <input title="TXN_AMOUNT" tabindex="10" type="hidden" name="TXN_AMOUNT" value=<?php echo $am?> > 
        <input value="Yes" type="submit" class='button'>
        </form>	
        <Button  class='button' onclick="history.go(-1)">No</button>
        </div>
</body>
</html>