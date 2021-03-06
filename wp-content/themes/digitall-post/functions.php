<?php

define("THEME_URL", get_stylesheet_directory_uri());
define("CATEGORY_EXPLAINERS", 21);

/**
 * Enqueue scripts and styles
 */
function digitall_post_scripts() {

		/* CSS */
 //    wp_enqueue_style( 'digitall-post.vendor', THEME_URL . '/styles/vendor.css' );

	wp_enqueue_style( 'digitall-post.fonts', 'https://fonts.googleapis.com/css?family=Oswald:300,400,700|Roboto:300,300i,400,400i,700,700i,900' );

 //    wp_enqueue_style( 'digitall-post.main', THEME_URL . '/styles/main.css' );

 //    wp_enqueue_style( 'digitall-theme-style', THEME_URL . '/css/styles.css' );

    /*wp_dequeue_style('ajax-load-more');
    wp_deregister_style('ajax-load-more');

    wp_dequeue_style('contact-form-7');
    wp_deregister_style('contact-form-7');

    wp_dequeue_style('ssbp_styles');
    wp_deregister_style('ssbp_styles');*/

    
    
		
		/* End CSS */

		/* Scripts */

    wp_enqueue_script( 'modernizr', THEME_URL . '/scripts/vendor/modernizr.js');

    wp_enqueue_script( 'digitall-post.vendor', THEME_URL . '/scripts/vendor.js', array(), '3.1.1', true);

    wp_enqueue_script( 'fluidvids', THEME_URL . '/lib/fluidvids/fluidvids.min.js', array(), '2.4.1');

    wp_enqueue_script( 'digitall-post.main', THEME_URL . '/scripts/main.js', array(), '1.0', true);

    wp_enqueue_script( 'digitall-post.custom', THEME_URL . '/js/digitall.js', array('jquery'), '1.0', true );

    wp_enqueue_script( 'jquery.dfp', THEME_URL . '/lib/jquery.dfp/jquery.dfp.min.js', array(), '2.4.2');

    wp_localize_script( 'digitall-post.custom', 'dpostGlobal', array(
            'ajaxurl' => admin_url( 'admin-ajax.php' )
        ));

		/* Scripts */

}
add_action( 'wp_enqueue_scripts', 'digitall_post_scripts' );

function digitall_custom_styles(){
    $vendorCss = file_get_contents( THEME_URL . '/styles/vendor.css');
    $mainCss = file_get_contents( THEME_URL . '/styles/main.css');
    $stylesCss = file_get_contents( THEME_URL . '/css/styles.css');
?>
    <style>
    <?= $vendorCss; ?>
    <?= $mainCss; ?>
    <?= $stylesCss; ?>
    </style>
<?php
}
add_action('wp_head', 'digitall_custom_styles', 100);

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
        'name'          => 'Home Banner 1',
        'id'            => 'digitall_home_banner_1',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );


    register_sidebar( array(
        'name'          => 'Home Banner 2',
        'id'            => 'digitall_home_banner_2',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => 'Home Banner 3',
        'id'            => 'digitall_home_banner_3',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => 'Home Banner 4',
        'id'            => 'digitall_home_banner_4',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => 'Home Banner 5',
        'id'            => 'digitall_home_banner_5',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => 'Home Mobile Banner 1',
        'id'            => 'digitall_home_mobile_banner_1',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => 'Home Mobile Banner 2',
        'id'            => 'digitall_home_mobile_banner_2',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => 'Home Mobile Banner 3',
        'id'            => 'digitall_home_mobile_banner_3',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => 'Section banner 1',
        'id'            => 'digitall_section_banner_1',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => 'Section banner 2',
        'id'            => 'digitall_section_banner_2',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => 'Section Mobile banner 1',
        'id'            => 'digitall_section_mobile_banner_1',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => 'Section Mobile banner 2',
        'id'            => 'digitall_section_mobile_banner_2',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => 'Post banner top',
        'id'            => 'digitall_single_top',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => 'Post banner bottom',
        'id'            => 'digitall_single_bottom',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => 'Post Mobile Banner 1',
        'id'            => 'digitall_post_mobile_banner_1',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => 'Post Mobile Banner 2',
        'id'            => 'digitall_post_mobile_banner_2',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => 'Last news banner',
        'id'            => 'digitall_last_news_banner',
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

class Digitall_Post_Walker_Main_Mobile_Menu extends Walker_Nav_Menu {
  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"sub-menu\">\n";
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


//Insert ads after second paragraph of single post content.

// add_filter( 'the_content', 'digitall_insert_post_ads' );

function digitall_insert_post_ads( $content ) {
    
    $ad_code = '<div class="banner_holder banner-mobile"> <div id="div-gpt-ad-1489939940283-9" style="height:250px; width:300px;"><script>googletag.cmd.push(function() { googletag.display("div-gpt-ad-1489939940283-9"); });</script></div></div>';

    if ( is_single() && ! is_admin() ) {
        return digitall_insert_after_paragraph( $ad_code, 2, $content );
    }
    
    return $content;
}
 
// Parent Function that makes the magic happen
 
function digitall_insert_after_paragraph( $insertion, $paragraph_id, $content ) {
    $closing_p = '</p>';
    $paragraphs = explode( $closing_p, $content );
    foreach ($paragraphs as $index => $paragraph) {

        if ( trim( $paragraph ) ) {
            $paragraphs[$index] .= $closing_p;
        }

        if ( $paragraph_id == $index + 1 ) {
            $paragraphs[$index] .= $insertion;
        }
    }
    
    return implode( '', $paragraphs );
}

function rel_shortcode( $atts, $content = null ) {
    return '<div class="rel-txt">' . $content . '</div>';
}
add_shortcode( 'rel', 'rel_shortcode' );

function excerpt_shortcode( $atts, $content = null ) {
    return '<div class="excerpt">' . $content . '</div>';
}
add_shortcode( 'excerpt', 'excerpt_shortcode' );

function displayInReadTag(){

    if ( is_single() || ( is_page() && ( !is_page_template('template-contact.php') && !is_page_template('template-explainer.php') && !is_page_template('template-section.php') && !is_page_template('template-home.php') ) ) ){
        return true;
    }
    return false;
}

function displayInBoardTag(){

    if ( is_category() || is_front_page() || ( is_page() && is_page_template('template-section.php') ) ){
        return true;
    }
    return false;
}

function dfpScript() {
?>
<script type="text/javascript">
    jQuery('.adunit').dfp({
        dfpID: '158800740',
        sizeMapping: {
            'desktop-970x250' : [
                {browser: [1024, 0], ad_sizes: [ [970, 250] ]}
            ],
            'desktop-970x90' : [
                {browser: [1024, 0], ad_sizes: [ [970, 90] ]}
            ],
            'desktop': [
                {browser: [1024, 0], ad_sizes: [[970, 250], [728, 90]]},
                {browser: [   0,   0], ad_sizes: []}
            ],
            'sidebar': [
                {browser: [1024, 0], ad_sizes: [[300, 600], [300, 250]]},
                {browser: [   0,   0], ad_sizes: []}
            ],
            'mobile': [
                {browser: [1024, 0], ad_sizes: []},
                {browser: [   0,   0], ad_sizes: [[300, 250], [300, 50]]}
            ]
        }
    });

</script>
<?php
}
add_action( 'wp_footer', 'dfpScript' );

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page();
    
    acf_add_options_sub_page('General');
    
}

require get_parent_theme_file_path( '/inc/kxn-sync.php' );

// Advanced Custom Fields Config
// include_once "acf-config.php";