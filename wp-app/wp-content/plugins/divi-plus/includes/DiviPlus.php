<?php
/**
 * @author      Elicus Technologies <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2022 Elicus Technologies Private Limited
 * @version     1.9.5
 */
class DIPL_DiviPlus extends DiviExtension {

    /**
     * The gettext domain for the extension's translations.
     *
     * @since 1.0.0
     *
     * @var string
     */
    public $gettext_domain = 'divi-plus';

    /**
     * The extension's WP Plugin name.
     *
     * @since 1.0.0
     *
     * @var string
     */
    public $name = 'divi-plus';

    /**
     * The extension's version
     *
     * @since 1.0.0
     *
     * @var string
     */
    public $version = ELICUS_DIVI_PLUS_VERSION;

    /**
     * DIPL_DiviPlus constructor.
     *
     * @param string $name
     * @param array  $args
     */
    public function __construct( $name = 'divi-plus', $args = array() ) {
        $this->plugin_dir           = plugin_dir_path( __FILE__ );
        $this->plugin_dir_url       = plugin_dir_url( $this->plugin_dir );
        $this->_frontend_js_data    = array(
            'ajaxurl'   => admin_url( 'admin-ajax.php' ),
            'ajaxnonce' => wp_create_nonce( 'elicus-divi-plus-nonce' ),
        );
        $this->_builder_js_data     = array(
            'et_builder_accent_color' => esc_html( et_get_option( 'accent_color', '#7EBEC5' ) ),
            'site_url' => esc_url( site_url() ),
            'file' => et_is_builder_plugin_active() ? 'style-dbp' : 'style'
        );

        add_action( 'wp_enqueue_scripts', array( $this, 'dipl_register_scripts' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'dipl_fb_enqueue_scripts' ) );
        
        parent::__construct( $name, $args );
        $this->dipl_plugin_setup();

        if ( $this->dipl_is_testimonial_enabled() || $this->dipl_is_team_enabled() ) {
            $this->dipl_register_post_types();
            $this->dipl_register_taxonomies();
            add_action( 'load-post.php',  array( $this, 'dipl_add_meta_boxes' ) );
            add_action( 'load-post-new.php',  array( $this, 'dipl_add_meta_boxes' ) );
            add_action( 'admin_enqueue_scripts', array( $this, 'dipl_admin_enqueue_scripts' ) );
        }

        if ( $this->dipl_is_testimonial_enabled() ) {
            add_action( 'save_post', array( $this, 'dipl_save_testimonial_meta_fields' ) );
        }

        if ( $this->dipl_is_team_enabled() ) {
            add_action( 'save_post', array( $this, 'dipl_save_team_member_meta_fields' ) );
        }
        
        add_action( 'init', array( $this, 'dipl_load_plugin_textdomain' ) );
        add_action( 'wp_ajax_et_fb_ajax_save', array( $this, 'et_fb_ajax_save' ), 10 );
        add_action( 'wp_ajax_dipl_ajax_search_results', array( $this, 'dipl_ajax_search_results' ) );
        add_action( 'wp_ajax_nopriv_dipl_ajax_search_results', array( $this, 'dipl_ajax_search_results' ) );
        add_action( 'wp_ajax_dipl_get_woo_products', array( $this, 'dipl_get_woo_products' ) );
        add_action( 'wp_ajax_nopriv_dipl_get_woo_products', array( $this, 'dipl_get_woo_products' ) );
        add_filter( 'upload_mimes', array( $this, 'dipl_mime_types' ) );
        add_filter( 'wp_check_filetype_and_ext', array( $this, 'dipl_check_filetype_and_ext' ), 10, 4 );
        add_filter( 'plugin_action_links_divi-plus/divi-plus.php',  array( $this, 'dipl_action_links' ) );
        add_filter( 'nonce_user_logged_out', array( $this, 'dipl_update_nonce' ), 999, 2 );
        add_action( 'wp_ajax_dipl_get_product_page', array( $this, 'dipl_get_product_page' ) );
        add_action( 'wp_ajax_nopriv_dipl_get_product_page', array( $this, 'dipl_get_product_page' ) );
        add_action( 'wp_ajax_dipl_get_teamgrid_page', array( $this, 'dipl_get_teamgrid_page' ) );
        add_action( 'wp_ajax_nopriv_dipl_get_teamgrid_page', array( $this, 'dipl_get_teamgrid_page' ) );
        add_action( 'wp_ajax_dipl_filtered_team_items', array( $this, 'dipl_filtered_team_items' ) );
        add_action( 'wp_ajax_nopriv_dipl_filtered_team_items', array( $this, 'dipl_filtered_team_items' ) );
        add_filter( 'et_late_global_assets_list', array( $this, 'dipl_late_assets' ), 10, 3 );
    }

    public function dipl_late_assets( $assets_list, $assets_args, $dynamic_assets ) {
        if ( function_exists( 'et_get_dynamic_assets_path' ) && function_exists( 'et_is_cpt' ) ) {
            $cpt_suffix = et_is_cpt() ? '_cpt' : '';
            $assets_list['et_legacy_animations'] = array(
                'css' => $assets_args['assets_prefix'] . "/css/legacy_animations{$cpt_suffix}.css",
            );
            $assets_list['et_icons_all'] = array(
                'css' => $assets_args['assets_prefix'] . "/css/icons_all.css",
            );
            $assets_list['et_overlay'] = array(
                'css' => $assets_args['assets_prefix'] . "/css/overlay{$cpt_suffix}.css",
            );
            $assets_list['et_icons_fa'] = array(
                'css' => $assets_args['assets_prefix'] . "/css/icons_fa_all.css",
            );
            $assets_list['animations'] = array(
                'css' => $assets_args['assets_prefix'] . "/css/animations{$cpt_suffix}.css",
            );
            $assets_list['et_icons_social'] = array(
                'css' => $assets_args['assets_prefix'] . "/css/icons_base_social.css",
            );
        }
        return $assets_list;
    }

    /**
     * plugin setup function.
     *
     *@since 1.0.0
     */
    public function dipl_plugin_setup() {
        require_once plugin_dir_path( __FILE__ ) . 'src/functions.php';
        require_once plugin_dir_path( __FILE__ ) . 'panel/init.php';
        require_once plugin_dir_path( __FILE__ ) . 'extensions/extensions.php';
        if ( is_admin() ) {
            require_once plugin_dir_path( __FILE__ ) . 'src/class-update.php';
        }
    }

    public function dipl_register_scripts() {
        wp_register_script( 'elicus-isotope-script', "{$this->plugin_dir_url}includes/assets/js/isotope.pkgd.min.js", array('jquery'), '3.0.6', true );
        wp_register_script( 'elicus-images-loaded-script', "{$this->plugin_dir_url}includes/assets/js/imagesloaded.pkgd.min.js", array('jquery'), '4.1.4', true );
        wp_register_script( 'elicus-lottie-script', "{$this->plugin_dir_url}includes/assets/js/lottie.min.js", array('jquery'), '5.7.3', true );
        wp_register_script( 'elicus-twenty-twenty-script', "{$this->plugin_dir_url}includes/assets/js/jquery_twentytwenty.min.js", array('jquery'), null, true );
        wp_register_script( 'elicus-event-move-script', "{$this->plugin_dir_url}includes/assets/js/jquery_event_move.min.js", array('jquery'), '2.0.0', true );
        wp_register_script( 'elicus-tooltipster-script', "{$this->plugin_dir_url}includes/assets/js/tooltipster.bundle.min.js", array('jquery'), null, true );
        wp_register_script( 'elicus-swiper-script', "{$this->plugin_dir_url}includes/assets/js/swiper/swiper.min.js", array('jquery'), '6.4.5', true );
        wp_register_script( 'elicus-particle-script', "{$this->plugin_dir_url}includes/assets/js/particles.min.js", array('jquery'), '2.0.0', true );
        wp_register_script( 'elicus-magnify-script', "{$this->plugin_dir_url}includes/assets/js/jquery.magnify.min.js", array('jquery'), '2.3.3', true );
        wp_register_script( 'elicus-magnify-mobile-script', "{$this->plugin_dir_url}includes/assets/js/jquery.magnify-mobile.min.js", array('jquery'), '2.3.3', true );
        wp_register_script( 'elicus-tilt-script', "{$this->plugin_dir_url}includes/assets/js/tilt.jquery.min.js", array('jquery'), '1.2.1', true );
        wp_register_script( 'magnific-popup', "{$this->plugin_dir_url}includes/assets/js/magnific_popup.min.js", array('jquery'), '1.0.0', true );
        wp_register_script( 'elicus-twbs-pagination', "{$this->plugin_dir_url}includes/assets/js/twbsPagination.min.js", array('jquery'), '1.4.2', true );
        wp_register_style( 'elicus-tooltipster-style', "{$this->plugin_dir_url}includes/assets/css/tooltipster.bundle.min.css", array(), null );
        wp_register_style( 'elicus-swiper-style', "{$this->plugin_dir_url}includes/assets/css/swiper/swiper.min.css", array(), '6.4.5' );
        wp_register_style( 'elicus-magnify-style', "{$this->plugin_dir_url}includes/assets/css/magnify/magnify.min.css", array(), null );
        wp_register_style( 'magnific-popup', "{$this->plugin_dir_url}includes/assets/css/magnific_popup.min.css", array(), '1.0.0' );
        wp_register_style( 'dipl-swiper-style', "{$this->plugin_dir_url}styles/diplSwiper.min.css", array(), '1.0.0' );
    }

    public function dipl_fb_enqueue_scripts() {
        if ( et_core_is_fb_enabled() ) {
            wp_enqueue_script( 'elicus-isotope-script' );
            wp_enqueue_script( 'elicus-images-loaded-script' );
            wp_enqueue_script( 'elicus-lottie-script' );
            wp_enqueue_script( 'elicus-twenty-twenty-script' );
            wp_enqueue_script( 'elicus-event-move-script' );
            wp_enqueue_script( 'elicus-tooltipster-script' );
            wp_enqueue_script( 'elicus-swiper-script' );
            wp_enqueue_script( 'elicus-magnify-script' );
            wp_enqueue_script( 'elicus-magnify-mobile-script' );
            wp_enqueue_script( 'elicus-tilt-script' );
            wp_enqueue_style( 'elicus-tooltipster-style' );
            wp_enqueue_style( 'elicus-swiper-style' );
            wp_enqueue_style( 'elicus-magnify-style' );
            wp_enqueue_script( 'elicus-twbs-pagination' );
        }
    }

    public function dipl_admin_enqueue_scripts( $hook_suffix ) {
        if ( $hook_suffix === 'post-new.php' || $hook_suffix === 'post.php' ) {
            wp_enqueue_style( 'dipl-admin-style', "{$this->plugin_dir_url}styles/admin.min.css", array(), $this->version, false );
            wp_enqueue_script( 'dipl-admin-script', "{$this->plugin_dir_url}scripts/admin.min.js", array('jquery'), $this->version, false );
        }
    }

    public function dipl_load_plugin_textdomain() {
        load_plugin_textdomain( 'divi-plus', false, dirname( plugin_basename( __DIR__ ) ) . '/languages/' );
    }

    /**
     * Update nonce in Ajax Search Module when updating the cart.
     *
     * @since 1.7.2
     */
    public function dipl_update_nonce( $uid , $action = -1  ) {
        if ( ! is_user_logged_in() && $action === 'elicus-divi-plus-ajax-search-nonce' ) {
            return get_current_user_id();
        }
        return $uid;
    }

    /**
     * add JSON to allowed file uploads.
     *
     * @since 1.5.2
     */
    public function dipl_mime_types( $mimes ) {
        $mimes['json'] = 'application/json';
        return $mimes;
    }

    /**
     * add JSON to wp_check_filetype_and_ext.
     *
     * @since 1.5.2
     */
    public function dipl_check_filetype_and_ext( $types, $file, $filename, $mimes ) {
        $check_file = wp_check_filetype( $filename );
        if ( 'json' === $check_file['ext'] ) {
            $types['ext']  = 'json';
            $types['type'] = 'application/json';
        }

        return $types;
    }

    public function dipl_is_testimonial_enabled() {
        $plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
        if ( isset( $plugin_options['dipl-modules'] ) ) {
            $modules = explode( ',', $plugin_options['dipl-modules'] );
            if (
                in_array( 'dipl_testimonial_slider', $modules ) ||
                in_array( 'dipl_testimonial_grid', $modules )
            ) {
                return true;
            }
        } else {
            return true;
        }

        return false;
    }

    public function dipl_is_team_enabled() {
        $plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
        if ( isset( $plugin_options['dipl-modules'] ) ) {
            $modules = explode( ',', $plugin_options['dipl-modules'] );
            if ( in_array( 'dipl_team_slider', $modules ) ) {
                return true;
            }
        } else {
            return true;
        }

        return false;
    }

    public function dipl_register_post_types() {

        $labels = array(
            'name'                  => esc_html_x( 'DP Testimonials', 'Post Type General Name', 'divi-plus' ),
            'singular_name'         => esc_html_x( 'DP Testimonial', 'Post Type Singular Name', 'divi-plus' ),
            'menu_name'             => esc_html__( 'DP Testimonials', 'divi-plus' ),
            'name_admin_bar'        => esc_html__( 'DP Testimonial', 'divi-plus' ),
            'archives'              => esc_html__( 'DP Testimonial Archives', 'divi-plus' ),
            'attributes'            => esc_html__( 'DP Testimonial Attributes', 'divi-plus' ),
            'parent_item_colon'     => esc_html__( 'Parent Testimonial:', 'divi-plus' ),
            'all_items'             => esc_html__( 'All Testimonials', 'divi-plus' ),
            'add_new_item'          => esc_html__( 'Add New Testimonial', 'divi-plus' ),
            'add_new'               => esc_html__( 'Add New', 'divi-plus' ),
            'new_item'              => esc_html__( 'New Testimonial', 'divi-plus' ),
            'edit_item'             => esc_html__( 'Edit Testimonial', 'divi-plus' ),
            'update_item'           => esc_html__( 'Update Testimonial', 'divi-plus' ),
            'view_item'             => esc_html__( 'View Testimonial', 'divi-plus' ),
            'view_items'            => esc_html__( 'View Testimonial', 'divi-plus' ),
            'search_items'          => esc_html__( 'Search Testimonial', 'divi-plus' ),
            'not_found'             => esc_html__( 'Not found', 'divi-plus' ),
            'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'divi-plus' ),
            'featured_image'        => esc_html__( 'Testimonial Author Image', 'divi-plus' ),
            'set_featured_image'    => esc_html__( 'Set testimonial author image', 'divi-plus' ),
            'remove_featured_image' => esc_html__( 'Remove testimonial author image', 'divi-plus' ),
            'use_featured_image'    => esc_html__( 'Use as testimonial author image', 'divi-plus' ),
            'insert_into_item'      => esc_html__( 'Insert into item', 'divi-plus' ),
            'uploaded_to_this_item' => esc_html__( 'Uploaded to this item', 'divi-plus' ),
            'items_list'            => esc_html__( 'Testimonials list', 'divi-plus' ),
            'items_list_navigation' => esc_html__( 'Testimonials list navigation', 'divi-plus' ),
            'filter_items_list'     => esc_html__( 'Filter testimonial list', 'divi-plus' ),
        );
        $args = array(
            'label'                 => esc_html__( 'DP Testimonials', 'divi-plus' ),
            'description'           => esc_html__( 'Divi Plus Testimonials Custom Post', 'divi-plus' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail', ),
            'taxonomies'            => array( 'dipl-testimonial-category' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 20,
            'menu_icon'             => 'dashicons-format-quote',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
        );

        if ( $this->dipl_is_testimonial_enabled() ) {
            register_post_type( 'dipl-testimonial', $args );
        }

        $labels = array(
            'name'                  => esc_html__( 'DP Team Members', 'divi-plus' ),
            'singular_name'         => esc_html__( 'DP Team Member', 'divi-plus' ),
            'menu_name'             => esc_html__( 'DP Team Members', 'divi-plus' ),
            'add_new'               => esc_html__( 'Add New', 'divi-plus' ),
            'add_new_item'          => esc_html__( 'Add New Member', 'divi-plus' ),
            'edit_item'             => esc_html__( 'Edit Member', 'divi-plus' ),
            'new_item'              => esc_html__( 'New Member', 'divi-plus' ),
            'view_item'             => esc_html__( 'View Member', 'divi-plus' ),
            'all_items'             => esc_html__( 'All Members', 'divi-plus' ),
            'search_items'          => esc_html__( 'Search Members', 'divi-plus' ),
            'not_found'             => esc_html__( 'No member found', 'divi-plus' ),
            'not_found_in_trash'    => esc_html__( 'No members found in Trash', 'divi-plus' ),
            'featured_image'        => esc_html__( 'Team Member Image', 'divi-plus' ),
            'set_featured_image'    => esc_html__( 'Set team member image', 'divi-plus' ),
            'remove_featured_image' => esc_html__( 'Remove team member image', 'divi-plus' ),
            'use_featured_image'    => esc_html__( 'Use as team member image', 'divi-plus' ),
            'parent_item_colon'     => esc_html__( 'Parent Member:', 'divi-plus' ),
        );

        $args = array(
            'labels'            => $labels,
            'description'       => esc_html__( 'Divi Plus Team Members Custom Post', 'divi-plus' ),
            'public'            => true,
            'supports'          => array( 'title', 'editor', 'author', 'thumbnail', 'revisions' ),
            'taxonomies'        => array( 'dipl-team-member-category' ),
            'hierarchical'      => false,
            'menu_position'     => 20,
            'menu_icon'         => 'dashicons-admin-users',
            'show_ui'           => true,
            'show_in_menu'      => true,
            'show_in_nav_menus' => true,
            'has_archive'       => true,
            'query_var'         => true,
            'capability_type'   => 'post',
        );

        if ( $this->dipl_is_team_enabled() ) {
            register_post_type( 'dipl-team-member', $args );
        }
    }

    public function dipl_register_taxonomies() {

        $labels = array(
            'name'                       => esc_html_x( 'DP Testimonial Categories', 'Taxonomy General Name', 'divi-plus' ),
            'singular_name'              => esc_html_x( 'DP Testimonial Category', 'Taxonomy Singular Name', 'divi-plus' ),
            'menu_name'                  => esc_html__( 'DP Testimonial Categories', 'divi-plus' ),
            'all_items'                  => esc_html__( 'All Testimonial Categories', 'divi-plus' ),
            'parent_item'                => esc_html__( 'Parent Testimonial Category', 'divi-plus' ),
            'parent_item_colon'          => esc_html__( 'Parent Testimonial Category:', 'divi-plus' ),
            'new_item_name'              => esc_html__( 'New Testimonial Category Name', 'divi-plus' ),
            'add_new_item'               => esc_html__( 'Add New Testimonial Category', 'divi-plus' ),
            'edit_item'                  => esc_html__( 'Edit Testimonial Category', 'divi-plus' ),
            'update_item'                => esc_html__( 'Update Testimonial Category', 'divi-plus' ),
            'view_item'                  => esc_html__( 'View Testimonial Category', 'divi-plus' ),
            'separate_items_with_commas' => esc_html__( 'Separate categories with commas', 'divi-plus' ),
            'add_or_remove_items'        => esc_html__( 'Add or remove categories', 'divi-plus' ),
            'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'divi-plus' ),
            'popular_items'              => esc_html__( 'Popular Testimonial Categories', 'divi-plus' ),
            'search_items'               => esc_html__( 'Search Testimonial Categories', 'divi-plus' ),
            'not_found'                  => esc_html__( 'Not Found', 'divi-plus' ),
            'no_terms'                   => esc_html__( 'No Testimonial Categories', 'divi-plus' ),
            'items_list'                 => esc_html__( 'Testimonial Categories list', 'divi-plus' ),
            'items_list_navigation'      => esc_html__( 'Testimonial Categories list navigation', 'divi-plus' ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
        );

        if ( $this->dipl_is_testimonial_enabled() ) {
            register_taxonomy( 'dipl-testimonial-category', array( 'dipl-testimonial' ), $args );
        }

        $labels = array(
            'name'                       => esc_html_x( 'DP Team Member Categories', 'Taxonomy General Name', 'divi-plus' ),
            'singular_name'              => esc_html_x( 'DP Team Member Category', 'Taxonomy Singular Name', 'divi-plus' ),
            'menu_name'                  => esc_html__( 'DP Team Member Categories', 'divi-plus' ),
            'all_items'                  => esc_html__( 'All Team Member Categories', 'divi-plus' ),
            'parent_item'                => esc_html__( 'Parent Team Member Category', 'divi-plus' ),
            'parent_item_colon'          => esc_html__( 'Parent Team Member Category:', 'divi-plus' ),
            'new_item_name'              => esc_html__( 'New Team Member Category Name', 'divi-plus' ),
            'add_new_item'               => esc_html__( 'Add New Team Member Category', 'divi-plus' ),
            'edit_item'                  => esc_html__( 'Edit Team Member Category', 'divi-plus' ),
            'update_item'                => esc_html__( 'Update Team Member Category', 'divi-plus' ),
            'view_item'                  => esc_html__( 'View Team Member Category', 'divi-plus' ),
            'separate_items_with_commas' => esc_html__( 'Separate categories with commas', 'divi-plus' ),
            'add_or_remove_items'        => esc_html__( 'Add or remove categories', 'divi-plus' ),
            'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'divi-plus' ),
            'popular_items'              => esc_html__( 'Popular Team Member Categories', 'divi-plus' ),
            'search_items'               => esc_html__( 'Search Team Member Categories', 'divi-plus' ),
            'not_found'                  => esc_html__( 'Not Found', 'divi-plus' ),
            'no_terms'                   => esc_html__( 'No Team Member Categories', 'divi-plus' ),
            'items_list'                 => esc_html__( 'Team Member Categories list', 'divi-plus' ),
            'items_list_navigation'      => esc_html__( 'Team Member Categories list navigation', 'divi-plus' ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
        );

        if ( $this->dipl_is_team_enabled() ) {
            register_taxonomy( 'dipl-team-member-category', array( 'dipl-team-member' ), $args );
        }
    }

    public function dipl_add_meta_boxes() {
        add_action( 'add_meta_boxes', array( $this, 'dipl_meta_boxes' ) );
    }

    public function dipl_meta_boxes() {
        if ( $this->dipl_is_testimonial_enabled() ) {
            add_meta_box( 'dipl_testimonial_metabox', esc_html__( 'Testimonial Meta Fields', 'divi-plus' ), array( $this, 'dipl_testimonials_metabox_callback' ), 'dipl-testimonial', 'normal', 'high' );
        }

        if ( $this->dipl_is_team_enabled() ) {
            add_meta_box( 'dipl_team_member_metabox', esc_html__( 'Team Member Meta Fields', 'divi-plus' ), array( $this, 'dipl_team_member_metabox_callback' ), 'dipl-team-member', 'normal', 'high' );
        }
    }

    public function dipl_testimonials_metabox_callback( $post ) {
        
        wp_nonce_field( 'dipl_metaboxes_nonce', 'dipl_testimonial_metabox_nonce' );
        
        $author_name        = get_post_meta( $post->ID, 'dipl_testimonial_author_name', true );
        $author_email       = get_post_meta( $post->ID, 'dipl_testimonial_author_email', true );
        $author_designation = get_post_meta( $post->ID, 'dipl_testimonial_author_designation', true );
        $author_company     = get_post_meta( $post->ID, 'dipl_testimonial_author_company', true );
        $author_company_url = get_post_meta( $post->ID, 'dipl_testimonial_author_company_url', true );
        $author_rating      = get_post_meta( $post->ID, 'dipl_testimonial_author_rating', true );

        $ratings = array( '0.5', '1', '1.5', '2', '2.5', '3', '3.5', '4', '4.5', '5' );
        ?>
        <div class="dipl_meta_fields">
            <label for="dipl_testimonial_author_name">
                <?php esc_html_e( 'Author Name', 'divi-plus' ); ?>
            </label>
            <input type="text" id="dipl_testimonial_author_name" name="dipl_testimonial_author_name" value="<?php echo esc_attr( $author_name ); ?>" />
        </div>
        <div class="dipl_meta_fields">
            <label for="dipl_testimonial_author_email">
                <?php esc_html_e( 'Author Email', 'divi-plus' ); ?>
            </label>
            <input type="email" id="dipl_testimonial_author_email" name="dipl_testimonial_author_email" value="<?php echo esc_attr( $author_email ); ?>" />
        </div>
        <div class="dipl_meta_fields">
            <label for="dipl_testimonial_author_designation">
                <?php esc_html_e( 'Author Designation', 'divi-plus' ); ?>
            </label>
            <input type="text" id="dipl_testimonial_author_designation" name="dipl_testimonial_author_designation" value="<?php echo esc_attr( $author_designation ); ?>" />
        </div>
        <div class="dipl_meta_fields">
            <label for="dipl_testimonial_author_company">
                <?php esc_html_e( 'Author Company', 'divi-plus' ); ?>
            </label>
            <input type="text" id="dipl_testimonial_author_company" name="dipl_testimonial_author_company" value="<?php echo esc_attr( $author_company ); ?>" />
        </div>
        <div class="dipl_meta_fields">
            <label for="dipl_testimonial_author_company_url">
                <?php esc_html_e( 'Author Company Url', 'divi-plus' ); ?>
            </label>
            <input type="text" id="dipl_testimonial_author_company_url" name="dipl_testimonial_author_company_url" value="<?php echo esc_attr( $author_company_url ); ?>" />
        </div>
        <div class="dipl_meta_fields">
            <label for="dipl_testimonial_author_rating">
                <?php esc_html_e( 'Author Rating', 'divi-plus' ); ?>
            </label>
            <select id="dipl_testimonial_author_rating" name="dipl_testimonial_author_rating">
                <?php
                foreach( $ratings as $rating ) {
                    ?><option value="<?php echo esc_attr( $rating ); ?>" <?php selected( $author_rating, esc_attr( $rating ) ); ?>><?php echo esc_html( $rating ); ?></option><?php
                }
                ?>
            </select>
        </div>
        <?php
    }

    public function dipl_save_testimonial_meta_fields( $post_id ) {
        // doing an auto save.
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }

        // verify nonce.
        if ( ! isset( $_POST['dipl_testimonial_metabox_nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['dipl_testimonial_metabox_nonce'] ) ), 'dipl_metaboxes_nonce' ) ) {
            return;
        }

        // if current user can not edit the post.
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

        $fields = array(
            'dipl_testimonial_author_name',
            'dipl_testimonial_author_email',
            'dipl_testimonial_author_designation',
            'dipl_testimonial_author_company',
            'dipl_testimonial_author_company_url',
            'dipl_testimonial_author_rating',
        );

        foreach ( $fields as $field ) {
            if ( isset( $_POST[ $field ] ) ) {
                ${$field} = sanitize_text_field( wp_unslash( $_POST[ $field ] ) );
                update_post_meta( $post_id, $field, ${$field} );
            }
        }
    }

    public function dipl_team_member_metabox_callback( $post ) {
        $values         = get_post_custom( $post->ID );
        $short_desc     = isset( $values['dipl_team_member_short_desc'] ) ? $values['dipl_team_member_short_desc'][0] : '';
        $designation    = isset( $values['dipl_team_member_designation'] ) ? $values['dipl_team_member_designation'][0] : '';
        $linkedin       = isset( $values['dipl_team_member_linkedin'] ) ? $values['dipl_team_member_linkedin'][0] : '';
        $facebook       = isset( $values['dipl_team_member_facebook'] ) ? $values['dipl_team_member_facebook'][0] : '';
        $twitter        = isset( $values['dipl_team_member_twitter'] ) ? $values['dipl_team_member_twitter'][0] : '';
        $instagram      = isset( $values['dipl_team_member_instagram'] ) ? $values['dipl_team_member_instagram'][0] : '';
        $youtube        = isset( $values['dipl_team_member_youtube'] ) ? $values['dipl_team_member_youtube'][0] : '';
        $email          = isset( $values['dipl_team_member_email'] ) ? $values['dipl_team_member_email'][0] : '';
        $phone          = isset( $values['dipl_team_member_phone'] ) ? $values['dipl_team_member_phone'][0] : '';
        $skills         = isset( $values['dipl_team_member_skills'] ) ? $values['dipl_team_member_skills'][0] : '';
        $skills_value   = isset( $values['dipl_team_member_skills_value'] ) ? $values['dipl_team_member_skills_value'][0] : '';

        wp_nonce_field( 'dipl_metaboxes_nonce', 'dipl_team_member_metabox_nonce' );

        $allowed_html = array(
            'p' => array(
                'id'    => array(),
                'class' => array(),
            ),
            'ul' => array(
                'id'    => array(),
                'class' => array(),
            ),
            'ol' => array(
                'id'    => array(),
                'class' => array(),
            ),
            'li' => array(
                'id'    => array(),
                'class' => array(),
            ),
            'span' => array(
                'id'    => array(),
                'class' => array(),
            ),
            'strong' => array(
                'id'    => array(),
                'class' => array(),
            ),
            'b' => array(
                'id'    => array(),
                'class' => array(),
            ),
            'a' => array(
                'href'  => array(),
                'id'    => array(),
                'class' => array(),
            ),
            'br' => array(
                'id'    => array(),
                'class' => array(),
            ),
            'h1' => array(
                'id'    => array(),
                'class' => array(),
            ),
            'h2' => array(
                'id'    => array(),
                'class' => array(),
            ),
            'h3' => array(
                'id'    => array(),
                'class' => array(),
            ),
            'h4' => array(
                'id'    => array(),
                'class' => array(),
            ),
            'h5' => array(
                'id'    => array(),
                'class' => array(),
            ),
            'h6' => array(
                'id'    => array(),
                'class' => array(),
            ),
        );

        ?>
        <div class="dipl_meta_fields">
            <label for="dipl_team_member_short_desc">
                <?php esc_html_e( 'Short Description', 'divi-plus' ); ?>
            </label>
            <textarea type="text" name="dipl_team_member_short_desc" id="dipl_team_member_short_desc"><?php echo wp_kses( $short_desc, $allowed_html ); ?></textarea>
            <span class="info"><?php echo esc_html__( 'Support for few HTML tags like h1,h2,h3,h4,h5,h6,p,ul,ol,li,span,strong,b,a,br', 'divi-plus' ); ?></span>
        </div>
        <div class="dipl_meta_fields">
            <label for="dipl_team_member_designation">
                <?php esc_html_e( 'Designation', 'divi-plus' ); ?>
            </label>
            <input type="text" name="dipl_team_member_designation" id="dipl_team_member_designation" value="<?php echo esc_attr( $designation ); ?>" />
        </div>
        <div class="dipl_meta_fields">
            <label for="dipl_team_member_email">
                <?php esc_html_e( 'Email Address', 'divi-plus' ); ?>
            </label>
            <input type="email" name="dipl_team_member_email" id="dipl_team_member_email" value="<?php echo esc_attr( $email ); ?>" />
        </div>
        <div class="dipl_meta_fields">
            <label for="dipl_team_member_phone">
                <?php esc_html_e( 'Phone Number', 'divi-plus' ); ?>
            </label>
            <input type="tel" name="dipl_team_member_phone" id="dipl_team_member_phone" value="<?php echo esc_attr( $phone ); ?>" />
        </div>
        <div class="dipl_meta_fields">
            <label for="dipl_team_member_facebook">
                <?php esc_html_e( 'Facebook Url', 'divi-plus' ); ?>
            </label>
            <input type="url" name="dipl_team_member_facebook" id="dipl_team_member_facebook" value="<?php echo esc_attr( $facebook ); ?>" />
        </div>
        <div class="dipl_meta_fields">
            <label for="dipl_team_member_twitter">
                <?php esc_html_e( 'Twitter Url', 'divi-plus' ); ?>
            </label>
            <input type="url" name="dipl_team_member_twitter" id="dipl_team_member_twitter" value="<?php echo esc_attr( $twitter ); ?>" />
        </div>
        <div class="dipl_meta_fields">
            <label for="dipl_team_member_linkedin">
                <?php esc_html_e( 'Linkedin Url', 'divi-plus' ); ?>
            </label>
            <input type="url" name="dipl_team_member_linkedin" id="dipl_team_member_linkedin" value="<?php echo esc_attr( $linkedin ); ?>" />
        </div>
        <div class="dipl_meta_fields">
            <label for="dipl_team_member_instagram">
                <?php esc_html_e( 'Instagram Url', 'divi-plus' ); ?>
            </label>
            <input type="url" name="dipl_team_member_instagram" id="dipl_team_member_instagram" value="<?php echo esc_attr( $instagram ); ?>" />
        </div>
        <div class="dipl_meta_fields">
            <label for="dipl_team_member_youtube">
                <?php esc_html_e( 'Youtube Url', 'divi-plus' ); ?>
            </label>
            <input type="url" name="dipl_team_member_youtube" id="dipl_team_member_youtube" value="<?php echo esc_attr( $youtube ); ?>" />
        </div>
        <div class="dipl_meta_fields">
            <label for="dipl_team_member_youtube">
                <?php esc_html_e( 'Skills', 'divi-plus' ); ?>
            </label>
            <div class="dipl_repeator_meta_fields">
                <input type="hidden" id="dipl_team_member_skills" name="dipl_team_member_skills" value="<?php echo esc_attr( $skills ); ?>" />
                <input type="hidden" id="dipl_team_member_skills_value" name="dipl_team_member_skills_value" value="<?php echo esc_attr( $skills_value ); ?>" />
                <?php
                    $skills         = explode( ',', $skills );
                    $skills_value   = explode( ',', $skills_value );
                if ( is_array( $skills ) && ! empty( array_filter( $skills ) ) ) {
                    if ( count($skills) > 1 ) {
                        $row_control = '<span class="dipl_repeator_meta_field_add_row_control dipl_repeator_meta_field_remove_row">-</span>';
                    } else {
                        $row_control = '';
                    }
                    for ( $i=0; $i < count($skills); $i++ ) {
                        $skill_value = array_key_exists( $i, $skills_value ) ? absint( $skills_value[$i] ) : 100;
                        ?>
                        <div class="dipl_repeator_meta_field_row">
                            <div class="dipl_repeator_meta_field">
                                <input type="text" class="dipl_team_member_skills" value="<?php echo esc_attr( $skills[$i] ); ?>" placeholder="Skill" />
                                <input type="number" class="dipl_team_member_skills_value" value="<?php echo esc_attr( $skill_value ); ?>" placeholder="Skill Value Between 0 to 100" step="1" min="0" max="100"/>
                            </div>
                            <p class="dipl_repeator_meta_field_row_controls">
                                <?php echo et_core_intentionally_unescaped( $row_control, 'html' ); ?>
                                <?php 
                                if ( $i === ( count($skills) - 1 ) ) {
                                    ?><span class="dipl_repeator_meta_field_add_row_control dipl_repeator_meta_field_add_row">+</span><?php
                                }
                                ?>
                            </p>
                        </div>
                        <?php
                    }
                } else {
                 ?>
                    <div class="dipl_repeator_meta_field_row">
                        <div class="dipl_repeator_meta_field">
                            <input type="text" class="dipl_team_member_skills" placeholder="Skill" />
                            <input type="number" class="dipl_team_member_skills_value" placeholder="Skill Value Between 0 to 100" step="1" min="0" max="100" />
                        </div>
                        <p class="dipl_repeator_meta_field_row_controls">
                            <span class="dipl_repeator_meta_field_add_row_control dipl_repeator_meta_field_add_row">+</span>
                        </p>
                    </div>
                <?php
                }
                ?>
            </div> 
        </div>
        <?php
    }

    public function dipl_save_team_member_meta_fields( $post_id ) {
        // doing an auto save.
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }

        // verify nonce.
        if ( ! isset( $_POST['dipl_team_member_metabox_nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['dipl_team_member_metabox_nonce'] ) ), 'dipl_metaboxes_nonce' ) ) {
            return;
        }

        // if current user can not edit the post.
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

        $fields = array(
            'dipl_team_member_short_desc',
            'dipl_team_member_designation',
            'dipl_team_member_linkedin',
            'dipl_team_member_facebook',
            'dipl_team_member_twitter',
            'dipl_team_member_instagram',
            'dipl_team_member_youtube',
            'dipl_team_member_email',
            'dipl_team_member_skills',
            'dipl_team_member_skills_value',
            'dipl_team_member_phone',
        );

        $allowed_html = array(
            'p' => array(
                'id'    => array(),
                'class' => array(),
            ),
            'ul' => array(
                'id'    => array(),
                'class' => array(),
            ),
            'ol' => array(
                'id'    => array(),
                'class' => array(),
            ),
            'li' => array(
                'id'    => array(),
                'class' => array(),
            ),
            'span' => array(
                'id'    => array(),
                'class' => array(),
            ),
            'strong' => array(
                'id'    => array(),
                'class' => array(),
            ),
            'b' => array(
                'id'    => array(),
                'class' => array(),
            ),
            'a' => array(
                'href'  => array(),
                'id'    => array(),
                'class' => array(),
            ),
            'br' => array(
                'id'    => array(),
                'class' => array(),
            ),
            'h1' => array(
                'id'    => array(),
                'class' => array(),
            ),
            'h2' => array(
                'id'    => array(),
                'class' => array(),
            ),
            'h3' => array(
                'id'    => array(),
                'class' => array(),
            ),
            'h4' => array(
                'id'    => array(),
                'class' => array(),
            ),
            'h5' => array(
                'id'    => array(),
                'class' => array(),
            ),
            'h6' => array(
                'id'    => array(),
                'class' => array(),
            ),
        );

        foreach ( $fields as $field ) {
            if ( isset( $_POST[ $field ] ) ) {
                if ( 'dipl_team_member_short_desc' === $field ) {
                    ${$field} = wp_kses( wp_unslash( $_POST[$field] ), $allowed_html );
                } else {
                    ${$field} = sanitize_text_field( wp_unslash( $_POST[ $field ] ) );
                }
                update_post_meta( $post_id, $field, ${$field} );
            }
        }
    }

    public function dipl_array_recursion( &$array, $search ) {
        foreach ( $array as $key => &$value ) {
            if ( is_array( $value ) ) {
                $this->dipl_array_recursion( $value, $search );
            } else if ( in_array( $key, $search, true ) ) {
                if ( 'dipl_modal' === $value ) {
                    if ( ! isset( $array['attrs']['modal_id'] ) || '' ===  $array['attrs']['modal_id'] ) {
                        $modal_counter = intval( get_option( 'dipl_modal_counter', '1' ) );
                        $array['attrs']['modal_id'] = 'dipl_modal_module_' . $modal_counter;
                        $modal_counter = $modal_counter + 1;
                        update_option( 'dipl_modal_counter', $modal_counter );
                    }
                }
            }
        }
    }

    public function et_fb_ajax_save() {
        /**
         * @see et_fb_ajax_save() in themes/Divi/includes/builder/functions.php
         */
        if (
            ! isset( $_POST['et_fb_save_nonce'] ) ||
            ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['et_fb_save_nonce'] ) ), 'et_fb_save_nonce' )
        ) {
            return;
        }

        $post_id = isset( $_POST['post_id'] ) ? absint( $_POST['post_id'] ) : '';

        if ( '' === $post_id ) {
            return;
        }

        if ( 
            isset( $_POST['options']['status'] ) &&
            function_exists( 'et_fb_current_user_can_save' ) &&
            ! et_fb_current_user_can_save( $post_id, sanitize_text_field( wp_unslash( $_POST['options']['status'] ) ) )
        ) {
            return;
        }

        // Fetch the builder attributes and sanitize them.
        if ( isset ( $_POST['modules'] ) ) {
            // phpcs:ignore ET.Sniffs.ValidatedSanitizedInput.InputNotSanitized
            $shortcode_data = json_decode( stripslashes( $_POST['modules'] ), true );
            $this->dipl_array_recursion( $shortcode_data, array( 'type' ) );
            $_POST['modules'] = addslashes( wp_json_encode( $shortcode_data ) );
        }
        
    }

    public function dipl_ajax_search_results() {
        if ( ! isset( $_POST['dipl_ajax_search_nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['dipl_ajax_search_nonce'] ) ), 'elicus-divi-plus-ajax-search-nonce' ) ) {
            return;
        }

        $search             = isset( $_POST['search'] ) ? trim( sanitize_text_field( wp_unslash( $_POST['search'] ) ) ) : '';
        $post_types         = isset( $_POST['post_types'] ) ? sanitize_text_field( wp_unslash( $_POST['post_types'] ) ) : '';
        $search_in          = isset( $_POST['search_in'] ) ? sanitize_text_field( wp_unslash( $_POST['search_in'] ) ) : '';
        $display_fields     = isset( $_POST['display_fields'] ) ? sanitize_text_field( wp_unslash( $_POST['display_fields'] ) ) : '';
        $url_new_window     = isset( $_POST['url_new_window'] ) ? sanitize_text_field( wp_unslash( $_POST['url_new_window'] ) ) : 'off';
        $number_of_results  = isset( $_POST['number_of_results'] ) ? intval( wp_unslash( $_POST['number_of_results'] ) ) : '10';
        $no_result_text     = isset( $_POST['no_result_text'] ) ? sanitize_text_field( wp_unslash( $_POST['no_result_text'] ) ) : 'No result found';
        $orderby            = isset( $_POST['orderby'] ) ? sanitize_text_field( wp_unslash( $_POST['orderby'] ) ) : 'post_date';
        $order              = isset( $_POST['order'] ) ? sanitize_text_field( wp_unslash( $_POST['order'] ) ) : 'DESC';
        $masonry            = isset( $_POST['masonry'] ) ? sanitize_text_field( wp_unslash( $_POST['masonry'] ) ) : 'off';
        $result_layout      = 'classic';

        if ( empty( $search ) ) {
            echo '';
            exit();
        }

        $link_target = 'on' === $url_new_window ? esc_attr( '_blank' ) : esc_attr( '_self' );

        $raw_post_types = get_post_types( array(
            'public' => true,
            'show_ui' => true,
            'exclude_from_search' => false,
        ), 'objects' );

        $blocklist = array( 'et_pb_layout', 'layout', 'attachment' );
        $whitelisted_post_types = array();

        foreach ( $raw_post_types as $post_type ) {
            $is_blocklisted = in_array( $post_type->name, $blocklist );
            if ( ! $is_blocklisted && post_type_exists( $post_type->name ) ) {
                array_push( $whitelisted_post_types, $post_type->name );
            }
        }

        $post_types = explode( ',', $post_types );
        foreach( $post_types as $key => $post_type ) {
            if ( ! in_array( $post_type, $whitelisted_post_types, true ) ) {
                unset( $post_types[$key] );
            }
        }

        $whitelisted_search_in = array( 'post_title', 'post_content', 'post_excerpt' );
        $search_in = explode( ',', $search_in );
        foreach( $search_in as $key => $in ) {
            if ( ! in_array( $in, $whitelisted_search_in, true ) ) {
                unset( $search_in[$key] );
            }
        }

        $whitelisted_orderby = array( 'post_date', 'post_modified', 'post_title', 'post_name', 'ID', 'rand' );
        if ( ! in_array( $orderby, $whitelisted_orderby, true ) ) {
            $orderby = 'post_date';
        }

        $whitelisted_order = array( 'ASC', 'DESC' );
        if ( ! in_array( $order, $whitelisted_order, true ) ) {
            $order = 'DESC';
        }

        if ( 'rand' === $orderby ) {
            $orderby    = 'RAND()';
            $order      = '';
        }

        global $wpdb;
        $search = '%' . $wpdb->esc_like( $search ) . '%';

        $where_search_in = array();
        if ( ! empty( $search_in ) ) {
            foreach ( $search_in as $in ) {
                array_push( $where_search_in, $wpdb->prepare( esc_sql( $in ) .' LIKE %s', $search ) );
            }
            $where_search_in = implode( ' OR ', $where_search_in );
        } else {
            foreach ( $whitelisted_search_in as $in ) {
                array_push( $where_search_in, $wpdb->prepare( esc_sql( $in ) .' LIKE %s', $search ) );
            }
            $where_search_in = implode( ' OR ', $where_search_in );
        }

        $where_post_type = array();
        if ( ! empty( $post_types ) ) {
            foreach ( $post_types as $post_type ) {
                array_push( $where_post_type, $wpdb->prepare( "post_type = %s", esc_sql( $post_type ) ) );
            }
            $where_post_type = implode( ' OR ', $where_post_type );
        } else {
            foreach ( $whitelisted_post_types as $post_type ) {
                array_push( $where_post_type, $wpdb->prepare( "post_type = %s", esc_sql( $post_type ) ) );
            }
            $where_post_type = implode( ' OR ', $where_post_type );
        }

        $order_clause = " ORDER BY {$orderby} {$order} ";

        if ( -1 !== $number_of_results ) {
            $limit = ' LIMIT '. esc_sql( absint( $number_of_results ) );
        } else {
            $limit = '';
        }

        $where      = "(" . $where_search_in . ") AND (" . $where_post_type . ") AND post_status = 'publish' ";
        $table      = $wpdb->prefix . 'posts';
        $query      = "SELECT DISTINCT ID, post_title FROM " . $table . " WHERE " . $where . $order_clause . $limit;
        // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.PreparedSQL.NotPrepared
        $results    = $wpdb->get_results( $query );
        
        if ( ! $results || empty( $results ) ) {
            $output  = '<div class="dipl_ajax_search_results dipl_ajax_search_no_results">';
            $output .= esc_html( $no_result_text );
            $output .= '</div>';
            echo et_core_intentionally_unescaped( $output, 'html' );
            exit();
        }

        $whitelisted_display_fields = array( 'title', 'excerpt', 'featured_image', 'product_price' );
        $display_fields = explode( ',', $display_fields );
        foreach( $display_fields as $key => $display_field ) {
            if ( ! in_array( $display_field, $whitelisted_display_fields, true ) ) {
                unset( $display_fields[$key] );
            }
        }

        if ( empty( $display_fields ) ) {
            $display_fields = array( 'title' );
        }
        
        if ( 'on' === $masonry ) {
            $masonry_class = ' dipl_ajax_search_result_masonry';
        } else {
            $masonry_class = '';
        }

        $output  = '<div class="dipl_ajax_search_results' . $masonry_class . '">';
        $output .= '<div class="dipl_ajax_search_items">';
        foreach( $results as $result ) {
            $post_id    = absint( $result->ID );
            $post_title = $result->post_title;

            if ( 'product' === get_post_type( $post_id ) ) {
                $product = wc_get_product( $post_id );
                $product_visibility = $product->get_catalog_visibility();
                if ( ! in_array( $product_visibility, array( 'search', 'visible' ) ) ) {
                    continue;
                }
            } else {
                $product = '';
            }
            
            if ( 'on' === $masonry ) {
                $output .= '<div class="dipl_ajax_search_isotope_item">';
            }

            if ( file_exists( $this->plugin_dir . 'modules/AjaxSearch/layouts/' . sanitize_file_name( $result_layout ) . '.php' ) ) {
                include $this->plugin_dir . 'modules/AjaxSearch/layouts/' . sanitize_file_name( $result_layout ) . '.php';
            } else {
                include $this->plugin_dir . 'modules/AjaxSearch/layouts/classic.php';
            }

            if ( 'on' === $masonry ) {
                $output .= '</div>';
            }
        }
        $output .= '</div>';
        $output .= '</div>';

        echo et_core_intentionally_unescaped( $output, 'html' );
        exit();

    }

    public function dipl_get_woo_products() {
        if ( ! isset( $_POST['dipl_get_woo_products_nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['dipl_get_woo_products_nonce'] ) ), 'elicus-divi-plus-woo-products-nonce' ) ) {
            return;
        }

        if ( ! isset( $_POST['props'] ) ) {
            return;
        }

        $defaults = array(
            'order_class' => '',
            'view_type' => 'default',
            'use_current_loop' => 'off',
            'product_layout' => 'layout1',
            'products_number' => '10',
            'offset_number' => 0,
            'products_order' => 'DESC',
            'products_order_by' => 'date',
            'hide_out_of_stock' => 'off',
            'enable_out_of_stock_label' => 'off',
            'out_of_stock_label' => esc_html__( 'Out of Stock', 'divi-plus' ),
            'include_categories' => '',
            'include_tags' => '',
            'taxonomies_relation' => 'OR',
            'use_masonry' => 'off',
            'enable_quickview' => 'off',
            'quickview_link_text' => 'Quickview',
            'show_thumbnail' => 'on',
            'thumbnail_size' => 'woocommerce_thumbnail',
            'show_price' => 'on',
            'star_rating' => 'off',
            'show_add_to_cart' => 'on',
            'simple_add_to_cart_text' => '',
            'variable_add_to_cart_text' => '',
            'grouped_add_to_cart_text' => '',
            'external_add_to_cart_text' => '',
            'out_of_stock_add_to_cart_text' => '',
            'show_add_to_cart_on_hover' => 'off',
            'add_to_cart_icon_desktop' => '',
            'add_to_cart_icon_tablet' => '',
            'add_to_cart_icon_phone' => '',
            'show_sale_badge' => 'on',
            'sale_badge_text' => 'label',
            'sale_label_text' => '',
            'title_level' => 'h4',
            'quickview_add_to_cart_icon_desktop' => '',
            'quickview_add_to_cart_icon_tablet' => '',
            'quickview_add_to_cart_icon_phone' => '',
            'quickview_title_level' => 'h2',
            'is_product_category' => false,
            'is_product_tag' => false,
            'is_product_taxonomy' => false,
            'is_user_logged_in' => false,
            'is_search' => false,
            'term_id' => '',
            'term_slug' => '',
            'taxonomy' => '',
            'search_query' => '',
            'page' => 1,
            'total_pages' => 1,
            'min_price' => '',
            'max_price' => '',
        );

        foreach ( $defaults as $key => $default ) {
            // phpcs:ignore ET.Sniffs.ValidatedSanitizedInput.InputNotSanitized
            ${$key} = trim( sanitize_text_field( wp_unslash( et_()->array_get( $_POST['props'], $key, $default ) ) ) );
        }

        $processed_title_level  = esc_html( $title_level );
        $valid_heading_tag      = array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' );
        if ( ! in_array( $processed_title_level, $valid_heading_tag, true ) ) {
            $processed_title_level = esc_html( 'h4' );
        }

        $quickview_title_level  = esc_html( $quickview_title_level );
        if ( ! in_array( $quickview_title_level, $valid_heading_tag, true ) ) {
            $quickview_title_level = esc_html( 'h4' );
        }

        $products_number = ( 0 === $products_number ) ? -1 : (int) $products_number;

        $page               = absint( $page );
        $offset_number      = ( $products_number * ( $page - 1 ) ) + $offset_number;

        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => intval( $products_number ),
            'offset'         => intval( $offset_number ),
            'post_status'    => 'publish',
            'orderby'        => 'date',
            'order'          => 'DESC',
        );

        if ( is_user_logged_in() ) {
            $args['post_status'] = array(
                'publish',
                'private',
            );
        }

        $args['tax_query'] = array(
            array(
                'taxonomy'  => 'product_visibility',
                'terms'     => 'exclude-from-catalog',
                'field'     => 'slug',
                'operator'  => 'NOT IN',
            ),
        );

        $tax_query = array();

        if ( $use_current_loop ) {
            if ( $is_product_category ) {
                $tax_query[] = array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'term_id',
                    'terms'    => intval( $term_id ),
                    'operator' => 'IN',
                );
            } else if ( $is_product_tag ) {
                $tax_query[] = array(
                    'taxonomy' => 'product_tag',
                    'field'    => 'slug',
                    'terms'    => sanitize_text_field( $term_slug ),
                    'operator' => 'IN',
                );
            } else if ( $is_product_taxonomy ) {
                $tax_query[] = array(
                    'taxonomy' => sanitize_text_field( $taxonomy ),
                    'field'    => 'term_id',
                    'terms'    => intval( $term_id ),
                    'operator' => 'IN',
                );
            }

            if ( $is_search ) {
                $args['s'] = sanitize_text_field( $search_query );
            }
        }

        if ( $include_categories && '' !== $include_categories && ! $use_current_loop ) {
            $tax_query[] = array(
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => array_map( 'intval', explode( ',', $include_categories ) ),
                'operator' => 'IN',
            );
        }

        if ( $include_tags && '' !== $include_tags && ! $use_current_loop ) {
            $tax_query[] = array(
                'taxonomy' => 'product_tag',
                'field'    => 'term_id',
                'terms'    => array_map( 'intval', explode( ',', $include_tags ) ),
                'operator' => 'IN',
            );
        }

        if ( '' !== $products_order_by ) {
            if ( 'price' === $products_order_by ) {
                $args['orderby']    = 'meta_value_num';
                $args['meta_key']   = '_price';
            } else if( 'stock_status' === $products_order_by ) {
                $args['orderby']    = 'meta_value';
                $args['meta_key']   = '_stock_status';
            } else {
                $args['orderby'] = sanitize_text_field( $products_order_by );
            }
        } 

        if ( '' !== $products_order ) {
            $args['order'] = sanitize_text_field( $products_order );
        }

        switch( $view_type ) {

            case 'featured':
                $args['tax_query'][] = array(
                    'taxonomy'         => 'product_visibility',
                    'terms'            => 'featured',
                    'field'            => 'name',
                    'operator'         => 'IN',
                    'include_children' => false,
                );
                break;

            case 'sale':
                if ( function_exists( 'wc_get_product_ids_on_sale' ) ) {
                    $args['post__in'] = array_merge( array( 0 ), wc_get_product_ids_on_sale() );
                }
                break;

            case 'best_selling':
                $args['meta_key'] = 'total_sales';
                $args['order']    = 'DESC';
                $args['orderby']  = 'meta_value_num';
                break;

            case 'top_rated':
                $args['meta_key'] = '_wc_average_rating';
                $args['order']    = 'DESC';
                $args['orderby']  = 'meta_value_num';
                break;

            default:
                break;
        }

        if ( 'on' === $hide_out_of_stock ) {
            $args['meta_query'] = array(
                array(
                    'key'     => '_stock_status',
                    'value'   => 'instock',
                    'compare' => 'IN',
                ),
                array(
                    'key'     => '_stock_status',
                    'value'   => 'onbackorder',
                    'compare' => 'IN',
                ),
                'relation' => 'OR'
            );
        }

        if ( ! empty( $tax_query ) ) {
            if ( ! $use_current_loop && count( $tax_query ) > 1 ) {
                $tax_query['relation'] = sanitize_text_field( $taxonomies_relation );
            }
            $args['tax_query'] = array_merge( $args['tax_query'], $tax_query );
        }

        // phpcs:ignore ET.Sniffs.ValidatedSanitizedInput.InputNotSanitized
        $query_vars = isset( $_POST['query_vars'] ) ? $_POST['query_vars'] : '';
        
        if ( ! empty( $query_vars ) ) {
            $attributes = array();
            foreach ( $query_vars as $key => $value ) {
                if ( 0 === strpos( $key, 'filter_' ) ) {
                    $attribute    = wc_sanitize_taxonomy_name( str_replace( 'filter_', '', $key ) );
                    $taxonomy     = wc_attribute_taxonomy_name( $attribute );
                    $filter_terms = ! empty( $value ) ? explode( ',', wc_clean( wp_unslash( $value ) ) ) : array();
                    if ( empty( $filter_terms ) || ! taxonomy_exists( $taxonomy ) || ! wc_attribute_taxonomy_id_by_name( $attribute ) ) {
                        continue;
                    }
                    $attributes[ $taxonomy ]['terms'] = array_map( 'sanitize_title', $filter_terms );
                }
            }
            if ( ! empty( $attributes ) ) {
                foreach ( $attributes as $taxonomy => $data ) {
                    $args['tax_query'][] = array(
                        'taxonomy'         => sanitize_text_field( $taxonomy ),
                        'field'            => 'slug',
                        'terms'            => $data['terms'],
                        'operator'         => 'IN',
                        'include_children' => false,
                    );
                }
            }
        }

        $args['tax_query']['relation'] = 'AND';

        $add_to_cart_icon = array(
            'desktop' => $add_to_cart_icon_desktop,
            'tablet' => $add_to_cart_icon_tablet,
            'phone' => $add_to_cart_icon_phone
        );

        $add_to_cart_icon = array_filter( $add_to_cart_icon );

        if ( $simple_add_to_cart_text || $variable_add_to_cart_text || $grouped_add_to_cart_text || $external_add_to_cart_text || $out_of_stock_add_to_cart_text ) {
            $add_to_cart_text = array(
                'simple' => esc_html( $simple_add_to_cart_text ),
                'variable' => esc_html( $variable_add_to_cart_text ),
                'grouped' => esc_html( $grouped_add_to_cart_text ),
                'external' => esc_html( $external_add_to_cart_text ),
                'out_of_stock' => esc_html( $out_of_stock_add_to_cart_text ),
            );
        } else {
            $add_to_cart_text = array();
        }

        if ( 'on' === $enable_quickview ) {
            $order_number = str_replace( 'dipl_woo_products_', '', $order_class );
            $data_atts = sprintf(
                ' data-show_sale_badge="%1$s" data-sale_badge_text="%2$s" data-sale_label_text="%3$s" data-quickview_add_to_cart_icon_desktop="%4$s" data-quickview_add_to_cart_icon_tablet="%5$s" data-quickview_add_to_cart_icon_phone="%6$s" data-quickview_title_level="%7$s"',
                esc_attr( $show_sale_badge ),
                esc_attr( $sale_badge_text ),
                esc_attr( $sale_label_text ),
                esc_attr( $quickview_add_to_cart_icon_desktop ),
                esc_attr( $quickview_add_to_cart_icon_tablet ),
                esc_attr( $quickview_add_to_cart_icon_phone ),
                esc_attr( $quickview_title_level )
            );
        }

        $args = dipl_filter_products_query( $args );

        if ( '' !== $min_price || '' !== $max_price ) {
            $min_price = '' !== $min_price ? floatval( $min_price ) : 0;
            $max_price = '' !== $max_price ? floatval( $max_price ) : PHP_INT_MAX;

            if ( wc_tax_enabled() && 'incl' === get_option( 'woocommerce_tax_display_shop' ) && ! wc_prices_include_tax() ) {
                $tax_class = apply_filters( 'woocommerce_price_filter_widget_tax_class', '' ); // Uses standard tax class.
                $tax_rates = WC_Tax::get_rates( $tax_class );

                if ( $tax_rates ) {
                    $min_price -= WC_Tax::get_tax_total( WC_Tax::calc_inclusive_tax( $min_price, $tax_rates ) );
                    $max_price -= WC_Tax::get_tax_total( WC_Tax::calc_inclusive_tax( $max_price, $tax_rates ) );
                }
            }

            $meta_query = array(
                'key' => '_price',
                'value' => array( $min_price, $max_price ),
                'compare' => 'between',
                'type' => 'numeric'
            );

            if ( isset( $args['meta_query'] ) ) {
                array_push( $args['meta_query'], $meta_query );
                $args['meta_query']['relation'] = 'AND';
            } else {
                $args['meta_query'] = array(
                    $meta_query
                );
            }
        }

        $args = apply_filters( 'dipl_woo_products_args', $args );

        $query = new WP_Query( $args );

        if ( $query->have_posts() ) {

            $output = '';

            while ( $query->have_posts() ) {
                $query->the_post();

                $product_id = intval( get_the_ID() );

                $output .= '<div class="dipl_woo_products_isotope_item dipl_woo_products_isotope_item_page_' . $page . '">';

                include $this->plugin_dir . 'modules/WooProducts/layouts/' . sanitize_file_name( $product_layout ) . '.php';

                $output .= '</div>';
            }

            wp_reset_postdata();

            $data = array(
                'success' => true,
                'items' => $output,
            );

        } else {
            $data = array();
        }

        wp_send_json( $data );
    }

    public function dipl_get_product_page() {

        $flag = 0;

        if ( ! isset( $_POST['dipl_product_popup_nonce'] ) ) {
            return false;
            exit;
        } else {
            if ( wp_verify_nonce( sanitize_key( wp_unslash( $_POST['dipl_product_popup_nonce'] ) ), 'elicus-divi-plus-woo-products-carousel-nonce' ) ) {
                $flag = 1;
            }
            if ( wp_verify_nonce( sanitize_key( wp_unslash( $_POST['dipl_product_popup_nonce'] ) ), 'elicus-divi-plus-woo-products-nonce' ) ) {
                $flag = 1;
            }
        }

        if ( 0 === $flag ) {
            return false;
            exit;
        }

        $defaults = array(
            'product_id' => 0,
            'order_number' => 0,
            'quickview_add_to_cart_icon_desktop' => '',
            'quickview_add_to_cart_icon_tablet' => '',
            'quickview_add_to_cart_icon_phone' => '',
            'show_sale_badge' => 'on',
            'sale_badge_text' => 'label',
            'sale_label_text' => '',
            'quickview_title_level' => 'h2',
        );

        foreach ( $defaults as $key => $default ) {
            // phpcs:ignore ET.Sniffs.ValidatedSanitizedInput.InputNotSanitized
            if ( isset( $_POST['props'][$key] ) && et_()->includes( $_POST['props'][$key], '%' ) ) {
                // phpcs:ignore ET.Sniffs.ValidatedSanitizedInput.InputNotSanitized
                $prepared_value  = preg_replace( '/%([a-f0-9]{2})/', '%_$1', $_POST['props'][$key] );
                ${$key} = preg_replace( '/%_([a-f0-9]{2})/', '%$1', trim( sanitize_text_field( wp_unslash( $prepared_value ) ) ) );
            } else {
                // phpcs:ignore ET.Sniffs.ValidatedSanitizedInput.InputNotSanitized
                ${$key} = trim( sanitize_text_field( wp_unslash( et_()->array_get( $_POST['props'], $key, $default ) ) ) );
            }
        }

        $quickview_add_to_cart_icon = array(
            'desktop' => $quickview_add_to_cart_icon_desktop,
            'tablet'  => $quickview_add_to_cart_icon_tablet,
            'phone'   => $quickview_add_to_cart_icon_phone,
        );

        $quickview_add_to_cart_icon = array_filter( $quickview_add_to_cart_icon );

        $processed_quickview_title_level  = esc_html( $quickview_title_level );
        $valid_heading_tag = array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' );
        if ( ! in_array( $processed_quickview_title_level, $valid_heading_tag, true ) ) {
            $processed_quickview_title_level = esc_html( 'h2' );
        }

        $product_id = intval( $product_id );

        if ( 0 === $product_id ) {
            return false;
            exit;
        }

        $dipl_product   = wc_get_product( $product_id );

        $gallery_images = array();
        if ( $dipl_product->get_image_id() ) {
            $gallery_images[] = sprintf(
                '<div class="swiper-slide">%1$s</div>',
                dipl_product_gallery_image( $dipl_product->get_image_id(), 'woocommerce_single' )
            );
        } else {
            $gallery_images[] = sprintf(
                '<div class="swiper-slide">%1$s</div>',
                $dipl_product->get_image( 'woocommerce_single' )
            );
        }

        $attachment_ids = $dipl_product->get_gallery_image_ids();
        if ( $attachment_ids && $dipl_product->get_image_id() ) {
            foreach ( $attachment_ids as $attachment_id ) {
                $gallery_images[] = sprintf(
                    '<div class="swiper-slide">%1$s</div>',
                    dipl_product_gallery_image( $attachment_id, 'woocommerce_single' )
                );
            }
        }

        $thumbnail = sprintf(
            '<div class="dipl_product_lightbox_gallery_carousel dipl_product_lightbox_gallery_carousel_%2$s">
                <div class="dipl_swiper_wrapper">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                        %1$s
                        </div>
                    </div>
                </div>
                <div class="dipl_swiper_pagination">
                    <div class="swiper-pagination"></div>
                </div>
            </div>',
            implode( '', $gallery_images ),
            intval( $order_number )
        );

        $title = sprintf(
            '<%2$s class="dipl_single_woo_product_title">%1$s</%2$s>',
            esc_html( get_the_title( $product_id ) ),
            esc_html( $processed_quickview_title_level )
        );

        $short_desc = sprintf(
            '<div class="dipl_single_woo_product_desc">%1$s</div>',
            wp_kses_post( $dipl_product->get_short_description() )
        );

        $price = sprintf(
            '<div class="dipl_single_woo_product_price">%1$s</div>',
            et_core_intentionally_unescaped( $dipl_product->get_price_html(), 'html' )
        );

        ob_start();
        ?>
        <div class="product_meta">
            <?php if ( wc_product_sku_enabled() && ( $dipl_product->get_sku() || $dipl_product->is_type( 'variable' ) ) ) { ?>
                <span class="sku_wrapper">
                    <label><?php esc_html_e( 'SKU:', 'woocommerce' ); ?></label>
                    <span class="sku"><?php echo $dipl_product->get_sku() ? esc_html( $dipl_product->get_sku() ) : esc_html__( 'N/A', 'woocommerce' ); ?></span>
                </span>
            <?php } ?>
            <?php echo et_core_intentionally_unescaped( wc_get_product_category_list( $dipl_product->get_id(), ', ', '<span class="posted_in"><label>' . _n( 'Category:', 'Categories:', count( $dipl_product->get_category_ids() ), 'woocommerce' ) . '</label> ', '</span>' ), 'html' ); ?>
            <?php echo et_core_intentionally_unescaped( wc_get_product_tag_list( $dipl_product->get_id(), ', ', '<span class="tagged_as"><label>' . _n( 'Tag:', 'Tags:', count( $dipl_product->get_tag_ids() ), 'woocommerce' ) . '</label> ', '</span>' ), 'html' ); ?>
        </div>
        <?php
        $meta = ob_get_clean();

        $meta = sprintf(
            '<div class="dipl_product_lightbox_meta">%1$s</div>',
            et_core_intentionally_unescaped( $meta, 'html' )
        );

        ob_start();
        switch ( $dipl_product->get_type() ) {
            case 'external':
                ?>
                <form class="cart" action="<?php echo esc_url( $dipl_product->add_to_cart_url() ); ?>" method="get">
                    <?php echo et_core_intentionally_unescaped( dipl_add_to_cart_button( $product_id, $quickview_add_to_cart_icon, true ), 'html' ); ?>
                    <?php wc_query_string_form_fields( $dipl_product->add_to_cart_url() ); ?>
                </form>
                <?php
                break;

            case 'variable':
                
                // Get Available variations?
                $get_variations = count( $dipl_product->get_children() ) <= apply_filters( 'woocommerce_ajax_variation_threshold', 30, $dipl_product );
                $available_variations = $get_variations ? $dipl_product->get_available_variations() : false;
                $attributes           = $dipl_product->get_variation_attributes();
                $selected_attributes  = $dipl_product->get_default_attributes();

                $attribute_keys  = array_keys( $attributes );
                $variations_json = wp_json_encode( $available_variations );
                $variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );
                ?>

                <form class="variations_form cart" action="" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $dipl_product->get_id() ); ?>" data-product_variations="<?php echo et_core_esc_previously( $variations_attr ); ?>">

                    <?php if ( empty( $available_variations ) && false !== $available_variations ) { ?>
                        <p class="stock out-of-stock"><?php echo esc_html( apply_filters( 'woocommerce_out_of_stock_message', esc_html__( 'This product is currently out of stock and unavailable.', 'woocommerce' ) ) ); ?></p>
                    <?php } else { ?>
                        <table class="variations" cellspacing="0">
                            <tbody>
                                <?php foreach ( $attributes as $attribute_name => $options ) { ?>
                                    <tr>
                                        <td class="label"><label for="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>"><?php echo esc_html( wc_attribute_label( $attribute_name ) ); ?></label></td>
                                        <td class="value">
                                            <?php
                                                wc_dropdown_variation_attribute_options(
                                                    array(
                                                        'options'   => $options,
                                                        'attribute' => $attribute_name,
                                                        'product'   => $dipl_product,
                                                    )
                                                );
                                                echo end( $attribute_keys ) === $attribute_name ? wp_kses_post( apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . esc_html__( 'Clear', 'woocommerce' ) . '</a>' ) ) : '';
                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        <div class="single_variation_wrap">
                            <div class="woocommerce-variation single_variation"></div>
                            <div class="woocommerce-variation-add-to-cart variations_button">
                                <?php
                                woocommerce_quantity_input(
                                    array(
                                        'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $dipl_product->get_min_purchase_quantity(), $dipl_product ),
                                        'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $dipl_product->get_max_purchase_quantity(), $dipl_product ),
                                        'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( intval( wp_unslash( $_POST['quantity'] ) ) ) : $dipl_product->get_min_purchase_quantity(),
                                    ),
                                    $dipl_product
                                );
                                ?>
                                <?php echo et_core_intentionally_unescaped( dipl_add_to_cart_button( $product_id, $quickview_add_to_cart_icon, true ), 'html' ); ?>
                                <input type="hidden" name="add-to-cart" value="<?php echo absint( $dipl_product->get_id() ); ?>" />
                                <input type="hidden" name="product_id" value="<?php echo absint( $dipl_product->get_id() ); ?>" />
                                <input type="hidden" name="variation_id" class="variation_id" value="0" />
                            </div>
                        </div>
                    <?php } ?>
                </form>
                <?php
                break;

            case 'grouped':
                $dipl_products = array_filter( array_map( 'wc_get_product', $dipl_product->get_children() ), 'wc_products_array_filter_visible_grouped' );

                if ( ! $dipl_products ) {
                    break;
                } else {
                    $grouped_product    = $dipl_product;
                    $grouped_products   = $dipl_products;
                    $quantites_required = false;
                }
                $post = get_post( $dipl_product->get_id() );
                ?>
                <form class="cart grouped_form" action="" method="post" enctype='multipart/form-data'>
                    <table cellspacing="0" class="woocommerce-grouped-product-list group_table">
                        <tbody>
                            <?php
                            $quantites_required      = false;
                            $previous_post           = $post;
                            $grouped_product_columns = apply_filters(
                                'woocommerce_grouped_product_columns',
                                array(
                                    'quantity',
                                    'label',
                                    'price',
                                ),
                                $dipl_product
                            );
                            $show_add_to_cart_button = false;

                            foreach ( $grouped_products as $grouped_product_child ) {
                                $post_object        = get_post( $grouped_product_child->get_id() );
                                $quantites_required = $quantites_required || ( $grouped_product_child->is_purchasable() && ! $grouped_product_child->has_options() );
                                $post               = $post_object;
                                setup_postdata( $post );

                                if ( $grouped_product_child->is_in_stock() ) {
                                    $show_add_to_cart_button = true;
                                }

                                echo '<tr id="product-' . esc_attr( $grouped_product_child->get_id() ) . '" class="woocommerce-grouped-product-list-item ' . esc_attr( implode( ' ', wc_get_product_class( '', $grouped_product_child ) ) ) . '">';

                                // Output columns for each product.
                                foreach ( $grouped_product_columns as $column_id ) {

                                    switch ( $column_id ) {
                                        case 'quantity':
                                            //ob_start();

                                            if ( ! $grouped_product_child->is_purchasable() || $grouped_product_child->has_options() || ! $grouped_product_child->is_in_stock() ) {
                                                if ( $dipl_product ) {
                                                    $defaults = array(
                                                        'quantity'   => 1,
                                                        'class'      => implode(
                                                            ' ',
                                                            array_filter(
                                                                array(
                                                                    'button',
                                                                    'product_type_' . $dipl_product->get_type(),
                                                                    $dipl_product->is_purchasable() && $dipl_product->is_in_stock() ? 'add_to_cart_button' : '',
                                                                    $dipl_product->supports( 'ajax_add_to_cart' ) && $dipl_product->is_purchasable() && $dipl_product->is_in_stock() ? 'ajax_add_to_cart' : '',
                                                                )
                                                            )
                                                        ),
                                                        'attributes' => array(
                                                            'data-product_id'  => $dipl_product->get_id(),
                                                            'data-product_sku' => $dipl_product->get_sku(),
                                                            'aria-label'       => $dipl_product->add_to_cart_description(),
                                                            'rel'              => 'nofollow',
                                                        ),
                                                    );

                                                    $args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $dipl_product );

                                                    if ( isset( $args['attributes']['aria-label'] ) ) {
                                                        $args['attributes']['aria-label'] = wp_strip_all_tags( $args['attributes']['aria-label'] );
                                                    }

                                                    $value = apply_filters(
                                                        'woocommerce_loop_add_to_cart_link',
                                                        sprintf(
                                                            '<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
                                                            esc_url( $dipl_product->add_to_cart_url() ),
                                                            esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
                                                            esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
                                                            isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
                                                            esc_html( $dipl_product->add_to_cart_text() )
                                                        ),
                                                        $dipl_product,
                                                        $args
                                                    );
                                                }
                                            } elseif ( $grouped_product_child->is_sold_individually() ) {
                                                $value = '<input type="checkbox" name="' . esc_attr( 'quantity[' . $grouped_product_child->get_id() . ']' ) . '" value="1" class="wc-grouped-product-add-to-cart-checkbox" />';
                                            } else {
                                                $value = woocommerce_quantity_input(
                                                    array(
                                                        'input_name'  => 'quantity[' . $grouped_product_child->get_id() . ']',
                                                        'input_value' => '',
                                                        'min_value'   => apply_filters( 'woocommerce_quantity_input_min', 0, $grouped_product_child ),
                                                        'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $grouped_product_child->get_max_purchase_quantity(), $grouped_product_child ),
                                                        'placeholder' => '0',
                                                    ),
                                                    $grouped_product_child,
                                                    false
                                                );
                                            }

                                            //$value = ob_get_clean();
                                            break;
                                        case 'label':
                                            $value  = '<label for="product-' . esc_attr( $grouped_product_child->get_id() ) . '">';
                                            $value .= $grouped_product_child->is_visible() ? '<a href="' . esc_url( apply_filters( 'woocommerce_grouped_product_list_link', $grouped_product_child->get_permalink(), $grouped_product_child->get_id() ) ) . '">' . $grouped_product_child->get_name() . '</a>' : $grouped_product_child->get_name();
                                            $value .= '</label>';
                                            break;
                                        case 'price':
                                            $value = $grouped_product_child->get_price_html() . wc_get_stock_html( $grouped_product_child );
                                            break;
                                        default:
                                            $value = '';
                                            break;
                                    }

                                    echo et_core_intentionally_unescaped( '<td class="woocommerce-grouped-product-list-item__' . esc_attr( $column_id ) . '">' . apply_filters( 'woocommerce_grouped_product_list_column_' . $column_id, $value, $grouped_product_child ) . '</td>', 'html' ) ;
                                }

                                echo '</tr>';
                            }
                            $post = $previous_post;
                            setup_postdata( $post );

                            ?>
                        </tbody>
                    </table>

                    <input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $dipl_product->get_id() ); ?>" />

                    <?php if ( $quantites_required && $show_add_to_cart_button ) { ?>
                        <?php echo et_core_intentionally_unescaped( dipl_add_to_cart_button( $product_id, $quickview_add_to_cart_icon, true ), 'html' ); ?>
                    <?php } ?>
                </form>
                <?php
                break;
            
            default:
                if ( ! $dipl_product->is_purchasable() ) {
                    break;
                }

                echo et_core_intentionally_unescaped( wc_get_stock_html( $dipl_product ), 'html' );

                if ( $dipl_product->is_in_stock() ) { ?>

                    <form class="cart" action="" method="post" enctype='multipart/form-data'>

                        <?php

                        woocommerce_quantity_input(
                            array(
                                'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $dipl_product->get_min_purchase_quantity(), $dipl_product ),
                                'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $dipl_product->get_max_purchase_quantity(), $dipl_product ),
                                'input_value' => $dipl_product->get_min_purchase_quantity(),
                            ),
                            $dipl_product
                        );

                        ?>

                        <?php echo et_core_intentionally_unescaped( dipl_add_to_cart_button( $product_id, $quickview_add_to_cart_icon, true ), 'html' ); ?>

                    </form>

                <?php }
                break;
        }
        $add_to_cart = ob_get_clean();

        $output = sprintf(
            '<div id="product-%1$s" class="%2$s">
                <div class="dipl_product_lightbox_image_wrapper">%3$s%4$s</div>
                <div class="dipl_product_lightbox_content_wrapper">%5$s%6$s%7$s%8$s%9$s</div>
            </div>',
            esc_attr( $product_id ),
            esc_attr( implode( ' ', wc_get_product_class( '', $product_id ) ) ),
            et_core_intentionally_unescaped( $thumbnail, 'html' ),
            'on' === $show_sale_badge ? dipl_product_sale_badge( $dipl_product, 'percentage' === $sale_badge_text ? true : false, $sale_label_text ) : '',
            et_core_intentionally_unescaped( $title, 'html' ),
            et_core_intentionally_unescaped( $price, 'html' ),
            et_core_intentionally_unescaped( $short_desc, 'html' ),
            et_core_intentionally_unescaped( $add_to_cart, 'html' ),
            et_core_intentionally_unescaped( $meta, 'html' )
        );

        echo et_core_intentionally_unescaped( $output, 'html' );
        exit;
    }

    public function dipl_get_teamgrid_page() {

        if ( ! isset( $_POST['dipl_team_popup_nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['dipl_team_popup_nonce'] ) ), 'elicus-divi-plus-team-grid-nonce' ) ) {
            return;
        }

        if ( ! isset( $_POST['props'] ) ) {
            return;
        }

        $defaults = array(
            'id'                    => 0,
            'designation'           => '',
            'content'               => '',
            'skills_bars'           => '',
            'social_icons'          => '',
            'image'                 => '',
            'image_size'            => 'medium',
            'bar_layout'            => '',
            'use_stripes'           => '',
            'use_animated_stripes'  => '',
            'popup_name_level'      => 'h5',
        );

        foreach ( $defaults as $key => $default ) {
            // phpcs:ignore ET.Sniffs.ValidatedSanitizedInput.InputNotSanitized
            ${$key} = trim( sanitize_text_field( wp_unslash( et_()->array_get( $_POST['props'], $key, $default ) ) ) );
        }

        $id = intval( $id );

        if ( 0 === $id ) {
            return;
        }

        $processed_popup_name_level  = esc_html( $popup_name_level );
        $valid_heading_tag = array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' );
        if ( ! in_array( $processed_popup_name_level, $valid_heading_tag, true ) ) {
            $processed_popup_name_level = esc_html( 'h5' );
        }

        $values             = get_post_custom( $id );
        $team_designation   = isset( $values['dipl_team_member_designation'] ) ? $values['dipl_team_member_designation'][0] : '';
        $linkedin           = isset( $values['dipl_team_member_linkedin'] ) ? $values['dipl_team_member_linkedin'][0] : '';
        $facebook           = isset( $values['dipl_team_member_facebook'] ) ? $values['dipl_team_member_facebook'][0] : '';
        $twitter            = isset( $values['dipl_team_member_twitter'] ) ? $values['dipl_team_member_twitter'][0] : '';
        $instagram          = isset( $values['dipl_team_member_instagram'] ) ? $values['dipl_team_member_instagram'][0] : '';
        $youtube            = isset( $values['dipl_team_member_youtube'] ) ? $values['dipl_team_member_youtube'][0] : '';
        $email              = isset( $values['dipl_team_member_email'] ) ? $values['dipl_team_member_email'][0] : '';
        $phone              = isset( $values['dipl_team_member_phone'] ) ? $values['dipl_team_member_phone'][0] : '';
        $skills             = isset( $values['dipl_team_member_skills'] ) ? $values['dipl_team_member_skills'][0] : '';
        $skills_value       = isset( $values['dipl_team_member_skills_value'] ) ? $values['dipl_team_member_skills_value'][0] : '';
        $member_content     = get_the_content( null, false, $id );

        $output  = '<div id="dipl_team_member_grid_' . esc_attr( $id ) . '" class="dipl_team_member_wrapper_lightbox">';

        if ( 'on' === $image ) {
            $output .= sprintf(
                '<div class="dipl_team_member_image_wrapper">%1$s</div>',
                get_the_post_thumbnail( $id, $image_size, array( 'class' => 'dipl_team_member_image' ) )
            );
        }

        $output .= '<div class="dipl_team_member_content_wrapper">';
    
        $output .= sprintf(
            '<%1$s class="dipl_team_member_name">%2$s</%1$s>',
            esc_html( $processed_popup_name_level ),
            esc_html( get_the_title( $id ) )
        );

            if ( 'on' === $designation ) {
                $output .= '<div class="dipl_team_member_designation">' . esc_html( $team_designation ) . '</div>';
            }

            if ( 'on' === $social_icons ) {
                if (
                    '' !== $facebook ||
                    '' !== $twitter ||
                    '' !== $linkedin ||
                    '' !== $instagram ||
                    '' !== $youtube ||
                    '' !== $email ||
                    '' !== $phone
                ) {
                    $output .= '<div class="dipl_team_social_wrapper">';
                    if ( '' !== $facebook ) {
                        $output .= '<a href="' . $facebook . '"><span class="dipl_team_member_social_icon dipl_team_facebook et-pb-icon">&#xe093;</span></a>';
                    }
                    if ( '' !== $twitter ) {
                        $output .= '<a href="' . $twitter . '"><span class="dipl_team_member_social_icon dipl_team_twitter et-pb-icon">&#xe094;</span></a>';
                    }
                    if ( '' !== $linkedin ) {
                        $output .= '<a href="' . $linkedin . '"><span class="dipl_team_member_social_icon dipl_team_linkedin et-pb-icon">&#xe09d;</span></a>';
                    }
                    if ( '' !== $instagram ) {
                        $output .= '<a href="' . $instagram . '"><span class="dipl_team_member_social_icon dipl_team_instagram et-pb-icon">&#xe09a;</span></a>';
                    }
                    if ( '' !== $youtube ) {
                        $output .= '<a href="' . $youtube . '"><span class="dipl_team_member_social_icon dipl_team_youtube et-pb-icon">&#xe0a3;</span></a>';
                    }
                    if ( '' !== $email ) {
                        $output .= '<a href="mailto:' . $email . '"><span class="dipl_team_member_social_icon dipl_team_email et-pb-icon">&#xe076;</span></a>';
                    }
                    if ( '' !== $phone ) {
                        $output .= '<a href="tel:' . $phone . '"><span class="dipl_team_member_social_icon dipl_team_phone et-pb-icon">&#xe090;</span></a>';
                    }
                    $output .= '</div>';
                }
            }

            if ( 'on' === $content && $member_content ) {
                $output .= '<div class="dipl_team_member_description">' . $member_content . '</div>';
            }

            if ( 'on' === $skills_bars && '' !== $skills && '' !== $skills_value ) {
                $team_skills       = explode( ',', $skills );
                $team_skills_value = explode( ',', $skills_value );

                $output .= '<div class="dipl_skill_bar_wrapper">';

                for ( $i = 0; $i < count( $team_skills ); $i++ ) {
                    $filled_bar_size = $team_skills_value[ $i ] . '%';

                    if ( '1' === $bar_layout ) {
                        $output .= sprintf(
                            '<div class="dipl_skill_bar_wrapper_inner">
                                <div class="dipl_skill_name">
                                    %1$s
                                </div>
                                <div class="dipl_empty_bar">
                                    <div class="dipl_filled_bar %3$s" data-percent="%2$s"></div>
                                </div>
                            </div>',
                            $team_skills[ $i ],
                            $filled_bar_size,
                            'on' === $use_stripes ? 'on' === $use_animated_stripes ? 'dipl_bar_counter_animated_striped_bar' : 'dipl_bar_counter_striped_bar' : ''
                        );
                    } else {
                        $filled_chunks = absint( round( $filled_bar_size/10 ) );
                        $filled_chunks = $filled_chunks < 1 ? 1 : $filled_chunks;

                        $chunks        = '';

                        $output .= '<div class="dipl_bar_counter_wrapper_inner">';

                        $output .= sprintf(
                            '<div class="dipl_skill_name">
                                %1$s
                            </div>',
                            $team_skills[ $i ]
                        );

                        $output .= '<div class="dipl_bar_counter_bar_wrapper">';

                        for ( $c = 1; $c <= $filled_chunks; $c++ ) {
                            $output .= '<div class="dipl_bar_counter_chunks dipl_bar_counter_filled_chunks"></div>';
                        }
                        
                        $empty_chunks  = 10 - $filled_chunks;
                        if ( $empty_chunks > 0 ) {
                            for ( $ec=1; $ec <= $empty_chunks; $ec++ ) {
                                $output .= '<div class="dipl_bar_counter_chunks dipl_bar_counter_empty_chunks"></div>';
                            }
                        }

                        $output .= sprintf(
                            '<span class="dipl_bar_counter_percent" data-percent="%1$s">%1$s</span>',
                            esc_attr( $filled_bar_size )
                        );

                        $output .= '</div></div>';
                    }
                }

                $output .= '</div>';
            }

        $output .= '</div></div>';

        echo et_core_intentionally_unescaped( $output, 'html' );
        exit();
    }


    public function dipl_filtered_team_items() {
        
        if ( ! isset( $_POST['security'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['security'] ) ), 'elicus-divi-plus-team-grid-nonce' ) ) {
            return;
        }

        if ( isset( $_POST['term_id'] ) ) {
            $term_id = intval( wp_unslash( $_POST['term_id'] ) );
        } else {
            $term_id = '';
        }

        if ( ! isset( $_POST['props'] ) || '' === $_POST['props'] ) {
            return;
        }

        $defaults = array(
            'render_slug'                           => 'dipl_team_grid',
            'select_layout'                         => 'layout1',
            'posts_number'                          => '10',
            'include_categories'                    => '',
            'show_short_desc'                       => 'on',
            'show_designation'                      => 'on',
            'show_social_icon'                      => 'on',
            'processed_name_level'                  => 'h5',
            'processed_popup_name_level'            => 'h5',
            'close_icon_position'                   => 'outside',
            'image_size'                            => 'medium',
            'onclick_trigger'                       => 'do_nothing',
            'popup_elements'                        => 'image,designation,social_icons,content,skill_bars',
            'use_stripes'                           => 'off',
            'team_content_padding_top_desktop'      => '',
            'team_content_padding_top_tablet'       => '',
            'team_content_padding_top_phone'        => '',
            'team_content_padding_bottom_desktop'   => '',
            'team_content_padding_bottom_tablet'    => '',
            'team_content_padding_bottom_phone'     => '',
        );

        // phpcs:ignore ET.Sniffs.ValidatedSanitizedInput.InputNotSanitized
        $props = json_decode( urldecode( $_POST['props'] ), true );

        foreach ( $defaults as $key => $default ) {
            // phpcs:ignore ET.Sniffs.ValidatedSanitizedInput.InputNotSanitized
            ${$key} = trim( sanitize_text_field( wp_unslash( et_()->array_get( $props, $key, $default ) ) ) );
        }
        
        $valid_heading_tag = array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' );

        $processed_name_level = esc_html( $processed_name_level );
        if ( ! in_array( $processed_name_level, $valid_heading_tag ) ) {
            $processed_name_level = 'h5';
        }

        $processed_popup_name_level = esc_html( $processed_popup_name_level );
        if ( ! in_array( $processed_popup_name_level, $valid_heading_tag ) ) {
            $processed_popup_name_level = 'h5';
        }
        
        $args   = array(
            'post_type'         => 'dipl-team-member',
            'posts_per_page'    => $posts_number,
            'post_status'       => 'publish',
        );

        if ( is_user_logged_in() ) {
            $args['post_status'] = array( 'publish', 'private' );
        }

        if ( '' !== $term_id && 0 !== $term_id ){
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'dipl-team-member-category',
                    'field'    => 'term_id',
                    'terms'    => $term_id,
                    'operator' => 'IN',
                ),
            );
        } else if ( '' !== $include_categories ) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'dipl-team-member-category',
                    'field'    => 'term_id',
                    'terms'    => explode( ',', esc_attr( $include_categories ) ),
                    'operator' => 'IN'
                ),
            );
        }
        
        $query = new WP_Query( $args );
            
        if ( $query->have_posts() ) {
            
            $output = '';

            $popup_elements = explode( ',' , $popup_elements );

            while ( $query->have_posts() ) {
                $query->the_post();
                global $post;

                $post_id           = intval( get_the_ID() );
                $member_name       = esc_html( get_the_title( $post_id ) );
                $has_member_image  = has_post_thumbnail( $post_id );
                $meta_fields       = get_post_meta( $post_id );
                $data              = '';

                $data .= 'data-close_icon_position ="'.$close_icon_position.'" ';
                $data .= 'data-id ="' . $post_id . '"';
                $data .= 'data-popup_name_level="' . $processed_popup_name_level . '" ';

                if ( '' !== $popup_elements ) { 
                    if ( in_array( 'image', $popup_elements ) ) {
                        $data .= 'data-image="on" ';
                        $data .= 'data-image_size="'.$image_size.'" ';
                    }
                    if ( in_array( 'designation', $popup_elements ) ) { 
                        $data .= 'data-designation="on" ';
                    }
                    if ( in_array( 'content', $popup_elements ) ) { 
                        $data .= 'data-content="on" ';  
                    }
                    if ( in_array( 'skills_bars', $popup_elements ) ) { 
                        $data .= 'data-skills_bars="on" ';
                        if ( 'layout1' === $bar_layout ) {
                            $data .= 'data-bar_layout="1" ';
                        }else{
                            $data .= 'data-bar_layout="2" ';
                        }   
                    }
                    if ( in_array( 'social_icons', $popup_elements ) ) { 
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


                if ( file_exists( plugin_dir_path( __FILE__ ) . 'modules/TeamGrid/layouts/' . sanitize_file_name( $select_layout ) . '.php' ) ) {
                    include plugin_dir_path( __FILE__ ) . 'modules/TeamGrid/layouts/' . sanitize_file_name( $select_layout ) . '.php';
                }
            }

            wp_reset_postdata();
            
        } else {
            $output = '<div class="entry">
                        <h1>'. esc_html__( 'No Results Found', 'divi' ) .'</h1>
                        <p>'. esc_html__( 'The team you requested could not be found. Try changing your module settings or create some new team members.', 'divi' ) .'</p>
                    </div>';
        }
        echo et_core_intentionally_unescaped( $output, 'html' );
        exit;
    }

    public function dipl_action_links( $links ) {
        $settings = array( '<a href="' . esc_url( admin_url( '/options-general.php?page=divi-plus-options/' ) ) . '">' . esc_html__( 'Settings', 'divi-plus' ) . '</a>' );
        return array_merge( $settings, $links );
    }
}

new DIPL_DiviPlus;