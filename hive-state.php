<?php

/**
	* Plugin Name:	Hive State
	* Plugin URI:	http://obrientrombone.com
	* Description:	A tool for tracking beehive inspection reports
	* Version:		1.0
	* Requires PHP:	7.2
	* Author:		Chad O'Brien
	* Text Domain:	hive-state
 */

function hive_state_activate() {
	if ( !current_user_can('activate_plugins') ) return;
	
	global $wpdb;
	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	
	if ( null === $wpdb->get_row( "SELECT post_name FROM {$wpdb->prefix}posts WHERE post_name = 'hive-state'", 'ARRAY_A' ) ) {
	
		$current_user = wp_get_current_user();
		
		// create post object
		$page = array(
			'post_title'  	=>	'Hive State',
			'post_status' 	=>	'publish',
			'post_author' 	=>	$current_user->ID,
			'post_type'   	=>	'page',
			'post_content'	=>	'',
		);
		
		// insert the post into the database
		wp_insert_post( $page );
	}
}
register_activation_hook(__FILE__, 'hive_state_activate');

function hive_state_deactivate() {
	global $wpdb;
	$post_id = get_page_by_path('hive-state')->ID;
	wp_delete_post( $post_id, true );
}
register_deactivation_hook(__FILE__, 'hive_state_deactivate');

function hive_state_admin() {

	?>
	<header class="wrap">
		<h1 class="wp-heading-inline">Hive State</h1>
		<hr>
	</header>
	<p>Access Hive State at {your-site}/hive-state</p>
	<?php
}

function add_hive_state_dashboard_menu_item() {
	add_menu_page(
		'Hive State',
		'Hive State',
		'manage_options',
		'hive-state-admin',
		'hive_state_admin',
		'dashicons-buddicons-replies',
		6
	);
}
add_action( 'admin_menu', 'add_hive_state_dashboard_menu_item', 999 );

add_action('wp_enqueue_scripts', function(){
	wp_enqueue_script( 'hive_state_js', plugin_dir_url( __FILE__ ).'/hive-state-scripts.js', array(), false, true );
	wp_enqueue_style( 'hive_state_styles', plugin_dir_url( __FILE__ ).'/hive-state-styles.css');
	wp_enqueue_style( 'dashicons' );
} );

require_once 'hive-state-functions.php';