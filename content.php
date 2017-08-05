  <div class="col-sm-6">
  <div class="card mb-3 ">
  
 
  
  <?php 
  
  
 //to show the post thumbnail below is code 
if ( has_post_thumbnail() ) {?> <img class="card-img-top img-fluid" src="<?php the_post_thumbnail_url();?>" alt="Card image cap"><?php } else {?> <img class="card-img-top img-fluid" src="<?php echo get_bloginfo( 'template_directory' );?>/images/default_image.PNG" alt="Card image cap"><?php } ?>
 <div class="card-block">
      <h4 class="card-title"><?php the_title(); ?></h4>
      <div class="card-text"><?php the_excerpt(); ?>
	  <small class="text-muted">Last updated <?php echo get_the_date(); ?></small>
	  </div>
	  
    </div>
    <div class="card-footer">
      <small class="text-muted"><a href="<?php the_permalink(); ?>">Read More</a></small>
    </div>
  
  </div>
  </div>





