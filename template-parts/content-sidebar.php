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

<?php $posts = get_field('related'); if( $posts ): ?>
<?php foreach( $posts as $post):?>
  <?php setup_postdata($post); ?>

  <a class="p-5 d-block sidebar-block mb-3 bg-white text-center hvr-underline-from-left" href="<?php the_permalink(); ?>">
   <div>
    <i class="round-icon fal fa-2x mb-2 rounded-circle fa-fw <?php the_field('icon'); ?>"></i>
  </div>
  <h5 class="d-block"><?php the_title(); ?></h5>
  <?php if ( get_field( 'ingress_puff' ) ): ?>
    <p><?php the_field('ingress_puff'); ?></p><?php else: ?>
    <p><?php echo wp_trim_words( get_field('ingress'), 12, '...' );?></p>
  <?php endif;?>
</a>

<?php endforeach; ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>

 
          
</aside>

