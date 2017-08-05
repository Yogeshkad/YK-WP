<?php get_header(); ?>
	<div class="row">
		<div class="col-sm-8">
			<div class="card-deck"><!-- new card deck code--->
			<div class="container">
			<div class="row">
				<?php 
					if ( have_posts() ) : while ( have_posts() ) : the_post();
  					get_template_part( 'content', get_post_format());
					endwhile; endif;
				?>
				</div>
			</div>
				
			</div> <!--card deck end-->
			<div class="pagingpanel">
			
				<nav aria-label="Page blogroll" class="m nav-inverse"> <!--top navigation menu-->
					<ul class="pagination justify-content-center">
						<li class="page-item"><?php next_posts_link( 'Previous Post' ); ?></li>
						<li class="page-item"><?php previous_posts_link( 'Next Post' ); ?></li>
					</ul>
				</nav><!-- navigation end-->
				</div>
			
		</div> <!-- /.blog-main -->
		<?php get_sidebar(); ?> <!-- include sidebar template-->
	</div> <!-- /.row -->
<?php get_footer(); ?>