<?php
/**
 * Template Name: Landing Page
 * Description: Hybrid ACF + Gutenberg landing page template.
 */

get_header();
?>
<main id="primary" class="site-main" style="background-color:#f7f7f7;">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php
      // ACF-driven sections
      get_template_part( 'template-parts/hero-section' );

      // ✅ REMOVE this line – it’s the old section that causes pic-1
      // get_template_part( 'template-parts/bestsellers' );
    ?>

    <!-- Gutenberg area: insert your “Bestsellers” block here from the editor -->
    <section class="landing-page-editor-content">
      <?php the_content(); ?>
    </section>

    <?php
      // Other ACF sections (keep as-is)
      get_template_part( 'template-parts/popular-categories' );
      get_template_part( 'template-parts/single-collection-banner' );
      get_template_part( 'template-parts/shop-by-discipline' );
      get_template_part( 'template-parts/shop-by-brand' );
      get_template_part( 'template-parts/shop-the-look' );
      get_template_part( 'template-parts/faq-section' );
      get_template_part( 'template-parts/seo-content' );
      get_template_part( 'template-parts/elevate-business' );
      get_template_part( 'template-parts/mailing-list' );
    ?>

  <?php endwhile; endif; ?>

</main>
<?php get_footer(); ?>