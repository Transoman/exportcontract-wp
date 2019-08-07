<?php
/**
 * Template Name: Главная
 */
get_header(); ?>

<?php if ( have_rows('home_layout') ):

  while ( have_rows('home_layout') ) : the_row();

    if ( get_row_layout() == 'hero' ): ?>

      <?php if (have_rows('slider')): ?>
        <div class="hero-slider swiper-container">
          <div class="swiper-wrapper">
            <?php while (have_rows('slider')): the_row(); ?>
              <div class="hero-slider__item swiper-slide" style="background-image: url(<?php the_sub_field('bg')?>);">
                <div class="container">
                  <div class="hero-slider__content">
                  <?php if (get_sub_field('above_text')): ?>
                    <h3 class="hero-slider__above-title"><?php the_sub_field('above_text'); ?></h3>
                  <?php endif; ?>

                  <h1 class="hero-slider__title"><?php the_sub_field('title'); ?></h1>

                  <?php if (get_sub_field('link_text') && get_sub_field('link_url')): ?>
                    <a href="<?php echo esc_url(get_sub_field('link_url')); ?>" class="btn btn--white"><?php the_sub_field('link_text'); ?></a>
                  <?php endif; ?>

                </div>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
          <div class="swiper-pagination"></div>
          <div class="swiper-button-prev">
            <?php ith_the_icon('left-arrow'); ?>
          </div>
          <div class="swiper-button-next">
            <?php ith_the_icon('right-arrow'); ?>
          </div>
        </div>
      <?php endif; ?>

    <?php elseif ( get_row_layout() == 'services' ): ?>

      <section class="s-services">
        <div class="container">

          <div class="s-services__wrap">
            <div class="services-tabs">
              <h2 class="section-title"><?php the_sub_field('title'); ?></h2>

              <?php $terms = $terms = get_sub_field('list');

              if ($terms): ?>

                <button type="button" class="services-tabs__btn prev">
                  <?php ith_the_icon('left-arrow'); ?>
                </button>
                <button type="button" class="services-tabs__btn next">
                  <?php ith_the_icon('right-arrow'); ?>
                </button>

                <ul class="services-tabs-list">
                  <?php foreach ($terms as $term): ?>
                    <li><a href="#<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>

              <?php if ($terms): ?>
                <?php foreach ($terms as $term): ?>
                  <div class="services-tabs__item" id="<?php echo $term->slug; ?>">
                    <h3 class="services-tabs__title"><?php echo $term->name; ?></h3>
                    <?php if ($term->description): ?>
                      <div class="services-tabs__descr">
                        <?php echo apply_filters( 'the_content', $term->description ); ?>
                      </div>
                    <?php endif; ?>

                    <?php $child_terms = get_terms( [
                      'taxonomy' => 'category_services',
                      'hide_empty' => false,
                      'parent' => $term->term_id
                    ] );
                    if ($child_terms): ?>
                      <ul class="services-tabs__sub-cat">
                        <?php foreach ($child_terms as $child_term): ?>
                          <li>
                            <a href="<?php echo get_term_link($child_term); ?>"><?php echo $child_term->name; ?></a>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                    <?php endif; ?>

                    <a href="<?php echo get_term_link($term); ?>" class="services-tabs__link">подробнее об услуге</a>

                  </div>
                <?php endforeach; ?>
              <?php endif; ?>

            </div>
            <!-- /.services-tabs -->

            <a href="/services" class="btn btn--blue s-services__all">ВСЕ УСЛУГИ</a>

          </div>

        </div>

        <img src="<?php echo THEME_URL; ?>/images/general/triangle-1.png" alt="" class="parallax parallax-1">
        <img src="<?php echo THEME_URL; ?>/images/general/triangle-2.png" alt="" class="parallax parallax-2">

      </section>

    <?php endif;

  endwhile;

endif; ?>

<?php if ( have_rows('home_layout') ):

  while ( have_rows('home_layout') ) : the_row();

    if ( get_row_layout() == 'about' ): ?>

      <section class="s-about">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-lg-6">
              <div class="s-about__img clearfix">
                <?php echo wp_get_attachment_image(get_sub_field('img'), 'full'); ?>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="s-about__content">
                <?php if (get_sub_field('above_text')): ?>
                  <h4 class="above-title"><?php the_sub_field('above_text'); ?></h4>
                <?php endif; ?>

                <h2 class="section-title"><?php the_sub_field('title'); ?></h2>

                <?php if (get_sub_field('descr')): ?>
                  <div class="s-about__descr">
                    <?php the_sub_field('descr'); ?>
                  </div>
                <?php endif; ?>

                <div class="s-about__btns">
                  <?php if (get_sub_field('link_url')): ?>
                    <a href="<?php echo esc_url(get_sub_field('link_url')); ?>" class="btn s-about__readmore">Подробнее</a>
                  <?php endif; ?>
                  <a href="#" class="btn btn--blue cooperation_open">начать сотрудничество</a>
                </div>

              </div>
            </div>

          </div>
        </div>

        <img src="<?php echo THEME_URL; ?>/images/general/triangle-1.png" alt="" class="parallax parallax-3">

      </section>

    <?php elseif ( get_row_layout() == 'faq' ): ?>

      <section class="s-faq">
        <div class="container">
          <h2 class="section-title"><?php the_sub_field('title'); ?></h2>

          <?php $faqs = get_faqs(6);
          if ($faqs->have_posts()): ?>
            <div class="row faq-list align-items-start">
              <?php $i = 0; while ($faqs->have_posts()): $faqs->the_post(); ?>
              <?php if ($i % 3 == 0): ?>
                <div class="col-lg-6">
                <?php endif; ?>
                  <div class="faq-card<?php echo $i == 0 ? ' active' : ''; ?>">
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
                  <?php if ($i % 3 == 2): ?>
                </div>
                <?php endif; $i++;?>
              <?php endwhile; wp_reset_postdata(); ?>
            </div>
          <?php endif; ?>

        </div>

        <img src="<?php echo THEME_URL; ?>/images/general/triangle-1.png" alt="" class="parallax parallax-4">
        <img src="<?php echo THEME_URL; ?>/images/general/triangle-2.png" alt="" class="parallax parallax-5">

      </section>

    <?php elseif ( get_row_layout() == 'contact' ): ?>

      <section class="s-contact">
        <div class="container">
          <div class="contact-block s-contact__wrap">
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
        </div>
        <div id="contact-map" class="s-contact__map"></div>

      </section>

    <?php endif;

  endwhile;

endif; ?>

<?php get_footer(); ?>
