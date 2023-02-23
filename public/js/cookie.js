window.onload = function () {
	if (localStorage.getItem("hasCodeRunBefore") === null) {
		localStorage.setItem("hasCodeRunBefore", true);
		$('.cookie_block').css('display', 'flex');

		setTimeout(function () {
			$('.cookie_block').fadeOut('slow');
		}, 3000);
	}
}

$('.prefInvis:not(:last-child)').on('click', function () {
	$.ajax({
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
		type: 'POST',
		url: '/cookie/set',
		data: { id: $(this).attr('id') }
	});

	toggle_styles(this);
});

function check_cookies(cookies) {
	for (const style of cookies.split(' ')) {
		if(style) {
			$('#' + style).css('opacity', '1');

			if(style.includes('font')){ 
				$('body *').toggleClass(style);
			}
			else if (style.includes('style')) {
				$('body').toggleClass(style);
			}
		}
	}

}

function toggle_styles(button) {
	if($(button).attr('id').includes('font')) {
		if ($(button).attr('id') == "font_tahoma") {
			$('body *').removeClass('font_armenian');
			$('#font_armenian').css('opacity', '0.6');
		}
		else {
			$('body *').removeClass('font_tahoma');
			$('#font_tahoma').css('opacity', '0.6');
		}

		$('body *').toggleClass($(button).attr('id'));
	}
	else {
		$(".prefInvis:not(#" + $(button).attr('id') + ", #font_tahoma, #font_armenian)").css('opacity', '0.6');
		$('body').attr('class', ''); 
	}

	if ($(button).css('opacity') == '0.6') {
		$(button).css('opacity', '1')
		$('body').toggleClass($(button).attr('id'));
	}
	else {
		$(button).css('opacity', '0.6');
	}
}

function revert() {
	$('.prefInvis').css('opacity', '0.6')
	$('body').attr('class', '');
	$('body *').removeClass('font_armenian');
	$('body *').removeClass('font_tahoma');

	$.ajax({
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
		type: 'POST',
		url: '/cookie/destroy'
	});
}

function preferences() {
	$('.prefInvis').toggle('fast');
}

function cookie_close() {
	$('.cookie_block').fadeOut();
}