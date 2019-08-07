<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package mytheme
 */

get_header();
?>

  <section class="hero" style="background-image: url(<?php echo get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : THEME_URL .'/images/content/hero.jpg)'; ?>">
    <div class="container">
      <?php get_template_part('template-parts/breadcrumbs'); ?>

      <div class="hero__content">
        <h1 class="hero__title"><?php
          /* translators: %s: search query. */
          printf( esc_html__( 'Результаты поиска для: %s', 'ith' ), '<span>' . get_search_query() . '</span>' );
          ?></h1>
      </div>
    </div>
  </section>

  <section class="page-content">
    <div class="container">

    <?php if ( have_posts() ) : ?>

      <?php
      /* Start the Loop */
      while ( have_posts() ) :
        the_post();

        /**
         * Run the loop for the search to output the results.
         * If you want to overload this in a child theme then include a file
         * called content-search.php and that will be used instead.
         */
        get_template_part( 'template-parts/content', 'search' );

      endwhile;

      the_posts_navigation();

    else :

      get_template_part( 'template-parts/content', 'none' );

    endif;
    ?>

    </div>
  </section>

<?php
get_sidebar();
get_footer();
