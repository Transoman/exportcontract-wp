<?php
/**
 * template Name: FAQ
 */
get_header(); ?>

<section class="hero" style="background-image: url(<?php echo get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : THEME_URL .'/images/content/hero.jpg)'; ?>">
  <div class="container">
    <?php get_template_part('template-parts/breadcrumbs'); ?>

    <div class="hero__content">
      <h1 class="hero__title"><?php the_title(); ?></h1>
    </div>
  </div>
</section>

<?php if (have_posts()): ?>
  <?php while (have_posts()): the_post(); ?>
    <section class="page-content">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 order-2 order-lg-1">
            <?php get_sidebar(); ?>
          </div>
          <div class="col-lg-8 order-1 order-lg-2">
            <div class="page-text">
              <?php the_content(); ?>

              <?php $faqs = get_faqs(6);
              if ($faqs->have_posts()): ?>
              <div id="response">
                <?php $i = 0; while ($faqs->have_posts()): $faqs->the_post(); ?>
                  <div class="faq-card<?php echo $i == 0 ? ' active' : ''; $i++; ?>">
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
                <?php endwhile; wp_reset_postdata(); ?>
              </div>
              <?php if ( $faqs->max_num_pages > 1 ) : ?>
                <script>
                  var true_posts = '<?php echo serialize($faqs->query_vars); ?>';
                  var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                  var max_pages = '<?php echo $faqs->max_num_pages; ?>';
                </script>
                <div class="faq-btn">
                  <a href="#" class="btn btn--blue load-more"> показать еще </a>
                </div>
              <?php endif; ?>
              <?php endif; ?>

            </div>
          </div>
        </div>
      </div>

      <img src="<?php echo THEME_URL; ?>/images/general/triangle-1.png" alt="" class="parallax parallax-6">
      <img src="<?php echo THEME_URL; ?>/images/general/triangle-2.png" alt="" class="parallax parallax-9">

    </section>
  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
