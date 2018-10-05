  
 <?php function has_children() {
  global $post;

  $children = get_pages( array( 'child_of' => $post->ID ) );
  if( count( $children ) == 0 ) {
    return false;
  } else {
    return true;
  }
} ?>

<?php
if($post->post_parent) 
  $children = wp_list_pages("sort_column=menu_order&depth=1&title_li=&child_of=".$post->post_parent."&echo=0");
else
  $children = wp_list_pages("sort_column=menu_order&depth=1&title_li=&child_of=".$post->ID."&echo=0");
if ($children) { ?>
  <aside class="col-md-4 p-4 p-md-5 bg-light">

  <div class="mb-4 d-none d-sm-block" id="submenu">
    <h5 class="text-uppercase d-block"><?php echo get_page(array_pop(get_post_ancestors($post->ID)))->post_title; ?></h5>
      <hr>
    <ul class="list-unstyled ">
      <?php echo $children; ?>                           
    </ul>
  </div>
<form class="d-block d-sm-none" action="<?php bloginfo('url'); ?>" method="get">
    <?php
    $select = wp_dropdown_pages("sort_column=menu_order&show_option_none=Relaterad sidor&child_of=".$post->ID."&echo=0");

    echo str_replace('<select ', '<select class="form-control " onchange="this.form.submit()" ', $select);
    ?>
</form>
                 

</aside>

<?php } ?>


