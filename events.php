<?php

function arity_events()
{
	register_post_type('arity_event',
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
		)
	);
}
add_action('init', 'arity_events');