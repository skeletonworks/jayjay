<?php
require get_template_directory() . '/inc/functions/breadcrumbs.php';

add_theme_support( 'post-thumbnails' );

function skeleton_enqueue_styles() {
    wp_register_style('bootstrap', get_template_directory_uri() . '/inc/bootstrap/css/bootstrap.min.css' );
    $dependencies = array('bootstrap');
	wp_enqueue_style( 'skeleton_enqueue_style', get_stylesheet_uri(), $dependencies ); 
}

function skeleton_enqueue_scripts() {
    $dependencies = array('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/inc/bootstrap/js/bootstrap.min.js', $dependencies, '', true );
    wp_enqueue_style( 'fontawesome-cdn', 'https://use.fontawesome.com/releases/v5.1.0/css/all.css' );
}

add_action( 'wp_enqueue_scripts', 'skeleton_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'skeleton_enqueue_scripts' );

function skeleton_wp_setup() {
    add_theme_support( 'title-tag' );
}

add_action( 'after_setup_theme', 'skeleton_wp_setup' );

function register_my_menu() {
    register_nav_menu('primary',__( 'Primary' ));
    register_nav_menu('secondary',__( 'Secondary' )); 
    register_nav_menu('footer',__( 'Footer' ));

}
add_action( 'init', 'register_my_menu' );


function m1_customize_register( $wp_customize ) {
    $wp_customize->add_setting( 'the_logo' ); // Add setting for logo uploader
         
        // Add control for logo uploader (actual uploader)
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'the_logo', array(
            'label'    => __( 'Logo', 'jayjay' ),
            'section'  => 'title_tagline',
            'settings' => 'the_logo',
        ) ) );


    $wp_customize->add_setting( 'the_nav_img' ); // Add setting for logo uploader
         
        // Add control for logo uploader (actual uploader)
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'the_nav_img', array(
            'label'    => __( 'Nav img', 'jayjay' ),
            'section'  => 'title_tagline',
            'settings' => 'the_nav_img',
        ) ) );

        $wp_customize->add_setting('the_link', array(
        'default'        => '/login',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));

          $wp_customize->add_control('the_link', array(
            'label'      => __('Button', 'jayjay'),
            'section'    => 'title_tagline',
            'settings'   => 'the_link',
        ));

}
add_action( 'customize_register', 'm1_customize_register' );

/**
 * Load custom WordPress nav walker.
 */
if ( ! class_exists( 'wp_bootstrap_navwalker' )) {
    require_once(get_template_directory() . '/inc/navwalker.php');
}


/* Reading time */
function prefix_estimated_reading_time( $content = '', $wpm = 300 ) {
$clean_content = strip_shortcodes( $content );
$clean_content = strip_tags( $clean_content );
$word_count = str_word_count( $clean_content );
$time = ceil( $word_count / $wpm );
return $time;
}



add_action('wp_enqueue_scripts', 'cssmenumaker_scripts_styles' );

function cssmenumaker_scripts_styles() {  
 //  wp_enqueue_script('cssmenu-scripts', get_template_directory_uri() . '/inc/cssmenu/script.js');
}

class CSS_Menu_Maker_Walker extends Walker {

  var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul>\n";
  }

  function end_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul>\n";
  }

  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

    global $wp_query;
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    $class_names = $value = '';        
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;

    /* Add active class */
    if(in_array('current-menu-item', $classes)) {
      $classes[] = 'active';
      unset($classes['current-menu-item']);
    }

    /* Check for children */
    $children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
    if (!empty($children)) {
      $classes[] = 'has-sub';
    }

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

    $output .= $indent . '<li' . $id . $value . $class_names .'>';

    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'><span>';
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= '</span></a>';
    $item_output .= $args->after;

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }

  function end_el( &$output, $item, $depth = 0, $args = array() ) {
    $output .= "</li>\n";
  }
}

class Nav_Description extends Walker_Nav_Menu
{
    /**
     * Start the element output.
     *
     * @param  string $output Passed by reference. Used to append additional content.
     * @param  object $item   Menu item data object.
     * @param  int $depth     Depth of menu item. May be used for padding.
     * @param  array|object $args    Additional strings. Actually always an 
                                     instance of stdClass. But this is WordPress.
     * @return void
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
    {
        $classes     = empty ( $item->classes ) ? array () : (array) $item->classes;

        $class_names = join(
            ' '
        ,   apply_filters(
                'nav_menu_css_class'
            ,   array_filter( $classes ), $item
            )
        );

        ! empty ( $class_names )
            and $class_names = ' class="'. esc_attr( $class_names ) . '"';

        $output .= "<li id='menu-item-$item->ID' $class_names>";

        $attributes  = '';

        ! empty( $item->attr_title )
            and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
        ! empty( $item->target )
            and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
        ! empty( $item->xfn )
            and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
        ! empty( $item->url )
            and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';

        // insert description for top level elements only
        // you may change this
        $description = ( ! empty ( $item->description ) and 0 == $depth )
            ? '<small class="nav_desc">' . esc_attr( $item->description ) . '</small>' : '';

        $title = apply_filters( 'the_title', $item->title, $item->ID );

        $item_output = $args->before
            . "<a $attributes>"
            . $args->link_before
            . $title
            . '</a> '
            . $args->link_after
            . $description
            . $args->after;

        // Since $output is called by reference we don't need to return anything.
        $output .= apply_filters(
            'walker_nav_menu_start_el'
        ,   $item_output
        ,   $item
        ,   $depth
        ,   $args
        );
    }
}
?>