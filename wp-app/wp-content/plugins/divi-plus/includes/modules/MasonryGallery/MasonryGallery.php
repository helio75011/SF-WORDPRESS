<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_MasonryGallery extends ET_Builder_Module {

	public $slug       = 'dipl_masonry_gallery';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name = esc_html__( 'DP Masonry Gallery', 'divi-plus' );
		$this->main_css_element = '%%order_class%%';
		add_filter( 'et_builder_processed_range_value', array( $this, 'dipl_builder_processed_range_value' ), 10, 3 );
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'main_content' => array(
						'title' => esc_html__( 'Configuration', 'divi-plus' ),
					),
					'elements' => array(
						'title' => esc_html__( 'Elements', 'divi-plus' ),
					),
				),
			),
			'advanced'   => array(
				'toggles' => array(
					'image_text' => array(
						'title' => esc_html__( 'Text', 'divi-plus' ),
                        'sub_toggles'   => array(
                            'title_text' => array(
                                'name' => 'Title',
                            ),
                            'caption_text' => array(
                                'name' => 'Caption',
                            ),
                        ),
                        'tabbed_subtoggles' => true,
					),
					'lightbox' => array(
						'title' => esc_html__( 'Lightbox', 'divi-plus' ),
					),
					'overlay' => array(
						'title' => esc_html__( 'Overlay', 'divi-plus' ),
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts' => array(
				'title' => array(
					'label'          => esc_html__( 'Title', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '18px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
						'default'        => '1.5em',
						'range_settings' => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing' => array(
						'default'        => '0px',
						'range_settings' => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'header_level'   => array(
						'default' => 'h4',
					),
					'text_align'     => array(
						'default' => 'left',
					),
					'css'            => array(
						'main'       => "{$this->main_css_element} .dipl_masonry_gallery_item_title, {$this->main_css_element}_lightbox .dipl_masonry_gallery_item_title",
						'text_align' => "{$this->main_css_element} .dipl_masonry_gallery_title_caption_wrapper, {$this->main_css_element}_lightbox .mfp-title",
					),
					'tab_slug'	=> 'advanced',
                    'toggle_slug' => 'image_text',
                    'sub_toggle' => 'title_text',
				),
				'caption'    => array(
					'label'          => esc_html__( 'Caption', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '14px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
						'default'        => '1.5em',
						'range_settings' => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing' => array(
						'default'        => '0px',
						'range_settings' => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'text_align'     => array(
						'default' => 'left',
					),
					'css'            => array(
						'main'  => "{$this->main_css_element} .dipl_masonry_gallery_item_caption, {$this->main_css_element}_lightbox .dipl_masonry_gallery_item_caption",
						'text_align' => "{$this->main_css_element} .dipl_masonry_gallery_title_caption_wrapper, {$this->main_css_element}_lightbox .mfp-title",
					),
					'tab_slug'	=> 'advanced',
                    'toggle_slug' => 'image_text',
                    'sub_toggle' => 'caption_text',
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
				'image' => array(
					'label_prefix' => 'Image',
					'css'          => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element} .dipl_masonry_gallery_item img, {$this->main_css_element} .dipl_masonry_gallery_item .et_overlay",
							'border_styles' => "{$this->main_css_element} .dipl_masonry_gallery_item img",
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
				'image' => array(
					'label'       => esc_html__( 'Image Box Shadow', 'divi-plus' ),
					'css'         => array(
						'main' => "{$this->main_css_element} .dipl_masonry_gallery_item img",
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
			'text' => false,
			'filters' => false,
		);
	}

	public function get_fields() {
		return array(
			'image_ids' => array(
				'label'            => esc_html__( 'Images', 'divi-plus' ),
				'type'             => 'upload-gallery',
				'option_category'  => 'basic_option',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Choose the images that you would like to appear in the image gallery.', 'divi-plus' ),
				'computed_affects' => array(
					'__gallery_data',
					'__gallery_metadata',
				),
			),
			'number_of_columns' => array(
                'label'             => esc_html__( 'Number Of Columns', 'divi-plus' ),
                'type'              => 'select',
                'option_category'   => 'configuration',
                'options'           => array(
                    '1'         => esc_html( '1' ),
                    '2'         => esc_html( '2' ),
                    '3'         => esc_html( '3' ),
                    '4'         => esc_html( '4' ),
                    '5'         => esc_html( '5' ),
                    '6'         => esc_html( '6' ),
                    '7'         => esc_html( '7' ),
                    '8'         => esc_html( '8' ),
                    '9'         => esc_html( '9' ),
                    '10'        => esc_html( '10' ),
                ),
                'default'           => '4',
                'default_on_front'  => '4',
                'mobile_options'    => true,
                'tab_slug'          => 'general',
                'toggle_slug'       => 'main_content',
                'description'       => esc_html__( 'Here you can select the number of columns to display images.', 'divi-plus' ),
            ),
            'column_spacing' => array(
                'label'             => esc_html__( 'Column Spacing', 'divi-plus' ),
				'type'              => 'range',
				'option_category'  	=> 'layout',
				'range_settings'    => array(
					'min'   => '0',
					'max'   => '100',
					'step'  => '1',
				),
				'fixed_unit'		=> 'px',
				'fixed_range'       => true,
				'validate_unit'		=> true,
				'mobile_options'    => true,
				'default'           => '15px',
				'default_on_front'  => '15px',
				'tab_slug'        	=> 'general',
				'toggle_slug'     	=> 'main_content',
				'description'       => esc_html__( 'Increase or decrease spacing between columns.', 'divi-plus' ),
            ),
            'image_size' => array(
                'label'             => esc_html__( 'Image Size', 'divi-plus' ),
                'type'              => 'select',
                'option_category'   => 'configuration',
                'options'           => array(
                    'medium' 	=> esc_html__( 'Medium', 'divi-plus' ),
                    'large' 	=> esc_html__( 'Large', 'divi-plus' ),
                    'full' 		=> esc_html__( 'Full', 'divi-plus' ),
                ),
                'default'           => 'medium',
                'default_on_front'  => 'medium',
                'tab_slug'          => 'general',
                'toggle_slug'       => 'main_content',
                'description'       => esc_html__( 'Here you can select the size of image.', 'divi-plus' ),
                'computed_affects' 	=> array(
					'__gallery_data',
				),
            ),
            'show_title' => array(
				'label'            => esc_html__( 'Show Title', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default' 			=> 'off',
				'default_on_front' 	=> 'off',
				'tab_slug'          => 'general',
				'toggle_slug'      	=> 'elements',
				'description'      	=> esc_html__( 'Whether or not to show the title for images (if available).', 'divi-plus' ),
			),
			'title_area' => array(
				'label'             => esc_html__( 'Show Title in', 'divi-plus' ),
                'type'              => 'select',
                'option_category'   => 'configuration',
                'options'           => array(
                    'lightbox'	=> esc_html__( 'Lightbox Only', 'divi-plus' ),
                    'gallery' 	=> esc_html__( 'Gallery Only', 'divi-plus' ),
                    'both'		=> esc_html__( 'Both', 'divi-plus' ),
                ),
                'default'           => 'lightbox',
                'default_on_front'  => 'lightbox',
                'show_if'         	=> array(
                    'show_title' => 'on',
                ),
                'tab_slug'          => 'general',
                'toggle_slug'       => 'elements',
                'description'       => esc_html__( 'Here you can select the area where you want to display title.', 'divi-plus' ),
			),
			'show_caption' => array(
				'label'            => esc_html__( 'Show Caption', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default' 			=> 'off',
				'default_on_front' 	=> 'off',
				'tab_slug'          => 'general',
				'toggle_slug'      	=> 'elements',
				'description'      	=> esc_html__( 'Whether or not to show the caption for images (if available).', 'divi-plus' ),
			),
			'caption_area' => array(
				'label'             => esc_html__( 'Show Caption in', 'divi-plus' ),
                'type'              => 'select',
                'option_category'   => 'configuration',
                'options'           => array(
                    'lightbox'	=> esc_html__( 'Lightbox Only', 'divi-plus' ),
                    'gallery' 	=> esc_html__( 'Gallery Only', 'divi-plus' ),
                    'both'		=> esc_html__( 'Both', 'divi-plus' ),
                ),
                'default'           => 'lightbox',
                'default_on_front'  => 'lightbox',
                'show_if'         	=> array(
                    'show_caption' => 'on',
                ),
                'tab_slug'          => 'general',
                'toggle_slug'       => 'elements',
                'description'       => esc_html__( 'Here you can select the area where you want to display caption.', 'divi-plus' ),
			),
            'enable_lightbox' => array(
				'label'            => esc_html__( 'Enable Lightbox', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default' 			=> 'off',
				'default_on_front' 	=> 'off',
				'tab_slug'          => 'general',
				'toggle_slug'      	=> 'elements',
				'description'      	=> esc_html__( 'Whether or not to show images in lightbox.', 'divi-plus' ),
			),
			'lightbox_title_and_caption_style' => array(
				'label'             => esc_html__( 'Title & Caption Style in Lightbox', 'divi-plus' ),
                'type'              => 'select',
                'option_category'   => 'configuration',
                'options'           => array(
                    'image_overlay'	=> esc_html__( 'Image Overlay', 'divi-plus' ),
                    'below_image' 	=> esc_html__( 'Below Image', 'divi-plus' ),
                ),
                'default'           => 'image_overlay',
                'default_on_front'  => 'image_overlay',
                'show_if'         	=> array(
                    'enable_lightbox' => 'on',
                ),
                'tab_slug'          => 'general',
                'toggle_slug'       => 'elements',
                'description'       => esc_html__( 'Here you can select the display style of title and caption in lightbox.', 'divi-plus' ),
			),
			'enable_overlay' => array(
				'label'            => esc_html__( 'Enable Image Overlay on Hover', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default' 			=> 'off',
				'default_on_front' 	=> 'off',
				'tab_slug'          => 'general',
				'toggle_slug'      	=> 'elements',
				'description'      	=> esc_html__( 'Whether or not to show images in lightbox.', 'divi-plus' ),
			),
			'overlay_icon' => array(
				'label'           => esc_html__( 'Overlay Icon', 'divi-plus' ),
				'type'            => 'select_icon',
				'option_category' => 'configuration',
				'class'           => array( 'et-pb-font-icon' ),
				'show_if'         => array(
                    'enable_overlay' => 'on',
                ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements',
				'description'     => esc_html__( 'Here you can define a custom icon for the overlay', 'divi-plus' ),
			),
			'lightbox_background_color' => array(
				'label'           	=> esc_html__( 'Lightbox Background Color', 'divi-plus' ),
				'type'            	=> 'color-alpha',
				'custom_color'    	=> true,
				'default'		  	=> 'rgba(0,0,0,0.8)',
				'default_on_front'	=> 'rgba(0,0,0,0.8)',
				'show_if'         	=> array(
                    'enable_lightbox' => 'on',
                ),
				'tab_slug'        	=> 'advanced',
				'toggle_slug'     	=> 'lightbox',
				'description'     	=> esc_html__( 'Here you can define a custom background color for the lightbox.', 'divi-plus' ),
			),
			'lightbox_close_icon_color' => array(
				'label'           	=> esc_html__( 'Close Icon Color', 'divi-plus' ),
				'type'            	=> 'color-alpha',
				'custom_color'    	=> true,
				'default'		  	=> '#fff',
				'default_on_front'	=> '#fff',
				'show_if'         	=> array(
                    'enable_lightbox' => 'on',
                ),
				'tab_slug'        	=> 'advanced',
				'toggle_slug'     	=> 'lightbox',
				'description'     	=> esc_html__( 'Here you can define a custom color for the close icon.', 'divi-plus' ),
			),
			'lightbox_arrows_color' => array(
				'label'           	=> esc_html__( 'Arrows Color', 'divi-plus' ),
				'type'            	=> 'color-alpha',
				'custom_color'    	=> true,
				'default'		  	=> '#fff',
				'default_on_front'	=> '#fff',
				'show_if'         	=> array(
                    'enable_lightbox' => 'on',
                ),
				'tab_slug'        	=> 'advanced',
				'toggle_slug'     	=> 'lightbox',
				'description'     	=> esc_html__( 'Here you can define a custom color for the arrows.', 'divi-plus' ),
			),
			'meta_background_color' => array(
				'label'           	=> esc_html__( 'Title & Caption Background Color', 'divi-plus' ),
				'type'            	=> 'color-alpha',
				'custom_color'    	=> true,
				'default'		  	=> 'rgba(0,0,0,0.6)',
				'default_on_front'	=> 'rgba(0,0,0,0.6)',
				'show_if'         	=> array(
                    'enable_lightbox' => 'on',
                ),
				'tab_slug'        	=> 'advanced',
				'toggle_slug'     	=> 'lightbox',
				'description'     	=> esc_html__( 'Here you can define a custom overlay color for the title and caption.', 'divi-plus' ),
			),
			'overlay_icon_size' => array(
                'label'             => esc_html__( 'Icon Size', 'divi-plus' ),
				'type'              => 'range',
				'option_category'  	=> 'layout',
				'range_settings'    => array(
					'min'   => '0',
					'max'   => '100',
					'step'  => '1',
				),
				'fixed_unit'		=> 'px',
				'fixed_range'       => true,
				'validate_unit'		=> true,
				'mobile_options'    => true,
				'default'           => '32px',
				'default_on_front'  => '32px',
				'show_if'         	=> array(
                    'enable_overlay' => 'on',
                ),
				'tab_slug'        	=> 'advanced',
				'toggle_slug'     	=> 'overlay',
				'description'       => esc_html__( 'Increase or decrease icon font size.', 'divi-plus' ),
            ),
			'overlay_icon_color' => array(
				'label'           => esc_html__( 'Overlay Icon Color', 'divi-plus' ),
				'type'            => 'color-alpha',
				'custom_color'    => true,
				'show_if'         => array(
                    'enable_overlay' => 'on',
                ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'overlay',
				'description'     => esc_html__( 'Here you can define a custom color for the icon.', 'divi-plus' ),
			),
			'overlay_color' => array(
				'label'           => esc_html__( 'Overlay Background Color', 'divi-plus' ),
				'type'            => 'color-alpha',
				'custom_color'    => true,
				'show_if'         => array(
                    'enable_overlay' => 'on',
                ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'overlay',
				'description'     => esc_html__( 'Here you can define a custom color for the overlay', 'divi-plus' ),
			),
			'__gallery_data' => array(
				'type'                => 'computed',
				'computed_callback'   => array( 'DIPL_MasonryGallery', 'get_gallery' ),
				'computed_depends_on' => array(
					'image_ids',
					'image_size',
				),
			),
			'__gallery_metadata' => array(
				'type'                => 'computed',
				'computed_callback'   => array( 'DIPL_MasonryGallery', 'get_gallery_metadata' ),
				'computed_depends_on' => array(
					'image_ids',
					'title_level',
				),
			),
		);

	}

	public static function get_gallery( $args = array(), $conditional_tags = array(), $current_page = array() ) {
		$defaults = array(
			'image_ids'      	=> '',
			'image_size'  		=> 'medium',
		);

		$args = wp_parse_args( $args, $defaults );

		foreach ( $defaults as $key => $default ) {
			${$key} = esc_html( et_()->array_get( $args, $key, $default ) );
		}

		$attachments = array();

		if ( ! empty( $image_ids ) ) {
			if ( ! is_array( $image_ids ) ) {
				$image_ids = explode( ',', $image_ids );
			}
			foreach( $image_ids as $image_id ) {
				array_push( $attachments, wp_get_attachment_image( intval( $image_id ), sanitize_text_field( $image_size ) ) );
			}
		}

		return $attachments;
	}

	public static function get_gallery_metadata( $args = array(), $conditional_tags = array(), $current_page = array() ) {
		$defaults = array(
			'image_ids'		=> '',
			'title_level'	=> 'h4',
		);

		$args = wp_parse_args( $args, $defaults );

		foreach ( $defaults as $key => $default ) {
			${$key} = esc_html( et_()->array_get( $args, $key, $default ) );
		}

		$processed_title_level  = et_pb_process_header_level( $title_level, 'h4' );
		$processed_title_level  = esc_html( $processed_title_level );

		$metadata = array();

		if ( ! empty( $image_ids ) ) {
			if ( ! is_array( $image_ids ) ) {
				$image_ids = explode( ',', $image_ids );
			}
			foreach( $image_ids as $image_id ) {
				$title 		= sprintf(
					'<%1$s class="dipl_masonry_gallery_item_title">%2$s</%1$s>',
					$processed_title_level,
					trim( wptexturize( get_the_title( $image_id ) ) )
				);
				$caption 	= sprintf(
					'<p class="dipl_masonry_gallery_item_caption">%1$s</p>',
					esc_html( trim( wp_get_attachment_caption( $image_id ) ) )
				);
				$wrapper    = sprintf(
					'<div class="dipl_masonry_gallery_title_caption_wrapper">%1$s %2$s</div>',
					$title,
					$caption
				);
				array_push( $metadata, $wrapper );
			}
		}

		return $metadata;
	}

	public function dipl_load_opacity_assets( $modules ) {
		array_push( $modules, 'et_pb_image' );
		return $modules;
	}

	public function render( $attrs, $content, $render_slug ) {
		$multi_view   						= et_pb_multi_view_options( $this );
		$image_ids  						= $this->props['image_ids'];
		$image_size   						= $this->props['image_size'];
		$enable_lightbox 					= $this->props['enable_lightbox'];
		$enable_overlay						= $this->props['enable_overlay'];
		$show_title 						= $this->props['show_title'];
		$title_area							= $this->props['title_area'];
		$show_caption 						= $this->props['show_caption'];
		$caption_area						= $this->props['caption_area'];
		$lightbox_title_and_caption_style 	= $this->props['lightbox_title_and_caption_style'];
		$number_of_columns					= $this->props['number_of_columns'];
		$column_spacing 					= $this->props['column_spacing'];
		$overlay_icon       				= $this->props['overlay_icon'];
		$overlay_icon_color					= $this->props['overlay_icon_color'];
		$overlay_color						= $this->props['overlay_color'];
		$meta_background_color				= $this->props['meta_background_color'];
		$lightbox_background_color 			= $this->props['lightbox_background_color'];
		$lightbox_close_icon_color			= $this->props['lightbox_close_icon_color'];
		$lightbox_arrows_color 				= $this->props['lightbox_arrows_color'];
		$title_level           				= $this->props['title_level'];
		$processed_title_level  			= et_pb_process_header_level( $title_level, 'h4' );
		$processed_title_level  			= esc_html( $processed_title_level );

		if ( empty( $image_ids ) ) {
			return '';
		}

		wp_enqueue_script( 'elicus-isotope-script' );
		wp_enqueue_script( 'elicus-images-loaded-script' );
		wp_enqueue_script( 'dipl-masonry-gallery-custom', PLUGIN_PATH."includes/modules/MasonryGallery/dipl-masonry-gallery-custom.min.js", array('jquery'), '1.0.1', true );

		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-masonry-gallery-style', PLUGIN_PATH . 'includes/modules/MasonryGallery/' . $file . '.min.css', array(), '1.0.0' );

		if ( 'on' === $enable_lightbox ) {
			wp_enqueue_script( 'magnific-popup' );
			wp_enqueue_style( 'magnific-popup' );
		}

		if ( 'on' === $enable_overlay ) {
			add_filter( 'et_required_module_assets', array( $this, 'dipl_load_opacity_assets' ), 20 );
			$overlay_output = ET_Builder_Module_Helper_Overlay::render(
				array(
					'icon' => $overlay_icon,
				)
			);
		}

		if ( ! is_array( $image_ids ) ) {
			$image_ids = explode( ',', $image_ids );
		}

		$gallery_items = '';

		foreach( $image_ids as $image_id ) {
			if ( 'on' === $show_title && '' !== trim( wptexturize( get_the_title( $image_id ) ) ) ) {
				$title = $multi_view->render_element(
					array(
						'tag'        => $processed_title_level,
						'content'    => esc_html( wptexturize( get_the_title( $image_id ) ) ),
						'attrs'      => array(
							'class' => 'dipl_masonry_gallery_item_title',
						),
					)
				);
			} else {
				$title = '';
			}

			if ( 'on' === $show_caption && '' !== trim( wp_get_attachment_caption( $image_id ) ) ) {
				$caption = $multi_view->render_element(
							array(
						'tag'        => 'p',
						'content'    => esc_html( wp_get_attachment_caption( $image_id ) ),
						'attrs'      => array(
							'class' => 'dipl_masonry_gallery_item_caption',
						),
					)
				);
			} else {
				$caption = '';
			}

			if ( '' !== $title || '' !== $caption ) {
				$title_and_caption = sprintf(
					'<div class="dipl_masonry_gallery_title_caption_wrapper">%1$s %2$s</div>',
					et_core_intentionally_unescaped( $title, 'html' ),
					et_core_intentionally_unescaped( $caption, 'html' )
				);
			} else {
				$title_and_caption = '';
			}

			$image_classes	= array( 
				"attachment-$image_size",
				"size-$image_size",
				"no-lazyload",
				"skip-lazy",
			);

			$image_atts = array(
				'class' => implode( ' ', $image_classes ),
			);

			if ( 'on' === $enable_lightbox ) {
				$gallery_items .= sprintf(
					'<a href="%4$s" class="dipl_masonry_gallery_item">
						<div class="dipl_masonry_gallery_image_wrapper">%1$s %2$s</div>
						%3$s
					</a>',
					et_core_intentionally_unescaped( wp_get_attachment_image( intval( $image_id ), sanitize_text_field( $image_size ), false, $image_atts ), 'html' ),
					'on' === $enable_overlay ? $overlay_output : '',
					et_core_intentionally_unescaped( $title_and_caption, 'html' ),
					esc_url( wp_get_attachment_url( intval( $image_id ) ) )
				);
			} else {
				$gallery_items .= sprintf(
					'<div class="dipl_masonry_gallery_item">
						<div class="dipl_masonry_gallery_image_wrapper">%1$s %2$s</div>
						%3$s
					</div>',
					et_core_intentionally_unescaped( wp_get_attachment_image( intval( $image_id ), sanitize_text_field( $image_size ), false, $image_atts ), 'html' ),
					'on' === $enable_overlay ? $overlay_output : '',
					et_core_intentionally_unescaped( $title_and_caption, 'html' )
				);
			} 
		}

		$output = sprintf(
			'<div class="dipl_masonry_gallery_wrapper">
				<div class="dipl_masonry_gallery_item_gutter"></div>
				%1$s
			</div>',
			$gallery_items
		);

		$number_of_columns 	= et_pb_responsive_options()->get_property_values( $this->props, 'number_of_columns' );
		$column_spacing 	= et_pb_responsive_options()->get_property_values( $this->props, 'column_spacing' );
		
		$number_of_columns['tablet'] = '' !== $number_of_columns['tablet'] ? $number_of_columns['tablet'] : $number_of_columns['desktop'];
		$number_of_columns['phone']  = '' !== $number_of_columns['phone'] ? $number_of_columns['phone'] : $number_of_columns['tablet'];

		$column_spacing['tablet'] = '' !== $column_spacing['tablet'] ? $column_spacing['tablet'] : $column_spacing['desktop'];
		$column_spacing['phone']  = '' !== $column_spacing['phone'] ? $column_spacing['phone'] : $column_spacing['tablet'];
		
		$breakpoints 	= array( 'desktop', 'tablet', 'phone' );
		$width 			= array();

		foreach ( $breakpoints as $breakpoint ) {
			if ( 1 === absint( $number_of_columns[$breakpoint] ) ) {
				$width[$breakpoint] = '100%';
			} else {
				$divided_width 	= 100 / absint( $number_of_columns[$breakpoint] );
				if ( 0.0 !== floatval( $column_spacing[$breakpoint] ) ) {
					$gutter = floatval( ( floatval( $column_spacing[$breakpoint] ) * ( absint( $number_of_columns[$breakpoint] ) - 1 ) ) / absint( $number_of_columns[$breakpoint] ) );
					$width[$breakpoint] = 'calc(' . $divided_width . '% - ' . $gutter . 'px)';
				} else {
					$width[$breakpoint] = $divided_width . '%';
				}
			}
		}

		et_pb_responsive_options()->generate_responsive_css( $width, '%%order_class%% .dipl_masonry_gallery_item', 'width', $render_slug, '', 'range' );
		et_pb_responsive_options()->generate_responsive_css( $column_spacing, '%%order_class%% .dipl_masonry_gallery_item', array( 'margin-bottom' ), $render_slug, '', 'range' );
		et_pb_responsive_options()->generate_responsive_css( $column_spacing, '%%order_class%% .dipl_masonry_gallery_item_gutter', 'width', $render_slug, '', 'range' );

		$overlay_icon_size 	= et_pb_responsive_options()->get_property_values( $this->props, 'overlay_icon_size' );
		et_pb_responsive_options()->generate_responsive_css( $overlay_icon_size, '%%order_class%% .dipl_masonry_gallery_item .et_overlay:before', 'font-size', $render_slug, '', 'range' );

		if ( ! in_array( $title_area, array( 'gallery', 'both' ), true ) && ! in_array( $caption_area, array( 'gallery', 'both' ), true ) ) {
			self::set_style( $render_slug, array(
                'selector'    => '%%order_class%% .dipl_masonry_gallery_title_caption_wrapper',
                'declaration' => 'display: none;',
            ) );
		} else {
			if ( ! in_array( $title_area, array( 'gallery', 'both' ), true ) ) {
				self::set_style( $render_slug, array(
	                'selector'    => '%%order_class%% .dipl_masonry_gallery_item_title',
	                'declaration' => 'display: none;',
	            ) );
			}
			if ( ! in_array( $caption_area, array( 'gallery', 'both' ), true ) ) {
				self::set_style( $render_slug, array(
	                'selector'    => '%%order_class%% .dipl_masonry_gallery_item_caption',
	                'declaration' => 'display: none;',
	            ) );
			}
		}

		if ( ! in_array( $title_area, array( 'lightbox', 'both' ), true ) && ! in_array( $caption_area, array( 'lightbox', 'both' ), true ) ) {
			self::set_style( $render_slug, array(
                'selector'    => '%%order_class%%_lightbox .mfp-bottom-bar',
                'declaration' => 'display: none;',
            ) );
		} else {
			if ( ! in_array( $title_area, array( 'lightbox', 'both' ), true ) ) {
				self::set_style( $render_slug, array(
	                'selector'    => '%%order_class%%_lightbox .dipl_masonry_gallery_item_title',
	                'declaration' => 'display: none;',
	            ) );
	            self::set_style( $render_slug, array(
	                'selector'    => '%%order_class%%_lightbox .dipl_masonry_gallery_item_title + .dipl_masonry_gallery_item_caption',
	                'declaration' => 'padding: 10px;',
	            ) );
			}
			if ( ! in_array( $caption_area, array( 'lightbox', 'both' ), true ) ) {
				self::set_style( $render_slug, array(
	                'selector'    => '%%order_class%%_lightbox .dipl_masonry_gallery_item_caption',
	                'declaration' => 'display: none;',
	            ) );
			}
		}

		if ( 'below_image' === $lightbox_title_and_caption_style ) {
			self::set_style( $render_slug, array(
                'selector'    => '%%order_class%%_lightbox .mfp-bottom-bar, %%order_class%%_lightbox.mfp-img-mobile .mfp-bottom-bar',
                'declaration' => 'bottom: auto; top: 100%;',
            ) );
		}

		if ( '' !== $overlay_icon_color ) {
			self::set_style( $render_slug, array(
                'selector'    => '%%order_class%% .dipl_masonry_gallery_item .et_overlay:before',
                'declaration' => sprintf(
                    'color: %1$s;',
                    esc_attr( $overlay_icon_color )
                )
            ) );
		}

		if ( '' !== $overlay_color ) {
			self::set_style( $render_slug, array(
                'selector'    => '%%order_class%% .dipl_masonry_gallery_item .et_overlay',
                'declaration' => sprintf(
                    'background-color: %1$s;',
                    esc_attr( $overlay_color )
                )
            ) );
		}

		if ( '' !== $meta_background_color ) {
			self::set_style( $render_slug, array(
                'selector'    => '%%order_class%%_lightbox .dipl_masonry_gallery_item_title, %%order_class%%_lightbox .dipl_masonry_gallery_item_caption',
                'declaration' => sprintf(
                    'background-color: %1$s;',
                    esc_attr( $meta_background_color )
                )
            ) );
		}

		if ( '' !== $lightbox_background_color ) {
			self::set_style( $render_slug, array(
                'selector'    => '%%order_class%%_lightbox.mfp-bg',
                'declaration' => sprintf(
                    'background-color: %1$s;',
                    esc_attr( $lightbox_background_color )
                )
            ) );
		}

		if ( '' !== $lightbox_close_icon_color ) {
			self::set_style( $render_slug, array(
                'selector'    => '%%order_class%%_lightbox .mfp-close',
                'declaration' => sprintf(
                    'color: %1$s;',
                    esc_attr( $lightbox_close_icon_color )
                )
            ) );
		}

		if ( '' !== $lightbox_arrows_color ) {
			self::set_style( $render_slug, array(
                'selector'    => '%%order_class%%_lightbox .mfp-arrow:after',
                'declaration' => sprintf(
                    'color: %1$s;',
                    esc_attr( $lightbox_arrows_color )
                )
            ) );
		}

		if ( '' !== $overlay_icon ) {
			if ( class_exists( 'ET_Builder_Module_Helper_Style_Processor' ) && method_exists( 'ET_Builder_Module_Helper_Style_Processor', 'process_extended_icon' ) ) {
                $this->generate_styles(
                    array(
                        'utility_arg'    => 'icon_font_family',
                        'render_slug'    => $render_slug,
                        'base_attr_name' => 'overlay_icon',
                        'important'      => true,
                        'selector'       => '%%order_class%% .dipl_masonry_gallery_item .et_overlay:before',
                        'processor'      => array(
                            'ET_Builder_Module_Helper_Style_Processor',
                            'process_extended_icon',
                        ),
                    )
                );
            }
		}

		return et_core_intentionally_unescaped( $output, 'html' );

	}

	public function dipl_builder_processed_range_value( $result, $range, $range_string ) {
		if ( false !== strpos( $result, '0calc' ) ) {
			return $range;
		}
		return $result;
	}

}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
    $modules = explode( ',', $plugin_options['dipl-modules'] );
    if ( in_array( 'dipl_masonry_gallery', $modules ) ) {
        new DIPL_MasonryGallery();
    }
} else {
    new DIPL_MasonryGallery();
}