
        <?php get_template_part('partials/footer'); ?>

        <div class="clear"></div>
    </div>
    <!-- end: #wrapper --> 
    

    <!-- W3TC-include-css -->
    <!-- W3TC-include-js-head -->

    <?php wp_footer(); ?>
    <?php
    $ajax_scripts = epcl_get_option('custom_ajax_scripts');
    ?>
    <?php if ( !empty($ajax_scripts) ): ?>
        <div id="epcl-ajax-scripts" style="display: none;">
            <?php foreach( $ajax_scripts as $item ): ?>
                <?php if( $item !== ''): ?>
                    <div
                        data-src="<?php echo esc_attr( trim($item) ); ?>"
                        data-cache="true"
                        data-timeout="<?php echo absint( epcl_get_option('script_timeout', '1500') ); ?>">
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    </body>
</html>
