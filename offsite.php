

<!DOCTYPE html>
<html lang="ru">
<head>
<link rel="icon" type="image/x-icon" href="files/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="referrer" content="no-referrer">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="description" content="Что такое Nvuti? Сервис мгновенных игр, где шанс выигрыша указываете сами. Быстрые выплаты без комиссий и прочих сборов.">
<meta name="keywords" content="">
<meta name="author" content="a0245128.xsph.ru">
<title>a0245128.xsph.ru - Сервис мгновенных игр, где шанс выигрыша указываете сами.
        </title>
<link rel="stylesheet" type="text/css" href="./files/css.css">

<link rel="stylesheet" type="text/css" href="./files/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="./files/style.minn.css">
<link rel="stylesheet" type="text/css" href="./files/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="./files/flag-icon.min.css">
<link rel="stylesheet" type="text/css" href="./files/morris.css">
<link rel="stylesheet" type="text/css" href="./files/climacons.min.css">
<link rel="stylesheet" type="text/css" href="./files/loader-gg.css">


<link rel="stylesheet" type="text/css" href="./files/bootstrap-extended.min.css">
<link rel="stylesheet" type="text/css" href="./files/app.min.css">
<link rel="stylesheet" type="text/css" href="./files/colors.min.css">


<link rel="stylesheet" type="text/css" href="./files/horizontal-menu.min.css">
<link rel="stylesheet" type="text/css" href="./files/vertical-overlay-menu.min.css">



<link rel="stylesheet" type="text/css" href="./files/style.css">

<style>
.tag-default:hover {
    background-color: #626f7f!important;
	
}

</style>
<style>
			.btnSuccess {
                   box-shadow: 3px 11px 23px -11px rgba(37, 219, 115, 0.97)!important;
            }
			.btnError {
                   box-shadow: 3px 11px 23px -11px rgb(234, 96, 75);
            }
			.btnEnter {
                      box-shadow: rgba(0, 174, 213, 0.63) 7px 10px 23px -11px!important;
            }
													</style>
<style type="text/css">
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                /* display: none; <- Crashes Chrome on hover */
                -webkit-appearance: none;
                margin: 0;
                /* <-- Apparently some margin are still there even though it's hidden */
            }
            
            .jqstooltip {
                position: absolute;
                left: 0px;
                top: 0px;
                visibility: hidden;
                background: rgb(0, 0, 0) transparent;
                background-color: rgba(0, 0, 0, 0.6);
                filter: progid: DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
                -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
                color: white;
                font: 10px arial, san serif;
                text-align: left;
                white-space: nowrap;
                padding: 5px;
                border: 1px solid white;
                z-index: 10000;
            }
            
            .jqsfield {
                color: white;
                font: 10px arial, san serif;
                text-align: left;
            }
			.circle-online {
  width :8px;
  height:8px;

  background: linear-gradient(to right, #0ACB90, #2BDE6D);
  border-radius:100%;
}
.pulse-online {
  animation :pulse 11s infinite;
  animation-duration: 4s;
}
@-webkit-keyframes pulse {
        0% {
            -webkit-box-shadow: 0 0 0 0 rgba(10, 203, 144, 0.6);
        }
        70% {
            -webkit-box-shadow: 0 0 0 10px rgba(10, 203, 144, 0);
        }
        100% {
            -webkit-box-shadow: 0 0 0 0 rgba(10, 203, 144, 0);
        }
    }
    @keyframes pulse {
        0% {
  
            -moz-box-shadow: 0 0 0 0 rgba(10, 203, 144, 0.6);
            box-shadow: 0 0 0 0 rgba(10, 203, 144, 0.5);
        }
        70% {
                 transform:rotateY(0deg); 

            -moz-box-shadow: 0 0 0 9px rgba(10, 203, 144, 0);
            box-shadow: 0 0 0 9px rgba(10, 203, 144, 0);
        }
        100% {
            -moz-box-shadow: 0 0 0 0 rgba(10, 203, 144, 0);
            box-shadow: 0 0 0 0 rgba(10, 203, 144, 0);
        }
    }
        </style>
<script src="./files/js.cookie.js" type="text/javascript"></script>
<script src="./files/jquery-latest.min.js"></script>
<script>
		
            $(function() {

				window.history.replaceState(null, null, window.location.pathname);
                // getContent();
				
	
					
					
				$("#response").prepend(kk.new);
				$("#oe").html(kk.count);
				$('#response').children().slice(20).remove();
				};
                
               
				
				
				
				
				
                $('#MinRange').html(Math.floor(($('#BetPercent').val() / 100) * 999999));
                $('#MaxRange').html(999999 - Math.floor(($('#BetPercent').val() / 100) * 999999));
                $('#BetProfit').html(((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2));

            });
        </script>
<Script>
			     function register_show() {
                $('#login').hide();
                $('#reset').hide();
                $("#register").fadeIn("slow", function() {});
            }

            function login_show() {
                $('#register').hide();
                $('#reset').hide();
                $("#login").fadeIn("slow", function() {});
            }

            function reset_show() {
                $('#login').hide();
                $('#register').hide();
                $("#reset").fadeIn("slow", function() {});
            }
            function getContent(timestamp) {
                var queryString = {
                    'timestamp': timestamp
                };

                $.ajax({
                    type: 'GET',
                    url: 'longpool/server/server.php?rr=',
                    data: queryString,
                    success: function(data) {
                        var obj = jQuery.parseJSON(data);
						if (obj.data_from_file != ""){
							$('#response').html(obj.data_from_file);
						}
                        
                        getContent(obj.timestamp);
                    }
                });
            }
			
        </Script>

</head>
<body class="horizontal-layout horizontal-menu 2-columns    menu-expanded ">

<nav class="header-navbar navbar navbar-with-menu navbar-static-top navbar-light navbar-border navbar-brand-center" data-nav="brand-center">
<div class="navbar-wrapper">
<div class="navbar-header">
<ul class="nav navbar-nav">
<li class="nav-item mobile-menu hidden-md-up float-xs-left"><a href="" class="nav-link nav-menu-main menu-toggle hidden-xs">
<i class="ft-menu font-large-1"></i>
</a></li>
<li class="nav-item">
<a href="" class="navbar-brand">
</center><h2 class=""><b>UPCASH</b></h2></a></center>
</li>
</ul>
</div>
</div>
</nav>


<style>
		.h66 {
			height: 66px;
		}
		
		
													.mt52 {
															margin-top:52px;
														}
													@media (max-width:767px) {
														.cssload-loader {
															margin-top:18.1px;
														}
														.h66{
															height: 0px;
														}
														.mt52 {
															margin-top:0px;
														}
														
														.logo_button {
															float:left!important;
															margin-left:16px;
														}
													}
													</style>
<div class="modal fade text-xs-left in" id="ageChallenge" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" style="display: block;background:#fff">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-body">
<div style="margin-top:17%; ">
<div class="">
<center>
<a class="btn  btn-block btnError" style="color: rgb(255, 255, 255);width:300px;display: inline-block;margin-top:0;margin-bottom:10px;cursor:pointer!important">НА САЙТЕ ВЕДУТСЯ ТЕХ РАБОТЫ</a><br><a onclick="window.location.replace('http://vk.com/upcashspace');" class="btn  btn-block btnError" style="color: rgb(255, 255, 255); border: 0px solid; box-shadow: rgba(119, 133, 148, 0.73) 7px 10px 23px -11px; max-width:181px;background: linear-gradient(to right, rgb(122, 134, 148), rgb(99, 107, 116)) !important;max-width:181px;display: inline-block;margin-bottom:10px;cursor:pointer!important">Покинуть сайт</a> 
</center>
</div>
<div class="row">
<div class="col-md-12" style="margin-top:35px;"><center>
<div style="font-weight:100;color:#656e778a"></div></center></div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="modal fade text-xs-left in" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" style="display: none; ">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header" style="background-color:#F5F7FA;border-radius:6px">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true"><i class="ft-x"></i></span>
</button>
<h4 class="modal-title" id="myModalLabel17">Лицензионное соглашаение</h4>
</div>
<div class="modal-body">
<h5>1. ОБЩИЕ ПОЛОЖЕНИЯ. ТЕРМИНЫ.</h5>
<p>1.1. Настоящее соглашение – официальный договор на пользование услугами сервиса a0245128.xsph.ru. Ниже приведены основные условия пользования услугами сервиса. Пожалуйста, прежде чем принять участие в проекте внимательно изучите правила.</p>
<p>1.2. Услугами сервиса могут пользоваться исключительно лица, достигшие совершеннолетия (18 лет) и старше. </p>
<p>1.3. On-line проект под названием a0245128.xsph.ru представляет собой систему добровольных пожертвований, принадлежит его организатору и находится в сети Интернет непосредственно по адресу – a0245128.xsph.ru. </p>
<p>1.4. Участие пользователей в проекте является исключительно добровольным.</p>
<hr>
<h5>2. УЧЁТНАЯ ЗАПИСЬ УЧАСТНИКА ПРОЕКТА (ПОЛЬЗОВАТЕЛЯ СИСТЕМЫ).</h5>
<p>2.1. Способом непосредственной регистрации учетной записи является авторизация участников проекта с помощью логина и пароля.</p>
<p>2.3. Кроме того, участник проекта несет непосредственную ответственность за любые предпринятые им действия в рамках проекта. </p>
<p>2.4. Участник проекта обязуется своевременно сообщить о противозаконном доступе к его учетной записи, противозаконном использовании его учетной записи, по средствам технической поддержки сервиса. </p>
<p>2.5. Сервис, а также его правообладатель не несут ответственность за любые предпринятые действия участником проекта касательно третьих лиц. </p>
<p>2.6. При использовании несколькими участниками проекта одно и тоже устройство или выход в интернет для игры, необходимо согласование с администрацией. </p>
<hr>
<h5>3. КОНФИДЕНЦИАЛЬНОСТЬ</h5>
<p>3.1. В рамках проекта гарантируется абсолютная конфиденциальность информации, предоставленной участником проекта сервису. </p>
<p>3.2. В рамках проекта гарантируется шифрование личных паролей участников. </p>
<p>3.3	Личные данные участника проекта могут быть представлены третьим лицам исключительно в случаях непосредственного нарушения действующих законов РФ, в случаях оскорбительного поведения, клеветы в отношении третьих лиц. </p>
<hr>
<h5>4. УЧАСТНИК ПРОЕКТА (ПОЛЬЗОВАТЕЛЬ СИСТЕМЫ).</h5>
<p>4.1. В случае непосредственного нарушения участником проекта изложенных условий и правил настоящего соглашения, а также действующих законов РФ, учетная запись может быть заблокирована. </p>
<p>4.2. Недопустимы попытки противозаконного доступа, нанесения вреда работе системы сервиса. </p>
<p>4.3. Недопустима любая агрессия, сообщения, запрограммированные на причинение ущерба сервису (вирусы), информация, способная повлечь за собой несущественный, или существенный вред третьим лицам.</p>
<hr>
<h5>5. КАТЕГОРИЧЕСКИ ЗАПРЕЩЕНО</h5>
<p>5.1. Размещение информации, содержащей поддельные (неправдивые) данные.
<p>5.2. Проводить попыток взлома сайта и использовать возможные ошибки в скриптах. Нарушители будут немедленно забанены и удалены.
<p>5.3. Регистрация более чем одной учетной записи индивидуального участника проекта.
<p>5.4. Передача информации иным, третьим лицам, содержащей данные для доступа к личной учетной записи участника проекта.
<p>5.5. Выплата на одинаковые реквизиты с разных аккаунтов.
<p>5.6. Махинации с реферальной системой.
<hr>
<h5>6. Выплаты.</h5>
<p>6.1 Выплаты производятся в ручном режиме.</p>
<p>6.2 Если сумма последних пополнений равна сумме вывода, комиссию оплачивает пользователь.</p>
<p>6.3 При выводе бонусных рублей может быть отказано без всяких причин.</p>
<p>6.4 Администрация сайта может потребовать скан или фото паспорта для верификации.</p>
<p>6.5 При выводе средств, необходимо сыграть хотя бы 15 игр на сумму более 5% последнего пополения счета.</p>
<p>6.6 При отказе предоставить дополнительную информацию или верификации кошелька аккаунт может быть заблокирован.</p>
<p>6.7 При нарушении правил баланс аккаунта может быть заморожен.</p>
<hr>
<h5>7. ПРИНЯТИЕ ПОЛЬЗОВАТЕЛЬСКОГО СОГЛАШЕНИЯ.</h5>
<p>7.1. Непосредственная регистрация в системе данного проекта предполагает полное принятие участником проекта условий и правил настоящего пользовательского соглашения.</p>
<p>7.2. При нарушении правил учетная запись может быть заблокирована вместе с балансом.</p>
</div>
</div>
</div>
</div>
<script src="./files/modal.js"></script>
<script src="./files/vendors.min.js" type="text/javascript"></script>
<script src="./files/popover.min.js" type="text/javascript"></script>
<script src="./files/raphael-min.js" type="text/javascript"></script>
<script src="./files/morris.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="./files/palette-climacon.css">
<link rel="stylesheet" type="text/css" href="./files/style.min(1).css">


<script src="./files/app-menu.min.js" type="text/javascript"></script>
<script src="./files/app.min.js" type="text/javascript"></script>
<script src="./files/odometer.js"></script>
