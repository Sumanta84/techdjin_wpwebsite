<?php
  $team_position = get_post_meta(get_the_id(), 'kipso_team_position', true );
  $team_socials = get_post_meta(get_the_id(), 'team_socials', false );
  $team_socials = get_post_meta(get_the_id(), 'team_socials', false );
  $uid = get_post_meta(get_the_id(), 'kipso_team_useid', true);
  if(isset($team_socials[0])){
  	$team_socials = $team_socials[0];
  }
  $excerpt_words = $settings['excerpt_words'];
  $show_skills = $settings['show_skills'];
  $profile_url = get_the_permalink();
  if(!empty($uid) && function_exists('learn_press_user_profile_link')){
    $profile_url = learn_press_user_profile_link( $uid );
  }
?>
<div class="team-block team-v1">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="team-image">
         <div class="team-image-inner">
		 	  <a href="<?php echo esc_url($profile_url) ?>"><?php the_post_thumbnail('medium'); ?></a>
         </div>  
		</div>
	<?php endif ?>
	<div class="team-content">
	   <div class="team-name"><a href="<?php echo esc_url($profile_url) ?>"><?php the_title() ?></a></div>
	   <?php if($team_position){ ?>   
	   	<div class="team-job"><?php echo esc_html( $team_position ); ?></div>
	   <?php } ?>
	   <div class="team-body"><?php kipso_limit_words($excerpt_words, get_the_excerpt(), get_the_content()) ?></div>
	</div>
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
</div>  