<?php

/**
 * Two functions: create a token and read a token. That's all JWT is.
 */

require_once 'vendor/autoload.php';
require_once 'config.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function jwt_create(array $data): string
{
    $now = time();
    $payload = ['iat' => $now, 'exp' => $now + JWT_TTL] + $data;
    return JWT::encode($payload, JWT_SECRET, 'HS256');
}

// Returns the payload as an array, or null if the token is invalid or expired
function jwt_read(?string $token): ?array
{
    if (!$token) return null;
    try {
        return (array) JWT::decode($token, new Key(JWT_SECRET, 'HS256'));
    } catch (Exception $e) {
        return null;
    }
}
