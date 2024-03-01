<?php
add_settings_section(
	'el-settings-extensions-particle-background-section',
	'', 
	'', 
	self::$menu_slug
);

$particle_background_areas = array(
	'sections' 	=> esc_html__( 'Sections', 'divi-plus' ),
	'rows' 		=> esc_html__( 'Rows', 'divi-plus' ),
	'columns' 	=> esc_html__( 'Columns', 'divi-plus' ),
	'modules' 	=> esc_html__( 'Modules', 'divi-plus' ),
);

add_settings_field(
	'el-dipl-particle-background-areas',
	esc_html__( 'Enable Particle Background for', 'divi-plus' ),
	array( $this, 'el_mutiple_checkbox_render' ),
	esc_html( self::$menu_slug ),
	'el-settings-extensions-particle-background-section',
	array(
		'field_id'     => 'dipl-particle-background-areas',
		'setting'      => esc_html( self::$option ),
		'default'      => '',
		'id'           => 'el-dipl-particle-background-areas',
		'data-type'    => 'elicus-option',
		'list_options' => $particle_background_areas,
		'info'         => esc_html__( 'Here you can select the builder areas where you want to use particle background.', 'divi-plus' ),
	)
);