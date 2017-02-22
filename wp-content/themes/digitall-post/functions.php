<?php
define("THEME_URL", get_stylesheet_directory_uri());
define("CATEGORY_EXPLAINERS", 21);

/**
 * Enqueue scripts and styles
 */
function digitall_post_scripts() {

		/* CSS */
    wp_enqueue_style( 'digitall-post.vendor', THEME_URL . '/styles/vendor.css' );
		wp_enqueue_style( 'digitall-post.fonts', 'https://fonts.googleapis.com/css?family=Oswald:300,400,700|Roboto:300,300i,400,400i,700,700i,900' );
    wp_enqueue_style( 'digitall-post.main', THEME_URL . '/styles/main.css' );
		
		/* End CSS */

		/* Scripts */

    wp_enqueue_script( 'modernizr', THEME_URL . '/scripts/vendor/modernizr.js');

    wp_enqueue_script( 'digitall-post.vendor', THEME_URL . '/scripts/vendor.js', array(), '3.1.1', true);

    wp_enqueue_script( 'digitall-post.main', THEME_URL . '/scripts/main.js', array(), '1.0', true);

    wp_enqueue_script( 'digitall-post.custom', THEME_URL . '/js/digitall.js', array('jquery'), '1.0', false );

    wp_localize_script( 'digitall-post.custom', 'dpostGlobal', array(
            'ajaxurl' => admin_url( 'admin-ajax.php' )
        ));

		/* Scripts */

}
add_action( 'wp_enqueue_scripts', 'digitall_post_scripts' );

function digitall_post_theme_setup() {
    add_theme_support( 'post-thumbnails' );
    add_image_size( '1047x680', 1047, 680, true );
    add_image_size( '1045x697', 1045, 697, true );
    add_image_size( '1045x482', 1045, 482, true );
    add_image_size( '960x640', 960, 640, true );
    add_image_size( '629x419', 629, 419, true );
    add_image_size( '450x300', 450, 300, true );
    add_image_size( '351x215', 351, 215, true );
    add_image_size( '300x504', 300, 504, true );
    add_image_size( '300x200', 300, 200, true );
    add_image_size( '296x200', 296, 200, true );
    add_image_size( 'author_thumb', 80, 80, true );
    
}
add_action( 'after_setup_theme', 'digitall_post_theme_setup' );

// Register Menu
function digitall_post_register_menu() {
  register_nav_menu( 'digitall_post_menu', 'Menu' );
  register_nav_menu( 'digitall_post_mobile_menu', 'Mobile Menu' );
  register_nav_menu( 'digitall_post_mobile_headline_menu', 'Mobile Headline Menu' );
  register_nav_menu( 'digitall_post_footer_menu', 'Footer Menu' );
}
add_action( 'init', 'digitall_post_register_menu' );

function digitall_post_init_post_types() {
    
    $authorLabels = array(
        'name' => 'Autores',
        'singular_name' => 'Autor',
        'add_new' => 'Agregar nuevo',
        'add_new_item' => 'Agregar nuevo',
        'edit_item' => 'Editar',
        'new_item' => 'Nuevo',
        'view_item' => 'Ver',
        'search_items' => 'Buscar',
        'not_found' =>  'No se han encontrado autores',
        'not_found_in_trash' => 'No se han encontrado autores',
        'parent_item_colon' => ''
    );
 
    $authorArgs = array( 'labels' => $authorLabels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon' => 'dashicons-awards',
        'supports' => array('thumbnail', 'title', 'editor')
    );
    register_post_type( 'author', $authorArgs );

}
add_action( 'init', 'digitall_post_init_post_types' );

/**
 * Register our sidebars and widgetized areas.
 *
 */
function digitall_post_init_sidebars() {

    register_sidebar( array(
        'name'          => 'Single Sidebar',
        'id'            => 'digitall_post_single_sidebar',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="cat_name">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => 'Home Banner',
        'id'            => 'digitall_home_banner_sidebar',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => 'Section banner',
        'id'            => 'digitall_section_banner_sidebar',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

}
add_action( 'widgets_init', 'digitall_post_init_sidebars' );

function digitall_ajax_search() {
 
    $args = array(
        'post_type' => array( 'post'),
        'post_status' => 'publish',
        'order' => 'DESC',
        'orderby' => 'date',
        's' => $_POST['term'],
        'posts_per_page' => 5
    );
     
    $query = new WP_Query( $args );
     
    // display results
    include 'template-parts/search/search-results.php';

    die();
}

add_action('wp_ajax_digitall_ajax_search', 'digitall_ajax_search');
add_action('wp_ajax_nopriv_digitall_ajax_search', 'digitall_ajax_search');

class Digitall_Post_Walker_Main_Nav_Menu extends Walker_Nav_Menu {
  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"submenu\">\n";
  }
}

function kxn_get_acf_image($imageObject, $size = '', $class=''){
    if ( $imageObject && is_array($imageObject) ){

        if (!empty($size)){

            // vars
            $url = $imageObject['url'];
            $alt = $imageObject['alt'];

            // thumbnail
            $thumb = $imageObject['sizes'][ $size ];
            $width = $imageObject['sizes'][ $size . '-width' ];
            $height = $imageObject['sizes'][ $size . '-height' ];

            $class = (!empty($class))?"class='".$class."'":'';

            $imageTag = '<img src="'.$thumb.'" alt="'.$alt.'" width="'.$width.'" height="'.$height.'" '.$class.' />';

            return $imageTag;
        }
    }
    return '';
}

function kxn_get_acf_image_src($imageObject, $size = ''){
    if ($imageObject){
        if (!empty($size)){
            // vars
            $url = $imageObject['url'];

            // img src
            $imgSrc = $imageObject['sizes'][ $size ];

            return $imgSrc;
        }
    }
    return '';
}

function kxn_get_the_category_link(){
    global $post;
    $categories = get_the_category();
    if ( ! empty( $categories ) ) {
        echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
    }
}

function kxn_get_post_category( $excludeCatId = false ){
    global $post;
    $categories = get_the_category();
    if ( ! empty( $categories ) ) {
        foreach ($categories as $category){
            if ( $excludeCatId != $category->term_id )
                return $category;
        }
        
    }
    return null;
}

function kxn_get_category_link($termId){
    return esc_url( get_category_link( $termId ) );
}

function kxn_get_tag_links()
{
    global $post;
    $tagLinks = array();
    $tags = get_the_tags();
    if ($tags){
        foreach ( $tags as $tag )
        {
            $tagLink = get_tag_link($tag->term_id);
            $tagLinks[] = '<a href="'.$tagLink.'">'.$tag->name.'</a>';
        }
    }
    return $tagLinks;
}

function kxn_post_is_video($post = null)
{
    if ( ! $post = get_post( $post ) )
        return false;

    $categories = get_the_category($post->ID);
    if ($categories){
        foreach ( $categories as $term ){
            if ( get_field('acf_is_video', $term) ){
                return true;
            }
        }
    }
    return false;
}
/**
 * Generates an a tag with the name of the first category of
 * a given post, and a link to category's page.
 *
 * @param $post_id
 * @return string
 */
function kxn_get_first_category_link( $post_id ) {
    $category       = get_the_category( $post_id );

    if( !$category ) return '';

    $category_link  = get_category_link( $category[0]->term_id );
    $category_name  = $category[0]->cat_name;
    $link_tag       = '<a href="%s" class="cat-title" title="%s">%s</a>';
    $link_tag       = sprintf( $link_tag, $category_link, $category_name, $category_name );

    return $link_tag;
}

function kxn_the_time_diff(){
    global $post;
    printf( _x( '%s ago', '%s = human-readable time difference', 'your-text-domain' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) );
}

function more_posts() {
  global $wp_query;
  return $wp_query->current_post + 1 < $wp_query->post_count;
}

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page();
    
    acf_add_options_sub_page('General');
    
}

require get_parent_theme_file_path( '/inc/kxn-sync.php' );