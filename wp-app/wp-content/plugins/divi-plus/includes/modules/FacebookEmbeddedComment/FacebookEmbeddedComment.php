<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_FacebookEmbeddedComment extends ET_Builder_Module {

	public $slug       = 'dipl_facebook_embedded_comment';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name = esc_html__( 'DP Facebook Embedded Comment', 'divi-plus' );
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
				'comment' => array(
					'label_prefix' => esc_html__( 'Comment', 'divi-plus' ),
					'css'          => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element} .dipl_fb_embedded_comment_wrapper",
							'border_styles' => "{$this->main_css_element} .dipl_fb_embedded_comment_wrapper",
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
				'comment' => array(
					'label'       => esc_html__( 'Comment Box Shadow', 'divi-plus' ),
					'css'         => array(
						'main' => "{$this->main_css_element} .dipl_fb_embedded_comment_wrapper",
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
			'comment_url' => array(
				'label'            	=> esc_html__( 'Comment URL', 'divi-plus' ),
				'type'             	=> 'text',
				'option_category'  	=> 'basic_option',
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'main_content',
				'description'      	=> et_get_safe_localization(
										sprintf(
											'%1$s <a href="%2$s" title="%3$s" target="_blank">%4$s</a> %5$s',
											esc_html__( 'Here you can enter the absolute URL of the comment. You can click', 'divi-plus' ),
											esc_url( 'https://developers.facebook.com/docs/plugins/embedded-comments#how-to-get-a-comments-url' ),
											esc_html__( 'How to get comment url', 'divi-plus' ),
											esc_html__( 'here', 'divi-plus' ),
											esc_html__( 'to find out how to get a comment url.', 'divi-plus' )
										)
									),
			),
			'include_parent' => array(
				'label'            	=> esc_html__( 'Include Parent Comment', 'divi-plus' ),
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
				'description'      	=> esc_html__( 'Set to on to include parent comment (if URL is a reply).', 'divi-plus' ),
			),
			'frame_width' => array(
				'label'             => esc_html__( 'Frame Width', 'divi-plus' ),
				'type'              => 'range',
				'option_category'  	=> 'layout',
				'range_settings'    => array(
					'min'   => '220',
					'max'   => '1000',
					'step'  => '1',
				),
				'fixed_unit'   		=> 'px',
				'allow_empty'		=> true,
				'validate_unit'		=> true,
				'default'           => '',
				'default_on_front'  => '',
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'main_content',
				'description'       => esc_html__('The width of the post. Min 220px pixel. Leave empty to use fluid width.', 'divi-plus'),
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
		);

	}


	public function render( $attrs, $content, $render_slug ) {

		$facebook_app_id 	= $this->props['facebook_app_id'];
		$comment_url 		= $this->props['comment_url'];
		$frame_width 		= $this->props['frame_width'];
		$include_parent		= $this->props['include_parent'];
		$lazy_loading		= $this->props['lazy_loading'];

		if ( '' !== $facebook_app_id ) {
			wp_enqueue_script( 'elicus-facebook-sdk', 'https://connect.facebook.net/en_us/sdk.js#xfbml=1&version=v8.0&appId=' . $facebook_app_id, array('jquery'), null, true );
			$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        	wp_enqueue_style( 'dipl-facebook-embedded-comment-style', PLUGIN_PATH . 'includes/modules/FacebookEmbeddedComment/' . $file . '.min.css', array(), '1.0.0' );

			$facebook_wrap = sprintf(
				'<div class="dipl_fb_embedded_comment_wrapper">
					<div class="fb-comment-embed" data-href="%1$s" data-width="%2$s" data-include-parent="%3$s" data-lazy="%4$s"></div>
				</div>',
				esc_url( $comment_url ),
				esc_attr( $frame_width ),
				'on' === $include_parent ? true : false,
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
    if ( in_array( 'dipl_facebook_embedded_comment', $modules ) ) {
        new DIPL_FacebookEmbeddedComment();
    }
} else {
    new DIPL_FacebookEmbeddedComment();
}
