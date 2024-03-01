<?php
/**
 * The Template for displaying Layout 1
 *
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.6.7
 */

if (
	( isset( $author_name ) && '' !== $author_name ) ||
	( isset( $author_designation ) && '' !== $author_designation ) ||
	( isset( $author_company ) && '' !== $author_company )
) {
	$testimonial_author = sprintf(
		'<div class="dipl_testimonial_author_details">
			%1$s%2$s%3$s
		</div>',
		isset( $author_name ) && '' !== $author_name ? et_core_intentionally_unescaped( $author_name, 'html' ) : '',
		isset( $author_designation ) && '' !== $author_designation ? et_core_intentionally_unescaped( $author_designation, 'html' ) : '',
		isset( $author_company ) && '' !== $author_company ? et_core_intentionally_unescaped( $author_company, 'html' ) : ''
	);
} else {
	$testimonial_author = '';
}

if (
	( isset( $author_image ) && '' !== $author_image ) ||
	( isset( $testimonial_author ) && '' !== $testimonial_author )
) {
	$testimonial_meta = sprintf(
		'<div class="dipl_testimonial_meta">
			%1$s%2$s
		</div>',
		isset( $author_image ) && '' !== $author_image ? et_core_intentionally_unescaped( $author_image, 'html' ) : '',
		isset( $testimonial_author ) && '' !== $testimonial_author ? et_core_intentionally_unescaped( $testimonial_author, 'html' ) : ''
	);
} else {
	$testimonial_meta = '';
}

$testimonials .= sprintf(
	'<div id="dipl_single_testimonial_%1$s" class="dipl_single_testimonial_card">
		<div class="dipl_testimonial_desc">
		%2$s%3$s%4$s
		</div>
		%5$s
		%6$s
	</div>',
	esc_attr( $testimonial_id ),
	'on' === $show_opening_quote_icon ? '<span class="dipl_testimonial_quote_icon dipl_testimonial_opening_quote_icon">{</span>' : '',
	wp_kses_post( wpautop( do_shortcode( get_the_content( null, false, $testimonial_id ) ) ) ),
	'on' === $show_closing_quote_icon ? '<span class="dipl_testimonial_quote_icon dipl_testimonial_closing_quote_icon">{</span>' : '',
	isset( $testimonial_rating ) && '' !== $testimonial_rating ? et_core_intentionally_unescaped( $testimonial_rating, 'html' ) : '',
	isset( $testimonial_meta ) ? et_core_intentionally_unescaped( $testimonial_meta, 'html' ) : ''
);