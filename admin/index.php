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

$status = 'Обработка';
$type = $_GET['type'];

if ($type == 'canceled'){
    $status = 'Отменен';
}
if ($type == 'withdrawed'){
    $status = 'Выполнено';
}
$sql_select = "SELECT * FROM svuti_payout WHERE status='$status' ORDER BY data";
$result = mysql_query($sql_select);
include("header.php");
?>

<div style="margin-bottom: 20px; margin-top: 20px">
    <a href="index.php" class="btn btn-info">В обработке</a>
    <a href="index.php?type=canceled" class="btn btn-danger">Отмененные</a>
    <a href="index.php?type=withdrawed" class="btn btn-success">Выполненные</a>
</div>
<table class="table table-dark table-striped">
<thead>
<tr>
    <td>ID</td>
    <td>ID юзера</td>
    <td>Сумма</td>
    <td>Кошелек</td>
    <td>IP</td>
    <td>Дата</td>
    <td>Статус</td>
    <td>Выполнить</td>
    <td>Отменить</td>
</tr>
</thead>
<tbody>
    
<?php while($row = mysql_fetch_array($result)): ?>
  <tr>
      <td><? echo $row['id'] ?></td>
      <td><? echo $row['user_id'] ?></td>
      <td><? echo $row['suma'] ?></td>
      <td><? echo $row['qiwi'] ?></td>
      <td><? echo $row['ip'] ?></td>
      <td><? echo $row['data'] ?></td>
      <td><? echo $row['status'] ?></td>
      <td>
          <? if (!$type): ?>
        <form action="paymentHandler.php" method="POST">
            <input type="hidden" name="id" value="<? echo $row['id'] ?> ">
            <input type="hidden" name="type" value="success">
            <button type="submit" class="btn btn-success">GO</button>
        </form>
         <? endif ?>
        
      </td>
      <td>
           <? if (!$type): ?>
          <form action="paymentHandler.php" method="POST">
            <input type="hidden" name="id" value="<? echo $row['id'] ?> ">
            <input type="hidden" name="type" value="cancel">
            <button type="submit" class="btn btn-danger">Cancel</button>
        </form>
         <? endif ?>
      </td>
  </tr>  
<? endwhile ?>
</tbody>
</table>
</body>
<? } ?>