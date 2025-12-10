<?php
/**
 * Template for displaying tab nav of single course.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/single-course/tabs/tabs.php.
 *
 * @author   ThimPress
 * @package  Learnpress/Templates
 * @version  4.0.1
 */

defined( 'ABSPATH' ) || exit();

$tabs = learn_press_get_course_tabs();

if ( empty( $tabs ) ) {
	return;
}

$active_tab = learn_press_cookie_get( 'course-tab' );

if ( ! $active_tab ) {
	$tab_keys   = array_keys( $tabs );
	$active_tab = reset( $tab_keys );
}

// Show status course
$lp_user = learn_press_get_current_user();

if ( $lp_user && ! $lp_user instanceof LP_User_Guest ) {
	$can_view_course = $lp_user->can_view_content_course( get_the_ID() );

	if ( ! $can_view_course->flag ) {
		if ( LP_BLOCK_COURSE_FINISHED === $can_view_course->key ) {
			learn_press_display_message(
				esc_html__( 'You finished this course. This course has been blocked', 'kipso' ),
				'warning'
			);
		} elseif ( LP_BLOCK_COURSE_DURATION_EXPIRE === $can_view_course->key ) {
			learn_press_display_message(
				esc_html__( 'This course has been blocked reason by expire', 'kipso' ),
				'warning'
			);
		}
	}
}
?>

<div id="learn-press-course-tabs" class="course-tabs tabs-v1">
	<?php foreach ( $tabs as $key => $tab ) : ?>
		<input type="radio" name="learn-press-course-tab-radio" id="tab-<?php echo $key; ?>-input"
			<?php checked( $active_tab === $key ); ?> value="<?php echo $key; ?>"/>
	<?php endforeach; ?>

	<ul class="learn-press-nav-tabs course-nav-tabs" data-tabs="<?php echo count( $tabs ); ?>">
		<?php foreach ( $tabs as $key => $tab ) : ?>
			<?php
			$classes = array( 'course-nav course-nav-tab-' . esc_attr( $key ) );

			if ( $active_tab === $key ) {
				$classes[] = 'active';
			}
			?>

			<li class="<?php echo implode( ' ', $classes ); ?>">
				<label for="tab-<?php echo $key; ?>-input"><?php echo $tab['title']; ?></label>
			</li>
		<?php endforeach; ?>

	</ul>

	<div class="course-tab-panels">
		<?php foreach ( $tabs as $key => $tab ) : ?>
			<div class="course-tab-panel-<?php echo esc_attr( $key ); ?> course-tab-panel"
				 id="<?php echo esc_attr( $tab['id'] ); ?>">
				<?php
				if ( is_callable( $tab['callback'] ) ) {
					call_user_func( $tab['callback'], $key, $tab );
				} else {
					do_action( 'learn-press/course-tab-content', $key, $tab );
				}
				?>
			</div>
		<?php endforeach; ?>
	</div>
</div>

<div class="course-tabs tabs-v2">
	<div class="course-tab-panel margin-bottom-30" id="tab-overview">
      <?php if(class_exists('Gavias_Themer_Comment')){ ?>
         <div class="review-results margin-bottom-0">
            <?php 
               $comment_results = Gavias_Themer_Comment::getInstance()->rating_results(get_the_ID());
               if(!isset($comment_results['5_star'])) $comment_results['5_star'] = 0;
               if(!isset($comment_results['4_star'])) $comment_results['4_star'] = 0;
               if(!isset($comment_results['3_star'])) $comment_results['3_star'] = 0;
               if(!isset($comment_results['2_star'])) $comment_results['2_star'] = 0;
               if(!isset($comment_results['1_star'])) $comment_results['1_star'] = 0;
               if(!$comment_results['count']) $comment_results['count'] = 1;
            ?>
            <div class="all-review-progress">
               
               <div class="course-review-item clearfix">
                  <div class="review-info">
                     <div class="course__progress-label"><?php echo esc_html__( 'Excellent', 'kipso' ); ?></div>
                     <div class="count"><?php echo esc_attr( $comment_results['5_star'] ) ?></div>
                  </div>
                  <div class="course__progress">
                     <div class="course__progress-bar" data-progress-max="<?php echo ( ($comment_results['5_star'] / $comment_results['count']) * 100 ) ?>%">
                     </div>
                  </div>  
               </div>

               <div class="course-review-item clearfix">
                  <div class="review-info">
                     <div class="course__progress-label"><?php echo esc_html__( 'Very Good', 'kipso' ); ?></div>
                     <div class="count"><?php echo esc_attr( $comment_results['4_star'] ) ?></div>
                  </div>
                  <div class="course__progress">
                     <div class="course__progress-bar" data-progress-max="<?php echo ( ($comment_results['4_star'] / $comment_results['count']) * 100 ) ?>%">
                     </div>
                  </div>  
               </div>

               <div class="course-review-item clearfix">
                  <div class="review-info">
                     <div class="course__progress-label"><?php echo esc_html__( 'Average', 'kipso' ); ?></div>
                     <div class="count"><?php echo esc_attr( $comment_results['3_star'] ) ?></div>
                  </div>
                  <div class="course__progress">
                     <div class="course__progress-bar" data-progress-max="<?php echo ( ($comment_results['3_star'] / $comment_results['count']) * 100 ) ?>%">
                     </div>
                  </div>  
               </div>

               <div class="course-review-item clearfix">
                  <div class="review-info">
                     <div class="course__progress-label"><?php echo esc_html__( 'Poort', 'kipso' ); ?></div>
                     <div class="count"><?php echo esc_attr( $comment_results['2_star'] ) ?></div>
                  </div>
                  <div class="course__progress">
                     <div class="course__progress-bar" data-progress-max="<?php echo ( ($comment_results['2_star'] / $comment_results['count']) * 100 ) ?>%">
                     </div>
                  </div>  
               </div>

               <div class="course-review-item clearfix">
                  <div class="review-info">
                     <div class="course__progress-label"><?php echo esc_html__( 'Terrible', 'kipso' ); ?></div>
                     <div class="count"><?php echo esc_attr( $comment_results['1_star'] ) ?></div>
                  </div>
                  <div class="course__progress">
                     <div class="course__progress-bar" data-progress-max="<?php echo ( ($comment_results['1_star'] / $comment_results['count']) * 100 ) ?>%">
                     </div>
                  </div>  
               </div>

            </div>

            <div class="course-reviews">
               <div class="course-reviews-inner">
                  <?php 
                     $average_ratings = Gavias_Themer_Comment::getInstance()->get_average_ratings(get_the_id());
                  ?>
                  <span class="average"><?php echo number_format((float)$average_ratings['rate'], 1, '.', ''); ?></span>
                  <?php echo Gavias_Themer_Comment::getInstance()->rating_display($average_ratings['rate']) ?>
                  <span class="review-count"><?php echo esc_attr($average_ratings['count']); ?>&nbsp;<?php echo esc_html__( 'reviews', 'kipso' ); ?></span>
               </div>   
            </div>
            
         </div>  
      <?php } ?>   

      <div class="course-review-2 clearfix">
         <?php 
            if( comments_open() || get_comments_number() ) {
               comments_template();
            }
          ?>
      </div>
   </div>
</div>