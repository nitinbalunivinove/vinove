<?php $epcl_theme = epcl_get_theme_options(); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
<?php
/*	
if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ): ?>
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-16x16.png" type="image/x-icon"/>
<?php endif; 
*/
?>
<link rel="icon" href="https://www.vinove.com/images/favicon.ico" type="image/x-icon">
<?php wp_head(); ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<style type="text/css">
@media(max-width:479px){
#offter-top{padding:7px 30px !important;}
#offter-top .holiday{margin:8px 10px 0 !important;}
}  
</style>	
	
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NPPMGZH');</script>
<!-- End Google Tag Manager -->	
	
</head>
<body <?php body_class(); ?>>
<?php global $wsloginlink, $wsreglink; ?>
<header class="header">
  <div class="grid-container module-wrapper">
    <div class="heder-inner">
      <div class="logo">
          <a href="https://www.vinove.com/"><img src="https://www.vinove.com/images/logo.webp" alt="Vinove"></a>
      </div>
      <div class="push-left">
          <button id="menu-toggler" data-class="menu-active" class="hamburger">
            <span class="hamburger-line hamburger-line-top"></span>
            <span class="hamburger-line hamburger-line-middle"></span>
            <span class="hamburger-line hamburger-line-bottom"></span>
          </button>
          <div class="nav">
              <nav>
                <ul id="primary-menu" class="menu nav-menu">
                  <li class="menu-item"><a href="https://www.vinove.com/about-us">About Us</a></li>
                  <li class="menu-item"><a href="https://www.vinove.com/our-products-services">Our Products</a></li>
                  <li class="menu-item"><a href="https://www.vinove.com/careers">Careers</a></li>
                  <li class="menu-item"><a href="https://www.vinove.com/mindscape">Blog</a></li>
                  <li class="menu-item"><a href="https://www.vinove.com/contact-us">Contact Us</a></li>
                </ul>
              </nav>
          </div>
      </div>
    </div>
  </div>
</header>



<?php if(is_home()) : ?>
<div class="home-conet-row">
  <div class="grid-container module-wrapper">
    <div class="hmrow">
      <h1>Welcome to the Vinove Blog</h1>
      <p>Insights, tips, and features to help your team work together beautifully and get more done.Insights, tips, and features to help your team work together beautifully and get more done.</p>
    </div>
  </div>
</div>
<?php endif; ?>