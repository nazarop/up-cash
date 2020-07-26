<?php

require_once("../inc/bd.php");
$hash = $_COOKIE['sid'];
$sql_select = "SELECT * FROM svuti_users WHERE hash='$hash'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row['prava'] != 1)
{
echo "<script type='text/javascript'>  window.location='/'; </script>";
}
else{

$userEr = '';
$success = '';
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = strtoupper($_POST['user']);
    $sum = $_POST['sum'];
    if (isset($_POST['check'])){
        $sql = "SELECT COUNT(*) FROM svuti_users WHERE upper(login)='$name' and bonus_url!='got'";
    }
    else{
        $sql = "SELECT COUNT(*) FROM svuti_users WHERE upper(login)='$name'";
    }
    $res = mysql_query($sql) or die(mysql_error());
    $row = mysql_fetch_array($res);

    if($row[0] == 0){
        $userEr = "Пользователь не найден или промо был выдан";
    }
    
    elseif($row[0] != 1){
        $userEr = "Много пользователей по этому нику";
     
    }
    else{
        $sql = "UPDATE `svuti_users` SET balance = balance + $sum, `bonus_url`='got' WHERE upper(login)='$name'";
        $res = mysql_query($sql) or die(mysql_error());
        $success = 'Успешно выдан';
    }
}
include("header.php");
}
?>
<style>
    .error{
        color: red;
    }
    .success{
        color: green;
    }
</style>
<div class="container mt-5">
<div class="col-6 offset-3">

    <form action="givepromo.php" method="post">
        <div class="form-group">
            <label for="">Юзер</label>
            <input type="text" class="form-control" name="user">
            <div class="error"><?php echo $userEr ?></div>
            <div class="success"><?php echo $success ?></div>
        </div>
        <div class="form-group">
            <label for="">Сумма</label>
            <input type="number" class="form-control" name="sum" value="3">
        </div>
        <div class="form-group">
            <input type="checkbox" checked  name="check" value="Yes">
             <label for="">Проверять выдан ли уже</label>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary text-center">Выдать</button>
        </div>
    
    </form> 
    </div>
</div>