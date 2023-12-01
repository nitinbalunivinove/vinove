<?php get_template_part('amp/header'); ?>
<?php
add_filter('excerpt_length', 'epcl_small_excerpt_length', 999);
$unique_id = 'articles-'.uniqid();
?>
<!-- start: #archives-->
<main id="archives" class="main grid-container">

    <?php if( empty($epcl_theme) || $epcl_theme['enable_global_counter'] == '1' ): ?>
        <div class="section grid-container">
            <?php $total_posts = wp_count_posts(); ?>
            <h2 class="title ularge white textcenter no-margin"><?php esc_html_e('We found', 'reco'); ?> <span class="count main-color"><?php echo intval($wp_query->found_posts); ?></span> <?php printf( esc_html_e( _n( 'article by this author...', 'articles by this author...', intval($wp_query->found_posts), 'reco' ), intval($wp_query->found_posts) ) ); ?></h2>
            <div class="clear"></div>
        </div>
    <?php endif; ?>

	<!-- start: .content-wrapper -->
    <div class="content-wrapper">
        <!-- start: .center -->
        <div class="center content">

            <?php get_template_part('partials/author-box'); ?>
            
            <?php if( have_posts() ): ?>

                <!-- start: .articles -->
                <div class="articles" id="<?php echo esc_attr($unique_id); ?>">

                    <?php while( have_posts() ): the_post(); ?>
                        <?php get_template_part('partials/loops/grid-article'); ?>
                    <?php endwhile; ?>

                </div>
                <!-- end: .articles -->

                <?php epcl_pagination('', $unique_id); ?>
            
            <?php else: ?>

                <!-- start: .articles -->
                <div class="articles classic">
                    <div class="section">
                        <div class="text textcenter">
                            <h3 class="title large no-margin"><?php esc_html_e("Something's wrong here...", 'reco'); ?></h3>
                            <p><?php esc_html_e("We can't find any result for this author.", 'reco'); ?></p>
                        </div>
                        <div class="buttons textcenter">
                            <a href="<?php echo home_url('/'); ?>" class="button outline"><i class="fa fa-share fa-flip-horizontal"></i> <?php esc_html_e("Go back to home", "reco"); ?></a>
                        </div>
                    </div>
                </div>
                <!-- end: .articles -->

            <?php endif; ?>

        </div>
        <!-- end: .center -->
    </div>
	<!-- end: .content-wrapper -->

</main>
<!-- end: #archives -->

<?php get_template_part('amp/footer'); ?>
