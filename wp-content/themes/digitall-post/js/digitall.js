var main; // Declare main variable in global scope

;(function($, undefined){

	function Main(){
		var This = this;

		this.search = null;


		this.init = function(){
            $(document).ready(This.onDocumentReady);
        };

        this.onDocumentReady = function(){

        	This.search = new Search();
			
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

	main = new Main(); // Crate instance of Main

})(jQuery);	