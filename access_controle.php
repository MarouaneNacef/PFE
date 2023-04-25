<?php
    if(!isset($_SESSION["mat"]))
    {
        header("Location:/logout");
        die;
    }
?>