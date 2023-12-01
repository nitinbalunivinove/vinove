<?php
$epcl_theme = epcl_get_theme_options();
$epcl_module = epcl_get_module_options();

$index = absint( get_query_var('index') );

$column_class = 'grid-33';
$grid_posts_column = 3;
$post_class = $thumb_url = '';

if( !get_post_format() && !has_post_thumbnail() ){
    $post_class .= ' no-thumb';
}
// Loaded by Flexible content ACF
if( !empty($epcl_module) ){
    $column_class = 'grid-33';
    if( !empty($epcl_module['grid_posts_column']) ){
        $grid_posts_column = $epcl_module['grid_posts_column'];
    }
	
	switch ($grid_posts_column) {
		case '1':
			$column_class = 'grid-50';
		break;
		case '2':
			$column_class = 'grid-50';
        break;
        case '4':
			$column_class = 'grid-25';
		break;
		default:
			$column_class = 'grid-33';
		break;
	}
	if( $epcl_module['acf_fc_layout'] == 'grid_sidebar' ){
		$grid_posts_column = 2;
	    $column_class = 'grid-50';
    }
}

if( isset($columns) && $columns > 0 ){
    $grid_posts_column = $columns;
    switch ($grid_posts_column) {
		case '1':
			$column_class = 'grid-50';
		break;
		case '2':
			$column_class = 'grid-50';
        break;
        case '4':
			$column_class = 'grid-25';
		break;
		default:
			$column_class = 'grid-33';
		break;
	}
}


// Columns Posts Page
if( is_home() ){
    if( $epcl_theme['posts_page_layout'] == 'grid_4_cols' ){
        $grid_posts_column = 4;
        $column_class = 'grid-25';
    }
    if( $epcl_theme['posts_page_layout'] == 'grid_sidebar' ){
        $grid_posts_column = 2;
        $column_class = 'grid-50';
    }
}

// Columns archive
if( is_archive() && !is_author() ){
    if( $epcl_theme['archive_layout'] == 'grid_4_cols' ){
        $grid_posts_column = 4;
        $column_class = 'grid-25';
    }
    if( $epcl_theme['archive_layout'] == 'grid_sidebar' ){
        $grid_posts_column = 2;
        $column_class = 'grid-50';
    }
}

// Columns search results
if( is_search() ){
    if( $epcl_theme['search_layout'] == 'grid_4_cols' ){
        $grid_posts_column = 4;
        $column_class = 'grid-25';
    }
    if( $epcl_theme['search_layout'] == 'grid_sidebar' ){
        $grid_posts_column = 2;
        $column_class = 'grid-50';
    }
}

$thumb_url = get_the_post_thumbnail_url(get_the_ID());
$views = 0;
if( function_exists('get_fields') ){
    $fields = get_fields();
    $views = get_field('views_counter');
    if( !empty( $fields['optimized_image'] ) ){
        $thumb_url = $fields['optimized_image']['url'];
    }
}
if( !empty($epcl_theme) && $epcl_theme['grid_display_author'] == '0'){
	$post_class .= ' no-author';
}
set_query_var( 'epcl_post_style', 'grid' );
if( isset($_GET['ads']) ){
    $epcl_theme['ads_enabled_grid_loop'] = '1';
}
// Ads integration
if( !empty($epcl_theme) && function_exists( 'epcl_render_global_ads' ) && $epcl_theme['ads_enabled_grid_loop'] == '1' && $index === ( absint($epcl_theme['ads_position_grid_loop'])  - 1  ) ){
    if( $epcl_theme['ads_mobile_grid_loop'] == '0' && wp_is_mobile() ){

    }else{
        echo '<article class="'.$column_class.' tablet-grid-50 np-mobile">';
            epcl_render_global_ads('grid_loop');
        echo '<div class="border"></div></article>';
        $index++;
    }
}
?>
<article <?php post_class('default index-'.$index.' '.$column_class.$post_class.' tablet-grid-50 np-mobile"'); ?>>

	<header>
        <?php if( !$thumb_url  && !get_post_format() && get_the_category() ): ?>
            <div class="tags no-thumb">
                <?php //the_category(' '); ?>
            </div>
            <div class="clear"></div>
        <?php endif; ?>
        <?php epcl_display_post_format( get_post_format(), get_the_ID() );  ?>
        <?php if( !empty($epcl_theme) && $epcl_theme['enable_meta_data'] ): ?>
            <div class="meta">
                <time datetime="<?php the_time('Y-m-d'); ?>"><svg><use xlink:href="#calendar"></use></svg><?php the_time( get_option('date_format') ); ?></time>
                <?php if( isset($fields['enable_download']) && $fields['enable_download'] == true ): ?>
                    <?php if( function_exists('edd_get_download_sales_stats') && isset($fields['edd_download_id']) && $fields['edd_download_id'] ): ?>                  
                        <span class="download alignright" title="<?php esc_attr_e('Downloads', 'reco'); ?>"><svg><use xlink:href="#download"></use></svg><?php echo esc_attr( edd_get_download_sales_stats( $fields['edd_download_id']) ); ?></span>
                    <?php else: ?>
                        <span class="download alignright" title="<?php esc_attr_e('Downloads', 'reco'); ?>"><svg><use xlink:href="#download"></use></svg><?php echo esc_attr( $fields['download_counter' ]); ?></span>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if( isset($epcl_theme['enable_global_views']) && $epcl_theme['enable_global_views'] === '1' ): ?>
                    <a href="<?php the_permalink(); ?>" class="download alignright">
                        <i class="fa fa-eye" style="top: -1px;"></i> <?php echo absint( $views ); ?>
                    </a>
                <?php endif; ?>
                <a href="<?php the_permalink(); ?>#comments" class="comments alignright">
                    <svg><use xlink:href="#comments-2"></use></svg>
                    <?php if($epcl_theme['hosted_comments'] == 1 || empty($epcl_theme) ): ?>
                        <span class="comment-count"><?php echo get_comments_number($post->ID); ?></span>
                    <?php elseif( $epcl_theme['hosted_comments'] == 3 ): // Facebook commments ?>
                        <span class="fb-comments-count" data-href="<?php the_permalink(); ?>">0</span>
                    <?php else: // Disqus Comments ?>
                        <span class="disqus-comment-count" data-disqus-url="<?php the_permalink(); ?>" data-disqus-identifier="<?php the_ID(); ?>">0</span>
                    <?php endif; ?>
                </a>
                <div class="clear"></div>
            </div>
        <?php endif; ?>
        <?php if( is_archive() ): ?>
            <h2 class="title gradient-effect"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php else: ?>
            <h1 class="title gradient-effect"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <?php endif; ?>        
	</header>
    
    <div class="post-excerpt">
        <?php if( empty($epcl_theme) || $epcl_theme['grid_display_excerpt'] !== '0'): ?>
            <?php the_excerpt(); ?>
        <?php endif; ?>
        <div class="clear"></div>
    </div>    

	<?php
	$author_id = get_the_author_meta('ID');
    $author_avatar = get_avatar_url( get_the_author_meta('email'), array( 'size' => 90 ));
    $optimized_avatar = get_the_author_meta('avatar');
    if( $optimized_avatar ){
        $author_avatar = wp_get_attachment_url( $optimized_avatar );
    }
    $author_name = get_the_author();
    $footer_class = '';
    if( !empty($epcl_theme) && $epcl_theme['author_counter'] == '0'){
        $footer_class .= ' no-counter';
    }
	?>
    <?php if( empty($epcl_theme) || $epcl_theme['grid_display_author'] !== '0'): ?>
        <footer class="author-meta <?php echo esc_attr($footer_class); ?>">
            <a href="<?php echo get_author_posts_url($author_id); ?>" title="<?php echo esc_attr($author_name); ?>">
                <?php if($author_avatar): ?>
                    <span class="author-image cover" style="background-image: url('<?php echo esc_url($author_avatar); ?>');"></span>
                <?php endif; ?>
                <span class="author-name"><?php echo esc_attr($author_name); ?></span>
                <?php if( $epcl_theme['author_counter'] !== '0' || empty($epcl_theme) ): ?>
                    <?php if( epcl_get_option('grid_counter_text') !== '' ): ?>
                        <span class="author-count"><?php echo esc_html( str_replace('%s', count_user_posts($author_id) , epcl_get_option('grid_counter_text') ) ); ?></span>
                    <?php else: ?>
                        <span class="author-count"><?php echo count_user_posts($author_id); ?> <?php esc_html_e('Resources', 'reco'); ?></span>
                    <?php endif; ?>                    
                <?php endif; ?>
            </a>
            <div class="clear"></div>
        </footer>
    <?php endif; ?>

	<div class="border"></div>
</article>

<?php $index++; set_query_var('index', $index); ?>

<?php if($index % $grid_posts_column == 0): ?>
	<div class="clear hide-on-tablet"></div>
<?php endif; ?>
