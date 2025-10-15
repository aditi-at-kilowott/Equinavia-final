<?php
/**
 * Theme bootstrap
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/* -------------------------------------------------------
 * Helper: file version (mtime) for cache-busting
 * ----------------------------------------------------- */
function eqn_ver( $rel_path ) {
  $file = get_stylesheet_directory() . $rel_path;
  return file_exists( $file ) ? filemtime( $file ) : null;
}

/* -------------------------------------------------------
 * Theme setup
 * ----------------------------------------------------- */
add_action( 'after_setup_theme', function () {
  add_theme_support( 'title-tag' );
  add_theme_support( 'custom-logo', [
    'height'      => 60,
    'width'       => 200,
    'flex-height' => true,
    'flex-width'  => true,
  ] );
  add_theme_support( 'woocommerce' );

  register_nav_menus([
    'primary' => __( 'Primary Menu', 'equinavia' ),
    'footer'  => __( 'Footer Menu',  'equinavia' ),
  ]);
});

/* -------------------------------------------------------
 * Front-end styles & scripts
 * ----------------------------------------------------- */
add_action( 'wp_enqueue_scripts', function () {
  // Fonts
  wp_enqueue_style(
    'eqn-fonts',
    'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600;700&display=swap',
    [],
    null
  );
  wp_enqueue_style(
    'eqn-material-symbols',
    'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200',
    [],
    null
  );

  // Base theme stylesheet
  wp_enqueue_style( 'eqn-style', get_stylesheet_uri(), [], eqn_ver( '/style.css' ) );

  // Main compiled CSS
  if ( $v = eqn_ver( '/dist/main.css' ) ) {
    wp_enqueue_style( 'eqn-main', get_stylesheet_directory_uri() . '/dist/main.css', [ 'eqn-style' ], $v );
  } elseif ( $v = eqn_ver( '/assets/css/main.css' ) ) {
    wp_enqueue_style( 'eqn-main', get_stylesheet_directory_uri() . '/assets/css/main.css', [ 'eqn-style' ], $v );
  }

  // Optional custom CSS
  if ( $v = eqn_ver( '/assets/css/custom.css' ) ) {
    wp_enqueue_style( 'eqn-custom', get_stylesheet_directory_uri() . '/assets/css/custom.css', [ 'eqn-main' ], $v );
  }

  // Utility scripts
  if ( $v = eqn_ver( '/assets/js/faq-accordion.js' ) ) {
    wp_enqueue_script( 'eqn-faq', get_stylesheet_directory_uri() . '/assets/js/faq-accordion.js', [], $v, true );
  }
  if ( $v = eqn_ver( '/assets/js/fix-admin-bar.js' ) ) {
    wp_enqueue_script( 'eqn-fix-admin-bar', get_stylesheet_directory_uri() . '/assets/js/fix-admin-bar.js', [], $v, true );
  }

  // Main JS bundle (Woo needs jQuery)
  $deps = [ 'jquery' ];
  if ( $v = eqn_ver( '/dist/main.js' ) ) {
    wp_enqueue_script( 'eqn-main-js', get_stylesheet_directory_uri() . '/dist/main.js', $deps, $v, true );
  } elseif ( $v = eqn_ver( '/assets/js/main.js' ) ) {
    wp_enqueue_script( 'eqn-main-js', get_stylesheet_directory_uri() . '/assets/js/main.js', $deps, $v, true );
  } elseif ( $v = eqn_ver( '/assets/js/custom.js' ) ) {
    wp_enqueue_script( 'eqn-main-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', $deps, $v, true );
  }

  // NOTE: Do NOT enqueue bestsellers.js globally.
  // The Bestsellers block enqueues it only when the block is present.
});

/* -------------------------------------------------------
 * ACF JSON locations
 * ----------------------------------------------------- */
add_filter( 'acf/settings/save_json', function() {
  return get_stylesheet_directory() . '/assets/acf-json';
});
add_filter( 'acf/settings/load_json', function( $paths ) {
  $paths[] = get_stylesheet_directory() . '/assets/acf-json';
  return $paths;
});

/* -------------------------------------------------------
 * Register block assets (JS-based blocks + Swiper once)
 * ----------------------------------------------------- */
add_action('init', function () {
  $dir = get_stylesheet_directory();
  $uri = get_stylesheet_directory_uri();

  // Register Swiper ONCE (used by multiple blocks)
  wp_register_style( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', [], '11.0.5' );
  wp_register_script( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], '11.0.5', true );

  /* ---- Hero Promo (example JS-based block) ---- */
  wp_register_style( 'eqn-hero-promo-style', $uri . '/blocks/hero-promo/style.css', [], filemtime( $dir . '/blocks/hero-promo/style.css' ) );
  wp_register_style( 'eqn-hero-promo-editor-style', $uri . '/blocks/hero-promo/editor.css', [ 'wp-edit-blocks' ], filemtime( $dir . '/blocks/hero-promo/editor.css' ) );
  wp_register_script( 'eqn-hero-promo-editor', $uri . '/blocks/hero-promo/index.js', [ 'wp-blocks', 'wp-element', 'wp-components', 'wp-block-editor' ], filemtime( $dir . '/blocks/hero-promo/index.js' ), true );
  register_block_type( $dir . '/blocks/hero-promo' );

  /* ---- Hero Slider / Slide (JS blocks that use Swiper) ---- */
  wp_register_script( 'eqn-hero-slider-editor', $uri . '/blocks/hero-slider/index.js', [ 'wp-blocks', 'wp-element', 'wp-block-editor' ], filemtime( $dir . '/blocks/hero-slider/index.js' ), true );
  wp_register_script( 'eqn-hero-slide-editor',  $uri . '/blocks/hero-slide/index.js',  [ 'wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components' ], filemtime( $dir . '/blocks/hero-slide/index.js' ), true );
  wp_register_style(  'eqn-hero-slider-style',  $uri . '/blocks/hero-slider/style.css', [ 'swiper' ], filemtime( $dir . '/blocks/hero-slider/style.css' ) );
  wp_register_style(  'eqn-hero-slider-editor', $uri . '/blocks/hero-slider/editor.css', [ 'wp-edit-blocks' ], filemtime( $dir . '/blocks/hero-slider/editor.css' ) );
  wp_register_script( 'eqn-hero-slider-frontend', $uri . '/blocks/hero-slider/frontend.js', [ 'swiper' ], filemtime( $dir . '/blocks/hero-slider/frontend.js' ), true );

  register_block_type( $dir . '/blocks/hero-slider' );
  register_block_type( $dir . '/blocks/hero-slide' );
});

/* -------------------------------------------------------
 * ACF PHP blocks (Featured Collection, Sale Banner, Bestsellers)
 * ----------------------------------------------------- */
add_action('acf/init', function () {
  if ( ! function_exists('acf_register_block_type') ) return;

  // Featured Collection
  acf_register_block_type([
    'name'            => 'featured-collection',
    'title'           => __('Featured Collection', 'equinavia'),
    'description'     => __('Hero-style featured collection with image, subhead, title and button.', 'equinavia'),
    'category'        => 'layout',
    'icon'            => 'format-image',
    'supports'        => [ 'align' => false ],
    'mode'            => 'preview',
    'render_template' => get_template_directory() . '/template-parts/blocks/featured-collection/featured-collection.php',
  ]);

  // Sale Banner
  acf_register_block_type([
  'name'            => 'sale-banner',
  'title'           => __('End of Season / Sale Banner', 'equinavia'),
  'description'     => __('Displays hero banner + products for sale', 'equinavia'),
  'category'        => 'layout',
  'icon'            => 'megaphone',
  'render_template' => get_template_directory() . '/template-parts/blocks/sale-banner/sale-banner.php',
  // optional if your main.css already contains these styles:
  'enqueue_style'   => get_template_directory_uri() . '/dist/main.css',
]);

  // Bestsellers (Rider/Horse) – **your custom card + swiper + toggle**
  acf_register_block_type([
    'name'            => 'bestsellers',
    'title'           => __('Bestsellers', 'equinavia'),
    'description'     => __('Two-toggle bestsellers grid (Rider/Horse)', 'equinavia'),
    'category'        => 'widgets',
    'icon'            => 'star-filled',
    'mode'            => 'preview',
    'render_template' => get_template_directory() . '/template-parts/blocks/bestsellers/block-bestsellers.php',
    'supports'        => [
      'align'   => [ 'wide', 'full' ],
      'anchor'  => true,
      'spacing' => [ 'margin', 'padding' ],
    ],
    'enqueue_assets'  => function () {
      // Use the handles we registered at init (prevents duplicate URLs).
      wp_enqueue_style( 'swiper' );
      wp_enqueue_script( 'swiper' );

      // Toggle + Swiper init for this block only
      wp_enqueue_script(
        'eqn-bestsellers',
        get_stylesheet_directory_uri() . '/assets/js/bestsellers.js',
        [ 'swiper' ],
        filemtime( get_stylesheet_directory() . '/assets/js/bestsellers.js' ),
        true
      );
    },
  ]);
});