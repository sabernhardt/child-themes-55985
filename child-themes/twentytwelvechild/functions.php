<?php

/* ==== Enqueue stylesheets ==== */

function wptrac55985_add_parent_styles() {
	wp_enqueue_style(
		'twentytwelve-parent',
		get_template_directory_uri() . '/style.css',
		array(),
		false,
		'all'
	);
}
add_action( 'wp_enqueue_scripts', 'wptrac55985_add_parent_styles', 10 );
