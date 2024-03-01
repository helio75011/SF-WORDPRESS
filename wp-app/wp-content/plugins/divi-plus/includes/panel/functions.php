<?php
/**
 * @author      Elicus Technologies <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2020 Elicus Technologies Private Limited
 * @version     1.3.0
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * Save theme settings to database
 * @version 1.0.2
 * @return string
 */
if ( ! function_exists('el_dipl_panel_save_settings') ) {
    function el_dipl_panel_save_settings(){
        check_ajax_referer( 'divi-plus-panel-nonce', 'nonce', true );
        // Sanitizing $_POST['options'] in below foreach loop as it contains json values.
        // phpcs:ignore WordPress,Variables,Sanitization.
        $options = isset( $_POST['options'] ) ? wp_unslash( $_POST['options'] ) : '';
        if ( is_array( $options ) ) {
            foreach ( $options as $option ) {
                $type  = isset( $option['type'] ) ? sanitize_text_field( $option['type'] ) : '';
                $name  = isset( $option['name'] ) ? sanitize_text_field( $option['name'] ) : '';
                $value = isset( $option['value'] ) ? sanitize_text_field( $option['value'] ) : '';
                if ( 'elicus-option' === $type ) {
                    $elicus_option = get_option( ELICUS_DIVI_PLUS_OPTION );
                    if ( '' === $value ) {
                        if ( isset( $elicus_option[ $name ] ) ) {
                            unset( $elicus_option[ $name ] );
                        }
                    } else {
                        $elicus_option[ $name ] = $value;
                    }
                    update_option( ELICUS_DIVI_PLUS_OPTION, $elicus_option, true );
                }
            }
        }
        exit;
    }
    add_action( 'wp_ajax_dipl_panel_save_settings', 'el_dipl_panel_save_settings' );
}