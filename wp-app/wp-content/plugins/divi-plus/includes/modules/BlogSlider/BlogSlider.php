<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2022 Elicus Technologies Private Limited
 * @version     1.9.5
 */
class DIPL_BlogSlider extends ET_Builder_Module {

	public $slug       = 'dipl_blog_slider';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	/**
	 * Track if the module is currently rendering to prevent unnecessary rendering and recursion.
	 *
	 * @var bool
	 */
	protected static $rendering = false;

	public function init() {
		$this->name             = esc_html__( 'DP Blog Slider', 'divi-plus' );
		$this->main_css_element = '%%order_class%%';
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'main_content'    => array(
						'title' => esc_html__( 'Content', 'divi-plus' ),
					),
					'elements'        => array(
						'title' => esc_html__( 'Elements', 'divi-plus' ),
					),
					'slider_settings' => array(
						'title' => esc_html__( 'Slider', 'divi-plus' ),
					),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'text'                   => array(
						'title' => esc_html__( 'Text', 'divi-plus' ),
					),
					'slider_styles'          => array(
						'title' => esc_html__( 'Slider', 'divi-plus' ),
					),
					'meta_icon_styles'       => array(
						'title' => esc_html__( 'Meta Icon', 'divi-plus' ),
					),
					'content_wrapper_toggle' => array(
						'title' => esc_html__( 'Post Content', 'divi-plus' ),
					),
					'category_toggle'        => array(
						'title' => esc_html__( 'Category', 'divi-plus' ),
					),
					'read_more_settings'     => array(
						'title' => esc_html__( 'Read More Settings', 'divi-plus' ),
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
					'css'            => array(
						'main'      => "{$this->main_css_element} .dipl_blog_slider_post_title, {$this->main_css_element} .dipl_blog_slider_post_title a",
						'important' => 'all',
					),
					'header_level'   => array(
						'default' => 'h2',
					),
				),
				'body' => array(
					'label'          => esc_html__( 'Body', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '16px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'    => array(
						'default'        => '1.3em',
						'range_settings' => array(
							'min'  => '0',
							'max'  => '5',
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
					'css'            => array(
						'main'      => "{$this->main_css_element} .dipl_blog_slider_content, {$this->main_css_element} .dipl_blog_slider_content p",
						'important' => 'all',
					),
				),
				'meta' => array(
					'label'          => esc_html__( 'Meta', 'divi-plus' ),
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
						'default'        => '1.3em',
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
					'css'            => array(
						'main' => "{$this->main_css_element} .dipl_blog_slider_meta, {$this->main_css_element} .dipl_blog_slider_meta span, {$this->main_css_element} .dipl_blog_slider_meta a",
					),
				),
				'category' => array(
					'label'          => esc_html__( 'Category', 'divi-plus' ),
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
						'default'        => '1.3em',
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
					'css'            => array(
						'main'      => "{$this->main_css_element} .dipl_blog_slider_post .dipl_blog_slider_post_categories, {$this->main_css_element} .dipl_blog_slider_post .dipl_blog_slider_post_categories a",
						'important' => 'all',
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'category_toggle',
				),
			),
			'button' => array(
				'read_more' => array(
					'label'           => esc_html__( 'Read More Button', 'divi-plus' ),
					'css'             => array(
						'main'      => "{$this->main_css_element} .dipl_blog_slider_read_more_link .et_pb_button",
						'alignment' => "{$this->main_css_element} .dipl_blog_slider_read_more_link",
					),
					'margin_padding'  => array(
						'css' => array(
							'margin'    => "{$this->main_css_element} .dipl_blog_slider_read_more_link",
							'padding'   => "{$this->main_css_element} .dipl_blog_slider_read_more_link .et_pb_button",
							'important' => 'all',
						),
					),
					'no_rel_attr'     => true,
					'use_alignment'   => true,
					'box_shadow'      => false,
					'depends_on'      => array( 'show_read_more' ),
					'depends_show_if' => 'on',
				),
			),
			'borders' => array(
				'single_post' => array(
					'label_prefix' => esc_html__( 'Single Post', 'divi-plus' ),
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dipl_blog_slider_post',
							'border_styles' => '%%order_class%% .dipl_blog_slider_post',
							'important'     => 'all',
						),
					),
				),
				'default'     => array(
					'css' => array(
						'main'      => array(
							'border_radii'  => $this->main_css_element,
							'border_styles' => $this->main_css_element,
						),
						'important' => 'all',
					),
				),
			),
			'box_shadow' => array(
				'single_post' => array(
					'label'       => esc_html__( 'Single Post', 'divi-plus' ),
					'css'         => array(
						'main' => "{$this->main_css_element} .dipl_blog_slider_post",
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'box_shadow',
				),
				'default' => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),
			),
			'slider_margin_padding' => array(
				'slider_container' => array(
					'margin_padding' => array(
						'css' => array(
							'use_margin' => false,
							'padding'   => "{$this->main_css_element} .swiper-container",
							'important' => 'all',
						),
					),
				),
				'post_content_wrapper' => array(
					'margin_padding' => array(
						'css' => array(
							'margin'    => "{$this->main_css_element} .dipl_blog_slider_content_wrapper",
							'padding'   => "{$this->main_css_element} .dipl_blog_slider_content_wrapper",
							'important' => 'all',
						),
					),
				),
				'arrows' => array(
					'margin_padding' => array(
						'css' => array(
							'use_margin' => false,
							'padding'    => "{$this->main_css_element} .swiper-button-next::after, {$this->main_css_element} .swiper-button-prev::after",
							'important'  => 'all',
						),
					),
				),
			),
			'margin_padding' => array(
				'css' => array(
					'margin'    => $this->main_css_element,
					'padding'   => $this->main_css_element,
					'important' => 'all',
				),
			),
			'height' => array(
				'css' => array(
					'main' => "{$this->main_css_element}, {$this->main_css_element} .dipl_blog_slider_container .swiper-container",
				),
			),
			'text'                  => false,
			'text_shadow'           => false,
		);
	}

	public function get_fields() {

		return array_merge(
			array(
				'slider_layout'                         => array(
					'label'            => esc_html__( 'Layout', 'divi-plus' ),
					'type'             => 'select',
					'option_category'  => 'layout',
					'options'          => array(
						'layout1' => esc_html__( 'Layout 1', 'divi-plus' ),
						'layout2' => esc_html__( 'Layout 2', 'divi-plus' ),
						'layout3' => esc_html__( 'Layout 3', 'divi-plus' ),
						'layout4' => esc_html__( 'Layout 4', 'divi-plus' ),
					),
					'default'          => 'layout1',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'      => esc_html__( 'Here you can select the slider layout.', 'divi-plus' ),
					'computed_affects' => array(
						'__blog_slider_data',
					),
				),
				'posts_number'                          => array(
					'label'            => esc_html__( 'Number of Posts', 'divi-plus' ),
					'type'             => 'text',
					'option_category'  => 'configuration',
					'default'          => '10',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'      => esc_html__( 'Here you can define the value of number of posts you would like to display.', 'divi-plus' ),
					'computed_affects' => array(
						'__blog_slider_data',
					),
				),
				'offset_number'                         => array(
					'label'            => esc_html__( 'Post Offset Number', 'divi-plus' ),
					'type'             => 'text',
					'option_category'  => 'configuration',
					'default'          => 0,
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'      => esc_html__( 'Choose how many posts you would like to skip. These posts will not be shown in the feed.', 'divi-plus' ),
					'computed_affects' => array(
						'__blog_slider_data',
					),
				),
				'post_order'                            => array(
					'label'            => esc_html__( 'Order', 'divi-plus' ),
					'type'             => 'select',
					'option_category'  => 'configuration',
					'options'          => array(
						'DESC' => esc_html__( 'DESC', 'divi-plus' ),
						'ASC'  => esc_html__( 'ASC', 'divi-plus' ),
					),
					'default'          => 'DESC',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'      => esc_html__( 'Here you can choose the order of your posts.', 'divi-plus' ),
					'computed_affects' => array(
						'__blog_slider_data',
					),
				),
				'post_order_by'                         => array(
					'label'            => esc_html__( 'Order by', 'divi-plus' ),
					'type'             => 'select',
					'option_category'  => 'configuration',
					'options'          => array(
						'date'      => esc_html__( 'Date', 'divi-plus' ),
						'modified'  => esc_html__( 'Modified Date', 'divi-plus' ),
						'title'     => esc_html__( 'Title', 'divi-plus' ),
						'name'      => esc_html__( 'Slug', 'divi-plus' ),
						'ID'        => esc_html__( 'ID', 'divi-plus' ),
						'rand'      => esc_html__( 'Random', 'divi-plus' ),
						'relevance' => esc_html__( 'Relevance', 'divi-plus' ),
						'none'      => esc_html__( 'None', 'divi-plus' ),
					),
					'default'          => 'date',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'      => esc_html__( 'Here you can choose the order type of your posts.', 'divi-plus' ),
					'computed_affects' => array(
						'__blog_slider_data',
					),
				),
				'include_categories'                    => array(
					'label'            => esc_html__( 'Select Categories', 'divi-plus' ),
					'type'             => 'categories',
					'option_category'  => 'basic_option',
					'renderer_options' => array(
						'use_terms' => false,
					),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'      => esc_html__( 'Choose which categories you would like to include in the feed', 'divi-plus' ),
					'computed_affects' => array(
						'__blog_slider_data',
					),
				),
				'post_date'                             => array(
					'label'            => esc_html__( 'Post Date Format', 'divi-plus' ),
					'type'             => 'text',
					'option_category'  => 'configuration',
					'default'          => 'M j, Y',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'      => esc_html__( 'If you would like to adjust the date format, input the appropriate PHP date format here.', 'divi-plus' ),
					'computed_affects' => array(
						'__blog_slider_data',
					),
				),
				'ignore_sticky_posts'                   => array(
					'label'            => esc_html__( 'Ignore Sticky Posts', 'divi-plus' ),
					'type'             => 'yes_no_button',
					'option_category'  => 'configuration',
					'options'          => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'          => 'off',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'elements',
					'description'      => esc_html__( 'This will decide whether to ingnore sticky posts or not.', 'divi-plus' ),
					'computed_affects' => array(
						'__blog_slider_data',
					),
				),
				'show_thumbnail'                        => array(
					'label'            => esc_html__( 'Show Featured Image', 'divi-plus' ),
					'type'             => 'yes_no_button',
					'option_category'  => 'configuration',
					'options'          => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'          => 'on',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'elements',
					'description'      => esc_html__( 'This will turn thumbnails on and off.', 'divi-plus' ),
					'computed_affects' => array(
						'__blog_slider_data',
					),
				),
				'featured_image_size'                   => array(
					'label'            => esc_html__( 'Featured Image Size', 'divi-plus' ),
					'type'             => 'select',
					'option_category'  => 'configuration',
					'options'          => array(
						'medium' => esc_html__( 'Medium', 'divi-plus' ),
						'large'  => esc_html__( 'Large', 'divi-plus' ),
						'full'   => esc_html__( 'Full', 'divi-plus' ),
					),
					'show_if'          => array(
						'show_thumbnail' => 'on',
					),
					'default'          => 'large',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'elements',
					'description'      => esc_html__( 'Here you can select the size of the featured image.', 'divi-plus' ),
					'computed_affects' => array(
						'__blog_slider_data',
					),
				),
				'show_content'                          => array(
					'label'            => esc_html__( 'Content', 'divi-plus' ),
					'type'             => 'select',
					'option_category'  => 'configuration',
					'options'          => array(
						'off' => esc_html__( 'Show Excerpt', 'divi-plus' ),
						'on'  => esc_html__( 'Show Content', 'divi-plus' ),
					),
					'default'          => 'off',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'      => esc_html__( 'Showing the full content will not truncate your posts on the index page. Showing the excerpt will only display your excerpt text.', 'divi-plus' ),
					'computed_affects' => array(
						'__blog_slider_data',
					),
				),
				'excerpt_length'                        => array(
					'label'            => esc_html__( 'Excerpt Length', 'divi-plus' ),
					'type'             => 'text',
					'option_category'  => 'configuration',
					'show_if'          => array(
						'show_content' => 'off',
					),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'      => esc_html__( 'Here you can define excerpt length in characters, if 0 no excerpt will be shown. However this won\'t work with the manual excerpt defined in the post.', 'divi-plus' ),
					'computed_affects' => array(
						'__blog_slider_data',
					),
				),
				'no_result_text' => array(
					'label'            => esc_html__( 'No Result Text', 'divi-plus' ),
					'type'             => 'text',
					'option_category'  => 'configuration',
					'default'		   => esc_html__( 'The posts you requested could not be found. Try changing your module settings or create some new posts.', 'divi-plus' ),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'      => esc_html__( 'Here you can define custom no result text.', 'divi-plus' ),
				),
				'show_author'                           => array(
					'label'            => esc_html__( 'Show Author', 'divi-plus' ),
					'type'             => 'yes_no_button',
					'option_category'  => 'configuration',
					'options'          => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'          => 'on',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'elements',
					'description'      => esc_html__( 'Turn on or off the Author link.', 'divi-plus' ),
					'computed_affects' => array(
						'__blog_slider_data',
					),
				),
				'show_date'                             => array(
					'label'            => esc_html__( 'Show Date', 'divi-plus' ),
					'type'             => 'yes_no_button',
					'option_category'  => 'configuration',
					'options'          => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'          => 'on',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'elements',
					'description'      => esc_html__( 'Turn the Date on or off.', 'divi-plus' ),
					'computed_affects' => array(
						'__blog_slider_data',
					),
				),
				'show_categories'                       => array(
					'label'            => esc_html__( 'Show Categories/Terms', 'divi-plus' ),
					'type'             => 'yes_no_button',
					'option_category'  => 'configuration',
					'options'          => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'          => 'on',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'elements',
					'description'      => esc_html__( 'Turn the category/terms links on or off.', 'divi-plus' ),
					'computed_affects' => array(
						'__blog_slider_data',
					),
				),
				'show_comments'                         => array(
					'label'            => esc_html__( 'Show Comment Count', 'divi-plus' ),
					'type'             => 'yes_no_button',
					'option_category'  => 'configuration',
					'options'          => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'          => 'on',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'elements',
					'description'      => esc_html__( 'Turn Comment Count on and off.', 'divi-plus' ),
					'computed_affects' => array(
						'__blog_slider_data',
					),
				),
				'show_read_more'                        => array(
					'label'            => esc_html__( 'Show Read More', 'divi-plus' ),
					'type'             => 'yes_no_button',
					'option_category'  => 'configuration',
					'options'          => array(
						'off' => esc_html__( 'Off', 'divi-plus' ),
						'on'  => esc_html__( 'On', 'divi-plus' ),
					),
					'show_if'          => array(
						'show_content' => 'off',
					),
					'affects'          => array(
						'custom_read_more',
					),
					'default'          => 'on',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'elements',
					'description'      => esc_html__( 'Here you can define whether to show "read more" link after the excerpts or not.', 'divi-plus' ),
					'computed_affects' => array(
						'__blog_slider_data',
					),
				),
				'read_more_text'                        => array(
					'label'            => esc_html__( 'Read More Text', 'divi-plus' ),
					'type'             => 'text',
					'option_category'  => 'configuration',
					'show_if'          => array(
						'show_content'   => 'off',
						'show_read_more' => 'on',
					),
					'default'          => 'Read More',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'elements',
					'description'      => esc_html__( 'Here you can define "read more" button/link text.', 'divi-plus' ),
					'computed_affects' => array(
						'__blog_slider_data',
					),
				),
				'category_background_color'             => array(
					'label'        => esc_html__( 'Category Background Color', 'divi-plus' ),
					'type'         => 'color-alpha',
					'custom_color' => true,
					'show_if'      => array(
						'show_categories' => 'on',
					),
					'hover'        => 'tabs',
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'category_toggle',
					'description'  => esc_html__( 'Here you can define a custom color for the category background.', 'divi-plus' ),
				),
				'category_color'                        => array(
					'label'        => esc_html__( 'Category Color', 'divi-plus' ),
					'type'         => 'skip',
					'custom_color' => true,
					'show_if'      => array(
						'slider_layout'   => 'layout2',
						'show_categories' => 'on',
					),
					'hover'        => 'tabs',
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'category_toggle',
					'description'  => esc_html__( 'Here you can define a custom text color for the category.', 'divi-plus' ),
				),
				'post_content_wrapper_background_color' => array(
	                'label'                 => esc_html__( 'Post Content Background', 'divi-plus' ),
	                'type'                  => 'background-field',
	                'base_name'             => 'button_bg',
	                'context'               => 'button_bg_color',
	                'option_category'       => 'button',
	                'custom_color'          => true,
	                'background_fields'     => $this->generate_background_options( 'post_content_wrapper_background', 'button', 'advanced', 'content_wrapper_toggle', 'post_content_wrapper_background_color' ),
	                'hover'                 => 'tabs',
	                'mobile_options'        => true,
	                'default'      			=> 'rgba(244,244,244,0.7)',
	                'tab_slug'              => 'advanced',
	                'toggle_slug'           => 'content_wrapper_toggle',
	                'description'           => esc_html__( 'Customize the background style of the post content by adjusting the background color, gradient, and image.', 'divi-plus' ),
	            ),
				'meta_separator_color'                  => array(
					'label'        => esc_html__( 'Meta Separator Color', 'divi-plus' ),
					'type'         => 'color-alpha',
					'custom_color' => true,
					'show_if'      => array(
						'slider_layout' => 'layout3',
					),
					'default'      => '#ddd',
					'hover'        => 'tabs',
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'content_wrapper_toggle',
					'description'  => esc_html__( 'Here you can define a custom color for the post content meta separator.', 'divi-plus' ),
				),
				'post_content_wrapper_custom_margin'    => array(
					'label'            => esc_html__( 'Content Margin', 'divi-plus' ),
					'type'             => 'custom_padding',
					'option_category'  => 'layout',
					'mobile_options'   => false,
					'hover'            => false,
					'default'          => '',
					'default_on_front' => '',
					'tab_slug'         => 'advanced',
					'toggle_slug'      => 'content_wrapper_toggle',
					'description'      => esc_html__( 'Margin adds extra space to the outside of the element, increasing the distance between the element and other items on the page.', 'divi-plus' ),
				),
				'post_content_wrapper_custom_padding' => array(
					'label'            => esc_html__( 'Content Padding', 'divi-plus' ),
					'type'             => 'custom_padding',
					'option_category'  => 'layout',
					'mobile_options'   => true,
					'hover'            => false,
					'default'          => '',
					'default_on_front' => '',
					'tab_slug'         => 'advanced',
					'toggle_slug'      => 'content_wrapper_toggle',
					'description'      => esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'divi-plus' ),
				),
				'slider_container_custom_padding' => array(
					'label'            => esc_html__( 'Slider Container Padding', 'divi-plus' ),
					'type'             => 'custom_padding',
					'option_category'  => 'layout',
					'mobile_options'   => true,
					'hover'            => false,
					'tab_slug'         => 'advanced',
					'toggle_slug'      => 'margin_padding',
					'description'      => esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'divi-plus' ),
				),
				'slide_effect'                          => array(
					'label'            => esc_html__( 'Slide Effect', 'divi-plus' ),
					'type'             => 'select',
					'option_category'  => 'layout',
					'options'          => array(
						'slide'     => esc_html__( 'Slide', 'divi-plus' ),
						'cube'      => esc_html__( 'Cube', 'divi-plus' ),
						'coverflow' => esc_html__( 'Coverflow', 'divi-plus' ),
						'flip'      => esc_html__( 'Flip', 'divi-plus' ),
					),
					'default'          => 'slide',
					'default_on_front' => 'slide',
					'tab_slug'         => 'general',
					'toggle_slug'      => 'slider_settings',
					'description'      => esc_html__( 'Here you can choose the slide animation effect.', 'divi-plus' ),
				),
				'post_per_slide'                        => array(
					'label'            => esc_html__( 'Number of Post Per View', 'divi-plus' ),
					'type'             => 'select',
					'option_category'  => 'layout',
					'options'          => array(
						'1'  => esc_html__( '1', 'divi-plus' ),
						'2'  => esc_html__( '2', 'divi-plus' ),
						'3'  => esc_html__( '3', 'divi-plus' ),
						'4'  => esc_html__( '4', 'divi-plus' ),
						'5'  => esc_html__( '5', 'divi-plus' ),
						'6'  => esc_html__( '6', 'divi-plus' ),
						'7'  => esc_html__( '7', 'divi-plus' ),
						'8'  => esc_html__( '8', 'divi-plus' ),
						'9'  => esc_html__( '9', 'divi-plus' ),
						'10' => esc_html__( '10', 'divi-plus' ),
					),
					'default'          => '3',
					'default_on_front' => '3',
					'mobile_options'   => true,
					'show_if'          => array(
						'slide_effect' => array( 'slide', 'coverflow' ),
					),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'slider_settings',
					'description'      => esc_html__( 'Here you can choose the number of posts you want to display per slide.', 'divi-plus' ),
				),
				'slides_per_group'                      => array(
					'label'           => esc_html__( 'Number of Slides Per Group', 'divi-plus' ),
					'type'            => 'select',
					'option_category' => 'layout',
					'options'         => array(
						'1'  => esc_html__( '1', 'divi-plus' ),
						'2'  => esc_html__( '2', 'divi-plus' ),
						'3'  => esc_html__( '3', 'divi-plus' ),
						'4'  => esc_html__( '4', 'divi-plus' ),
						'5'  => esc_html__( '5', 'divi-plus' ),
						'6'  => esc_html__( '6', 'divi-plus' ),
						'7'  => esc_html__( '7', 'divi-plus' ),
						'8'  => esc_html__( '8', 'divi-plus' ),
						'9'  => esc_html__( '9', 'divi-plus' ),
						'10' => esc_html__( '10', 'divi-plus' ),
					),
					'default'         => '1',
					'mobile_options'  => true,
					'show_if'         => array(
						'slide_effect' => array( 'slide', 'coverflow' ),
					),
					'tab_slug'        => 'general',
					'toggle_slug'     => 'slider_settings',
					'description'     => esc_html__( 'Here you can choose the number of slides per group to slide by.', 'divi-plus' ),
				),
				'space_between_slides'                  => array(
					'label'           => esc_html__( 'Space between Slides', 'divi-plus' ),
					'type'            => 'range',
					'option_category' => 'layout',
					'range_settings'  => array(
						'min'  => '10',
						'max'  => '100',
						'step' => '1',
					),
					'show_if'         => array(
						'slide_effect' => array( 'slide', 'coverflow' ),
					),
					'fixed_unit'      => 'px',
					'default'         => '15px',
					'mobile_options'  => true,
					'tab_slug'        => 'general',
					'toggle_slug'     => 'slider_settings',
					'description'     => esc_html__( 'Move the slider or input the value to increse or decrease the space between slides.', 'divi-plus' ),
				),
				'enable_coverflow_shadow'               => array(
					'label'           => esc_html__( 'Enable Slide Shadow', 'divi-plus' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'         => 'off',
					'show_if'         => array(
						'slide_effect' => 'coverflow',
					),
					'tab_slug'        => 'general',
					'toggle_slug'     => 'slider_settings',
					'description'     => esc_html__( 'Enable Slide Shadow For Coverflow Effect.', 'divi-plus' ),
				),
				'coverflow_shadow_color'                => array(
					'label'        => esc_html__( 'Shadow Color', 'divi-plus' ),
					'type'         => 'color-alpha',
					'custom_color' => true,
					'show_if'      => array(
						'slide_effect'            => 'coverflow',
						'enable_coverflow_shadow' => 'on',
					),
					'default'      => '#ccc',
					'tab_slug'     => 'general',
					'toggle_slug'  => 'slider_settings',
					'description'  => esc_html__( 'Here you can select color for the Shadow.', 'divi-plus' ),
				),
				'coverflow_rotate'                      => array(
					'label'           => esc_html__( 'Coverflow Rotate', 'divi-plus' ),
					'type'            => 'range',
					'option_category' => 'font_option',
					'range_settings'  => array(
						'min'  => '1',
						'max'  => '360',
						'step' => '1',
					),
					'unitless'        => true,
					'show_if'         => array(
						'slide_effect' => 'coverflow',
					),
					'default'         => '40',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'slider_settings',
					'description'     => esc_html__( 'Coverflow Rotate Slide.', 'divi-plus' ),
				),
				'coverflow_depth'                       => array(
					'label'           => esc_html__( 'Coverflow Depth', 'divi-plus' ),
					'type'            => 'range',
					'option_category' => 'font_option',
					'range_settings'  => array(
						'min'  => '1',
						'max'  => '1000',
						'step' => '1',
					),
					'unitless'        => true,
					'show_if'         => array(
						'slide_effect' => 'coverflow',
					),
					'default'         => '100',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'slider_settings',
					'description'     => esc_html__( 'Coverflow Depth Slide.', 'divi-plus' ),
				),
				'equalize_posts_height'                 => array(
					'label'           => esc_html__( 'Equalize Posts Height', 'divi-plus' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'off' => esc_html__( 'Off', 'divi-plus' ),
						'on'  => esc_html__( 'On', 'divi-plus' ),
					),
					'default'         => 'on',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'slider_settings',
					'description'     => esc_html__( 'Here you can choose whether or not equalize posts height.', 'divi-plus' ),
				),
				'slider_loop'                           => array(
					'label'           => esc_html__( 'Enable Loop', 'divi-plus' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'         => 'off',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'slider_settings',
					'description'     => esc_html__( 'Here you can choose whether or not to enable loop for the logo slider.', 'divi-plus' ),
				),
				'autoplay'                              => array(
					'label'           => esc_html__( 'Autoplay', 'divi-plus' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'         => 'on',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'slider_settings',
					'description'     => esc_html__( 'Here you can choose whether or not to autoplay logo slider.', 'divi-plus' ),
				),
				'autoplay_speed'                        => array(
					'label'           => esc_html__( 'Autoplay Delay', 'divi-plus' ),
					'type'            => 'text',
					'option_category' => 'configuration',
					'default'         => '3000',
					'show_if'         => array(
						'autoplay' => 'on',
					),
					'show_if_not'     => array(
						'autoplay' => 'off',
					),
					'tab_slug'        => 'general',
					'toggle_slug'     => 'slider_settings',
					'description'     => esc_html__( 'Here you can input the value to delay autoplay after a complete transition of the logo slider.', 'divi-plus' ),
				),
				'transition_duration'                   => array(
					'label'           => esc_html__( 'Transition Duration', 'divi-plus' ),
					'type'            => 'text',
					'option_category' => 'configuration',
					'default'         => '1000',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'slider_settings',
					'description'     => esc_html__( 'Here you can input the value to delay each slide in a transition.', 'divi-plus' ),
				),
				'pause_on_hover'                        => array(
					'label'           => esc_html__( 'Pause On Hover', 'divi-plus' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'         => 'on',
					'show_if'         => array(
						'autoplay' => 'on',
					),
					'show_if_not'     => array(
						'autoplay' => 'off',
					),
					'tab_slug'        => 'general',
					'toggle_slug'     => 'slider_settings',
					'description'     => esc_html__( 'Here you can choose whether or not to pause slides on mouse hover.', 'divi-plus' ),
				),
				'show_arrow'                            => array(
					'label'           => esc_html__( 'Show Arrows', 'divi-plus' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'         => 'on',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'slider_settings',
					'description'     => esc_html__( 'Here you can choose whether or not to display previous & next arrow on the slider.', 'divi-plus' ),
				),
				'previous_slide_arrow'                  => array(
					'label'           => esc_html__( 'Previous Arrow', 'divi-plus' ),
					'type'            => 'select_icon',
					'option_category' => 'basic_option',
					'class'           => array(
						'et-pb-font-icon',
					),
					'show_if'         => array(
						'show_arrow' => 'on',
					),
					'default'         => ET_BUILDER_PRODUCT_VERSION < '4.13.0' ? '%%19%%' : '&#x34;||divi||400',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'slider_settings',
					'description'     => esc_html__( 'Here you can select the icon to be used for the previous slide navigation.', 'divi-plus' ),
				),
				'next_slide_arrow'                      => array(
					'label'           => esc_html__( 'Next Arrow', 'divi-plus' ),
					'type'            => 'select_icon',
					'option_category' => 'basic_option',
					'class'           => array(
						'et-pb-font-icon',
					),
					'show_if'         => array(
						'show_arrow' => 'on',
					),
					'default'         => ET_BUILDER_PRODUCT_VERSION < '4.13.0' ? '%%20%%' : '&#x35;||divi||400',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'slider_settings',
					'description'     => esc_html__( 'Here you can select the icon to be used for the next slide navigation.', 'divi-plus' ),
				),
				'show_arrow_on_hover'                   => array(
					'label'           => esc_html__( 'Show Arrows Only On Hover', 'divi-plus' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'show_if'         => array(
						'show_arrow' => 'on',
					),
					'default'         => 'off',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'slider_settings',
					'description'     => esc_html__( 'Here you can choose whether or not to display previous and next arrow on hover.', 'divi-plus' ),
				),
				'arrows_position' => array(
					'label'           => esc_html__( 'Arrows Position', 'divi-plus' ),
					'type'            => 'select',
					'option_category' => 'layout',
					'options'         => array(
						'inside' 		=> esc_html__( 'Inside', 'divi-plus' ),
						'outside'		=> esc_html__( 'Outside', 'divi-plus' ),
						'top_left'      => esc_html__( 'Top Left', 'divi-plus' ),
						'top_right'     => esc_html__( 'Top Right', 'divi-plus' ),
						'top_center'    => esc_html__( 'Top Center', 'divi-plus' ),
						'bottom_left'   => esc_html__( 'Bottom Left', 'divi-plus' ),
						'bottom_right'  => esc_html__( 'Bottom Right', 'divi-plus' ),
						'bottom_center' => esc_html__( 'Bottom Center', 'divi-plus' ),
					),
					'default'         => 'outside',
					'mobile_options'  => true,
					'show_if'         => array(
						'show_arrow' => 'on',
					),
					'tab_slug'        => 'general',
					'toggle_slug'     => 'slider_settings',
					'description'     => esc_html__( 'Here you can choose the arrows position.', 'divi-plus' ),
				),
				'show_control_dot'                      => array(
					'label'           => esc_html__( 'Show Dots Pagination', 'divi-plus' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'         => 'on',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'slider_settings',
					'description'     => esc_html__( 'Here you choose whether or not to display pagination on the logo slider.', 'divi-plus' ),
				),
				'control_dot_style'                     => array(
					'label'           => esc_html__( 'Dots Pagination Style', 'divi-plus' ),
					'type'            => 'select',
					'option_category' => 'layout',
					'options'         => array(
						'solid_dot'       => esc_html__( 'Solid Dot', 'divi-plus' ),
						'transparent_dot' => esc_html__( 'Transparent Dot', 'divi-plus' ),
						'stretched_dot'   => esc_html__( 'Stretched Dot', 'divi-plus' ),
						'line'            => esc_html__( 'Line', 'divi-plus' ),
						'rounded_line'    => esc_html__( 'Rounded Line', 'divi-plus' ),
						'square_dot'      => esc_html__( 'Squared Dot', 'divi-plus' ),
					),
					'show_if'         => array(
						'show_control_dot' => 'on',
					),
					'default'         => 'solid_dot',
					'tab_slug'        => 'general',
					'toggle_slug'     => 'slider_settings',
					'description'     => esc_html__( 'control dot style', 'divi-plus' ),
				),
				'enable_dynamic_dots' => array(
					'label'            => esc_html__( 'Enable Dynamic Dots', 'divi-plus' ),
					'type'             => 'yes_no_button',
					'option_category'  => 'configuration',
					'options'          => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'default'          => 'off',
					'show_if'          => array(
						'show_control_dot' => 'on',
						'control_dot_style' => array(
							'solid_dot',
							'transparent_dot',
							'square_dot'
						),
					),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'slider_settings',
					'description'      => esc_html__( 'This setting will turn on and off the dynamic pagination of the slider.', 'divi-plus' ),
				),
				'arrows_custom_padding'                 => array(
					'label'            => esc_html__( 'Arrows Padding', 'divi-plus' ),
					'type'             => 'custom_padding',
					'option_category'  => 'layout',
					'show_if'          => array(
						'show_arrow' => 'on',
					),
					'default'          => '5px|10px|5px|10px|true|true',
					'default_on_front' => '5px|10px|5px|10px|true|true',
					'mobile_options'   => true,
					'hover'            => false,
					'tab_slug'         => 'advanced',
					'toggle_slug'      => 'slider_styles',
					'description'      => esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'divi-plus' ),
				),
				'arrow_font_size'                       => array(
					'label'           => esc_html__( 'Arrow Font Size', 'divi-plus' ),
					'type'            => 'range',
					'option_category' => 'layout',
					'range_settings'  => array(
						'min'  => '10',
						'max'  => '100',
						'step' => '1',
					),
					'show_if'         => array(
						'show_arrow' => 'on',
					),
					'mobile_options'  => true,
					'default'         => '18px',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'slider_styles',
					'description'     => esc_html__( 'Move the slider or input the value to increse or decrease the size of arrows.', 'divi-plus' ),
				),
				'arrow_color'                           => array(
					'label'        => esc_html__( 'Arrow Color', 'divi-plus' ),
					'type'         => 'color-alpha',
					'custom_color' => true,
					'show_if'      => array(
						'show_arrow' => 'on',
					),
					'show_if_not'  => array(
						'show_arrow' => 'off',
					),
					'default'      => '#007aff',
					'hover'        => 'tabs',
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'slider_styles',
					'description'  => esc_html__( 'Here you can choose a custom color to be used for arrows.', 'divi-plus' ),
				),
				'use_arrow_background'                  => array(
					'label'           => esc_html__( 'Use Arrow Background', 'divi-plus' ),
					'type'            => 'yes_no_button',
					'option_category' => 'configuration',
					'options'         => array(
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
						'off' => esc_html__( 'No', 'divi-plus' ),
					),
					'show_if'         => array(
						'show_arrow' => 'on',
					),
					'default'         => 'off',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'slider_styles',
					'description'     => esc_html__( 'Here you can choose whehter or not to apply background on arrows.', 'divi-plus' ),
				),
				'arrow_background_color'                => array(
					'label'        => esc_html__( 'Arrow Background', 'divi-plus' ),
					'type'         => 'color-alpha',
					'custom_color' => true,
					'show_if'      => array(
						'show_arrow'           => 'on',
						'use_arrow_background' => 'on',
					),
					'hover'        => 'tabs',
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'slider_styles',
					'description'  => esc_html__( 'Here you can choose a custom color to be used for the background of arrows.', 'divi-plus' ),
				),
				'arrow_background_border_size'          => array(
					'label'           => esc_html__( 'Arrow Background Border', 'divi-plus' ),
					'type'            => 'range',
					'option_category' => 'layout',
					'range_settings'  => array(
						'min'  => '1',
						'max'  => '10',
						'step' => '1',
					),
					'show_if'         => array(
						'show_arrow'           => 'on',
						'use_arrow_background' => 'on',
					),
					'default'         => '0px',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'slider_styles',
					'description'     => esc_html__( 'Move the slider or input the value to increase or decrease the border size of the arrow background.', 'divi-plus' ),
				),
				'arrow_shape_border_color'              => array(
					'label'        => esc_html__( 'Arrow Background Border Color', 'divi-plus' ),
					'type'         => 'color-alpha',
					'custom_color' => true,
					'show_if'      => array(
						'show_arrow'           => 'on',
						'use_arrow_background' => 'on',
					),
					'hover'        => 'tabs',
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'slider_styles',
					'description'  => esc_html__( 'Here you can choose a custom color to be used for the arrow background border', 'divi-plus' ),
				),
				'control_dot_active_color'              => array(
					'label'        => esc_html__( 'Active Dot Pagination Color', 'divi-plus' ),
					'type'         => 'color-alpha',
					'custom_color' => true,
					'show_if'      => array(
						'show_control_dot' => 'on',
					),
					'show_if_not'  => array(
						'show_control_dot' => 'off',
					),
					'default'      => '#000000',
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'slider_styles',
					'description'  => esc_html__( 'Here you can choose a custom color to be used for the pagination of an active item.', 'divi-plus' ),
				),
				'control_dot_inactive_color'            => array(
					'label'        => esc_html__( 'Inactive Dot Pagination Color', 'divi-plus' ),
					'type'         => 'color-alpha',
					'custom_color' => true,
					'show_if'      => array(
						'show_control_dot' => 'on',
					),
					'default'      => '#007aff',
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'slider_styles',
					'description'  => esc_html__( 'Here you can choose a custom color to be used for the pagination of inactive items.', 'divi-plus' ),
				),
				'featured_image_height'                 => array(
					'label'           => esc_html__( 'Featured Image Height', 'divi-plus' ),
					'type'            => 'range',
					'option_category' => 'layout',
					'range_settings'  => array(
						'min'  => '1',
						'max'  => '1000',
						'step' => '1',
					),
					'show_if'         => array(
						'slider_layout'  => 'layout3',
						'show_thumbnail' => 'on',
					),
					'mobile_options'  => 'true',
					'default'         => '200px',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'width',
					'description'     => esc_html__( 'Move the slider or input the value to increase or decrease the featured image size.', 'divi-plus' ),
				),
				'meta_icon_font_size'                   => array(
					'label'           => esc_html__( 'Meta Icon Font Size', 'divi-plus' ),
					'type'            => 'range',
					'option_category' => 'layout',
					'range_settings'  => array(
						'min'  => '10',
						'max'  => '100',
						'step' => '1',
					),
					'show_if'         => array(
						'slider_layout' => array( 'layout2', 'layout3', 'layout4' ),
					),
					'mobile_options'  => true,
					'default'         => '14px',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'meta_icon_styles',
					'description'     => esc_html__( 'Move the slider or input the value to increse or decrease the size of meta icons.', 'divi-plus' ),
				),
				'meta_comment_icon_font_size'           => array(
					'label'           => esc_html__( 'Comment Icon Font Size', 'divi-plus' ),
					'type'            => 'range',
					'option_category' => 'layout',
					'range_settings'  => array(
						'min'  => '10',
						'max'  => '100',
						'step' => '1',
					),
					'show_if'         => array(
						'slider_layout' => 'layout4',
					),
					'mobile_options'  => true,
					'default'         => '22px',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'meta_icon_styles',
					'description'     => esc_html__( 'Move the slider or input the value to increse or decrease the size of comment icons.', 'divi-plus' ),
				),
				'meta_icon_color'                       => array(
					'label'        => esc_html__( 'Meta Icon Color', 'divi-plus' ),
					'type'         => 'color-alpha',
					'custom_color' => true,
					'show_if'      => array(
						'show_arrow' => 'on',
					),
					'show_if'      => array(
						'slider_layout' => array( 'layout2', 'layout3', 'layout4' ),
					),
					'default'      => '#007aff',
					'hover'        => 'tabs',
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'meta_icon_styles',
					'description'  => esc_html__( 'Here you can choose a custom color to be used for meta icon.', 'divi-plus' ),
				),
				'__blog_slider_data'                    => array(
					'type'                => 'computed',
					'computed_callback'   => array( 'DIPL_BlogSlider', 'get_blog_posts' ),
					'computed_depends_on' => array(
						'slider_layout',
						'posts_number',
						'offset_number',
						'post_order',
						'post_order_by',
						'include_categories',
						'post_date',
						'ignore_sticky_posts',
						'show_thumbnail',
						'featured_image_size',
						'show_content',
						'excerpt_length',
						'show_author',
						'show_date',
						'show_categories',
						'show_comments',
						'show_read_more',
						'read_more_text',
						'custom_read_more',
						'read_more_icon',
						'title_level',
					),
				),
			),
			$this->generate_background_options( 'post_content_wrapper_background', 'skip', 'advanced', 'content_wrapper_toggle', 'post_content_wrapper_background_color' )
		);

	}

	public static function get_blog_posts( $attrs = array(), $conditional_tags = array(), $current_page = array() ) {
		global $et_fb_processing_shortcode_object, $et_pb_rendering_column_content;

		if ( self::$rendering ) {
			// We are trying to render a Blog module while a Blog module is already being rendered
			// which means we have most probably hit an infinite recursion. While not necessarily
			// the case, rendering a post which renders a Blog module which renders a post
			// which renders a Blog module is not a sensible use-case.
			return '';
		}

		/*
		 * Cached $wp_filter so it can be restored at the end of the callback.
		 * This is needed because this callback uses the_content filter / calls a function
		 * which uses the_content filter. WordPress doesn't support nested filter
		 */
		global $wp_filter;
		$wp_filter_cache = $wp_filter;

		$global_processing_original_value = $et_fb_processing_shortcode_object;

		$defaults = array(
			'posts_number'        => '10',
			'offset_number'       => '0',
			'slider_layout'       => 'layout1',
			'post_date'           => 'M j, Y',
			'post_order'          => 'DESC',
			'post_order_by'       => 'date',
			'include_categories'  => '',
			'ignore_sticky_posts' => 'off',
			'show_thumbnail'      => 'on',
			'featured_image_size' => 'large',
			'show_content'        => 'off',
			'excerpt_length'      => '',
			'show_read_more'      => 'on',
			'read_more_text'      => esc_html__( 'Read More', 'divi-plus' ),
			'show_author'         => 'on',
			'show_date'           => 'on',
			'show_categories'     => 'on',
			'show_comments'       => 'on',
			'custom_read_more'    => 'off',
			'read_more_icon'      => '',
			'title_level'         => 'h2',
		);

		// WordPress' native conditional tag is only available during page load. It'll fail during component update because
		// et_pb_process_computed_property() is loaded in admin-ajax.php. Thus, use WordPress' conditional tags on page load and
		// rely to passed $conditional_tags for AJAX call.
		$is_front_page     = (bool) et_fb_conditional_tag( 'is_front_page', $conditional_tags );
		$is_single         = (bool) et_fb_conditional_tag( 'is_single', $conditional_tags );
		$is_user_logged_in = (bool) et_fb_conditional_tag( 'is_user_logged_in', $conditional_tags );
		$current_post_id   = isset( $current_page['id'] ) ? (int) $current_page['id'] : 0;

		// remove all filters from WP audio shortcode to make sure current theme doesn't add any elements into audio module.
		remove_all_filters( 'wp_audio_shortcode_library' );
		remove_all_filters( 'wp_audio_shortcode' );
		remove_all_filters( 'wp_audio_shortcode_class' );

		$attrs = wp_parse_args( $attrs, $defaults );

		foreach ( $defaults as $key => $default ) {
			${$key} = esc_html( et_()->array_get( $attrs, $key, $default ) );
		}

		$processed_title_level = et_pb_process_header_level( $title_level, 'h2' );
		$processed_title_level = esc_html( $processed_title_level );

		if ( 'on' !== $show_content ) {
			$excerpt_length = ( '' === $excerpt_length ) ? 270 : intval( $excerpt_length );
		}

		$args = array(
			'post_type'      => 'post',
			'posts_per_page' => intval( $posts_number ),
			'post_status'    => 'publish',
			'offset'         => 0,
			'orderby'        => 'date',
			'order'          => 'DESC',
		);

		if ( $is_user_logged_in ) {
			$args['post_status'] = array( 'publish', 'private' );
		}

		if ( 'on' === $ignore_sticky_posts ) {
			$args['ignore_sticky_posts'] = true;
		} else {
			$args['ignore_sticky_posts'] = false;
		}

		if ( '' !== $include_categories ) {
			$args['cat'] = sanitize_text_field( $include_categories );
		}

		if ( '' !== $offset_number && ! empty( $offset_number ) ) {
			$args['offset'] = intval( $offset_number );
		}

		if ( '' !== $args['offset'] && -1 === intval( $args['posts_per_page'] ) ) {
			$count_posts            = wp_count_posts( 'post', 'readable' );
			$published_posts        = $count_posts->publish;
			$args['posts_per_page'] = intval( $published_posts );
		}

		if ( isset( $post_order_by ) && '' !== $post_order_by ) {
			$args['orderby'] = sanitize_text_field( $post_order_by );
		}

		if ( isset( $post_order ) && '' !== $post_order ) {
			$args['order'] = sanitize_text_field( $post_order );
		}

		if ( $is_single && ! isset( $args['post__not_in'] ) ) {
			$args['post__not_in'] = array( intval( get_the_ID() ) );
		}

		if ( 'on' === $show_read_more ) {
			$read_more_text = ( ! isset( $read_more_text ) || '' === $read_more_text ) ?
			esc_html__( 'Read More', 'divi-plus' ) :
			sprintf(
				esc_html__( '%s', 'divi-plus' ),
				esc_html( $read_more_text )
			);
		}

		$query = new WP_Query( $args );

		self::$rendering = true;

		$output_array = array();

		if ( $query->have_posts() ) {

			while ( $query->have_posts() ) {
				$query->the_post();

				$post_id        = intval( get_the_ID() );
				$thumb          = '';
				$thumb          = dipl_get_post_thumbnail( $post_id, esc_html( $featured_image_size ), 'dipl_blog_slider_post_image' );
				$no_thumb_class = ( '' === $thumb || 'off' === $show_thumbnail ) ? ' dipl_blog_slider_no_thumb' : '';

				$post_classes = array_map( 'sanitize_html_class', get_post_class( 'dipl_blog_slider_post' . $no_thumb_class ) );
				$post_classes = implode( ' ', $post_classes );

				$output = '';

				$read_more_button = dipl_render_divi_button(
					array(
						'button_text'         => et_core_esc_previously( $read_more_text ),
						'button_text_escaped' => true,
						'button_url'          => esc_url( get_permalink( $post_id ) ),
						'button_custom'       => et_core_esc_previously( $custom_read_more ),
						'custom_icon'         => et_core_esc_previously( $read_more_icon ),
						'has_wrapper'         => false,
					)
				);

				if ( file_exists( plugin_dir_path( __FILE__ ) . 'layouts/' . sanitize_file_name( $slider_layout ) . '.php' ) ) {
					include plugin_dir_path( __FILE__ ) . 'layouts/' . sanitize_file_name( $slider_layout ) . '.php';
				}

				array_push( $output_array, $output );
			}

			wp_reset_postdata();
		} else {
			$output_array = '';
		}

		self::$rendering = false;

		return $output_array;
	}

	public function render( $attrs, $content, $render_slug ) {
		if ( self::$rendering ) {
			// We are trying to render a Blog module while a Blog module is already being rendered
			// which means we have most probably hit an infinite recursion. While not necessarily
			// the case, rendering a post which renders a Blog module which renders a post
			// which renders a Blog module is not a sensible use-case.
			return '';
		}

		/*
		 * Cached $wp_filter so it can be restored at the end of the callback.
		 * This is needed because this callback uses the_content filter / calls a function
		 * which uses the_content filter. WordPress doesn't support nested filter
		 */
		global $wp_filter;
		$wp_filter_cache = $wp_filter;

		$slider_layout                               = $this->props['slider_layout'];
		$posts_number                                = $this->props['posts_number'];
		$post_date                                   = $this->props['post_date'];
		$offset_number                               = $this->props['offset_number'];
		$post_order                                  = $this->props['post_order'];
		$post_order_by                               = $this->props['post_order_by'];
		$include_categories                          = $this->props['include_categories'];
		$ignore_sticky_posts                         = $this->props['ignore_sticky_posts'];
		$show_thumbnail                              = $this->props['show_thumbnail'];
		$featured_image_size                         = $this->props['featured_image_size'];
		$show_content                                = $this->props['show_content'];
		$show_read_more                              = $this->props['show_read_more'];
		$read_more_text                              = $this->props['read_more_text'];
		$custom_read_more                            = $this->props['custom_read_more'];
		$read_more_icon                              = $this->props['read_more_icon'];
		$excerpt_length                              = $this->props['excerpt_length'];
		$show_author                                 = $this->props['show_author'];
		$show_date                                   = $this->props['show_date'];
		$show_categories                             = $this->props['show_categories'];
		$show_comments                               = $this->props['show_comments'];
		$no_result_text							 	 = $this->props['no_result_text'];
		$enable_coverflow_shadow                     = $this->props['enable_coverflow_shadow'];
		$coverflow_shadow_color                      = $this->props['coverflow_shadow_color'];
		$coverflow_rotate                            = $this->props['coverflow_rotate'];
		$coverflow_depth                             = $this->props['coverflow_depth'];
		$control_dot_style                           = $this->props['control_dot_style'];
		$control_dot_active_color                    = $this->props['control_dot_active_color'];
		$control_dot_inactive_color                  = $this->props['control_dot_inactive_color'];
		$transition_duration                         = $this->props['transition_duration'];
		$equalize_posts_height                       = esc_attr( $this->props['equalize_posts_height'] );
		$show_arrow                                  = esc_attr( $this->props['show_arrow'] );
		$previous_slide_arrow                        = esc_attr( $this->props['previous_slide_arrow'] );
		$next_slide_arrow                            = esc_attr( $this->props['next_slide_arrow'] );
		$show_control                                = esc_attr( $this->props['show_control_dot'] );
		$show_arrow_on_hover                         = esc_attr( $this->props['show_arrow_on_hover'] );
		$arrow_color                                 = esc_attr( $this->props['arrow_color'] );
		$arrow_color_hover                           = esc_attr( $this->get_hover_value( 'arrow_color' ) );
		$use_arrow_background                        = esc_attr( $this->props['use_arrow_background'] );
		$arrow_background_color                      = esc_attr( $this->props['arrow_background_color'] );
		$arrow_background_color_hover                = esc_attr( $this->get_hover_value( 'arrow_background_color' ) );
		$arrow_background_border_size                = esc_attr( $this->props['arrow_background_border_size'] );
		$arrow_shape_border_color                    = esc_attr( $this->props['arrow_shape_border_color'] );
		$arrow_shape_border_color_hover              = esc_attr( $this->get_hover_value( 'arrow_shape_border_color' ) );
		$control_dot_active_color                    = esc_attr( $this->props['control_dot_active_color'] );
		$control_dot_inactive_color                  = esc_attr( $this->props['control_dot_inactive_color'] );
		$post_per_slide                              = intval( $this->props['post_per_slide'] );
		$category_background_color                   = esc_attr( $this->props['category_background_color'] );
		$category_background_color_hover             = esc_attr( $this->get_hover_value( 'category_background_color' ) );
		$slide_background_type                       = esc_attr( $this->get_hover_value( 'slide_background_type' ) );
		$post_content_wrapper_background_color       = esc_attr( $this->props['post_content_wrapper_background_color'] );
		$post_content_wrapper_background_color_hover = esc_attr( $this->get_hover_value( 'post_content_wrapper_background_color' ) );
		$meta_separator_color                        = esc_attr( $this->props['meta_separator_color'] );
		$meta_separator_color_hover                  = esc_attr( $this->get_hover_value( 'meta_separator_color' ) );
		$featured_image_height                       = et_pb_responsive_options()->get_property_values( $this->props, 'featured_image_height' );
		$meta_icon_font_size                         = et_pb_responsive_options()->get_property_values( $this->props, 'meta_icon_font_size' );
		$meta_comment_icon_font_size                 = et_pb_responsive_options()->get_property_values( $this->props, 'meta_comment_icon_font_size' );
		$meta_icon_color                             = esc_attr( $this->props['meta_icon_color'] );
		$meta_icon_color_hover                       = esc_attr( $this->get_hover_value( 'meta_icon_color_hover' ) );
		$arrows_position							 = et_pb_responsive_options()->get_property_values( $this->props, 'arrows_position' );
		$arrows_position							 = array_filter( $arrows_position );

		$title_level  = esc_html( $this->props['title_level'] );
		$order_class  = $this->get_module_order_class( $render_slug );
		$order_number = esc_attr( preg_replace( '/[^0-9]/', '', esc_attr( $order_class ) ) );

		$video_background          = $this->video_background();
		$parallax_image_background = $this->get_parallax_image_background();
		$processed_title_level     = et_pb_process_header_level( $title_level, 'h2' );
		$processed_title_level     = esc_html( $processed_title_level );

		$args = array(
			'post_type'      => 'post',
			'posts_per_page' => intval( $posts_number ),
			'post_status'    => 'publish',
			'offset'         => 0,
			'orderby'        => 'date',
			'order'          => 'DESC',
		);

		if ( is_user_logged_in() ) {
			$args['post_status'] = array( 'publish', 'private' );
		}

		if ( 'on' === $ignore_sticky_posts ) {
			$args['ignore_sticky_posts'] = true;
		}

		if ( '' !== $include_categories ) {
			$args['cat'] = sanitize_text_field( $include_categories );
		}

		if ( '' !== $offset_number && ! empty( $offset_number ) ) {
			$args['offset'] = intval( $offset_number );
		}

		if ( '' !== $args['offset'] && -1 === intval( $args['posts_per_page'] ) ) {
			$count_posts            = wp_count_posts( 'post', 'readable' );
			$published_posts        = $count_posts->publish;
			$args['posts_per_page'] = intval( $published_posts );
		}

		if ( isset( $post_order_by ) && '' !== $post_order_by ) {
			$args['orderby'] = sanitize_text_field( $post_order_by );
		}

		if ( isset( $post_order ) && '' !== $post_order ) {
			$args['order'] = sanitize_text_field( $post_order );
		}

		if ( is_single() && ! isset( $args['post__not_in'] ) ) {
			$args['post__not_in'] = array( intval( get_the_ID() ) );
		}

		if ( 'on' === $show_read_more ) {
			$read_more_text = ( ! isset( $read_more_text ) || '' === $read_more_text ) ?
			esc_html__( 'Read More', 'divi-plus' ) :
			sprintf(
				esc_html__( '%s', 'divi-plus' ),
				esc_html( $read_more_text )
			);
		}

		$query = new WP_Query( $args );

		self::$rendering = true;

		if ( $query->have_posts() ) {

			wp_enqueue_script( 'elicus-swiper-script' );
			wp_enqueue_style( 'elicus-swiper-style' );
			wp_enqueue_style( 'dipl-swiper-style' );
			$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        	wp_enqueue_style( 'dipl-blog-slider-style', PLUGIN_PATH . 'includes/modules/BlogSlider/' . $file . '.min.css', array(), '1.0.0' );

			if ( ! empty( array_filter( $meta_icon_font_size ) ) ) {
				et_pb_responsive_options()->generate_responsive_css( $meta_icon_font_size, '%%order_class%% .dipl_blog_slider_meta .et-pb-icon', 'font-size', $render_slug, '', 'type' );
			}

			if ( ! empty( array_filter( $meta_comment_icon_font_size ) ) ) {
				et_pb_responsive_options()->generate_responsive_css( $meta_comment_icon_font_size, '%%order_class%% .layout4 .dipl_blog_slider_meta .comments .et-pb-icon', 'font-size', $render_slug, '!important', 'type' );
			}

			if ( ! empty( array_filter( $featured_image_height ) ) ) {
				et_pb_responsive_options()->generate_responsive_css( $featured_image_height, '%%order_class%% .layout3 .dipl_blog_slider_image_wrapper', 'height', $render_slug, '', 'type' );
			}

			if ( '' !== $meta_icon_color ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_blog_slider_meta .et-pb-icon',
						'declaration' => sprintf( 'color: %1$s !important;', esc_attr( $meta_icon_color ) ),
					)
				);
			}

			if ( '' !== $meta_icon_color_hover ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_blog_slider_meta:hover .et-pb-icon',
						'declaration' => sprintf( 'color: %1$s !important;', esc_attr( $meta_icon_color_hover ) ),
					)
				);
			}

			// some themes do not include these styles/scripts so we need to enqueue them in this module to support audio post format.
			wp_enqueue_style( 'wp-mediaelement' );
			wp_enqueue_script( 'wp-mediaelement' );

			// include easyPieChart which is required for loading Blog module content via ajax correctly.
			wp_enqueue_script( 'easypiechart' );

			// include ET Shortcode scripts.
			wp_enqueue_script( 'et-shortcodes-js' );

			// remove all filters from WP audio shortcode to make sure current theme doesn't add any elements into audio module.
			remove_all_filters( 'wp_audio_shortcode_library' );
			remove_all_filters( 'wp_audio_shortcode' );
			remove_all_filters( 'wp_audio_shortcode_class' );

			if ( 'on' !== $show_content ) {
				$excerpt_length = ( '' === $excerpt_length ) ? 270 : intval( $excerpt_length );
			}

			if ( '' !== $category_background_color ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => "{$this->main_css_element} .dipl_blog_slider_post_categories a",
						'declaration' => sprintf(
							'background-color: %1$s !important;',
							esc_attr( $category_background_color )
						),
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => "{$this->main_css_element} .dipl_blog_slider_post_categories a",
						'declaration' => 'padding: 2px 4px;',
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => "{$this->main_css_element} .dipl_blog_slider_post_categories a",
						'declaration' => 'margin: 0 2px 5px 0;',
					)
				);
			}
			if ( '' !== $category_background_color_hover ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => "{$this->main_css_element} .dipl_blog_slider_post_categories a:hover",
						'declaration' => sprintf(
							'background-color: %1$s !important;',
							esc_attr( $category_background_color_hover )
						),
					)
				);
			}

			if ( 'on' === $enable_coverflow_shadow ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-container-3d .swiper-slide-shadow-left',
						'declaration' => sprintf( 'background-image: linear-gradient(to left,%1$s,rgba(0,0,0,0));', esc_attr( $coverflow_shadow_color ) ),
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-container-3d .swiper-slide-shadow-right',
						'declaration' => sprintf( 'background-image: linear-gradient(to right,%1$s,rgba(0,0,0,0));', esc_attr( $coverflow_shadow_color ) ),
					)
				);
			} else {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-container-3d .swiper-slide-shadow-left, %%order_class%% .swiper-container-3d .swiper-slide-shadow-right',
						'declaration' => 'background-image: none;',
					)
				);
			}

			if ( 'on' === $show_arrow ) {
				if ( $arrow_color ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_swiper_navigation .swiper-button-prev, %%order_class%% .dipl_swiper_navigation .swiper-button-next',
							'declaration' => sprintf( 'color: %1$s;', esc_attr( $arrow_color ) ),
						)
					);
				}

				if ( $arrow_color_hover ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_swiper_navigation .swiper-button-prev:hover, %%order_class%% .dipl_swiper_navigation .swiper-button-next:hover',
							'declaration' => sprintf( 'color: %1$s;', esc_attr( $arrow_color_hover ) ),
						)
					);
				}

				$arrow_font_size = et_pb_responsive_options()->get_property_values( $this->props, 'arrow_font_size' );
				if ( ! empty( array_filter( $arrow_font_size ) ) ) {
					et_pb_responsive_options()->generate_responsive_css( $arrow_font_size, '%%order_class%% .dipl_swiper_navigation .swiper-button-prev, %%order_class%% .dipl_swiper_navigation .swiper-button-next', 'font-size', $render_slug, '', 'range' );
				}

				if ( '' !== $this->props['next_slide_arrow'] ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_swiper_navigation .swiper-button-next::after',
							'declaration' => 'display: flex; align-items: center; height: 100%; font-family: "ETmodules"; content: attr(data-next_slide_arrow);',
						)
					);
					if ( class_exists( 'ET_Builder_Module_Helper_Style_Processor' ) && method_exists( 'ET_Builder_Module_Helper_Style_Processor', 'process_extended_icon' ) ) {
						$this->generate_styles(
							array(
								'utility_arg'    => 'icon_font_family',
								'render_slug'    => $render_slug,
								'base_attr_name' => 'next_slide_arrow',
								'important'      => true,
								'selector'       => '%%order_class%% .dipl_swiper_navigation .swiper-button-next::after',
								'processor'      => array(
									'ET_Builder_Module_Helper_Style_Processor',
									'process_extended_icon',
								),
							)
						);
					} else {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dipl_swiper_navigation .swiper-button-next::after',
								'declaration' => 'font-family: "ETmodules";',
							)
						);
					}
				}

				if ( '' !== $this->props['previous_slide_arrow'] ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_swiper_navigation .swiper-button-prev::after',
							'declaration' => 'display: flex; align-items: center; height: 100%; font-family: "ETmodules"; content: attr(data-previous_slide_arrow);',
						)
					);
					if ( class_exists( 'ET_Builder_Module_Helper_Style_Processor' ) && method_exists( 'ET_Builder_Module_Helper_Style_Processor', 'process_extended_icon' ) ) {
						$this->generate_styles(
							array(
								'utility_arg'    => 'icon_font_family',
								'render_slug'    => $render_slug,
								'base_attr_name' => 'previous_slide_arrow',
								'important'      => true,
								'selector'       => '%%order_class%% .dipl_swiper_navigation .swiper-button-prev::after',
								'processor'      => array(
									'ET_Builder_Module_Helper_Style_Processor',
									'process_extended_icon',
								),
							)
						);
					} else {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dipl_swiper_navigation .swiper-button-prev::after',
								'declaration' => 'font-family: "ETmodules";',
							)
						);
					}
				}

				if ( 'on' === $show_arrow_on_hover ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_swiper_navigation .swiper-button-prev',
							'declaration' => 'visibility: hidden; opacity: 0; transition: all 300ms ease;',
						)
					);
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_swiper_navigation .swiper-button-next',
							'declaration' => 'visibility: hidden; opacity: 0; transition: all 300ms ease;',
						)
					);
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%%:hover .dipl_swiper_navigation .swiper-button-prev, %%order_class%%:hover .dipl_swiper_navigation .swiper-button-next',
							'declaration' => 'visibility: visible; opacity: 1;',
						)
					);
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%%:hover .dipl_swiper_navigation .swiper-button-prev.swiper-button-disabled, %%order_class%%:hover .dipl_swiper_navigation .swiper-button-next.swiper-button-disabled',
							'declaration' => 'opacity: 0.35;',
						)
					);
					
					/* Outside Slider */
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_arrows_outside .swiper-button-prev',
							'declaration' => 'left: 50px;',
						)
					);
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_arrows_outside .swiper-button-next',
							'declaration' => 'right: 50px;',
						)
					);
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%%:hover .dipl_arrows_outside .swiper-button-prev',
							'declaration' => 'left: 0;',
						)
					);
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%%:hover .dipl_arrows_outside .swiper-button-next',
							'declaration' => 'right: 0;',
						)
					);
					/* Inside Slider */
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_arrows_inside .swiper-button-prev',
							'declaration' => 'left: -50px;',
						)
					);
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_arrows_inside .swiper-button-next',
							'declaration' => 'right: -50px;',
						)
					);
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%%:hover .dipl_arrows_inside .swiper-button-prev',
							'declaration' => 'left: 0;',
						)
					);
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%%:hover .dipl_arrows_inside .swiper-button-next',
							'declaration' => 'right: 0;',
						)
					);

				}

				if ( 'on' === $use_arrow_background ) {
					if ( '' !== $arrow_background_color ) {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dipl_swiper_navigation .swiper-button-prev, %%order_class%% .dipl_swiper_navigation .swiper-button-next',
								'declaration' => sprintf( 'background: %1$s;', esc_attr( $arrow_background_color ) ),
							)
						);
					}

					if ( '' !== $arrow_background_color_hover ) {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dipl_swiper_navigation .swiper-button-prev:hover, %%order_class%% .dipl_swiper_navigation .swiper-button-next:hover',
								'declaration' => sprintf( 'background: %1$s;', esc_attr( $arrow_background_color_hover ) ),
							)
						);
					}

					if ( '' !== $arrow_background_border_size ) {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dipl_swiper_navigation .swiper-button-prev, %%order_class%% .dipl_swiper_navigation .swiper-button-next',
								'declaration' => sprintf( 'border-width: %1$s;', esc_attr( $arrow_background_border_size ) ),
							)
						);
					}

					if ( '' !== $arrow_shape_border_color ) {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dipl_swiper_navigation .swiper-button-prev, %%order_class%% .dipl_swiper_navigation .swiper-button-next',
								'declaration' => sprintf( 'border-color: %1$s;', esc_attr( $arrow_shape_border_color ) ),
							)
						);
					}

					if ( '' !== $arrow_shape_border_color_hover ) {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dipl_swiper_navigation .swiper-button-prev:hover, %%order_class%% .dipl_swiper_navigation .swiper-button-next:hover',
								'declaration' => sprintf( 'border-color: %1$s;', esc_attr( $arrow_shape_border_color_hover ) ),
							)
						);
					}
				}
			}

			if ( 'on' === $show_control ) {
				if ( $control_dot_inactive_color ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .swiper-pagination-bullet',
							'declaration' => sprintf( 'background: %1$s;', esc_attr( $control_dot_inactive_color ) ),
						)
					);

					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .transparent_dot .swiper-pagination-bullet',
							'declaration' => sprintf( 'border-color: %1$s;', esc_attr( $control_dot_inactive_color ) ),
						)
					);
				}

				if ( $control_dot_active_color ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .swiper-pagination-bullet.swiper-pagination-bullet-active',
							'declaration' => sprintf( 'background: %1$s;', esc_attr( $control_dot_active_color ) ),
						)
					);
				}

				if ( 'stretched_dot' === $control_dot_style && $transition_duration ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .stretched_dot .swiper-pagination-bullet',
							'declaration' => sprintf( 'transition: all %1$sms ease;', intval( $transition_duration ) ),
						)
					);
				}
			}

			if ( 'on' === $equalize_posts_height ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-wrapper',
						'declaration' => 'align-items: stretch;',
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-slide',
						'declaration' => 'height: auto;',
					)
				);
			} elseif ( 1 === $post_per_slide ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-wrapper',
						'declaration' => 'align-items: center;',
					)
				);
			}

			$output  = '<div class="dipl_swiper_wrapper">';
			$output .= '<div class="dipl_blog_slider_container dipl_swiper_inner_wrap ' . sanitize_html_class( $slider_layout ) . '">';
			$output .= '<div class="swiper-container">';
			$output .= '<div class="swiper-wrapper">';

			while ( $query->have_posts() ) {
				$query->the_post();

				$post_id = intval( get_the_ID() );

				$read_more_button = $this->render_button(
					array(
						'button_text'         => et_core_esc_previously( $read_more_text ),
						'button_text_escaped' => true,
						'button_url'          => esc_url( get_permalink( $post_id ) ),
						'button_custom'       => isset( $custom_read_more ) ? esc_attr( $custom_read_more ) : 'off',
						'custom_icon'         => isset( $read_more_icon ) ? esc_attr( $read_more_icon ) : '',
						'has_wrapper'         => false,
					)
				);

				$thumb          = '';
				$thumb          = dipl_get_post_thumbnail( $post_id, esc_html( $featured_image_size ), 'dipl_blog_slider_post_image' );
				$no_thumb_class = ( '' === $thumb || 'off' === $show_thumbnail ) ? ' dipl_blog_slider_no_thumb' : '';

				$post_classes = array_map( 'sanitize_html_class', get_post_class( 'dipl_blog_slider_post' . $no_thumb_class ) );
				$post_classes = implode( ' ', $post_classes );

				if ( file_exists( plugin_dir_path( __FILE__ ) . 'layouts/' . sanitize_file_name( $slider_layout ) . '.php' ) ) {
					include plugin_dir_path( __FILE__ ) . 'layouts/' . sanitize_file_name( $slider_layout ) . '.php';
				}
			}

			wp_reset_postdata();

			$output .= '</div> <!-- swiper-wrapper -->';
			$output .= '</div> <!-- swiper-container -->';

			if ( 'on' === $show_arrow ) {
				$next = sprintf(
					'<div class="swiper-button-next"%1$s></div>',
					'' !== $this->props['next_slide_arrow'] ?
					sprintf(
						' data-next_slide_arrow="%1$s"',
						esc_attr( et_pb_process_font_icon( $this->props['next_slide_arrow'] ) )
					) :
					''
				);

				$prev = sprintf(
					'<div class="swiper-button-prev"%1$s></div>',
					'' !== $this->props['previous_slide_arrow'] ?
					sprintf(
						' data-previous_slide_arrow="%1$s"',
						esc_attr( et_pb_process_font_icon( $this->props['previous_slide_arrow'] ) )
					) :
					''
				);

				if ( ! empty( $arrows_position ) ) {
					wp_enqueue_script( 'dipl-blog-slider-custom', PLUGIN_PATH."includes/modules/BlogSlider/dipl-blog-slider-custom.min.js", array('jquery'), '1.0.0', true );
					$arrows_position_data = '';
					foreach( $arrows_position as $device => $value ) {
						$arrows_position_data .= ' data-arrows_' . $device . '="' . $value . '"';
					}
				}

				$output .= sprintf(
					'<div class="dipl_swiper_navigation"%3$s>%1$s %2$s</div>',
					$next,
					$prev,
					! empty( $arrows_position ) ? $arrows_position_data : ''
				);
			}

			$output .= '</div> <!-- dipl_blog_slider_container -->';

			if ( 'on' === $show_control ) {
				$output .= sprintf(
					'<div class="dipl_swiper_pagination"><div class="swiper-pagination %1$s"></div></div>',
					esc_attr( $control_dot_style )
				);
			}

			$output .= '</div> <!-- dipl_swiper_wrapper -->';

			$script = $this->dipl_render_slider_script();

			$output .= $script;

			$this->process_advanced_margin_padding_css( $this, $render_slug, $this->margin_padding );

			/* Post Category */
			if ( 'layout2' === $slider_layout ) {
				$category_color = $this->props['category_color'];
				if ( '' !== $category_background_color ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => "{$this->main_css_element} .dipl_blog_slider_post_categories a",
							'declaration' => sprintf(
								'color: %1$s;',
								esc_attr( $category_color )
							),
						)
					);
				}

				$category_color_hover = $this->get_hover_value( 'category_color' );
				if ( '' !== $category_background_color_hover ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => "{$this->main_css_element} .dipl_blog_slider_post_categories a:hover",
							'declaration' => sprintf(
								'color: %1$s !important;',
								esc_attr( $category_color_hover )
							),
						)
					);
				}
			}

			if ( '' !== $meta_separator_color ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => "{$this->main_css_element} .layout3 .dipl_blog_slider_meta",
						'declaration' => sprintf(
							'border-top-color: %1$s;',
							esc_attr( $meta_separator_color )
						),
					)
				);
			}

			if ( '' !== $meta_separator_color_hover ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => "{$this->main_css_element} .layout3 .dipl_blog_slider_meta:hover",
						'declaration' => sprintf(
							'border-top-color: %1$s !important;',
							esc_attr( $meta_separator_color_hover )
						),
					)
				);
			}

			$options = array(
	            'normal' => array(
	                'post_content_wrapper_background' => "{$this->main_css_element} .dipl_blog_slider_post",
	            )
	        );

	        $this->process_custom_background( $render_slug, $options );
		} else {
			$output = '<div className="entry">' . esc_html( $no_result_text ) . '</div>';
		}

		self::$rendering = false;

		return $output;
		
	}

	public function before_render() {
		$is_responsive = et_pb_responsive_options()->is_responsive_enabled( $this->props, 'post_per_slide' );
		if ( ! $is_responsive ) {
			$post_per_slide = $this->props['post_per_slide'];
			if ( 'slide' === $this->props['slide_effect'] ) {
				$post_per_slide_tablet = $post_per_slide < 2 ? $post_per_slide : 2;
				$post_per_slide_mobile = 1;
			} elseif ( 'coverflow' === $this->props['slide_effect'] ) {
				$post_per_slide_tablet = 3;
				$post_per_slide_mobile = 1;
			}
			if ( isset( $post_per_slide_tablet ) && '' !== $post_per_slide_tablet ) {
				$this->props['post_per_slide_tablet'] = $post_per_slide_tablet;
			}

			if ( isset( $post_per_slide_mobile ) && '' !== $post_per_slide_mobile ) {
				$this->props['post_per_slide_phone'] = $post_per_slide_mobile;
			}
		}
	}

	public function dipl_render_slider_script() {

		$order_class             = $this->get_module_order_class( 'dipl_blog_slider' );
		$slide_effect            = esc_attr( $this->props['slide_effect'] );
		$show_arrow              = esc_attr( $this->props['show_arrow'] );
		$show_control_dot        = esc_attr( $this->props['show_control_dot'] );
		$loop                    = esc_attr( $this->props['slider_loop'] );
		$autoplay                = esc_attr( $this->props['autoplay'] );
		$autoplay_speed          = intval( $this->props['autoplay_speed'] );
		$transition_duration     = intval( $this->props['transition_duration'] );
		$pause_on_hover          = esc_attr( $this->props['pause_on_hover'] );
		$enable_coverflow_shadow = 'on' === $this->props['enable_coverflow_shadow'] ? 'true' : 'false';
		$coverflow_rotate        = intval( $this->props['coverflow_rotate'] );
		$coverflow_depth         = intval( $this->props['coverflow_depth'] );
		$post_per_slide          = et_pb_responsive_options()->get_property_values( $this->props, 'post_per_slide', '', true );
		$space_between_slides    = et_pb_responsive_options()->get_property_values( $this->props, 'space_between_slides', '', true );
		$slides_per_group        = et_pb_responsive_options()->get_property_values( $this->props, 'slides_per_group', '', true );
		$dynamic_bullets		 = 'on' === $this->props['enable_dynamic_dots'] && in_array( $this->props['control_dot_style'], array( 'solid_dot', 'transparent_dot', 'square_dot' ), true ) ? 'true' : 'false';

		$autoplay_speed           = '' !== $autoplay_speed || 0 !== $autoplay_speed ? $autoplay_speed : 3000;
		$transition_duration      = '' !== $transition_duration || 0 !== $transition_duration ? $transition_duration : 1000;
		$loop                     = 'on' === $loop ? 'true' : 'false';
		$arrows                   = 'false';
		$dots                     = 'false';
		$autoplaySlides           = 0;
		$cube                     = 'false';
		$coverflow                = 'false';
		$slidesPerGroup           = 1;
		$slidesPerGroupIpad       = 1;
		$slidesPerGroupMobile     = 1;
		$slidesPerGroupSkip       = 0;
		$slidesPerGroupSkipIpad   = 0;
		$slidesPerGroupSkipMobile = 0;

		if ( in_array( $slide_effect, array( 'slide', 'coverflow' ), true ) ) {
			$post_per_view             = $post_per_slide['desktop'];
			$post_per_view_ipad        = '' !== $post_per_slide['tablet'] ? $post_per_slide['tablet'] : $this->props['post_per_slide_tablet'];
			$post_per_view_mobile      = '' !== $post_per_slide['phone'] ? $post_per_slide['phone'] : $this->props['post_per_slide_phone'];
			$post_space_between        = $space_between_slides['desktop'];
			$post_space_between_ipad   = '' !== $space_between_slides['tablet'] ? $space_between_slides['tablet'] : $post_space_between;
			$post_space_between_mobile = '' !== $space_between_slides['phone'] ? $space_between_slides['phone'] : $post_space_between_ipad;
			$slidesPerGroup            = $slides_per_group['desktop'];
			$slidesPerGroupIpad        = '' !== $slides_per_group['tablet'] ? $slides_per_group['tablet'] : $slidesPerGroup;
			$slidesPerGroupMobile      = '' !== $slides_per_group['phone'] ? $slides_per_group['phone'] : $slidesPerGroupIpad;

			if ( $post_per_view > $slidesPerGroup && 1 !== $slidesPerGroup ) {
				$slidesPerGroupSkip = $post_per_view - $slidesPerGroup;
			}
			if ( $post_per_view_ipad > $slidesPerGroupIpad && 1 !== $slidesPerGroupIpad ) {
				$slidesPerGroupSkipIpad = $post_per_view_ipad - $slidesPerGroupIpad;
			}
			if ( $post_per_view_mobile > $slidesPerGroupMobile && 1 !== $slidesPerGroupMobile ) {
				$slidesPerGroupSkipMobile = $post_per_view_mobile - $slidesPerGroupMobile;
			}
		} else {
			$post_per_view             = 1;
			$post_per_view_ipad        = 1;
			$post_per_view_mobile      = 1;
			$post_space_between        = 0;
			$post_space_between_ipad   = 0;
			$post_space_between_mobile = 0;
		}

		if ( 'on' === $show_arrow ) {
			$arrows = "{    
                            nextEl: '." . esc_attr( $order_class ) . " .swiper-button-next',
                            prevEl: '." . esc_attr( $order_class ) . " .swiper-button-prev',
                    }";
		}

		if ( 'on' === $show_control_dot ) {
			$dots = "{
                        el: '." . esc_attr( $order_class ) . " .swiper-pagination',
                        dynamicBullets: " . $dynamic_bullets . ",
                        clickable: true,
                    }";
		}

		if ( 'on' === $autoplay ) {
			if ( 'on' === $pause_on_hover ) {
				$autoplaySlides = '{
                                delay:' . $autoplay_speed . ',
                                disableOnInteraction: true,
                            }';
			} else {
				$autoplaySlides = '{
                                delay:' . $autoplay_speed . ',
                                disableOnInteraction: false,
                            }';
			}
		}

		if ( 'cube' === $slide_effect ) {
			$cube = '{
                        shadow: false,
                        slideShadows: false,
                    }';
		}

		if ( 'coverflow' === $slide_effect ) {
			$coverflow = '{
                            rotate: ' . $coverflow_rotate . ',
                            stretch: 0,
                            depth: ' . $coverflow_depth . ',
                            modifier: 1,
                            slideShadows : ' . $enable_coverflow_shadow . ',
                        }';
		}

		$script  = '<script type="text/javascript">';
		$script .= 'jQuery(function($) {';
		$script .= 'var ' . esc_attr( $order_class ) . '_swiper = new Swiper(\'.' . esc_attr( $order_class ) . ' .swiper-container\', {
                            slidesPerView: ' . $post_per_view . ',
                            autoplay: ' . $autoplaySlides . ',
                            spaceBetween: ' . intval( $post_space_between ) . ',
                            slidesPerGroup: ' . $slidesPerGroup . ',
                            slidesPerGroupSkip: ' . $slidesPerGroupSkip . ',
                            effect: "' . $slide_effect . '",
                            cubeEffect: ' . $cube . ',
                            coverflowEffect: ' . $coverflow . ',
                            speed: ' . $transition_duration . ',
                            loop: ' . $loop . ',
                            pagination: ' . $dots . ',
                            navigation: ' . $arrows . ',
                            grabCursor: \'true\',
                            breakpoints: {
                            	981: {
		                          	slidesPerView: ' . $post_per_view . ',
		                          	spaceBetween: ' . intval( $post_space_between ) . ',
                            		slidesPerGroup: ' . $slidesPerGroup . ',
                            		slidesPerGroupSkip: ' . $slidesPerGroupSkip . ',
		                        },
		                        768: {
		                          	slidesPerView: ' . $post_per_view_ipad . ',
		                          	spaceBetween: ' . intval( $post_space_between_ipad ) . ',
		                          	slidesPerGroup: ' . $slidesPerGroupIpad . ',
                            		slidesPerGroupSkip: ' . $slidesPerGroupSkipIpad . ',
		                        },
		                        0: {
		                          	slidesPerView: ' . $post_per_view_mobile . ',
		                          	spaceBetween: ' . intval( $post_space_between_mobile ) . ',
		                          	slidesPerGroup: ' . $slidesPerGroupMobile . ',
                            		slidesPerGroupSkip: ' . $slidesPerGroupSkipMobile . ',
		                        }
		                    },
                    });';

		if ( 'on' === $pause_on_hover && 'on' === $autoplay ) {
			$script .= '$(".' . esc_attr( $order_class ) . ' .swiper-container").on("mouseenter", function(e) {
							if ( typeof ' . esc_attr( $order_class ) . '_swiper.autoplay.stop === "function" ) {
								' . esc_attr( $order_class ) . '_swiper.autoplay.stop();
							}
                        });';
			$script .= '$(".' . esc_attr( $order_class ) . ' .swiper-container").on("mouseleave", function(e) {
        					if ( typeof ' . esc_attr( $order_class ) . '_swiper.autoplay.start === "function" ) {
                            	' . esc_attr( $order_class ) . '_swiper.autoplay.start();
                            }
                        });';
		}

		if ( 'true' !== $loop ) {
			$script .= esc_attr( $order_class ) . '_swiper.on(\'reachEnd\', function(){
                            ' . esc_attr( $order_class ) . '_swiper.autoplay = false;
                        });';
		}

		$script .= '});</script>';

		return $script;
	}

	public function process_advanced_margin_padding_css( $module, $function_name, $margin_padding ) {
		$utils           = ET_Core_Data_Utils::instance();
		$all_values      = $module->props;
		$advanced_fields = $module->advanced_fields;

		// Disable if module doesn't set advanced_fields property and has no VB support.
		if ( ! $module->has_vb_support() && ! $module->has_advanced_fields ) {
			return;
		}

		$allowed_advanced_fields = array( 'slider_margin_padding' );
		foreach ( $allowed_advanced_fields as $advanced_field ) {
			if ( ! empty( $advanced_fields[ $advanced_field ] ) ) {
				foreach ( $advanced_fields[ $advanced_field ] as $label => $form_field ) {
					$margin_key  = "{$label}_custom_margin";
					$padding_key = "{$label}_custom_padding";
					if ( '' !== $utils->array_get( $all_values, $margin_key, '' ) || '' !== $utils->array_get( $all_values, $padding_key, '' ) ) {
						$settings = $utils->array_get( $form_field, 'margin_padding', array() );
						// Ensure main selector exists.
						$form_field_margin_padding_css = $utils->array_get( $settings, 'css.main', '' );
						if ( empty( $form_field_margin_padding_css ) ) {
							$utils->array_set( $settings, 'css.main', $utils->array_get( $form_field, 'css.main', '' ) );
						}

						$margin_padding->update_styles( $module, $label, $settings, $function_name, $advanced_field );
					}
				}
			}
		}
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
	if ( in_array( 'dipl_blog_slider', $modules ) ) {
		new DIPL_BlogSlider();
	}
} else {
	new DIPL_BlogSlider();
}
