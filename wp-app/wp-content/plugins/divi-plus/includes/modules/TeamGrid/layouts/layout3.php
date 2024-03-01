<?php
/**
 * The Template for displaying Layout 3
 *
 * @author      Elicus Technologies <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.2
 */

$social_icons = '';
if ( 'on' === $show_social_icon ) {
	if (
		'' !== $facebook_url ||
		'' !== $twitter_url ||
		'' !== $linkedin_url ||
		'' !== $instagram_url ||
		'' !== $youtube_url ||
		'' !== $email ||
		'' !== $phone_number
	) {
		$social_icons = sprintf(
			'<div class="dipl_team_social_wrapper">%1$s%2$s%3$s%4$s%5$s%6$s%7$s</div>',
			$facebook_url,
			$twitter_url,
			$linkedin_url,
			$instagram_url,
			$youtube_url,
			$email,
			$phone_number
		);
	}
}

if ( 'open_link' === $onclick_trigger ) {
	$link = sprintf(
		'<a class="dipl_abs_link" href="%1$s" target="%2$s">%3$s</a>',
		esc_url( get_permalink( $post_id ) ),
		'on' === $link_target ? '_blank' : '_self',
		get_the_title( $post_id )
	);
}


$output .= sprintf(
	'<div id="dipl_team_member_grid_%2$s" class="dipl_team_grid_item dipl_team_member_grid_wrapper%7$s" %8$s>
		<div class="dipl_team_member_image_wrapper">
			%1$s	
		</div>
		<div class="dipl_team_content_wrapper">%3$s %4$s %5$s %6$s</div>
		%9$s
	</div>', 
	$member_image,
	esc_attr( $post_id ),
	$member_name,
	$designation,
	$short_description,
	$social_icons,
	'open_popup' === $onclick_trigger ? ' dipl_team_popup' : '',
	'open_popup' === $onclick_trigger ? $data : '',
	'open_link' === $onclick_trigger ? $link : ''
);