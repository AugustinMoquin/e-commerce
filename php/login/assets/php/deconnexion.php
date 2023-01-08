<?php
setcookie("username", "", time() - 3600, "/", "", 0);
setcookie("password", "", time() - 3600, "/", "", 0);
setcookie("id", "", time() - 3600, "/", "", 0);
header("Location: /e-commerce/php/");
?>