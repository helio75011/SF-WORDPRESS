<?php
add_settings_section(
	'el-settings-extensions-visibility-manager-section',
	'', 
	'', 
	self::$menu_slug
);

$visibility_manager_areas = array(
	'sections' 	=> esc_html__( 'Sections', 'divi-plus' ),
	'rows' 		=> esc_html__( 'Rows', 'divi-plus' ),
	'columns' 	=> esc_html__( 'Columns', 'divi-plus' ),
	'modules' 	=> esc_html__( 'Modules', 'divi-plus' ),
);

add_settings_field(
	'el-dipl-visibility-manager-areas',
	esc_html__( 'Enable Visibility Manager for', 'divi-plus' ),
	array( $this, 'el_mutiple_checkbox_render' ),
	esc_html( self::$menu_slug ),
	'el-settings-extensions-visibility-manager-section',
	array(
		'field_id'     => 'dipl-visibility-manager-areas',
		'setting'      => esc_html( self::$option ),
		'default'      => '',
		'id'           => 'el-dipl-visibility-manager-areas',
		'data-type'    => 'elicus-option',
		'list_options' => $visibility_manager_areas,
		'info'         => esc_html__( 'Here you can select the builder areas where you want to use visibility manager.', 'divi-plus' ),
	)
);