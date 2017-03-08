var terminology_information = []; //Global variable to keep terminology

$(function() {
	//Initialize all actions after load DOM
	hide_loader();
	open_feedback();
	close_feedback();
	choose_main_matter();
	click_home();
	select_answer();
	click_accordion();
	update_from_breadcrumb();
	send_feedback();
	pop_state_window_history();
	load_hash_url();
	on_print();
});

// Show Loader
function show_loader() {
	$("#fade").show();
	$("#modal").show();
}

// Hide Loader
function hide_loader() {
	$("#fade").hide();
	$("#modal").hide();
}

// Open feedback box
function open_feedback() {
	$(".bottom").attr("style", "height: 60px");
	$(".content").attr("style", "padding-bottom: " + $(".bottom").height() + "px");
	$(".feedback-open").on("click", function(){
		$(".feedback-box").fadeIn();
		$(".bottom").removeAttr("style");
		$(".content").attr("style", "padding-bottom: " + $(".bottom").height() + "px");
	});
	$('.feedback-open').keypress(function(e){
        if(e.which == 13){//Enter key pressed
            $(this).click();
        }
    });
}

// Close feedback box
function close_feedback() {
	$(".feedback-close").on("click", function(){
		$(".feedback-box").fadeOut();
		$(".bottom").attr("style", "height: 60px");
		$(".content").attr("style", "padding-bottom: " + $(".bottom").height() + "px");
	});
	$('.feedback-close').keypress(function(e){
        if(e.which == 13){//Enter key pressed
            $(this).click();
        }
    });
}
// Show main matters, hide previous sections and reset breadcumbs
function click_home() {
	$(".home-icon, .logo").on("click", function(){
		show_loader();
		hide_inner_section();
		hide_outcome_page();
		show_main_matter_sections();
		hide_loader();
		$(".question h3").html();
		$(".question span").html();
		reset_breadcrumb();
		reset_outcome_page();
	    push_state_window_history("");
	});
	$('.home-icon, .logo').keypress(function(e){
        if(e.which == 13){//Enter key pressed
			$(this).click();
        }
    });
}

// Hide main matter section
function hide_main_matter_sections() {
	$(".banner-section").hide();
	$(".main-content").hide();
}

// Show main matter section
function show_main_matter_sections() {
	$(".banner-section").show();
	$(".main-content").show();
}

// Show inner sections before reaching an outcome page
function show_inner_section() {
	$(".breadcrumbs").show();
	$(".inner-sections").show();
}

// Hide inner sections 
function hide_inner_section() {
	$(".breadcrumbs").hide();
	$(".inner-sections").hide();
}

// Show outcome page
function show_outcome_page() {
	$(".breadcrumbs").show();
	$(".outcome-page").show();
}

// Hide outcome page
function hide_outcome_page() {
	$(".outcome-page").hide();
}

// Open by default accordion and left tabs
function open_acordion() {
	$(".tabs-left li:first a").click();
	//$("#accordion a:first").click();
}

// Reset breadcrumb
function reset_breadcrumb() {
	$(".breadcrum_element").remove();
}

//Arrow effect when panel heading clicked
function click_accordion() {
	$('body').on('click', '.panel-heading', function(){
		
		if($(this).parent().find("i").hasClass("fa-chevron-circle-down")) {
			$(this).parent().parent().find("i").removeClass("fa-chevron-circle-down").addClass("fa-chevron-circle-right");
		} else {
			$(this).parent().parent().find("i").removeClass("fa-chevron-circle-down").addClass("fa-chevron-circle-right");
			$(this).parent().find("i").removeClass("fa-chevron-circle-right").addClass("fa-chevron-circle-down");
		}
	});
	
	$('body').on('keypress', '.panel-heading', function(e){
        if(e.which == 13){//Enter key pressed
			$(this).click();
        }
    });
}

// Add answer to breadcrumbs
function set_breadcrumb(page_breadcrumb) {
	var output = '';
	for (var i = page_breadcrumb.length -1 ; i >= 0 ; i--) {
		if(i % 2 == 0){
			var nid = page_breadcrumb[i].nid;
			var title = page_breadcrumb[i].title;
			if(title.length > 25) {
				title = title.substring(0, 23) + '...';
			} 
			output += "<span class='breadcrum_element' id='" + nid 
			+ "'  tabindex='0'> <i class='fa fa-angle-right' aria-hidden='true'></i> " + title + "</span>";
		}
	}
	reset_breadcrumb();
	$(".breadcrumbs").append(output);
	var previous_url = encodeURI(page_breadcrumb[0].nid + "-" + page_breadcrumb[0].title);
	if (window.history.state != null && !window.history.state.url.includes(previous_url)){
		push_state_window_history(encodeURI(page_breadcrumb[0].nid + "-" + page_breadcrumb[0].title));
	} else if(window.history.state == null) {
		push_state_window_history(encodeURI(page_breadcrumb[0].nid + "-" + page_breadcrumb[0].title));
	}
}

// If an emlement in beadcrumb is clicked then remove elements after the clicked one
function update_from_breadcrumb() {
	$("body").on("click", ".breadcrum_element",function(){
		var nid = $(this).attr("id"); 
		get_matter_by_nid(nid);
	});
	
	$("body").on("keypress", ".breadcrum_element", function(e){
        if(e.which == 13){//Enter key pressed
            $(this).click();
        }
    });
}

// Set answers of questions at inner pages with Mustache JS 
function set_answers(data) {
	var answers = data.answers;
	var answers_mustache = {answers:[]};
	for (nid in answers) {
		var title = answers[nid].title;
		var item = {};
		item.nid = nid;
		item.title = title;
		answers_mustache.answers.push(item);
	}
	var targetContainer = $(".answers"),
    template = $("#answers-template").html();
	var html = Mustache.to_html(template, answers_mustache);
	$(targetContainer).html(html);
	set_breadcrumb(data.breadcrumbs);
}

// Set questions at inner pages
function set_question(question) {
	for (nid in question) {
		var title = question[nid].title;
		$(".question h3").html(title);
		if(question[nid].body.length >0 ){
			$(".question span").html(question[nid].body.und[0].value);
		}
	}
}

// Get information of answer to be redirected and update breadcrumb
function select_answer(){
	$("#next").on("click", function() {
		if($("input[name=optradio]:checked").length > 0){
			var nid = $("input[name=optradio]:checked").attr("id");
			var title = $("input[name=optradio]:checked").parent().text();
			 get_matter_by_nid(nid);
		}	
	});
	
	$('#next').keypress(function(e){
        if(e.which == 13){//Enter key pressed
			$(this).click();	
        }
    });
}

// Get information of main matter after click and update breadcrumb
function choose_main_matter() {
	$(".matter-item").on("click", function(){
		var nid = $(this).attr("id");
		var title = $(this).find("h4").text();
		get_matter_by_nid(nid);
	});	
	
	$('.matter-item').keypress(function(e){
        if(e.which == 13){//Enter key pressed
			$(this).click();
        }
    });
}

// Get matter by nid gets information via AJAX about an specific matter
function get_matter_by_nid(nid) {
	show_loader();
	var data_url = "/get-sub-matters.json";
  	$.post( data_url, { nid: nid })
	  .done(function( data ) {
	    hide_main_matter_sections();
		set_question(data.question);
		if(Object.keys(data.answers).length > 0) {
			set_answers(data);
    		show_inner_section();
    		hide_outcome_page();
		} else {
			hide_inner_section();
			get_outcome_by_nid(nid);
			show_outcome_page();
		}
		hide_loader();
	  });
}

// Get outcome page by nid gets information via AJAX about an specific outcome
function get_outcome_by_nid(nid) {
	show_loader();
	var data_url = "/get-outcome.json";
  	$.post( data_url, { nid: nid })
	  .done(function( data ) {
	    set_outcome(data);
		hide_loader();
		open_acordion();
	  });
}

// Set outcome page in content with Mustache JS 
function set_outcome(outcome){
	
	var outcome_mustache = {outcome:{}};
	var targetContainer = $(".outcome-page"),
    template = $("#outcome-page-template").html();

	var title = outcome.title;
	var description = "";
	var hide_headline = false;
	if(Object.keys(outcome.body).length > 0) {
		description = outcome.body.und[0].value;
	} else {
		hide_headline = true;
	}
	
	var office_information = [];
	for(pos in outcome.office_information){
		var item = {};
		item.id = outcome.office_information[pos].id;
		item.title = outcome.office_information[pos].title;
		item.description = outcome.office_information[pos].description;
		item.street = outcome.office_information[pos].street;
		item.map = outcome.office_information[pos].map;
		office_information.push(item);
	}
	
	terminology_information = [];
	for(pos in outcome.terminology_information){
		var item = {};
		item.id = outcome.terminology_information[pos].tid;
		item.name = outcome.terminology_information[pos].name;
		item.description = html_unescape(outcome.terminology_information[pos].description.replace(/<(?:.|\n)*?>/gm, ''));
		terminology_information.push(item);
	}

	var useful_information = [];
	for(pos in outcome.useful_information){
		var item = {};
		item.id = outcome.useful_information[pos].id;
		item.title = outcome.useful_information[pos].title;
		item.description =  underline_terms_in_description(terminology_information, outcome.useful_information[pos].description);
		useful_information.push(item);
	}
	
	outcome_mustache.outcome.title = title;
	outcome_mustache.outcome.description = description;
	outcome_mustache.outcome.useful_information = useful_information;
	outcome_mustache.outcome.office_information = office_information;
	outcome_mustache.outcome.terminology_information = terminology_information;
	var html = Mustache.to_html(template, outcome_mustache);
	$(targetContainer).html(html);
	set_breadcrumb(outcome.breadcrumbs);
	add_tooltip_to_links();
	highlight_underlined();
	show_or_hide_terminology();
	hide_sections(hide_headline);
}

// Set and empty outcome page in content with Mustache JS 
function reset_outcome_page() {
	
	var outcome_mustache = {outcome:{}};
	var targetContainer = $(".outcome-page"),
    template = $("#outcome-page-template").html();


	var title = "";
	var description = "";
	
	var useful_information = [];
	var office_information = [];
	outcome_mustache.outcome.title = title;
	outcome_mustache.outcome.description = description;
	outcome_mustache.outcome.useful_information = useful_information;
	outcome_mustache.outcome.office_information = office_information;
	var html = Mustache.to_html(template, outcome_mustache);
	$(targetContainer).html(html);
}

// Send email with feedback
function send_feedback() {
	$('.feedback-btn').on('click', function (event) {
	    event.preventDefault();
	    var email = 'vla_fellows@codeforaustralia.org';
	    var subject = 'Legal aid checker - Feedback';
	    var emailBody = $(".feedback-box textarea").val();
	    window.location = 'mailto:' + email + '?subject=' + subject + '&body=' +   emailBody;
	    $(".feedback-box textarea").val("");
	});
	
	$('.feedback-btn').keypress(function(e){
        if(e.which == 13){//Enter key pressed
			$(this).click();
        }
    });
}

// Add tool tips to dynamic content
function add_tooltip_to_links(){
	//Just panel items
	var extra_links = $(".useful-information .panel-collapse a, .tab-content a, .headline a, .footer a");
	
	for (var i = 0; i < extra_links.length; i++) {
		$(extra_links[i]).attr("data-toggle","tooltip");
		$(extra_links[i]).attr("title","Opens in new window");
		$(extra_links[i]).attr("data-placement","bottom");
		$(extra_links[i]).attr("target","_blank");
	}
	//initialize tooltips for dynamic content
	$('.useful-information .panel-collapse, .tab-content, .headline, .footer').tooltip({
	    selector: '[data-toggle="tooltip"]'
	});
}

// Hihglight terms when roll over underlined keywords
function highlight_underlined() {
	$(".panel-group u").mouseover(function() {
    	var term_lower = $(this).text();
    	var term = capitalizeFirstLetter($(this).text());
	    $( ".terminology p" ).removeClass("highlight");
	    $( ".terminology span.term-title:contains('" + term_lower + "'), span.term-title:contains('" + term + "')" ).parent().addClass("highlight");
	})
}

// Underline terms in descriptions tabs
function underline_terms_in_description(terms, description){
	for(term in terms){
		var replace_term = terms[term].name.toLowerCase();
		description = description.split(replace_term).join('<u>' + replace_term + '</u>');
	}
	return description;
}

// Capitalize First letters
function capitalizeFirstLetter(string) {
    return string.replace(/^./, string[0].toUpperCase());
}

// When empty terminology expand description section or make it smaller when terminology present
function show_or_hide_terminology(){
	if(terminology_information.length < 1) {
		$(".terminology").hide();
		$(".useful-information").removeClass("col-md-9");
		$(".useful-information").addClass("col-md-12");
	} else {
		$(".terminology").show();
		$(".useful-information").addClass("col-md-9");
		$(".useful-information").removeClass("col-md-12");
	}
}

//Hide sections when Other oucome page is open
function hide_sections(hide_headline) {
	var breadcrumb = $(".breadcrum_element");
	if((breadcrumb.length > 0) && $(breadcrumb[0]).text().trim().toUpperCase() == 'Other'.toUpperCase()) {
		$(".headline h3").show();
		$(".headline h5").hide();
		$(".heading-info").hide();
		$(".useful-information").hide();
		$(".where-to-go").hide();
	}
	if(hide_headline){
		$(".headline").hide();
	} else {
		$(".headline").show();
	}
}

// Add a hash url to browser history
function push_state_window_history(url) {
	var matter_url = "/matter/checker#" + url + "";
    window.history.pushState({url: matter_url}, "", matter_url);
    set_ga_page_view(matter_url);
}

// Go back in history when back button is pressed
function pop_state_window_history() {
	window.onpopstate = function(e) {
	    if (e.state) {
	    	var prev_url = e.state.url.split('#')[1];
	    	set_ga_page_view(prev_url);
			var nid = prev_url.split('-')[0];
			if (nid != '') {
	    		get_matter_by_nid(nid);
			} else {
				$('.home-icon').click();
				set_ga_page_view("/");
			}
	    } else {
	    	$('.home-icon').click();
				set_ga_page_view("/");
	    }
	};
}

// Load content when user come from hash URL or site is refreshed
function load_hash_url() {
	var hash_url = window.location.hash;
	if (hash_url) {
		set_ga_page_view(hash_url);
		var pre_url = hash_url.split('#')[1];
		var nid = pre_url.split('-')[0];
		if (nid != '') {
    		get_matter_by_nid(nid);
		}
	}
}

//Escape html character that could come with descriptions
function html_unescape(s) {
	var div = document.createElement("div");
	div.innerHTML = s;
	return div.textContent || div.innerText; // IE is different
}

//Set page views into google analytics for has navigation
function set_ga_page_view(url){
	ga('set', 'page', url);
	ga('send', 'pageview');
}

//Present all content inside accordion when printing
function on_print(){
	$("#print-page").on("click", function() {
		$('#accordion .collapse').collapse('show');
		setTimeout(function () {
	        window.print();
	    }, 1000);
	});
	
	$('#print-page').keypress(function(e){
        if(e.which == 13){//Enter key pressed
			$(this).click();
        }
    });
}