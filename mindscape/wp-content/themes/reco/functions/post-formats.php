<?php
function epcl_display_post_format($format = '', $post_id){

	if( !function_exists('acf_add_local_field_group') ) // If not custom metaboxes, always uses format image
		$format = 'image';

	$prefix = EPCL_THEMEPREFIX.'_';
	switch($format){

        default: // Standard and Image post format
		case 'image':
			return epcl_get_image_format($post_id);
        break;
        
		case 'video':
			$video_type = get_field('video_type', $post_id);
            $video_url = get_field('video_url', $post_id);
            
			if($video_type)
				return epcl_get_video_format($post_id, $video_type, $video_url, 250);
        break;
        
		case 'gallery':
			$gallery_images = get_field('gallery', $post_id);
            return epcl_get_gallery_format($gallery_images, $post_id);
        break;
        
		case 'audio':
			$audio_url = get_field('soundcloud_url', $post_id);
			if( $audio_url )
				return epcl_get_audio_format( $post_id, $audio_url );
        break;
        
		case 'link':
            $link_url = get_field('link_url', $post_id);
			if($link_url)
				return epcl_get_link_format($link_url);
        break;
        
	}
}

function epcl_get_image_format($post_id){
    $epcl_theme = epcl_get_theme_options();
    $index = get_query_var('index');
   
    $post_style = get_query_var('epcl_post_style');
    $class =  $image_alt = '';
    if( !is_single() ){
        $optimized_image = '';
        $size = 'epcl_single_content';
        if( $post_style == 'classic' ){
            $size = 'epcl_classic_post';
        }
        $thumb_url = get_the_post_thumbnail_url($post_id, $size);
        if( function_exists('get_field') && !wp_is_mobile() ){
            $optimized_image = get_field('optimized_image');
        }           
        if( !empty($optimized_image) ){
	        $image_alt = $optimized_image['alt'];
            $thumb_url = $optimized_image['url'];
        }
        if( !$thumb_url ){
            $class = 'hidden';
        }
    }else{
        $single_size = 'epcl_single_standard';
        if( function_exists('get_field') && get_field('enable_sidebar') === false ){
            $single_size = 'epcl_page_header';
        }
        $image_id = get_post_thumbnail_id( get_the_ID() );
        $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true);
        // if( wp_is_mobile() ){
        //     $single_size = 'epcl_single_related';
        // }
    }
    if( !$image_alt ){
        $image_alt = get_the_title();
    }
    if( $index == 0){
        $epcl_theme['enable_lazyload'] = false;
    }

?>
	<div class="post-format-image post-format-wrapper <?php echo esc_attr($class); ?>">
        <?php if( is_single() ): // Single Post ?>
            <?php if( has_post_thumbnail() ): ?>
                
                <div class="featured-image cover" role="img" aria-label="<?php echo esc_attr($image_alt); ?>">
                    <?php the_post_thumbnail( $single_size, array('data-lazy' => 'false') ); ?>
                        <div class="tags ab absolute">
                            <?php the_category(' '); ?>
                        </div>
                </div>
            <?php endif; ?>
		<?php else: // Loops ?>
			<div class="featured-image">
                <?php if( $thumb_url ): ?>
                    <a href="<?php the_permalink(); ?>" class="thumb hover-effect">
                        <?php if( epcl_is_amp() ): ?>
                            <amp-img class="cover" layout="fill" src="<?php echo esc_url($thumb_url); ?>" alt="<?php echo esc_attr($image_alt); ?>"></amp-img>
                        <?php else: ?>
                            <?php if( !empty($epcl_theme) && $epcl_theme['enable_lazyload'] == '1' && false ): ?>
                                <span class="fullimage cover lazy" role="img" aria-label="<?php echo esc_attr($image_alt); ?>" data-src="<?php echo esc_url($thumb_url); ?>" ></span>
                            <?php else: ?>
                                <span class="fullimage cover" role="img" aria-label="<?php echo esc_attr($image_alt); ?>" style="background-image: url(<?php echo esc_url($thumb_url); ?>);"></span>
                            <?php endif; ?>
                        <?php endif; ?>
                    </a>
                <?php endif; ?>
					<div class="tags ab absolute">
						<?php the_category(' '); ?>
					</div>
			</div>
		<?php endif; ?>
	</div>
<?php
}

function epcl_get_video_format($post_id, $type = 'youtube', $url, $height = 250){
    $epcl_theme = epcl_get_theme_options();

	$width = '100%';
    $video_id = $video_url = '';
    $show_featured_image = get_field('show_featured_image', $post_id);

    if( !is_single() && $show_featured_image === true ){
        return epcl_get_image_format($post_id);
    }

	if ($type == 'youtube') {
        preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $matches);
        if( !$url ) return;
		$video_url ='https://www.youtube.com/embed/'.$matches[0].'?rel=0&showinfo=0';
	} elseif ($type == 'vimeo') {
        $result = preg_match('/(\d+)/', $url, $matches);
        if( !$url ) return;
		if($result){
			$video_id = $matches[0];
		}else{
			$video_id = $url;
		}
		$video_url = 'https://player.vimeo.com/video/'.$video_id;
    } elseif ($type == 'custom') {
        $custom_embed = get_field('custom_embed', $post_id);
        if( !$custom_embed ) return;
        preg_match('/src="([^"]+)"/', $custom_embed, $match);
        $video_url = $match[1];
    }

?>
	<div class="post-format-video post-format-wrapper">
        <?php if( epcl_is_amp() ): ?>
            <amp-iframe layout="responsive" width="480" height="350" sandbox="allow-scripts allow-same-origin allow-popups" title="<?php the_title(); ?>" src="<?php echo esc_url($video_url); ?>" allowfullscreen>
                <amp-img layout="fill" src="<?php echo EPCL_THEMEPATH; ?>/assets/images/transparent.gif" placeholder></amp-img>
            </amp-iframe>
        <?php else: ?>   

            <?php if( isset($epcl_theme['enable_lazyload_embed']) && $epcl_theme['enable_lazyload_embed'] === '1' ): ?>
                <iframe title="<?php the_title(); ?>" data-lazy="true" data-src="<?php echo esc_url($video_url); ?>" allowfullscreen height="<?php echo esc_attr($height); ?>" style="width: <?php echo esc_attr($width); ?>"></iframe>
            <?php else: ?>
                <iframe title="<?php the_title(); ?>" src="<?php echo esc_url($video_url); ?>" allowfullscreen height="<?php echo esc_attr($height); ?>" style="width: <?php echo esc_attr($width); ?>"></iframe>
            <?php endif; ?>

        <?php endif; ?>
		
			<div class="tags ab absolute">
				<?php the_category(' '); ?>
			</div>
	</div>
<?php
}

function epcl_get_gallery_format($gallery_images, $post_id){
    $epcl_theme = epcl_get_theme_options();
    $post_style = get_query_var('epcl_post_style');
    $class =  $image_alt = '';
?>
    <?php if( empty($gallery_images) ): ?>
        <?php epcl_get_image_format($post_id); ?>
    <?php else: ?>
        <div class="post-format-gallery post-format-wrapper">
            <?php if( get_the_category() ): ?>
                <div class="tags absolute">
                    <?php the_category(' '); ?>
                </div>
            <?php endif; ?>
            <?php if( epcl_is_amp() ): ?>
                <div class="epcl-carousel-container" style="height:350px;">
                    <amp-carousel width="450" height="350" layout="fill" type="slides">
                        <?php foreach($gallery_images as $image): ?>
                            <amp-img class="cover" src="<?php echo esc_url( $image['sizes']['epcl_single_standard'] ); ?>" layout="fill" alt="<?php echo esc_attr( $image['alt'] ); ?>"></amp-img>
                        <?php endforeach; ?>
                    </amp-carousel>
                </div>
            <?php else: ?>
                <div class="slick-slider" data-rtl="<?php echo is_rtl(); ?>">
                    <?php foreach($gallery_images as $image): ?>
                        <div class="item thumb">
                            <?php if( !empty($epcl_theme) && $epcl_theme['enable_lazyload'] == '1' ): ?>
                                <span class="fullimage cover lazy" data-src="<?php echo esc_url( $image['sizes']['epcl_single_content'] ); ?>"></span>
                            <?php else: ?>
                                <span class="fullimage cover" style="background-image: url(<?php echo esc_url( $image['sizes']['epcl_single_content'] ); ?>);"></span>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>     
            <?php endif; ?>       
        </div>
    <?php endif; ?>
<?php
}
/* To do: self hosted audio */

function epcl_get_audio_format($post_id, $url){
    $show_featured_image = get_field('show_featured_image', $post_id);
    
    if( !is_single() && $show_featured_image === true ){
        return epcl_get_image_format($post_id);
    }

	$width = '100%';
	$embed_code = wp_oembed_get( $url );
	preg_match('/src="([^"]+)"/', $embed_code, $match);
	$url = $match[1];
	$url = str_replace('&', '&amp;', $url);
?>
	<div class="post-format-audio post-format-wrapper">
        <iframe src="<?php echo esc_url($url); ?>" allowFullScreen height="250" style="width: <?php echo esc_attr($width); ?>"></iframe>
	</div>
<?php
}

function epcl_get_link_format($link_url){
?>
	<div class="post-format-link post-format-wrapper">
        <div class="featured-image">
            <a href="<?php echo esc_url($link_url);?>" class="thumb hover-effect" target="_blank">
                <span class="fullimage cover" style="background-image: url(<?php the_post_thumbnail_url('epcl_classic_post'); ?>);"></span>
            </a>
        </div>
	</div>
<?php
}