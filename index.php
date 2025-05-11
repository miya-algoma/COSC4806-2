<?php
// Mark Iya 219600000
require_once('user.php');
session_start();

$user = new User();
$user_list = $user->get_all_users();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registered Users - COSC4806 Assignment 2</title>
    <style>
        table { border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; }
        a { margin-right: 10px; }
    </style>
</head>
<body>

<h1>Registered Users</h1>
<p><strong>Student:</strong> Mark Iya<br>
<strong>Student Number:</strong> 219600000</p>

<?php if (isset($_SESSION['authenticated'])): ?>
    <p> Logged in as <strong><?= htmlspecialchars($_SESSION['username']) ?></strong></p>
    <a href="logout.php">Logout</a>
<?php else: ?>
    <a href="login.php">Login</a>
    <a href="register.php">Create Account</a>
<?php endif; ?>

<br><br>

<?php if (empty($user_list)) : ?>
    <p>No users found in the database.</p>
<?php else : ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password Hash</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($user_list as $user) : ?>
                <tr>
                    <td><?= htmlspecialchars($user['id']) ?></td>
                    <td><?= htmlspecialchars($user['username']) ?></td>
                    <td><?= htmlspecialchars($user['password']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

</body>
</html>
