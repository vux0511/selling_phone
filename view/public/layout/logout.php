<?php
    setcookie("login", "true", time()-36000, '/');
    header('location: index.php?controller=login');
?>