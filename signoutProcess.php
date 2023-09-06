<?php


session_start();

if (isset($_SESSION["ud"])) {
    
    $_SESSION["ud"] = null;
    session_destroy();

    echo("success");

}


?>