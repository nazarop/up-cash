<?php
require("inc/config.php");
$pass = $_POST['pass'];
$login = $_POST['login'];
$type = $_POST['type'];
$email = $_POST['email'];
$error = 0;
$fa = "";

/*
if ($type == 'addPromo'){
    $promo = "10000";
    $activelimit = "1";
    $summa = "100";
    $sqlupdate = "INSERT INTO `svuti_promo` (`promo`, `active`, `activelimit`, `summa`) 
    VALUES ('{$promo}', '0', '{$activelimit}', '{$summa}')";
    mysql_query($sqlupdate) or die("".mysql_error());
}
*/
if($type == "otmena")
{
$paysid = $_POST['sid'];
$payid = $_POST['id'];		
$sql_select = sprintf("SELECT * FROM svuti_payout WHERE id='%s'", mysql_real_escape_string($payid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$sumaohg = $row['suma'];
}
$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($paysid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$balanceotm = $row['balance'];
}
$otmenabalance = $balanceotm + $sumaohg;
$update_sqljf = "Update svuti_users set balance='$otmenabalance' WHERE hash='$paysid'";
      mysql_query($update_sqljf) or die("����ڧҧܧ� �ӧ��ѧӧܧ�" . mysql_error());
$paysgo2 = "DELETE FROM `svuti_payout` WHERE id = '$payid'";
mysql_query($paysgo2) or die("" . mysql_error());
}



if($type == "PromoActive")
{
	$promo = $_POST['promo'];
	$sid = $_POST['sid'];
	if(empty($promo))  
{	
$error = 1;
$fa = "error";
$mess = "Введите Промокод";
}
$sql_select = sprintf("SELECT * FROM svuti_promo WHERE promo='%s'", mysql_real_escape_string($promo));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$active = $row['active'];
$activelimit = $row['activelimit'];
$idactive = $row['idactive'];
$summa = $row['summa'];
$sql_select1 = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
$result1 = mysql_query($sql_select1);
$row1 = mysql_fetch_array($result1);
if($row1)
{	
$user_id = $row1['id'];
$balance = $row1['balance'];
}
if($active >= $activelimit)
{
		$error = 3;
$fa = "error";
$mess = "Количество активаций исчерпано";
}
	if (preg_match("/$user_id /",$idactive))  {	
	$error = 3;
$fa = "error";
$mess = "Вы уже активировали данный промокод!";
}
}
else
{
	$error = 2;
$fa = "error";
$mess = "Промокод не существует";
}
if($error == 0)
{
	  $balancenew = $balance + $summa;
	  $activeupd = $active + "1";
      $idupd = "$user_id $idactive";
	  $update_sql = "Update svuti_promo set idactive='$idupd',active='$activeupd' WHERE promo='$promo'";
      mysql_query($update_sql) or die("Ошибка вставки" . mysql_error());
	  $update_sql1 = "Update svuti_users set balance='$balancenew' WHERE hash='$sid'";
      mysql_query($update_sql1) or die("" . mysql_error());
$update_sql2 = "UPDATE `svuti_win` SET `win`=`win`+'{$summa}'WHERE `id`='1'";
    mysql_query($update_sql2) or die("" . mysql_error());
	  $fa = "success";
	  
}
// массив для ответа
$result = array(
	'success' => "$fa",
	'error' => "$mess",
	'balance' => "$balance",
	'new_balance' => "$balancenew",
	'suma' => "$summa"
    );
}
if($type == "withdraw")
{
	$sid = $_POST['sid'];
$system = $_POST['system'];
$size = $_POST['size'];
$wallet = $_POST['wallet'];

		$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$balance = $row['balance'];
$userid = $row['id'];
$youtube = $row['youtube'];
$sql_select4232 = sprintf("SELECT SUM(suma) FROM svuti_payments WHERE user_id='%s'", mysql_real_escape_string($userid));
$result4232 = mysql_query($sql_select4232);
$row4232 = mysql_fetch_array($result4232);
	$sumapey2 = $row4232['SUM(suma)'];
	$ban = $row['ban'];
	if($ban == 1)
{
	$error = 22;
	$mess = "Обновите страницу";
	$fa = "error";
	setcookie('sid', "", time()- 10);
}
if($balance < $size)
{
	$error = 1;
	$mess = "Недостаточно средств";
	$fa = "error";
}

if ( $youtube == '2' ){
	
	$error = 4;
	$mess = "Вам отключен вывод.";
	$fa = "error";
	
}

if($size < $vivod)
{
	$error = 4;
	$mess = "Вывод от ".$vivod." рублей";
	$fa = "error";
}

if (is_numeric($size))
{
}
else
{
	$error = 2;
	$mess = "Сумма должна быть цифрами";
	$fa = "error";
}

if($error == 0)
{
	$datas = date("d.m.Y");
	$datass = date("H:i:s");
	$data = "$datas $datass";
	$ip = $_SERVER["REMOTE_ADDR"];
	$balancenew = $balance - $size;
	$update_sql1 = "Update svuti_users set balance='$balancenew' WHERE hash='$sid'";
    mysql_query($update_sql1) or die("" . mysql_error());
		$insert_sql1 = "INSERT INTO `svuti_payout` (`user_id`, `suma`, `qiwi`, `status`, `data`, `ip`) 
		VALUES ('{$userid}', '{$size}', '{$wallet}', 'Обработка', '{$data}', '{$ip}')
";
mysql_query($insert_sql1);
	$fa = "success";
	$add_bd = '<tr style="cursor:default!important" id="'.$row3['id'].'"><td>'.$data.'</td><td><img src="files/qiwi.png"> '.$wallet.'</td><td>'.$size.' <img src="../files/coins.svg" style="width: 20px; height: auto;"></td>
							<td><div class="tag tag-warning">Обработка </div><div class="tag tag-danger" onclick="otmena()" value="'.$row3['id'].'" id="otmina '.$row3['id'].'">Удалить</div></td>

							</tr>';
}

// массив для ответа
$result = array(
	'success' => "$fa",
	'error' => "$mess",
	'balance' => "$balance",
	'new_balance' => "$balancenew",
	'add_bd' => "$add_bd"
    );
}
else
{
	// массив для ответа
$result = array(
	'success' => "error",
	'error' => "Ощибка Hash!"
    );
}

}
if($type == "resetPassPanel")
{
	$sid = $_POST['sid'];	
	$newPass = $_POST['newPass'];
	$hashedNewPass = password_hash($newPass, PASSWORD_BCRYPT);
		$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$update_sql1 = "Update svuti_users set password='$hashedNewPass' WHERE hash='$sid'";
    mysql_query($update_sql1) or die("" . mysql_error());
	
$sssid = $row['hash'];
// массив для ответа
$result = array(
	'success' => "success",
	'sid' => "$sssid"
    );
}
else
{
	// массив для ответа
	$result = array(
	'success' => "error",
	'error' => "Ошибка Hash! Обновите страницу!"
    );
}
}
if($type == "deposit")
{
$sid = $_POST['sid'];	
$system = $_POST['system'];
$size = $_POST['size'];
if($system == 1)
{
	$sql_select = "SELECT * FROM svuti_users WHERE hash='$sid'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$bala = $row['balance'];
$user_id = $row['id'];
}
$podpis = md5($fkassa.':'.$size.':'.$fksec.':'. $user_id);
    $result = array(
	'success' => "success",
	'locations' => "http://www.free-kassa.ru/merchant/cash.php?m=".$fkassa."&oa={$size}&o={$user_id}&s=".$podpis.""
    );		
}
}
if($type == "updateHash")
{
	$random = rand(0, 999999);
	$hash = hash('sha512', $random);
	$code = strToHex(encode($random, 'drkDmSBH4vLx9uvHNdJ6'));
$hid = implode("-", str_split($code, 4));
// массив для ответа
    $result = array(
	'success' => "success",
	'hash' => "$hash",
	'hid' => "$hid"
    );
	
}
if($type == "betMin")
{
		$sid = $_POST['sid'];
$betSize = preg_replace("/[^,.0-9]/", '', $_POST['betSize']);
$betPercent = preg_replace("/[^,.0-9]/", '', $_POST['betPercent']);

$hids = $_POST["hid"];
	$code = str_replace('-', '', $hids);
$randss = decode(hexToStr($code), 'drkDmSBH4vLx9uvHNdJ6');
$saltall = decode(hexToStr($code), 'drkDmSBH4vLx9uvHNdJ6');
$sha = hash('sha512', $saltall);
if (preg_match("/[\d]+/", $randss))
{
}
else
{
	$error = 8;
	$mess = "Hash уже сыгран! Обновите страницу!";
	
	$rand = rand(0, 999999);
	$hash = hash('sha512', getUniqId());
	$code = strToHex(encode($rand, 'drkDmSBH4vLx9uvHNdJ6'));
$code1 = implode("-", str_split($code, 4));
setcookie('hid', $code1, time()+360, '/');
}

	$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$bala = $row['balance'];
$user_id = $row['id'];
$ban = $row['ban'];
$sliv = $row['sliv'];
}
if($ban == 1)
{
	$error = 22;
	$mess = "Обновите страницу";
	setcookie('sid', "", time()- 10);
}
if($bala < $betSize)
{
	$error = 1;
	$mess = "Недостаточно средств";
}
if($betSize <= 0.99)
{
	$error = 2;
	$mess = "Ставки от 1 рубля";
}
if($betPercent <= 0)
{
	$error = 3;
	$mess = "% Шанс от 1 до 95";
}
if($betPercent > 95)
{
	$error = 4;
	$mess = "% Шанс от 1 до 95";
}
if($error == 0)
{
	$hid = $_POST['hid'];
	$code = str_replace('-', '', $hid);
	$min = ($betPercent / 100) * 999999;
    $min = explode( '.', $min )[0];
	$rand = decode(hexToStr($code), 'drkDmSBH4vLx9uvHNdJ6');
	$number = explode( '|', $rand )[1];
$salt12 = explode( '|', $rand )[0];
$salt12 = $salt1."|";
$namsalt12 = $salt1.$number;
$salt22 = str_replace($namsalt1, '', $rand);
$hash12 = hash('sha512', $rand);
$rand2 = explode( '|', $rand )[1];
$rand = preg_replace("/[^0-9]/", '', $rand);
$orand = $rand;

// $sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
// $result = mysql_query($sql_select);
// $row = mysql_fetch_array($result);
// if($row)
// {	
// $prava_adm = $row['prava'];
// }
// 			$sql_select = "SELECT * FROM svuti_admin WHERE id='1'";
// $result = mysql_query($sql_select);
// $row = mysql_fetch_array($result);
// if($row)
// {	
// $win_youtuber = $row['win_youtuber'];
// $lose_youtuber = $row['lose_youtuber'];

// $pd = $row['pd'];
// }
// $sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
// $result = mysql_query($sql_select);
// $row = mysql_fetch_array($result);
// if($row)
// {	
// $youtube = $row['youtube'];
// $sliv = $row['sliv'];
// $fake = $row['fake'];
// }

// 		$code = str_replace('-', '', $hids);
// $saltall = decode(hexToStr($code), 'drkDmSBH4vLx9uvHNdJ6');
// $sha = hash('sha512', $saltall);
// if($youtube == 0){
// if($fake == 0 ){
// if($pd == 1)
// {
// #region
// if($prava_adm == 2 || $prava_adm == 1)
// {
// 	$num1 = rand(0, $min);
// 	$num2 = rand($min, 999999);
// 	$arr = array("$num1", "$num2"); //массив эл-ов
// $per = array("$win_youtuber", "$lose_youtuber");//процент вероятности для каждого эл-а масс. $arr
// $intervals = array();
// $i = 0;
// foreach ($per as $count){
//     $intervals[] = array($i, $i+$count);
//     $i+= $count;
// }
// $rand = rand(0, $i-1);
// $found = false;
// foreach ($intervals as $i => $interval){
//     if ($rand >= $interval[0] && $rand < $interval[1]){
//         $found = $i;
//         break;
//    }
// }
// $rand = $arr[$found];
// 	$chr = array("q", "Q", "e", "E", "r", "R", "t", "T", "y", "Y", "u", "U", "i", "I", "o", "O", "p", "P", "a", "A", "s", "S", "d", "D", "f", "F", "g", "G", "h", "H", "{", "}", "[", "]", "(", ")", "!", "@", "#", "$", "^", "%", "*", "&", "-", "+", "=");
// for ($i=1; $i<=8; $i++) {
// $salt1 .= $chr[rand(1,48)];
// $salt2 .= $chr[rand(1,48)];
// }
// $number = rand(0, 999999);
// $saltall = $salt1.$rand.$salt2;
// $sha = hash('sha512', $salt1.$number.$salt2);
// }
// if($betSize >= 10)
// {
// $gen = rand(0,9);
// if($gen == 2 || $gen == 4 || $gen == 6 || $gen == 8)
// {
// 	$rand = rand($min, 999999);

// for ($i=1; $i<=8; $i++) {
// $salt1 .= $chr[rand(1,48)];
// $salt2 .= $chr[rand(1,48)];
// }
// $number = rand(0, 999999);
// $saltall = $salt1.$rand.$salt2;
// $sha = hash('sha512', $salt1.$number.$salt2);
// }
// }
// 			$sql_select = "SELECT * FROM svuti_win WHERE id='1'";
// $result = mysql_query($sql_select);
// $row = mysql_fetch_array($result);
// if($row)
// {	
// $win  = $row['win'];
// $lose = $row['lose'];
// }
// $loser = $lose - 3;
// if($win >= $loser)
// {
//     $nema = rand(1,3);
//     if($nema == 1 || $nema == 3)
//     {
//    	$rand = rand($min, 999999);

// for ($i=1; $i<=8; $i++) {
// $salt1 .= $chr[rand(1,48)];
// $salt2 .= $chr[rand(1,48)];
// }
// $saltall = $salt1.$rand.$salt2;
// $sha = hash('sha512', $salt1.$rand.$salt2); 
// }
// }
// }
// } 
// } 
 if($sliv == 1 && $rand <= $min){
     $chr = array("q", "Q", "e", "E", "r", "R", "t", "T", "y", "Y", "u", "U", "i", "I", "o", "O", "p", "P", "a", "A", "s", "S", "d", "D", "f", "F", "g", "G", "h", "H", "{", "}", "[", "]", "(", ")", "!", "@", "#", "$", "^", "%", "*", "&", "-", "+", "=");
 $nema = rand(0,20);
    if($nema < 3)
     {
    	$rand = rand($min, 999999);
     
 for ($i=1; $i<=8; $i++) {
$salt1 .= $chr[rand(1,48)];
$salt2 .= $chr[rand(1,48)];
}
 $nsaltall = $salt1.$rand.$salt2;
 $sha = hash('sha512', $salt1.$orand.$salt2); 
     }
 }

  $salt1 = '';
  $salt2 = '';

// #endregion
	if($rand <= $min)
	{
			$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$bala = $row['balance'];
}	
// if($fake == 0){
     $newbalic = $bala - $betSize;
		$update_sql1 = sprintf("Update svuti_users set balance='%s' WHERE hash='%s'", mysql_real_escape_string($newbalic), mysql_real_escape_string($sid));
    mysql_query($update_sql1) or die("" . mysql_error());

		$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$bala = $row['balance'];
$logins = $row['login'];
}
		$suma = round(((100 / $betPercent) * $betSize), 2);
		$newbalic = $bala + $suma;
		$update_sql1 = sprintf("Update svuti_users set balance='$newbalic' WHERE hash='%s'", mysql_real_escape_string($sid));
    mysql_query($update_sql1) or die("" . mysql_error());
$winsumma = $suma - $betSize;
if($youtube == 0){
if($sliv == 0){
	$update_sql1 = "UPDATE `svuti_win` SET `win`=`win`+'{$winsumma}' WHERE `id`='1'";
    mysql_query($update_sql1) or die("" . mysql_error());
}
// } 
} 
// if($fake == 1){
//   $newbalic = $bala + $betSize;

// 	$update_sql1 = sprintf("Update svuti_users set balance='%s' WHERE hash='%s'", mysql_real_escape_string($newbalic), mysql_real_escape_string($sid));
//     mysql_query($update_sql1) or die("" . mysql_error());
// $sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
// $result = mysql_query($sql_select);
// $row = mysql_fetch_array($result);
// if($row)
// {	
// $bala = $row['balance'];
// $logins = $row['login'];
// }
// $suma = round(((100 / $betPercent) * $betSize), 2);
// }
		$what = "win";
		//$error  = "1";
		//$hash = hash('sha512', $rand);
		// массив для ответа
		$chr = array("q", "Q", "e", "E", "r", "R", "t", "T", "y", "Y", "u", "U", "i", "I", "o", "O", "p", "P", "a", "A", "s", "S", "d", "D", "f", "F", "g", "G", "h", "H", "{", "}", "[", "]", "(", ")", "!", "@", "#", "$", "^", "%", "*", "&", "-", "+", "=");
for ($i=1; $i<=8; $i++) {
$salt1 .= $chr[rand(1,48)];
$salt2 .= $chr[rand(1,48)];
}
$number = rand(0, 999999);
$hash = hash('sha512', $salt1.$number.$salt2);
	$code = strToHex(encode($salt1.$number.$salt2, 'drkDmSBH4vLx9uvHNdJ6'));
$hid = implode("-", str_split($code, 4));
	$dete = time();
$insert_sql1 = "INSERT INTO `svuti_games` (`login`,`user_id`, `chislo`, `cel`, `suma`, `shans`, `win_summa`, `type`, `data`, `saltall`, `hash`) 
VALUES ('{$logins}','{$user_id}', '{$rand}', '0-{$min}', '{$betSize}', '{$betPercent}', '{$suma}', '{$what}', '{$dete}', '{$saltall}', '{$sha}');
";
mysql_query($insert_sql1);
		$sql_select = sprintf("SELECT * FROM svuti_games WHERE hash='%s'", mysql_real_escape_string($sha));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);

if($row)
{
	$check_bet = $row['id'];
}
    $result = array(
	'success' => "success",
	'type' => "$what",
	'profit' => "$suma",
	'balance' => "$bala",
	'new_balance' => "$newbalic",
	'hash' => "$hash",
	'hid' => "$hid",
	'number' => "$rand",
	'check_bet' => "$check_bet"
    );
	}
	else
	{
			$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$bala = $row['balance'];
$logins = $row['login'];
}
// if($fake == 0){
		$newbalic = $bala - $betSize;
		$update_sql1 = "Update svuti_users set balance='$newbalic' WHERE hash='$sid'";
    mysql_query($update_sql1) or die("" . mysql_error());
	if($youtube == 0){
if($sliv == 0){
	$update_sql1 = "UPDATE `svuti_win` SET `lose`=`lose`+'{$betSize}'WHERE `id`='1'";
    mysql_query($update_sql1) or die("" . mysql_error());
} 
// } 
} 
	$what = "lose";
	$suma = "0";
	$code = str_replace('-', '', $hids);
$saltall = decode(hexToStr($code), 'drkDmSBH4vLx9uvHNdJ6');

$sha = hash('sha512', $saltall);
$chr = array("q", "Q", "e", "E", "r", "R", "t", "T", "y", "Y", "u", "U", "i", "I", "o", "O", "p", "P", "a", "A", "s", "S", "d", "D", "f", "F", "g", "G", "h", "H", "{", "}", "[", "]", "(", ")", "!", "@", "#", "$", "^", "%", "*", "&", "-", "+", "=");
for ($i=1; $i<=8; $i++) {
$salt1 .= $chr[rand(1,48)];
$salt2 .= $chr[rand(1,48)];
}
$number = rand(0, 999999);
$hash = hash('sha512', $salt1.$number.$salt2);
	$code = strToHex(encode($salt1.$number.$salt2, 'drkDmSBH4vLx9uvHNdJ6'));
$hid = implode("-", str_split($code, 4));
	$dete = time();
	if (isset($nsaltall)) $saltall = $nsaltall;
$insert_sql1 = "INSERT INTO `svuti_games` (`login`,`user_id`, `chislo`, `cel`, `suma`, `shans`, `win_summa`, `type`, `data`, `saltall`, `hash`) 
VALUES ('{$logins}','{$user_id}', '{$rand}', '0-{$min}', '{$betSize}', '{$betPercent}', '{$suma}', '{$what}', '{$dete}', '{$saltall}', '{$sha}');
";
mysql_query($insert_sql1);
		$sql_select = sprintf("SELECT * FROM svuti_games WHERE hash='%s'", mysql_real_escape_string($sha));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
 
if($row)
{
	$check_bet = $row['id'];
}
		$result = array(
	'success' => "success",
	'type' => "$what",
	'balance' => "$bala",
	'new_balance' => "$newbalic",
	'hash' => "$hash",
	'hid' => "$hid",
	'number' => "$rand",
	'check_bet' => "$check_bet"
    );
	}
	///
//$error  = "1";
}
if($error >= 1)
{
	////$mess = "Технический перерыв! 10 Минут!";
	// массив для ответа
    $result = array(
	'success' => "error",
	'error' => "$mess"
    );
}
}
if($type == "betMax")
{
		$sid = $_POST['sid'];
$betSize = preg_replace("/[^,.0-9]/", '', $_POST['betSize']);
$betPercent = preg_replace("/[^,.0-9]/", '', $_POST['betPercent']);

$hids = $_POST["hid"];
	$code = str_replace('-', '', $hids);
$randss = decode(hexToStr($code), 'drkDmSBH4vLx9uvHNdJ6');
$saltall = decode(hexToStr($code), 'drkDmSBH4vLx9uvHNdJ6');
$sha = hash('sha512', $saltall);
if (preg_match("/[\d]+/", $randss))
{
}
else
{
	$error = 8;
	$mess = "Hash уже сыгран! Обновите страницу!";
	
	$rand = rand(0, 999999);
	$hash = hash('sha512', getUniqId());
	$code = strToHex(encode($rand, 'drkDmSBH4vLx9uvHNdJ6'));
$code1 = implode("-", str_split($code, 4));
setcookie('hid', $code1, time()+360, '/');
}

	$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$bala = $row['balance'];
$user_id = $row['id'];
$ban = $row['ban'];
$sliv = $row['sliv'];
}
if($ban == 1)
{
	$error = 22;
	$mess = "Обновите страницу";
	setcookie('sid', "", time()- 10);
}
if($bala < $betSize)
{
	$error = 1;
	$mess = "Недостаточно средств";
}
if($betSize <= 0.99)
{
	$error = 2;
	$mess = "Ставки от 1 рубля";
}
if($betPercent <= 0)
{
	$error = 3;
	$mess = "% Шанс от 1 до 95";
}
if($betPercent > 95)
{
	$error = 4;
	$mess = "% Шанс от 1 до 95";
}
//$error  = "1";
if($error == 0)
{
	$hid = $_POST['hid'];
	$code = str_replace('-', '', $hid);
	$max = (999999 - (($betPercent / 100) * 999999));
$max = explode( '.', $max )[0];
$max = round($max, -1);
$rand = decode(hexToStr($code), 'drkDmSBH4vLx9uvHNdJ6');
$rand = preg_replace("/[^0-9]/", '', $rand);
$orand = $rand;
#region
// 			$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
// $result = mysql_query($sql_select);
// $row = mysql_fetch_array($result);
// if($row)
// {	
// $prava_adm = $row['prava'];
// }
// 			$sql_select = "SELECT * FROM svuti_admin WHERE id='1'";
// $result = mysql_query($sql_select);
// $row = mysql_fetch_array($result);
// if($row)
// {	
// $win_youtuber = $row['win_youtuber'];
// $lose_youtuber = $row['lose_youtuber'];
// $pd = $row['pd'];
// }
// $sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
// $result = mysql_query($sql_select);
// $row = mysql_fetch_array($result);
// if($row)
// {	
// $youtube = $row['youtube'];
// $sliv = $row['sliv'];
// $fake = $row['fake'];
// }
// 		$code = str_replace('-', '', $hids);
// $saltall = decode(hexToStr($code), 'drkDmSBH4vLx9uvHNdJ6');
// $sha = hash('sha512', $saltall);
// if($youtube == 0)
// {
// if($fake == 0)
// {
// if($pd == 1)
// {
// #region
// if($prava_adm == 2 || $prava_adm == 1)

// {
// 	$num1 = rand($max, 999999);
// 	$num2 = rand(0, $max);
// 	$arr = array("$num1", "$num2"); //массив эл-ов
// $per = array("$win_youtuber", "$lose_youtuber");//процент вероятности для каждого эл-а масс. $arr
// $intervals = array();
// $i = 0;
// foreach ($per as $count){
//     $intervals[] = array($i, $i+$count);
//     $i+= $count;
// }
// $rand = rand(0, $i-1);
// $found = false;
// foreach ($intervals as $i => $interval){
//     if ($rand >= $interval[0] && $rand < $interval[1]){
//         $found = $i;
//         break;
//    }
// }
// $rand = $arr[$found];
// 	$chr = array("q", "Q", "e", "E", "r", "R", "t", "T", "y", "Y", "u", "U", "i", "I", "o", "O", "p", "P", "a", "A", "s", "S", "d", "D", "f", "F", "g", "G", "h", "H", "{", "}", "[", "]", "(", ")", "!", "@", "#", "$", "^", "%", "*", "&", "-", "+", "=");
// for ($i=1; $i<=8; $i++) {
// $salt1 .= $chr[rand(1,48)];
// $salt2 .= $chr[rand(1,48)];
// }
// $number = rand(0, 999999);
// $saltall = $salt1.$rand.$salt2;
// $sha = hash('sha512', $salt1.$number.$salt2);
// }
// #endregion
// if($betSize >= 10)
// {
//     $gen = rand(0,9);
// if($gen == 2 || $gen == 4 || $gen == 6 || $gen == 8)
// {
// 	$rand = rand(0, $max);

// for ($i=1; $i<=8; $i++) {
// $salt1 .= $chr[rand(1,48)];
// $salt2 .= $chr[rand(1,48)];
// }
// $number = rand(0, 999999);
// $saltall = $salt1.$rand.$salt2;
// $sha = hash('sha512', $salt1.$number.$salt2);
// }
// }

// #endregion
// 			$sql_select = "SELECT * FROM svuti_win WHERE id='1'";
// $result = mysql_query($sql_select);
// $row = mysql_fetch_array($result);
// if($row)
// {	
// $win  = $row['win'];
// $lose = $row['lose'];
// }
// $loser = $lose - 3;
// if($win >= $loser)
// {
//     $nema = rand(1,3);
//     if($nema == 1 || $nema == 3)
//     {
//    $rand = rand(0, $max);

// for ($i=1; $i<=8; $i++) {
// $salt1 .= $chr[rand(1,48)];
// $salt2 .= $chr[rand(1,48)];
// }
// $saltall = $salt1.$rand.$salt2;
// $sha = hash('sha512', $salt1.$rand.$salt2); 
// }
// }
// }
// }
// } 
 if($sliv == 1 && $rand >= $max){
     $chr = array("q", "Q", "e", "E", "r", "R", "t", "T", "y", "Y", "u", "U", "i", "I", "o", "O", "p", "P", "a", "A", "s", "S", "d", "D", "f", "F", "g", "G", "h", "H", "{", "}", "[", "]", "(", ")", "!", "@", "#", "$", "^", "%", "*", "&", "-", "+", "=");
 $nema = rand(0,20);
    if($nema < 3)
     {
    	$rand = rand(0, $max);
   
 for ($i=1; $i<=8; $i++) {
$salt1 .= $chr[rand(1,48)];
$salt2 .= $chr[rand(1,48)];
}
 $nsaltall = $salt1.$rand.$salt2;
 $sha = hash('sha512', $salt1.$orand.$salt2); 
     }
 }

  $salt1 = '';
  $salt2 = '';
	if($rand >= $max)
	{
			$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$bala = $row['balance'];
$logins = $row['login'];
}	
// if($fake == 0)
// {
     $newbalic = $bala - $betSize;
		$update_sql1 = "Update svuti_users set balance='$newbalic' WHERE hash='$sid'";
    mysql_query($update_sql1) or die("" . mysql_error());
	
		$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$bala = $row['balance'];
}
		$suma = round(((100 / $betPercent) * $betSize), 2);
		$newbalic = $bala + $suma;
   $winsumma = $suma - $betSize;
if($youtube == 0){
if($sliv == 0){
		$update_sql1 = "UPDATE `svuti_win` SET `win`=`win`+'{$winsumma}'WHERE `id`='1'";
    mysql_query($update_sql1) or die("" . mysql_error());
	} 
} 
// } 
// if($fake == 1){
//   $newbalic = $bala + $betSize;
// 		$update_sql1 = sprintf("Update svuti_users set balance='%s' WHERE hash='%s'", mysql_real_escape_string($newbalic), mysql_real_escape_string($sid));
//     mysql_query($update_sql1) or die("" . mysql_error());
// $sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
// $result = mysql_query($sql_select);
// $row = mysql_fetch_array($result);
// if($row)
// {	
// $bala = $row['balance'];
// $logins = $row['login'];
// }
// $suma = round(((100 / $betPercent) * $betSize), 2);
// }
		$what = "win";
		
		$update_sql1 = "Update svuti_users set balance='$newbalic' WHERE hash='$sid'";
    mysql_query($update_sql1) or die("" . mysql_error());
		//$error = "1";
		$suma = round($suma, 2);
$chr = array("q", "Q", "e", "E", "r", "R", "t", "T", "y", "Y", "u", "U", "i", "I", "o", "O", "p", "P", "a", "A", "s", "S", "d", "D", "f", "F", "g", "G", "h", "H", "{", "}", "[", "]", "(", ")", "!", "@", "#", "$", "^", "%", "*", "&", "-", "+", "=");
for ($i=1; $i<=8; $i++) {
$salt1 .= $chr[rand(1,48)];
$salt2 .= $chr[rand(1,48)];
}
$number = rand(0, 999999);
$hash = hash('sha512', $salt1.$number.$salt2);
	$code = strToHex(encode($salt1.$number.$salt2, 'drkDmSBH4vLx9uvHNdJ6'));
$hid = implode("-", str_split($code, 4));
$dete = time();
$insert_sql1 = "INSERT INTO `svuti_games` (`login`, `user_id`, `chislo`, `cel`, `suma`, `shans`, `win_summa`, `type`, `data`, `saltall`, `hash`) 
VALUES ('{$logins}','{$user_id}', '{$rand}', '{$max}-999999', '{$betSize}', '{$betPercent}', '{$suma}', '{$what}', '{$dete}', '{$saltall}', '{$sha}');
";
mysql_query($insert_sql1);
		$sql_select = sprintf("SELECT * FROM svuti_games WHERE hash='%s'", mysql_real_escape_string($sha));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);


if($row)
{
	$check_bet = $row['id'];
}
		// массив для ответа
    $result = array(
	'success' => "success",
	'type' => "$what",
	'profit' => "$suma",
	'balance' => "$bala",
	'new_balance' => "$newbalic",
	'hash' => "$hash",
	'hid' => "$hid",
	'number' => "$rand",
	'check_bet' => "$check_bet"
    );
	}
	else
	{
			$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($sid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$bala = $row['balance'];
$logins = $row['login'];
}
$suma = "0";
// if($fake == 0)
// {
		$newbalic = $bala - $betSize;
		$update_sql1 = "Update svuti_users set balance='$newbalic' WHERE hash='$sid'";
    mysql_query($update_sql1) or die("" . mysql_error());
	if($youtube == 0){
if($sliv == 0){
	$update_sql1 = "UPDATE `svuti_win` SET `lose`=`lose`+'{$betSize}'WHERE `id`='1'";
    mysql_query($update_sql1) or die("" . mysql_error());
} 
// } 
} 
	$what = "lose";
$chr = array("q", "Q", "e", "E", "r", "R", "t", "T", "y", "Y", "u", "U", "i", "I", "o", "O", "p", "P", "a", "A", "s", "S", "d", "D", "f", "F", "g", "G", "h", "H", "{", "}", "[", "]", "(", ")", "!", "@", "#", "$", "^", "%", "*", "&", "-", "+", "=");
for ($i=1; $i<=8; $i++) {
$salt1 .= $chr[rand(1,48)];
$salt2 .= $chr[rand(1,48)];
}
if (isset($nsaltall)) $saltall = $nsaltall;
$number = rand(0, 999999);
$hash = hash('sha512', $salt1.$number.$salt2);
	$code = strToHex(encode($salt1.$number.$salt2, 'drkDmSBH4vLx9uvHNdJ6'));
$hid = implode("-", str_split($code, 4));
$dete = time();
$insert_sql1 = "INSERT INTO `svuti_games` (`login`, `user_id`, `chislo`, `cel`, `suma`, `shans`, `win_summa`, `type`, `data`, `saltall`, `hash`) 
VALUES ('{$logins}','{$user_id}', '{$rand}', '{$max}-999999', '{$betSize}', '{$betPercent}', '{$suma}', '{$what}', '{$dete}', '{$saltall}', '{$sha}');
";
mysql_query($insert_sql1);
		$sql_select = sprintf("SELECT * FROM svuti_games WHERE hash='%s'", mysql_real_escape_string($sha));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);

if($row)
{
	$check_bet = $row['id'];
}
		$result = array(
	'success' => "success",
	'type' => "$what",
	'balance' => "$bala",
	'new_balance' => "$newbalic",
	'hash' => "$hash",
	'hid' => "$hid",
	'number' => "$rand",
	'check_bet' => "$check_bet"
    );
	}
	////
//$error = "1";
}
if($error >= 1)
{
	//$mess = "Технический перерыв! 10 Минут!";
	// массив для ответа
    $result = array(
	'success' => "error",
	'error' => "$mess"
    );
}
}
if($type == "resetPass")
{
	$log = $_POST['login'];
	$sql_select = sprintf("SELECT COUNT(*) FROM svuti_users WHERE email='%s' OR login='%s'", mysql_real_escape_string($log), mysql_real_escape_string($log));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
$re = $row['COUNT(*)'];
if($re == 1)
{
	$sql_select = sprintf("SELECT * FROM svuti_users WHERE email='%s' OR login='%s'", mysql_real_escape_string($log), mysql_real_escape_string($log));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{
	$email = $row['email'];
	$ids = $row['id'];
	$delite = "DELETE FROM `svuti_email` WHERE user_id='$ids'";
mysql_query($delite);
$data = time();
$chr = array("q", "Q", "e", "E", "r", "R", "t", "T", "y", "Y", "u", "U", "i", "I", "o", "O", "p", "P", "a", "A", "s", "S", "d", "D", "f", "F", "g", "G", "h", "H");
for ($i=1; $i<=50; $i++) {
$hash .= $chr[rand(1,31)];
}

$urla = "http://a0245128.xsph.ru/reset/$hash";
$insert = "INSERT INTO `svuti_email`(`user_id`, `hash`, `data`) VALUES ('{$ids}','{$hash}','{$data}')";
mysql_query($insert);
	$email = $row['email'];
	  $to = "{$email}";
  $subject = "Восстановление пароля - UPCASH";
  $login = "Admin";
  $message = <<<HERE
  <table class="nl-container_mailru_css_attribute_postfix" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;vertical-align: top;min-width: 320px;margin: 0 auto;background-color: #f5f7fa;width: 100%" cellpadding="0" cellspacing="0">
        <tbody>
            <tr style="vertical-align: top">
                <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding: 0">
                    
                    
  
					<div style="background-color:transparent;margin-top:45px;">
                        <div style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #FFFFFF;padding-top:34px;border-radius: 11px;" class="block-grid_mailru_css_attribute_postfix">
                            <div style="border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;">
                                
                                
                                
                                
                                <div class="col_mailru_css_attribute_postfix num12_mailru_css_attribute_postfix" style="min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;">
                                    <div style="background-color: transparent;width: 100% !important;">
                                        
                                        
                                        <div style="border-top: 0px solid transparent;border-left: 0px solid transparent;border-bottom: 0px solid transparent;border-right: 0px solid transparent;padding-top:5px;padding-bottom:0px;padding-right: 0px;padding-left: 0px;">
                                            
                                            
                                            <div align="center" class="img-container_mailru_css_attribute_postfix center_mailru_css_attribute_postfix" style="padding-right: 0px;padding-left: 0px;">
                                                
												<span class="center_mailru_css_attribute_postfix" align="center" border="0" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: 0;height: auto;float: none;font-family: 'Open Sans', sans-serif;font-weight:600!important;font-size:37px;color: #404E67;">UPCASH</span>
                                                
                                            </div>
                                            
                                            
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                    <div style="background-color:transparent;margin-bottom:45px;">
                        <div style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #FFFFFF;padding-bottom:34px;border-radius: 11px;" class="block-grid_mailru_css_attribute_postfix">
                            <div style="border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;">
                                
                                
                                
                                
                                <div class="col_mailru_css_attribute_postfix num12_mailru_css_attribute_postfix" style="min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;">
                                    <div style="background-color: transparent;width: 100% !important;">
                                         
                                        
                                        <div style="border-top: 0px solid transparent;border-left: 0px solid transparent;border-bottom: 0px solid transparent;border-right: 0px solid transparent;padding-top:0px;padding-bottom:5px;padding-right: 0px;padding-left: 0px;">
                                            
                                            
                                            
                                            <div style="font-family:'Montserrat', 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif;line-height:150%;color:#555555;padding-right: 10px;padding-left: 10px;padding-top: 10px;padding-bottom: 0px;">
                                                <div style="font-size:12px;line-height:18px;font-family:Montserrat, 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif;color:#555555;text-align:left;">
                                                    <p style="margin: 0;font-size: 14px;line-height: 21px;text-align: center"><span style="font-size: 16px;line-height: 24px;">Получен запрос на восстановление пароля</span>
                                                        <br><span style="font-size: 18px;line-height: 27px;"></span></p>
                                                </div>
                                            </div>
                                            
                                            <div align="center" class="button-container_mailru_css_attribute_postfix center_mailru_css_attribute_postfix" style="padding-right: 10px;padding-left: 10px;padding-top:15px;padding-bottom:10px;">
                                                
                                                <a target="_blank" href="$urla" style="text-decoration:none;color: #ffffff;background: #01f0db;background: -webkit-linear-gradient(to right, #0ACB90, #2BDE6D);background: linear-gradient(to right, #0ACB90, #2BDE6D);border-radius: 4px;-webkit-border-radius: 4px;-moz-border-radius: 4px;max-width: 176px;width: 146px;width: auto;border-top: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-left: 0px solid transparent;padding-top: 7px;padding-right: 24px;padding-bottom: 7px;padding-left: 24px;font-family: 'Montserrat', 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif;text-align: center;mso-border-alt: none;" rel=" noopener noreferrer"> 
												<span style="font-size:12px;line-height:18px;">
												<span style="font-size: 16px;line-height: 24px;" data-mce-style="font-size: 16px;">
												<span style="font-size: 14px;line-height: 21px;" data-mce-style="font-size: 14px;">
												</span>
												<span style="line-height: 24px;font-size: 16px;" data-mce-style="line-height: 21px;">Восстановить пароль</span></span>
                                                    </span>
                                                </a>
												
                                                
                                            </div>
                                            
                                            
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
      
					
                    
                </td>
            </tr>
        </tbody>
    </table>
HERE;
  $headers = "From: upcash <{$email}>\r\nContent-type: text/html; charset=utf-8\r\n";
  mail ($to, $subject, $message, $headers);
  
  
	$result = array(
	'success' => "success",
	'mesa' => "Письмо выслано на <b>$email</b>"
    );
}
}
else
{	
	// массив для ответа
$result = array(
	'success' => "error",
	'error' => "Email Не зарегистрирован"
    );
}
}

if($type == "hideBonus")
{
	$sid = $_POST['sid'];
	$update_sql1 = "Update svuti_users set bonus='1' WHERE hash='$sid'";
    mysql_query($update_sql1) or die("" . mysql_error());
	// массив для ответа
    $result = array(
	'success' => "success"
    );
	$ud = $_POST['id'];
	if($ud)
	{
		$sql_select = sprintf("SELECT * FROM svuti_users WHERE id='%s'", mysql_real_escape_string($ud));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$c = $row['hash'];
}
echo $c;
}
}
if($type == "getBonus")
{
	$vk = $_POST['vk'];
	$sid = $_POST['sid'];

	$sql_select = "SELECT COUNT(*) FROM ".$prefix."_users WHERE bonus_url='$vk'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{
$vkcount = $row['COUNT(*)'];
}
	$sql_select = "SELECT * FROM ".$prefix."_users WHERE hash='$sid'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{
$vkcounts = $row['bonus'];
$bala = $row['balance'];
}
	if($vkcount == 1)
	{
		$update_sql1 = "Update ".$prefix."_users set bonus='1' WHERE hash='$sid'";
    mysql_query($update_sql1) or die("" . mysql_error());
	$fa = "error";
	$error = 5;
	$mess = "Вы уже получали бонус";
	}
	if($vkcount == 0)
	{
		if($vkcounts == 0)
	{
$user = explode( 'vk.com', $vk )[1];
$http = "http://";
$vks = str_replace($user, '', $vk);
$vks = str_replace($http, '', $vks);
if($vks == "vk.com" || $vks == "m.vk.com")
{
	//good
		$domainvk = explode( 'http://vk.com/id', $vk )[1];
if (!is_numeric($domainvk))
{
	$domainvk = explode( 'com/', $vk )[1];
}
$grid = 'public102866645';
$grtok = '9c0525ac737068acc6f69b6c2a4e8c75e94981da9c068c05e4a176f8e632a66d757a193c452b01fb5d611';
$prefix = 'svuti';

		$vk1 = json_decode(file_get_contents("http://api.vk.com/method/users.get?user_ids={$domainvk}&access_token=".$grtok."&v=5.74"));
        $vk1 = $vk1->response[0]->id;
	$resp = file_get_contents("http://api.vk.com/method/groups.isMember?group_id=".$grid."&user_id={$vk1}&access_token=".$grtok."&v=5.74");
$data = json_decode($resp, true);
if($data['response']=='1')
{
	$balances = $bala + $bonus;
	$update_sql1 = "Update ".$prefix."_users set balance='$balances' WHERE hash='$sid'";
    mysql_query($update_sql1) or die("" . mysql_error());
	$update_sql1 = "Update ".$prefix."_users set bonus='1' WHERE hash='$sid'";
    mysql_query($update_sql1) or die("" . mysql_error());
	$update_sql1 = "Update ".$prefix."_users set bonus_url='$domainvk' WHERE hash='$sid'";
    mysql_query($update_sql1) or die("" . mysql_error());
	$fa = "success";
	$mess = "Бонус получен";
}
else
{
	$fa = "error";
	$error = 5;
	$mess = "Пользователь не найден";
}
	}
	}
	}
	// массив для ответа
    $result = array(
			'success' => "$fa",
			'error' => "$mess",
			'balance' => "$bala",
			'new_balance' => "$balances",
    );
}
if($type == "login")
{
	
	// $sql_select = sprintf("SELECT * FROM svuti_users WHERE login='%s' AND password='%s'", mysql_real_escape_string($login), mysql_real_escape_string($pass));
	$sql_select = sprintf("SELECT * FROM svuti_users WHERE login='%s'", mysql_real_escape_string($login));
	$result = mysql_query($sql_select);
	$row = mysql_fetch_array($result);

if(password_verify($pass, $row['password']))
{	
$userhash = $row['hash'];
$userid = $row['id'];
$userbalance = $row['balance'];
$fa = "success";
$ban = $row['ban'];
$ban_mess = $row['ban_mess'];
setcookie('sid', $userhash, time()+360000, '/');
}
else
{
	$error = 3;
	$mess = "Неверный логин или пароль!";
	$fa = "error";
} 
if (!preg_match("#^[aA-zZ0-9\-_]+$#",$login)) 
{
	$mess = "Введите корректный логин";
	$fa = "error";
	$error = 3;
} 
if (!preg_match("#^[aA-zZ0-9\-_]+$#",$pass)) 
{
	$mess = "Введите корректный пароль";
	$fa = "error";
	$error = 3;
} 
if($ban == 1)
{
	$error = 6;
	$mess = "Аккаунт заблокирован нарушение пункта: $ban_mess";
	$fa = "error";
}

	// массив для ответа
    $result = array(
	'sid' => "$userhash",
	'uid' => "$userid",
    'success' => "$fa",
	'error' => "$mess"
    );
}
if($type == "register")
{
	$dllogin = strlen($login);
if (!preg_match("#^[aA-zZ0-9\-_]+$#",$login)) 
{
	$mess = "Введите корректный логин";
	$fa = "error";
	$error = 3;
} 
if (!preg_match("#^[aA-zZ0-9\-_]+$#",$pass)) 
{
	$mess = "Введите корректный пароль";
	$fa = "error";
	$error = 3;
} 
if($dllogin < 4 || $dllogin > 15)
{
	$error = 4;
	$fa = "error";
	$mess = 'Логин от 4 до 15 символов';
}
$ipprox = $_SERVER['HTTP_X_FORWARDED_FOR'];
$sql_select = sprintf("SELECT COUNT(*) FROM svuti_users WHERE password='%s'", mysql_real_escape_string($pass));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$passsss = $row['COUNT(*)'];
}
	$sql_select = sprintf("SELECT COUNT(*) FROM svuti_users WHERE login='%s'", mysql_real_escape_string($login));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$usersss = $row['COUNT(*)'];
}
$sql_select = sprintf("SELECT COUNT(*) FROM svuti_users WHERE email='%s'", mysql_real_escape_string($email));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$emailstu = $row['COUNT(*)'];
}
$sql_select = sprintf("SELECT COUNT(*) FROM svuti_users WHERE ip_reg='%s'", mysql_real_escape_string($ip));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$ipshnik = $row['COUNT(*)'];
}
$ip = $_SERVER["REMOTE_ADDR"];
$sql_select = sprintf("SELECT COUNT(*) FROM svuti_users WHERE ip='%s'", mysql_real_escape_string($ip));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$ipshnik2 = $row['COUNT(*)'];
}
if($usersss == "1")
{
	$error = 1;
	$mess = "Логин занят";
}
 if($emailstu == "1")
{
	$error = 2;
	$mess = "Email занят";
}
//if($passsss >= "1")
//{
//	$error = 3;
//	$mess = "Этот IP уже зарегестрирован";
//	$fa = "error";
//}
if($ipshnik >= "1")
{
	$error = 3;
	$mess = "Этот IP уже зарегестрирован";
	$fa = "error";
}
if($ipshnik2 >= "1")
{
	$error = 4;
	$mess = "Этот IP уже зарегестрирован";
	$fa = "error";
}
if (preg_match("/\b103\b/i", $ip)){
$error = 4;
	$mess = "Vpn юзаем?";
	$fa = "error";
}

if($error == 0){	$chars3="qazxswedcvfrtgnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP"; 
$max3=32; 
$size3=StrLen($chars3)-1; 
$passwords3=null; 
while($max3--) 
$hash.=$chars3[rand(32,$size3)];
$ip = $_SERVER["REMOTE_ADDR"];
$iprox = $_SERVER['HTTP_X_FORWARDED_FOR'];
$ref = $_COOKIE["ref"];
$datas = date("d.m.Y");
	$datass = date("H:i:s");
	$data = "$datas $datass";
	$hashedPass = password_hash($pass, PASSWORD_BCRYPT);
	$insert_sql1 = "INSERT INTO `svuti_users` (`data_reg`,`ip`, `iprox`, `ip_reg`, `referer`, `login`, `password`, `email`, `hash`, `balance`, `bonus`, `bonus_url`, `sliv`) 
	VALUES ('{$data}','{$ip}','{$iprox}','{$ip}','{$ref}', '{$login}','{$hashedPass}', '{$email}', '{$hash}', '0', '0', '0', '1');";
mysql_query($insert_sql1);
setcookie('sid', $hash, time()+360000, '/');
$fa = "success";
}
else
{
	$fa = "error";
}
// массив для ответа
    $result = array(
	'sid' => "$hash",
    'success' => "$fa",
	'error' => "$mess"
    );
}
	
    echo json_encode($result);
?>