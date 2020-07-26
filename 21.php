<?php
$dil1 = mt_rand(1,10);
$dil2 = mt_rand(1,11);
$dilall = $dil1 + $dil2;
$play1 = mt_rand(1,10);
$play2 = mt_rand(1,11);
$playall = $play1+$play2;
echo "Диллер: ".$dil1." и ".$dil2." Всего: ".$dilall."<br>";
echo "Ты: ".$play1. " и ".$play2." Всего: ".$playall;
?>