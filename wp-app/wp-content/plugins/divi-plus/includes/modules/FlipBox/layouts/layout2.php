<?php
/**
 * The Template for displaying Layout2
 *
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2019 Elicus Technologies Private Limited
 * @version     1.4.1
 */

if ( '' !== $flip_speed ) {
	ET_Builder_Element::set_style( $render_slug, array(
		'selector'      => '%%order_class%% .el-transition.layout2, %%order_class%%:hover .el-transition.layout2',
		'declaration'   => sprintf( '-webkit-transition: transform %1$sms ease;', intval( $flip_speed ) )
	) );
	ET_Builder_Element::set_style( $render_slug, array(
		'selector'      => '%%order_class%% .el-transition.layout2, %%order_class%%:hover .el-transition.layout2',
		'declaration'   => sprintf( '-moz-transition: transform %1$sms ease;', intval( $flip_speed ) )
	) );
	ET_Builder_Element::set_style( $render_slug, array(
		'selector'      => '%%order_class%% .el-transition.layout2, %%order_class%%:hover .el-transition.layout2',
		'declaration'   => sprintf( 'transition: transform %1$sms ease;', intval( $flip_speed ) )
	) );
}


if( '' !== $front_image ) {
	if ( 'off' === $front_use_icon ) {
		$f_image = '<div class="et_pb_main_flipbox_image">'.$front_image.'</div>';
	} else{
		if( 'on' === $front_style_icon ) {
			$f_image = '<div class="et_pb_main_flipbox_image use_icon '.$front_icon_shape.'">'.$front_image.'</div>';
		} else{
			$f_image = '<div class="et_pb_main_flipbox_image use_icon">'.$front_image.'</div>';
		}
	}
} else {
	$f_image = '';
}

if( '' !== $front_title ) {
	$f_title = '<div class="et_pb_flipbox_heading">'.$front_title.'</div>';
} else {
	$f_title = '';
}

if( '' !== $front_content ) {
	$f_content = '<div class="et_pb_flipbox_description">'.$front_content.'</div>';
} else {
	$f_content = '';
}

if( '' !== $back_image ) {
	if ( 'off' === $back_use_icon ) {
		$b_image = '<div class="et_pb_main_flipbox_image">'.$back_image.'</div>';
	} else {
		if( 'on' === $back_style_icon ) {
			$b_image = '<div class="et_pb_main_flipbox_image use_icon '.$back_icon_shape.'">'.$back_image.'</div>';
		} else{
			$b_image = '<div class="et_pb_main_flipbox_image use_icon">'.$back_image.'</div>';
		}
	}
} else {
	$b_image = '';
}

if( '' !== $back_title ) {
	$b_title = '<div class="et_pb_flipbox_heading_back">'.$back_title.'</div>';
} else {
	$b_title = '';
}

if( '' !== $back_content ) {
	$b_content = '<div class="et_pb_flipbox_description">'.$back_content.'</div>';
} else {
	$b_content = '';
}

if( '' !== $back_button_output ) {
	$b_button = '<div class="et_pb_flipbox_button_back">'.$back_button_output.'</div>';
} else {
	$b_button = '';
}

$flipbox_content =  '<div class="dipl_flipbox_wrapper '.$flipbox_layout.'" flip-direction="'.$layout2_flip_style.'">
						<div class="flipbox_side flipbox_front flipbox_position_'.$front_icon_placement.' flipbox_content_'.$front_content_align.'">
							<div class="flipbox_inner">'    
								.$f_image.
								'<div class="flipbox_front_content_wrapper">'
									.$f_title
									.$f_content.
								'</div>
							</div>
						</div>
						<div class="flipbox_side flipbox_back flipbox_position_'.$back_icon_placement.' flipbox_content_'.$back_content_align.'">
							<div class="flipbox_inner">'
								.$b_image.
								'<div class="flipbox_back_content_wrapper">'
									.$b_title
									.$b_content
									.$b_button.
								'</div>
							</div>
						</div>
					</div>';