<?php
/**
 * The Template for displaying Layout 1
 *
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.8.2
 */

if ( '' !== $item_name ) {
	if ( '' !== $item_image_thumbnail && 'use_image' === $item_thumbnail_option ) {
		$item_inner_wrap .= sprintf(
			'<div class="dipl_price_list_item_thumbnail">%1$s</div>',
			et_core_intentionally_unescaped( $item_image_thumbnail, 'html' )
		);
	}

	if ( '' !== $item_icon_thumbnail && 'use_icon' === $item_thumbnail_option ) {
		$item_inner_wrap .= sprintf(
			'<div class="dipl_price_list_item_icon">%1$s</div>',
			et_core_intentionally_unescaped( $item_icon_thumbnail, 'html' )
		);
	}

	if ( '' !== $item_price ) {
		$item_price_wrap = sprintf(
			'<div class="dipl_price_list_item_price_divider"></div>
            <div class="dipl_price_list_item_price_wrap">%1$s%2$s</div>',
			'' !== $item_currency ? et_core_intentionally_unescaped( $item_currency, 'html' ) : '',
			et_core_intentionally_unescaped( $item_price, 'html' )
		);
	}

	$item_name_wrap = sprintf(
		'<div class="dipl_price_list_item_name_wrap">%1$s%2$s</div>',
		et_core_intentionally_unescaped( $item_name, 'html' ),
		'' !== $item_price ? et_core_intentionally_unescaped( $item_price_wrap, 'html' ) : ''
	);

	$item_inner_wrap .= sprintf(
		'<div class="dipl_price_list_item_details">%1$s%2$s</div>',
		et_core_intentionally_unescaped( $item_name_wrap, 'html' ),
		'' !== $item_desc ? et_core_intentionally_unescaped( $item_desc, 'html' ) : ''
	);
}
