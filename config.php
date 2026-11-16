<?php

/**
 * 1.- Generate a long random secret, e.g.: php -r "echo bin2hex(random_bytes(32));"
 * 2.- Paste it in JWT_SECRET (never commit the real one)
 * 3.- Choose how long the token lives (seconds)
 * 4.- Replace the demo user with your own users table / check
 *
 * @author: Tizedit 2026
 *
 */
define('JWT_SECRET', 'CHANGE_ME_WITH_A_LONG_RANDOM_SECRET_OF_32_BYTES_OR_MORE');
define('JWT_TTL', 3600);

// Demo user (use your database and password_hash()/password_verify() in real life)
define('DEMO_USER', 'admin');
define('DEMO_PASS', '1234');
