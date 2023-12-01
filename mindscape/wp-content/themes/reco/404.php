<?php get_header(); ?>

<?php
$enable_sidebar = true;
$page_class = '';
if( !is_active_sidebar('epcl_sidebar_home') ){
    $enable_sidebar = false;
    $page_class .= ' no-sidebar';
}

?>

<!-- start: #page-404 -->
<main id="page-404" class="main grid-container">

	<!-- start: .center -->
	<div class="center content <?php echo esc_attr($page_class); ?>">

		<!-- start: .left-content -->
		<div class="left-content section grid-70 np-mobile">
			<article>
				<div class="not-found section">
					<i class="fa fa-exclamation-circle"></i>
                    <h2 class="title ularge"><strong><?php esc_html_e("404", 'reco'); ?></strong><br><?php esc_html_e("Page not found", 'reco'); ?></h2>
				</div>
				<div class="text textcenter">
					<h3 class="title large no-margin"><?php esc_html_e("Something's wrong here...", 'reco'); ?></h3>
					<p><?php _e("We can't find the page you're looking.", 'reco'); ?></p>
				</div>
                <div class="buttons">
                    <a href="<?php echo home_url('/'); ?>" class="button outline"><i class="fa fa-share fa-flip-horizontal"></i> <?php esc_html_e("Go back to home", "reco"); ?></a>
                </div>

			</article>
		</div>
        <!-- end: .content -->
        
        <?php if( $enable_sidebar !== false ): ?>
            <?php get_sidebar(); ?>
        <?php endif; ?>

        <div class="clear"></div>

	</div>
	<!-- end: .center -->
</main>
<!-- end: #page-404 -->
<?php get_footer(); ?>
