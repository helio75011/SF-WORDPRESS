<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2021 Elicus Technologies Private Limited
 * @version     1.9.4
 */
class DIPL_FormStyler extends ET_Builder_Module {

	public $slug       = 'dipl_form_styler';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://diviextended.com/product/divi-plus/',
		'author'     => 'Elicus',
		'author_uri' => 'https://elicus.com/',
	);

	public function init() {
		$this->name             = esc_html__( 'DP Form Styler', 'divi-plus' );
		$this->main_css_element = '%%order_class%%';
	}

	public function get_settings_modal_toggles() {
		return array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Form', 'divi-plus' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'text'            => esc_html__( 'Alignment', 'divi-plus' ),
					'labels'          => esc_html__( 'Labels', 'divi-plus' ),
					'input_fields'    => esc_html__( 'Input Fields', 'divi-plus' ),
					'radio_fields'    => esc_html__( 'Radio Fields', 'divi-plus' ),
					'checkbox_fields' => esc_html__( 'Checkbox Fields', 'divi-plus' ),
					'upload_fields'   => esc_html__( 'Upload Fields', 'divi-plus' ),
					'button_fields'   => esc_html__( 'Button Fields', 'divi-plus' ),
					'submit_button'   => esc_html__( 'Submit Button', 'divi-plus' ),
					'reset_button'    => esc_html__( 'Reset Button', 'divi-plus' ),
				),
			),
		);
	}

	public function get_advanced_fields_config() {

		$input_fields = array(
			$this->main_css_element . ' .dipl_form_styler_wrapper form input[type="text"]',
			$this->main_css_element . ' .dipl_form_styler_wrapper form input[type="email"]',
			$this->main_css_element . ' .dipl_form_styler_wrapper form input[type="password"]',
			$this->main_css_element . ' .dipl_form_styler_wrapper form input[type="tel"]',
			$this->main_css_element . ' .dipl_form_styler_wrapper form input[type="url"]',
			$this->main_css_element . ' .dipl_form_styler_wrapper form input[type="time"]',
			$this->main_css_element . ' .dipl_form_styler_wrapper form input[type="week"]',
			$this->main_css_element . ' .dipl_form_styler_wrapper form input[type="month"]',
			$this->main_css_element . ' .dipl_form_styler_wrapper form input[type="datetime-local"]',
			$this->main_css_element . ' .dipl_form_styler_wrapper form input[type="number"]',
			$this->main_css_element . ' .dipl_form_styler_wrapper form input[type="date"]',
			$this->main_css_element . ' .dipl_form_styler_wrapper form select',
			$this->main_css_element . ' .dipl_form_styler_wrapper form textarea',
			$this->main_css_element . ' .dipl_form_styler_wrapper form .trumbowyg-editor-visible',
			$this->main_css_element . ' .dipl_form_styler_wrapper form .ccselect2-choice',
			$this->main_css_element . ' .dipl_form_styler_wrapper form input[type="credit_card_cvc"]',
		);

		$radio_field            = $this->main_css_element . ' .dipl_form_styler_wrapper form input[type="radio"]';
		$checkbox_field         = $this->main_css_element . ' .dipl_form_styler_wrapper form input[type="checkbox"]';
		$radio_checked_field    = $this->main_css_element . ' .dipl_form_styler_wrapper form input[type="radio"]:checked::before';
		$checkbox_checked_field = $this->main_css_element . ' .dipl_form_styler_wrapper form input[type="checkbox"]:checked::before';
		$upload_field           = $this->main_css_element . ' .dipl_form_styler_wrapper form input[type="file"]';

		$button_field        = "{$this->main_css_element} .dipl_form_styler_wrapper form input[type='button'], {$this->main_css_element} .dipl_form_styler_wrapper form button";
		$reset_button_field  = "{$this->main_css_element} .dipl_form_styler_wrapper form input[type='reset'], {$this->main_css_element} .dipl_form_styler_wrapper form button[type='reset']";
		$submit_button_field = "{$this->main_css_element} .dipl_form_styler_wrapper form input[type='submit'], {$this->main_css_element} .dipl_form_styler_wrapper form button[type='submit']";

		$input_fields_placeholder        = preg_filter( '/$/', '::placeholder', $input_fields );
		$input_fields_webkit_placeholder = preg_filter( '/$/', '::-webkit-input-placeholder', $input_fields );
		$input_fields_moz_placeholder    = preg_filter( '/$/', '::-moz-placeholder', $input_fields );
		$input_fields_ms_placeholder     = preg_filter( '/$/', '::-ms-input-placeholder', $input_fields );
		$input_fields_placeholder        = array_merge(
			$input_fields_webkit_placeholder,
			$input_fields_moz_placeholder,
			$input_fields_ms_placeholder,
			$input_fields_placeholder
		);

		$input_fields_focus = preg_filter( '/$/', ':focus', $input_fields );

		return array(
			'fonts'               => array(
				'label'              => array(
					'label'           => esc_html__( 'Label Text', 'divi-plus' ),
					'font_size'       => array(
						'label'          => esc_html__( 'Label Text Font Size', 'divi-plus' ),
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
					'text_color'      => array(
						'label' => esc_html__( 'Label Text Color', 'divi-plus' ),
					),
					'hide_text_align' => true,
					'css'             => array(
						'main'  => "{$this->main_css_element} form label",
						'hover' => "{$this->main_css_element} form label:hover",
					),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'labels',
				),
				'input'              => array(
					'label'           => esc_html__( 'Input Text', 'divi-plus' ),
					'font_size'       => array(
						'label'          => esc_html__( 'Input Text Font Size', 'divi-plus' ),
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
					'text_align'      => array(
						'label'   => esc_html__( 'Input Text Alignment', 'divi-plus' ),
						'default' => 'left',
					),
					'hide_text_color' => true,
					'css'             => array(
						'main' => implode( ', ', $input_fields ),
					),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'input_fields',
				),
				'placeholder'        => array(
					'label'           => esc_html__( 'Placeholder Text', 'divi-plus' ),
					'font_size'       => array(
						'label'          => esc_html__( 'Placeholder Text Font Size', 'divi-plus' ),
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
					'text_align'      => array(
						'label'   => esc_html__( 'Placeholder Text Alignment', 'divi-plus' ),
						'default' => 'left',
					),
					'hide_text_color' => true,
					'css'             => array(
						'main'      => implode( ', ', $input_fields_placeholder ),
						'important' => 'all',
					),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'input_fields',
				),
				'radio_label'        => array(
					'label'           => esc_html__( 'Radio Label Text', 'divi-plus' ),
					'font_size'       => array(
						'label'          => esc_html__( 'Radio Label Text Font Size', 'divi-plus' ),
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
					'hide_text_align' => true,
					'text_color'      => array(
						'label' => esc_html__( 'Radio Label Text Color', 'divi-plus' ),
					),
					'css'             => array(
						'main'  => "{$this->main_css_element} form .wpcf7-radio .wpcf7-list-item-label, {$this->main_css_element} form .radio label",
						'hover' => "{$this->main_css_element} form .wpcf7-radio .wpcf7-list-item-label:hover, {$this->main_css_element} form .radio label:hover",
					),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'radio_fields',
				),
				'checkbox_label'     => array(
					'label'           => esc_html__( 'Checkbox Label Text', 'divi-plus' ),
					'font_size'       => array(
						'label'          => esc_html__( 'Checkbox Label Text Font Size', 'divi-plus' ),
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
					'hide_text_align' => true,
					'text_color'      => array(
						'label' => esc_html__( 'Checkbox Label Text Color', 'divi-plus' ),
					),
					'css'             => array(
						'main'  => "{$this->main_css_element} form .wpcf7-checkbox .wpcf7-list-item-label, {$this->main_css_element} form .checkbox label",
						'hover' => "{$this->main_css_element} form .wpcf7-checkbox .wpcf7-list-item-label:hover, {$this->main_css_element} form .checkbox label:hover",
					),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'checkbox_fields',
				),
				'upload_text'        => array(
					'label'            => esc_html__( 'Upload Text', 'divi-plus' ),
					'font_size'        => array(
						'label'          => esc_html__( 'Upload Text Font Size', 'divi-plus' ),
						'default'        => '16px',
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'line_height'      => array(
						'default'        => '1.5em',
						'range_settings' => array(
							'min'  => '0.1',
							'max'  => '10',
							'step' => '0.1',
						),
					),
					'letter_spacing'   => array(
						'default'        => '0px',
						'range_settings' => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'validate_unit'  => true,
					),
					'hide_text_align'  => true,
					'hide_text_shadow' => true,
					'use_all_caps'     => false,
					'text_color'       => array(
						'label' => esc_html__( 'Upload Text Color', 'divi-plus' ),
					),
					'css'              => array(
						'main' => $upload_field,
					),
					'tab_slug'         => 'advanced',
					'toggle_slug'      => 'upload_fields',
				),
				'submit_button_text' => array(
					'label'           => esc_html__( 'Button Text', 'divi-plus' ),
					'font_size'       => array(
						'label'          => esc_html__( 'Button Text Font Size', 'divi-plus' ),
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
					'hide_text_align' => true,
					'text_color'      => array(
						'label' => esc_html__( 'Button Text Color', 'divi-plus' ),
					),
					'css'             => array(
						'main' => $submit_button_field,
					),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'submit_button',
				),
				'reset_button_text'  => array(
					'label'           => esc_html__( 'Button Text', 'divi-plus' ),
					'font_size'       => array(
						'label'          => esc_html__( 'Button Text Font Size', 'divi-plus' ),
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
					'hide_text_align' => true,
					'text_color'      => array(
						'label' => esc_html__( 'Button Text Color', 'divi-plus' ),
					),
					'css'             => array(
						'main' => $reset_button_field,
					),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'reset_button',
				),
				'button_text'        => array(
					'label'           => esc_html__( 'Button Text', 'divi-plus' ),
					'font_size'       => array(
						'label'          => esc_html__( 'Button Text Font Size', 'divi-plus' ),
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
					'hide_text_align' => true,
					'text_color'      => array(
						'label' => esc_html__( 'Button Text Color', 'divi-plus' ),
					),
					'css'             => array(
						'main' => $button_field,
					),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'button_fields',
				),
			),
			'borders'             => array(
				'default'       => array(
					'css' => array(
						'main'      => array(
							'border_radii'  => $this->main_css_element,
							'border_styles' => $this->main_css_element,
						),
						'important' => 'all',
					),
				),
				'input'         => array(
					'label_prefix' => 'Input Fields',
					'css'          => array(
						'main'      => array(
							'border_radii'  => implode( ', ', array_merge( $input_fields, $input_fields_focus ) ),
							'border_styles' => implode( ', ', array_merge( $input_fields, $input_fields_focus ) ),
						),
						'important' => 'all',
					),
					'defaults' => array(
				        'border_radii' => 'on||||',
				        'border_styles' => array(
				            'width' => '1px',
				            'color' => '#333333',
							'style' => 'solid',
				        ),
				    ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'input_fields',
				),
				'radio'         => array(
					'label_prefix'    => 'Radio Fields',
					'defaults'        => array(
						'border_radii'  => 'on||||',
						'border_styles' => array(
							'width' => '1px',
							'color' => '#333333',
							'style' => 'solid',
						),
					),
					'css'             => array(
						'main'      => array(
							'border_radii'  => "{$radio_field}, {$radio_field}:focus",
							'border_styles' => "{$radio_field}, {$radio_field}:focus",
						),
						'important' => 'all',
					),
					'depends_on'      => array( 'use_custom_radio' ),
					'depends_show_if' => 'on',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'radio_fields',
				),
				'checkbox'      => array(
					'label_prefix'    => 'Checkbox Fields',
					'defaults'        => array(
						'border_radii'  => 'on||||',
						'border_styles' => array(
							'width' => '1px',
							'color' => '#333333',
							'style' => 'solid',
						),
					),
					'css'             => array(
						'main'      => array(
							'border_radii'  => "{$checkbox_field}, {$checkbox_field}:focus",
							'border_styles' => "{$checkbox_field}, {$checkbox_field}:focus",
						),
						'important' => 'all',
					),
					'depends_on'      => array( 'use_custom_checkbox' ),
					'depends_show_if' => 'on',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'checkbox_fields',
				),
				'submit_button' => array(
					'label_prefix' => 'Submit Button',
					'css'          => array(
						'main'      => array(
							'border_radii'  => $submit_button_field,
							'border_styles' => $submit_button_field,
						),
						'important' => 'all',
					),
					'defaults' => array(
				        'border_radii' => 'on||||',
				        'border_styles' => array(
				            'width' => '1px',
				            'color' => '#333333',
							'style' => 'solid',
				        ),
				    ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'submit_button',
				),
				'reset_button'  => array(
					'label_prefix' => 'Reset Button',
					'css'          => array(
						'main'      => array(
							'border_radii'  => $reset_button_field,
							'border_styles' => $reset_button_field,
						),
						'important' => 'all',
					),
					'defaults' => array(
				        'border_radii' => 'on||||',
				        'border_styles' => array(
				            'width' => '1px',
				            'color' => '#333333',
							'style' => 'solid',
				        ),
				    ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'reset_button',
				),
				'button'        => array(
					'label_prefix' => 'Button',
					'css'          => array(
						'main'      => array(
							'border_radii'  => $button_field,
							'border_styles' => $button_field,
						),
						'important' => 'all',
					),
					'defaults' => array(
				        'border_radii' => 'on||||',
				        'border_styles' => array(
				            'width' => '1px',
				            'color' => '#333333',
							'style' => 'solid',
				        ),
				    ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'button_fields',
				),
			),
			'form_margin_padding' => array(
				'input'  => array(
					'margin_padding' => array(
						'css' => array(
							'use_margin' => false,
							'padding'    => implode( ', ', $input_fields ),
							'important'  => 'all',
						),
					),
				),
				'upload' => array(
					'margin_padding' => array(
						'css' => array(
							'use_margin' => false,
							'padding'    => $upload_field,
							'important'  => 'all',
						),
					),
				),
				'submit' => array(
					'margin_padding' => array(
						'css' => array(
							'use_margin' => false,
							'padding'    => $submit_button_field,
							'important'  => 'all',
						),
					),
				),
				'reset'  => array(
					'margin_padding' => array(
						'css' => array(
							'use_margin' => false,
							'padding'    => $reset_button_field,
							'important'  => 'all',
						),
					),
				),
				'button' => array(
					'margin_padding' => array(
						'css' => array(
							'use_margin' => false,
							'padding'    => $button_field,
							'important'  => 'all',
						),
					),
				),
			),
			'box_shadow'          => array(
				'default'  => array(
					'css' => array(
						'main'      => $this->main_css_element,
						'important' => true,
					),
				),
				'input'    => array(
					'label'       => esc_html__( 'Input Field Box Shadow', 'divi-plus' ),
					'css'         => array(
						'main' => implode( ', ', array_merge( $input_fields, $input_fields_focus ) ),
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'input_fields',
				),
				'radio'    => array(
					'label'       => esc_html__( 'Radio Button Box Shadow', 'divi-plus' ),
					'css'         => array(
						'main' => "{$radio_field}, {$radio_field}:focus",
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'radio_fields',
				),
				'checkbox' => array(
					'label'       => esc_html__( 'Checkbox Box Shadow', 'divi-plus' ),
					'css'         => array(
						'main' => "{$checkbox_field}, {$checkbox_field}:focus",
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'checkbox_fields',
				),
				'submit_button' => array(
					'label' 		=> esc_html__( 'Submit Button Box Shadow', 'divi-plus' ),
					'css'          	=> array(
						'main'      => $submit_button_field,
						'important' => 'all',
					),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'submit_button',
				),
				'reset_button'  => array(
					'label' 		=> esc_html__( 'Reset Button Box Shadow', 'divi-plus' ),
					'css'          	=> array(
						'main'      => $reset_button_field,
						'important' => 'all',
					),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'reset_button',
				),
				'button'        => array(
					'label' 		=> esc_html__( 'Button Box Shadow', 'divi-plus' ),
					'css'          	=> array(
						'main'      => $button_field,
						'important' => 'all',
					),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'button_fields',
				),
			),
			'max_width'           => array(
				'extra' => array(
					'input' => array(
						'options'              => array(
							'width' => array(
								'label'          => esc_html__( 'Input Fields Width', 'divi-plus' ),
								'range_settings' => array(
									'min'  => 1,
									'max'  => 100,
									'step' => 1,
								),
								'hover'          => false,
								'fixed_unit'     => '%',
								'default_unit'   => '%',
								'default_tablet' => '',
								'default_phone'  => '',
								'tab_slug'       => 'advanced',
								'toggle_slug'    => 'input_fields',
							),
						),
						'use_max_width'        => false,
						'use_module_alignment' => false,
						'css'                  => array(
							'main' => implode( ', ', $input_fields ),
						),
					),
				),
			),
			'height'              => array(
				'extra' => array(
					'input' => array(
						'options'        => array(
							'height' => array(
								'label'          => esc_html__( 'Input Fields Height', 'divi-plus' ),
								'range_settings' => array(
									'min'  => 1,
									'max'  => 100,
									'step' => 1,
								),
								'hover'          => false,
								'fixed_unit'     => 'px',
								'default_unit'   => 'px',
								'default'        => 'auto',
								'default_tablet' => '',
								'default_phone'  => '',
								'tab_slug'       => 'advanced',
								'toggle_slug'    => 'input_fields',
							),
						),
						'use_max_height' => false,
						'use_min_height' => false,
						'css'            => array(
							'main' => implode( ', ', $input_fields ),
						),
					),
				),
			),
			'background'          => array(
				'css' => array(
					'main' => $this->main_css_element,
				),
			),
			'margin_padding'      => array(
				'css' => array(
					'margin'    => $this->main_css_element,
					'padding'   => $this->main_css_element,
					'important' => 'all',
				),
			),
			'text'                => array(
				'css' => array(
					'text_orientation' => $this->main_css_element,
				),
			),
		);
	}

	public function get_fields() {
		$caldera_forms = array( '0' => esc_html__( 'Select', 'divi-plus' ) );
		$cf7_forms     = array( '0' => esc_html__( 'Select', 'divi-plus' ) );
		if ( class_exists( 'Caldera_Forms' ) ) {
			$forms = Caldera_Forms::get_forms();
			foreach ( $forms as $form ) {
				$caldera_forms[ $form['ID'] ] = esc_html( $form['name'] );
			}
		}
		if ( class_exists( 'WPCF7_ContactForm' ) ) {
			$cf7_args = array(
				'post_type'      => 'wpcf7_contact_form',
				'posts_per_page' => -1,
				'post_status'    => 'publish',
			);
			$forms    = get_posts( $cf7_args );
			foreach ( $forms as $form ) {
				$cf7_forms[ $form->ID ] = esc_html( $form->post_title );
			}
		}

		return array_merge( array(
				'form_type'                    => array(
					'label'            => esc_html__( 'Form Type', 'divi-plus' ),
					'type'             => 'select',
					'option_category'  => 'configuration',
					'options'          => array(
						'select'         => esc_html__( 'Select', 'divi-plus' ),
						'contact_form_7' => esc_html__( 'Contact Form 7', 'divi-plus' ),
						'caldera_form'   => esc_html__( 'Caldera Forms', 'divi-plus' ),
					),
					'default'          => 'select',
					'default_on_front' => 'select',
					'computed_affects' => array(
						'__form',
					),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'    => esc_html__( 'Here you can choose the form provider which you have used earlier to create your forms.', 'divi-plus' ),
				),
				'caldera_form_id'              => array(
					'label'            => esc_html__( 'Select Form', 'divi-plus' ),
					'type'             => 'select',
					'option_category'  => 'configuration',
					'options'          => $caldera_forms,
					'show_if'          => array(
						'form_type' => 'caldera_form',
					),
					'computed_affects' => array(
						'__form',
					),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'    => esc_html__( 'Here you can select the form you have created earlier using Caldera Form.', 'divi-plus' ),
				),
				'cf7_form_id'                  => array(
					'label'            => esc_html__( 'Select Form', 'divi-plus' ),
					'type'             => 'select',
					'option_category'  => 'configuration',
					'options'          => $cf7_forms,
					'show_if'          => array(
						'form_type' => 'contact_form_7',
					),
					'computed_affects' => array(
						'__form',
					),
					'tab_slug'         => 'general',
					'toggle_slug'      => 'main_content',
					'description'    => esc_html__( 'Here you can select the form you have created earlier using Contact Form 7.', 'divi-plus' ),
				),
				'input_text_color'             => array(
					'label'          => esc_html__( 'Input Text Color', 'divi-plus' ),
					'type'           => 'color-alpha',
					'mobile_options' => true,
					'hover'          => 'tabs',
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'input_fields',
					'description'    => esc_html__( 'Here you can select a custom color to be used for the input text of the contact form.', 'divi-plus' ),
				),
				'focus_input_text_color'       => array(
					'label'          => esc_html__( 'Focus Input Text Color', 'divi-plus' ),
					'type'           => 'color-alpha',
					'mobile_options' => true,
					'hover'          => 'tabs',
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'input_fields',
					'description'    => esc_html__( 'Here you can select a custom color to be used for the input text when entering it.', 'divi-plus' ),
				),
				'placeholder_text_color'       => array(
					'label'          => esc_html__( 'Placeholder Text Color', 'divi-plus' ),
					'type'           => 'color-alpha',
					'mobile_options' => true,
					'hover'          => 'tabs',
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'input_fields',
					'description'    => esc_html__( 'Here you can select a custom color to be used for the placeholder text when field is empty.', 'divi-plus' ),
				),
				'focus_placeholder_text_color' => array(
					'label'          => esc_html__( 'Focus Placeholder Text Color', 'divi-plus' ),
					'type'           => 'color-alpha',
					'mobile_options' => true,
					'hover'          => 'tabs',
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'input_fields',
					'description'    => esc_html__( 'Here you can select a custom color to be used for the placeholder text when entering it.', 'divi-plus' ),
				),
				'input_bg_color'               => array(
					'label'          => esc_html__( 'Background', 'divi-plus' ),
					'type'           => 'color-alpha',
					'mobile_options' => true,
					'hover'          => 'tabs',
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'input_fields',
					'description'    => esc_html__( 'Here you select a custom color to be used for the background of input fields when not selected.', 'divi-plus' ),
				),
				'input_focus_bg_color'         => array(
					'label'          => esc_html__( 'Focus Background', 'divi-plus' ),
					'type'           => 'color-alpha',
					'mobile_options' => true,
					'hover'          => 'tabs',
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'input_fields',
					'description'    => esc_html__( 'Here you select a custom color to be used for the background of input fields when selected.', 'divi-plus' ),
				),
				'input_custom_padding'         => array(
					'label'            => esc_html__( 'Padding', 'divi-plus' ),
					'type'             => 'custom_padding',
					'option_category'  => 'layout',
					'mobile_options'   => true,
					'default'          => '',
					'default_on_front' => '',
					'tab_slug'         => 'advanced',
					'toggle_slug'      => 'input_fields',
					'description'      => esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'divi-plus' ),
				),
				'use_custom_radio'             => array(
					'label'            => esc_html__( 'Use Custom Styling', 'divi-plus' ),
					'type'             => 'yes_no_button',
					'option_category'  => 'button',
					'options'          => array(
						'off' => esc_html__( 'No', 'divi-plus' ),
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
					),
					'default'          => 'off',
					'default_on_front' => 'off',
					'affects'          => array(
						'radio_label',
						'radio_label_text_align',
						'radio_label_font',
						'radio_label_font_size',
						'radio_label_letter_spacing',
						'radio_label_line_height',
						'radio_label_text_color',
						'radio_label_text_shadow',
					),
					'tab_slug'         => 'advanced',
					'toggle_slug'      => 'radio_fields',
					'description'      => esc_html__( 'Here you can choose whether or not to custom style radio buttons.', 'divi-plus' ),
				),
				'radio_size'                   => array(
					'label'            => esc_html__( 'Radio Button Size', 'divi-plus' ),
					'type'             => 'range',
					'option_category'  => 'layout',
					'range_settings'   => array(
						'min'  => '0',
						'max'  => '100',
						'step' => '1',
					),
					'validate_unit'    => true,
					'fixed_unit'       => 'px',
					'fixed_range'      => true,
					'default'          => '20px',
					'default_on_front' => '20px',
					'show_if'          => array(
						'use_custom_radio' => 'on',
					),
					'tab_slug'         => 'advanced',
					'toggle_slug'      => 'radio_fields',
					'description'      => esc_html__( 'Move the slider or input the value to increase or decrease the size of radio buttons.', 'divi-plus' ),
				),
				'radio_bg_color'               => array(
					'label'          => esc_html__( 'Background', 'divi-plus' ),
					'type'           => 'color-alpha',
					'mobile_options' => true,
					'hover'          => 'tabs',
					'show_if'        => array(
						'use_custom_radio' => 'on',
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'radio_fields',
					'description'    => esc_html__( 'Here you can select a custom color to be used for the background of radio buttons when not selected.', 'divi-plus' ),
				),
				'radio_checked_bg_color'       => array(
					'label'          => esc_html__( 'Checked Background', 'divi-plus' ),
					'type'           => 'color-alpha',
					'mobile_options' => true,
					'hover'          => 'tabs',
					'show_if'        => array(
						'use_custom_radio' => 'on',
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'radio_fields',
					'description'    => esc_html__( 'Here you can select a custom color to be used for the background of radio button when selected.', 'divi-plus' ),
				),
				'use_custom_checkbox'          => array(
					'label'            => esc_html__( 'Use Custom Styling', 'divi-plus' ),
					'type'             => 'yes_no_button',
					'option_category'  => 'button',
					'options'          => array(
						'off' => esc_html__( 'No', 'divi-plus' ),
						'on'  => esc_html__( 'Yes', 'divi-plus' ),
					),
					'default'          => 'off',
					'default_on_front' => 'off',
					'affects'          => array(
						'checkbox_label',
						'checkbox_label_text_align',
						'checkbox_label_font',
						'checkbox_label_font_size',
						'checkbox_label_letter_spacing',
						'checkbox_label_line_height',
						'checkbox_label_text_color',
						'checkbox_label_text_shadow',
					),
					'tab_slug'         => 'advanced',
					'toggle_slug'      => 'checkbox_fields',
					'description'      => esc_html__( 'Here you can choose whether or not to custom style checkboxes.', 'divi-plus' ),
				),
				'checkbox_size'                => array(
					'label'            => esc_html__( 'Checkbox Size', 'divi-plus' ),
					'type'             => 'range',
					'option_category'  => 'layout',
					'range_settings'   => array(
						'min'  => '0',
						'max'  => '100',
						'step' => '1',
					),
					'validate_unit'    => true,
					'fixed_unit'       => 'px',
					'fixed_range'      => true,
					'default'          => '20px',
					'default_on_front' => '20px',
					'show_if'          => array(
						'use_custom_checkbox' => 'on',
					),
					'tab_slug'         => 'advanced',
					'toggle_slug'      => 'checkbox_fields',
					'description'      => esc_html__( 'Move the slider or input the value to increase or decrease the size of checkboxes.', 'divi-plus' ),
				),
				'checkbox_bg_color'            => array(
					'label'          => esc_html__( 'Background', 'divi-plus' ),
					'type'           => 'color-alpha',
					'mobile_options' => true,
					'hover'          => 'tabs',
					'show_if'        => array(
						'use_custom_checkbox' => 'on',
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'checkbox_fields',
					'description'    => esc_html__( 'Here you can select a custom color to be used for the background of checkboxes when not selected.', 'divi-plus' ),
				),
				'checkbox_checked_bg_color'    => array(
					'label'          => esc_html__( 'Checked Background', 'divi-plus' ),
					'type'           => 'color-alpha',
					'mobile_options' => true,
					'hover'          => 'tabs',
					'show_if'        => array(
						'use_custom_checkbox' => 'on',
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'checkbox_fields',
					'description'    => esc_html__( 'Here you can select a custom color to be used for the background of checkbox when selected.', 'divi-plus' ),
				),
				'upload_bg_color'              => array(
					'label'          => esc_html__( 'Upload Field Background', 'divi-plus' ),
					'type'           => 'color-alpha',
					'hover'          => 'tabs',
					'mobile_options' => true,
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'upload_fields',
					'description'    => esc_html__( 'Here you select a custom color to be used for the background of upload fields.', 'divi-plus' ),
				),
				'upload_custom_padding'        => array(
					'label'            => esc_html__( 'Padding', 'divi-plus' ),
					'type'             => 'custom_padding',
					'option_category'  => 'layout',
					'mobile_options'   => true,
					'default'          => '',
					'default_on_front' => '',
					'tab_slug'         => 'advanced',
					'toggle_slug'      => 'upload_fields',
					'description'      => esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'divi-plus' ),
				),
				'button_custom_padding'        => array(
					'label'            => esc_html__( 'Padding', 'divi-plus' ),
					'type'             => 'custom_padding',
					'option_category'  => 'layout',
					'mobile_options'   => true,
					'default'          => '',
					'default_on_front' => '',
					'tab_slug'         => 'advanced',
					'toggle_slug'      => 'button_fields',
					'description'      => esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'divi-plus' ),
				),
				'submit_custom_padding'        => array(
					'label'            => esc_html__( 'Padding', 'divi-plus' ),
					'type'             => 'custom_padding',
					'option_category'  => 'layout',
					'mobile_options'   => true,
					'default'          => '',
					'default_on_front' => '',
					'tab_slug'         => 'advanced',
					'toggle_slug'      => 'submit_button',
					'description'      => esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'divi-plus' ),
				),
				'reset_custom_padding'        => array(
					'label'            => esc_html__( 'Padding', 'divi-plus' ),
					'type'             => 'custom_padding',
					'option_category'  => 'layout',
					'mobile_options'   => true,
					'default'          => '',
					'default_on_front' => '',
					'tab_slug'         => 'advanced',
					'toggle_slug'      => 'reset_button',
					'description'      => esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'divi-plus' ),
				),
				'buttons_bg_color'             => array(
					'label'          	=> esc_html__( 'Background', 'divi-plus' ),
					'type'              => 'background-field',
					'base_name'         => 'buttons_bg',
					'context'           => 'buttons_bg_color',
					'option_category'   => 'button',
					'custom_color'      => true,
					'background_fields' => $this->generate_background_options( 'buttons_bg', 'button', 'advanced', 'button_fields', 'buttons_bg_color' ),
					'hover'             => 'tabs',
					'mobile_options'    => true,
					'tab_slug'       	=> 'advanced',
					'toggle_slug'    	=> 'button_fields',
					'description'    	=> esc_html__( 'Adjust the background style of the button fields by customizing the background color, gradient, and image.', 'divi-plus' ),
				),
				'reset_bg_color'               => array(
					'label'          	=> esc_html__( 'Background', 'divi-plus' ),
					'type'              => 'background-field',
					'base_name'         => 'reset_bg',
					'context'           => 'reset_bg_color',
					'option_category'   => 'button',
					'custom_color'      => true,
					'background_fields' => $this->generate_background_options( 'reset_bg', 'button', 'advanced', 'reset_button', 'reset_bg_color' ),
					'hover'             => 'tabs',
					'mobile_options'    => true,
					'tab_slug'       	=> 'advanced',
					'toggle_slug'    	=> 'reset_button',
					'description'    	=> esc_html__( 'Adjust the background style of the reset button by customizing the background color, gradient, and image.', 'divi-plus' ),
				),
				'submit_bg_color'              => array(
					'label'          	=> esc_html__( 'Background', 'divi-plus' ),
					'type'              => 'background-field',
					'base_name'         => 'submit_bg',
					'context'           => 'submit_bg_color',
					'option_category'   => 'button',
					'custom_color'      => true,
					'background_fields' => $this->generate_background_options( 'submit_bg', 'button', 'advanced', 'submit_button', 'submit_bg_color' ),
					'hover'             => 'tabs',
					'mobile_options'    => true,
					'tab_slug'       	=> 'advanced',
					'toggle_slug'    	=> 'submit_button',
					'description'    	=> esc_html__( 'Adjust the background style of the submit button by customizing the background color, gradient, and image.', 'divi-plus' ),
				),
				'__form'                       => array(
					'type'                => 'computed',
					'computed_callback'   => array( 'DIPL_FormStyler', 'get_form' ),
					'computed_depends_on' => array(
						'form_type',
						'caldera_form_id',
						'cf7_form_id',
					),
				),
			),
			$this->generate_background_options( 'buttons_bg', 'skip', 'advanced', 'button_fields', 'buttons_bg_color' ),
			$this->generate_background_options( 'reset_bg', 'skip', 'advanced', 'reset_button', 'reset_bg_color' ),
			$this->generate_background_options( 'submit_bg', 'skip', 'advanced', 'submit_button', 'submit_bg_color' )
		);
	}

	public static function get_form( $args = array(), $conditional_tags = array(), $current_page = array() ) {
		$defaults = array(
			'form_type'       => 'select',
			'caldera_form_id' => '0',
			'cf7_form_id'     => '0',
		);

		$args = wp_parse_args( $args, $defaults );

		if ( 'contact_form_7' === $args['form_type'] ) {
			if ( '0' !== $args['cf7_form_id'] ) {
				$shortcode = '[contact-form-7 id="' . esc_attr( $args['cf7_form_id'] ) . '"]';
			}
		} elseif ( 'caldera_form' === $args['form_type'] ) {
			if ( '0' !== $args['caldera_form_id'] ) {
				$shortcode = '[caldera_form id="' . esc_attr( $args['caldera_form_id'] ) . '"]';
			}
		}

		if ( isset( $shortcode ) ) {
			$output = do_shortcode( $shortcode );
		} else {
			return '';
		}

		return $output;
	}

	public function render( $attrs, $content, $render_slug ) {

		$form_type = $this->props['form_type'];

		if ( 'contact_form_7' === $form_type ) {
			if ( '0' !== $this->props['cf7_form_id'] ) {
				$shortcode = '[contact-form-7 id="' . esc_attr( $this->props['cf7_form_id'] ) . '"]';
			}
		} elseif ( 'caldera_form' === $form_type ) {
			if ( '0' !== $this->props['caldera_form_id'] ) {
				$shortcode = '[caldera_form id="' . esc_attr( $this->props['caldera_form_id'] ) . '"]';
			}
		}

		if ( isset( $shortcode ) ) {
			$output = '<div class="dipl_form_styler_wrapper">' . do_shortcode( $shortcode ) . '</div>';
		} else {
			return '';
		}

		$input_fields = array(
			$this->main_css_element . ' .dipl_form_styler_wrapper form input[type="text"]',
			$this->main_css_element . ' .dipl_form_styler_wrapper form input[type="email"]',
			$this->main_css_element . ' .dipl_form_styler_wrapper form input[type="password"]',
			$this->main_css_element . ' .dipl_form_styler_wrapper form input[type="tel"]',
			$this->main_css_element . ' .dipl_form_styler_wrapper form input[type="url"]',
			$this->main_css_element . ' .dipl_form_styler_wrapper form input[type="time"]',
			$this->main_css_element . ' .dipl_form_styler_wrapper form input[type="week"]',
			$this->main_css_element . ' .dipl_form_styler_wrapper form input[type="month"]',
			$this->main_css_element . ' .dipl_form_styler_wrapper form input[type="datetime-local"]',
			$this->main_css_element . ' .dipl_form_styler_wrapper form input[type="number"]',
			$this->main_css_element . ' .dipl_form_styler_wrapper form input[type="date"]',
			$this->main_css_element . ' .dipl_form_styler_wrapper form select',
			$this->main_css_element . ' .dipl_form_styler_wrapper form textarea',
			$this->main_css_element . ' .dipl_form_styler_wrapper form .trumbowyg-editor-visible',
			$this->main_css_element . ' .dipl_form_styler_wrapper form .ccselect2-choice',
			$this->main_css_element . ' .dipl_form_styler_wrapper form input[type="credit_card_cvc"]',
		);

		$input_fields_hover       = preg_filter( '/$/', ':hover', $input_fields );
		$input_fields_focus       = preg_filter( '/$/', ':focus', $input_fields );
		$input_fields_focus_hover = preg_filter( '/$/', ':hover', $input_fields_focus );

		$radio_field            = $this->main_css_element . ' .dipl_form_styler_wrapper form input[type="radio"]';
		$checkbox_field         = $this->main_css_element . ' .dipl_form_styler_wrapper form input[type="checkbox"]';
		$radio_checked_field    = $this->main_css_element . ' .dipl_form_styler_wrapper form input[type="radio"]:checked::before';
		$checkbox_checked_field = $this->main_css_element . ' .dipl_form_styler_wrapper form input[type="checkbox"]:checked::before';
		$upload_field           = $this->main_css_element . ' .dipl_form_styler_wrapper form input[type="file"]';

		$button_field        = "{$this->main_css_element} .dipl_form_styler_wrapper form input[type='button'], {$this->main_css_element} .dipl_form_styler_wrapper form button";
		$reset_button_field  = "{$this->main_css_element} .dipl_form_styler_wrapper form input[type='reset'], {$this->main_css_element} .dipl_form_styler_wrapper form button[type='reset']";
		$submit_button_field = "{$this->main_css_element} .dipl_form_styler_wrapper form input[type='submit'], {$this->main_css_element} .dipl_form_styler_wrapper form button[type='submit']";

		$button_field_hover        = "{$this->main_css_element} .dipl_form_styler_wrapper form input[type='button']:hover, {$this->main_css_element} .dipl_form_styler_wrapper form button:hover";
		$reset_button_field_hover  = "{$this->main_css_element} .dipl_form_styler_wrapper form input[type='reset']:hover, {$this->main_css_element} .dipl_form_styler_wrapper form button[type='reset']:hover";
		$submit_button_field_hover = "{$this->main_css_element} .dipl_form_styler_wrapper form input[type='submit']:hover, {$this->main_css_element} .dipl_form_styler_wrapper form button[type='submit']:hover";

		$input_fields_placeholder        = preg_filter( '/$/', '::placeholder', $input_fields );
		$input_fields_webkit_placeholder = preg_filter( '/$/', '::-webkit-input-placeholder', $input_fields );
		$input_fields_moz_placeholder    = preg_filter( '/$/', '::-moz-placeholder', $input_fields );
		$input_fields_ms_placeholder     = preg_filter( '/$/', '::-ms-input-placeholder', $input_fields );
		$input_fields_placeholder        = array_merge(
			$input_fields_webkit_placeholder,
			$input_fields_moz_placeholder,
			$input_fields_ms_placeholder,
			$input_fields_placeholder
		);

		$input_fields_hover_placeholder        = preg_filter( '/$/', '::placeholder', $input_fields_hover );
		$input_fields_hover_webkit_placeholder = preg_filter( '/$/', '::-webkit-input-placeholder', $input_fields_hover );
		$input_fields_hover_moz_placeholder    = preg_filter( '/$/', '::-moz-placeholder', $input_fields_hover );
		$input_fields_hover_ms_placeholder     = preg_filter( '/$/', '::-ms-input-placeholder', $input_fields_hover );
		$input_fields_hover_placeholder        = array_merge(
			$input_fields_hover_webkit_placeholder,
			$input_fields_hover_moz_placeholder,
			$input_fields_hover_ms_placeholder,
			$input_fields_hover_placeholder
		);

		$input_fields_focus_placeholder        = preg_filter( '/$/', '::placeholder', $input_fields_focus );
		$input_fields_focus_webkit_placeholder = preg_filter( '/$/', '::-webkit-input-placeholder', $input_fields_focus );
		$input_fields_focus_moz_placeholder    = preg_filter( '/$/', '::-moz-placeholder', $input_fields_focus );
		$input_fields_focus_ms_placeholder     = preg_filter( '/$/', '::-ms-input-placeholder', $input_fields_focus );
		$input_fields_focus_placeholder        = array_merge(
			$input_fields_focus_webkit_placeholder,
			$input_fields_focus_moz_placeholder,
			$input_fields_focus_ms_placeholder,
			$input_fields_focus_placeholder
		);

		$input_fields_focus_hover_placeholder        = preg_filter( '/$/', '::placeholder', $input_fields_focus_hover );
		$input_fields_focus_hover_webkit_placeholder = preg_filter( '/$/', '::-webkit-input-placeholder', $input_fields_focus_hover );
		$input_fields_focus_hover_moz_placeholder    = preg_filter( '/$/', '::-moz-placeholder', $input_fields_focus_hover );
		$input_fields_focus_hover_ms_placeholder     = preg_filter( '/$/', '::-ms-input-placeholder', $input_fields_focus_hover );
		$input_fields_focus_hover_placeholder        = array_merge(
			$input_fields_focus_hover_webkit_placeholder,
			$input_fields_focus_hover_moz_placeholder,
			$input_fields_focus_hover_ms_placeholder,
			$input_fields_focus_hover_placeholder
		);

		/* Input Field Text Color */
		$input_text_colors = et_pb_responsive_options()->get_property_values( $this->props, 'input_text_color' );
		et_pb_responsive_options()->generate_responsive_css( $input_text_colors, implode( ', ', $input_fields ), 'color', $render_slug, '', 'color' );

		$input_text_color_hover = esc_html( $this->get_hover_value( 'input_text_color' ) );
		if ( $input_text_color_hover ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => implode( ', ', $input_fields_hover ),
					'declaration' => sprintf(
						'color: %s !important;',
						$input_text_color_hover
					),
				)
			);
		}

		/* Input Field Focus Text Color */
		$focus_input_text_colors = et_pb_responsive_options()->get_property_values( $this->props, 'focus_input_text_color' );
		et_pb_responsive_options()->generate_responsive_css( $focus_input_text_colors, implode( ', ', $input_fields_focus ), 'color', $render_slug, '', 'color' );

		$focus_input_text_color_hover = esc_html( $this->get_hover_value( 'focus_input_text_color' ) );
		if ( $focus_input_text_color_hover ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => implode( ', ', $input_fields_focus_hover ),
					'declaration' => sprintf(
						'color: %s !important;',
						$focus_input_text_color_hover
					),
				)
			);
		}

		/* Placeholder Text Color */
		$placeholder_text_colors = et_pb_responsive_options()->get_property_values( $this->props, 'placeholder_text_color' );
		et_pb_responsive_options()->generate_responsive_css( $placeholder_text_colors, implode( ', ', $input_fields_placeholder ), 'color', $render_slug, ' !important;', 'color' );

		$placeholder_text_color_hover = esc_html( $this->get_hover_value( 'placeholder_text_color' ) );
		if ( $placeholder_text_color_hover ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => implode( ', ', $input_fields_hover_placeholder ),
					'declaration' => sprintf(
						'color: %s !important;',
						$placeholder_text_color_hover
					),
				)
			);
		}

		/* Placeholder Focus Text Color */
		$focus_placeholder_text_colors = et_pb_responsive_options()->get_property_values( $this->props, 'focus_placeholder_text_color' );
		et_pb_responsive_options()->generate_responsive_css( $focus_placeholder_text_colors, implode( ', ', $input_fields_focus_placeholder ), 'color', $render_slug, ' !important;', 'color' );

		$focus_placeholder_text_color_hover = esc_html( $this->get_hover_value( 'focus_placeholder_text_color' ) );
		if ( $focus_placeholder_text_color_hover ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => implode( ', ', $input_fields_focus_hover_placeholder ),
					'declaration' => sprintf(
						'color: %s !important;',
						$focus_placeholder_text_color_hover
					),
				)
			);
		}

		/* Input Field Background Color */
		$input_bg_colors = et_pb_responsive_options()->get_property_values( $this->props, 'input_bg_color' );
		et_pb_responsive_options()->generate_responsive_css( $input_bg_colors, implode( ', ', $input_fields ), 'background-color', $render_slug, ' !important;', 'color' );
		et_pb_responsive_options()->generate_responsive_css( $input_bg_colors, $this->main_css_element . ' form .ccselect2-choice', 'background', $render_slug, ' !important;', 'color' );

		$input_bg_color_hover = esc_html( $this->get_hover_value( 'input_bg_color' ) );
		if ( $input_bg_color_hover ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => implode( ', ', $input_fields_hover ),
					'declaration' => sprintf(
						'background-color: %s !important;',
						$input_bg_color_hover
					),
				)
			);
			self::set_style(
				$render_slug,
				array(
					'selector'    => $this->main_css_element . ' form .ccselect2-choice:hover',
					'declaration' => sprintf(
						'background: %s !important;',
						$input_bg_color_hover
					),
				)
			);
		}

		/* Input Field Focus Background Color */
		$input_focus_bg_colors = et_pb_responsive_options()->get_property_values( $this->props, 'input_focus_bg_color' );
		et_pb_responsive_options()->generate_responsive_css( $input_focus_bg_colors, implode( ', ', $input_fields_focus ), 'background-color', $render_slug, ' !important;', 'color' );
		et_pb_responsive_options()->generate_responsive_css( $input_focus_bg_colors, $this->main_css_element . ' form .ccselect2-choice:focus', 'background', $render_slug, ' !important;', 'color' );

		$input_focus_bg_color_hover = esc_html( $this->get_hover_value( 'input_focus_bg_color' ) );
		if ( $input_focus_bg_color_hover ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => implode( ', ', $input_fields_focus_hover ),
					'declaration' => sprintf(
						'background-color: %s !important;',
						$input_focus_bg_color_hover
					),
				)
			);
			self::set_style(
				$render_slug,
				array(
					'selector'    => $this->main_css_element . ' form .ccselect2-choice:focus:hover',
					'declaration' => sprintf(
						'background: %s !important;',
						$input_focus_bg_color_hover
					),
				)
			);
		}

		if ( 'on' === $this->props['use_custom_checkbox'] ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => $checkbox_field,
					'declaration' => '-webkit-appearance: none; -moz-appearance: none; appearance: none; position: relative; border: 1px solid #333; vertical-align: middle; box-sizing: content-box;',
				)
			);

			self::set_style(
				$render_slug,
				array(
					'selector'    => $checkbox_checked_field,
					'declaration' => 'position: absolute; top: 0; left: 0; font-family: ETModules; content: "N"; line-height: 1;',
				)
			);

			$size_property  = array( 'width', 'height' );
			$checkbox_sizes = et_pb_responsive_options()->get_property_values( $this->props, 'checkbox_size' );
			et_pb_responsive_options()->generate_responsive_css( $checkbox_sizes, $checkbox_field, $size_property, $render_slug, '', 'range' );
			et_pb_responsive_options()->generate_responsive_css( $checkbox_sizes, $checkbox_checked_field, 'font-size', $render_slug, '', 'range' );

			$checkbox_bg_colors = et_pb_responsive_options()->get_property_values( $this->props, 'checkbox_bg_color' );
			et_pb_responsive_options()->generate_responsive_css( $checkbox_bg_colors, $checkbox_field, 'background-color', $render_slug, ' !important;', 'type' );

			$checkbox_checked_bg_colors = et_pb_responsive_options()->get_property_values( $this->props, 'checkbox_checked_bg_color' );
			et_pb_responsive_options()->generate_responsive_css( $checkbox_checked_bg_colors, $checkbox_field . ':checked', 'background-color', $render_slug, ' !important;', 'type' );

			$checkbox_bg_color_hover = esc_html( $this->get_hover_value( 'checkbox_bg_color' ) );
			if ( $checkbox_bg_color_hover ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => $checkbox_field . ':hover',
						'declaration' => sprintf(
							'background-color: %s !important;',
							$checkbox_bg_color_hover
						),
					)
				);
			}

			$checkbox_checked_bg_color_hover = esc_html( $this->get_hover_value( 'checkbox_checked_bg_color' ) );
			if ( $checkbox_checked_bg_color_hover ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => $checkbox_field . ':checked:hover',
						'declaration' => sprintf(
							'background-color: %s !important;',
							$checkbox_checked_bg_color_hover
						),
					)
				);
			}
		}

		if ( 'on' === $this->props['use_custom_radio'] ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => $radio_field,
					'declaration' => '-webkit-appearance: none; -moz-appearance: none; appearance: none; position: relative; border: 1px solid #333; vertical-align: middle; box-sizing: content-box;',
				)
			);

			self::set_style(
				$render_slug,
				array(
					'selector'    => $radio_checked_field,
					'declaration' => 'position: absolute; top: 3px; left: 3px; background: #000; width: calc(100% - 6px); height: calc(100% - 6px); border-radius: inherit; content: "";',
				)
			);

			$size_property = array( 'width', 'height' );
			$radio_sizes   = et_pb_responsive_options()->get_property_values( $this->props, 'radio_size' );
			et_pb_responsive_options()->generate_responsive_css( $radio_sizes, $radio_field, $size_property, $render_slug, '', 'range' );

			$radio_bg_colors = et_pb_responsive_options()->get_property_values( $this->props, 'radio_bg_color' );
			et_pb_responsive_options()->generate_responsive_css( $radio_bg_colors, $radio_field, 'background-color', $render_slug, ' !important;', 'type' );

			$radio_checked_bg_colors = et_pb_responsive_options()->get_property_values( $this->props, 'radio_checked_bg_color' );
			et_pb_responsive_options()->generate_responsive_css( $radio_checked_bg_colors, $radio_field . ':checked:before', 'background-color', $render_slug, ' !important;', 'type' );

			$radio_bg_color_hover = esc_html( $this->get_hover_value( 'radio_bg_color' ) );
			if ( $radio_bg_color_hover ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => $radio_field . ':hover',
						'declaration' => sprintf(
							'background-color: %s !important;',
							$radio_bg_color_hover
						),
					)
				);
			}

			$radio_checked_bg_color_hover = esc_html( $this->get_hover_value( 'radio_checked_bg_color' ) );
			if ( $radio_checked_bg_color_hover ) {
				self::set_style(
					$render_slug,
					array(
						'selector'    => $radio_field . ':checked:hover',
						'declaration' => sprintf(
							'background-color: %s !important;',
							$radio_checked_bg_color_hover
						),
					)
				);
			}
		}

		/* Upload Button */
		$upload_bg_colors = et_pb_responsive_options()->get_property_values( $this->props, 'upload_bg_color' );
		et_pb_responsive_options()->generate_responsive_css( $upload_bg_colors, $upload_field, 'background-color', $render_slug, ' !important;', 'color' );
		$upload_bg_color_hover = esc_html( $this->get_hover_value( 'upload_bg_color' ) );
		if ( $upload_bg_color_hover ) {
			self::set_style(
				$render_slug,
				array(
					'selector'    => $upload_field . ':hover',
					'declaration' => sprintf(
						'background-color: %s !important;',
						$upload_bg_color_hover
					),
				)
			);
		}



		$options = array(
			'normal' => array(
				'buttons_bg'	=> $button_field,
				'reset_bg'      => $reset_button_field,
				'submit_bg'    	=> $submit_button_field,
			),
			'hover' => array(
				'buttons_bg'	=> $button_field_hover,
				'reset_bg'      => $reset_button_field_hover,
				'submit_bg'    	=> $submit_button_field_hover,
			),
		);

		$this->process_advanced_margin_padding_css( $this, $render_slug, $this->margin_padding );
		$this->process_custom_background( $render_slug, $options );

		$file = et_is_builder_plugin_active() ? 'style-dbp' : 'style';
        wp_enqueue_style( 'dipl-form-styler-style', PLUGIN_PATH . 'includes/modules/FormStyler/' . $file . '.min.css', array(), '1.0.0' );

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

		$allowed_advanced_fields = array( 'form_margin_padding' );
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

}
$plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
if ( isset( $plugin_options['dipl-modules'] ) ) {
	$modules = explode( ',', $plugin_options['dipl-modules'] );
	if ( in_array( 'dipl_form_styler', $modules, true ) ) {
		new DIPL_FormStyler();
	}
} else {
	new DIPL_FormStyler();
}
