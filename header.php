<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- <a class="screen-reader-shortcut" href="#content">Skip to main content</a> -->

<header class="site-header">
    <div class="topbar">
        <div class="container">
            <p class="topbar-text">Up to 50% on Sales Items + Free Gifts!</p>
        </div>
    </div>

    <div class="header-main container">
        <div class="site-branding">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/logo.svg" alt="Site Logo" />
            </a>
        </div>

        <div class="header-actions">
            <button class="icon-btn search-toggle" aria-label="Search">
                <?php echo file_get_contents( get_template_directory() . '/assets/icons/icon-search.svg' ); ?>
            </button>
            <a class="icon-btn" href="#" aria-label="Wishlist">
                <?php echo file_get_contents( get_template_directory() . '/assets/icons/icon-heart.svg' ); ?>
            </a>
            <a class="icon-btn cart-btn" href="#" aria-label="Cart">
                <?php echo file_get_contents( get_template_directory() . '/assets/icons/icon-cart.svg' ); ?>
            </a>
            <a class="icon-btn account-btn" href="#" aria-label="Account">
                <?php echo file_get_contents( get_template_directory() . '/assets/icons/icon-user.svg' ); ?>
            </a>
        </div>
    </div>

    <div class="header-bottom container">
        <nav id="site-navigation" class="main-navigation" aria-label="Primary Navigation" style="margin-left: -1px">
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'nav-menu',
                    'container'      => false,
                    'fallback_cb'    => false,
                ));
            ?>
        </nav>

        <div class="header-links">
            <a href="#">Find a dealer</a> | <a href="#">Help</a>
        </div>
    </div>
</header>
<main id="content">

<div class="search-overlay hidden" id="search-overlay" aria-hidden="true">
    <!-- <div class="search-box container">
        <?php get_search_form(); ?>
        <button class="search-close" aria-label="Close search">×</button>
    </div> -->
</div>