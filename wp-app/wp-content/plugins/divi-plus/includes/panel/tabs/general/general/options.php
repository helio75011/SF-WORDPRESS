<?php
$modules = glob( ELICUS_DIVI_PLUS_DIR_PATH . 'includes/modules' . '/*' , GLOB_ONLYDIR );
if ( is_array ( $modules ) && ! empty ( $modules ) ) {
    $modules 		= array_map( 'basename', $modules );
    $modules_list 	= array();
    foreach ( $modules as $module ) {
    	$mod = trim( preg_replace( '/[A-Z]([A-Z](?![a-z]))*/', ' $0', $module ) );
    	if ( false === strpos( $mod, 'Item' ) ) {
    		$key = sanitize_text_field( 'dipl_' . strtolower( str_replace( ' ', '_', $mod ) ) );
    		if ( 'Double Color Heading' === $mod ) {
    			$mod = 'Fancy Heading';
    		}
    		$modules_list[ $key ] = esc_html( $mod );
    	}
    }
}

if ( isset( $modules_list ) && ! empty( $modules_list ) ) {
	
	add_settings_section(
		'el-settings-general-general-section',
		'', 
		'', 
		self::$menu_slug
	);

	add_settings_field(
		'el-dipl-modules',
		esc_html__( 'Select Modules for Builder', 'divi-plus' ),
		array( $this, 'el_mutiple_checkbox_render' ),
		esc_html( self::$menu_slug ),
		'el-settings-general-general-section',
		array(
			'field_id'     => 'dipl-modules',
			'setting'      => esc_html( self::$option ),
			'default'      => implode( ',', array_keys( $modules_list ) ),
			'id'           => 'el-dipl-modules',
			'data-type'    => 'elicus-option',
			'list_options' => $modules_list,
			'info'         => esc_html__( 'Here you can select the modules which you want to use on the Divi page builder.', 'divi-plus' ),
		)
	);
}
