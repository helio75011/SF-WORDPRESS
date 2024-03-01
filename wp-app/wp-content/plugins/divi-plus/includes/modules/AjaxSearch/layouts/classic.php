<?php
/**
 * The Template for displaying Classic
 *
 * @author      Elicus Technologies <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2020 Elicus Technologies Private Limited
 * @version     1.5.0
 */

$output .= '<div class="dipl_ajax_search_item">';
	$output .= '<a href="' . get_permalink( $post_id ) . '" class="dipl_ajax_search_item_link" target="' . $link_target . '">';
		if ( in_array( 'featured_image', $display_fields ) ) {
			if ( has_post_thumbnail( $post_id ) ) {
				$output .= '<div class="dipl_ajax_search_item_image">';
				$output .= et_core_intentionally_unescaped( get_the_post_thumbnail( $post_id, 'large' ), 'html' );
				$output .= '</div>';
			}
		}
		if ( 
			( in_array( 'title', $display_fields ) && ! empty( $post_title ) ) ||
			in_array( 'excerpt', $display_fields ) ||
			in_array( 'product_price', $display_fields )
		) {
			$output .= '<div class="dipl_ajax_search_item_content">';
			if ( ! empty( $post_title ) && in_array( 'title', $display_fields ) ) {
				$output .= '<h4 class="dipl_ajax_search_item_title">' . esc_html( $post_title ) . '</h4>';
			}
			if ( in_array( 'product_price', $display_fields ) && isset( $product ) && ! empty( $product ) ) {
				$output .= '<p class="dipl_ajax_search_item_price">' . $product->get_price_html() . '</p>';
			}
			if ( in_array( 'excerpt', $display_fields ) ) {
				if ( has_excerpt( $post_id ) && '' !== trim( get_the_excerpt( $post_id ) ) ) {
					$excerpt = wp_strip_all_tags( strip_shortcodes( get_the_excerpt( $post_id ) ) );
				} else {
					$excerpt = wp_strip_all_tags( strip_shortcodes( dipl_truncate_post( '100', false, $post_id, true ) ) );
				}
				if ( '' !== trim( $excerpt ) ) {
					$output .= '<p class="dipl_ajax_search_item_excerpt">' . esc_html( $excerpt ) . '</p>';
				}
			}
			$output .= '</div>';
		}
	$output .= '</a>';
$output .= '</div>';