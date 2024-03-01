<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_TwitterTimeline extends ET_Builder_Module {

	public $slug       = 'dipl_twitter_timeline';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name = esc_html__( 'DP Twitter Timeline', 'divi-plus' );
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
                        'main'  => "{$this->main_css_element} .dipl_twitter_embed_timeline",
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
				'default'	=> false,
				'timeline' 	=> array(
					'label_prefix' => 'Timeline',
					'css'          => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element} .twitter-timeline",
							'border_styles' => "{$this->main_css_element} .twitter-timeline",
						),
						'important' => 'all',
					),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'border',
				),
			),
			'box_shadow' => array(
				'default' => false,
				'timeline' => array(
					'label'       => esc_html__( 'Timeline Box Shadow', 'divi-plus' ),
					'css'         => array(
						'main' => "{$this->main_css_element} .twitter-timeline",
						'important' => 'all',
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'box_shadow',
				),
			),
			'background' => false,
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
		
		return array_merge(
			array(
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
												esc_html__( 'Here you can enter the twitter username without @ for the timeline. If you want to use a single username all over the website and it can be saved in the plugin', 'divi-plus' ),
												esc_url( admin_url( '/options-general.php?page=divi-plus-options&menu=integration&submenu=twitter' ) ),
												esc_html__( 'Divi Plus Settings', 'divi-plus' ),
												esc_html__( 'settings', 'divi-plus' ),
												esc_html__( 'page. Or if you want to use different username everytime then you can enter here.', 'divi-plus' )
											)
										),
				),
				'tweet_limit' => array(
					'label'             => esc_html__( 'Tweet Limit', 'divi-plus' ),
					'type'              => 'range',
					'option_category'  	=> 'layout',
					'range_settings'    => array(
						'min'   => '1',
						'max'   => '20',
						'step'  => '1',
					),
					'unitless'			=> true,
					'fixed_range'       => true,
					'mobile_options'    => false,
					'allow_empty'		=> true,
					'default'			=> '',
					'default_on_front'	=> '',
					'tab_slug'        	=> 'general',
					'toggle_slug'     	=> 'main_content',
					'description'       => esc_html__('Increase or decrease the number of tweets to display in timeline. The height parameter has no effect when a Tweet limit is set.', 'divi-plus'),
				),
				'show_replies' => array(
					'label'            	=> esc_html__( 'Show Replies', 'divi-plus' ),
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
					'description'      	=> esc_html__( 'Here you can choose whether to show replies or not.', 'divi-plus' ),
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
				'twitter_chrome' => array(
					'label'           	=> esc_html__( 'Chrome', 'divi-plus' ),
					'type'            	=> 'multiple_checkboxes',
					'option_category' 	=> 'configuration',
					'options'         	=> array(
						'noheader' 		=> esc_html__( 'No Header', 'divi-plus' ),
						'nofooter' 		=> esc_html__( 'No Footer', 'divi-plus' ),
						'noborders' 	=> esc_html__( 'No Borders', 'divi-plus' ),
						'transparent' 	=> esc_html__( 'No Background', 'divi-plus' ),
					),
					'default'         	=> 'off|off|off|off',
					'default_on_front'  => 'off|off|off|off',
					'tab_slug'        	=> 'general',
					'toggle_slug'     	=> 'display',
					'description'     	=> et_get_safe_localization(
											sprintf(
												'%1$s<br/><strong>%2$s</strong>%3$s <a href="%4$s" target="_blank">%5$s</a><br/><strong>%6$s</strong>%7$s<br/><strong>%8$s</strong>%9$s<br/><strong>%10$s</strong>%11$s',
												esc_html__( 'Here you can choose the elements to design the timeline.', 'divi-plus' ),
												esc_html__( 'No Header: ', 'divi-plus' ),
												esc_html__( 'Hides the timeline header. Implementing sites must add their own Twitter attribution, link to the source timeline, and comply with other Twitter', 'divi-plus' ),
												esc_url( 'https://developer.twitter.com/en/developer-terms/display-requirements' ),
												esc_html__( 'display requirements.', 'divi-plus' ),
												esc_html__( 'No Footer: ', 'divi-plus' ),
												esc_html__( 'Hides the timeline footer and Tweet composer link.', 'divi-plus' ),
												esc_html__( 'No Borders: ', 'divi-plus' ),
												esc_html__( 'Removes all borders within the timeline including borders surrounding the timeline area and separating Tweets.', 'divi-plus' ),
												esc_html__( 'No Background: ', 'divi-plus' ),
												esc_html__( 'Removes the timeline\'s background color.', 'divi-plus' )
											)
										),
				),
				'timeline_width' => array(
					'label'             => esc_html__( 'Frame Width', 'divi-plus' ),
					'type'              => 'range',
					'option_category'  	=> 'layout',
					'range_settings'    => array(
						'min'   => '100',
						'max'   => '800',
						'step'  => '1',
					),
					'unitless'			=> true,
					'fixed_range'       => true,
					'mobile_options'    => false,
					'default'           => '350',
					'default_on_front'  => '350',
					'tab_slug'        	=> 'general',
					'toggle_slug'     	=> 'display',
					'description'       => esc_html__('Increase or decrease the timeline max width.', 'divi-plus'),
				),
				'timeline_height' => array(
					'label'             => esc_html__( 'Frame Height', 'divi-plus' ),
					'type'              => 'range',
					'option_category'  	=> 'layout',
					'range_settings'    => array(
						'min'   => '100',
						'max'   => '1000',
						'step'  => '1',
					),
					'unitless'			=> true,
					'fixed_range'       => true,
					'mobile_options'    => false,
					'default'           => '500',
					'default_on_front'  => '500',
					'tab_slug'        	=> 'general',
					'toggle_slug'     	=> 'display',
					'description'       => esc_html__('Increase or decrease the timeline height.', 'divi-plus'),
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
												esc_html__( 'When set to on, the timeline and its embedded page on your site are not used for purposes that include', 'divi-plus' ),
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
				'timeline_bg_color' => array(
	                'label'                 => esc_html__( 'Timeline Background', 'divi-plus' ),
	                'type'                  => 'background-field',
	                'base_name'             => 'timeline_bg',
	                'context'               => 'timeline_bg_color',
	                'option_category'       => 'button',
	                'custom_color'          => true,
	                'background_fields'     => $this->generate_background_options( 'timeline_bg', 'button', 'advanced', 'background', 'timeline_bg_color' ),
	                'hover'                 => 'tabs',
	                'mobile_options'        => true,
	                'tab_slug'              => 'general',
	                'toggle_slug'           => 'background',
	                'description'           => esc_html__( 'Customize the background style of the timeline by adjusting the background color, gradient, and image. This only works if \'No Background\'is selected in chrome settings', 'divi-plus' ),
				),
			),
			$this->generate_background_options( 'timeline_bg', 'skip', 'general', 'background', 'timeline_bg_color' )
		);

	}


	public function render( $attrs, $content, $render_slug ) {

		$twitter_username 	= $this->props['twitter_username'];
		$tweet_limit 		= $this->props['tweet_limit'];
		$theme				= $this->props['theme'];
		$twitter_chrome		= $this->props['twitter_chrome'];
		$timeline_width		= $this->props['timeline_width'];
		$timeline_height	= $this->props['timeline_height'];
		$show_replies 		= 'on' === $this->props['show_replies'] ? 1 : 0;
		$do_not_track		= 'on' === $this->props['do_not_track'] ? 1 : 0;

		$whitelisted_chrome = array( 'noheader', 'nofooter', 'noborders', 'transparent' );
		$chrome = $this->process_multiple_checkboxes_value( $twitter_chrome, $whitelisted_chrome );

		if ( '' !== $twitter_username ) {
			//wp_enqueue_script( 'dipl-twitter-timeline-custom', PLUGIN_PATH . 'includes/modules/TwitterTimeline/dipl-twitter-timeline-custom.min.js', array('jquery'), '1.0.0', true );
			$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        	wp_enqueue_style( 'dipl-twitter-timeline-style', PLUGIN_PATH . 'includes/modules/TwitterTimeline/' . $file . '.min.css', array(), '1.0.0' );
			$twitter_timeline = sprintf(
				'<div class="dipl_twitter_embedded_timeline">
					<a class="dipl_twitter_embed_timeline" href="%1$s" data-name="%9$s" data-height="%2$s" data-width="%3$s" data-chrome="%4$s" data-theme="%5$s" data-show-replies="%6$s" data-tweet-limit="%7$s" data-dnt="%8$s" data-aria-polite="assertive" data-source="profile">Tweets by @%9$s</a>
				</div>',
				esc_url( 'https://twitter.com/' . $twitter_username ),
				esc_attr( $timeline_height ),
				esc_attr( $timeline_width ),
				esc_attr( $chrome ),
				esc_attr( $theme ),
				esc_attr( $show_replies ),
				esc_attr( $tweet_limit ),
				esc_attr( $do_not_track ),
				esc_attr( $twitter_username )
			);
		} else {
			$twitter_timeline = '';
		}
		
		$options = array(
            'normal' => array(
                'timeline_bg' => "{$this->main_css_element} .dipl_twitter_embedded_timeline",
            ),
        );
		$this->process_custom_background( $render_slug, $options );

		return $twitter_timeline;
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

	public function process_custom_background( $function_name, $options ) {

        $normal_fields = $options['normal'];
        
        foreach ( $normal_fields as $option_name => $element ) {
            
            $css_element           = $element;
            $css_element_processed = $element;

            if ( is_array( $element ) ) {
                $css_element_processed = implode( ', ', $element );
            }
            
            // Place to store processed background. It will be compared with the smaller device
            // background processed value to avoid rendering the same styles.
            $processed_background_color  = '';
            $processed_background_image  = '';
            $processed_background_blend  = '';
    
            // Store background images status because the process is extensive.
            $background_image_status = array(
                'desktop' => false,
                'tablet'  => false,
                'phone'   => false,
            );

            // Background Options Styling.
            foreach ( et_pb_responsive_options()->get_modes() as $device ) {
                $background_base_name = $option_name;
                $background_prefix    = "{$option_name}_";
                $background_style     = '';
                $is_desktop           = 'desktop' === $device;
                $suffix               = ! $is_desktop ? "_{$device}" : '';
    
                $background_color_style = '';
                $background_image_style = '';
                $background_images      = array();
    
                $has_background_color_gradient         = false;
                $has_background_image                  = false;
                $has_background_gradient_and_image     = false;
                $is_background_color_gradient_disabled = false;
                $is_background_image_disabled          = false;
    
                $background_color_gradient_overlays_image = 'off';
    
                // Ensure responsive is active.
                if ( ! $is_desktop && ! et_pb_responsive_options()->is_responsive_enabled( $this->props, "{$option_name}_color" ) ) {
                    continue;
                }

                // A. Background Gradient.
                $use_background_color_gradient = et_pb_responsive_options()->get_inheritance_background_value( $this->props, "{$background_prefix}use_color_gradient", $device, $background_base_name, $this->fields_unprocessed );
    
                if ( 'on' === $use_background_color_gradient ) {
                    $background_color_gradient_overlays_image = et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_overlays_image{$suffix}", '', true );
    
                    $gradient_properties = array(
                        'type'             => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_type{$suffix}", '', true ),
                        'direction'        => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_direction{$suffix}", '', true ),
                        'radial_direction' => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_direction_radial{$suffix}", '', true ),
                        'color_start'      => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_start{$suffix}", '', true ),
                        'color_end'        => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_end{$suffix}", '', true ),
                        'start_position'   => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_start_position{$suffix}", '', true ),
                        'end_position'     => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_end_position{$suffix}", '', true ),
                    );
    
                    // Save background gradient into background images list.
                    $background_images[] = $this->get_gradient( $gradient_properties );
    
                    // Flag to inform BG Color if current module has Gradient.
                    $has_background_color_gradient = true;
                } else if ( 'off' === $use_background_color_gradient ) {
                    $is_background_color_gradient_disabled = true;
                }
    
                // B. Background Image.
                $background_image = et_pb_responsive_options()->get_inheritance_background_value( $this->props, "{$background_prefix}image", $device, $background_base_name, $this->fields_unprocessed );
                $parallax         = et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}parallax{$suffix}", 'off' );
    
                // BG image and parallax status.
                $is_background_image_active         = '' !== $background_image && 'on' !== $parallax;
                $background_image_status[ $device ] = $is_background_image_active;
    
                if ( $is_background_image_active ) {
                    // Flag to inform BG Color if current module has Image.
                    $has_background_image = true;
    
                    // Check previous BG image status. Needed to get the correct value.
                    $is_prev_background_image_active = true;
                    if ( ! $is_desktop ) {
                        $is_prev_background_image_active = 'tablet' === $device ? $background_image_status['desktop'] : $background_image_status['tablet'];
                    }
    
                    // Size.
                    $background_size_default = ET_Builder_Element::$_->array_get( $this->fields_unprocessed, "{$background_prefix}size.default", '' );
                    $background_size         = et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}size{$suffix}", $background_size_default, ! $is_prev_background_image_active );
            
                    if ( '' !== $background_size ) {
                        $background_style .= sprintf(
                            'background-size: %1$s; ',
                            esc_html( $background_size )
                        );
                    }
    
                    // Position.
                    $background_position_default = ET_Builder_Element::$_->array_get( $this->fields_unprocessed, "{$background_prefix}position.default", '' );
                    $background_position         = et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}position{$suffix}", $background_position_default, ! $is_prev_background_image_active );
    
                    if ( '' !== $background_position ) {
                        $background_style .= sprintf(
                            'background-position: %1$s; ',
                            esc_html( str_replace( '_', ' ', $background_position ) )
                        );
                    }
    
                    // Repeat.
                    $background_repeat_default = ET_Builder_Element::$_->array_get( $this->fields_unprocessed, "{$background_prefix}repeat.default", '' );
                    $background_repeat         = et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}repeat{$suffix}", $background_repeat_default, ! $is_prev_background_image_active );
    
                    if ( '' !== $background_repeat ) {
                        $background_style .= sprintf(
                            'background-repeat: %1$s; ',
                            esc_html( $background_repeat )
                        );
                    }
    
                    // Blend.
                    $background_blend_default = ET_Builder_Element::$_->array_get( $this->fields_unprocessed, "{$background_prefix}blend.default", '' );
                    $background_blend         = et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}blend{$suffix}", $background_blend_default, ! $is_prev_background_image_active );
                    $background_blend_inherit = et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}blend{$suffix}", '', true );
    
                    if ( '' !== $background_blend_inherit ) {
                        // Don't print the same image blend style.
                        if ( '' !== $background_blend ) {
                            $background_style .= sprintf(
                                'background-blend-mode: %1$s; ',
                                esc_html( $background_blend )
                            );
                        }
    
                        // Reset - If background has image and gradient, force background-color: initial.
                        if ( $has_background_color_gradient && $has_background_image && $background_blend_inherit !== $background_blend_default ) {
                            $has_background_gradient_and_image = true;
                            $background_color_style            = 'initial';
                            $background_style                  .= 'background-color: initial; ';
                        }
    
                        $processed_background_blend = $background_blend;
                    }
    
                    // Only append background image when the image is exist.
                    $background_images[] = sprintf( 'url(%1$s)', esc_html( $background_image ) );
                } else if ( '' === $background_image ) {
                    // Reset - If background image is disabled, ensure we reset prev background blend mode.
                    if ( '' !== $processed_background_blend ) {
                        $background_style .= 'background-blend-mode: normal; ';
                        $processed_background_blend = '';
                    }
    
                    $is_background_image_disabled = true;
                }
    
                if ( ! empty( $background_images ) ) {
                    // The browsers stack the images in the opposite order to what you'd expect.
                    if ( 'on' !== $background_color_gradient_overlays_image ) {
                        $background_images = array_reverse( $background_images );
                    }
    
                    // Set background image styles only it's different compared to the larger device.
                    $background_image_style = join( ', ', $background_images );
                    if ( $processed_background_image !== $background_image_style ) {
                        $background_style .= sprintf(
                            'background-image: %1$s !important;',
                            esc_html( $background_image_style )
                        );
                    }
                } else if ( ! $is_desktop && $is_background_color_gradient_disabled && $is_background_image_disabled ) {
                    // Reset - If background image and gradient are disabled, reset current background image.
                    $background_image_style = 'initial';
                    $background_style .= 'background-image: initial !important;';
                }
    
                // Save processed background images.
                $processed_background_image = $background_image_style;
    
                // C. Background Color.
                if ( ! $has_background_gradient_and_image ) {
                    // Background color `initial` was added by default to reset button background
                    // color when user disable it on mobile preview mode. However, it should
                    // be applied only when the background color is really disabled because user
                    // may use theme customizer to setup global button background color. We also
                    // need to ensure user still able to disable background color on mobile.
                    $background_color_enable  = ET_Builder_Element::$_->array_get( $this->props, "{$background_prefix}enable_color{$suffix}", '' );
                    $background_color_initial = 'off' === $background_color_enable && ! $is_desktop ? 'initial' : '';
    
                    $background_color       = et_pb_responsive_options()->get_inheritance_background_value( $this->props, "{$background_prefix}color", $device, $background_base_name, $this->fields_unprocessed );
                    $background_color       = '' !== $background_color ? $background_color : $background_color_initial;
                    $background_color_style = $background_color;
                    
                    if ( '' !== $background_color && $processed_background_color !== $background_color ) {
                        $background_style .= sprintf(
                            'background-color: %1$s; ',
                            esc_html( $background_color )
                        );
                    }
                }
    
                // Save processed background color.
                $processed_background_color = $background_color_style;
    
                // Print background gradient and image styles.
                if ( '' !== $background_style ) {
                    $background_style_attrs = array(
                        'selector'    => $css_element_processed,
                        'declaration' => rtrim( $background_style ),
                        'priority'    => $this->_style_priority,
                    );
    
                    // Add media query attribute to background style attrs.
                    if ( 'desktop' !== $device ) {
                        $current_media_query = 'tablet' === $device ? 'max_width_980' : 'max_width_767';
                        $background_style_attrs['media_query'] = ET_Builder_Element::get_media_query( $current_media_query );
                    }
    
                    ET_Builder_Element::set_style( $function_name, $background_style_attrs );
                }
            }
            
        }

        if ( isset( $options['hover'] ) ) {
            $hover_fields = $options['hover'];
        } else {
            $hover_fields = $options['normal'];
            foreach ( $hover_fields as &$value ) {
                $value = $value . ':hover';
            }
        }

        foreach ( $hover_fields as $option_name => $element ) {

            $css_element           = $element;
            $css_element_processed = $element;
            
            if ( is_array( $element ) ) {
                $css_element_processed = implode( ', ', $element );
            }

            // Background Hover.
            if ( et_builder_is_hover_enabled( "{$option_name}_color", $this->props ) ) {

                $background_base_name       = $option_name;
                $background_prefix          = "{$option_name}_";
                $background_images_hover    = array();
                $background_hover_style     = '';

                $has_background_color_gradient_hover         = false;
                $has_background_image_hover                  = false;
                $has_background_gradient_and_image_hover     = false;
                $is_background_color_gradient_hover_disabled = false;
                $is_background_image_hover_disabled          = false;

                $background_color_gradient_overlays_image_desktop = et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_overlays_image", 'off', true );
    
                $gradient_properties_desktop = array(
                    'type'             => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_type", '', true ),
                    'direction'        => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_direction", '', true ),
                    'radial_direction' => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_direction_radial", '', true ),
                    'color_start'      => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_start", '', true ),
                    'color_end'        => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_end", '', true ),
                    'start_position'   => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_start_position", '', true ),
                    'end_position'     => et_pb_responsive_options()->get_any_value( $this->props, "{$background_prefix}color_gradient_end_position", '', true ),
                );

                $background_color_gradient_overlays_image_hover = 'off';

                // Background Gradient Hover.
                // This part is little bit different compared to other hover implementation. In
                // this case, hover is enabled on the background field, not on the each of those
                // fields. So, built in function get_value() doesn't work in this case.
                // Temporarily, we need to fetch the the value from get_raw_value().
                $use_background_color_gradient_hover = et_pb_responsive_options()->get_inheritance_background_value( $this->props, "{$background_prefix}use_color_gradient", 'hover', $background_base_name, $this->fields_unprocessed );

                if ( 'on' === $use_background_color_gradient_hover ) {
                    // Desktop value as default.
                    $background_color_gradient_type_desktop             = ET_Builder_Element::$_->array_get( $gradient_properties_desktop, 'type', '' );
                    $background_color_gradient_direction_desktop        = ET_Builder_Element::$_->array_get( $gradient_properties_desktop, 'direction', '' );
                    $background_color_gradient_radial_direction_desktop = ET_Builder_Element::$_->array_get( $gradient_properties_desktop, 'radial_direction', '' );
                    $background_color_gradient_color_start_desktop      = ET_Builder_Element::$_->array_get( $gradient_properties_desktop, 'color_start', '' );
                    $background_color_gradient_color_end_desktop        = ET_Builder_Element::$_->array_get( $gradient_properties_desktop, 'color_end', '' );
                    $background_color_gradient_start_position_desktop   = ET_Builder_Element::$_->array_get( $gradient_properties_desktop, 'start_position', '' );
                    $background_color_gradient_end_position_desktop     = ET_Builder_Element::$_->array_get( $gradient_properties_desktop, 'end_position', '' );

                    // Hover value.
                    $background_color_gradient_type_hover             = et_pb_hover_options()->get_raw_value( "{$background_prefix}color_gradient_type", $this->props, $background_color_gradient_type_desktop );
                    $background_color_gradient_direction_hover        = et_pb_hover_options()->get_raw_value( "{$background_prefix}color_gradient_direction", $this->props, $background_color_gradient_direction_desktop );
                    $background_color_gradient_direction_radial_hover = et_pb_hover_options()->get_raw_value( "{$background_prefix}color_gradient_direction_radial", $this->props, $background_color_gradient_radial_direction_desktop );
                    $background_color_gradient_start_hover            = et_pb_hover_options()->get_raw_value( "{$background_prefix}color_gradient_start", $this->props, $background_color_gradient_color_start_desktop );
                    $background_color_gradient_end_hover              = et_pb_hover_options()->get_raw_value( "{$background_prefix}color_gradient_end", $this->props, $background_color_gradient_color_end_desktop );
                    $background_color_gradient_start_position_hover   = et_pb_hover_options()->get_raw_value( "{$background_prefix}color_gradient_start_position", $this->props, $background_color_gradient_start_position_desktop );
                    $background_color_gradient_end_position_hover     = et_pb_hover_options()->get_raw_value( "{$background_prefix}color_gradient_end_position", $this->props, $background_color_gradient_end_position_desktop );
                    $background_color_gradient_overlays_image_hover   = et_pb_hover_options()->get_raw_value( "{$background_prefix}color_gradient_overlays_image", $this->props, $background_color_gradient_overlays_image_desktop );

                    $has_background_color_gradient_hover = true;

                    $gradient_values_hover = array(
                        'type'             => '' !== $background_color_gradient_type_hover ? $background_color_gradient_type_hover : $background_color_gradient_type_desktop,
                        'direction'        => '' !== $background_color_gradient_direction_hover ? $background_color_gradient_direction_hover : $background_color_gradient_direction_desktop,
                        'radial_direction' => '' !== $background_color_gradient_direction_radial_hover ? $background_color_gradient_direction_radial_hover : $background_color_gradient_radial_direction_desktop,
                        'color_start'      => '' !== $background_color_gradient_start_hover ? $background_color_gradient_start_hover : $background_color_gradient_color_start_desktop,
                        'color_end'        => '' !== $background_color_gradient_end_hover ? $background_color_gradient_end_hover : $background_color_gradient_color_end_desktop,
                        'start_position'   => '' !== $background_color_gradient_start_position_hover ? $background_color_gradient_start_position_hover : $background_color_gradient_start_position_desktop,
                        'end_position'     => '' !== $background_color_gradient_end_position_hover ? $background_color_gradient_end_position_hover : $background_color_gradient_end_position_desktop,
                    );

                    $background_images_hover[] = $this->get_gradient( $gradient_values_hover );
                } else if ( 'off' === $use_background_color_gradient_hover ) {
                    $is_background_color_gradient_hover_disabled = true;
                }

                // Background Image Hover.
                // This part is little bit different compared to other hover implementation. In
                // this case, hover is enabled on the background field, not on the each of those
                // fields. So, built in function get_value() doesn't work in this case.
                // Temporarily, we need to fetch the the value from get_raw_value().
                $background_image_hover = et_pb_responsive_options()->get_inheritance_background_value( $this->props, "{$background_prefix}image", 'hover', $background_base_name, $this->fields_unprocessed );
                $parallax_hover         = et_pb_hover_options()->get_raw_value( "{$background_prefix}parallax", $this->props );

                if ( '' !== $background_image_hover && null !== $background_image_hover && 'on' !== $parallax_hover ) {
                    // Flag to inform BG Color if current module has Image.
                    $has_background_image_hover = true;

                    // Size.
                    $background_size_hover   = et_pb_hover_options()->get_raw_value( "{$background_prefix}size", $this->props );
                    $background_size_desktop = ET_Builder_Element::$_->array_get( $this->props, "{$background_prefix}size", '' );
                    $is_same_background_size = $background_size_hover === $background_size_desktop;
                    if ( empty( $background_size_hover ) && ! empty( $background_size_desktop ) ) {
                        $background_size_hover = $background_size_desktop;
                    }

                    if ( ! empty( $background_size_hover ) && ! $is_same_background_size ) {
                        $background_hover_style .= sprintf(
                            'background-size: %1$s; ',
                            esc_html( $background_size_hover )
                        );
                    }

                    // Position.
                    $background_position_hover   = et_pb_hover_options()->get_raw_value( "{$background_prefix}position", $this->props );
                    $background_position_desktop = ET_Builder_Element::$_->array_get( $this->props, "{$background_prefix}position", '' );
                    $is_same_background_position = $background_position_hover === $background_position_desktop;
                    if ( empty( $background_position_hover ) && ! empty( $background_position_desktop ) ) {
                        $background_position_hover = $background_position_desktop;
                    }

                    if ( ! empty( $background_position_hover ) && ! $is_same_background_position ) {
                        $background_hover_style .= sprintf(
                            'background-position: %1$s; ',
                            esc_html( str_replace( '_', ' ', $background_position_hover ) )
                        );
                    }

                    // Repeat.
                    $background_repeat_hover   = et_pb_hover_options()->get_raw_value( "{$background_prefix}repeat", $this->props );
                    $background_repeat_desktop = ET_Builder_Element::$_->array_get( $this->props, "{$background_prefix}repeat", '' );
                    $is_same_background_repeat = $background_repeat_hover === $background_repeat_desktop;
                    if ( empty( $background_repeat_hover ) && ! empty( $background_repeat_desktop ) ) {
                        $background_repeat_hover = $background_repeat_desktop;
                    }

                    if ( ! empty( $background_repeat_hover ) && ! $is_same_background_repeat ) {
                        $background_hover_style .= sprintf(
                            'background-repeat: %1$s; ',
                            esc_html( $background_repeat_hover )
                        );
                    }

                    // Blend.
                    $background_blend_hover = et_pb_hover_options()->get_raw_value( "{$background_prefix}blend", $this->props );
                    $background_blend_default = ET_Builder_Element::$_->array_get( $this->fields_unprocessed, "{$background_prefix}blend.default", '' );
                    $background_blend_desktop = ET_Builder_Element::$_->array_get( $this->props, "{$background_prefix}blend", '' );
                    $is_same_background_blend = $background_blend_hover === $background_blend_desktop;
                    if ( empty( $background_blend_hover ) && ! empty( $background_blend_desktop ) ) {
                        $background_blend_hover = $background_blend_desktop;
                    }

                    if ( ! empty( $background_blend_hover ) ) {
                        if ( ! $is_same_background_blend ) {
                            $background_hover_style .= sprintf(
                                'background-blend-mode: %1$s; ',
                                esc_html( $background_blend_hover )
                            );
                        }

                        // Force background-color: initial;
                        if ( $has_background_color_gradient_hover && $has_background_image_hover && $background_blend_hover !== $background_blend_default ) {
                            $has_background_gradient_and_image_hover = true;
                            $background_hover_style .= 'background-color: initial !important;';
                        }
                    }

                    // Only append background image when the image exists.
                    $background_images_hover[] = sprintf( 'url(%1$s)', esc_html( $background_image_hover ) );
                } else if ( '' === $background_image_hover ) {
                    $is_background_image_hover_disabled = true;
                }

                if ( ! empty( $background_images_hover ) ) {
                    // The browsers stack the images in the opposite order to what you'd expect.
                    if ( 'on' !== $background_color_gradient_overlays_image_hover ) {
                        $background_images_hover = array_reverse( $background_images_hover );
                    }

                    $background_hover_style .= sprintf(
                        'background-image: %1$s !important;',
                        esc_html( join( ', ', $background_images_hover ) )
                    );
                } else if ( $is_background_color_gradient_hover_disabled && $is_background_image_hover_disabled ) {
                    $background_hover_style .= 'background-image: initial !important;';
                }

                // Background Color Hover.
                if ( ! $has_background_gradient_and_image_hover ) {
                    $background_color_hover = et_pb_responsive_options()->get_inheritance_background_value( $this->props, "{$background_prefix}color", 'hover', $background_base_name, $this->fields_unprocessed );
                    $background_color_hover = '' !== $background_color_hover ? $background_color_hover : 'transparent';

                    if ( '' !== $background_color_hover ) {
                        $background_hover_style .= sprintf(
                            'background-color: %1$s !important; ',
                            esc_html( $background_color_hover )
                        );
                    }
                }

                // Print background hover gradient and image styles.
                if ( '' !== $background_hover_style ) {
                    $background_hover_style_attrs = array(
                        'selector'    => $css_element_processed,
                        'declaration' => rtrim( $background_hover_style ),
                        'priority'    => $this->_style_priority,
                    );

                    ET_Builder_Element::set_style( $function_name, $background_hover_style_attrs );
                }
            }
        }
    }

}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
    $modules = explode( ',', $plugin_options['dipl-modules'] );
    if ( in_array( 'dipl_twitter_timeline', $modules ) ) {
        new DIPL_TwitterTimeline();
    }
} else {
    new DIPL_TwitterTimeline();
}
