var main; // Declare main variable in global scope

;(function($, undefined){

	function Main(){
		var This = this;

		this.search = null;
		this.post = null;
		this.newsletter_open = false;
		this.lastScrollTop = 0;
		this.onScrollDown = new Array();
		this.onScrollUp = new Array();
		this.scrollUpCount = 0;
		this.scrollDownCount = 0;
		this.canScrollFlag = true;


		this.init = function(){
            $(document).ready(This.onDocumentReady);

			This.onScrollUp[This.scrollUpCount++] = This.scrollLastNews;
			This.onScrollDown[This.scrollDownCount++] = This.scrollLastNews;
			This.evalAsyncLoad();

			setInterval(This.scrollMonitor, 10);
        };

        this.evalAsyncLoad = function(){
        	
        	var $items = $('.async-load');

        	if ( $items.length ){
        		$($items).each(function(){
        			var src = $(this).data('src');
        			var type = $(this).data('type');
        			This.loadjscssfile(src, type);
        		});
        	}
        };

        this.loadjscssfile = function(filename, filetype){
		    if (filetype=="js"){ //if filename is a external JavaScript file
		        var fileref=document.createElement('script')
		        fileref.setAttribute("type","text/javascript")
		        fileref.setAttribute("src", filename)
		    }
		    else if (filetype=="css"){ //if filename is an external CSS file
		        var fileref=document.createElement("link")
		        fileref.setAttribute("rel", "stylesheet")
		        fileref.setAttribute("type", "text/css")
		        fileref.setAttribute("href", filename)
		    }
		    if (typeof fileref!="undefined")
		        document.getElementsByTagName("head")[0].appendChild(fileref)
		};

        this.onDocumentReady = function(){

        	This.search = new Search();

        	if ( $('.post-wrap').length ){
        		This.post = new Post();
        	}
			
			$('#newsletter_btn').click(function(e){
        		e.preventDefault();
        		This.toggleNewsletterhWindow(!This.newsletter_open);
        	});

        	$('#newsletter_module .overlay').click(function (_e) {
				_e.preventDefault();
				This.toggleNewsletterhWindow(false);
			});
			
        };

        this.toggleNewsletterhWindow = function(_target) {
			This.newsletter_open = _target;
			$('#newsletter_module').toggleClass('visible', This.newsletter_open);
		};

		this.scrollLastNews = function(st,forward){

		    if ( $('.last_news_banner').length && $(".mCSB_container").length ){

		    	var contTop = $(".mCSB_container").position().top;

		    	yPos = This.getBannerYPosition();

		    	var bannerRelTop = yPos + contTop;

		    	if ( bannerRelTop > 0 && This.canScrollFlag && st < yPos ){
		    		$('#news_module .news_holder').mCustomScrollbar("scrollTo",st);
		    	}else if( This.canScrollFlag ){
		    		This.canScrollFlag = false;
		    		$('#news_module .news_holder').mCustomScrollbar("scrollTo",yPos);
		    	}
		    }
		};

		this.getBannerYPosition = function(){
			var yPos = 0;
			$('.news_holder li').each(function(index){
		    		
	    		if ( $(this).hasClass('last_news_banner') )
	    			return false;

	    		var h = $(this).outerHeight(true);
	    		
	    		yPos += h;

	    	});
	    	return yPos;
		};

		this.scrollMonitor = function(){
			
				var st = $(window).scrollTop();
				var forward = false;

				if (st > This.lastScrollTop){
			    	forward = true; 
			    	for (var x in This.onScrollDown){
			       		if (typeof This.onScrollDown[x] == 'function'){
			       			This.onScrollDown[x](st,forward);
			       		}
			       	}
			   	}else if (st < This.lastScrollTop){
			   		for (var x in This.onScrollUp){
			       		if (typeof This.onScrollUp[x] == 'function'){
			       			This.onScrollUp[x](st,forward);
			       		}
			       	}
			   	}

			   This.lastScrollTop = st;
			

		};

        this.init();
	}

	function Search(options){
		var This = this;
		this.canSearch = false;

		this.defaults = {
			sf: '#modal-search-form',
			sr: '#search-results',
		};

		this.o = $.extend( {}, this.defaults, options );

		this.init =  function(){

			This.bindInputHandlers();
			This.bindSubmitButtonHandlers();
			This.evalCanSearchFlag();

		};

		this.evalCanSearchFlag = function(){
			var searchTerm = $('.search-term-input', This.o.sf).val();
			if ( searchTerm.length > 2 ){
				This.canSearch = true;
			}else{
				This.canSearch = false;
			}
		};

		this.bindInputHandlers = function(){

			$('.search-term-input', This.o.sf).keyup(function(){
				This.evalCanSearchFlag();
			});

			$('.search-term-input', This.o.sf).keypress(function(e){
				if( e.which == 13 ) {
					This.evalSubmit();
        		}
			});

		};

		this.bindSubmitButtonHandlers = function(){

			$('.search-submit', This.o.sf).click(function(){
				This.evalSubmit();
			});

		};

		this.evalSubmit = function(){

			if ( This.canSearch ){
				var searchTerm = $('.search-term-input', This.o.sf).val();
				This.submit( searchTerm );
			}

		};

		this.submit = function( searchTerm ){

			$.post( dpostGlobal.ajaxurl, {
				'action':'digitall_ajax_search',
				'term' : searchTerm
			}, function(data){
				This.updateResults(data);
			}, 'html');

		};

		this.updateResults = function( content ){
			$(This.o.sr).html(content);
		};

		this.init();
	}

	function Post(){
		var This = this;

		this.lastScrollTop = 0;
		this.onScrollDown = new Array();
		this.onScrollUp = new Array();
		this.scrollUpCount = 0;
		this.scrollDownCount = 0;
		this.currentState = {
			postID: 0,
            permalink: '',
            title: ''
		};

		this.init = function(){
			This.initCurrentState();
			
			This.onScrollDown[This.scrollCount++] = This.evalUpdateUrl;
			This.onScrollUp[This.scrollDownCount++] = This.evalUpdateUrl;

			setInterval(This.scrollMonitor, 10);

			This.initFluidVids();

			$.fn.almComplete = function(alm){
				$('.adunit:not(".display-block")').dfp({dfpID:'158800740', enableSingleRequest: false });
				This.initFluidVids();
			};

			
		};

		this.initFluidVids = function(){
			fluidvids.init({
			  selector: ['iframe', 'object'],
			  players: ['www.youtube.com', 'player.vimeo.com']
			});
		};

		this.initCurrentState = function(){
			$('.post-wrap').each(function(index){
				This.currentState = {
					postID: $(this).attr('data-post-id'),
		            permalink: $(this).attr('data-post-permalink'),
		            title: $(this).attr('data-post-title')
				};
				return false;
			});
		};

		this.evalUpdateUrl = function(st, forward){
			var state = {
                postID: 0,
                permalink: '',
                title: ''
            };

            

			$('.post-wrap').each(function(index){
				var offset = $(this).offset();
				var postId = $(this).attr('data-post-id');
				var permalink = $(this).attr('data-post-permalink');
		        var title = $(this).attr('data-post-title');
				if ( st > offset.top ){
					
					state = {
		                postID: postId,
		                permalink: permalink,
		                title: title
		            }
				}else{
					if (!index){
						state = {
			                postID: postId,
			                permalink: permalink,
		                	title: title
			            }
					}
					return false;
				}
			});
			
			if ( state.postID != This.currentState.postID ){
				This.currentState = state;
				history.pushState(state, state.title, state.permalink);
				This.trackPageview();
			}
			
		};

		this.trackPageview = function(){
			var location = window.location.href,
                path = '/' + window.location.pathname;
            if (typeof ga !== 'undefined' && $.isFunction(ga)) {
                ga('send', 'pageview', path);
            }
            if (typeof __gaTracker !== 'undefined' && $.isFunction(__gaTracker)) {
                __gaTracker('send', 'pageview', path);
            }
		};

		this.scrollMonitor = function(){
			
				var st = $(window).scrollTop();
				var forward = false;

				if (st > This.lastScrollTop){
			    	forward = true; 
			    	for (var x in This.onScrollDown){
			       		if (typeof This.onScrollDown[x] == 'function'){
			       			This.onScrollDown[x](st,forward);
			       		}
			       	}
			   	}else if (st < This.lastScrollTop){
			   		for (var x in This.onScrollUp){
			       		if (typeof This.onScrollUp[x] == 'function'){
			       			This.onScrollUp[x](st,forward);
			       		}
			       	}
			   	}

			   This.lastScrollTop = st;
			

		};

		this.init();
	}

	main = new Main(); // Crate instance of Main

})(jQuery);	