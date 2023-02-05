<?php

function wptrac55985_twentytwelve_new_fonts_url() {
	return get_stylesheet_directory_uri() . '/assets/fonts/noto-sans-font.css';
}

function wptrac55985_dequeue_font_script() {
	wp_dequeue_style( 'twentytwelve-fonts' );
	wp_enqueue_style(
		'twentytwelve-new-font',
		wptrac55985_twentytwelve_new_fonts_url(),
		array(),
		false,
		'all'
	);
}
add_action( 'wp_enqueue_scripts', 'wptrac55985_dequeue_font_script', 11 );
add_action( 'enqueue_block_editor_assets', 'wptrac55985_dequeue_font_script', 11 );

function wptrac55985_replace_font_in_classic_editor( $mce_css ) {
	remove_filter( 'mce_css', 'twentytwelve_mce_css' );
	$mce_css .= ',' . wptrac55985_twentytwelve_new_fonts_url();
	// Add stylesheet with custom font.
	$mce_css .= ',' . get_stylesheet_directory_uri() . '/css/editor-style.css';

	return $mce_css;
}
add_filter( 'mce_css', 'wptrac55985_replace_font_in_classic_editor', 9 );

/*
	// Try this instead ONLY IF the function becomes pluggable with `function_exists`.
	function twentytwelve_get_font_url() {
		return get_stylesheet_directory_uri() . '/assets/fonts/noto-sans-font.css';
	}
*/


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

function wptrac55985_enqueue_editor_block_styles() {
	wp_enqueue_style(
		'twentytwelve-child-editor-blocks',
		get_stylesheet_directory_uri() . '/css/editor-blocks.css',
		array(),
		false,
		'all'
	);
}
add_action( 'enqueue_block_editor_assets', 'wptrac55985_enqueue_editor_block_styles', 11 );
