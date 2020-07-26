<?php
    require('bd.php');
    $r = rand (-3, 3);
    $sql = "SELECT * FROM online";
    $res = mysql_query($sql) or die(mysql_error());
    $row = mysql_fetch_array($res);
    $curr = $row['curr'];
    $curr += $r;
    if ($curr <= 3) $curr = 5;
    $sql1 = "UPDATE online SET curr = '$curr'";
    mysql_query($sql1) or die(mysql_error());
    echo $r;