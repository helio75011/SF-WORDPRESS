<?php
add_settings_section(
	'el-settings-integration-facebook-section',
	'', 
	'', 
	self::$menu_slug
);

add_settings_field(
	'el-dipl-facebook-app-id',
	esc_html__( 'Facebook APP ID', 'divi-plus' ),
	array( $this, 'el_textfield_render' ),
	esc_html( self::$menu_slug ),
	'el-settings-integration-facebook-section',
	array(
		'field_id'     => 'dipl-facebook-app-id',
		'setting'      => esc_html( self::$option ),
		'default'      => '',
		'id'           => 'el-dipl-facebook-app-id',
		'data-type'    => 'elicus-option',
		'info'		   => sprintf(
							'%1$s <a href="%2$s" title="%3$s" target="_blank">%4$s</a> %5$s',
							esc_html__( 'Here you can enter the facebook app id for the facebook modules. Click', 'divi-plus' ),
							esc_url( 'https://developers.facebook.com/apps/' ),
							esc_html__( 'Facebook APP', 'divi-plus' ),
							esc_html__( 'here', 'divi-plus' ),
							esc_html__( 'to create one.', 'divi-plus' )
						),
	)
);
