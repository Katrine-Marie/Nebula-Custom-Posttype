<div class="wrap">

    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

    <form method="post" action="<?php echo esc_html( admin_url( 'admin-post.php' ) ); ?>">

      <div id="universal-message-container">
        <h2>Create a Posttype</h2>

          <div class="options">
            <p>
              <label>Name</label>
              <br />
              <input type="text" name="nebula-name" value="" required />
            </p>
      			<p>
              <label>Icon</label>
              <br />
              <input type="text" name="nebula-name" value="" />
            </p>
      		</div>
      	<?php 
          wp_nonce_field( 'nebula-settings-save', 'nebula-name' );
          submit_button();
        ?>
      </div><!-- #universal-message-container -->

    </form>

</div><!-- .wrap -->
