<?php
include('config.php');
$merchant_id = $fkassa;
$merchant_secret = $fksec2;

    $sign = md5($merchant_id.':'.$_REQUEST['AMOUNT'].':'.$merchant_secret.':'.$_REQUEST['MERCHANT_ORDER_ID']);
    if ($sign != $_REQUEST['SIGN']) {
    die('wrong sign');
    }
$label = $_POST['intid'];
$idmoney = $_POST['MERCHANT_ORDER_ID'];
$data = date('d-m-Y H:i:s');
$yandex = '';
$suma = $_POST['AMOUNT'];
file_put_contents('out.txt', $suma);
include('bd.php');
		if (is_numeric($idmoney))
		{
		$sql_select = "SELECT * FROM svuti_users WHERE id='$idmoney'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$balance = $row['balance'];
$ref = $row['referer'];
}
	$sumaref = ($suma / 100) * 10;
if($ref >= 1)
{	
			$sql_select = "SELECT * FROM svuti_users WHERE id='$ref'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$balanceref = $row['balance'];
$balancerefs = $balanceref + $sumaref;
$update_sql1 = "Update svuti_users set balance='$balancerefs' WHERE id='$ref'";
    mysql_query($update_sql1) or die("" . mysql_error());
}
} 
if($depobon == 0){
$balancenew = $balance + $suma;
}else{
$bonusuma = ($suma / 100) * 10;
$balancenew = $balance + $suma + $bonusuma;
} 
$update_sql1 = "Update svuti_users set balance='$balancenew' WHERE id='$idmoney'";
    mysql_query($update_sql1) or die("" . mysql_error());
			$insert_sql1 = "
			INSERT INTO `svuti_payments` (`user_id`, `suma`, `data`, `qiwi`, `transaction`) 
			VALUES ('{$idmoney}', '{$suma}', '{$data}', '{$yandex}', '{$label}')
			";
mysql_query($insert_sql1);
} 

    die('YES');
?>