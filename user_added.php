<html>
<head>
<title>Add user</title>
</head>
<body>
<?php 
if(isset($_POST['submit'])){
	$data_missing = array();
	if(empty($_POST['first_name'])){
		$data_missing[] = 'First Name';
	} else {
		$f_name = trim($_POST['first_name']);
	}

	if(empty($_POST['last_name'])){
		$data_missing[] = 'Last Name';
	} else {
		$l_name = trim($_POST['last_name']);
	}

	if(empty($_POST['email'])){
		$data_missing[] = 'Mail';
	} else {
		$email = trim($_POST['email']);
	}

	if(empty($_POST['city'])){
		$data_missing[] = 'City';
	} else {
		$city = trim($_POST['city']);
	}

	if(empty($_POST['phone'])){
		$data_missing[] = 'Phone';
	} else {
		$phone = trim($_POST['phone']);
	}
	
	if(empty($data_missing)){
		require_once('mysqli_connection.php');

		$query = "INSERT INTO user (first_name, last_name,
		email, city, phone) VALUES (?, ?, ?, ?, ?)";
		$stmt = mysqli_prepare($dbc, $query);
		mysqli_stmt_bind_param($stmt, "sssss", $f_name, $l_name, $email,
		$city, $phone);
		mysqli_stmt_execute($stmt);
		$affected_rows = mysqli_stmt_affected_rows($stmt);
		if($affected_rows == 1){
			echo 'Student Enterd';
			mysqli_stmt_close($stmt);
			mysqli_close($dbc);
		} else {
			echo 'Error Occurred<br/>';
			echo mysqli_error();
		}
	} else {
		echo 'You need to enter the following data<br/>';
		foreach($data_missing as $missing){
			echo "$missing <br/>";
		}		
	}
}
?>
<form action="http://localhost/fileUpload/user_added.php" method="post">
	<b>Add a new user</b>
	<p>First Name:
		<input type="text" name="first_name" size="30" value=""/>
	</p>
	<p>Last Name:
		<input type="text" name="last_name" size="30" value=""/>
	</p>
	<p>Email:
		<input type="text" name="email" size="30" value=""/>
	</p>
	<p>City:
		<input type="text" name="city" size="30" value=""/>
	</p>
	<p>Phone:
		<input type="text" name="phone" size="30" value=""/>
	</p>

	<p>
		<input type="submit" name="submit" value="Send"/>
	</p>
	<p>
		<input type="button" onclick="location.href='http://localhost/fileUpload/select_user.php'" value="List"/>
	</p>
</form>
</body>
</html>
