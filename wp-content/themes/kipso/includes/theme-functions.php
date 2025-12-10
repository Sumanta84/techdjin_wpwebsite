<?php
if(!function_exists('kipso_id')){
  function kipso_id(){
    if(kipso_woocommerce_activated() && is_shop()){
      $pid = wc_get_page_id('shop');
    }elseif(is_page() || is_singular()){
      $pid = get_the_ID();
    }else{
      $pid = '';
    }
    return $pid;
  }
}

if(!function_exists('kipso_get_footer')){
  function kipso_get_footer(){
    $footers = array();
    if(class_exists('Gavias_Themer_Footer')){
      $footers = Gavias_Themer_Footer::getInstance()->get_footers();
    }  
    return $footers;
  }
}  

if(!function_exists('kipso_get_headers')){
  function kipso_get_headers( $default = true ){
    $headers = array();
    if(class_exists('Gavias_Themer_Header')){
      $headers = Gavias_Themer_Header::getInstance()->get_headers($default);
    }  
    
    return $headers;
  }
}

if(!function_exists('kipso_general_breadcrumbs')){
  function kipso_general_breadcrumbs() {

    $delimiter = '.&nbsp;';
    $home = esc_html__('Home', 'kipso');
    $before = '<li class="active">';
    $after = '</li>';
    $breadcrumb = '';
    $page_title = '';
    if (!is_home() && !is_front_page() || is_paged()) {

      $breadcrumb .= '<ol class="breadcrumb">';

      global $post;
      $homeLink = home_url();
      $breadcrumb .= '<li><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . '</li> ';

      if (is_category()) {
        
        global $wp_query;
        $cat_obj = $wp_query->get_queried_object();
        $thisCat = $cat_obj->term_id;
        $thisCat = get_category($thisCat);
        if(isset($thisCat->parent)){
          $parentCat = get_category($thisCat->parent);
          if ($thisCat->parent != 0) $breadcrumb .= (get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
        }
        $breadcrumb .= $before . single_cat_title('', false) . $after;
        $page_title = single_cat_title('', false );
     
      } elseif (is_day()) {
        
        $breadcrumb .= '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . ' ' . $delimiter . ' ' . '</li>';
        $breadcrumb .= '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a>' . ' ' . $delimiter . ' ' . '</li>';
        $breadcrumb .= ($before) . get_the_time('d') . $after;
        $page_title = get_the_time('d');
     
      } elseif (is_month()) {
       
        $breadcrumb .= '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . ' ' . $delimiter . ' ' . '</li>';
        $breadcrumb .= $before . get_the_time('F') . $after;
        $page_title = get_the_time('F');
     
      } elseif (is_year()) {
       
        $breadcrumb .= $before . get_the_time('Y') . $after;
        $page_title = get_the_time('Y');
      
      }elseif ( is_search() || get_query_var('s') ) {

        $breadcrumb .= ($before) . 'Search results for "' . get_search_query() . '"' . $after;
        $page_title = get_search_query();

      } elseif (is_single() && !is_attachment()) {
        
        if ( get_post_type() != 'post' ) {
          $breadcrumb .= ($before) . get_the_title() . $after;
          $page_title = get_the_title();
        } else {
          $cat = get_the_category(); $cat = $cat[0];
          $breadcrumb .= $before . get_category_parents($cat, TRUE, '') . $after;
          //$breadcrumb .= $before . get_the_title() . $after;
          $page_title = get_the_title();
        }

      } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
        
        $post_type = get_post_type_object(get_post_type());
        if( $post_type ){
          $breadcrumb .= ($before) . $post_type->labels->singular_name . $after;
          $page_title = $post_type->labels->singular_name;
        }

      } elseif (is_attachment()) {

        $parent = get_post($post->post_parent);
        $cat = get_the_category($parent->ID); 
        if(isset($cat[0]) && $cat[0]){
          $cat = $cat[0];
          $breadcrumb .= get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        }
        $breadcrumb .= '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' </li>';
        $breadcrumb .= ($before) . get_the_title() . $after;
        $page_title = get_the_title();

      } elseif ( is_page() && !$post->post_parent ) {
        
        $breadcrumb .= ($before) . get_the_title() . $after;
        $page_title = get_the_title();

      } elseif ( is_page() && $post->post_parent ) {

        $parent_id  = $post->post_parent;
        $breadcrumbs = array();
        while ($parent_id) {
          $page = get_page($parent_id);
          $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
          $parent_id  = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        foreach ($breadcrumbs as $crumb) $breadcrumb .= '<li>'.($crumb) . ' ' . $delimiter . '</li>';
        $breadcrumb .= ($before) . get_the_title() . $after;
        $page_title = get_the_title();

      }  elseif ( is_tag() ) {

        $breadcrumb .= ($before) . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
        $page_title = single_tag_title('', false);

      } elseif ( is_author() ) {

        global $author;
        $userdata = get_userdata($author);
        if($userdata){
          $breadcrumb .= ($before) . 'Articles posted by ' . $userdata->display_name . $after;
          $page_title = $userdata->display_name;
        } 

      } elseif ( is_404() ) {

        $breadcrumb .= ($before) . 'Error 404' . $after;
        $page_title = 'Error 404';

      }elseif(is_post_type_archive('lp_course')){

        $breadcrumb .= ($before) . esc_html__( 'Courses', 'kipso' ) . $after;

      }

      if ( get_query_var('paged') ) {

        if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) $breadcrumb .= ' (';
        $breadcrumb .= $before . esc_html__('Page','kipso') . ' ' . get_query_var('paged') . $after;
        if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) $breadcrumb .= ')';

      }

      $breadcrumb .= '</ol>';
      echo trim($breadcrumb);
    }
  }
}  

if ( ! function_exists( 'kipso_comment_nav' ) ) :
/**
 * Display navigation to next/previous comments when applicable.
 *
 */
function kipso_comment_nav() {
  // Are there comments to navigate through?
  if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
  ?>
  <nav class="navigation comment-navigation" role="navigation">
    <h2 class="screen-reader-text"><?php esc_html__( 'Comment navigation', 'kipso' ); ?></h2>
    <div class="nav-links">
      <?php
        if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'kipso' ) ) ) :
          printf( '<div class="nav-previous">%s</div>', $prev_link );
        endif;

        if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'kipso' ) ) ) :
          printf( '<div class="nav-next">%s</div>', $next_link );
        endif;
      ?>
    </div><!-- .nav-links -->
  </nav><!-- .comment-navigation -->
  <?php
  endif;
}
endif;

 function kipso_category_count( $links ) {
  $links = str_replace( '(', '<span class="count">(', $links );
  $links = str_replace( ')', ')</span>', $links );
  return $links;
 }
 add_filter( 'wp_list_categories', 'kipso_category_count' );

 function kipso_archive_count($links) {
  $links = str_replace( '&nbsp;(', '<span class="count">(', $links );
  $links = str_replace( ')', ')</span>', $links );
  return $links;
 }
 add_filter( 'get_archives_link', 'kipso_archive_count' );

function kipso_limit_words($word_limit, $string, $string_second = ''){
  if(empty($string)){
    $string = strip_tags($string_second);
  }
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  $text = implode(' ', $words);
  echo esc_html($text);
}

if(!function_exists('kipso_get_options')){
  function kipso_get_options(){
    global $kipso_theme_options;
    return $kipso_theme_options;
  }
}

if(!function_exists('kipso_get_option')){
  function kipso_get_option($key, $default = ''){
    global $kipso_theme_options;
    if(isset($kipso_theme_options[$key]) && $kipso_theme_options[$key]){
      return $kipso_theme_options[$key];
    }else{
      return $default;
    }
  }
}

if(!function_exists('kipso_random_id')){
  function kipso_random_id($length=4){
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $string = '';
    for ($i = 0; $i < $length; $i++) {
      $string .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $string;
  }
}  

if(!function_exists('kipso_woocommerce_activated')){
  /* Check if WooCommerce is activated */
  function kipso_woocommerce_activated() {
    if ( class_exists('WooCommerce') ) { 
      return true; 
    }
    return false;
  }
}

if(!function_exists('kipso_convert_hextorgb')){
  function kipso_convert_hextorgb($hex, $alpha = false) {
    $hex = str_replace('#', '', $hex);
    if ( strlen($hex) == 6 ) {
      $rgb['r'] = hexdec(substr($hex, 0, 2));
      $rgb['g'] = hexdec(substr($hex, 2, 2));
      $rgb['b'] = hexdec(substr($hex, 4, 2));
    }else if ( strlen($hex) == 3 ) {
      $rgb['r'] = hexdec(str_repeat(substr($hex, 0, 1), 2));
      $rgb['g'] = hexdec(str_repeat(substr($hex, 1, 1), 2));
      $rgb['b'] = hexdec(str_repeat(substr($hex, 2, 1), 2));
    }else {
      $rgb['r'] = '0';
      $rgb['g'] = '0';
      $rgb['b'] = '0';
     }
     if ( $alpha ) {
      $rgb['a'] = $alpha;
    }
    return $rgb;
  }
}

function kipso_protocol_html(){
  return (is_ssl() ? 'https' : 'http');
}

function kipso_scheme_colors(){
  $results = array();
  $results[''] = esc_html__('--None--', 'kipso');
  $colors = oxpitan_get_option('scheme_color');
  if(!$colors) $colors = array('Turquoise[#00BDC0]', 'Tomato[#F86048]', 'GoldenRod[#FFA940]', 'Violet[#9238A4]');
  foreach ($colors as $color_tmp) {
    $title = $color = '';
    $tmp = explode('[', $color_tmp);
    $title = isset($tmp[0]) ? $tmp[0] : ''; 
    $color = isset($tmp[1]) ? str_replace(']', '', $tmp[1]) : ''; 
    if(!empty($title) && !empty($color)){
      $results[str_replace('-', ' ', strtolower($title))] = $title;
    }
  }
  return $results;
}


  function kipso_comment_template($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
      <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div id="comment-<?php comment_ID(); ?>" class="the-comment media-comment">
          <div class="media-comment-left">
            <div class="author-image"><?php echo get_avatar($comment,$size='48'); ?></div>
          </div>
          <div class="comment-box media-comment-body">  
            <div class="author-meta">
              <?php printf('<cite class="fn">%s</cite>', get_comment_author_link()) ?>
              <span class="comment-info">
                <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(esc_html__('%1$s at %2$s', 'kipso'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(esc_html__('(Edit)', 'kipso'),'  ','') ?>
              </span>
              <?php if(class_exists('Gavias_Themer_Comment')){ ?>
                <div class="comment-rate">
                  <?php
                    $rate = get_comment_meta($comment->comment_ID, 'rate');
                    if (isset($rate[0]) && $rate[0] <> '') {
                      echo Gavias_Themer_Comment::getInstance()->comment_rate($rate[0]);
                    }
                  ?>
                </div>
               <?php } ?> 
            </div> 
            <?php if ($comment->comment_approved == '0') : ?>
              <em><?php echo esc_html__('Your comment is awaiting moderation.', 'kipso') ?></em>
              <br />
            <?php endif; ?>

            <div class="comment-body">
              <?php comment_text(); ?>
            </div>  
            <div class="reply">
              <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            </div>
          </div>
        </div> 
      </li>  
    <?php
  }