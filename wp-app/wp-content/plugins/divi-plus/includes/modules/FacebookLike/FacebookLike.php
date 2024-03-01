<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_FacebookLike extends ET_Builder_Module {

	public $slug       = 'dipl_facebook_like';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name = esc_html__( 'DP Facebook Like', 'divi-plus' );
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
			'page_url' => array(
				'label'            	=> esc_html__( 'Page URL', 'divi-plus' ),
				'type'             	=> 'text',
				'option_category'  	=> 'basic_option',
				'default'			=> esc_url( 'https://diviextended.com/' ),
				'default_on_front'	=> esc_url( 'https://diviextended.com/' ),
				'dynamic_content'	=> 'url',
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'main_content',
				'description'      	=> esc_html__( 'Here you can enter webpage url to be liked or recommended.', 'divi-plus' ),
			),
			'button_action' => array(
				'label'             => esc_html__( 'Action Type', 'divi-plus' ),
				'type'              => 'select',
				'option_category'   => 'layout',
				'options'           => array(
					'like'  	=> esc_html__( 'Like', 'divi-plus' ),
					'recommend' => esc_html__( 'Recommend', 'divi-plus' ),
				),
				'default'           => 'like',
				'default_on_front'  => 'like',
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'main_content',
				'description'       => esc_html__('Here you can choose the action type between like and recommend.', 'divi-plus'),
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
				'description'      	=> esc_html__( 'Here you can choose to use the browser\'s lazy-loading. The browser does not render the button if it\'s not close to the viewport', 'divi-plus' ),
			),
			'button_layout' => array(
				'label'             => esc_html__( 'Layout', 'divi-plus' ),
				'type'              => 'select',
				'option_category'   => 'layout',
				'options'           => array(
					'standard'		=> esc_html__( 'Standard', 'divi-plus' ),
					'button'		=> esc_html__( 'Button', 'divi-plus' ),
					'button_count' 	=> esc_html__( 'Button Count', 'divi-plus' ),
					'box_count' 	=> esc_html__( 'Box Count', 'divi-plus' ),
				),
				'default'           => 'standard',
				'default_on_front'  => 'standard',
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'display',
				'description'       => esc_html__('Here you can choose the layout of the button.', 'divi-plus'),
			),
			'button_size' => array(
				'label'             => esc_html__( 'Size', 'divi-plus' ),
				'type'              => 'select',
				'option_category'   => 'layout',
				'options'           => array(
					'small'		=> esc_html__( 'Small', 'divi-plus' ),
					'large'		=> esc_html__( 'Large', 'divi-plus' ),
				),
				'default'           => 'small',
				'default_on_front'  => 'small',
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'display',
				'description'       => esc_html__('Here you can choose the size of the button.', 'divi-plus'),
			),
			'share_button' => array(
				'label'           	=> esc_html__( 'Display Share Button', 'divi-plus' ),
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
				'description'     	=> esc_html__( 'Here you can choose whether to display the share button or not.', 'divi-plus' ),
			),
		);

	}


	public function render( $attrs, $content, $render_slug ) {

		$facebook_app_id	= $this->props['facebook_app_id'];
		$page_url 			= $this->props['page_url'];
		$button_action 		= $this->props['button_action'];
		$button_layout		= $this->props['button_layout'];
		$button_size		= $this->props['button_size'];
		$share_button		= $this->props['share_button'];
		$lazy_loading		= $this->props['lazy_loading'];

		if ( '' !== $facebook_app_id ) {
			wp_enqueue_script( 'elicus-facebook-sdk', 'https://connect.facebook.net/en_us/sdk.js#xfbml=1&version=v8.0&appId=' . $facebook_app_id, array('jquery'), null, true );
			$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        	wp_enqueue_style( 'dipl-facebook-like-style', PLUGIN_PATH . 'includes/modules/FacebookLike/' . $file . '.min.css', array(), '1.0.0' );
			$facebook_wrap = sprintf(
				'<div class="dipl_fb_like_button">
					<div class="fb-like" data-href="%1$s" data-layout="%2$s" data-action="%3$s" data-size="%4$s" data-share="%5$s"  data-lazy="%6$s"></div>
				</div>',
				esc_url( $page_url ),
				esc_attr( $button_layout ),
				esc_attr( $button_action ),
				esc_attr( $button_size ),
				'on' === $share_button ? true : false,
				'on' === $lazy_loading ? true : false
			);
		} else {
			$facebook_wrap = '';
		}
		
		return $facebook_wrap;
	}

}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
    $modules = explode( ',', $plugin_options['dipl-modules'] );
    if ( in_array( 'dipl_facebook_like', $modules ) ) {
        new DIPL_FacebookLike();
    }
} else {
    new DIPL_FacebookLike();
}
