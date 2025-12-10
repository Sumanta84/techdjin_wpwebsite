<?php
  Redux::setSection( $opt_name, array(
    'title' => esc_html__('General Options', 'kipso'),
    'desc' => '',
    'icon' => 'el-icon-wrench',
    'fields' => array(
      array(
        'id'            => 'scheme_color',
        'type'          => 'multi_text',
        'title'         => 'Scheme Colors Use for in website',
        'subtitle'      => esc_html__('Example:Turquoise[#00BDC0], Format: Title[color]', 'kipso'),
        'default'       => array('Indigo[#4F6FBE]', 'MediumPurple[#9764DF]', 'LightningYellow[#F9BC18]', 'PuertoRico[#9238A4]', 'Salmon[#FF8B6F]', 'PictonBlue[#3CCBF3]', 'Green[#50AF4D]', 'Purple[#9854B3]')
      ),
      array(
        'id' => 'skin_color',
        'type' => 'select',
        'title' => esc_html__('Skin Color', 'kipso'),
        'desc' => '',
        'options' => array(
          '' => 'Default',
          'blue'          => 'Blue',
          'brown'         => 'Brown',
          'green'         => 'Green',
          'lilac'         => 'Lilac',
          'lime-green'    => 'Lime Green',
          'orange'        => 'Orange',
          'pigad-blue'    => 'Pigad Blue',
          'pink'          => 'Pink',
           'purple'        => 'Purple',
          'red'           => 'Red',
          'turquoise'     => 'Turquoise',
          'turquoise2'    => 'Turquoise II',
          'violet-red'    => 'Violet Red',
          'yellow'        => 'Yellow'
        ),
        'default' => ''
      ),
      array(
        'id' => 'page_layout',
        'type' => 'button_set',
        'title' => esc_html__('Page Layout', 'kipso'),
        'subtitle' => esc_html__('Select the page layout type', 'kipso'),
        'desc' => '',
        'options' => array('boxed' => 'Boxed','fullwidth' => 'Fullwidth'),
        'default' => 'fullwidth'
      ),
      array(
        'id' => 'enable_backtotop',
        'type' => 'button_set',
        'title' => esc_html__('Enable Back To Top', 'kipso'),
        'subtitle' => esc_html__('Enable the back to top button that appears in the bottom right corner of the screen.', 'kipso'),
        'desc' => '',
        'options' => array('1' => 'On','0' => 'Off'),
        'default' => '1'
      ),
      array(
        'id' => 'map_api_key',
        'type' => 'text',
        'title' => esc_html__('Google Map API key', 'kipso'),
        'default' => ''
      ),
    )
  ));