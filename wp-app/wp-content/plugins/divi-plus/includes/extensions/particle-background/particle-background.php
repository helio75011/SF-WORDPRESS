<?php
require_once plugin_dir_path( __DIR__ ) . 'extensions.php';

class DIPL_Particle_Background extends DIPL_Extensions {

	public function __construct() {
		$particle_background_areas = $this->dipl_get_option( 'dipl-particle-background-areas' );
		$particle_background_areas = explode( ',', $particle_background_areas );
		if ( in_array( 'sections', $particle_background_areas ) ) {
			add_filter( 'et_pb_all_fields_unprocessed_et_pb_section', array( $this, 'dipl_add_particle_background_props' ) );
			add_filter( 'et_module_shortcode_output', array( $this, 'dipl_particle_background_section_output' ), 10, 3 );
		}
		if ( in_array( 'rows', $particle_background_areas ) ) {
			add_filter( 'et_pb_all_fields_unprocessed_et_pb_row', array( $this, 'dipl_add_particle_background_props' ) );
			add_filter( 'et_module_shortcode_output', array( $this, 'dipl_particle_background_row_output' ), 10, 3 );
		}
		if ( in_array( 'columns', $particle_background_areas ) ) {
			add_filter( 'et_pb_all_fields_unprocessed_et_pb_column', array( $this, 'dipl_add_particle_background_props' ) );
			add_filter( 'et_module_shortcode_output', array( $this, 'dipl_particle_background_column_output' ), 10, 3 );
		}
		if ( in_array( 'modules', $particle_background_areas ) ) {
			$dipl_modules = $this->dipl_get_modules();
			foreach ( $dipl_modules as $dipl_module ) {
				$dipl_module = esc_attr( $dipl_module );
				add_filter( 'et_pb_all_fields_unprocessed_' . $dipl_module, array( $this, 'dipl_add_particle_background_props' ) );
			}
			add_filter( 'et_module_shortcode_output', array( $this, 'dipl_particle_background_module_output' ), 10, 3 );
		}
	}

	public function dipl_add_particle_background_props( $fields_unprocessed ) {
		$fields_unprocessed['dipl_enable_particle_background'] = array(
			'label'            => esc_html__( 'Enable Particle Background', 'divi-plus' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'divi-plus' ),
				'on'  => esc_html__( 'Yes', 'divi-plus' ),
			),
			'default_on_front' => 'off',
			'tab_slug'         => 'general',
			'toggle_slug'      => 'background',
			'description'      => esc_html__( 'Here you can choose whether to use particle background.', 'divi-plus' ),
		);
		$fields_unprocessed['dipl_particle_type'] = array(
			'label'				=> esc_html__( 'Particle Type', 'divi-plus' ),
			'type'             	=> 'select',
			'option_category'  	=> 'configuration',
			'options'          	=> array(
				'circle'	=> esc_html__( 'Circle', 'divi-plus' ),
				'edge'    	=> esc_html__( 'Edge', 'divi-plus' ),
				'triangle'  => esc_html__( 'Triangle', 'divi-plus' ),
				'star'     	=> esc_html__( 'Star', 'divi-plus' ),
			),
			'show_if'          	=> array(
				'dipl_enable_particle_background' => 'on',
			),
			'default_on_front' 	=> 'circle',
			'tab_slug'         	=> 'general',
			'toggle_slug'      	=> 'background',
			'description'      	=> esc_html__( 'Here you can choose the type of particle.', 'divi-plus' ),
		);
		$fields_unprocessed['dipl_particle_number'] = array(
			'label'            	=> esc_html__( 'Particles Number', 'divi-plus' ),
			'type'             	=> 'range',
			'option_category'  	=> 'configuration',
			'range_settings'   => array(
				'min'  => '10',
				'max'  => '300',
				'step' => '1',
			),
			'unitless'			=> true,
			'show_if'          	=> array(
				'dipl_enable_particle_background' => 'on',
			),
			'default'     		=> '80',
			'default_on_front' 	=> '80',
			'tab_slug'         	=> 'general',
			'toggle_slug'      	=> 'background',
			'description'      	=> esc_html__( 'Here you can enter the number of particles you want to show.', 'divi-plus' ),
		);
		$fields_unprocessed['dipl_particle_density'] = array(
			'label'            	=> esc_html__( 'Particles Density', 'divi-plus' ),
			'type'             	=> 'range',
			'option_category'  	=> 'configuration',
			'range_settings'   => array(
				'min'  => '100',
				'max'  => '1000',
				'step' => '1',
			),
			'unitless'			=> true,
			'show_if'          	=> array(
				'dipl_enable_particle_background' => 'on',
			),
			'default_on_front' 	=> '400',
			'tab_slug'         	=> 'general',
			'toggle_slug'      	=> 'background',
			'description'      	=> esc_html__( 'Here you can enter the density area for particles.', 'divi-plus' ),
		);
		$fields_unprocessed['dipl_particle_size'] = array(
			'label'            	=> esc_html__( 'Particles Size', 'divi-plus' ),
			'type'             	=> 'range',
			'option_category'  	=> 'configuration',
			'range_settings'   => array(
				'min'  => '1',
				'max'  => '100',
				'step' => '1',
			),
			'unitless'			=> true,
			'show_if'          	=> array(
				'dipl_enable_particle_background' => 'on',
			),
			'default_on_front' 	=> '3',
			'tab_slug'         	=> 'general',
			'toggle_slug'      	=> 'background',
			'description'      	=> esc_html__( 'Here you can enter the size for particles.', 'divi-plus' ),
		);
		$fields_unprocessed['dipl_particle_color'] = array(
			'label'            	=> esc_html__( 'Particles Color', 'divi-plus' ),
			'type'              => 'color-alpha',
            'custom_color'      => true,
			'show_if'          	=> array(
				'dipl_enable_particle_background' => 'on',
			),
			'default_on_front' 	=> '#fff',
			'tab_slug'         	=> 'general',
			'toggle_slug'      	=> 'background',
			'description'      	=> esc_html__( 'Here you can enter the color for particles.', 'divi-plus' ),
		);
		$fields_unprocessed['dipl_enable_linked_line'] = array(
			'label'            => esc_html__( 'Enable Linked Line', 'divi-plus' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'divi-plus' ),
				'on'  => esc_html__( 'Yes', 'divi-plus' ),
			),
			'show_if'          	=> array(
				'dipl_enable_particle_background' => 'on',
			),
			'default_on_front' => 'on',
			'tab_slug'         => 'general',
			'toggle_slug'      => 'background',
			'description'      => esc_html__( 'Here you can choose whether to use linked lines.', 'divi-plus' ),
		);
		$fields_unprocessed['dipl_linked_line_size'] = array(
			'label'            	=> esc_html__( 'Linked Line Size', 'divi-plus' ),
			'type'             	=> 'range',
			'option_category'  	=> 'configuration',
			'range_settings'   => array(
				'min'  => '1',
				'max'  => '10',
				'step' => '1',
			),
			'unitless'			=> true,
			'show_if'          	=> array(
				'dipl_enable_particle_background' => 'on',
				'dipl_enable_linked_line' => 'on',
			),
			'default_on_front' 	=> '1',
			'tab_slug'         	=> 'general',
			'toggle_slug'      	=> 'background',
			'description'      	=> esc_html__( 'Here you can enter the size for linked lines.', 'divi-plus' ),
		);
		$fields_unprocessed['dipl_linked_line_color'] = array(
			'label'            	=> esc_html__( 'Linked Line Color', 'divi-plus' ),
			'type'              => 'color-alpha',
            'custom_color'      => true,
			'show_if'          	=> array(
				'dipl_enable_particle_background' => 'on',
				'dipl_enable_linked_line' => 'on',
			),
			'default_on_front' 	=> '#fff',
			'tab_slug'         	=> 'general',
			'toggle_slug'      	=> 'background',
			'description'      	=> esc_html__( 'Here you can enter the color for linked lines.', 'divi-plus' ),
		);
		$fields_unprocessed['dipl_enable_particle_movement'] = array(
			'label'           	=> esc_html__( 'Enable Particle Movement', 'divi-plus' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'divi-plus' ),
				'on'  => esc_html__( 'Yes', 'divi-plus' ),
			),
			'show_if'          	=> array(
				'dipl_enable_particle_background' => 'on',
			),
			'default_on_front' => 'on',
			'tab_slug'         => 'general',
			'toggle_slug'      => 'background',
			'description'      	=> esc_html__( 'Here you can choose whether to enable or disable particle movement.', 'divi-plus' ),
		);
		$fields_unprocessed['dipl_particle_movement_direction'] = array(
			'label'				=> esc_html__( 'Direction', 'divi-plus' ),
			'type'             	=> 'select',
			'option_category'  	=> 'configuration',
			'options'          	=> array(
				'none'        	=> esc_html__( 'None', 'divi-plus' ),
				'top'    		=> esc_html__( 'Top', 'divi-plus' ),
				'top-left'      => esc_html__( 'Top Left', 'divi-plus' ),
				'top-right'     => esc_html__( 'Top Right', 'divi-plus' ),
				'bottom' 		=> esc_html__( 'Bottom', 'divi-plus' ),
				'bottom-left'   => esc_html__( 'Bottom Left', 'divi-plus' ),
				'bottom-right'  => esc_html__( 'Bottom Right', 'divi-plus' ),
			),
			'show_if'          	=> array(
				'dipl_enable_particle_background' => 'on',
				'dipl_enable_particle_movement' => 'on',
			),
			'default_on_front' 	=> 'none',
			'tab_slug'         	=> 'general',
			'toggle_slug'      	=> 'background',
			'description'      	=> esc_html__( 'Here you can choose the direction of particle movement.', 'divi-plus' ),
		);
		$fields_unprocessed['dipl_particle_movement_speed'] = array(
			'label'            	=> esc_html__( 'Speed', 'divi-plus' ),
			'type'             	=> 'range',
			'option_category'  	=> 'configuration',
			'range_settings'   => array(
				'min'  => '1',
				'max'  => '10',
				'step' => '1',
			),
			'unitless'			=> true,
			'show_if'          	=> array(
				'dipl_enable_particle_background' => 'on',
				'dipl_enable_particle_movement' => 'on',
			),
			'default_on_front' 	=> '4',
			'tab_slug'         	=> 'general',
			'toggle_slug'      	=> 'background',
			'description'      	=> esc_html__( 'Here you can enter the movement speed of particles.', 'divi-plus' ),
		);
		$fields_unprocessed['dipl_enable_hover_interactivity'] = array(
			'label'            => esc_html__( 'Enable OnHover Interactivity', 'divi-plus' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'divi-plus' ),
				'on'  => esc_html__( 'Yes', 'divi-plus' ),
			),
			'show_if'          => array(
				'dipl_enable_particle_background' => 'on',
				'dipl_enable_particle_movement' => 'on',
			),
			'default_on_front' => 'off',
			'tab_slug'         => 'general',
			'toggle_slug'      => 'background',
			'description'      => esc_html__( 'Here you can choose whether to enable hover interactivity.', 'divi-plus' ),
		);
		$fields_unprocessed['dipl_hover_mode'] = array(
			'label'				=> esc_html__( 'Hover mode', 'divi-plus' ),
			'type'             	=> 'select',
			'option_category'  	=> 'configuration',
			'options'          	=> array(
				'grab'        	=> esc_html__( 'Grab', 'divi-plus' ),
				'bubble'    	=> esc_html__( 'Bubble', 'divi-plus' ),
				'repulse'      	=> esc_html__( 'Repulse', 'divi-plus' ),
			),
			'show_if'          	=> array(
				'dipl_enable_particle_background' => 'on',
				'dipl_enable_particle_movement' => 'on',
				'dipl_enable_hover_interactivity' => 'on',
			),
			'default_on_front' 	=> 'grab',
			'tab_slug'         	=> 'general',
			'toggle_slug'      	=> 'background',
			'description'      	=> esc_html__( 'Here you can choose the on hover mode.', 'divi-plus' ),
		);
		$fields_unprocessed['dipl_enable_click_interactivity'] = array(
			'label'            => esc_html__( 'Enable OnClick Interactivity', 'divi-plus' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'divi-plus' ),
				'on'  => esc_html__( 'Yes', 'divi-plus' ),
			),
			'show_if'          => array(
				'dipl_enable_particle_background' => 'on',
				'dipl_enable_particle_movement' => 'on',
			),
			'default_on_front' => 'off',
			'tab_slug'         => 'general',
			'toggle_slug'      => 'background',
			'description'      => esc_html__( 'Here you can choose whether to enable click interactivity.', 'divi-plus' ),
		);
		$fields_unprocessed['dipl_click_mode'] = array(
			'label'				=> esc_html__( 'Click mode', 'divi-plus' ),
			'type'             	=> 'select',
			'option_category'  	=> 'configuration',
			'options'          	=> array(
				'push'        	=> esc_html__( 'Push', 'divi-plus' ),
				'bubble'    	=> esc_html__( 'Bubble', 'divi-plus' ),
				'repulse'      	=> esc_html__( 'Repulse', 'divi-plus' ),
				'remove'      	=> esc_html__( 'Remove', 'divi-plus' ),
			),
			'show_if'          	=> array(
				'dipl_enable_particle_background' => 'on',
				'dipl_enable_particle_movement' => 'on',
				'dipl_enable_click_interactivity' => 'on',
			),
			'default_on_front' 	=> 'grab',
			'tab_slug'         	=> 'general',
			'toggle_slug'      	=> 'background',
			'description'      	=> esc_html__( 'Here you can choose the on click mode.', 'divi-plus' ),
		);
		$fields_unprocessed['dipl_grab_linked_line_opacity'] = array(
			'label'            	=> esc_html__( 'Grab Mode Linked Line Opacity', 'divi-plus' ),
			'type'             	=> 'range',
			'option_category'  	=> 'configuration',
			'range_settings'   => array(
				'min'  => '0',
				'max'  => '1',
				'step' => '0.1',
			),
			'unitless'			=> true,
			'show_if'          	=> array(
				'dipl_enable_particle_background' => 'on',
				'dipl_enable_particle_movement' => 'on',
			),
			'default_on_front' 	=> '0.5',
			'tab_slug'         	=> 'general',
			'toggle_slug'      	=> 'background',
			'description'      	=> esc_html__( 'Here you can choose the grab linked line opacity.', 'divi-plus' ),
		);
		$fields_unprocessed['dipl_push_particles_number'] = array(
			'label'            	=> esc_html__( 'Push Mode Particles Number', 'divi-plus' ),
			'type'             	=> 'range',
			'option_category'  	=> 'configuration',
			'range_settings'   => array(
				'min'  => '1',
				'max'  => '50',
				'step' => '1',
			),
			'unitless'			=> true,
			'show_if'          	=> array(
				'dipl_enable_particle_background' => 'on',
				'dipl_enable_particle_movement' => 'on',
			),
			'default_on_front' 	=> '10',
			'tab_slug'         	=> 'general',
			'toggle_slug'      	=> 'background',
			'description'      	=> esc_html__( 'Here you can choose the push mode particles number.', 'divi-plus' ),
		);
		$fields_unprocessed['dipl_bubble_size'] = array(
			'label'            	=> esc_html__( 'Bubble Mode Bubble Size', 'divi-plus' ),
			'type'             	=> 'range',
			'option_category'  	=> 'configuration',
			'range_settings'   => array(
				'min'  => '1',
				'max'  => '20',
				'step' => '1',
			),
			'unitless'			=> true,
			'show_if'          	=> array(
				'dipl_enable_particle_background' => 'on',
				'dipl_enable_particle_movement' => 'on',
			),
			'default_on_front' 	=> '5',
			'tab_slug'         	=> 'general',
			'toggle_slug'      	=> 'background',
			'description'      	=> esc_html__( 'Here you can choose the bubble size.', 'divi-plus' ),
		);
		$fields_unprocessed['dipl_remove_particles_number'] = array(
			'label'            	=> esc_html__( 'Remove Mode Particles Number', 'divi-plus' ),
			'type'             	=> 'range',
			'option_category'  	=> 'configuration',
			'range_settings'   => array(
				'min'  => '1',
				'max'  => '50',
				'step' => '1',
			),
			'unitless'			=> true,
			'show_if'          	=> array(
				'dipl_enable_particle_background' => 'on',
				'dipl_enable_particle_movement' => 'on',
			),
			'default_on_front' 	=> '10',
			'tab_slug'         	=> 'general',
			'toggle_slug'      	=> 'background',
			'description'      	=> esc_html__( 'Here you can choose the remove mode particles number.', 'divi-plus' ),
		);
		return $fields_unprocessed;
	}
	
	public function dipl_particle_background_section_output( $output, $render_slug, $section ) {
		if ( 'et_pb_section' !== $render_slug ) {
			return $output;
		}

		if ( is_array( $output ) ) {
			return $output;
		}

		if ( isset( $section->props['dipl_enable_particle_background'] ) && 'on' === $section->props['dipl_enable_particle_background'] ) {
			$dipl_particle_type					= esc_attr( $section->props['dipl_particle_type'] );
			$dipl_particle_number 				= intval( $section->props['dipl_particle_number'] );
			$dipl_particle_density  			= intval( $section->props['dipl_particle_density'] );
			$dipl_particle_size					= intval( $section->props['dipl_particle_size'] );
			$dipl_particle_color				= esc_attr( $section->props['dipl_particle_color'] );
			$dipl_enable_linked_line			= 'on' === $section->props['dipl_enable_linked_line'] ? 'true' : 'false';
			$dipl_linked_line_size				= intval( $section->props['dipl_linked_line_size'] );
			$dipl_linked_line_color				= esc_attr( $section->props['dipl_linked_line_color'] );
			$dipl_enable_particle_movement 		= 'on' === $section->props['dipl_enable_particle_movement'] ? 'true' : 'false';
			$dipl_particle_movement_direction	= esc_attr( $section->props['dipl_particle_movement_direction'] );
			$dipl_particle_movement_speed 		= floatval( $section->props['dipl_particle_movement_speed'] );
			$dipl_enable_hover_interactivity	= 'on' === $section->props['dipl_enable_hover_interactivity'] ? 'true' : 'false';
			$dipl_hover_mode					= esc_attr( $section->props['dipl_hover_mode'] );
			$dipl_enable_click_interactivity	= 'on' === $section->props['dipl_enable_click_interactivity'] ? 'true' : 'false';
			$dipl_click_mode					= esc_attr( $section->props['dipl_click_mode'] );
			$dipl_grab_linked_line_opacity		= floatval( $section->props['dipl_grab_linked_line_opacity'] );
			$dipl_push_particles_number			= intval( $section->props['dipl_push_particles_number'] );
			$dipl_bubble_size					= intval( $section->props['dipl_bubble_size'] );
			$dipl_remove_particles_number		= intval( $section->props['dipl_remove_particles_number'] );

			$order_class = $section->get_module_order_class( 'et_pb_section' );
			wp_enqueue_script( 'elicus-particle-script' );
			$script = '<script>jQuery(function($){
				var section_id = $(".' . esc_attr( $order_class ) . '").attr("id");
				if ( typeof(section_id) === "undefined" || "" === section_id ) {
					section_id = "' . esc_attr( $order_class ) . '_particles";
					$(".' . esc_attr( $order_class ) . '").attr("id", section_id);
				}
				particlesJS(section_id, {
				  "particles": {
				    "number": {
				      "value": '. $dipl_particle_number .',
				      "density": {
				        "enable": true,
				        "value_area": '. $dipl_particle_density .'
				      }
				    },
				    "color": {
				      "value": "'. $dipl_particle_color .'"
				    },
				    "shape": {
				      "type": "'. $dipl_particle_type .'",
				      "stroke": {
				        "width": 0,
				        "color": "#000000"
				      },
				      "polygon": {
				        "nb_sides": 5
				      },
				    },
				    "opacity": {
				      "value": 0.5,
				      "random": false,
				      "anim": {
				        "enable": false,
				        "speed": 1,
				        "opacity_min": 0.1,
				        "sync": false
				      }
				    },
				    "size": {
				      "value": '. $dipl_particle_size .',
				      "random": true,
				      "anim": {
				        "enable": false,
				        "speed": 40,
				        "size_min": 0.1,
				        "sync": false
				      }
				    },
				    "line_linked": {
				      "enable": '. $dipl_enable_linked_line .',
				      "distance": 150,
				      "color": "'. $dipl_linked_line_color .'",
				      "opacity": 0.4,
				      "width": '. $dipl_linked_line_size .'
				    },
				    "move": {
				      "enable": '. $dipl_enable_particle_movement .',
				      "speed": '. $dipl_particle_movement_speed .',
				      "direction": "'. $dipl_particle_movement_direction .'",
				      "random": false,
				      "straight": false,
				      "out_mode": "out",
				      "bounce": false,
				      "attract": {
				        "enable": false,
				        "rotateX": 600,
				        "rotateY": 1200
				      }
				    }
				  },
				  "interactivity": {
				    "detect_on": "canvas",
				    "events": {
				      "onhover": {
				        "enable": '. $dipl_enable_hover_interactivity .',
				        "mode": "'. $dipl_hover_mode .'"
				      },
				      "onclick": {
				        "enable": '. $dipl_enable_click_interactivity .',
				        "mode": "'. $dipl_click_mode .'"
				      },
				      "resize": true
				    },
				    "modes": {
				      "grab": {
				        "distance": 140,
				        "line_linked": {
				          "opacity": '. $dipl_grab_linked_line_opacity .'
				        }
				      },
				      "bubble": {
				        "distance": 400,
				        "size": '. $dipl_bubble_size .',
				        "duration": 2,
				        "opacity": 8,
				        "speed": 3
				      },
				      "repulse": {
				        "distance": 200,
				        "duration": 0.4
				      },
				      "push": {
				        "particles_nb": '. $dipl_push_particles_number .'
				      },
				      "remove": {
				        "particles_nb": '. $dipl_remove_particles_number .'
				      }
				    }
				  },
				  "retina_detect": true
				});
			});</script>';

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .particles-js-canvas-el',
					'declaration' => 'position: absolute; top: 0; left: 0; width: 100%; height: 100%;',
				)
			);

			return $output . $script;
		}

		return $output;
	}
	
	public function dipl_particle_background_row_output( $output, $render_slug, $row ) {
		if ( 'et_pb_row' !== $render_slug ) {
			return $output;
		}

		if ( is_array( $output ) ) {
			return $output;
		}

		if ( isset( $row->props['dipl_enable_particle_background'] ) && 'on' === $row->props['dipl_enable_particle_background'] ) {
			$dipl_particle_type					= esc_attr( $row->props['dipl_particle_type'] );
			$dipl_particle_number 				= intval( $row->props['dipl_particle_number'] );
			$dipl_particle_density  			= intval( $row->props['dipl_particle_density'] );
			$dipl_particle_size					= intval( $row->props['dipl_particle_size'] );
			$dipl_particle_color				= esc_attr( $row->props['dipl_particle_color'] );
			$dipl_enable_linked_line			= 'on' === $row->props['dipl_enable_linked_line'] ? 'true' : 'false';
			$dipl_linked_line_size				= intval( $row->props['dipl_linked_line_size'] );
			$dipl_linked_line_color				= esc_attr( $row->props['dipl_linked_line_color'] );
			$dipl_enable_particle_movement 		= 'on' === $row->props['dipl_enable_particle_movement'] ? 'true' : 'false';
			$dipl_particle_movement_direction	= esc_attr( $row->props['dipl_particle_movement_direction'] );
			$dipl_particle_movement_speed 		= floatval( $row->props['dipl_particle_movement_speed'] );
			$dipl_enable_hover_interactivity	= 'on' === $row->props['dipl_enable_hover_interactivity'] ? 'true' : 'false';
			$dipl_hover_mode					= esc_attr( $row->props['dipl_hover_mode'] );
			$dipl_enable_click_interactivity	= 'on' === $row->props['dipl_enable_click_interactivity'] ? 'true' : 'false';
			$dipl_click_mode					= esc_attr( $row->props['dipl_click_mode'] );
			$dipl_grab_linked_line_opacity		= floatval( $row->props['dipl_grab_linked_line_opacity'] );
			$dipl_push_particles_number			= intval( $row->props['dipl_push_particles_number'] );
			$dipl_bubble_size					= intval( $row->props['dipl_bubble_size'] );
			$dipl_remove_particles_number		= intval( $row->props['dipl_remove_particles_number'] );

			$order_class = $row->get_module_order_class( 'et_pb_row' );
			wp_enqueue_script( 'elicus-particle-script' );
			$script = '<script>jQuery(function($){
				var row_id = $(".' . esc_attr( $order_class ) . '").attr("id");
				if ( typeof(row_id) === "undefined" || "" === row_id ) {
					row_id = "' . esc_attr( $order_class ) . '_particles";
					$(".' . esc_attr( $order_class ) . '").attr("id", row_id);
				}
				particlesJS(row_id, {
				  "particles": {
				    "number": {
				      "value": '. $dipl_particle_number .',
				      "density": {
				        "enable": true,
				        "value_area": '. $dipl_particle_density .'
				      }
				    },
				    "color": {
				      "value": "'. $dipl_particle_color .'"
				    },
				    "shape": {
				      "type": "'. $dipl_particle_type .'",
				      "stroke": {
				        "width": 0,
				        "color": "#000000"
				      },
				      "polygon": {
				        "nb_sides": 5
				      },
				    },
				    "opacity": {
				      "value": 0.5,
				      "random": false,
				      "anim": {
				        "enable": false,
				        "speed": 1,
				        "opacity_min": 0.1,
				        "sync": false
				      }
				    },
				    "size": {
				      "value": '. $dipl_particle_size .',
				      "random": true,
				      "anim": {
				        "enable": false,
				        "speed": 40,
				        "size_min": 0.1,
				        "sync": false
				      }
				    },
				    "line_linked": {
				      "enable": '. $dipl_enable_linked_line .',
				      "distance": 150,
				      "color": "'. $dipl_linked_line_color .'",
				      "opacity": 0.4,
				      "width": '. $dipl_linked_line_size .'
				    },
				    "move": {
				      "enable": '. $dipl_enable_particle_movement .',
				      "speed": '. $dipl_particle_movement_speed .',
				      "direction": "'. $dipl_particle_movement_direction .'",
				      "random": false,
				      "straight": false,
				      "out_mode": "out",
				      "bounce": false,
				      "attract": {
				        "enable": false,
				        "rotateX": 600,
				        "rotateY": 1200
				      }
				    }
				  },
				  "interactivity": {
				    "detect_on": "canvas",
				    "events": {
				      "onhover": {
				        "enable": '. $dipl_enable_hover_interactivity .',
				        "mode": "'. $dipl_hover_mode .'"
				      },
				      "onclick": {
				        "enable": '. $dipl_enable_click_interactivity .',
				        "mode": "'. $dipl_click_mode .'"
				      },
				      "resize": true
				    },
				    "modes": {
				      "grab": {
				        "distance": 140,
				        "line_linked": {
				          "opacity": '. $dipl_grab_linked_line_opacity .'
				        }
				      },
				      "bubble": {
				        "distance": 400,
				        "size": '. $dipl_bubble_size .',
				        "duration": 2,
				        "opacity": 8,
				        "speed": 3
				      },
				      "repulse": {
				        "distance": 200,
				        "duration": 0.4
				      },
				      "push": {
				        "particles_nb": '. $dipl_push_particles_number .'
				      },
				      "remove": {
				        "particles_nb": '. $dipl_remove_particles_number .'
				      }
				    }
				  },
				  "retina_detect": true
				});
			});</script>';

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .particles-js-canvas-el',
					'declaration' => 'position: absolute; top: 0; left: 0; width: 100%; height: 100%;',
				)
			);

			return $output . $script;
		}

		return $output;
	}

	public function dipl_particle_background_column_output( $output, $render_slug, $column ) {
		if ( 'et_pb_column' !== $render_slug ) {
			return $output;
		}
		
		if ( is_array( $output ) ) {
			return $output;
		}

		if ( isset( $column->props['dipl_enable_particle_background'] ) && 'on' === $column->props['dipl_enable_particle_background'] ) {
			$dipl_particle_type					= esc_attr( $column->props['dipl_particle_type'] );
			$dipl_particle_number 				= intval( $column->props['dipl_particle_number'] );
			$dipl_particle_density  			= intval( $column->props['dipl_particle_density'] );
			$dipl_particle_size					= intval( $column->props['dipl_particle_size'] );
			$dipl_particle_color				= esc_attr( $column->props['dipl_particle_color'] );
			$dipl_enable_linked_line			= 'on' === $column->props['dipl_enable_linked_line'] ? 'true' : 'false';
			$dipl_linked_line_size				= intval( $column->props['dipl_linked_line_size'] );
			$dipl_linked_line_color				= esc_attr( $column->props['dipl_linked_line_color'] );
			$dipl_enable_particle_movement 		= 'on' === $column->props['dipl_enable_particle_movement'] ? 'true' : 'false';
			$dipl_particle_movement_direction	= esc_attr( $column->props['dipl_particle_movement_direction'] );
			$dipl_particle_movement_speed 		= floatval( $column->props['dipl_particle_movement_speed'] );
			$dipl_enable_hover_interactivity	= 'on' === $column->props['dipl_enable_hover_interactivity'] ? 'true' : 'false';
			$dipl_hover_mode					= esc_attr( $column->props['dipl_hover_mode'] );
			$dipl_enable_click_interactivity	= 'on' === $column->props['dipl_enable_click_interactivity'] ? 'true' : 'false';
			$dipl_click_mode					= esc_attr( $column->props['dipl_click_mode'] );
			$dipl_grab_linked_line_opacity		= floatval( $column->props['dipl_grab_linked_line_opacity'] );
			$dipl_push_particles_number			= intval( $column->props['dipl_push_particles_number'] );
			$dipl_bubble_size					= intval( $column->props['dipl_bubble_size'] );
			$dipl_remove_particles_number		= intval( $column->props['dipl_remove_particles_number'] );

			$order_class = $column->get_module_order_class( 'et_pb_column' );
			wp_enqueue_script( 'elicus-particle-script' );
			$script = '<script>jQuery(function($){
				var column_id = $(".' . esc_attr( $order_class ) . '").attr("id");
				if ( typeof(column_id) === "undefined" || "" === column_id ) {
					column_id = "' . esc_attr( $order_class ) . '_particles";
					$(".' . esc_attr( $order_class ) . '").attr("id", column_id);
				}
				particlesJS(column_id, {
				  "particles": {
				    "number": {
				      "value": '. $dipl_particle_number .',
				      "density": {
				        "enable": true,
				        "value_area": '. $dipl_particle_density .'
				      }
				    },
				    "color": {
				      "value": "'. $dipl_particle_color .'"
				    },
				    "shape": {
				      "type": "'. $dipl_particle_type .'",
				      "stroke": {
				        "width": 0,
				        "color": "#000000"
				      },
				      "polygon": {
				        "nb_sides": 5
				      },
				    },
				    "opacity": {
				      "value": 0.5,
				      "random": false,
				      "anim": {
				        "enable": false,
				        "speed": 1,
				        "opacity_min": 0.1,
				        "sync": false
				      }
				    },
				    "size": {
				      "value": '. $dipl_particle_size .',
				      "random": true,
				      "anim": {
				        "enable": false,
				        "speed": 40,
				        "size_min": 0.1,
				        "sync": false
				      }
				    },
				    "line_linked": {
				      "enable": '. $dipl_enable_linked_line .',
				      "distance": 150,
				      "color": "'. $dipl_linked_line_color .'",
				      "opacity": 0.4,
				      "width": '. $dipl_linked_line_size .'
				    },
				    "move": {
				      "enable": '. $dipl_enable_particle_movement .',
				      "speed": '. $dipl_particle_movement_speed .',
				      "direction": "'. $dipl_particle_movement_direction .'",
				      "random": false,
				      "straight": false,
				      "out_mode": "out",
				      "bounce": false,
				      "attract": {
				        "enable": false,
				        "rotateX": 600,
				        "rotateY": 1200
				      }
				    }
				  },
				  "interactivity": {
				    "detect_on": "canvas",
				    "events": {
				      "onhover": {
				        "enable": '. $dipl_enable_hover_interactivity .',
				        "mode": "'. $dipl_hover_mode .'"
				      },
				      "onclick": {
				        "enable": '. $dipl_enable_click_interactivity .',
				        "mode": "'. $dipl_click_mode .'"
				      },
				      "resize": true
				    },
				    "modes": {
				      "grab": {
				        "distance": 140,
				        "line_linked": {
				          "opacity": '. $dipl_grab_linked_line_opacity .'
				        }
				      },
				      "bubble": {
				        "distance": 400,
				        "size": '. $dipl_bubble_size .',
				        "duration": 2,
				        "opacity": 8,
				        "speed": 3
				      },
				      "repulse": {
				        "distance": 200,
				        "duration": 0.4
				      },
				      "push": {
				        "particles_nb": '. $dipl_push_particles_number .'
				      },
				      "remove": {
				        "particles_nb": '. $dipl_remove_particles_number .'
				      }
				    }
				  },
				  "retina_detect": true
				});
			});</script>';

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .particles-js-canvas-el',
					'declaration' => 'position: absolute; top: 0; left: 0; width: 100%; height: 100%;',
				)
			);

			return $output . $script;
		}

		return $output;
	}

	public function dipl_particle_background_module_output( $output, $render_slug, $module ) {
		$dipl_modules = $this->dipl_get_modules();

		if ( ! in_array( $render_slug, $dipl_modules, true ) ) {
			return $output;
		}

		if ( is_array( $output ) ) {
			return $output;
		}
			
		if ( isset( $module->props['dipl_enable_particle_background'] ) && 'on' === $module->props['dipl_enable_particle_background'] ) {
			$dipl_particle_type					= esc_attr( $module->props['dipl_particle_type'] );
			$dipl_particle_number 				= intval( $module->props['dipl_particle_number'] );
			$dipl_particle_density  			= intval( $module->props['dipl_particle_density'] );
			$dipl_particle_size					= intval( $module->props['dipl_particle_size'] );
			$dipl_particle_color				= esc_attr( $module->props['dipl_particle_color'] );
			$dipl_enable_linked_line			= 'on' === $module->props['dipl_enable_linked_line'] ? 'true' : 'false';
			$dipl_linked_line_size				= intval( $module->props['dipl_linked_line_size'] );
			$dipl_linked_line_color				= esc_attr( $module->props['dipl_linked_line_color'] );
			$dipl_enable_particle_movement 		= 'on' === $module->props['dipl_enable_particle_movement'] ? 'true' : 'false';
			$dipl_particle_movement_direction	= esc_attr( $module->props['dipl_particle_movement_direction'] );
			$dipl_particle_movement_speed 		= floatval( $module->props['dipl_particle_movement_speed'] );
			$dipl_enable_hover_interactivity	= 'on' === $module->props['dipl_enable_hover_interactivity'] ? 'true' : 'false';
			$dipl_hover_mode					= esc_attr( $module->props['dipl_hover_mode'] );
			$dipl_enable_click_interactivity	= 'on' === $module->props['dipl_enable_click_interactivity'] ? 'true' : 'false';
			$dipl_click_mode					= esc_attr( $module->props['dipl_click_mode'] );
			$dipl_grab_linked_line_opacity		= floatval( $module->props['dipl_grab_linked_line_opacity'] );
			$dipl_push_particles_number			= intval( $module->props['dipl_push_particles_number'] );
			$dipl_bubble_size					= intval( $module->props['dipl_bubble_size'] );
			$dipl_remove_particles_number		= intval( $module->props['dipl_remove_particles_number'] );

			$order_class = $module->get_module_order_class( $render_slug );
			wp_enqueue_script( 'elicus-particle-script' );
			$script = '<script>jQuery(function($){
				var module_id = $(".' . esc_attr( $order_class ) . '").attr("id");
				if ( typeof(module_id) === "undefined" || "" === module_id ) {
					module_id = "' . esc_attr( $order_class ) . '_particles";
					$(".' . esc_attr( $order_class ) . '").attr("id", module_id);
				}
				particlesJS(module_id, {
				  "particles": {
				    "number": {
				      "value": '. $dipl_particle_number .',
				      "density": {
				        "enable": true,
				        "value_area": '. $dipl_particle_density .'
				      }
				    },
				    "color": {
				      "value": "'. $dipl_particle_color .'"
				    },
				    "shape": {
				      "type": "'. $dipl_particle_type .'",
				      "stroke": {
				        "width": 0,
				        "color": "#000000"
				      },
				      "polygon": {
				        "nb_sides": 5
				      },
				    },
				    "opacity": {
				      "value": 0.5,
				      "random": false,
				      "anim": {
				        "enable": false,
				        "speed": 1,
				        "opacity_min": 0.1,
				        "sync": false
				      }
				    },
				    "size": {
				      "value": '. $dipl_particle_size .',
				      "random": true,
				      "anim": {
				        "enable": false,
				        "speed": 40,
				        "size_min": 0.1,
				        "sync": false
				      }
				    },
				    "line_linked": {
				      "enable": '. $dipl_enable_linked_line .',
				      "distance": 150,
				      "color": "'. $dipl_linked_line_color .'",
				      "opacity": 0.4,
				      "width": '. $dipl_linked_line_size .'
				    },
				    "move": {
				      "enable": '. $dipl_enable_particle_movement .',
				      "speed": '. $dipl_particle_movement_speed .',
				      "direction": "'. $dipl_particle_movement_direction .'",
				      "random": false,
				      "straight": false,
				      "out_mode": "out",
				      "bounce": false,
				      "attract": {
				        "enable": false,
				        "rotateX": 600,
				        "rotateY": 1200
				      }
				    }
				  },
				  "interactivity": {
				    "detect_on": "canvas",
				    "events": {
				      "onhover": {
				        "enable": '. $dipl_enable_hover_interactivity .',
				        "mode": "'. $dipl_hover_mode .'"
				      },
				      "onclick": {
				        "enable": '. $dipl_enable_click_interactivity .',
				        "mode": "'. $dipl_click_mode .'"
				      },
				      "resize": true
				    },
				    "modes": {
				      "grab": {
				        "distance": 140,
				        "line_linked": {
				          "opacity": '. $dipl_grab_linked_line_opacity .'
				        }
				      },
				      "bubble": {
				        "distance": 400,
				        "size": '. $dipl_bubble_size .',
				        "duration": 2,
				        "opacity": 8,
				        "speed": 3
				      },
				      "repulse": {
				        "distance": 200,
				        "duration": 0.4
				      },
				      "push": {
				        "particles_nb": '. $dipl_push_particles_number .'
				      },
				      "remove": {
				        "particles_nb": '. $dipl_remove_particles_number .'
				      }
				    }
				  },
				  "retina_detect": true
				});
			});</script>';

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .particles-js-canvas-el',
					'declaration' => 'position: absolute; top: 0; left: 0; width: 100%; height: 100%;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%',
					'declaration' => 'position: relative;',
				)
			);

			return $output . $script;
		}

		return $output;
	}

}
new DIPL_Particle_Background;