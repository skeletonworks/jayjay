<?php get_header(); ?>


        <?php if ( has_post_thumbnail() ) {  
           $bg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
           <div class="jumbotron header-jumbotron" style="background: url('<?php echo $bg[0]; ?>') no-repeat;">

           <?php }
           else { ?>
            <div class="">

            <?php }
            ?>
            <?php get_template_part( 'template-parts/header', 'navigation' ); ?>
        </div>
    <div id="main-container" class="container">


        <div class="row justify-content-center <?php if ( has_post_thumbnail() ) { ?>has_thumbnail <?php } ?>"> 
            <div class="col-md-8 p-4 p-md-5 ">
                <!--<div class="silver-ratio mb-3" style="background: url('<?php echo $bg[0]; ?>'); background-size: cover;"></div> -->
        <form action="" method="get" class="bg-primary py-5 mb-3"  style="background: url('<?php echo $bg[0]; ?>') no-repeat; background-size: cover;">
                <div class="card-body row no-gutters align-items-center">
                                   <!-- <div class="col-auto">
                                        <i class="fas fa-search"></i>
                                    </div>-->
                                    <div class="col">
                                        <input class="form-control rounded-0 form-control-borderless" type="search" placeholder="Sök" value="<?php the_search_query(); ?>" name="s">
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn btn-success rounded-0" type="submit"> <i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>

			<?php
			while ( have_posts() ) : the_post(); ?>
				<div class="card p-2">
        <strong>
        	<?php if( get_post_type( $post_id ) == 'post'){ echo 'Nyhet:'; }
						elseif( get_post_type( $post_id ) == 'FAQ:'){ echo 'Sida:';}
					else{ echo 'Sida:';}?>
						
					</strong>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
             <?php the_excerpt(); ?>
               </div>
		<?php endwhile; ?>
             <?php global $wp_query; $total_results = $wp_query->found_posts; ?>

            </div>
        </div>
    </div>


<?php
get_footer();
