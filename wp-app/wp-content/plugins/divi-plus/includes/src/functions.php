<?php
/**
 * @author      Elicus Technologies <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2022 Elicus Technologies Private Limited
 * @version     1.9.4
 */
if ( ! function_exists( 'dipl_get_post_thumbnail' ) ) {
    function dipl_get_post_thumbnail( $post_id, $size, $class, $print = false, $url = false ) {
        if ( ! $post_id ) {
            return;
        }

        $thumb     = '';
        $thumb_url = '';
        $atts      = array();
        if ( has_post_thumbnail( $post_id ) ) {
            $attach_id = get_post_thumbnail_id( $post_id );
            if ( 0 !== $attach_id && '' !== $attach_id && '0' !== $attach_id ) {
                $atts['alt'] = get_post_meta( $attach_id, '_wp_attachment_image_alt', true );
            } else {
                $atts['alt'] = get_the_title( $post_id );
            }

            if ( $class ) {
                $atts['class'] = $class;
            }
            $thumb     = get_the_post_thumbnail( $post_id, esc_attr( $size ), $atts );
            $thumb_url = get_the_post_thumbnail_url( $post_id, esc_attr( $size ) );
        } else {
            $post_object         = get_post( $post_id );
            $unprocessed_content = $post_object->post_content;

            // truncate Post based shortcodes if Divi Builder enabled to avoid infinite loops.
            if ( function_exists( 'et_strip_shortcodes' ) ) {
                $unprocessed_content = et_strip_shortcodes( $post_object->post_content, true );
            }

            // Check if content should be overridden with a custom value.
            $custom = apply_filters( 'et_first_image_use_custom_content', false, $unprocessed_content, $post_object );
            // apply the_content filter to execute all shortcodes and get the correct image from the processed content.
            $processed_content = false === $custom ? apply_filters( 'the_content', $unprocessed_content ) : $custom;

            $output = preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $processed_content, $matches );
            if ( isset( $matches[1][0] ) ) {
                $image = trim( $matches[1][0] );
            }

            if ( isset( $image ) ) {
                $attach_id = attachment_url_to_postid( $image );
                if ( 0 !== $attach_id && '' !== $attach_id && '0' !== $attach_id ) {
                    $atts['alt'] = get_post_meta( $attach_id, '_wp_attachment_image_alt', true );
                } else {
                    $atts['alt'] = get_the_title( $post_id );
                }
                if ( $class ) {
                    $atts['class'] = esc_attr( $class );
                }
                $thumb_url = wp_get_attachment_image_url( $attach_id, esc_attr( $size ) );
                $thumb     = wp_get_attachment_image( $attach_id, esc_attr( $size ), false, $atts );
            }
        }

        if ( $print ) {
            if ( $url ) {
                echo esc_url( $thumb_url );
            } else {
                echo et_core_intentionally_unescaped( $thumb, 'html' );
            }
        } else {
            if ( $url ) {
                return esc_url( $thumb_url );
            } else {
                return et_core_intentionally_unescaped( $thumb, 'html' );
            }
        }
    }
}

if ( ! function_exists( 'dipl_strip_shortcodes' ) ) {
    function dipl_strip_shortcodes( $content, $truncate_post_based_shortcodes_only = false ) {
        global $shortcode_tags;

        $content = trim( $content );

        $strip_content_shortcodes = array(
            'et_pb_code',
            'et_pb_fullwidth_code',
            'dipl_modal',
            'el_modal_popup',
        );

        // list of post-based shortcodes.
        if ( $truncate_post_based_shortcodes_only ) {
            $strip_content_shortcodes = array(
                'et_pb_post_slider',
                'et_pb_fullwidth_post_slider',
                'et_pb_blog',
                'et_pb_blog_extras',
                'et_pb_comments',
            );
        }

        foreach ( $strip_content_shortcodes as $shortcode_name ) {
            $regex = sprintf(
                '(\[%1$s[^\]]*\][^\[]*\[\/%1$s\]|\[%1$s[^\]]*\])',
                esc_html( $shortcode_name )
            );

            $content = preg_replace( $regex, '', $content );
        }

        // do not proceed if we need to truncate post-based shortcodes only.
        if ( $truncate_post_based_shortcodes_only ) {
            return $content;
        }

        $shortcode_tag_names = array();
        foreach ( $shortcode_tags as $shortcode_tag_name => $shortcode_tag_cb ) {
            if ( 0 !== strpos( $shortcode_tag_name, 'et_pb_' ) ) {
                continue;
            }

            $shortcode_tag_names[] = $shortcode_tag_name;
        }

        $et_shortcodes = implode( '|', $shortcode_tag_names );

        $regex_opening_shortcodes = sprintf( '(\[(%1$s)[^\]]+\])', esc_html( $et_shortcodes ) );
        $regex_closing_shortcodes = sprintf( '(\[\/(%1$s)\])', esc_html( $et_shortcodes ) );

        $content = preg_replace( $regex_opening_shortcodes, '', $content );
        $content = preg_replace( $regex_closing_shortcodes, '', $content );

        return et_core_intentionally_unescaped( $content, 'html' );
    }
}

if ( ! function_exists( 'dipl_truncate_post' ) ) {
    function dipl_truncate_post( $amount, $echo = true, $post_id = '', $strip_shortcodes = false ) {
        global $shortname;

        if ( '' === $post_id ) {
            return '';
        }

        $post_object = get_post( $post_id );

        $post_excerpt = '';
        $post_excerpt = apply_filters( 'the_excerpt', $post_object->post_excerpt );

        if ( 'on' === et_get_option( $shortname . '_use_excerpt' ) && '' !== $post_excerpt ) {
            if ( $echo ) {
                echo et_core_intentionally_unescaped( $post_excerpt, 'html' );
            } else {
                return $post_excerpt;
            }
        } else {
            // get the post content.
            $truncate = $post_object->post_content;

            // remove caption shortcode from the post content.
            $truncate = preg_replace( '@\[caption[^\]]*?\].*?\[\/caption]@si', '', $truncate );

            // remove post nav shortcode from the post content.
            $truncate = preg_replace( '@\[et_pb_post_nav[^\]]*?\].*?\[\/et_pb_post_nav]@si', '', $truncate );

            // Remove audio shortcode from post content to prevent unwanted audio file on the excerpt
            // due to unparsed audio shortcode.
            $truncate = preg_replace( '@\[audio[^\]]*?\].*?\[\/audio]@si', '', $truncate );

            // Remove embed shortcode from post content.
            $truncate = preg_replace( '@\[embed[^\]]*?\].*?\[\/embed]@si', '', $truncate );

            if ( $strip_shortcodes ) {
                $truncate = dipl_strip_shortcodes( $truncate );
                $truncate = et_builder_strip_dynamic_content( $truncate );
            } else {
                // apply content filters.
                $truncate = apply_filters( 'the_content', $truncate );
            }

            // decide if we need to append dots at the end of the string.
            if ( strlen( $truncate ) <= $amount ) {
                $echo_out = '';
            } else {
                $echo_out = '...';
                if ( $amount > 3 ) {
                    $amount = $amount - 3;
                }
            }

            // trim text to a certain number of characters, also remove spaces from the end of a string ( space counts as a character ).
            $truncate = rtrim( et_wp_trim_words( $truncate, $amount, '' ) );

            // remove the last word to make sure we display all words correctly.
            if ( '' !== $echo_out ) {
                $new_words_array = (array) explode( ' ', $truncate );
                array_pop( $new_words_array );

                $truncate = implode( ' ', $new_words_array );

                // append dots to the end of the string.
                if ( '' !== $truncate ) {
                    $truncate .= $echo_out;
                }
            }

            if ( $echo ) {
                echo et_core_intentionally_unescaped( $truncate, 'html' );
            } else {
                return et_core_intentionally_unescaped( $truncate, 'html' );
            }
        }
    }
}

/* Filter the products query arguments */
if ( ! function_exists( 'dipl_filter_products_query' ) ) {
    function dipl_filter_products_query( $args ) {

        if ( function_exists( 'WC' ) ) {
            $args['meta_query'] = WC()->query->get_meta_query( et_()->array_get( $args, 'meta_query', array() ), true );
            $args['tax_query']  = WC()->query->get_tax_query( et_()->array_get( $args, 'tax_query', array() ), true );

            // Add fake cache-busting argument as the filtering is actually done in dwe_apply_woo_widget_filters().
            $args['nocache'] = microtime( true );
        }

        return $args;
    }
}

if ( ! function_exists( 'dipl_render_divi_button' ) ) {
    function dipl_render_divi_button( $args = array() ) {
        // Prepare arguments.
        $defaults = array(
            'button_id'           => '',
            'button_classname'    => array(),
            'button_custom'       => '',
            'button_rel'          => '',
            'button_text'         => '',
            'button_text_escaped' => false,
            'button_url'          => '',
            'custom_icon'         => '',
            'custom_icon_tablet'  => '',
            'custom_icon_phone'   => '',
            'display_button'      => true,
            'has_wrapper'         => true,
            'url_new_window'      => '',
            'multi_view_data'     => '',
        );

        $args = wp_parse_args( $args, $defaults );

        // Do not proceed if display_button argument is false.
        if ( ! $args['display_button'] ) {
            return '';
        }

        $button_text = $args['button_text_escaped'] ? $args['button_text'] : esc_html( $args['button_text'] );

        // Do not proceed if button_text argument is empty and not having multi view value.
        if ( '' === $button_text && ! $args['multi_view_data'] ) {
            return '';
        }

        // Button classname.
        $button_classname = array( 'et_pb_button' );

        if ( ( '' !== $args['custom_icon'] || '' !== $args['custom_icon_tablet'] || '' !== $args['custom_icon_phone'] ) && 'on' === $args['button_custom'] ) {
            $button_classname[] = 'et_pb_custom_button_icon';
        }

        // Add multi view CSS hidden helper class when button text is empty on desktop mode.
        if ( '' === $button_text && $args['multi_view_data'] ) {
            $button_classname[] = 'et_multi_view_hidden';
        }

        if ( ! empty( $args['button_classname'] ) ) {
            $button_classname = array_merge( $button_classname, $args['button_classname'] );
        }

        // Custom icon data attribute.
        $use_data_icon = '' !== $args['custom_icon'] && 'on' === $args['button_custom'];
        $data_icon     = $use_data_icon ? sprintf(
            ' data-icon="%1$s"',
            wp_doing_ajax() && ! ET_BUILDER_LOAD_ON_AJAX ? esc_attr( $args['custom_icon'] ) : esc_attr( et_pb_process_font_icon( $args['custom_icon'] ) )
        ) : '';

        $use_data_icon_tablet = '' !== $args['custom_icon_tablet'] && 'on' === $args['button_custom'];
        $data_icon_tablet     = $use_data_icon_tablet ? sprintf(
            ' data-icon-tablet="%1$s"',
            wp_doing_ajax() && ! ET_BUILDER_LOAD_ON_AJAX ? esc_attr( $args['custom_icon_tablet'] ) : esc_attr( et_pb_process_font_icon( $args['custom_icon_tablet'] ) )
        ) : '';

        $use_data_icon_phone = '' !== $args['custom_icon_phone'] && 'on' === $args['button_custom'];
        $data_icon_phone     = $use_data_icon_phone ? sprintf(
            ' data-icon-phone="%1$s"',
             wp_doing_ajax() && ! ET_BUILDER_LOAD_ON_AJAX ? esc_attr( $args['custom_icon_phone'] ) : esc_attr( et_pb_process_font_icon( $args['custom_icon_phone'] ) )
        ) : '';

        // Render button.
        return sprintf(
            '%6$s<a%8$s class="%5$s" href="%1$s"%3$s%4$s%9$s%10$s%11$s>%2$s</a>%7$s',
            esc_url( $args['button_url'] ),
            et_core_esc_previously( $button_text ),
            ( 'on' === $args['url_new_window'] ? ' target="_blank"' : '' ),
            et_core_esc_previously( $data_icon ),
            esc_attr( implode( ' ', array_unique( $button_classname ) ) ), // #5
            $args['has_wrapper'] ? '<div class="et_pb_button_wrapper">' : '',
            $args['has_wrapper'] ? '</div>' : '',
            '' !== $args['button_id'] ? sprintf( ' id="%1$s"', esc_attr( $args['button_id'] ) ) : '',
            et_core_esc_previously( $data_icon_tablet ),
            et_core_esc_previously( $data_icon_phone ), // #10
            et_core_esc_previously( $args['multi_view_data'] )
        );
    }
}

if ( ! function_exists( 'dipl_modal_remove_shortcode' ) ) {
    function dipl_modal_remove_shortcode( $content = '' ) {
        $content = trim( $content );

        if ( '' === $content ) {
            return '';
        }

        $strip_content_shortcodes = array(
            'dipl_modal',
            'el_modal_popup'
        );

        foreach ( $strip_content_shortcodes as $shortcode_name ) {
            $regex = sprintf(
                '(\[%1$s[^\]]*\][^\[]*\[\/%1$s\]|\[%1$s[^\]]*\])',
                esc_html( $shortcode_name )
            );

            $content = preg_replace( $regex, '', $content );
        }

        return et_core_intentionally_unescaped( $content, 'html' );
    }
}

if ( ! function_exists( 'dipl_product_sale_badge' ) ) {
    function dipl_product_sale_badge( $product, $percent = false, $sale_label_text = '' ) {
        if ( ! $product->is_on_sale() ) {
            return '';
        }

        if ( ! $percent ) {

            if ( '' === $sale_label_text ) {
                if ( $product->is_on_sale() ) {
                    $product_post = get_post( $product );
                    $sale_flash = apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale!', 'woocommerce' ) . '</span>', $product_post, $product );
                } else {
                    $sale_flash = '';
                }
            } else {
                $sale_flash = $sale_label_text;
            }

            return  sprintf(
                '<div class="dipl_single_woo_product_sale_badge">
                    %1$s
                </div>',
                esc_html( wp_strip_all_tags( $sale_flash ) )
            );
        }

        $max_percentage = 0;
       
        if ( $product->is_type( 'variable' ) ) {
            $variation_prices = $product->get_variation_prices();
            foreach ( $variation_prices['regular_price'] as $product_id => $regular_price ) {
                if ( 0 === $regular_price ) { 
                    continue;
                }
                if ( $regular_price == $variation_prices['sale_price'][$product_id] ) {
                    continue;
                }
                $percentage = ( ( $regular_price - $variation_prices['sale_price'][$product_id] ) / $regular_price ) * 100;
                if ( $percentage > $max_percentage ) {
                    $max_percentage = $percentage;
                }
            }
        } else if ( $product->is_type( 'grouped' ) ) {
            foreach ( $product->get_children() as $child_product_id ) {
                $child_product  = wc_get_product( $child_product_id );
                $regular_price  = $child_product->get_regular_price();
                $sale_price     = $child_product->get_sale_price();
                if ( 0 !== $regular_price && ! empty( $sale_price ) ) {
                    $percentage = ( ( $regular_price - $sale_price ) / $regular_price ) * 100;
                    if ( $percentage > $max_percentage ) {
                        $max_percentage = $percentage;
                    }
                }
            }
        } else {
            $max_percentage = ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100;
        }

        if ( isset( $max_percentage ) && round( $max_percentage ) > 0 ) {
            return  sprintf(
                '<div class="dipl_single_woo_product_sale_badge">
                    -%1$s%%
                </div>',
                absint( round( $max_percentage ) )
            );
        }

        return '';
    }
}

if ( ! function_exists( 'dipl_woocommerce_category_thumbnail' ) ) {
    function dipl_woocommerce_category_thumbnail( $category, $size = 'woocommerce_thumbnail' ) {
        $dimensions           = wc_get_image_size( $size );
        $thumbnail_id         = get_term_meta( $category->term_id, 'thumbnail_id', true );

        if ( $thumbnail_id ) {
            $image        = wp_get_attachment_image_src( $thumbnail_id, $size );
            $image        = is_array( $image ) ? $image[0] : wc_placeholder_img_src();
            $image_srcset = function_exists( 'wp_get_attachment_image_srcset' ) ? wp_get_attachment_image_srcset( $thumbnail_id, $size ) : false;
            $image_sizes  = function_exists( 'wp_get_attachment_image_sizes' ) ? wp_get_attachment_image_sizes( $thumbnail_id, $size ) : false;
        } else {
            $image        = wc_placeholder_img_src();
            $image_srcset = false;
            $image_sizes  = false;
        }

        if ( $image ) {
            // Prevent esc_url from breaking spaces in urls for image embeds.
            // Ref: https://core.trac.wordpress.org/ticket/23605.
            $image = str_replace( ' ', '%20', $image );

            // Add responsive image markup if available.
            if ( $image_srcset && $image_sizes ) {
                return '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $category->name ) . '" width="' . esc_attr( $dimensions['width'] ) . '" height="' . esc_attr( $dimensions['height'] ) . '" srcset="' . esc_attr( $image_srcset ) . '" sizes="' . esc_attr( $image_sizes ) . '" />';
            } else {
                return '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $category->name ) . '" width="' . esc_attr( $dimensions['width'] ) . '" height="' . esc_attr( $dimensions['height'] ) . '" />';
            }
        }
    }
}

if ( ! function_exists( 'dipl_add_to_cart_button' ) ) {
    function dipl_add_to_cart_button( $product_id, $icon = '', $single = false, $button_text = array() , $args = array() ) {
        $product    = wc_get_product( $product_id );
        $defaults   = array(
            'quantity'   => 1,
            'class'      => implode(
                ' ',
                array_filter(
                    array(
                        'button',
                        'product_type_' . $product->get_type(),
                        $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                        $product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() && ! $single ? 'ajax_add_to_cart' : '',
                        $single ? 'single_add_to_cart_button' : ''
                    )
                )
            ),
            'attributes' => array(
                'data-product_id'  => $product->get_id(),
                'data-product_sku' => $product->get_sku(),
                'aria-label'       => $product->add_to_cart_description(),
                'rel'              => 'nofollow',
            ),
        );

        if ( ! $single ) {
            $args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );
        } else {
            $args = wp_parse_args( $args, $defaults );
        }

        if ( isset( $args['attributes']['aria-label'] ) ) {
            $args['attributes']['aria-label'] = wp_strip_all_tags( $args['attributes']['aria-label'] );
        }

        if ( ! empty( $icon ) ) {
            $icon_output = array();

            foreach ( $icon as $attr => $value ) {
                if ( function_exists( 'et_pb_get_icon_font_family' ) ) {
                    $font_family = et_pb_get_icon_font_family($value);
                } else {
                    $font_family = 'ETmodules';
                }
                $processed_icon = wp_doing_ajax() && ! ET_BUILDER_LOAD_ON_AJAX ? esc_attr( $value ) : esc_attr( et_pb_process_font_icon( $value ) );
                $icon_output[] = 'data-icon_' . esc_attr( $attr ) . '="' . $processed_icon . '" data-icon_family_' . esc_attr( $attr ) . '="' . $font_family . '"';
            }

            $icon_output = implode( ' ', $icon_output );
        }

        if ( ! $single ) {
            return sprintf(
                '<p class="product woocommerce add_to_cart_inline">
                    <a href="%1$s" data-quantity="%2$s" class="%3$s" %4$s %6$s>%5$s</a>
                </p>',
                esc_url( $product->add_to_cart_url() ),
                esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
                esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
                isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
                empty( $button_text ) ? esc_html( $product->add_to_cart_text() ) : dipl_add_to_cart_button_text( $product, $button_text ),
                ! empty( $icon ) ? $icon_output : ''
            );
        } else {
            return sprintf(
                '<button type="submit" data-cart_url="%6$s" data-product_type="%5$s" class="%1$s" %2$s %4$s %7$s %8$s>%3$s</button>',
                esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
                isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
                esc_html( $product->single_add_to_cart_text() ),
                ! empty( $icon ) ? $icon_output : '',
                esc_attr( $product->get_type() ),
                'external' === $product->get_type() ? esc_url( $product->add_to_cart_url() ) : $product->get_permalink(),
                'simple' === $product->get_type() ? 'name="add-to-cart"' : '',
                'simple' === $product->get_type() ? sprintf( 'value="%1$s"', intval( $product_id ) ) : ''
            );
        }
    }
}

if ( ! function_exists( 'dipl_add_to_cart_button_text' ) ) {
    function dipl_add_to_cart_button_text( $dipl_product, $text ) {
        $product_type   = $dipl_product->get_type();
        $button_text    = esc_html( $dipl_product->add_to_cart_text() );

        switch( $product_type ) {
            case 'external':
                if ( '' !== $text['external'] ) {
                    $button_text = esc_html( $text['external'] );
                }
                break;

            case 'variable':
                if ( '' !== $text['variable'] && $dipl_product->is_purchasable() && dipl_is_variations_in_stock( $dipl_product ) ) {
                    $button_text = esc_html( $text['variable'] );
                } else if ( '' !== $text['variable'] && '' !== $text['out_of_stock'] ) {
                    $button_text = esc_html( $text['out_of_stock'] );
                }
                break;

            case 'grouped':
                if ( '' !== $text['grouped'] ) {
                    $button_text = esc_html( $text['grouped'] );
                }
                break;

            case 'simple':
                if ( '' !== $text['simple'] && $dipl_product->is_purchasable() && $dipl_product->is_in_stock() ) {
                    $button_text = esc_html( $text['simple'] );
                } else if ( '' !== $text['simple'] && '' !== $text['out_of_stock'] ) {
                    $button_text = esc_html( $text['out_of_stock'] );
                }
                break;

            default:
                break;
        }

        return $button_text;
    }
}

if ( ! function_exists( 'dipl_is_variations_in_stock' ) ) {
    function dipl_is_variations_in_stock( $el_product ) {
        $variations = $el_product->get_available_variations();
        foreach( $variations as $variation ) {
            $variation_id   = $variation['variation_id'];
            $variation_obj  = new WC_Product_variation( $variation_id );
            if ( $variation_obj->is_in_stock() ) {
                return true;
            }
        }
        return false;
    }
}

if ( ! function_exists( 'dipl_is_grouped_products_in_stock' ) ) {
    function dipl_is_grouped_products_in_stock( $el_product ) {
        $children = $el_product->get_children();
        if ( is_array( $children ) && ! empty( $children ) ) {
            foreach ( $children as $child ) {
                $child_obj = wc_get_product( $child );
                if ( $child_obj->is_in_stock() ) {
                    return true;
                }
            }
        }
        return false;
    }
}

if ( ! function_exists( 'dipl_is_product_in_stock' ) ) {
    function dipl_is_product_in_stock( $el_product ) {
        $product_type = $el_product->get_type();

        switch( $product_type ) {
            case 'variable':
                return dipl_is_variations_in_stock( $el_product );
                break;

            case 'grouped':
                return dipl_is_grouped_products_in_stock( $el_product );
                break;

            case 'simple':
                return $el_product->is_in_stock();
                break;

            default:
                return true;
                break;
        }

        return true;
    }
}
    
if ( ! function_exists( 'dipl_product_gallery_image' ) ) {
    function dipl_product_gallery_image( $attachment_id, $image_size, $main_image = false ) {
        $gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
        $thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
        $thumbnail_src     = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
        $full_src          = wp_get_attachment_image_src( $attachment_id, 'full' );
        $alt_text          = trim( wp_strip_all_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) );
        $image             = wp_get_attachment_image(
            $attachment_id,
            $image_size,
            false,
            array(
                'title'                   => _wp_specialchars( get_post_field( 'post_title', $attachment_id ), ENT_QUOTES, 'UTF-8', true ),
                'data-caption'            => _wp_specialchars( get_post_field( 'post_excerpt', $attachment_id ), ENT_QUOTES, 'UTF-8', true ),
                'data-src'                => esc_url( $full_src[0] ),
                'data-large_image'        => esc_url( $full_src[0] ),
                'data-large_image_width'  => esc_attr( $full_src[1] ),
                'data-large_image_height' => esc_attr( $full_src[2] ),
                'class'                   => esc_attr( $main_image ? 'wp-post-image' : '' ),
            )
        );

        return sprintf(
            '<div data-mfp-src="%1$s" data-thumb="%2$s" data-thumb-alt="%3$s" class="dipl_product_gallery_image">%4$s</div>',
            esc_url( $full_src[0] ),
            esc_url( $thumbnail_src[0] ),
            esc_attr( $alt_text ),
            et_core_intentionally_unescaped( $image, 'html' )
        );
    }
}