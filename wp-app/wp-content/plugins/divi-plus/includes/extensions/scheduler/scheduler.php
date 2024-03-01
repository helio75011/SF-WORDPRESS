<?php
require_once plugin_dir_path( __DIR__ ) . 'extensions.php';

class DIPL_Scheduler extends DIPL_Extensions {

	public function __construct() {
		$scheduler_areas = $this->dipl_get_option( 'dipl-scheduler-areas' );
		$scheduler_areas = explode( ',', $scheduler_areas );
		if ( in_array( 'sections', $scheduler_areas ) ) {
			add_filter( 'et_pb_all_fields_unprocessed_et_pb_section', array( $this, 'dipl_add_scheduler_props' ) );
			add_filter( 'et_module_shortcode_output', array( $this, 'dipl_scheduler_section_output' ), 10, 3 );
		}
		if ( in_array( 'rows', $scheduler_areas ) ) {
			add_filter( 'et_pb_all_fields_unprocessed_et_pb_row', array( $this, 'dipl_add_scheduler_props' ) );
			add_filter( 'et_module_shortcode_output', array( $this, 'dipl_scheduler_row_output' ), 10, 3 );
		}
		if ( in_array( 'columns', $scheduler_areas ) ) {
			add_filter( 'et_pb_all_fields_unprocessed_et_pb_column', array( $this, 'dipl_add_scheduler_props' ) );
			add_filter( 'et_module_shortcode_output', array( $this, 'dipl_scheduler_column_output' ), 10, 3 );
		}
		if ( in_array( 'modules', $scheduler_areas ) ) {
			$dipl_modules = $this->dipl_get_modules();
			foreach ( $dipl_modules as $dipl_module ) {
				$dipl_module = esc_attr( $dipl_module );
				add_filter( 'et_pb_all_fields_unprocessed_' . $dipl_module, array( $this, 'dipl_add_scheduler_props' ) );
			}
			add_filter( 'et_module_shortcode_output', array( $this, 'dipl_scheduler_module_output' ), 10, 3 );
		}
	}

	public function dipl_add_scheduler_props( $fields_unprocessed ) {
		$fields_unprocessed['dipl_enable_scheduler'] = array(
			'label'            	=> esc_html__( 'Enable Scheduler', 'divi-plus' ),
			'type'             	=> 'yes_no_button',
			'option_category'  	=> 'configuration',
			'options'          	=> array(
				'off' => esc_html__( 'No', 'divi-plus' ),
				'on'  => esc_html__( 'Yes', 'divi-plus' ),
			),
			'default' 			=> 'off',
			'default_on_front' 	=> 'off',
			'tab_slug'         	=> 'custom_css',
			'toggle_slug'      	=> 'visibility',
			'description'      	=> esc_html__( 'Here you can choose whether it will show or hide on the scheduled date or time.', 'divi-plus' ),
		);
		$fields_unprocessed['dipl_scheduler_show_hide'] = array(
			'label'            	=> esc_html__( 'Show or Hide', 'divi-plus' ),
			'type'             	=> 'select',
			'option_category'  	=> 'configuration',
			'options'          	=> array(
				'show' 	=> esc_html__( 'Show', 'divi-plus' ),
				'hide'  => esc_html__( 'Hide', 'divi-plus' ),
			),
			'show_if'          	=> array(
				'dipl_enable_scheduler' => 'on',
			),
			'default'     		=> 'show',
			'default_on_front' 	=> 'show',
			'tab_slug'         	=> 'custom_css',
			'toggle_slug'      	=> 'visibility',
			'description'      	=> esc_html__( 'Here you can choose whether to show or hide it.', 'divi-plus' ),
		);
		$fields_unprocessed['dipl_scheduler_dates'] = array(
			'label'            	=> esc_html__( 'Dates', 'divi-plus' ),
			'type'             	=> 'select',
			'option_category'  	=> 'configuration',
			'options'          	=> array(
				'from_date' 		=> esc_html__( 'From Date', 'divi-plus' ),
				'between_dates'  	=> esc_html__( 'Between Dates', 'divi-plus' ),
			),
			'show_if'          	=> array(
				'dipl_enable_scheduler' => 'on',
			),
			'default'     		=> 'from_date',
			'default_on_front' 	=> 'from_date',
			'tab_slug'         	=> 'custom_css',
			'toggle_slug'      	=> 'visibility',
			'description'      	=> esc_html__( 'Here you can choose the option for dates.', 'divi-plus' ),
		);
		$fields_unprocessed['dipl_scheduler_from_datetime'] = array(
			'label'       	=> esc_html__( 'From Date and Time', 'divi-plus' ),
			'type'        	=> 'date_picker',
			'show_if'     	=> array(
				'dipl_enable_scheduler'	=> 'on',
				'dipl_scheduler_dates'	=> 'from_date',
			),
			'default'     	=> '',
			'tab_slug'    	=> 'custom_css',
			'toggle_slug' 	=> 'visibility',
			'description'   => esc_html__( 'Here you can choose From date and time.', 'divi-plus' ),
		);
		$fields_unprocessed['dipl_scheduler_start_datetime'] = array(
			'label'       	=> esc_html__( 'Start Date and Time', 'divi-plus' ),
			'type'        	=> 'date_picker',
			'show_if'     	=> array(
				'dipl_enable_scheduler'	=> 'on',
				'dipl_scheduler_dates'	=> 'between_dates',
			),
			'default'     	=> '',
			'tab_slug'    	=> 'custom_css',
			'toggle_slug' 	=> 'visibility',
			'description'   => esc_html__( 'Here you can choose start date and time.', 'divi-plus' ),
		);
		$fields_unprocessed['dipl_scheduler_end_datetime'] = array(
			'label'       	=> esc_html__( 'End Date and Time', 'divi-plus' ),
			'type'        	=> 'date_picker',
			'show_if'     	=> array(
				'dipl_enable_scheduler'	=> 'on',
				'dipl_scheduler_dates'	=> 'between_dates',
			),
			'default'     	=> '',
			'tab_slug'    	=> 'custom_css',
			'toggle_slug' 	=> 'visibility',
			'description'   => esc_html__( 'Here you can choose end date and time.', 'divi-plus' ),
		);
		return $fields_unprocessed;
	}

	public function dipl_scheduler_section_output( $output, $render_slug, $section ) {
		if ( 'et_pb_section' !== $render_slug ) {
			return $output;
		}

		if ( is_array( $output ) ) {
			return $output;
		}
		
		if ( isset( $section->props['dipl_enable_scheduler'] ) && 'on' === $section->props['dipl_enable_scheduler'] ) {
			$dipl_scheduler_show_hide       = $section->props['dipl_scheduler_show_hide'];
			$dipl_scheduler_dates  			= $section->props['dipl_scheduler_dates'];
			$dipl_site_current_date   		= wp_date( 'Y-m-d H:i:s' );

			if ( 'from_date' === $dipl_scheduler_dates ) {
				$dipl_scheduler_from_datetime = $section->props['dipl_scheduler_from_datetime'];
				if ( $dipl_site_current_date >= $dipl_scheduler_from_datetime ) {
					if ( 'show' === $dipl_scheduler_show_hide ) {
						return $output;
					} else {
						return '';
					}
				} else {
					if ( 'show' === $dipl_scheduler_show_hide ) {
						return '';
					} else {
						return $output;
					}
				}
			}

			if ( 'between_dates' === $dipl_scheduler_dates ) {
				$dipl_scheduler_start_datetime	= $section->props['dipl_scheduler_start_datetime'];
				$dipl_scheduler_end_datetime  	= $section->props['dipl_scheduler_end_datetime'];

				if ( $dipl_site_current_date >= $dipl_scheduler_start_datetime && $dipl_site_current_date <= $dipl_scheduler_end_datetime ) {
					if ( 'show' === $dipl_scheduler_show_hide ) {
						return $output;
					} else {
						return '';
					}
				} else {
					if ( 'show' === $dipl_scheduler_show_hide ) {
						return '';
					} else {
						return $output;
					}
				}
			}
		}

		return $output;
	}

	public function dipl_scheduler_row_output( $output, $render_slug, $row ) {
		if ( 'et_pb_row' !== $render_slug ) {
			return $output;
		}

		if ( is_array( $output ) ) {
			return $output;
		}
			
		if ( isset( $row->props['dipl_enable_scheduler'] ) && 'on' === $row->props['dipl_enable_scheduler'] ) {
			$dipl_scheduler_show_hide       = $row->props['dipl_scheduler_show_hide'];
			$dipl_scheduler_dates  			= $row->props['dipl_scheduler_dates'];
			$dipl_site_current_date   		= wp_date( 'Y-m-d H:i:s' );

			if ( 'from_date' === $dipl_scheduler_dates ) {
				$dipl_scheduler_from_datetime = $row->props['dipl_scheduler_from_datetime'];
				if ( $dipl_site_current_date >= $dipl_scheduler_from_datetime ) {
					if ( 'show' === $dipl_scheduler_show_hide ) {
						return $output;
					} else {
						return '';
					}
				} else {
					if ( 'show' === $dipl_scheduler_show_hide ) {
						return '';
					} else {
						return $output;
					}
				}
			}

			if ( 'between_dates' === $dipl_scheduler_dates ) {
				$dipl_scheduler_start_datetime	= $row->props['dipl_scheduler_start_datetime'];
				$dipl_scheduler_end_datetime  	= $row->props['dipl_scheduler_end_datetime'];

				if ( $dipl_site_current_date >= $dipl_scheduler_start_datetime && $dipl_site_current_date <= $dipl_scheduler_end_datetime ) {
					if ( 'show' === $dipl_scheduler_show_hide ) {
						return $output;
					} else {
						return '';
					}
				} else {
					if ( 'show' === $dipl_scheduler_show_hide ) {
						return '';
					} else {
						return $output;
					}
				}
			}
		}

		return $output;
	}

	public function dipl_scheduler_column_output( $output, $render_slug, $column ) {
		if ( 'et_pb_column' !== $render_slug ) {
			return $output;
		}

		if ( is_array( $output ) ) {
			return $output;
		}

		if ( isset( $column->props['dipl_enable_scheduler'] ) && 'on' === $column->props['dipl_enable_scheduler'] ) {
			$dipl_scheduler_show_hide       = $column->props['dipl_scheduler_show_hide'];
			$dipl_scheduler_dates  			= $column->props['dipl_scheduler_dates'];
			$dipl_site_current_date   		= wp_date( 'Y-m-d H:i:s' );

			if ( 'from_date' === $dipl_scheduler_dates ) {
				$dipl_scheduler_from_datetime = $column->props['dipl_scheduler_from_datetime'];
				if ( $dipl_site_current_date >= $dipl_scheduler_from_datetime ) {
					if ( 'show' === $dipl_scheduler_show_hide ) {
						return $output;
					} else {
						return '';
					}
				} else {
					if ( 'show' === $dipl_scheduler_show_hide ) {
						return '';
					} else {
						return $output;
					}
				}
			}

			if ( 'between_dates' === $dipl_scheduler_dates ) {
				$dipl_scheduler_start_datetime	= $column->props['dipl_scheduler_start_datetime'];
				$dipl_scheduler_end_datetime  	= $column->props['dipl_scheduler_end_datetime'];

				if ( $dipl_site_current_date >= $dipl_scheduler_start_datetime && $dipl_site_current_date <= $dipl_scheduler_end_datetime ) {
					if ( 'show' === $dipl_scheduler_show_hide ) {
						return $output;
					} else {
						return '';
					}
				} else {
					if ( 'show' === $dipl_scheduler_show_hide ) {
						return '';
					} else {
						return $output;
					}
				}
			}
		}

		return $output;
	}

	public function dipl_scheduler_module_output( $output, $render_slug, $module ) {
		$dipl_modules = $this->dipl_get_modules();
		
		if ( ! in_array( $render_slug, $dipl_modules, true ) ) {
			return $output;
		}

		if ( is_array( $output ) ) {
			return $output;
		}

		if ( isset( $module->props['dipl_enable_scheduler'] ) && 'on' === $module->props['dipl_enable_scheduler'] ) {
			$dipl_scheduler_show_hide       = $module->props['dipl_scheduler_show_hide'];
			$dipl_scheduler_dates  			= $module->props['dipl_scheduler_dates'];
			$dipl_site_current_date   		= wp_date( 'Y-m-d H:i:s' );

			if ( 'from_date' === $dipl_scheduler_dates ) {
				$dipl_scheduler_from_datetime = $module->props['dipl_scheduler_from_datetime'];
				if ( $dipl_site_current_date >= $dipl_scheduler_from_datetime ) {
					if ( 'show' === $dipl_scheduler_show_hide ) {
						return $output;
					} else {
						return '';
					}
				} else {
					if ( 'show' === $dipl_scheduler_show_hide ) {
						return '';
					} else {
						return $output;
					}
				}
			}

			if ( 'between_dates' === $dipl_scheduler_dates ) {
				$dipl_scheduler_start_datetime	= $module->props['dipl_scheduler_start_datetime'];
				$dipl_scheduler_end_datetime  	= $module->props['dipl_scheduler_end_datetime'];

				if ( $dipl_site_current_date >= $dipl_scheduler_start_datetime && $dipl_site_current_date <= $dipl_scheduler_end_datetime ) {
					if ( 'show' === $dipl_scheduler_show_hide ) {
						return $output;
					} else {
						return '';
					}
				} else {
					if ( 'show' === $dipl_scheduler_show_hide ) {
						return '';
					} else {
						return $output;
					}
				}
			}
		}
		
		return $output;
	}
}
new DIPL_Scheduler;