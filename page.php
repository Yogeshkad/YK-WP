<?php get_header(); ?>
	<div class="row content">
		<div class="col-sm-8 ">

			<?php 
				if ( have_posts() ) : while ( have_posts() ) : the_post();
  	
					get_template_part( 'content', get_post_format() );
  
				endwhile; endif; 
			?>

		</div> <!-- /.col -->
		<?php get_sidebar(); ?>
	</div> <!-- /.row -->

<?php get_footer(); ?>