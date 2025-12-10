<?php
  $team_position = get_post_meta(get_the_id(), 'kipso_team_position', true );
  $team_socials = get_post_meta(get_the_id(), 'team_socials', false );
  $team_image = get_post_meta(get_the_id(), 'kipso_team_image', true);
  $team_image_url = wp_get_attachment_url( $team_image, 'full' );
  if(isset($team_socials[0])){
  	$team_socials = $team_socials[0];
  }
  $excerpt_words = $settings['excerpt_words'] ? $settings['excerpt_words'] : 30;
  $show_skills = $settings['show_skills'];
  $profile_url = get_the_permalink();
  $uid = get_post_meta(get_the_id(), 'kipso_team_useid', true);
  if(!empty($uid) && function_exists('learn_press_user_profile_link')){
    $profile_url = learn_press_user_profile_link( $uid );
  }
?>
<div class="team-block team-v3 item" data-thumbs="<?php echo esc_url(get_the_post_thumbnail_url(get_the_id(), 'thumbnail')) ?>">
	<div class="team-block-inner row">
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 order-xl-2 order-lg-2 order-md-2">
         <?php if ( $team_image_url ) : ?>
      		<div class="team-image">
      		 	    <a href="<?php the_permalink(); ?>">
                  <span class="bg-team-image" style="background-image:url(<?php echo esc_url($team_image_url) ?>)"></span>
                </a>
      		</div>
      	<?php endif ?>
      </div>  
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 column-team-content"> 
      	<div class="team-content">
            <div class="team-content-inner">
         	   
               <div class="team-name"><a href="<?php echo esc_url($profile_url) ?>"><?php the_title() ?></a></div>
         	   
               <?php if($team_position){ ?>   
         	   	<div class="team-job"><?php echo esc_html( $team_position ); ?></div>
         	   <?php } ?>

               <?php if($team_socials){ ?>
                  <div class="socials-team">
                     <?php foreach ($team_socials as $key => $social) { ?>
                        <?php if(isset($social['link']) && isset($social['icon'])){ ?>
                           <a class="gva-social" href="<?php echo esc_url($social['link']) ?>">
                              <i class="<?php echo esc_attr($social['icon']) ?>"></i>
                           </a>
                        <?php } ?>   
                     <?php } ?>
                  </div>
              <?php } ?>
         	  <div class="team-body"><?php kipso_limit_words($excerpt_words, get_the_excerpt(), get_the_content()) ?></div>
            <?php 
              $team_skills = get_the_author_meta( 'team_skills', $uid );
              if( $team_skills && is_array($team_skills) ){ 
            ?>
              <div class="team-skills clearfix">
                <?php foreach ($team_skills as $key => $skill) { ?>
                    <?php if(isset($skill['label']) && isset($skill['volume'])){ ?>
                       <div class="team-progress-wrapper clearfix margin-bottom-20">
                           <div class="team__progress-label"><?php echo esc_html( $skill['label'] ); ?></div>
                           <div class="team__progress">
                             <div class="team__progress-bar" data-progress-max="<?php echo esc_attr( $skill['volume'] ) ?>%">
                                <span class="percentage"><?php echo esc_attr( $skill['volume'] ) ?>%</span>
                             </div>
                           </div>  
                         </div> 
                    <?php } ?>   
                <?php } ?>
              </div>
            <?php 
              }
            ?>  
         	</div>
        </div>   
      </div>
   </div>   
</div>  