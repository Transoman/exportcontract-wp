<?php
// Register Services Categories Taxonomy
function category_services_taxonomy() {

  $labels = array(
    'name'                       => _x( 'Категории', 'Taxonomy General Name', 'ith' ),
    'singular_name'              => _x( 'Категория', 'Taxonomy Singular Name', 'ith' ),
    'menu_name'                  => __( 'Категории', 'ith' ),
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    'rewrite'                    => array(
      'slug' => 'services-category'
    )
  );
  register_taxonomy( 'category_services', array( 'services' ), $args );

}
add_action( 'init', 'category_services_taxonomy', 0 );