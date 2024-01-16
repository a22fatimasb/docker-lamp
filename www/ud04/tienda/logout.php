<?php
    session_start();
    session_destroy();
    $_SESSION = array();
    setcookie('usuario', 123, time()-1000);
    header("Location: index.php");
?>