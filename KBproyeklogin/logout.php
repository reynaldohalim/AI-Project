<?php
    require_once "ConnectProject.php";
    session_destroy();
    header("location: index.php");
?>