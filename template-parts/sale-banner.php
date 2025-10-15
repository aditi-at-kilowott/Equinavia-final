<?php
/**
 * ACF BLOCK: End of Season / Sale Banner
 * Location: template-parts/blocks/sale-banner/sale-banner.php
 */
if (!defined('ABSPATH')) exit;

$img        = get_field('eos_banner_image');
$title      = get_field('eos_banner_title');
$subtitle   = get_field('eos_banner_subtitle');
$desc       = get_field('eos_banner_description');
$btn_text   = get_field('eos_banner_button_text');
$btn_url    = get_field('eos_banner_button_url');

function eqn_eos_card($n) {
  $img   = get_field("eos_product_{$n}_image");
  $name  = get_field("eos_product_{$n}_name");
  $brand = get_field("eos_product_{$n}_brand");
  $rate  = get_field("eos_product_{$n}_rating");
  $cols  = get_field("eos_product_{$n}_colors");
  $price = get_field("eos_product_{$n}_price");
  $old   = get_field("eos_product_{$n}_old_price");
  $url   = get_field("eos_product_{$n}_url");

  if (!$img && !$name) return; ?>

  <a class="eos-card" href="<?php echo esc_url($url ?: '#'); ?>">
    <div class="eos-actions">
      <span class="eos-heart" aria-hidden="true">♡</span>
    </div>
    <?php if ($img): ?>
      <img class="eos-img" src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($name); ?>">
    <?php endif; ?>
    <div class="eos-details">
      <?php if ($brand): ?><span class="eos-brand"><?php echo esc_html($brand); ?></span><?php endif; ?>
      <div class="eos-rating"><span class="eos-stars">★</span><span class="eos-rating-value"><?php echo esc_html($rate ?: '4.5'); ?></span></div>
      <?php if ($name): ?><p class="eos-name"><?php echo esc_html($name); ?></p><?php endif; ?>
      <?php if ($cols): ?>
        <ul class="eos-colors">
          <?php foreach (array_map('trim', explode(',', $cols)) as $c): if ($c==='') continue; ?>
            <li style="background-color: <?php echo esc_attr($c); ?>;"></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
      <div class="eos-price">
        <?php echo wp_kses_post($price); ?>
        <?php if ($old): ?><span class="eos-old-price"><?php echo wp_kses_post($old); ?></span><?php endif; ?>
      </div>
    </div>
  </a>
<?php }

?>
<section class="eos-section">
  <div class="container">
    <div class="eos-wrapper">
      <div class="eos-banner">
        <?php if ($img): ?><img class="eos-banner-img" src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($title ?: ''); ?>"><?php endif; ?>
        <div class="eos-banner-content">
          <?php if ($title):    ?><span class="eos-badge"><?php echo esc_html($title); ?></span><?php endif; ?>
          <?php if ($subtitle): ?><h2 class="eos-title"><?php echo esc_html($subtitle); ?></h2><?php endif; ?>
          <?php if ($desc):     ?><p class="eos-subtitle"><?php echo esc_html($desc); ?></p><?php endif; ?>
          <?php if ($btn_text): ?><a class="btn eos-btn" href="<?php echo esc_url($btn_url ?: '#'); ?>"><?php echo esc_html($btn_text); ?></a><?php endif; ?>
        </div>
      </div>

      <div class="eos-products">
        <?php eqn_eos_card(1); ?>
        <?php eqn_eos_card(2); ?>
        <?php eqn_eos_card(3); ?>
      </div>
    </div>
  </div>
</section>