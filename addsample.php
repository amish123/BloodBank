<?php
include("auth.php");
if($_SESSION['email']!=NULL)
{
    if($_SESSION['type']==NULL)
        echo "<div class='form'><h3>Login as a hospital first to insert samples</h3><br/>Click here to <a href='hospitallogin.php'>Login</a></div>";
    else
    {
    ?>
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
		$name = stripslashes($_REQUEST['name']); // removes backslashes
		$name = mysqli_real_escape_string($con,$name); //escapes special characters in a string
		$grp = stripslashes($_REQUEST['grp']);
		$grp = mysqli_real_escape_string($con,$grp);
        $email=$_SESSION['email'];
        $query="SELECT id from hospital WHERE email LIKE '$email'";
        $result = mysqli_query($con,$query);
        echo(mysqli_error($con));
        $row = $result->fetch_assoc();
        //echo($row["id"]);
        $r=$row["id"];
        $query = "INSERT into `samples` (samplename, type, hospitalid) VALUES ('$name', '$grp', '$r')";
        $result = mysqli_query($con,$query);
        echo(mysqli_error($con));
        if($result){
            echo "<div class='form'><h3>Your sample is added successfully.</h3><br/>Click here to go to <a href='index.php'>Homepage</a></div>";        
        }
    }else{
?>
<div class="form">
<h1>Sample Registration</h1>
<input type="button" value="Homepage" onclick="window.location.href='index.php'"></input><br /><br />

<form name="registration" action="" method="post">
<input type="text" name="name" placeholder="sample name" required /></br></br>
<a>Blood Group</a>
 <select  name="grp" > 
<option value="A">O+</option>
<option value="A+">A+</option>
<option value="B+">B+</option>
<option value="AB+">AB+</option>
<option value="O-">O-</option>
<option value="A-">A-</option>
<option value="B-">B-</option>
<option value="AB-">AB-</option>
</select>
</br></br>
<input type="submit" name="submit" value="Register" />
</form>
<br /><br />
</div>
<?php }
}
}
else
{
   echo "<div class='form'><h3>Login as a hospital first to insert samples</h3><br/>Click here to <a href='hospitallogin.php'>Login</a></div>"; 
} ?>
</body>
</html>
