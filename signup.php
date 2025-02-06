
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" href="CSS.css" />
	<!-- <style>
	h1{ margin:20px; text-align:center; padding:0px; font-family: 'Rubik', sans-serif; }
	#lowrbdy{ width:100%;	height:655px;	position:absolute;	top:0px;	left:0px;	}
	#lowrbdy img{ width:100%;	height:100%;	}
	.outer{	width:1100px; height:560px;	position:absolute; top:60px; left:160px; background:rgba(255,255,255,0.8);	}
	#UserName{ width:400px; border:none; height:50px; box-shadow:0px 0px 2px #555; margin:90px 0px 0px 350px; font-size:30px;	}
	#name_status{ text-align:center; font-size:40px;	}
	.example{ text-align:center; font-size:20px}
	body{background:#222}
	</style> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript"  >
    	var ck_username = /^[A-Za-z0-9_]{3,20}$/;
		var ck_email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/; 
		var ck_password =  /^[A-Za-z0-9!@#$%^&*()_]{6,20}$/;
		var ck_password2 =  /^[A-Za-z0-9!@#$%^&*()_]{6,20}$/;


		function validate(form){
		 var username = form.username.value;
		 var email = form.email.value;
		 var password = form.password.value;
		 var password2 = form.password2.value;  
		var errors = [];
		 if (!ck_username.test(username)) {
		  errors[errors.length] = "You must enter valid UserName, no special char .";
		 }
		  if (!ck_email.test(email)) {
		  errors[errors.length] = "You must enter a valid email address.";
		 }
		 if (!ck_password.test(password)) {
		  errors[errors.length] = "You must enter a valid Password min 6 char.";
		 }
		  if (password2 != password ) {
		  errors[errors.length] = "You must enter the same Password.";
		 }
		 if (errors.length > 0) {
		  reportErrors(errors);
		  return false;
		 }
		 return true;
		}
		function reportErrors(errors){
		 var msg = "Please Enter Valide Data...\n";
		 for (var i = 0; i < errors.length; i++) {
		  var numError = i + 1;
		  msg += "\n" + numError + ". " + errors[i];
		 }
		 alert(msg);
		} 
	</script>
		
	<script>
	$(document).ready(function() {
		$('#username').blur(function() {
			var username = $(this).val();
			$.ajax({
				url:'signup8.php',
				method:"POST",
				data:{user_name:username},
				success:function(data)
				{
					if(data != '0') 
					{			
						$('#availability').html('<span style="color:red; top-margin:-10px;"> Username not available </span>');
						$('#submit').attr("disabled", true);
					}
					else
					{
						$('#availability').html('<span  style="color:green; top-margin:-10px;" > Username available </span>');
						$('#submit').attr("disabled", false);
					}
				}
			})
		});
	});

    </script>
    
</head>
<body>
	<form autocomplete="off" enctype="multipart/form-data" method="post" action="login.php" onsubmit="return validate(form);" name="form">
	<!--	<?php
		 /* $username = $_POST['username'];
		    $password = $_POST['password'];
		    $email = $_POST['email'];
		    if(!empty($username) || !empty($password) || !empty($email)) { 
            $host = "localhost";
            $dbUsername = "admin";
            $dbPassword = "admin";
            $dbName = "myrecipe";
            $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
            if (mysqli_connect_error()) {
                die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
            }

            if(isset($_POST["user_name"])) {
                $username = mysqli_real_escape_string($conn, $_POST["user_name"]);
                $query = "SELECT * FROM user WHERE username = '".$username."'";
                $result = mysqli_query($conn, $query);
                echo mysqli_num_rows($result); 
        	} */
		?> 
	</form> -->

<div id="login-box">
<div id="box">
  <div class="left" >
    <h1>Sign up</h1>
    <input type="text" name="username" placeholder="Username" id="username" onkeyup="checkname();" />
    <span id="availability"></span>
    <input type="text" name="email" placeholder="E-mail" />
    <input type="password" name="password" placeholder="Password" />
    <input type="password" name="password2" placeholder="Retype password" />
    <input type="submit"  value="Sign me up" name="submit" id="submit" /> 
  </div>
  </div>
</div>

<
 <!-- 
  <div class="right">
    <span class="loginwith">Sign in with<br />social network</span>
    
     <button class="social-signin facebook">Log in with facebook</button>
    <button class="social-signin twitter">Log in with Twitter</button>
    <button class="social-signin google">Log in with Google+</button> 
  </div> 
  <div class="or">OR</div> -->
</form>
</body>
</html>