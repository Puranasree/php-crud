<?php 
  #Connect Database
  $con=mysqli_connect("localhost","root","","db_sample");
  if(!$con){
    die("Connection Failed ".$con->connect_erro);
  }
  
  #flash message
  function flash($name='',$msg='',$cate='green'){
    if(!empty($name)){
      if(!empty($msg)&&empty($_SESSION[$name])){
        $_SESSION[$name]=$name;
        $_SESSION[$name."_msg"]=$msg;
        $_SESSION[$name."_cate"]=$cate;
      }
      else if(empty($msg)&&!empty($_SESSION[$name])){
        echo "<div class='alert-{$_SESSION[$name."_cate"]}'>{$_SESSION[$name."_msg"]}</div>";
        unset($_SESSION[$name]);
        unset($_SESSION[$name."_msg"]);
        unset($_SESSION[$name."_cate"]);
      }
    }
  }
?>