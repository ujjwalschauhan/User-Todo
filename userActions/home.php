<?php 
require_once "sessionStart.php"; 

$email = $_SESSION['email'];
$password = $_SESSION['password'];
$name  =$_SESSION['name'];

if($email != false && $password != false){
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        $name = $fetch_info['name'];        
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
include('../navbarHome.php') 
 ?>
    <h2>Welcome <?php echo $fetch_info['name']."!" ?></h2>
    <h3>
        <li class="list-group-item"><a href="/todomain/user-image-upload-ajax/index.php">Update Profile</a></li>
        <li class="list-group-item"><a href="/todomain/user-todo/index.php">See Todos</a></li>
    </h3>
</body>
</html>
