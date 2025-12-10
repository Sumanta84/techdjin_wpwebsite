<?php 
  $kipso_options = kipso_get_options(); 
  $url_profile = wp_login_url();
  if(function_exists('learn_press_get_page_link')){
    $url_profile = learn_press_get_page_link( 'profile' );
  }
?>

<div class="header-mobile d-xl-none d-lg-none d-md-block d-sm-block d-xs-block">
  <div class="container">
    <div class="row"> 
     
      <div class="left col-md-3 col-sm-3 col-xs-3">
        <?php get_template_part('templates/parts/canvas-mobile'); ?>
      </div>

      <div class="center text-center col-md-6 col-sm-6 col-xs-6 mobile-logo">
        <div class="logo-menu">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img src="<?php echo ((isset($kipso_options['header_logo_mobile']['url']) && $kipso_options['header_logo_mobile']['url']) ? $kipso_options['header_logo_mobile']['url'] : get_template_directory_uri().'/images/logo-mobile.png'); ?>" alt="<?php bloginfo( 'name' ); ?>" />
          </a>
        </div>
      </div>

      <div class="right col-md-3 col-sm-3 col-xs-3">
        <?php if(kipso_woocommerce_activated()){ ?>
          <div class="mini-cart-header hidden">
            <?php if(kipso_woocommerce_activated()){ ?>
              <?php  kipso_get_cart_contents(); ?>
            <?php } ?>  
          </div>
        <?php } ?>
        
        <div class="gva-user">

         <?php if(is_user_logged_in()){ ?>

            <?php
               $user = wp_get_current_user();
               $args = [
                  'echo'        => false,
                  'theme_location'    => 'my_account',
                  'menu_class'  => 'gva-nav-menu gva-main-menu',
                  'menu_id'     => 'menu-user-mobile',
                  'container'   => 'div',
                  'walker'      => new Kipso_Walker()
               ];
            ?>
       
            <div class="login-account">
               <div class="profile">
                  <div class="avata">
                     <?php echo get_avatar( $user->ID, 64 ); ?>
                  </div>
               </div>  
               <div class="user-account">
                  <?php echo wp_nav_menu($args); ?>
               </div> 
            </div>

         <?php }else{ ?>

            <div class="login-register">
               <a href="<?php echo esc_url($url_profile) ?>"><i class="icon gv-icon-390"></i></a>
            </div>

         <?php } ?>
      </div>

        <div class="main-search gva-search">
          <a class="control-search"><i class="icon fa fa-search"></i></a>
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