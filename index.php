<?php
require('db.php');
include("auth.php"); //include auth.php file on all secure pages 
if(isset($_SESSION['email']))
{


	//hospital
	if($_SESSION['type']==2)
	{
	?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="css/style.css?2.2" />
</head>
<body>
<div class="form">
<p>Welcome <?php echo $_SESSION['email']; ?>!</p>
<p>This is secure area.</p>

<input type="button" value="Add samples" onclick="window.location.href='addsample.php'"></input><br /><br /><br />

<input type="button" value="See Request List" onclick="window.location.href='requestlist.php'"></input><br /><br /><br />

<a href="logout.php">Logout</a>

<h2>Available Samples</h2>
 <?php 
 $selectSQL = 'SELECT * FROM samples';

  if( !( $selectRes = mysqli_query( $con,$selectSQL ) ) ){
    echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
  }else{
    ?>
<table border="2">
  <thead>
    <tr>
      <th>Sample name</th>
      <th>Hospital Id</th>
      <th>Blood Group</th>
    </tr>
  </thead>
  <tbody>
    <?php
      if( mysqli_num_rows( $selectRes )==0 ){
        echo '<tr><td colspan="4">No Rows Returned</td></tr>';
      }else{
        while( $row = mysqli_fetch_assoc( $selectRes ) ){
          $x=$row['hospitalid'];
          $SQL = "SELECT email FROM hospital where id like '$x'";
          $res=mysqli_query($con,$SQL);
          $row1 = mysqli_fetch_assoc( $res );
          echo "<tr><td>{$row['samplename']}</td><td>{$row1['email']}</td><td>{$row['type']}</td></tr>\n";
        }
      }
    ?>
  </tbody>
</table>

<br /><br /><br /><br />
</div>
</body>
</html>
<?php
}
}

//Reciever
else {
	?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="css/style.css?2.2" />
</head>
<body>
<div class="form">
<p>Welcome <?php echo $_SESSION['email']; ?>!</p>
<p>This is secure area.</p>
<a href="logout.php">Logout</a>
<?php 
 $selectSQL = 'SELECT * FROM samples';

  if( !( $selectRes = mysqli_query( $con,$selectSQL ) ) ){
    echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
  }else{
    ?>
<table border="2">
  <thead>
    <tr>
      <th>Sample name</th>
      <th>Hospital Id</th>
      <th>Blood Group</th>
    </tr>
  </thead>
  <tbody>
    <?php
      if( mysqli_num_rows( $selectRes )==0 ){
        echo '<tr><td colspan="4">No Rows Returned</td></tr>';
      }else{
        while( $row = mysqli_fetch_assoc( $selectRes ) ){
          echo "<tr><td>{$row['samplename']}</td><td>{$row['hospitalid']}</td><td>{$row['type']}</td><td><a href='request.php?id={$row['id']}&hid={$row['hospitalid']}'>Request</a></td></tr>\n";
        }
      }
    ?>
  </tbody>
</table>

<?php	
}
}
}

//index.php

else
{
	?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="css/style.css?2.2" />
</head>
<body>
<div class="form">
<h1>Welcome!</h1>
<input type="button" value="Reciever Login" onclick="window.location.href='recieverlogin.php'"></input><br /><br />
<input type="button" value="Reciever Registration" onclick="window.location.href='recieverregistration.php'"></input><br /><br />

<input type="button" value="Hospital Login" onclick="window.location.href='hospitallogin.php'"></input><br /><br />

<input type="button" value="Hospital Registration" onclick="window.location.href='hospitalregistration.php'"></input><br /><br />
 
 <h2>Available Samples</h2>
 <?php 
 $selectSQL = 'SELECT * FROM samples';

  if( !( $selectRes = mysqli_query( $con,$selectSQL ) ) ){
    echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
  }else{
    ?>
<table border="2">
  <thead>
    <tr>
      <th>Sample name</th>
      <th>Hospital Id</th>
      <th>Blood Group</th>
    </tr>
  </thead>
  <tbody>
    <?php
      if( mysqli_num_rows( $selectRes )==0 ){
        echo '<tr><td colspan="4">No Rows Returned</td></tr>';
      }else{
        while( $row = mysqli_fetch_assoc( $selectRes ) ){
        	$x=$row['hospitalid'];
        	$SQL = "SELECT email FROM hospital where id like '$x'";
        	$res=mysqli_query($con,$SQL);
        	$row1 = mysqli_fetch_assoc( $res );
          echo "<tr><td>{$row['samplename']}</td><td>{$row1['email']}</td><td>{$row['type']}</td></tr>\n";
        }
      }
    ?>
  </tbody>
</table>



	<?php
}
}
?>