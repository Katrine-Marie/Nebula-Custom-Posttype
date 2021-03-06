<?php

namespace nebula\pt;

class posttypeAdmin {
  public function __construct(){
		add_action( 'admin_init', array($this, 'nebulaPT_register_settings') );
		add_action('admin_menu', array($this, 'nebulaPT_register_options_page') );
		add_action( 'admin_enqueue_scripts',array($this, 'nebulaPT_enqueue_admin_style') );

	}

  public function nebulaPT_register_settings() {
		add_option( 'nebulaPT_option_name', 'Custom Posttype');
		add_option( 'nebulaPT_option_name_plural', 'Custom Posttypes');
		add_option( 'nebulaPT_option_icon', 'dashicons-admin-post');

		$settingsArray = array (
			'nebulaPT_option_name',
			'nebulaPT_option_name_plural',
			'nebulaPT_option_icon'
		);

		foreach ($settingsArray as $setting) {
			register_setting( 'nebulaPT_options_group', $setting, 'nebulaPT_callback');
		}
	}

	public function nebulaPT_register_options_page() {
		global $page_hook_suffix;
		$page_hook_suffix = add_options_page('Nebula Custom Posttype', 'Custom Posttype', 'manage_options', 'nebulaPT', array($this,'nebulaPT_options_page'));
	}

	public function nebulaPT_enqueue_admin_style($hook) {
			global $page_hook_suffix;
			if( $hook != $page_hook_suffix )
					return;
			wp_register_style('options_page_style', plugins_url('admin-style.css',__FILE__));
			wp_enqueue_style('options_page_style');
	}

	public function nebulaPT_options_page(){
		?>
		<div class="wrap nebulaCustomPosttype">
			<?php screen_icon(); ?>
			<h2>Nebula Custom Posttype</h2>
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
						(Choose which icon should represent your custom posttype)
					</span><br />

					<?php
						$icon_array = array(
							'dashicons-admin-post',
							'dashicons-calendar-alt',
							'dashicons-format-aside',
							'dashicons-format-gallery',
							'dashicons-format-video',
							'dashicons-format-audio'
						);

						foreach($icon_array as $key => $value){
							// echo $key . ' ' . $value;

							echo '<label for="nebulaPT_option_icon1"><span class="dashicons ' . $value . '"></span></label>
					<input type="radio" id="nebulaPT_option_icon1" name="nebulaPT_option_icon" value="' . $value . '"';
							checked( $value, get_option( 'nebulaPT_option_icon' ) );
							echo '><br />';

						}
					?>

				</p>
				<?php  submit_button(); ?>
			</form>
		</div>
		<?php
	}
}

new posttypeAdmin();
