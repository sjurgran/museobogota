var map;
white = [
    {
        "featureType": "poi.attraction",
        "elementType": "geometry",
        "stylers": [
            {"color": "#c9c9c8"}
        ]
    }, {
        "featureType": "poi.business",
        "elementType": "geometry",
        "stylers": [
            {"color": "#959495"}
        ]
    }, {
        "featureType": "poi.government",
        "elementType": "geometry",
        "stylers": [
            {"color": "#f2f2f4"}
        ]
    }, {
        "featureType": "poi.government",
        "stylers": [
            {"color": "#c6c6c5"}
        ]
    }, {
        "featureType": "poi.park",
        "elementType": "geometry",
        "stylers": [
            {"color": "#ffffff"}
        ]
    }, {
        "featureType": "landscape",
        "stylers": [
            {"color": "#ecebeb"}
        ]
    }, {
    }

];
(function($) {

    /*
     * Menu Scroll
     */
    var heightNav = 60;
    $(window).scroll(function() {
        var wSroll = $(window).scrollTop(),
        winWidth = $(window).width();
        if (wSroll > heightNav && winWidth > 720 && ! $("#header").hasClass("comprimido")) {

            var header_height = $("#header").height();
            $(".wrap").css("margin-top", header_height);
            $("#header").addClass("comprimido");

        }
        if (wSroll < heightNav && winWidth > 720 && $("#header").hasClass("comprimido")) {

            $(".wrap").css("margin-top", 0);
            $("#header").removeClass("comprimido");
        }

    });


    /*
     * GOOGLE MAPS
     */
    function loadMapScript() {
        var script = document.createElement("script");

        script.type = "text/javascript";
        script.src = "//maps.googleapis.com/maps/api/js?key=AIzaSyCrZ41krw8hACJ_MxtBKPRRzrtCEFyxrpA&sensor=false&callback=initializeMap";
        document.body.appendChild(script);
    }

    if ($('#map-canvas').length > 0) {

        loadMapScript();
    }
    /*
     * CONF GOOGLE MAPS
     */


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

    var getNavPosition = function() {
        var img_height = $('#main-slider .slider-picture').height();
        var nav_position_top = Math.round(img_height / 2);
        $('#main-slider .flex-prev, #main-slider .flex-next').css('top', nav_position_top);
        $('.flex-control-nav').css('top', img_height-32);
    }

    var getCarouselSize = function() {
        //window size for 1 item 296 = 20+50+156+50+20
        items = Math.ceil(($(window).width() - 296) / 176); //176 es lo que se necesita para meter otro elemento
        console.log(items + " - " + $("#events-carousel").width());
        //items =  Math.floor($("#events-carousel").width()/ 176);
        items = Math.min(Math.max(items, 1), 6); //por si la división da menor o igual a 0 (máximo 6 en el carrusel)

        return items;
    }

    $('.toggle-menu').on('click', toggleMainMenu);
    $('.toggle-search').on('click', toggleSearchForm);

    //oculto la busqueda al comienzo
    if ($(window).width() < 720) {
        $('.toggle-search').trigger('click');
    }
    if ($('#main-slider').length > 0) {
        $('#main-slider').flexslider({
            animation: 'slide',
            startAt: 1,
            slideshow: false,
            touch: false,
            prevText: '<',
            nextText: '>',
            start: getNavPosition
        });
    }

    if ($('#events-carousel').length > 0) {
        var total = $('#events-carousel li').length;
        var size = getCarouselSize();
        var max_event_offset = Math.max(total-size, 0);
        var max_real_offset = Math.ceil(max_event_offset / size);//para startAt se usa el número de pasos del carrusel (no el número de items)

        var today_event = $('#lower').val();
        var start_event = Math.max(today_event - Math.floor((size-1)/2), 0);//se tiene en cuenta que no empieza en el evento presente, sino que debe ir centrado
        var event_offset = Math.ceil(start_event / size);

        var start_at = Math.min(max_real_offset, event_offset);
        //console.log (start_at);
        $('#events-carousel').flexslider({
            animation: 'slide',
            animationLoop: false,
            slideshow: false,
            itemWidth: 156,
            itemMargin: 20,
            minItems: size,
            maxItems: size,
            controlNav: false,
            prevText: '<',
            nextText: '>',
            startAt: start_at,
        });

        $(window).resize(function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(fitCarousel, 200);
        });
    }

    // check grid size on resize event
    function fitCarousel() {
        var carousel_size = getCarouselSize();

        $('#events-carousel').data('flexslider').vars.minItems = carousel_size;
        $('#events-carousel').data('flexslider').vars.maxItems = carousel_size;
    }

    //galerías
    if ($('#gallery-slider').length > 0) {
        $('#gallery-slider').flexslider({
            animation: 'slide',
            controlNav: false,
            prevText: '<',
            nextText: '>'
        });
    }

    //botones share
    $('#facebook-share').sharrre({
        share: {
            facebook: true
        },
        enableHover: false,
        enableTracking: true,
        template: '<a title="facebook" href="#"></a><span>Like</span><div class="box-likes">{total}</div>',
        click: function(api, options) {
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
        click: function(api, options) {
            api.simulateClick();
            api.openPopup('twitter');
        }
    });

    //popup (tamaño de letra)
    $('.modal').hide();
    $('.popup').on('click', function(event) {
        event.preventDefault();
        var popup_content_id = $(this).attr('href');
        $(popup_content_id).bPopup({
            opacity: 0.8,
        });
        $(popup_content_id).removeClass('hidden');
    });

})(jQuery);
function initializeMap() {

    var museoBogota = new google.maps.LatLng(4.596002290218719, -74.07288287008362);
    var flagIcon_front = new google.maps.MarkerImage("http://museobog.8manos.in/wp-content/themes/museobog/images/marker1.png");
    var flagIcon_front1 = new google.maps.MarkerImage("http://museobog.8manos.in/wp-content/themes/museobog/images/marker.png");
    var mapOptions = {
        scrollwheel: false,
        zoom: 17,
        center: museoBogota,
        disableDefaultUI: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
    }
    map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
    var marker = new google.maps.Marker({
        position: museoBogota,
        map: map,
        title: '',
        icon: flagIcon_front,
    });
    var marker1 = new google.maps.Marker({
        position: new google.maps.LatLng(4.594890078283823, -74.07349441373901),
        map: map,
        title: '',
        icon: flagIcon_front1,
    });


    map.setOptions({styles: white});
}

