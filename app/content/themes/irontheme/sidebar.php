<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mytheme
 */

if ( ! is_active_sidebar( 'sidebar-page' ) ) {
  return;
}
?>

<aside class="sidebar">
  <?php dynamic_sidebar( 'sidebar-page' ); ?>
</aside>
