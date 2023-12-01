<?php
$epcl_theme = epcl_get_theme_options();
$epcl_module = epcl_get_module_options();

$index = $wp_query->current_post+1;
$post_class = $optimized_image = '';
if( !get_post_format() && !has_post_thumbnail() ){
    if( function_exists('get_field') ){
        $optimized_image = get_field('optimized_image');
    }
    if( !$optimized_image ){
        $post_class .= ' no-thumb';
    }    
}

$author_id = get_the_author_meta('ID');
$author_avatar = get_avatar_url( get_the_author_meta('email'), array( 'size' => 90 ));
$optimized_avatar = get_the_author_meta('avatar');
if( $optimized_avatar ){
    $author_avatar = wp_get_attachment_url( $optimized_avatar );
}
$author_name = get_the_author();
$views = 0;
if( function_exists('get_fields') ){
    $fields = get_fields();
    $views = get_field('views_counter');
}
set_query_var( 'epcl_post_style', 'classic' );
?>
<article <?php post_class('default index-'.$index.$post_class.' np-mobile"'); ?>>

    <div class="top">
        <?php epcl_display_post_format( get_post_format(), get_the_ID() );  ?>
    </div>
    
    <!-- start: .bottom -->
    <div class="bottom">

    	<header>        
            <?php if( is_archive() || is_search() ): ?>
                <h2 class="title gradient-effect"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php else: ?>
                <h1 class="title gradient-effect"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <?php endif; ?>   
            <?php if( empty($epcl_theme) || $epcl_theme['classic_enable_meta_data'] !== '0' || $epcl_theme['classic_display_author'] !== '0' ): ?>
                <div class="meta">
                    <?php if( empty($epcl_theme) || $epcl_theme['classic_display_author'] !== '0' ): ?>
                        <a href="<?php echo get_author_posts_url($author_id); ?>" title="<?php echo esc_attr($author_name); ?>" class="author-meta">
                            <?php if($author_avatar): ?>
                                <span class="author-image cover" style="background-image: url('<?php echo esc_url($author_avatar); ?>');"></span>
                            <?php endif; ?>
                            <span class="author-name"><?php echo esc_attr($author_name); ?></span>
                        </a>
                    <?php endif; ?>
                    <?php if( empty($epcl_theme) || $epcl_theme['classic_enable_meta_data'] !== '0' ): ?>
                        <time datetime="<?php the_time('Y-m-d'); ?>"><svg><use xlink:href="#calendar"></use></svg><?php the_time( get_option('date_format') ); ?></time>

                        <a href="<?php the_permalink(); ?>#comments" class="comments alignright">
                            <svg><use xlink:href="#comments-2"></use></svg>
                            <?php if($epcl_theme['hosted_comments'] == 1 || empty($epcl_theme) ): ?>
                                <span class="comment-count"><?php echo get_comments_number($post->ID); ?></span>
                                <span class="comment-word hide-on-mobile"><?php printf( _n( 'Comment', 'Comments', get_comments_number(), 'reco'), get_comments_number() ); ?></span>
                            <?php elseif( $epcl_theme['hosted_comments'] == 3 ): // Facebook commments ?>
                                <span class="fb-comments-count" data-href="<?php the_permalink(); ?>">0</span>
                            <?php else: // Disqus Comments ?>
                                <span class="disqus-comment-count" data-disqus-url="<?php the_permalink(); ?>" data-disqus-identifier="<?php the_ID(); ?>">0</span>
                            <?php endif; ?>
                        </a>

                        <?php if( epcl_get_option('enable_global_views') === '1' ): ?>
                            <a href="<?php the_permalink(); ?>" class="download alignright">
                                <i class="fa fa-eye" style="top: -1px;"></i> <?php echo absint( $views ); ?>
                            </a>
                        <?php endif; ?>
                        
                        <?php if( isset($fields['enable_download']) && $fields['enable_download'] == true ): ?>
                            <?php if( function_exists('edd_get_download_sales_stats') && isset($fields['edd_download_id']) && $fields['edd_download_id'] ): ?>                  
                                <span class="download alignright" title="<?php esc_attr_e('Downloads', 'reco'); ?>"><svg><use xlink:href="#download"></use></svg><?php echo esc_attr( edd_get_download_sales_stats( $fields['edd_download_id']) ); ?></span>
                            <?php else: ?>
                                <span class="download alignright" title="<?php esc_attr_e('Downloads', 'reco'); ?>"><svg><use xlink:href="#download"></use></svg><?php echo esc_attr( $fields['download_counter' ]); ?></span>
                            <?php endif; ?>
                        <?php endif; ?>

                    <?php endif; ?>
                    <div class="clear"></div>
                </div>
            <?php endif; ?>    
            
        </header>

        <div class="post-excerpt grid-container grid-small np-mobile">
            <?php if( empty($epcl_theme) || $epcl_theme['classic_display_excerpt'] !== '0' ): ?>
                <?php the_excerpt(); ?>
            <?php endif; ?>
            <div class="clear"></div>
            <a href="<?php the_permalink(); ?>" class="button outline"><?php esc_html_e('Continue reading', 'reco'); ?></a>
        </div>

    </div>
    <!-- end: .bottom -->

	<div class="border"></div>
</article>

<div class="separator hide-on-tablet hide-on-mobile"></div>
<?php $index++; set_query_var('index', $index); ?>