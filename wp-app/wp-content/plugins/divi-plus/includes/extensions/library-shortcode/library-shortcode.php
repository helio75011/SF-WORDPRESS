<?php
require_once plugin_dir_path( __DIR__ ) . 'extensions.php';

class DIPL_Divi_Library_Shortcode extends DIPL_Extensions {

	public function __construct() {
		$divi_library_shortcodes = $this->dipl_get_option( 'dipl-enable-divi-library-shortcodes' );
		if ( 'on' === $divi_library_shortcodes ) {
			add_filter( 'manage_et_pb_layout_posts_columns', array( $this, 'dipl_add_column_title' ) );
			add_action( 'manage_et_pb_layout_posts_custom_column' , array( $this, 'dipl_add_column_content' ), 10, 2 );
		}
		add_shortcode( 'dipl_divi_shortcode', array( $this, 'dipl_divi_shortcode' ) );
	}

	public function dipl_add_column_title( $columns ) {
		$columns['dipl_divi_shortcode'] = esc_html__( 'Shortcode', 'divi-plus' );
		return $columns;
	}

	public function dipl_add_column_content( $column, $post_id ) {
		switch ( $column ) {
			case 'dipl_divi_shortcode':
				$shortcode = sprintf( '[%s id="%d"]', 'dipl_divi_shortcode', $post_id );
				echo esc_attr( $shortcode );
				
			break;
		}
	}

	public function dipl_divi_shortcode( $atts ) {
	    $atts = shortcode_atts( array(
	        'id' => '',
	    ), $atts, 'dipl_divi_shortcode' );

	    $layout_id = intval( $atts['id'] );
	    
	    if ( 0 === $layout_id || '' === $layout_id ) {
	    	return '';
	    }
		
		return et_core_intentionally_unescaped( do_shortcode( get_the_content( null, false, $layout_id ) ), 'html' );
	}

}
new DIPL_Divi_Library_Shortcode;