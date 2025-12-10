<?php
/**
 * $Desc
 *
 * 
 * @package    basetheme
 * @author     gaviasthemes Team     
 * @copyright  Copyright (C) 2016 gaviasthemes. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 * 
 */ 
$kipso_options = kipso_get_options();
$kipso_logo = get_template_directory_uri().'/images/logo-1.png';
if(isset($kipso_options['header_logo']['url']) && $kipso_options['header_logo']['url']){
  $kipso_logo = $kipso_options['header_logo']['url'];
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta http-equiv="content-type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
  <meta name="apple-touch-fullscreen" content="yes"/>
  <meta name="MobileOptimized" content="320"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="profile" href="<?php echo kipso_protocol_html() ?>://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
  <div class="wrapper-page"> <!--page-->
    <?php do_action( 'kipso_before_header' );  ?>
    
    <header class="header-default">
      
      <?php do_action( 'kipso_header_mobile' ); ?>

      <div class="d-none d-xl-block d-lg-block">
        <div class="header-bottom">
          <div class="container">
            <div class="header-bottom-inner">
              
              <div class="logo">
                <a class="logo-theme" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                  <img src="<?php echo esc_url($kipso_logo); ?>" alt="<?php bloginfo( 'name' ); ?>" />
                </a>
              </div>
              
              <div class="main-menu-inner">
                <div class="content-innter clearfix">
                  <div id="gva-mainmenu" class="main-menu">
                    <?php do_action('kipso_main_menu'); ?>
                  </div>
                </div> 
              </div>

              <div class="gsc-search-box">
                <div class="content-inner">
                  <div class="main-search gva-search">
                    <a class="control-search">
                      <span class="icon icon-font"><i class="fa fa-search"></i></span>  
                    </a>
                    <div class="gva-search-content search-content">
                      <div class="search-content-inner">
                        <div class="content-inner"><?php get_search_form(); ?></div>  
                      </div>  
                    </div>
                  </div>
                </div>
             </div>

            </div>
          </div>  
        </div>
      </div> 

    </header>
    <?php do_action( 'kipso_after_header' );  ?>
    
    <div id="page-content"> <!--page content-->