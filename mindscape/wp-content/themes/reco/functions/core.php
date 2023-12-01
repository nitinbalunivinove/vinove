<?php
/*
* Common functionalities for all EP themes (static functions).
* These functions add or extends Wordpress functiontionalities.
*
*/

if ( ! class_exists( 'epcl_static_functions' ) ) {

	class epcl_static_functions {

		public function __construct() {

            /* Body Classes */
            
            add_filter( 'body_class', array( $this, 'custom_body_classes'), 5 );

			/* Admin: Add a thumb on post list */

			add_filter('manage_posts_columns', array( $this, 'posts_columns'), 5);
			add_action('manage_posts_custom_column', array( $this, 'posts_custom_columns'), 5, 2);

			/* Front-End: Custom Excerpt */

			add_filter('excerpt_more', array( $this, 'new_excerpt_more'));
			add_filter('excerpt_length', array( $this, 'custom_excerpt_length'), 999);

        }
        
        public function custom_body_classes( $classes ) {
            $epcl_theme = epcl_get_theme_options();
            
            if( empty($epcl_theme) ) return $classes;

            if($epcl_theme['background_type'] == 1 && $epcl_theme['bg_body_pattern']['url']) $classes[] = ' pattern bg-image';
            if($epcl_theme['background_type'] == 3 && $epcl_theme['bg_body_full']['url']) $classes[] = ' cover bg-image';
            
            // Lazy Load for adsense
            if( isset($epcl_theme['enable_lazyload_adsense']) && $epcl_theme['enable_lazyload_adsense'] === '1' ) $classes[] = ' enable-lazy-adsense';
            

            // Fullwidth Mobile layout
            if( isset($epcl_theme['mobile_layout']) && $epcl_theme['mobile_layout'] === 'fullwidth' ) $classes[] = ' mobile-fullwidth';

            // Theme Optimization enabled
            if( isset($epcl_theme['enable_optimization']) && $epcl_theme['enable_optimization'] === '1' ) $classes[] = ' enable-optimization';
              
            return $classes;
        }

		/* Replace [...] excerpt with a new one */

		public function new_excerpt_more($more){
			return '...';
		}

		/* Change excerpt length */

		public function custom_excerpt_length($length){
			return 25;
		}

		/* Add a custom image column to wp-admin-> posts */

		public function posts_columns($defaults){
            $defaults[EPCL_THEMEPREFIX.'_post_image'] = esc_html__('Image', 'reco');
            $defaults[EPCL_THEMEPREFIX.'_post_downloads'] = esc_html__('Downloads', 'reco');
			return $defaults;
		}

		public function posts_custom_columns($column_name, $id){

			if( $column_name === EPCL_THEMEPREFIX.'_post_image' ){
                the_post_thumbnail(EPCL_THEMEPREFIX.'_admin_thumb');
            }

            if( $column_name === EPCL_THEMEPREFIX.'_post_downloads' ){
                $download_counter = get_post_meta( $id, 'download_counter', true );
                if( $download_counter > 0 || $download_counter === '0' ){
                    echo esc_attr($download_counter);  
                }else{
                    esc_html_e('Disabled', 'reco');
                }                
            }

		}


	}

	new epcl_static_functions();
}
