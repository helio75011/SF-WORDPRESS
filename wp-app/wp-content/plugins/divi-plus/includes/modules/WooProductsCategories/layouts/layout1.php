<?php
if ( 'on' === $show_thumbnail ) {
	$thumbnail = sprintf(
		'<div class="dipl_woo_product_category_thumbnail">
			<a href="%2$s" title="%3$s">%1$s</a>
		</div>',
		dipl_woocommerce_category_thumbnail( $product_category, $thumbnail_size ),
		esc_url( get_term_link( intval( $product_category->term_id ), 'product_cat' ) ),
		esc_html( $product_category->name )
	);
}

$category_name = sprintf(
	'<%2$s class="dipl_woo_product_category_name">
		<a href="%3$s" title="%1$s">%1$s</a>
	</%2$s>',
	esc_html( $product_category->name ),
	esc_html( $processed_title_level ),
	esc_url( get_term_link( intval( $product_category->term_id ), 'product_cat' ) )
);

if ( 'on' === $show_product_count ) {
	$product_count = sprintf(
		'<div class="dipl_woo_product_category_count">
			<a href="%2$s" title="%1$s">%1$s</a>
		</div>',
		sprintf(
			esc_html( _nx( '%s Product', '%s Products', absint( $product_category->count ), 'number of products', 'divi-plus' ) ),
			absint( $product_category->count )
		),
		esc_url( get_term_link( intval( $product_category->term_id ), 'product_cat' ) )
	);
}

$output .= sprintf(
	'<div class="dipl_woo_product_category">
		%1$s
		<div class="dipl_woo_product_category_content">
			%2$s
			%3$s
		</div>
		<a href="%4$s" class="dipl_abs_link">%5$s</a>
	</div>',
	'on' === $show_thumbnail ? $thumbnail : '',
	et_core_intentionally_unescaped( $category_name, 'html' ),
	'on' === $show_product_count ? $product_count : '',
	esc_url( get_term_link( intval( $product_category->term_id ), 'product_cat' ) ),
	esc_html( $product_category->name )
);