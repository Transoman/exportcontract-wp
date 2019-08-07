<?php
/**
 * template Name: О компании
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
        </div>

        <?php if (have_rows('docs_list')): ?>
          <div class="docs-section">
            <h2 class="docs-section__title">Документы</h2>

            <div class="docs-list">
              <?php $i = 0; while (have_rows('docs_list')): the_row(); ?>
              <div class="docs-list__item<?php echo $i == 0 ? ' active' : ''; $i++; ?>">
                <h3 class="docs-list__title"><?php the_sub_field('title'); ?>
                  <span class="toggle-arrow">
                    <?php ith_the_icon('left-arrow'); ?>
                  </span>
                </h3>

                <div class="docs-list__content">
                  <?php if (have_rows('list')): ?>
                    <div class="docs-sub-list">
                      <?php while (have_rows('list')): the_row(); ?>
                        <div class="docs-sub-list__item">
                          <a href="<?php echo esc_url(get_sub_field('file')); ?>" class="docs-sub-list__title">
                            <?php ith_the_icon('file'); ?>
                            <?php the_sub_field('name'); ?>
                          </a>
                          <?php if (get_sub_field('descr')): ?>
                            <div class="docs-sub-list__content">
                              <?php the_sub_field('descr'); ?>
                            </div>
                          <?php endif; ?>
                        </div>
                      <?php endwhile; ?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
              <?php endwhile; ?>
            </div>

          </div>
        <?php endif; ?>

      </div>
    </div>
  </div>
</section>
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
