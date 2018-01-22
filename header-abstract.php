	<div class="kratos-start kratos-hero-2">
		<div class="kratos-overlay"></div>
		<div class="kratos-cover kratos-cover_2 text-center" style="background-image: url(<?php echo kratos_option('background_image'); ?>);">
			<div class="desc desc2 animate-box">
				<a href="<?php echo get_bloginfo('url'); ?>"><h2><?php if(is_category()) echo single_cat_title('', false);else echo kratos_option('background_image_text1'); ?></h2><br><span><?php if(is_category()) echo category_description();else echo  kratos_option('background_image_text2'); ?></span></a>
			</div>
		</div>
	</div>
	<div id="kratos-blog-post" style="background:<?php if(kratos_option('background_mode')=='color') echo kratos_option('background_index_color');else echo 'url('.kratos_option('background_index_image').');background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:fixed'; ?>">