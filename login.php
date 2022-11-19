
<?php 
session_start();
include "configdb.php";
if (isset($_POST['submit'])) {

$password = $_POST['password'];
$user_id= $_POST['user_id'];

//$sql =("select user_id from user_details where password='$password'");

//$result = $conn->query($sql);
$sql = "select *from user_details where user_id = '$user_id' and password = '$password'";  

$result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result);  
  
if($count == 1){  
	
		echo "<h1><center> Login successful </center></h1>";  
		$_SESSION['user_type']= $row['user_type'];

		$_SESSION['user_name']= $row['user_id'];
		if($_SESSION['user_type']=='admin'||$_SESSION['user_type']=='ADMIN')
		{
			header("Location: admin__event.php");
		}
		else if($_SESSION['user_type']=='USER'||$_SESSION['user_type']=='user')
		{
			header("Location: user_event.php");
		}
		
	
}  
else{  
	echo "<h1> Login failed. Invalid username or password.</h1>";  
}     

$conn->close();
}

?>
<!DOCTYPE html>
<html>
<body>
	<center>
			<h1>Event Management System </h1>
<h2>LOGIN</h2>
<form action="" method="POST"  autocomplete="off">

 	user_id:<br>
<input type="text" placeholder="enter user_id" name="user_id"  autocomplete="off" required >
<br>
password:<br>
<input type="password" placeholder="enter password" name="password"  autocomplete="off" required >
<br>

<input type="submit" name="submit" value="submit" class="btn btn-link btn-floating mx-1"> 


<br>
<center><a href="signup.php">SIGN - in</a></center>
</form>
</center>
</body>
</html>
