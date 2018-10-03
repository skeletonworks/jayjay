<?php

/**
 * Template Name: Page with form
 *
 */

 get_header(); ?>
<script src="https://simpliform.gavleenergi.se/js/ce/latest"></script>


<?php while ( have_posts() ) : the_post(); ?>

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


        <div class="row  <?php if ( has_post_thumbnail() ) { ?>has_thumbnail <?php } ?>"> 
            <div class="col-md-8 p-md-5">
         <?php  get_template_part( 'template-parts/content', 'breadcrumbs' ); ?>

                <!--<div class="silver-ratio mb-3" style="background: url('<?php echo $bg[0]; ?>'); background-size: cover;"></div> -->

                <?php get_template_part( 'template-parts/content', 'header' ); ?>

                <div id="post-excerpt"  ><?php the_excerpt(); ?></div>
                <div id="post-content"><?php the_content(); ?></div>
                <button id="more" class="btn btn-primary">Läs mer</button>

            </div>

            <?php  get_template_part( 'template-parts/content', 'sidebar' ); ?>
        </div>
    </div>
    <div class="container form-container bg-dark">
        <div class="row">
            <div class="col-6">
            </div>
            <div class="col-6 py-5 px-3">
                <simpli-form form-id="6SiEKo1pQpS60Lfd3C2c"></simpli-form>
            </div>
        </div>
        
    </div>

<?php endwhile; ?>
<?php get_footer(); ?>
