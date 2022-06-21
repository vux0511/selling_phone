<?php
    setcookie("login_admin", "true", time()-36000, '/');
    header('location: index.php');
?>