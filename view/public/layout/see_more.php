<?php

    // require_once('../vuxphone/model/DBConfig.php');

    $sotin1trang = 5;
    if(isset($_GET['page'])) {
        $page = $_GET['page'];
        settype($page, "int");

        $from = ($page - 1) * $sotin1trang;

        $sql = "SELECT * FROM product ORDER BY ASC LIMIT $from,$sotin1trang";
        $qr = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($qr)) {
            echo $row['name_product'] .'<br>';
        }
    }


?>