<?php
/*
Plugin Name: Custom top bar
Plugin URI: http://developersuman.orgfree.com/
Description: You can easily customize page top bar with background color,contact number social links and a custom buttom
Author: Suman Biswas
Version: 2.0.2

Copyright 2015 Custom top bar/Suman Biswas.

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
	
*/

add_action( 'wp_head', 'ctb_include_styles' );
add_action( 'wp_head', 'ctb_include_bar' );
add_action( 'init', 'ctb_create_social_post' );
add_action( 'add_meta_boxes', 'ctb_social_post_meta_box' );
add_action( 'save_post', 'ctb_save_social_link_meta_vale',10,3 );
add_action('do_meta_boxes', 'ctb_change_image_box');
add_action('admin_head-post-new.php','ctb_change_thumbnail_html');
add_action('admin_head-post.php','ctb_change_thumbnail_html');
add_action('admin_menu', 'ctb_register_fallback_page');
add_action('admin_enqueue_scripts', 'ctb_include_Colorpicker');

function ctb_include_styles()
{
	wp_enqueue_style( 'style', plugins_url( 'css/bar.css', __FILE__ ));
}

function ctb_include_bar()
{
	include_once('top_bar.php');
}

function ctb_create_social_post()
{
	register_post_type( 'social-post',
		array(
			'labels' => array(
				'name' => __( 'Top Bar Section' ),
				'singular_name' => __( 'Social Link' ),
				'add_new' => __( 'Add New Social Link' ),
				'add_new_item' => __( 'Add New Social Link' ),
				'edit' => __( 'Edit' ),
				'edit_item' => __( 'Edit Social Link' ),
				'new_item' => __( 'New Social Link' ),
				'view' => __( 'View Social Link' ),
				'view_item' => __( 'View Social Link' ),
				'search_items' => __( 'Search Social Link' ),
				'not_found' => __( 'No Social Link found' ),
				'not_found_in_trash' => __( 'No Social Link found in Trash' ),
				'parent' => __( 'Parent Social Link' ),
			),
			'public' => true,
			'show_ui' => true,
			'publicly_queryable' => true,
			'show_in_nav_menus' => false,
			'menu_icon' => null,
			'capability_type' => 'post',
			'exclude_from_search' => true,
			'hierarchical' => false,
			'supports' => array('title', 'thumbnail'),
		)
	);
	flush_rewrite_rules();
}

function ctb_social_post_meta_box()
{
	add_meta_box( 'ctb_slug', __( 'Social Link', 'ctb_code_domain' ),'ctb_inner_custom','social-post');
}

function ctb_inner_custom($post)
{
	$social_link = get_post_meta( $post->ID, $key = 'social_link', $single = true );
	?>
    	<table >
        	<tr>
            	<td>Link : </td>
                <td><input type="text" name="social_link" id="social_link" value="<?php echo $social_link; ?>" style="width:350px;"  /></td>
            </tr>
        </table>
    <?php
}

function ctb_save_social_link_meta_vale($postID,$post,$update)
{
	global $devices;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

  	if ( 'social-post' == $post->post_type ) {
		
		$code = sanitize_text_field( $_POST['social_link'] );
		update_post_meta($postID, 'social_link', $code);
	}
	
}

function ctb_change_image_box()
{
    remove_meta_box( 'postimagediv', 'social-post', 'side' );
    add_meta_box('ct_postimagediv', __('Social Icon'), 'post_thumbnail_meta_box', 'social-post', 'normal', 'high');
}


function ctb_change_thumbnail_html( $content ) {
    if ('social-post' == $GLOBALS['post_type'])
      add_filter('admin_post_thumbnail_html',ctb_do_thumb);
}
function ctb_do_thumb($content){
	 return str_replace(__('Set featured image'), __('Social Icon'),$content);
}

function ctb_register_fallback_page() {
	add_submenu_page( 'edit.php?post_type=social-post', 'Top Bar Setting', 'Top Bar Setting', 'manage_options', 'ctb_fallback_setting', 'ctb_fallback_setting_callback' );
}

function ctb_fallback_setting_callback()
{
	include_once('setting.php');	
}

function ctb_include_Colorpicker(){
	wp_enqueue_style( 'wp-color-picker');
	wp_enqueue_script( 'wp-color-picker');
}
add_image_size('social_image_small', 16, 16, true);
add_image_size('social_image_medium', 32, 32, true);
add_image_size('social_image_large', 48, 48, true);

?>