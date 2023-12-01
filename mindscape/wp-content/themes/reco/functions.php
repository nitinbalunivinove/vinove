<?php
/*
* Variable usages:
*
* EPCL_ABSPATH: template folder, includes files inside the theme
* EPCL_THEMEPATH: includes relative file by http prottocol (url)
* EPCL_THEMEPREFIX:  Used for metaboxes and theme options panel. Must be equal to text domain.
* EPCL_FRAMEWORK_VAR: Used to storage information into wp database global variable, eg: $epcl_theme['carousel_category'].
*
*/
@ini_set( 'upload_max_size' , '120M' );
@ini_set( 'post_max_size', '120M');
@ini_set( 'max_execution_time', '300' );
@ini_set( 'upload_max_filesize', '30M' );

if( !defined('EPCL_ABSPATH') ) define('EPCL_ABSPATH', get_template_directory() );
if( !defined('EPCL_THEMEPATH') ) define('EPCL_THEMEPATH', get_template_directory_uri() );
if( !defined('EPCL_THEMEPREFIX') ) define('EPCL_THEMEPREFIX', 'epcl'); // Do not change
if( !defined('EPCL_FRAMEWORK_VAR') ) define('EPCL_FRAMEWORK_VAR', 'epcl_theme'); // Do not change
if( !defined('EPCL_THEMENAME') ) define('EPCL_THEMENAME', 'Reco' );
if( !defined('EPCL_THEMESLUG') ) define('EPCL_THEMESLUG', 'reco' ); // Do not change
if( !defined('EPCL_APIKEY') ) define('EPCL_APIKEY', '7A041F3C41437993C139-reco' ); // Do not change

if( !isset($content_width) ) $content_width = 719; // oembed width

add_filter( 'auto_update_plugin', '__return_true' );
/* Main class function for all Estudio Patagon themes, avoids plugins errors with a unique name  */

if( !class_exists('epcl_theme_setup') ) {

	class epcl_theme_setup {

		public function __construct() {

			/* Theme Includes */

			add_action('after_setup_theme', array( $this, 'includes' ), 4 );

			/* Main Theme Options */

			add_action('after_setup_theme', array( $this, 'theme_support') );

		}

		public function includes(){

            /* Delete changelogs if all is up to date */

            if (false !== get_transient('licensebox_next_update_check')) {
                delete_transient('licensebox_next_update_check');
            }

			/* Main Includes */

			require_once(EPCL_ABSPATH.'/functions/import/import-demo.php');
			require_once( get_theme_file_path('functions/post-formats.php') );
            require_once(EPCL_ABSPATH.'/functions/enqueue-scripts.php');
            require_once(EPCL_ABSPATH.'/functions/color-helper.php');
            require_once(EPCL_ABSPATH.'/functions/custom-styles.php');
            require_once( get_theme_file_path('functions/theme-functions.php') ); // Specific functions for this particular theme
			require_once(EPCL_ABSPATH.'/functions/core.php');

			/* Plugins */

			require_once(EPCL_ABSPATH.'/functions/plugins/class-tgm-plugin-activation.php');
            require_once(EPCL_ABSPATH.'/functions/plugins/recommended-plugins.php');

            /* Theme Wizard */

            if (!is_customize_preview()  && is_admin() ) {
                require_once(EPCL_ABSPATH.'/functions/merlin/vendor/autoload.php');
                require_once(EPCL_ABSPATH.'/functions/merlin/class-merlin.php');
                require_once(EPCL_ABSPATH.'/functions/merlin/merlin-config.php');
                require_once(EPCL_ABSPATH.'/functions/merlin/merlin-import-demo.php');
            }

		}

		public function theme_support(){

			/* Languages */

			load_theme_textdomain('reco', EPCL_ABSPATH.'/languages');

			/* Thumbs */

			if( function_exists('add_theme_support') ){
				add_theme_support('post-formats', array( 'video', 'gallery', 'audio' ) );
				add_theme_support('post-thumbnails');
				add_theme_support('automatic-feed-links');
				add_theme_support('html5');
                add_theme_support('title-tag');
                add_theme_support('woocommerce');
                add_theme_support('editor-styles'); // Gutenberg Support
                add_theme_support('responsive-embeds');
                add_theme_support( 'amp', array(
                    'paired' => true,
                    'template_dir' => 'amp',
                    'templates_supported' => array(
                        // 'is_front_page' => true,
                        // 'is_home' => true,
                        // 'is_singular' => true,
                        // 'is_search' => false,
                    ),
                ) );
                if( epcl_get_option('enable_gutenberg_admin') !== '0'){
                    add_editor_style( epcl_gutenberg_fonts_url() ); // Enqueue fonts in the gutenberg editor               
                    add_editor_style( 'assets/dist/gutenberg.min.css' ); // Enqueue custom styles in the Gutenberg editor
                }

				$prefix = EPCL_THEMEPREFIX.'_';

				add_image_size($prefix.'admin_thumb', 100, 100, false);

				add_image_size($prefix.'classic_post', 850, 600, true);

				add_image_size($prefix.'single_standard', 840, 400, true);
				add_image_size($prefix.'single_related', 600, 450, true);
				add_image_size($prefix.'single_content', 700, 450, false);

				add_image_size($prefix.'page_header', 1950, 500, true);

				add_image_size($prefix.'widget_thumb', 120, 120, true); // Required on widgets

				add_image_size($prefix.'large', 1600, 1200, false); // Required on portfolio lightbox

			}

			/* Menus */

			register_nav_menus(array(
				'epcl_header' => esc_html__('Header', 'reco')
			));

			/* Register Sidebars */

            require_once( get_theme_file_path('functions/sidebars.php') );

        }       

	}
	
	
    function create_meta_desc() {
        global $post;
        if (!is_single()) { return; }

        if( empty( get_post_meta( $post->ID, '_yoast_wpseo_metadesc', true ) ) ){ 
            $meta = strip_tags($post->post_content);
            $meta = strip_shortcodes($post->post_content);
            $meta = str_replace(array("\n", "\r", "\t"), ' ', $meta);
            $meta = substr($meta, 0, 125);
            echo "<meta name='description' data-check='true' content='$meta' />";    
        }
    }
	//remove un_used_scripts.
add_action('wp_enqueue_scripts', function(){
    //if( is_home() || is_front_page() ){
        $scripts    = ['jquery-ui-core','jquery-ui-accordion','wp-polyfill','smush-lazy-load'];
         $styles     = ['ez-icomoon','wp-faq-schema-jquery-ui','epcl-theme-critical','woocommerce-general','woocommerce-smallscreen','pwaforwp-style'];
        foreach( $scripts as $script ){
            wp_deregister_script($script);
            wp_dequeue_script($script);
        }
        foreach( $styles as $style ){
            wp_deregister_style($style);
            wp_dequeue_style($style);
        }
        $assets_folder = EPCL_THEMEPATH.'/assets';

        $prefix = EPCL_THEMEPREFIX.'-';



        $theme = wp_get_theme();

        $ver = $theme->version;
        wp_enqueue_style($prefix.'theme', $assets_folder.'/dist/style.min.css', NULL, $ver);
    //}
}, 10);
 
add_action('wp_head', 'create_meta_desc');

	new epcl_theme_setup;
}