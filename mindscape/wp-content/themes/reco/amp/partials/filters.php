<?php
$epcl_theme = epcl_get_theme_options();
$queried_object = get_queried_object();
$current_category = '';
if( !empty($queried_object) ){
	$current_category = $queried_object->term_id;
}
$filter_class = 'hide-on-mobile';
if( !empty($epcl_theme) && isset($epcl_theme['filters_category_mobile']) && $epcl_theme['filters_category_mobile'] !== '0'){
    $filter_class = ''; 
}
?>
<?php if( empty($epcl_theme) || $epcl_theme['filters_search_box'] !== '0' || $epcl_theme['filters_author'] !== '0' || $epcl_theme['filters_category'] !== '0' ): ?>
    <div class="filters">
        <?php if($epcl_theme['filters_search_box'] !== '0'): ?>
            <div class="grid-33 tablet-grid-40">
                <?php get_search_form(); ?>
            </div>
        <?php endif; ?>
        <div class="grid-50 tablet-grid-60 alignright textright <?php echo esc_attr($filter_class); ?>">

            <?php $users = get_users( array('role__in' => array('contributor', 'author', 'editor', 'administrator') ) ); ?>
            <?php if( !empty($users) && $epcl_theme['filters_author'] !== '0' ): ?>
                <select name="author" class="grid-50 hide-on-mobile tablet-grid-50" on="change:AMP.navigateTo(url=event.value)">
                    <option value=""><?php esc_html_e('Select Author', 'reco'); ?></option>
                    <?php foreach($users as $user): ?>
                        <option value="<?php echo get_author_posts_url($user->ID); ?>?amp"><?php echo esc_attr($user->display_name); ?></option>
                    <?php endforeach; ?>
                </select>
            <?php endif; ?>
            
            <?php $all_categories = get_categories( array('parent'  => 0) ); ?>
            <?php if( !empty($all_categories) && $epcl_theme['filters_category'] !== '0' ): ?>
                <select name="tag" class="grid-45 prefix-5 tablet-grid-45 tablet-prefix-5" on="change:AMP.navigateTo(url=event.value)">
                    <option value=""><?php esc_html_e('Select Category', 'reco'); ?></option>
                    <?php foreach($all_categories as $category): ?>
                        <option value="<?php echo get_category_link($category->term_id); ?>?amp" <?php if($category->term_id == $current_category) echo 'selected'; ?>><?php echo esc_attr($category->name); ?></option>
                    <?php endforeach; ?>
                </select>
            <?php endif; ?>

        </div>
        <div class="clear"></div>
    </div>
<?php endif; ?>
