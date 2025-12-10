<?php
/**
 * Template for displaying main user profile page.
 *
 * @author   ThimPress
 * @package  Learnpress/Templates
 * @version  4.0.1
 */

use LearnPress\Helpers\Template;
defined( 'ABSPATH' ) || exit();


if ( ! isset( $profile ) ) {
	return;
}

?>

<div id="learn-press-profile" <?php $profile->main_class(); ?>>
   		<div class="container"> 
				<div id="learn-press-user-profile"<?php $profile->main_class(); ?>>
			    	<div class="row">
			    		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<?php

								/**
								 * @since 3.0.0
								 */
								do_action( 'learn-press/before-user-profile', $profile );

								/**
								 * @since 3.0.0
								 */
								do_action( 'learn-press/user-profile', $profile );

								/**
								 * @since 3.0.0
								 */
								do_action( 'learn-press/after-user-profile', $profile );

							?>
						</div>
						
						<div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-xs-12 hidden">
							<div class="instructors-information">
								<div class="title"><?php echo esc_html__( 'Instructors', 'kipso' ) ?></div>
								<?php
									$instructors = get_users( 'orderby=nicename&role=lp_teacher' );
									foreach ($instructors as $key => $instructor) {
										$the_user = learn_press_get_user( $instructor->ID );
										$profile = learn_press_get_profile($instructor->ID);
										$courses = $profile->query_courses( 'own' );
								?>
										<div class="instructor-item"> 
											<div class="instructor-thumbnail">
												<a href="<?php echo learn_press_user_profile_link( $instructor->ID) ?>">
													<?php echo wp_kses($the_user->get_profile_picture(), true); ?>
												</a>
											</div>		
											<div class="instructor-name">
												<a href="<?php echo learn_press_user_profile_link( $instructor->ID) ?>">
													<?php echo esc_html($the_user->get_display_name()); ?>
												</a>
												<div class="total-course"><?php echo esc_html($courses['total']) ?> <?php echo esc_html__( 'Courses', 'kipso' ); ?></div>
											</div>
										</div>
								<?php		
									}
								?>
							</div>
			    		</div>
				   </div>
				</div> 
			</div>

