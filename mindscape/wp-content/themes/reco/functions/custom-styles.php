<?php

/* Custom styles generated from theme options panel */

if( function_exists('epcl_generate_custom_styles') ) return;

function epcl_generate_custom_styles(){
    $epcl_theme = epcl_get_theme_options();

    $css = '';

    if( empty($epcl_theme) ) return;

    $red = '#FF3152';
    $yellow = '#FFD012';
    $text_color = '#494949';
    $border_color = '#e5e5e5';
    $black = '#222222';
    $white = '#ffffff';

	/* @group General Settings */

	if( $epcl_theme['background_type'] == 1 && $epcl_theme['bg_body_pattern']['url'] )
		$css .= 'body{ background: url('.$epcl_theme['bg_body_pattern']['url'].') repeat; }';

	if( $epcl_theme['background_type'] == 2  && $epcl_theme['bg_body_color'] != '')
		$css .= 'body{ background: '.$epcl_theme['bg_body_color'].'; }';

	if( $epcl_theme['background_type'] == 3 && $epcl_theme['bg_body_full']['url'] )
        $css = 'body{ background: #000; }body:before{ background: url('.$epcl_theme['bg_body_full']['url'].') no-repeat top center; }';
        
    if( $epcl_theme['background_type'] == 4 && $epcl_theme['bg_body_gradient'] )
		$css = 'body{
            -webkit-background: linear-gradient(90deg, '.$epcl_theme['bg_body_gradient']['from'].' 30%, '.$epcl_theme['bg_body_gradient']['to'].' 100%);
            background: linear-gradient(90deg, '.$epcl_theme['bg_body_gradient']['from'].' 30%, '.$epcl_theme['bg_body_gradient']['to'].' 100%);
        }';

	// Logo with icons
	if( $epcl_theme['logo_type'] == 2){

		$css .= '#header .logo a, #header a.sticky-logo{ 
            color: '.$epcl_theme['logo_text_color'].'; }';

		$css .= '#header .logo a i.fa, #footer .logo a i.fa{ 
            color: '.$epcl_theme['logo_icon_color'].'; }';

    }
    
    // Primary Color
	if( $epcl_theme['primary_color'] != '#FF3152' ){

        $color = new Color( $epcl_theme['primary_color'] );
        
		$css .= '.author-meta a, .pagination div.nav a, div.text a:not([class]), button:hover, .button.outline, .pagination div.nav a, section.widget_epcl_tweets p a, .widget_archive ul li span, .widget_categories ul li span, #single #comments nav.pagination a:hover, div.epcl-download a, a:hover, section.widget_epcl_tweets p a, input[type=submit]:hover, div.text .wp-block-categories li span, div.text .wp-block-categories li a:hover, div.text .wp-block-archives li span, div.text .wp-block-archives li a:hover, div.text .wp-block-archives li a:hover, div.text .wp-block-categories li a:hover, div.text .wp-block-latest-posts li a:hover, .woocommerce button.button:hover, .woocommerce.widget_product_categories ul li span, .woocommerce.widget_layered_nav ul li span, .woocommerce .pagination div.nav a, .epcl-button:hover, .woocommerce .product_meta>span a, .woocommerce a.button:hover, .woocommerce .woocommerce-MyAccount-navigation ul li.is-active a, .woocommerce .woocommerce-MyAccount-navigation ul li a:hover, .woocommerce table.shop_table td a:hover, .woocommerce .woocommerce-breadcrumb a:hover, div.text .epcl-button:hover{ 
            color: '.$epcl_theme['primary_color'].'; }';
        
        $css .= '#single .share-buttons .permalink .copy svg{ 
            fill: '.$epcl_theme['primary_color'].'; }';

		$css .= 'div.filters, #footer .widgets, .pagination div.nav>span, .pagination div.nav a:hover, .widget_search, #author, button, input[type=submit]:hover, .button.outline:hover, .widget .nice-select:hover, .nice-select.open, .widget .nice-select:focus, div.epcl-download a:hover, input[type=submit], .button.outline:hover, #single #comments nav.pagination a, #single section.related article .button, #footer .subscribe form .submit, .slick-arrow, .slick-arrow:hover, .widget .nice-select, div.text blockquote:before, #search-lightbox .search-wrapper, .woocommerce.widget_price_filter .ui-slider .ui-slider-range, .woocommerce.widget_price_filter .ui-slider .ui-slider-handle, .woocommerce button.button, .woocommerce .pagination div.nav a:hover, .epcl-button, .woocommerce a.button{ 
            background-color: '.$epcl_theme['primary_color'].'; }';

        $css .= 'select.custom-select, #single #comments .comment .outline.comment-reply-link, button:hover, .button.outline, .pagination div.nav a, input[type=submit], .button, .widget .nice-select, .widget .nice-select:hover, input[type=submit]:hover, .pagination div.nav a:hover, div.epcl-download a, div.epcl-download a:hover, #single #comments nav.pagination a:hover, .widget .nice-select:focus, .woocommerce button.button:hover, .woocommerce .pagination div.nav a, .woocommerce .pagination div.nav a:hover, .epcl-button:hover, .woocommerce a.button:hover{ 
            border-color: '.$epcl_theme['primary_color'].'; }';

	}

    // Secondary Color
	if( $epcl_theme['secondary_color'] != '#FFD012' ){

        $css .= 'a:hover, .author-meta a:hover, div.text a:hover, div.text a:not([class]):hover, #header nav ul.menu li.current-menu-item>a, #header nav ul.menu li a:hover, #header nav ul.menu li.current-menu-ancestor>a, #header nav ul.menu li.current-menu-item>a, #header nav ul.menu li a:hover, #search-lightbox .title span{ 
            color: '.$epcl_theme['secondary_color'].'; }';

        $css .= '.widget_tag_cloud a, .widget_tag_cloud span, div.tags a, div.tags span, #page-404 div.not-found, .button:hover, .pace .pace-progress, .title.bordered:after, div.text .wp-block-quote:before, div.text .wp-block-pullquote:after, div.text .wp-block-pullquote:before{ 
            background-color: '.$epcl_theme['secondary_color'].'; }';

        $css .= '#single #comments .comment .bordered.comment-author:after, .wpcf7 label.bordered:after{ 
            border-color: '.$epcl_theme['secondary_color'].'; }';
        
        $css .= '.pace .pace-activity{
            border-top-color: '.$epcl_theme['secondary_color'].'; border-left-color: '.$epcl_theme['secondary_color'].'; }';

	}

    // Third Color
	if( $epcl_theme['third_color'] != '#111111' ){

        $color = new Color( '#111111' );

        $css .= 'a{ 
            color: '.$epcl_theme['third_color'].'; }';

        $css .= '#header.is-sticky div.menu-wrapper, .button.dark, div.tags a:hover, .widget_tag_cloud a:hover{ 
            background-color: '.$epcl_theme['third_color'].'; }';

        $css .= 'h1, h2, h3, h4, h5, h6{ 
            color: '.$epcl_theme['third_color'].'; }';

    }
    
    // Text Color
	if( $epcl_theme['text_color'] != '#494949' ){

        $color = new Color( $epcl_theme['text_color'] );

        $css .= 'body, div.text, div.text .wp-block-archives li a, div.text .wp-block-categories li a, div.text .wp-block-latest-posts li a, .woocommerce #reviews #comments ol.commentlist li .comment-text p.meta, .woocommerce .woocommerce-breadcrumb, .woocommerce .woocommerce-breadcrumb a{ 
            color: '.$epcl_theme['text_color'].'; }';

        $css .= 'div.meta, div.meta a.comments, .author-meta a .author-count, .widget_epcl_featured_category .item time, .widget_epcl_posts_thumbs .item time, .widget_epcl_related_articles .item time, .widget_recent_entries .post-date, section.widget_epcl_tweets p small{ 
            color: #'.$color->lighten('25').'; }';

        $css .= 'div.meta a.comments:hover{ 
            color: #'.$color->darken('20').'; }';

	}

    /* @end */
    
    /* @group Header Colors */

    if( $epcl_theme['header_bg_color'] != 'transparent' ){
        $css .= '#header{ 
            background-color: '.$epcl_theme['header_bg_color'].'; }';
    }

    if( $epcl_theme['header_sticky_bg_color'] != '#111111' ){

        $css .= '#header.is-sticky div.menu-wrapper{ 
            background-color: '.$epcl_theme['header_sticky_bg_color'].'; }';
    }

    // Header menu links
    if( $epcl_theme['header_menu_link_color']['regular'] != '#ffffff' ){

        $css .= '#header nav ul.menu > li > a, #header nav ul.menu li.menu-item-has-children:after, .epcl-breadcrumbs, .epcl-breadcrumbs a{ 
            color: '.$epcl_theme['header_menu_link_color']['regular'].'; }';
    }

    if( $epcl_theme['header_menu_link_color']['hover'] != $yellow ){

        $css .= '#header nav ul.menu > li > a:hover, .epcl-breadcrumbs a:hover{ 
            color: '.$epcl_theme['header_menu_link_color']['hover'].'; }';
    }

    if( $epcl_theme['header_menu_link_color']['active'] != $yellow ){

        $css .= '#header nav ul.menu li.current-menu-ancestor>a, #header nav ul.menu li.current-menu-item>a{ 
            color: '.$epcl_theme['header_menu_link_color']['active'].'; }';
    }

    // Header submenu links
    if( $epcl_theme['header_submenu_link_color']['regular'] != $text_color ){

        $css .= '#header nav ul.sub-menu li a{ 
            color: '.$epcl_theme['header_submenu_link_color']['regular'].'; }';
    }

    if( $epcl_theme['header_submenu_link_color']['hover'] != $text_color ){

        $css .= '#header nav ul.sub-menu li a:hover{ 
            color: '.$epcl_theme['header_submenu_link_color']['hover'].'; }';
    }

    if( $epcl_theme['header_submenu_link_color']['active'] != $yellow ){
        $css .= '#header nav ul.sub-menu li.current-menu-item a{ 
            color: '.$epcl_theme['header_submenu_link_color']['active'].'; }';
    }
    
    if( $epcl_theme['header_submenu_bg_color'] != '#ffffff' ){
        $css .= '#header nav ul.sub-menu{ 
            background: '.$epcl_theme['header_submenu_bg_color'].' !important; }';
        $css .= '@media screen and (max-width: 980px){ #header nav { 
            background: '.$epcl_theme['header_submenu_bg_color'].' !important; } }';
    }

	if( $epcl_theme['header_mobile_icon_color'] != $white && $epcl_theme['header_mobile_icon_color'] != '' ){
		$css .= '#header div.menu-mobile i, .epcl-search-button{ 
            color: '.$epcl_theme['header_mobile_icon_color'].'; }';
	}

    /* @end */

    /* @group Content Colors */

    if( isset($epcl_theme['selection_bg_color']) && $epcl_theme['selection_bg_color'] != $red ){
        $css .= '::selection{ background-color: '.$epcl_theme['selection_bg_color'].'; }';
    }
    if( isset($epcl_theme['selection_text_color']) && $epcl_theme['selection_text_color'] != $white ){
        $css .= '::selection{ color: '.$epcl_theme['selection_text_color'].'; }';
    }

    if( $epcl_theme['main_content_bg_color'] != $white ){
        $css .= '.content, .pagination, div.epcl-share{ 
            background-color: '.$epcl_theme['main_content_bg_color'].'; }';
    }

    if( $epcl_theme['content_border_color'] != $border_color ){        

        $css .= 'div.articles article div.border, div.articles .separator{ 
            background: '.$epcl_theme['content_border_color'].'; }';

        $css .= 'div.articles article, .pagination, aside:before, div.left-content, aside .widget, #single .share-buttons, .section.bordered, .widget_archive ul>li, .widget_categories ul>li, .widget_meta ul>li, .widget_nav_menu ul>li, .widget_pages ul>li, .widget_recent_comments ul>li, .widget_recent_entries ul>li, .widget_rss ul>li, .widget_archive ul>li ul.children, .widget_archive ul>li ul.sub-menu, .widget_categories ul>li ul.children, .widget_categories ul>li ul.sub-menu, .widget_meta ul>li ul.children, .widget_meta ul>li ul.sub-menu, .widget_nav_menu ul>li ul.children, .widget_nav_menu ul>li ul.sub-menu, .widget_pages ul>li ul.children, .widget_pages ul>li ul.sub-menu, .widget_recent_comments ul>li ul.children, .widget_recent_comments ul>li ul.sub-menu, .widget_recent_entries ul>li ul.children, .widget_recent_entries ul>li ul.sub-menu, .widget_rss ul>li ul.children, .widget_rss ul>li ul.sub-menu, .widget_calendar table td{ 
            border-color: '.$epcl_theme['content_border_color'].'; }';
    }

    if( $epcl_theme['main_link_gradient']['from'] != $red || $epcl_theme['main_link_gradient']['to'] != $yellow ){
        $css .= '.gradient-effect a{
            background: -webkit-gradient(linear, left top, right top, from('.$epcl_theme['main_link_gradient']['from'].'), to('.$epcl_theme['main_link_gradient']['to'].'));
            background: linear-gradient(to right, '.$epcl_theme['main_link_gradient']['from'].' 0%, '.$epcl_theme['main_link_gradient']['to'].' 100%);
            background-size: 0px 4px;
            background-repeat: no-repeat;
            background-position: left 87%;
        }
        ';
    }	

    if( $epcl_theme['main_title_color'] != $black ){
        $css .= '.title, h1, h2, h3, h4, h5, h6, .epcl-shortcode.epcl-tabs ul.tab-links li a{ 
            color: '.$epcl_theme['main_title_color'].'; }';
    }
    if( $epcl_theme['main_title_decoration_color'] != $yellow ){
        $css .= '.title.bordered:after{ 
            background: '.$epcl_theme['main_title_decoration_color'].'; }';
    }

    if( $epcl_theme['counter_text_color'] != $white ){
        $css .= '.module-wrapper .counter .title, #archives .tag-description, #archives .tag-description .title{ 
            color: '.$epcl_theme['counter_text_color'].'; }';
    }
    if( $epcl_theme['counter_number_color'] != $yellow ){
        $css .= '.module-wrapper .counter .title .count{ 
            color: '.$epcl_theme['counter_number_color'].'; }';
    }

    /* @end */

    /* @group Buttons Colors */

    // Content links
    if( $epcl_theme['content_link_color']['regular'] != $black ){
        $css .= 'a, div.text a:not([class]), .widget a, section.widget_epcl_tweets p a, .author-meta a, .woocommerce table.shop_table td a, .woocommerce .woocommerce-MyAccount-navigation ul li a, .woocommerce .product_meta>span a{ 
            color: '.$epcl_theme['content_link_color']['regular'].'; }';
    }
    if( $epcl_theme['content_link_color']['hover'] != $red ){
        $css .= 'a:hover, div.text a:not([class]):hover, .widget a:hover, section.widget_epcl_tweets p a:hover, .author-meta a:hover, .gradient-effect a:hover, .woocommerce table.shop_table td a:hover, .woocommerce .woocommerce-MyAccount-navigation ul li.is-active a, .woocommerce .woocommerce-MyAccount-navigation ul li a:hover, .woocommerce .product_meta>span a:hover{ 
            color: '.$epcl_theme['content_link_color']['hover'].'; }';
    }

    // Main button
    if( $epcl_theme['button_bg_color'] != $red ){
        $css .= '.button, .epcl-button, .slick-arrow, .slick-arrow:hover, .pagination div.nav>span, .woocommerce a.button, .woocommerce button.button{ 
            background-color: '.$epcl_theme['button_bg_color'].'; }';
        $css .= '.button.outline, div.epcl-download a, .pagination div.nav a, .epcl-button:hover, .woocommerce a.button:hover, .woocommerce button.button:hover{ 
            color: '.$epcl_theme['button_bg_color'].';
            border-color: '.$epcl_theme['button_bg_color'].'; }';
        $css .= '.button.outline:hover, div.download a:hover, .pagination div.nav a:hover{ 
            border-color: '.$epcl_theme['button_bg_color'].'; 
            background-color: '.$epcl_theme['button_bg_color'].'; }';   
    }
    if( $epcl_theme['button_text_color'] != $white ){
        $css .= '.button.outline:hover, div.epcl-download a:hover, .pagination div.nav>span, .pagination div.nav a:hover{ 
            color: '.$epcl_theme['button_text_color'].' !important; }';   
    }
    // Tag color
    if( $epcl_theme['tag_text_color']['regular'] != $black ){
        $css .= '.widget_tag_cloud a, .widget_tag_cloud span, div.tags a, div.tags span, .woocommerce.widget_product_tag_cloud a{ 
            color: '.$epcl_theme['tag_text_color']['regular'].'; }';
    }
    if( $epcl_theme['tag_text_color']['hover'] != $white ){
        $css .= '.widget_tag_cloud a:hover, div.tags a:hover, .woocommerce.widget_product_tag_cloud a:hover{ 
            color: '.$epcl_theme['tag_text_color']['hover'].'; }';
    }
    if( $epcl_theme['tag_bg_color']['regular'] != $yellow ){
        $css .= '.widget_tag_cloud a, .widget_tag_cloud span, div.tags a, div.tags span, .woocommerce.widget_product_tag_cloud a{ 
            background-color: '.$epcl_theme['tag_bg_color']['regular'].'; }';
    }
    if( $epcl_theme['tag_bg_color']['hover'] != $black ){
        $css .= '.widget_tag_cloud a:hover, div.tags a:hover, .woocommerce.widget_product_tag_cloud a:hover{ 
            background-color: '.$epcl_theme['tag_bg_color']['hover'].'; }';
    }

    /* @end */

    /* @group Sidebar Colors */

    if( $epcl_theme['sidebar_bg_color'] != $white ){
        $css .= '#sidebar{ 
            background-color: '.$epcl_theme['sidebar_bg_color'].'; }';
    }

    if( $epcl_theme['sidebar_text_color'] != $text_color && strlen($epcl_theme['sidebar_text_color']) > 2){
        $color = new Color( $epcl_theme['sidebar_text_color'] );
        $css .= '#sidebar{ 
            color: '.$epcl_theme['sidebar_text_color'].'; }';

        $css .= '#sidebar .widget_recent_entries .post-date, #sidebar section.widget_epcl_tweets p small{ 
            color: #'.$color->lighten('25').'; }';    
    }

    if( $epcl_theme['sidebar_link_color']['regular'] != $black ){
        $css .= '#sidebar .widget a{ 
            color: '.$epcl_theme['sidebar_link_color']['regular'].'; }';
    }

    if( $epcl_theme['sidebar_link_color']['hover'] != $red ){
        $css .= '#sidebar .widget a:hover{ 
            color: '.$epcl_theme['sidebar_link_color']['hover'].'; }';
    }

    if( $epcl_theme['sidebar_title_color'] != $black ){
        $css .= '#sidebar .widget .widget-title{ 
            color: '.$epcl_theme['sidebar_title_color'].'; }';
    }
    if( $epcl_theme['sidebar_title_decoration_color'] != $yellow ){
        $css .= '#sidebar .widget .widget-title.bordered:after{ 
            background: '.$epcl_theme['sidebar_title_decoration_color'].'; }';
    }

    /* @end */

    /* @group Forms Colors */

    if( $epcl_theme['input_bg_color'] != '#f2f2f2' ){
        $css .= 'input[type=email], input[type=number], input[type=password], input[type=tel], input[type=text], input[type=url], textarea, .woocommerce .select2-container--default .select2-selection--single, select{ 
            background: '.$epcl_theme['input_bg_color'].'; }';
        $css .= 'input[type=email], input[type=number], input[type=password], input[type=tel], input[type=text], input[type=url], textarea, select{ 
            border-color: '.$epcl_theme['input_bg_color'].'; }';
        $css .= 'input[type=email]:focus, input[type=number]:focus, input[type=password]:focus, input[type=tel]:focus, input[type=text]:focus, input[type=url]:focus, textarea:focus, select:focus{ 
            border-color: '.$epcl_theme['input_bg_color'].'; }';
    }
    if( $epcl_theme['input_text_color'] != $text_color ){
        $css .= 'input[type=email], input[type=number], input[type=password], input[type=tel], input[type=text], input[type=url], textarea, .select2-container--default .select2-selection--single .select2-selection__rendered, select{ 
            color: '.$epcl_theme['input_text_color'].'; }';
        $css .= 'input[type=email]::-webkit-input-placeholder, input[type=number]::-webkit-input-placeholder, input[type=password]::-webkit-input-placeholder, input[type=tel]::-webkit-input-placeholder, input[type=text]::-webkit-input-placeholder, input[type=url]::-webkit-input-placeholder, textarea::-webkit-input-placeholder, select{ 
            color: '.$epcl_theme['input_text_color'].'; }';  
        $css .= 'input[type=email]:-moz-placeholder, input[type=number]:-moz-placeholder, input[type=password]:-moz-placeholder, input[type=tel]:-moz-placeholder, input[type=text]:-moz-placeholder, input[type=url]:-moz-placeholder, textarea:-moz-placeholder, select{ 
            color: '.$epcl_theme['input_text_color'].'; }';     
        $css .= 'input[type=email]::-moz-placeholder, input[type=number]::-moz-placeholder, input[type=password]::-moz-placeholder, input[type=tel]::-moz-placeholder, input[type=text]::-moz-placeholder, input[type=url]::-moz-placeholder, textarea::-moz-placeholder, select{ 
            color: '.$epcl_theme['input_text_color'].'; }'; 
        $css .= 'input[type=email]:-ms-input-placeholder, input[type=number]:-ms-input-placeholder, input[type=password]:-ms-input-placeholder, input[type=tel]:-ms-input-placeholder, input[type=text]:-ms-input-placeholder, input[type=url]:-ms-input-placeholder, textarea:-ms-input-placeholder, select{ 
            color: '.$epcl_theme['input_text_color'].'; }'; 
    }

    if( $epcl_theme['label_text_color'] != $text_color ){
        $css .= 'label{ 
            color: '.$epcl_theme['label_text_color'].'; }';
    }

    if( $epcl_theme['custom_select_bg_color'] != $red ){
        $css .= '.widget .nice-select{ 
            background-color: '.$epcl_theme['custom_select_bg_color'].' !important;
            border-color: '.$epcl_theme['custom_select_bg_color'].' !important; }';
    }
    if( $epcl_theme['custom_select_text_color'] != $white ){
        $css .= '.widget .nice-select{ 
            color: '.$epcl_theme['custom_select_text_color'].' !important; }';
        $css .= '.widget .nice-select:after{ 
            border-bottom-color: '.$epcl_theme['custom_select_text_color'].'; 
            border-right-color: '.$epcl_theme['custom_select_text_color'].'; }';    
    }

    if( $epcl_theme['submit_bg_color'] != $red ){
        $css .= 'input[type=submit]{ 
            background-color: '.$epcl_theme['submit_bg_color'].'; }';
        $css .= 'input[type=submit]:hover{ 
            border-color: '.$epcl_theme['submit_bg_color'].';
            color: '.$epcl_theme['submit_bg_color'].'; }';
    }
    if( $epcl_theme['submit_text_color'] != $white ){
        $css .= 'input[type=submit]{ 
            color: '.$epcl_theme['submit_text_color'].'; }';
    }

    /* @end */

    /* @group Footer Colors */

    if( $epcl_theme['footer_bg_color'] != $red ){
        $css .= '#footer .widgets{ 
            background-color: '.$epcl_theme['footer_bg_color'].'; }';
    }

    if( $epcl_theme['footer_text_color'] != '#ffffff' ){
        $css .= '#footer .widgets, #footer .widget_archive ul li span, #footer .widget_categories ul li span{ 
            color: '.$epcl_theme['footer_text_color'].'; }';
    }

    if( $epcl_theme['footer_link_color']['regular'] != '#ffffff' ){
        $css .= '#footer .widgets a{ 
            color: '.$epcl_theme['footer_link_color']['regular'].'; }';
    }

    if( $epcl_theme['footer_link_color']['hover'] != '#ffffff' ){
        $css .= '#footer .widgets a:hover{ 
            color: '.$epcl_theme['footer_link_color']['hover'].'; }';
    }

    if( $epcl_theme['footer_title_color'] != '#ffffff' ){
        $css .= '#footer .widget .widget-title{ 
            color: '.$epcl_theme['footer_title_color'].'; }';
    }

    if( $epcl_theme['footer_title_decoration_color'] != $yellow ){

        $css .= '#footer .widget .widget-title.bordered:after{ 
            background: '.$epcl_theme['footer_title_decoration_color'].'; }';
    }

    if( $epcl_theme['footer_logo_text_color'] != $white ){

        $css .= '#footer .logo a{ 
            color: '.$epcl_theme['footer_logo_text_color'].'; }';
    }

    if( $epcl_theme['footer_copyright_color'] != $white ){

        $css .= '#footer .published{ 
            color: '.$epcl_theme['footer_copyright_color'].'; }';
    }

    if( $epcl_theme['footer_copyright_link_color'] != $white ){

        $css .= '#footer .published a{ 
            color: '.$epcl_theme['footer_copyright_link_color'].'; }';
    }

    /* @end */

	/* @group Typography */

    // Regular Text
	if( $epcl_theme['body_font']['font-family'] && $epcl_theme['body_font']['font-family'] != 'Poppins')
		$css .= 'body, .epcl-button, .pagination div.nav a, .pagination div.nav>span, div.epcl-download a, input[type=text], input[type=password], input[type=email], input[type=tel], input[type=submit], input[type=url], textarea, select, select.custom-select, button, label, .wpcf7 label, #header nav ul.sub-menu li a, .nice-select .list li, .woocommerce button.button, .woocommerce a.button{ font-family: '.$epcl_theme['body_font']['font-family'].'; }';
	
	if( $epcl_theme['body_font']['font-weight'] && $epcl_theme['body_font']['font-weight'] != '400' )
		$css .= 'body, input[type=text], input[type=password], input[type=email], input[type=tel], input[type=submit], input[type=url], textarea, select, select.custom-select, button, label, .wpcf7 label{ font-weight: '.$epcl_theme['body_font']['font-weight'].'; }';
	
	if($epcl_theme['body_font']['font-size'] != 'px' && $epcl_theme['body_font']['font-size'] != '15px')
        $css .= 'body{ font-size: '.$epcl_theme['body_font']['font-size'].'; }';
        
	// Primary Titles
	if( $epcl_theme['primary_titles_font']['font-family'] && $epcl_theme['primary_titles_font']['font-family'] != 'Roboto' )
		$css .= '.nice-select, .button, div.epcl-download a, .title, div.text h1, div.text h2, div.text h3, div.text h4, div.text h5, div.text h6, #header nav ul.menu > li > a{ font-family: '.$epcl_theme['primary_titles_font']['font-family'].'; }';
	
	if( $epcl_theme['primary_titles_font']['font-weight'] )
        $css .= '.title, div.text h1, div.text h2, div.text h3, div.text h4, div.text h5, div.text h6{ font-weight: '.$epcl_theme['primary_titles_font']['font-weight'].'; }';

	// Sidebar Titles
	if( $epcl_theme['sidebar_titles_font']['font-family'] && $epcl_theme['sidebar_titles_font']['font-family'] != 'Roboto' )
		$css .= 'aside .widget .widget-title, aside .title, .widget_rss a, aside .nice-select{ font-family: '.$epcl_theme['sidebar_titles_font']['font-family'].'; }';

	// Sidebar regular text
	if( $epcl_theme['sidebar_font']['font-family'] && $epcl_theme['sidebar_font']['font-family'] != 'Poppins' )
		$css .= 'aside .widget, aside .nice-select li{ font-family: '.$epcl_theme['sidebar_font']['font-family'].'; }';

	// Footer Titles
	if( $epcl_theme['footer_titles_font']['font-family'] && $epcl_theme['footer_titles_font']['font-family'] != 'Roboto' )
		$css .= '#footer .widget .widget-title, #footer .title,  #footer .widget_rss a, #footer .nice-select{ font-family: '.$epcl_theme['footer_titles_font']['font-family'].'; }';

	// Footer regular text
	if( $epcl_theme['footer_font']['font-family'] && $epcl_theme['footer_font']['font-family'] != 'Poppins' )
		$css .= '#footer .widget, #footer .nice-select li{ font-family: '.$epcl_theme['footer_font']['font-family'].'; }';
        
    // Blog single text
    if($epcl_theme['editor_font_size'] != '17')
        $css .= 'div.text{ font-size: '.$epcl_theme['editor_font_size'].'px; }';
        
	if($epcl_theme['h1_font_size'] != '34')
		$css .= 'div.text h1{ font-size: '.$epcl_theme['h1_font_size'].'px; }';
	
	if($epcl_theme['h2_font_size'] != '28')
		$css .= 'div.text h2{ font-size: '.$epcl_theme['h2_font_size'].'px; }';
	
	if($epcl_theme['h3_font_size'] != '24')
		$css .= 'div.text h3{ font-size: '.$epcl_theme['h3_font_size'].'px; }';
	
	if($epcl_theme['h4_font_size'] != '18')
		$css .= 'div.text h4{ font-size: '.$epcl_theme['h4_font_size'].'px; }';
	
	if($epcl_theme['h5_font_size'] != '16')
		$css .= 'div.text h5{ font-size: '.$epcl_theme['h5_font_size'].'px; }';
	
	if($epcl_theme['h6_font_size'] != '14')
		$css .= 'div.text h6{ font-size: '.$epcl_theme['h6_font_size'].'px; }';

    /* @end */
    
    // Enable Scroll on Sub Menus
    if( $epcl_theme['enable_scroll_submenu'] === '1' ){
        $css .= '#header nav ul.sub-menu{ max-height: 50vh; overflow-y: auto; overflow-x: hidden; }';
    }

    // Disable date globally
    if( isset($epcl_theme['enable_global_date']) && $epcl_theme['enable_global_date'] === '0' ){
        $css .= 'time{ display: none !important; }';
    }

    // Disable categories globally
    if( isset($epcl_theme['enable_global_category']) && $epcl_theme['enable_global_category'] === '0' ){
        $css .= 'div.tags{ display: none !important; }';
    }

    // Disable comments globally
    if( isset($epcl_theme['enable_global_comments']) && $epcl_theme['enable_global_comments'] === '0' ){
        $css .= 'div.meta a.comments{ display: none !important; }';
    }

    // Disable featured image globally
    if( isset($epcl_theme['enable_featured_image']) && $epcl_theme['enable_featured_image'] === '0' ){
        $css .= '#single.standard .featured-image{ display: none !important; }';
    }

    /* @group AMP CSS */

    if( epcl_is_amp() ){
        if( isset($epcl_theme['amp_body_font']['font-family']) && $epcl_theme['amp_body_font']['font-family'] && $epcl_theme['amp_body_font']['font-family'] != 'Poppins')
        $css .= 'body, .epcl-button, .pagination div.nav a, .pagination div.nav>span, div.epcl-download a, input[type=text], input[type=password], input[type=email], input[type=tel], input[type=submit], input[type=url], textarea, select, select.custom-select, button, label, .wpcf7 label, #header nav ul.sub-menu li a, .nice-select .list li, .woocommerce button.button, .woocommerce a.button{ font-family: '.$epcl_theme['amp_body_font']['font-family'].'; }';

        if( isset($epcl_theme['amp_body_font']['font-weight']) && $epcl_theme['amp_body_font']['font-weight'] && $epcl_theme['amp_body_font']['font-weight'] != '400' )
            $css .= 'body, input[type=text], input[type=password], input[type=email], input[type=tel], input[type=submit], input[type=url], textarea, select, select.custom-select, button, label, .wpcf7 label{ font-weight: '.$epcl_theme['amp_body_font']['font-weight'].'; }';

        if( isset($epcl_theme['amp_primary_titles_font']['font-family']) && $epcl_theme['amp_primary_titles_font']['font-family'] && $epcl_theme['amp_primary_titles_font']['font-family'] != 'Montserrat' )
            $css .= '.nice-select, .button, div.epcl-download a, .title, div.text h1, div.text h2, div.text h3, div.text h4, div.text h5, div.text h6, #header nav ul.menu > li > a{ font-family: '.$epcl_theme['amp_primary_titles_font']['font-family'].'; }';
    
        if( isset($epcl_theme['amp_primary_titles_font']['font-weight']) &&  $epcl_theme['amp_primary_titles_font']['font-weight'] )
            $css .= '.title, div.text h1, div.text h2, div.text h3, div.text h4, div.text h5, div.text h6{ font-weight: '.$epcl_theme['amp_primary_titles_font']['font-weight'].'; }';

    }

    /* @end */

	/* @group Advanced CSS */

	if( !empty($epcl_theme['css_code']) )
		$css .= $epcl_theme['css_code'];

    /* @end */

	$prefix = EPCL_THEMEPREFIX.'_';

	if($css)
		return $css;
}

function epcl_generate_gutenberg_custom_styles(){
    $epcl_theme = epcl_get_theme_options();
    $css = '';

    if( empty($epcl_theme) ) return;

    $red = '#FF3152';
    $yellow = '#FFD012';
    $text_color = '#494949';
    $border_color = '#e5e5e5';
    $black = '#222222';
    $white = '#ffffff';

	/* @group General Settings */

    
    // Primary Color
	if( $epcl_theme['primary_color'] != '#FF3152' ){
        
		$css .= '.editor-styles-wrapper .editor-block-list__layout a:not([class]), .editor-styles-wrapper div.text a:not([class]), .editor-block-list__layout .wp-block-categories li span, .editor-styles-wrapper .editor-block-list__layout .wp-block-archives li span{ 
            color: '.$epcl_theme['primary_color'].' !important; }';

        $css .= '.editor-block-list__layout .wp-block-categories li a, .editor-styles-wrapper .editor-block-list__layout .wp-block-archives li a, .editor-styles-wrapper .editor-block-list__layout .wp-block-categories li a{ 
            color: #191e23 !important; }';
	}

    // Secondary Color
	if( $epcl_theme['secondary_color'] != '#FFD012' ){

        $css .= '.editor-styles-wrapper .editor-block-list__layout .wp-block-quote:before, .editor-styles-wrapper div.text .wp-block-quote:before, .editor-styles-wrapper .editor-block-list__layout .wp-block-pullquote:after, .editor-styles-wrapper .editor-block-list__layout .wp-block-pullquote:before, .editor-styles-wrapper .editor-post-title__block:after{ 
            background-color: '.$epcl_theme['secondary_color'].' !important; }';

	}

    /* @end */

	/* @group Typography */

    // Regular Text
	if( $epcl_theme['body_font']['font-family'] && $epcl_theme['body_font']['font-family'] != 'Poppins')
		$css .= '.editor-block-list__layout{ font-family: '.$epcl_theme['body_font']['font-family'].' !important; }';
	
	if( $epcl_theme['body_font']['font-weight'] && $epcl_theme['body_font']['font-weight'] != '400' )
		$css .= '.editor-block-list__layout{ font-weight: '.$epcl_theme['body_font']['font-weight'].' !important; }';
        
	// Primary Titles
	if( $epcl_theme['primary_titles_font']['font-family'] && $epcl_theme['primary_titles_font']['font-family'] != 'Roboto' )
		$css .= '.editor-block-list__layout h1,.editor-block-list__layout h2, .editor-block-list__layout h3, .editor-block-list__layout h4, .editor-block-list__layout h5, .editor-block-list__layout h6, .editor-post-title__block .editor-post-title__input{ font-family: '.$epcl_theme['primary_titles_font']['font-family'].' !important; }';
	
	if( $epcl_theme['primary_titles_font']['font-weight'] )
        $css .= '.editor-block-list__layout h1, .editor-block-list__layout h2, .editor-block-list__layout h3, .editor-block-list__layout h4, .editor-block-list__layout h5, .editor-block-list__layout h6{ font-weight: '.$epcl_theme['primary_titles_font']['font-weight'].' !important; }';
        
    // Blog single text
    if($epcl_theme['editor_font_size'] != '17')
        $css .= '.editor-styles-wrapper .editor-block-list__layout{ font-size: '.$epcl_theme['editor_font_size'].'px !important; }';
        
	if($epcl_theme['h1_font_size'] != '34')
		$css .= '.editor-block-list__layout h1{ font-size: '.$epcl_theme['h1_font_size'].'px; }';
	
	if($epcl_theme['h2_font_size'] != '28')
		$css .= '.editor-styles-wrapper .editor-block-list__layout h2{ font-size: '.$epcl_theme['h2_font_size'].'px !important; }';
	
	if($epcl_theme['h3_font_size'] != '24')
		$css .= '.editor-styles-wrapper .editor-block-list__layouth3{ font-size: '.$epcl_theme['h3_font_size'].'px !important; }';
	
	if($epcl_theme['h4_font_size'] != '18')
		$css .= '.editor-styles-wrapper .editor-block-list__layout h4{ font-size: '.$epcl_theme['h4_font_size'].'px !important; }';
	
	if($epcl_theme['h5_font_size'] != '16')
		$css .= '.editor-styles-wrapper .editor-block-list__layout h5{ font-size: '.$epcl_theme['h5_font_size'].'px !important; }';
	
	if($epcl_theme['h6_font_size'] != '14')
		$css .= '.editor-styles-wrapper .editor-block-list__layout h6{ font-size: '.$epcl_theme['h6_font_size'].'px !important; }';

    /* @end */
    
	$prefix = EPCL_THEMEPREFIX.'_';

	if($css)
		return $css;
}


if ( ! function_exists( 'epcl_hex2rgba' ) ) {

	function epcl_hex2rgba($color, $opacity = false){
		$default = 'rgb(0,0,0)';
		if(empty($color))
			  return $default;
		if($color[0] == '#'){
			$color = substr($color, 1);
		}
		if(strlen($color) == 6){
			$hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
		}elseif(strlen($color) == 3){
			$hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
		} else {
			return $default;
		}
		$rgb =  array_map('hexdec', $hex);
		if($opacity){
			if(abs($opacity) > 1)
				$opacity = 1.0;
			$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
		}else{
			$output = 'rgb('.implode(",",$rgb).')';
		}
		return $output;
	}
}
