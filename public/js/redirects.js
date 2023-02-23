// Need Refactoring
const pages = {
	about: '#defender#biography', 
	apply: '#main', 
	directions: '#applications_complaints', 
	reports: '#yearly_reports', 
	courses: '#education_awareness', 
	torture: '#main', 
	soldier_rights: '#main', 
	women_rights: '#main', 
	child_rights: '#main', 
	invalid_rights: '#main', 
	business_rights: '#main'
};

const redirects = {
	'history': '#section7_1-tab',
	'staff': '#section2_1-tab',
	'defenders': '#section1_1-tab'
}

const tabs = ['news', 'cooperation', 'staff', 'constitution', 'law', 'international', 'advice', 'history', 'main', 'questions', 'contact', 'applications_complaints', 'monitoring', 'yearly_reports', 'special_reports', 'annual_reports', 'opinions','legislative', 'analysis', 'education_awareness', 'guide', 'visits','reports_analyses', 'documents', 'advice', 'defender'];
const inner_tabs = ['biography', 'mission', 'structure', 'employees', 'jobs', 'budget', 'buys', 'former'];

tab_on_click_change_hash();

$(window).on('hashchange', () => { hash_change() });

$(() => { window.location.hash ? hash_change() : check_url() });

$('#droped-languages .lang-item').on('click', function () { hash_send($(this).attr('href')) });

function hash_change() {
	let fullhash = window.location.hash.substring(1);
	let hash = fullhash;
	let inner_hash = fullhash.substring(fullhash.indexOf('#') + 1);

	if(fullhash.substring(1).indexOf("#") > -1) {
		hash = fullhash.substring(0, fullhash.substring(1).indexOf("#") + 1);
	}

	toggle_tabs(hash);

	if (inner_hash) toggle_inner_tabs(hash, inner_hash);

	window.location.hash == '#main' ? toggle_main() : toggle_first_tab(fullhash); 

	return hash, inner_hash, fullhash;
}

function toggle_tabs(hash) { // toggles tab which is named in url hash
	$('.custom_list_group_action').map(function () {
		if ($(this).attr('class').includes(hash + ' ')) {
			$('.custom_list_group_action:not(.about_as_small .nav-item .nav-link)').removeClass('active');
			$('.tab-pane:not(.tab-content .tab-content .tab-pane)').removeClass('show active');
			$(this).addClass('active');
			$($(this).data("bsTarget")).addClass('show active');
		}
	});
}

function toggle_main() { // toggles main tab if exists
	if($('#section0').length) {
		$('.custom_list_group_action').removeClass('active');
	}
	$('.tab-pane').removeClass('show active');
	$('.tab-pane:first').addClass('show active');
}

function toggle_first_tab(fullhash) { // toggles first tab if need
	for (const [key, value] of Object.entries(redirects)) {
		if (fullhash == key) {
			$('.about_as_small .nav-item .nav-link').removeClass('active');
			$('.tab-content .tab-content .tab-pane').removeClass('show active');
			$(value).addClass('active');
			$($(value).data('bsTarget')).addClass('show active');
		}
	}
}

function toggle_inner_tabs(hash, inner_hash) { // toggles inner tabs in about page
	$('.about_as_small .nav-item .nav-link').map(function () {
		if ($(this).attr('class').includes(inner_hash) && $(this).attr('class').includes(hash)) {
			$('.about_as_small .nav-item .nav-link').removeClass('active');
			$('.tab-content .tab-content .tab-pane').removeClass('show active');
			$(this).addClass('active');
			$($(this).data('bsTarget')).addClass('show active');
		}
	});
}

function check_url() { // adds custom hash to link if need
	for (const [key, value] of Object.entries(pages)) {
		if (window.location.href.includes(key) && !window.location.hash) {
			window.location.href += value;
		}
	}
}

function tab_on_click_change_hash() {
	for (let page of Object.keys(pages)) { // Tabs on click add change hash
		for (let tab of tabs) {
			$('button.' + page + '_' + tab).on('click', () => {
				window.location.href = page + '#' + tab;
			});
	
			for (let inner_tab of inner_tabs) {
				let button = 'button.' + page + '_' + tab;
				let inner_button = 'button.' + page + '_' + tab + '_' + inner_tab; 
				let show = $($(button).data('bsTarget') + ' .nav-link');
	
				if(show.length) {
					if(show.attr('class').includes(inner_tab)) {
						$(button).on('click', () => {
							window.location.href = page + '#' + tab + '#' + inner_tab;
						});
					}
				}
	
				$(inner_button).on('click', () => {
					window.location.href = page + '#' + tab + '#' + inner_tab;
				});
			}
		}
	}
}

function hash_send(url) { // On language change send hash
	$.ajax({
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
		type: 'POST',
		url: '/hash',
		data: { hash: window.location.hash },
		success: function () { window.location.href = url }
	});
}