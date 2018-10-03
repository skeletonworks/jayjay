<div class="container">
	<div class="mt-2 py-sm-3 py-md-5 d-flex justify-content-between">
		<div class="col"> 
			<button type="button" id="sidebarCollapse" class="navbar-btn">
				<span></span>
				<span></span>
				<span></span>
			</button>
		</div>
		<div class="col text-center site-logo"><a href="<?php echo get_site_url();?>">
			<?php if ( get_theme_mod( 'the_logo' ) ) : ?>
				<img src="<?php echo get_theme_mod( 'the_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				<?php else : ?>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png">
				<?php endif; ?>
			</a></div>
			<div class="col text-right "><a class="login" href=""><i class="fal fa-2x fa-user"></i></a></div>
		</div>    
	</div> 


