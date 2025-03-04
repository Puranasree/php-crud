<?php
  session_start();
  include "config.php";
  
  $sql="DELETE FROM users_data WHERE UID='{$_GET["id"]}'";
  if($con->query($sql)){
    flash('msg','User Deleted Successfully');
    header("location:index.php");
  }else{
    flash('msg','User Deleted Failed','red');
    header("location:index.php");
  }
?>