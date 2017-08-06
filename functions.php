<?php
// Add scripts and stylesheets
function startwordpress_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6' );	
	wp_enqueue_style( 'blog', get_template_directory_uri() . '/css/blog.css',array(), '0.0.2' );
	//wp_enqueue_style( 'ykblog', get_template_directory_uri() . '/css/YK.css' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '3.3.6', true );
	wp_enqueue_script( 'prism', 'https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js', array(), '1.0.0', true );
	
}

add_action( 'wp_enqueue_scripts', 'startwordpress_scripts' );

// Add Google Fonts
function startwordpress_google_fonts() {
	wp_register_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');
				wp_register_style('OpenSans', '//fonts.googleapis.com/css?family=Open+Sans:400,600,700,800|Pacifico|Roboto:400,700,900');				
				wp_enqueue_style( 'OpenSans');				
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

// Linkedin
function setting_linkedin() { ?>
  <input type="text" name="linkedin" id="linkedin" value="<?php echo get_option( 'linkedin' ); ?>" />
<?php }
// add code for githublink
function setting_github() { ?>
  <input type="text" name="github" id="github" value="<?php echo get_option('github'); ?>" />
<?php }

// add footernote
function setting_footernote() { ?>
  <input type="text" name="customfooterhello" id="customfooterhello" value="<?php echo get_option('customfooterhello'); ?>" />
<?php }

function setting_excerpt(){ ?>
<input type="text" name="customexcerptlenght" id="customexcerptlenght" value="<?php echo get_option( 'customexcerptlenght' ); ?>" />
<?php }

function custom_settings_page_setup() {
	add_settings_section( 'section', 'Social Media Link Settings', null, 'theme-options' );
	add_settings_field( 'linkedin', 'Linkedin URL', 'setting_linkedin', 'theme-options', 'section' );
	add_settings_field( 'twitter', 'Twitter URL', 'setting_twitter', 'theme-options', 'section' );
	add_settings_field( 'github', 'Github URL', 'setting_github', 'theme-options', 'section' );
	register_setting('section', 'github');
	register_setting('section', 'twitter');
	register_setting('section', 'linkedin');
	
	// add cutom setting for footer hellonote
	add_settings_field( 'customfooterhello', 'Enter Footer Note ( above Social media icons)', 'setting_footernote', 'theme-options', 'section' );
	register_setting('section', 'customfooterhello');
	
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

//function to add bootstrap responive image class on all images

function add_image_responsive_class($content) {
   global $post;
   $pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
   $replacement = '<img$1class="$2 img-fluid"$3>';
   $content = preg_replace($pattern, $replacement, $content);
   return $content;
}
add_filter('the_content', 'add_image_responsive_class');

?>