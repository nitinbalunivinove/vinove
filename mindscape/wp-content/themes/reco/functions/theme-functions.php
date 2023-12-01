<?php
/*
* Functions just for this particular theme
*
*/

function epcl_is_amp() {
    $amp_enabled = epcl_get_option('amp_enabled', false);
    // return false;
    return function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() && $amp_enabled;
}

// Replace global $epcl_theme with function (security)
if( !function_exists('epcl_get_theme_options') ){
    function epcl_get_theme_options() {
        global $epcl_theme;
        if( empty($epcl_theme) ){
            $epcl_theme = get_option( EPCL_FRAMEWORK_VAR );
        }
        if( !empty($epcl_theme) ){
            return $epcl_theme;
        }else{
            return false;
        }     
    }
}

// Replace global $epcl_module with function (security)
if( !function_exists('epcl_get_module_options') ){
    function epcl_get_module_options() {
        global $epcl_module;
        if( !empty($epcl_module) ){
            return $epcl_module;
        }else{
            return false;
        }     
    }
}

if( !function_exists('epcl_get_option') ){
    function epcl_get_option( $option = '', $default = '' ) {
        global $epcl_theme;
        if( empty($epcl_theme) ){
            $epcl_theme = get_option( EPCL_FRAMEWORK_VAR );
        }
        if( !empty($epcl_theme) && isset( $epcl_theme[ $option ] ) ){
            return $epcl_theme[ $option ];
        }else{
            if( $default !== '' ){
                return $default;
            }
            return false;
        }
    }
}

// Gutenberg fonts on admin
function epcl_gutenberg_fonts_url() {
    $epcl_theme = epcl_get_theme_options();
    $fonts_url = '';
    $font_families[] = 'Poppins:400,400i,500,600,600i,700,700i';
    $font_families[] = 'Roboto:400,500,700';

    // Customs fonts from Theme options
    if( !empty($epcl_theme) && ( !empty($epcl_theme['body_font']['font-family']) || !empty($epcl_theme['primary_titles_font']['font-family']) ) ){
        if( $epcl_theme['body_font']['font-family'] != '' && $epcl_theme['body_font']['font-weight'] != '' ){
            $font_families[] = $epcl_theme['body_font']['font-family'].':'.$epcl_theme['body_font']['font-weight'];   
        }else if( $epcl_theme['body_font']['font-family'] != '' ){
            $font_families[] = $epcl_theme['body_font']['font-family'];
        }
        if( !empty( $epcl_theme['primary_titles_font'] ) ){            
            if( $epcl_theme['primary_titles_font']['font-family'] != '' && $epcl_theme['primary_titles_font']['font-weight'] != '' ){
                $font_families[] = $epcl_theme['primary_titles_font']['font-family'].':'.$epcl_theme['primary_titles_font']['font-weight'];   
            }else if( $epcl_theme['primary_titles_font']['font-family'] != '' ){
                $font_families[] = $epcl_theme['primary_titles_font']['font-family'];
            }
        }
    }

    $query_args = array(
        'family' => rawurlencode( implode( '|', $font_families ) ),
        'subset' => rawurlencode( 'latin,latin-ext' ),
    );
    $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    
    return esc_url_raw( $fonts_url );
}

// Add search button to the end of the main menu
function epcl_search_nav_item($items) {
    return $items .= '<li class="hide-on-mobile hide-on-tablet"><a href="#search-lightbox" class="lightbox mfp-inline"><i class="fa fa-search"></i></a></li>';
}

// Customs fonts to match Gutenberg with Front-End, only enabled by theme options
add_action('admin_head', 'epcl_admin_custom_css', 20);
function epcl_admin_custom_css() {
    $custom_css = epcl_generate_gutenberg_custom_styles();
    echo '<style id="epcl-custom-css-admin">'.$custom_css.'</style>';
}

/* Ajax for download button */

function epcl_download() {

    // Check for nonce security for logged in users
    $nonce = sanitize_text_field( $_POST['nonce'] );
    if ( ! wp_verify_nonce( $nonce, 'epcl_load_more' ) && is_user_logged_in() )
        die ( 'Busted!');

    $post_id = sanitize_text_field( $_POST['post_id'] );    

    $download_counter = get_post_meta($post_id, 'download_counter', true);
    if( !$download_counter ) $download_counter = 0;

    update_post_meta($post_id, 'download_counter', ++$download_counter);

    die('success');
}
add_action('wp_ajax_nopriv_epcl_download', 'epcl_download');
add_action('wp_ajax_epcl_download', 'epcl_download');

/* Add small excerpt length */

function epcl_usmall_excerpt_length($length){
    $length = 12;

	return $length;
}

function epcl_small_excerpt_length($length){
    $epcl_theme = epcl_get_theme_options();
    $length = 17;

    if( !empty($epcl_theme) && $epcl_theme['small_excerpt_length'] ){
        $length = absint( $epcl_theme['small_excerpt_length'] );
    }
	return $length;
}

function epcl_large_excerpt_length($length){
    $epcl_theme = epcl_get_theme_options();
    $length = 30;

    if( !empty($epcl_theme) && $epcl_theme['large_excerpt_length'] ){
        $length = absint( $epcl_theme['large_excerpt_length'] );
    }
	return $length;
}

add_filter( 'image_size_names_choose', 'epcl_media_settings_custom_sizes' );

function epcl_media_settings_custom_sizes( $sizes ) {
	return array_merge( $sizes, array(
		'epcl_single_content' => esc_html__( 'EP Article Thumb', 'reco' ),
	) );
}

add_filter('wp_list_categories', 'epcl_at_count_span');
add_filter('get_archives_link', 'epcl_archives_count');

function epcl_at_count_span($links) {
    $links = str_replace('</a> (', '</a> <span>(', $links);
    $links = str_replace(')', ')</span>', $links);
    return $links;
}

function epcl_archives_count($links){
    $links = str_replace('</a>&nbsp;(', '</a> <span>(', $links);
    $links = str_replace(')', ')</span>', $links);
    return $links;
}


/* Custom Pagination */

function epcl_pagination($query = NULL, $unique_id = ''){
    global $wp_query, $paged;

    $epcl_theme = epcl_get_theme_options();
    $epcl_module = epcl_get_module_options();
    $paged = 1;

    if($query) $wp_query = $query;
    if( !empty($wp_query->query['paged']) ){
        $paged = $wp_query->query['paged'];        
    }

    $posts_per_page = $wp_query->query_vars['posts_per_page'];
    $limit = $wp_query->max_num_pages;
    $layout = 'grid_posts';

    $columns = 3;
    $class = '';
    $filters = array();

    // var_dump($epcl_module);

    // Posts loaded by modules
    if( !empty($epcl_module) && isset($epcl_module['acf_fc_layout']) ){
        switch( $epcl_module['acf_fc_layout'] ){
            case 'grid_posts':
                // Ignore Sticky posts
                if( isset($epcl_module['grid_ignore_sticky']) && $epcl_module['grid_ignore_sticky'] != '' ){
                    $filters['ignore_sticky_posts'] = $epcl_module['grid_ignore_sticky'];
                }
                // Only these categories
                if( !empty($epcl_module['grid_category'] ) ){
                    $filters['cat'] = implode(',', $epcl_module['grid_category'] );
                }
                // Excluded categories
                if( !empty($epcl_module['grid_excluded_categories'] ) ){
                    $filters['category__not_in'] = implode(',', $epcl_module['grid_excluded_categories'] );
                }
                // Order by date, views or title name
                if( isset( $epcl_module['grid_posts_orderby'] ) && $epcl_module['grid_posts_orderby'] != '' ){
                    $filters['orderby'] = $epcl_module['grid_posts_orderby'];
                    if( $epcl_module['grid_posts_orderby'] == 'views' ){
                        $filters['orderby'] = 'meta_value_num';
                        $filters['meta_key'] = 'views_counter';
                    }
                }
                // Order ASC or DESC
                if( isset( $epcl_module['grid_posts_order'] ) && $epcl_module['grid_posts_order'] != '' ){
                    $filters['order'] = $epcl_module['grid_posts_order'] ;
                }
            break;
            case 'grid_sidebar':
                // Ignore Sticky posts
                if( isset($epcl_module['grid_sidebar_ignore_sticky']) && $epcl_module['grid_sidebar_ignore_sticky'] != '' ){
                    $filters['ignore_sticky_posts'] = $epcl_module['grid_sidebar_ignore_sticky'];
                }
                // Only these categories
                if( !empty($epcl_module['grid_sidebar_category'] ) ){
                    $filters['cat'] = implode(',', $epcl_module['grid_sidebar_category'] );
                }
                // Excluded categories
                if( !empty($epcl_module['grid_sidebar_excluded_categories'] ) ){
                    $filters['category__not_in'] = implode(',', $epcl_module['grid_sidebar_excluded_categories'] );
                }
                // Order by date, views or title name
                if( isset( $epcl_module['grid_sidebar_orderby'] ) && $epcl_module['grid_sidebar_orderby'] != '' ){
                    $filters['orderby'] = $epcl_module['grid_sidebar_orderby'];
                    if( $epcl_module['grid_sidebar_orderby'] == 'views' ){
                        $filters['orderby'] = 'meta_value_num';
                        $filters['meta_key'] = 'views_counter';
                    }
                }
                // Order ASC or DESC
                if( isset( $epcl_module['grid_sidebar_order'] ) && $epcl_module['grid_sidebar_order'] != '' ){
                    $filters['order'] = $epcl_module['grid_sidebar_order'] ;
                }
            break;
            case 'classic_posts':
                // Only these categories
                if( !empty($epcl_module['classic_category'] ) ){
                    $filters['cat'] = implode(',', $epcl_module['classic_category'] );
                }
                // Excluded categories
                if( !empty($epcl_module['classic_excluded_categories'] ) ){
                    $filters['category__not_in'] = implode(',', $epcl_module['classic_excluded_categories'] );
                }
                // Order by date, views or title name
                if( isset( $epcl_module['classic_orderby'] ) && $epcl_module['classic_orderby'] != '' ){
                    $filters['orderby'] = $epcl_module['classic_orderby'];
                    if( $epcl_module['classic_orderby'] == 'views' ){
                        $filters['orderby'] = 'meta_value_num';
                        $filters['meta_key'] = 'views_counter';
                    }
                }
                // Order ASC or DESC
                if( isset( $epcl_module['classic_order'] ) && $epcl_module['classic_order'] != '' ){
                    $filters['order'] = $epcl_module['classic_order'] ;
                }
            break;
        }

        $layout = $epcl_module['acf_fc_layout'];
        if( isset($epcl_module['grid_posts_column']) ){
            $columns = $epcl_module['grid_posts_column'];
        }
        
    // Posts loaded without modules
    }else if( !empty($epcl_theme) ){
        if( is_home() ){
            $layout = $epcl_theme['posts_page_layout'];
        }
        if( is_archive() ){
            //echo 'qwe';
            $layout = $epcl_theme['archive_layout'];
	        $queried_object = get_queried_object();
	        if( is_category() ){
		        $filters['cat'] = $queried_object->term_id;
            }
	        if( is_author() ){
	            //var_dump($queried_object);
		        $filters['author'] = intval( $queried_object->ID );
            }
        }
        if( is_search() ){
            $layout = $epcl_theme['search_layout'];
        }
        if( $epcl_theme['posts_page_layout'] == 'grid_4_cols'){
            $columns = 4;
        }
    }
    
    if($layout == 'grid_sidebar'){
        $columns = 2;
    }

    if( $paged >= $limit ){
        $class = 'disabled';
    }
    $pagination_method = 'pagination_method_grid';
    if( $layout == 'classic' || $layout == 'classic_posts' ){
        $pagination_method = 'pagination_method_classic'; 
    }
    if( function_exists('is_shop') && is_shop() ){
        $pagination_method = 'classic'; 
    }

    $filters = json_encode($filters);
?>
    <div class="separator last hide-on-tablet hide-on-mobile"></div>
    <div class="clear"></div>
    <!-- start: .pagination -->
    <div class="pagination section">
        <?php if( epcl_get_option( $pagination_method ) !== 'loadmore' || epcl_is_amp() ): ?>
        <div class="nav">            
            <?php echo get_previous_posts_link( esc_html__('Newer Posts', 'reco') ); ?>
            <span class="page-number">
                <?php esc_html_e('Page', 'reco'); ?> <?php echo max(1, get_query_var('paged') ); ?>
                <?php esc_html_e('of', 'reco'); ?> <?php echo intval($wp_query->max_num_pages); ?>
            </span>
            <?php echo get_next_posts_link( esc_html__('Older Posts', 'reco') ); ?>
        </div>
        <?php elseif( epcl_get_option( $pagination_method ) == 'loadmore' ): ?>
            <a href="javascript:void(0)" class="epcl-load-more epcl-button <?php echo esc_attr($class); ?>" data-container-id="<?php echo esc_attr($unique_id); ?>" data-layout="<?php echo esc_attr($layout); ?>" data-columns="<?php echo absint($columns); ?>" data-text-default="<?php esc_html_e('Load More', 'reco'); ?>" data-text-loading="<?php esc_html_e('Loading...', 'reco'); ?>" data-text-disabled="<?php esc_html_e('No more posts', 'reco'); ?>" data-limit="<?php echo absint($limit); ?>" data-page="<?php echo absint($paged); ?>" data-perpage="<?php echo absint($posts_per_page); ?>" data-filters="<?php echo esc_attr($filters); ?>" data-nonce="<?php echo wp_create_nonce('epcl_load_more'); ?>">
                <?php if( $paged < $limit): ?>
                    <?php esc_html_e('Load More', 'reco'); ?>
                <?php else: ?>
                    <?php esc_html_e('No more posts', 'reco'); ?>
                <?php endif; ?>
            </a>
        <?php endif; ?>
    </div>
    <!-- end: .pagination -->
<?php
}

function epcl_loadmore(){
    // Check for nonce security for logged in users
    $nonce = sanitize_text_field( $_POST['nonce'] );
    if ( ! wp_verify_nonce( $nonce, 'epcl_load_more' ) && is_user_logged_in() )
        die ( 'Busted!');
		
    $paged = sanitize_text_field( $_POST['page_number'] );
    $layout = sanitize_text_field( $_POST['layout'] );
    $perpage = sanitize_text_field( $_POST['perpage'] );
    $columns = sanitize_text_field( $_POST['columns'] );
    $filters = array_map( 'sanitize_text_field', wp_unslash( $_POST['filters'] ) );

    // print_r($filters);

    set_query_var('columns', $columns);

    $args = array(
        'paged' => $paged,
        'posts_per_page' => $perpage,
        'post_status' => 'publish'        
    );

    // If ignore sticky is assigned from the start, don't exclude sticky posts.
    if( !isset($filters['ignore_sticky_posts']) ){
        $args['post__not_in'] = get_option( 'sticky_posts' );
    }

    // if( $cat != '' ){
    //     $categories = explode(',', $cat);
    //     $args['cat'] = $categories; 
    // }

    // if( $ex_cat != '' ){
    //     $excluded_categories = explode(',', $ex_cat);
    //     $args['category__not_in'] = $excluded_categories;
    // }

    if( !empty($filters) ){
       $args = array_merge( $args, $filters );
    }

    $ajax_query = new WP_Query($args);

    $post_layout = 'grid-article';

    if( $layout == 'classic_posts' || $layout == 'classic'){
        $post_layout = 'classic-article';
    }   
	
	while($ajax_query->have_posts()): $ajax_query->the_post();
		echo get_template_part( 'partials/loops/'.$post_layout );
	endwhile;
	
    exit;
}

add_action('wp_ajax_nopriv_epcl_loadmore', 'epcl_loadmore');
add_action('wp_ajax_epcl_loadmore', 'epcl_loadmore');