<?php get_header();
$term_object = get_queried_object();
?>

<?php get_template_part('template-parts/hero'); ?>

<section class="services">
  <div class="container">
    <div class="row">

      <div class="col-lg-4 order-2 order-lg-1">
        <aside class="sidebar">
          <h3 class="widget-title">Наши Услуги</h3>
          <?php $terms = get_terms([
            'taxonomy' => 'category_services',
            'hide_empty' => false,
            'parent' => 0
          ]);

          if ($terms): ?>
            <div class="widget">
              <ul class="category-list">
                <?php foreach ($terms as $term): ?>
                  <li<?php echo $term_object->term_id == $term->term_id ? ' class="active"' : ''; ?>>
                    <a href="<?php echo get_term_link($term); ?>"><?php echo $term->name; ?></a>
                    <?php if ($term_object->term_id == $term->term_id || $term_object->parent == $term->term_id):

                    $child_terms = get_terms( [
                    'taxonomy' => 'category_services',
                    'hide_empty' => false,
                    'parent' => $term->term_id
                    ] );

                    if ($child_terms): ?>
                      <ul class="sub-category">
                        <?php foreach ($child_terms as $child_term): ?>
                          <li<?php echo $term_object->term_id == $child_term->term_id ? ' class="active"' : ''; ?>>
                            <a href="<?php echo get_term_link($child_term); ?>"><?php echo $child_term->name; ?></a>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                      <?php endif;?>
                    <?php endif;?>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>
          <?php if ( is_active_sidebar( 'services-sidebar' ) ) : ?>
            <?php dynamic_sidebar( 'services-sidebar' ); ?>
          <?php endif; ?>

        </aside>
      </div>

      <div class="col-lg-8 order-1 order-lg-2">

        <?php

        if (have_posts()):
          while (have_posts()):the_post(); ?>
            <div class="services-card">
              <h3 class="services-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

              <?php the_excerpt(); ?>

              <div class="services-card__cats">
                <?php echo get_the_term_list( get_the_ID(), 'category_services', '', ', ', ''); ?>
              </div>

            </div>
          <?php endwhile; wp_reset_postdata(); ?>
        <?php else: ?>
          <h3 class="page-title">Здесь пока ничего нет</h3>
        <?php endif; ?>

      </div>

    </div>
  </div>

  <img src="<?php echo THEME_URL; ?>/images/general/triangle-1.png" alt="" class="parallax parallax-6">
  <img src="<?php echo THEME_URL; ?>/images/general/triangle-1.png" alt="" class="parallax parallax-7">
  <img src="<?php echo THEME_URL; ?>/images/general/triangle-2.png" alt="" class="parallax parallax-8">

</section>

<?php get_footer(); ?>
