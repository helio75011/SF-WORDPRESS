<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.5
 */
class DIPL_Blog_Timeline extends ET_Builder_Module {

	public $slug       = 'dipl_blog_timeline';
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
		$this->name = esc_html__( 'DP Blog Timeline', 'divi-plus' );
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'main_content' => array(
						'title' => esc_html__( 'Content', 'divi-plus' ),
					),
					'elements'     => array(
						'title' => esc_html__( 'Elements', 'divi-plus' ),
					),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'timeline_layout'               => array(
						'title'    => esc_html__( 'Timeline Layout', 'divi-plus' ),
						'priority' => 1,
					),
					'timeline_icon_styling'         => array(
						'title'    => esc_html__( 'Timeline Icon Styling', 'divi-plus' ),
						'priority' => 2,
					),
					'timeline_bar_styling'          => array(
						'title'    => esc_html__( 'Timeline Stem Styling', 'divi-plus' ),
						'priority' => 2,
					),
					'timeline_post_styling'         => array(
						'title'    => esc_html__( 'Timeline Post Styling', 'divi-plus' ),
						'priority' => 3,
					),
					'timeline_heading_styling'      => array(
						'title'    => esc_html__( 'Post Heading', 'divi-plus' ),
						'priority' => 4,
					),
					'timeline_post_content_styling' => array(
						'title'             => esc_html__( 'Post Content', 'divi-plus' ),
						'priority'          => 5,
						'tabbed_subtoggles' => true,
						'bb_icons_support'  => true,
						'sub_toggles'       => array(
							'p'     => array(
								'name' => 'P',
								'icon' => 'text-left',
							),
							'a'     => array(
								'name' => 'A',
								'icon' => 'text-link',
							),
							'ul'    => array(
								'name' => 'UL',
								'icon' => 'list',
							),
							'ol'    => array(
								'name' => 'OL',
								'icon' => 'numbered-list',
							),
							'quote' => array(
								'name' => 'QUOTE',
								'icon' => 'text-quote',
							),
						),
					),
					'timeline_post_date_styling'    => array(
						'title'    => esc_html__( 'Post Date', 'divi-plus' ),
						'priority' => 5,
					),
					'timeline_post_meta_styling'    => array(
						'title'    => esc_html__( 'Post Meta', 'divi-plus' ),
						'priority' => 6,
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'                        => array(
				'timeline_post_title'   => array(
					'label'          => esc_html__( 'Title', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '22px',
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
						'default' => 'h3',
					),
					'css'            => array(
						'main' => '%%order_class%% .dipl_blog_timeline_post_title, %%order_class%% .dipl_blog_timeline_post_title a',
					),
					'toggle_slug'    => 'timeline_heading_styling',
				),
				'timeline_post_content' => array(
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
						'main' => '%%order_class%% .dipl_blog_timeline_post_content_inner, %%order_class%% .dipl_blog_timeline_post_content_inner p',
					),
					'toggle_slug'    => 'timeline_post_content_styling',
					'sub_toggle'     => 'p',
				),
				'timeline_post_link'    => array(
					'label'           => esc_html__( 'Link', 'divi-plus' ),
					'font_size'       => array(
						'default'        => '18px',
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
					'css'             => array(
						'main' => '%%order_class%% .dipl_blog_timeline_post_content_inner a',
					),
					'hide_text_align' => true,
					'toggle_slug'     => 'timeline_post_content_styling',
					'sub_toggle'      => 'a',
				),
				'timeline_post_ul'      => array(
					'label'           => esc_html__( 'Unordered List', 'divi-plus' ),
					'font_size'       => array(
						'default'        => '18px',
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
					'css'             => array(
						'main' => '%%order_class%% .dipl_blog_timeline_post_content_inner ul li',
					),
					'hide_text_align' => true,
					'toggle_slug'     => 'timeline_post_content_styling',
					'sub_toggle'      => 'ul',
				),
				'timeline_post_ol'      => array(
					'label'           => esc_html__( 'Ordered List', 'divi-plus' ),
					'font_size'       => array(
						'default'        => '18px',
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
					'css'             => array(
						'main' => '%%order_class%% .dipl_blog_timeline_post_content_inner ol li',
					),
					'hide_text_align' => true,
					'toggle_slug'     => 'timeline_post_content_styling',
					'sub_toggle'      => 'ol',
				),
				'timeline_post_quote'   => array(
					'label'           => esc_html__( 'Blockquote', 'divi-plus' ),
					'font_size'       => array(
						'default'        => '18px',
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
					'css'             => array(
						'main' => '%%order_class%% .dipl_blog_timeline_post_content_inner blockquote',
					),
					'hide_text_align' => true,
					'toggle_slug'     => 'timeline_post_content_styling',
					'sub_toggle'      => 'quote',
				),
				'timeline_post_date'    => array(
					'label'          => esc_html__( 'Date', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '20px',
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
						'main' => '%%order_class%% .dipl_blog_timeline_meta_date, %%order_class%% .dipl_blog_timeline_meta_date .published',
					),
					'toggle_slug'    => 'timeline_post_date_styling',
				),
				'timeline_post_meta'    => array(
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
						'main' => '%%order_class%% .dipl_blog_timeline_meta, %%order_class%% .dipl_blog_timeline_meta a, %%order_class%% .dipl_blog_timeline_meta_icon, %%order_class%% .dipl_blog_timeline_meta span, %%order_class%% .dipl_blog_timeline_meta p',
					),
					'toggle_slug'    => 'timeline_post_meta_styling',
				),
			),
			'box_shadow'                   => array(
				'single_post' => array(
					'label'       => esc_html__( 'Single Post', 'divi-plus' ),
					'css'         => array(
						'main' => '%%order_class%% .dipl_blog_timeline_content_wrapper',
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'box_shadow',
				),
				'default'     => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),
			),
			'margin_padding'               => array(
				'css' => array(
					'main'      => '%%order_class%%',
					'important' => 'all',
				),
			),
			'blog_timeline_margin_padding' => array(
				'blog_timeline' => array(
					'margin_padding' => array(
						'css' => array(
							'use_margin' => false,
							'main'       => '%%order_class%% .dipl_blog_timeline_post .dipl_blog_timeline_content_wrapper',
							'important'  => 'all',
						),
					),
				),
			),
			'button'                       => array(
				'read_more' => array(
					'label'           => esc_html__( 'Read More Button', 'divi-plus' ),
					'css'             => array(
						'main'      => '%%order_class%% .dipl_blog_timeline_read_more_link .et_pb_button',
						'alignment' => '%%order_class%% .dipl_blog_timeline_read_more_link',
					),
					'margin_padding'  => array(
						'css' => array(
							'margin'    => '%%order_class%% .dipl_blog_timeline_read_more_link',
							'padding'   => '%%order_class%% .dipl_blog_timeline_read_more_link .et_pb_button',
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
			'text'                         => false,
		);
	}

	public function get_fields() {

		$dipl_timeline_fields = array(
			'posts_number'                       => array(
				'label'            => esc_html__( 'Number of Posts', 'divi-plus' ),
				'type'             => 'text',
				'option_category'  => 'configuration',
				'default'          => '10',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Here you can define the value of number of posts you would like to display.', 'divi-plus' ),
				'computed_affects' => array(
					'__blog_timeline_data',
				),
			),
			'offset_number'                      => array(
				'label'            => esc_html__( 'Post Offset Number', 'divi-plus' ),
				'type'             => 'text',
				'option_category'  => 'configuration',
				'default'          => 0,
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Choose how many posts you would like to skip. These posts will not be shown in the feed.', 'divi-plus' ),
				'computed_affects' => array(
					'__blog_timeline_data',
				),
			),
			'post_order'                         => array(
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
					'__blog_timeline_data',
				),
			),
			'post_order_by'                      => array(
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
					'__blog_timeline_data',
				),
			),
			'include_categories'                 => array(
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
					'__blog_timeline_data',
				),
			),
			'ignore_sticky_posts'                => array(
				'label'            => esc_html__( 'Ignore Sticky Posts', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'default'          => 'off',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'This will decide whether to ingnore sticky posts or not.', 'divi-plus' ),
				'computed_affects' => array(
					'__blog_timeline_data',
				),
			),
			'post_date'                          => array(
				'label'            => esc_html__( 'Post Date Format', 'divi-plus' ),
				'type'             => 'text',
				'option_category'  => 'configuration',
				'default'          => 'M j, Y',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'If you would like to adjust the date format, input the appropriate PHP date format here.', 'divi-plus' ),
				'computed_affects' => array(
					'__blog_timeline_data',
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
			'show_thumbnail'                     => array(
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
					'__blog_timeline_data',
				),
			),
			'featured_image_size'                => array(
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
					'__blog_timeline_data',
				),
			),
			'show_content'                       => array(
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
					'__blog_timeline_data',
				),
			),
			'excerpt_length'                     => array(
				'label'            => esc_html__( 'Excerpt Length', 'divi-plus' ),
				'type'             => 'text',
				'option_category'  => 'configuration',
				'show_if'          => array(
					'show_content' => 'off',
				),
				'default'          => 270,
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Here you can define excerpt length in characters, if 0 no excerpt will be shown. However this won\'t work with the manual excerpt defined in the post.', 'divi-plus' ),
				'computed_affects' => array(
					'__blog_timeline_data',
				),
			),
			'show_author'                        => array(
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
					'__blog_timeline_data',
				),
			),
			'show_date'                          => array(
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
					'__blog_timeline_data',
				),
			),
			'show_categories'                    => array(
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
					'__blog_timeline_data',
				),
			),
			'show_comments'                      => array(
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
					'__blog_timeline_data',
				),
			),
			'show_read_more'                     => array(
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
					'__blog_timeline_data',
				),
			),
			'read_more_text'                     => array(
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
					'__blog_timeline_data',
				),
			),
			'blog_timeline_layout'               => array(
				'label'            => esc_html__( 'Select Layout', 'divi-plus' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'layout1' => esc_html__( 'Layout 1', 'divi-plus' ),
					'layout2' => esc_html__( 'Layout 2', 'divi-plus' ),
				),
				'default'          => 'layout1',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'timeline_layout',
				'description'      => esc_html__( 'Here you can choose the layout for the timeline.', 'divi-plus' ),
				'computed_affects' => array(
					'__blog_timeline_data',
				),
			),
			'select_blog_timeline_layout_option' => array(
				'label'            => esc_html__( 'Select Option', 'divi-plus' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'dipl_blog_timeline_alternate' => esc_html__( 'Alternate', 'divi-plus' ),
					'dipl_blog_timeline_right'     => esc_html__( 'Content Right', 'divi-plus' ),
					'dipl_blog_timeline_left'      => esc_html__( 'Content Left', 'divi-plus' ),
				),
				'default'          => 'dipl_blog_timeline_alternate',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'timeline_layout',
				'description'      => esc_html__( 'Here you can choose the placement style of the timeline content.', 'divi-plus' ),
				'computed_affects' => array(
					'__blog_timeline_data',
				),
			),
			'select_timeline_icon'               => array(
				'label'            => esc_html__( 'Select Icon', 'divi-plus' ),
				'type'             => 'select_icon',
				'option_category'  => 'basic_option',
				'class'            => array(
					'et-pb-font-icon',
				),
				'default'          => ET_BUILDER_PRODUCT_VERSION < '4.13.0' ? '%%22%%' : '&#x37;||divi||400',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'timeline_icon_styling',
				'description'      => esc_html__( 'Here you can choose a custom icon for the timeline.', 'divi-plus' ),
				'computed_affects' => array(
					'__blog_timeline_data',
				),
			),
			'timeline_icon_color'                => array(
				'label'       => esc_html__( 'Icon Color', 'divi-plus' ),
				'type'        => 'color-alpha',
				'default'     => '#000',
				'hover'       => 'tabs',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'timeline_icon_styling',
				'description' => esc_html__( 'Here you can choose a custom color to be used for the timeline icon when not scrolled.', 'divi-plus' ),
			),
			'timeline_icon_fill_color'           => array(
				'label'       => esc_html__( 'Icon Fill Color(On Scroll)', 'divi-plus' ),
				'type'        => 'color-alpha',
				'default'     => '#ccc',
				'hover'       => 'tabs',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'timeline_icon_styling',
				'description' => esc_html__( 'Here you can choose a custom color to be used for the timeline icon after scrolled', 'divi-plus' ),
			),
			'timeline_icon_font_size'            => array(
				'label'           => esc_html__( 'Icon Font Size', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '120',
					'step' => '1',
				),
				'mobile_options'  => true,
				'default'         => '32px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'timeline_icon_styling',
				'description'     => esc_html__( 'Here you can increase or decrease the size of the timeline icon by moving the slider or entering the value.', 'divi-plus' ),
			),
			'icon_shape'                         => array(
				'label'           => esc_html__( 'Icon Shape', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'none'       => esc_html__( 'None', 'divi-plus' ),
					'use_square' => esc_html__( 'Square', 'divi-plus' ),
					'use_circle' => esc_html__( 'Circle', 'divi-plus' ),
				),
				'default'         => 'none',
				'mobile_options'  => false,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'timeline_icon_styling',
				'description'     => esc_html__( 'Here you can choose the shape to be used for the timeline icon.', 'divi-plus' ),
			),
			'icon_shape_color'                   => array(
				'label'        => esc_html__( 'Icon Shape Background', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if_not'  => array(
					'icon_shape' => 'none',
				),
				'default'      => '#eee',
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'timeline_icon_styling',
				'description'  => esc_html__( 'Here you can select a custom color to be used for the icon shape background when not scrolled.', 'divi-plus' ),
			),
			'icon_shape_fill_color'              => array(
				'label'        => esc_html__( 'Icon Shape Background Fill Color(On Scroll)', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if_not'  => array(
					'icon_shape' => 'none',
				),
				'default'      => '#000',
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'timeline_icon_styling',
				'description'  => esc_html__( 'Here you can select a custom color to be used for the icon shape background after scrolled.', 'divi-plus' ),
			),
			'icon_use_shape_border'              => array(
				'label'           => esc_html__( 'Icon Shape Border', 'divi-plus' ),
				'type'            => 'yes_no_button',
				'option_category' => 'layout',
				'options'         => array(
					'off' => esc_html__( 'No', 'divi-plus' ),
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
				),
				'show_if_not'     => array(
					'icon_shape' => 'none',
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'timeline_icon_styling',
				'sub_toggle'      => 'timeline_item_icon',
				'description'     => esc_html__( 'Here you can choose whether or not to use border on the icon shape.', 'divi-plus' ),
			),
			'icon_shape_border_color'            => array(
				'label'        => esc_html__( 'Icon Shape Border Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if_not'  => array(
					'icon_shape' => 'none',
				),
				'show_if'      => array(
					'icon_use_shape_border' => 'on',
				),
				'default'      => '#eee',
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'timeline_icon_styling',
				'description'  => esc_html__( 'Here you can choose a custom color to be used for the icon shape border when not scrolled.', 'divi-plus' ),
			),
			'icon_shape_border_fill_color'       => array(
				'label'        => esc_html__( 'Icon Shape Border Fill Color(On Scroll)', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'show_if_not'  => array(
					'icon_shape' => 'none',
				),
				'show_if'      => array(
					'icon_use_shape_border' => 'on',
				),
				'default'      => '#000',
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'timeline_icon_styling',
				'description'  => esc_html__( 'Here you can choose a custom color to be used for the icon shape border after scrolled.', 'divi-plus' ),
			),
			'icon_shape_border_size'             => array(
				'label'           => esc_html__( 'Icon Shape Border Size', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
				'show_if_not'     => array(
					'icon_shape' => 'none',
				),
				'show_if'         => array(
					'icon_use_shape_border' => 'on',
				),
				'mobile_options'  => false,
				'default'         => '2px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'timeline_icon_styling',
				'description'     => esc_html__( 'Here you can increase or decrease the size of the timeline icon shape border by moving the slider or entering the value.', 'divi-plus' ),
			),
			'timeline_bar_size'                  => array(
				'label'           => esc_html__( 'Timeline Stem Width', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '10',
					'step' => '1',
				),
				'mobile_options'  => false,
				'default'         => '2px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'timeline_bar_styling',
				'description'     => esc_html__( 'Here you can increase or decrease the thickness of the timeline stem by moving the slider or entering the value.', 'divi-plus' ),
			),
			'timeline_bar_color'                 => array(
				'label'       => esc_html__( 'Stem Color', 'divi-plus' ),
				'type'        => 'color-alpha',
				'default'     => '#eee',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'timeline_bar_styling',
				'description' => esc_html__( 'Here you can choose a custom color to be used for the timiline stem when not scrolled.', 'divi-plus' ),
			),
			'timeline_bar_fill_color'            => array(
				'label'       => esc_html__( 'Stem Fill Color(On Scroll)', 'divi-plus' ),
				'type'        => 'color-alpha',
				'default'     => '#000',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'timeline_bar_styling',
				'description' => esc_html__( 'Here you can choose a custom color to be used for the timiline stem after scrolled.', 'divi-plus' ),
			),
			'timeline_post_border_radius'        => array(
				'label'           => esc_html__( 'Border Radius', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '120',
					'step' => '1',
				),
				'mobile_options'  => true,
				'default'         => '0px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'timeline_post_styling',
				'description'     => esc_html__( 'Here you can set the post content border radius by moving the slider or entering the value.', 'divi-plus' ),
			),
			'timeline_post_image_size'           => array(
				'label'           => esc_html__( 'Featured Image Size', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
				'mobile_options'  => true,
				'default'         => '100%',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'timeline_post_styling',
				'description'     => esc_html__( 'Here you can increase or decrease the size of the featured by moving the slider or entering the value.', 'divi-plus' ),
			),
			'timeline_post_image_alignment'      => array(
				'label'           => esc_html__( 'Featured Image Alignment', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'center'     => esc_html__( 'Center', 'divi-plus' ),
					'flex-start' => esc_html__( 'Left', 'divi-plus' ),
					'flex-end'   => esc_html__( 'Right', 'divi-plus' ),
				),
				'default'         => 'center',
				'mobile_options'  => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'timeline_post_styling',
				'description'     => esc_html__( 'Here you can choose the alignment of the featured image.', 'divi-plus' ),
			),
			'blog_timeline_custom_padding'       => array(
				'label'            => esc_html__( 'Timeline Padding', 'divi-plus' ),
				'type'             => 'custom_padding',
				'option_category'  => 'layout',
				'mobile_options'   => true,
				'default'          => '20px|20px|20px|20px|true|true',
				'default_on_front' => '20px|20px|20px|20px|true|true',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'timeline_post_styling',
				'description'      => esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'divi-plus' ),
			),
			'timeline_background_color'          => array(
				'label'             => esc_html__( 'Timeline Background', 'divi-plus' ),
				'type'              => 'background-field',
				'base_name'         => 'timeline_background',
				'context'           => 'timeline_background_color',
				'option_category'   => 'button',
				'custom_color'      => true,
				'background_fields' => $this->generate_background_options( 'timeline_background', 'button', 'advanced', 'timeline_post_styling', 'timeline_background_color' ),
				'mobile_options'    => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'timeline_post_styling',
				'description'       => esc_html__( 'Customize the background style of the post content by adjusting the background color, gradient, and image.', 'divi-plus' ),
			),
			'__blog_timeline_data'               => array(
				'type'                => 'computed',
				'computed_callback'   => array( 'DIPL_Blog_Timeline', 'get_timeline_blog_posts' ),
				'computed_depends_on' => array(
					'blog_timeline_layout',
					'select_blog_timeline_layout_option',
					'select_timeline_icon',
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
		);

		$dipl_timeline_fields = array_merge( $dipl_timeline_fields, $this->generate_background_options( 'timeline_background', 'skip', 'advanced', 'timeline_post_styling', 'timeline_background_color' ) );

		return $dipl_timeline_fields;
	}

	public static function get_timeline_blog_posts( $attrs = array(), $conditional_tags = array(), $current_page = array() ) {
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
			'blog_timeline_layout'               => 'layout1',
			'select_blog_timeline_layout_option' => 'dipl_blog_timeline_alternate',
			'select_timeline_icon'               => '',
			'posts_number'                       => '10',
			'offset_number'                      => '0',
			'post_date'                          => 'M j, Y',
			'post_order'                         => 'DESC',
			'post_order_by'                      => 'date',
			'include_categories'                 => '',
			'ignore_sticky_posts'                => 'off',
			'show_thumbnail'                     => 'on',
			'featured_image_size'                => 'large',
			'show_content'                       => 'off',
			'excerpt_length'                     => '',
			'show_read_more'                     => 'on',
			'read_more_text'                     => 'Read More',
			'show_author'                        => 'on',
			'show_date'                          => 'on',
			'show_categories'                    => 'on',
			'show_comments'                      => 'on',
			'custom_read_more'                   => 'off',
			'read_more_icon'                     => '',
			'timeline_post_title_level'          => 'h3',
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

		$timeline_post_title = et_pb_process_header_level( $timeline_post_title_level, 'h3' );
		$timeline_post_title = esc_html( $timeline_post_title );

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
		$output       = '';

		if ( $query->have_posts() ) {

			$output = sprintf(
				'<div class="dipl_blog_timeline_wrapper %1$s %2$s">',
				'' !== $blog_timeline_layout ? $blog_timeline_layout : 'layout1',
				'' !== $select_blog_timeline_layout_option ? $select_blog_timeline_layout_option : 'dipl_blog_timeline_alternate'
			);

			while ( $query->have_posts() ) {
				$query->the_post();

				$post_id = intval( get_the_ID() );

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

				$timeline_icon = '' !== $select_timeline_icon ? et_pb_process_font_icon( $select_timeline_icon ) : '';

				$thumb          = '';
				$thumb          = dipl_get_post_thumbnail( $post_id, esc_html( $featured_image_size ), 'dipl_blog_timeline_post_image' );
				$no_thumb_class = ( '' === $thumb || 'off' === $show_thumbnail ) ? ' dipl_blog_timeline_no_thumb' : '';
				$post_classes   = array_map( 'sanitize_html_class', get_post_class( 'dipl_blog_timeline_post' . $no_thumb_class ) );
				$post_classes   = implode( ' ', $post_classes );

				if ( file_exists( plugin_dir_path( __FILE__ ) . 'layouts/' . sanitize_file_name( $blog_timeline_layout ) . '.php' ) ) {
					include plugin_dir_path( __FILE__ ) . 'layouts/' . sanitize_file_name( $blog_timeline_layout ) . '.php';
				}
			}
			$output .= sprintf(
				'<div class="dipl_stem_wrapper %1$s_stem">
									<div class="dipl_blog_stem"></div>
								</div>',
				'' !== $select_blog_timeline_layout_option ? $select_blog_timeline_layout_option : 'dipl_blog_timeline_alternate'
			);
			$output .= '</div>';

			array_push( $output_array, $output );
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

		$posts_number                       = esc_attr( $this->props['posts_number'] );
		$offset_number                      = esc_attr( $this->props['offset_number'] );
		$post_order                         = esc_attr( $this->props['post_order'] );
		$post_order_by                      = esc_attr( $this->props['post_order_by'] );
		$include_categories                 = esc_attr( $this->props['include_categories'] );
		$post_date                          = esc_attr( $this->props['post_date'] );
		$ignore_sticky_posts                = esc_attr( $this->props['ignore_sticky_posts'] );
		$no_result_text						= esc_attr( $this->props['no_result_text'] );
		$show_thumbnail                     = esc_attr( $this->props['show_thumbnail'] );
		$featured_image_size                = esc_attr( $this->props['featured_image_size'] );
		$show_content                       = esc_attr( $this->props['show_content'] );
		$excerpt_length                     = esc_attr( $this->props['excerpt_length'] );
		$show_author                        = esc_attr( $this->props['show_author'] );
		$show_date                          = esc_attr( $this->props['show_date'] );
		$show_categories                    = esc_attr( $this->props['show_categories'] );
		$show_comments                      = esc_attr( $this->props['show_comments'] );
		$show_read_more                     = esc_attr( $this->props['show_read_more'] );
		$read_more_text                     = esc_attr( $this->props['read_more_text'] );
		$read_more_icon 					= esc_attr( $this->props['read_more_icon'] );
		$custom_read_more 					= esc_attr( $this->props['custom_read_more'] );
		$blog_timeline_layout               = esc_attr( $this->props['blog_timeline_layout'] );
		$select_blog_timeline_layout_option = esc_attr( $this->props['select_blog_timeline_layout_option'] );
		$select_timeline_icon               = esc_attr( $this->props['select_timeline_icon'] );
		$timeline_icon_color                = esc_attr( $this->props['timeline_icon_color'] );
		$timeline_icon_fill_color           = esc_attr( $this->props['timeline_icon_fill_color'] );
		$timeline_icon_font_size            = et_pb_responsive_options()->get_property_values( $this->props, 'timeline_icon_font_size' );
		$icon_shape                         = esc_attr( $this->props['icon_shape'] );
		$icon_shape_color                   = esc_attr( $this->props['icon_shape_color'] );
		$icon_shape_fill_color              = esc_attr( $this->props['icon_shape_fill_color'] );
		$icon_use_shape_border              = esc_attr( $this->props['icon_use_shape_border'] );
		$icon_shape_border_color            = esc_attr( $this->props['icon_shape_border_color'] );
		$icon_shape_border_fill_color       = esc_attr( $this->props['icon_shape_border_fill_color'] );
		$icon_shape_border_size             = esc_attr( $this->props['icon_shape_border_size'] );
		$timeline_bar_size                  = esc_attr( $this->props['timeline_bar_size'] );
		$timeline_bar_color                 = esc_attr( $this->props['timeline_bar_color'] );
		$timeline_bar_fill_color            = esc_attr( $this->props['timeline_bar_fill_color'] );
		$timeline_post_title_level          = esc_attr( $this->props['timeline_post_title_level'] );
		$timeline_post_border_radius        = et_pb_responsive_options()->get_property_values( $this->props, 'timeline_post_border_radius' );
		$timeline_post_image_size           = et_pb_responsive_options()->get_property_values( $this->props, 'timeline_post_image_size' );
		$timeline_post_image_alignment      = et_pb_responsive_options()->get_property_values( $this->props, 'timeline_post_image_alignment' );
		$timeline_post_title                = et_pb_process_header_level( esc_attr( $timeline_post_title_level ), 'h3' );
		$timeline_meta_alignment            = et_pb_responsive_options()->get_property_values( $this->props, 'timeline_post_meta_text_align' );
		foreach ( $timeline_meta_alignment as &$align ) {
			$align = str_replace( array( 'left', 'right', 'justify' ), array( 'flex-start', 'flex-end', 'flex-start' ), $align );
		}
		if ( ! empty( array_filter( $timeline_meta_alignment ) ) ) {
			et_pb_responsive_options()->generate_responsive_css( $timeline_meta_alignment, '%%order_class%% .dipl_blog_timeline_meta', 'justify-content', $render_slug, '', 'type' );
		}

		wp_enqueue_script( 'dipl-blog-timeline-custom', PLUGIN_PATH . 'includes/modules/BlogTimeline/dipl-blog-timeline-custom.min.js', array( 'jquery' ), '1.0.0', true );
		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-blog-timeline-style', PLUGIN_PATH . 'includes/modules/BlogTimeline/' . $file . '.min.css', array(), '1.0.0' );

		if ( ! empty( array_filter( $timeline_icon_font_size ) ) ) {
			$this->generate_styles(
				array(
					'base_attr_name' => 'timeline_icon_font_size',
					'selector'       => '%%order_class%% .dipl_blog_timeline_post_icon.et-pb-icon',
					'css_property'   => 'font-size',
					'render_slug'    => $render_slug,
					'type'           => 'font-size',
				)
			);
			et_pb_responsive_options()->generate_responsive_css( $timeline_icon_font_size, '%%order_class%% .dipl_blog_timeline_post_icon', 'font-size', $render_slug, '', 'type' );

			$icon_shape_border_size = ( '' !== $icon_shape_border_size ) ? intval( $icon_shape_border_size ) : 0;

			$timeline_icon_font_size['tablet'] = ( '' !== $timeline_icon_font_size['tablet'] ) ? $timeline_icon_font_size['tablet'] : $timeline_icon_font_size['desktop'];
			$timeline_icon_font_size['phone']  = ( '' !== $timeline_icon_font_size['phone'] ) ? $timeline_icon_font_size['phone'] : $timeline_icon_font_size['desktop'];

			if ( 'none' === $icon_shape ) {
				$circle_icon_desktop = intval( $timeline_icon_font_size['desktop'] ) . 'px';
				$circle_icon_tablet  = intval( $timeline_icon_font_size['tablet'] ) . 'px';
				$circle_icon_phone   = intval( $timeline_icon_font_size['phone'] ) . 'px';
			} else {
				if ( 'on' === $icon_use_shape_border ) {
					$circle_icon_desktop = ( intval( $timeline_icon_font_size['desktop'] ) + ( 2 * intval( $icon_shape_border_size ) ) + 20 ) . 'px';
					$circle_icon_tablet  = ( intval( $timeline_icon_font_size['tablet'] ) + ( 2 * intval( $icon_shape_border_size ) ) + 20 ) . 'px';
					$circle_icon_phone   = ( intval( $timeline_icon_font_size['phone'] ) + ( 2 * intval( $icon_shape_border_size ) ) + 20 ) . 'px';
				} else {
					$circle_icon_desktop = ( intval( $timeline_icon_font_size['desktop'] ) + 20 ) . 'px';
					$circle_icon_tablet  = ( intval( $timeline_icon_font_size['tablet'] ) + 20 ) . 'px';
					$circle_icon_phone   = ( intval( $timeline_icon_font_size['phone'] ) + 20 ) . 'px';
				}
			}

			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_blog_timeline_stem_center',
					'declaration' => sprintf( 'width: %1$s;', esc_html( $circle_icon_desktop ) ),
				)
			);
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_blog_timeline_stem_center',
					'declaration' => sprintf( 'width: %1$s;', esc_html( $circle_icon_tablet ) ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_blog_timeline_stem_center',
					'declaration' => sprintf( 'width: %1$s;', esc_html( $circle_icon_phone ) ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_blog_timeline_stem_center',
					'declaration' => sprintf( 'height: %1$s;', esc_html( $circle_icon_desktop ) ),
				)
			);
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_blog_timeline_stem_center',
					'declaration' => sprintf( 'height: %1$s;', esc_html( $circle_icon_tablet ) ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_blog_timeline_stem_center',
					'declaration' => sprintf( 'height: %1$s;', esc_html( $circle_icon_phone ) ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			if ( 'dipl_blog_timeline_alternate' === $select_blog_timeline_layout_option ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_blog_timeline_alternate .dipl_stem_wrapper',
						'declaration' => sprintf( 'left: %1$spx;', esc_html( floatval( $circle_icon_phone ) / 2 ) ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
			if ( 'dipl_blog_timeline_right' === $select_blog_timeline_layout_option && 'layout1' === $blog_timeline_layout ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_blog_timeline_right .dipl_stem_wrapper',
						'declaration' => sprintf( 'left: %1$spx;', esc_html( floatval( $circle_icon_desktop ) / 2 ) ),
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_blog_timeline_right .dipl_stem_wrapper',
						'declaration' => sprintf( 'left: %1$spx;', esc_html( floatval( $circle_icon_tablet ) / 2 ) ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_blog_timeline_right .dipl_stem_wrapper',
						'declaration' => sprintf( 'left: %1$spx;', esc_html( floatval( $circle_icon_phone ) / 2 ) ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
			if ( 'dipl_blog_timeline_left' === $select_blog_timeline_layout_option && 'layout1' === $blog_timeline_layout ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_blog_timeline_left .dipl_stem_wrapper',
						'declaration' => sprintf( 'right: %1$spx;', esc_html( floatval( $circle_icon_desktop ) / 2 ) ),
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_blog_timeline_left .dipl_stem_wrapper',
						'declaration' => sprintf( 'right: %1$spx;', esc_html( floatval( $circle_icon_tablet ) / 2 ) ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_blog_timeline_left .dipl_stem_wrapper',
						'declaration' => sprintf( 'right: %1$spx;', esc_html( floatval( $circle_icon_phone ) / 2 ) ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
		}

		if ( class_exists( 'ET_Builder_Module_Helper_Style_Processor' ) && method_exists( 'ET_Builder_Module_Helper_Style_Processor', 'process_extended_icon' ) ) {
			$this->generate_styles(
				array(
					'utility_arg'    => 'icon_font_family',
					'render_slug'    => $render_slug,
					'base_attr_name' => 'select_timeline_icon',
					'important'      => true,
					'selector'       => '%%order_class%% .dipl_blog_timeline_post_icon.et-pb-icon',
					'processor'      => array(
						'ET_Builder_Module_Helper_Style_Processor',
						'process_extended_icon',
					),
				)
			);
		}

		// Icon Color
		if ( '' !== $timeline_icon_color ) {
			$this->generate_styles(
				array(
					'base_attr_name' => 'timeline_icon_color',
					'selector'       => '%%order_class%% .dipl_blog_timeline_post_icon',
					'hover_selector' => '%%order_class%%:hover .dipl_blog_timeline_post_icon',
					'css_property'   => 'color',
					'render_slug'    => $render_slug,
					'type'           => 'color',
				)
			);
		}

		// Icon Fill Color
		if ( '' !== $timeline_icon_fill_color ) {
			$this->generate_styles(
				array(
					'base_attr_name' => 'timeline_icon_fill_color',
					'selector'       => '%%order_class%% .dipl_blog_timeline_post_icon.dipl_icon_fill',
					'hover_selector' => '%%order_class%%:hover .dipl_blog_timeline_post_icon.dipl_icon_fill',
					'css_property'   => 'color',
					'render_slug'    => $render_slug,
					'type'           => 'color',
				)
			);
		}

		if ( 'none' !== $icon_shape ) {
			if ( 'use_circle' === $icon_shape ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_blog_timeline_post_icon',
						'declaration' => 'border-radius: 50%;',
					)
				);
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_blog_timeline_post_icon',
						'declaration' => 'padding: 10px;',
					)
				);
			} else {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_blog_timeline_post_icon',
						'declaration' => 'border-radius: 0;',
					)
				);
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_blog_timeline_post_icon',
						'declaration' => 'padding: 10px;',
					)
				);
			}

			if ( '' !== $icon_shape_color ) {
				$this->generate_styles(
					array(
						'base_attr_name' => 'icon_shape_color',
						'selector'       => '%%order_class%% .dipl_blog_timeline_post_icon',
						'hover_selector' => '%%order_class%%:hover .dipl_blog_timeline_post_icon',
						'css_property'   => 'background-color',
						'render_slug'    => $render_slug,
						'type'           => 'color',
					)
				);
			}
			if ( '' !== $icon_shape_fill_color ) {
				$this->generate_styles(
					array(
						'base_attr_name' => 'icon_shape_fill_color',
						'selector'       => '%%order_class%% .dipl_blog_timeline_post_icon.dipl_icon_fill',
						'hover_selector' => '%%order_class%%:hover .dipl_blog_timeline_post_icon.dipl_icon_fill',
						'css_property'   => 'background-color',
						'render_slug'    => $render_slug,
						'type'           => 'color',
					)
				);
			}
			if ( 'on' === $icon_use_shape_border ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_blog_timeline_post_icon',
						'declaration' => 'border-style: solid;',
					)
				);
				if ( '' !== $icon_shape_border_color ) {
					$this->generate_styles(
						array(
							'base_attr_name' => 'icon_shape_border_color',
							'selector'       => '%%order_class%% .dipl_blog_timeline_post_icon',
							'hover_selector' => '%%order_class%%:hover .dipl_blog_timeline_post_icon',
							'css_property'   => 'border-color',
							'render_slug'    => $render_slug,
							'type'           => 'color',
						)
					);
				}

				if ( '' !== $icon_shape_border_fill_color ) {
					$this->generate_styles(
						array(
							'base_attr_name' => 'icon_shape_border_fill_color',
							'selector'       => '%%order_class%% .dipl_blog_timeline_post_icon.dipl_icon_fill',
							'hover_selector' => '%%order_class%%:hover .dipl_blog_timeline_post_icon.dipl_icon_fill',
							'css_property'   => 'border-color',
							'render_slug'    => $render_slug,
							'type'           => 'color',
						)
					);
				}

				if ( '' !== $icon_shape_border_size ) {
					self::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dipl_blog_timeline_post_icon',
							'declaration' => sprintf( 'border-width: %1$spx;', esc_html( $icon_shape_border_size ) ),
						)
					);
				}
			}
		}

		if ( '' !== $timeline_bar_size ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_stem_wrapper',
					'declaration' => sprintf( 'width: %1$s;', esc_html( $timeline_bar_size ) ),
				)
			);

			if ( '' !== $timeline_bar_color ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_stem_wrapper',
						'declaration' => sprintf( 'background: %1$s;', esc_html( $timeline_bar_color ) ),
					)
				);
			}

			if ( '' !== $timeline_bar_fill_color ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_blog_stem',
						'declaration' => sprintf( 'background: %1$s;', esc_html( $timeline_bar_fill_color ) ),
					)
				);
			}
		}

		if ( '0px' !== $timeline_post_border_radius && ! empty( array_filter( $timeline_post_border_radius ) ) ) {
			$this->generate_styles(
				array(
					'base_attr_name' => 'timeline_post_border_radius',
					'selector'       => '%%order_class%% .dipl_blog_timeline_content_wrapper',
					'hover_selector' => '%%order_class%%:hover .dipl_blog_timeline_content_wrapper',
					'css_property'   => 'border-radius',
					'render_slug'    => $render_slug,
					'type'           => 'range',
				)
			);
		}

		if ( ! empty( array_filter( $timeline_post_image_size ) ) ) {
			$this->generate_styles(
				array(
					'base_attr_name' => 'timeline_post_image_size',
					'selector'       => '%%order_class%% .dipl_blog_timeline_image_wrapper .dipl_blog_timeline_image_link',
					'hover_selector' => '%%order_class%%:hover .dipl_blog_timeline_image_wrapper .dipl_blog_timeline_image_link',
					'css_property'   => 'width',
					'render_slug'    => $render_slug,
					'type'           => 'range',
				)
			);
		}

		if ( ! empty( array_filter( $timeline_post_image_alignment ) ) ) {
			$this->generate_styles(
				array(
					'base_attr_name' => 'timeline_post_image_alignment',
					'selector'       => '%%order_class%% .dipl_blog_timeline_image_wrapper',
					'hover_selector' => '%%order_class%%:hover .dipl_blog_timeline_image_wrapper',
					'css_property'   => 'justify-content',
					'render_slug'    => $render_slug,
					'type'           => 'select',
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

			$output = sprintf(
				'<div class="dipl_blog_timeline_wrapper %1$s %2$s">',
				'' !== $blog_timeline_layout ? $blog_timeline_layout : 'layout1',
				'' !== $select_blog_timeline_layout_option ? $select_blog_timeline_layout_option : 'dipl_blog_timeline_alternate'
			);

			while ( $query->have_posts() ) {
				$query->the_post();

				$post_id = intval( get_the_ID() );

				$read_more_button = $this->render_button(
					array(
						'button_text'         => et_core_esc_previously( $read_more_text ),
						'button_text_escaped' => true,
						'button_url'          => esc_url( get_permalink( $post_id ) ),
						'button_custom'       => isset( $custom_read_more ) ? et_core_esc_previously( $custom_read_more ) : 'off',
						'custom_icon'         => isset( $read_more_icon ) ? et_core_esc_previously( $read_more_icon ) : '',
						'has_wrapper'         => false,
					)
				);

				$timeline_icon = '' !== $select_timeline_icon ? et_pb_process_font_icon( $select_timeline_icon ) : '';

				$thumb          = '';
				$thumb          = dipl_get_post_thumbnail( $post_id, esc_html( $featured_image_size ), 'dipl_blog_timeline_post_image' );
				$no_thumb_class = ( '' === $thumb || 'off' === $show_thumbnail ) ? ' dipl_blog_timeline_no_thumb' : '';

				$post_classes = array_map( 'sanitize_html_class', get_post_class( 'dipl_blog_timeline_post' . $no_thumb_class ) );
				$post_classes = implode( ' ', $post_classes );

				if ( file_exists( plugin_dir_path( __FILE__ ) . 'layouts/' . sanitize_file_name( $blog_timeline_layout ) . '.php' ) ) {
					include plugin_dir_path( __FILE__ ) . 'layouts/' . sanitize_file_name( $blog_timeline_layout ) . '.php';
				}
			}
			$output .= sprintf(
				'<div class="dipl_stem_wrapper %1$s_stem">
									<div class="dipl_blog_stem"></div>
								</div>',
				'' !== $select_blog_timeline_layout_option ? $select_blog_timeline_layout_option : 'dipl_blog_timeline_alternate'
			);
			$output .= '</div>';
			wp_reset_postdata();
		} else {
			$output = '<div class="entry">' . esc_html( $no_result_text ) . '</div>';
		}

		$options = array( 'dipl_blog_timeline_content_wrapper' => 'timeline_background' );

		$this->process_advanced_css( $this, $render_slug, $this->margin_padding );
		$this->process_custom_background( $render_slug, $options );

		self::$rendering = false;

		return $output;
	}

	public function process_advanced_css( $module, $function_name, $margin_padding ) {
		$utils           = ET_Core_Data_Utils::instance();
		$all_values      = $module->props;
		$advanced_fields = $module->advanced_fields;
		if ( ! $module->has_vb_support() && ! $module->has_advanced_fields ) {
			return;
		}
		$allowed_advanced_fields = array( 'blog_timeline_margin_padding' );
		foreach ( $allowed_advanced_fields as $advanced_field ) {
			if ( ! empty( $advanced_fields[ $advanced_field ] ) ) {
				foreach ( $advanced_fields[ $advanced_field ] as $label => $form_field ) {
					$padding_key = "{$label}_custom_padding";
					if ( '' !== $utils->array_get( $all_values, $padding_key, '' ) ) {
						$settings                      = $utils->array_get( $form_field, 'margin_padding', array() );                // Ensure main selector exists.
						$form_field_margin_padding_css = $utils->array_get( $settings, 'css.main', '' );
						if ( empty( $form_field_margin_padding_css ) ) {
							$utils->array_set( $settings, 'css.main', $utils->array_get( $form_field, 'css.main', '' ) );
						}                        $margin_padding->update_styles( $module, $label, $settings, $function_name, $advanced_field );
					}
				}
			}
		}
	}

	public function process_custom_background( $function_name, $options ) {

		foreach ( $options as $element => $option_name ) {

			$css_element           = $this->main_css_element . " .{$element}";
			$css_element_processed = $css_element;

			// Place to store processed background. It will be compared with the smaller device
			// background processed value to avoid rendering the same styles.
			$processed_background_color  = '';
			$processed_background_image  = '';
			$gradient_properties_desktop = '';
			$processed_background_blend  = '';

			// Store background images status because the process is extensive.
			$background_image_status = array(
				'desktop' => false,
				'tablet'  => false,
				'phone'   => false,
			);

			$background_color_gradient_overlays_image_desktop = 'off';

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
				if ( ! $is_desktop && ! et_pb_responsive_options()->is_responsive_enabled( $this->props, $option_name ) ) {
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

					// Will be used as hover default.
					if ( 'desktop' === $device ) {
						$gradient_properties_desktop                      = $gradient_properties;
						$background_color_gradient_overlays_image_desktop = $background_color_gradient_overlays_image;
					}

					// Save background gradient into background images list.
					$background_images[] = $this->get_gradient( $gradient_properties );

					// Flag to inform BG Color if current module has Gradient.
					$has_background_color_gradient = true;
				} elseif ( 'off' === $use_background_color_gradient ) {
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
							$background_style                 .= 'background-color: initial; ';
						}

						$processed_background_blend = $background_blend;
					}

					// Only append background image when the image is exist.
					$background_images[] = sprintf( 'url(%1$s)', esc_html( $background_image ) );
				} elseif ( '' === $background_image ) {
					// Reset - If background image is disabled, ensure we reset prev background blend mode.
					if ( '' !== $processed_background_blend ) {
						$background_style          .= 'background-blend-mode: normal; ';
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
				} elseif ( ! $is_desktop && $is_background_color_gradient_disabled && $is_background_image_disabled ) {
					// Reset - If background image and gradient are disabled, reset current background image.
					$background_image_style = 'initial';
					$background_style      .= 'background-image: initial !important;';
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
						$current_media_query                   = 'tablet' === $device ? 'max_width_980' : 'max_width_767';
						$background_style_attrs['media_query'] = ET_Builder_Element::get_media_query( $current_media_query );
					}

					ET_Builder_Element::set_style( $function_name, $background_style_attrs );
				}
			}
		}
	}
}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
	$modules = explode( ',', $plugin_options['dipl-modules'] );
	if ( in_array( 'dipl_blog_timeline', $modules ) ) {
		new DIPL_Blog_Timeline();
	}
} else {
	new DIPL_Blog_Timeline();
}
