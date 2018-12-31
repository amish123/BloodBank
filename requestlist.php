<?php
require('db.php');
include("auth.php"); //include auth.php file on all secure pages 
if(isset($_SESSION['email']))
{
	if($_SESSION['type']==2)
	{
	?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>List of Request for <?php echo($_SESSION['email'])?></title>
<link rel="stylesheet" href="css/style.css?2.2" />
</head>
<body>
 <input type="button" value="Go to Homepage" onclick="window.location.href='index.php'"></input><br /><br /><br /> 
 
 <?php
 $email=$_SESSION['email'];
 $selectSQL = "SELECT * FROM request where hospitalemail like '$email'";

  if( !( $selectRes = mysqli_query( $con,$selectSQL ) ) ){
    echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
  }else{
    ?>
<table border="2">
  <thead>
    <tr>
      <th>Requestor</th>
      <th>Sample Id</th>
      <th>Sample name</th>
      </tr>
  </thead>
  <tbody>
    <?php
      if( mysqli_num_rows( $selectRes )==0 ){
        echo '<tr><td colspan="4">No Rows Returned</td></tr>';
      }else{
        while( $row = mysqli_fetch_assoc( $selectRes ) ){
          echo "<tr><td>{$row['requestor']}</td><td>{$row['sampleid']}</td><td>{$row['samplename']}</td></tr>\n";
        }
      }
    ?>
  </tbody>
</table>
</body>
</html>


	<?php
}
}
else
{
   echo "<div class='form'><h3>Login to see list.</h3><br/>Click here to <a href='hospitallogin.php'>login</a></div>";    
}
}
else
{
    echo "<div class='form'><h3>Login to see list.</h3><br/>Click here to <a href='hospitallogin.php'>login</a></div>";
    
}
?>