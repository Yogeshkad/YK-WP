<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">


  

    <!-- Custom styles for this template -->
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php wp_head();?>
  </head>

  <body>

  <nav class="navbar navbar-inverse">
    <div class=container>
        <div class=navbar-header>
            <button class=navbar-toggle type=button data-target=#myNavbar data-toggle=collapse><span class=icon-bar></span>
			<span class=icon-bar></span> <span class=icon-bar></span></button><a href="<?php echo get_bloginfo( 'wpurl' );?>" class=navbar-brand> Yogesh Kadvekar</a></div>
        <div class="collapse navbar-collapse" id=myNavbar>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo get_bloginfo( 'wpurl' );?>">Me</a>
               <?php wp_list_pages( '&title_li=' ); ?>
        </div>
    </div>
</nav>

    <div class="matercontainer container">

     