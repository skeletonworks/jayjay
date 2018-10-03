
<footer class="bg-light py-md-5 py-4">
	<div class="container">
	  <div class="row justify-content-md-center">
			<div class="col-md-2 col-sm-6">
				<?php if ( get_theme_mod( 'the_logo' ) ) : ?>
					<img src="<?php echo get_theme_mod( 'the_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					<?php else : ?>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png">
					<?php endif; ?>
				</div>
</div>
						<div class="row">

				<div class="col p-4 p-md-5">		       
					<?php wp_nav_menu(array(
						'theme_location' => 'footer',
						'menu_id'         => false,
						'depth'           => 2,
						'menu_class' 		=> 'list-unstyled', 
						'container_class' => false,
						'container_id' => false, 
					));
					?> 
				</div>
			</div>	
		</div>


	</footer>
	<div class="bg-white py-4">
		<div class="container">
			<div class="row">
				<div class="col text-center small">
					&copy; Copyright <?php echo date('Y') ?>. <?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?> 

				</div>
			</div>
		</div>
	</div>

</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script  src="<?php echo get_template_directory_uri() ?>/inc/slinky/slinky.js" type="text/javascript"></script>

<script>
	const slinky = $('#menu').slinky()
</script>
<?php wp_footer(); ?>
</body>
</html>
