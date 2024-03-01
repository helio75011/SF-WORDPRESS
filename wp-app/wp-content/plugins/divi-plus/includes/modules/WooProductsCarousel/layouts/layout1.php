<?php
$dipl_product = wc_get_product( $product_id );

if ( 'on' === $show_thumbnail ) {
	if ( 'on' === $enable_quickview ) {
		$quickview = sprintf(
			'<div class="dipl_single_woo_product_quickview_wrapper">
				<a href="#" class="dipl_single_woo_product_quickview" data-product_id="%1$s" data-order_number="%3$s"%4$s>%2$s</a>
			</div>',
			esc_attr( $product_id ),
			esc_html( $quickview_link_text ),
			isset( $order_number ) ? esc_attr( $order_number ) : '',
			isset( $data_atts ) ? $data_atts : ''
		);
	}

	$thumbnail = sprintf(
		'<div class="dipl_single_woo_product_thumbnail_wrapper">
			<div class="dipl_single_woo_product_thumbnail">
				<a href="%3$s" title="%4$s">%1$s</a>
			</div>
			%2$s
			%5$s
		</div>',
		woocommerce_get_product_thumbnail( esc_attr( $thumbnail_size ) ),
		'on' === $show_sale_badge ? dipl_product_sale_badge( $dipl_product, 'percentage' === $sale_badge_text ? true : false, $sale_label_text ) : '',
		esc_url( get_permalink( $product_id ) ),
		esc_html( wp_strip_all_tags( $dipl_product->get_title() ) ),
		'on' === $enable_quickview ? et_core_intentionally_unescaped( $quickview, 'html' ) : ''
	);
}

if ( 'on' === $show_price ) {
	$price = sprintf(
		'<div class="dipl_single_woo_product_price">%1$s</div>',
		$dipl_product->get_price_html()
	);
}

if ( 'on' === $show_add_to_cart ) {
	$add_to_cart = sprintf(
		'<div class="dipl_single_woo_product_add_to_cart%2$s">%1$s</div>',
		dipl_add_to_cart_button( $product_id, $add_to_cart_icon, false, $add_to_cart_text ),
		'on' === $show_add_to_cart_on_hover ? ' dipl_single_woo_product_add_to_cart_on_hover' : ''
	);
}

if ( 'on' === $show_rating ) {
	$rating  = $dipl_product->get_average_rating();
	$count   = $dipl_product->get_rating_count();
	$star_rating = sprintf(
		'<div class="dipl_single_woo_product_star_rating">
			<div class="star-rating">%1$s</div>
		</div>',
		wc_get_star_rating_html( $rating, $count )
	);
}

if ( 'off' === $hide_out_of_stock && 'on' === $enable_out_of_stock_label && '' !== $out_of_stock_label && ! dipl_is_product_in_stock( $dipl_product ) ) {
	$out_of_stock = sprintf(
		'<div class="dipl_out_of_stock_wrapper">
			<div class="dipl_out_of_stock_label">%1$s</div>
		</div>',
		esc_html( $out_of_stock_label )
	);
} else {
	$out_of_stock = '';
}

$output .= sprintf(
	'<div class="dipl_single_woo_product%9$s">
		%1$s
		%8$s
		<div class="dipl_single_woo_product_content">
			<%2$s class="dipl_single_woo_product_title">
				<a href="%6$s" title="%3$s">%3$s</a>
			</%2$s>
			%7$s
			%4$s
			%5$s
		</div>
	</div>',
	'on' === $show_thumbnail ? $thumbnail : '',
	esc_html( $processed_title_level ),
	esc_html( wp_strip_all_tags( $dipl_product->get_title() ) ),
	'on' === $show_price ? $price : '',
	'on' === $show_add_to_cart ? $add_to_cart : '',
	esc_url( get_permalink( $product_id ) ),
	'on' === $show_rating ? $star_rating : '',
	$out_of_stock,
	! dipl_is_product_in_stock( $dipl_product ) ? ' dipl_out_of_stock_product' : ''
);