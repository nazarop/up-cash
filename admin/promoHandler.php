<?php 
require_once("../inc/bd.php");
$type = $_POST['type'];
if ($type == 'delete'){
    $id = $_POST['id'];
    $sqlupdate = "DELETE from svuti_promo WHERE id='$id'";
    mysql_query($sqlupdate) or die("".mysql_error());
}
if ($type == 'add'){
    $promo = $_POST['promo'];
    $activelimit = $_POST['activelimit'];
    $summa = $_POST['summa'];
    $sqlupdate = "INSERT INTO `svuti_promo` (`promo`, `active`, `activelimit`, `summa`) 
    VALUES ('{$promo}', '0', '{$activelimit}', '{$summa}')";
    mysql_query($sqlupdate) or die("".mysql_error());
}
echo "<script type='text/javascript'>  window.location='promo.php'; </script>";
?>