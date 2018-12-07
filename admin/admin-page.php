<?php

function myplugin_register_settings() {
   add_option( 'myplugin_option_name', 'This is my option value.');
   register_setting( 'myplugin_options_group', 'myplugin_option_name', 'myplugin_callback' );
	 register_setting( 'myplugin_options_group', 'myplugin_option_name_plural', 'myplugin_callback' );
	 register_setting( 'myplugin_options_group', 'myplugin_option_icon', 'myplugin_callback' );
}
add_action( 'admin_init', 'myplugin_register_settings' );

function myplugin_register_options_page() {
  add_options_page('Page Title', 'Plugin Menu', 'manage_options', 'myplugin', 'myplugin_options_page');
}
add_action('admin_menu', 'myplugin_register_options_page');

function myplugin_options_page(){
	?>
		 <div>
		<?php screen_icon(); ?>
		<h1>Nebula Custom Posttype</h1>
		<form method="post" action="options.php">
		<?php settings_fields( 'myplugin_options_group' ); ?>
		<h3>These Are Your Options</h3>
		<p>Choose the settings for your custom posttype here:</p>
		<p>
			<label for="myplugin_option_name">Name (singular):</label><br />
			<input type="text" id="myplugin_option_name" name="myplugin_option_name" value="<?php echo get_option('myplugin_option_name'); ?>" />
		</p>
		<p>
			<label for="myplugin_option_name_plural">Name (plural):</label><br />
			<input type="text" id="myplugin_option_name_plural" name="myplugin_option_name_plural" value="<?php echo get_option('myplugin_option_name_plural'); ?>" />
		</p>
		<p>
			<label for="myplugin_option_icon">Menu icon:</label><br />
			<span class="description">
				(The name of the dashicon of your choice)
			</span><br />
			<input type="text" id="myplugin_option_icon" name="myplugin_option_icon" value="<?php echo get_option('myplugin_option_icon'); ?>" />
		</p>
		<?php  submit_button(); ?>
		</form>
		</div>

	<?php
}

 ?>
