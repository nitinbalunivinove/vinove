<?php
$epcl_module = epcl_get_module_options();
if( empty($epcl_module) ) return;
$module_class = '';
if( !empty($epcl_module) ){
	if( $epcl_module['enable_editor_background'] == false ){
		$module_class .= ' no-background';
	}
}
?>
<div class="epcl-text-editor section grid-container module-wrapper <?php echo esc_attr($module_class); ?>">
    <!-- start: .content-wrapper -->
    <div class="content-wrapper">
        <!-- start: .center -->
        <div class="center bg-content section grid-100">
            <div class="text">
                <?php echo do_shortcode($epcl_module['text_editor_content']); ?>
            </div>
        </div>
    </div>
</div>