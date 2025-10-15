<?php
/**
 * ACF Block: Bestsellers (two toggles)
 * - Two tabs (Rider/Horse) fed by two product_cat TERM IDs from ACF
 * - Custom product card inside a Swiper slider per tab
 */

if ( ! function_exists( 'wc' ) || ! class_exists( 'WooCommerce' ) ) {
  echo '<p>WooCommerce is required for this block.</p>';
  return;
}

$heading    = get_field('bestsellers_heading') ?: 'Bestsellers';
$tab1_label = get_field('toggle_btn_1') ?: 'Rider';
$tab2_label = get_field('toggle_btn_2') ?: 'Horse';
$cat1_id    = (int) get_field('toggle_1_cat');  // ACF taxonomy fields returning "Term ID"
$cat2_id    = (int) get_field('toggle_2_cat');

/**
 * Render a Swiper of products for a given product_cat term_id.
 * Guarded so re-includes don't fatal.
 */
if ( ! function_exists('eqn_render_products_by_term_id') ) {
  function eqn_render_products_by_term_id( $term_id ) {
    if ( ! $term_id ) {
      echo '<p class="muted">Pick a category in the block settings.</p>';
      return;
    }

    $q = new WP_Query([
      'post_type'      => 'product',
      'post_status'    => 'publish',
      'posts_per_page' => 12,
      'tax_query'      => [[
        'taxonomy'         => 'product_cat',
        'field'            => 'term_id',
        'terms'            => (int) $term_id,
        'include_children' => true,
      ]],
      'meta_key'  => 'total_sales',
      'orderby'   => 'meta_value_num',
      'order'     => 'DESC',
    ]);

    if ( ! $q->have_posts() ) {
      echo '<p class="muted">No products in this category.</p>';
      return;
    }

    echo '<div class="bestsellers-slider swiper" data-swiper="bestsellers">';
    echo '  <div class="swiper-wrapper">';

    while ( $q->have_posts() ) : $q->the_post();
      /** @var WC_Product $product */
      global $product;
      if ( ! $product ) { continue; }

      $pid     = $product->get_id();
      $name    = get_the_title( $pid );
      $price   = $product->get_price_html();
      $rating  = $product->get_average_rating();
      if ( (float) $rating <= 0 ) { $rating = '4.5'; }

      // Image (fallback-safe)
      $img_id  = $product->get_image_id();
      $img_url = $img_id ? wp_get_attachment_url( $img_id ) : wc_placeholder_img_src( 'woocommerce_single' );
      $permalink = get_permalink( $pid );

      // Optional ACF product fields
      $brand      = get_field( 'product_brand',  $pid );
      $colors_str = get_field( 'product_colors', $pid );
      $colors     = $colors_str ? array_map( 'trim', explode( ',', $colors_str ) ) : [];

      // Optional badge via ACF
      $badge_text   = get_field( 'product_badge', $pid );
      $badge_class  = get_field( 'badge_class',   $pid ); // e.g. trending / new-arrival / sale
      $variant_slug = $badge_class ? sanitize_title( $badge_class ) : '';
      $badge_variant= $variant_slug ? 'badge--' . $variant_slug : 'badge--default';
      ?>
        <div class="swiper-slide">
          <div class="product-card">

            <?php if ( $badge_text ) : ?>
              <span class="product-badge <?php echo esc_attr( $badge_variant ); ?>">
                <?php if ( $variant_slug === 'trending' ) : ?>
                  <svg class="badge-icon" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M13.5 2c.2 2.1-.5 3.7-2.2 4.9C9.6 8 9 9.4 9.2 11c.1.7.5 1.4 1.1 1.9.6.5 1.3.8 2.1.9.2-1 .6-1.9 1.3-2.7.7-.8 1.6-1.3 2.7-1.5.2 1.5-.1 2.9-1 4.1-.8 1.2-2 2.1-3.4 2.7 0 0 .2 3.6 4 3.6 3.6 0 6-2.7 6-6.2 0-4.4-3.7-7.4-5.9-8.7-.3-.2-.6-.3-.9-.5C14.3 3.9 13.7 3 13.5 2zM8.8 12.8c-.7.8-1.1 1.8-1.1 2.9 0 2.5 2 4.3 4.3 4.3 0 0-2.2-1.3-2.2-3 0-1.6 1.2-2.5 2.5-3.2-1.5-.2-2.7-.5-3.5-1z"/>
                  </svg>
                <?php endif; ?>
                <?php echo esc_html( $badge_text ); ?>
              </span>
            <?php endif; ?>

            <a class="product-actions-link" href="<?php echo esc_url( $permalink ); ?>" aria-label="View product">
              <img class="product-main-img"
                   src="<?php echo esc_url( $img_url ); ?>"
                   alt="<?php echo esc_attr( $name ); ?>">
            </a>

            <div class="product-details">
              <div class="product-meta">
                <?php if ( $brand ) : ?>
                  <span class="product-brand"><?php echo esc_html( $brand ); ?></span>
                <?php endif; ?>
                <div class="product-rating">
                  <span class="stars">&#9733;</span>
                  <span class="rating-value"><?php echo esc_html( $rating ); ?></span>
                </div>
              </div>

              <a href="<?php echo esc_url( $permalink ); ?>">
                <p class="product-name"><?php echo esc_html( $name ); ?></p>
              </a>

              <?php if ( ! empty( $colors ) ) : ?>
                <ul class="product-colors">
                  <?php foreach ( $colors as $c ) :
                    if ( ! $c ) { continue; } ?>
                    <li style="background-color: <?php echo esc_attr( $c ); ?>">
                      <span class="color-dot"></span>
                    </li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>

              <div class="product-price"><?php echo wp_kses_post( $price ); ?></div>
            </div>
          </div>
        </div>
      <?php
    endwhile;

    echo '  </div>'; // .swiper-wrapper
    echo '  <div class="swiper-button-prev" aria-label="Previous"></div>';
    echo '  <div class="swiper-button-next" aria-label="Next"></div>';
    echo '  <div class="swiper-pagination"></div>';
    echo '</div>'; // .bestsellers-slider

    wp_reset_postdata();
  }
}
?>

<section class="bestsellers-section">
  <div class="container">

    <div class="bestsellers-header">
      <h2 class="bestsellers-heading"><?php echo esc_html( $heading ); ?></h2>

      <div class="bestsellers-toggle">
        <button class="toggle-btn is-active" data-target="tab1"><?php echo esc_html( $tab1_label ); ?></button>
        <button class="toggle-btn" data-target="tab2"><?php echo esc_html( $tab2_label ); ?></button>
      </div>
    </div>

    <div class="bestsellers-panes" data-default-tab="tab1">
      <div class="bestsellers-pane is-active" data-pane="tab1">
        <?php eqn_render_products_by_term_id( $cat1_id ); ?>
      </div>
      <div class="bestsellers-pane" data-pane="tab2">
        <?php eqn_render_products_by_term_id( $cat2_id ); ?>
      </div>
    </div>

  </div>
</section>