<?php
session_start();
session_destroy();
setcookie("user",$userId, 0);
setcookie("email",$email, 0);
header("Location: login.php");
?>