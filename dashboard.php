<?php

/**
 * This is a page in your application that is only accessible to logged-in users.
 * No session: the user is whoever the (valid) token says.
 */

require_once 'jwt.php';

$user = jwt_read($_COOKIE['token'] ?? null);

if (!$user) {
    header('Location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome <?= htmlspecialchars($user['name']) ?>!</h1>
    <p>User: <?= htmlspecialchars($user['sub']) ?></p>
    <p>Token expires: <?= date('H:i:s', $user['exp']) ?></p>
    <a href="logout.php">Close session</a>
</body>
</html>
