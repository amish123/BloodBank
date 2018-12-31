<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Hospital Registration</title>
<link rel="stylesheet" href="css/style.css?2.2" />
</head>
<body>
<?php
	require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['name'])){
		$username = stripslashes($_REQUEST['name']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
        $query = "SELECT * FROM `reciever` WHERE email='$email' ";
        $result = mysqli_query($con,$query);
        $rows = mysqli_num_rows($result);
        $query2 = "SELECT * FROM `hospital` WHERE email='$email' ";
        $result2 = mysqli_query($con,$query2);
        $rows2 = mysqli_num_rows($result2);
        if($rows==1 || $rows2==1){
             echo "<div class='form'><h3>This Email Id is already registered.</h3><br/>Click here to <a href='recieverlogin.php'>Login</a></div>";
        }else{
        $query = "INSERT into `hospital` (name, password, email) VALUES ('$username', '".md5($password)."', '$email')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='hospitallogin.php'>Login</a></div>";
        }
       }
    }else{
?>
<div class="form">
<input type="button" value="Homepage" onclick="window.location.href='index.php'"></input><br /><br />

<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="name" placeholder="Hospital Name" required />
<input type="email" name="email" placeholder="Hospital Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
<br /><br />
</div>
<?php } ?>
</body>
</html>
