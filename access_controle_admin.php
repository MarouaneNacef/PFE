<?php
    if(!isset($_SESSION["prv"])||$_SESSION["prv"]!=1)
    {
        header("Location:/logout");
        die;
    }
?>