<?php

class My_Custom_Walker extends Walker
{
   public $tree_type = 'category';

   public $db_fields = array ('parent' => 'parent', 'id' => 'term_id');

   public function start_lvl( &$output, $depth = 0, $args = array() ) {
      $output .= "<ul class='children'>\n";
   }

   public function end_lvl( &$output, $depth = 0, $args = array() ) {
      $output .= "</ul>\n";
   }

   public function start_el( &$output, $category, $depth = 0, $args = array(), $current_object_id = 0 ) {
      $output .= "<li>" . $category->name . "\n";
   }

   public function end_el( &$output, $category, $depth = 0, $args = array() ) {
      $output .= "</li>\n";
   }

}

function my_init() {
   add_shortcode( 'list', 'my_list' );
}
add_action('init', 'my_init');

function my_list( $atts ){
   $list = wp_list_categories( array( 'echo' => 0, 'walker' => new My_Custom_Walker() ) );
   return $list;
}


class Foundation_Top_Bar_Menu extends Walker_Nav_Menu {
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);

		// add the dropdown CSS class
		$output .= "\n$indent<ul class=\"submenu menu vertical\">\n";
	}

	public function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {

		//add 'not-click' class to the list item
		$element->classes[] = 'not-click';

		// if element is current or is an ancestor of the current element, add 'active' class to the list item
		$element->classes[] = ( $element->current || $element->current_item_ancestor ) ? 'active' : '';

		// if it is a root eleemtn and the menu is not flat, add 'has-dropdown' class
		// from https://core.trac.wordpress.org/browser/trunk/src/wp-includes/class-wp-walker.php#L140
		$element->has_children = ! empty( $children_elements[ $element->ID ] );
		$element->classes[] = ( $element->has_children && 1 !== $max_depth ) ? 'has-dropdown' : '';

		// call parent method
		parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}

} // end Walker_Nav_Menu
