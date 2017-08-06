</div><!-- /.container -->

 
	<div class=container id=followusonsocialmedia>
    <div class=followus>
        <center>
		<p><?php echo get_option('customfooterhello'); ?></p>
            <ul class="social-circle social-network">
                <li><a href=<?php echo get_option('twitter'); ?> class=icoTwitter title=Twitter><i class="fa fa-twitter"></i></a>
                    <li><a href=<?php echo get_option('linkedin'); ?> class=icoLinkedin title=Linkedin><i class="fa fa-linkedin"></i></a>
					<li><a href="<?php echo get_option('github');?>" class=icoGithub title=Github><i class="fa fa-github"></i></a>
					</ul>
        </center>
    </div>
</div>
<?php wp_footer(); ?>

  
  </body>
</html>
