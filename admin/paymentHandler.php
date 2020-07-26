<?php 
require_once("../inc/bd.php");
$type = $_POST['type'];
if ($type == 'success'){
    $id = $_POST['id'];
    $sqlupdate = "UPDATE svuti_payout set status='Выполнено' WHERE id='$id'";
    mysql_query($sqlupdate) or die("".mysql_error());
}
if ($type == 'cancel'){
    $id = $_POST['id'];
    $sqlupdate = "UPDATE svuti_payout set status='Отменен' WHERE id='$id'";
    mysql_query($sqlupdate) or die("".mysql_error());
}
echo "<script type='text/javascript'>  window.location='index.php'; </script>";
?>