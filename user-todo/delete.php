<?php
 include_once('db.php');
 
  if (isset($_POST['deleteTask'])) {
    $id = $_POST['deleteTask'];
    mysqli_query($conn, "DELETE FROM tasks WHERE id =".$id);
    header('location: index.php?deleted=true');
}
?>