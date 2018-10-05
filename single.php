

<?php get_header(); ?>
<div class="mb-5">
	<div class="bg-light">
		<?php get_template_part( 'template-parts/header', 'navigation' ); ?>
	</div>
</div>

<div id="main-container" class="container">
	<div class="row">
		<div class="col-md-7">
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" class="mb-3 pb-3" <?php post_class(); ?>>

					<h1 class="entry-title mb-4"><?php the_title(); ?></h1>
					<div class="row border-top border-bottom py-3 my-3 no-gutters">
						<div class="col-md-auto mr-3">

							<?php 
							$author_id = get_the_author_meta('ID');
							echo get_avatar( get_the_author_meta( 'ID' ), $author_id ); ?>

						</div>  
						<div class="col-md-auto">
							<small>
								<p class="m-0">Publicerat den <?php the_date(); ?> av <?php the_author_meta( 'display_name' );  ?></p>
								<p class="m-0"><?php the_author_meta( 'user_email' ); ?></p>
								<p class="m-0">Taggar:</p>

							</small>
						</div>
					</div> 
					<?php if ( has_post_thumbnail() ) { ?>
						<div class="rounded bg-light silver-ratio mb-3 news-thumbnail"><div class="news-card-overlay"></div><div class="content"><?php the_post_thumbnail();?></div></div>
					<?php }
					else { ?>
						<div class="rounded bg-light silver-ratio mb-3 news-thumbnail"><div class="news-card-overlay"></div><div class="content"></div></div>
					<?php } ?>

					<?php the_content(); ?>

				</article>
			</div>
		<?php endwhile;  ?>
	</div>
</div>


<?php get_footer(); ?>
