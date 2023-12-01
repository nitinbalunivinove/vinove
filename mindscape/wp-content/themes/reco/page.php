<?php get_header(); ?>
<?php
$wrapper_class = '';
$prefix = EPCL_THEMEPREFIX.'_';
$enable_sidebar = $page_class = $fields = '';
if( function_exists('get_field') ){
    $enable_sidebar = get_field('enable_sidebar');
    $fields = get_fields();
    if( $enable_sidebar === false ) $page_class .= ' no-sidebar';
}
if( !is_active_sidebar('epcl_sidebar_default') ){
    $enable_sidebar = false;
    $page_class .= ' no-sidebar';
}
if( !has_post_thumbnail() ){
    $page_class .= ' no-thumb';
}
if( !empty($epcl_theme) && $epcl_theme['enable_page_sidebar'] === '2'){
    $enable_sidebar = true;
    $page_class = '';
}
if( !empty($epcl_theme) && $epcl_theme['enable_page_sidebar'] === '3'){
    $enable_sidebar = false;
    $page_class .= ' no-sidebar';
}
if( class_exists('Woocommerce') ){
    if( is_woocommerce() || is_cart() || is_checkout() || is_account_page() ){
        $enable_sidebar = false;
        $page_class .= ' no-sidebar';
    }
}
set_query_var('epcl_share_bottom', false);
?>
<!-- start: #page -->
<main id="page" class="main grid-container">
    <?php if( have_posts() ): the_post(); ?>

        <?php if( epcl_get_option('enable_breadcrumbs') == '1' && function_exists('epcl_render_breadcrumbs') ): ?>
            <div class="epcl-breadcrumbs" <?php if( epcl_get_option('breadcrumbs_type') == 'navxt'): ?> typeof="BreadcrumbList" vocab="https://schema.org/" <?php endif; ?>>
                <?php epcl_render_breadcrumbs(); ?>
            </div>
        <?php endif; ?>
        
		<!-- start: .center -->
	    <div id="single" class="center content fullcover <?php echo esc_attr($page_class); ?>">
            
            <?php if( has_post_thumbnail() ): ?>
                <div class="featured-image cover" style="background: url('<?php the_post_thumbnail_url('epcl_page_header'); ?>');">
                    <div class="center grid-container">
                        <div class="info">
                            <!-- start: .meta -->
                            <div class="meta">                                
                                <?php if( !isset($fields['enable_title']) || (function_exists('get_field') && get_field('enable_title') != '') ): ?>   
                                    <h1 class="title ularge white bordered bold"><?php the_title(); ?></h1>
                                <?php endif; ?>
                            </div>
                            <!-- end: .meta -->
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- start: .epcl-page-wrapper -->
            <div class="epcl-page-wrapper clearfix">

                <!-- start: .left-content -->
                <div class="left-content section grid-70 np-mobile">
                    <article <?php post_class(); ?>>

                        <section class="post-content">
                            <?php if( !empty($epcl_theme) && isset($epcl_theme['enable_sticky_share_buttons_page']) && $epcl_theme['enable_sticky_share_buttons_page'] == '1' ): ?>
                                <div class="epcl-share-container hide-on-mobile">
                                    <?php get_template_part('partials/share-buttons'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if( !has_post_thumbnail() && !isset($fields['enable_title']) ): ?>
                                <h1 class="title ularge bordered bold"><?php the_title(); ?></h1>
                            <?php elseif( !has_post_thumbnail() && function_exists('get_field') && get_field('enable_title') != '' ): ?>   
                                <h1 class="title ularge bordered bold"><?php the_title(); ?></h1>
                            <?php endif; ?>
                            <div class="text">
                                <?php the_content(); ?>
                            </div>
                            <div class="clear"></div>
                            <?php if( !empty($epcl_theme) && isset( $epcl_theme['enable_share_buttons_page'] ) && $epcl_theme['enable_share_buttons_page'] == '1' ): ?>
                                <!-- start: .share-buttons -->
                                <div class="share-buttons section">
                                    <h5 class="title small"><?php esc_html_e('Share Article:', 'reco'); ?></h5>
                                    <?php set_query_var('epcl_share_bottom', true); ?>
                                    <?php get_template_part('partials/share-buttons'); ?>
                                    <div class="clear"></div>
                                    <div class="permalink">
                                        <input type="text" name="shortlink" value="<?php the_permalink(); ?>" id="copy-link" readonly>
                                        <span class="copy"><svg><use xlink:href="#copy"></use></svg></span>
                                    </div>
                                </div>
                                <!-- end: .share-buttons -->
                            <?php endif; ?>
                        </section>
                        
                        <?php
                            $link_pages_args = array(
                                'before'           => '<div class="pagination link-pages section"><div class="nav"><span class="page-number">'.esc_html__( 'Pages', 'reco' ).'</span>',
                                'after'            => '</div></div>',
                                'link_before'      => '',
                                'link_after'       => '',
                                'next_or_number'   => 'number',
                                'separator'        => '',
                                'nextpagelink'     => esc_html__( 'Next', 'reco'),
                                'previouspagelink' => esc_html__( 'Previous', 'reco' ),
                                'pagelink'         => '<span class="page-number">%</span>',
                                'echo'             => 1
                            );
                            wp_link_pages( $link_pages_args );
                        ?>

                    </article>
                    
                    <?php if($epcl_theme['hosted_comments'] == 1 || empty($epcl_theme) ): // Self Hosted ?>
                        <?php comments_template(); ?>
                    <?php endif; ?>
                    
                    <?php if( comments_open() ): ?>

                        <?php if( $epcl_theme['hosted_comments'] == 2 && $epcl_theme['disqus_id'] ): // Disqus ?>
                            <!-- start: disqus integration -->
                            <div id="comments" class="section bordered">
                                <h3 class="title bordered no-margin"><?php esc_html_e('Comments', 'reco'); ?></h3>
                                <div id="disqus_thread"></div>
                            </div>
                            <noscript><?php esc_html_e('Please enable JavaScript to view the', 'reco'); ?> <a href="https://disqus.com/?ref_noscript" rel="nofollow"><?php esc_html_e('comments powered by Disqus.', 'reco'); ?></a></noscript>
                            <!-- end: disqus integration -->
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <!-- end: .left-content -->

                <?php
                if( $enable_sidebar !== false ){
                    get_sidebar();
                }
                ?>

            </div>
            <!-- end: .epcl-page-wrapper -->
        </div>
        <!-- end: .content -->
    <?php endif; ?>
</main>
<!-- end: #page -->
<?php get_footer(); ?>
