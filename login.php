<?php

/**
 * Login form. If credentials are OK, create a JWT and save it in a cookie.
 */

require_once 'jwt.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (($_POST['user'] ?? '') === DEMO_USER && ($_POST['pass'] ?? '') === DEMO_PASS) {

        $token = jwt_create(['sub' => DEMO_USER, 'name' => 'Admin']);

        // httponly: JavaScript can't read it (XSS protection)
        setcookie('token', $token, [
            'expires'  => time() + JWT_TTL,
            'httponly' => true,
            'samesite' => 'Strict',
            // 'secure' => true, // enable it on HTTPS
        ]);

        header('Location: dashboard.php');
        exit;
    }
    $error = 'Wrong user or password';
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login with JWT</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form method="post" class="jwt-login">
        <input name="user" placeholder="User (admin)" required>
        <input name="pass" type="password" placeholder="Password (1234)" required>
        <button>Sign in</button>
        <p><?= $error ?></p>
    </form>
</body>

</html>
