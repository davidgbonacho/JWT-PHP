<?php

// A JWT can't be "destroyed" on the server: just delete the cookie
setcookie('token', '', time() - 3600);
header('Location: login.php');
