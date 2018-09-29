<aside class="col col-md-4 col-lg-3 p-4">
  
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

  <div class="mb-4" id="submenu">
    <h5 class="text-uppercase d-block"><?php echo get_page(array_pop(get_post_ancestors($post->ID)))->post_title; ?></h5>
<hr>
    <ul class="list-unstyled">
      <?php echo $children; ?>                           
    </ul>
  </div>

<?php } ?>

</aside>

