<?php
// Add scripts and stylesheets
function startwordpress_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6' );	
	wp_enqueue_style( 'blog', get_template_directory_uri() . '/css/blog.css',array(), '0.0.2' );
	//wp_enqueue_style( 'ykblog', get_template_directory_uri() . '/css/YK.css' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '3.3.6', true );
}

add_action( 'wp_enqueue_scripts', 'startwordpress_scripts' );

// Add Google Fonts
function startwordpress_google_fonts() {
	wp_register_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');
				wp_register_style('OpenSans', '//fonts.googleapis.com/css?family=Open+Sans:400,600,700,800');
				wp_register_style('Pacifico', '//fonts.googleapis.com/css?family=Pacifico');
				wp_register_style('Roboto', '//fonts.googleapis.com/css?family=Roboto');
				wp_enqueue_style( 'OpenSans');
				wp_enqueue_style( 'Pacifico');
				wp_enqueue_style( 'Roboto');
				wp_enqueue_style( 'font-awesome');
		}

add_action('wp_print_styles', 'startwordpress_google_fonts');

// to overrid the title of the each page with page title + blog title
add_theme_support( 'title-tag' );

// Support Featured Images
add_theme_support( 'post-thumbnails' );
// custom excerpt lenght setting from admin panel
function custom_excerpt_length() {
	return get_option( 'customexcerptlenght' );
}
add_filter('excerpt_length', 'custom_excerpt_length');

// Custom settings
function custom_settings_add_menu() {
  add_menu_page( 'Custom Settings', 'Custom Settings', 'manage_options', 'custom-settings', 'custom_settings_page', null, 99 );
}
add_action( 'admin_menu', 'custom_settings_add_menu' );

// Create Custom Global Settings function name should be as mention in above code
function custom_settings_page() { ?>
  <div class="wrap">
	<h1>Custom Settings</h1>
	<form method="post" action="options.php">
	   <?php
		   settings_fields( 'section' );
		   do_settings_sections( 'theme-options' );      
		   submit_button(); 
	   ?>          
	</form>
  </div>
<?php }

// Twitter
function setting_twitter() { ?>
  <input type="text" name="twitter" id="twitter" value="<?php echo get_option( 'twitter' ); ?>" />
<?php }
// add code for githublink
function setting_github() { ?>
  <input type="text" name="github" id="github" value="<?php echo get_option('github'); ?>" />
<?php }

function setting_excerpt(){ ?>
<input type="text" name="customexcerptlenght" id="customexcerptlenght" value="<?php echo get_option( 'customexcerptlenght' ); ?>" />
<?php }

function custom_settings_page_setup() {
  add_settings_section( 'section', 'Social Media Link Settings', null, 'theme-options' );
  add_settings_field( 'twitter', 'Twitter URL', 'setting_twitter', 'theme-options', 'section' );

   add_settings_field( 'github', 'Github URL', 'setting_github', 'theme-options', 'section' );
   register_setting('section', 'github');
	register_setting('section', 'twitter');
	
	// add setting for excerpt lenght
	add_settings_section( 'sectionformating', 'Formating Settings', null, 'theme-options' );
	add_settings_field( 'customexcerptlenght', 'Enter excerpt lenght', 'setting_excerpt', 'theme-options', 'section' );
	register_setting('section', 'customexcerptlenght');
}

add_action( 'admin_init', 'custom_settings_page_setup' );

function create_my_custom_post() {
	register_post_type('my-custom-post',
			array(
			'labels' => array(
					'name' => __('My Custom Post'),
					'singular_name' => __('My Custom Post'),
			),
			'public' => true,
			'has_archive' => true,
			'supports' => array(
					'title',
					'editor',
					'thumbnail',
				  'custom-fields'
			)
	));
}
add_action('init', 'create_my_custom_post'); 
?>