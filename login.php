<?php
// Mark Iya 219600000
//COSC4806 Assignment 2
require_once('user.php');
session_start();

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User();
    if ($user->authenticate($username, $password)) {
        $_SESSION['authenticated'] = true;
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    } else {
        $message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - COSC4806 Assignment 2</title>
</head>
<body>

<h1>Login</h1>

<form method="post">
  Username: <input type="text" name="username" required><br><br>
  Password: <input type="password" name="password" required><br><br>
  <button type="submit">Login</button>
</form>

<p><?php echo $message; ?></p>

</body>
</html>
