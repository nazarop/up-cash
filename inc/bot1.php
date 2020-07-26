<?php
include('bd.php');
include('config.php');
$n = rand(20, 30);
for ($j = 0; $j < $n; $j++){
    $salt1 = '';
    $salt2 = '';
    $ran = rand(1, 10);
    sleep($ran);
    $sql = "SELECT * FROM svuti_users WHERE fake='1' ORDER BY RAND() LIMIT 1";
    $result = mysql_query($sql) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $sid = $row['hash'];
    $type = rand(0, 1) == 1 ? 'betMin' : 'betMax';
    $rk = array_rand($bets, 1);
    $bet = $bets[$rk];
    $rk1 = array_rand($names, 1);
    $name = $names[$rk1];
    $percent = $percents[array_rand($percents, 1)];
    $chr = array("q", "Q", "e", "E", "r", "R", "t", "T", "y", "Y", "u", "U", "i", "I", "o", "O", "p", "P", "a", "A", "s", "S", "d", "D", "f", "F", "g", "G", "h", "H", "{", "}", "[", "]", "(", ")", "!", "@", "#", "$", "^", "%", "*", "&", "-", "+", "=");
    for ($i=1; $i<=8; $i++) {
    $salt1 .= $chr[rand(1,48)];
    $salt2 .= $chr[rand(1,48)];
    }
    $number = rand(0, 999999);
    $hash = hash('sha512', $salt1.$number.$salt2);
    
    $code = strToHex(encode($salt1.$number.$salt2, 'drkDmSBH4vLx9uvHNdJ6'));
    $hid = implode("-", str_split($code, 4));
    $data = [
        type => $type,
        sid => $sid,
        hid => $hid,
        betSize => $bet,
        betPercent => $percent
    ];
    $url = "http://a0245128.xsph.ru/action.php";
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { /* Handle error */ }
    else{
        var_dump($result);
    }
}

