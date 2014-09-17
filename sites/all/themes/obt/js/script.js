var locale = {
  CLOSE: {
    ca: "Tanca",
    es: "Cerrar",
    en: "Close"
  },
  COOKIES_MESSAGE: {
    ca: "El nostre portal web web utilitza cookies amb la finalitat de millorar l'experiència de l'usuari. Al fer servir els nostres serveis acceptes l'ús que fem de les 'cookies'.",
    es: "Nuestro sitio web utiliza cookies con el fin de mejorar la experiencia del usuario. Al utilizar nuestros servicios aceptas el uso que hacemos de las 'cookies'.",
    en: "Our web site uses cookies to improve the user experience. Using our services you agree to the use of the 'cookies'."
  },
  COOKIES_MORE_INFO: {
  	ca: "Més informació",
    es: "Más información",
    en: "More information"
  },
  COOKIES_ACCEPT: {
  	ca: "Accepta política de cookies",
    es: "Aceptar política de cookies",
    en: "Accept cookies policy"
  },
  COOKIES_ACCEPT_SHORT: {
    ca: "Accepta",
    es: "Aceptar",
    en: "Accept"
  }
}
var config = {
  LANGUAGE: 'ca',
  BASE_URL: '',
  THEME_URL: '/sites/all/themes/MY_THEME/',
  AJAX_LOADING_HTML: '<div class="ajax-progress ajax-progress-throbber"><div class="throbber">&nbsp;</div></div>'
};

(function($){
	// ON READY
	$(window).ready(function(){
		config.LANGUAGE = $('html').attr('lang');

		// For all links with rel external, open link in new tab
	  $('body').on('click', 'a[rel="external"]', function(e){
	  	e.preventDefault();
      window.open($(this).attr('href'));
	  });

	  // cookies
	  /*if (getCookie('cookie_message') != 'accepted'){
	    $('#page').prepend('<div class="cookies-message"><p>'+locale.COOKIES_MESSAGE[config.LANGUAGE]+' <a href="/node/650">'+locale.COOKIES_MORE_INFO[config.LANGUAGE]+'</a><button data-action="close" title="'+locale.CLOSE[config.LANGUAGE]+'">X</button></p></div>');
	    setCookie('cookie_message', 'accepted', 90);
	    var cookies_message = $('.cookies-message');
	    cookies_message.on('click', 'button[data-action="close"]', function(e){
	      e.preventDefault();
	      cookies_message.fadeOut(300);
	    });
	  }*/

	  // tabs
	  /*var most_tabs = new GrouppedTabs(
			{
		    selector: '.pane-omitsis-weloba-most-block .most-block',
		  	block_name: 'tabs-most'
		  }
		);
	  most_tabs.init();*/
	  
	  // responsive menu
	  /*$('#page').prepend('<div class="mobile-menu"><button data-action="open-mobile-menu">Menu</button></div>');
	  var mobile_menu = $('.mobile-menu');
	  var main_menu = $('#block-system-main-menu > .content');
	  mobile_menu.append(main_menu.html());
	  $('button[data-action="open-mobile-menu"]').click(function(e){
	    mobile_menu.toggleClass('opened');
	  });*/
	
	  // inserting icons at the beggining of
	  //$('selector').prepend('<i class="icon" />');
	  // inserting icons at the end of
	  //$('selector').append('<i class="icon" />');
	
	  // all ajax call buttons
	  /*$('[data-ajax-call]').each(function(i){
	  	var btn = $(this);
	  	btn.prepend(config.AJAX_LOADING_HTML);
	  	btn.attr('data-state', 'iddle');
	  	var load_anim = btn.find('.ajax-progress');
	  	btn.click(function(e){
	  		btn.prop('disabled', true);
	  		btn.attr('data-state', 'loading');
	  		btn.on('ajax_call_finished', function(e){
	  			// finished loading
	  			btn.prop('disabled', false);
	  			btn.attr('data-state', 'finished');
	  		});
	  		btn.on('ajax_call_error', function(e){
	  			// error loading
	  			btn.attr('data-state', 'error');
	  		});
	  	});
	  });*/
	});

	$(window).load(function(){
		// FOR ALL IMAGE LOADING DEPENDANT SCRIPTS
	});
})(jQuery);
