<?php 
  get_header(); 
?>
<section id="wp-main-content" class="clearfix main-page">
  <?php do_action( 'kipso_before_page_content' ); ?>
  <div class="container">  
    <div class="main-page-content row">
      <!-- Main content -->
      <div class="content-page col-12">
        <div id="gallery-single" class="clearfix">      
          <?php while ( have_posts() ) : the_post(); ?>
            <?php $gallery = get_post_meta(get_the_ID(), 'kipso_gallery_images', false ); ?>
            <div class="init-carousel-owl-theme owl-carousel" data-items="1" data-items_lg="1" data-items_md="1" data-items_sm="1" data-items_xs="1" data-loop="1" data-speed="800" data-auto_play="1" data-auto_play_speed="800" data-auto_play_timeout="6000" data-auto_play_hover="1" data-navigation="1" data-pagination="1" data-mouse_drag="1" data-touch_drag="1">
              <?php foreach ($gallery as $image) { 
                $img = wp_get_attachment_image_src($image, 'full');
                $img_thumb = wp_get_attachment_image_src($image, 'thumbnail');
              ?>
              <div class="item-gallery">
                <img src="<?php echo esc_url($img[0]) ?>" />
              </div>
              <?php } ?>
            </div>
          <?php endwhile; ?> 
        </div>  
      </div>      
    </div>   
    
  <?php do_action( 'kipso_after_page_content' ); ?>
</section>

<?php get_footer(); ?>