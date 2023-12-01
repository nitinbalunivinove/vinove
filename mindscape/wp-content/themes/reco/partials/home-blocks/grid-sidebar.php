<?php
$epcl_theme = epcl_get_theme_options();
$epcl_module = epcl_get_module_options();

add_filter( 'excerpt_length', 'epcl_small_excerpt_length', 999 );

$args = array('post_type' => 'post', 'paged' => get_query_var('paged') );

if( is_page_template('page-templates/home.php') ){

    $var = is_front_page() ? 'page' : 'paged';
    $paged = ( get_query_var($var) ) ? get_query_var($var) : 1;
    $args['paged'] = $paged;

    if( !empty($epcl_module) ){
        if( isset($epcl_module['grid_sidebar_ignore_sticky']) && $epcl_module['grid_sidebar_ignore_sticky'] != '' ){
            $args['ignore_sticky_posts'] = $epcl_module['grid_sidebar_ignore_sticky'];
        }
        if( isset($epcl_module['grid_sidebar_category']) && $epcl_module['grid_sidebar_category'] != '' ){
            $args['cat'] = $epcl_module['grid_sidebar_category'];
        }
        if( isset($epcl_module['grid_sidebar_excluded_categories']) && $epcl_module['grid_sidebar_excluded_categories'] != '' ){
            $args['category__not_in'] = $epcl_module['grid_sidebar_excluded_categories'];
        }
        if( isset($epcl_module['grid_sidebar_posts_per_page']) && $epcl_module['grid_sidebar_posts_per_page'] != '' ){
            $args['posts_per_page'] = $epcl_module['grid_sidebar_posts_per_page'];
        }
        if( isset($epcl_module['grid_sidebar_orderby']) && $epcl_module['grid_sidebar_orderby'] != '' ){
            $args['orderby'] = $epcl_module['grid_sidebar_orderby'];
            if( $epcl_module['grid_sidebar_orderby'] == 'views' ){
                $args['orderby'] = 'meta_value_num';
                $args['meta_key'] = 'views_counter';
            }
        }
        if( isset($epcl_module['grid_sidebar_order']) && $epcl_module['grid_sidebar_order'] != '' ){
            $args['order'] = $epcl_module['grid_sidebar_order'];
        }
    }

}

$custom_query = new WP_Query($args);
if( !is_page_template('page-templates/home.php') ){
    $custom_query = $wp_query;
}

$grid_posts_column = 3;
$module_class = '';
$sidebar_name = 'epcl_sidebar_home';
if( !empty($epcl_module) ){
    if( !empty($epcl_module['grid_posts_column']) ){
        $grid_posts_column = $epcl_module['grid_posts_column'];
    } 
    if( isset($epcl_module['sidebar']) &&  $epcl_module['sidebar'] != ''){
        $sidebar_name = $epcl_module['sidebar'];
    }
	if( $epcl_module['enable_counter'] == false ){
		$module_class .= ' no-counter';
    }
	if( $epcl_module['enable_filters'] == false ){
		$module_class .= ' no-filters';
	}
}
if( !empty($epcl_theme) && epcl_get_option('enable_global_filters') === '0'){
    $module_class .= ' no-filters';
}
if( !is_active_sidebar( $sidebar_name ) ){
    $module_class .= ' no-sidebar';
}
if( !empty($epcl_theme) && $epcl_theme['enable_global_counter'] == false){
    $module_class .= ' no-counter';
}
$unique_id = 'articles-'.uniqid();
set_query_var( 'custom_query', $custom_query );
?>

<div class="grid-container module-wrapper <?php echo esc_attr($module_class); ?>">

    <?php get_template_part('partials/counter-text'); ?>

    <?php if( !isset($epcl_module['enable_filters']) || $epcl_module['enable_filters'] !== false): ?>
        <?php get_template_part('partials/filters'); ?>
    <?php endif; ?>

    <!-- start: .content-wrapper -->
    <div class="content-wrapper grid-sidebar">
        <div class="content clearfix">
            <!-- start: .center -->
            <div class="center left-content grid-70">

                <?php if( $custom_query->have_posts() ): ?>
                    <!-- start: .articles -->
                    <div id="<?php echo esc_attr( $unique_id ); ?>" class="articles">
                        <?php while( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                            <?php get_template_part('partials/loops/grid-article'); ?>
                        <?php endwhile; ?>
                    </div>
                    <!-- end: .articles -->

                    <?php epcl_pagination( $custom_query, $unique_id ); ?>

                    <?php wp_reset_query(); ?>

                <?php else: ?>

                    <!-- start: .articles -->
                    <div class="articles classic">
                        <div class="section">
                            <div class="text textcenter">
                                <h3 class="title large no-margin"><?php esc_html_e("Something's wrong here...", 'reco'); ?></h3>
                                <p><?php esc_html_e("We can't find any result for your search term.", 'reco'); ?></p>
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

            <?php get_sidebar(); ?>
        </div>

    </div>
    <!-- end: .content-wrapper -->
</div>
