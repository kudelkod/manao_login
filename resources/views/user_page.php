<?php
session_start();
if ($_SESSION['login'] === $_COOKIE['login']){
    echo $_SESSION['user_name'];
}
?>

<a href="../../index.php?log_out">Log out</a>

