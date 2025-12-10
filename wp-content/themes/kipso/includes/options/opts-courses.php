<?php
Redux::setSection( $opt_name, array(
   'icon' => 'el-icon-shopping-cart',
   'title' => esc_html__('WooCommerce Options', 'kipso'),
   'fields' => array(
      array(
        'id'        => 'products_per_page',
        'type'      => 'text',
        'title'     => esc_html__('Products Per Page', 'kipso'),
        'subtitle'  => esc_html__('Number value.', 'kipso'),
        'desc'      => esc_html__('The amount of products you would like to show per page on shop/category pages.', 'kipso'),
        'validate'  => 'numeric',
        'default'   => '24'
      )       
   )
));

Redux::setSection( $opt_name, array(
   'icon' => 'el-icon-shopping-cart',
   'title' => esc_html__('Shop Options', 'kipso'),
   'subsection' => true,
   'fields' => array(
      array(
         'id' => 'product_display_layout',
         'type' => 'select',
         'title' => esc_html__('Default Product Display Layout', 'kipso'),
         'subtitle' => "Choose the default product display layout for WooCommerce shop/category pages.",
         'options' => array(
            'grid'      => 'Grid',
            'list'   => 'List',
        ),
        'desc' => '',
        'default' => 'standard'
      ),
      array(
         'id' => 'product_display_columns',
         'type' => 'select',
         'title' => esc_html__('Product Display Columns', 'kipso'),
         'subtitle' => "Choose the number of columns to display on shop/category pages.",
         'options' => array(
            '1'      => '1',
            '2'      => '2',
            '3'      => '3',
            '4'      => '4',
            '5'      => '5',
            '6'      => '6',
         ),
         'desc' => '',
         'default' => '4'
      ),
      array(
         'id' => 'woo_sidebar_config',
         'type' => 'select',
         'title' => esc_html__('WooCommerce Sidebar Config', 'kipso'),
         'subtitle' => "Choose the sidebar config for WooCommerce shop/category pages.",
         'options' => array(
           'no-sidebars'     => 'No Sidebars',
           'left-sidebar'    => 'Left Sidebar',
           'right-sidebar'      => 'Right Sidebar',
           'both-sidebars'      => 'Both Sidebars'
         ),
         'desc' => '',
         'default' => 'no-sidebars'
      ),
      array(
         'id' => 'woo_left_sidebar',
         'type' => 'select',
         'title' => esc_html__('WooCommerce Left Sidebar', 'kipso'),
         'subtitle' => "Choose the left sidebar for WooCommerce shop/category pages.",
         'data'      => 'sidebars',
         'desc' => '',
         'default' => 'woocommerce_sidebar'
      ),
      array(
         'id' => 'woo_right_sidebar',
         'type' => 'select',
         'title' => esc_html__('WooCommerce Right Sidebar', 'kipso'),
         'subtitle' => "Choose the right sidebar for WooCommerce shop/category pages.",
         'data'      => 'sidebars',
         'desc' => '',
         'default' => 'woocommerce_sidebar'
      ),
      array(
         'id' => 'woo_shop_divide_0',
         'type' => 'divide'
      ),
      array(
         'id' => 'woo_breadcrumb_show_title',
         'type' => 'button_set',
         'title' => esc_html__('Breadcrumb Display Title Page', 'kipso'),
         'desc' => '',
         'options' => array(1 => 'Enable', 0 => 'Disable'),
         'default' => 1
      ),
      array(
         'id'        => 'woo_breadcrumb_padding_top',
         'type'      => 'slider',
         'title'     => esc_html__( 'Breadcrumb Padding Top', 'kipso' ),
         'default'   => 275,
         'min'       => 50,
         'max'       => 500,
         'step'      => 1,
         'display_value' => 'text',
      ),
      array(
         'id'        => 'woo_breadcrumb_padding_bottom',
         'type'      => 'slider',
         'title'     => esc_html__( 'Breadcrumb Padding Top', 'kipso' ),
         'default'   => 100,
         'min'       => 50,
         'max'       => 500,
         'step'      => 1,
         'display_value' => 'text',
      ),
      array(
         'id' => 'woo_breadcrumb_background_color',
         'type' => 'color',
         'title' => esc_html__('Background Overlay Color', 'kipso'),
         'default' => ''
      ),
      array(
         'id'        => 'woo_breadcrumb_background_opacity',
         'type'      => 'slider',
         'title'     => esc_html__( 'Breadcrumb Ovelay Color Opacity', 'kipso' ),
         'default'   => 50,
         'min'       => 0,
         'max'       => 100,
         'step'      => 2,
         'display_value' => 'text',
      ),
      array(
         'id' => 'woo_breadcrumb_image',
         'type' => 'button_set',
         'title' => esc_html__('Breadcrumb Image', 'kipso'),
         'desc' => '',
         'options' => array( 1 => 'Enable', 0 => 'Disable'),
         'default' => 'enable'
      ),
      array(
         'id' => 'woo_breadcrumb_background_image',
         'type' => 'media',
         'url' => true,
         'title' => esc_html__('Breadcrumb Background Image', 'kipso'),
         'default' => '',
         'required'  => array( 'woo_breadcrumb_image', '=', 1 )
      ),
      array(
         'id'    => 'woo_breadcrumb_text_stype',
         'type'    => 'select',
         'title'   => esc_html__( 'Breadcrumb Text Stype', 'kipso' ),
         'options' => 
         array(
            'text-light'     => esc_html__('Light', 'kipso'),
            'text-dark'      => esc_html__('Dark', 'kipso')
         ),
         'default' => 'text-dark'
      ),
      array(
         'id'    => 'woo_breadcrumb_text_align',
         'type'    => 'select',
         'title'   => esc_html__( 'Breadcrumb Text Align', 'kipso' ),
         'options' => 
         array(
            'text-left'      => esc_html__('Left', 'kipso'),
            'text-center'    => esc_html__('Center', 'kipso'),
            'text-right'     => esc_html__('Right', 'kipso')
         ),
         'default' => 'text-center'
      )
   )
));

Redux::setSection( $opt_name, array(
   'icon' => 'el-icon-shopping-cart',
   'title' => esc_html__('Product Options', 'kipso'),
   'subsection' => true,
   'fields' => array(
      array(
         'id' => 'product_sidebar_config',
         'type' => 'select',
         'title' => esc_html__('Default Product Sidebar Config', 'kipso'),
         'subtitle' => "Choose the sidebar config for WooCommerce shop/category pages.",
         'options' => array(
            'no-sidebars'     => 'No Sidebars',
            'left-sidebar'    => 'Left Sidebar',
            'right-sidebar'      => 'Right Sidebar',
            'both-sidebars'      => 'Both Sidebars'
         ),
         'desc' => '',
         'default' => 'no-sidebars'
      ),
      array(
         'id' => 'product_left_sidebar',
         'type' => 'select',
         'title' => esc_html__('Default Product Left Sidebar', 'kipso'),
         'subtitle' => "Choose the default left sidebar for WooCommerce product pages.",
         'data'      => 'sidebars',
         'desc' => '',
         'default' => 'woocommerce-sidebar'
      ),
      array(
         'id' => 'product_right_sidebar',
         'type' => 'select',
         'title' => esc_html__('Default Product Right Sidebar', 'kipso'),
         'subtitle' => "Choose the default right sidebar for WooCommerce product pages.",
         'data'      => 'sidebars',
         'desc' => '',
         'default' => 'woocommerce-sidebar'
      ),
      array(
         'id' => 'upsell_heading_text',
         'type' => 'text',
         'title' => esc_html__('Upsell Heading Text', 'kipso'),
         'subtitle' => "Heading text for the upsell products on the product page.",
         'desc' => '',
         'default' => 'Complete the look'
      ),
      array(
         'id' => 'related_heading_text',
         'type' => 'text',
         'title' => esc_html__('Related Heading Text', 'kipso'),
         'subtitle' => "Heading text for the related products on the product page.",
         'desc' => '',
         'default' => 'Related products'
      )
   )
));