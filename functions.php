<?php

function add_theme_scripts() {
  wp_enqueue_style( 'style', get_stylesheet_uri(),'style.css' ); 
  wp_enqueue_style( 'indexcss', get_template_directory_uri() . '/css/index.css', array(), '1.1', 'all');
  wp_enqueue_style( 'maincss', get_template_directory_uri() . '/css/main.css', array(), '1.1', 'all');
  wp_enqueue_style( 'bootstrapcss', get_template_directory_uri() . '/vendor/bootstrap/bootstrap.min.css', array(), '1.1.3', 'all');
  wp_enqueue_style( 'selectcss', get_template_directory_uri() . '/vendor/niceselect/nice-select.min.css', array(), '1.1', 'all');
  wp_enqueue_style( 'slickcss', get_template_directory_uri() . '/vendor/slickslider/slick.min.css', array(), '1.1', 'all');
  wp_enqueue_style( 'venoboxcss', get_template_directory_uri() . '/vendor/venobox/venobox.min.css', array(), '1.1', 'all');
  wp_enqueue_style( 'fontawesomecss', get_template_directory_uri() . '/fonts/fontawesome/fontawesome.min.css', array(), '1.1', 'all');
  wp_enqueue_style( 'icofontcss', get_template_directory_uri() . '/fonts/icofont/icofont.min.css', array(), '1.1', 'all');
  wp_enqueue_style( 'flaticoncss', get_template_directory_uri() . '/fonts/flaticon/flaticon.css', array(), '1.1', 'all');
  wp_enqueue_style( 'detailscss', get_template_directory_uri() . '/css/product-details.css', array(), '1.1', 'all');


 
 // js inclde
  wp_enqueue_script( 'jquerys', get_template_directory_uri() . '/vendor/bootstrap/jquery-1.12.4.min.js', array ( 'jquery' ), 1.1, true);
  wp_enqueue_script( 'popper', get_template_directory_uri() . '/vendor/bootstrap/popper.min.js', array ( 'jquery' ), 1.1, true);
  wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/vendor/bootstrap/bootstrap.min.js', array ( 'jquery' ), 1.1, true);
  wp_enqueue_script( 'countdownjxs', get_template_directory_uri() . '/vendor/countdown/countdown.min.js', array ( 'jquery' ), 1.1, true);
  wp_enqueue_script( 'selectjs', get_template_directory_uri() . '/vendor/niceselect/nice-select.min.js', array ( 'jquery' ), 1.1, true);
  wp_enqueue_script( 'slickjss', get_template_directory_uri() . '/vendor/slickslider/slick.min.js', array ( 'jquery' ), 1.1, true);
  wp_enqueue_script( 'venobsoxjs', get_template_directory_uri() . '/vendor/venobox/venobox.min.js', array ( 'jquery' ), 1.1, true);
  wp_enqueue_script( 'selectxjs', get_template_directory_uri() . '/js/nice-select.js', array ( 'jquery' ), 1.1, true);
  wp_enqueue_script( 'countdownjss', get_template_directory_uri() . '/js/countdown.js', array ( 'jquery' ), 1.1, true);
  wp_enqueue_script( 'accordionjs', get_template_directory_uri() . '/js/accordion.js', array ( 'jquery' ), 1.1, true);
  wp_enqueue_script( 'venoboxjs', get_template_directory_uri() . '/js/venobox.js', array ( 'jquery' ), 1.1, true);
  wp_enqueue_script( 'vslickjs', get_template_directory_uri() . '/js/slick.js', array ( 'jquery' ), 1.1, true);
  wp_enqueue_script( 'mainjs', get_template_directory_uri() . '/js/main.js', array ( 'jquery' ), 1.1, true);
  
 
    
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

/*Post featured image showing in datatable function start here*/
add_image_size( 'crunchify-admin-post-featured-image', 120, 120, false );
// Add the posts and pages columns filter. They can both use the same function.
add_filter('manage_posts_columns', 'crunchify_add_post_admin_thumbnail_column', 2);
add_filter('manage_pages_columns', 'crunchify_add_post_admin_thumbnail_column', 2);
// Add the column
function crunchify_add_post_admin_thumbnail_column($crunchify_columns){
    $crunchify_columns['crunchify_thumb'] = __('Featured Image');
    return $crunchify_columns;
}
// Let's manage Post and Page Admin Panel Columns
add_action('manage_posts_custom_column', 'crunchify_show_post_thumbnail_column', 5, 2);
add_action('manage_pages_custom_column', 'crunchify_show_post_thumbnail_column', 5, 2);
// Here we are grabbing featured-thumbnail size post thumbnail and displaying it
function crunchify_show_post_thumbnail_column($crunchify_columns, $crunchify_id){
    switch($crunchify_columns){
        case 'crunchify_thumb':
        if( function_exists('the_post_thumbnail') )
            echo the_post_thumbnail( 'crunchify-admin-post-featured-image' );
        else
            echo 'hmm... your theme doesn\'t support featured image...';
        break;
    }
}


// Changing excerpt length
function new_excerpt_length($length) {
return 90;
}
add_filter('excerpt_length', 'new_excerpt_length');
 
// Changing excerpt more
function new_excerpt_more($more) {
return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');
add_theme_support( 'post-thumbnails');
// function wporg_custom_post_type() {
//   register_post_type('wporg_product',
//     array(
//       'labels'      => array(
//         'name'          => __('Products', 'textdomain'),
//         'singular_name' => __('Product', 'textdomain'),
//       ),
//         'public'      => true,
//         'has_archive' => true,
//     )
//   );
// }
// add_action('init', 'wporg_custom_post_type');

// Wocommerce suporting 
add_theme_support( 'woocommerce');
function mytheme_add_woocommerce_support() {
  add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

function mytheme_add_woocommerce_support_dj() {
  add_theme_support( 'woocommerce', array(
    'thumbnail_image_width' => 150,
    'single_image_width'    => 300,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
  ) );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support_dj' );
add_theme_support( 'post-thumbnails' );


// remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
// remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);


