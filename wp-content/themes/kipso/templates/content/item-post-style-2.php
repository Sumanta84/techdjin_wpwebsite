<?php 
   $item_classes = 'all ';
   $separator = ' ';
   $item_cats = get_the_terms( get_the_ID(), 'category' );
   if(!empty($item_cats) && !is_wp_error($item_cats)){
      foreach((array)$item_cats as $item_cat){
         $item_classes .= $item_cat->slug . ' ';
      }
   }
   $thumbnail = 'post-thumbnail';
   if(isset($thumbnail_size) && $thumbnail_size){
      $thumbnail = $thumbnail_size;
   }

   if(!isset($excerpt_words)){
      $excerpt_words = kipso_get_option('blog_excerpt_limit', 20);
   }
   if($layout == 'grid'){
      $item_classes .= ' item-columns';
   }
?>

<div class="<?php echo esc_attr($item_classes) ?>">
   <article id="post-<?php echo esc_attr(get_the_ID()); ?>" <?php post_class('post-style-2'); ?>>
      <div class="post-thumbnail">
         <?php the_post_thumbnail( $thumbnail, array( 'alt' => get_the_title() ) ); ?>
         <?php 
            printf( '<span class="entry-date"><span class="day">%1$s</span><span class="month">%2$s</span></span>',
               esc_html( get_the_date( 'd' ) ),
               esc_html( get_the_date( 'M' ) )
            );
         ?>
      </div>   
      <div class="entry-content">
         <div class="content-inner">
            <div class="post-author"><span><?php echo esc_html__('By ', 'kipso') ?></span><?php echo get_the_author() ?></div>
            <h2 class="entry-title"><a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php the_title() ?></a></h2>
         </div>
      </div>
   </article>   
</div>

  