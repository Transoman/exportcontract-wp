<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ith
 */

?>
<div class="services-card">
  <h3 class="services-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

  <?php the_excerpt(); ?>

  <div class="services-card__cats">
    <?php echo get_the_term_list( get_the_ID(), 'category_services', '', ', ', ''); ?>
  </div>

</div>