<?php
/**
 * @author      Elicus Technologies <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.6.6
 */
 
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

if ( ! class_exists( 'El_Divi_Plus_Installation' ) ) { 
    class El_Divi_Plus_Installation {

        /**
         * Plugin Name.
         *
         * @since    1.6.6
         * @access   private
         * @var      string
         */
        public static $plugin_name = 'divi-plus';

        /**
         * Plugin Version.
         *
         * @since    1.6.6
         * @access   private
         * @var      string
         */
        public static $plugin_version = ELICUS_DIVI_PLUS_VERSION;

        /**
         * Metadata Url.
         *
         * @since    1.6.6
         * @access   private
         * @var      string
         */
        public static $metadata_url = 'http://cdn.elicus.com';
        
        /**
         * Add active installs in database.
         *
         * @access public
         * @return void
         */
        public static function el_plugin_add_installs() {
            global $wp_version;
            $params = array(
                        'user-agent' => 'WordPress/' . $wp_version . ';' . get_bloginfo('url'),
                        'body'       => array(
                                'action'    => esc_attr( 'install' ),
                                'slug'      => esc_attr( self::$plugin_name ),
                                'status'    => esc_attr( 'active' ),
                                'url'       => rawurlencode( get_bloginfo('url') ),
                            )
                        );
            $request = wp_safe_remote_post( self::$metadata_url, $params );
        }
        
        /**
         * Remove active installs from database.
         *
         * @access public
         * @return void
         */
        public static function el_plugin_remove_installs() {
            global $wp_version;
            $params = array(
                        'user-agent' => 'WordPress/' . $wp_version . ';' . get_bloginfo('url'),
                        'body'       => array(
                                'action'    => esc_attr( 'install' ),
                                'slug'      => esc_attr( self::$plugin_name ),
                                'status'    => esc_attr( 'inactive' ),
                                'url'       => rawurlencode( get_bloginfo('url') ),
                            )
                        );
            $request = wp_safe_remote_post( self::$metadata_url, $params );
        }
    }
}