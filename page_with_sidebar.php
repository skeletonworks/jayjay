<?php

/**
 * Template Name: Page with sidebar
 *
 */

 get_header(); ?>


<?php while ( have_posts() ) : the_post(); ?>

        <?php if ( has_post_thumbnail() ) {  
           $bg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
           <div class="jumbotron header-jumbotron" style="background: url('<?php echo $bg[0]; ?>') no-repeat; background-attachment:fixed; background-size: cover;">

           <?php }
           else { ?>
            <div class="bg-light">

            <?php }
            ?>
            <?php get_template_part( 'template-parts/header', 'navigation' ); ?>
        </div>
    <div id="main-container" class="container">
         <?php  get_template_part( 'template-parts/content', 'breadcrumbs' ); ?>

        <div class="row justify-content-center  <?php if ( has_post_thumbnail() ) { ?> has_thumbnail <?php } ?>"> 
            <div class="col-md-7 pb-4">

                <!--<div class="silver-ratio mb-3" style="background: url('<?php echo $bg[0]; ?>'); background-size: cover;"></div> -->

                <?php get_template_part( 'template-parts/content', 'header' ); ?>

                <?php the_content(); ?>

            </div>

            <?php  get_template_part( 'template-parts/content', 'sidebar' ); ?>
        </div>
    </div>

<?php endwhile; ?>
<?php get_footer(); ?>
