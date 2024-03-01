<?php
require_once plugin_dir_path( __DIR__ ) . 'extensions.php';

class DIPL_Visibility_Manager extends DIPL_Extensions {

	public function __construct() {
		$visibility_manager_areas = $this->dipl_get_option( 'dipl-visibility-manager-areas' );
		$visibility_manager_areas = explode( ',', $visibility_manager_areas );
		if ( in_array( 'sections', $visibility_manager_areas ) ) {
			add_filter( 'et_pb_all_fields_unprocessed_et_pb_section', array( $this, 'dipl_add_visibility_manager_props' ) );
			add_filter( 'et_module_shortcode_output', array( $this, 'dipl_visibility_manager_section_output' ), 10, 3 );
		}
		if ( in_array( 'rows', $visibility_manager_areas ) ) {
			add_filter( 'et_pb_all_fields_unprocessed_et_pb_row', array( $this, 'dipl_add_visibility_manager_props' ) );
			add_filter( 'et_module_shortcode_output', array( $this, 'dipl_visibility_manager_row_output' ), 10, 3 );
		}
		if ( in_array( 'columns', $visibility_manager_areas ) ) {
			add_filter( 'et_pb_all_fields_unprocessed_et_pb_column', array( $this, 'dipl_add_visibility_manager_props' ) );
			add_filter( 'et_module_shortcode_output', array( $this, 'dipl_visibility_manager_column_output' ), 10, 3 );
		}
		if ( in_array( 'modules', $visibility_manager_areas ) ) {
			$dipl_modules = $this->dipl_get_modules();
			foreach ( $dipl_modules as $dipl_module ) {
				$dipl_module = esc_attr( $dipl_module );
				add_filter( 'et_pb_all_fields_unprocessed_' . $dipl_module, array( $this, 'dipl_add_visibility_manager_props' ) );
			}
			add_filter( 'et_module_shortcode_output', array( $this, 'dipl_visibility_manager_module_output' ), 10, 3 );
		}
	}

	public function dipl_add_visibility_manager_props( $fields_unprocessed ) {
		$fields_unprocessed['dipl_enable_visibility_manager'] = array(
			'label'            => esc_html__( 'Enable visibility Manager', 'divi-plus' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'divi-plus' ),
				'on'  => esc_html__( 'Yes', 'divi-plus' ),
			),
			'default_on_front' => 'off',
			'tab_slug'         => 'custom_css',
			'toggle_slug'      => 'visibility',
			'description'      => esc_html__( 'Here you can choose whether it will be visible or not.', 'divi-plus' ),
		);
		$fields_unprocessed['dipl_visibility_manager_show_hide'] = array(
			'label'            	=> esc_html__( 'Show or Hide', 'divi-plus' ),
			'type'             	=> 'select',
			'option_category'  	=> 'configuration',
			'options'          	=> array(
				'show' 	=> esc_html__( 'Show', 'divi-plus' ),
				'hide'  => esc_html__( 'Hide', 'divi-plus' ),
			),
			'show_if'          	=> array(
				'dipl_enable_visibility_manager' => 'on',
			),
			'default'     		=> 'show',
			'default_on_front' 	=> 'show',
			'tab_slug'         	=> 'custom_css',
			'toggle_slug'      	=> 'visibility',
			'description'      	=> esc_html__( 'Here you can choose whether to show or hide it.', 'divi-plus' ),
		);
		$fields_unprocessed['dipl_visibility_manager_users'] = array(
			'label'            	=> esc_html__( 'Set visibility for', 'divi-plus' ),
			'type'             	=> 'select',
			'option_category'  	=> 'configuration',
			'options'          	=> array(
				'all'       	=> esc_html__( 'All Users', 'divi-plus' ),
				'logged-in' 	=> esc_html__( 'Logged In Users', 'divi-plus' ),
				'logged-out'  	=> esc_html__( 'Logged Out Users', 'divi-plus' ),
			),
			'show_if'          	=> array(
				'dipl_enable_visibility_manager' => 'on',
			),
			'default_on_front' 	=> 'all',
			'tab_slug'         	=> 'custom_css',
			'toggle_slug'      	=> 'visibility',
			'description'      	=> esc_html__( 'Here you can choose whether to show or hide it for paticular set of users.', 'divi-plus' ),
		);
		$fields_unprocessed['dipl_visibility_manager_user_roles']      = array(
			'label'           	=> esc_html__( 'User Roles', 'divi-plus' ),
			'type'             	=> 'select',
			'option_category'  	=> 'configuration',
			'options'         	=> $this->dipl_get_wp_user_roles(),
			'show_if'         	=> array(
				'dipl_enable_visibility_manager'	=> 'on',
				'dipl_visibility_manager_users' 	=> 'logged-in',
			),
			'default' 			=> 'all',
			'default_on_front' 	=> 'all',
			'tab_slug'        	=> 'custom_css',
			'toggle_slug'     	=> 'visibility',
			'description'      	=> esc_html__( 'Here you can choose whether to show or hide it for paticular set of user role users.', 'divi-plus' ),
		);
		return $fields_unprocessed;
	}

	public function dipl_visibility_manager_section_output( $output, $render_slug, $section ) {
		if ( 'et_pb_section' !== $render_slug ) {
			return $output;
		}

		if ( is_array( $output ) ) {
			return $output;
		}

		if ( isset( $section->props['dipl_enable_visibility_manager'] ) && 'on' === $section->props['dipl_enable_visibility_manager'] ) {
			$dipl_visibility_manager_show_hide 	= $section->props['dipl_visibility_manager_show_hide'];
			$dipl_visibility_manager_users  	= $section->props['dipl_visibility_manager_users'];
			$dipl_visibility_manager_user_roles = $section->props['dipl_visibility_manager_user_roles'];

			if ( 'logged-in' === $dipl_visibility_manager_users ) {
				if ( is_user_logged_in() ) {
					$current_user = wp_get_current_user();
					if (
						$current_user->roles[0] === $dipl_visibility_manager_user_roles ||
						'all' === $dipl_visibility_manager_user_roles
					) {
						if ( 'show' === $dipl_visibility_manager_show_hide ) {
							return $output;
						} else {
							return '';
						}
					} else {
						if ( 'show' === $dipl_visibility_manager_show_hide ) {
							return '';
						} else {
							return $output;
						}
					}
				} else {
					if ( 'show' === $dipl_visibility_manager_show_hide ) {
						return '';
					} else {
						return $output;
					}
				}
			} else if ( 'logged-out' === $dipl_visibility_manager_users ) {
				if ( ! is_user_logged_in() ) {
					if ( 'show' === $dipl_visibility_manager_show_hide ) {
						return $output;
					} else {
						return '';
					}
				} else {
					if ( 'show' === $dipl_visibility_manager_show_hide ) {
						return '';
					} else {
						return $output;
					}
				}
			} else {
				if ( 'show' === $dipl_visibility_manager_show_hide ) {
					return $output;
				} else {
					return '';
				}
			}
		}

		return $output;
	}

	public function dipl_visibility_manager_row_output( $output, $render_slug, $row ) {
		if ( 'et_pb_row' !== $render_slug ) {
			return $output;
		}

		if ( is_array( $output ) ) {
			return $output;
		}

		if ( isset( $row->props['dipl_enable_visibility_manager'] ) && 'on' === $row->props['dipl_enable_visibility_manager'] ) {
			$dipl_visibility_manager_show_hide 	= $row->props['dipl_visibility_manager_show_hide'];
			$dipl_visibility_manager_users  	= $row->props['dipl_visibility_manager_users'];
			$dipl_visibility_manager_user_roles = $row->props['dipl_visibility_manager_user_roles'];

			if ( 'logged-in' === $dipl_visibility_manager_users ) {
				if ( is_user_logged_in() ) {
					$current_user = wp_get_current_user();
					if (
						$current_user->roles[0] === $dipl_visibility_manager_user_roles ||
						'all' === $dipl_visibility_manager_user_roles
					) {
						if ( 'show' === $dipl_visibility_manager_show_hide ) {
							return $output;
						} else {
							return '';
						}
					} else {
						if ( 'show' === $dipl_visibility_manager_show_hide ) {
							return '';
						} else {
							return $output;
						}
					}
				} else {
					if ( 'show' === $dipl_visibility_manager_show_hide ) {
						return '';
					} else {
						return $output;
					}
				}
			} else if ( 'logged-out' === $dipl_visibility_manager_users ) {
				if ( ! is_user_logged_in() ) {
					if ( 'show' === $dipl_visibility_manager_show_hide ) {
						return $output;
					} else {
						return '';
					}
				} else {
					if ( 'show' === $dipl_visibility_manager_show_hide ) {
						return '';
					} else {
						return $output;
					}
				}
			} else {
				if ( 'show' === $dipl_visibility_manager_show_hide ) {
					return $output;
				} else {
					return '';
				}
			}
		}

		return $output;
	}

	public function dipl_visibility_manager_column_output( $output, $render_slug, $column ) {
		if ( 'et_pb_column' !== $render_slug ) {
			return $output;
		}

		if ( is_array( $output ) ) {
			return $output;
		}

		if ( isset( $column->props['dipl_enable_visibility_manager'] ) && 'on' === $column->props['dipl_enable_visibility_manager'] ) {
			$dipl_visibility_manager_show_hide 	= $column->props['dipl_visibility_manager_show_hide'];
			$dipl_visibility_manager_users  	= $column->props['dipl_visibility_manager_users'];
			$dipl_visibility_manager_user_roles = $column->props['dipl_visibility_manager_user_roles'];

			if ( 'logged-in' === $dipl_visibility_manager_users ) {
				if ( is_user_logged_in() ) {
					$current_user = wp_get_current_user();
					if (
						$current_user->roles[0] === $dipl_visibility_manager_user_roles ||
						'all' === $dipl_visibility_manager_user_roles
					) {
						if ( 'show' === $dipl_visibility_manager_show_hide ) {
							return $output;
						} else {
							return '';
						}
					} else {
						if ( 'show' === $dipl_visibility_manager_show_hide ) {
							return '';
						} else {
							return $output;
						}
					}
				} else {
					if ( 'show' === $dipl_visibility_manager_show_hide ) {
						return '';
					} else {
						return $output;
					}
				}
			} else if ( 'logged-out' === $dipl_visibility_manager_users ) {
				if ( ! is_user_logged_in() ) {
					if ( 'show' === $dipl_visibility_manager_show_hide ) {
						return $output;
					} else {
						return '';
					}
				} else {
					if ( 'show' === $dipl_visibility_manager_show_hide ) {
						return '';
					} else {
						return $output;
					}
				}
			} else {
				if ( 'show' === $dipl_visibility_manager_show_hide ) {
					return $output;
				} else {
					return '';
				}
			}
		}

		return $output;
	}

	public function dipl_visibility_manager_module_output( $output, $render_slug, $module ) {
		$dipl_modules = $this->dipl_get_modules();
		
		if ( ! in_array( $render_slug, $dipl_modules, true ) ) {
			return $output;
		}

		if ( is_array( $output ) ) {
			return $output;
		}

		if ( isset( $module->props['dipl_enable_visibility_manager'] ) && 'on' === $module->props['dipl_enable_visibility_manager'] ) {
			$dipl_visibility_manager_show_hide 	= $module->props['dipl_visibility_manager_show_hide'];
			$dipl_visibility_manager_users  	= $module->props['dipl_visibility_manager_users'];
			$dipl_visibility_manager_user_roles = $module->props['dipl_visibility_manager_user_roles'];

			if ( 'logged-in' === $dipl_visibility_manager_users ) {
				if ( is_user_logged_in() ) {
					$current_user = wp_get_current_user();
					if (
						$current_user->roles[0] === $dipl_visibility_manager_user_roles ||
						'all' === $dipl_visibility_manager_user_roles
					) {
						if ( 'show' === $dipl_visibility_manager_show_hide ) {
							return $output;
						} else {
							return '';
						}
					} else {
						if ( 'show' === $dipl_visibility_manager_show_hide ) {
							return '';
						} else {
							return $output;
						}
					}
				} else {
					if ( 'show' === $dipl_visibility_manager_show_hide ) {
						return '';
					} else {
						return $output;
					}
				}
			} else if ( 'logged-out' === $dipl_visibility_manager_users ) {
				if ( ! is_user_logged_in() ) {
					if ( 'show' === $dipl_visibility_manager_show_hide ) {
						return $output;
					} else {
						return '';
					}
				} else {
					if ( 'show' === $dipl_visibility_manager_show_hide ) {
						return '';
					} else {
						return $output;
					}
				}
			} else {
				if ( 'show' === $dipl_visibility_manager_show_hide ) {
					return $output;
				} else {
					return '';
				}
			}
		}

		return $output;
	}

}
new DIPL_Visibility_Manager;