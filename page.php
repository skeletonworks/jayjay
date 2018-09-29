<?php get_header(); ?>


<?php while ( have_posts() ) : the_post(); ?>
    <?php $bg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
    <div class="bg-light mb-5">
        <div class="" style="background: url('<?php echo $bg[0]; ?>') no-repeat; background-attachment:fixed; background-size: cover;">
            <?php  get_template_part( 'template-parts/header', 'navigation' ); ?>
        </div>
    </div>
    <div id="main-container" class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6 col-md-7">
                <?php  //get_template_part( 'template-parts/content', 'breadcrumbs' ); ?>
                <?php $bg = wp_get_attachment_image_src( get_post_thumbnail_id($p->ID), 'full' );?>

                <!--<div class="silver-ratio mb-3" style="background: url('<?php echo $bg[0]; ?>'); background-size: cover;"></div> -->

                <?php get_template_part( 'template-parts/content', 'header' ); ?>

                <?php the_content(); ?>

            </div>

            <?php  get_template_part( 'template-parts/content', 'sidebar' ); ?>
        </div>
    </div>

<?php endwhile; ?>
<?php get_footer(); ?>
