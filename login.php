<?php
session_start();

// connect PHP to MySQL
$cann = mysqli_connect("localhost", "root", "", "practice_DB");

if (!$cann) {
    die("Connection Failed");
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // check if inputs are empty
    if (empty($_POST['logUser']) || empty($_POST['logPass'])) {

        $error = "Please fill in the blanks";

    } else {

        // store input values into variables
        $username = $_POST['logUser'];
        $password = $_POST['logPass'];

        // SQL query:
        // find row in users table where username matches input
        $sql = "SELECT * FROM users WHERE username = '$username'";

        // send SQL query to MySQL
        $result = mysqli_query($cann, $sql);

        // fetch one row from result
        $row = mysqli_fetch_assoc($result);


        // check if user exists AND password matches
        if ($row && $password == $row['password']) {

            // save logged-in user in session
            $_SESSION['username'] = $row['username'];

            // redirect to home page
            header("Location: home.php");
            exit();

        } else {
            $error = "Wrong username or password";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<form method="POST">
    <h1>Log In</h1>

    <input type="text" placeholder="type username" name="logUser">
    <br>

    <input type="password" placeholder="type password" name="logPass">
    <br>

    <button type="submit">Log In</button>

    <p><?php echo $error; ?></p>
</form>

</body>
</html> 