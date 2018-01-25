<!DOCTYPE HTML>
<!--
                              ..
                            .' @`._
             ~       ...._.'  ,__.-;
          _..------/`           .-'    ~
         :     __./'       ,  .'-'--.._
      ~   `---(.-'''---.    \`._       `.   ~
        _.--'(  .______.'.-' `-.`        `.
       :      `-..____`-.                  ;
       `.             ````  稻花香里说丰年，  ;   ~
         `-.__           听取人生经验。  __.-'
              ````-----.......-----'''    ~
           ~                   ~   
                还请大佬多多指教啦~
-->
<html class="no-js">
  <head>
	<title><?php wp_title( '-', true, 'right' ); ?></title>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="robots" content="index,follow">
	<?php if (kratos_option('tool_ssl')) {?><meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" /><?php }; ?>
	<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="format-detection" content="telphone=no, email=no">
	<meta name="description" itemprop="description" content="<?php kratos_description(); ?>">
	<meta name="keywords" content="<?php kratos_keywords(); ?>">
	<link rel="icon" type="image/x-icon" href="<?php echo kratos_option('site_ico'); ?>">
	<?php wp_head(); ?>
	<?php wp_print_scripts('jquery'); ?>
	<?php if ( kratos_option('site_bw')==1 ) : ?>
	<style type="text/css">html{filter: grayscale(100%);-webkit-filter: grayscale(100%);-moz-filter: grayscale(100%);-ms-filter: grayscale(100%);-o-filter: grayscale(100%);filter: progid:DXImageTransform.Microsoft.BasicImage(grayscale=1);filter: gray;-webkit-filter: grayscale(1); }</style>
	<?php endif; ?>
	<?php if ( kratos_option('background_mode')=='image' ) : ?>
	<style type="text/css">@media (min-width:768px){.kratos-hentry,.navigation div,.comments-area .comment-list li,#kratos-widget-area .widget,.comment-respond{background-color:RGBA(255,255,255,0.8)!important}.comment-list .children li{background-color:RGBA(255,253,232,0.7)!important}.nav-tabs > li.active > a,.nav-tabs > li.active > a:focus,.nav-tabs > li.active > a:hover,.list-group-item{background-color:#fff0!important}body.custom-background{background-image:url(<?php echo kratos_option('background_index_image'); ?>);background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:fixed}}</style>
	<?php endif; ?>
  </head>
	<?php flush(); ?>
	<body data-spy="scroll" data-target=".scrollspy"<?php if(kratos_option('background_mode')=='image') echo ' class="custom-background"'; ?>>
		<div id="kratos-wrapper">
			<div id="kratos-page">
				<div id="kratos-header">
					<?php if ( has_nav_menu('header_menu') ) :?>
					<div class="nav-toggle"><a class="kratos-nav-toggle js-kratos-nav-toggle"><i></i></a></div>
					<?php endif; ?>
					<header id="kratos-header-section">
						<div class="off-na"><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></div>
						<div class="container">
							<div class="nav-header">
								<?php $defaults = array('theme_location' => 'header_menu', 'container' => 'nav', 'container_id' => 'kratos-menu-wrap', 'menu_class' => 'sf-menu', 'menu_id' => 'kratos-primary-menu', ); ?>
							 <?php wp_nav_menu($defaults); ?>
							</div>
						</div>
					</header>
				</div>