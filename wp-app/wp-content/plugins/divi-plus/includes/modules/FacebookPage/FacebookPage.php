<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_FacebookPage extends ET_Builder_Module {

	public $slug       = 'dipl_facebook_page';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name = esc_html__( 'DP Facebook Page', 'divi-plus' );
		$this->main_css_element = '%%order_class%%';
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'main_content' => array(
						'title' => esc_html__( 'Configuration', 'divi-plus' ),
					),
					'display' => array(
						'title' => esc_html__( 'Display', 'divi-plus' ),
					),
				),
			),
			'advanced'  => array(
				'toggles' => array(
					'text' => array(
						'title' => esc_html__( 'Alignment', 'divi-plus' ),
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'margin_padding' => array(
				'css' => array(
					'main'      => '%%order_class%%',
					'important' => 'all',
				),
			),
			'max_width' => array(
				'css' => array(
					'main'             => '%%order_class%%',
					'module_alignment' => '%%order_class%%',
				),
			),
			'borders' => array(
				'page' => array(
					'label_prefix' => esc_html__( 'Page', 'divi-plus' ),
					'css'          => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element} .fb-page",
							'border_styles' => "{$this->main_css_element} .fb-page",
						),
						'important' => 'all',
					),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'border',
				),
				'default' => array(
					'css' => array(
						'main' => array(
							'border_styles' => '%%order_class%%',
							'border_radii'  => '%%order_class%%',
						),
					),
				),
			),
			'box_shadow' => array(
				'page' => array(
					'label'       => esc_html__( 'Page Box Shadow', 'divi-plus' ),
					'css'         => array(
						'main' => "{$this->main_css_element} .fb-page",
						'important' => 'all',
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'box_shadow',
				),
				'default' => array(
					'css' => array(
						'main' => $this->main_css_element,
						'important' => 'all',
					),
				),
			),
			'background' => array(
				'use_background_video' => false,
				'options' => array(
					'parallax' => array( 'type' => 'skip' ),
				),
			),
			'text' => array(
				'text_orientation' => array(
					'exclude_options' => array( 'justified' ),
				),
				'options' => array(
					'text_orientation' => array(
						'label' => esc_html__( 'Alignment', 'divi-plus' ),
					),
				),
				'css' => array(
					'text_orientation' => $this->main_css_element,
				),
			),
			'text_shadow' => false,
			'fonts' => false,
			'filters' => false,
			'link_options'  => false,
		);
	}

	public function get_fields() {

		$fb_app_id = '';
		$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
		if ( isset( $plugin_options['dipl-facebook-app-id'] ) && '' !== $plugin_options['dipl-facebook-app-id'] ) {
			$fb_app_id = sanitize_text_field( $plugin_options['dipl-facebook-app-id'] );
		}
		
		return array(
			'facebook_app_id' => array(
				'label'            	=> esc_html__( 'Facebook APP ID', 'divi-plus' ),
				'type'             	=> 'text',
				'option_category'  	=> 'basic_option',
				'default' 		   	=> $fb_app_id,
				'default_on_front' 	=> $fb_app_id,
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'main_content',
				'description'      	=> et_get_safe_localization(
										sprintf(
											'%1$s <a href="%2$s" title="%3$s" target="_blank">%4$s</a> %5$s <a href="%6$s" title="%7$s" target="_blank">%8$s</a> %9$s',
											esc_html__( 'Here you can enter the facebook app id for the facebook modules. You can use a single app id for all facebook modules and it can be saved in the plugin', 'divi-plus' ),
											esc_url( admin_url( '/options-general.php?page=divi-plus-options&menu=integration&submenu=facebook' ) ),
											esc_html__( 'Divi Plus Settings', 'divi-plus' ),
											esc_html__( 'settings', 'divi-plus' ),
											esc_html__( 'page. Or if you want to use different app id for each facebook module then you can enter here. Click', 'divi-plus' ),
											esc_url( 'https://developers.facebook.com/apps/' ),
											esc_html__( 'Facebook APP', 'divi-plus' ),
											esc_html__( 'here', 'divi-plus' ),
											esc_html__( 'to create one.', 'divi-plus' )
										)
									),
			),
			'facebook_page_url' => array(
				'label'            	=> esc_html__( 'Facebook Page URL', 'divi-plus' ),
				'type'             	=> 'text',
				'option_category'  	=> 'basic_option',
				'default'			=> esc_url( 'https://www.facebook.com/diviextended/' ),
				'default_on_front'	=> esc_url( 'https://www.facebook.com/diviextended/' ),
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'main_content',
				'description'      	=> esc_html__( 'Here you can enter facebook page url.', 'divi-plus' ),
			),
			'frame_width' => array(
				'label'             => esc_html__( 'Frame Width', 'divi-plus' ),
				'type'              => 'range',
				'option_category'  	=> 'layout',
				'range_settings'    => array(
					'min'   => '180',
					'max'   => '500',
					'step'  => '1',
				),
				'fixed_unit'		=> 'px',
				'fixed_range'       => true,
				'validate_unit'		=> true,
				'default'           => '280px',
				'default_on_front'  => '280px',
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'main_content',
				'description'       => esc_html__('Increase or decrease the frame width. Min is 180px and Max is 500px.', 'divi-plus'),
			),
			'frame_height' => array(
				'label'             => esc_html__( 'Frame Height', 'divi-plus' ),
				'type'              => 'range',
				'option_category'  	=> 'layout',
				'range_settings'    => array(
					'min'   => '70',
					'max'   => '800',
					'step'  => '1',
				),
				'fixed_unit'		=> 'px',
				'fixed_range'       => true,
				'validate_unit'		=> true,
				'default'           => '500px',
				'default_on_front'  => '500px',
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'main_content',
				'description'       => esc_html__('Increase or decrease the frame height. Min is 70px.', 'divi-plus'),
			),
			'lazy_loading' => array(
				'label'            	=> esc_html__( 'Enable lazy loading', 'divi-plus' ),
				'type'             	=> 'yes_no_button',
				'option_category'  	=> 'configuration',
				'options'          	=> array(
                    'off'   => esc_html__( 'No', 'divi-plus' ),
                    'on'    => esc_html__( 'Yes', 'divi-plus' ),
                ),
                'default' 			=> 'off',
                'default_on_front' 	=> 'off',
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'main_content',
				'description'      	=> esc_html__( 'Here you can choose to use the browser\'s lazy-loading. The browser does not render the facebook page if it\'s not close to the viewport', 'divi-plus' ),
			),
			'facebook_tabs' => array(
				'label'           	=> esc_html__( 'Facebook Tabs', 'divi-plus' ),
				'type'            	=> 'multiple_checkboxes',
				'option_category' 	=> 'configuration',
				'options'         	=> array(
					'timeline' => esc_html__( 'Timeline', 'divi-plus' ),
					'events'   => esc_html__( 'Events', 'divi-plus' ),
					'messages' => esc_html__( 'Messages', 'divi-plus' ),
				),
				'default'         	=> 'on|off|off',
				'default_on_front'  => 'on|off|off',
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'display',
				'description'     	=> esc_html__( 'Here you can choose the tabs to render on your facebook page.', 'divi-plus' ),
			),
			'show_facepile' => array(
				'label'            	=> esc_html__( 'Show Face Pile', 'divi-plus' ),
				'type'             	=> 'yes_no_button',
				'option_category'  	=> 'configuration',
				'options'          	=> array(
                    'off'   => esc_html__( 'No', 'divi-plus' ),
                    'on'    => esc_html__( 'Yes', 'divi-plus' ),
                ),
                'default' 			=> 'on',
                'default_on_front' 	=> 'on',
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'display',
				'description'      	=> esc_html__( 'Here you can choose to show profile photos of the friends who liked the page.', 'divi-plus' ),
			),
			'hide_cover' => array(
				'label'            	=> esc_html__( 'Hide Cover Picture', 'divi-plus' ),
				'type'             	=> 'yes_no_button',
				'option_category'  	=> 'configuration',
				'options'          	=> array(
                    'off'   => esc_html__( 'No', 'divi-plus' ),
                    'on'    => esc_html__( 'Yes', 'divi-plus' ),
                ),
                'default' 			=> 'off',
                'default_on_front' 	=> 'off',
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'display',
				'description'      	=> esc_html__( 'Here you can choose to hide page cover picture.', 'divi-plus' ),
			),
			'small_header' => array(
				'label'            	=> esc_html__( 'Display Small Header', 'divi-plus' ),
				'type'             	=> 'yes_no_button',
				'option_category'  	=> 'configuration',
				'options'          	=> array(
                    'off'   => esc_html__( 'No', 'divi-plus' ),
                    'on'    => esc_html__( 'Yes', 'divi-plus' ),
                ),
                'default' 			=> 'off',
                'default_on_front' 	=> 'off',
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'display',
				'description'      	=> esc_html__( 'Here you can choose to display the small header instead.', 'divi-plus' ),
			),
			'hide_cta' => array(
				'label'            	=> esc_html__( 'Hide CTA', 'divi-plus' ),
				'type'             	=> 'yes_no_button',
				'option_category'  	=> 'configuration',
				'options'          	=> array(
                    'off'   => esc_html__( 'No', 'divi-plus' ),
                    'on'    => esc_html__( 'Yes', 'divi-plus' ),
                ),
                'default' 			=> 'off',
                'default_on_front' 	=> 'off',
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'display',
				'description'      	=> esc_html__( 'Here you can choose to hide the custom call to action button (if available).', 'divi-plus' ),
			),
		);

	}


	public function render( $attrs, $content, $render_slug ) {

		$facebook_app_id 	= $this->props['facebook_app_id'];
		$facebook_page_url 	= $this->props['facebook_page_url'];
		$frame_width 		= $this->props['frame_width'];
		$frame_height		= $this->props['frame_height'];
		$facebook_tabs		= $this->props['facebook_tabs'];
		$show_facepile		= $this->props['show_facepile'];
		$hide_cover			= $this->props['hide_cover'];
		$small_header		= $this->props['small_header'];
		$hide_cta			= $this->props['hide_cta'];
		$lazy_loading		= $this->props['lazy_loading'];

		$whitelisted_tabs 	= array( 'timeline', 'events', 'messages' );
		$facebook_tabs = $this->process_multiple_checkboxes_value( $facebook_tabs, $whitelisted_tabs );

		if ( '' !== $facebook_app_id ) {
			wp_enqueue_script( 'elicus-facebook-sdk', 'https://connect.facebook.net/en_us/sdk.js#xfbml=1&version=v8.0&appId=' . $facebook_app_id, array('jquery'), null, true );
			$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        	wp_enqueue_style( 'dipl-facebook-page-style', PLUGIN_PATH . 'includes/modules/FacebookPage/' . $file . '.min.css', array(), '1.0.0' );

			$facebook_wrap = sprintf(
				'<div class="dipl_facebook_embedded_page">
					<div class="fb-page" data-href="%1$s" data-width="%2$s" data-height="%3$s" data-tabs="%4$s" data-small-header="%5$s" data-hide-cover="%6$s" data-show-facepile="%7$s" data-hide-cta="%8$s" data-lazy="%9$s" data-adapt-container-width="%10$s"></div>
				</div>',
				esc_url( $facebook_page_url ),
				esc_attr( $frame_width ),
				esc_attr( $frame_height ),
				esc_attr( $facebook_tabs ),
				'on' === $small_header ? true : false,
				'on' === $hide_cover ? true : false,
				'on' === $show_facepile ? true : false,
				'on' === $hide_cta ? true : false,
				'on' === $lazy_loading ? true : false,
				1
			);
		} else {
			$facebook_wrap = '';
		}
		
		return $facebook_wrap;
	}

	public function process_multiple_checkboxes_value( $value, $values = array() ) {
		if ( empty( $values ) && ! is_array( $values ) ) {
			return '';
		}
		
		$new_values = array();
		$value 		= explode( '|', $value );
		foreach( $value as $key => $val ) {
			if ( 'on' === strtolower( $val ) ) {
				array_push( $new_values, $values[$key] );
			}
		}
		return implode( ',', $new_values );
	}

}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
    $modules = explode( ',', $plugin_options['dipl-modules'] );
    if ( in_array( 'dipl_facebook_page', $modules ) ) {
        new DIPL_FacebookPage();
    }
} else {
    new DIPL_FacebookPage();
}
