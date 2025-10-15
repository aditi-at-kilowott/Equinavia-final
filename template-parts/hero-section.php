<section class="hero-slider">
    <div class="swiper hero-slider-inner">
        <div class="swiper-wrapper">

            <?php
            for($i=1; $i<=4; $i++):
                $img = get_field("hero_slide_{$i}_img");
                $sub = get_field("hero_slide_{$i}_sub");
                $head = get_field("hero_slide_{$i}_head");
                $btn = get_field("hero_slide_{$i}_btn");
                $url = get_field("hero_slide_{$i}_url");
                if($img):
            ?>
                <div class="swiper-slide hero-slide" style="background-image: url('<?php echo esc_url($img); ?>');">
                    <div class="hero-content container">
                        <?php if($sub): ?><span class="sub-headline"><?php echo esc_html($sub); ?></span><?php endif; ?>
                        <?php if($head): ?><h2 class="hero-headline"><?php echo esc_html($head); ?></h2><?php endif; ?>
                        <?php if($btn && $url): ?><a href="<?php echo esc_url($url); ?>" class="hero-btn"><?php echo esc_html($btn); ?></a><?php endif; ?>
                    </div>
                </div>
            <?php endif; endfor; ?>

        </div>
    </div>
</section>
