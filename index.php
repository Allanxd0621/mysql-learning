<?php 
$cann = mysqli_connect('localhost' , 'root' , '' ,'loginpracticedb');
$error = '';
$no = false;

if(!$cann){
    die("Connection Failed");
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

if(empty($_POST['username']) || empty($_POST['password'])){

    $error = 'Username or Password cannot be empty.'; 
    $no = true;

}if(!$no){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username , password) VALUES ('$username' , '$password')";

    mysqli_query($cann , $sql);

    header("Location: login.php");
    exit();
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 , user-scalable = no">
    <title>Create Account</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    
<div class="body">

    <form  method="post">
        <h1>Create Account</h1> <br>
        <input type="text" name="username" placeholder="Enter Username" id="username" maxlength="50">
        <br>
        <input type="password" name="password" placeholder="Choose Password" id="password" maxlength="20">
        <br>
        <p><?php echo $error; ?></p>
        <button type="submit">Create Account</button>
    </form>

    </div>
</body>
</html>