<?php

session_Start();
$_SESSION =[];
session_unset();
session_destroy();

setcookie('id_user', '', time() - 3600);
setcookie('key', '', time() - 3600);

header("location: login.php");
exit;

?>