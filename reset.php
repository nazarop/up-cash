<?php
require("inc/bd.php");

if($_POST['pass'] == "")
{
$hash = $_GET['id'];
	$sql_select = sprintf("SELECT * FROM `svuti_email` WHERE `hash`='%s'", mysql_real_escape_string($hash));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{
$goid = $row['user_id'];
		$sql_select = sprintf("SELECT * FROM `svuti_users` WHERE `id`='%s'", mysql_real_escape_string($goid));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{
	$login = $row['login'];
}
	if(time() > $row['data'])
	{
	 $body = <<<HERE
	 
	 <html lang="ru" data-textdirection="ltr" class="loaded" slick-uniqueid="12">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="referrer" content="no-referrer">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="icon" type="image/x-icon" href="files/favicon.ico" />
<title>UPCASH восстановление пароля</title>
<link rel="shortcut icon" type="image/x-icon" href="/">
<link rel="stylesheet" type="text/css" href="/files/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/files/style.min.css">
<link rel="stylesheet" type="text/css" href="/files/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/files/bootstrap-extended.min.css">
<link rel="stylesheet" type="text/css" href="/files/app.min.css">
<link rel="stylesheet" type="text/css" href="/files/colors.min.css">
<link rel="stylesheet" type="text/css" href="/files/style.css">
<script src="/files/jquery-latest.js"></script>
</head><body data-open="click" data-menu="horizontal-menu" data-col="2-columns" class="horizontal-layout horizontal-menu 2-columns    menu-expanded " cz-shortcut-listen="true"><div class="app-content container center-layout" style="padding-right:0px!important;"><div class="content-wrapper"><div class="content-body"><!--native-font-stack --><section id="description-list-alignment"><div class="row"><div class="col-sm-6 offset-sm-3"><div class="card"><div class="card-header"><h4 class="card-title text-xs-center"><b>Восстановление пароля для </b><small class="text-muted " style="font-size:90%">$login</small></h4></div>
            <div class="card-body collapse in">
                <div class="card-block">
				<script>
		function new_reset_pass() {
																		if ($('#pass').val().length < 5) {
                                                                            $('#error_reset').css('display', 'block');
                                                                            return $('#error_reset').html('Пароль от 5 символов');
                                                                        }
                                                                        if ($('#pass').val() != $('#repeatPass').val()) {
                                                                            $('#error_reset').css('display', 'block');
                                                                            return $('#error_reset').html('Пароли не совпадают');
                                                                        } 
																		

                                                                        $.ajax({
                                                                            type: 'POST',
                                                                            url: 'action.php',
                                                                            beforeSend: function() {
                                                                                $('#error_reset').css('display', 'none');
                                                                            },
                                                                            data: {
                                                                                type: "newResetPass",
                                                                                string: "OTIzNzl8NjFmZTJjY2Q0YjQ5OTlhMDM2MDMzMGZkMGM1M2E1NWZ8ZjRmNDQxZmIyMTkzYzEyOWRiNGY3OWQwNjNhMDI3MzU=",
                                                                                pass: $('#pass').val(),
                                                                            },
                                                                            success: function(data) {
												
                                                                                var obj = jQuery.parseJSON(data);
                                                                                if ('success' in obj) {
                                                                                    Cookies.set('sid', obj.success.sid, { path: '/' });
																					window.location.href = '';
																					// return false;
                                                                                }else{
																				$('#error_reset').html(obj.error);
                                                                                $('#error_reset').css('display', '');
																				}
                                                                            }
                                                                        });
                                                                    }
		</script>
		<form method="POST" action="/reset.php">
                    <div class="card-text">
                        <div class="form-group">
									<label>Новый пароль</label>
									<div class="position-relative has-icon-left">
										<input type="password" id="pass" name="pass" class="form-control" placeholder="" value="">
										<input type="hidden" id="hash" name="hash" class="form-control" placeholder="" value="$hash">
										<div class="form-control-position">
											<i class="ft-lock"></i>
										</div>
									</div>
								</div>
								 <a id="error_reset" class="btn  btn-block btnError" style="color:#fff;display:none">Пароли не совпадают</a>
								<div class="col-lg-4 offset-lg-4">
		<input style="margin-top:15px;color:#fff;background: #303030!important; border: 0px solid; " type="submit" value="Изменить" class="bg-blue-grey bg-lighten-2  btn  btn-block mr-1 mb-1"></input>
		</form>
		<script src="/files/js.cookie.js" type="text/javascript"></script>
		<script>$(function() {window.history.replaceState(null, null, window.location.pathname);});</script>
</div></div></div></div></div></div></div></section></div></div></div></body></html>

HERE;
	 
	}
	else
	{
		$body = <<<HERE
		
			<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="referrer" content="no-referrer">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="/files/fav_logo.ico">
<title>UPCASH восстановление пароля</title>
<link rel="shortcut icon" type="image/x-icon" href="/">
<link rel="stylesheet" type="text/css" href="/files/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/files/style.min.css">
<link rel="stylesheet" type="text/css" href="/files/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/files/bootstrap-extended.min.css">
<link rel="stylesheet" type="text/css" href="/files/app.min.css">
<link rel="stylesheet" type="text/css" href="/files/colors.min.css">
<link rel="stylesheet" type="text/css" href="/files/style.css">
<script src="/files/jquery-latest.js"></script>
</head>	
<body data-open="click" data-menu="horizontal-menu" data-col="2-columns" class="horizontal-layout horizontal-menu 2-columns    menu-expanded " cz-shortcut-listen="true"><div class="app-content container center-layout" style="padding-right:0px!important;"><div class="content-wrapper"><div class="content-body"><!--native-font-stack --><section id="description-list-alignment"><div class="row"><div class="col-sm-6 offset-sm-3"><div class="card"><div class="card-header"><h4 class="card-title text-xs-center"><b>Восстановление пароля для </b><small class="text-muted " style="font-size:90%"></small></h4></div>
            <div class="card-body collapse in">
                <div class="card-block">
				
		Ссылка больше не действительна!</div></div></div></div></div></section></div></div></div>
</body>	
HERE;
	}
}
else
{
	$body = <<<HERE
	
			<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="referrer" content="no-referrer">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="/files/fav_logo.ico">
<title>UPCASH восстановление пароля</title>
<link rel="shortcut icon" type="image/x-icon" href="/">
<link rel="stylesheet" type="text/css" href="/files/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/files/style.min.css">
<link rel="stylesheet" type="text/css" href="/files/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/files/bootstrap-extended.min.css">
<link rel="stylesheet" type="text/css" href="/files/app.min.css">
<link rel="stylesheet" type="text/css" href="/files/colors.min.css">
<link rel="stylesheet" type="text/css" href="/files/style.css">
<script src="/files/jquery-latest.js"></script>
</head>	
<body data-open="click" data-menu="horizontal-menu" data-col="2-columns" class="horizontal-layout horizontal-menu 2-columns    menu-expanded " cz-shortcut-listen="true"><div class="app-content container center-layout" style="padding-right:0px!important;"><div class="content-wrapper"><div class="content-body"><!--native-font-stack --><section id="description-list-alignment"><div class="row"><div class="col-sm-6 offset-sm-3"><div class="card"><div class="card-header"><h4 class="card-title text-xs-center"><b>Восстановление пароля для </b><small class="text-muted " style="font-size:90%"></small></h4></div>
            <div class="card-body collapse in">
                <div class="card-block">
				
		Ссылка больше не действительна!</div></div></div></div></div></section></div></div></div>
</body>
HERE;
}
echo "$body";
}
else
{
		$hash = $_POST['hash'];
		$sql_select = sprintf("SELECT * FROM `svuti_email` WHERE `hash`='%s'", mysql_real_escape_string($hash));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{
		$sql_select = "SELECT * FROM `svuti_users` WHERE `id`='".$row['user_id']."'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{
	$loginq = $row['login'];
	$ida = $row['id'];
}
	if(time() > $row['data'])
	{
		$delite = "DELETE FROM `svuti_email` WHERE user_id='$ida'";
mysql_query($delite);
$pass = $_POST['pass'];
$newPass = password_hash($pass, PASSWORD_BCRYPT);
$insert = "UPDATE `svuti_users` SET `password`='$newPass' WHERE id='$ida'";
mysql_query($insert) or die(mysql_error());
echo '<meta http-equiv="refresh" content="0;URL=/">';
	}
	else
	{
		echo <<<HERE
	
			<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="referrer" content="no-referrer">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="/files/fav_logo.ico">
<title>UPCASH восстановление пароля</title>
<link rel="shortcut icon" type="image/x-icon" href="/">
<link rel="stylesheet" type="text/css" href="/files/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/files/style.min.css">
<link rel="stylesheet" type="text/css" href="/files/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/files/bootstrap-extended.min.css">
<link rel="stylesheet" type="text/css" href="/files/app.min.css">
<link rel="stylesheet" type="text/css" href="/files/colors.min.css">
<link rel="stylesheet" type="text/css" href="/files/style.css">
<script src="/files/jquery-latest.js"></script>
</head>	
<body data-open="click" data-menu="horizontal-menu" data-col="2-columns" class="horizontal-layout horizontal-menu 2-columns    menu-expanded " cz-shortcut-listen="true"><div class="app-content container center-layout" style="padding-right:0px!important;"><div class="content-wrapper"><div class="content-body"><!--native-font-stack --><section id="description-list-alignment"><div class="row"><div class="col-sm-6 offset-sm-3"><div class="card"><div class="card-header"><h4 class="card-title text-xs-center"><b>Восстановление пароля для </b><small class="text-muted " style="font-size:90%"></small></h4></div>
            <div class="card-body collapse in">
                <div class="card-block">
				
		Ссылка больше не действительна!</div></div></div></div></div></section></div></div></div>
</body>
HERE;
	}
	}
}
?>