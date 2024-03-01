<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_TwitterTweetButton extends ET_Builder_Module {

	public $slug       = 'dipl_twitter_tweet_button';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name = esc_html__( 'DP Twitter Share', 'divi-plus' );
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
                        'main'  => "{$this->main_css_element} .dipl_twitter_embed_tweet_button",
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
				'button' => array(
					'label_prefix' => esc_html__( 'Button', 'divi-plus' ),
					'css'          => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element} .dipl_twitter_embedded_tweet_button",
							'border_styles' => "{$this->main_css_element} .dipl_twitter_embedded_tweet_button",
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
				'button' => array(
					'label'       => esc_html__( 'Button Box Shadow', 'divi-plus' ),
					'css'         => array(
						'main' => "{$this->main_css_element} .dipl_twitter_embedded_tweet_button",
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
			'custom_text' => array(
				'label'                 => esc_html__( 'Custom Share Text', 'divi-plus' ),
				'type'                  => 'textarea',
				'option_category'       => 'basic_option',
				'dynamic_content'		=> 'text',
				'tab_slug'              => 'general',
				'toggle_slug'           => 'main_content',
				'description'           => esc_html__( 'Enter Pre-populated text highlighted in the Tweet composer.', 'divi-plus' ),
			),
			'custom_url' => array(
				'label'            	=> esc_html__( 'Url', 'divi-plus' ),
				'type'             	=> 'text',
				'option_category'  	=> 'basic_option',
				'dynamic_content'	=> 'url',
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'main_content',
				'description'      	=> esc_html__('Enter the URL included with the Tweet.', 'divi-plus'),
			),
			'hashtags' => array(
				'label'            	=> esc_html__( 'Hashtags', 'divi-plus' ),
				'type'             	=> 'text',
				'option_category'  	=> 'basic_option',
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'main_content',
				'description'      	=> esc_html__('A comma-separated list of hashtags without the preceding # character to be appended to default Tweet text.', 'divi-plus'),
			),
			'via' => array(
				'label'            	=> esc_html__( 'Via', 'divi-plus' ),
				'type'             	=> 'text',
				'option_category'  	=> 'basic_option',
				'default' 		   	=> $twitter_username,
				'default_on_front' 	=> $twitter_username,
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'main_content',
				'description'      	=> esc_html__('A Twitter username to associate with the Tweet, such as your site’s Twitter account. The provided username will be appended to the end of the Tweet with the text “via @username”. A logged-out Twitter user will be encouraged to sign-in or join Twitter to engage with the via account’s Tweets. The account may be suggested as an account to follow after the user posts a Tweet.', 'divi-plus'),
			),
			'related' => array(
				'label'            	=> esc_html__( 'Related', 'divi-plus' ),
				'type'             	=> 'text',
				'option_category'  	=> 'basic_option',
				'default' 		   	=> '',
				'default_on_front' 	=> '',
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'main_content',
				'description'      	=> esc_html__('A comma-separated list of accounts related to the content of the shared URI. Twitter may suggest accounts to follow after the author has successfully posted a Tweet. These displayed accounts are influenced by the via and related parameters.', 'divi-plus'),
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
		$button_size		= $this->props['button_size'];
		$custom_text 		= $this->props['custom_text'];
		$custom_url 		= $this->props['custom_url'];
		$hashtags			= $this->props['hashtags'];
		$via 				= $this->props['via'];
		$related 			= $this->props['related'];
		$do_not_track		= 'on' === $this->props['do_not_track'] ? 'true' : 'false';

		//wp_enqueue_script( 'dipl-twitter-tweet-button-custom', PLUGIN_PATH . 'includes/modules/TwitterTweetButton/dipl-twitter-tweet-button-custom.min.js', array('jquery'), '1.0.0', true );
		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-twitter-tweet-button-style', PLUGIN_PATH . 'includes/modules/TwitterTweetButton/' . $file . '.min.css', array(), '1.0.0' );
		$tweet_button = sprintf(
			'<div class="dipl_twitter_embedded_tweet_button">
				<a class="dipl_twitter_embed_tweet_button" href="https://twitter.com/intent/tweet" data-text="%1$s" data-url="%2$s" data-size="%3$s" data-dnt="%4$s" data-hashtags="%5$s" data-via="%6$s" data-related="%7$s">Tweet</a>
			</div>',
			esc_attr( $custom_text ),
			esc_url( $custom_url ),
			esc_attr( $button_size ),
		 	esc_attr( $do_not_track ),
		 	esc_attr( $hashtags ),
		 	esc_attr( $via ),
		 	esc_attr( $related )
		);

		return $tweet_button;
	}

}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
    $modules = explode( ',', $plugin_options['dipl-modules'] );
    if ( in_array( 'dipl_twitter_tweet_button', $modules ) ) {
        new DIPL_TwitterTweetButton();
    }
} else {
    new DIPL_TwitterTweetButton();
}
