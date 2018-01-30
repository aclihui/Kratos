<?php
/**
Template Name: 无标题页面模版
*/
$page_side_bar = kratos_option('page_side_bar');
$page_side_bar = (empty($page_side_bar)) ? 'right_side' : $page_side_bar;
get_header();
get_header('abstract'); ?>
	<div class="container">
		<div class="row">
			<?php if($page_side_bar == 'left_side'&&!wp_is_mobile()){ ?>
				<aside id="kratos-widget-area" class="col-md-4 hidden-xs hidden-sm scrollspy">
	                <div id="sidebar">
	                    <?php dynamic_sidebar('sidebar_tool'); ?>
	                </div>
	            </aside>
			<?php } ?>
            <section id="main" class='<?php echo ($page_side_bar == 'single') ? 'col-md-12' : 'col-md-8'; ?>'>
			<?php while ( have_posts() ) : the_post(); ?>
				<article>
					<div class="kratos-hentry kratos-post-inner clearfix">
						<div class="kratos-post-content"><?php the_content(); ?></div>
						<?php if(kratos_option('page_like_donate')||kratos_option('page_share')) {?>
						<footer class="kratos-entry-footer clearfix">
								<div class="post-like-donate text-center clearfix" id="post-like-donate">
								<?php if ( kratos_option( 'page_like_donate' ) ) : ?>
					   			<a href="javascript:;" class="Donate"><i class="fa fa-bitcoin"></i> 打赏</a>
								<script>(function() {
								$(function(){
								$(".Donate").on('click', function(){
										layer.open({
										type: 1,
										area: ['300px', '370px'],
										title: '<?php echo kratos_option( 'paytext_head' );?>',
										resize: false,
										scrollbar: false,
										shade: 0.6,
										anim: 0,
										content: '<div class="donate-box"><div class="meta-pay text-center"><strong><?php echo kratos_option( 'paytext' );?></strong></div><div class="qr-pay text-center"><img class="pay-img" id="alipay_qr" src="<?php echo kratos_option( 'alipayqr_url' );?>"><img class="pay-img d-none" id="wechat_qr" src="<?php echo kratos_option( 'wechatpayqr_url' );?>"></div><div class="choose-pay text-center"><input id="alipay" type="radio" name="pay-method" checked><label for="alipay" class="pay-button"><img src="<?php echo get_stylesheet_directory_uri();?>/images/alipay.png"></label><input id="wechatpay" type="radio" name="pay-method"><label for="wechatpay" class="pay-button"><img src="<?php echo get_stylesheet_directory_uri();?>/images/wechat.png"></label></div></div>'
									});
									$(".choose-pay input[type='radio']").click(function(){
										var id= $(this).attr("id");
										if (id=='alipay') { $(".qr-pay #alipay_qr").removeClass('d-none');$(".qr-pay #wechat_qr").addClass('d-none') };
										if (id=='wechatpay') { $(".qr-pay #alipay_qr").addClass('d-none');$(".qr-pay #wechat_qr").removeClass('d-none') };
									});
								});
								});
								}());</script>
					   			<?php endif; ?>
								<?php if ( kratos_option( 'page_share' ) ) : ?>
								<a href="javascript:;"  class="Share" ><i class="fa fa-share-alt"></i> 分享</a>
									<?php require_once( get_template_directory() . '/inc/share.php'); ?>
								<?php endif; ?>
					    		</div>
						</footer>
						<?php }?>
					</div>
						<?php if ( kratos_option( 'page_cc' ) ) : ?>
						<div class="kratos-hentry kratos-copyright text-center clearfix">
							<img alt="知识共享许可协议" src="<?php echo get_template_directory_uri(); ?>/images/licenses.png">
							<h5>本作品采用 <a rel="license nofollow" target="_blank" href="http://creativecommons.org/licenses/by-sa/4.0/">知识共享署名-相同方式共享 4.0 国际许可协议</a> 进行许可</h5>
						</div>
						<?php endif; ?>
						<?php comments_template(); ?>
				</article>
			<?php endwhile;?>
			</section>
			<?php if($page_side_bar == 'right_side'&&!wp_is_mobile()){ ?>
			<aside id="kratos-widget-area" class="col-md-4 hidden-xs hidden-sm scrollspy">
                <div id="sidebar">
                    <?php dynamic_sidebar('sidebar_tool'); ?>
                </div>
            </aside>
			<?php } ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>