<?php $epcl_theme = epcl_get_theme_options(); ?>
<?php if($epcl_theme['enable_author'] == 1 || empty($epcl_theme) || is_archive() ): ?>
	<?php
	$author_id = get_the_author_meta('ID');
    $author_avatar = get_avatar_url( get_the_author_meta('email'), array( 'size' => 120 ));
    $optimized_avatar = get_the_author_meta('avatar');
    if( $optimized_avatar ){
        $author_avatar = wp_get_attachment_url( $optimized_avatar );
    }
	$author_name = get_the_author();
	$author_url = get_author_posts_url($author_id);
	$class = '';
	if($author_avatar) $class .= ' with-avatar'; else $class .= ' no-avatar';
	if( is_single() ) $class .= ' section bordered';
	?>
	<!-- start: .author -->
	<section id="author" class="author <?php echo esc_attr($class); ?>">
		<?php if($author_avatar): ?>
			<div class="avatar">
					<a href="<?php echo esc_url( $author_url ); ?>" class="hover-effect thumb"><span class="fullimage cover" style="background-image: url('<?php echo esc_url( $author_avatar ); ?>');"></span></a>
			</div>
		<?php endif; ?>
		<div class="info">
            <?php if( is_archive() ): ?>
                <h1 class="title author-name border-effect"><?php echo esc_attr( $author_name ); ?></h1>
            <?php else: ?>
                <h4 class="title author-name border-effect"><a href="<?php echo esc_url($author_url); ?>"><?php echo esc_attr( $author_name ); ?></a></h4>
            <?php endif; ?>			
			<p><?php the_author_meta('description'); ?></p>
			<div class="social">
				<?php
				$facebook = get_the_author_meta('facebook');
				$twitter = get_the_author_meta('twitter');
				$googleplus = get_the_author_meta('googleplus');
				$website = get_the_author_meta('user_url');
				?>
				<?php if($website): ?>
					<a href="<?php echo esc_url($website); ?>" class="website" title="<?php esc_attr_e('Website', 'reco'); ?>: <?php echo esc_url($website); ?>" target="_blank" rel="nofollow noopener"><i class="fa fa-globe"></i></a>
				<?php endif; ?>
				<?php if($twitter): ?>
					<a href="<?php echo esc_url($twitter); ?>" class="twitter" title="<?php esc_attr_e('Follow me on Twitter', 'reco'); ?>" target="_blank" rel="nofollow noopener"><i class="fa fa-twitter"></i></a>
				<?php endif; ?>
				<?php if($facebook): ?>
					<a href="<?php echo esc_url($facebook); ?>" class="facebook" title="<?php esc_attr_e('Follow me on Facebook', 'reco'); ?>" target="_blank" rel="nofollow noopener"><i class="fa fa-facebook"></i></a>
				<?php endif; ?>
			</div>
		</div>
		<div class="clear"></div>
	</section>
	<!-- end: .author -->
	<div class="clear"></div>
<?php endif; ?>
