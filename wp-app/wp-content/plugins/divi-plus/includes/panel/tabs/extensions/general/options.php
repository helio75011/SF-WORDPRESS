<?php
add_settings_section(
	'el-settings-extensions-general-section',
	'', 
	'', 
	self::$menu_slug
);

add_settings_field(
	'el-dipl-divi-library-shortcodes-toggle',
	esc_html__( 'Enable Divi Library Shortcodes', 'divi-plus' ),
	array( $this, 'el_toggle_render' ),
	esc_html( self::$menu_slug ),
	'el-settings-extensions-general-section',
	array(
		'field_id'   => 'dipl-enable-divi-library-shortcodes',
		'setting'    => esc_html( self::$option ),
		'default'    => 'off',
		'id'         => 'el-dipl-divi-library-shortcodes-toggle',
		'data-type'  => 'elicus-option',
		'info'       => esc_html__( 'Here you can enable to use Divi Library Layout using shortcodes.', 'divi-plus' ),
	)
);