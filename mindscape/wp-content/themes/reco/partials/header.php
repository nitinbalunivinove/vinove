<?php
$epcl_theme = epcl_get_theme_options();
if( function_exists('icl_get_home_url') ) $home = icl_get_home_url();
else $home = home_url('/');
// Just demo
if( isset($_GET['header']) ){
	$header_type = sanitize_text_field( $_GET['header'] );
	switch($header_type){
		default:
			$epcl_theme['header_type'] = 'minimalist';
		break;
		case 'classic':
			$epcl_theme['header_type'] = 'classic';
		break;
		case 'notice':
			$epcl_theme['enable_notice'] = true;
        break;
        case 'advertising':
            $epcl_theme['header_type'] = 'advertising';
		break;
	}
}

// Only if theme options data has been created
$header_class = '';
if( !empty( $epcl_theme ) ){
    $header_class = $epcl_theme['header_type'];
    if( isset( $epcl_theme['enable_sticky_header'] ) && $epcl_theme['enable_sticky_header'] != false ){
        $header_class .=' enable-sticky';
    }
    if( isset( $epcl_theme['enable_sticky_header_mobile'] ) && $epcl_theme['enable_sticky_header_mobile'] != false ){
        $header_class .=' enable-sticky-mobile';
    }
    if( isset($epcl_theme['sticky_logo_image']['url'] ) && $epcl_theme['sticky_logo_image']['url'] ){
        $header_class .=' has-sticky-logo'; 
    }
    if( isset($epcl_theme['enable_search_header']) && $epcl_theme['enable_search_header'] == '1' ){
        add_filter('wp_nav_menu_items','epcl_search_nav_item');
    }
}

?>
<?php if( epcl_get_option('enable_notice')  == true && epcl_get_option('notice_text') ): ?>
    <?php if( epcl_get_option('enable_notice_close')  == false || (!isset($_COOKIE['epcl_show_notice']) || $_COOKIE['epcl_show_notice'] != 'false') ): ?>
        <div class="notice text underline-effect">
            <div class="grid-container">
                <div class="info">
                    <i class="fa fa-bell"></i>
                    <?php echo wpautop( do_shortcode( $epcl_theme['notice_text'] ) ); ?>
                    <?php if( epcl_get_option('enable_notice_close')  == true ): ?>
                        <a href="<?php echo home_url( $wp->request ); ?>?epcl-action=remove-notice" class="close"><i class="fa fa-times"></i></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>

<!-- start: #header -->
<header id="header" class="<?php echo esc_attr($header_class); ?>">

	<div class="menu-mobile">
        <i class="fa fa-bars"></i>
	</div>

	<!-- start: .menu-wrapper -->
	<div class="menu-wrapper">
		<div class="grid-container">

<!--       	<div class="menu-mobile">
                <i class="fa fa-bars"></i>
            </div> -->
            
			<?php if( epcl_get_option('logo_type') == 1 && $epcl_theme['logo_image']['url'] ): ?>
                <div class="logo">
                    <a href="<?php echo home_url('/'); ?>"><img class="main-logo-img" src="<?php echo esc_url( $epcl_theme['logo_image']['url'] ); ?>" alt="<?php bloginfo('name'); ?>" width="<?php echo esc_attr( $epcl_theme['logo_width'] ); ?>" /></a>
                </div>
                <?php if( isset($epcl_theme['sticky_logo_image']) && $epcl_theme['sticky_logo_image']['url'] ): ?>
                    <div class="logo sticky-logo">
                        <a href="<?php echo home_url('/'); ?>"><img src="<?php echo esc_url( $epcl_theme['sticky_logo_image']['url'] ); ?>" alt="<?php bloginfo('name'); ?>" width="<?php echo esc_attr( $epcl_theme['sticky_logo_width'] ); ?>" /></a>
                    </div>                
                <?php endif; ?>
			<?php else: ?>
				<div class="logo">
					<a href="<?php echo home_url('/'); ?>" class="title white no-margin">
						<?php if( isset( $epcl_theme['logo_icon'] ) && $epcl_theme['logo_icon'] ): ?>
							<i class="fa <?php echo esc_attr( $epcl_theme['logo_icon'] ); ?>"></i>
						<?php endif; ?>
						<?php bloginfo('name'); ?>
					</a>
				</div>
            <?php endif; ?>

            <?php if( $epcl_theme['header_type']  == 'advertising' && function_exists('epcl_render_header_ads') ): ?>
                <?php epcl_render_header_ads(); ?>
            <?php endif; ?>

            <?php if( epcl_get_option('enable_share_header') || function_exists('edd_get_checkout_uri') || function_exists('wc_get_cart_url') ): ?>
                <div class="share-buttons hide-on-tablet hide-on-mobile">
                    <?php if( function_exists('edd_get_checkout_uri') ): ?>
                        <a href="<?php echo esc_url( edd_get_checkout_uri() ); ?>">
                            <i class="fa fa-shopping-cart"></i>
                            <span class="header-cart edd-cart-quantity"><?php echo edd_get_cart_quantity(); ?></span>
                        </a>
                    <?php endif; ?>
                    <?php if( function_exists('wc_get_cart_url') ): ?>
                        <a href="<?php echo esc_url( wc_get_cart_url() ); ?>">
                            <i class="fa fa-shopping-cart"></i>
                            <span class="header-cart edd-cart-quantity"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                        </a>
                    <?php endif; ?>
                    <?php if( epcl_get_option('facebook_url') ): ?>
                        <a href="<?php echo esc_url( epcl_get_option('facebook_url') ); ?>" target="_blank" aria-label="Facebook" rel="nofollow noopener noreferrer"><i class="fa fa-facebook"></i></a>
                    <?php endif; ?>
                    <?php if( epcl_get_option('twitter_url') ): ?>
                        <a href="<?php echo epcl_get_option('twitter_url'); ?>" target="_blank" aria-label="Twitter" rel="nofollow noopener noreferrer"><i class="fa fa-twitter"></i></a>
                    <?php endif; ?>
                    <?php if( epcl_get_option('linkedin_url') ): ?>
                        <a href="<?php echo epcl_get_option('linkedin_url'); ?>" target="_blank" aria-label="Linkedin" rel="nofollow noopener noreferrer"><i class="fa fa-linkedin"></i></a>
                    <?php endif; ?>
                    <?php if( epcl_get_option('instagram_url') ): ?>
                        <a href="<?php echo epcl_get_option('instagram_url'); ?>" target="_blank" aria-label="Instagram" rel="nofollow noopener noreferrer"><i class="fa fa-instagram"></i></a>
                    <?php endif; ?>
                    <?php if( epcl_get_option('pinterest_url') ): ?>
                        <a href="<?php echo epcl_get_option('pinterest_url'); ?>" target="_blank" aria-label="Pinterest" rel="nofollow noopener noreferrer"><i class="fa fa-pinterest"></i></a>
                    <?php endif; ?>
                    <?php if( epcl_get_option('dribbble_url') ): ?>
                        <a href="<?php echo epcl_get_option('dribbble_url'); ?>" target="_blank" aria-label="Dribbble" rel="nofollow noopener noreferrer"><i class="fa fa-dribbble"></i></a>
                    <?php endif; ?>
                    <?php if( epcl_get_option('tumblr_url') ): ?>
                        <a href="<?php echo epcl_get_option('tumblr_url'); ?>" target="_blank" aria-label="Tumblr" rel="nofollow noopener noreferrer"><i class="fa fa-tumblr"></i></a>
                    <?php endif; ?>
                    <?php if( epcl_get_option('youtube_url') ): ?>
                        <a href="<?php echo epcl_get_option('youtube_url'); ?>" target="_blank" aria-label="Youtube" rel="nofollow noopener noreferrer"><i class="fa fa-youtube"></i></a>
                    <?php endif; ?>
                    <?php if( epcl_get_option('flickr_url') ): ?>
                        <a href="<?php echo epcl_get_option('flickr_url'); ?>" target="_blank" aria-label="Flickr" rel="nofollow noopener noreferrer"><i class="fa fa-flickr"></i></a>
                    <?php endif; ?>
                    <?php if( epcl_get_option('vk_url') ): ?>
                        <a href="<?php echo epcl_get_option('vk_url'); ?>" target="_blank" aria-label="Vkontakte" rel="nofollow noopener noreferrer"><i class="fa fa-vk"></i></a>
                    <?php endif; ?>
                    <?php if( epcl_get_option('telegram_url') ): ?>
                        <a href="<?php echo epcl_get_option('telegram_url'); ?>" target="_blank" aria-label="Telegram" rel="nofollow noopener noreferrer"><i class="fa fa-telegram"></i></a>
                    <?php endif; ?>
                    <?php if( epcl_get_option('rss_url') ): ?>
                        <a href="<?php echo epcl_get_option('rss_url'); ?>" target="_blank" aria-label="RSS" rel="nofollow noopener noreferrer"><i class="fa fa-rss"></i></a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
			<!-- start: .main-nav -->
			<nav class="main-nav">
				<?php
				$args = array(
					'theme_location' => 'epcl_header',
					'container' => false
                );
				if(has_nav_menu('epcl_header')){
					wp_nav_menu($args);
                } 
				?>
			</nav>
            <!-- end: .main-nav -->

            <?php if( !empty( $epcl_theme) && isset($epcl_theme['enable_search_header']) && $epcl_theme['enable_search_header'] == '1' ): ?>
                <a href="#search-lightbox" class="lightbox epcl-search-button mfp-inline hide-on-desktop"><i class="fa fa-search"></i></a>
            <?php endif; ?>

            <div class="clear"></div>
            <div class="border hide-on-tablet hide-on-mobile"></div>
		</div>
		<div class="clear"></div>
	</div>
	<!-- end: .menu-wrapper -->

	<div class="clear"></div>
</header>
<!-- end: #header -->

<?php
if( function_exists( 'epcl_render_global_ads' ) ){
	epcl_render_global_ads('below_header');
}
?>

<?php if( !empty( $epcl_theme) && isset($epcl_theme['enable_search_header']) && $epcl_theme['enable_search_header'] == '1' ): ?>
    <?php $total_posts = wp_count_posts(); ?>
    <div class="hide-on-mobile hide-on-tablet hide-on-desktop">
        <div id="search-lightbox" class="mfp-hide grid-container grid-small grid-parent">
            <h4 class="title small white textcenter fw-normal hide-on-mobile hide-on-tablet"><?php printf( esc_html__( 'Press %s to close', 'reco' ), '<span>ESC</span>' ); ?></h4>
            <div class="search-wrapper section">                
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>
