<?php get_header(); ?>




<div class="home-conet-row">
    <div class="grid-container module-wrapper">
        <div class="hmrow">
             <h1>Welcome to the Workstatus Blog</h1>
    <p>Insights, tips, and features to help your team work together beautifully and get more done.Insights, tips, and features to help your team work together beautifully and get more done.</p>
        </div>
</div>
    </div>


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