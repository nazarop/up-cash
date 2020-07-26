<?php

require_once("../inc/bd.php");
$hash = $_COOKIE['sid'];
$sql_select = "SELECT * FROM svuti_users WHERE hash='$hash'";
$result = mysql_query($sql_select);
$row5 = mysql_fetch_array($result);
if($row5['prava'] != 1)
{
echo "<script type='text/javascript'>  window.location='/'; </script>";
}
else{
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['userid'];
    $sql = "SELECT * FROM `svuti_games` WHERE user_id='$id' ORDER BY id DESC LIMIT 100";
    $result = mysql_query($sql) or die(mysql_error());
}
include("header.php");
}
?>

<table  class="table table-dark table-striped">
    <thead>
<tr>
    <td>ID</td>
    <td>Сумма</td>
    <td>Шанс</td>
    <td>Тип</td>
    <td>Выигрыш</td>
</tr>
</thead>
<tbody>
    
<?php while($row = mysql_fetch_array($result)): ?>
  <tr>
      <td><? echo $row['id'] ?></td>
      <td><? echo $row['suma'] ?></td>
      <td><? echo $row['shans'] ?></td>
      <td><? echo $row['type'] == 'win' ? 'Выигрыш' : 'Проигрыш'; ?></td>
      <td><? echo $row['win_summa'] ?></td>

  </tr>  
<? endwhile ?>
</tbody>
</table>
</div>