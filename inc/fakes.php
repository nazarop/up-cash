<?php
require('bd.php');
require('config.php');
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

for ($i = 0; $i < 60; $i++){
$data = 1;
$ip = $i;
$iprox = null;
$ref = null;
$login = $names[$i];
$pass = generateRandomString(15);
$hashedPass = password_hash($pass, PASSWORD_BCRYPT);
$email = generateRandomString(5) . "@mail.ru";
$chars3="qazxswedcvfrtgnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
$max3=32; 
//$size3=StrLen($chars3)-1;
//while($max3--) 
//$hash.=$chars3[rand(32,$size3)];
$hash = generateRandomString(32);
echo "123";
$insert_sql1 = $insert_sql1 = "INSERT INTO `svuti_users` (`data_reg`,`ip`, `iprox`, `ip_reg`, `referer`, `login`, `password`, `email`, `hash`, `balance`, `bonus`, `bonus_url`, `fake`) 
	VALUES ('{$data}','{$ip}','{$iprox}','{$ip}','{$ref}', '{$login}','{$hashedPass}', '{$email}', '{$hash}', '200000', '0', '0', '1');";
mysql_query($insert_sql1) or die(mysql_error());
    
}