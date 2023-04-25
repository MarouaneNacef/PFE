<?php
    if(isset($_SESSION["msg"]))
    {
        echo '<script>alert("'.$_SESSION['msg'].'");</script>';
        unset($_SESSION['msg']);
    }
?>