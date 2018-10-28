<?php 
	 add_action( 'wp_enqueue_scripts', 'unite_child_enqueue_styles' );
	 function unite_child_enqueue_styles() {
 		  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
 		  } 

// Register Custom Post Type
function films_post_type() {

	$labels = array(
		'name'                  => _x( 'Films', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Film', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Films', 'text_domain' ),
		'name_admin_bar'        => __( 'Film', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Film:', 'text_domain' ),
		'all_items'             => __( 'All Films', 'text_domain' ),
		'add_new_item'          => __( 'Add New Film', 'text_domain' ),
		'add_new'               => __( 'New Film', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Film', 'text_domain' ),
		'update_item'           => __( 'Update Film', 'text_domain' ),
		'view_item'             => __( 'View Film', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search films', 'text_domain' ),
		'not_found'             => __( 'No films found', 'text_domain' ),
		'not_found_in_trash'    => __( 'No films found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Film', 'text_domain' ),
		'description'           => __( 'Film information pages.', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'page-attributes', 'genre', 'year', 'post-formats' ),
		'taxonomies'            => array( 'category', 'genre', 'year', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'menu_icon'             => 'dashicons-video-alt',
		'exclude_from_search' => false,
	        'yarpp_support'       => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'film', $args );

}
add_action( 'init', 'films_post_type', 0 );

//////////////For texomonies///////////////////

// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_film_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_film_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Genres', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Genre', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Genres', 'textdomain' ),
		'all_items'         => __( 'All Genres', 'textdomain' ),
		'parent_item'       => __( 'Parent Genre', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Genre:', 'textdomain' ),
		'edit_item'         => __( 'Edit Genre', 'textdomain' ),
		'update_item'       => __( 'Update Genre', 'textdomain' ),
		'add_new_item'      => __( 'Add New Genre', 'textdomain' ),
		'new_item_name'     => __( 'New Genre Name', 'textdomain' ),
		'menu_name'         => __( 'Genre', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
        'show_tagcloud'     => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'genre' ),
	);

	register_taxonomy( 'genre', array( 'film' ), $args );

	// Add new taxonomy, NOT hierarchical (like tags)
	$labels = array(
		'name'                       => _x( 'Years', 'taxonomy general name', 'textdomain' ),
		'singular_name'              => _x( 'Year', 'taxonomy singular name', 'textdomain' ),
		'search_items'               => __( 'Search Years', 'textdomain' ),
		'popular_items'              => __( 'Popular Years', 'textdomain' ),
		'all_items'                  => __( 'All Years', 'textdomain' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Year', 'textdomain' ),
		'update_item'                => __( 'Update Year', 'textdomain' ),
		'add_new_item'               => __( 'Add New Year', 'textdomain' ),
		'new_item_name'              => __( 'New Year Name', 'textdomain' ),
		'separate_items_with_commas' => __( 'Separate years with commas', 'textdomain' ),
		'add_or_remove_items'        => __( 'Add or remove years', 'textdomain' ),
		'choose_from_most_used'      => __( 'Choose from the most used years', 'textdomain' ),
		'not_found'                  => __( 'No years found.', 'textdomain' ),
		'menu_name'                  => __( 'Years', 'textdomain' ),
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'public'                => true,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'show_in_nav_menus'     => true,
        'show_tagcloud'         => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'year' ),
	);

	register_taxonomy( 'year', 'film', $args );
	
	
	
	$labels = array(
		'name'              => _x( 'Countries', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Country', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Countries', 'textdomain' ),
		'all_items'         => __( 'All Countries', 'textdomain' ),
		'parent_item'       => __( 'Parent Country', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Country:', 'textdomain' ),
		'edit_item'         => __( 'Edit Country', 'textdomain' ),
		'update_item'       => __( 'Update Country', 'textdomain' ),
		'add_new_item'      => __( 'Add New Country', 'textdomain' ),
		'new_item_name'     => __( 'New Country Name', 'textdomain' ),
		'menu_name'         => __( 'Country', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
        'show_tagcloud'     => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'country' ),
	);

	register_taxonomy( 'country', array( 'film' ), $args );

	// Add new taxonomy, NOT hierarchical (like tags)
	$labels = array(
		'name'                       => _x( 'Actors', 'taxonomy general name', 'textdomain' ),
		'singular_name'              => _x( 'Actor', 'taxonomy singular name', 'textdomain' ),
		'search_items'               => __( 'Search Actors', 'textdomain' ),
		'popular_items'              => __( 'Popular Actors', 'textdomain' ),
		'all_items'                  => __( 'All Actors', 'textdomain' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Actor', 'textdomain' ),
		'update_item'                => __( 'Update Actor', 'textdomain' ),
		'add_new_item'               => __( 'Add New Actor', 'textdomain' ),
		'new_item_name'              => __( 'New Actor Name', 'textdomain' ),
		'separate_items_with_commas' => __( 'Separate actors with commas', 'textdomain' ),
		'add_or_remove_items'        => __( 'Add or remove actors', 'textdomain' ),
		'choose_from_most_used'      => __( 'Choose from the most used actors', 'textdomain' ),
		'not_found'                  => __( 'No actors found.', 'textdomain' ),
		'menu_name'                  => __( 'Actors', 'textdomain' ),
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'public'                => true,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'show_in_nav_menus'     => true,
        'show_tagcloud'         => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'actors' ),
	);

	register_taxonomy( 'actors', 'film', $args );
	
	
}

function recent_film_post()
 {
  global $post;

  $html = "";

  $my_query = new WP_Query( array(
       'post_type' => 'film',
       'posts_per_page' => 5
  ));

  if( $my_query->have_posts() ) : while( $my_query->have_posts() ) : $my_query->the_post();

       $html .= "<h2>" . get_the_title() . " </h2>";
	   $html .= "<h5>" . get_the_date() . "</h5>";
       $html .= "<p>" . get_the_excerpt() . "</p>";
       $html .= "<a href=\"" . get_permalink() . "\" class=\"button\">Read more</a><br/>";
	   

  endwhile; endif;

  return $html;
 }
 add_shortcode( 'recent_films', 'recent_film_post' );



add_filter( 'widget_text', 'do_shortcode' );


////////////////////////////////

////////////////For custom post search ////////////////////	

////////////////////////////////





 ?>