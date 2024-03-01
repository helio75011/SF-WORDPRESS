<?php
/**
 * The Template for displaying Layout 3
 *
 * @author      Elicus Technologies <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.2
 */

$output .= sprintf(
	'<article id="post-' . $post_id . '" class="swiper-slide %1$s ' . $post_classes . '" >',
	( 'on' === $show_thumbnail ) ? '' : 'dipl_blog_slider_no_image'
);

// Post Categories
if ( 'on' === $show_categories ) {
	$categories = ( isset( $category_background_color ) && '' !== $category_background_color ) ? get_the_category_list( '', 'empty_string', $post_id ) : get_the_category_list( ', ', 'empty_string', $post_id );
	$output    .= sprintf(
		'%1$s',
		(
			'on' === $show_categories && '' !== $categories ?
			et_get_safe_localization(
				sprintf(
					'<div class="dipl_blog_slider_post_categories">%1$s</div>',
					$categories
				)
			) :
			''
		)
	);

}
// Post Featured Image Wrapper.
if ( '' !== $thumb && 'on' === $show_thumbnail ) {
	$output .= '<div class="dipl_blog_slider_image_wrapper">';
	$output .= '<a href="' . esc_url( get_the_permalink( $post_id ) ) . '" class="dipl_blog_slider_image_link">';
	$output .= et_core_intentionally_unescaped( $thumb, 'html' );
	$output .= '</a>';
	$output .= '</div> <!-- dipl_blog_slider_image_wrapper -->';
}


// Post Content Wrapper.
$output .= '<div class="dipl_blog_slider_content_wrapper">';


// Post Title.
$output .= '<' . esc_html( $processed_title_level ) . ' class="dipl_blog_slider_post_title"><a href="' . esc_url( get_the_permalink( $post_id ) ) . '">' . esc_html( get_the_title( $post_id ) ) . '</a></' . esc_html( $processed_title_level ) . '>';

// Post Excerpt or Content.
if ( 'on' === $show_content ) {
	$post_content = get_the_content( null, false, $post_id );
	global $more;

	// page builder doesn't support more tag, so display the_content() in case of post made with page builder.
	if ( et_pb_is_pagebuilder_used( $post_id ) ) {
        // phpcs:ignore WordPress.Variables.GlobalVariables.OverrideProhibited.
		$more    = 1;
		$content = et_core_intentionally_unescaped( do_shortcode( $post_content ), 'html' );
		if ( '' !== $content ) {
			$output .= '<div class="dipl_blog_slider_content">' . $content . '</div>';
		}
	} else {
        // phpcs:ignore WordPress.Variables.GlobalVariables.OverrideProhibited.
		$more    = null;
		$content = wp_kses_post( dipl_strip_shortcodes( apply_filters( 'the_content', $post_content ) ) );
		if ( '' !== $content ) {
			$output .= '<div class="dipl_blog_slider_content">' . $content . '</div>';
		}
	}
} else {
	if ( has_excerpt() && '' !== trim( get_the_excerpt( $post_id ) ) && 0 !== intval( $excerpt_length ) ) {
		$excerpt = wpautop( dipl_strip_shortcodes( get_the_excerpt( $post_id ) ) );
		if ( '' !== $excerpt ) {
			$output .= '<div class="dipl_blog_slider_content">' . $excerpt . '</div>';
		}
	} else {
		if ( 0 !== intval( $excerpt_length ) ) {
			$excerpt = wpautop( strip_shortcodes( dipl_truncate_post( $excerpt_length, false, $post_id, true ) ) );
			if ( '' !== $excerpt ) {
				$output .= '<div class="dipl_blog_slider_content">' . $excerpt . '</div>';
			}
		}
	}
	if ( 'on' === $show_read_more ) {
		$read_more = sprintf(
			'<div class="dipl_blog_slider_read_more_link">%1$s</div>',
			et_core_intentionally_unescaped( $read_more_button, 'html' )
		);
		$output   .= et_core_intentionally_unescaped( $read_more, 'html' );
	}
}

$output .= '</div> <!-- dipl_blog_slider_content_wrapper -->';

// Post Meta.
if ( 'on' === $show_date || 'on' === $show_author || 'on' === $show_comments ) {
	$output .= sprintf(
		'<p class="dipl_blog_slider_meta">%1$s%2$s%3$s</p>',
		(
			'on' === $show_author ?
			et_get_safe_localization(
				sprintf(
					'<span class="author"><span class="et-pb-icon">&#xe08a;</span>%2$s</span>',
					esc_html__( 'By', 'divi-plus' ),
					get_the_author_posts_link()
				)
			) :
			''
		),
		(
			( 'on' === $show_author && 'on' === $show_date ) ?
			et_core_intentionally_unescaped( '<span class="dipl_blog_slider_divider">|</span>', 'html' ) :
			''
		),
		(
			'on' === $show_date ?
			et_get_safe_localization(
				sprintf(
					'<span class="published"><span class="et-pb-icon">&#xe025;</span>%s</span>',
					esc_html( get_the_date( $post_date, $post_id ) )
				)
			) :
			''
		),
		(
			( ( 'on' === $show_author || 'on' === $show_date ) && 'on' === $show_comments ) ?
			et_core_intentionally_unescaped( '<span class="dipl_blog_slider_divider">|</span>', 'html' ) :
			''
		),
		(
			'on' === $show_comments ?
			et_get_safe_localization(
				sprintf(
					'<span class="comments"><em class="et-pb-icon">&#xe065;</em>%s</span>',
					esc_html( number_format_i18n( get_comments_number( $post_id ) ) )
				)
			) :
			''
		)
	);
}

$output .= '</article>';
