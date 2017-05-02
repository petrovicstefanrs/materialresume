	<!-- Facebook and twitter button scripts -->

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

	<script>window.twttr = (function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0],
	    t = window.twttr || {};
	  if (d.getElementById(id)) return t;
	  js = d.createElement(s);
	  js.id = id;
	  js.src = "https://platform.twitter.com/widgets.js";
	  fjs.parentNode.insertBefore(js, fjs);

	  t._e = [];
	  t.ready = function(f) {
	    t._e.push(f);
	  };

	  return t;
	}(document, "script", "twitter-wjs"));</script>
	
	<!-- FB AND TWITTER SCRIPTS END -->

	<section class="hero_header">
		<div class="illustration">
			<img src="<?php echo base_url();?>/images/home/resume.png">
		</div>

		<div class="hero_info">
			<?php echo heading('<span>Material</span> Résumé',1,'class="heading_h1"'); ?>
			<span class="hero_about">
				Create a professional <strong>résumé</strong> in <strong>minutes</strong> with <strong>material résumé</strong>.</br>Share it as a <strong>website</strong> or download as <strong>print-ready pdf</strong>.
			</span>
			<div class="btn_create" type="button"><a href="<?php echo base_url()?>app/edit">Create Résumé</a>
			</div>
		</div>
	</section>
	<section class="short_info">
		<div class="left_hero_info"></div>
		<div class="hero_info">
			<?php echo heading('<span>Free</span> Forever',2,'class="heading_h2"'); ?>
			<span class="short_about">
				Material <strong>résumé</strong> is not only beautifull but also <strong>free</strong>.</br>And it <strong>always</strong> will be!</br>You can show your support by bying me a cup of coffe.
			</span>
			<div class="btn_donate" type="button"><a href="https://www.paypal.me/petrovicstefan/1" target="_blank">Donate <i class="fa fa-coffee" aria-hidden="true"></i></a>
			</div>
		</div>
	</section>
	<section class="big_create_btn">
		<div class="hero_info">
			<span class="create_about">
				Click this <strong>attractive button</strong> and <strong>start</strong> writing your résumé.
			</span>
			<div class="btn_create" type="button"><a href="<?php echo base_url()?>app/edit">Create Résumé</a>
			</div>
		</div>
	</section>
