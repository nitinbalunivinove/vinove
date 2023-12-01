<?php
$epcl_theme = epcl_get_theme_options();
if(function_exists('icl_get_home_url')) $home = icl_get_home_url();
else $home = home_url('/');

$footer_class = '';
if( epcl_get_option('enable_mobile_footer_sidebar') == false ){
    $footer_class = 'no-sidebar';
}
if( epcl_get_option('enable_mobile_footer_sidebar') == true && epcl_get_option('mobile_footer_sidebar') ){
    $footer_class = 'hide-default';
}
?>
<!-- start: #footer -->
<footer id="footer" class="grid-container np-mobile <?php echo esc_attr($footer_class); ?>">

    <?php if( epcl_get_option('mailchimp_url') && epcl_get_option('enable_subscribe') == '1' ): ?>
		<div class="subscribe section" <?php if( !empty($epcl_theme['bg_subscribe']['url']) ): ?>style="background-image: url('<?php echo esc_url( $epcl_theme['bg_subscribe']['url'] ); ?>');"<?php endif; ?>>
			<div class="grid-container grid-small grid-parent np-mobile">
				<div class="grid-55 tablet-grid-50 right">
                    <?php if( epcl_get_option('title_subscribe') ): ?>
                        <h4 class="title white"><?php echo esc_html( epcl_get_option('title_subscribe') ); ?></h4>
                    <?php else: ?>
                        <h4 class="title white"><?php esc_html_e('Subscribe to', 'reco'); ?> <?php bloginfo('name'); ?></h4>
                    <?php endif; ?>
                    <?php if( epcl_get_option('description_subscribe') ): ?>
                        <p><?php echo esc_html( epcl_get_option('description_subscribe') ); ?></p>
                    <?php else: ?>
                        <p><?php esc_html_e('Get the latest posts delivered right to your email.', 'reco'); ?></p>
                    <?php endif; ?>			
				</div>
				<div class="grid-45 tablet-grid-50 left">
					<form method="get" action="<?php echo esc_url( $epcl_theme['mailchimp_url'] ); ?>" target="_blank">
					    <div class="form-group">
					        <input type="email" name="MERGE0" class="inputbox" required placeholder="<?php esc_attr_e('Enter your email address', 'reco'); ?>" aria-label="<?php esc_attr_e('Enter your email address', 'reco'); ?>">
					    </div>
                        <button class="submit" type="submit" aria-label="Subscribe"><img src="<?php echo EPCL_THEMEPATH; ?>/assets/images/right-arrow.svg" alt="<?php esc_attr_e('Right arrow', 'reco'); ?>"></button>
                        <?php wp_nonce_field( 'epcl_subscribe', 'subscribe_nonce' ); ?>
					</form>
				</div>
			</div>
		</div>
    <?php endif; ?>
    
    <?php if( is_active_sidebar('epcl_sidebar_footer')  || is_active_sidebar( epcl_get_option('mobile_footer_sidebar') ) ): ?>
        <div class="widgets">
            <div class="default-sidebar border-effect"><?php dynamic_sidebar('epcl_sidebar_footer'); ?></div>
            <div class="clear"></div>
            <?php if( $epcl_theme['enable_mobile_footer_sidebar'] == true && $epcl_theme['mobile_footer_sidebar'] ): ?>
                <div class="mobile-sidebar hide-on-desktop"><?php dynamic_sidebar( $epcl_theme['mobile_footer_sidebar'] ); ?></div>
            <?php endif; ?>
            <div class="clear"></div>
        </div>
    <?php endif; ?>
    
    <?php if( !isset($epcl_theme['enable_footer_logo']) || $epcl_theme['enable_footer_logo'] == '1' ): ?>
        <?php 
        if( isset($epcl_theme['enable_footer_custom_logo']) && $epcl_theme['enable_footer_custom_logo'] === '1' ){
            $epcl_theme['logo_type'] = $epcl_theme['footer_logo_type'];
            if( $epcl_theme['footer_logo_type'] === '1' ){
                $epcl_theme['logo_image'] = $epcl_theme['footer_logo_image'];
                $epcl_theme['logo_width'] = $epcl_theme['footer_logo_width'];
            }else{
                $epcl_theme['logo_icon'] = $epcl_theme['footer_logo_icon'];
            }
        }
        ?>
        <?php if($epcl_theme['logo_type'] == 1 && $epcl_theme['logo_image']['url'] ): ?>
            <h2 class="logo"><a href="<?php echo esc_url($home); ?>"><img src="<?php echo esc_url( $epcl_theme['logo_image']['url'] ); ?>" alt="<?php bloginfo('name'); ?>" width="<?php echo esc_attr( $epcl_theme['logo_width'] ); ?>" /></a></h2>
        <?php else: ?>
            <h2 class="logo">
                <a href="<?php echo esc_url($home); ?>" class="title white medium">
                    <?php if( epcl_get_option('logo_icon') ): ?>
                        <i class="fa <?php echo esc_attr( $epcl_theme['logo_icon'] ); ?>"></i>
                    <?php endif; ?>
                    <?php bloginfo('name'); ?>
                </a>
            </h2>
        <?php endif; ?>
    <?php else: ?>
        <br>
    <?php endif; ?>

	<?php if( epcl_get_option('copyright_text') ): ?>
		<div class="published border-effect">
			<?php echo do_shortcode( wpautop( epcl_get_option('copyright_text') ) ); ?>
		</div>
	<?php endif; ?>
    <?php if( empty($epcl_theme) || $epcl_theme['enable_back_to_top'] == '1' ): ?>
        <a id="back-to-top" class="epcl-button dark" on="tap:wrapper.scrollTo(duration=600)"><img src="<?php echo EPCL_THEMEPATH; ?>/assets/images/top-arrow.svg" width="15" alt="<?php esc_attr_e('Back to top', 'reco'); ?>"></a>
    <?php endif; ?>

</footer>
<!-- end: #footer -->