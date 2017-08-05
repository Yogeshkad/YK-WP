<div class="row">
		<div class="col-sm-8">
			<div class="card-deck"><!-- new card deck code--->
<? 
$args = array( 'numberposts' => '5' );
$latestpost = php wp_get_recent_posts( $args) 

		foreach( $recent_posts as $recent ){
  					get_template_part( 'content', get_post_format());
		}
				
?>
</div>
</div>
</div>
