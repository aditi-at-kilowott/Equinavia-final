<?php
/**
 * ACF Block: End of Season / Sale Banner
 * Left hero banner + 3 product cards on the right.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/* -------------------
 * Banner fields
 * ------------------ */
$banner_img   = get_field('eos_banner_image'); // usually attachment ID
$banner_title = get_field('eos_banner_title');
$banner_sub   = get_field('eos_banner_subtitle');
$banner_desc  = get_field('eos_banner_description');
$btn_text     = get_field('eos_banner_button_text');
$btn_url      = get_field('eos_banner_button_url');

$banner_src = '';
if ( $banner_img ) {
  // Works whether ACF returns ID or array
  $banner_src = is_numeric($banner_img)
    ? wp_get_attachment_image_url( (int) $banner_img, 'full' )
    : ( is_array($banner_img) && !empty($banner_img['url']) ? $banner_img['url'] : '' );
}

/* -------------------
 * Product card helper
 * ------------------ */
if ( ! function_exists('eqn_eos_card') ) :
function eqn_eos_card( $i ) {

  // Pull fields for this card index
  $img     = get_field("eos_product_{$i}_image");   // ID or array or URL
  $name    = get_field("eos_product_{$i}_name");
  $brand   = get_field("eos_product_{$i}_brand");
  $rating  = get_field("eos_product_{$i}_rating");
  $colors  = get_field("eos_product_{$i}_colors");  // comma-separated list
  $price   = get_field("eos_product_{$i}_price");
  $old     = get_field("eos_product_{$i}_old_price");
  $url     = get_field("eos_product_{$i}_url");

  // Build image URL robustly
  $img_src = '';
  if ( $img ) {
    if ( is_numeric($img) ) {
      $img_src = wp_get_attachment_image_url( (int) $img, 'large' );
    } elseif ( is_array($img) && !empty($img['url']) ) {
      $img_src = $img['url'];
    } elseif ( is_string($img) ) {
      $img_src = $img;
    }
  }
  if ( ! $img_src ) {
    $img_src = function_exists('wc_placeholder_img_src')
      ? wc_placeholder_img_src('woocommerce_single')
      : includes_url( 'images/media/default.png' );
  }

  // Colors -> list items
  $color_items = [];
  if ( is_string($colors) && $colors !== '' ) {
    foreach ( array_filter( array_map('trim', explode(',', $colors)) ) as $c ) {
      $color_items[] = '<li style="--swatch:'.esc_attr($c).'"></li>';
    }
  }

  // Fallbacks
  if ( ! $brand )  $brand = 'EQUINAVIA';
  if ( ! $rating ) $rating = '4.5';
  if ( ! $url )    $url    = '#';
  ?>
  <div class="eos-card">
    <button class="eos-wish" aria-label="Add to wishlist"><span aria-hidden="true">♡</span></button>

    <a href="<?php echo esc_url($url); ?>">
      <img class="eos-img" src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_attr($name ?: 'Product image'); ?>">
    </a>

    <div class="eos-body">
      <div class="eos-meta">
        <span class="eos-brand"><?php echo esc_html($brand); ?></span>
        <span class="eos-rating"><span class="eos-star">★</span> <?php echo esc_html($rating); ?></span>
      </div>

      <?php if ( $name ) : ?>
        <a href="<?php echo esc_url($url); ?>" class="eos-name"><?php echo esc_html($name); ?></a>
      <?php endif; ?>

      <?php if ( $color_items ) : ?>
        <ul class="eos-colors"><?php echo implode('', $color_items); ?></ul>
      <?php endif; ?>

      <div class="eos-price-row">
        <?php if ( $price !== '' && $price !== null ) : ?>
          <span class="eos-price"><?php echo esc_html($price); ?></span>
        <?php endif; ?>
        <?php if ( $old !== '' && $old !== null ) : ?>
          <span class="eos-old-price"><?php echo esc_html($old); ?></span>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php
}
endif; // helper exists
?>

<section class="eos-section">
  <div class="container">
    <div class="eos-wrapper">
      <!-- Left banner -->
      <div class="eos-banner">
        <?php if ( $banner_src ) : ?>
          <img src="<?php echo esc_url($banner_src); ?>" alt="<?php echo esc_attr($banner_title ?: 'Sale banner'); ?>" class="eos-banner-img">
        <?php endif; ?>

        <div class="eos-banner-content">
          <?php if ( $banner_title ) : ?>
            <span class="eos-badge"><?php echo esc_html($banner_title); ?></span>
          <?php endif; ?>

          <?php if ( $banner_sub ) : ?>
            <h2 class="eos-title"><?php echo esc_html($banner_sub); ?></h2>
          <?php endif; ?>

          <?php if ( $banner_desc ) : ?>
            <p class="eos-subtitle"><?php echo esc_html($banner_desc); ?></p>
          <?php endif; ?>

          <?php if ( $btn_text && $btn_url ) : ?>
            <a href="<?php echo esc_url($btn_url); ?>" class="btn eos-btn"><?php echo esc_html($btn_text); ?></a>
          <?php endif; ?>
        </div>
      </div>

      <!-- Right: three product cards -->
      <div class="eos-products">
        <?php eqn_eos_card(1); ?>
        <?php eqn_eos_card(2); ?>
        <?php eqn_eos_card(3); ?>
      </div>
    </div>
  </div>
</section>