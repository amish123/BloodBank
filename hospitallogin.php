
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Hospital Login</title>
<link rel="stylesheet" href="css/style.css?2.2" />
</head>
<body>
<?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['email'])){
		
		$email = stripslashes($_REQUEST['email']); // removes backslashes
		$email = mysqli_real_escape_string($con,$email); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `hospital` WHERE email='$email' and password='".md5($password)."'";
		$result = mysqli_query($con,$query);
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['email'] = $email;
			//echo("lol");
			$_SESSION['type']=2;
			header("Location: index.php"); // Redirect user to index.php
            }else{
            	if($rows==1)
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='hospitallogin.php'>Login</a></div>";
			     else
			     	echo "<div class='form'><h3>You are not registered</h3><br/>Click here to <a href='hospitalregistration.php'>register</a></div>";
				}
    }else{
?>
<div class="form">
<input type="button" value="Homepage" onclick="window.location.href='index.php'"></input><br /><br />

<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="email" name="email" placeholder="Hospital Email" required />
<input type="password" name="password" placeholder="password" required />
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='hospitalregistration.php'>Register Here</a></p>

<br /><br />
</div>
<?php } ?>


</body>
</html>
