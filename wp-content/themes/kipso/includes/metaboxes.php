<?php
function kipso_register_meta_boxes(){

   global $meta_boxes, $wp_registered_sidebars;;
   $sidebar = array();
   $sidebar[""] = ' --Default-- ';
   foreach($wp_registered_sidebars as $key => $value){
      $sidebar[$value['id']] = $value['name'];
   }
   $default_options = get_option('kipso_options');
   
   $meta_boxes = array();

   /* Thumbnail Meta Box
   ================================================== */
   $meta_boxes[] = array(
      'id' => 'gavias_metaboxes_post_thumbnail',
      'title' => esc_html__('Thumbnail', 'kipso'),
      'pages' => array( 'post' ),
      'context' => 'normal',
      'fields' => array(
         
         // THUMBNAIL IMAGE
         array(
            'name'  => esc_html__('Thumbnail image', 'kipso'),
            'desc'  => esc_html__('The image that will be used as the thumbnail image.', 'kipso'),
            'id'    => "kipso_thumbnail_image",
            'type'  => 'image_advanced',
            'max_file_uploads' => 1
         ),

         // THUMBNAIL VIDEO
         array(
            'name' => esc_html__('Thumbnail video URL', 'kipso'),
            'id' => 'kipso_thumbnail_video_url',
            'desc' => esc_html__('Enter the video url for the thumbnail. Only links from Vimeo & YouTube are supported.', 'kipso'),
            'clone' => false,
            'type'  => 'oembed',
            'std' => '',
         ),

         // THUMBNAIL AUDIO
         array(
            'name' => esc_html__('Thumbnail audio URL', 'kipso'),
            'id' => "kipso_thumbnail_audio_url",
            'desc' => esc_html__('Enter the audio url for the thumbnail.', 'kipso'),
            'clone' => false,
            'type'  => 'oembed',
            'std' => '',
         ),

         // THUMBNAIL GALLERY
         array(
            'name'             => esc_html__('Thumbnail gallery', 'kipso'),
            'desc'             => esc_html__('The images that will be used in the thumbnail gallery.', 'kipso'),
            'id'               => "kipso_thumbnail_gallery",
            'type'             => 'image_advanced',
            'max_file_uploads' => 50,
         ),

         // THUMBNAIL LINK TYPE
         array(
            'name' => esc_html__('Thumbnail link type', 'kipso'),
            'id'   => "kipso_thumbnail_link_type",
            'type' => 'select',
            'options' => array(
               'link_to_post'    => esc_html__('Link to item', 'kipso'),
               'link_to_url'     => esc_html__('Link to URL', 'kipso'),
               'link_to_url_nw'  => esc_html__('Link to URL (New Window)', 'kipso'),
               'lightbox_thumb'  => esc_html__('Lightbox to the thumbnail image', 'kipso'),
               'lightbox_image'  => esc_html__('Lightbox to image (select below)', 'kipso'),
               'lightbox_video'  => esc_html__('Fullscreen Video Overlay (input below)', 'kipso')
            ),
            'multiple' => false,
            'std'  => 'link-to-post',
            'desc' => esc_html__('Choose what link will be used for the image(s) and title of the item.', 'kipso')
         ),

         // THUMBNAIL LINK URL
         array(
            'name' => esc_html__('Thumbnail link URL', 'kipso'),
            'id' => 'kipso_thumbnail_link_url',
            'desc' => esc_html__('Enter the url for the thumbnail link.', 'kipso'),
            'clone' => false,
            'type'  => 'text',
            'std' => '',
         ),

         // THUMBNAIL LINK LIGHTBOX IMAGE
         array(
            'name'  => esc_html__('Thumbnail link lightbox image', 'kipso'),
            'desc'  => esc_html__('The image that will be used as the lightbox image.', 'kipso'),
            'id'    => "kipso_thumbnail_link_image",
            'type'  => 'thickbox_image'
         ),
      )
   );

    /* Page Meta Box
   ================================================== */
   $meta_boxes[] = array(
      'id'    => 'gavias_metaboxes_page',
      'title' => esc_html__('Page Meta', 'kipso'),
      'pages' => array( 'page', 'portfolio', 'product', 'post', 'give_forms', 'service' ),
      'priority'   => 'high',
      'fields' => array(
         // Full width
         array(
            'name' => esc_html__('Full Width( 100% Main Width )', 'kipso'),
            'id'   => "kipso_page_full_width",
            'type' => 'switch',
            'desc' => esc_html__('Turn on to have the main area display at 100% width according to the window size. Turn off to follow site width.', 'kipso'),
            'std' => 0,
         ),
         // Extra Page Class
         array(
            'name' => esc_html__('Header', 'kipso'),
            'id' => 'kipso_page_header',
            'desc' => esc_html__("You can change header for page if you like's.", 'kipso'),
            'type'  => 'select',
            'options'   => kipso_get_headers(),
            'std' => '__default_option_theme',
         ),
         array(
            'name'      => esc_html__('Footer', 'kipso'),
            'id'        => 'kipso_page_footer',
            'desc'      => esc_html__("You can change footer for page if you like's",'kipso'),
            'type'      => 'select',
            'options'   =>  kipso_get_footer(),
            'std'       => '__default_option_theme'
         ),
         // Extra Page Class
         array(
            'name' => esc_html__('Extra page class', 'kipso'),
            'id' => 'kipso_extra_page_class',
            'desc' => esc_html__("If you wish to add extra classes to the body class of the page (for custom css use), then please add the class(es) here.", 'kipso'),
            'clone' => false,
            'type'  => 'text',
            'std' => '',
         ),
        
      )
   );

   /* Page Title Meta Box
   ================================================== */
   $meta_boxes[] = array(
      'id' => 'gavias_metaboxes_page_heading',
      'title' => esc_html__('Page Title & Breadcrumb', 'kipso'),
      'pages' => array( 'post', 'page', 'product', 'portfolio', 'gallery', 'give_forms', 'gva_event', 'gva_team', 'service'),
      'context' => 'normal',
      'priority'   => 'high',
      'fields' => array(
        array(
          'name' => esc_html__('Remove Title of Page', 'kipso'),   
          'id'   => "kipso_disable_page_title",
          'type' => 'switch',
          'std'  => 0,
        ),
        array(
          'name' => esc_html__('Disable Breadcrumbs', 'kipso'),
          'id'   => "kipso_no_breadcrumbs",
          'type' => 'switch',
          'desc' => esc_html__('Disable the breadcrumbs from under the page title on this page.', 'kipso'),
          'std' => 0,
        ),
        array(
          'name' => esc_html__('Breadcrumb Layout', 'kipso'),
          'id'   => "kipso_breadcrumb_layout",
          'type' => 'select',
          'options' => array(
             'theme_options'     => esc_html__('Default Options in Theme-Settings', 'kipso'),
             'page_options'      => esc_html__('Individuals Options This Page', 'kipso')
          ),
          'multiple' => false,
          'std'  => 'theme_options',
          'desc' => esc_html__('You can use breadcrumb settings default in Theme-Settings or individuals this page', 'kipso')
        ),
        array(
          'name'    => esc_html__('Show page title in the breadcrumbs', 'kipso'),   
          'id'      => "kipso_page_title",
          'type'    => 'switch',
          'std'     => 1,
          'class'   => 'breadcrumb_setting'
        ),
        array(
          'name' => esc_html__('Page Title Override', 'kipso'),
          'id' => 'kipso_page_title_one',
          'desc' => esc_html__("Enter a custom page title if you'd like.", 'kipso'),
          'type'  => 'text',
          'std' => '',
          'class'   => 'breadcrumb_setting'
        ),
        array(
          'name'        => esc_html__( 'Breadcrumb Padding Top (px)', 'kipso' ),
          'id'          => "kipso_breadcrumb_padding_top",
          'type'        => 'number',
          'prefix'      => '',
          'class'       => 'breadcrumb_setting',
          'desc'        => esc_html__('Option Padding Top of Breacrumb, set empty = padding default of theme', 'kipso'),
          'std'         => kipso_get_option('breadcrumb_padding_top', '275'),
        ),
        array(
          'name'       => esc_html__( 'Breadcrumb Padding Bottom (px)', 'kipso' ),
          'id'         => "kipso_breadcrumb_padding_bottom",
          'type'       => 'number',
          'prefix'     => 'px',
          'class'      => 'breadcrumb_setting',
          'desc'        => esc_html__('Option Padding Bottom of Breacrumb, set empty = padding default of theme', 'kipso'),
          'std'        => kipso_get_option('breadcrumb_padding_bottom', '100'),
        ),
        array(
          'name' => esc_html__( 'Background Overlay Color', 'kipso' ),
          'id'   => "kipso_bg_color_title",
          'desc' => esc_html__( "Set an overlay color for hero heading image.", 'kipso' ),
          'type' => 'color',
          'class'   => 'breadcrumb_setting',
          'std'  => '',
        ),
        array(
          'name'       => esc_html__( 'Overlay Opacity', 'kipso' ),
          'id'         => "kipso_bg_opacity_title",
          'desc'       => esc_html__( 'Set the opacity level of the overlay. This will lighten or darken the image depening on the color selected.', 'kipso' ),
          'clone'      => false,
          'type'       => 'slider',
          'prefix'     => '',
          'class'   => 'breadcrumb_setting',
          'js_options' => array(
              'min'  => 0,
              'max'  => 100,
              'step' => 1,
          ),
          'std'   => '50'
        ),
        array(
          'name'    => esc_html__('Enable Breadcrumb Image', 'kipso'),
          'id'      => "kipso_image_breadcrumbs",
          'type'    => 'switch',
          'class'   => 'breadcrumb_setting',
          'std'     => 0,
        ),
        array(
          'name'  => esc_html__('Breadcrumb Background Image', 'kipso'),
          'id'    => "kipso_page_title_image",
          'type'  => 'image_advanced',
          'class'   => 'breadcrumb_setting',
          'max_file_uploads' => 1
        ),
        array(
          'name' => esc_html__('Heading Text Style', 'kipso'),
          'id'   => "kipso_page_title_text_style",
          'type' => 'select',
          'class'   => 'breadcrumb_setting',
          'options' => array(
             'text-light'     => esc_html__('Light', 'kipso'),
             'text-dark'      => esc_html__('Dark', 'kipso')
          ),
          'multiple' => false,
          'std'  => kipso_get_option('breadcrumb_text_stype', 'text-dark'),
          'desc' => esc_html__('If you uploaded an image in the option above, choose light/dark styling for the text heading text here.', 'kipso')
        ),
        array(
          'name' => esc_html__('Heading Text Align', 'kipso'),
          'id'   => "kipso_page_title_text_align",
          'type' => 'select',
          'class'   => 'breadcrumb_setting',
          'options' => array(
             'text-left'      => esc_html__('Left', 'kipso'),
             'text-center'    => esc_html__('Center', 'kipso'),
             'text-right'     => esc_html__('Right', 'kipso')
          ),
          'multiple' => false,
          'std'  => kipso_get_option('breadcrumb_text_align', 'text-center'),
          'desc' => esc_html__('Choose the text alignment for the hero heading.', 'kipso')
        ),
      )
   );

   /* Brands Meta Box
   ================================================== */
   $meta_boxes[] = array(
      'id'    => 'gavias_metaboxes_brands_options',
      'title' => esc_html__('Brands Options', 'kipso'),
      'pages' => array( 'brands'),
      'priority'   => 'high',
      'fields' => array(
         // LEFT SIDEBAR
         array (
            'name'   => esc_html__('Url Link', 'kipso'),
             'id'    => "kipso_url_link",
             'type' => 'text',
             'std'   => ''
         ),
      )
   );

   /* Sidebar Meta Box Page
   ================================================== */
   $meta_boxes[] = array(
      'id'    => 'gavias_metaboxes_sidebar_page',
      'title' => esc_html__('Sidebar Options', 'kipso'),
      'pages' => array( 'post', 'page', 'product', 'portfolio', 'gallery', 'give_forms', 'gva_event', 'service' ),
      'priority'   => 'high',
      'fields' => array(

         // SIDEBAR CONFIG
         array(
            'name' => esc_html__('Sidebar configuration', 'kipso'),
            'id'   => "kipso_sidebar_config",
            'type' => 'select',
            'options' => array(
              ''                   => esc_html__('--Default--', 'kipso'),
              'no-sidebars'        => esc_html__('No Sidebars', 'kipso'),
              'left-sidebar'       => esc_html__('Left Sidebar', 'kipso'),
              'right-sidebar'      => esc_html__('Right Sidebar', 'kipso'),
              'both-sidebars'      => esc_html__('Both Sidebars', 'kipso')
            ),
            'multiple' => false,
            'std'  => '',
            'desc' => esc_html__('Choose the sidebar configuration for the detail page of this page.', 'kipso'),
         ),

         // LEFT SIDEBAR
         array (
            'name'   => esc_html__('Left Sidebar', 'kipso'),
             'id'    => "kipso_left_sidebar",
             'type' => 'select',
             'options'  => $sidebar,
             'std'   => ''
         ),

         // RIGHT SIDEBAR
         array (
            'name'   => esc_html__('Right Sidebar', 'kipso'),
            'id'    => "kipso_right_sidebar",
            'type' => 'select',
            'options'  => $sidebar,
            'std'   => ''
         ),
      )
   );

  /* Gallery Meta Box 
  ================================================== */
  $meta_boxes[] = array(
    'id'    => 'metaboxes_portfolio_page',
    'title' => esc_html__('Portfolio Settings', 'kipso'),
    'pages' => array( 'portfolio' ),
    'priority'   => 'high',
    'fields' => array(
      array (
        'name'   => esc_html__('Gallery Images', 'kipso'),
        'id'    => "kipso_gallery_images",
        'type'             => 'image_advanced',
        'max_file_uploads' => 50,
      ),
    )
  );


  $meta_boxes[] = array(
    'id'    => 'metaboxes_gallery_page',
    'title' => esc_html__('Gallery Settings', 'kipso'),
    'pages' => array( 'gallery' ),
    'priority'   => 'high',
    'fields' => array(
      array (
        'name'   => esc_html__('Gallery Images', 'kipso'),
        'id'    => "kipso_gallery_images",
        'type'             => 'image_advanced',
        'max_file_uploads' => 50,
      ),
    )
  );

  /* Service Meta Box 
   ================================================== */
   $meta_boxes[] = array(
      'id'    => 'metaboxes_service_page',
      'title' => esc_html__('Service Link Settings', 'kipso'),
      'pages' => array( 'service' ),
      'priority' => 'low',
      'fields' => array(
        array (
          'name'   => esc_html__('Gallery Images', 'kipso'),
          'id'    => "kipso_gallery_images",
          'type'             => 'image_advanced',
          'max_file_uploads' => 50,
        ),
        array(
          'name' => esc_html__('Show Gallery Top Service Single Page', 'kipso'),
          'id'   => "kipso_show_service_gallery",
          'type' => 'switch',
          'std' => 0,
        ),
        array (
          'name'    => esc_html__('Extra Link', 'kipso'),
          'id'      => "kipso_service_extra_link",
          'type'    => 'text'
        ),
      )
   );

   $map_api_key = kipso_get_option('map_api_key', 'AIzaSyChkvQkXo_61RR7u-XJOj-rLF9ekk9eRYc'); 
    /* Event Meta Box 
   ================================================== */
   $meta_boxes[] = array(
      'id'            => 'metaboxes_event_page',
      'title'         => esc_html__('Event Settings', 'kipso'),
      'pages'         => array( 'gva_event' ),
      'priority'   => 'high',
      'fields'        => array(
        array (
          'name'    => esc_html__('Start Time', 'kipso'),
          'id'      => "kipso_start_time",
          'type'    => 'datetime'
        ),
        array (
          'name'    => esc_html__('Finished Time', 'kipso'),
          'id'      => "kipso_finish_time",
          'type'    => 'datetime'
        ),
        array (
          'name'    => esc_html__('Time', 'kipso'),
          'id'      => "kipso__time",
          'type'    => 'text',
          'placeholder' => esc_html__('8:00am to 2:00pm', 'kipso')
        ),
        array (
          'name'    => esc_html__('Address', 'kipso'),
          'id'      => "kipso_address",
          'type'    => 'text',
          'placeholder' => esc_html__('San marcos', 'kipso')
        ),
        array (
          'name'    => esc_html__('Google Map', 'kipso'),
          'id'      => "kipso_map",
          'type'    => 'map',
          'address_field' => "kipso_address",
          'api_key'   => $map_api_key
        ),
      ),
   );

  $teachers = get_users( 'orderby=nicename&role=lp_teacher' );
  $teachers_options = array();
  $teachers_options[''] = esc_html__( '-- None --', 'kipso' );

  foreach( $teachers as $key => $teacher ){  
    $teachers_options[$teacher->ID] = $teacher->display_name;
  }
  $meta_boxes[] = array(
    'id'    => 'metaboxes_team_page',
    'title' => esc_html__('Team Settings', 'kipso'),
    'pages' => array( 'gva_team' ),
    'priority'   => 'high',
    'fields' => array(
      array (
        'name'   => esc_html__('Related UserId Instructor Role', 'kipso'),
        'id'    => "kipso_team_useid",
        'type' => 'select',
        'options' => $teachers_options,
        'desc' => esc_html__( 'Link team will be redirect to Profile User Page', 'kipso' )
      ),
      array (
        'name'   => esc_html__('Position', 'kipso'),
        'id'    => "kipso_team_position",
        'type' => 'text',
        'std'   => ''
      ),
      array (
        'name'   => esc_html__('Quote', 'kipso'),
        'id'    => "kipso_team_quote",
        'type' => 'textarea',
        'std'   => ''
      ),
      array (
        'name'   => esc_html__('Email', 'kipso'),
        'id'    => "kipso_team_email",
        'type' => 'text',
        'std'   => ''
      ),
      array (
        'name'   => esc_html__('Phone', 'kipso'),
        'id'    => "kipso_team_phone",
        'type' => 'text',
        'std'   => ''
      ),
      array (
        'name'   => esc_html__('Address', 'kipso'),
        'id'    => "kipso_team_address",
        'type' => 'text',
        'std'   => ''
      ),
      array (
        'name'   => esc_html__('Full Image', 'kipso'),
        'id'    => "kipso_team_image",
        'type'  => 'image_advanced',
        'max_file_uploads' => 1
      ),
    )
  );

  $meta_boxes[] = array(
    'id'    => 'metaboxes_header_builder',
    'title' => esc_html__('Header Builder', 'kipso'),
    'pages' => array( 'gva_header' ),
    'priority' => 'high',
    'fields' => array(
      array(
        'name' => esc_html__('Enable Background Black', 'kipso'),
        'id'   => "kipso_header_bg_black",
        'type' => 'switch',
        'desc' => esc_html__('It will display background black when builder header.', 'kipso'),
        'std' => 0,
      ),
      array(
        'name' => esc_html__('Full Width( 100% Main Width )', 'kipso'),
        'id'   => "kipso_header_full_width",
        'type' => 'switch',
        'desc' => esc_html__('Turn on to have the main area display at 100% width according to the window size. Turn off to follow site width.', 'kipso'),
        'std' => 0,
     ),
      array(
        'name' => esc_html__('Position Styling', 'kipso'),
        'id'   => "kipso_header_position",
        'type' => 'select',
        'options' => array(
          'relative'      => esc_html__('Relative', 'kipso'),
          'absolute'      => esc_html__('Absolute', 'kipso'),
        ),
        'std' => 'relative',
        'multiple' => false,
      ),
    )
  );

   return $meta_boxes;
 }  
  /********************* META BOX REGISTERING ***********************/
  add_filter( 'rwmb_meta_boxes', 'kipso_register_meta_boxes' , 99 );

function kipso_course_settings_meta_box_args(){
  global $meta_boxes;
  $meta_boxes_fields = array();
  $meta_boxes_fields[] = array(
    'name'   => esc_html__('Skill level', 'kipso'),
    'id'    => "_course_skill_level",
    'type' => 'select',
    'options' => array(
      'beginner'      => esc_html__('Beginner', 'kipso'),
      'intermediate'  => esc_html__('Intermediate', 'kipso'),
      'advanced'      => esc_html__('Advanced', 'kipso'),
    ),
  );
  $meta_boxes_fields[] = array(
    'name'   => esc_html__('Certificate', 'kipso'),
    'id'    => "_course_certificate",
    'type' => 'select',
    'options' => array(
      ''        => esc_html__('--None--', 'kipso'),
      'no'      => esc_html__('No', 'kipso'),
      'yes'     => esc_html__('Yes', 'kipso'),
    ),
    'default'   => 'yes'
  );
  $meta_boxes_fields[] = array (
    'name'  => esc_html__('Course Includes', 'kipso'),
    'id'    => "_course_includes",
    'type'  => 'text',
    'clone' => true,
    'std'   => '',
    'placeholder' => '23.5 hours on-demand video'
  );
  $meta_boxes_fields[] = array (
    'name'  => esc_html__('What you will learn', 'kipso'),
    'id'    => "_course_will_learn",
    'type'  => 'text',
    'clone' => true,
    'std'   => '',
    'placeholder' => 'Work as a freelance web developer'
  );
  
  $meta_boxes_fields[] = array (
    'name'  => esc_html__('Course Video', 'kipso'),
    'id'    => "_course_video",
    'type'  => 'text',
    'std'   => '',
  );
  $meta_boxes_fields[] = array (
    'name'  => esc_html__('Course Gallery', 'kipso'),
    'id'    => "_course_gallery",
    'type'  => 'image_advanced',
    'std'   => '',
  );
  $meta_boxes_fields[] = array(
    'name'   => esc_html__('Single Course Style', 'kipso'),
    'id'    => "_course_style",
    'type' => 'select',
    'options' => array(
      'v1'      => esc_html__('Style I', 'kipso'),
      'v2'      => esc_html__('Style II', 'kipso'),
      'v3'      => esc_html__('Style III', 'kipso'),
    ),
    'default'   => 'style-1'
  );
   $meta_boxes[] = array(
    'id' => 'gavias_metaboxes_lp_course',
    'title' => esc_html__('Course Settings', 'kipso'),
    'pages' => array( 'lp_course' ),
    'context' => 'normal',
    'fields' => $meta_boxes_fields
  );
  return $meta_boxes;
}
 add_filter( 'rwmb_meta_boxes', 'kipso_course_settings_meta_box_args' , 99 );
