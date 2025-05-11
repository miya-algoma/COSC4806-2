<?php
// Mark Iya 219600000
require_once('user.php');

$user = new User();
$user_list = $user->get_all_users();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Registered Users - COSC4806 Assignment 2</title>
</head>
<body>

<h1>Registered Users</h1>
<p>Student: Mark Iya (219600000)</p>

<?php if (empty($user_list)) : ?>
    <p>No users found in the database.</p>
<?php else : ?>
    <table border="1" cellpadding="5">
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
