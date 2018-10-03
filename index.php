
<?php get_header(); ?>
 
            <?php get_template_part( 'template-parts/header', 'navigation' ); ?>

        <div id="main-container" class="container bg-white">
            <div class="row  justify-content-center">
                <div class="col-sm-8 col-md-9">
                    <?php
                    $query1 = new WP_Query(  array( 'posts_per_page' => 1 )  );
                    if ( $query1->have_posts() ) {
                        while ( $query1->have_posts() ) {
                            $query1->the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" class="my-5 pb-4 border-bottom" <?php post_class(); ?>>
                                <a href="<?php the_permalink(); ?>" class="news-card">

                                    <?php if ( has_post_thumbnail() ) { ?>
                                        <div class="rounded bg-light silver-ratio mb-3 news-thumbnail"><div class="news-card-overlay"></div><div class="content"><?php the_post_thumbnail();?></div></div>
                                    <?php }
                                    else { ?>
                                        <div class="rounded bg-light silver-ratio mb-3 news-thumbnail"><div class="news-card-overlay"></div><div class="content"><img src="http://fpoimg.com/960x400"></div></div>
                                    <?php } ?>
                                    <?php the_title( '<h2 class="h3 mb-3">', '</h2>' ); ?>
                                </a>
                                 <small class="m-0">Publicerat den <?php the_date(); ?> av <a href="<?php the_author_meta( 'user_email' ); ?>"><?php the_author_meta( 'display_name' );  ?></a>  <i class="fal fa-clock"></i> <?php echo prefix_estimated_reading_time( get_the_content() ); ?> min läsning</small>
                              
                                
                                <?php the_excerpt(); ?>     
                                <a class="btn btn-info" href="<?php the_permalink(); ?>">Läs mer</a>
                                  
                                         
                                    


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

                                        <article id="post-<?php the_ID(); ?>" class="col-6 col-md-4 mb-3" <?php post_class(); ?>>
                                            <a href="<?php the_permalink(); ?>" class="news-card">

                                                <?php if ( has_post_thumbnail() ) { ?>
                                                    <div class="rounded bg-light silver-ratio mb-3 news-thumbnail"><div class="news-card-overlay"></div><div class="content"><?php the_post_thumbnail();?></div></div>
                                                <?php }
                                                else { ?>
                                                    <div class="rounded bg-light silver-ratio mb-3 news-thumbnail"><div class="news-card-overlay"></div><div class="content"><img src="http://fpoimg.com/960x400"></div></div>
                                                <?php } ?>
                                                <small><?php the_date(); ?></small><br>
 
                                                <?php the_title( '<strong>', '</strong>' ); ?><br> 

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
