<?php get_header(); ?>

<main id="site-content">
  <?php
  
  if (have_posts()) :
    while (have_posts()) : the_post();
      the_content();

      get_template_part('parts/slider-component');
    endwhile;
  endif;
  ?>
</main>

<?php get_footer(); ?>
