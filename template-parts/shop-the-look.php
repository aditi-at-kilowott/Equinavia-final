<?php
$heading = get_field('shop_look_heading');
$bg_image = get_field('shop_look_bg');

$hotspots = [
    ['label' => get_field('hotspot_1_label'), 'url' => get_field('hotspot_1_url')],
    ['label' => get_field('hotspot_2_label'), 'url' => get_field('hotspot_2_url')],
    ['label' => get_field('hotspot_3_label'), 'url' => get_field('hotspot_3_url')],
];
?>

<section class="shop-the-look bg-light-grey">
    <div class="container">
        <?php if($heading): ?>
            <h2 class="shop-heading"><?php echo esc_html($heading); ?></h2>
        <?php endif; ?>

        <?php if($bg_image): ?>
            <div class="shop-banner-image" style="background-image: url('<?php echo esc_url($bg_image); ?>');">
                <?php foreach($hotspots as $index => $hotspot): ?>
                    <?php if($hotspot['label'] && $hotspot['url']): ?>
                        <a href="<?php echo esc_url($hotspot['url']); ?>" class="hotspot hotspot-<?php echo $index+1; ?>" aria-label="<?php echo esc_attr($hotspot['label']); ?>">
                            <div class="hotspot-dot"></div>
                            <div class="hotspot-label"><?php echo esc_html($hotspot['label']); ?></div>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
