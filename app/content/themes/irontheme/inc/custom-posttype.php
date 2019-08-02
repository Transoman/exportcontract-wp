<?php
// Register Services Post Type
function services_post_type() {

  $labels = array(
    'name'                  => _x( 'Услуги', 'Post Type General Name', 'ith' ),
    'singular_name'         => _x( 'Услуга', 'Post Type Singular Name', 'ith' ),
    'menu_name'             => __( 'Услуги', 'ith' ),
    'name_admin_bar'        => __( 'Услуги', 'ith' ),
    'archives'              => __( 'Услуги', 'ith' ),
  );
  $args = array(
    'label'                 => __( 'Услуга', 'ith' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'excerpt' ),
    'taxonomies'            => array( 'category_services' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-list-view',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );
  register_post_type( 'services', $args );

}
add_action( 'init', 'services_post_type', 0 );

// Register FAQ Post Type
function faq_post_type() {

  $labels = array(
    'name'                  => _x( 'FAQS', 'Post Type General Name', 'ith' ),
    'singular_name'         => _x( 'FAQ', 'Post Type Singular Name', 'ith' ),
    'menu_name'             => __( 'FAQ', 'ith' ),
    'name_admin_bar'        => __( 'FAQ', 'ith' ),
    'archives'              => __( 'FAQ', 'ith' ),
  );
  $args = array(
    'label'                 => __( 'FAQ', 'ith' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor' ),
    'hierarchical'          => false,
    'public'                => false,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-format-chat',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );
  register_post_type( 'faq', $args );

}
add_action( 'init', 'faq_post_type', 0 );