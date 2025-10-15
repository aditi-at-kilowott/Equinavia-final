<?php

$id = 'featured-collection-' . ($block['id'] ?? uniqid());
$className = 'featured-collection' . (!empty($block['className']) ? ' ' . $block['className'] : '');


$img  = get_field('featured_img');   
$sub  = get_field('featured_sub');   
$head = get_field('featured_head');  
$btn  = get_field('featured_btn');   
$url  = get_field('featured_url');   


$img_url = is_array($img) ? ($img['url'] ?? '') : $img;
?>

<?php if ($img_url): ?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="featured-image" style="background-image:url('<?php echo esc_url($img_url); ?>');">
    <div class="featured-content">
      <?php if ($sub)  : ?><span class="featured-subheadline"><?php echo esc_html($sub);  ?></span><?php endif; ?>
      <?php if ($head) : ?><h2 class="featured-headline"><?php echo esc_html($head); ?></h2><?php endif; ?>
      <?php if ($btn && $url) : ?>
        <a class="featured-btn" href="<?php echo esc_url($url); ?>"><?php echo esc_html($btn); ?></a>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php endif; ?>