<?php
    if(!isset($_SESSION["prv"])||$_SESSION["prv"]!=2)
    {
        header("Location:/logout");
        die;
    }
?>