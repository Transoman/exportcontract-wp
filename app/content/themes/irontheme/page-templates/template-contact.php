<?php
/**
 * template Name: Контакты
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
<section class="contact">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-xl-5">
        <div class="contact__content">
          <?php the_content(); ?>
        </div>
        <div class="contact-block">
          <h2><?php the_sub_field('title'); ?></h2>
          <?php the_sub_field('descr'); ?>

          <div class="contact-block__info">
            <div class="contact-block__info-row">
              <?php if (get_field('phone_1', 'option')): ?>
                <div class="contact-block__info-item">
                  <p class="contact-block__info-label">Телефон:</p>
                  <a href="tel:<?php echo preg_replace('![^0-9/+]+!', '', get_field('phone_1', 'option')); ?>"><?php the_field('phone_1', 'option'); ?></a>
                </div>
              <?php endif; ?>

              <?php if (get_field('phone_2', 'option')): ?>
                <div class="contact-block__info-item">
                  <p class="contact-block__info-label">Телефон:</p>
                  <a href="tel:<?php echo preg_replace('![^0-9/+]+!', '', get_field('phone_2', 'option')); ?>"><?php the_field('phone_2', 'option'); ?></a>
                </div>
              <?php endif; ?>
            </div>

            <div class="contact-block__info-row">
              <?php if (get_field('schedule', 'option')): ?>
                <div class="contact-block__info-item">
                  <p class="contact-block__info-label">Режим работы:</p>
                  <p><?php the_field('schedule', 'option'); ?></p>
                </div>
              <?php endif; ?>

              <?php if (get_field('email', 'option')): ?>
                <div class="contact-block__info-item">
                  <p class="contact-block__info-label">Почта:</p>
                  <a href="mailto:<?php the_field('email', 'option'); ?>"><?php the_field('email', 'option'); ?></a>
                </div>
              <?php endif; ?>
            </div>

            <div class="contact-block__info-row">
              <?php if (get_field('address', 'option')): ?>
                <div class="contact-block__info-item">
                  <p class="contact-block__info-label">Адрес:</p>
                  <p><?php the_field('address', 'option'); ?></p>
                </div>
              <?php endif; ?>
            </div>
          </div>

        </div>

        <a href="#" class="btn callback_open">Связаться с нами</a>

      </div>
    </div>
  </div>

  <div id="contact-map" class="contact__map"></div>

  <img src="<?php echo THEME_URL; ?>/images/general/triangle-1.png" alt="" class="parallax parallax-6">

</section>
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
