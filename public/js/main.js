//Preloader
$(window).on('load', function() {
	setTimeout(function () {
		$('.load').fadeOut('slow');
	}, 500);
});

//Carousel
$('.carousel-item:first').addClass('active');
$('.carousel-indicators li:first').addClass('active');

// Home Page Audio
$(document).ready(() => {
	let audio = document.getElementById('autoplay_audio');
	if(audio) audio.play();
});

$(document).keypress(function (event) {
	var key = (event.keyCode ? event.keyCode : event.which);
	var ch = String.fromCharCode(key)
	if (ch == '1') {
		$('.popup').toggle('fast');
	}
	else if ($('.popup').css('display') == 'block') {
		$('.popup_item').each(function () {
			let letter = this.textContent.charAt(0);

			if (letter == ch) {
				window.location.href = $(this).children().attr('href');
			}
		});
	}
});

// Applicant
$('.apply_not_id_form').on('submit', function (event) {
	$('.apply_submit').attr('disabled', true);
	$('.apply_success_block').fadeIn('fast');

	setTimeout(function () {
		$('.apply_submit').attr('disabled', false);
		$('.apply_success_block').fadeOut('fast');
		$('.apply_success_img').css('display', 'none');
		$('.apply_error_img').css('display', 'none');
	}, 3000);
                                                                                                                                                                                                                                                                                                                                                                                                                                                         
	event.preventDefault();
	let data = new FormData(this);
	data.append("_token", $('meta[name="csrf-token"]').attr('content'));
	
	$.ajax({
		url: '/applicant/send',
		method: 'POST',
		data: data,
		contentType: false,
		processData: false,
		success: function () {
			$('.apply_not_id_form_errors').css('display', 'none');
			$('.apply_success_img').fadeIn('fast');
			$('.apply_not_id_form')[0].reset();
		},
		error:  function (data) {
			$('.apply_error_img').fadeIn('fast');
			let errors = [];

			for (const [key, value] of Object.entries(data.responseJSON.errors)) {
				if (key == "file") {
					errors.push("<<Կցել ֆայլ>> դաշտը պարտադիր է լրացման համար");
				}
				else {
					errors.push(value[1].toString());
				}
			}

			$('.apply_not_id_form_errors ul').empty();

			for (const error of errors) {
				let element = '<li>'+ error + '</li>';
				$('.apply_not_id_form_errors ul').append(element);
			}
			
			setTimeout(function () {
				$('.apply_not_id_form_errors').fadeIn('fast', function () {
					$(this).css('visibility', 'visible');
				});
			}, 1000);
		}
	});
});

$('.apply_defender_id_card').click(function () {
	alert('Նույնականացման քարտը տեղադրված չէ։')
	return false;
});

$('input[name=search]').parents('form').on('submit', function (event) {
	let input = $(this).children('input[name=search]');
	if (input.val().startsWith(' ')) {
		event.preventDefault();
	}
});

function language(element) {
	$(element).next('#droped-languages').slideToggle({
		duration: 200,
		start: function () {
			$(this).css('display', 'flex');
			$(this).css('flex-direction', 'column');
		}
	});
	$(element).toggleClass('active');
	$('[id=lang-arrow]').toggleClass('active');
}

function hot_line(element) {
	$(element).attr('style', 'display: none !important');
	$(element).next().fadeIn('slow');

	setTimeout(function () {
		$(element).attr('style', 'display: flex !important');
		$(element).next().attr('style', 'display: none !important');
	}, 5000);
}

function toggle_search() {
	$('#search-form-sm').toggle('fast', function () {
		$(this).toggleClass('d-flex align-items-center');
	});
	$('#search-block-sm button:first-child').toggle();
	setTimeout(function () {
		$('#search-block-sm button:first-child').toggleClass('d-flex');
		$('#search-form-sm').toggleClass('d-none');
	}, 5000);
}
