</main>
</div>

<footer role="contentinfo">
    <div class="footer-content">
        <div class="footer-block">
            <img src="<?php bloginfo('template_directory'); ?>/images/logo_bogota_color.svg" class="imgBogota"/>
            <h2>INSTITUTO DISTRITAL DE PATRIMONIO CULTURAL</h2>
            <p>
                Sector de Cutura, Recreación y Deporte<br />
                Escenario Público de la Bogotá Humana
            </p>
        </div>

        <?php dynamic_sidebar('footer'); ?>
        <div class="footer-block overflow-none">
            <p>
                <a href="http://www.bogota.gov.co/portel/libreria/php/01.270403.html">Políticas de privacidad y términos de uso</a><br />
                <a><?php _e('Mapa del sitio', 'museobog'); ?></a>
            </p>
            <p>
                Atención a la ciudadanía<br />
                Defensor del ciudadano
            </p>
            <p>Inscríbase y reciba noticias</p>
            <p>&copy; <?php _e('Derechos Reservados', 'museobog'); ?></p>
            <p>
                <?php _e('Diseño', 'museobog'); ?>: mirona.com.co<br />
                <?php _e('Desarrollo', 'museobog'); ?>: 8manos.com
            </p>
        </div>

        <div class="footer-logos">
            <ul>
                <a href=""><li class="alcadia"></li></a>
                <a href=""><li class="denuncia"></li></a>
                <a href=""><li class="plan"></li></a>
                <a href=""><li class="patrimonio"></li></a>
                <a href=""><li class="humanidad"></li></a>
                <a href=""><li class="basuracero"></li></a>
            </ul>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

<!-- Google Analytics - Optimized version by Mathias Bynens -->
<!-- See: http://mathiasbynens.be/notes/async-analytics-snippet -->
<!-- Change the UA-XXXX-XX string to your site's ID -->
<script>
    var _gaq = [['_setAccount', 'UA-XXXX-XX'], ['_trackPageview']];
    (function(a, b) {
        var c = a.createElement(b), d = a.getElementsByTagName(b)[0];
        c.src = ("https:" == location.protocol ? "//ssl" : "//www") + ".google-analytics.com/ga.js";
        d.parentNode.insertBefore(c, d)
    })(document, "script");
</script>

</body>
</html>
