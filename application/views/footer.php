	<section class="footer">
		<nav class="footer_menu">
			<?php if (isset($current_page) && $current_page=="home") {
				?>
				<!-- Facebook Share-->
				<div class="social_buttons">
					<div class="fb-share-button" data-href="http://materialresume.petrovicstefan.rs" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fmaterialresume.petrovicstefan.rs%2F&amp;src=sdkpreparse">Share</a></div>
				
				<!-- Twitter Twitt -->
				<a class="twitter-share-button"
				  href="https://twitter.com/intent/tweet?text=Create%20beautifull%20and%20profesional%20Résumés%20in%20Material%20Design%20with%20Material%20Résumé.">
				Tweet</a>

				<!-- Git Button -->
				<iframe src="https://ghbtns.com/github-btn.html?user=petrovicstefanrs&repo=materialresume&type=star&count=true" frameborder="0" scrolling="0" width="auto" height="20px"></iframe>
				</div>
                
				<?php
			} ?>

			<div class="made">
				<span> Made With <i class="fa fa-heart" aria-hidden="true"></i> in Serbia</span>
			</div>
			<div class="copyright_notice">
				<span class="copyright">All Rights Reserved 
					<span class="copyright_bold">Material</span> Résumé <i class="fa fa-copyright" aria-hidden="true"></i>
				</span>
			</div>
			<div class="footer_links">
			  <span><a class="active" href="<?php echo base_url();?>home">Home</a></span>
			  <span><a href="<?php echo base_url();?>xml/sitemap.xml">Sitemap</a></span>
			  <span><a href="<?php echo base_url();?>doc/documentation.pdf">Documentation</a></span>
			  <span><a href="<?php echo base_url();?>aboutme">About</a></span>
			  <span><a href="<?php echo base_url();?>contact">Contact Us</a></span>
			</div>
		</nav>
	</section>
</body>
</html>