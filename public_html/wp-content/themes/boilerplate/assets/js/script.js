/* Author:

*/


// Global Variables

var isMobile = /Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent);


$(document).ready(function() {
	$('input, textarea').placeholder();
	masonry_init();
	initMobile();
	$('.icheck').iCheck({
 		checkboxClass: 'icheckbox',
        radioClass: 'iradio'
	});
	click_init();
	//menuOffset();
	FastClick.attach(document.body);
});



function masonry_init() {
	var $container = $('#articles-columns').masonry();
	$container.imagesLoaded( function() {
		$container.masonry({
			columnWidth: '.grid-sizer',
			itemSelector: '.col'
		});
	});
	$('.col').css({
		'opacity': 0
	});

}

function masonry_init_only(){
	var $container = $('#articles-columns').masonry();
	$container.imagesLoaded( function() {
		$container.masonry({
			columnWidth: '.grid-sizer',
			itemSelector: '.col'
		});
	});
}

$(window).load(function() {
	$('.col').animate({opacity: 1});
});






function initMobile() {
	$('body').prepend('<div class="mobile-menu-bg"></div>');
	var navToggle =  $('.nav-toggle');
	var navCollapse = $('.nav-collapse');
	var $navList = $('.nav').find('li');
	navToggle.on('click', function(event) {
		if (navCollapse.height() === 0) {
			var curHeight = navCollapse.height();
			var autoHeight = navCollapse.css('height', 'auto').height();
			navCollapse.height(curHeight).animate({
				height : autoHeight									 
			}, 200, function() {
				navCollapse.css('height', 'auto');
				
			});	
			$('.mobile-menu-bg').fadeIn();
		} else {
			navCollapse.height(curHeight).animate({
				height : 0								 
			}, 200);
			$('.mobile-menu-bg').hide();
		}
		event.stopPropagation();
	});
	if (isMobile) {
		navToggle.on('click', function(event) {
			if (navCollapse.height() === 0) {
				var curHeight = navCollapse.height();
				var autoHeight = navCollapse.css('height', 'auto').height();
				$navList.find('a').css('overflow','auto');
				$('.form-block .form-group:last-child').css('overflow','auto');
				navCollapse.height(curHeight).animate({
					height : autoHeight									 
				}, 200, function() {
					navCollapse.css('height', 'auto');
				});	
				$('.mobile-menu-bg').fadeIn();
			} else {
				navCollapse.height(curHeight).animate({
					height : 0								 
				}, 200);
				$navList.find('a').css('overflow','');
				$('.form-block .form-group:last-child').css('overflow','');
				//navbar.removeClass('open');
				$('.mobile-menu-bg').hide();
			}
			event.stopPropagation();
		});
		$navList.on('click', function() {
			navCollapse.height(navCollapse.height()).animate({
				height : 0								 
			}, 200);
			$('.mobile-menu-bg').hide();
		});
	}
}



function menuOffset() {
	var $mainOffset = $('.main').offset().top;
	$(window).scroll(function() {
		var $scrollOffset = $(window).scrollTop();
		if ($scrollOffset > $mainOffset) {
			$('.nav-collapse').addClass('fixed');
		} else {
			$('.nav-collapse').removeClass('fixed');
		}
	});
}

$('.popup_link').click(function(e){
	e.preventDefault();
	link = $(this).attr('href');
	popupwindow(link, 'share', 640, 420);
});

function popupwindow(url, title, w, h) {
  var left = (screen.width/2)-(w/2);
  var top = (screen.height/2)-(h/2);
  return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
}

function click_init() {
	$('.article-content').each(function() {
		var $articleContent = $(this);
		$articleContent.on('click', function(event) {
			if(!isMobile){
				window.location.href = $articleContent.find('h1 a').attr('href');
			}
			if ($articleContent.hasClass('active')) {
				window.location.href = $articleContent.find('h1 a').attr('href');
			} else {
				event.preventDefault();
				$('.article-content').removeClass('active');
				$articleContent.addClass('active');
			}
		});
	});
}

function isScrolledIntoView(elem)
{

    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();

    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}

$(window).scroll(function () {
	show_more = '.show-more';
	if($(show_more).length){
	  if(isScrolledIntoView(show_more) == true){
		load_more_after = 12;
		var offset = $('#articles-columns .col').length;
		var query_string = $('.show-more-query').html();
		$show_more = $(show_more).detach();
		$('#articles-columns').after('<span class="show-more-loader"></span>');
	    $.ajax({
	    	dataType : "html",
	        url : ajaxurl,
	        data : {action: "show_more_posts", offset : offset, query_string: query_string},
	        success: function(response) {
				$('.show-more-loader').remove();
	    		$('#articles-columns').append($('.col',response)).masonry('reloadItems');
				masonry_init_only();
				$('.col').animate({opacity: 1});
				//console.log($('.col',response).length);
	            if($('.col',response).length == load_more_after){
	              $('#articles-columns').after($show_more);
	            }
				click_init();
				//twttr.widgets.load();
				//popups_init();
				//comment_ajax_init();
			}
	    });
	   }
	}	
});