<?php

//add_filter( 'show_admin_bar', '__return_false' );

/*
Clean up wp_head()
*/
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

/*
Show less info to users on failed login for security.
(Will not let a valid username be known.)
*/
function show_less_login_info() { 
    return "<strong>ERROR</strong>: Stop gressing!"; }
add_filter( 'login_errors', 'show_less_login_info' );

/*
Do not generate and display WordPress version
*/
function no_generator()  { 
    return ''; }
add_filter( 'the_generator', 'no_generator' );	

/*
Filters to remove IDs and classes from menu items
http://stackoverflow.com/questions/5222140/remove-li-class-id-for-menu-items-and-pages-list
*/
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {
  return is_array($var) ? array() : '';
}

/*
Filter to remove comment author webaite link. Use this if you wish to cut down the amount of spammers in your comments (while retaining the "Your website" comment field).
See http://www.wpsquare.com/remove-comment-author-website-link-wordpress/
*/
function author_link(){
	global $comment;
	$comment_ID = $comment->user_id;
	$author = get_comment_author( $comment_ID );
	$url = get_comment_author_url( $comment_ID );
	if ( empty( $url ) || 'http://' == $url )
		$return = $author;
	else
		$return = "$author";
	return $return;
}
add_filter('get_comment_author_link', 'author_link');

/*
Rewrites
See http://gist.github.com/wycks/2315295
To which I have added the final (was missing) "}" and the fonts/ folder.

Rewrite /wp-content/themes/theme-name/css/ to /css/
Rewrite /wp-content/themes/theme-name/js/ to /js/
Rewrite /wp-content/themes/theme-name/fonts/ to /fonts/
Rewrite /wp-content/themes/theme-name/img/ to /img/
Rewrite /wp-content/plugins/ to /plugins/
*/

function bst_flush_rewrites()  {
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
 
function bst_add_rewrites($content)  {
  $theme_name = next(explode('/themes/', get_stylesheet_directory()));
  global $wp_rewrite;
  $bst_new_non_wp_rules = array(
    'css/(.*)' => 'wp-content/themes/'. $theme_name . '/css/$1',
    'js/(.*)' => 'wp-content/themes/'. $theme_name . '/js/$1',
    'fonts/(.*)' => 'wp-content/themes/'. $theme_name . '/fonts/$1',
    'img/(.*)' => 'wp-content/themes/'. $theme_name . '/img/$1',
    'plugins/(.*)' => 'wp-content/plugins/$1'
  );
  $wp_rewrite->non_wp_rules += $bst_new_non_wp_rules;
}
 
add_action('admin_init', 'bst_flush_rewrites');
 
function bst_clean_assets($content) {
    $theme_name = next(explode('/themes/', $content));
    $current_path = '/wp-content/themes/' . $theme_name;
    $new_path = '';
    $content = str_replace($current_path, $new_path, $content);
    return $content;
}
 
function bst_clean_plugins($content)  {
    $current_path = '/wp-content/plugins';
    $new_path = '/plugins';
    $content = str_replace($current_path, $new_path, $content);
    return $content;
}
 
add_action('generate_rewrite_rules', 'bst_add_rewrites');
if (!is_admin()) {
  add_filter('plugins_url', 'bst_clean_plugins');
  add_filter('bloginfo', 'bst_clean_assets');
  add_filter('stylesheet_directory_uri', 'bst_clean_assets');
  add_filter('template_directory_uri', 'bst_clean_assets');
  add_filter('script_loader_src', 'bst_clean_plugins');
  add_filter('style_loader_src', 'bst_clean_plugins');
}

?>