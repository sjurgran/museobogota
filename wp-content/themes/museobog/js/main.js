(function($) {
	//menu principal (móvil)
	var toggleMainMenu = function(event) {
		$('body').toggleClass('toggled-menu');
	}

	//barra de busqueda (móvil)
	var toggleSearchForm = function(event) {
		$(this).toggleClass('is-open');
		$('.search-form').toggleClass('height-zero');
	}

	$('.toggle-menu').on('click', toggleMainMenu);
	$('.toggle-search').on('click', toggleSearchForm);
})(jQuery);
