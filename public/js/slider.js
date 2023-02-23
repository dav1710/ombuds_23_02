const slider = $('#lightgallery');
const firstSlide = slider.children('a').first(); 
const lastSlide = slider.children('a').last();
const buttons = $('#slide-left, #slide-right');


if (slider.children('a').length > 1) $('#slide-right').show();

firstSlide.addClass('active');

$('#slide-left').on('click', function () {
	slideToLeft();
	let activeSlide = slider.children('a.active')
	activeSlide.prev().addClass('active');
	activeSlide.removeClass('active');
});

$('#slide-right').on('click', function () {
	slideToRight();
	let activeSlide = slider.children('a.active');
	activeSlide.next().addClass('active');
	activeSlide.removeClass('active');
});

buttons.on('click', function () {
	if(firstSlide.hasClass('active')) {
		$('#slide-left').hide();
        $('#slide-right').show();
	}
	else if (lastSlide.hasClass('active')) {
		$('#slide-right').hide();
        $('#slide-left').show();
	}
	else {
		buttons.show();
	}
});

function slideToLeft() {
	slider.animate({scrollLeft: '-=' + $('.news-slider a img').width()}, 300);
};

function slideToRight() {
	slider.animate({scrollLeft: '+=' + $('.news-slider a img').width()}, 300);
};