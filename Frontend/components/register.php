<html>
<style>
    body{
        margin: 0;
        padding: 0;
    }
    .nav{
        display: flex;
        justify-content:space-around;
        box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.2), 0 0 0 0 rgba(0, 0, 0, 0.19);
        height:70px;
        font-size:25px;
    }
    .nav-left{
        flex:30%;
        display:flex;
        justify-content:flex-start;
        padding-top:10px;
        margin-top:10px;
        margin-left:45px;
        
    }
    .nav-right{
        flex:70%;
        padding-top:10px;
        display:flex;
        justify-content:flex-end;
        margin-right:75px;
    }
    .nav-button{
        padding:5px;
        background-color:transparent;
        height:45px;
        width:100px;
        font-size:20px
    }
    .nav-button:hover{
        background-color:black;
        color:white;
    }
    .form{
        text-align: center;
    }
    .textbox{
        width: 400px;
        height: 35px;
        padding: 10px;
        font-size: 18px;
        border: 2px solid #9DB3BB;
        outline: none;

       
    }
    .textbox-f{
        width: 200px;
        height: 35px;
        padding: 10px;
        font-size: 18px;
        outline: none;
        border: 2px solid #9DB3BB;
       
    }
    .login{
        font-size: 20px;
        margin-left: 105px;
    }
    .forPass{
       
        margin-left: 150px;
        color: gray;
    }
    .forPass:hover{
        text-decoration: underline;
    }
    .login-btn{
        width: 400;
        height: 37px;
        font-size: 18px;

        background-color: transparent;
    }
    .login-btn:hover{
        background-color:black;
        color:white;
    }
    .footer{
        display: flex;
        justify-content: space-around;
        background-color: #2A2D36;
        color: #9DB3BB;
        padding: 20px;
    }
    .footer-left{
        flex:33.33%;
        padding: 20px;
        line-height: 25px;
        text-align: center;
    }
    .footer-center{
        flex:33.33%;
        padding: 20px;
        line-height: 25px;
        text-align: center;
    }
    .footer-right{
        flex:33.33%;
        padding: 20px;
        line-height: 25px;
        text-align: center;

    }
</style>
<!-- <link rel="stylesheet" href="css/login.css" type="text/css"> -->
<body>
<div class="nav">
    <div class="nav-left">Gyms</div>
    <div class="nav-right"><button class="nav-button">Login</button>&nbsp;&nbsp;
        <button class="nav-button">Register</button> </div>
</div> 
<br>
<div class="login">
    <h2>Register</h2><br>
</div>
    <div class="form"><h2>Register with Email</h2>
    <form>
        <input type="text" name="email" placeholder="First Name" class="textbox-f">
        <input type="text" name="email" placeholder="Last Name" class="textbox-f"><br><br>
        <input type="text" name="email" placeholder="Email" class="textbox"><br><br>
        <input type="text" name="password" placeholder="Password" class="textbox"><br><br>
        <input type="text" name="email" placeholder="Postcode" class="textbox-f">
        <p class="forPass">
            Already have a Hussle account? Log in.</p><br><br>
        <button class="login-btn">Register</button>
    </form>
    </div>

    <br>
    <br>
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
</html>