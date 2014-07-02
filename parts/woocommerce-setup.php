<?php

// WooCommerce functions

if ( ! function_exists( 'reinnervate_woocommerce_setup' ) ) :
  function reinnervate_woocommerce_setup() {
    add_theme_support( 'woocommerce' );
  }
endif;
add_action( 'after_setup_theme', 'reinnervate_woocommerce_setup' );

/**
 * Set Default Thumbnail Sizes for Woo Commerce Product Pages, on Theme Activation
*/
global $pagenow;

if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) add_action( 'init', 'dazzling_woocommerce_image_dimensions', 1 );
/**
 * Define image sizes
*/
function dazzling_woocommerce_image_dimensions() {
  $catalog = array(
		'width' 	=> '350',	// px
		'height'	=> '453',	// px
		'crop'		=> 1 		// true
	);
	$single = array(
		'width' 	=> '570',	// px
		'height'	=> '708',	// px
		'crop'		=> 1 		// true
	);
	$thumbnail = array(
		'width' 	=> '350',	// px
		'height'	=> '453',	// px
		'crop'		=> 0 		// false
	);
	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
	update_option( 'shop_single_image_size', $single ); 		// Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
}

/*
 * Add basic WooCommerce template support
 *
 */

// Remove original WooCommerce wrappers
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// Add Reinnervate wrappers
add_action('woocommerce_before_main_content', 'reinnervate_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'reinnervate_wrapper_end', 10);

function reinnervate_wrapper_start() {
  echo '<div id="content" class="site-content container">';
  echo '<div id="primary" class="content-area col-sm-12 col-md-8 '.of_get_option('site_layout').' ">';
  echo '<main id="main" class="site-main" role="main">';
}

function reinnervate_wrapper_end() {
  echo '</main></div>';
}

// Replace WooComemrce button class with Bootstrap
/*add_filter('woocommerce_loop_add_to_cart_link', 'dazzling_commerce_switch_buttons');

function reinnervate_commerce_switch_buttons( $button ){

  $button = str_replace('button', 'btn btn-default', $button);

  return $button;

}*/

/**
 * Place a cart icon with number of items and total cost in the menu bar.
 */
function reinnervate_woomenucart($menu, $args) {

	// Check if WooCommerce is active and add a new item to a menu assigned to Primary Navigation Menu location
	if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || 'primary' !== $args->theme_location )
		return $menu;

	ob_start();
		global $woocommerce;
		$viewing_cart = __('View your shopping cart', 'reinnervate');
		$start_shopping = __('Start shopping', 'reinnervate');
		$cart_url = $woocommerce->cart->get_cart_url();
		$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
		$cart_contents_count = $woocommerce->cart->cart_contents_count;
		$cart_contents = sprintf(_n('%d item', '%d items', $cart_contents_count, 'reinnervate'), $cart_contents_count);
		$cart_total = $woocommerce->cart->get_cart_total();
    if ($cart_contents_count == 0) {
      $menu_item = '<li class="pull-right"><a class="woo-menu-cart" href="'. $shop_page_url .'" title="'. $start_shopping .'">';
    } else {
      $menu_item = '<li class="pull-right"><a class="woo-menu-cart" href="'. $cart_url .'" title="'. $viewing_cart .'">';
    }
    $menu_item .= '<i class="fa fa-shopping-cart"></i> ';
    $menu_item .= $cart_contents.' - '. $cart_total;
    $menu_item .= '</a></li>';

		echo $menu_item;
	$social = ob_get_clean();
	return $menu . $social;

}
add_filter('wp_nav_menu_items','reinnervate_woomenucart', 10, 2);
