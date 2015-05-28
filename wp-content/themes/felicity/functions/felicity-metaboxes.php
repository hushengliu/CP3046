<?php
/**
 * Felicity functions and definitions
 *
 * @package Felicity
 */

require_once("meta-box-class.php");

if (is_admin()){
	add_action('admin_enqueue_scripts','custom_meta');
	function custom_meta() {
		wp_enqueue_script('custom-meta-boxes', get_template_directory_uri() . '/functions/js/custom.metaboxes.js', array('jquery'),'', true);
	}


	//All meta boxes prefix
	$prefix = 'fw_';

	//Quote meta box config
	$config1 = array(
	'id' => 'quote_post',          			// meta box id, unique per meta box
	'title' => 'Quote Settings',          	// meta box title
	'pages' => array('post'),      			// post types, accept custom post types as well, default is array('post'); optional
	'context' => 'normal',            		// where the meta box appear: normal (default), advanced, side; optional
	'priority' => 'high',            		// order of meta box: high (default), low; optional
	'fields' => array(),            		// list of meta fields (can be added by field arrays)
	'local_images' => true,          		// use local or hosted images (meta box images for add/remove)
	'use_with_theme' => true          		// change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
	);


	//Initiate quote meta box
	$my_meta1 =  new AT_Meta_Box($config1);


	//Quote fields
	$my_meta1->addTextarea($prefix.'quote_post',array('name'=> 'The Quote ', 'desc'=>'Enter your quote.'));
	$my_meta1->addText($prefix.'quote_author',array('name'=> 'Quote Author ', 'desc'=>'Enter the quote author name.'));

    //Finish quote meta box decleration
	$my_meta1->Finish();


	//Link meta box config
	$config2 = array(
	'id' => 'link_post',          			// meta box id, unique per meta box
	'title' => 'Link Settings',          	// meta box title
	'pages' => array('post'),      			// post types, accept custom post types as well, default is array('post'); optional
	'context' => 'normal',            		// where the meta box appear: normal (default), advanced, side; optional
	'priority' => 'high',            		// order of meta box: high (default), low; optional
	'fields' => array(),            		// list of meta fields (can be added by field arrays)
	'local_images' => true,          		// use local or hosted images (meta box images for add/remove)
	'use_with_theme' => true          		// change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
	);


	//Initiate link meta box
	$my_meta2 =  new AT_Meta_Box($config2);


	//Link fields
	$my_meta2->addText($prefix.'link_post_url',array('name'=> 'Link URL ', 'desc'=>'Enter the URL to be used for this Link post. for example: http://www.site5.com'));
	$my_meta2->addTextarea($prefix.'link_post_description',array('name'=> 'Link Description ', 'desc'=>'Enter the description to be used for this link. for example: Site5 WordPress Hosting'));

    //Finish link meta box decleration
	$my_meta2->Finish();

	//Gallery meta box config
	$config3 = array(
	  'id' => 'gallery_post',          		// meta box id, unique per meta box
	  'title' => 'Gallery Settings',        // meta box title
	  'pages' => array('post'),      		// post types, accept custom post types as well, default is array('post'); optional
	  'context' => 'normal',				// where the meta box appear: normal (default), advanced, side; optional
	  'priority' => 'high',            		// order of meta box: high (default), low; optional
	  'fields' => array(),            		// list of meta fields (can be added by field arrays)
	  'local_images' => true,          		// use local or hosted images (meta box images for add/remove)
	  'use_with_theme' => true          	// change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
	);


	//Initiate gallery meta box
	$my_meta3 =  new AT_Meta_Box($config3);


	//Gallery fields
	$repeater_fields[] = $my_meta3->addText($prefix.'gallery_post_image_title',array('name'=> 'Gallery Image Title '),true);
	$repeater_fields[] = $my_meta3->addImage($prefix.'gallery_post_image',array('name'=> 'Gallery Image '),true);

	//Gallery repeater block
	$my_meta3->addRepeaterBlock($prefix.'gl_',array('inline' => true, 'name' => 'Gallery Images','desc'=>'Click to upload images to this gallery post. Hold and move to sort images.', 'fields' => $repeater_fields, 'sortable'=> true));


	//Finish gallery meta mox decleration
	$my_meta3->Finish();	
}