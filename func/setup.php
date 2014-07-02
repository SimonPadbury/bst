<?php

function bst_setup() {
  add_editor_style('css/editor-style.css');
  add_theme_support('post-thumbnails');
	update_option('thumbnail_size_w', 170);
  update_option('medium_size_w', 470);
  update_option('large_size_w', 970);

}
add_action('init', 'bst_setup');

if (! isset($content_width))
	$content_width = 600;

function bst_search_form( $form ) {
    $form = '<form class="form-inline" role="search" method="get" id="searchform" action="' . home_url('/') . '" >
    <div class="form-group">
		    <input class="form-control" type="text" value="' . get_search_query() . '" name="s" id="s" />
    </div>
		<button type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> '. esc_attr__('Search') .'</button>
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'bst_search_form' );

function bst_excerpt_readmore() {
    return '&nbsp; <a href="'. get_permalink() . '">' . '&hellip; Read more <i class="glyphicon glyphicon-arrow-right"></i>' . '</a></p>';
}
add_filter('excerpt_more', 'bst_excerpt_readmore');

/*  Browser detection body_class() output
/* ------------------------------------ */ 
function bst_browser_body_class( $classes ) {
    global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
 
    if($is_lynx) $classes[] = 'lynx';
    elseif($is_gecko) $classes[] = 'gecko';
    elseif($is_opera) $classes[] = 'opera';
    elseif($is_NS4) $classes[] = 'ns4';
    elseif($is_safari) $classes[] = 'safari';
    elseif($is_chrome) $classes[] = 'chrome';
    elseif($is_IE) {
        $browser = $_SERVER['HTTP_USER_AGENT'];
        $browser = substr( "$browser", 25, 8);
        if ($browser == "MSIE 7.0"  ) {
            $classes[] = 'ie7';
            $classes[] = 'ie';
        } elseif ($browser == "MSIE 6.0" ) {
            $classes[] = 'ie6';
            $classes[] = 'ie';
        } elseif ($browser == "MSIE 8.0" ) {
            $classes[] = 'ie8';
            $classes[] = 'ie';
        } elseif ($browser == "MSIE 9.0" ) {
            $classes[] = 'ie9';
            $classes[] = 'ie';
        } else {
            $classes[] = 'ie';
        }
    }
    else $classes[] = 'unknown';
 
    if( $is_iphone ) $classes[] = 'iphone';
 
    return $classes;
}
add_filter( 'body_class', 'bst_browser_body_class' );

add_theme_support( 'woocommerce' );
