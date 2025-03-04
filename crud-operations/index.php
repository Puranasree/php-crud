<?php
  session_start();
  include "config.php";

  #Check if form submitted
  if($_SERVER["REQUEST_METHOD"]=='POST'){
    $name=mysqli_real_escape_string($con,$_POST["frm_name"]);
    $email=mysqli_real_escape_string($con,$_POST["frm_email"]);
    $contact=mysqli_real_escape_string($con,$_POST["frm_contact"]);
    $sql="INSERT INTO users_data (NAME,EMAIL,CONTACT) VALUES ('{$name}','{$email}','{$contact}')";
    if($con->query($sql)){
      #set flash message
      flash('msg','User Added Successfully');
    }else{
      #set flash message
      flash('msg','User Added Failed','red');
    }
  }

  #select all records from the table
  $data=[];
  $sql="select * from users_data";
  $res=$con->query($sql);
  if($res->num_rows>0){
    while($row=$res->fetch_assoc()){
      $data[]=$row;
    }
  }
?>
<html>
  <head>
    <title>PHP - MySQL CRUD </title>
    <link rel='stylesheet' href='style.css'>
  </head>
  <body>
    <div class='container'>
      <?php 
        #print flash message
        flash('msg'); 
      ?>
      <form method='post' action='<?php echo $_SERVER["PHP_SELF"]; ?>' class='frm'>
        <h1>PHP - MySQL CRUD</h1><hr>
        <div class='group'>
          <label>Name : </label>
          <input type='text' name='frm_name' required>
        </div>
        <div class='group'>
          <label>Email : </label>
          <input type='email' name='frm_email' required>
        </div>
        <div class='group'>
          <label>Contact : </label>
          <input type='text' name='frm_contact' required>
        </div>
        <div class='group'>
          <input type='submit' name='submit' class='btn-green' value='Save Details'>
        </div>
      </form>
      <?php if(count($data)>0){ ?>
          <table>
            <thead>
              <tr>
                <th>SNo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $i=0; 
                foreach($data as $row){ 
                $i++;
              ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row["NAME"]; ?></td>
                <td><?php echo $row["EMAIL"]; ?></td>
                <td><?php echo $row["CONTACT"]; ?></td>
                <td><a href='edit.php?id=<?php echo $row["UID"]; ?>' class='btn-blue'>Edit</a></td>
                <td><a href='delete.php?id=<?php echo $row["UID"]; ?>' onclick='return confirm("Are You Sure?")'  class='btn-red'>Delete</a></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
      <?php }else{ ?>
        <div class='alert-red'>No Records</div>
      <?php }?>
    </div>
  </body>
</html>