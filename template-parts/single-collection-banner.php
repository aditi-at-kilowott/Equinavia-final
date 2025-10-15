<?php
$img = get_field('single_banner_img');
$sub = get_field('single_banner_sub');
$head = get_field('single_banner_head');
$btn = get_field('single_banner_btn');
$url = get_field('single_banner_url');
?>

<?php if($img): ?>
<section class="single-collection-banner">
    <div class="banner-image" style="background-image: url('<?php echo esc_url($img); ?>');">
        <div class="banner-content container">
            <?php if($sub): ?><span class="banner-subheadline"><?php echo esc_html($sub); ?></span><?php endif; ?>
            <?php if($head): ?><h2 class="banner-headline"><?php echo esc_html($head); ?></h2><?php endif; ?>
            <?php if($btn && $url): ?><a href="<?php echo esc_url($url); ?>" class="banner-btn"><?php echo esc_html($btn); ?></a><?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>
