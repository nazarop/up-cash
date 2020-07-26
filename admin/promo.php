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

$sql_select = "SELECT * FROM svuti_promo";
$result = mysql_query($sql_select);
include("header.php");
?>

<button type="button" class="btn btn-primary mb-3 mt-3" data-toggle="modal" data-target="#exampleModal">
  Добавить
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Добавить промо</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="promoHandler.php" method="POST" >
            <div class="form-group">
                <label for="promo">Название</label>
                <input type="text" name="promo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="promo">Количество</label>
                <input type="integer" name="activelimit" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="promo">Сумма</label>
                <input type="integer" name="summa" class="form-control" required>
            </div>
            <input type="hidden" name="type" value="add">
            <button type="submit" class="btn btn-primary">Добавить</button>
         </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        
      </div>
    </div>
  </div>
</div>
<table class="table table-dark table-striped">
<thead>
<tr>
    <td>ID</td>
    <td>Название</td>
    <td>Количество (Использовано)</td>
    <td>Количество (Всего)</td>
    <td>Сумма</td>
    <td>Удалить</td>
</tr>
</thead>
<tbody>
    
<?php while($row = mysql_fetch_array($result)): ?>
  <tr>
      <td><? echo $row['id'] ?></td>
      <td><? echo $row['promo'] ?></td>
      <td><? echo $row['active'] ?></td>
      <td><? echo $row['activelimit'] ?></td>
      <td><? echo $row['summa'] ?></td>
      <td>
        <form action="promoHandler.php" method="POST">
            <input type="hidden" name="id" value="<? echo $row['id'] ?> ">
            <input type="hidden" name="type" value="delete">
            <button type="submit" class="btn btn-danger">X</button>
        </form>      
      </td>

  </tr>  
<? endwhile ?>
</tbody>
</table>
<script src="http://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
<? } ?>