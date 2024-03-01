<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_TwitterEmbeddedTweet extends ET_Builder_Module {

	public $slug       = 'dipl_twitter_embedded_tweet';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name = esc_html__( 'DP Twitter Embedded Tweet', 'divi-plus' );
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
				'tweet' => array(
					'label_prefix' => 'Tweet',
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dipl_tweet, %%order_class%% .twitter-tweet',
							'border_styles' => '%%order_class%% .dipl_tweet, %%order_class%% .twitter-tweet',
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
				'tweet' => array(
					'label'       => esc_html__( 'Tweet Box Shadow', 'divi-plus' ),
					'css'         => array(
						'main' => '%%order_class%% .dipl_tweet, %%order_class%% .twitter-tweet',
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
					'text_orientation' => '%%order_class%%',
				),
			),
			'text_shadow' => false,
			'fonts' => false,
			'filters' => false,
			'link_options'  => false,
		);
	}

	public function get_fields() {
		return array(
			'tweet_id' => array(
				'label'            	=> esc_html__( 'Tweet ID', 'divi-plus' ),
				'type'             	=> 'text',
				'option_category'  	=> 'basic_option',
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'main_content',
				'description'      	=> esc_html__( 'Here you can enter the ID of the tweet.', 'divi-plus' ),
			),
			'content' => array(
				'label'            	=> esc_html__( 'Fallback Content', 'divi-plus' ),
				'type'             	=> 'tiny_mce',
				'option_category'  	=> 'basic_option',
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'main_content',
				'description'      	=> esc_html__( 'Here you can enter the fallback content for the tweet.', 'divi-plus' ),
			),
			'cards' => array(
				'label'             => esc_html__( 'Cards', 'divi-plus' ),
				'type'             	=> 'yes_no_button',
				'option_category'  	=> 'configuration',
				'options'          	=> array(
                    'on'   	=> esc_html__( 'On', 'divi-plus' ),
                    'off'   => esc_html__( 'Off', 'divi-plus' ),
                ),
				'default'           => 'on',
				'default_on_front'  => 'on',
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'display',
				'description'       => esc_html__('When set to off, links in a Tweet are not expanded to photo, video, or link previews.', 'divi-plus'),
			),
			'conversation' => array(
				'label'            	=> esc_html__( 'Conversation', 'divi-plus' ),
				'type'             	=> 'yes_no_button',
				'option_category'  	=> 'configuration',
				'options'          	=> array(
                    'on'   	=> esc_html__( 'On', 'divi-plus' ),
                    'off'   => esc_html__( 'Off', 'divi-plus' ),
                ),
                'default' 			=> 'on',
                'default_on_front' 	=> 'on',
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'display',
				'description'      	=> esc_html__( 'When set to off, only the cited Tweet will be displayed even if it is in reply to another Tweet.', 'divi-plus' ),
			),
			'theme' => array(
				'label'             => esc_html__( 'Theme', 'divi-plus' ),
				'type'              => 'select',
				'option_category'   => 'layout',
				'options'           => array(
					'light'		=> esc_html__( 'Light', 'divi-plus' ),
					'dark'		=> esc_html__( 'Dark', 'divi-plus' ),
				),
				'default'           => 'light',
				'default_on_front'  => 'light',
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'display',
				'description'       => esc_html__('When set to dark, displays Tweet with light text over a dark background.', 'divi-plus'),
			),
			'tweet_max_width' => array(
				'label'             => esc_html__( 'Max Width', 'divi-plus' ),
				'type'              => 'range',
				'option_category'  	=> 'layout',
				'range_settings'    => array(
					'min'   => '250',
					'max'   => '550',
					'step'  => '1',
				),
				'fixed_unit'		=> 'px',
				'fixed_range'       => true,
				'validate_unit'		=> true,
				'mobile_options'    => false,
				'default'           => '350px',
				'default_on_front'  => '350px',
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'display',
				'description'       => esc_html__('Increase or decrease the tweet width. Min is 250px and Max is 550px.', 'divi-plus'),
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
											esc_html__( 'When set to on, the Tweet and its embedded page on your site are not used for purposes that include', 'divi-plus' ),
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
		$tweet_id 			= $this->props['tweet_id'];
		$theme				= $this->props['theme'];
		$tweet_max_width	= $this->props['tweet_max_width'];
    	$cards 				= 'off' === $this->props['cards'] ? 'hidden' : 'visible';
    	$conversation 		= 'off' === $this->props['conversation'] ? 'none' : 'all';
    	$do_not_track   	= 'off' === $this->props['do_not_track'] ? 0 : 1;
    	$text_orientation   = isset( $this->props['text_orientation'] ) ? $this->props['text_orientation'] : 'left';

    	if ( '' !== $tweet_id ) {
    		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        	wp_enqueue_style( 'dipl-twitter-embedded-tweet-style', PLUGIN_PATH . 'includes/modules/TwitterEmbeddedTweet/' . $file . '.min.css', array(), '1.0.0' );
			$embed_tweet = sprintf(
				'<div class="dipl_twitter_embedded_tweet_wrapper">
					<blockquote class="dipl_tweet" data-id="%1$s" data-cards="%2$s" data-conversation="%3$s" data-theme="%4$s" data-dnt="%5$s" data-width="%6$s">%7$s</blockquote>
				</div>',
				esc_attr( $tweet_id ),
				esc_attr( $cards ),
				esc_attr( $conversation ),
				esc_attr( $theme ),
				esc_attr( $do_not_track ),
				esc_attr( $tweet_max_width ),
				wp_kses_post( $this->content )
			);
		} else {
			$embed_tweet = '';
		}

		if ( 'center' === $text_orientation ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_twitter_embedded_tweet_wrapper',
					'declaration' => 'margin-left: auto; margin-right: auto;',
				)
			);
		}

		if ( 'right' === $text_orientation ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_twitter_embedded_tweet_wrapper',
					'declaration' => 'margin-left: auto;',
				)
			);
		}

		self::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dipl_twitter_embedded_tweet_wrapper',
				'declaration' => sprintf( 'width: %1$s;', esc_attr( $tweet_max_width ) ),
			)
		);
		
		return et_core_intentionally_unescaped( $embed_tweet, 'html' );
	}

}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
    $modules = explode( ',', $plugin_options['dipl-modules'] );
    if ( in_array( 'dipl_twitter_embedded_tweet', $modules ) ) {
        new DIPL_TwitterEmbeddedTweet();
    }
} else {
    new DIPL_TwitterEmbeddedTweet();
}
