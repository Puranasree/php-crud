<?php 
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "sample"; 
$conn = new mysqli($servername,$username,$password,$dbname); 
	if ($conn -> connect_errno) 
	{ 
	echo "Failed to connect with MySQL: " . $conn -> connect_error; 
	exit(); 
	} 
	$sql = "select * from staffdet"; 
	$result = ($conn->query($sql)); 
	$row = []; 
	if ($result->num_rows > 0) 
	{ 
		$row = $result->fetch_all(MYSQLI_ASSOC); 
	} 
?> 