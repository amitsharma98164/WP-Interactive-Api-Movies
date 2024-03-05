<?php

function setup_theme() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'setup_theme' );

function enqueue_editor_styles() {
	wp_enqueue_style( 'editor-style', get_theme_file_uri( '/editor-style.css' ) );
}
add_action( 'enqueue_block_editor_assets', 'enqueue_editor_styles' );

function create_header_navigation() {

	$query = new WP_Query(
		array(
			'title'          => 'Header navigation',
			'post_type'      => 'wp_navigation',
			'posts_per_page' => 1,
		)
	);
	$pages = $query->posts;
	if ( ! empty( $pages ) ) {
		return null;
	}
	$header_navigation = array(
		'import_id'    => 123456789, // A magic number that is also used in the header.html file.
		'post_title'   => 'Header navigation',
		'post_status'  => 'publish',
		'post_type'    => 'wp_navigation',
		'post_name'    => 'header-navigation',
		'post_content' => '<!-- wp:navigation-link {"label":"Movies","url":"/","title":"Movies","kind":"custom","isTopLevelLink":true} /--> <!-- wp:navigation-link {"label":"Actors","url":"/actors","title":"Actors","kind":"custom","isTopLevelLink":true} /-->',
	);
	wp_insert_post( $header_navigation );

}
add_action( 'wp_loaded', 'create_header_navigation' );

// Register Custom Post Type
function custom_post_type_movies() {

    $labels = array(
        'name'                  => _x( 'Movies', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Movie', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Movies', 'text_domain' ),
        'name_admin_bar'        => __( 'Movie', 'text_domain' ),
        'archives'              => __( 'Movie Archives', 'text_domain' ),
        'attributes'            => __( 'Movie Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Movie:', 'text_domain' ),
        'all_items'             => __( 'All Movies', 'text_domain' ),
        'add_new_item'          => __( 'Add New Movie', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Movie', 'text_domain' ),
        'edit_item'             => __( 'Edit Movie', 'text_domain' ),
        'update_item'           => __( 'Update Movie', 'text_domain' ),
        'view_item'             => __( 'View Movie', 'text_domain' ),
        'view_items'            => __( 'View Movies', 'text_domain' ),
        'search_items'          => __( 'Search Movie', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into movie', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this movie', 'text_domain' ),
        'items_list'            => __( 'Movies list', 'text_domain' ),
        'items_list_navigation' => __( 'Movies list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter movies list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Movie', 'text_domain' ),
        'description'           => __( 'Post Type Description', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    register_post_type( 'movies', $args );

}
add_action( 'init', 'custom_post_type_movies', 0 );

// Register Custom Taxonomy
function custom_taxonomy_actors_tax() {

    $labels = array(
        'name'                       => _x( 'Actors', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Actor', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Actors', 'text_domain' ),
        'all_items'                  => __( 'All Actors', 'text_domain' ),
        'parent_item'                => __( 'Parent Actor', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Actor:', 'text_domain' ),
        'new_item_name'              => __( 'New Actor Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New Actor', 'text_domain' ),
        'edit_item'                  => __( 'Edit Actor', 'text_domain' ),
        'update_item'                => __( 'Update Actor', 'text_domain' ),
        'view_item'                  => __( 'View Actor', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate actors with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove actors', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Actors', 'text_domain' ),
        'search_items'               => __( 'Search Actors', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
        'no_terms'                   => __( 'No actors', 'text_domain' ),
        'items_list'                 => __( 'Actors list', 'text_domain' ),
        'items_list_navigation'      => __( 'Actors list navigation', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'               => true,
    );
    register_taxonomy( 'actors_tax', array( 'post' ), $args );

}
add_action( 'init', 'custom_taxonomy_actors_tax', 0 );


// Register Custom Post Type
function custom_post_type_actors() {

    $labels = array(
        'name'                  => _x( 'Actors', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Actor', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Actors', 'text_domain' ),
        'name_admin_bar'        => __( 'Actor', 'text_domain' ),
        'archives'              => __( 'Actor Archives', 'text_domain' ),
        'attributes'            => __( 'Actor Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Actor:', 'text_domain' ),
        'all_items'             => __( 'All Actors', 'text_domain' ),
        'add_new_item'          => __( 'Add New Actor', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Actor', 'text_domain' ),
        'edit_item'             => __( 'Edit Actor', 'text_domain' ),
        'update_item'           => __( 'Update Actor', 'text_domain' ),
        'view_item'             => __( 'View Actor', 'text_domain' ),
        'view_items'            => __( 'View Actors', 'text_domain' ),
        'search_items'          => __( 'Search Actor', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into actor', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this actor', 'text_domain' ),
        'items_list'            => __( 'Actors list', 'text_domain' ),
        'items_list_navigation' => __( 'Actors list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter actors list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Actor', 'text_domain' ),
        'description'           => __( 'Post Type Description', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    register_post_type( 'actors', $args );

}
add_action( 'init', 'custom_post_type_actors', 0 );


/**
 * Add a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
function wporg_add_dashboard_widgets() {
	wp_add_dashboard_widget(
		'wporg_dashboard_widget',                          // Widget slug.
		esc_html__( 'Example Dashboard Widget', 'wporg' ), // Title.
		'wporg_dashboard_widget_render'                    // Display function.
	); 
}
add_action( 'wp_dashboard_setup', 'wporg_add_dashboard_widgets' );

/**
 * Create the function to output the content of our Dashboard Widget.
 */
function wporg_dashboard_widget_render() {
	// Display whatever you want to show.
	esc_html_e( "Howdy! I'm a great Dashboard Widget.", "wporg" );
}