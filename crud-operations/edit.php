<?php
  session_start();
  include "config.php";
  
  #Check if form submitted
  $message="";
  if($_SERVER["REQUEST_METHOD"]=='POST'){
    $name=mysqli_real_escape_string($con,$_POST["frm_name"]);
    $email=mysqli_real_escape_string($con,$_POST["frm_email"]);
    $contact=mysqli_real_escape_string($con,$_POST["frm_contact"]);
    $sql="UPDATE users_data SET NAME='{$name}',EMAIL='{$email}',CONTACT='{$contact}' WHERE UID='{$_GET["id"]}'";
    if($con->query($sql)){
      flash('msg','User Updated Successfully');
    }else{
      flash('msg','User Updated Failed','red');
    }
  }
  
  #Select user details from the table
  $sql="select * from users_data where UID='{$_GET["id"]}'";
  $res=$con->query($sql);
  if($res->num_rows>0){
    $row=$res->fetch_assoc();
?>
<html>
  <head>
    <title>PHP - MySQL CRUD </title>
    <link rel='stylesheet' href='style.css'>
  </head>
  <body>
    <div class='container'>
      <?php flash('msg'); ?>
      <form method='post' action='<?php echo $_SERVER["REQUEST_URI"]; ?>' class='frm'>
        <h1>PHP - MySQL CRUD</h1><hr>
        <div class='group'>
          <label>Name : </label>
          <input type='text' name='frm_name' required value="<?php echo $row["NAME"]; ?>">
        </div>
        <div class='group'>
          <label>Email : </label>
          <input type='email' name='frm_email' required value="<?php echo $row["EMAIL"]; ?>">
        </div>
        <div class='group'>
          <label>Contact : </label>
          <input type='text' name='frm_contact' required value="<?php echo $row["CONTACT"]; ?>">
        </div>
        <div class='group'>
          <input type='submit' name='submit' class='btn-green' value='Update Details'>
        </div>
        <a href='index.php'>Back to Home</a>
      </form>
    </div>
  </body>
</html>
<?php 
  }
?>