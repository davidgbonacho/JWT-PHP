# JWT con PHP
Una forma rápida y sencilla de proteger páginas y APIs con JSON Web Tokens (JWT) en tu aplicación PHP. Sin sesiones: el token *es* el login.

`[SimPIL es una serie de ejemplos ultra-simples de cómo realizar diferentes operaciones con código. Sin complicaciones.]`

## Instalación
1. Pon un secreto largo y aleatorio en config.php (`php -r "echo bin2hex(random_bytes(32));"`)
2. composer install (para instalar dependencias)
3. Abre login.php (usuario demo: `admin` / `1234`)
4. Usa cada script .php como desees en tu proyecto

## Implementación
```php
require_once 'jwt.php';

$token = jwt_create(['sub' => 'admin']);   // tras un login correcto
$user  = jwt_read($token);                 // array, o null si es inválido/caducado
```

## Archivos
- config.php (con JWT_SECRET, duración del token y un usuario demo)
- jwt.php (solo dos funciones: jwt_create y jwt_read)
- login.php (comprueba credenciales, crea el token y lo guarda en una cookie)
- dashboard.php (es tu página accesible solo para usuarios registrados)
- api.php (endpoint JSON protegido con `Authorization: Bearer <token>`)
- logout.php (borra la cookie)
- img/logo: solo las imágenes importantes están aquí


> [!NOTE]
[Versión en inglés aquí](README.MD)

![](img/logo.svg)
---
`título:` PHP JWT [`SimPIL`] 16/11/26\
`autor:` David G. Bonacho &nbsp;&nbsp;  [www.tizedit.com](https://www.tizedit.com)
