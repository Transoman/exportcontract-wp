<section class="hero" style="background-image: url(<?php echo get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : THEME_URL .'/images/content/hero.jpg)'; ?>">
  <div class="container">
    <?php get_template_part('template-parts/breadcrumbs'); ?>

    <div class="hero__content">
      <h1 class="hero__title">
        <?php if (is_single() || is_page()) {
          the_title();
        }
        elseif (is_tax()) {
          single_term_title();
        }
        elseif (get_queried_object()->name == 'services') {
          the_field( 'title', get_queried_object()->name );
        } ?>
      </h1>
    </div>
  </div>
</section>