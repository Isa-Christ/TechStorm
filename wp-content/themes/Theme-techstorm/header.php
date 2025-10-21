<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php wp_head(); ?>
    <style>body { visibility: hidden; }</style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- HEADER -->
<header class="header">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
        <?php bloginfo('name'); ?>
    </a>

    <nav>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => 'nav-links',
            'fallback_cb'    => 'techstorm_default_menu'
        ));
        ?>
    </nav>

    <div class="buttons">
        <button class="connexion-button" onclick="window.location.href='<?php echo esc_url(wp_login_url()); ?>'">
            Se Connecter
        </button>
        
        <?php if (class_exists('WooCommerce')) : ?>
            <button class="pay-button" onclick="window.location.href='<?php echo esc_url(wc_get_cart_url()); ?>'">
                Acheter
            </button>
        <?php else : ?>
            <button class="pay-button" onclick="alert('WooCommerce n\'est pas encore installé')">
                Acheter
            </button>
        <?php endif; ?>
    </div>
</header>
