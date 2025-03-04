<?php include "config.php"; 
if (isset($_GET['id'])) {    
    $user_id = $_GET['id'];  
    echo $sql = "DELETE FROM `staffdet` WHERE `id`= ".$_GET['id']." ";     
    $result = $conn->query($sql);   
    if ($result == TRUE){
        echo "Record deleted successfully.";
        }
    else{        
        echo "Error:" . $sql . "<br>" . $conn->error; 
      }
} 
      ?>