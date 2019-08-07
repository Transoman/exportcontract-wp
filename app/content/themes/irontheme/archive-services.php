<?php get_header();
$object = get_queried_object(); ?>

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
                <li><a href="<?php echo get_term_link($term); ?>"><?php echo $term->name; ?></a></li>
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
        <div class="page-head">
          <h2 class="page-title"><?php the_field( 'title', $object->name ); ?></h2>
          <form action="<?php echo home_url('/')?>" class="search-serv">
            <div class="form-group">
              <input type="text" name="s" class="search-serv__field" placeholder="Поиск услуги">
              <?php ith_the_icon('search', 'search-serv__icon'); ?>
            </div>
          </form>
        </div>
        <div class="page-descr">
          <?php the_field( 'descr', $object->name ); ?>
        </div>

        <?php $args = array(
          'post_type' => 'services',
          'meta_key' => 'post_views_count',
          'orderby' => 'meta_value_num',
          'order' => 'DESC'
        );

        $popular_services = new WP_Query( $args );

        if ($popular_services->have_posts()):
          while ($popular_services->have_posts()): $popular_services->the_post(); ?>
            <div class="services-card">
              <h3 class="services-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

              <?php the_excerpt(); ?>

              <div class="services-card__cats">
                <?php echo get_the_term_list( get_the_ID(), 'category_services', '', ', ', ''); ?>
              </div>

            </div>
          <?php endwhile; wp_reset_postdata(); ?>
        <?php endif; ?>

      </div>

    </div>
  </div>

  <img src="<?php echo THEME_URL; ?>/images/general/triangle-1.png" alt="" class="parallax parallax-6">
  <img src="<?php echo THEME_URL; ?>/images/general/triangle-1.png" alt="" class="parallax parallax-7">
  <img src="<?php echo THEME_URL; ?>/images/general/triangle-2.png" alt="" class="parallax parallax-8">

</section>

<?php get_footer(); ?>
