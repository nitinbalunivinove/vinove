<?php $epcl_theme = epcl_get_theme_options(); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <?php if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ): ?>
        <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-16x16.png" type="image/x-icon"/>
    <?php endif; ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php get_template_part('partials/svg-icons'); ?>
    <!-- start: #wrapper -->
    <div id="wrapper">
		<?php get_template_part('partials/header'); ?>