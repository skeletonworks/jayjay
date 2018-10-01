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

</script>
<div class="wrapper">
    <nav id="sidebar" >
        <div id="dismiss" class="p-4">
            <i class="fal fa-2x fa-arrow-left"></i>
        </div>
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