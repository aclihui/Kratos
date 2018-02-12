<?php get_header(); ?>
<div class="kratos-start">
	<div class="kratos-overlay"></div>
	<div class="kratos-cover kratos-topimg text-center" style="background-image:url('<?php echo kratos_option('error_image'); ?>')">
		<div class="desc desc3">
			<h2><?php echo kratos_option('error_text1'); ?></h2>
			<br><span><?php echo kratos_option('error_text2'); ?></span>
			<br><span><a href="<?php echo home_url(); ?>"><div class="btn btn-star">返回首页</div></a></span>
		</div>
	</div>
</div>
<?php get_footer(); ?>