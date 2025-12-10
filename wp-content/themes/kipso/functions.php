<?php
/**
 * $Desc
 *
 * @package    basetheme
 * @author     Gaviasthemes Team     
 * @copyright  Copyright (C) 2019 Gaviasthemess. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 * 
 */

define( 'KIPSO_THEMER_DIR', get_template_directory() );
define( 'KIPSO_THEME_URL', get_template_directory_uri() );

/*
 * Include list of files from Gavias Framework.
 */
require_once(KIPSO_THEMER_DIR . '/includes/theme-functions.php'); 
require_once(KIPSO_THEMER_DIR . '/includes/template.php'); 
require_once(KIPSO_THEMER_DIR . '/includes/theme-hook.php'); 
require_once(KIPSO_THEMER_DIR . '/includes/theme-layout.php'); 
require_once(KIPSO_THEMER_DIR . '/includes/metaboxes.php'); 
require_once(KIPSO_THEMER_DIR . '/includes/custom-styles.php'); 
require_once(KIPSO_THEMER_DIR . '/includes/menu/megamenu.php'); 
require_once(KIPSO_THEMER_DIR . '/includes/sample/init.php');
require_once(KIPSO_THEMER_DIR . '/includes/elementor/hooks.php');
require_once(KIPSO_THEMER_DIR . '/includes/learnpress/hooks.php');

//Load Woocommerce
if( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ){
  add_theme_support( "woocommerce" );
  require_once(KIPSO_THEMER_DIR . '/includes/woocommerce/functions.php'); 
  require_once(KIPSO_THEMER_DIR . '/includes/woocommerce/hooks.php'); 
}

add_action('after_setup_theme', 'oxpitan_after_setup_theme');
function oxpitan_after_setup_theme(){
  // Load Redux - Theme options framework
  if( class_exists( 'Redux' ) ){
    require( KIPSO_THEMER_DIR . '/includes/options/init.php' );
    require_once(KIPSO_THEMER_DIR . '/includes/options/opts-general.php'); 
    require_once(KIPSO_THEMER_DIR . '/includes/options/opts-header.php'); 
    require_once(KIPSO_THEMER_DIR . '/includes/options/opts-breadcrumb.php'); 
    require_once(KIPSO_THEMER_DIR . '/includes/options/opts-footer.php'); 
    require_once(KIPSO_THEMER_DIR . '/includes/options/opts-styling.php'); 
    require_once(KIPSO_THEMER_DIR . '/includes/options/opts-typography.php'); 
    require_once(KIPSO_THEMER_DIR . '/includes/options/opts-blog.php'); 
    require_once(KIPSO_THEMER_DIR . '/includes/options/opts-page.php'); 
    require_once(KIPSO_THEMER_DIR . '/includes/options/opts-woo.php'); 
    require_once(KIPSO_THEMER_DIR . '/includes/options/opts-portfolio.php'); 
    require_once(KIPSO_THEMER_DIR . '/includes/options/opts-service.php'); 
    require_once(KIPSO_THEMER_DIR . '/includes/options/opts-socials.php'); 
  } 

  register_nav_menus( array(
      'primary'      => esc_html__( 'Main menu', 'kipso' ),
    'my_account'   => esc_html__( 'My Account', 'kipso' ),
  ));

}

// TGM plugin activation
if ( is_admin() ) {
  require_once( KIPSO_THEMER_DIR . '/includes/tgmpa/class-tgm-plugin-activation.php' );
  require( KIPSO_THEMER_DIR . '/includes/tgmpa/config.php' );
}
load_theme_textdomain( 'kipso', get_template_directory() . '/languages' );

//-------- Register sidebar default in theme -----------
//------------------------------------------------------
function kipso_widgets_init() {
    
    register_sidebar( array(
        'name' => esc_html__( 'Default Sidebar', 'kipso' ),
        'id' => 'default_sidebar',
        'description' => esc_html__( 'Appears in the Default Sidebar section of the site.', 'kipso' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Plugin| WooCommerce Sidebar', 'kipso' ),
        'id' => 'woocommerce_sidebar',
        'description' => esc_html__( 'Appears in the Plugin WooCommerce section of the site.', 'kipso' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Plugin| WooCommerce Single', 'kipso' ),
        'id' => 'woocommerce_single_summary',
        'description' => esc_html__( 'Appears in the WooCommerce Single Page like social, description text ...', 'kipso' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Portfolio Sidebar', 'kipso' ),
        'id' => 'portfolio_sidebar',
        'description' => esc_html__( 'Appears in the Portfolio Page section of the site.', 'kipso' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'After Offcanvas Mobile', 'kipso' ),
        'id' => 'offcanvas_sidebar_mobile',
        'description' => esc_html__( 'Appears in the Offcanvas section of the site.', 'kipso' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Service Sidebar', 'kipso' ),
        'id' => 'service_sidebar',
        'description' => esc_html__( 'Appears in the Sidebar section of the Service Page.', 'kipso' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Blog Sidebar', 'kipso' ),
        'id' => 'blog_sidebar',
        'description' => esc_html__( 'Appears in the Blog sidebar section of the site.', 'kipso' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Course Sidebar', 'kipso' ),
        'id' => 'course_sidebar',
        'description' => esc_html__( 'Appears in the Course sidebar section of the site.', 'kipso' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Page Sidebar', 'kipso' ),
        'id' => 'other_sidebar',
        'description' => esc_html__( 'Appears in the Page Sidebar section of the site.', 'kipso' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Footer first', 'kipso' ),
        'id' => 'footer-sidebar-1',
        'description' => esc_html__( 'Appears in the Footer first section of the site.', 'kipso' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Footer second', 'kipso' ),
        'id' => 'footer-sidebar-2',
        'description' => esc_html__( 'Appears in the Footer second section of the site.', 'kipso' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Footer third', 'kipso' ),
        'id' => 'footer-sidebar-3',
        'description' => esc_html__( 'Appears in the Footer third section of the site.', 'kipso' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Footer four', 'kipso' ),
        'id' => 'footer-sidebar-4',
        'description' => esc_html__( 'Appears in the Footer four section of the site.', 'kipso' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
}
add_action( 'widgets_init', 'kipso_widgets_init' );


if ( ! function_exists( 'kipso_fonts_url' ) ) :
/**
 *
 * @return string Google fonts URL for the theme.
 */
function kipso_fonts_url() {
  $fonts_url = '';
  $fonts     = array();
  $subsets   = '';
  /*
   * Translators: If there are characters in your language that are not supported
   * by Noto Sans, translate this to 'off'. Do not translate into your own language.
   */
  if ( 'off' !== _x( 'on', 'Satisfy font: on or off', 'kipso' ) ) {
    $fonts[] = 'Satisfy';
  }

   if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'kipso' ) ) {
    $fonts[] = 'Poppins:400,500,600,700';
  }
  
  /*
   * Translators: To add an additional character subset specific to your language,
   * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
   */
  $subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'kipso' );

  if ( 'cyrillic' == $subset ) {
    $subsets .= ',cyrillic,cyrillic-ext';
  } elseif ( 'greek' == $subset ) {
    $subsets .= ',greek,greek-ext';
  } elseif ( 'devanagari' == $subset ) {
    $subsets .= ',devanagari';
  } elseif ( 'vietnamese' == $subset ) {
    $subsets .= ',vietnamese';
  }

  if ( $fonts ) {
    $fonts_url = add_query_arg( array(
      'family' => ( implode( '%7C', $fonts ) ),
      'subset' => ( $subsets ),
    ),  kipso_protocol_html() . '://fonts.googleapis.com/css' );
  }

  return $fonts_url;
}
endif;

function kipso_custom_styles() {
  $custom_css = get_option( 'kipso_theme_custom_styles' );
  if($custom_css){
    wp_enqueue_style(
      'kipso-custom-style',
      get_template_directory_uri() . '/css/custom_script.css'
    );
    wp_add_inline_style( 'kipso-custom-style', $custom_css );
  }
}
function kipso_custom_styles_scheme_color() {
  $colors = kipso_get_option('scheme_color');
  if(!$colors) $colors = array('Indigo[#4F6FBE]', 'MediumPurple[#9764DF]', 'LightningYellow[#F9BC18]', 'PuertoRico[#9238A4]', 'Salmon[#FF8B6F]', 'PictonBlue[#3CCBF3]', 'Green[#50AF4D]', 'Purple[#9854B3]');
  $css = '';
  foreach ($colors as $color_tmp) { //foreach
    $title = $color = '';
    $tmp = explode('[', $color_tmp);
    $title = isset($tmp[0]) ? $tmp[0] : ''; 
    $color = isset($tmp[1]) ? str_replace(']', '', $tmp[1]) : ''; 
    if(!empty($title) && !empty($color)){ //if
      $selector = '.' . str_replace('-', ' ', strtolower($title));
      $css .= ".course-block {$selector}.cat-course-link{background:{$color}!important;}";
      $css .= ".course-block-2 {$selector}.cat-course-link{background:{$color}!important;}";
      $css .= ".single-course-content .content-top .course-category {$selector}.cat-course-link{background:{$color}!important;}";

    }//endif
  } //endforeach
  if($css){
    wp_enqueue_style(
      'kipso-scheme-color',
      get_template_directory_uri() . '/css/custom_script.css'
    );
    wp_add_inline_style( 'kipso-scheme-color', $css );
  }
}
add_action( 'wp_enqueue_scripts', 'kipso_custom_styles_scheme_color', 9999 );
function kipso_init_scripts(){
  global $post;
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
    wp_enqueue_script( 'comment-reply' );
  }

  //kipso fonts
  wp_enqueue_style( 'kipso-fonts', kipso_fonts_url(), array(), null );
  //bootstrap
  wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.js', array('jquery') );
  //scrollbar
  wp_enqueue_script('jquery-perfect-scrollbar', get_template_directory_uri() . '/js/jquery.perfect-scrollbar.js');
  //magnific popup
  wp_enqueue_script('jquery-magnific-popup', get_template_directory_uri() .'/js/magnific/jquery.magnific-popup.js');
  //cookie
  wp_enqueue_script('jquery-cookie', get_template_directory_uri() . '/js/jquery.cookie.js', array('jquery'));
  //lightgallery
  wp_enqueue_script('lightgallery', get_template_directory_uri() . '/js/lightgallery/js/lightgallery.js' );
  //owl carousel
  wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl-carousel/owl.carousel.min.js');
  //kipso sticky
  wp_enqueue_script('kipso-sticky', get_template_directory_uri() . '/js/sticky.js', array('elementor-waypoints'));
  //kipso main
  wp_enqueue_script('kipso-main', get_template_directory_uri() . '/js/main.js', array('imagesloaded', 'jquery-masonry'));
  //kipso woocommerce
  wp_enqueue_script('kipso-woocommerce', get_template_directory_uri() . '/js/woocommerce.js');

  if(kipso_woocommerce_activated() ){
    wp_dequeue_script('wc-add-to-cart');
    wp_register_script( 'wc-add-to-cart', KIPSO_THEME_URL . '/js/wc-add-to-cart.js' , array( 'jquery' ) );
    wp_enqueue_script('wc-add-to-cart');
  }

  wp_enqueue_style('lightgallery', get_template_directory_uri() . '/js/lightgallery/css/lightgallery.min.css');
  wp_enqueue_style('lg-transitions', get_template_directory_uri() . '/js/lightgallery/css/lg-transitions.min.css');
  wp_enqueue_style('owl-carousel', get_template_directory_uri() .'/js/owl-carousel/assets/owl.carousel.css');
  wp_enqueue_style('magnific-popup', get_template_directory_uri() .'/js/magnific/magnific-popup.css');
  wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/fontawesome/css/all.min.css');
  wp_enqueue_style('kipso-icon-custom', get_template_directory_uri() . '/css/icon-custom.css');
  wp_enqueue_style('kipso-style', get_stylesheet_uri());

  $skin = kipso_get_option('skin_color', '');
  if(isset($_GET['gskin']) && $_GET['gskin']){
      $skin = $_GET['gskin'];
  }
  if(!empty($skin)){
      $skin = 'skins/' . $skin . '/'; 
  }
  wp_enqueue_style('bootstrap', get_template_directory_uri(). '/css/' . $skin . 'bootstrap.css', array(), '1.0.5' , 'all'); 
  wp_enqueue_style('kipso-woocoomerce', get_template_directory_uri(). '/css/' . $skin . 'woocommerce.css', array(), '1.0.5' , 'all'); 
  wp_enqueue_style('kipso-template', get_template_directory_uri().'/css/' . $skin . 'template.css', array(), '1.0.5' , 'all');
}
add_action('wp_enqueue_scripts', 'kipso_init_scripts', 99);

function kipso_learnpress_template(){
  return 'kipso';
}

add_filter('learn-press/override-templates', 'kipso_learnpress_template');