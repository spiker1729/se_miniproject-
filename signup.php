<?php
include "configdb.php";
if (isset($_POST['submit'])) {

$password = $_POST['password'];
$name= $_POST['name'];
$age = $_POST['age'];
$address= $_POST['address'];
$aadhar_no = $_POST['aadhar_no'];
$phone_no= $_POST['phone_no'];
$user_type= 'user';
$user_id = $_POST['user_id'];
$sql = "INSERT INTO user_details (password,name,age,address,aadhar_no,phone_number,user_type,user_id)
VALUES('$password','$name',$age,'$address',$aadhar_no,$phone_no,'$user_type','$user_id')";

$result = $conn->query($sql);
if ($result == TRUE) {
	echo '<script>alert("Acount created successfully")</script>';
header("Location: http://localhost/dbms_miniproject_EMS/login.php");



	//echo "New record created successfully.";
}else{echo "Error:". $sql . "<br>". $conn->error;
}
$conn->close();
}
?>
<!DOCTYPE html>
<html>
	
<body>
	<center>
<h2>Sign - up</h2>
<p id="demo">hello</p>
<form action="" method="POST">
<fieldset>
<legend>Information:</legend>
 	user_id:<br>
<input type="text" name="user_id" required>
<br>
password:<br>
<input type="password" name="password" required>
<br>
name:<br>
<input type="text" name="name" required>
<br>
age:<br>
<input type="text" name="age" required>
<br>
<br>
address:<br>
<input type="text" name="address" required>
<br>
aadhar number<br>
<input type="text" name="aadhar_no" required>
<br>
phone number:<br>
<input type="text" name="phone_no" required>
<br>
user type:<br>
<input type="text" name="user_type" value="user"disabled required>
<br>
<br>
<input type="submit" name="submit" value="submit" >

</fieldset>
</form>
</center>
</body>
</html>