<?php
$heading = get_field('discipline_heading');
$disciplines = [
    ['img'=>get_field('discipline_1_img'), 'label'=>get_field('discipline_1_label'), 'url'=>get_field('discipline_1_url')],
    ['img'=>get_field('discipline_2_img'), 'label'=>get_field('discipline_2_label'), 'url'=>get_field('discipline_2_url')],
    ['img'=>get_field('discipline_3_img'), 'label'=>get_field('discipline_3_label'), 'url'=>get_field('discipline_3_url')],
    ['img'=>get_field('discipline_4_img'), 'label'=>get_field('discipline_4_label'), 'url'=>get_field('discipline_4_url')],
    ['img'=>get_field('discipline_5_img'), 'label'=>get_field('discipline_5_label'), 'url'=>get_field('discipline_5_url')],
    ['img'=>get_field('discipline_6_img'), 'label'=>get_field('discipline_6_label'), 'url'=>get_field('discipline_6_url')],
];
?>

<section class="shop-by-discipline bg-light-grey">
    <div class="container">
        <?php if($heading): ?>
            <h2 class="discipline-heading"><?php echo esc_html($heading); ?></h2>
        <?php endif; ?>

        <div class="discipline-grid">
            <?php foreach($disciplines as $disc): ?>
                <?php if($disc['img'] && $disc['label'] && $disc['url']): ?>
                    <a href="<?php echo esc_url($disc['url']); ?>" class="discipline-item">
                        <div class="discipline-image">
                            <img src="<?php echo esc_url($disc['img']); ?>" alt="<?php echo esc_attr($disc['label']); ?>">
                        </div>
                        <p class="discipline-label"><?php echo esc_html($disc['label']); ?></p>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
