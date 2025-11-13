<?php
/**
 * TechStorm Theme Functions
 * Configuration et fonctionnalités du thème
 */

// ==========================================
// 1. CHARGEMENT DES STYLES ET SCRIPTS
// ==========================================
function techstorm_enqueue_assets() {
    // CSS dans le bon ordre (du plus général au plus spécifique)
    wp_enqueue_style('techstorm-main', get_template_directory_uri() . '/assets/css/style1.css', array(), '1.0');
    wp_enqueue_style('techstorm-header-footer', get_template_directory_uri() . '/assets/css/header-footer.css', array('techstorm-main'), '1.0');
    wp_enqueue_style('techstorm-produits', get_template_directory_uri() . '/assets/css/section-produits.css', array('techstorm-main'), '1.0');
    wp_enqueue_style('techstorm-nouveautes', get_template_directory_uri() . '/assets/css/section-nouveautes.css', array('techstorm-main'), '1.0');
    wp_enqueue_style('techstorm-action', get_template_directory_uri() . '/assets/css/section-action.css', array('techstorm-main'), '1.0');
    
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600;700;800;900&display=swap', array(), null);
    
    // JavaScript
    wp_enqueue_script('techstorm-animations', get_template_directory_uri() . '/assets/js/animations.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'techstorm_enqueue_assets');

// ==========================================
// 2. CONFIGURATION DU THÈME
// ==========================================
function techstorm_theme_setup() {
    // Support du titre dynamique
    add_theme_support('title-tag');
    
    // Support des images à la une
    add_theme_support('post-thumbnails');
    
    // Support WooCommerce
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    
    // Support HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Enregistrement des menus
    register_nav_menus(array(
        'primary' => __('Menu Principal', 'techstorm'),
        'footer' => __('Menu Footer', 'techstorm'),
    ));
}
add_action('after_setup_theme', 'techstorm_theme_setup');

// ==========================================
// 3. TAILLES D'IMAGES PERSONNALISÉES
// ==========================================
function techstorm_image_sizes() {
    add_image_size('product-thumb', 400, 280, true); // Pour les cartes produits
    add_image_size('hero-image', 700, 700, false);   // Pour l'image hero
}
add_action('after_setup_theme', 'techstorm_image_sizes');

// ==========================================
// 4. PERSONNALISATION DU MENU (optionnel)
// ==========================================
function techstorm_nav_menu_css_class($classes) {
    return array_filter($classes, function($class) {
        return $class !== 'menu-item';
    });
}
add_filter('nav_menu_css_class', 'techstorm_nav_menu_css_class');

// Menu par défaut si aucun menu n'est défini
// Menu par défaut si aucun menu n'est défini
function techstorm_default_menu() {
    echo '<ul class="nav-links">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">Accueil</a></li>';
    echo '<li><a href="#">À propos</a></li>';
    
    // Vérifier si WooCommerce est actif avant d'utiliser ses fonctions
    if (class_exists('WooCommerce')) {
        echo '<li><a href="' . esc_url(get_permalink(wc_get_page_id('shop'))) . '">Catalogue</a></li>';
    } else {
        echo '<li><a href="#">Catalogue</a></li>';
    }
    
    echo '<li><a href="#">Contact</a></li>';
    echo '</ul>';
}

function techstorm_footer_default_menu() {
    echo '<a href="' . esc_url(home_url('/')) . '">Accueil</a>';
    echo '<a href="#">À propos</a>';
    echo '<a href="#">Catalogue</a>';
    echo '<a href="#">Contact</a>';
}

// Affichage de produits statiques par défaut
function techstorm_display_default_products() {
    $default_products = array(
        array(
            'title' => 'Airpods 1',
            'description' => 'Son cristallin et design épuré pour une expérience audio exceptionnelle',
            'price' => '25 000 FCFA',
            'image' => 'image.png',
            'badge' => 'NOUVEAU',
            'animation' => 'scroll-reveal-left'
        ),
        array(
            'title' => 'Airpods 2',
            'description' => 'Performance améliorée avec une autonomie inégalée de 24 heures',
            'price' => '25 000 FCFA',
            'image' => 'image2.jpg',
            'badge' => 'POPULAIRE',
            'animation' => 'scroll-reveal-scale'
        ),
        array(
            'title' => 'Airpods Pro',
            'description' => 'Réduction de bruit active et mode transparence pour les professionnels',
            'price' => '25 000 FCFA',
            'image' => 'image3.jpg',
            'badge' => 'PRO',
            'animation' => 'scroll-reveal-right'
        )
    );
    
    foreach ($default_products as $product) :
    ?>
    <div class="product-card <?php echo $product['animation']; ?>">
        <div class="product-badge"><?php echo $product['badge']; ?></div>
        <div class="product-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo $product['image']; ?>" alt="<?php echo $product['title']; ?>">
        </div>
        <div class="product-content">
            <h3><?php echo $product['title']; ?></h3>
            <p class="product-description"><?php echo $product['description']; ?></p>
            <span class="product-price"><?php echo $product['price']; ?></span>
            <a href="#" class="btn-panier">Ajouter au panier</a>
        </div>
    </div>
    <?php
    endforeach;
}

?>



