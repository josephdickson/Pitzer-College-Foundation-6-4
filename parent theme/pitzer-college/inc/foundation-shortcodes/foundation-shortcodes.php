<?php
/*
Plugin Name: Foundation 4 Shortcodes
Plugin URI: pitweb.pitzer.edu/test/
Description: A Collection of Shortcodes for Pitzer College to extend Foundation 4 by Zurb
Version: 1.2
Author: Joseph Dickson
Modified: 07/21/2014
Author URI: pitweb.pitzer.edu/test/
*/

// insert a button
function sButton($atts, $content = null) {
   extract(shortcode_atts(array('link' => '#'), $atts));
   extract(shortcode_atts(array('class' => ''), $atts));
   return '<a href="'.$link.'"><span class="button '.$class.'">' . do_shortcode($content) . '</span></a>';
}
add_shortcode('button', 'sButton');

// Wraps a Foundation Panel around content
function sPanel($atts, $content = null) {
   extract(shortcode_atts(array('class' => '#'), $atts));
   return '<div class="callout '.$class.'">' . do_shortcode($content) . '</div>';
}
add_shortcode('panel', 'sPanel');

// Wraps a div around content with a class and data
function sDiv($atts, $content = null) {
   extract(shortcode_atts(array('class' => '#'), $atts));
   extract(shortcode_atts(array('data' => '#'), $atts));
	return
		'<div class="'.$class.'" data="'.$data.'">'
			. do_shortcode($content) .
		'</div>';
}
add_shortcode('div', 'sDiv');

// Wraps a "parent" div around content with a class and data so it can nest another div
function sDiv2($atts, $content = null) {
   extract(shortcode_atts(array('class' => '#'), $atts));
   extract(shortcode_atts(array('data' => '#'), $atts));
	return
		'<div class="'.$class.'" data="'.$data.'">'
			. do_shortcode($content) .
		'</div>';
}
add_shortcode('div2', 'sDiv2');

// Creates a Reveal Modal for a YouTube video
// http://foundation.zurb.com/sites/docs/reveal.html
function sReveal($atts, $content = null) {
   extract(shortcode_atts(array('number' => ''), $atts));
   extract(shortcode_atts(array('title' => ''), $atts));
   extract(shortcode_atts(array('width' => ''), $atts));
   extract(shortcode_atts(array('content' => ''), $atts));
	return
		'<a data-open="RevealmyModal'.$number.'">'.$title.'</a>
		<div id="RevealmyModal'.$number.'" class="reveal '.$width.'" data-reveal>
			' . $content . '
				<button class="close-button" data-close aria-label="Close modal" type="button">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>';
}
add_shortcode('reveal', 'sReveal');

// Creates a Reveal Video for a Vimeo video
// foundation.zurb.com/docs/components/reveal.html
function sVimeo($atts, $content = null) {
   extract(shortcode_atts(array('number' => ''), $atts));
   extract(shortcode_atts(array('title' => ''), $atts));
   extract(shortcode_atts(array('width' => ''), $atts));
	return
		'<a data-open="VimeoMyModal'. $number .'">'.$title.'</a>
		<div id="VimeoMyModal'.$number.'" class="reveal '.$width.'" data-reveal>
			<div class="flex-video widescreen vimeo">
				<iframe src="http://player.vimeo.com/video/'.$number.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
				<button class="close-button" data-close aria-label="Close modal" type="button">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>';
}
add_shortcode('vimeo', 'sVimeo');

// Creates a Reveal Video for a YouTube video
// foundation.zurb.com/docs/components/reveal.html
function sYouTube($atts, $content = null) {
   extract(shortcode_atts(array('number' => ''), $atts));
   extract(shortcode_atts(array('title' => ''), $atts));
   extract(shortcode_atts(array('width' => ''), $atts));
	return
		'<a data-open="MyModalYouTube'. $number .'">'.$title.'</a>
		<div id="MyModalYouTube'.$number.'" class="reveal '.$width.'" data-reveal>
			<div class="flex-video widescreen">
				<iframe src="//www.youtube.com/embed/'.$number.'?rel=0" frameborder="0" allowfullscreen></iframe>
				<button class="close-button" data-close aria-label="Close modal" type="button">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>';
}
add_shortcode('youtube', 'sYouTube');

// Creates a Reveal for a YouTube video with an image
// foundation.zurb.com/docs/components/reveal.html
function sYouTubeIMG($atts, $content = null) {
   extract(shortcode_atts(array('number' => ''), $atts));
   extract(shortcode_atts(array('title' => ''), $atts));
   extract(shortcode_atts(array('width' => ''), $atts));
   extract(shortcode_atts(array('img' => ''), $atts));
	return
		'<a data-open="YouTubeIMGMyModal'. $number .'"><img src="'.$img.'" />'.$title.'</a>
		<div id="YouTubeIMGmyModal'.$number.'" class="reveal '.$width.'" data-reveal>
			<div class="flex-video widescreen">
				<iframe src="//www.youtube.com/embed/'.$number.'?rel=0" frameborder="0" allowfullscreen></iframe>
				<button class="close-button" data-close aria-label="Close modal" type="button">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>';
}
add_shortcode('youtubeimg', 'sYouTubeIMG');

// Creates a forced line break
function sBreak($atts, $content = null) {
   extract(shortcode_atts(array(), $atts));
   return '<br />';
}
add_shortcode('break', 'sBreak');

// Post Forwarding from another blog on the same network
// Imports a post based on post_id and blog_id numbers see http://codex.wordpress.org/Function_Reference/get_blog_post

function sPostForwarding($atts = null) {
	extract(shortcode_atts(array('post' => '#'), $atts));
	extract(shortcode_atts(array('blog' => '#'), $atts));
	$import_post = get_blog_post( $blog, $post);
	echo wpautop (do_shortcode($import_post -> post_content));
	}
add_shortcode('PostForwarding','sPostForwarding');

// Creates a Flex Video YouTube Embedding
function sFlex( $atts, $content = null ) {
	extract(shortcode_atts(array('number' => ''), $atts));
	extract(shortcode_atts( array(
		'youtube' => '
			<div class="flex-video widescreen">
				<iframe src="https://www.youtube.com/embed/'.$number.'?rel=0&amp;controls=1&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
			</div>',
		), $atts));
	extract(shortcode_atts(array('class' => ''), $atts));

	return "{$youtube}";
}
add_shortcode('flex', 'sFlex');

// Creates a Flex Video Vimeo Embedding
function sFlexVimeo( $atts, $content = null ) {
	extract(shortcode_atts(array('number' => ''), $atts));
	extract(shortcode_atts( array(
		'vimeo' => '
			<div class="flex-video widescreen vimeo">
				<iframe src="//player.vimeo.com/video/'.$number.'?title=0&amp;byline=0&amp;portrait=0&amp;color=ff9933" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
			</div>',

		), $atts));
	extract(shortcode_atts(array('class' => ''), $atts));

	return "{$vimeo}";
}
add_shortcode('flexvimeo', 'sFlexVimeo');

// Creates a Flex Video for Embedding Ustream's Live Feed
function sUstream( $atts, $content = null ) {
	extract(shortcode_atts(array('number' => ''), $atts));
	extract(shortcode_atts( array(
		'ustream' => '
			<div class="flex-video widescreen ustream">
				<iframe src="http://www.ustream.tv/embed/'.$number.'?html5ui" scrolling="no" allowfullscreen webkitallowfullscreen frameborder="0" style="border: 0 none transparent;"></iframe>
			</div>',

		), $atts));
	extract(shortcode_atts(array('class' => ''), $atts));

	return "{$ustream}";
}
add_shortcode('ustream', 'sUstream');

// Creates a Flex Video for Embedding Ustream's recorded video feed
function sUstreamRecorded( $atts, $content = null ) {
	extract(shortcode_atts(array('number' => ''), $atts));
	extract(shortcode_atts( array(
		'ustreamRecorded' => '
			<div class="flex-video widescreen ustream recorded">
				<iframe src="http://www.ustream.tv/embed/recorded/'.$number.'?html5ui" scrolling="no" allowfullscreen webkitallowfullscreen frameborder="0" style="border: 0 none transparent;"></iframe>
			</div>',

		), $atts));
	extract(shortcode_atts(array('class' => ''), $atts));

	return "{$ustreamRecorded}";
}
add_shortcode('ustreamRecorded', 'sUstreamRecorded');


// Clear break
function sClear($atts, $content = null) {
   return '<div class="clear">' . '</div>';
}
add_shortcode('clear', 'sClear');


// Creates a Reveal Video for a Reveal Modal
// foundation.zurb.com/docs/components/reveal.html
function sModal($atts, $content = null) {
   extract($atts);
   extract(shortcode_atts(array('number' => ''), $atts));
   extract(shortcode_atts(array('title' => ''), $atts));
   extract(shortcode_atts(array('width' => ''), $atts));
	return
		'<a data-open="myModal'.$number.'">'.$title.'</a>
		<div id="myModal'.$number.'" class="reveal '.$width.'" data-reveal>
			<strong>' . do_shortcode($title) . '</strong><br/>' . do_shortcode($content) . '
			<button class="close-button" data-close aria-label="Close modal" type="button">
					<span aria-hidden="true">&times;</span>
			</button>
		</div>';
}
add_shortcode('modal', 'sModal');

// Adds shortcode buttons to tinyMCE */

add_action('init', 'add_button');

function add_button() {
	add_filter('mce_external_plugins', 'add_plugin');
	add_filter('mce_buttons_3', 'register_button');
}

function register_button($buttons) {
	array_push($buttons, "div" , "row" , "vimeo" , "youtube" , "break" , "flex" , "modal" );

	return $buttons;
}

function add_plugin($plugin_array) {
	 $plugin_array['div']				= get_template_directory_uri() . '/inc/foundation-shortcodes/custombuttons.js' ;
 	 $plugin_array['vimeo']				= get_template_directory_uri() . '/inc/foundation-shortcodes/custombuttons.js' ;
	 $plugin_array['youtube']			= get_template_directory_uri() . '/inc/foundation-shortcodes/custombuttons.js' ;
	 $plugin_array['break']				= get_template_directory_uri() . '/inc/foundation-shortcodes/custombuttons.js' ;
	 $plugin_array['flex']				= get_template_directory_uri() . '/inc/foundation-shortcodes/custombuttons.js' ;
	 $plugin_array['modal']				= get_template_directory_uri() . '/inc/foundation-shortcodes/custombuttons.js' ;
   return $plugin_array;
}
?>
