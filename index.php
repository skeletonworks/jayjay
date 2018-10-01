
<?php get_header(); ?>
    <div class="mb-5">
        <div class="bg-light">
            <?php get_template_part( 'template-parts/header', 'navigation' ); ?>
        </div>
    </div>
        <div id="main-container" class="container">
            <div class="row">
                <div class="col-sm-8 col-md-9 bg-white p-sm-5">
                    <?php
                    $query1 = new WP_Query(  array( 'posts_per_page' => 1 )  );
                    if ( $query1->have_posts() ) {
                        while ( $query1->have_posts() ) {
                            $query1->the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" class="col-12 mb-5 pb-3" <?php post_class(); ?>>
                                <a href="<?php the_permalink(); ?>" class="news-card">

                                    <?php if ( has_post_thumbnail() ) { ?>
                                        <div class="rounded bg-light silver-ratio mb-3 news-thumbnail"><div class="news-card-overlay"></div><div class="content"><?php the_post_thumbnail();?></div></div>
                                    <?php }
                                    else { ?>
                                        <div class="rounded bg-light silver-ratio mb-3 news-thumbnail"><div class="news-card-overlay"></div><div class="content"></div></div>
                                    <?php } ?>
                                    <?php the_title( '<h2 class="h3 mb-3">', '</h2>' ); ?>
                                </a>
                                <div class="reading-time font-weight-bold">
                                    <i class="fal fa-clock"></i> <?php echo prefix_estimated_reading_time( get_the_content() ); ?> min läsning
                                </div>  
                                
                                <?php the_excerpt(); ?>     
                                <a class="btn btn-info" href="<?php the_permalink(); ?>">Läs mer</a>
                                <div class="row border-top border-bottom py-3 mt-3 no-gutters">
                                    <div class="col-md-auto mr-3">

                                        <?php 
                                            $author_id = get_the_author_meta('ID');
                                            echo $author_id;
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



                                    </article>

                                <?php   }
                                wp_reset_postdata();
                            }

                            /* The 2nd Query (without global var) */
                            $query2 = new WP_Query( array( 'offset' => 1 ) );

                            if ( $query2->have_posts() ) { ?>
                                <div class="row">
                                    <?php while ( $query2->have_posts() ) {
                                        $query2->the_post(); ?>

                                        <article id="post-<?php the_ID(); ?>" class="col-4 mb-3" <?php post_class(); ?>>
                                            <a href="<?php the_permalink(); ?>" class="news-card">

                                                <?php if ( has_post_thumbnail() ) { ?>
                                                    <div class="rounded bg-light silver-ratio mb-3 news-thumbnail"><div class="news-card-overlay"></div><div class="content"><?php the_post_thumbnail();?></div></div>
                                                <?php }
                                                else { ?>
                                                    <div class="rounded bg-light silver-ratio mb-3 news-thumbnail"><div class="news-card-overlay"></div><div class="content"></div></div>
                                                <?php } ?>
                                                <?php the_title( '<strong>', '</strong>' ); ?><br>
                                                <div class="reading-time font-weight-bold">
                                                    <small><i class="fa fa-clock"></i> <?php echo prefix_estimated_reading_time( get_the_content() ); ?> min läsning</small>
                                                </div>  
                                                <small><?php the_date(); ?></small>

                                            </a>
                                        </article>


                                    <?php   }
                                    wp_reset_postdata();
                                }

                                ?>
                            </div>
                    
                        </div>
                    </div>
                </div>

    <?php get_footer(); ?>
