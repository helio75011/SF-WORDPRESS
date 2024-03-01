<?php
/**
 * The Template for displaying Layout1
 *
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2019 Elicus Technologies Private Limited
 * @version     1.4.1
 */
 
if ( '' !== $flip_speed ) {
	if ( 'on' === $layout1_shake_effect ) {
		ET_Builder_Element::set_style( $render_slug, array(
			'selector'      => '%%order_class%% .flipbox_side.el-transition, %%order_class%% .layout1.el-transition',
			'declaration'   => sprintf( '-webkit-transition: transform %1$sms cubic-bezier(0.3, 0.9, 0.40, 1.3);', intval( $flip_speed ) )
		) );
		ET_Builder_Element::set_style( $render_slug, array(
			'selector'      => '%%order_class%% .flipbox_side.el-transition, %%order_class%% .layout1.el-transition',
			'declaration'   => sprintf( '-moz-transition: transform %1$sms cubic-bezier(0.3, 0.9, 0.40, 1.3);', intval( $flip_speed ) )
		) );
		ET_Builder_Element::set_style( $render_slug, array(
			'selector'      => '%%order_class%% .flipbox_side.el-transition, %%order_class%% .layout1.el-transition',
			'declaration'   => sprintf( 'transition: transform %1$sms cubic-bezier(0.3, 0.9, 0.40, 1.3);', intval( $flip_speed ) )
		) );
	} else {
		ET_Builder_Element::set_style( $render_slug, array(
			'selector'      => '%%order_class%% .flipbox_side.el-transition, %%order_class%% .layout1.el-transition',
			'declaration'   => sprintf( '-webkit-transition: transform %1$sms cubic-bezier(.5, .3, .3, 1);', intval( $flip_speed ) )
		) );
		ET_Builder_Element::set_style( $render_slug, array(
			'selector'      => '%%order_class%% .flipbox_side.el-transition, %%order_class%% .layout1.el-transition',
			'declaration'   => sprintf( '-moz-transition: transform %1$sms cubic-bezier(.5, .3, .3, 1);', intval( $flip_speed ) )
		) );
		ET_Builder_Element::set_style( $render_slug, array(
			'selector'      => '%%order_class%% .flipbox_side.el-transition, %%order_class%% .layout1.el-transition',
			'declaration'   => sprintf( 'transition: transform %1$sms cubic-bezier(.5, .3, .3, 1);', intval( $flip_speed ) )
		) );
	}

	/*if (  in_array( $layout1_flip_style, array( 'diagonalLeft', 'diagonalRight', 'diagonalLeftInverted', 'diagonalRightInverted' ) ) ) {
		ET_Builder_Element::set_style( $render_slug, array(
			'selector'      => '%%order_class%% .et_pb_module_inner, %%order_class%% .layout1',
			'declaration'   => 'perspective: none;'
		) );
	}*/
}

if( 'on' === $layout1_3d_depth ) {
	ET_Builder_Element::set_style( $render_slug, array(
		'selector'      => '%%order_class%% .dipl_flipbox_wrapper .flipbox_inner',
		'declaration'   => sprintf( '-webkit-transform: translateZ(50px) scale(0.95);' )
	) );
	ET_Builder_Element::set_style( $render_slug, array(
		'selector'      => '%%order_class%% .dipl_flipbox_wrapper .flipbox_inner',
		'declaration'   => sprintf( '-moz-transform: translateZ(50px) scale(0.95);' )
	) );
	ET_Builder_Element::set_style( $render_slug, array(
		'selector'      => '%%order_class%% .dipl_flipbox_wrapper .flipbox_inner',
		'declaration'   => sprintf( 'transform: translateZ(50px) scale(0.95);' )
	) );
} 

if( '' !== $front_image ) {
	if ( 'off' === $front_use_icon ) {
		$f_image = '<div class="et_pb_main_flipbox_image">'.$front_image.'</div>';
	} else {
		if( 'on' === $front_style_icon ) {
			$f_image = '<div class="et_pb_main_flipbox_image use_icon '.$front_icon_shape.'">'.$front_image.'</div>';
		} else {
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
		} else {
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

$flipbox_content =  '<div class="dipl_flipbox_wrapper '.$flipbox_layout.'" flip-direction="'.$layout1_flip_style.'">
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