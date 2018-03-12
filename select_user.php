<html>
<head>
<title>List user</title>
</head>
<body>
<input type="button" onclick="location.href='http://localhost/fileUpload/user_added.php'" value="Add user"/>
<?php
	require_once('mysqli_connection.php');
	$query = "SELECT * FROM user";
	$response = @mysqli_query($dbc, $query);
	if ($response) {
		echo '<table align="left" cellspacing="5" cellpadding="10">
		<tr>
		<td align="left"><b>#</b></td>		
		<td align="left"><b>First Name</b></td>
		<td align="left"><b>Last Name</b></td>
		<td align="left"><b>Email</b></td>
		<td align="left"><b>City</b></td>
		<td align="left"><b>Phone</b></td></tr>';
		while ($row = mysqli_fetch_array($response)){
			echo '<tr><td align="left"><a href="#">'.
			$row['user_id'].'</a></td><td align="left">'.
			$row['first_name'].'</td><td align="left">'.
			$row['last_name'].'</td><td align="left">'.
			$row['email'].'</td><td align="left">'.
			$row['city'].'</td><td align="left">'.
			$row['phone'].'</td></tr>';	
		}

		echo '</table>';
	}
?>
</body>
</html>
