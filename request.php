<?php
include("auth.php");
if(isset($_SESSION['email']))
{
    if($_SESSION['type']==2)
        echo "<div class='form'><h3>Login as a reciever first to request samples</h3><br/>Click here to <a href='recieverlogin.php'>Login</a></div>";
    else
    {
    ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
    require('db.php');
        $id = $_GET['id'];
        $hid=$_GET['hid'];
        $email = $_SESSION['email'];
        $query="SELECT * from request where requestor like '$email' and sampleid like '$id'";
        $result = mysqli_query($con,$query);
        //echo(mysqli_error($con));
        //echo($result);
        $rows = mysqli_num_rows($result);
        if($rows==1)
        {
                 echo "<div class='form'><h3>Sample already requested by you.</h3><br/>Click here to <a href='index.php'>go to homepage</a></div>";
        }
        else
        {  
        $query="SELECT email from hospital where id like '$hid'";
        $result = mysqli_query($con,$query);
        echo(mysqli_error($con));
        $rows=mysqli_fetch_assoc($result);
        $email2=$rows['email'];

        $query1="SELECT grp from reciever where email like '$email'";
        $result1 = mysqli_query($con,$query1);
        echo(mysqli_error($con));
        $rows1=mysqli_fetch_assoc($result1);
        $grp=$rows1['grp'];

        $query2="SELECT * from samples where id like '$id'";
        $result2 = mysqli_query($con,$query2);
        echo(mysqli_error($con));
        $rows2=mysqli_fetch_assoc($result2);
        $grp2=$rows2['type'];
        $name=$rows2['samplename'];

        if($grp2==$grp)
        {
        $query = "INSERT into `request` (requestor,sampleid,hospitalemail, samplename) VALUES ('$email', '$id','$email2','$name')";
        $result = mysqli_query($con,$query);
        
        if($result){
            echo "<div class='form'><h3>You Request has been send.</h3><br/>Click here to <a href='index.php'>go to homepage</a></div>";
          }
          else
            echo(mysqli_error($con));
        }
        else
        {
              echo "<div class='form'><h3>You can not request this sample as blood type do not match.</h3><br/>Click here to <a href='index.php'>go to homepage</a></div>";
          
        }
    }

 }
}
else
{
    echo "<div class='form'><h3>Login to request.</h3><br/>Click here to <a href='recieverlogin.php'>login</a></div>";
          
} ?>
</body>
</html>
