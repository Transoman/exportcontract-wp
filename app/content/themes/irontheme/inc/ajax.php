<?php
function load_more_faq() {
  $args = unserialize( stripslashes( $_POST['query'] ) );
  $args['paged'] = $_POST['page'] + 1; // следующая страница
  $args['post_status'] = 'publish';

  // обычно лучше использовать WP_Query, но не здесь
  query_posts( $args );
  // если посты есть
  if( have_posts() ) :

    // запускаем цикл
    while( have_posts() ): the_post(); ?>
      <div class="faq-card">
        <h3 class="faq-card__title">
          <?php the_title(); ?>
          <span class="faq-card__arrow">
            <?php ith_the_icon('left-arrow'); ?>
          </span>
        </h3>
        <div class="faq-card__content">
          <?php the_content(); ?>
        </div>
      </div>
    <?php endwhile;

  endif;
  die();
}
add_action('wp_ajax_load_more_faq', 'load_more_faq');
add_action('wp_ajax_nopriv_load_more_faq', 'load_more_faq');