<?php 
include('config.php');
if (isset($_POST['submit'])) { 
    $rollno = $_POST['rollno'];
    $staffname = $_POST['staffname']; 
    $staffdept = $_POST['staffdept']; 
    $staffemail = $_POST['staffemail']; 
    $staffphno = $_POST['staffphno'];
    $check_sql = "SELECT rollno FROM staffdet WHERE rollno = '$rollno'";
    $result = $conn->query($check_sql);
    if ($result->num_rows > 0) {
        echo "Error: Roll number already exists.";
    } else {
    $insert_sql = "INSERT INTO staffdet (rollno, staffname, staffdept, staffemail, staffphno) 
                   VALUES ('$rollno', '$staffname', '$staffdept', '$staffemail', '$staffphno')";

    if ($conn->query($insert_sql) === TRUE) {
        echo "New record created successfully.";
        header("location:view.php"); 
        exit(); 
    } else {
        echo "Error: " . $insert_sql . "<br>" . $conn->error;
    }
    }
    $conn->close(); 
}
?>
<html>
<body>
    <h2>Signup Form</h2>
    <form action="" method="POST">
        <fieldset>
            <legend>Staff Details</legend>
            Roll Number:<br>
            <input type="text" name="rollno" required>
            <br><br>
            Staff Name:<br>
            <input type="text" name="staffname" required>
            <br><br>
            Staff Department:<br>
            <input type="text" name="staffdept" required>
            <br><br>
            Staff Email:<br>
            <input type="email" name="staffemail" required>
            <br><br>
            Staff Ph.No:<br>
            <input type="text" name="staffphno" required>
            <br><br> 
            <input type="submit" name="submit" value="Submit">
        </fieldset>
    </form>
</body>
</html>