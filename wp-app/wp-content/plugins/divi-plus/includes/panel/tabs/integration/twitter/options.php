<?php
add_settings_section(
	'el-settings-integration-twitter-section',
	'', 
	'', 
	self::$menu_slug
);

add_settings_field(
	'el-dipl-twitter-username',
	esc_html__( 'Twitter Username', 'divi-plus' ),
	array( $this, 'el_textfield_render' ),
	esc_html( self::$menu_slug ),
	'el-settings-integration-twitter-section',
	array(
		'field_id'     => 'dipl-twitter-username',
		'setting'      => esc_html( self::$option ),
		'default'      => '',
		'id'           => 'el-dipl-twitter-username',
		'data-type'    => 'elicus-option',
		'info'		   => esc_html__( 'Here you can enter the twitter username without @.', 'divi-plus' ),
	)
);