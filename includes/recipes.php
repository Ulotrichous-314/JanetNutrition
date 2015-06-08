<?php

/* 
 * Custom post type for recipes
 * @since Janet Nutrition 0.1.6
 */

/*
 * Creates custom post type called 'recipe'
 * 
 * @since Janet Ledsham 0.0
 */

//A helper function for generating labels
function post_type_labels( $singular, $plural = '' ) {
	if( $plural == '') $plural = $singular.'s';
	return array(
		'name' => _x( $plural, 'post type general name'),
		'singular_name' => _x( $singular, 'post type singular name'),
		'add_new' => __('Add New'),
		'add_new_item' => __('Add New '.$singular),
		'edit_item' => __('Edit '.$singular),
		'new_item' => __('New '.$singular),
		'view_item' => __('View '.$singular),
		'search_items' => __('Search '.$plural),
		'not_found' => __('No '.$plural.' found'),
		'not_found_in_trash' => __('No '.$plural.' found in Trash'),
		'parent_item_colon' => ''
	);
}


//Create the post type
function jn_create_post_type() {
	$args = array(
	'labels' => post_type_labels('Recipe'),
	'public' => true,
	'publicly_queryable' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'query_var' => true,
	'rewrite' => true,
	'capability_type' => 'post',
	'has-archive' => true,
	'hierarchical' => false,
	'menu_position' => null,
	'supports' => array('title','editor','author','thumbnail','exerpt','comments','revisions')
	);
	register_post_type('recipe',$args);
}
add_action('init','jn_create_post_type');

//Create custom taxonomy 
function jn_recipe_taxonomies() {
    $labels = array(
        'name'              => _x( 'Recipe Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Recipe Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Recipe Categories' ),
        'all_items'         => __( 'All Recipe Categories' ),
        'parent_item'       => __( 'Parent Recipe Category' ),
        'parent_item_colon' => __( 'Parent Recipe Category:' ),
        'edit_item'         => __( 'Edit Recipe Category' ), 
        'update_item'       => __( 'Update Recipe Category' ),
        'add_new_item'      => __( 'Add New Recipe Category' ),
        'new_item_name'     => __( 'New Recipe Category' ),
        'menu_name'         => __( 'Recipe Categories' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
    );
    register_taxonomy('recipe_category','recipe', $args);
}
add_action('init', 'jn_recipe_taxonomies',0);

//Create meta box for recipe info
function recipe_info_box() {
    add_meta_box(
        'recipe_info_box',
        __('Recipe Info', 'jn'),
        'recipe_info_box_contents',
        'recipe',
        'side',
        'high'
    ); 
}
add_action('add_meta_boxes','recipe_info_box');

//Content for recipe info box
function recipe_info_box_contents() {
    wp_nonce_field( basename( __FILE__ ), 'recipe_info_box_content_nonce' );
    echo '<label for="recipe_preparation_time">Preparation Time:  </label>';
    echo '<input type="number" id="recipe_preparation_time" placeholder="0" style="width:60px" />';
    echo '</br>';
    echo '<label for="recipe_cooking_time">Cooking Time:  </label>';
    echo '<input type="number" id="recipe_cooking_time" placeholder="0" style="width:60px" />';
    echo '</br>';
    echo '<label for="thermomix">Thermomix </label>';
    echo '<input type="checkbox" id="thermomix" value="Thermomix" />';
}

//Function to save recipe info
function recipe_info_box_save($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;
    
    if ( !wp_verify_nonce( $_POST['recipe_info_box_content_nonce'], plugin_basename( __FILE__ ) ) )
        return;

    if ( 'page' == $_POST['post_type'] ) {
      if ( !current_user_can( 'edit_page', $post_id ) )
        return;
    } else {
      if ( !current_user_can( 'edit_post', $post_id ) )
        return;
    } 
    $preparation_time = $_POST['recipe_preparation_time'];
    $cooking_time = $_POST['recipe_cooking_time'];
    update_post_meta( $post_id, 'recipe_preparation_time', $preparation_time);
    update_post_meta( $post_id, 'recipe_cooking_time');
}

?>