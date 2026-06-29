<?php 

    $cann = mysqli_connect('localhost' , 'root' , '' , 'practice_DB');

    if(!$cann){
        die("Connection Failed");
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username = '$username'";

        $result = mysqli_query($cann , $sql);

        $row = mysqli_fetch_assoc($result);

    if($row && $password == $row['password']){
        
        //saved the log in
        $_SESSION['username'] = $row['username'];

        header("location: home.php");
        exit();
    }

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
        <input type="text" name="username" placeholder="enter username">
        <br>
        <input type="password" name="password" placeholder="enter password">
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>