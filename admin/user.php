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

$userEr = '';
$success = '';
$result = '';
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['userid'];
    
    $login = strtoupper($_POST['login']);
    if ($id){
        $sql = "SELECT * FROM `svuti_users` WHERE id = '$id'";
        $result = mysql_query($sql) or die(mysql_error()); 
        $sql1=  "SELECT COUNT(*) FROM `svuti_users` WHERE referer='$id'";
        $res1 =  mysql_query($sql1) or die(mysql_error()); 
        $sql2 = "SELECT SUM(suma) from `svuti_payments` WHERE user_id='$id'";
        $res2 =  mysql_query($sql2) or die(mysql_error()); 
    }
    else{
        $sql = "SELECT * FROM `svuti_users` WHERE UPPER(login) = '$login'";
        $result = mysql_query($sql) or die(mysql_error());
        $row1 = mysql_fetch_array($result);
        $i = $row1['id'];
        $sql1=  "SELECT COUNT(*) FROM `svuti_users` WHERE referer='$i'";
        $res1 =  mysql_query($sql1) or die(mysql_error()); 
        $sql2 = "SELECT SUM(suma) from `svuti_payments` WHERE user_id='$i'";
        $res2 =  mysql_query($sql2) or die(mysql_error()); 
    }
    $refs = mysql_fetch_array($res1);
    $sum =  mysql_fetch_array($res2);
    mysql_data_seek($result, 0);
    
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
    <h2 class="text-center">Вводить одно из двух. Если введены оба, поиск ведется по id</h2>
    <form action="user.php" method="post">
        <div class="form-group">
            <label for="">ID</label>
            <input type="text" class="form-control" name="userid">
        </div>
        <div class="form-group">
            <label for="">Логин</label>
            <input type="text" class="form-control" name="login">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary text-center">Искать</button>
        </div>
    
    </form> 
    </div>
    </div>
    <table  class="table table-dark table-striped">
    <thead>
<tr>
    <td>ID</td>
    <td>Логин</td>
    <td>Почта</td>
    <td>IP</td>
    <td>Реферал</td>
    <td>Онлайн</td>
    <td>Баланс</td>
    <td>Бонус</td>
    <td>Кол-во рефералов</td>
    <?php if ($row5['login'] == 'romch' || $row5['login'] == 'romchik123'): ?>
    <td>Сумма пополнений</td>
    <?php endif ?>
   
    <td>Игры</td>
</tr>
</thead>
<tbody>
    
<?php while($row = mysql_fetch_array($result)): ?>
  <tr>
      <td><? echo $row['id'] ?></td>
      <td><? echo $row['login'] ?></td>
      <td><? echo $row['email'] ?></td>
      <td><? echo $row['ip_reg'] ?></td>
      <td><? echo $row['referer'] ?></td>
      <td><? echo $row['online'] == '1' ? 'Да' : 'Нет' ?></td>
      <td><? echo $row['balance'] . 'Р' ?></td>
      <td><? echo $row['bonus_url'] == 'got' ? 'Получил' : 'Не получил'?></td>
      <td><? echo $refs[0] ?></td>
      <?php if ($row5['login'] == 'romch' || $row5['login'] == 'romchik123'): ?>
      <td><? echo $sum[0] ?></td>
      <?php endif ?>
      <td><form action="ugames.php" method="post">
          <input type="hidden" value="<?php echo $row['id'] ?>" name='userid'>
          <button target="_blank" type="submit" class="btn btn-primary">Последние игры</a>
      </form></td>
  </tr>  
<? endwhile ?>
</tbody>
</table>
