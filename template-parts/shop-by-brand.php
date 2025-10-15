<?php
$heading = get_field('brand_heading');
$brands = [
    ['img' => get_field('brand_1_img'), 'url' => get_field('brand_1_url')],
    ['img' => get_field('brand_2_img'), 'url' => get_field('brand_2_url')],
    ['img' => get_field('brand_3_img'), 'url' => get_field('brand_3_url')],
    ['img' => get_field('brand_4_img'), 'url' => get_field('brand_4_url')],
];
?>

<section class="shop-by-brand bg-light-grey">
    <div class="container">
        <?php if($heading): ?>
            <h2 class="brand-heading"><?php echo esc_html($heading); ?></h2>
        <?php endif; ?>

        <div class="brand-grid">
            <?php foreach($brands as $brand): ?>
                <?php if($brand['img'] && $brand['url']): ?>
                    <a href="<?php echo esc_url($brand['url']); ?>" class="brand-item">
                        <div class="brand-image">
                            <img src="<?php echo esc_url($brand['img']); ?>" alt="">
                        </div>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
