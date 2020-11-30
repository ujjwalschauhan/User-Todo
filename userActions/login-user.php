<?php require_once "sessionStart.php";

$errors=[];

if(isset($_POST['login'])){
$email = mysqli_real_escape_string($con, $_POST['email']); 
$password = mysqli_real_escape_string($con, $_POST['password']);
$check_email = "SELECT * FROM users WHERE email = '$email'";
$res = mysqli_query($con, $check_email);
if(mysqli_num_rows($res) > 0){
    $fetch = mysqli_fetch_assoc($res);
    $fetch_pass = $fetch['password'];
    $fetch_name = $fetch['name'];
    
    if(password_verify($password, $fetch_pass)){
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['name'] = $fetch_name;
        $status = $fetch['status'];
        if($status === 'verified'){
            $_SESSION['email'] = $email;
            header('location: home.php');
        }else{
            $info = "It's look like you haven't still verify your email - $email";
            $_SESSION['info'] = $info;
            header('location: user-otp.php');
        }
    }else{
        $errors['email'] = "Incorrect email or password!";
    }
}else{
    $errors['email'] = "Please sign up to proceed further!";
}
}    
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include('../navbarLogin.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="login-user.php" method="POST" autocomplete="">
                    <h2 class="text-center">Login Form</h2>
                    <p class="text-center">Please enter valid credentials</p>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="link forget-pass text-left">
                      <a href="forgot-password.php">Forgot password?</a> 
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="Login">
                    </div>
                    <div class="link login-link text-center">Haven't yet registered? 
                        <a href="signup-user.php">Register now</a> 
                  </div>
                </form>
            </div>
        </div>
    </div>      
</body>
</html>