  </div><!-- /.content -->

  <footer class="footer">
    <div class="footer__top">
      <div class="container">

        <div class="footer__row">
          <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
            <div class="footer__col">
              <?php dynamic_sidebar( 'footer-1' ); ?>
            </div>
          <?php endif; ?>
          <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
            <div class="footer__col">
              <?php dynamic_sidebar( 'footer-2' ); ?>
            </div>
          <?php endif; ?>
          <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
            <div class="footer__col">
              <?php dynamic_sidebar( 'footer-3' ); ?>
            </div>
          <?php endif; ?>
          <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
            <div class="footer__col">
              <?php dynamic_sidebar( 'footer-4' ); ?>
            </div>
          <?php endif; ?>
        </div>

      </div>
    </div>
    <!-- /.footer__top -->

    <div class="footer__bottom">
      <div class="container">

        <div class="row">
          <div class="col-md-6">
            <?php if (get_field('phone_2', 'option')): ?>
              <div class="footer__phone">
                <a href="tel:<?php echo preg_replace('![^0-9/+]+!', '', get_field('phone_2', 'option')); ?>"><?php the_field('phone_2', 'option'); ?></a>
              </div>
            <?php endif; ?>
            <?php if (get_field('address', 'option')): ?>
              <p class="footer__address"><?php the_field('address', 'option'); ?></p>
            <?php endif; ?>
          </div>
          <div class="col-md-6">
            <?php if (has_nav_menu('social-menu')) {
              wp_nav_menu(
                array(
                  'theme_location' => 'social-menu',
                  'container'      => '',
                  'menu_id'        => '',
                  'menu_class'     => 'social footer__social',
                  'depth'          => 1,
                  'link_before'    => '<span class="screen-reader-text">',
                  'link_after'     => '</span>',
                  'fallback_cb'    => '',
                )
              );
            } ?>
            <p class="copy">&copy; Экспорт Контракт, <?php echo date('Y'); ?></p>
          </div>
        </div>

      </div>
    </div>
    <!-- /.footer__bottom -->

  </footer>

</div><!-- /.wrapper -->

<?php wp_footer(); ?>

</body>
</html>
