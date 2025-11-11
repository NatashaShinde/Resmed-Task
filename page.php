<?php get_header(); ?>

<main id="site-content">
  <?php
  // Render content of the page
  if (have_posts()) :
    while (have_posts()) : the_post();
      the_content();

      // Include slider component partial (this will render only if fields exist)
      get_template_part('parts/slider-component');
    endwhile;
  endif;
  ?>
</main>

<?php get_footer(); ?>
