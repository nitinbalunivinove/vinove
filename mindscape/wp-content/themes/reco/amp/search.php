
<?php get_template_part('amp/header'); ?>

<?php
$layout = epcl_get_option( 'amp_archives_layout', 'classic-posts' );
?>

<!-- start: #home -->
<main id="home" class="main">

	<?php get_template_part( 'amp/partials/home-blocks/'.$layout ); ?>

</main>
<!-- end: #home -->

<?php get_template_part('amp/footer'); ?>
