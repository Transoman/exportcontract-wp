<?php
get_header(); ?>

<?php
while ( have_posts() ) :
  the_post(); ?>

  <?php get_template_part('template-parts/hero'); ?>

  <section class="page-content">
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
                    <li>
                      <a href="<?php echo get_term_link($term); ?>"><?php echo $term->name; ?></a>
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
          <h2 class="page-title"><?php the_title(); ?></h2>

          <div class="page-text">
            <?php the_content(); ?>
          </div>

          <?php if (get_field('step_title')): ?>
            <div class="services-order">
              <h3 class="services-order__title"><?php the_field('step_title'); ?></h3>

              <?php if (have_rows('step_list')): ?>
                <ul class="services-order-list">
                <?php while (have_rows('step_list')): the_row(); ?>
                  <li class="services-order-list__item">
                    <b class="services-order-list__title"><?php the_sub_field('title'); ?></b>
                    <?php the_sub_field('descr'); ?>
                  </li>
                <?php endwhile; ?>
                </ul>
              <?php endif; ?>

              <?php if (get_field('btn_text')): ?>
                <div class="services-order__btn">
                  <a href="<?php echo esc_url(get_field('btn_link')); ?>" class="btn"><?php the_field('btn_text'); ?></a>
                </div>
              <?php endif; ?>

            </div>
          <?php endif; ?>

        </div>

      </div>
    </div>

    <img src="<?php echo THEME_URL; ?>/images/general/triangle-1.png" alt="" class="parallax parallax-6">
    <img src="<?php echo THEME_URL; ?>/images/general/triangle-2.png" alt="" class="parallax parallax-9">

  </section>

<?php endwhile; // End of the loop. ?>


<?php setPostViews(get_the_ID()); ?>

<?php
get_footer();