<?php
$depobon = 0;
	
///online///
$sql_select = "SELECT COUNT(*) FROM svuti_users WHERE online='1'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
$sssql = "SELECT * FROM online";
$res = mysql_query($sssql) or die(mysql_error());
$rrr = mysql_fetch_array($res);
$addonl = $rrr['curr'];
$online = $row['COUNT(*)'] + $addonl;
///online///
///

if($_GET['i'])
{
setcookie('ref', $_GET['i'], time()+360000, '/');
}
///
if($_COOKIE["sid"] == "")
{

$go = <<<HERE
	
					                         <div class="row">
                            <div class="col-xs-12">
                                <div class="card" style="border-radius:20px!important;">
                                    <div class="card-body" style="box-shadow: rgba(210, 215, 222, 0.5) 7px 10px 23px -11px;border-radius: 20px!important;">
                                        <div class="row">
                                            <div class="col-lg-6  col-md-12 col-sm-12 ">
                                                <div id="what-is" class="card" style="border-radius:20px!important;">
                                                    <div  class="card-header"   style="border-radius: 20px!important;">
                                                        <h4 class="card-title"><b>Что такое UPCASH?</b></h4>

                                                    </div>
                                                    <div class="card-body collapse in">
                                                        <div class="card-block">
                                                            <div class="card-text">
                                                                <p style="font-size:15.5px">Сервис мгновенных игр, где шанс выигрыша указываете сами. </p>
                                                                <ul>
                                                                    <li>Денежный бонус при регистрации</li>
                                                                    <li>Быстрые выплаты без комиссий и прочих сборов</li>
                                                                    <li>Проверяйте на честность любую игру</li>
                                                                    <li>Дополнительно зарабатывайте на рефералах</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6  col-md-12 col-sm-12 ">
                                                <div id="login">
                                                    
                                                    <div class="col-lg-10 offset-lg-1">
													<div class="card-header no-border pb-0">
                                                        <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span style="font-size:17px"> Авторизация </span></h6>
                                                    </div>
                                                        <div class="card-body collapse in">
                                                            <div class="card-block">
                                                                <form class="form-horizontal">
                                                                    <fieldset class="form-group position-relative has-icon-left">
                                                                        <input type="text" class="form-control form-control-md input-md" id="userLogin" value="" placeholder="Логин"  >
                                                                        <div class="form-control-position">
                                                                            <i class="ft-user"></i>
                                                                        </div>
                                                                    </fieldset>
                                                                    <fieldset class="form-group position-relative has-icon-left">
                                                                        <input type="password" class="form-control form-control-md input-md" id="userPass" placeholder="Пароль">
                                                                        <div class="form-control-position">
                                                                            <i class="ft-lock"></i>
                                                                        </div>
                                                                    </fieldset>
																
                                                                    <a id="error_enter" class="btn  btn-block btnError" style="color:#fff;display:none;border-radius:150px;"></a>

                                                                    <a id="enter_but" onclick="login()" class="btn   btn-block btnEnter" style="color:#fff;margin-bottom:5px;border-radius:150px;">
                                                                        <center><span id="text_enter"> <i class="ft-unlock"></i>  Войти</span>

                                                                            <div id="loader" style="position:absolute">
                                                                                <div id='dot-container' style='display:none'>
                                                                                    <div id="left-dot" class='white-dot'></div>
                                                                                    <div id='middle-dot' class='white-dot'></div>
                                                                                    <div id='right-dot' class='white-dot'></div>
                                                                                </div>
                                                                            </div>

                                                                        </center>
                                                                    </a>
                                                                </form>
                                                            </div>
                                                        </div>

                                                        <div class="card-footer no-border" style="margin-top:-12x">
                                                            <p class="float-sm-left text-xs-center"><a onclick="register_show()" class="card-link">Регистрация</a></p>
                                                            <p class="float-sm-right text-xs-center"><a onclick="reset_show()" class="card-link">Забыли пароль? </a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="register" style="display:none">
                                                   
                                                    <div class="col-lg-10 offset-lg-1">
													 <div class="card-header no-border pb-0" >
                                                        <h6  class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span style="font-size:17px">Регистрация </span></h6>
                                                    </div>
                                                        <div class="card-body collapse in">
                                                            <div class="card-block">
                                                                <form class="form-horizontal" >
                                                                    <fieldset class="form-group position-relative has-icon-left">
                                                                        <input type="text" class="form-control form-control-md input-md" id="userLoginRegister" placeholder="Логин">
                                                                        <div class="form-control-position">
                                                                            <i class="ft-user"></i>
                                                                        </div>
                                                                    </fieldset>
                                                                    <fieldset class="form-group position-relative has-icon-left">
                                                                        <input type="email" class="form-control form-control-md input-md" id="userEmailRegister" placeholder="E-mail">
                                                                        <div class="form-control-position">
                                                                            <i class="ft-mail"></i>
                                                                        </div>
                                                                    </fieldset>
                                                                    <fieldset class="form-group position-relative has-icon-left">
                                                                        <input type="password" class="form-control form-control-md input-md" id="userPassRegister" placeholder="Пароль">
                                                                        <div class="form-control-position">
                                                                            <i class="ft-lock"></i>
                                                                        </div>
                                                                    </fieldset>
																	<fieldset style="padding-bottom: 7px;">
																		<label class="check1">
																		  <input id="rulesagree" type="checkbox"/>
																		  <div class="box1"></div>
																		 
																		 
																		</label>
																		 <div style="display:inline-block;padding-left:10px;position:absolute">Согласен c <u data-toggle="modal" data-target="#large" style="cursor:pointer">правилами</u></div>
																	</fieldset>
                                                                    <a id="error_register" class="btn  btn-block btnError" style="color:#fff;display:none;border-radius:150px;"></a>
                                                                    <a onclick="register1()" class="btn   btn-block btnEnter" style="color:#fff;margin-bottom:5px;border-radius:150px;">

                                                                        <center><span id="text_register"><i class="ft-check"></i> Зарегистрироваться</span>

                                                                            <div id="loader_register" style="position:absolute">
                                                                                <div id='dot-container_register' style='display:none'>
                                                                                    <div id="left-dot_register" class='white-dot'></div>
                                                                                    <div id='middle-dot_register' class='white-dot'></div>
                                                                                    <div id='right-dot_register' class='white-dot'></div>
                                                                                </div>
                                                                            </div>

                                                                        </center>
                                                                    </a>
                                                                </form>
                                                            </div>
                                                        </div>

                                                        <div class="card-footer no-border" style="margin-top:-12px">
                                                            <p class="float-sm-left text-xs-center"><a onclick="login_show()" class="card-link">Есть аккаунт</a></p>
                                                            <p class="float-sm-right text-xs-center"><a onclick="reset_show()" class="card-link">Забыли пароль? </a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="reset" style="display:none">
                                                    
                                                    <div class="col-lg-10 offset-lg-1">
													<div class="card-header no-border pb-0">
                                                        <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span style="font-size:17px">Вспомнить пароль</span></h6>
                                                    </div>
                                                        <div class="card-body collapse in">
                                                            <div class="card-block">
                                                             
                                                                    <fieldset class="form-group position-relative has-icon-left">
                                                                        <input type="text" class="form-control form-control-md input-md" id="loginemail" placeholder="Логин или E-mail">
                                                                        <div class="form-control-position">
                                                                            <i class="ft-search"></i>
                                                                        </div>
                                                                    </fieldset>
																	<div style="display: none; padding-bottom:11px" class="g-recaptcha" data-sitekey="6LeYb0oUAAAAAM6G7jpHFGk130MAXna9DL8D8RSA"></div> 
                                                                    <a id="error_reset" class="btn  btn-block btnError" style="color:#fff;display:none;border-radius:150px;"></a>
                                                                    <a id="reset_success" class="btn  btn-block btnSuccess" style="color:#fff;display:none;border-radius:150px"></a>
                                                                    <a  id="reset_but" onclick="reset_password()" class="btn   btn-block btnEnter" style="color:#fff;margin-bottom:5px;border-radius:150px;">

                                                                        <center><span id="text_reset"><i class="ft-check"></i> Вспомнить</span>

                                                                            <div id="loader_reset" style="position:absolute">
                                                                                <div id='dot-container_reset' style='display:none'>
                                                                                    <div id="left-dot_reset" class='white-dot'></div>
                                                                                    <div id='middle-dot_reset' class='white-dot'></div>
                                                                                    <div id='right-dot_reset' class='white-dot'></div>
                                                                                </div>
                                                                            </div>

                                                                        </center>
                                                                    </a>                                                               
                                                            </div>
                                                        </div>
 
                                                        <div class="card-footer no-border" style="margin-top:-12px">
                                                            <p class="float-sm-left text-xs-center"><a onclick="login_show()" class="card-link">Есть аккаунт</a></p>
                                                            <p class="float-sm-right text-xs-center"><a onclick="register_show()" class="card-link">Регистрация </a></p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
HERE;
$panel = <<<HERE

<div data-menu="menu-container" class="navbar-container main-menu-content container center-layout">
                    <!-- include ../../../includes/mixins-->
                    <ul id="main-menu-navigation" data-menu="menu-navigation" class="nav navbar-nav">
                        <li class="dropdown nav-item active" onclick="$('.dsec').hide();$('#lastBets').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#lastBets').offset().top);">
                            <a class="dropdown-toggle nav-link"><span>Главная</span></a>

                        </li>
                        <li class="dropdown nav-item " id="gg" onclick="$('.dsec').hide();$('#realGame').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#realGame').offset().top);">
                            <a class="dropdown-toggle nav-link"><span>Честная игра</span></a>

                        </li>
                        <li class="dropdown nav-item " onclick="$('.dsec').hide();$('#rules').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#rules').offset().top);">
                            <a class="dropdown-toggle nav-link"><span>Как играть</span></a>
                        </li>

												<li class="dropdown nav-item " onclick="$('.dsec').hide();$('#contacts').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#contacts').offset().top);">
                            <a class="dropdown-toggle nav-link"><span>Контакты</span></a>
                        </li>
						<li class="dropdown nav-item " onclick="$('.dsec').hide();$('#lastWithdraw').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#lastWithdraw').offset().top);">
                            <a class="dropdown-toggle nav-link"><span>Выплаты</span></a>
                        </li>
						<button style="margin-top:12px;margin-left:15px;float:right;" class="flat_button logo_button  color3_bg" onclick="window.open('http://vk.com/upcashspace');">Вконтакте</button>
                    </ul>
                </div>

HERE;

}
else
{
	$hashh = $_COOKIE["sid"];
	$sql_select = sprintf("SELECT * FROM svuti_users WHERE hash='%s'", mysql_real_escape_string($hashh));
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row)
{	
$userhash = $row['hash'];
$userid = $row['id'];
$idref = $row['id'];
$balance = $row['balance'];
$login = $row['login'];
$bon = $row['bonus'];

	$chr = array("q", "Q", "e", "E", "r", "R", "t", "T", "y", "Y", "u", "U", "i", "I", "o", "O", "p", "P", "a", "A", "s", "S", "d", "D", "f", "F", "g", "G", "h", "H", "{", "}", "[", "]", "(", ")", "!", "@", "#", "$", "^", "%", "*", "&", "-", "+", "=");
for ($i=1; $i<=8; $i++) {
$salt1 .= $chr[rand(1,48)];
$salt2 .= $chr[rand(1,48)];
}
$number = rand(0, 999999);
$hash = hash('sha512', $salt1.$number.$salt2);

	$code = strToHex(encode($salt1.$number.$salt2, 'drkDmSBH4vLx9uvHNdJ6'));
$hid = implode("-", str_split($code, 4));
setcookie('hid', $hid, time()+31536000, '/');
if($depobon == 1)
{
	$bonus10 = <<<HERE
<div class="card" style="border-radius:20px!important;">
										<div class="card-body" style="box-shadow: rgb(210, 215, 222) 7px 10px 23px -11px;border-radius: 6px!important;">
                                                <div class="row">
													<div class="p-2 text-xs-center ">
													
													<h5>СЕГОДНЯ У НАС АКЦИЯ!</h5> 
													<center>
													<a id="enter_but" class="btn   btn-block btnEnter" style="color:#fff;width:240px;margin-top:6px;border-radius:150px;">
                                                                        +10% к пополнению</a></center>
													
													
													</div>
												</div>
												</div>
											</div>
HERE;
}
if($bon == 0)
{
	$bonusrow = <<<HERE
<div class="col-xs-12" id="bonusRow">
										
                                        <div class="card" style="box-shadow: rgb(210, 215, 222) 7px 10px 23px -11px;border-radius: 20px!important;">
										<div class="card-header" style="border-radius: 20px!important;">
                                                    
                                                   
                                                     
													<div class="heading-elements">
                                                        <ul class="list-inline mb-0 font-medium-2">
                                                            <li onclick="hideBonus()" data-toggle="tooltip" data-placement="top" title="" data-original-title="Больше не показывать"><a><i class="ft-x"></i></a></li>
                                                           <script>
														   function hideBonus(){
										$.ajax({
											type: 'POST',
											url: 'action.php',
											data: {
												type: "hideBonus",
												sid: Cookies.get('sid'),
											},
											success: function(data) {
												var obj = jQuery.parseJSON(data);
												if (obj.success == "success") {
													 $('#bonusRow').hide();
												}
											}
										});
														   }
														   </script>
                                                        </ul>
                                                    </div>
													 
                                                </div>
                                            <div class="card-body" style="border-radius:20px!important;margin-top:-35px">
                                                <div class="row">
													<div class="p-2 text-xs-center ">
													
													<h5>Для получения денежного бонуса</h5> 
    													1. Подпишитесь на <a target="_blank" href="http://vk.com/upcashspace">группу Вконтакте.</a><br>
    													2. Отправьте в сообщения группы свой логин.
													<center>
													<a id="enter_but" onclick="hideBonus()" class="btn   btn-block btnEnter" style="color:#fff;width:240px;margin-top:6px;border-radius:150px;">Забрал</a></center>
													
													
													</div>
												</div>
												
											</div>
											<script>
											function getBonus() {
													if ($('#vkPage').val() == ''){
														$('#error_bonus').show();
														return $('#error_bonus').html('Введите страницу');
													}
													
													
												$.ajax({
                                                                            type: 'POST',
                                                                            url: 'action.php',
                                                                            data: {
                                                                                type: 'getBonus',
                                                                                sid: Cookies.get('sid'),
                                                                                vk: $('#vkPage').val(),
																				a:  Cookies.get('ab')
                                                                            },
                                                                            success: function(data) {
                                                                             var obj = jQuery.parseJSON(data);
                                                                                if (obj.success == "success") 
																				{
																						Cookies.set('ab', '1');
																						return location.href = "";
																				
																				}
																				if (obj.success == "error") {
																					$('#error_bonus').show();
																					return $('#error_bonus').html(obj.error);
																				}
                                                                            }
                                                                        });
											}
										</script>
										</div>
									</div>
HERE;
}
$sql_select = "SELECT COUNT(*) FROM svuti_payments WHERE user_id='".$userid."'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row['COUNT(*)'] == 0)
{
	$paymentss = '<tr><td colspan="6" class="text-xs-center">История пополнений пуста</td>                 
                        </tr>';
}
else
{
$sql_select33 = "SELECT * FROM svuti_payments WHERE user_id='".$userid."' ORDER BY `data` DESC";
$result33 = mysql_query($sql_select33);
$row33 = mysql_fetch_array($result33);
do
{

	$paymentss = $paymentss.'<tr style="cursor:default!important;""><td></td><td></td><td>'.$row33['data'].'<td>'.$row33['suma'].' <img src="../files/coins.svg" style="width: 20px; height: auto;"></td></td><td></td><td></td>

							</tr>';
}
while($row33 = mysql_fetch_array($result33));
}

$sql_select = "SELECT COUNT(*) FROM svuti_payout WHERE user_id='".$userid."' ORDER BY `data`";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
if($row['COUNT(*)'] == 0)
{
	$payouts = '<tr><td id="emptyHistory" colspan="4" class="text-xs-center">История пуста</td>
															</tr>';
}
else
{	
	$sql_select3 = "SELECT * FROM svuti_payout WHERE user_id='".$userid."' ORDER BY `data` DESC";
$result3 = mysql_query($sql_select3);
$row3 = mysql_fetch_array($result3);
do
{
	if($row3['status'] == "Обработка")
	{
		$tag = "warning";
		$s = '<div class="tag tag-danger" onclick="otmena()" value="'.$row3['id'].'" id="otmina">Удалить</div>';
	}
	if($row3['status'] == "Выполнено")
	{
		$tag = "success";
		$s = "";
	}
	if($row3['status'] == "Отменен")
	{
		$tag = "danger";
		$s = "";
	}
	$payouts = $payouts.'<tr style="cursor:default!important;" id="'.$row3['id'].'"><td>'.$row3['data'].'</td><td><img src="files/qiwi.png"> '.$row3['qiwi'].'</td><td>'.$row3['suma'].' <img src="../files/coins.svg" style="width: 20px; height: auto;"></td>
							<td><div class="tag tag-'.$tag.'">'.$row3['status'].' </div>'.$s.'</td>

							</tr>';
							$tag = "";
}
while($row3 = mysql_fetch_array($result3));

}
//go
$modal = <<<HERE

<div class="modal fade text-xs-left" id="deposit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#F5F7FA;border-radius:6px">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="ft-x"></i></span>
                        </button>
                        <h4 class="modal-title" style="font-weight:600; color:#303030;">Пополнение счета</h4>
                    </div>
                    <div class="modal-body">
                    <div class="row" style="padding-bottom:15px">
					<div class="col-lg-8 offset-lg-2" style="padding-bottom:5px">
					<h5 class="text-xs-center"> Если не получается пополнить, обновите кеш</h5>
					<br>
                                <h6>Через: </h6><h6> 
								</h6></div>
								<input id="systemPay" style="display:none">
		<div id="fkPay" onclick="$('#systemPay').val('1'); $('#fkPayActive').css('display','');
$('#QiwiPayActive').hide();$('#QiwiPay').css('opacity','0.25');
$('#ydPayActive').hide();$('#ydPay').css('opacity','0.25'); $('#fkPay').css('opacity','1');" style="cursor: pointer; opacity: 1;" class="offset-lg-2 col-lg-5 text-xs-center">
							 <img src="files/free-kassa.png" width="250px"> <img id="fkPayActive" src="files/checked.png" width="16px" style="position: absolute;display:none">
						</div>
						
					</div>
                    <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                                <h6>Cумма: </h6><h6> 
								<input onkeyup="validateWithdrawSize(this)" id="depositSize" class="form-control " value="1">
								<a id="error_deposit" class="btn  btn-block btnError" style="color:#fff;margin-top:15px;display:none;border-radius:150px;"></a>
								</h6></div>
								
								</div> 
								
								 <div class="row">
							 <div class="col-lg-4 offset-lg-4" style="margin-top:8px;margin-bottom:18px">
                                <a class="btn  btn-block  " style="color:#fff;border-radius:150px;background: #6c7a89!important;" onclick="deposit()">
                                    <span> Пополнить</span>
                                    
                                </a>
                            </div>
							<div class="col-lg-4 offset-lg-4">
							<div class="text-xs-center">
                                <svg id="depositLoad" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40px" height="40px" viewBox="0 0 100 100" style="background: none;display:none">
                                    <g transform="translate(50,50)">
                                        <circle cx="0" cy="0" r="7.142857142857143" fill="none" stroke="#31444f" stroke-width="2" stroke-dasharray="22.43994752564138 22.43994752564138" transform="rotate(337.283)">
                                            <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0" times="0;1" dur="1.6s" calcMode="spline" keySplines="0.2 0 0.8 1" begin="0" repeatCount="indefinite"></animateTransform>
                                        </circle>
                                        <circle cx="0" cy="0" r="14.285714285714286" fill="none" stroke="#465e6b" stroke-width="2" stroke-dasharray="44.87989505128276 44.87989505128276" transform="rotate(359.621)">
                                            <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0" times="0;1" dur="1.6s" calcMode="spline" keySplines="0.2 0 0.8 1" begin="-0.16666666666666666" repeatCount="indefinite"></animateTransform>
                                        </circle>
                                        <circle cx="0" cy="0" r="21.428571428571427" fill="none" stroke="#4c6470" stroke-width="2" stroke-dasharray="67.31984257692413 67.31984257692413" transform="rotate(15.8588)">
                                            <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0" times="0;1" dur="1.6s" calcMode="spline" keySplines="0.2 0 0.8 1" begin="-0.3333333333333333" repeatCount="indefinite"></animateTransform>
                                        </circle>
                                        <circle cx="0" cy="0" r="28.571428571428573" fill="none" stroke="#546E7A" stroke-width="2" stroke-dasharray="89.75979010256552 89.75979010256552" transform="rotate(50.6171)">
                                            <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0" times="0;1" dur="1.6s" calcMode="spline" keySplines="0.2 0 0.8 1" begin="-0.5" repeatCount="indefinite"></animateTransform>
                                        </circle>
                                        <circle cx="0" cy="0" r="35.714285714285715" fill="none" stroke="#fff" stroke-width="2" stroke-dasharray="112.1997376282069 112.1997376282069" transform="rotate(92.2943)">
                                            <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0" times="0;1" dur="1.6s" calcMode="spline" keySplines="0.2 0 0.8 1" begin="-0.6666666666666666" repeatCount="indefinite"></animateTransform>
                                        </circle>
                                        <circle cx="0" cy="0" r="42.857142857142854" fill="none" stroke="#fff" stroke-width="2" stroke-dasharray="134.63968515384826 134.63968515384826" transform="rotate(137.453)">
                                            <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0" times="0;1" dur="1.6s" calcMode="spline" keySplines="0.2 0 0.8 1" begin="-0.8333333333333334" repeatCount="indefinite"></animateTransform>
                                        </circle>
                                    </g>
                                </svg>
                            </div>
                            </div>
                            </div>
							<div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr style="cursor:default">
                                <th></th>
                                <th></th>
                                <th class="text-xs-center">Дата</th>
                                <th class="text-xs-center">Сумма</th>
                                <th></th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
						$paymentss
						</tbody>
                    </table>
                </div>
                    </div>
                </div>
            </div>
        </div>
                                           
        <div class="modal fade text-xs-left" id="promomodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header" style="background-color:#F5F7FA;border-radius:6px">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true"><i class="ft-x"></i></span>
											</button>
											<h4 class="modal-title" style="font-weight:600; color:#303030;">Промокоды</h4>
										  </div>
										  <div class="modal-body">
										  <div class="row">
							
											<div class="col-lg-8 offset-lg-2" style="margin-top:8px">
                                <h6>Промокод:</h6>
                                <input type="text" id="promo" class="form-control">

                            </div>
							
                            <div class="col-lg-8 offset-lg-2">
                                <a id="error_promo" class="btn  btn-block btnError" style="color:#fff;margin-top:15px;display:none;border-radius:150px;"></a>
								<a id="succes_promo" class="btn  btn-block btnSuccess" style="color:#fff; cursor:default;  margin-top:15px;display:none;border-radius:150px;"></a>
								</div>
								
							<div class="col-lg-4 offset-lg-4" style="margin-top:15px;margin-bottom:18px">
                                <a class="btn  btn-block  " style="color:#fff;margin-bottom:5px;background: #6c7a89!important;border-radius:150px;" onclick="active()">
                                   <span>  Активировать</span>
                                </a>
                            </div>
										  </div>
										  
										  </div>
										 
										</div>
									  </div>
									</div>
									
									 <div class="modal fade text-xs-left" id="promoCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header" style="background-color:#F5F7FA;border-radius:6px">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true"><i class="ft-x"></i></span>
											</button>
											<h4 class="modal-title" style="font-weight:600; color:#303030;">Промокоды</h4>
										  </div>
										  <div class="modal-body">
										  <div class="row">
							
											<div class="col-lg-8 offset-lg-2" style="margin-top:8px">
                                <h6>Название</h6>
                                <input type="text" id="promoN" class="form-control">
								<h6>Сумма</h6>
                                <input type="text" id="activelimitN" class="form-control">
								<h6>Кол-во активаций</h6>
                                <input type="text" id="promoN" class="form-control">

                            </div>
							
                            <div class="col-lg-8 offset-lg-2">
                                <a id="error_promoc" class="btn  btn-block btnError" style="color:#fff;margin-top:15px;display:none;border-radius:150px;"></a>
								<a id="succes_promoc" class="btn  btn-block btnSuccess" style="color:#fff; cursor:default;  margin-top:15px;display:none;border-radius:150px;"></a>
								</div>
								
							<div class="col-lg-4 offset-lg-4" style="margin-top:15px;margin-bottom:18px">
                                <a class="btn  btn-block  " style="color:#fff;margin-bottom:5px;background: #6c7a89!important;border-radius:150px;" onclick="addPromo()">
                                   <span>  Создать</span>
                                </a>
                            </div>
										  </div>
										  
										  </div>
										 
										</div>
									  </div>
									</div>
									
									
									
<div class="modal fade text-xs-left" id="toperson" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header" style="background-color:#F5F7FA;border-radius:6px">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true"><i class="ft-x"></i></span>
											</button>
											<h4 class="modal-title" style="font-weight:600; color:#303030;">Передача баланса</h4>
										  </div>
										  <div class="modal-body">
										  <div class="row">
											<div class="col-lg-8 offset-lg-2" style="margin-top:8px">
<h6>Логин получателя:</h6>
                                <input type="text" id="toperson1" class="form-control"><br>
                                <h6>Сумма:</h6>
                                <input type="text" id="person" class="form-control" onkeyup="var yratext=/['А-я','A-z']/; if(yratext.test(this.value)) this.value=''">

                            </div>
							
                            <div class="col-lg-8 offset-lg-2">
                                <a id="error_person" class="btn  btn-block btnError" style="color:#fff;margin-top:15px;display:none;border-radius:150px"></a>
								<a id="succes_person" class="btn  btn-block btnSuccess" style="color:#fff; cursor:default;  margin-top:15px;display:none;border-radius:150px"></a>
								</div>
								
							<div class="col-lg-4 offset-lg-4" style="margin-top:15px;margin-bottom:18px">
                                <a class="btn  btn-block  " style="color:#fff;background: #6c7a89!important;border-radius:150px;" onclick="person()">
                                   <span>  Передать</span>
                                </a>
                            </div>
										  </div>
										  
										  </div>
										 
										</div>
									  </div>
									</div>
		<div class="modal fade text-xs-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header" style="background-color:#F5F7FA;border-radius:6px">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true"><i class="ft-x"></i></span>
											</button>
											<h4 class="modal-title" style="font-weight:600; color:#303030;">Смена пароля</h4>
										  </div>
										  <div class="modal-body">
										  <div class="row">
											<div class="col-lg-8 offset-lg-2" style="margin-top:8px">
                                <h6>Новый пароль:</h6>
                                <input type="password" id="resetPass" class="form-control">

                            </div><div class="col-lg-8 offset-lg-2" style="margin-top:8px">
                                <h6>Повторите пароль:</h6>
                                <input type="password" id="resetPassRepeat" class="form-control">

                            </div>
							
                            <div class="col-lg-8 offset-lg-2">
                                <a id="error_resetPass" class="btn  btn-block btnError" style="color:#fff;margin-top:15px;display:none"></a>
								<a id="succes_resetPass" class="btn  btn-block btnSuccess" style="color:#fff; cursor:default;  margin-top:15px;display:none;">Пароль изменен</a>
								</div>
								
							<div class="col-lg-4 offset-lg-4" style="margin-top:15px;margin-bottom:18px">
                                <a class="btn  btn-block  " style="color:#fff;background: #6c7a89!important;border-radius:150px;" onclick="resetPass()">
                                   <span>  Изменить</span>
                                </a>
                            </div>
										  </div>
										  
										  </div>
										 
										</div>
									  </div>
									</div>

<div class="modal fade text-xs-left" id="withdraw" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#F5F7FA;border-radius:6px">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="ft-x"></i></span>
                        </button>
                        <h4 class="modal-title" style="font-weight:600; color:#303030;">Вывод средств</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
							<h5 class="text-xs-center"> Выплаты от 5 минут до 12 часов</h5>
							<h5 class="text-xs-center"> Все комиссии берем на себя</h5>
							<br>
                                <h6>Cумма: </h6><h6> 
								<input onkeyup="validateWithdrawSize(this)" id="WithdrawSize" class="form-control " value="">
								</h6></div>
								</div>
								<div class="row">

<div class="col-lg-8 offset-lg-2">
											<h6>Платежная система:</h6>
                                <select class="hide-search form-control select2-hidden-accessible" id="hide_search" onchange="withdrawSelect()" tabindex="-1" aria-hidden="true">
                                    <optgroup label="Платежные системы">
                                        <option value="1">Qiwi</option>
                                       <option value="2">ЯндексДеньги</option>
</optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-8 offset-lg-2" style="margin-top:8px">
                                <h6 id="nameWithdraw">Номер телефона:</h6>
                                <input id="walletNumber" class="form-control" placeholder="+79871540280">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                                <a id="error_withdraw" class="btn  btn-block btnError" style="color:#fff;display:none;margin-top:15px;border-radius:150px"></a>
                                <a id="succes_withdraw" class="btn  btn-block btnSuccess" style="color:#fff; cursor:default;  margin-top:15px;display:none;border-radius:150px;">Выплата успешно создана</a>
                            </div>
                            <div class="col-lg-4 offset-lg-4" style="margin-top:15px;margin-bottom:18px">
                                <a class="btn  btn-block  " style="color:#fff;background: #6c7a89!important;border-radius:150px;" onclick="withdraw()">
                                    <center><span id="withdrawB" >  Выплата</span>

                                        <div id="loader" style="display:none">
                                            <div id="dot-container">
                                                <div id="left-dot" class="white-dot"></div>
                                                <div id="middle-dot" class="white-dot"></div>
                                                <div id="right-dot" class="white-dot"></div>
                                            </div>
                                        </div>

                                    </center>
                                </a>
                            </div>
                        </div>
						
						<br>
						<h5 class="text-xs-center"> Если хотите вернуть деньги обратно на баланс, нажмите на удалить</h5>
						<br>
<div class="table-responsive">
                        <table class="table mb-0" id="withdrawTable">
                            <thead>
<th style="width:1%">Дата</th>
                                    <th style="width:62%">Описание </th>
                                    <th style="width:100%">Сумма</th>
                                    <th>Статус</th>

                                </tr>
                            </thead>
                            <tbody id="withdrawT">
                               
                           
$payouts
                         </tbody>
                        </table>						</div>
						<div id="sh"></div>
                          
                            <div class="text-xs-center">
                                <svg id="withdrawHistoryLoad" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40px" height="40px" viewBox="0 0 100 100" style="background: none;display:none">
                                    <g transform="translate(50,50)">
                                        <circle cx="0" cy="0" r="7.142857142857143" fill="none" stroke="#31444f" stroke-width="2" stroke-dasharray="22.43994752564138 22.43994752564138" transform="rotate(15.8588)">
                                            <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0" times="0;1" dur="1.6s" calcMode="spline" keySplines="0.2 0 0.8 1" begin="0" repeatCount="indefinite"></animateTransform>
                                        </circle>
                                        <circle cx="0" cy="0" r="14.285714285714286" fill="none" stroke="#465e6b" stroke-width="2" stroke-dasharray="44.87989505128276 44.87989505128276" transform="rotate(50.6171)">
                                            <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0" times="0;1" dur="1.6s" calcMode="spline" keySplines="0.2 0 0.8 1" begin="-0.16666666666666666" repeatCount="indefinite"></animateTransform>
                                        </circle>
                                        <circle cx="0" cy="0" r="21.428571428571427" fill="none" stroke="#4c6470" stroke-width="2" stroke-dasharray="67.31984257692413 67.31984257692413" transform="rotate(92.2943)">
                                            <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0" times="0;1" dur="1.6s" calcMode="spline" keySplines="0.2 0 0.8 1" begin="-0.3333333333333333" repeatCount="indefinite"></animateTransform>
                                        </circle>
                                        <circle cx="0" cy="0" r="28.571428571428573" fill="none" stroke="#546E7A" stroke-width="2" stroke-dasharray="89.75979010256552 89.75979010256552" transform="rotate(137.453)">
                                            <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0" times="0;1" dur="1.6s" calcMode="spline" keySplines="0.2 0 0.8 1" begin="-0.5" repeatCount="indefinite"></animateTransform>
                                        </circle>
                                        <circle cx="0" cy="0" r="35.714285714285715" fill="none" stroke="#fff" stroke-width="2" stroke-dasharray="112.1997376282069 112.1997376282069" transform="rotate(184.948)">
                                            <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0" times="0;1" dur="1.6s" calcMode="spline" keySplines="0.2 0 0.8 1" begin="-0.6666666666666666" repeatCount="indefinite"></animateTransform>
                                        </circle>
                                        <circle cx="0" cy="0" r="42.857142857142854" fill="none" stroke="#fff" stroke-width="2" stroke-dasharray="134.63968515384826 134.63968515384826" transform="rotate(230.652)">
                                            <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0" times="0;1" dur="1.6s" calcMode="spline" keySplines="0.2 0 0.8 1" begin="-0.8333333333333334" repeatCount="indefinite"></animateTransform>
                                        </circle>
                                    </g>
                                </svg>
                            </div>

                    </div>

                </div>
            </div>
			
        </div>

HERE;
$hashh = $_COOKIE["sid"];
	$sql_select = "SELECT * FROM svuti_users WHERE hash='$hashh'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
$prava = $row['prava'];
if($prava == 1)
{
	$adm = <<<HERE
	<li class="dropdown nav-item " style="float:right!impotant" onclick="window.open('/admin');">
                            <a class="dropdown-toggle nav-link"><span>Админка</span></a>
                        </li>
HERE;
}
$panel = <<<HERE
<script>
updateBalance(0,$balance);
</script>
<div data-menu="menu-container" class="navbar-container main-menu-content container center-layout">
                    <!-- include ../../../includes/mixins-->
                    <ul id="main-menu-navigation" data-menu="menu-navigation" class="nav navbar-nav">
                    <!-- <li class="dropdown nav-item">
                            <a class="dropdown-toggle nav-link"></a>
                     </li> -->
                        <li class="dropdown nav-item active" onclick="$('.dsec').hide();$('#lastBets').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#lastBets').offset().top);document.getElementById('coinflip').style.display='block';
document.getElementById('crash').style.display='none';">
                            <a class="dropdown-toggle nav-link"><span>Главная</span></a>

                     </li>
                     <li class="dropdown nav-item " id="gg">
                            <a target="_blank" href="http://vk.com/upcashspace?w=wall-102866645_1021" class="dropdown-toggle nav-link"><span><b>КОНКУРС</b></span></a>

                        </li>
                        <li class="dropdown nav-item " id="gg" onclick="$('.dsec').hide();$('#realGame').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#realGame').offset().top);">
                            <a class="dropdown-toggle nav-link"><span>Честная игра</span></a>

                        </li>
                        <li class="dropdown nav-item " onclick="$('.dsec').hide();$('#rules').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#rules').offset().top);">
                            <a class="dropdown-toggle nav-link"><span>Как играть</span></a>
                        </li>

						                        <li id="setPop" data-toggle="modal" data-target="#default" class="dropdown nav-item " style="float:right!impotant">
                            <a class="dropdown-toggle nav-link"><span>Настройки</span></a>
                        </li> <li class="dropdown nav-item " style="float:right!impotant" onclick="$('.dsec').hide();$('#referals').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#referals').offset().top);">
                            <a class="dropdown-toggle nav-link"><span>Мои рефералы</span></a>
                        </li> 
						
												<li class="dropdown nav-item " onclick="$('.dsec').hide();$('#contacts').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#contacts').offset().top);">
                            <a class="dropdown-toggle nav-link"><span>Контакты</span></a>
                        </li>
						<li class="dropdown nav-item " onclick="$('.dsec').hide();$('#lastWithdraw').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#lastWithdraw').offset().top);">
                            <a class="dropdown-toggle nav-link"><span>Выплаты</span></a>
                        </li>
<li class="dropdown nav-item " onclick="$('.dsec').hide();$('#comment').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#comment').offset().top);">
                            <a class="dropdown-toggle nav-link"><span>Отзывы</span></a>
                        </li>
						$adm
												<li id="exit" class="dropdown nav-item " style="float:right!impotant" onclick="Cookies.set('sid', '');location.href = '/';">
                            <a class="dropdown-toggle nav-link"><span>Выйти</span></a>
                        </li>
						                        <script>
                            $(function() {
                                $("#main-menu-navigation  li").click(function() {
                                    
									if ($(this).attr('id') !== 'setPop' && $(this).attr('id') !== 'exit'){
										$("#main-menu-navigation  li").removeClass("active");
										$(this).toggleClass("active");
									}
                                    
                                })
                            });
                        </script>
						<button style="margin-top:12px;margin-left:15px;float:right;" class="flat_button logo_button  color3_bg" onclick="window.open('http://vk.com/upcashspace');">Вконтакте</button>
                    </ul>
                </div>

HERE;
$hashh = $_COOKIE["sid"];
	$sql_select = "SELECT * FROM svuti_users WHERE hash='$hashh'";
$result = mysql_query($sql_select);
$row = mysql_fetch_array($result);
$yout = $row['youtube'];
if($yout == 1)
{
	$yts = '<i class="fab fa-youtube danger"></i>';
} 
$go = <<<HERE
<div class="row" id="coinflip">
																$bonusrow
									                                   <div class="col-xs-12">
$bonus10

                                        <div class="card" style="border-radius:20px!important;">
                                            <div class="card-body" style="box-shadow: rgb(210, 215, 222) 7px 10px 23px -11px;border-radius: 20px!important;">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-12 col-sm-12 ">
													
                                                        <div class="p-1 text-xs-center mt52">
                                                            <h2 class="display-6 blue-grey darken-1" style="text-transform: capitalize!important;">$yts $login </h2>
                                                            <h3 class="display-4 blue-grey darken-1"><span class="odometer odometer-auto-theme"  id="userBalance" mybalance="$balance"><div class="odometer-inside"><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">0</span></span></span></span></span></div></span> <img src="../files/coins.svg" style="width: 56px; height: auto;"></h3>

                                                            <div class="card-body">
                                                                <center>
															
                                                                    <ul class="list-inline list-inline-pipe" style="font-size:15px">
                                                                        <li data-toggle="modal" data-target="#deposit" style="cursor:pointer;">Пополнить</li>
                                                                        <li data-toggle="modal" data-target="#promomodal" style="cursor:pointer;">Промокоды </li>
                                                                        <li data-toggle="modal" data-target="#withdraw" style="cursor:pointer;">Вывод </li>
                                                                        

                                                                    </ul>

                                                                </center>
																	
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12 border-right-blue-grey border-right-lighten-5 border-left-blue-grey border-left-lighten-5">
                                                        <div class="p-1">

                                                            <div class="card-body" style="margin-top:2px;">

                                                                <div id="controlBet" class="row">
                                                                    <div class="col-md-6 col-xs-6">
                                                                        <div class="form-group">
                                                                            <span class="blue-grey darken-1 text-xs-center">Размер игры </span>
                                                                            <input id="BetSize" onkeyup="validateBetSize(this); updateProfit();" class="form-control text-xs-center" value="1">
                                                                            <div style="margin-top:10px;-webkit-user-select: none;" class="text-xs-center">

                                                                                <div onclick="var x = ($('#BetSize').val()*2);$('#BetSize').val(parseFloat(x.toFixed(2)));updateProfit()" class="tag tag-default">

                                                                                    <span>Удвоить</span>
                                                                                </div>
                                                                                <div onclick="$('#BetSize').val(Math.max(($('#BetSize').val()/2).toFixed(2), 1));updateProfit()" class="tag tag-default" style="display:inline-block;">

                                                                                    <span>Половина</span></div>
                                                                                <div onclick="var max = $('#userBalance').attr('myBalance');$('#BetSize').val(Math.max(max,1));updateProfit()" class="tag tag-default" style="margin-left:-13px;margin-top:3px;">

                                                                                    <span>Макс</span>
                                                                                </div>
                                                                                <div onclick="$('#BetSize').val(1);updateProfit()" class="tag tag-default" style="display:inline-block;">

                                                                                    <span>Мин</span>
                                                                                </div>
                                                                            </div>
                                                                            <script>
                                                                                function validateBetSize(inp) {
																					
                                                                                    inp.value = inp.value.replace(/[,]/g, '.')
                                                                                        .replace(/[^\d,.]*/g, '')
                                                                                        .replace(/([,.])[,.]+/g, '$1')
                                                                                        .replace(/^[^\d]*(\d+([.,]\d{0,2})?).*$/g, '$1');
                                                                                }
                                                                            </script>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-xs-6">

                                                                        <div class="form-group">
                                                                            <span class="blue-grey darken-1 text-xs-center">% Шанс выигрыша</span>
                                                                            <input id="BetPercent" onkeyup="validateBetPercent(this);updateProfit()"class="form-control text-xs-center" value="50">
                                                                            <div style="margin-top:10px;-webkit-user-select: none;" class="text-xs-center">
																			
                                                                                <div onclick="$('#BetPercent').val(Math.min(($('#BetPercent').val()*2).toFixed(2), 95));updateProfit()" class="tag tag-default">

                                                                                    <span>Удвоить</span>
                                                                                </div>
                                                                                <div onclick="$('#BetPercent').val(Math.max(($('#BetPercent').val()/2).toFixed(2).replace(/.00/g, ''), 1));updateProfit()" class="tag tag-default" style="display:inline-block;">

                                                                                    <span>Половина</span>
                                                                                </div>
                                                                                <div onclick="$('#BetPercent').val(95);updateProfit()" class="tag tag-default" style="margin-left:-14px;margin-top:3px;">

                                                                                    <span>Макс</span>
                                                                                </div>
                                                                                <div onclick="$('#BetPercent').val(1);updateProfit()" class="tag tag-default" style="display:inline-block;">

                                                                                    <span>Мин</span>
                                                                                </div>
                                                                            </div><script>
                                                                                function validateBetPercent(inp) {
                                                                                    if (inp.value > 95) {
                                                                                        inp.value = 95;
                                                                                    }
																					

                                                                                    inp.value = inp.value.replace(/[,]/g, '.')
                                                                                        .replace(/[^\d,.]*/g, '')
                                                                                        .replace(/([,.])[,.]+/g, '$1')
                                                                                        .replace(/^[^\d]*(\d+([.,]\d{0,2})?).*$/g, '$1');
                                                                                }
                                                                            </script>
                                                                        </div>
                                                                    </div>

                                                                </div>
																<div class="hidden-xs-down">
                                                                <div class="card-subtitle line-on-side text-muted text-xs-center font-small-3 mx-1 my-1 ">
                                                                    <span>Hash игры </span>
                                                                </div>

                                                                <center style="word-wrap:break-word;padding-bottom:5px"><b id="hashBet" hid="$hid">
																$hash																	</b>
                                                                    <div id="loader_hash" style="position:relative;display:none">
                                                                        <div id="dot-container_hash">
                                                                            <div id="left-dot_hash" class="black-dot"></div>
                                                                            <div id="middle-dot_hash" class="black-dot"></div>
                                                                            <div id="right-dot_hash" class="black-dot"></div>
                                                                        </div>
                                                                    </div>
                                                                </center>
                                                                <center>
                                                                    <cite style="cursor:pointer" onclick="$('.dsec').hide();$('#realGame').show();$('#main-menu-navigation  li').removeClass('active');$('#gg').addClass('active');">Что это?</cite>
                                                                </center>
																</div>
                                                       
                                                            </div>

                                                        </div>

                                                    </div>
													
                                                    <div id="betStart" class="col-lg-4 col-md-6 col-sm-12 ">
                                                        <div class="p-1 text-xs-center" style="margin-top:16px;">
                                                            <div>
                                                                <h3 class="display-4" style="word-wrap:break-word;"><span id="BetProfit" class="display-4 success1 " >2.00</span> <img src="../files/coins.svg" style="width: 56px; height: auto;"></h3>
                                                               
                                                            </div>
<span class="blue-grey darken-1 " style="font-size:17px">Возможный выигрыш</span>
<div style="padding-top:10px;">
<span id="autoclick" onclick="autoclick()" class="tag tag-warning" style="font-size:15px; border-radius:150px;color: #fffff; cursor: pointer;    box-shadow: #f77433 7px 10px 23px -11px;">Включить автоклик</span>	<span id="stopauto" onclick="autoclickstop()" class="tag tag-danger" style="font-size:15px;border-radius:150px;display: none; color: #fffff; cursor: pointer;     box-shadow: #f77433 7px 10px 23px -11px;">Отключить автоклик</span>	</div>
                                                            <div class="card-body">
                                                                <div class="row text-xs-center" style="padding-top:10px">
                                                                    <div class="col-md-6 col-xs-6">
                                                                        <div class="form-group">
                                                                            <span style="-webkit-user-select: none;-moz-user-select: none;" class="blue-grey darken-1 ">0 - <span id="MinRange">499999</span></span>
                                                                            <button onclick="bet('betMin')" id="buttonMin" style="margin-top:5px;color:#fff;border-radius:20px!important; border: 0px solid;box-shadow: rgba(43, 141, 247, 0.73) 7px 10px 23px -11px;background: linear-gradient(to right, rgb(77, 174, 254), rgb(10, 232, 254))" type="button" class="bg-blue-grey bg-lighten-2  btn  btn-block mr-1 mb-1">Меньше</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-xs-6">

                                                                        <div class="form-group">
                                                                            <span style="-webkit-user-select: none;-moz-user-select: none;" class="blue-grey darken-1  "><span id="MaxRange">500000</span> - 999999</span>
                                                                            <button onclick="bet('betMax')" type="button" id="buttonMax" style="margin-top:5px;color:#fff; box-shadow: rgba(43, 141, 247, 0.73) 7px 10px 23px -11px;background: linear-gradient(to right, rgb(77, 174, 254), rgb(10, 232, 254));border-radius:150px!important;border: 0px solid " class="bg-blue-grey bg-lighten-2  btn  btn-block mr-1 mb-1">Больше</button>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                             
																
												<center><div id="betLoad" class="cssload-loader" style="background: none;display:none;">
												  <div class="cssload-inner cssload-one"></div>
												  <div class="cssload-inner cssload-two"></div>
												  <div class="cssload-inner cssload-three"></div>
												</div></center>
                                                                <a id="error_bet" class="btn  btn-block btnError" style="color:#fff;display:none;border-radius:150px"></a>
                                                                <a id="succes_bet" class="btn  btn-block btnSuccess" style="color:#fff; cursor:default;   margin-top: 0rem; display:none;border-radius:150px"></a>

                                                            </div>
                                                            <center style="padding: 0.4rem!important;">

                                                                <a id="checkBet" style="display:none;-webkit-user-select: none;-moz-user-select: none;" class="blue-grey darken-1 " href="" target="_blank">Проверить игру</a>
                                                            </center>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                                                                                                                                       
<div class="row" id="crash" style="display:none;">
																$bonusrow
									                                   <div class="col-xs-12">
$bonus10

                                        <div class="card" style="border-radius:20px!important;">
                                            <div class="card-body" style="box-shadow: rgb(210, 215, 222) 7px 10px 23px -11px;border-radius: 20px!important;">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-12 col-sm-12 ">
													
                                                        <div class="p-1 text-xs-center mt52">
                                                            <h2 class="display-6 blue-grey darken-1" style="text-transform: capitalize!important;">$login </h2>
                                                            <h3 class="display-4 blue-grey darken-1"><span class="odometer odometer-auto-theme"  id="userBalance" mybalance="$balance"><div class="odometer-inside"><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">0</span></span></span></span></span></div></span> H</h3>

                                                            <div class="card-body">
                                                                <center>
															
                                                                    <ul class="list-inline list-inline-pipe" style="font-size:15px">
                                                                        <li data-toggle="modal" data-target="#deposit" style="cursor:pointer;">Пополнить</li>
                                                                        <li data-toggle="modal" data-target="#promomodal" style="cursor:pointer;">Промокоды </li>
                                                                        <li data-toggle="modal" data-target="#withdraw" style="cursor:pointer;">Вывод </li>
                                                            
                                                                    </ul>

                                                                </center>
																	
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12 border-right-blue-grey border-right-lighten-5 border-left-blue-grey border-left-lighten-5">
                                                        <div class="p-1">

                                                            <div class="card-body" style="margin-top:2px;">

                                                                <div id="controlBet" class="row">
                                                                    <div class="col-md-6 col-xs-6">
                                                                        <div class="form-group">
                                                                            <span class="blue-grey darken-1 text-xs-center">Размер игры </span>
                                                                            <input id="BetSize" onkeyup="validateBetSize(this); updateProfit();" class="form-control text-xs-center" value="1">
                                                                            <div style="margin-top:10px;-webkit-user-select: none;" class="text-xs-center">

                                                                                <div onclick="var x = ($('#BetSize').val()*2);$('#BetSize').val(parseFloat(x.toFixed(2)));updateProfit()" class="tag tag-default">

                                                                                    <span>Удвоить</span>
                                                                                </div>
                                                                                <div onclick="$('#BetSize').val(Math.max(($('#BetSize').val()/2).toFixed(2), 1));updateProfit()" class="tag tag-default" style="display:inline-block;">

                                                                                    <span>Половина</span>
                                                                                </div>
                                                                                <div onclick="var max = $('#userBalance').attr('myBalance');$('#BetSize').val(Math.max(max,1));updateProfit()" class="tag tag-default" style="margin-left:-13px;margin-top:3px;">

                                                                                    <span>Макс</span>
                                                                                </div>
                                                                                <div onclick="$('#BetSize').val(1);updateProfit()" class="tag tag-default" style="display:inline-block;">

                                                                                    <span>Мин</span>
                                                                                </div>
                                                                            </div>
                                                                            <script>
                                                                                function validateBetSize(inp) {
																					
                                                                                    inp.value = inp.value.replace(/[,]/g, '.')
                                                                                        .replace(/[^\d,.]*/g, '')
                                                                                        .replace(/([,.])[,.]+/g, '$1')
                                                                                        .replace(/^[^\d]*(\d+([.,]\d{0,2})?).*$/g, '$1');
                                                                                }
                                                                            </script>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-xs-6">

                                                                        <div class="form-group">
                                                                            <span class="blue-grey darken-1 text-xs-center">Забирать на</span>
                                                                            <input id="BetPercent" onkeyup="validateBetPercent(this);updateProfit()"class="form-control text-xs-center" value="50">
                                                                            <div style="margin-top:10px;-webkit-user-select: none;" class="text-xs-center">
																			
                                                                                <div onclick="$('#BetPercent').val(Math.min(($('#BetPercent').val()*2).toFixed(2), 95));updateProfit()" class="tag tag-default">

                                                                                    <span>Удвоить</span>
                                                                                </div>
                                                                                <div onclick="$('#BetPercent').val(Math.max(($('#BetPercent').val()/2).toFixed(2).replace(/.00/g, ''), 1));updateProfit()" class="tag tag-default" style="display:inline-block;">

                                                                                    <span>Половина</span>
                                                                                </div>
                                                                                <div onclick="$('#BetPercent').val(95);updateProfit()" class="tag tag-default" style="margin-left:-14px;margin-top:3px;">

                                                                                    <span>Макс</span>
                                                                                </div>
                                                                                <div onclick="$('#BetPercent').val(1);updateProfit()" class="tag tag-default" style="display:inline-block;">

                                                                                    <span>Мин</span>
                                                                                </div>
                                                                            </div>

                                                                            <script>
                                                                                function validateBetPercent(inp) {
                                                                                    if (inp.value > 95) {
                                                                                        inp.value = 95;
                                                                                    }
																					

                                                                                    inp.value = inp.value.replace(/[,]/g, '.')
                                                                                        .replace(/[^\d,.]*/g, '')
                                                                                        .replace(/([,.])[,.]+/g, '$1')
                                                                                        .replace(/^[^\d]*(\d+([.,]\d{0,2})?).*$/g, '$1');
                                                                                }
                                                                            </script>
                                                                        </div>
                                                                    </div>

                                                                </div>
																<div class="hidden-xs-down">
                                                                <div class="card-subtitle line-on-side text-muted text-xs-center font-small-3 mx-1 my-1 ">
                                                                    <span>Hash игры </span>
                                                                </div>

                                                                <center style="word-wrap:break-word;padding-bottom:5px"><b id="hashBet" hid="$hid">
																$hash																	</b>
                                                                    <div id="loader_hash" style="position:relative;display:none">
                                                                        <div id="dot-container_hash">
                                                                            <div id="left-dot_hash" class="black-dot"></div>
                                                                            <div id="middle-dot_hash" class="black-dot"></div>
                                                                            <div id="right-dot_hash" class="black-dot"></div>
                                                                        </div>
                                                                    </div>
                                                                </center>
                                                                <center>
                                                                    <cite style="cursor:pointer" onclick="$('.dsec').hide();$('#realGame').show();$('#main-menu-navigation  li').removeClass('active');$('#gg').addClass('active');">Что это?</cite>
                                                                </center>
																</div>
                                                       
                                                            </div>

                                                        </div>

                                                    </div>
													
                                                    <div id="betStart" class="col-lg-4 col-md-6 col-sm-12 ">
                                                        <div class="p-1 text-xs-center" style="margin-top:1px;">
                                                            <div class="p-1 text-xs-center" style="margin-top:1px;">
<h1 class="display-4" style="word-wrap:break-word;"><span id="BetProfit" class="display-2 success1" >50</span> <i class="fas fa-chart-line"></i></h1>
                                                              <h3 class="display-4" style="word-wrap:break-word;"><span id="BetProfit" class="display-4 success1 " >50</span> <img src="../files/coins.svg" style="width: 56px; height: auto;"></img></h3>
                                                                
                                                               
                                                            </div>
<span class="blue-grey darken-1 " style="font-size:17px">Возможный выигрыш</span>
                                                            <div class="card-body">
                                                                <div class="row text-xs-center" style="padding-top:10px">
                                                                    <div class="col-md-6 col-xs-6">
                                                                        <div class="form-group">
                                                                            
                                                                            <button onclick="betCrash('betCrash')" id="buttonMinCrash" style="margin-top:5px;color:#fff;border-radius:20px!important; border: 0px solid;box-shadow:rgba(119, 133, 148, 0.73) 7px 10px 23px -11px;background: linear-gradient(to right, rgb(122, 134, 148), rgb(99, 107, 116))!important; " type="button" class="bg-blue-grey bg-lighten-2  btn  btn-block mr-1 mb-1">Поставить</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-xs-6">

                                                                        <div class="form-group">
                                                                            

                                                                            <button onclick="betCrashOut('betCrashOut')" type="button" id="buttonMaxCrashOut" style="margin-top:5px;color:#fff; box-shadow:rgba(119, 133, 148, 0.73) 7px 10px 23px -11px; background: linear-gradient(to right, rgb(122, 134, 148), rgb(99, 107, 116))!important;border-radius:150px!important;border: 0px solid " class="bg-blue-grey bg-lighten-2  btn  btn-block mr-1 mb-1">Забрать</button>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                             
																
												<center><div id="betLoad" class="cssload-loader" style="background: none;display:none;">
												  <div class="cssload-inner cssload-one"></div>
												  <div class="cssload-inner cssload-two"></div>
												  <div class="cssload-inner cssload-three"></div>
												</div></center>
                                                                <a id="error_bet" class="btn  btn-block btnError" style="color:#fff;display:none;border-radius:150px"></a>
                                                                <a id="succes_bet" class="btn  btn-block btnSuccess" style="color:#fff; cursor:default;   margin-top: 0rem; display:none;border-radius:150px"></a>

                                                            </div>
                                                            <center style="padding: 0.4rem!important;">

                                                                <a id="checkBet" style="display:none;-webkit-user-select: none;-moz-user-select: none;" class="blue-grey darken-1 " href="" target="_blank">Проверить игру</a>
                                                            </center>
                                                        </div>
                                                    </div>
</div>
                                            </div>
                                        </div>
                                    </div>
                                </div></div>          
HERE;
}
else
{
	setcookie('sid', "", time()- 10000);
	//setcookie('login', "", time()- 10000);
	$panel = <<<HERE

<div data-menu="menu-container" class="navbar-container main-menu-content container center-layout">
                    <!-- include ../../../includes/mixins-->
                    <ul id="main-menu-navigation" data-menu="menu-navigation" class="nav navbar-nav">
                        <li class="dropdown nav-item active" onclick="$('.dsec').hide();$('#lastBets').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#lastBets').offset().top);">
                            <a class="dropdown-toggle nav-link"><span>Главная</span></a>

                        </li>
                        <li class="dropdown nav-item " id="gg" onclick="$('.dsec').hide();$('#realGame').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#realGame').offset().top);">
                            <a class="dropdown-toggle nav-link"><span>Честная игра</span></a>

                        </li>
                        <li class="dropdown nav-item " onclick="$('.dsec').hide();$('#rules').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#rules').offset().top);">
                            <a class="dropdown-toggle nav-link"><span>Как играть</span></a>
                        </li>

												<li class="dropdown nav-item " onclick="$('.dsec').hide();$('#contacts').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#contacts').offset().top);">
                            <a class="dropdown-toggle nav-link"><span>Контакты</span></a>
                        </li>
						<li class="dropdown nav-item " onclick="$('.dsec').hide();$('#lastWithdraw').show();$(document.body).removeClass('menu-open');$(window).scrollTop($('#lastWithdraw').offset().top);">
                            <a class="dropdown-toggle nav-link"><span>Выплаты</span></a>
                        </li>
						<button style="margin-top:12px;float:right;" class="flat_button logo_button  color3_bg" onclick="window.open('http://vk.com/money_game_win');">Мы Вконтакте</button>
                    </ul>
                </div>

HERE;

$go = <<<HERE
	
					                         <div class="row">
                            <div class="col-xs-12">
                                <div class="card">
                                    <div class="card-body" style="box-shadow: rgba(210, 215, 222, 0.5) 7px 10px 23px -11px;border-radius: 6px!important;">
                                        <div class="row">
                                            <div class="col-lg-6  col-md-12 col-sm-12 ">
                                                <div id="what-is" class="card">
                                                    <div  class="card-header"   style="border-radius: 4px!important;">
                                                        <h4 class="card-title"><b>Что такое UPCASH?</b></h4>

                                                    </div>
                                                    <div class="card-body collapse in">
                                                        <div class="card-block">
                                                            <div class="card-text">
                                                                <p style="font-size:15.5px">Сервис мгновенных игр, где шанс выигрыша указываете сами. </p>
                                                                <ul>
                                                                    <li>Денежный бонус при регистрации</li>
                                                                    <li>Быстрые выплаты без комиссий и прочих сборов</li>
                                                                    <li>Проверяйте на честность любую игру</li>
                                                                    <li>Дополнительно зарабатывайте на рефералах</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6  col-md-12 col-sm-12 ">
                                                <div id="login">
                                                    
                                                    <div class="col-lg-10 offset-lg-1">
													<div class="card-header no-border pb-0">
                                                        <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span style="font-size:17px"> Авторизация </span></h6>
                                                    </div>
                                                        <div class="card-body collapse in">
                                                            <div class="card-block">
                                                                <form class="form-horizontal">
                                                                    <fieldset class="form-group position-relative has-icon-left">
                                                                        <input type="text" class="form-control form-control-md input-md" id="userLogin" value="" placeholder="Логин"  >
                                                                        <div class="form-control-position">
                                                                            <i class="ft-user"></i>
                                                                        </div>
                                                                    </fieldset>
                                                                    <fieldset class="form-group position-relative has-icon-left">
                                                                        <input type="password" class="form-control form-control-md input-md" id="userPass" placeholder="Пароль">
                                                                        <div class="form-control-position">
                                                                            <i class="ft-lock"></i>
                                                                        </div>
                                                                    </fieldset>
																	<div style="padding-bottom:11px" class="g-recaptcha" data-sitekey=""></div>
																
                                                                    <a id="error_enter" class="btn  btn-block btnError" style="color:#fff;display:none"></a>

                                                                    <a id="enter_but" onclick="login()" class="btn   btn-block btnEnter" style="color:#fff;margin-bottom:5px">
                                                                        <center><span id="text_enter"> <i class="ft-unlock"></i>  Войти</span>

                                                                            <div id="loader" style="position:absolute">
                                                                                <div id='dot-container' style='display:none'>
                                                                                    <div id="left-dot" class='white-dot'></div>
                                                                                    <div id='middle-dot' class='white-dot'></div>
                                                                                    <div id='right-dot' class='white-dot'></div>
                                                                                </div>
                                                                            </div>

                                                                        </center>
                                                                    </a>
                                                                </form>
                                                            </div>
                                                        </div>

                                                        <div class="card-footer no-border" style="margin-top:-12x">
                                                            <p class="float-sm-left text-xs-center"><a onclick="register_show()" class="card-link">Регистрация</a></p>
                                                            <p class="float-sm-right text-xs-center"><a onclick="reset_show()" class="card-link">Забыли пароль? </a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="register" style="display:none">
                                                   
                                                    <div class="col-lg-10 offset-lg-1">
													 <div class="card-header no-border pb-0" >
                                                        <h6  class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span style="font-size:17px">Регистрация </span></h6>
                                                    </div>
                                                        <div class="card-body collapse in">
                                                            <div class="card-block">
                                                                <form class="form-horizontal" >
                                                                    <fieldset class="form-group position-relative has-icon-left">
                                                                        <input type="text" class="form-control form-control-md input-md" id="userLoginRegister" placeholder="Логин">
                                                                        <div class="form-control-position">
                                                                            <i class="ft-user"></i>
                                                                        </div>
                                                                    </fieldset>
                                                                    <fieldset class="form-group position-relative has-icon-left">
                                                                        <input type="email" class="form-control form-control-md input-md" id="userEmailRegister" placeholder="E-mail">
                                                                        <div class="form-control-position">
                                                                            <i class="ft-mail"></i>
                                                                        </div>
                                                                    </fieldset>
                                                                    <fieldset class="form-group position-relative has-icon-left">
                                                                        <input type="password" class="form-control form-control-md input-md" id="userPassRegister" placeholder="Пароль">
                                                                        <div class="form-control-position">
                                                                            <i class="ft-lock"></i>
                                                                        </div>
                                                                    </fieldset>
																	<fieldset style="padding-bottom: 7px;">
																		<label class="check1">
																		  <input id="rulesagree" type="checkbox"/>
																		  <div class="box1"></div>
																		 
																		 
																		</label>
																		 <div style="display:inline-block;padding-left:10px;position:absolute">Согласен c <u data-toggle="modal" data-target="#large" style="cursor:pointer">правилами</u></div>
																	</fieldset>
																	<div style="padding-bottom:11px" class="g-recaptcha" data-sitekey=" "></div> 
                                                                    <a id="error_register" class="btn  btn-block btnError" style="color:#fff;display:none"></a>
                                                                    <a onclick="register1()" class="btn   btn-block btnEnter" style="color:#fff;margin-bottom:5px">

                                                                        <center><span id="text_register"><i class="ft-check"></i> Зарегистрироваться</span>

                                                                            <div id="loader_register" style="position:absolute">
                                                                                <div id='dot-container_register' style='display:none'>
                                                                                    <div id="left-dot_register" class='white-dot'></div>
                                                                                    <div id='middle-dot_register' class='white-dot'></div>
                                                                                    <div id='right-dot_register' class='white-dot'></div>
                                                                                </div>
                                                                            </div>

                                                                        </center>
                                                                    </a>
                                                                </form>
                                                            </div>
                                                        </div>

                                                        <div class="card-footer no-border" style="margin-top:-12px">
                                                            <p class="float-sm-left text-xs-center"><a onclick="login_show()" class="card-link">Есть аккаунт</a></p>
                                                            <p class="float-sm-right text-xs-center"><a onclick="reset_show()" class="card-link">Забыли пароль? </a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="reset" style="display:none">
                                                    
                                                    <div class="col-lg-10 offset-lg-1">
													<div class="card-header no-border pb-0">
                                                        <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span style="font-size:17px">Вспомнить пароль</span></h6>
                                                    </div>
                                                        <div class="card-body collapse in">
                                                            <div class="card-block">
                                                             
                                                                    <fieldset class="form-group position-relative has-icon-left">
                                                                        <input type="text" class="form-control form-control-md input-md" id="loginemail" placeholder="Логин или E-mail">
                                                                        <div class="form-control-position">
                                                                            <i class="ft-search"></i>
                                                                        </div>
                                                                    </fieldset>
																	<div style="padding-bottom:11px" class="g-recaptcha" data-sitekey=" "></div> 
                                                                    <a id="error_reset" class="btn  btn-block btnError" style="color:#fff;display:none"></a>
                                                                    <a id="reset_success" class="btn  btn-block btnSuccess" style="color:#fff;display:none"></a>
                                                                    <a  id="reset_but" onclick="reset_password()" class="btn   btn-block btnEnter" style="color:#fff;margin-bottom:5px">

                                                                        <center><span id="text_reset"><i class="ft-check"></i> Вспомнить</span>

                                                                            <div id="loader_reset" style="position:absolute">
                                                                                <div id='dot-container_reset' style='display:none'>
                                                                                    <div id="left-dot_reset" class='white-dot'></div>
                                                                                    <div id='middle-dot_reset' class='white-dot'></div>
                                                                                    <div id='right-dot_reset' class='white-dot'></div>
                                                                                </div>
                                                                            </div>

                                                                        </center>
                                                                    </a>                                                               
                                                            </div>
                                                        </div>
 
                                                        <div class="card-footer no-border" style="margin-top:-12px">
                                                            <p class="float-sm-left text-xs-center"><a onclick="login_show()" class="card-link">Есть аккаунт</a></p>
                                                            <p class="float-sm-right text-xs-center"><a onclick="register_show()" class="card-link">Регистрация </a></p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
HERE;
	
}
}

?>