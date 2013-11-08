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

	//oculto la busqueda al comienzo
	$('.toggle-search').trigger('click');

	if ($('.flexslider').length > 0) {
		$('.flexslider').flexslider({animation: 'slide'});
	}
})(jQuery);
