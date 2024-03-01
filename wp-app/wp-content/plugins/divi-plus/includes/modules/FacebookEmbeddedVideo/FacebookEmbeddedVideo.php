<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_FacebookEmbeddedVideo extends ET_Builder_Module {

	public $slug       = 'dipl_facebook_embedded_video';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name = esc_html__( 'DP Facebook Embedded Video', 'divi-plus' );
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
					'text' => esc_html__( 'Alignment', 'divi-plus' ),
					'box_shadow' => esc_html__( 'Box Shadow', 'divi-plus' ),
					'border' => esc_html__( 'Border', 'divi-plus' ),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
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
			'borders' => array(
				'video' => array(
					'label_prefix' => 'Video',
					'css'          => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element} .dipl_fb_embedded_video_wrapper",
							'border_styles' => "{$this->main_css_element} .dipl_fb_embedded_video_wrapper",
						),
						'important' => 'all',
					),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'border',
				),
				'default' => array(
					'css' => array(
						'main' => array(
							'border_radii'  => $this->main_css_element,
							'border_styles' => $this->main_css_element,
						),
						'important' => 'all',
					),
				),
			),
			'box_shadow' => array(
				'video' => array(
					'label'       => esc_html__( 'Video Box Shadow', 'divi-plus' ),
					'css'         => array(
						'main' => "{$this->main_css_element} .dipl_fb_embedded_video_wrapper",
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
			'background' => array(
				'use_background_video' => false,
				'options' => array(
					'parallax' => array( 'type' => 'skip' ),
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
			'video_url' => array(
				'label'            	=> esc_html__( 'URL', 'divi-plus' ),
				'type'             	=> 'text',
				'option_category'  	=> 'basic_option',
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'main_content',
				'description'      	=> esc_html__( 'The absolute URL of the facebook video.', 'divi-plus' ),
			),
			'frame_width' => array(
				'label'             => esc_html__( 'Frame Width', 'divi-plus' ),
				'type'              => 'range',
				'option_category'  	=> 'layout',
				'range_settings'    => array(
					'min'   => '220px',
					'max'   => '1000',
					'step'  => '1',
				),
				'fixed_range'       => true,
				'validate_unit'		=> true,
				'default'           => '450px',
				'default_on_front'  => '450px',
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'main_content',
				'description'       => esc_html__('Increase or decrease the video width. Min is 200px.', 'divi-plus'),
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
			'autoplay' => array(
				'label'            	=> esc_html__( 'Autoplay', 'divi-plus' ),
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
				'description'      	=> esc_html__( 'Automatically start playing the video when the page loads. The video will be played without sound (muted). People can turn on sound via the video player controls. This setting does not apply to mobile devices.', 'divi-plus' ),
			),
			'allow_fullscreen' => array(
				'label'            	=> esc_html__( 'Allow Fullscreen', 'divi-plus' ),
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
				'description'      	=> esc_html__( 'Here you can choose to allow the video to be played in fullscreen mode.', 'divi-plus' ),
			),
			'show_text' => array(
				'label'            	=> esc_html__( 'Display Text', 'divi-plus' ),
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
				'description'      	=> esc_html__( 'Set to on to include the text from the Facebook post associated with the video, if any. Only for desktop.', 'divi-plus' ),
			),
			'show_captions' => array(
				'label'            	=> esc_html__( 'Display Captions', 'divi-plus' ),
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
				'description'      	=> esc_html__( 'Set to on to show captions (if available) by default. Only for desktop.', 'divi-plus' ),
			),
		);

	}


	public function render( $attrs, $content, $render_slug ) {

		$facebook_app_id 	= $this->props['facebook_app_id'];
		$video_url 			= $this->props['video_url'];
		$frame_width 		= $this->props['frame_width'];
		$autoplay			= $this->props['autoplay'];
		$allow_fullscreen	= $this->props['allow_fullscreen'];
		$show_text			= $this->props['show_text'];
		$show_captions		= $this->props['show_captions'];
		$lazy_loading		= $this->props['lazy_loading'];

		if ( '' !== $facebook_app_id ) {
			wp_enqueue_script( 'elicus-facebook-sdk', 'https://connect.facebook.net/en_us/sdk.js#xfbml=1&version=v8.0&appId=' . $facebook_app_id, array('jquery'), null, true );
			$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        	wp_enqueue_style( 'dipl-facebook-embedded-video-style', PLUGIN_PATH . 'includes/modules/FacebookEmbeddedVideo/' . $file . '.min.css', array(), '1.0.0' );

			$facebook_wrap = sprintf(
				'<div class="dipl_fb_embedded_video_wrapper">
					<div class="fb-video" data-href="%1$s" data-width="%2$s" data-autoplay="%3$s" data-allowfullscreen="%4$s" data-show-captions="%5$s" data-show-text="%6$s" data-lazy="%7$s"></div>
				</div>',
				esc_url( $video_url ),
				esc_attr( $frame_width ),
				'on' === $autoplay ? true : false,
				'on' === $allow_fullscreen ? true : false,
				'on' === $show_captions ? true : false,
				'on' === $show_text ? true : false,
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
    if ( in_array( 'dipl_facebook_embedded_video', $modules ) ) {
        new DIPL_FacebookEmbeddedVideo();
    }
} else {
    new DIPL_FacebookEmbeddedVideo();
}
