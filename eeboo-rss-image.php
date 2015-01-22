<?php
/*
Plugin Name: Eeboo rss image
Plugin URI: http://yuhei.nakata.com/eeboo-rss-image
Description: Plugin adding image to rss feed
Author: Yuhei Nakata
Version: 1.0
Author URI: http://yuhei.nakata.com
*/



function add_image_content($content) {
 	if (!is_feed()) return $content;
		
 	$args = array(
 		'content' => $content,
 		'count' => 9999,
 		'shortcode' => true,
 		'format' => true,
 		'links' => true
 	);

 	$id = get_the_ID();
	$imageUrl = pods_image_url ( get_post_custom_values('push_image'), $size = 'push', $default = 0, $attributes = '', $force = true );

 	$imagetag = "<img src='$imageUrl' ><br>";
		
 	//if (true === self::$options['force_excerpt']) $args['count'] = self::$options['excerpt_size'];
		
 	//$content = A5_Excerpt::text($args);
			
 	return $imagetag.$content;
 }

add_filter('the_content_feed', 'add_image_content');
add_filter('the_excerpt_rss', 'add_image_content');