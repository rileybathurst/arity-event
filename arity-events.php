<?php

/**
	* Plugin Name: Arity Events
	* Plugin URI:        https://github.com/rileybathurst/arity-events/
	* Description:       Upcoming events.
	* Version:           1

	* Author:            Riley Bathurst
	* Author URI:        https://rileybathurst.com/
	* License:           GPL v2 or later
	* License URI:       https://www.gnu.org/licenses/gpl-2.0.html
	* Text Domain:       arityevents
	* Domain Path:       /languages
*/

// * Requires at least: 5.2
// * Requires PHP:      7.2
// * Update URI:        https://example.com/my-plugin/

/**
 * Register the "book" custom post type
*/
function arityevents_setup_post_type() {
	register_post_type( 'arity_event',
	array(
		'labels'			=> array(
			'name'			=> __('Events'),
			'singular_name'	=> __('Events'),
		),
		'public'			=> true,
		'has_archive'		=> true,
		'show_in_rest' 		=> true,
		'rewrite'			=> array( 'slug' => 'events' ),
		'supports'			=> array( 
			'title',
			'editor',
			'author',
			'thumbnail',
			'excerpt',
			)
	) ); 
} 
add_action( 'init', 'arityevents_setup_post_type' );

/**
 * Activate the plugin.
 */
function arityevents_activate() { 
    // Trigger our function that registers the custom post type plugin.
    arityevents_setup_post_type(); 
    // Clear the permalinks after the post type has been registered.
    flush_rewrite_rules(); 
}
register_activation_hook( __FILE__, 'arityevents_activate' );

/**
 * Deactivation hook.
 */
function arityevents_deactivate() {
    // Unregister the post type, so the rules are no longer in memory.
    unregister_post_type( 'events' );
    // Clear the permalinks to remove our post type's rules from the database.
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'arityevents_deactivate' );

/**
	* uninstall
*/

// 🚨
// register_uninstall_hook(__FILE__, 'arityevents_function_to_run');

/**
	* get the files
*/

include_once plugin_dir_path( __FILE__ ) . 'event-date.php';
include_once plugin_dir_path( __FILE__ ) . 'panel.js';
