<?php 
$epcl_theme = epcl_get_theme_options();

$views = 0;
if( function_exists('get_field') && function_exists('get_fields') ){
    $fields = get_fields();
    $views = get_field('views_counter'); // Fix when views are not created
} 
$post_thumbnail = get_the_post_thumbnail_url($post, 'epcl_page_header');
// Author information
$author_id = get_the_author_meta('ID');
$author_avatar = get_avatar_url( get_the_author_meta('email'), array( 'size' => 90 ));
$optimized_avatar = get_the_author_meta('avatar');
if( $optimized_avatar ){
    $author_avatar = wp_get_attachment_url( $optimized_avatar );
}
$author_name = get_the_author();
?>
<div class="featured-image cover" style="background-image: url('<?php echo esc_url($post_thumbnail); ?>');">
    <?php if( empty($epcl_theme) || $epcl_theme['single_enable_meta_data'] !== '0' ): ?>
        <div class="meta top">
            <?php if( !empty($epcl_theme) && isset($epcl_theme['enable_author_top']) && $epcl_theme['enable_author_top'] == '1' ): ?>
                <a href="<?php echo get_author_posts_url($author_id); ?>" title="<?php echo esc_attr($author_name); ?>" class="author-meta hide-on-mobile">
                    <?php if($author_avatar): ?>
                        <span class="author-image cover" style="background-image: url('<?php echo esc_url($author_avatar); ?>');"></span>
                    <?php endif; ?>
                    <span class="author-name"><?php echo esc_attr($author_name); ?></span>
                </a>
            <?php endif; ?>
            <time datetime="<?php the_time('Y-m-d'); ?>"><svg><use xlink:href="#calendar"></use></svg><?php the_time( get_option('date_format') ); ?></time>
            <a href="<?php the_permalink(); ?>#comments" class="comments tooltip" title="<?php esc_attr_e('Go to comments', 'reco'); ?>">
                <svg><use xlink:href="#comments-2"></use></svg>
                <?php if($epcl_theme['hosted_comments'] == 1 || empty($epcl_theme) ): ?>
                    <span class="comment-count"><?php echo get_comments_number($post->ID); ?></span>
                    <span class="comment-text hide-on-mobile"><?php printf( _n( 'Comment', 'Comments', get_comments_number($post->ID), 'reco'), get_comments_number($post->ID) ); ?></span>
                <?php elseif( $epcl_theme['hosted_comments'] == 3 ): // Facebook commments ?>
                    <span class="fb-comments-count" data-href="<?php the_permalink(); ?>">0</span>
                <?php else: ?>   
                    <span class="disqus-comment-count" data-disqus-url="<?php the_permalink(); ?>" data-disqus-identifier="<?php the_ID(); ?>">0</span>
                <?php endif; ?>
            </a>
            <?php if( isset($epcl_theme['enable_global_views']) && $epcl_theme['enable_global_views'] === '1' ): ?>
                <a href="<?php the_permalink(); ?>" class="download alignright">
                    <i class="fa fa-eye" style="top: -1px;"></i> <?php echo absint( $views ); ?>
                </a>
            <?php endif; ?>
            <?php if( isset($fields['enable_download']) && $fields['enable_download'] == true ): ?>
                <?php if( function_exists('edd_get_download_sales_stats') && isset($fields['edd_download_id']) && $fields['edd_download_id'] ): ?>                  
                    <span class="download" title="<?php esc_attr_e('Downloads', 'reco'); ?>"><svg><use xlink:href="#download"></use></svg><?php echo esc_attr( edd_get_download_sales_stats( $fields['edd_download_id']) ); ?></span>
                <?php else: ?>
                    <span class="download" title="<?php esc_attr_e('Downloads', 'reco'); ?>"><svg><use xlink:href="#download"></use></svg><?php echo esc_attr( $fields['download_counter' ]); ?></span>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
	<div class="info">
        <?php if( get_the_category() ): ?>
            <div class="tags">
                <?php the_category(' '); ?>
            </div>
        <?php endif; ?>
        <h1 class="title ularge white bold hide-on-mobile hide-on-tablet"><?php the_title(); ?></h1>
	</div>
</div>