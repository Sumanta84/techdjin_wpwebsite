<?php
  $team_position = get_post_meta(get_the_id(), 'kipso_team_position', true );
  $team_socials = get_post_meta(get_the_id(), 'team_socials', false );
  $team_color = get_post_meta(get_the_id(), 'kipso_team_color', true );
  $team_text_color = get_post_meta(get_the_id(), 'kipso_team_text_color', true );
  if(isset($team_socials[0])){
  	$team_socials = $team_socials[0]; 
  }
  $profile_url = get_the_permalink();
  $uid = get_post_meta(get_the_id(), 'kipso_team_useid', true);
  if(!empty($uid) && function_exists('learn_press_user_profile_link')){
    $profile_url = learn_press_user_profile_link( $uid );
  }
?>
<div class="team-block team-v2 <?php echo esc_attr($team_text_color); ?>">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="team-image">
		 	<a href="<?php echo esc_url($profile_url) ?>"><?php the_post_thumbnail(); ?></a>
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
	<?php endif ?>
	<div class="team-content">  
	   <div class="team-content-inner">
         <div class="team-name"><a href="<?php echo esc_url($profile_url) ?>"><?php the_title() ?></a></div>
   	   <?php if($team_position){ ?>   
   	   	<div class="team-job"><?php echo esc_html( $team_position ); ?></div>
   	   <?php } ?>
      </div>
	</div>
</div>  