<?php get_header(); ?>

<!-- start: #search-results -->
<main id="archives" class="main">

    <?php if( empty($epcl_theme) || $epcl_theme['search_layout'] == 'classic' || !$epcl_theme['search_layout'] ):  ?>
        <?php get_template_part('partials/home-blocks/classic-posts'); ?>
    <?php elseif( $epcl_theme['search_layout'] == 'grid_3_cols' || $epcl_theme['search_layout'] == 'grid_4_cols' ): ?>
        <?php get_template_part('partials/home-blocks/grid-posts'); ?>
    <?php elseif( $epcl_theme['search_layout'] == 'grid_sidebar'  ): ?>
        <?php get_template_part('partials/home-blocks/grid-sidebar'); ?>
    <?php endif; ?>

</main>
<!-- end: #search-results -->
<?php get_footer(); ?>
