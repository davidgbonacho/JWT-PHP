# JWT with PHP
A fast and simple way to protect pages and APIs with JSON Web Tokens (JWT) in your PHP application. No sessions: the token *is* the login.

`[SimPIL are a series of ultra-simple examples of how to perform different operations with code. Uncomplicated.]`

## Install
1. Put a long random secret in config.php (`php -r "echo bin2hex(random_bytes(32));"`)
2. composer install (to install dependencies)
3. Open login.php (demo user: `admin` / `1234`)
4. Use each .php script as you want in your project

## Implement
```php
require_once 'jwt.php';

$token = jwt_create(['sub' => 'admin']);   // after a valid login
$user  = jwt_read($token);                 // array, or null if invalid/expired
```

## Files
- config.php (with JWT_SECRET, token lifetime and a demo user)
- jwt.php (only two functions: jwt_create and jwt_read)
- login.php (checks credentials, creates the token and saves it in a cookie)
- dashboard.php (is your only accessible to logged-in users page)
- api.php (protected JSON endpoint using `Authorization: Bearer <token>`)
- logout.php (deletes the cookie)
- img/logo: only important images are here


> [!NOTE]
[Versión en español aquí](README_ES.MD)

![](img/logo.svg)
---
`título:` PHP JWT [`SimPIL`] 11/16/26\
`autor:` David G. Bonacho &nbsp;&nbsp;  [www.tizedit.com](https://www.tizedit.com)
