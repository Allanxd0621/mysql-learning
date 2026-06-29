<?php 
session_start();


$cann = mysqli_connect("localhost" , "root" , "" , "practice_DB");
// to connect the db in mysql we type the host name folder and the sql name 

if(!$cann){
    die("Connection failed"); // if we cant connect to the database this shit will appear
}






$empty = '';


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(empty($_POST['username']) || empty($_POST['password'])){
        $empty = 'Error empty on either password or username';
    }else{

        $username = $_POST['username'];
        $password = $_POST['password']; 

        
//store the inputs inside these variables 

    $sql = "INSERT INTO users (username, password) 
        VALUES ('$username' , '$password')"; 
    //this code inserts the values (which are in the variables) to the table named users and the elements username and password ill call it element chat

    mysqli_query($cann, $sql); //what ever this 

        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];


        header('location: login.php');
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
<!-- first i wanna learn how to put datas inside the table using sessions -->

<form method="POST">
    <input type="text" placeholder="username" name="username">
    <br>
    <input type="password" placeholder="password" name="password">
    <br>
    <button type="submit">Submit</button>
    <p><?php echo $empty; ?></p>
</form>

<!--say we have this form simple just ask for pass and username -->


</body>
</html>