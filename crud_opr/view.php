<?php 
include('config.php');
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
<!DOCTYPE html> 
<html> 
<style> 
	td,th { 
		border: 1px solid blue; 
		padding: 10px; 
		margin: 5px; 
		text-align: center; 
	} 
</style> 
<body> 
<center>
	<table> 
		<thead> 
			<tr> 
            <th>Id</th> 
				<th>Roll Number</th>
				<th>Staff Name</th> 
				<th>Staff Department</th> 
				<th>Staff Email</th>
                <th>Staff Phone Number</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr> 
		</thead> 
		<tbody> 
			<?php 
			if(!empty($row)) 
			foreach($row as $rows) 
			{ 
			?> 
			<tr> 
                <td><?php echo $rows['id']; ?></td> 
				<td><?php echo $rows['rollno']; ?></td>
				<td><?php echo $rows['staffname']; ?></td> 
				<td><?php echo $rows['staffdept']; ?></td> 
				<td><?php echo $rows['staffemail']; ?></td>
                <td><?php echo $rows['staffphno']; ?></td>
				<td><a href="edit.php?staff_id=<?php echo $rows['id']; ?>">Edit</a></td>
				<td><a href="delete.php?id=<?php echo $rows['id']; ?>">Delete</a></td>
			</tr> 
			</tr> 
			<?php 
		} ?> 
		</tbody> 
	</table> 
    </center>
</body> 
</html> 
<?php 
	mysqli_close($conn); 
?>
