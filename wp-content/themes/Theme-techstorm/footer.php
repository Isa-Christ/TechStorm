<!-- FOOTER -->
<footer class="footer">
    <div class="footer-top">
        <div class="footer-left">
            <h2 class="footer-logo"><?php bloginfo('name'); ?></h2>
            <p class="footer-slogan"><?php bloginfo('description'); ?></p>
        </div>

        <div class="footer-links-socials">
            <div class="footer-links">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'container'      => false,
                    'menu_class'     => '',
                    'fallback_cb'    => 'techstorm_footer_default_menu'
                ));
                ?>
            </div>
            <div class="footer-socials">
                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.svg" alt="Facebook" /></a>
                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.svg" alt="Instagram" /></a>
                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/linkedin.svg" alt="LinkedIn" /></a>
            </div>
        </div>

        <div class="footer-newsletter">
            <p class="newsletter-text">Abonnez-vous à notre newsletter</p>
            <div class="newsletter-form">
                <input type="email" placeholder="Votre email" class="newsletter-input" />
                <button class="newsletter-button">S'abonner</button>
            </div>
        </div>
    </div>
    
    <div class="footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> – Tous droits réservés.</p>
    </div>
</footer>

<?php wp_footer(); ?>
<script>document.body.style.visibility = 'visible';</script>
</body>
</html>
