<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <script>
        $(document).ready(function () {
            $('#sidebarCollapse, #dismiss').on('click', function () {
                $('#sidebar').toggleClass('active');
                $('#sidebarCollapse').toggleClass('active');
            });
        });
        $(document).ready(function () {
            $('#more').click(function() {
                $('#post-excerpt').hide();
                $('#post-content').show();
                $(this).remove();
            });
        });
    </script>
    <div class="wrapper">
        <nav id="sidebar" >

<!--
            <div id="dismiss" class="p-4">
                <i class="fal fa-2x fa-arrow-left"></i>
            </div>
-->
<?php $bg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>


            <form action="" method="get" class="bg-dark py-5 mb-3"  style="background: url('<?php echo $bg[0]; ?>') no-repeat; background-size: cover;">
                <div class="card-body row no-gutters align-items-center">
                                   <!-- <div class="col-auto">
                                        <i class="fas fa-search"></i>
                                    </div>-->
                                    <div class="col">
                                        <input class="form-control rounded-0 form-control-borderless" type="search" placeholder="Search" value="<?php the_search_query(); ?>" name="s">
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn btn-success rounded-0" type="submit"> <i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>



                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'container'       => 'div',
                                'menu_class'      => 'list-unstyled',
                                'depth'           => 3,
                                'container_id' => 'menu', 
                            ));
                            ?> 
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'secondary',
                                'container'       => 'div',
                                'menu_class'      => 'list-unstyled',
                                'depth'           => 3,
                                'container_id' => 'secondary-menu', 
                                'walker'          => new Nav_Description,

                            ));
                            ?> 
                        </nav>
                        <div id="content">