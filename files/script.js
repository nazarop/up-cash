 window.onerror = null;
 window.onkeydown = window.onkeyup = window.onkeypress = handl;
 function handl(e){
     if(e.key == 'Enter')
        return false;
 }
$(function() {

				window.history.replaceState(null, null, window.location.pathname);							
                $('#MinRange').html(Math.floor(($('#BetPercent').val() / 100) * 999999));
                $('#MaxRange').html(999999 - Math.floor(($('#BetPercent').val() / 100) * 999999));
                $('#BetProfit').html(((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2));
            });
									function historys() {
if(navigator.onLine) {
 $.ajax({
            url: 'inc/core.php',
            timeout: 10000,
            success: function(data) {
				var obj = jQuery.parseJSON(data);
                $("#response").prepend(obj.game);
				$('#response').children().slice(20).remove();
				$("#oe").html(obj.online);
            },
            error: function() {
            }
        });
		} else {
}
									}
		setInterval('historys()',1000);
		
		
										function offliner() {
if(navigator.onLine) {
 $.ajax({
            url: 'inc/offline.php',
            timeout: 10000,
            success: function(data) {
            },
            error: function() {
            }
        });
		} else {
}
		}
		
		setInterval('offliner()',3000);							
		
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
 window.renderRecaptchas = function() {
        var recaptchas = document.querySelectorAll('.g-recaptcha');
        for (var i = 0; i < recaptchas.length; i++) {
            grecaptcha.render(recaptchas[i], {
                sitekey: recaptchas[i].getAttribute('data-sitekey')
            });
        }
    }
$(function() {
                                $("#main-menu-navigation  li").click(function() {
                                    
									if ($(this).attr('id') !== 'setPop' && $(this).attr('id') !== 'exit'){
										$("#main-menu-navigation  li").removeClass("active");
										$(this).toggleClass("active");
									}
                                    
                                })
                            });
 var input3 = document.getElementById('userLogin'),
                                                                    value = input3.value;
																	
                                                                    input3.addEventListener('input', onInput);

                                                                    function onInput(e) {
                                                                        var newValue = e.target.value;
                                                                        if (newValue.match(/[^a-zA-Z0-9]/g)) {
                                                                            input3.value = value;
                                                                            return;
                                                                        }
                                                                        value = newValue;
                                                                    }
                                                                    $('#userLogin').keydown(function(event) {
                                                                        if (event.which === 13) {
                                                                            login();

                                                                        }
                                                                    });
                                                                    $('#userPass').keydown(function(event) {
                                                                        if (event.which === 13) {
                                                                            login();

                                                                        }
                                                                    });

                                                                    function login() {
                                                                        if ($('#userLogin').val().length < 4) {
                                                                            $('#error_enter').css('display', 'block');
                                                                            return $('#error_enter').html('Логин от 4 символов');
                                                                        }
                                                                        if ($('#userPass').val() == '') {
                                                                            $('#error_enter').css('display', 'block');
                                                                            return $('#error_enter').html('Введите пароль');
																		}
                                                                        $.ajax({
                                                                            type: 'POST',
                                                                            url: 'action.php',
                                                                            beforeSend: function() {
                                                                                $('#error_enter').css('display', 'none');
                                                                                $('#loader').css('position', '');
                                                                                $('#enter_but').css('pointer-events', 'none');
                                                                                $('#dot-container').css('display', '');
                                                                                $('#text_enter').css('display', 'none');
                                                                                $('#text_enter').css('display', 'none');
                                                                            },
                                                                            data: {
                                                                                type: "login",
                                                                                login: $('#userLogin').val(),
                                                                                rc: $('#g-recaptcha-response').val(),
                                                                                pass: $('#userPass').val(),
                                                                            },
                                                                            success: function(data) {

                                                                                var obj = jQuery.parseJSON(data);
                                                                                if (obj.success == "success") {
                                                                                    Cookies.set('sid', obj.sid, { expires: 365,path: '/',secure:true });
																					Cookies.set('uid', obj.uid, { expires: 365,path: '/',secure:true });
																					Cookies.set('login', $('#userLogin').val(), { expires: 365,path: '/',secure:true });
                                                                                    window.location.href = '';
																					// return false;
                                                                                }else{
																					grecaptcha.reset();
																				$('#enter_but').css('pointer-events', '');
                                                                                $('#loader').css('position', 'absolute');
                                                                                $('#dot-container').css('display', 'none');
                                                                                $('#text_enter').css('display', 'block');
																				$('#error_enter').html(obj.error);
                                                                                $('#error_enter').css('display', 'block');
																				}
                                                                            

                                                                            }
                                                                        });
      
	  }
$('#userLoginRegister').keydown(function(event) {
                                                                            if (event.which === 13) {
                                                                                register1();

                                                                            }
                                                                        });
                                                                        $('#userEmailRegister').keydown(function(event) {
                                                                            if (event.which === 13) {
                                                                                register1();

                                                                            }
                                                                        });
                                                                        $('#userPassRegister').keydown(function(event) {
                                                                            if (event.which === 13) {
                                                                                register1();

                                                                            }
                                                                        });
                                                                        var input = document.getElementById('userLoginRegister'),
                                                                            value = input.value;

                                                                        input.addEventListener('input', onInput);

                                                                        function onInput(e) {
                                                                            var newValue = e.target.value;
                                                                            if (newValue.match(/[^a-zA-Z0-9]/g)) {
                                                                                input.value = value;
                                                                                return;
                                                                            }
                                                                            value = newValue;
                                                                        }

                                                                        var input2 = document.getElementById('userEmailRegister'),
                                                                            value = input2.value;

                                                                        input2.addEventListener('input', onInput1);

                                                                        function onInput1(e) {
                                                                            var newValue = e.target.value;
                                                                            if (newValue.match(/[^a-zA-Z0-9@.-_-]/g)) {
                                                                                input2.value = value;
                                                                                return;
                                                                            }
                                                                            value = newValue;
                                                                        }

                                                                        function isValidEmailAddress(email) {
                                                                            var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,5})(\]?)$/;
                                                                            return expr.test(email);
                                                                        };

                                                                        function register1() {
                                                                            if ($('#userLoginRegister').val().length < 4) {
                                                                                $('#error_register').css('display', 'block');
                                                                                return $('#error_register').html('Логин от 4 до 15 символов');
                                                                            }
                                                                            if ($('#userEmailRegister').val() == '') {
                                                                                $('#error_register').css('display', 'block');
                                                                                return $('#error_register').html('Введите email');
                                                                            }
                                                                            if (!isValidEmailAddress($('#userEmailRegister').val())) {
                                                                                $('#error_register').css('display', 'block');
                                                                                return $('#error_register').html('Введите корректный email');
                                                                            }
                                                                            if ($('#userPassRegister').val() == '') {
                                                                                $('#error_register').css('display', 'block');
                                                                                return $('#error_register').html('Введите пароль');
                                                                            }
                                                                            if ($('#userPassRegister').val().length < 5) {
                                                                                $('#error_register').css('display', 'block');
                                                                                return $('#error_register').html('Пароль от 5 символов');
                                                                            }
																			if (!$("#rulesagree").prop('checked')) {
                                                                                $('#error_register').css('display', 'block');
                                                                                return $('#error_register').html('Согласитесь с правилами');
                                                                            }
																		

                                                                            $.ajax({
                                                                                type: 'POST',
                                                                                url: 'action.php',
                                                                                beforeSend: function() {
                                                                                    $('#error_register').css('display', 'none');
                                                                                    $('#loader_register').css('position', '');
                                                                                    $('#enter_but').css('pointer-events', 'none');
                                                                                    $('#dot-container_register').css('display', '');
                                                                                    $('#text_register').css('display', 'none');

                                                                                },
                                                                                data: {
                                                                                    type: "register",
                                                                                    login: $('#userLoginRegister').val(),
                                                                                    rc: $('#g-recaptcha-response-1').val(),
                                                                                    pass: $('#userPassRegister').val(),
                                                                                    email: $('#userEmailRegister').val(),
																					ref: Cookies.get('ref')
                                                                                },
                                                                                success: function(data) {
                                                                                    $('#enter_but').css('pointer-events', '');
                                                                                    
                                                                                    
                                                                                    var obj = jQuery.parseJSON(data);
                                                                                     if (obj.success == 'success') {
                                                                                        Cookies.set('sid', obj.sid, { expires: 365,path: '/',secure:true });
																						Cookies.set('login', $('#userLoginRegister').val(), { expires: 365,path: '/',secure:true });
                                                                                        document.location.href = '';
                                                                                        console.log("hhhh");
																						 return false;
                                                                                    }else{
																						grecaptcha.reset();
																						$('#error_register').html(obj.error);
																						$('#error_register').css('display', 'block');
																						$('#text_register').css('display', 'block');
																						$('#loader_register').css('position', 'absolute');
																						$('#dot-container_register').css('display', 'none');
																					}
																					
                                                                                    
																					
                                                                                }
                                                                            });
                                                                        }
var input22 = document.getElementById('loginemail'),
                                                                            value = input22.value;

                                                                        input22.addEventListener('input', onInput1);

                                                                        function onInput1(e) {
                                                                            var newValue = e.target.value;
                                                                            if (newValue.match(/[^a-zA-Z0-9@.-]/g)) {
                                                                                input22.value = value;
                                                                                return;
                                                                            }
                                                                            value = newValue;
                                                                        }
																	$('#loginemail').keydown(function(event) {
                                                                            if (event.which === 13) {
                                                                                reset_password();

                                                                            }
                                                                        });
																	function reset_password() {
																		 
                                                                            if ($('#loginemail').val().length < 4) {
                                                                                $('#error_reset').css('display', 'block');
                                                                                return $('#error_reset').html('Введите корректные данные');
                                                                            }
																			if ($('#g-recaptcha-response-2').val() == '') {
                                                                            $('#error_reset').css('display', 'block');
                                                                            return $('#error_reset').html('Поставьте галочку');
                                                                        	 }


                                                                            $.ajax({
                                                                                type: 'POST',
                                                                                url: 'action.php',
                                                                                beforeSend: function() {
                                                                                    $('#error_reset').css('display', 'none');
                                                                                    $('#loader_reset').css('position', '');
																					$('#reset_success').css('display', 'none');
                                                                                    $('#reset_but').css('pointer-events', 'none');
                                                                                    $('#dot-container_reset').css('display', '');
                                                                                    $('#text_reset').css('display', 'none');

                                                                                },
                                                                                data: {
                                                                                    type: "resetPass",
                                                                                    rc: $('#g-recaptcha-response-2').val(),
                                                                                    login: $('#loginemail').val()
                                                                                },
                                                                                success: function(data) {
                                                                                    $('#reset_but').css('pointer-events', '');
                                                                                    var obj = jQuery.parseJSON(data);
                                                                                    if (obj.success == "success") {
																						$('#reset_success').css('display', '');
																						$('#reset_success').html(obj.mesa);	
																						$('#reset_but').css('display', 'none');																						
																						 return false;
                                                                                    }else{
																						 $('#loader_reset').css('position', 'absolute');
																						$('#reset_but').css('display', '');			
																						$('#dot-container_reset').css('display', 'none');
																						$('#text_reset').css('display', '');	
																						$('#error_reset').html(obj.error);
																						$('#error_reset').css('display', 'block');
																						
																					}
																						
																						
																						
																					
                                                                                    
																					
                                                                                }
                                                                            });
                                                                        }
																		
																		
									
									function resetPass() {
										if ($('#resetPass').val() == ''){
										$('#error_resetPass').show();
										return $('#error_resetPass').html('Введите пароль');
										}
										if ($('#resetPass').val().length < 5){
										$('#error_resetPass').show();
										return $('#error_resetPass').html('Пароль от 5 символов');
										}
									if ($('#resetPass').val() != $('#resetPassRepeat').val()){
										$('#error_resetPass').show();
										return $('#error_resetPass').html('Пароли не совпадают');
									}
									$.ajax({
                                        type: 'POST',
                                        url: 'action.php',
										beforeSend: function() {
											$('#error_resetPass').hide();
											$('#succes_resetPass').hide();
										},	
                                        data: {
                                            type: "resetPassPanel",
                                            sid: Cookies.get('sid'),
                                            newPass: $('#resetPass').val()
                                        },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                                               $("#succes_resetPass").show();
											  Cookies.set('sid', obj.sid, { path: '/',secure:true });
																						 return false;
                                            }else{
												$('#error_resetPass').show();
												return $('#error_resetPass').html(obj.error);
											}
                                        }
                                    });
                                    
                                }
								
function active() {
										if ($('#promo').val() == ''){
										$('#error_promo').show();
										return $('#error_promo').html('Введите Промокод');
										}

									$.ajax({
                                        type: 'POST',
                                        url: 'action.php',
										beforeSend: function() {
											$('#error_promo').hide();
											$('#succes_promo').hide();
										},	
                                        data: {
                                            type: "PromoActive",
                                            sid: Cookies.get('sid'),
                                            promo: $('#promo').val()
                                        },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                                               $("#succes_promo").show();
											   $("#succes_promo").html("Промокод на сумму <b>" + obj.suma + " </b> <img src='../files/coins.svg' style='width: 20px; height: auto;'> Активирован");
											   $('#userBalance').attr('myBalance', obj.new_balance);
                                               updateBalance(obj.balance, obj.new_balance);
																						 return false;
                                            }else{
												$('#error_promo').show();
												return $('#error_promo').html(obj.error);
											}
                                        }
                                    });
                                    
                                }																		
																		
	
																		function otmena() {
									$.ajax({
                                        type: 'POST',
                                        url: 'action.php',
										beforeSend: function() {
											$('#error_person').hide();
											$('#succes_person').hide();
										},	
                                        data: {
                                            type: "otmena",
sid: Cookies.get('sid'),
                                            id: $('#otmina').attr('value')
                                        },
                                        success: function(data) {
																					document.getElementById($('#otmina').attr('value')).remove();
                            updateBalance(obj.balance, obj.new_balance);
											
                                        }
                                    });
                                    
                                }	

            function updateBalance(start, end) {

                var el = document.getElementById('userBalance');

                od = new Odometer({
                    el: el,
                    value: start
                });

                od.update(end);
            }

            function updateHash() {

                // var audio = new Audio();
                // audio.src = 'Notify.mp3';
                // audio.volume = 0.1;
                // audio.autoplay = true;

                $.ajax({
                    type: 'POST',
                    url: 'action.php',
                    beforeSend: function() {
                        $('#checkBet').css('display', 'none');
                        $('#loader_hash').css('display', '');
                        $('#betStart').css('opacity', '0.25');
                        $('#controlBet').css('opacity', '0.25');
                        $('#betStart').css('pointer-events', 'none');
                        $('#controlBet').css('pointer-events', 'none');
                        $('#hashBet').html('');
                    },
                    data: {
                        type: "updateHash",
                        hid: $('#hashBet').attr('hid'),
                    },
                    success: function(data) {

                        var obj = jQuery.parseJSON(data);
                        if (obj.success == "success") {

                            $('#checkBet').css('display', '');
                            Cookies.set('hid', obj.hid, { path: '/',secure:true });
                            $('#hashBet').attr('hid', obj.hid);
                            $('#hashBet').html(obj.hash);
                            $('#loader_hash').css('display', 'none');
                            $('#betStart').css('opacity', '');
                            $('#controlBet').css('opacity', '');
                            $('#betStart').css('pointer-events', '');
                            $('#controlBet').css('pointer-events', '');

                            // setTimeout(updateHash, 89000);
                        }
                        sss();

                        if ('error' in obj) {
                            return document.location.href = '';
                        }

                    }
                });
            }
        
                                                                    function bet(type) {

                                                                        if ($('#userBalance').html() < $('#BetSize').val()) {
                                                                            $('#error_bet').html('Недостаточно средств');
                                                                            return $('#error_bet').css('display', '');
                                                                        }
                                                                        if ($('#BetPercent').val() > 95 || $('#BetPercent').val() < 1) {
                                                                            $('#error_bet').html('% Шанс от 1 до 95');
                                                                            return $('#error_bet').css('display', '');
                                                                        }
																		if($('#BetSize').val() <= 0)
																		{
																			$('#error_bet').html('Ставки от 1 рубля');
                                                                            return $('#error_bet').css('display', '');
																		}
                                                                        $.ajax({
                                                                            type: 'POST',
                                                                            url: 'action.php',
                                                                            beforeSend: function() {
                                                                                $('#checkBet').css('display', 'none');
                                                                                $('#error_bet').css('display', 'none')
                                                                                $('#succes_bet').css('display', 'none')
                                                                                $('#betLoad').css('display', '');
                                                                                $('#buttonMax').css('pointer-events', 'none');
                                                                                $('#buttonMin').css('pointer-events', 'none');
                                                                            },
                                                                            data: {
                                                                                type: type,
                                                                                sid: Cookies.get('sid'),
                                                                                 hid: $('#hashBet').attr('hid'),
                                                                                betSize: $('#BetSize').val(),
                                                                                betPercent: $('#BetPercent').val(),
                                                                            },
                                                                            success: function(data) {
                                                                                $('#buttonMax').css('pointer-events', '');
                                                                                $('#buttonMin').css('pointer-events', '');
                                                                                $('#betLoad').css('display', 'none');
                                                                                var obj = jQuery.parseJSON(data);
                                                                                if (obj.success == "success") {
                                                                                    $('#checkBet').css('display', '');

                                                                                   $('#checkBet').attr('href', 'game.php?id=' + obj.check_bet);
                                                                                    if (obj.type == 'win') {
                                                                                       //var audio = new Audio();
                                                                                         //audio.src = 'Coin.mp3';
                                                                                         //audio.volume = 0.6;
                                                                                         //audio.autoplay = true;
                                                                                        $('#succes_bet').css('display', '');
                                                                                        $("#succes_bet").html("Выиграли <b>" + obj.profit + " </b> <img src='../files/coins.svg' style='width: 20px; height: auto;'>");
                                                                                    }
                                                                                    if (obj.type == 'lose') {

                                                                                        $('#error_bet').css('display', '');
                                                                                        $("#error_bet").html("Выпало " + obj.number);
                                                                                    }
                                                                                    $("#hashBet").html(obj.hash);
                                                                                    Cookies.set('hid', obj.hid, { path: '/',secure:true });
                                                                                    $('#hashBet').attr('hid', obj.hid);
                                                                                    sss();
																					//updateHash();
                                                                                    $('#userBalance').attr('myBalance', obj.new_balance);
                                                                                    updateBalance(obj.balance, obj.new_balance);
                                                                                }
                                                                                if (obj.success == "error") {
                                                                                    $('#error_bet').html(obj.error);
                                                                                    return $('#error_bet').css('display', '');
                                                                                }

                                                                            }
                                                                        });

                                                                    }
                                            var myVar;
																	function autoclick()
{
    if(!!myVar) return;
	myVar = setInterval(function(){ 
	    click1();
	    }, 900);
}

					
function click1()
{
$('#autoclick').hide();	
$('#stopauto').show();
$('#buttonMax').click();
}

function autoclickstop()
{
    clearInterval(myVar);
    myVar = false;
    $('#autoclick').show();	
    $('#stopauto').hide();	
}
                                                                    function updateProfit() {
                                                                        $('#BetProfit').html(((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2));
                                                                        $('#MinRange').html(Math.floor(($('#BetPercent').val() / 100) * 999999));
                                                                        $('#MaxRange').html(999999 - Math.floor(($('#BetPercent').val() / 100) * 999999));
                                                                   if($('#BetPercent').val() == '')
																	{
																		$('#BetProfit').html(0);
																	}
																	if($('#BetSize').val() == '')
																	{
																		$('#BetProfit').html(0);
																	}
if($('#BetPercent').val() <= 0)
																	{
																		$('#BetProfit').html(0);
																	}
																	if($('#BetSize').val() <= 0)
																	{
																		$('#BetProfit').html(0);
																	}
																	}

                                                                    function sss() {
                                                                        $('#hashBet').fadeOut('slow', function() {
                                                                            $('#hashBet').fadeIn('slow', function() {

                                                                            });
                                                                        });
                                                                    }
                                                                    $('#BetPercent').keyup(function() {
                                                                        $('#BetProfit').html(((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2));
                                                                        $('#MinRange').html(Math.floor(($('#BetPercent').val() / 100) * 999999));
                                                                        $('#MaxRange').html(999999 - Math.floor(($('#BetPercent').val() / 100) * 999999));
                                                                    });
                                                                    $('#BetSize').keyup(function() {
                                                                        $('#MinRange').html(Math.floor(($('#BetPercent').val() / 100) * 999999));
                                                                        $('#MaxRange').html(999999 - Math.floor(($('#BetPercent').val() / 100) * 999999));
                                                                        $('#BetProfit').html(((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2));
                                                                    });
                                                                
					function deposit() {
						if ( $('#systemPay').val() > 3 || !$.isNumeric($('#systemPay').val())){
							$('#error_deposit').show();
							return $('#error_deposit').html('Укажите систему пополнения');
						}
						if ( $('#depositSize').val() == ''){
							$('#error_deposit').show();
							return $('#error_deposit').html('Введите сумму');
						}
						
						if (!$.isNumeric($('#depositSize').val())){
							$('#error_deposit').show();
							return $('#error_deposit').html('Введите корректную сумму');
						}
						$.ajax({
                    type: 'POST',
                    url: 'action.php',
                    data: {
                        type: "deposit",
                        sid: Cookies.get('sid'),
                        system: $('#systemPay').val(),
                        size: $('#depositSize').val()
                    },
                    success: function(data) {
                        var obj = jQuery.parseJSON(data);
                        if (obj.success == "success") {
							 $('#depositLoad').show();
							window.location.href = obj.locations;
                        }

                        if (obj.success == "error") {
                            $('#error_deposit').show();
                            return $('#error_deposit').html(obj.text);
                        }

                    }
                });
						
					}
					
            function withdraw() {
                if ($('#WithdrawSize').val() == '' || $('#walletNumber').val() == '' || $('#hide_search').val() == '') {
                    $('#error_withdraw').show();
                    return $('#error_withdraw').html('Заполните все поля');
                }
				
                $.ajax({
                    type: 'POST',
                    url: 'action.php',
                    beforeSend: function() {
                        $('#withdrawB').html('');
                        $('#error_withdraw').hide();
                        $('#succes_withdraw').hide();
                        $('#loader').css('display', '');
                    },
                    data: {
                        type: "withdraw",
                        sid: Cookies.get('sid'),
                        system: $('#hide_search').val(),
                        size: $('#WithdrawSize').val(),
                        wallet: $('#walletNumber').val()
                    },
                    success: function(data) {
																		

                        $('#withdrawB').html('Выплата');
                        
                        $('#loader').css('display', 'none');
                        var obj = jQuery.parseJSON(data);
                        if (obj.success == "success") {
							$('#emptyHistory').hide();
                            $('#succes_withdraw').show();
                            var tt = $('#withdrawT').html();
                            $('#withdrawT').html(obj.add_bd + tt);
                            updateBalance(obj.balance, obj.new_balance);
                        }

                        if (obj.success == "error") {
                            $('#error_withdraw').show();
                            return $('#error_withdraw').html(obj.error);
                        }

                    }
                });
            }

            function withdrawSelect() {
                $('#walletNumber').val('');
                var e = $('#hide_search').val();
                if (e == 1) {
                    $('#nameWithdraw').html('Номер телефона:');
                    $('#walletNumber').attr('placeholder', '+79871540280');
                }
                    if (e == 2) {
                        $('#walletNumber').attr('placeholder', '410011499718000');
           } 
};