<?php
$custom_query = get_query_var('custom_query');
$epcl_theme = epcl_get_theme_options();
$epcl_module = epcl_get_module_options();
?>
<?php if( is_search() && isset($epcl_theme['archives_search_term']) && $epcl_theme['archives_search_term'] == '1' ): ?>
    <div class="search-description grid-container grid-small np-mobile section">
        <h1 class="title white textcenter large no-margin"><?php echo sprintf( esc_html__('Search results for: "%s"', 'reco'), get_search_query() ) ; ?></h1>
        <div class="clear"></div>
    </div>
<?php elseif( ( is_category() || is_tag() ) && isset($epcl_theme['archives_cat_description']) && $epcl_theme['archives_cat_description'] == '1' ): ?>
        <div class="tag-description textcenter cover">
            <div class="grid-container grid-small np-mobile section">
                <h1 class="title large white fw-bold <?php if(!term_description()) echo 'nm-bottom'; ?>"><?php single_cat_title(); ?></h1>
                <?php if( term_description() ): ?>
                    <?php echo term_description(); ?>
                <?php endif; ?>
                <div class="clear"></div>
            </div>
        </div>
<?php elseif( $epcl_module['enable_counter'] !== false && $epcl_theme['enable_global_counter'] == '1' ): ?>
    <!-- <div class="section counter">
        <?php $total_posts = wp_count_posts(); ?>
        <?php if(is_home() || is_front_page() ): ?>
            <?php if( $epcl_theme['counter_text'] != '' ): ?>
                <h2 class="title ularge white textcenter no-margin"><?php echo str_replace('%s', '<span class="count main-color" data-total="'.intval($total_posts->publish).'">0</span>', $epcl_theme['counter_text'] ); ?></h2>
            <?php else: ?>
                <h2 class="title ularge white textcenter no-margin"><?php esc_html_e('Hello! We have', 'reco'); ?> <span class="count main-color" data-total="<?php echo intval($total_posts->publish); ?>">0</span> <?php printf( esc_html_e( _n( 'resource for you...', 'resources for you...', intval($total_posts->publish), 'reco' ), intval($total_posts->publish) ) ); ?></h2>
            <?php endif; ?>
        <?php else: ?>
            <?php if( epcl_get_option('counter_text_archives') != '' ): ?>
                <h1 class="title ularge white textcenter no-margin"><?php echo str_replace('%s', '<span class="count main-color" data-total="'.intval($custom_query->found_posts).'">0</span>', $epcl_theme['counter_text_archives'] ); ?></h1>
            <?php else: ?>
                <h1 class="title ularge white textcenter no-margin"><?php esc_html_e('We found', 'reco'); ?> <span class="count main-color" data-total="<?php echo intval($custom_query->found_posts); ?>">0</span> <?php printf( esc_html_e( _n( 'resource for you...', 'resources for you...', intval($custom_query->found_posts), 'reco' ), intval($custom_query->found_posts) ) ); ?></h1>
            <?php endif; ?>
        <?php endif; ?>
        <div class="clear"></div>
    </div> -->
<?php endif; ?>