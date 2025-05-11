<?php
// Mark Iya 219600000
require_once('user.php');

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password1 = $_POST['password'];
    $password2 = $_POST['confirm_password'];

    $user = new User();

    if ($password1 !== $password2) {
        $message = " Passwords do not match.";
    } elseif (strlen($password1) < 10) {
        $message = " Password must be at least 10 characters.";
    } elseif ($user->userExists($username)) {
        $message = " Username already exists.";
    } else {
        $user->create_user($username, $password1);
        $message = " Account created. You can now <a href='login.php'>log in</a>.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register - COSC4806 Assignment 2</title>
</head>
<body>

<h1>Create an Account</h1>

<form method="post">
  Username: <input type="text" name="username" required><br><br>
  Password: <input type="password" name="password" required><br><br>
  Confirm Password: <input type="password" name="confirm_password" required><br><br>
  <button type="submit">Register</button>
</form>

<p><?php echo $message; ?></p>

</body>
</html>
