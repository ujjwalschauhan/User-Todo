<?php $conn = mysqli_connect('localhost', 'root', '', 'todo'); 
      if(!$conn){
          die('Connection Error: '.mysqli_connect_error());
      }else{
          //echo "connection running successfully!";       
      }
?>
