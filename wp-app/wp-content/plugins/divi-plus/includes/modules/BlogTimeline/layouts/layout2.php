<?php
/**
 * The Template for displaying Layout 1
 *
 * @author      Elicus Technologies <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.0
 */

$output .= '<article id="post-' . $post_id . '" class="' . $post_classes . '" >';

// Post Icon.
if ( '' !== $select_timeline_icon ) {
	$output .= sprintf(
		'<div class="dipl_blog_timeline_stem_center">
							<span class="dipl_blog_timeline_post_icon et-pb-icon">%1$s</span>
						</div>',
		esc_attr( $timeline_icon )
	);
}

$output .= '<div class="dipl_blog_timeline_post_content">';

//Date for Mobile
$output .= sprintf(
	'%1$s',
	(
						'on' === $show_date ?
						et_get_safe_localization(
							sprintf(
								'<div class="dipl_blog_timeline_meta_date dipl_mobile_date"><span class="published">%s</span></div>',
								esc_html( get_the_date( $post_date, $post_id ) )
							)
						) :
						''
				)
);

// Post Content Wrapper.
$output .= '<div class="dipl_blog_timeline_content_wrapper">';

// Post Featured Image Wrapper.
if ( '' !== $thumb && 'on' === $show_thumbnail ) {
	$output .= '<div class="dipl_blog_timeline_image_wrapper">';
	$output .= '<a href="' . esc_url( get_the_permalink( $post_id ) ) . '" class="dipl_blog_timeline_image_link">';
	$output .= et_core_intentionally_unescaped( $thumb, 'html' );
	$output .= '</a>';
	$output .= '</div>';
}

// Post Title.
$output .= '<' . esc_html( $timeline_post_title ) . ' class="dipl_blog_timeline_post_title"><a href="' . esc_url( get_the_permalink( $post_id ) ) . '">' . esc_html( get_the_title( $post_id ) ) . '</a></' . esc_html( $timeline_post_title ) . '>';

// Post Meta.
if ( 'on' === $show_categories || 'on' === $show_author || 'on' === $show_comments ) {
	$categories = get_the_category_list( ', ', 'empty_string', $post_id );
	$output    .= sprintf(
		'<p class="dipl_blog_timeline_meta">%1$s %2$s %3$s</p>',
		(
			'on' === $show_categories && '' !== $categories ?
			et_get_safe_localization(
				sprintf(
					'<span class="dipl_blog_timeline_meta_icon et-pb-icon">&#xe08d;</span><span class="dipl_blog_timeline_post_categories">%1$s</span>',
					$categories
				)
			) :
			''
		),
		(
			'on' === $show_author ?
			et_get_safe_localization(
				sprintf(
					'<span class="dipl_blog_timeline_meta_icon et-pb-icon">&#xe08a;</span><span class="author">%1$s</span>',
					get_the_author_posts_link()
				)
			) :
			''
		),
		(
			'on' === $show_comments ?
			et_get_safe_localization(
				sprintf(
					'<span class="dipl_blog_timeline_meta_icon et-pb-icon">&#xe066;</span><span class="comments">%s</span>',
					sprintf(
						// translators: %s: comment.
						esc_html( _nx( '%s Comment', '%s Comments', get_comments_number( $post_id ), 'number of comments', 'divi-plus' ) ),
						number_format_i18n( get_comments_number( $post_id ) )
					)
				)
			) :
			''
		)
	);
}


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
			$output .= '<div class="dipl_blog_timeline_post_content_inner">' . $content . '</div>';
		}
	} else {
        // phpcs:ignore WordPress.Variables.GlobalVariables.OverrideProhibited.
		$more    = null;
		$content = wp_kses_post( dipl_strip_shortcodes( apply_filters( 'the_content', $post_content ) ) );
		if ( '' !== $content ) {
			$output .= '<div class="dipl_blog_timeline_post_content_inner">' . $content . '</div>';
		}
	}
} else {
	if ( has_excerpt() && '' !== trim( get_the_excerpt( $post_id ) ) && 0 !== intval( $excerpt_length ) ) {
		$excerpt = wpautop( dipl_strip_shortcodes( get_the_excerpt( $post_id ) ) );
		if ( '' !== $excerpt ) {
			$output .= '<div class="dipl_blog_timeline_post_content_inner">' . $excerpt . '</div>';
		}
	} else {
		if ( 0 !== intval( $excerpt_length ) ) {
			$excerpt = wpautop( strip_shortcodes( dipl_truncate_post( $excerpt_length, false, $post_id, true ) ) );
			if ( '' !== $excerpt ) {
				$output .= '<div class="dipl_blog_timeline_post_content_inner">' . $excerpt . '</div>';
			}
		}
	}
	if ( 'on' === $show_read_more ) {
		$read_more = sprintf(
			'<div class="dipl_blog_timeline_read_more_link">%1$s</div>',
			et_core_intentionally_unescaped( $read_more_button, 'html' )
		);
		$output   .= et_core_intentionally_unescaped( $read_more, 'html' );
	}
}

$output .= '<span class="dipl_blog_timeline_triangle"></span>';

$output .= '</div>';

$output .= '</div>';

$output .= sprintf(
	'<div class="dipl_blog_timeline_outer_container">
					%1$s
				</div>',
	(
						'on' === $show_date ?
						et_get_safe_localization(
							sprintf(
								'<div class="dipl_blog_timeline_meta_date"><span class="published">%s</span></div>',
								esc_html( get_the_date( $post_date, $post_id ) )
							)
						) :
						''
				)
);

$output .= '</article>';
