<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2022 Elicus Technologies Private Limited
 * @version     1.9.5
 */
class DIPL_TeamGrid extends ET_Builder_Module {

	public $slug       = 'dipl_team_grid';
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
		$this->name             = esc_html__( 'DP Team Grid', 'divi-plus' );
		$this->main_css_element = '%%order_class%%';
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'main_content' => array(
						'title' => esc_html__( 'Content', 'divi-plus' ),
					),
					'elements' => array(
						'title'    => esc_html__( 'Elements', 'divi-plus' ),
					),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'layout_settings' => array(
						'title'    => esc_html__( 'Layout', 'divi-plus' ),
					),
					'name_settings'         => array(
						'title'    => esc_html__( 'Name', 'divi-plus' ),
					),
					'designation_settings'     => array(
						'title'    => esc_html__( 'Designation', 'divi-plus' ),
					),
					'short_description_settings'  => array(
						'title'    => esc_html__( 'Short Description', 'divi-plus' ),
					),
					'social_icon_settings'       => array(
						'title'    => esc_html__( 'Social Icons', 'divi-plus' ),
					),
					'filter_cat_settings'  => array(
						'title'    => esc_html__( 'Filter Category', 'divi-plus' ),
						'sub_toggles' => array(
                            'normal' => array(
                                'name' => esc_html__( 'Normal', 'divi-plus' ),
                            ),
                            'active' => array(
                                'name' => esc_html__( 'Active', 'divi-plus' ),
                            ),                        
                        ),
                        'tabbed_subtoggles' => true,
					),
					'popup_text_settings'  => array(
						'title'    => esc_html__( 'Popup Text', 'divi-plus' ),
						'sub_toggles' => array(
                            'popup_name' => array(
                                'name' => esc_html__( 'Name', 'divi-plus' ),
                            ),
                            'popup_designation' => array(
                                'name' => esc_html__( 'Designation', 'divi-plus' ),
                            ),
                            'popup_description' => array(
                                'name' => esc_html__( 'Description', 'divi-plus' ),
                            ),
                            'popup_skill_text' => array(
                                'name' => esc_html__( 'Skill Text', 'divi-plus' ),
                            ),                          
                        ),
                        'tabbed_subtoggles' => true,
					),
					'popup_element_settings'       => array(
						'title'    => esc_html__( 'Popup Elements', 'divi-plus' ),
						'sub_toggles' => array(
							'popup' => array(
                                'name' => esc_html__( 'Popup', 'divi-plus' ),
                            ),
                            'skills_setting' => array(
                                'name' => esc_html__( 'Skill Bars', 'divi-plus' ),
                            ),
                            'social_setting' => array(
                                'name' => esc_html__( 'Social Icons', 'divi-plus' ),
                            ),
                        ),
                        'tabbed_subtoggles' => true,
					),
					'loader' => array(
						'title' => esc_html__( 'Loader', 'divi-plus' ),
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'                 => array(
				'name'         => array(
					'label'          => esc_html__( 'Name', 'divi-plus' ),
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
						'main'      => '%%order_class%% .dipl_team_member_name',
						'important' => 'all',
					),
					'header_level'   => array(
						'default' => 'h5',
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'name_settings',
				),
				'popup_name'         => array(
					'label'          => esc_html__( 'Popup Name', 'divi-plus' ),
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
						'main'      => '%%order_class%%_lightbox .dipl_team_member_name',
						'important' => 'all',
					),
					'header_level'   => array(
						'default' => 'h5',
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'popup_text_settings',
					'sub_toggle'	 => 'popup_name',
				),
				'designation' => array(
					'label'          => esc_html__( 'Designation', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '12px',
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
						'main'      => '%%order_class%% .dipl_team_member_designation',
						'important' => 'all',
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'designation_settings',
                    'depends_on'        => array( 'show_designation' ),
                    'depends_show_if'   => 'on',
				),
				'popup_designation' => array(
					'label'          => esc_html__( 'Popup Designation', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '12px',
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
						'main'      => '%%order_class%%_lightbox .dipl_team_member_designation',
						'important' => 'all',
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'popup_text_settings',
					'sub_toggle'	 => 'popup_designation',
				),
				'short_description' => array(
					'label'          => esc_html__( 'Short Description', 'divi-plus' ),
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
						'main'      => '%%order_class%% .dipl_team_member_short_desc, %%order_class%% .dipl_team_member_short_desc a',
						'important' => 'all',
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'short_description_settings',
                    'depends_on'        => array( 'show_short_desc' ),
                    'depends_show_if'   => 'on',
				),
				'popup_description' => array(
					'label'          => esc_html__( 'Description', 'divi-plus' ),
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
						'main'      => '%%order_class%%_lightbox .dipl_team_member_description, %%order_class%%_lightbox .dipl_team_member_description a',
						'important' => 'all',
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'popup_text_settings',
					'sub_toggle'	 => 'popup_description',
				),
				'popup_skill_text' => array(
					'label'          => esc_html__( 'Skill Text', 'divi-plus' ),
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
						'main'      => '%%order_class%%_lightbox .dipl_skill_bar_wrapper_inner .dipl_skill_name, %%order_class%%_lightbox .dipl_bar_counter_wrapper_inner .dipl_skill_name',
						'important' => 'all',
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'popup_text_settings',
					'sub_toggle'	 => 'popup_skill_text',
				),
                'category' => array(
                    'label'     => esc_html__( 'Category', 'divi-plus' ),
                    'font_size' => array(
                        'default'           => '16px',
                        'range_settings'    => array(
                            'min'   => '1',
                            'max'   => '100',
                            'step'  => '1',
                        ),
                        'validate_unit'     => true,
                    ),
                    'line_height' => array(
                        'default'           => '1.5em',
                        'range_settings'    => array(
                            'min'   => '0.1',
                            'max'   => '10',
                            'step'  => '0.1',
                        ),
                    ),
                    'letter_spacing' => array(
                        'default'           => '0px',
                        'range_settings'    => array(
                            'min'   => '0',
                            'max'   => '10',
                            'step'  => '1',
                        ),
                        'validate_unit' => true,
                    ),
                    'text_color' => array(
                    	'default' => '#fff',
                    ),
                    'hide_text_align'   => true,
                    'css'       => array(
                        'main'          => "%%order_class%% .dipl-team-items-categories li",
                        'color'         => "%%order_class%% .dipl-team-items-categories li",
                    ),
                    'toggle_slug'   => 'filter_cat_settings',
                    'sub_toggle'    => 'normal',
                    'tab_slug'      => 'advanced',
                    'depends_on'        => array( 'filterable_team' ),
                    'depends_show_if'   => 'on',
                ),
                'active_category' => array(
                    'label'     => esc_html__( 'Active Category', 'divi-plus' ),
                    'font_size' => array(
                        'default'           => '16px',
                        'range_settings'    => array(
                            'min'   => '1',
                            'max'   => '100',
                            'step'  => '1',
                        ),
                        'validate_unit'     => true,
                    ),
                    'line_height' => array(
                        'default'           => '1.5em',
                        'range_settings'    => array(
                            'min'   => '0.1',
                            'max'   => '10',
                            'step'  => '0.1',
                        ),
                    ),
                    'letter_spacing' => array(
                        'default'           => '0px',
                        'range_settings'    => array(
                            'min'   => '0',
                            'max'   => '10',
                            'step'  => '1',
                        ),
                        'validate_unit' => true,
                    ),
                    'text_color' => array(
                    	'default' => '#000',
                    ),
                    'hide_text_align'   => true,
                    'css'       => array(
                        'main'          => "%%order_class%% .dipl-team-items-categories li.dipl-team-active-category, %%order_class%% .dipl-team-mobile-active-category",
                        'color'         => "%%order_class%% .dipl-team-items-categories li.dipl-team-active-category, %%order_class%% .dipl-team-mobile-active-category",
                    ),
                    'depends_on'        => array( 'filterable_team' ),
                    'depends_show_if'   => 'on',
                    'toggle_slug'   => 'filter_cat_settings',
                    'sub_toggle'    => 'active',
                    'tab_slug'      => 'advanced',
                ),
                'loader_icon_text' => array(
					'label'          => esc_html__( 'Loader Icon', 'divi-plus' ),
					'font_size'      => array(
						'default'        => '36px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'text_color' => array(
						'default' => '#000',
					),
					'hide_font' => true,
					'hide_text_shadow' => true,
					'hide_text_align' => true,
					'hide_line_height' => true,
					'hide_letter_spacing' => true,
					'css' => array(
						'main'  => "{$this->main_css_element} .dipl_team_lightbox_loader:after",
					),
					'tab_slug'	=> 'advanced',
                    'toggle_slug' => 'loader',
				),
			),
			'grid_margin_padding' => array(
				'team_member_grid' => array(
					'margin_padding' => array(
						'css' => array(
							'use_margin' => false,
							'padding' => '%%order_class%% .dipl_team_grid_item',
							'important' => 'all',
						),
					),
				),
				'team_content' => array(
					'margin_padding' => array(
						'css' => array(
							'use_margin' => false,
							'padding' => '%%order_class%% .dipl_team_content_wrapper,
							%%order_class%% .dipl_team_overlay_wrapper',
							'important' => 'all',
						),
					),
				),				
				'popup' => array(
					'margin_padding' => array(
						'css' => array(
							'use_margin' => false,
							'padding' => '%%order_class%%_lightbox .dipl_team_member_wrapper_lightbox',
							'important' => 'all',
						),
					),
				),
			),
			'margin_padding' => array(
				'css' => array(
					'main'      => $this->main_css_element,
					'important' => 'all',
				),
			),
			'borders'               => array(
				'team_member_border' => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dipl_team_grid_item',
							'border_styles' => '%%order_class%% .dipl_team_grid_item',
							'important'     => 'all',
						),
					),
					'label_prefix' => esc_html__( 'Member', 'divi-plus' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'border',
				),
				'team_member_image_border' => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dipl_team_member_image',
							'border_styles' => '%%order_class%% .dipl_team_member_image',
							'important'     => 'all',
						),
					),
					'label_prefix' => esc_html__( 'Member Image', 'divi-plus' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'border',
				),
				'category_border' => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dipl-team-items-categories li',
							'border_styles' => '%%order_class%% .dipl-team-items-categories li',
							'important'     => 'all',
						),
					),
					'label_prefix' => esc_html__( 'Category', 'divi-plus' ),
                    'tab_slug'      => 'advanced',
                    'toggle_slug'   => 'filter_cat_settings',
                    'sub_toggle'    => 'normal',
                    'depends_on'        => array( 'filterable_team' ),
                    'depends_show_if'   => 'on',
				),
				'active_category_border' => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dipl-team-items-categories .dipl-team-active-category',
							'border_styles' => '%%order_class%% .dipl-team-items-categories .dipl-team-active-category',
							'important'     => 'all',
						),
					),
					'label_prefix' => esc_html__( 'Category', 'divi-plus' ),
                    'tab_slug'      => 'advanced',
                    'toggle_slug'   => 'filter_cat_settings',
                    'sub_toggle'    => 'active',
                    'depends_on'        => array( 'filterable_team' ),
                    'depends_show_if'   => 'on',
				),
                'bars_border' => array(
                    'label_prefix' => esc_html__( 'Bar', 'divi-plus' ),
                    'css'          => array(
                        'main' => array(
                            'border_radii'  => '%%order_class%%_lightbox .dipl_empty_bar',
                            'border_styles' => '%%order_class%%_lightbox .dipl_empty_bar',
                        ),
                    ),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'popup_element_settings',
					'sub_toggle'	  => 'skills_setting',
					'depends_on'        => array( 'bar_layout' ),
	                'depends_show_if'   => 'layout1',
                ),
				'skill_bars_border'  => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%%_lightbox .dipl_skill_bar_wrapper .dipl_bar_counter_chunks',
							'border_styles' => '%%order_class%%_lightbox .dipl_skill_bar_wrapper .dipl_bar_counter_chunks',
							'important'     => 'all',
						),
					),
					'label_prefix' => esc_html__( 'Skill Bar Chunks', 'divi-plus' ),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'popup_element_settings',
					'sub_toggle'	  => 'skills_setting',
					'depends_on'        => array( 'bar_layout' ),
	                'depends_show_if'   => 'layout2',
				),
				'team_member_icon_border'  => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dipl_team_member_social_icon',
							'border_styles' => '%%order_class%% .dipl_team_member_social_icon',
							'important'     => 'all',
						),
					),
					'label_prefix' => esc_html__( 'Social Icon', 'divi-plus' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'social_icon_settings',
					'depends_on'        => array( 'show_social_icon' ),
                    'depends_show_if'   => 'on',
				),
				'team_member_popup_icon_border'  => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%%_lightbox .dipl_team_member_social_icon',
							'border_styles' => '%%order_class%%_lightbox .dipl_team_member_social_icon',
							'important'     => 'all',
						),
					),
					'label_prefix' => esc_html__( 'Popup Social Icon', 'divi-plus' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'popup_element_settings',
				'sub_toggle'	  => 'social_setting',
				),
				'team_member_popup_border'  => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%%_lightbox .dipl_team_member_wrapper_lightbox',
							'border_styles' => '%%order_class%%_lightbox .dipl_team_member_wrapper_lightbox',
							'important'     => 'all',
						),
					),
					'label_prefix' => esc_html__( 'Popup Border', 'divi-plus' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'popup_element_settings',
					'sub_toggle'   => 'popup',
				),
				'default'                  => array(
					'css' => array(
						'main' => array(
							'border_radii'  => '%%order_class%%',
							'border_styles' => '%%order_class%%',
						),
					),
				),
			),
			'box_shadow'            => array(
				'team_member' => array(
					'label'       => esc_html__( 'Team Member', 'divi-plus' ),
					'css'         => array(
						'main' => '%%order_class%% .dipl_team_grid_item',
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'box_shadow',
				),
				'default'                  => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),
			),
			'text'           => false,
			'link_options'   => false,
		);
	}

	public function get_fields() {

		$fields = array(
			'posts_number' => array(
				'label'            => esc_html__( 'Number of Members', 'divi-plus' ),
				'type'             => 'text',
				'option_category'  => 'configuration',
				'default'          => '10',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Here you can define the value of number of members you would like to display.', 'divi-plus' ),
				'computed_affects' => array(
					'__team_grid_data',
				),
			),
			'post_order' => array(
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
				'description'      => esc_html__( 'Here you can choose in which order you want to display team members on the slider.', 'divi-plus' ),
				'computed_affects' => array(
					'__team_grid_data',
				),
			),
			'post_order_by' => array(
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
				'description'      => esc_html__( 'Here you can choose the order type of the members to be displayed on the slider.', 'divi-plus' ),
				'computed_affects' => array(
					'__team_grid_data',
				),
			),
			'include_categories' => array(
				'label'            => esc_html__( 'Select Categories', 'divi-plus' ),
				'type'             => 'categories',
				'option_category'  => 'basic_option',
				'renderer_options' => array(
					'use_terms'  => true,
					'term_name'  => 'dipl-team-member-category',
					'field_name' => 'el_include_team_member_category',
				),
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Here you can choose which category members you would like to display. If you want to display all members, then leave it unchecked.', 'divi-plus' ),
				'computed_affects' => array(
					'__team_grid_data',
				),
			),
			'no_result_text' => array(
				'label'            => esc_html__( 'No Result Text', 'divi-plus' ),
				'type'             => 'text',
				'option_category'  => 'configuration',
				'default'		   => esc_html__( 'The team members you requested could not be found. Try changing your module settings or create some new team members.', 'divi-plus' ),
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Here you can define custom no result text.', 'divi-plus' ),
			),
			'grid_overlay_bg_color' => array(
				'label'             => esc_html__( 'Grid Overlay Background', 'divi-plus' ),
				'type'              => 'background-field',
				'base_name'         => 'grid_overlay_bg',
				'context'           => 'grid_overlay_bg_color',
				'option_category'   => 'button',
				'custom_color'      => true,
				'background_fields' => $this->generate_background_options( 'grid_overlay_bg', 'button', 'general', 'background', 'grid_overlay_bg_color' ),
				'show_if'           => array(
					'select_layout' => array( 'layout1', 'layout2' ),
				),
				'default'			=> 'rgba(255,255,255,0.7)',
				'mobile_options'    => true,
				'tab_slug'          => 'general',
				'toggle_slug'       => 'background',
				'description'       => esc_html__( 'Customize the overlay background style of the individual grid by adjusting the background color, gradient, and image.', 'divi-plus' ),
			),
			'grid_bg_color' => array(
				'label'             => esc_html__( 'Grid Background', 'divi-plus' ),
				'type'              => 'background-field',
				'base_name'         => 'grid_bg',
				'context'           => 'grid_bg_color',
				'option_category'   => 'button',
				'custom_color'      => true,
				'background_fields' => $this->generate_background_options( 'grid_bg', 'button', 'general', 'background', 'grid_bg_color' ),
				'show_if'         => array(
					'select_layout' => array( 'layout2', 'layout3', 'layout4' ),
				),
				'mobile_options'    => true,
				'tab_slug'          => 'general',
				'toggle_slug'       => 'background',
				'description'       => esc_html__( 'Customize the overlay background style of the individual grid by adjusting the background color, gradient, and image.', 'divi-plus' ),
			),
            'filterable_team' => array(
                'label'             => esc_html__( 'Filterable Team', 'divi-plus' ),
                'type'              => 'yes_no_button',
                'option_category'   => 'configuration',
                'options'           => array(
                    'off' => esc_html__( 'Off', 'divi-plus' ),
                    'on'  => esc_html__( 'On', 'divi-plus' ),
                ),
                'default'           => 'off',
                'tab_slug'          => 'general',
                'toggle_slug'       => 'elements',
                'affects'           => array(
                    'category_font',
                    'category_font_size',
                    'category_line_height',
                    'category_letter_spacing',
                    'category_text_align',
                    'category_text_color',
                    'category_text_shadow',
                    'category_text_shadow_style',
                    'active_category_font',
                    'active_category_font_size',
                    'active_category_line_height',
                    'active_category_letter_spacing',
                    'active_category_text_align',
                    'active_category_text_color',
                    'active_category_text_shadow',
                    'active_category_text_shadow_style',
                ),
				'computed_affects' => array(
					'__team_grid_data',
				),
            ),
			'show_designation' => array(
				'label'            => esc_html__( 'Show Designation', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'affects'           => array(
                    'designation_font',
                    'designation_font_size',
                    'designation_line_height',
                    'designation_letter_spacing',
                    'designation_text_align',
                    'designation_text_color',
                    'designation_text_shadow',
                    'designation_text_shadow_style',
                ),
				'default'          => 'on',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'elements',
				'description'      => esc_html__( 'Here you can select whether or not to display the designation of the members.', 'divi-plus' ),
				'computed_affects' => array(
					'__team_grid_data',
				),
			),
			'show_short_desc' => array(
				'label'            => esc_html__( 'Show Short Description', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
				'affects'           => array(
                    'short_description_font',
                    'short_description_font_size',
                    'short_description_line_height',
                    'short_description_letter_spacing',
                    'short_description_text_align',
                    'short_description_text_color',
                    'short_description_text_shadow',
                    'short_description_text_shadow_style',
                ),
				'default'          => 'on',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'elements',
				'description'      => esc_html__( 'Here you can select whether or not to display the short description of the members.', 'divi-plus' ),
				'computed_affects' => array(
					'__team_grid_data',
				),
			),
			'show_social_icon' => array(
				'label'            => esc_html__( 'Show Social Icon', 'divi-plus' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'divi-plus' ),
					'off' => esc_html__( 'No', 'divi-plus' ),
				),
                'affects'           => array(
                    'border_radii_skill_bars_border',
                    'border_styles_skill_bars_border',
                    'border_width_all_skill_bars_border',
                    'border_color_all_skill_bars_border',
                    'border_style_all_skill_bars_border',
                ),
				'default'          => 'on',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'elements',
				'description'      => esc_html__( 'Here you can select whether or not to display social icons on the grid.', 'divi-plus' ),
				'computed_affects' => array(
					'__team_grid_data',
				),
			),
            'image_size' => array(
                'label'             => esc_html__( 'Image Size', 'divi-plus' ),
                'type'              => 'select',
                'option_category'   => 'configuration',
                'options'           => array(
                	'thumbnail' => esc_html__( 'Thumbnail', 'divi-plus' ),
                    'medium' 	=> esc_html__( 'Medium', 'divi-plus' ),
                    'large' 	=> esc_html__( 'Large', 'divi-plus' ),
                    'full' 		=> esc_html__( 'Full', 'divi-plus' ),
                ),
                'default'           => 'medium',
                'tab_slug'          => 'general',
                'toggle_slug'       => 'elements',
                'description'       => esc_html__( 'Here you can select the size of team image.', 'divi-plus' ),
                'computed_affects' 	=> array(
					'__team_grid_data',
				),
            ),
			'onclick_trigger' => array(
				'label'            => esc_html__( 'OnClick Trigger', 'divi-plus' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
					'do_nothing' => esc_html__( 'Do Nothing', 'divi-plus' ),
					'open_popup' => esc_html__( 'Open Popup', 'divi-plus' ),
					'open_link' => esc_html__( 'Open Link', 'divi-plus' ),
				),
				'default'          => 'do_nothing',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'elements',
				'description'      => esc_html__( 'Here you can select the onclick trigger event.', 'divi-plus' ),
				'computed_affects' => array(
					'__team_grid_data',
				),
			),
			'link_target' => array(
                'label'             => esc_html__( 'Member Link Target', 'divi-plus' ),
                'type'              => 'select',
                'option_category'   => 'configuration',
                'options'           => array(
                    'off' => esc_html__( 'In The Same Window', 'divi-plus' ),
                    'on'  => esc_html__( 'In The New Tab', 'divi-plus' ),
                ),
                'default'           => 'off',
				'show_if'         => array(
					'onclick_trigger' => 'open_link',
				),
                'tab_slug'          => 'general',
                'toggle_slug'       => 'elements',
                'description'       => esc_html__( 'Here you can choose whether or not the member opens the link in a new window.', 'divi-plus' ),
                'computed_affects'  => array(
					'__team_grid_data',
				),
            ),
			'display_in_popup' => array(
				'label'           => esc_html__( 'Display in Popup', 'divi-plus' ),
				'type'             		=> 'multiple_checkboxes',
				'option_category'  		=> 'basic_option',
				'options'          => array(
					'image'			=> esc_html__( 'Image', 'divi-plus' ),
					'designation' 	=> esc_html__( 'Designation', 'divi-plus' ),
					'social_icons' 	=> esc_html__( 'Social Icons', 'divi-plus' ),
					'content' 		=> esc_html__( 'Content', 'divi-plus' ),
					'skills_bars' 	=> esc_html__( 'Skill Bars', 'divi-plus' ),
				),
				'show_if'         => array(
					'onclick_trigger' => 'open_popup',
				),
				'default'				=> 'on|on|on|on|on',
				'tab_slug'         		=> 'general',
				'toggle_slug'      		=> 'elements',
				'description'     => esc_html__( 'Here you can choose whether or not to show extra fields in popup state.', 'divi-plus' ),
			),
			'select_layout' => array(
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
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'layout_settings',
				'description'      => esc_html__( 'Here you can select the team grid layout.', 'divi-plus' ),
				'computed_affects' => array(
					'__team_grid_data',
				),
			),
			'number_of_columns' => array(
				'label'           => esc_html__( 'Columns', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'1' => esc_html( '1' ),
					'2' => esc_html( '2' ),
					'3' => esc_html( '3' ),
					'4' => esc_html( '4' ),
					'5' => esc_html( '5' ),
					'6' => esc_html( '6' ),
				),
				'default'         => '4',
				'mobile_options'  => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'layout_settings',
				'description'     => esc_html__( 'Here you can select the team grid column.', 'divi-plus' ),
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
				'tab_slug'        	=> 'advanced',
				'toggle_slug'     	=> 'layout_settings',
				'description'       => esc_html__( 'Increase or decrease spacing between columns.', 'divi-plus' ),
            ),
			'team_member_grid_custom_padding' => array(
				'label'            => esc_html__( 'Grid Padding', 'divi-plus' ),
				'type'             => 'custom_padding',
				'option_category'  => 'layout',
				'mobile_options'   => true,
				'hover'            => false,
				'default'          => '',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'margin_padding',
				'description'      => esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'divi-plus' ),
			),
			'team_content_custom_padding' => array(
				'label'            => esc_html__( 'Content Padding', 'divi-plus' ),
				'type'             => 'custom_padding',
				'option_category'  => 'layout',
				'mobile_options'   => true,
				'hover'            => false,
				'default'          => '20px|20px|20px|20px|on|on',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'margin_padding',
				'description'      => esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'divi-plus' ),
				'computed_affects' => array(
					'__team_grid_data',
				),
			),
			'social_icon_size' => array(
				'label'           	=> esc_html__( 'Icon Size', 'divi-plus' ),
				'type'            	=> 'range',
				'option_category' 	=> 'font_option',
				'range_settings'  	=> array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
                'show_if'          => array(
                    'show_social_icon' => 'on',
                ),
				'mobile_options'  	=> true,
				'default'         	=> '14px',
				'tab_slug'        	=> 'advanced',
				'toggle_slug'     	=> 'social_icon_settings',
				'description'     	=> esc_html__( 'Move the slider or input the value to increase or decrease team member social icon size.', 'divi-plus' ),
			),
			'social_icon_color' => array(
				'label'        => esc_html__( 'Icon Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'hover'        => 'tabs',
                'show_if'          => array(
                    'show_social_icon' => 'on',
                ),
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'social_icon_settings',
				'description'  => esc_html__( 'Here you can choose a custom color to be used for the social icon.', 'divi-plus' ),
				'computed_affects' => array(
					'__team_grid_data',
				),
			),
			'social_icon_background_color' => array(
				'label'        => esc_html__( 'Icon Background Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'hover'        => 'tabs',
                'show_if'          => array(
                    'show_social_icon' => 'on',
                ),
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'social_icon_settings',
				'description'  => esc_html__( 'Here you can choose a custom color to be used for the social icon background.', 'divi-plus' ),
			),
			'social_icon_alignment' => array(
				'label'           => esc_html__( 'Social Icon Alignment', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'dipl_icon_left'   => esc_html__( 'Left', 'divi-plus' ),
					'dipl_icon_center' => esc_html__( 'Center', 'divi-plus' ),
					'dipl_icon_right'  => esc_html__( 'Right', 'divi-plus' ),
				),
                'show_if'          => array(
                    'show_social_icon' => 'on',
                ),
				'default'         => 'dipl_icon_left',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'social_icon_settings',
				'description'     => esc_html__( 'Here you can select the placement for the social icons.', 'divi-plus' ),
				'computed_affects' => array(
					'__team_grid_data',
				),
			),
            'category_background_color' => array(
                'label'             => esc_html__( 'Category Background', 'divi-plus' ),
                'type'              => 'background-field',
                'base_name'         => 'category_background',
                'context'           => 'category_background_color',
                'option_category'   => 'button',
                'custom_color'      => true,
                'background_fields' => $this->generate_background_options( "category_background", 'button', 'general', 'filter_cat_settings', 'category_background_color' ),
                'mobile_options'    => true,
                'default'			=> '#000',
				'show_if'         => array(
					'filterable_team' => 'on',
				),
                'tab_slug'          => 'advanced',
                'toggle_slug'       => 'filter_cat_settings',
                'sub_toggle'        => 'normal',
                'description'       => esc_html__( 'Adjust the background style of the category by customizing the background color, gradient, and image.' ),
            ),
            'active_category_background_color' => array(
                'label'             => esc_html__( 'Active Category Background', 'divi-plus' ),
                'type'              => 'background-field',
                'base_name'         => 'active_category_background',
                'context'           => 'active_category_background_color',
                'option_category'   => 'button',
                'custom_color'      => true,
                'background_fields' => $this->generate_background_options( "active_category_background", 'button', 'general', 'filter_cat_settings', 'active_category_background_color' ),
                'mobile_options'    => true,
                'default'			=> 'transparent',
				'show_if'         => array(
					'filterable_team' => 'on',
				),
                'tab_slug'          => 'advanced',
                'toggle_slug'       => 'filter_cat_settings',
                'sub_toggle'        => 'active',
                'description'       => esc_html__( 'Adjust the background style of the active category by customizing the background color, gradient, and image.' ),
            ),
			'popup_social_icon_size' => array(
				'label'           	=> esc_html__( 'Popup Icon Size', 'divi-plus' ),
				'type'            	=> 'range',
				'option_category' 	=> 'font_option',
				'range_settings'  	=> array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
				'mobile_options'  	=> true,
				'default'         	=> '16px',
				'default_on_front'	=> '16px',
				'tab_slug'        	=> 'advanced',
				'toggle_slug'     => 'popup_element_settings',
				'sub_toggle'	  => 'social_setting',
				'description'     	=> esc_html__( 'Move the slider or input the value to increase or decrease team member social icon size.', 'divi-plus' ),
			),
			'popup_social_icon_color' => array(
				'label'        => esc_html__( 'Popup Icon Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'     => 'popup_element_settings',
				'sub_toggle'	  => 'social_setting',
				'description'  => esc_html__( 'Here you can choose a custom color to be used for the social icon.', 'divi-plus' ),
				'computed_affects' => array(
					'__team_grid_data',
				),
			),
			'popup_social_icon_background_color' => array(
				'label'        => esc_html__( 'Popup Icon Background Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'hover'        => 'tabs',
				'tab_slug'     => 'advanced',
				'toggle_slug'     => 'popup_element_settings',
				'sub_toggle'	  => 'social_setting',
				'description'  => esc_html__( 'Here you can choose a custom color to be used for the social icon background.', 'divi-plus' ),
			),
			'popup_social_icon_alignment' => array(
				'label'           => esc_html__( 'Popup Social Icon Alignment', 'divi-plus' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'dipl_icon_left'   => esc_html__( 'Left', 'divi-plus' ),
					'dipl_icon_center' => esc_html__( 'Center', 'divi-plus' ),
					'dipl_icon_right'  => esc_html__( 'Right', 'divi-plus' ),
				),
				'default'         => 'dipl_icon_left',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'popup_element_settings',
				'sub_toggle'	  => 'social_setting',
				'description'     => esc_html__( 'Here you can select the placement for the social icons.', 'divi-plus' ),
			),
            'bar_layout' => array(
                'label'             => esc_html__( 'Skill Bar Layout', 'divi-plus' ),
                'type'              => 'select',
                'option_category'   => 'configuration',
                'options'           => array(
                    'layout1'   => esc_html__( 'Layout 1', 'divi-plus' ),
                    'layout2'   => esc_html__( 'Layout 2', 'divi-plus' ),
                ),
                'default'           => 'layout1',
                'default_on_front'  => 'layout1',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'popup_element_settings',
				'sub_toggle'	  => 'skills_setting',
                'affects'           => array(
                    'border_radii_skill_bars_border',
                    'border_styles_skill_bars_border',
                    'border_width_all_skill_bars_border',
                    'border_color_all_skill_bars_border',
                    'border_style_all_skill_bars_border',
                ),
                'description'       => esc_html__( 'Here you can select the layout for your skill bar.', 'divi-plus' ),
            ),
            'use_stripes' => array(
                'label'             => esc_html__( 'Use Stripes', 'divi-plus' ),
                'type'              => 'yes_no_button',
                'option_category'   => 'configuration',
                'options'           => array(
                    'on'  => esc_html__( 'Yes', 'divi-plus' ),
                    'off' => esc_html__( 'No', 'divi-plus' ),
                ),
                'default'           => 'off',
                'show_if'           => array(
                    'bar_layout' => 'layout1',
                ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'popup_element_settings',
				'sub_toggle'	  => 'skills_setting',
                'description'       => esc_html__( 'Here you can choose whether to use striped bar or not.', 'divi-plus' ),
            ),
            'stripe_color' => array(
                'label'            => esc_html__( 'Stripe Color', 'divi-plus' ),
                'type'             => 'color-alpha',
                'custom_color'     => true,
                'show_if'          => array(
                    'bar_layout' => 'layout1',
                    'use_stripes' => 'on',
                ),
                'default'          => 'rgba(255,255,255,.15)',
                'default_on_front' => 'rgba(255,255,255,.15)',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'popup_element_settings',
				'sub_toggle'	  => 'skills_setting',
                'description'      => esc_html__( 'Here you can select the color for the stripes.', 'divi-plus' ),
            ),
            'use_animated_stripes' => array(
                'label'             => esc_html__( 'Enable Stripes animation', 'divi-plus' ),
                'type'              => 'yes_no_button',
                'option_category'   => 'configuration',
                'options'           => array(
                    'on'  => esc_html__( 'Yes', 'divi-plus' ),
                    'off' => esc_html__( 'No', 'divi-plus' ),
                ),
                'default'           => 'off',
                'show_if'           => array(
                    'bar_layout' => 'layout1',
                    'use_stripes' => 'on',
                ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'popup_element_settings',
				'sub_toggle'	  => 'skills_setting',
                'description'       => esc_html__( 'Here you can choose whether to use animated striped bar or not.', 'divi-plus' ),
            ),
            'animation_speed' => array(
                'label'                 => esc_html__( 'Animation Speed', 'divi-plus' ),
                'type'                  => 'range',
                'option_category'       => 'layout',
                'range_settings'        => array(
                    'min'  => '1',
                    'max'  => '10',
                    'step' => '1',
                ),
                'unitless'              => true,
                'default'               => '1',
                'default_on_front'      => '1',
                'show_if'          => array(
                    'bar_layout' => 'layout1',
                    'use_stripes' => 'on',
                    'use_animated_stripes' => 'on',
                ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'popup_element_settings',
				'sub_toggle'	  => 'skills_setting',
                'description'           => esc_html__( 'Here you can select the animation speed in seconds.', 'divi-plus' ),
            ),
			'skill_bar_height' => array(
				'label'           => esc_html__( 'Bar Height', 'divi-plus' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '30',
					'step' => '1',
				),
				'mobile_options'  => true,
				'default'         => '12px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'popup_element_settings',
				'sub_toggle'	  => 'skills_setting',
				'description'     => esc_html__( 'Move the slider or input the value to increase or decrease skills bar height.', 'divi-plus' ),
			),
			'empty_bar_color' => array(
				'label'        => esc_html__( 'Empty Bar Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'hover'        => 'tabs',
				'default'      => '#ccc',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'popup_element_settings',
				'sub_toggle'   => 'skills_setting',
				'description'  => esc_html__( 'Here you can choose a custom color to be used for the empty skills bar.', 'divi-plus' ),
			),
			'filled_bar_color' => array(
				'label'        => esc_html__( 'Filled Bar Color', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'hover'        => 'tabs',
				'default'      => '#0c71c3',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'popup_element_settings',
				'sub_toggle'   => 'skills_setting',
				'description'  => esc_html__( 'Here you can choose a custom color to be used for the filled skills bar.', 'divi-plus' ),
			),
			'close_icon_position' => array(
				'label'           	=> esc_html__( 'Close Icon Position', 'divi-plus' ),
				'type'           	=> 'select',
				'option_category' 	=> 'layout',
				'options'         	=> array(
					'outside'   => esc_html__( 'Outside', 'divi-plus' ),
					'inside' 	=> esc_html__( 'Inside', 'divi-plus' ),
				),
				'default'         	=> 'outside',
				'tab_slug'       	=> 'advanced',
				'toggle_slug'  		=> 'popup_element_settings',
				'sub_toggle'  	 	=> 'popup',
				'description'     	=> esc_html__( 'Here you can select the placement for the social icons.', 'divi-plus' ),
			),
			'lightbox_close_icon_color' => array(
				'label'           	=> esc_html__( 'Close Icon Color', 'divi-plus' ),
				'type'            	=> 'color-alpha',
				'custom_color'    	=> true,
				'default'		  	=> '#bbb',
				'default_on_front'	=> '#bbb',
				'show_if'         => array(
					'onclick_trigger' => 'open_popup',
				),
				'tab_slug'        	=> 'advanced',
				'toggle_slug'  		=> 'popup_element_settings',
				'sub_toggle'   		=> 'popup',
				'description'     	=> esc_html__( 'Here you can define a custom color for the close icon.', 'divi-plus' ),
			),
			'lightbox_close_icon_size' => array(
				'label'           	=> esc_html__( 'Close Icon Size', 'divi-plus' ),
				'type'            	=> 'range',
				'option_category' 	=> 'font_option',
				'range_settings'  	=> array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
				'mobile_options'  	=> true,
				'default'         	=> '28px',
				'default_on_front'	=> '28px',
				'tab_slug'        	=> 'advanced',
				'toggle_slug'     	=> 'popup_element_settings',
				'sub_toggle'	  	=> 'popup',
				'description'     	=> esc_html__( 'Move the slider or input the value to increase or decrease team member lightbox close icon size.', 'divi-plus' ),
			),
			'popup_width'     => array(
				'label'            => esc_html__( 'Popup Width', 'divi-plus' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'range_settings'   => array(
					'min'  => '10',
					'max'  => '100',
					'step' => '1',
				),
                'fixed_unit'        => '%',
                'default'           => '60%',
				'mobile_options'   => true,
				'tab_slug'         => 'advanced',
				'toggle_slug'  => 'popup_element_settings',
				'sub_toggle'   => 'popup',
				'description'      => esc_html__( 'Adjust the width of the popup.', 'divi-plus' ),
			),
			'popup_overlay_bg' => array(
				'label'           	=> esc_html__( 'Popup Overlay Background', 'divi-plus' ),
				'type'            	=> 'color-alpha',
				'custom_color'    	=> true,
				'default'		  	=> 'rgba(0,0,0,0.8)',
				'default_on_front'	=> 'rgba(0,0,0,0.8)',
				'show_if'         => array(
					'onclick_trigger' => 'open_popup',
				),
				'tab_slug'        	=> 'advanced',
				'toggle_slug'  => 'popup_element_settings',
				'sub_toggle'   => 'popup',
				'description'     	=> esc_html__( 'Here you can define a custom background overlay color for the Popup.', 'divi-plus' ),
			),
			'popup_bg' => array(
				'label'        => esc_html__( 'Popup Background', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'default'      => '#fff',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'popup_element_settings',
				'sub_toggle'   => 'popup',
				'description'  => esc_html__( 'Here you can choose a custom color to be used for popup.', 'divi-plus' ),
			),
			'popup_custom_padding' => array(
				'label'            => esc_html__( 'Popup Padding', 'divi-plus' ),
				'type'             => 'custom_padding',
				'option_category'  => 'layout',
				'mobile_options'   => true,
				'hover'            => false,
				'default'          => '',
				'tab_slug'         => 'advanced',
				'toggle_slug'  	   => 'popup_element_settings',
				'sub_toggle'   	   => 'popup',
				'description'      => esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'divi-plus' ),
			),
			'loader_background_color' => array(
				'label'        => esc_html__( 'Loader Overlay', 'divi-plus' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'default'	   => 'rgba(255, 255, 255, 0.8)',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'loader',
				'description'  => esc_html__( 'Here you can choose a custom color to be used for the loader overlay.', 'divi-plus' ),
			),
			'__team_grid_data' => array(
				'type'                => 'computed',
				'computed_callback'   => array( 'DIPL_TeamGrid', 'get_team_members' ),
				'computed_depends_on' => array(
					'posts_number',
					'post_order',
					'post_order_by',
					'include_categories',
					'filterable_team',
					'select_layout',
					'show_short_desc',
					'show_designation',
					'show_social_icon',
					'link_target',
					'name_level',
					'image_size',
					'team_content_custom_padding',
					'team_content_custom_padding_tablet',
					'team_content_custom_padding_phone'
				),
			),
		);

		return array_merge(
			$fields,
			$this->generate_background_options( 'grid_overlay_bg', 'skip', 'general', 'background', 'grid_overlay_color' ),
			$this->generate_background_options( 'grid_bg', 'skip', 'general', 'background', 'grid_bg_color' ),
			$this->generate_background_options( 'category_background', 'skip', 'advanced', 'filter_cat_settings', 'category_background_color' ),
			$this->generate_background_options( 'active_category_background', 'skip', 'advanced', 'filter_cat_settings', 'active_category_background_color' )
		);

		return $team_grid_fields;
	}

	public static function get_team_members( $attrs = array(), $conditional_tags = array(), $current_page = array() ) {
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
			'posts_number'       					=> '10',
			'post_order'         					=> 'DESC',
			'post_order_by'      					=> 'date',
			'include_categories' 					=> '',
			'filterable_team' 						=> '',
			'select_layout'      					=> 'layout1',
			'show_short_desc'    					=> 'on',
			'show_designation'      				=> 'on',
			'show_social_icon'   					=> 'on',
			'link_target'							=> 'off',
			'name_level'							=> 'h5',
			'image_size'							=> 'medium',
			'team_content_custom_padding'			=> '20px|20px|20px|20px|on|on',
			'team_content_custom_padding_tablet'	=> '',
			'team_content_custom_padding_phone'		=> '',
		);

		// WordPress' native conditional tag is only available during page load. It'll fail during component update because
		// et_pb_process_computed_property() is loaded in admin-ajax.php. Thus, use WordPress' conditional tags on page load and
		// rely to passed $conditional_tags for AJAX call.
		$is_front_page     = (bool) et_fb_conditional_tag( 'is_front_page', $conditional_tags );
		$is_single         = (bool) et_fb_conditional_tag( 'is_single', $conditional_tags );
		$is_user_logged_in = (bool) et_fb_conditional_tag( 'is_user_logged_in', $conditional_tags );
		$current_post_id   = isset( $current_page['id'] ) ? (int) $current_page['id'] : 0;

		$attrs = wp_parse_args( $attrs, $defaults );

		foreach ( $defaults as $key => $default ) {
			${$key} = esc_html( et_()->array_get( $attrs, $key, $default ) );
		}

		$processed_name_level     		= et_pb_process_header_level( $name_level, 'h5' );
		$processed_name_level     		= esc_html( $processed_name_level );

		if ( 'on' !== $show_content ) {
			$excerpt_length = ( '' === $excerpt_length ) ? 270 : intval( $excerpt_length );
		}

		$args = array(
			'post_type'      => 'dipl-team-member',
			'posts_per_page' => intval( $posts_number ),
			'post_status'    => 'publish',
			'orderby'        => 'date',
			'order'          => 'DESC',
		);

		if ( is_user_logged_in() ) {
			$args['post_status'] = array( 'publish', 'private' );
		}

		if ( '' !== $include_categories ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'dipl-team-member-category',
					'field'    => 'term_id',
					'terms'    => array_map( 'intval', explode( ',', $include_categories ) ),
					'operator' => 'IN',
				),
			);
		}

		if ( isset( $post_order_by ) && '' !== $post_order_by ) {
			$args['orderby'] = sanitize_text_field( $post_order_by );
		}

		if ( isset( $post_order ) && '' !== $post_order ) {
			$args['order'] = sanitize_text_field( $post_order );
		}

		$query = new WP_Query( $args );

		self::$rendering = true;

		$output = '';

		if ( $query->have_posts() ) {

			if ( 'on' === $filterable_team ) {
                if ( file_exists( plugin_dir_path( __FILE__ ) . 'layouts/filterable-team/layout1.php' ) ) {
                    include ( plugin_dir_path( __FILE__ ) . 'layouts/filterable-team/layout1.php' );
                }

                $data_values = array(
                    'render_slug'               	=> $render_slug,
                    'select_layout'              	=> esc_attr( $select_layout ),
                    'posts_number'              	=> esc_attr( $posts_number ),
                    'include_categories'        	=> esc_attr( $include_categories ),
                    'show_short_desc'           	=> esc_attr( $show_short_desc ),
                    'show_designation'          	=> esc_attr( $show_designation ),
                    'show_social_icon'          	=> esc_attr( $show_social_icon ),
                    'filterable_team'           	=> esc_attr( $filterable_team ),
                    'processed_name_level'     		=> esc_attr( $processed_name_level ),
                    'close_icon_position'			=> esc_attr( $close_icon_position ),
                    'image_size'					=> esc_attr( $image_size ),
                    'onclick_trigger'				=> esc_attr( $onclick_trigger ),
                );

	            $data_values = rawurlencode( wp_json_encode( $data_values ) );
	            $output .= '<input class="dipl-team-member-props" type="hidden" value="'.$data_values.'" />';
            }

			$output  .= sprintf('<div class="dipl_team_grid_container %1$s"><div class="dipl_team_grid_items">',
									sanitize_html_class( $select_layout )
								);

			while ( $query->have_posts() ) {
				$query->the_post();
				$post_id           = intval( get_the_ID() );
				$member_name       = esc_html( get_the_title( $post_id ) );
				$has_member_image  = has_post_thumbnail( $post_id );
				$meta_fields       = get_post_meta( $post_id );
				$skill_bar 		   = '';
				

				if ( '' !== $member_name ) {
					$member_name = sprintf(
						'<%2$s class="dipl_team_member_name">%1$s</%2$s>',
						esc_html( $member_name ),
						esc_html( $processed_name_level )
					);
				} else {
					$member_name = '';
				}

				if ( $has_member_image ) {
					$member_image = get_the_post_thumbnail( $post_id, $image_size, array( 'class' => 'dipl_team_member_image' ) );
				} else {
					$member_image = '';
				}

				if ( 'on' === $show_short_desc && '' !== $meta_fields['dipl_team_member_short_desc'][0] ) {
					$short_description = sprintf(
						'<div class="dipl_team_member_short_desc">%1$s</div>',
						$meta_fields['dipl_team_member_short_desc'][0]
					);
				} else {
					$short_description = '';
				}

				if ( 'on' === $show_designation && '' !== $meta_fields['dipl_team_member_designation'][0] ) {
					$designation = sprintf(
						'<div class="dipl_team_member_designation">
							%1$s
						</div>',
						$meta_fields['dipl_team_member_designation'][0]
					);
				} else {
					$designation = '';
				}

				if ( 'on' === $show_social_icon ) {
					$facebook_url  = '';
					$twitter_url   = '';
					$linkedin_url  = '';
					$instagram_url = '';
					$youtube_url   = '';
					$email         = '';

					if ( '' !== $meta_fields['dipl_team_member_facebook'][0] ) {
						$facebook_url = sprintf(
							'<a href="%1$s">
								<span class="dipl_team_member_social_icon dipl_team_facebook et-pb-icon">&#xe093;</span>
							</a>',
							$meta_fields['dipl_team_member_facebook'][0]
						);
					}

					if ( '' !== $meta_fields['dipl_team_member_twitter'][0] ) {
						$twitter_url = sprintf(
							'<a href="%1$s">
								<span class="dipl_team_member_social_icon dipl_team_twitter et-pb-icon">&#xe094;</span>
							</a>',
							$meta_fields['dipl_team_member_twitter'][0]
						);
					}

					if ( '' !== $meta_fields['dipl_team_member_linkedin'][0] ) {
						$linkedin_url = sprintf(
							'<a href="%1$s">
								<span class="dipl_team_member_social_icon dipl_team_linkedin et-pb-icon">&#xe09d;</span>
							</a>',
							$meta_fields['dipl_team_member_linkedin'][0]
						);
					}

					if ( '' !== $meta_fields['dipl_team_member_instagram'][0] ) {
						$instagram_url = sprintf(
							'<a href="%1$s">
								<span class="dipl_team_member_social_icon dipl_team_instagram et-pb-icon">&#xe09a;</span>
							</a>',
							$meta_fields['dipl_team_member_instagram'][0]
						);
					}

					if ( '' !== $meta_fields['dipl_team_member_youtube'][0] ) {
						$youtube_url = sprintf(
							'<a href="%1$s">
								<span class="dipl_team_member_social_icon dipl_team_youtube et-pb-icon">&#xe0a3;</span>
							</a>',
							$meta_fields['dipl_team_member_youtube'][0]
						);
					}

					if ( '' !== $meta_fields['dipl_team_member_email'][0] ) {
						$email = sprintf(
							'<a href="mailto:%1$s">
								<span class="dipl_team_member_social_icon dipl_team_email et-pb-icon">&#xe076;</span>
							</a>',
							$meta_fields['dipl_team_member_email'][0]
						);
					}

					if ( isset( $meta_fields['dipl_team_member_phone'] ) && '' !== $meta_fields['dipl_team_member_phone'][0] ) {
						$phone_number = sprintf(
							'<a href="tel:%1$s">
								<span class="dipl_team_member_social_icon dipl_team_phone et-pb-icon">&#xe090;</span>
							</a>',
							$meta_fields['dipl_team_member_phone'][0]
						);
					}
				}

				$team_content_padding = array(
					'desktop' => $team_content_custom_padding,
					'tablet'  => $team_content_custom_padding_tablet,
					'phone'   => $team_content_custom_padding_phone,
				);
				$team_content_padding['tablet'] = '' !== $team_content_padding['tablet'] ? $team_content_padding['tablet'] : $team_content_padding['desktop'];
				$team_content_padding['phone']  = '' !== $team_content_padding['phone'] ? $team_content_padding['phone'] : $team_content_padding['tablet'];

				$team_content_padding = array_filter( $team_content_padding );

				if ( ! empty( $team_content_padding ) ) {
					foreach( $team_content_padding as $device => $value ) {
						if ( 'desktop' === $device ) {
							$padding_desktop = explode( '|', $value );
							$team_content_padding_top_desktop = $padding_desktop[0];
							$team_content_padding_bottom_desktop = $padding_desktop[2];
						}
						if ( 'tablet' === $device ) {
							$padding_tablet = explode( '|', $value );
							$team_content_padding_top_tablet = $padding_tablet[0];
							$team_content_padding_bottom_tablet = $padding_tablet[2];
						}
						if ( 'phone' === $device ) {
							$padding_phone = explode( '|', $value );
							$team_content_padding_top_phone = $padding_phone[0];
							$team_content_padding_bottom_phone = $padding_phone[2];
						}
					}
				}

				if ( file_exists( plugin_dir_path( __FILE__ ) . 'layouts/' . sanitize_file_name( $select_layout ) . '.php' ) ) {
					include plugin_dir_path( __FILE__ ) . 'layouts/' . sanitize_file_name( $select_layout ) . '.php';
				}

			}

			wp_reset_postdata();

			$output .= '</div></div>';
		}

		self::$rendering = false;

		return $output;
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

		$select_layout                      = esc_attr( $this->props['select_layout'] );
		$posts_number                       = esc_attr( $this->props['posts_number'] );
		$post_order                         = esc_attr( $this->props['post_order'] );
		$post_order_by                      = esc_attr( $this->props['post_order_by'] );
		$include_categories                 = esc_attr( $this->props['include_categories'] );
		$no_result_text						= esc_attr( $this->props['no_result_text'] );
		$filterable_team                    = esc_attr( $this->props['filterable_team'] );
		$show_short_desc                    = esc_attr( $this->props['show_short_desc'] );
		$show_designation                   = esc_attr( $this->props['show_designation'] );
		$show_social_icon                   = esc_attr( $this->props['show_social_icon'] );
		$image_size   						= esc_attr( $this->props['image_size'] );
		$onclick_trigger                    = esc_attr( $this->props['onclick_trigger'] );
		$link_target						= esc_attr( $this->props['link_target'] );
		$display_in_popup					= $this->props['display_in_popup'];
		$social_icon_size                   = et_pb_responsive_options()->get_property_values( $this->props, 'social_icon_size' );
		$social_icon_color                  = esc_attr( $this->props['social_icon_color'] );
		$social_icon_background_color       = esc_attr( $this->props['social_icon_background_color'] );
		$social_icon_alignment           	= esc_attr( $this->props['social_icon_alignment'] );
		$popup_social_icon_size             = et_pb_responsive_options()->get_property_values( $this->props, 'popup_social_icon_size' );
		$popup_social_icon_color            = esc_attr( $this->props['popup_social_icon_color'] );
		$popup_social_icon_background_color = esc_attr( $this->props['popup_social_icon_background_color'] );
		$popup_social_icon_alignment        = esc_attr( $this->props['popup_social_icon_alignment'] );
		$bar_layout                 		= esc_attr( $this->props['bar_layout'] );
		$use_stripes                		= esc_attr( $this->props['use_stripes'] );
		$stripe_color               		= esc_attr( $this->props['stripe_color'] );
		$use_animated_stripes               = esc_attr( $this->props['use_animated_stripes'] );
		$animation_speed               		= esc_attr( $this->props['animation_speed'] );
		$skill_bar_height       			= et_pb_responsive_options()->get_property_values( $this->props, 'skill_bar_height' );
		$empty_bar_color        			= esc_attr( $this->props['empty_bar_color'] );
		$filled_bar_color       			= esc_attr( $this->props['filled_bar_color'] );
		$popup_overlay_bg       			= esc_attr( $this->props['popup_overlay_bg'] );
		$close_icon_position       			= esc_attr( $this->props['close_icon_position'] );
		$lightbox_close_icon_color       	= esc_attr( $this->props['lightbox_close_icon_color'] );
		$lightbox_close_icon_size       	= esc_attr( $this->props['lightbox_close_icon_size'] );
		$loader_background_color			= $this->props['loader_background_color'];
		$popup_width       					= esc_attr( $this->props['popup_width'] );
		$popup_bg       					= esc_attr( $this->props['popup_bg'] );
		$order_class  						= $this->get_module_order_class( $render_slug );
		$order_number 						= esc_attr( preg_replace( '/[^0-9]/', '', esc_attr( $order_class ) ) );

		$name_level               			= esc_html( $this->props['name_level'] );
		$processed_name_level     			= et_pb_process_header_level( $name_level, 'h5' );
		$processed_name_level     			= esc_html( $processed_name_level );

		$popup_name_level					= esc_html( $this->props['popup_name_level'] );
		$processed_popup_name_level     	= et_pb_process_header_level( $popup_name_level, 'h5' );
		$processed_popup_name_level     	= esc_html( $processed_popup_name_level );

		$number_of_columns 	= et_pb_responsive_options()->get_property_values( $this->props, 'number_of_columns' );
		$column_spacing 	= et_pb_responsive_options()->get_property_values( $this->props, 'column_spacing' );
		
		$number_of_columns['tablet']	= '' !== $number_of_columns['tablet'] ? $number_of_columns['tablet'] : $number_of_columns['desktop'];
		$number_of_columns['phone'] 	= '' !== $number_of_columns['phone'] ? $number_of_columns['phone'] : $number_of_columns['tablet'];
		$column_spacing['tablet']		= '' !== $column_spacing['tablet'] ? $column_spacing['tablet'] : $column_spacing['desktop'];
		$column_spacing['phone']		= '' !== $column_spacing['phone'] ? $column_spacing['phone'] : $column_spacing['tablet'];

		$display_in_popup_array = array( 'image', 'designation', 'social_icons', 'content', 'skills_bars' );
		$display_in_popup 	    = $this->process_multiple_checkboxes_value( $display_in_popup, $display_in_popup_array );		
		$breakpoints 			= array( 'desktop', 'tablet', 'phone' );
		$width 					= array();

		wp_enqueue_script( 'dipl-team-grid-custom', PLUGIN_PATH . 'includes/modules/TeamGrid/dipl-teamgrid-custom.min.js', array('jquery'), '1.0.1', true );
		wp_localize_script( 'dipl-team-grid-custom', 'DiviPlusTeamGridData', array(
	            'ajaxurl'   => admin_url( 'admin-ajax.php' ),
	            'ajaxnonce' => wp_create_nonce( 'elicus-divi-plus-team-grid-nonce' ),
	        ));
		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-team-grid-style', PLUGIN_PATH . 'includes/modules/TeamGrid/' . $file . '.min.css', array(), '1.0.0' );
		
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

		et_pb_responsive_options()->generate_responsive_css( $width, '%%order_class%% .dipl_team_grid_item', 'width', $render_slug, '', 'range' );
		et_pb_responsive_options()->generate_responsive_css( $column_spacing, '%%order_class%% .dipl_team_grid_item', array( 'margin-bottom' ), $render_slug, '', 'range' );

		//Column Numbers
		foreach ( $number_of_columns as $device => $cols ) {
			if ( 'desktop' === $device ) {
				self::set_style( $render_slug, array(
                    'selector'    => '%%order_class%% .dipl_team_grid_item:not(:nth-child(' . absint( $cols ) . 'n+' . absint( $cols ) . '))',
                    'declaration' => sprintf( 'margin-right: %1$s;', esc_attr( $column_spacing['desktop'] ) ),
                    'media_query' => self::get_media_query( 'min_width_981' ),
                ) );
                if ( '' !== $cols ) {
					self::set_style( $render_slug, array(
	                    'selector'    => '%%order_class%% .dipl_team_grid_item:nth-child(' . absint( $cols ) . 'n+1)',
	                    'declaration' => sprintf( 'clear: left;', esc_attr( $column_spacing['desktop'] ) ),
	                    'media_query' => self::get_media_query( 'min_width_981' ),
	                ) );
				}
			} else if ( 'tablet' === $device ) {
				self::set_style( $render_slug, array(
                    'selector'    => '%%order_class%% .dipl_team_grid_item:not(:nth-child(' . absint( $cols ) . 'n+' . absint( $cols ) . '))',
                    'declaration' => sprintf( 'margin-right: %1$s;', esc_attr( $column_spacing['tablet'] ) ),
                    'media_query' => self::get_media_query( '768_980' ),
                ) );
                if ( '' !== $cols ) {
					self::set_style( $render_slug, array(
	                    'selector'    => '%%order_class%% .dipl_team_grid_item:nth-child(' . absint( $cols ) . 'n+1)',
	                    'declaration' => 'clear: left;',
	                    'media_query' => self::get_media_query( '768_980' ),
	                ) );
				}
			} else if ( 'phone' === $device ) {
				self::set_style( $render_slug, array(
                    'selector'    => '%%order_class%% .dipl_team_grid_item:not(:nth-child(' . absint( $cols ) . 'n+' . absint( $cols ) . '))',
                    'declaration' => sprintf( 'margin-right: %1$s;', esc_attr( $column_spacing['phone'] ) ),
                    'media_query' => self::get_media_query( 'max_width_767' ),
                ) );
                if ( '' !== $cols ) {
					self::set_style( $render_slug, array(
	                    'selector'    => '%%order_class%% .dipl_team_grid_item:nth-child(' . absint( $cols ) . 'n+1)',
	                    'declaration' => 'clear: left;',
	                    'media_query' => self::get_media_query( 'max_width_767' ),
	                ) );
				}
			}
			
		}

		//Social Icon
		if ( 'on' === $show_social_icon ) {
			if ( 'dipl_icon_center' === $social_icon_alignment ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_team_social_wrapper',
						'declaration' => 'justify-content: center;',
					)
				);
			} else if ( 'dipl_icon_left' === $social_icon_alignment ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_team_social_wrapper',
						'declaration' => 'justify-content: flex-start;',
					)
				);
			} else if ( 'dipl_icon_right' === $social_icon_alignment ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_team_social_wrapper',
						'declaration' => 'justify-content: flex-end;',
					)
				);
			}

			if (  '' !== $social_icon_color || '' !== $social_icon_background_color ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_team_instagram',
						'declaration' => 'background: none;-webkit-background-clip: unset;background-clip: unset;-webkit-text-fill-color: unset;',
					)
				);
			}

			if ( '' !== $social_icon_color ) {
				$this->generate_styles(
					array(
						'base_attr_name' => 'social_icon_color',
						'selector'       => '%%order_class%% .dipl_team_social_wrapper a, %%order_class%% .dipl_team_member_social_icon',
						'hover_selector' => '%%order_class%% .dipl_team_social_wrapper a:hover, %%order_class%% .dipl_team_member_social_icon:hover',
						'css_property'   => 'color',
						'priority'		 => 1000,
						'render_slug'    => $render_slug,
						'type'           => 'color',
						'important'      => true,
					)
				);
			}

			if ( '' !== $social_icon_background_color ) {
				$this->generate_styles(
					array(
						'base_attr_name' => 'social_icon_background_color',
						'selector'       => '%%order_class%% .dipl_team_member_social_icon',
						'hover_selector' => '%%order_class%% .dipl_team_member_social_icon:hover',
						'css_property'   => 'background-color',
						'priority'		 => 1000,
						'render_slug'    => $render_slug,
						'type'           => 'color',
						'important'      => true,
					)
				);
				self::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dipl_team_member_social_icon',
						'declaration' => 'padding: 5px;',
					)
				);
			}

			et_pb_responsive_options()->generate_responsive_css( $social_icon_size, '%%order_class%% .dipl_team_member_social_icon', 'font-size', $render_slug, '', 'range' );
		}

		//Popup Social Icon
		if ( 'open_popup' === $onclick_trigger ) {

			wp_enqueue_script( 'magnific-popup' );
			wp_enqueue_style( 'magnific-popup' );

			self::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dipl_team_grid_item',
					'declaration' => 'cursor: pointer;',
				)
			);

			if ( '' !== $display_in_popup ) {
				if ( in_array( 'social_icons', $display_in_popup ) ) {
					if ( 'dipl_icon_center' === $popup_social_icon_alignment ) {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%%_lightbox .dipl_team_social_wrapper',
								'declaration' => 'justify-content: center;',
							)
						);
					} else if ( 'dipl_icon_left' === $popup_social_icon_alignment ) {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%%_lightbox .dipl_team_social_wrapper',
								'declaration' => 'justify-content: flex-start;',
							)
						);
					} else if ( 'dipl_icon_right' === $popup_social_icon_alignment ) {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%%_lightbox .dipl_team_social_wrapper',
								'declaration' => 'justify-content: flex-end;',
							)
						);
					}

					if (  '' !== $popup_social_icon_color || '' !== $popup_social_icon_background_color ) {
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%%_lightbox .dipl_team_instagram',
								'declaration' => 'background: none;-webkit-background-clip: unset;background-clip: unset;-webkit-text-fill-color: unset;',
							)
						);
					}

					if ( '' !== $popup_social_icon_color ) {
						$this->generate_styles(
							array(
								'base_attr_name' => 'popup_social_icon_color',
								'selector'       => "%%order_class%%_lightbox .dipl_team_member_social_icon",
								'hover_selector' => '%%order_class%%_lightbox .dipl_team_member_social_icon:hover',
								'css_property'   => 'color',
								'priority'		 => 1000,
								'render_slug'    => $render_slug,
								'type'           => 'color',
								'important'      => true,
							)
						);
					}

					if ( '' !== $popup_social_icon_background_color ) {
						$this->generate_styles(
							array(
								'base_attr_name' => 'popup_social_icon_background_color',
								'selector'       => "%%order_class%%_lightbox .dipl_team_member_social_icon",
								'hover_selector' => '%%order_class%%_lightbox .dipl_team_member_social_icon:hover',
								'css_property'   => 'background-color',
								'priority'		 => 1000,
								'render_slug'    => $render_slug,
								'type'           => 'color',
								'important'      => true,
							)
						);
						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%%_lightbox .dipl_team_member_social_icon',
								'declaration' => 'padding: 5px;',
							)
						);
					}

					et_pb_responsive_options()->generate_responsive_css( $popup_social_icon_size, '%%order_class%%_lightbox .dipl_team_member_social_icon', 'font-size', $render_slug, '', 'range' );
				}

				if ( in_array( 'skills_bars', $display_in_popup ) ) {

					if ( 'layout2' === $bar_layout ) {

						if ( ! empty( array_filter( $skill_bar_height ) ) ) {
							et_pb_responsive_options()->generate_responsive_css( $skill_bar_height, '%%order_class%%_lightbox .dipl_skill_bar_wrapper .dipl_bar_counter_chunks', 'height', $render_slug, '', 'range' );
						}

						if ( '' !== $empty_bar_color ) {
							$this->generate_styles(
								array(
									'base_attr_name' => 'empty_bar_color',
									'selector'       => "%%order_class%%_lightbox .dipl_skill_bar_wrapper .dipl_bar_counter_empty_chunks",
									'css_property'   => 'background-color',
									'priority'		 => 1000,
									'render_slug'    => $render_slug,
									'type'           => 'color',
									'important'      => true,
								)
							);
						}

						if ( '' !== $filled_bar_color ) {
							$this->generate_styles(
								array(
									'base_attr_name' => 'filled_bar_color',
									'selector'       => "%%order_class%%_lightbox .dipl_skill_bar_wrapper .dipl_bar_counter_filled_chunks:before",
									'css_property'   => 'background-color',
									'priority'		 => 1000,
									'render_slug'    => $render_slug,
									'type'           => 'color',
									'important'      => true,
								)
							);
						}

						self::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%%_lightbox .dipl_skill_bar_wrapper',
								'declaration' => 'display: flex;',
							)
						);

					}

					if ( ! empty( array_filter( $skill_bar_height ) ) ) {
						et_pb_responsive_options()->generate_responsive_css( $skill_bar_height, '%%order_class%%_lightbox .dipl_skill_bar_wrapper .dipl_empty_bar', 'height', $render_slug, '', 'range' );
					}

					if ( '' !== $empty_bar_color ) {
						$this->generate_styles(
							array(
								'base_attr_name' => 'empty_bar_color',
								'selector'       => "%%order_class%%_lightbox .dipl_skill_bar_wrapper .dipl_empty_bar",
								'hover_selector' => '%%order_class%%_lightbox:hover .dipl_skill_bar_wrapper .dipl_empty_bar',
								'css_property'   => 'background-color',
								'priority'		 => 1000,
								'render_slug'    => $render_slug,
								'type'           => 'color',
								'important'      => true,
							)
						);
					}

					if ( '' !== $filled_bar_color ) {
						$this->generate_styles(
							array(
								'base_attr_name' => 'filled_bar_color',
								'selector'       => "%%order_class%%_lightbox .dipl_skill_bar_wrapper .dipl_filled_bar",
								'hover_selector' => '%%order_class%%_lightbox:hover .dipl_skill_bar_wrapper .dipl_filled_bar',
								'css_property'   => 'background-color',
								'priority'		 => 1000,
								'render_slug'    => $render_slug,
								'type'           => 'color',
								'important'      => true,
							)
						);
					}

					if ( '' !== $animation_speed ) {
					    self::set_style(
				            $render_slug,
				            array(
				                'selector'    => '%%order_class%%_lightbox .dipl_bar_counter_animated_striped_bar:before',
				                'declaration' => sprintf( 'animation-duration: %1$ss;', esc_attr( $animation_speed ) ),
				            )
				        );
					}

					if ( '' !== $stripe_color ) {
					    self::set_style(
				            $render_slug,
				            array(
				                'selector'    => '%%order_class%%_lightbox .dipl_bar_counter_striped_bar:before, %%order_class%%_lightbox .dipl_bar_counter_animated_striped_bar:before',
				                'declaration' => sprintf( 
				                    'background-image: -webkit-linear-gradient(-45deg, %1$s 25%%, transparent 25%%, transparent 50%%, %1$s 50%%, %1$s 75%%, transparent 75%%, transparent);
				                    background-image: -moz-linear-gradient(-45deg, %1$s 25%%, transparent 25%%, transparent 50%%, %1$s 50%%, %1$s 75%%, transparent 75%%, transparent);
				                    background-image: linear-gradient(-45deg, %1$s 25%%, transparent 25%%, transparent 50%%, %1$s 50%%, %1$s 75%%, transparent 75%%, transparent);',
				                    esc_attr( $stripe_color )
				                ),
				            )
				        );
					}

				}

				//lightbox color
				if ( '' !== $popup_overlay_bg ) {
					$this->generate_styles(
						array(
							'base_attr_name' => 'popup_overlay_bg',
							'selector'       => "%%order_class%%_lightbox.mfp-bg",
							'css_property'   => 'background-color',
							'priority'		 => 1000,
							'render_slug'    => $render_slug,
							'type'           => 'color',
							'important'      => true,
						)
					);
				}

				if ( '' !== $lightbox_close_icon_color ) {
					$this->generate_styles(
						array(
							'base_attr_name' => 'lightbox_close_icon_color',
							'selector'       => "%%order_class%%_lightbox .mfp-close",
							'css_property'   => 'color',
							'priority'		 => 1000,
							'render_slug'    => $render_slug,
							'type'           => 'color',
							'important'      => true,
						)
					);
				}

				if ( '' !== $lightbox_close_icon_size ) {
					$this->generate_styles(
						array(
							'base_attr_name' => 'lightbox_close_icon_size',
							'selector'       => "%%order_class%%_lightbox .mfp-close",
							'css_property'   => 'font-size',
							'important'	     => true,
							'priority'		 => 999,
							'render_slug'    => $render_slug,
							'type'           => 'range',
						)
					);

				}

				if ( '' !== $popup_width ) {
					$this->generate_styles(
						array(
							'base_attr_name' => 'popup_width',
							'selector'       => '%%order_class%%_lightbox .dipl_team_member_wrapper_lightbox',
							'hover_selector' => '%%order_class%%_lightbox .dipl_team_member_wrapper_lightbox:hover',
							'css_property'   => 'width',
							'important'		 => true,
							'priority'		 => 1000,
							'render_slug'    => $render_slug,
							'type'           => 'range',
						)
					);
				}

				// Popup Background Color
				if ( '' !== $popup_bg ) {
					$this->generate_styles(
						array(
							'base_attr_name' => 'popup_bg',
							'selector'       => '%%order_class%%_lightbox .dipl_team_member_wrapper_lightbox',
							'hover_selector' => '%%order_class%%_lightbox .dipl_team_member_wrapper_lightbox:hover',
							'css_property'   => 'background-color',
							'important'		 => true,
							'priority'		 => 1000,
							'render_slug'    => $render_slug,
							'type'           => 'color',
						)
					);
				}

			}
		}

		self::set_style( $render_slug, array(
            'selector'    => '%%order_class%% .dipl_team_lightbox_loader:before',
            'declaration' => sprintf( 'background-color: %1$s;', esc_attr( $loader_background_color ) ),
        ) );

		$args = array(
			'post_type'      => 'dipl-team-member',
			'posts_per_page' => intval( $posts_number ),
			'post_status'    => 'publish',
			'orderby'        => 'date',
			'order'          => 'DESC',
		);

		if ( is_user_logged_in() ) {
			$args['post_status'] = array( 'publish', 'private' );
		}

		if ( '' !== $include_categories ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'dipl-team-member-category',
					'field'    => 'term_id',
					'terms'    => array_map( 'intval', explode( ',', $include_categories ) ),
					'operator' => 'IN',
				),
			);
		}

		if ( isset( $post_order_by ) && '' !== $post_order_by ) {
			$args['orderby'] = sanitize_text_field( $post_order_by );
		}

		if ( isset( $post_order ) && '' !== $post_order ) {
			$args['order'] = sanitize_text_field( $post_order );
		}

		$query = new WP_Query( $args );

		self::$rendering = true;

		if ( $query->have_posts() ) {

			$output  = '';

			$team_content_custom_padding = et_pb_responsive_options()->get_property_values( $this->props, 'team_content_custom_padding' );
			$team_content_custom_padding['tablet'] = '' !== $team_content_custom_padding['tablet'] ? $team_content_custom_padding['tablet'] : $team_content_custom_padding['desktop'];
			$team_content_custom_padding['phone']  = '' !== $team_content_custom_padding['phone'] ? $team_content_custom_padding['phone'] : $team_content_custom_padding['tablet'];

			$team_content_custom_padding = array_filter( $team_content_custom_padding );
			if ( ! empty( $team_content_custom_padding ) ) {
				foreach( $team_content_custom_padding as $device => $value ) {
					if ( 'desktop' === $device ) {
						$padding_desktop = explode( '|', $value );
						$team_content_padding_top_desktop = $padding_desktop[0];
						$team_content_padding_bottom_desktop = $padding_desktop[2];
					}
					if ( 'tablet' === $device ) {
						$padding_tablet = explode( '|', $value );
						$team_content_padding_top_tablet = $padding_tablet[0];
						$team_content_padding_bottom_tablet = $padding_tablet[2];
					}
					if ( 'phone' === $device ) {
						$padding_phone = explode( '|', $value );
						$team_content_padding_top_phone = $padding_phone[0];
						$team_content_padding_bottom_phone = $padding_phone[2];
					}
				}
			}

			if ( 'on' === $filterable_team ) {
                if ( file_exists( plugin_dir_path( __FILE__ ) . 'layouts/filterable-team/layout1.php' ) ) {
                    include ( plugin_dir_path( __FILE__ ) . 'layouts/filterable-team/layout1.php' );
                }

                $popupelements = implode( ',', $display_in_popup );

                $data_values = array(
                    'render_slug'               			=> $render_slug,
                    'select_layout'              			=> esc_attr( $select_layout ),
                    'posts_number'              			=> esc_attr( $posts_number ),
                    'include_categories'        			=> esc_attr( $include_categories ),
                    'show_short_desc'           			=> esc_attr( $show_short_desc ),
                    'show_designation'          			=> esc_attr( $show_designation ),
                    'show_social_icon'          			=> esc_attr( $show_social_icon ),
                    'processed_name_level'     				=> esc_attr( $processed_name_level ),
                    'processed_popup_name_level'			=> esc_attr( $processed_popup_name_level ),
                    'close_icon_position'					=> esc_attr( $close_icon_position ),
                    'image_size'							=> esc_attr( $image_size ),
                    'onclick_trigger'						=> esc_attr( $onclick_trigger ),
                    'popup_elements'						=> esc_attr( $popupelements ),
                    'use_stripes'							=> esc_attr( $use_stripes ),
                    'team_content_padding_top_desktop'		=> isset( $team_content_padding_top_desktop ) ? $team_content_padding_top_desktop : '',
                    'team_content_padding_top_tablet'		=> isset( $team_content_padding_top_tablet ) ? $team_content_padding_top_tablet : '',
                    'team_content_padding_top_phone'		=> isset( $team_content_padding_top_phone ) ? $team_content_padding_top_phone : '',
                    'team_content_padding_bottom_desktop'	=> isset( $team_content_padding_bottom_desktop ) ? $team_content_padding_bottom_desktop : '',
                    'team_content_padding_bottom_tablet'	=> isset( $team_content_padding_bottom_tablet ) ? $team_content_padding_bottom_tablet : '',
                    'team_content_padding_bottom_phone'	=> isset( $team_content_padding_bottom_phone ) ? $team_content_padding_bottom_phone : '',
                );

	            $data_values = rawurlencode( wp_json_encode( $data_values ) );
	            $output .= '<input class="dipl-team-member-props" type="hidden" value="'.$data_values.'" />';
            }

			$output  .= sprintf('
				<div class="dipl_team_grid_container %1$s"><div class="dipl_team_grid_items">',
				sanitize_html_class( $select_layout )
			);


			while ( $query->have_posts() ) {
				$query->the_post();

				$post_id           = intval( get_the_ID() );
				$member_name       = esc_html( get_the_title( $post_id ) );
				$has_member_image  = has_post_thumbnail( $post_id );
				$meta_fields       = get_post_meta( $post_id );
				$data 			   = '';

				$data .= 'data-close_icon_position="' . $close_icon_position . '" ';
				$data .= 'data-popup_name_level="' . $processed_popup_name_level .'" ';

				if ( '' !== $display_in_popup ) {
					
					$data .= 'data-id="' . $post_id . '"';

					if ( in_array( 'image', $display_in_popup ) ) {
						$data .= 'data-image="on" ';
						$data .= 'data-image_size="'.$image_size.'" ';
					}
					if ( in_array( 'designation', $display_in_popup ) ) { 
						$data .= 'data-designation="on" ';
					}
					if ( in_array( 'content', $display_in_popup ) ) { 
						$data .= 'data-content="on" ';	
					}
					if ( in_array( 'skills_bars', $display_in_popup ) ) { 
						$data .= 'data-skills_bars="on" ';
						if ( 'layout1' === $bar_layout ) {
							$data .= 'data-bar_layout="1" ';
							if ( 'on' === $use_stripes ) {
								$data .= 'data-use_stripes="on" ';

								if ( 'on' === $use_animated_stripes ) {
									$data .= 'data-use_animated_stripes="on" ';
								}	
							}
						}else{
							$data .= 'data-bar_layout="2" ';
						}	
					}
					if ( in_array( 'social_icons', $display_in_popup ) ) { 
						$data .= 'data-social_icons="on" ';	
					}
					
				}

				if ( '' !== $member_name ) {
					$member_name = sprintf(
						'<%2$s class="dipl_team_member_name">%1$s</%2$s>',
						esc_html( $member_name ),
						esc_html( $processed_name_level )
					);
				} else {
					$member_name = '';
				}

				if ( $has_member_image ) {
					$member_image = get_the_post_thumbnail( $post_id, $image_size, array( 'class' => 'dipl_team_member_image' ) );
				} else {
					$member_image = '';
				}

				if ( 'on' === $show_short_desc && '' !== $meta_fields['dipl_team_member_short_desc'][0] ) {
					$short_description = sprintf(
						'<div class="dipl_team_member_short_desc">%1$s</div>',
						$meta_fields['dipl_team_member_short_desc'][0]
					);
				} else {
					$short_description = '';
				}

				if ( 'on' === $show_designation && '' !== $meta_fields['dipl_team_member_designation'][0] ) {
					$designation = sprintf(
						'<div class="dipl_team_member_designation">%1$s</div>',
						$meta_fields['dipl_team_member_designation'][0]
					);
				} else {
					$designation = '';
				}

				if ( 'on' === $show_social_icon ) {
					$facebook_url  = '';
					$twitter_url   = '';
					$linkedin_url  = '';
					$instagram_url = '';
					$youtube_url   = '';
					$email         = '';
					$phone_number  = '';

					if ( '' !== $meta_fields['dipl_team_member_facebook'][0] ) {
						$facebook_url = sprintf(
							'<a href="%1$s">
								<span class="dipl_team_member_social_icon dipl_team_facebook et-pb-icon">&#xe093;</span>
							</a>',
							$meta_fields['dipl_team_member_facebook'][0]
						);
					}

					if ( '' !== $meta_fields['dipl_team_member_twitter'][0] ) {
						$twitter_url = sprintf(
							'<a href="%1$s">
								<span class="dipl_team_member_social_icon dipl_team_twitter et-pb-icon">&#xe094;</span>
							</a>',
							$meta_fields['dipl_team_member_twitter'][0]
						);
					}

					if ( '' !== $meta_fields['dipl_team_member_linkedin'][0] ) {
						$linkedin_url = sprintf(
							'<a href="%1$s">
								<span class="dipl_team_member_social_icon dipl_team_linkedin et-pb-icon">&#xe09d;</span>
							</a>',
							$meta_fields['dipl_team_member_linkedin'][0]
						);
					}

					if ( '' !== $meta_fields['dipl_team_member_instagram'][0] ) {
						$instagram_url = sprintf(
							'<a href="%1$s">
								<span class="dipl_team_member_social_icon dipl_team_instagram et-pb-icon">&#xe09a;</span>
							</a>',
							$meta_fields['dipl_team_member_instagram'][0]
						);
					}

					if ( '' !== $meta_fields['dipl_team_member_youtube'][0] ) {
						$youtube_url = sprintf(
							'<a href="%1$s">
								<span class="dipl_team_member_social_icon dipl_team_youtube et-pb-icon">&#xe0a3;</span>
							</a>',
							$meta_fields['dipl_team_member_youtube'][0]
						);
					}

					if ( '' !== $meta_fields['dipl_team_member_email'][0] ) {
						$email = sprintf(
							'<a href="mailto:%1$s">
								<span class="dipl_team_member_social_icon dipl_team_email et-pb-icon">&#xe076;</span>
							</a>',
							$meta_fields['dipl_team_member_email'][0]
						);
					}

					if ( isset( $meta_fields['dipl_team_member_phone'] ) && '' !== $meta_fields['dipl_team_member_phone'][0] ) {
						$phone_number = sprintf(
							'<a href="tel:%1$s">
								<span class="dipl_team_member_social_icon dipl_team_phone et-pb-icon">&#xe090;</span>
							</a>',
							$meta_fields['dipl_team_member_phone'][0]
						);
					}
				}

				if ( file_exists( plugin_dir_path( __FILE__ ) . 'layouts/' . sanitize_file_name( $select_layout ) . '.php' ) ) {
					include plugin_dir_path( __FILE__ ) . 'layouts/' . sanitize_file_name( $select_layout ) . '.php';
				}
			}

			wp_reset_postdata();

			$output .= '</div></div>';
		} else {
			$output = '<div class="entry">' . esc_html( $no_result_text ) . '</div>';
		}

		$this->process_advanced_margin_padding_css( $this, $render_slug, $this->margin_padding );

		$options = array(
			'normal' => array(
				'grid_overlay_bg' => "{$this->main_css_element} .dipl_team_overlay_wrapper",
				'grid_bg' => "{$this->main_css_element} .dipl_team_grid_item",
				'category_background' => "{$this->main_css_element} .dipl-team-items-categories li",
				'active_category_background' => "{$this->main_css_element} .dipl-team-items-categories .dipl-team-active-category",
			),
		);

		self::$rendering = false;

		$this->process_custom_background( $render_slug, $options );

		return $output;
	}

	public function process_advanced_margin_padding_css( $module, $function_name, $margin_padding ) {
		$utils           = ET_Core_Data_Utils::instance();
		$all_values      = $module->props;
		$advanced_fields = $module->advanced_fields;

		// Disable if module doesn't set advanced_fields property and has no VB support.
		if ( ! $module->has_vb_support() && ! $module->has_advanced_fields ) {
			return;
		}

		$allowed_advanced_fields = array( 'grid_margin_padding' );
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
			$processed_background_color = '';
			$processed_background_image = '';
			$processed_background_blend = '';

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

				$background_base_name    = $option_name;
				$background_prefix       = "{$option_name}_";
				$background_images_hover = array();
				$background_hover_style  = '';

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
				} elseif ( 'off' === $use_background_color_gradient_hover ) {
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
					$background_blend_hover   = et_pb_hover_options()->get_raw_value( "{$background_prefix}blend", $this->props );
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

						// Force background-color: initial.
						if ( $has_background_color_gradient_hover && $has_background_image_hover && $background_blend_hover !== $background_blend_default ) {
							$has_background_gradient_and_image_hover = true;
							$background_hover_style                 .= 'background-color: initial !important;';
						}
					}

					// Only append background image when the image exists.
					$background_images_hover[] = sprintf( 'url(%1$s)', esc_html( $background_image_hover ) );
				} elseif ( '' === $background_image_hover ) {
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
				} elseif ( $is_background_color_gradient_hover_disabled && $is_background_image_hover_disabled ) {
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
		return $new_values;
	}


}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
	$modules = explode( ',', $plugin_options['dipl-modules'] );
	if ( in_array( 'dipl_team_grid', $modules ) ) {
		new DIPL_TeamGrid();
	}
} else {
	new DIPL_TeamGrid();
}