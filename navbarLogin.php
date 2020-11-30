<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
     <title><?php echo $name; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
    
    nav{
        padding-left: 100px!important;
        padding-right: 100px!important;
        background: #65328c;
        font-family: 'Poppins', sans-serif;
    } 
    nav a.navbar-brand{
        color: #fff;
        font-size: 30px!important;
        font-weight: 500;
    }
    button a{
        color: #6665ee;
        font-weight: 500;
    }
    button a:hover{
        text-decoration: none;
    }
    h3{
        position: absolute;
        top: 60%;
        left: 50%;
        width: 100%;
        text-align: center;
        transform: translate(-50%, -50%);
        font-size: 40px;
        font-weight: 400;
        
    }

    h2{
        position: absolute;
        top: 5%;
        left: 50%;
        width: 100%;
        text-align: center;
        transform: translate(-50%, -50%);
        font-size: 20px;
        font-weight: 800;
    }
    a{
        color: purple;
    }
    
    </style>
</head>
<body>
<nav class="navbar">
    <a class="navbar-brand" href="../index.php"><img src="logo.png" alt="" width=60px></a>

    <button type="submit" class="btn btn-light">
        <a href="signup-user.php">Register</a> 
    </button>
    </nav>