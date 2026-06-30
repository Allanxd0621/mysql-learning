<?php 
session_start();

$cann = mysqli_connect('localhost' , 'root' ,'' ,'loginpracticedb');
$error = '';
$no = false; 

if(!$cann){
    die("Connection Failed");
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(empty($_POST['username']) || empty($_POST['password'])){

        $no = true;
        $error = 'Wrong password or Username';

    }

    if(!$no){

    $username = $_POST['username'];
    $_SESSION['username'] = $username;
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' ";

    $result = mysqli_query($cann , $sql);

    $row = mysqli_fetch_assoc($result);
    //we get the row of username in our table arun atong ma compare sa ge input sa user sa post form nato

    if($row && $password == $row['password']){
        //if ang row and password kay nag match sa username sa row 

        $_SESSION['username'] = $row['username']; // save ang username 

        header("Location: home.php");
        exit();
    }


    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in </title>
</head>
<body>
<div class="body">
    
    <form  method="post">
        <h1>Log In</h1>
        <input type="text" placeholder="Enter your username" name="username">
        <br>
        <input type="password" placeholder="Enter your password" name="password">
        <br>
        <button type="submit">Log In</button>
        <p><?php echo $error; ?></p>
        <a href="index.php">Create Account</a>
    </form>

</div>
</body>
</html>
