<?php
/**
 * Template for displaying course content within the loop.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/content-single-course.php
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 4.0.0
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();

if ( post_password_required() ) {
	echo get_the_password_form();

	return;
}
$course = learn_press_get_course( get_the_ID() );
$duration = get_post_meta( get_the_ID(), '_lp_duration', true );
$lesson_count = $course->count_items( LP_LESSON_CPT );
$thumbnail = 'full';
$categories_html = ''; $separator = ',';
$item_cats = get_the_terms( get_the_ID(), 'course_category' );
if(!empty($item_cats) && !is_wp_error($item_cats)){
   foreach((array)$item_cats as $item_cat){
      $cat_color = get_term_meta( $item_cat->term_id, 'course_category_color', true );
      $categories_html .= '<a class="cat-course-link '.$cat_color.'" href="'.get_category_link( $item_cat->term_id ).'" title="' . esc_attr( sprintf( esc_attr__( "View all posts in %s", 'kipso' ), $item_cat->name ) ) . '">'.$item_cat->name.'</a>'.$separator;
   }
}

$duration = get_post_meta( get_the_ID(), '_lp_duration', true );

$max_students = get_post_meta( get_the_ID(), '_lp_max_students', true );
$lesson_count = $course->count_items( LP_LESSON_CPT );
$skill_level = get_post_meta( get_the_ID(), '_course_skill_level', true );
$certificate = get_post_meta( get_the_ID(), '_course_certificate', true );
$course_includes = get_post_meta( get_the_ID(), '_course_includes', false );

/**
 * @deprecated
 */
do_action( 'learn_press_before_main_content' );
do_action( 'learn_press_before_single_course' );
do_action( 'learn_press_before_single_course_summary' );

/**
 * @since 3.0.0
 */
do_action( 'learn-press/before-main-content' );

do_action( 'learn-press/before-single-course' );

?>
<div id="learn-press-course" class="course-summary">
	<div class="course-single-page">
	<div class="single-course-content course-summary" id="learn-press-course" class="course-summary">
		<div class="row">
			
			<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
				<div class="content-top">
			      
			      <div class="course-author">
			         <div class="author-picture">
			            <?php echo wp_kses($course->get_instructor()->get_profile_picture(), true); ?>
			         </div>
			         <div class="author-name">
			            <span><?php echo esc_html__( 'by', 'kipso' ) ?>&nbsp;</span><?php echo wp_kses($course->get_instructor_html(), true); ?>
			         </div>
			      </div>

		         <div class="course-category">
			         <?php echo trim($categories_html, $separator); ?>
			      </div>

			      <h2 class="entry-title"><a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php the_title() ?></a></h2>
			      
			      <div class="review-student-inner">
				      <?php if(class_exists('Gavias_Themer_Comment')){ ?>
				      	<?php $average_ratings = Gavias_Themer_Comment::getInstance()->get_average_ratings(get_the_id()); ?>
					      <div class="course-reviews">
					         <?php echo Gavias_Themer_Comment::getInstance()->rating_display($average_ratings['rate']) ?>
					         <div class="average-ratings">
					            <span class="average"><?php echo esc_html($average_ratings['rate']); ?></span>
					            <span class="rate-count"><?php echo esc_html($average_ratings['count']); ?></span>
					         </div>
					      </div>
					   <?php } ?>   

				      <?php if ( ! empty( $instance['show_enrolled_students'] ) ) : ?>
							<div class="course-student-number course-meta-field">
								<?php echo $course->get_students_html(); ?>
							</div>
						<?php endif; ?>
				   </div>   

				   <?php do_action( 'learn-press/content-learning-summary' ); ?>

			   </div>

				<div class="post-thumbnail">
					<?php the_post_thumbnail( $thumbnail, array( 'alt' => get_the_title() ) ); ?>
				</div>

				<div class="entry-content">
					<div class="content-inner">
						<?php
							//do_action( 'learn-press/single-course-summary' );
							$tab_version = get_post_meta( get_the_ID(), '_course_style', true );
							learn_press_get_template_part( 'single-course/tabs/tabs', $tab_version);
						?>
					</div>
				</div>

			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="course-cart">
					
					<div class="lp-course-buttons">
						<?php learn_press_get_template( 'single-course/price.php' ); ?>
						<?php learn_press_get_template( 'single-course/buttons.php' ); ?>
					</div>

				</div>

				<?php if( isset($course_includes[0]) && $course_includes[0] ){ ?>
					<div class="course-includes">
						<div class="course-includes-title">
						<?php echo esc_html__( 'This course includes', 'kipso' ); ?>
						</div>
						<ul>
						<?php foreach ($course_includes[0] as $item) { ?>
							<li><i class="gv-icon-7"></i><?php echo wp_kses( $item, true ) ?></li>
						<?php } ?>
						</ul>
					</div>
				<?php } ?>	

				<div class="course-meta">
					<div class="course-meta-item">
						<span class="icon durations"><i class="far fa-clock"></i></span>
						<span class="label"><?php echo esc_html__( 'Durations:', 'kipso' ) ?></span>
						<span class="value"><?php echo esc_html($duration) ?></span>
					</div>
					<div class="course-meta-item">
						<span class="icon lectures"><i class="far fa-folder-open"></i></span>
						<span class="label"><?php echo esc_html__( 'Lectures:', 'kipso' ) ?></span>
						<span class="value"><?php echo esc_html($lesson_count) ?></span>
					</div>
					<div class="course-meta-item">
						<span class="icon students"><i class="fas fa-user-friends"></i></span>
						<span class="label"><?php echo esc_html__( 'Maximum Students:', 'kipso' ) ?></span>
						<span class="value"><?php echo esc_html($max_students); ?></span>
					</div>
					<?php if($skill_level){ ?>
						<div class="course-meta-item">
							<span class="icon skill"><i class="far fa-flag"></i></span>
							<span class="label"><?php echo esc_html__( 'Skill level:', 'kipso' ) ?></span>
							<span class="value"><?php echo esc_html($skill_level) ?></span>
						</div>
					<?php } ?>
					<?php if($certificate){ ?>
						<div class="course-meta-item">
							<span class="icon certificate"><i class="fas fa-certificate"></i></span>
							<span class="label"><?php echo esc_html__( 'Certificate:', 'kipso' ) ?></span>
							<span class="value"><?php echo esc_html($certificate) ?></span>
						</div>
					<?php } ?>	
				</div>

				<div class="single-course-sidebar">
					<?php dynamic_sidebar('course_sidebar'); ?>
				</div>

			</div>

		</div>		
	</div>
</div>

</div>
<?php

/**
 * @since 3.0.0
 */
do_action( 'learn-press/after-main-content' );

do_action( 'learn-press/after-single-course' );

/**
 * @deprecated
 */
do_action( 'learn_press_after_single_course_summary' );
do_action( 'learn_press_after_single_course' );
do_action( 'learn_press_after_main_content' );