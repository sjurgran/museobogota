(function($) {
    var resizeTimer;

    //menu principal (móvil)
    var toggleMainMenu = function(event) {
        $('body').toggleClass('toggled-menu');
    }

    //barra de busqueda (móvil)
    var toggleSearchForm = function(event) {
        $(this).toggleClass('is-open');
        $('.search-form').toggleClass('height-zero');
    }

    var getCarouselSize = function() {
        //window size for 1 item 296 = 20+50+156+50+20
        items = Math.ceil(($(window).width() - 296) / 176); //176 es lo que se necesita para meter otro elemento
        console.log(items + " - " + $("#events-carousel").width());
        //items =  Math.floor($("#events-carousel").width()/ 176);
        items = Math.max(items, 1); //por si la división da menor o igual a 0

        return items;
    }

    $('.toggle-menu').on('click', toggleMainMenu);
    $('.toggle-search').on('click', toggleSearchForm);

    //oculto la busqueda al comienzo
    $('.toggle-search').trigger('click');

    if ($('#main-slider').length > 0) {
        $('#main-slider').flexslider({
            animation: 'slide',
            startAt: 1,
            slideshow: true
        });
    }

    if ($('#events-carousel').length > 0) {
        var start = $('#lower').val();
        $('#events-carousel').flexslider({
            animation: 'slide',
            animationLoop: false,
            slideshow: false,
            itemWidth: 156,
            itemMargin: 20,
            minItems: getCarouselSize(),
            maxItems: getCarouselSize(),
            controlNav: false,
            prevText: '<',
            nextText: '>',
            startAt:start,
        });
    }

    // check grid size on resize event
    function fitCarousel() {
        var carousel_size = getCarouselSize();

        $('#events-carousel').data('flexslider').vars.minItems = carousel_size;
        $('#events-carousel').data('flexslider').vars.maxItems = carousel_size;
    }

    $(window).resize(function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(fitCarousel, 200);
    });

    //botones share
    $('#facebook-share').sharrre({
        share: {
            facebook: true
        },
        enableHover: false,
        enableTracking: true,
        template: '<a title="facebook" href="#"></a><span>Like</span><div class="box-likes">{total}</div>',
        click: function(api, options){
            api.simulateClick();
            api.openPopup('facebook');
        }
    });
    $('#twitter-share').sharrre({
        share: {
            twitter: true
        },
        enableHover: false,
        enableTracking: true,
        template: '<a title="twitter" href="#"></a><span>Tweet</span><div class="box-likes">{total}</div>',
        click: function(api, options){
            api.simulateClick();
            api.openPopup('twitter');
        }
    });

})(jQuery);
