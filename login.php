<!DOCTYPE html>
<html>
    <title>Login</title>
<style>

@import url("https://fonts.googleapis.com/css2?family=Sacramento&display=swap");
    /*set border to the form*/
      
    .box{
        margin: 100px auto;
        
        border:3px solid black;
        max-width: 500px;
        
        
    }
    h2{
        max-width: 499px;
        margin: auto;
        text-align: center; 
        font-family: 'Sacramento'; 
        font-weight:900; 
        color: white; 
        font-size: 45px; 
        background-color: black;
        border: white;
        border-width: thin;
    }
    form {
        
        max-width: 500px;
        margin: auto;
    }
    /*assign full width inputs*/
      
    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
    /*set a style for the buttons*/
      
    button {
        background-color: #c24646;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }
    /* set a hover effect for the button*/
      
    button:hover {
        opacity: 0.8;
    }
    /*set extra style for the cancel button*/
      
    .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
    }
    /*centre the display image inside the container*/
      
    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
    }
    /*set image properties*/
      
    img.avatar {
        width: 40%;
        border-radius: 50%;
    }
    /*set padding to the container*/
      
    .container {
        padding: 16px;
    }
    /*set the forgot password text*/

    .container > span {
        float: right;
        display: block;
    }
     /* 
    span.psw {
        float: right;
       padding-top: -6px; 
       padding-bottom: 15px;
    }*/
    /*set styles for span and cancel button on small screens*/
      
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }
        .cancelbtn {
            width: 100%;
        }
    }
</style>
  
<body>
  <div class="box">
    <h2>Recipes</h2>
    <!--Step 1 : Adding HTML-->
    <form action="/signup.php" method="GET">
        <?php
            $conn = mysqli_connect("localhost", "admin", "admin", "myrecipe");
           /* if (mysqli_connect_error()) {
                die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
            } */
            $errusername = "";
            $errpassword = "";

            if (isset($_POST['submit'])) {
                if (isset($_POST['username'])) {
                    
                    if ($_POST['username'] == "") {
                        $errusername = "Please Enter username";
                    } else {
                        $regEx = '/^[A-Za-z0-9]{1,20}$/';
                        if (!preg_match($regEx,$_POST['username'])) {
                            $errusername = "Please Enter Valid username";
                        } 
                    } 
                }
                if (isset($_POST['password'])) {
                    
                    if ($_POST['password'] == "") {
                        $errpassword = "Please Enter password";
                    } else {
                        $regEx = '/^[A-Za-z0-9!@#$%^&*()_]{6,20}$/';
                        if (!preg_match($regEx,$_POST['password'])) {
                            $errpassword = "Please Enter Valid password";
                        } 
                    } 
                }
            } 
        ?>

        
       
  
        <div class="container">
            <form action="index.php" method="post" >
            <br><br/>
            <label><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>
            <div id="err1" class="err"><?php echo $errusername;?></div>
            <br><br/>
            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
            <div id="err2" class="err"><?php echo $errpassword;?></div>
            <br><br/>
            <span class="psw"> <a href="#">Forgot password?</a></span> <br><br/>
            <button type="submit" value="submit" >Login</button> <br><br/>
            
                <span> Remember me</span> 
            <input type="checkbox" checked="checked" style="float: right;" > <br/><br/>
            <span style="text-align: center; float: unset;">
                Don't have an account? <a href="signup.php">Sign Up</a> now.
            </span>
           <!-- <a href="index.html"><button type="button" class="cancelbtn" >Cancel</button> </a> -->
        </div>
  
       <!-- <div class="container" style="background-color:#f1f1f1">   
           <!- <span class="psw"> <a href="#">Forgot password?</a></span> 
        </div>-->
    </form>
  </div>
</body>
  
</html>