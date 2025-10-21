<?php
/**
 * Template pour la page d'accueil
 */
get_header();
?>

<main>
    <!-- Section Hero -->
    <section class="hero">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Casque.png" alt="Casque TechStorm" class="hero-image"/>
        <div class="container">
            <h2 class="hero-subtitle gradient-text">La Technologie de demain</h2>
            <h2 class="hero-subtitle gradient-text">Aujourd'hui</h2>
            <p class="hero-description">Découvrez nos appareils high tech et innovants</p>
            <div class="hero-button-container">
	    	<?php if (class_exists('WooCommerce')) : ?>
			<a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="btn-explorer">Explorer</a>
		    <?php else : ?>
			<a href="#" class="btn-explorer">Explorer</a>
		    <?php endif; ?>
		    <a href="#" class="btn-savoir-plus">En savoir plus</a>
	    </div>
        </div>
    </section>

    <!-- Section Produits -->
    <section class="products-section">
        <div class="container">
            <h2 class="section-title scroll-reveal">Nos Produits</h2>
            <p class="section-subtitle scroll-reveal">L'excellence technologique à portée de main</p>
            
            <div class="products-grid">
                <?php
                // Récupération des produits WooCommerce
                $args = array(
                    'post_type'      => 'product',
                    'posts_per_page' => 3,
                    'orderby'        => 'date',
                    'order'          => 'DESC'
                );
                
                $products = new WP_Query($args);
                
                if ($products->have_posts()) :
                    $badges = array('NOUVEAU', 'POPULAIRE', 'PRO');
                    $animations = array('scroll-reveal-left', 'scroll-reveal-scale', 'scroll-reveal-right');
                    $index = 0;
                    
                    while ($products->have_posts()) : $products->the_post();
                        global $product;
                ?>
                
                <div class="product-card <?php echo $animations[$index % 3]; ?>">
                    <div class="product-badge"><?php echo $badges[$index % 3]; ?></div>
                    <div class="product-image">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('product-thumb'); ?>
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image.png" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="product-content">
                        <h3><?php the_title(); ?></h3>
                        <p class="product-description"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                        <span class="product-price"><?php echo $product->get_price_html(); ?></span>
                        <a href="<?php echo esc_url($product->add_to_cart_url()); ?>" class="btn-panier">
                            Ajouter au panier
                        </a>
                    </div>
                </div>
                
                <?php
                        $index++;
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Affichage de produits statiques si WooCommerce n'a pas encore de produits
                    techstorm_display_default_products();
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Section Nouveautés -->
    <section class="new-section">
        <div class="container scroll-reveal">
            <div class="glitch-effect">
                <h2 class="new-title-R">NOUVEAUTÉS 2025</h2>
                <h2 class="new-title-V">NOUVEAUTÉS 2025</h2>
                <h2 class="new-title-B">NOUVEAUTÉS 2025</h2>
            </div>
        </div>
    </section>

    <!-- Section Call to Action -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-container scroll-reveal">
                <h2 class="cta-title">Prêt à acheter ?</h2>
                <p class="cta-subtitle">
                    Rejoignez des milliers de clients satisfaits et découvrez l'avenir de la technologie dès aujourd'hui
                </p>
                <div class="cta-buttons">
		    <?php if (class_exists('WooCommerce')) : ?>
			<a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="cta-btn-primary">Commander maintenant</a>
			<a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="cta-btn-secondary">Voir le catalogue</a>
		    <?php else : ?>
			<a href="#" class="cta-btn-primary">Commander maintenant</a>
			<a href="#" class="cta-btn-secondary">Voir le catalogue</a>
		    <?php endif; ?>
		</div>

                <div class="cta-features scroll-reveal">
                    <div class="cta-feature">
                        <div class="cta-feature-icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/rocket.png" alt="Livraison">
                        </div>
                        <h4>Livraison Rapide</h4>
                        <p>Recevez vos produits en 48h maximum</p>
                    </div>
                    <div class="cta-feature">
                        <div class="cta-feature-icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lock.png" alt="Sécurité">
                        </div>
                        <h4>Paiement Sécurisé</h4>
                        <p>Transactions 100% protégées</p>
                    </div>
                    <div class="cta-feature">
                        <div class="cta-feature-icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/diamond.png" alt="Garantie">
                        </div>
                        <h4>Garantie Premium</h4>
                        <p>2 ans de garantie constructeur</p>
                    </div>
                    <div class="cta-feature">
                        <div class="cta-feature-icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/headphone-symbol.png" alt="Support">
                        </div>
                        <h4>Support 24/7</h4>
                        <p>Assistance disponible à tout moment</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
