<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package mytheme
 */

get_header();
?>

  <section class="error-404 not-found">
    <div class="container">
      <h1 class="page-title"><?php esc_html_e( 'К сожалению! Эта страница не может быть найдена.', 'ith' ); ?></h1>

    </div>
  </section><!-- .error-404 -->

<?php
get_footer();
