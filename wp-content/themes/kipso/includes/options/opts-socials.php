<?php
Redux::setSection( $opt_name, array(
   'title'     => esc_html__( 'Social Profiles', 'kipso' ),
   'icon'      => 'el-icon-share',
   'fields' => array(
      array(
         'id'     => 'social_facebook',
         'type'      => 'text',
         'title'  => esc_html__( 'Facebook', 'kipso' ),
         'desc'      => esc_html__( 'Enter your Facebook profile URL.', 'kipso' ),
         'default'   => ''
      ),
      array(
         'id'     => 'social_instagram',
         'type'      => 'text',
         'title'     => esc_html__( 'Instagram', 'kipso' ),
         'desc'      => esc_html__( 'Enter your Instagram profile URL.', 'kipso' ),
         'default'   => ''
      ),
      array(
         'id'     => 'social_twitter',
         'type'      => 'text',
         'title'     => esc_html__( 'Twitter', 'kipso' ),
         'desc'      => esc_html__( 'Enter your Twitter profile URL.', 'kipso' ),
         'default'   => ''
      ),
      array(
         'id'     => 'social_googleplus',
         'type'      => 'text',
         'title'     => esc_html__( 'Google+', 'kipso' ),
         'desc'      => esc_html__( 'Enter your Google+ profile URL.', 'kipso' ),
         'default'   => ''
      ),
      array(
         'id'     => 'social_linkedin',
         'type'      => 'text',
         'title'     => esc_html__( 'LinedIn', 'kipso' ),
         'desc'      => esc_html__( 'Enter your LinkedIn profile URL.', 'kipso' ),
         'default'   => ''
      ),
      array(
         'id'     => 'social_pinterest',
         'type'      => 'text',
         'title'     => esc_html__( 'Pinterest', 'kipso' ),
         'desc'      => esc_html__( 'Enter your Pinterest profile URL.', 'kipso' ),
         'default'   => ''
      ),
      array(
         'id'     => 'social_rss',
         'type'      => 'text',
         'title'     => esc_html__( 'RSS', 'kipso' ),
         'desc'      => esc_html__( 'Enter your RSS feed URL.', 'kipso' ),
         'default'   => ''
      ),
      array(
         'id'     => 'social_tumblr',
         'type'      => 'text',
         'title'     => esc_html__( 'Tumblr', 'kipso' ),
         'desc'      => esc_html__( 'Enter your Tumblr profile URL.', 'kipso' ),
         'default'   => ''
      ),
      array(
         'id'     => 'social_vimeo',
         'type'      => 'text',
         'title'     => esc_html__( 'Vimeo', 'kipso' ),
         'desc'      => esc_html__( 'Enter your Vimeo profile URL.', 'kipso' ),
         'default'   => ''
      ),
      array(
         'id'     => 'social_youtube',
         'type'      => 'text',
         'title'     => esc_html__( 'YouTube', 'kipso' ),
         'desc'      => esc_html__( 'Enter your YouTube profile URL.', 'kipso' ),
         'default'   => ''
      )
   )
));