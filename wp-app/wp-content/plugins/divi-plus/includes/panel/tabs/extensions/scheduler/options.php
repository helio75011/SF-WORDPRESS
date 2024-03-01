<?php
add_settings_section(
	'el-settings-extensions-scheduler-section',
	'', 
	'', 
	self::$menu_slug
);

$scheduler_areas = array(
	'sections' 	=> esc_html__( 'Sections', 'divi-plus' ),
	'rows' 		=> esc_html__( 'Rows', 'divi-plus' ),
	'columns' 	=> esc_html__( 'Columns', 'divi-plus' ),
	'modules' 	=> esc_html__( 'Modules', 'divi-plus' ),
);

add_settings_field(
	'el-dipl-scheduler-areas',
	esc_html__( 'Enable Scheduler for', 'divi-plus' ),
	array( $this, 'el_mutiple_checkbox_render' ),
	esc_html( self::$menu_slug ),
	'el-settings-extensions-scheduler-section',
	array(
		'field_id'     => 'dipl-scheduler-areas',
		'setting'      => esc_html( self::$option ),
		'default'      => '',
		'id'           => 'el-dipl-scheduler-areas',
		'data-type'    => 'elicus-option',
		'list_options' => $scheduler_areas,
		'info'         => esc_html__( 'Here you can select the builder areas where you want to use scheduler.', 'divi-plus' ),
	)
);