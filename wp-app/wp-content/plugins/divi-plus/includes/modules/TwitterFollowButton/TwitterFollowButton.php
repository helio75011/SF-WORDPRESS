<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_TwitterFollowButton extends ET_Builder_Module {

	public $slug       = 'dipl_twitter_follow_button';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name = esc_html__( 'DP Twitter Follow', 'divi-plus' );
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
					'fallback_text_settings' => esc_html__( 'Fallback Text', 'divi-plus' ),
					'box_shadow' => esc_html__( 'Box Shadow', 'divi-plus' ),
					'border' => esc_html__( 'Border', 'divi-plus' ),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts' => array(
                'fallback_text' => array(
                    'label'         => esc_html__( 'Fallback Text', 'divi-plus' ),
                    'font_size'     => array(
                        'default'        => '16px',
                        'range_settings' => array(
                            'min'  => '1',
                            'max'  => '100',
                            'step' => '1',
                        ),
                        'validate_unit'  => true,
                    ),
                    'line_height'     => array(
                        'default'        => '1.5em',
                        'range_settings' => array(
                            'min'  => '0.1',
                            'max'  => '10',
                            'step' => '0.1',
                        ),
                    ),
                    'letter_spacing'  => array(
                        'default'        => '0px',
                        'range_settings' => array(
                            'min'  => '0',
                            'max'  => '10',
                            'step' => '1',
                        ),
                        'validate_unit'  => true,
                    ),
                    'css'                 => array(
                        'main'  => "{$this->main_css_element} .dipl_twitter_embed_follow_button",
                    ),
                    'hide_text_align' => true,
                    'tab_slug' => 'advanced',
                    'toggle_slug' => 'fallback_text_settings',
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
			'filters' => false,
			'link_options'  => false,
		);
	}

	public function get_fields() {

		$twitter_username 	= '';
		$plugin_options		= get_option( ELICUS_DIVI_PLUS_OPTION );
		if ( isset( $plugin_options['dipl-twitter-username'] ) && '' !== $plugin_options['dipl-twitter-username'] ) {
			$twitter_username = sanitize_text_field( $plugin_options['dipl-twitter-username'] );
		}
		
		return array(
			'twitter_username' => array(
				'label'            	=> esc_html__( 'Twitter Username', 'divi-plus' ),
				'type'             	=> 'text',
				'option_category'  	=> 'basic_option',
				'default' 		   	=> $twitter_username,
				'default_on_front' 	=> $twitter_username,
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'main_content',
				'description'      	=> et_get_safe_localization(
										sprintf(
											'%1$s <a href="%2$s" title="%3$s" target="_blank">%4$s</a> %5$s',
											esc_html__( 'Here you can enter the twitter username without @ for the button. If you want to use a single username all over the website and it can be saved in the plugin', 'divi-plus' ),
											esc_url( admin_url( '/options-general.php?page=divi-plus-options&menu=integration&submenu=twitter' ) ),
											esc_html__( 'Divi Plus Settings', 'divi-plus' ),
											esc_html__( 'settings', 'divi-plus' ),
											esc_html__( 'page. Or if you want to use different username everytime then you can enter here.', 'divi-plus' )
										)
									),
			),
			'show_username' => array(
				'label'            	=> esc_html__( 'Show Username', 'divi-plus' ),
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
				'description'      	=> esc_html__( 'Here you can choose whether to show username in the button.', 'divi-plus' ),
			),
			'show_count' => array(
				'label'            	=> esc_html__( 'Show Count', 'divi-plus' ),
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
				'description'      	=> esc_html__( 'Here you can choose whether to show the number of accounts following the specified account.', 'divi-plus' ),
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
			'do_not_track' => array(
				'label'           	=> esc_html__( 'Do not track', 'divi-plus' ),
				'type'             	=> 'yes_no_button',
				'option_category'  	=> 'configuration',
				'options'          	=> array(
                    'off'   => esc_html__( 'Off', 'divi-plus' ),
                    'on'    => esc_html__( 'On', 'divi-plus' ),
                ),
                'default' 			=> 'off',
                'default_on_front' 	=> 'off',
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'main_content',
				'description'     	=> et_get_safe_localization(
										sprintf(
											'%1$s <a href="%2$s" title="%3$s" target="_blank">%4$s</a> %5$s <a href="%6$s" title="%7$s" target="_blank">%7$s</a>.',
											esc_html__( 'When set to on, the button and its embedded page on your site are not used for purposes that include', 'divi-plus' ),
											esc_url( 'https://help.twitter.com/en/using-twitter/tailored-suggestions' ),
											esc_html__( 'Personalized Suggestions', 'divi-plus' ),
											esc_html__( 'personalized suggestions', 'divi-plus' ),
											esc_html__( 'and', 'divi-plus' ),
											esc_url( 'https://help.twitter.com/en/safety-and-security/privacy-controls-for-tailored-ads' ),
											esc_html__( 'Personalized Ads', 'divi-plus' ),
											esc_html__( 'personalized ads', 'divi-plus' )
										)
									),
			),
		);

	}


	public function render( $attrs, $content, $render_slug ) {

		$twitter_username 	= $this->props['twitter_username'];
		$button_size		= $this->props['button_size'];
		$show_username 		= 'on' === $this->props['show_username'] ? 'true' : 'false';
		$show_count			= 'on' === $this->props['show_count'] ? 'true' : 'false';
		$do_not_track		= 'on' === $this->props['do_not_track'] ? 'true' : 'false';

		if ( '' !== $twitter_username ) {
			//wp_enqueue_script( 'dipl-twitter-follow-button-custom', PLUGIN_PATH . 'includes/modules/TwitterFollowButton/dipl-twitter-follow-button-custom.min.js', array('jquery'), '1.0.0', true );
			$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        	wp_enqueue_style( 'dipl-twitter-follow-button-style', PLUGIN_PATH . 'includes/modules/TwitterFollowButton/' . $file . '.min.css', array(), '1.0.0' );
			$follow_button = sprintf(
				'<div class="dipl_twitter_embedded_follow_button">
					<a class="dipl_twitter_embed_follow_button" href="%1$s" data-show-screen-name="%2$s" data-show-count="%3$s" data-size="%4$s" data-dnt="%5$s" data-name="%6$s">Follow%7$s</a>
				</div>',
				esc_url( 'https://twitter.com/' . $twitter_username ),
				esc_attr( $show_username ),
				esc_attr( $show_count ),
				esc_attr( $button_size ),
			 	esc_attr( $do_not_track ),
			 	esc_attr( $twitter_username ),
				'true' === $show_username ? esc_attr( ' @' . $twitter_username ) : ''
			);
		} else {
			$follow_button = '';
		}

		return $follow_button;
	}

}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
    $modules = explode( ',', $plugin_options['dipl-modules'] );
    if ( in_array( 'dipl_twitter_follow_button', $modules ) ) {
        new DIPL_TwitterFollowButton();
    }
} else {
    new DIPL_TwitterFollowButton();
}
