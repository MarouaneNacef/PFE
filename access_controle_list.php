<?php
if(!isset($_SESSION["mat"])||($_SESSION["prv"]!=1&&$_SESSION["prv"]!=2))
    {
        header("Location:/logout");
        die;
    }
?>