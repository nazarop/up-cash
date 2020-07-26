function changeBackground() {
	if($("body").hasClass("bg_1")) {
		$("body").removeClass("bg_1");
		$("body").removeClass("bg_3");
		$("body").removeClass("bg_4");
		$("body").addClass("bg_2");
	} else if ($("body").hasClass("bg_2")) {
		$("body").removeClass("bg_1");
		$("body").removeClass("bg_2");
		$("body").removeClass("bg_4");
		$("body").addClass("bg_3");
	} else if ($("body").hasClass("bg_3")) {
		$("body").removeClass("bg_1");
		$("body").removeClass("bg_2");
		$("body").removeClass("bg_3");
		$("body").addClass("bg_4");
	} else if ($("body").hasClass("bg_4")) {
		$("body").removeClass("bg_2");
		$("body").removeClass("bg_3");
		$("body").removeClass("bg_4");
		$("body").addClass("bg_1");
	}
}

$(".sound_button").click(function() {
	var audio = new Audio();
	audio.src = "/files/sound.mp3"; 
	audio.play();
});