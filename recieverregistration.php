<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Reciever Registration</title>
<link rel="stylesheet" href="css/style.css?2.2" />
</head>
<body>
<?php
    require('db.php');
    if (isset($_REQUEST['name'])){
        $username = stripslashes($_REQUEST['name']); // removes backslashes
        $username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
        $bgp = stripslashes($_REQUEST['bgp']); // removes backslashes
        $bgp = mysqli_real_escape_string($con,$bgp); //escapes special characters in a string
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
        $query = "INSERT into `reciever` (name,email, password, grp) VALUES ('$username', '$email','".md5($password)."','$bgp')";
        $result = mysqli_query($con,$query);
        echo(mysqli_error($con));
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='recieverlogin.php'>Login</a></div>";
        }
        }
    }else{
?>

<div class="form">
<input type="button" value="Homepage" onclick="window.location.href='index.php'"></input><br /><br />

<h1>Reciever Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="name" placeholder="Name" required />
<input type="email" name="email" placeholder="Email" required /></br></br>
<a>Blood Group</a>
 <select  name="bgp" > 
<option value="A">O+</option>
<option value="A+">A+</option>
<option value="B+">B+</option>
<option value="AB+">AB+</option>
<option value="O-">O-</option>
<option value="A-">A-</option>
<option value="B-">B-</option>
<option value="AB-">AB-</option>
</select>
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
<br /><br />
</div>
<?php } ?>
</body>
</html>
