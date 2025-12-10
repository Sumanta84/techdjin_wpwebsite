<?php
/**
 * $Desc
 *
 * 
 * @package    basetheme
 * @author     Gaviasthemes Team     
 * @copyright  Copyright (C) 2016 Gaviasthemess. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 * 
 */
?>

<?php if(get_post_type() == 'lp_course'){ ?>
   <?php get_template_part( 'single', 'course' ); ?>
<?php }else{ ?>
<?php get_header(); ?>
   <?php kipso_base_layout('page'); ?>
<?php get_footer(); ?>
<?php } ?>