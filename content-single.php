<div class="blog-post">

	<h1 class="blog-post-title"><?php the_title(); ?></h1>
	<p class="blog-post-meta"><?php the_date(); ?> by <a href="#"><?php the_author(); ?></a></p>
	<?php if ( has_post_thumbnail() ) {?>
  <img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive"/>
<?php } ?>
<div class="blog-post-content">
 <?php the_content(); ?> </div>
</div><!-- /.blog-post -->