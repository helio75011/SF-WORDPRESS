<?php
class DIPL_Extensions {

	public function __construct() {

		if ( '' !== $this->dipl_get_option( 'dipl-scheduler-areas' ) ) {
            require_once plugin_dir_path( __FILE__ ) . 'scheduler/scheduler.php';
        }

        if ( '' !== $this->dipl_get_option( 'dipl-visibility-manager-areas' ) ) {
            require_once plugin_dir_path( __FILE__ ) . 'visibility-manager/visibility-manager.php';
        }

        if ( '' !== $this->dipl_get_option( 'dipl-particle-background-areas' ) ) {
            require_once plugin_dir_path( __FILE__ ) . 'particle-background/particle-background.php';
        }

        if ( '' !== $this->dipl_get_option( 'dipl-enable-divi-library-shortcodes' ) ) {
            require_once plugin_dir_path( __FILE__ ) . 'library-shortcode/library-shortcode.php';
        }

	}

	public function dipl_get_option( $key = '', $default = '' ) {
        if ( '' === $key ) {
            return $default;
        }

        $plugin_options = get_option( ELICUS_DIVI_PLUS_OPTION );
        $key            = esc_attr( $key );
        
        if ( isset( $plugin_options[$key] ) ) {
            return $plugin_options[$key];
        }

        return $default;
    }

    public function dipl_get_modules() {
    	$modules = array( 
    		'et_pb_accordion',
    		'et_pb_audio',
    		'et_pb_counters',
    		'et_pb_blog',
    		'et_pb_blurb',
    		'et_pb_button',
			'et_pb_circle_counter',
    		'et_pb_code',
    		'et_pb_comments',
    		'et_pb_wc_reviews',
    		'et_pb_contact_form',
    		'et_pb_countdown_timer',
    		'et_pb_cta',
    		'et_pb_divider',
    		'et_pb_filterable_portfolio',
    		'et_pb_fullwidth_code',
    		'et_pb_fullwidth_header',
    		'et_pb_fullwidth_image',
    		'et_pb_fullwidth_map',
    		'et_pb_fullwidth_menu',
    		'et_pb_fullwidth_portfolio',
		    'et_pb_fullwidth_post_content',
		    'et_pb_fullwidth_post_slider',
		    'et_pb_fullwidth_post_title',
		    'et_pb_fullwidth_slider',
		    'et_pb_gallery',
		    'et_pb_image',
		    'et_pb_login',
		    'et_pb_map',
		    'et_pb_menu',
		    'et_pb_number_counter',
		    'et_pb_portfolio',
		    'et_pb_post_content',
		    'et_pb_post_slider',
		    'et_pb_post_title',
		    'et_pb_post_nav',
		    'et_pb_pricing_tables',
		    'et_pb_search',
		    'et_pb_shop',
		    'et_pb_sidebar',
		    'et_pb_signup',
		    'et_pb_slider',
		    'et_pb_social_media_follow',
		    'et_pb_tabs',
		    'et_pb_team_member',
		    'et_pb_testimonial',
		    'et_pb_text',
		    'et_pb_toggle',
		    'et_pb_video',
		    'et_pb_video_slider',
		    'et_pb_wc_add_to_cart',
		    'et_pb_wc_additional_info',
		    'et_pb_wc_breadcrumb',
		    'et_pb_wc_cart_notice',
		    'et_pb_wc_description',
		    'et_pb_wc_gallery',
		    'et_pb_wc_images',
		    'et_pb_wc_meta',
		    'et_pb_wc_price',
		    'et_pb_wc_rating',
		    'et_pb_wc_related_products',
		    'et_pb_wc_stock',
		    'et_pb_wc_tabs',
		    'et_pb_wc_title',
		    'et_pb_wc_upsells',
		    'et_pb_blog_extras',
		    'et_pb_blurb_extended',
		    'el_advanced_flipbox',
		    'el_ajax_search',
		    'el_content_toggle',
		    'el_masonry_gallery',
		    'el_dynamic_masonry_gallery',
		    'el_modal_popup',
		    'el_md_testimonial_extended',
		    'el_md_testimonial_extended_form',
		    'el_restro_menu',
		    'dipl_ajax_search',
		    'dipl_before_after_slider',
		    'dipl_blog_slider',
		    'dipl_breadcrumb',
		    'dipl_business_hours',
		    'dipl_button',
		    'dipl_content_toggle',
		    'dipl_double_color_heading',
		    'dipl_faq_page_schema',
		    'dipl_facebook_comments',
		    'dipl_facebook_embedded_comment',
		    'dipl_facebook_embedded_post',
		    'dipl_facebook_embedded_video',
		    'dipl_facebook_like',
		    'dipl_facebook_page',
		    'dipl_facebook_share',
		    'dipl_fancy_text',
		    'dipl_flipbox',
		    'dipl_floating_image',
		    'dipl_form_styler',
		    'dipl_hotspot',
		    'dipl_how_to_schema',
		    'dipl_image_accordion',
		    'dipl_image_card',
		    'dipl_image_card_carousel',
		    'dipl_image_magnifier',
		    'dipl_image_mask',
		    'dipl_logo_slider',
		    'dipl_lottie',
		    'dipl_masonry_gallery',
		    'dipl_modal',
		    'dipl_price_list',
		    'dipl_separator',
		    'dipl_star_rating',
		    'dipl_team_slider',
		    'dipl_testimonial_grid',
		    'dipl_testimonial_slider',
		    'dipl_text_animator',
		    'dipl_text_highlighter',
		    'dipl_timeline',
		    'dipl_twitter_embedded_tweet',
		    'dipl_twitter_follow_button',
		    'dipl_twitter_timeline',
		    'dipl_twitter_tweet_button',
		    'dipl_interactive_image_card',
		    'dipl_woo_products',
		    'dipl_woo_products_carousel',
		    'dipl_woo_products_categories',
		    'dipl_scroll_image',
		    'dipl_bar_counter',
		    'dipl_tilt_image',
		    'dipl_gravity_form_styler',
		);
		
		return $modules;
    }

    public function dipl_get_wp_user_roles() {
    	$wp_roles = wp_roles();
        $wp_role_names = array(
        	'all' => esc_html__( 'All', 'divi-plus' ),
        );
        if ( ! empty( $wp_roles ) ) {
            if ( isset( $wp_roles->role_names ) ) {
                $wp_role_names = array_merge( $wp_role_names, $wp_roles->role_names );
            }
        }
        return $wp_role_names;
    }
}

new DIPL_Extensions;