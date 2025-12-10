<?php
Redux::setSection( $opt_name, array(
   'title' => esc_html__('Footer Options', 'kipso'),
   'desc' => '',
   'icon' => 'el-icon-compass',
   'fields' => array(
      array(
        'id' => 'footer_layout',
        'type' => 'select',
        'options' => kipso_get_footer(),
        'default' => 'footer-1'
      ),
      array(
        'id' => 'copyright_text',
        'type' => 'editor',
        'title' => esc_html__('Footer Copyright Text', 'kipso'),
        'desc' => '',
        'default' => "Copyright - 2019 - Company - All rights reserved. Powered by WordPress."
      )
   )
) );