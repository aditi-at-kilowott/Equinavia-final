<?php
$heading = get_field('categories_heading');
$categories = [
    ['img'=>get_field('category_1_img'), 'label'=>get_field('category_1_label'), 'url'=>get_field('category_1_url')],
    ['img'=>get_field('category_2_img'), 'label'=>get_field('category_2_label'), 'url'=>get_field('category_2_url')],
    ['img'=>get_field('category_3_img'), 'label'=>get_field('category_3_label'), 'url'=>get_field('category_3_url')],
    ['img'=>get_field('category_4_img'), 'label'=>get_field('category_4_label'), 'url'=>get_field('category_4_url')],
];
?>

<section class="popular-categories bg-light-grey">
    <div class="container">
        <?php if($heading): ?>
            <h2 class="categories-heading"><?php echo esc_html($heading); ?></h2>
        <?php endif; ?>

        <div class="categories-grid">
            <?php foreach($categories as $cat): ?>
                <?php if($cat['img'] && $cat['label'] && $cat['url']): ?>
                    <a href="<?php echo esc_url($cat['url']); ?>" class="category-item">
                        <div class="category-image">
                            <img src="<?php echo esc_url($cat['img']); ?>" alt="<?php echo esc_attr($cat['label']); ?>">
                        </div>
                        <p class="category-label"><?php echo esc_html($cat['label']); ?></p>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
