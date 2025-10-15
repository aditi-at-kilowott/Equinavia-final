<?php
$eyebrow   = $attributes['eyebrow']    ?? '';
$title     = $attributes['title']      ?? '';
$buttonTxt = $attributes['buttonText'] ?? '';
$buttonUrl = $attributes['buttonUrl']  ?? '';
$imageURL  = $attributes['imageURL']   ?? '';
$dim       = isset($attributes['dim']) ? (int) $attributes['dim'] : 35;
$align     = isset($attributes['align']) ? 'align' . $attributes['align'] : '';
?>
<section class="eqn-hero-promo <?php echo esc_attr($align); ?>"
         style="<?php if ($imageURL) echo 'background-image:url(' . esc_url($imageURL) . ');'; ?>">
  <span class="eqn-hero-promo__overlay" style="opacity:<?php echo esc_attr($dim / 100); ?>"></span>
  <div class="eqn-hero-promo__inner">
    <?php if ($eyebrow): ?>
      <span class="eqn-hero-promo__eyebrow"><?php echo esc_html($eyebrow); ?></span>
    <?php endif; ?>
  
    <?php if ($title): ?>
      <h2 class="eqn-hero-promo__title"><?php echo wp_kses_post($title); ?></h2>
    <?php endif; ?>

    <?php if ($buttonTxt && $buttonUrl): ?>
      <a class="eqn-hero-promo__btn" href="<?php echo esc_url($buttonUrl); ?>">
        <?php echo esc_html($buttonTxt); ?>
      </a>
    <?php endif; ?>
  </div>
</section>