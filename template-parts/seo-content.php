<?php
$headline = get_field('seo_headline');
$paragraph1 = get_field('seo_paragraph_1');
$paragraph2 = get_field('seo_paragraph_2');
?>

<section class="seo-content" style="background-color: #f7f7f7;">
    <div class="container">
        <?php if($headline): ?>
            <h2><?php echo esc_html($headline); ?></h2>
        <?php endif; ?>

        <?php if($paragraph1): ?>
            <p><?php echo esc_html($paragraph1); ?></p>
        <?php endif; ?>

        <?php if($paragraph2): ?>
            <p><?php echo esc_html($paragraph2); ?></p>
        <?php endif; ?>
    </div>
</section>
