	<section class="aboutme_section">
		<div class="aboutme_container">
			<div class="aboutme_heading">
				<img src="<?php echo base_url().$about_img;?>">
				<span class="big_name">
					<?php echo $about_name; ?>
				</span>
			</div>
			<div class="aboutme_desc">
				<span class="desc">
					<?php echo $about_desc; ?>
				</span>
			</div>
			<div class="aboutme_info">
				<span class="info">
					<?php 
						echo $about_studid;
						echo "</br>";
						echo $about_email;
					?>
				</span>
			</div>
		</div>
	</section>