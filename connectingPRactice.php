<?php
$cann = mysqli_connect('localhost' , 'root' , '' , 'practice_DB');

if(!$cann){
    die("Connection Failed");
}

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users(username, password) VALUES('$username' , '$password')";

    mysqli_query($cann , $sql);

    header("location: selectingPractice.php");
    exit();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form  method="post">
        <input type="text" name="username" placeholder="enter name">
        <br>
        <input type="password" placeholder="create password" name="password">
        <br>
        <button type="submit">Create Account</button>
    </form>
</body>
</html>