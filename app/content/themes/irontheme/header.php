<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="format-detection" content="telephone=no">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script>
  <![endif]-->
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="wrapper">
  <header class="header">

      <div class="header__top">
        <div class="container">

          <a href="<?php echo home_url('/'); ?>" class="logo header__logo">
            <img src="<?php echo THEME_URL; ?>/images/content/logo.svg" width="200" alt="Экспорт Контракт" class="logo__icon">
          </a>

          <div class="location header__location">
            <div class="location__head">
              <?php ith_the_icon('location', 'location__icon'); ?>
              <a href="#" class="location__title">Москва и МО</a>
            </div>
          </div>

          <div class="header__partner">
            <a href="http://www.exiar.ru/" class="header__partner-item header__partner-item--eksar" target="_blank">ЭКСАР</a>
            <a href="http://eximbank.ru/" class="header__partner-item header__partner-item--eximbank" target="_blank">РОСЭКСИМБАНК</a>
          </div>

          <div class="phone header__phone">
            <?php if (get_field('phone_2', 'option')): ?>
              <a href="tel:<?php echo preg_replace('![^0-9/+]+!', '', get_field('phone_2', 'option'))?>" class="phone__tel">
                <?php ith_the_icon('phone', 'phone__icon'); ?>
                <span class="phone__text"><?php the_field('phone_2', 'option'); ?></span>
              </a>
            <?php endif; ?>
            <a href="#" class="btn btn--blue phone__callback">Обратный звонок</a>
          </div>

        </div>
      </div>
      <!-- /.header__top -->

      <div class="header__bottom">
        <div class="container">

          <a href="<?php echo home_url('/'); ?>" class="logo header__logo">
            <img src="<?php echo THEME_URL; ?>/images/content/logo.svg" width="200" alt="Экспорт Контракт" class="logo__icon">
          </a>

          <nav class="nav header__nav">
            <?php
            wp_nav_menu( array(
              'theme_location' => 'primary',
              'menu'            => '',
              'container'       => '',
              'container_class' => '',
              'container_id'    => '',
              'menu_class'      => 'nav-list',
              'menu_id'         => '',
            ) );
            ?>
          </nav>

          <div class="nav-overlay"></div>

          <div class="location header__location">
            <div class="location__head">
              <?php ith_the_icon('location', 'location__icon'); ?>
              <a href="#" class="location__title">Москва и МО</a>
            </div>
          </div>

          <button type="button" class="nav-toggle">
            <span class="nav-toggle__line"></span>
          </button>

        </div>
      </div>
      <!-- /.header__bottom -->

  </header><!-- /.header-->

  <div class="content">