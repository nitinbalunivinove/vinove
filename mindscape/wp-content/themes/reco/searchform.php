<?php
$placeholder = esc_attr__('Search in resources...', 'reco');
if( function_exists('epcl_get_option') && epcl_get_option('searchform_text') != '' ){
    $placeholder = epcl_get_option('searchform_text');
}
?>
<form action="<?php echo home_url('/'); ?>" method="get" class="search-form">
	<input type="text" name="s" id="s" value="<?php echo get_search_query(); ?>" class="search-field" placeholder="<?php echo esc_attr($placeholder); ?>" aria-label="<?php echo esc_attr($placeholder); ?>" required>
	<button type="submit" class="submit" aria-label="<?php esc_attr_e('Submit', 'reco'); ?>"><i class="fa fa-search"></i></button>
</form>
