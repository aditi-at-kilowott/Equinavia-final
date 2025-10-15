<?php
$headline = get_field('elevate_headline');
$description = get_field('elevate_description');
$button_text = get_field('elevate_button_text');
$button_url = get_field('elevate_button_url');
$bg_image = get_field('elevate_bg_image');
?>

<section class="elevate-business bg-light-grey">
    <div class="elevate-content">
        <div class="container">
            <?php if($headline): ?>
                <h2 class="elevate-headline"><?php echo esc_html($headline); ?></h2>
            <?php endif; ?>
            
            <?php if($description): ?>
                <p style="font-size:16px; font-weight:400;"><?php echo esc_html($description); ?></p>
            <?php endif; ?>
            
            <?php if($button_text && $button_url): ?>
                <a href="<?php echo esc_url($button_url); ?>" class="elevate-btn"><?php echo esc_html($button_text); ?></a>
            <?php endif; ?>
        </div>
    </div>

    <?php if($bg_image): ?>
        <div class="elevate-image" style="background-image: url('<?php echo esc_url($bg_image); ?>');"></div>
    <?php endif; ?>
</section>
