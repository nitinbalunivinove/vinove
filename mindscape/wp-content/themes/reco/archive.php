<?php get_header(); ?>
<!-- start: #archives-->
<main id="archives" class="main">

    <?php if( empty($epcl_theme) || $epcl_theme['archive_layout'] == 'classic' || !$epcl_theme['archive_layout'] ):  ?>
        <?php get_template_part('partials/home-blocks/classic-posts'); ?>
    <?php elseif( $epcl_theme['archive_layout'] == 'grid_3_cols' || $epcl_theme['archive_layout'] == 'grid_4_cols'  ): ?>
        <?php get_template_part('partials/home-blocks/grid-posts'); ?>
    <?php elseif( $epcl_theme['archive_layout'] == 'grid_sidebar'  ): ?>
        <?php get_template_part('partials/home-blocks/grid-sidebar'); ?>
    <?php endif; ?>

</main>
<!-- end: #archives -->
<?php get_footer(); ?>
