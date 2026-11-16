<?php

/**
 * Protected API endpoint. The client sends the token in the header:
 *   Authorization: Bearer <token>
 *
 * Test it: curl -H "Authorization: Bearer YOUR_TOKEN" http://your/path/to/api.php
 */

require_once 'jwt.php';

header('Content-Type: application/json');

$auth  = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
$token = str_starts_with($auth, 'Bearer ') ? substr($auth, 7) : ($_COOKIE['token'] ?? null);
$user  = jwt_read($token);

if (!$user) {
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

echo json_encode(['message' => 'Hello ' . $user['name'], 'user' => $user]);
