<?php
/**
 * @author      Elicus Technologies <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2020 Elicus Technologies Private Limited
 * @version     1.6.0
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

if( ! class_exists( 'El_Divi_Plus_Settings' ) ){

	class El_Divi_Plus_Settings {
	    
	    /**
         * Plugin option name.
         *
         * @static
         * @var string
         * @access private
         */
        private static $option;

        /**
         * Plugin version.
         *
         * @static
         * @var string
         * @access private
         */
        private static $version;

        /**
         * Setting page title.
         *
         * @static
         * @var string
         * @access private
         */
        private static $page_title;

        /**
         * Admin menu title.
         *
         * @static
         * @var string
         * @access private
         */
        private static $menu_title;

        /**
         * Settings page slug.
         *
         * @static
         * @var string
         * @access private
         */
        private static $menu_slug;

        /**
         * Plugin option page hook.
         *
         * @static
         * @var string
         * @access private
         */
        private static $hook_suffix;

        /**
         * wpkses allowed html tags.
         *
         * @static
         * @var array
         * @access private
         */
        private static $allowed_html;
	    
	    
	    /**
         * Constructs the settings page.
         * 
         * @uses el_admin_menu()
         * @uses el_plugin_settings()
         * @access public
         */
	    public function __construct($option) {
	        self::$option           = $option;
	        self::$version          = ELICUS_DIVI_PLUS_VERSION;
            self::$page_title       = 'Divi Plus';
            self::$menu_title       = 'Divi Plus';
            self::$menu_slug        = 'divi-plus-options';
            self::$allowed_html     = array(
                'a'      => array(
                    'href'  => array(),
                    'title' => array(),
                    'target' => array(),
                ),
                'em'     => array(),
                'strong' => array(
                    'class' => array(),
                ),
            );
            
            add_action( 'admin_menu', array( $this, 'el_admin_menu') );
            // Ignoring 'page' warning as sanitizing 'page' below.
            // phpcs:ignore WordPress,GET,POST,REQUEST.
            if ( isset( $_GET['page'] ) && 'divi-plus-options' === sanitize_key( wp_unslash( $_GET['page'] ) ) ) {
                add_action( 'admin_init', array( $this, 'el_plugin_settings' ) );
            }
        }
        
        /**
         * Adds the admin menu.
         * 
         * @uses el_plugin_options()
         * @access public
         * @return void
         */
        public function el_admin_menu() {
            self::$hook_suffix = add_options_page( self::$page_title, self::$menu_title, 'edit_others_posts', self::$menu_slug, array( $this, 'el_plugin_options' ) );
            add_action('admin_enqueue_scripts', array( $this, 'el_panel_styles') );
            add_action('admin_enqueue_scripts', array( $this, 'el_panel_scripts') );
        }
        
        /**
         * Enqueue admin stylesheet for plugin panel.
         *
         * @return void
         */
        public function el_panel_styles($hook_suffix){
            if ( $hook_suffix == self::$hook_suffix ) {
    	        wp_register_style('el-dipl-panel-style', plugins_url( '/panel/styles/panel.min.css', dirname(__FILE__) ), array(), self::$version );
    		    wp_enqueue_style('el-dipl-panel-style');
            }
    	}
        
        /**
         * Enqueue admin script for plugin panel.
         *
         * @return void
         */
        public function el_panel_scripts($hook_suffix){
            if ( $hook_suffix == self::$hook_suffix ) {
        	    wp_register_script('el-dipl-panel-script', plugins_url( '/panel/scripts/panel.min.js', dirname(__FILE__) ), array( 'jquery' ), self::$version );
                wp_localize_script(
                    'el-dipl-panel-script',
                    'el_dipl_panel_ajax_object',
                    array(
                        'ajaxurl'   => admin_url( 'admin-ajax.php' ),
                        'ajaxnonce' => wp_create_nonce( 'divi-plus-panel-nonce' ),
                    )
                );
        		wp_enqueue_script('el-dipl-panel-script');
            }
    	}
        
        /**
         * Creates setting page.
         * 
         * @usedby el_admin_menu()
         * @access public
         * @return void
         */
        public function el_plugin_options() {
            ?>
            <div class="el-settings-panel-wrapper">
                <button class="el-settings-panel-save-btn"><?php esc_html_e( 'Save Changes', 'divi-plus' ); ?></button>
                <div class="el-settings-panel-settings">
                    <div class="el-settings-panel-header">
                        <h1 id="el-settings-panel-title"><?php echo esc_html( self::$page_title ); ?></h1>
                    </div>
                    <ul class="el-settings-panel-mainmenu">
                        <li class="el-settings-panel-mainmenu-tab el-settings-panel-active-tab">
                            <span data-href="#el-settings-panel-general-wrap">General</span>
                        </li>
                        <li class="el-settings-panel-mainmenu-tab">
                            <span data-href="#el-settings-panel-extensions-wrap">Extensions</span>
                        </li>
                        <li class="el-settings-panel-mainmenu-tab">
                            <span data-href="#el-settings-panel-integration-wrap">Integration</span>
                        </li>
                    </ul>
                    <div class="el-settings-panel-content">
                        <?php
                            include_once plugin_dir_path( __FILE__ ) .'tabs/general/menu.php';
                            include_once plugin_dir_path( __FILE__ ) .'tabs/extensions/menu.php';
                            include_once plugin_dir_path( __FILE__ ) .'tabs/integration/menu.php';
                        ?>
                    </div>
                </div>
                <div class="info-section">
                    <div class="info-desc">
                        <div class="info-header"><span><?php esc_html_e( 'Help', 'divi-plus' ); ?></span><span class="close-info"></span></div>
                        <div class="info-body"><h3></h3><p></p></div>
                    </div>
                </div>
                <button class="el-settings-panel-save-btn"><?php esc_html_e( 'Save Changes', 'divi-plus' ); ?></button>
                <div id="el-settings-panel-ajax-saving">
                    <img src="<?php echo esc_url( plugins_url( 'panel/assets/ajax-loader.gif', dirname(__FILE__) ) ); ?>" alt="loading" id="loading">
                </div>
            </div>
            <?php
        }
        
        /**
         * Creates setting fields.
         * 
         * @access public
         * @return void
         */
	    public function el_plugin_settings() {
	        register_setting( 'el-settings-general-general-group', self::$option );
	        include_once plugin_dir_path( __FILE__ ) . 'tabs/general/general/options.php';

            register_setting( 'el-settings-extensions-general-group', self::$option );
            include_once plugin_dir_path( __FILE__ ) . 'tabs/extensions/general/options.php';

            register_setting( 'el-settings-extensions-scheduler-group', self::$option );
            include_once plugin_dir_path( __FILE__ ) . 'tabs/extensions/scheduler/options.php';

            register_setting( 'el-settings-extensions-visibility-manager-group', self::$option );
            include_once plugin_dir_path( __FILE__ ) . 'tabs/extensions/visibility-manager/options.php';

            register_setting( 'el-settings-extensions-particle-background-group', self::$option );
            include_once plugin_dir_path( __FILE__ ) . 'tabs/extensions/particle-background/options.php';

            register_setting( 'el-settings-integration-facebook-group', esc_html( self::$option ) );
            include_once plugin_dir_path( __FILE__ ) . 'tabs/integration/facebook/options.php';

            register_setting( 'el-settings-integration-twitter-group', esc_html( self::$option ) );
            include_once plugin_dir_path( __FILE__ ) . 'tabs/integration/twitter/options.php';
	    }
	    
	    /**
         * Render toggle field.
         *
         * @usedby el_plugin_settings
         * @access public
         */
        public function el_toggle_render( $args ) {
            $value     = isset( $args['default'] ) ? esc_attr( $args['default'] ) : '';
            $name      = isset( $args['field_id'] ) ? esc_attr( $args['field_id'] ) : '';
            $setting   = isset( $args['setting'] ) ? esc_attr( $args['setting'] ) : '';
            $id        = isset( $args['id'] ) ? esc_attr( $args['id'] ) : '';
            $data_type = isset( $args['data-type'] ) ? esc_attr( $args['data-type'] ) : esc_attr( self::$option );
            $info      = isset( $args['info'] ) ? wp_kses( $args['info'], self::$allowed_html ) : '';
            $field_id  = $name;

            if ( '' !== $setting ) {
                $options = get_option( $setting );
                if ( isset( $options ) && isset( $options[ $field_id ] ) ) {
                    $value = esc_attr( $options[ $field_id ] );
                }
            } else {
                $options = get_option( $field_id );
                if ( isset( $options ) && '' !== $options ) {
                    $value = esc_attr( $options );
                }
            }

            $dependency = ( isset( $args['dependency'] ) && 'yes' === $args['dependency'] ) ?
                        ' el-dependency-control' :
                        '';
            $dependent  = ( isset( $args['dependency'] ) && 'yes' === $args['dependency'] ) ?
                        ' data-dependent="' . implode( ',', array_map( 'esc_attr', $args['dependent'] ) ) . '"' :
                        '';
            $depends_on = ( isset( $args['depends-on'] ) ) ?
                        ' data-depends-on="' . implode( ',', array_map( 'esc_attr', $args['depends-on'] ) ) . '"' :
                        '';

            $checked = checked( $value, 'on', false );

            echo et_core_intentionally_unescaped(
                sprintf(
                    '<div class="el-settings-panel-field el-settings-panel-toggle el-toggle-on-state">
                            <input id="%1$s" class="el-settings-panel-value-field el-settings-panel-toggle-field %2$s" type="checkbox" value="%3$s" name="%4$s" %5$s data-type="%6$s" %7$s %8$s />
                            <span class="el-settings-panel-toggle-slider"></span>
                            <span class="el-settings-panel-toggle-value-text el-settings-panel-toggle-on-value">Enabled</span>
                            <span class="el-settings-panel-toggle-value-text el-settings-panel-toggle-off-value">Disabled</span>
                        </div>
                        <span class="el-setting-help"></span>
                        <span class="el-setting-info">%9$s</span>',
                    et_core_esc_previously( $id ),
                    esc_html( $dependency ),
                    et_core_esc_previously( $value ),
                    et_core_esc_previously( $name ),
                    esc_html( $checked ),
                    et_core_esc_previously( $data_type ),
                    et_core_esc_previously( $dependent ),
                    et_core_esc_previously( $depends_on ),
                    et_core_esc_previously( $info )
                ),
                'html'
            );
        }

        /**
         * Render dropdown field.
         *
         * @usedby el_plugin_settings
         * @access public
         */
        public function el_dropdown_render( $args ) {
            $value     = isset( $args['default'] ) ? esc_attr( $args['default'] ) : '';
            $name      = isset( $args['field_id'] ) ? esc_attr( $args['field_id'] ) : '';
            $setting   = isset( $args['setting'] ) ? esc_attr( $args['setting'] ) : '';
            $id        = isset( $args['id'] ) ? esc_attr( $args['id'] ) : '';
            $data_type = isset( $args['data-type'] ) ? esc_attr( $args['data-type'] ) : esc_attr( self::$option );
            $info      = isset( $args['info'] ) ? wp_kses( $args['info'], self::$allowed_html ) : '';
            $field_id  = $name;

            if ( '' !== $setting ) {
                $options = get_option( $setting );
                if ( isset( $options ) && isset( $options[ $field_id ] ) ) {
                    $value = esc_attr( $options[ $field_id ] );
                }
            } else {
                $options = get_option( $field_id );
                if ( isset( $options ) && '' !== $options ) {
                    $value = esc_attr( $options );
                }
            }

            $depends_on = ( isset( $args['depends-on'] ) ) ?
                        ' data-depends-on="' . implode( ',', array_map( 'esc_attr', $args['depends-on'] ) ) . '"' :
                        '';

            $list_options = isset( $args['list_options'] ) ? $args['list_options'] : '';

            if ( is_array( $list_options ) ) {
                $list_options = array_map( 'esc_attr', $list_options );
                $list         = '';
                foreach ( $list_options as $key => $option ) {
                    $selected = selected( esc_attr( $key ), $value, false );
                    $list    .= '<option value="' . esc_attr( $key ) . '" ' . esc_attr( $selected ) . '>' . esc_html( $option ) . '</option>';
                }

                echo et_core_intentionally_unescaped(
                    sprintf(
                        '<div class="el-settings-panel-field el-settings-panel-dropdown">
                                <select id="%1$s" class="el-settings-panel-value-field el-settings-panel-dropdown-field" name="%2$s" data-type="%3$s" %4$s>
                                    %5$s
                                </select>
                            </div>
                            <span class="el-setting-help"></span>
                            <span class="el-setting-info">%6$s</span>',
                        et_core_esc_previously( $id ),
                        et_core_esc_previously( $name ),
                        et_core_esc_previously( $data_type ),
                        et_core_esc_previously( $depends_on ),
                        et_core_intentionally_unescaped( $list, 'html' ),
                        et_core_esc_previously( $info )
                    ),
                    'html'
                );
            } else {
                echo et_core_intentionally_unescaped(
                    sprintf(
                        '<div id="%1$s" class="el-settings-panel-field" %2$s>%3$s</div>
                              <span class="el-setting-help"></span>
                              <span class="el-setting-info">%4$s</span>',
                        et_core_esc_previously( $id ),
                        et_core_esc_previously( $depends_on ),
                        wp_kses( $list_options, self::$allowed_html ),
                        et_core_esc_previously( $info )
                    ),
                    'html'
                );
            }
        }

        /**
         * Render range slider field.
         *
         * @usedby el_plugin_settings
         * @access public
         */
        public function el_range_slider_render( $args ) {
            $value     = isset( $args['default'] ) ? esc_attr( $args['default'] ) : '';
            $name      = isset( $args['field_id'] ) ? esc_attr( $args['field_id'] ) : '';
            $setting   = isset( $args['setting'] ) ? esc_attr( $args['setting'] ) : '';
            $id        = isset( $args['id'] ) ? esc_attr( $args['id'] ) : '';
            $data_type = isset( $args['data-type'] ) ? esc_attr( $args['data-type'] ) : esc_attr( self::$option );
            $info      = isset( $args['info'] ) ? wp_kses( $args['info'], self::$allowed_html ) : '';
            $field_id  = $name;

            if ( '' !== $setting ) {
                $options = get_option( $setting );
                if ( isset( $options ) && isset( $options[ $field_id ] ) ) {
                    $value = esc_attr( $options[ $field_id ] );
                }
            } else {
                $options = get_option( $field_id );
                if ( isset( $options ) && '' !== $options ) {
                    $value = esc_attr( $options );
                }
            }

            $depends_on = ( isset( $args['depends-on'] ) ) ?
                        ' data-depends-on="' . implode( ',', array_map( 'esc_attr', $args['depends-on'] ) ) . '"' :
                        '';

            echo et_core_intentionally_unescaped(
                sprintf(
                    '<div class="el-settings-panel-field el-settings-panel-range-slider">
                            <input id="%1$s" class="el-settings-panel-value-field el-settings-panel-range-slider-field" type="range" value="%2$s" name="%3$s" data-type="%4$s" min="%5$s" max="%6$s" step="%7$s" %8$s />
                            <span class="el-settings-panel-range-slider-field-value">%2$s</span>
                        </div>
                        <span class="el-setting-help"></span>
                        <span class="el-setting-info">%9$s</span>',
                    et_core_esc_previously( $id ),
                    et_core_esc_previously( $value ),
                    et_core_esc_previously( $name ),
                    et_core_esc_previously( $data_type ),
                    intval( $args['min'] ),
                    intval( $args['max'] ),
                    intval( $args['step'] ),
                    et_core_esc_previously( $depends_on ),
                    et_core_esc_previously( $info )
                ),
                'html'
            );
        }

        /**
         * Render multiple checkbox field.
         *
         * @usedby el_plugin_settings
         * @access public
         */
        public function el_mutiple_checkbox_render( $args ) {
            $value     = isset( $args['default'] ) ? esc_attr( $args['default'] ) : '';
            $name      = isset( $args['field_id'] ) ? esc_attr( $args['field_id'] ) : '';
            $setting   = isset( $args['setting'] ) ? esc_attr( $args['setting'] ) : '';
            $id        = isset( $args['id'] ) ? esc_attr( $args['id'] ) : '';
            $data_type = isset( $args['data-type'] ) ? esc_attr( $args['data-type'] ) : esc_attr( self::$option );
            $info      = isset( $args['info'] ) ? wp_kses( $args['info'], self::$allowed_html ) : '';
            $field_id  = $name;

            if ( '' !== $setting ) {
                $options = get_option( $setting );
                if ( isset( $options ) && isset( $options[ $field_id ] ) ) {
                    $value = esc_attr( $options[ $field_id ] );
                }
            } else {
                $options = get_option( $field_id );
                if ( isset( $options ) && '' !== $options ) {
                    $value = esc_attr( $options );
                }
            }

            $depends_on = ( isset( $args['depends-on'] ) ) ?
                        ' data-depends-on="' . implode( ',', array_map( 'esc_attr', $args['depends-on'] ) ) . '"' :
                        '';

            $list_options = isset( $args['list_options'] ) ? $args['list_options'] : '';

            if ( is_array( $list_options ) ) {
                $list_options = array_map( 'esc_attr', $list_options );
                $list         = '';
                $value        = array_map( 'esc_attr', explode( ',', $value ) );

                foreach ( $list_options as $key => $option ) {
                    $checked = in_array( $key, $value, true ) ? checked( 1, 1, false ) : '';
                    $list   .= '<span><input type="checkbox" class="el-settings-panel-checkbox-field" id="' . esc_attr( $key ) . '" value="' . esc_attr( $key ) . '" ' . esc_attr( $checked ) . '><label for="' . esc_attr( $key ) . '">' . ucwords( esc_html( $option ) ) . '</label></span>';
                }

                echo et_core_intentionally_unescaped(
                    sprintf(
                        '<div class="el-settings-panel-field el-settings-panel-multiple-checkboxes">
                                %1$s
                                <input id="%2$s" type="hidden" value="%3$s" class="el-settings-panel-value-field" name="%4$s" data-type="%5$s" %6$s />
                            </div>
                            <span class="el-setting-help"></span>
                            <span class="el-setting-info">%7$s</span>',
                        et_core_intentionally_unescaped( $list, 'html' ),
                        et_core_esc_previously( $id ),
                        esc_html( implode( ',', array_map( 'esc_attr', $value ) ) ),
                        et_core_esc_previously( $name ),
                        et_core_esc_previously( $data_type ),
                        et_core_esc_previously( $depends_on ),
                        et_core_esc_previously( $info )
                    ),
                    'html'
                );
            } else {
                echo et_core_intentionally_unescaped(
                    sprintf(
                        '<div id="%1$s" class="el-settings-panel-field" %2$s>%3$s</div>
                              <span class="el-setting-help"></span>
                              <span class="el-setting-info">%4$s</span>',
                        et_core_esc_previously( $id ),
                        et_core_esc_previously( $depends_on ),
                        wp_kses( $list_options, self::$allowed_html ),
                        et_core_esc_previously( $info )
                    ),
                    'html'
                );
            }
        }

        /**
         * Render repeater field.
         *
         * @usedby el_plugin_settings
         * @access public
         */
        public function el_repeater_render( $args ) {
            $value     = isset( $args['default'] ) ? wp_specialchars_decode( $args['default'], ENT_COMPAT ) : '';
            $name      = isset( $args['field_id'] ) ? esc_attr( $args['field_id'] ) : '';
            $setting   = isset( $args['setting'] ) ? esc_attr( $args['setting'] ) : '';
            $id        = isset( $args['id'] ) ? esc_attr( $args['id'] ) : '';
            $data_type = isset( $args['data-type'] ) ? esc_attr( $args['data-type'] ) : esc_attr( self::$option );
            $info      = isset( $args['info'] ) ? wp_kses( $args['info'], self::$allowed_html ) : '';
            $field_id  = $name;

            if ( '' !== $setting ) {
                $options = get_option( $setting );
                if ( isset( $options ) && isset( $options[ $field_id ] ) ) {
                    $value = esc_attr( $options[ $field_id ] );
                }
            } else {
                $options = get_option( $field_id );
                if ( isset( $options ) && '' !== $options ) {
                    $value = esc_attr( $options );
                }
            }

            $value      = wp_specialchars_decode( $value, ENT_COMPAT );
            $value      = wp_unslash( $value );
            $counter    = isset( json_decode( $value, true )['counter'] ) ? intval( json_decode( $value, true )['counter'] ) : 0;
            $depends_on = ( isset( $args['depends-on'] ) ) ?
                        ' data-depends-on="' . implode( ',', array_map( 'esc_attr', $args['depends-on'] ) ) . '"' :
                        '';

            $fields = isset( $args['fields'] ) ? $args['fields'] : '';

            if ( is_array( $fields ) ) {
                $repeater_field_rows = array();
                if ( 1 < $counter ) {
                    for ( $i = 1; $i <= $counter; $i++ ) {
                        $repeater_fields = array();
                        foreach ( $fields as $field ) {
                            if ( isset( $field[2]['field_id'] ) && isset( $field[2]['id'] ) ) {
                                $field[2]['field_id'] = preg_replace( '/[0-9]+/', $i, esc_html( $field[2]['field_id'] ) );
                                $field[2]['id']       = preg_replace( '/[0-9]+/', $i, esc_html( $field[2]['id'] ) );
                                $label                = isset( $field[0] ) ?
                                                        sprintf(
                                                            esc_html__( '%s', 'divi-plus' ),
                                                            esc_html( $field[0] )
                                                        ) :
                                                        '';

                                ob_start();
                                if ( isset( $field[1], $field[2] ) ) {
                                    if ( method_exists( $this, $field[1] ) ) {
                                        call_user_func( array( $this, $field[1] ), $field[2] );
                                    }
                                }
                                $callback_field = ob_get_clean();

                                $repeater_field = sprintf(
                                    '<div class="el-settings-panel-repeater-field">
                                        <label>%1$s</label>
                                        %2$s
                                    </div>',
                                    et_core_esc_previously( $label ),
                                    et_core_intentionally_unescaped( $callback_field, 'html' )
                                );
                                array_push( $repeater_fields, $repeater_field );
                            }
                        }
                        $repeater_field_row = sprintf(
                            '<div class="repeater-field-row">
                                %s
                                <p class="repeater-controls">
                                    <span class="remove-row row-control">-</span>
                                    <span class="add-row row-control">+</span>
                                </p>
                            </div>',
                            et_core_intentionally_unescaped( implode( '', $repeater_fields ), 'html' )
                        );
                        array_push( $repeater_field_rows, $repeater_field_row );
                    }
                } else {
                    $repeater_fields = array();
                    foreach ( $fields as $field ) {
                        if ( isset( $field[2]['field_id'] ) && isset( $field[2]['id'] ) ) {
                            $label = isset( $field[0] ) ?
                                                    sprintf(
                                                        esc_html__( '%s', 'divi-plus' ),
                                                        esc_html( $field[0] )
                                                    ) :
                                                    '';

                            ob_start();
                            if ( isset( $field[1], $field[2] ) ) {
                                if ( method_exists( $this, $field[1] ) ) {
                                    call_user_func( array( $this, $field[1] ), $field[2] );
                                }
                            }
                            $callback_field = ob_get_clean();

                            $repeater_field = sprintf(
                                '<div class="el-settings-panel-repeater-field">
                                    <label>%1$s</label>
                                    %2$s
                                </div>',
                                et_core_esc_previously( $label ),
                                et_core_intentionally_unescaped( $callback_field, 'html' )
                            );
                            array_push( $repeater_fields, $repeater_field );
                        }
                    }

                    $repeater_field_row = sprintf(
                        '<div class="repeater-field-row">
                            %s
                            <p class="repeater-controls">
                                <span class="add-row row-control">+</span>
                            </p>
                        </div>',
                        et_core_intentionally_unescaped( implode( '', $repeater_fields ), 'html' )
                    );
                    array_push( $repeater_field_rows, $repeater_field_row );
                }

                echo et_core_intentionally_unescaped(
                    sprintf(
                        '<div class="el-settings-panel-field el-settings-panel-repeater">
                            <input type="hidden" id="%1$s" class="el-settings-panel-value-field el-settings-panel-repeater-value" name="%2$s" data-type="%3$s" value="%4$s" %5$s />
                            <input type="hidden" class="row-counter" value="%6$s" />
                            <div class="repeater-field-rows">
                                %7$s
                            </div>
                        </div>
                        <span class="el-setting-help"></span>
                        <span class="el-setting-info">%8$s</span>',
                        et_core_esc_previously( $id ),
                        et_core_esc_previously( $name ),
                        et_core_esc_previously( $data_type ),
                        esc_attr( $value ),
                        et_core_esc_previously( $depends_on ),
                        et_core_esc_previously( $counter ),
                        et_core_intentionally_unescaped( implode( '', $repeater_field_rows ), 'html' ),
                        et_core_esc_previously( $info )
                    ),
                    'html'
                );
            } else {
                echo et_core_intentionally_unescaped(
                    sprintf(
                        '<div id="%1$s" class="el-settings-panel-field" %2$s>%3$s</div>
                          <span class="el-setting-help"></span>
                          <span class="el-setting-info">%4$s</span>',
                        et_core_esc_previously( $id ),
                        et_core_esc_previously( $depends_on ),
                        wp_kses( $fields, self::$allowed_html ),
                        et_core_esc_previously( $info )
                    ),
                    'html'
                );
            }

        }

        /**
         * Render fieldset field.
         *
         * @usedby el_plugin_settings
         * @access public
         */
        public function el_fieldset_render( $args ) {
            $value     = isset( $args['default'] ) ? esc_attr( $args['default'] ) : '';
            $name      = isset( $args['field_id'] ) ? esc_attr( $args['field_id'] ) : '';
            $setting   = isset( $args['setting'] ) ? esc_attr( $args['setting'] ) : '';
            $id        = isset( $args['id'] ) ? esc_attr( $args['id'] ) : '';
            $data_type = isset( $args['data-type'] ) ? esc_attr( $args['data-type'] ) : esc_attr( self::$option );
            $info      = isset( $args['info'] ) ? wp_kses( $args['info'], self::$allowed_html ) : '';
            $field_id  = $name;

            $depends_on = ( isset( $args['depends-on'] ) ) ?
                        ' data-depends-on="' . implode( ',', array_map( 'esc_attr', $args['depends-on'] ) ) . '"' :
                        '';

            $fields = isset( $args['fields'] ) ? $args['fields'] : '';

            if ( is_array( $fields ) ) {
                $fieldset_fields = array();
                foreach ( $fields as $field ) {
                    $label = isset( $field[0] ) ?
                            sprintf(
                                esc_html__( '%s', 'divi-plus' ),
                                esc_html( $field[0] )
                            ) :
                            '';

                    ob_start();
                    if ( isset( $field[1], $field[2] ) ) {
                        if ( method_exists( $this, $field[1] ) ) {
                            call_user_func( array( $this, $field[1] ), $field[2] );
                        }
                    }
                    $callback_field = ob_get_clean();

                    $fieldset_field = sprintf(
                        '<div class="el-settings-panel-fieldset-field">
                            <label>%1$s</label>
                            %2$s
                        </div>',
                        et_core_esc_previously( $label ),
                        et_core_intentionally_unescaped( $callback_field, 'html' )
                    );
                    array_push( $fieldset_fields, $fieldset_field );
                }

                echo et_core_intentionally_unescaped(
                    sprintf(
                        '<div id="%1$s" name="%2$s" class="el-settings-panel-field el-settings-panel-fieldset" %3$s>
                            %4$s
                        </div>
                        <span class="el-setting-help"></span>
                        <span class="el-setting-info">%5$s</span>',
                        et_core_esc_previously( $id ),
                        et_core_esc_previously( $name ),
                        et_core_esc_previously( $depends_on ),
                        et_core_intentionally_unescaped( implode( '', $fieldset_fields ), 'html' ),
                        et_core_esc_previously( $info )
                    ),
                    'html'
                );
            } else {
                echo et_core_intentionally_unescaped(
                    sprintf(
                        '<div id="%1$s" class="el-settings-panel-field el-settings-panel-fieldset" %2$s>%3$s</div>
                          <span class="el-setting-help"></span>
                          <span class="el-setting-info">%4$s</span>',
                        et_core_esc_previously( $id ),
                        et_core_esc_previously( $depends_on ),
                        wp_kses( $fields, self::$allowed_html ),
                        et_core_esc_previously( $info )
                    ),
                    'html'
                );
            }
        }

        /**
         * Render list field.
         *
         * @usedby el_plugin_settings
         * @access public
         */
        public function el_list_render( $args ) {
            $value     = isset( $args['default'] ) ? esc_attr( $args['default'] ) : '';
            $name      = isset( $args['field_id'] ) ? esc_attr( $args['field_id'] ) : '';
            $setting   = isset( $args['setting'] ) ? esc_attr( $args['setting'] ) : '';
            $id        = isset( $args['id'] ) ? esc_attr( $args['id'] ) : '';
            $data_type = isset( $args['data-type'] ) ? esc_attr( $args['data-type'] ) : esc_attr( self::$option );
            $info      = isset( $args['info'] ) ? wp_kses( $args['info'], self::$allowed_html ) : '';
            $field_id  = $name;

            $depends_on = ( isset( $args['depends-on'] ) ) ?
                        ' data-depends-on="' . implode( ',', array_map( 'esc_attr', $args['depends-on'] ) ) . '"' :
                        '';

            $list_options = isset( $args['list_options'] ) ? $args['list_options'] : '';

            if ( is_array( $list_options ) ) {
                $list = '';
                foreach ( $list_options as $option ) {
                    $list .= '<li>' . wp_kses( $option, self::$allowed_html ) . '</li>';
                }

                echo et_core_intentionally_unescaped(
                    sprintf(
                        '<div class="el-settings-panel-field el-settings-panel-list">
                                <ul id="%1$s" class="el-settings-panel-list-field" name="%2$s" %3$s>
                                    %4$s
                                </ul>
                            </div>
                            <span class="el-setting-help"></span>
                            <span class="el-setting-info">%5$s</span>',
                        et_core_esc_previously( $id ),
                        et_core_esc_previously( $name ),
                        et_core_esc_previously( $depends_on ),
                        et_core_intentionally_unescaped( $list, 'html' ),
                        et_core_esc_previously( $info )
                    ),
                    'html'
                );
            } else {
                echo et_core_intentionally_unescaped(
                    sprintf(
                        '<div id="%1$s" class="el-settings-panel-field" %2$s>%3$s</div>
                          <span class="el-setting-help"></span>
                          <span class="el-setting-info">%4$s</span>',
                        et_core_esc_previously( $id ),
                        et_core_esc_previously( $depends_on ),
                        wp_kses( $list_options, self::$allowed_html ),
                        et_core_esc_previously( $info )
                    ),
                    'html'
                );
            }
        }

        /**
         * Render text field.
         *
         * @usedby el_plugin_settings
         * @access public
         */
        public function el_textfield_render( $args ) {
            $value     = isset( $args['default'] ) ? esc_attr( $args['default'] ) : '';
            $name      = isset( $args['field_id'] ) ? esc_attr( $args['field_id'] ) : '';
            $setting   = isset( $args['setting'] ) ? esc_attr( $args['setting'] ) : '';
            $id        = isset( $args['id'] ) ? esc_attr( $args['id'] ) : '';
            $data_type = isset( $args['data-type'] ) ? esc_attr( $args['data-type'] ) : esc_attr( self::$option );
            $info      = isset( $args['info'] ) ? wp_kses( $args['info'], self::$allowed_html ) : '';
            $field_id  = $name;

            if ( '' !== $setting ) {
                $options = get_option( $setting );
                if ( isset( $options ) && isset( $options[ $field_id ] ) ) {
                    $value = esc_attr( $options[ $field_id ] );
                }
            } else {
                $options = get_option( $field_id );
                if ( isset( $options ) && '' !== $options ) {
                    $value = esc_attr( $options );
                }
            }

            $depends_on = ( isset( $args['depends-on'] ) ) ?
                        ' data-depends-on="' . implode( ',', array_map( 'esc_attr', $args['depends-on'] ) ) . '"' :
                        '';

            echo et_core_intentionally_unescaped(
                sprintf(
                    '<div class="el-settings-panel-field el-settings-panel-textfield">
                            <input id="%1$s" class="el-settings-panel-value-field el-settings-panel-text-field" type="text" value="%2$s" name="%3$s" data-type="%4$s" %5$s />
                        </div>
                        <span class="el-setting-help"></span>
                        <span class="el-setting-info">%6$s</span>',
                    et_core_esc_previously( $id ),
                    et_core_esc_previously( $value ),
                    et_core_esc_previously( $name ),
                    et_core_esc_previously( $data_type ),
                    et_core_esc_previously( $depends_on ),
                    et_core_esc_previously( $info )
                ),
                'html'
            );
        }
	    
	}// End of El_Divi_Plus_Settings Class
	
	new El_Divi_Plus_Settings(ELICUS_DIVI_PLUS_OPTION);

} // End of class_exists condition