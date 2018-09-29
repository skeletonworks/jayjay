
<footer class="bg-light py-5">
	<div class="container">
		<div class="row">
			<div class="col">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png"><br>
			&copy; Copyright <?php echo date(Y) ?>
			</div>
			<div class="col-md-9">		       
	 		<?php wp_nav_menu(array(
                'theme_location' => 'footer',
                'menu_id'         => false,
                'depth'           => 3,
                'container_class' => false, 
                'menu_class'      => 'list-unstyled',
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
					<strong>&copy; Copyright <?php echo date(Y) ?>.</strong>

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
