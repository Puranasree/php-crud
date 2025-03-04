<?php
include('config.php');

if ($conn->connect_errno) {
    echo "Failed to connect with MySQL: " . $conn->connect_error;
    exit();
}
if (isset($_GET['staff_id'])) {
    $id = $_GET['staff_id'];
    $sql = "SELECT * FROM staffdet WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc(); 
        $rollno = $row['rollno'];
        $staffname = $row['staffname'];
        $staffdept = $row['staffdept'];
        $staffemail = $row['staffemail'];
        $staffphno = $row['staffphno'];
    } else {
        echo "Staff not found.";
        exit(); 
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       /*  $new_rollno= $_POST['rollno']; */
        $new_staffname = $_POST['staffname'];
        $new_staffdept = $_POST['staffdept'];
        $new_staffemail = $_POST['staffemail'];
        $new_staffphno = $_POST['staffphno'];

        $update_sql = "UPDATE staffdet SET 
                       /* rollno = '$new_rollno', */
                        staffname = '$new_staffname', 
                        staffdept = '$new_staffdept', 
                        staffemail = '$new_staffemail',
                        staffphno = '$new_staffphno'
                        WHERE id = $id";

        if ($conn->query($update_sql)) {
            header("Location: view.php"); 
            exit(); 
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
} else {
    echo "Staff ID not provided.";
    exit();
}
?>
<html>
<head>
    <title>Edit Staff Details</title>
</head>
<body>
    <center>
        <h1>Edit Staff Details</h1>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">  
            Roll Number: <input type="text" name="rollno" value="<?php echo $rollno; ?>" required>
            <br><br>
            Staff Name: <input type="text" name="staffname" value="<?php echo $staffname; ?>" required>
            <br><br>
            Staff Department: <input type="text" name="staffdept" value="<?php echo $staffdept; ?>" required>
            <br><br>
            Staff Email: <input type="email" name="staffemail" value="<?php echo $staffemail; ?>" required>
            <br><br>
            Staff Phone Number: <input type="text" name="staffphno" value="<?php echo $staffphno; ?>" required>
            <br><br>
            <input type="submit" value="Update">
        </form>
    </center>
</body>
</html>
<?php
mysqli_close($conn);
?>