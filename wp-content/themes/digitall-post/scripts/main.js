'use strict';
var almPreviousPost={};jQuery(document).ready(function($){if(typeof window.history.pushState=='function'){almPreviousPost.init=true;almPreviousPost.initPageTitle=document.title;almPreviousPost.titleTemplate='';almPreviousPost.pageview=true;almPreviousPost.animating=false;almPreviousPost.scroll=true;almPreviousPost.speed=500;almPreviousPost.offset=30;almPreviousPost.popstate=false;almPreviousPost.active=false;if($('.alm-listing').attr('data-previous-post')==='true'){almPreviousPost.active=true;}
var almPreviousPostTimer,almPreviousPostFirst=$('.alm-previous-post').eq(0);$(window).bind('scroll touchstart',function(){var scrollTop=$(this).scrollTop();if(almPreviousPost.active&&!almPreviousPost.popstate&&scrollTop>1){almPreviousPostTimer=window.setTimeout(function(){var fromTop=scrollTop+almPreviousPost.offset,posts=$('.alm-previous-post'),url=window.location.href;var cur=posts.map(function(){if($(this).offset().top<fromTop)
return this;});cur=cur[cur.length-1];var id=$(cur).data('id'),permalink=$(cur).data('url'),title=$(cur).data('title');if(id===undefined){id=almPreviousPostFirst.data('id');permalink=almPreviousPostFirst.data('url');title=almPreviousPostFirst.data('title');}
if(url!==permalink){almPreviousPost.setURL(id,permalink,title);}},200);}});$.fn.almSetPreviousPost=function(alm,id,permalink,title){almPreviousPost.titleTemplate=alm.previous_post_title_template;if(almPreviousPost.init){almPreviousPost.siteTitle=alm.siteTitle;almPreviousPost.siteTagline=alm.siteTagline;almPreviousPost.pageview=alm.previous_post_pageview;almPreviousPost.scroll=alm.previous_post_scroll;almPreviousPost.speed=alm.previous_post_scroll_speed;almPreviousPost.offset=parseInt(alm.previous_post_scroll_top);if(almPreviousPost.scroll==='true'){almPreviousPost.scroll=true;}else{almPreviousPost.scroll=false;}
almPreviousPost.init=false;}else{if(almPreviousPost.scroll){almPreviousPost.scrollToPost(id);}}}
window.addEventListener('popstate',function(event){if(!almPreviousPost.init){if(almPreviousPost.active){almPreviousPost.popstate=true;var id;if(event.state){id=event.state.postID;almPreviousPost.setPageTitle(event.state.title);}else{id=$('.alm-reveal').eq(0).data('id');document.title=almPreviousPost.initPageTitle;}
var top=$('.alm-reveal.alm-previous-post.post-'+id).offset().top-almPreviousPost.offset+5;$('html, body').animate({scrollTop:top+'px'},1,function(){almPreviousPost.popstate=false;});}}});almPreviousPost.setURL=function(id,permalink,title){almPreviousPost.setPageTitle(title);var state={postID:id,permalink:permalink,title:title};history.pushState(state,title,permalink);if($.isFunction($.fn.almUrlUpdate)){$.fn.almUrlUpdate(permalink,'previous-post');}
if(almPreviousPost.pageview==='true'){var location=window.location.href,path='/'+window.location.pathname;if(typeof ga!=='undefined'&&$.isFunction(ga)){ga('send','pageview',path);}
if(typeof __gaTracker!=='undefined'&&$.isFunction(__gaTracker)){__gaTracker('send','pageview',path);}}}
almPreviousPost.scrollToPost=function(id){var top=$('.alm-reveal.alm-previous-post.post-'+id).offset().top-almPreviousPost.offset+5;$('html, body').animate({scrollTop:top+'px'},almPreviousPost.speed,"alm_easeInOutQuad",function(){almPreviousPost.animating=false;});}
almPreviousPost.setPageTitle=function(title){if(almPreviousPost.titleTemplate===''){document.title=document.title;}else{var str=almPreviousPost.titleTemplate;str=str.replace('{site-title}',almPreviousPost.siteTitle);str=str.replace('{tagline}',almPreviousPost.siteTagline);str=str.replace('{post-title}',title);document.title=str;}}
$.easing.alm_easeInOutQuad=function(x,t,b,c,d){if((t/=d/2)<1)return c/2*t*t+b;return-c/2*((--t)*(t-2)-1)+b;};}});
(function ($) {
	// Main Variables
	var mobile_mode = true;
	var bp_desktop = 900;
	var menu_open = false;
	var menu_hide_interval = 0;
	var menu_page_lastPos = 0;
	var search_open = false;

	/*----------------------------------------------------
 //	FUNCTIONS
 ----------------------------------------------------*/
	// Window Scroll
	function onScroll() {
		// Scroll Variables
		var window_scroll = $(window).scrollTop();

		////////////////////
		// MOBILE MENU 
		// Get header position and height
		var header_position = $('header').offset().top;
		var header_height = header_position + $('header .photo_holder').height();

		// If mobile menu is hidden
		if (!menu_open) {
			// If scroll has passed header position, show fixed menu
			if (window_scroll >= header_height) {
				$('#main_menu').toggleClass('fixed', true);
			} else {
				$('#main_menu').toggleClass('fixed', false);
			}
		}

		////////////////////
		// MOBILE MENU
		// If mobile menu is hidden, update scroll last position
		if (!menu_open) menu_page_lastPos = window_scroll;
	}

	// WINDOW RESIZE HANDLER
	function onResize() {
		// Update Image Ratios
		$('img').each(function () {
			updateImagesRatios($(this));
		});

		// Update App Mode
		if ($(window).innerWidth() >= bp_desktop) {
			mobile_mode = false;
		} else {
			mobile_mode = true;
		}

		// Hide Mobile Menu
		toggleMobileMenu(false);

		// Enable / Disable Scroll from news feed
		if ($(window).innerWidth() >= 728) {
			// Enable
			$('#news_module .news_holder').mCustomScrollbar('update');
		} else {
			console.log('asdasd');
			// Disable 
			$('#news_module .news_holder').mCustomScrollbar('disable');
		}
	}

	// UPDATE IMAGE ASPECT RATIOS
	function updateImagesRatios(_target) {
		// Get ratios of container and image iself
		var holder_ratio = _target.parent().height() / _target.parent().width();
		var image_ratio = _target.height() / _target.width();

		// Compare ratios and fix image layout
		if (holder_ratio > image_ratio) {
			_target.toggleClass('vertical', true);
		} else {
			_target.toggleClass('vertical', false);
		}
	}

	// OPEN / CLOSE MOBILE MENU
	function toggleMobileMenu(_flag) {
		// Update mobile menu flag
		menu_open = _flag;

		// Change styles of menu elements
		$('#mobile_menu').toggleClass('visible', menu_open);
		$('#main_menu #search_frm').toggle(!menu_open);
		$('#main_menu').toggleClass('mobileMenu', menu_open);

		// If mobile menu is open
		if (menu_open) {
			// Update menu styles
			$('#main_menu').removeClass('fixed').css('position', 'fixed');

			// Hide website content to prevent scrolling
			menu_hide_interval = setInterval(function () {
				// Hide all but menu
				$('#main_container > :not(#main_menu)').css({
					'visibility': 'hidden'
				});
			}, 1000);

			// If mobile menu is hidden
		} else {
			// prevent hidding website content
			clearInterval(menu_hide_interval);

			// Show website content
			$('#main_container > :not(#main_menu)').css({
				'visibility': 'visible'
			});

			// Scroll to last postition
			$(window).scrollTop(menu_page_lastPos);
			onScroll();
		}
	}

	// OPEN / CLOSE SEARCH LIGHTBOX
	function toggleSearchWindow(_target) {
		search_open = _target;
		$('#search_module').toggleClass('visible', search_open);
	}

	/*----------------------------------------------------
 //	WINDOW EVENTS
 ----------------------------------------------------*/
	// SCROLL
	$(window).scroll(onScroll);

	// RESIZE
	$(window).on('resize', onResize);

	/*----------------------------------------------------
 //	MOBILE MENU
 ----------------------------------------------------*/
	// MENU ICON BUTTON
	$('#main_menu .menu_icon').click(function (e) {
		//menu_open = !menu_open;
		toggleMobileMenu(!menu_open);

		///
		return false;
	});

	/*----------------------------------------------------
 //	MAIN MENU
 ----------------------------------------------------*/
	// Open Search Lightbox
	$('a.searchWindowOpen_btn').click(function (_e) {
		_e.preventDefault();
		toggleSearchWindow(!search_open);
	});
	$('#search_module .overlay').click(function (_e) {
		_e.preventDefault();
		toggleSearchWindow(false);
	});

	/*----------------------------------------------------
 //	RESPONSIVE / PROPORTIONAL IMAGES
 ----------------------------------------------------*/
	// Hide images and add event listener
	$('img')
	//.css({ 'visibility': 'hidden'})
	//.fadeOut(0)
	.on('load', function () {
		// Update image aspect after load
		updateImagesRatios($(this));

		// Show image
		//$(this).css({ 'visibility': 'visible'})
		//.fadeIn();
	});

	/*----------------------------------------------------
 //	CUSTOM SCROLLBAR
 ----------------------------------------------------*/
	$(window).on('load', function () {
		$('#news_module .news_holder').mCustomScrollbar({
			//live: 'off',
			callbacks: {
				onUpdate: function onUpdate() {
					// disable scrollbars 
					$('#news_module .news_holder').mCustomScrollbar('disable');

					// check screen resolution 
					onResize();
				}
			}
		});
	});

	//
	onResize();
})(jQuery);
//# sourceMappingURL=main.js.map
