<?php
    require('../inc/bd.php');
    require('../inc/config.php');
    $hash = $_COOKIE['sid'];
$sql_select = "SELECT * FROM svuti_users WHERE hash='$hash'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row['prava'] != 1)
{
echo "<script type='text/javascript'>  window.location='/'; </script>";
}
else{

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $data = date("Y-m-d H:i:s");
        $ip = $_POST['ip'];
        $login = $_POST['login'];
        $ulo = strtoupper($login);
        $pass = $_POST['pass'];
        $sql = "SELECT * FROM svuti_users WHERE ip_reg='$ip' or ip='$ip' or upper(login)='$ulo'";
        $res = mysql_query($sql) or die(mysql_error());
        $f = false;
        $logEr = '';
        $ipEr = '';
        while( $row = mysql_fetch_array($res)){
            if(strtoupper($row['login']) == strtoupper($login))  {
                $logEr = "Уже есть такой логин";
                $f = true;
                break;
            }
            if( (strtoupper($row['ip_reg']) == strtoupper($ip)) || (strtoupper($row['ip']) == strtoupper($ip)) ){
                $ipEr = "Уже есть такой IP";
                $f = true;
                break;
            }
        }
        if (!$f){
            $iprox = null;
            $ref = null;
            $hashedPass = password_hash($pass, PASSWORD_BCRYPT);
            if (empty($_POST['email'])){
                $email = generateRandomString(5) . "@mail.ru";
            }
            else{
                $email = $_POST['email'];
            }
            $chars3="qazxswedcvfrtgnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
            $max3=32; 
            $hash = generateRandomString(32);
            $bal = $_POST['balance'];
            $bonus_url = '0';
            $bonus = '0';
            if ($bal > 0){
                $bonus_url = 'got';
                $bonus = '1';
            }
            $insert_sql1 = $insert_sql1 = "INSERT INTO `svuti_users` (`data_reg`,`ip`, `iprox`, `ip_reg`, `referer`, `login`, `password`, `email`, `hash`, `balance`, `bonus`, `bonus_url`,`sliv`, `fake`) 
                VALUES ('{$data}','{$ip}','{$iprox}','{$ip}','{$ref}', '{$login}','{$hashedPass}', '{$email}', '{$hash}', '{$bal}', '{$bonus}', '{$bonus_url}', '1', '0');";
            mysql_query($insert_sql1) or die(mysql_error());
        }
        
    }
    include("header.php");
}
?>
<style>
    .aderror{
        color: red;
    }
</style>
<div class="container mt-5">
<div class="col-6 offset-3">

    <form action="register.php" method="post">
        <div class="form-group">
            <label for="">Логин</label>
            <input type="text" class="form-control" name="login">
            <div class="aderror"><?php echo $logEr ?></div>
        </div>
        <div class="form-group">
            <label for="">Пароль</label>
            <input type="text" class="form-control" name="pass">
        </div>
        <div class="form-group">
            <label for="">IP</label>
            <input type="text" class="form-control" name="ip">
            <div class="aderror"><?php echo $ipEr ?></div>
        </div>
        <div class="form-group">
            <label for="">E-mail (если не указан оставить пустым)</label>
            <input type="text" class="form-control" name="email">
        </div>
        <div class="form-group">
            <label for="">Начальный баланс</label>
            <input type="number" class="form-control" name="balance">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary text-center">Выдать</button>
        </div>
    
    </form> 
    </div>
</div>