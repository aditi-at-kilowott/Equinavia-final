<?php
/**
 * Wrap saved slides with Swiper markup
 * $content contains the rendered child blocks (hero-slide).
 */
$align = isset($attributes['align']) ? 'align' . $attributes['align'] : '';
?>
<section class="eqn-hero-slider <?php echo esc_attr($align); ?>">
  <div class="swiper eqn-hero-swiper">
    <div class="swiper-wrapper">
      <?php echo $content; // hero-slide outputs each .swiper-slide ?>
    </div>

    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev" aria-label="Previous"></div>
    <div class="swiper-button-next" aria-label="Next"></div>
  </div>
</section>