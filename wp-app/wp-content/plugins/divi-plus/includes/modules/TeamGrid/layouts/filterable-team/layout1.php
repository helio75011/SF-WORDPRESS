<?php
/**
 * The Template for displaying Layout 1
 *
 * @author      Elicus Technologies <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.2
 */

$categories = array_filter( explode( ',', esc_attr( $include_categories ) ) );
if ( empty( $categories ) || '0' == count( $categories ) || '1' < count( $categories ) ) {
	$output .= '<div class="dipl-team-filterable-categories">';
	$output .= '<ul class="dipl-team-items-categories">';
	$output .= '<li data-id="" class="dipl-team-active-category">All Items</li>';
	$terms   = get_terms( array(
	    'taxonomy'		=> 'dipl-team-member-category',
	    'hide_empty' 	=> true,
	    'include' 		=> $categories
	) );
	foreach ( $terms as $term ) {
	    $output .= '<li data-id="' . $term->term_id . '" data-posts="'. $posts_number .'" data-layout="'. sanitize_file_name( $select_layout ) .'">' . $term->name . '</li>';
	}
	$output .= '</ul>';
	$output .= '</div>';
}