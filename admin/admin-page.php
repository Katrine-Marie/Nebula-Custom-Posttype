<?php

function nebulaPT_register_settings() {
   add_option( 'nebulaPT_option_name', 'Custom Posttype');
   add_option( 'nebulaPT_option_name_plural', 'Custom Posttypes');
   add_option( 'nebulaPT_option_icon', 'dashicons-admin-post');

   register_setting( 'nebulaPT_options_group', 'nebulaPT_option_name', 'nebulaPT_callback' );
	 register_setting( 'nebulaPT_options_group', 'nebulaPT_option_name_plural', 'nebulaPT_callback' );
	 register_setting( 'nebulaPT_options_group', 'nebulaPT_option_icon', 'nebulaPT_callback' );
}
add_action( 'admin_init', 'nebulaPT_register_settings' );

function nebulaPT_register_options_page() {
  add_options_page('Nebula Custom Posttype', 'Custom Posttype', 'manage_options', 'nebulaPT', 'nebulaPT_options_page');
}
add_action('admin_menu', 'nebulaPT_register_options_page');

function nebulaPT_options_page(){
	?>
		 <div>
		<?php screen_icon(); ?>
		<h1>Nebula Custom Posttype</h1>
		<form method="post" action="options.php">
		<?php settings_fields( 'nebulaPT_options_group' ); ?>
		<h3>These Are Your Options</h3>
		<p>Choose the settings for your custom posttype here:</p>
		<p>
			<label for="nebulaPT_option_name">Name (singular):</label><br />
			<input type="text" id="nebulaPT_option_name" name="nebulaPT_option_name" value="<?php echo get_option('nebulaPT_option_name'); ?>" />
		</p>
		<p>
			<label for="nebulaPT_option_name_plural">Name (plural):</label><br />
			<input type="text" id="nebulaPT_option_name_plural" name="nebulaPT_option_name_plural" value="<?php echo get_option('nebulaPT_option_name_plural'); ?>" />
		</p>
		<p>
			<label for="nebulaPT_option_icon">Menu icon:</label><br />
			<span class="description">
				(The name of the dashicon of your choice)
			</span><br />
			<input type="text" id="nebulaPT_option_icon" name="nebulaPT_option_icon" value="<?php echo get_option('nebulaPT_option_icon'); ?>" />
		</p>
		<?php  submit_button(); ?>
		</form>
		</div>

	<?php
}

 ?>
