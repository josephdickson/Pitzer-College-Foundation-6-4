<?php

function foundation_6_Pitzer_College_google_search() {
    register_sidebar( array(
        'name' => __( 'Header Right Side', 'foundation-6-Pitzer-College' ),
        'id' => 'google-search',
        'description' => __( 'Area below quicklinks and above Google Search box', 'foundation-6-Pitzer-College' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="google-search">',
	'after_title'   => '</h2>',
    ) );
}

add_action( 'widgets_init', 'foundation_6_Pitzer_College_google_search' );

?>
