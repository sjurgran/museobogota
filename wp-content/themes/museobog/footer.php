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
                <?php get_museo_page_link('mapa-del-sitio'); ?>
            </p>
            <p>
                Atención a la ciudadanía<br />
                Defensor del ciudadano
            </p>
            <p><a href="<?php echo get_museo_page_link('el-museo', false); ?>">Inscríbase y reciba noticias</a></p>
            <p>
                <?php _e('Última actualización:', 'museobog'); ?> <?php site_last_modified('d/m/Y'); ?><br />
                <?php
                $counter = new vs_counter();
                $count_values = $counter->vc_count_users();
                ?>
                <?php _e('Contador de visitas:', 'museobog'); ?> <?php echo $count_values['overall_counter']; ?>
            </p>
            <p>&copy; <?php _e('Derechos Reservados', 'museobog'); ?></p>
            <p>
                <?php _e('Diseño', 'museobog'); ?>: mirona.com.co<br />
                <?php _e('Desarrollo', 'museobog'); ?>: 8manos.com
            </p>
        </div>

        <div class="footer-logos">
            <ul>
                <li class="alcadia"><a href="#"></a></li>
                <li class="denuncia"><a href="#"></a></li>
                <li class="plan"><a href="#"></a></li>
                <li class="patrimonio"><a href="#"></a></li>
                <li class="humanidad"><a href="#"></a></li>
                <li class="basuracero"><a href="#"></a></li>
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
