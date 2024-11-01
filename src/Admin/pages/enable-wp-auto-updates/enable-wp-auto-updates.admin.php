<?php

use WPAutoUpdates\EnableAutoUpdate;

	/**
	 * Get update status.
	 */
	$auto_updates = get_option( 'wpeu_enable_auto_updates', array() );

	// Save Data.
	if ( isset( $_POST['submit_auto_update'] ) ) : // @codingStandardsIgnoreLine

    // lets verify the nonce.
    if ( ! $this->form()->verify_nonce() ) {
	    wp_die( $this->form()->user_feedback( 'Verification Failed !!!', 'error') ); // @codingStandardsIgnoreLine
    }
        /**
         * Make sure this is set if not load empty array
         */
        if ( ! isset( $_POST['updatetypes'] ) ) { // @codingStandardsIgnoreLine
         	$wpeu_auto_updates = array();
          	update_option( 'wpeu_enable_auto_updates', $wpeu_auto_updates ); // @codingStandardsIgnoreLine
          	echo $this->form()->user_feedback( ' Updated <strong>No Updates Have Been Set</strong> !!!', 'warning'); // @codingStandardsIgnoreLine
        } else {

	        // sanitize.
	        foreach ( $_POST['updatetypes'] as $uptkey => $uptval ) { // @codingStandardsIgnoreLine
	            $wpeu_auto_updates[ $uptkey ] = sanitize_text_field( $uptval );
	        }
	        // update and provide feedback.
	        update_option( 'wpeu_enable_auto_updates', $wpeu_auto_updates );
	        echo $this->form()->user_feedback( 'Options Have Been Updated !!!' ); // @codingStandardsIgnoreLine
        }

	endif;

?><div id="frmwrap" >
    <h2>
		<?php _e( 'Auto Update Settings' ); // @codingStandardsIgnoreLine ?>
	</h2>
    	<hr/>
    <div class="description">
      	<?php _e( 'Choose what you want to update' ); // @codingStandardsIgnoreLine ?>
    </div>
  	<p/>
  	<form action="" method="POST"	enctype="multipart/form-data">
		<?php

	foreach ( EnableAutoUpdate::updatelist() as $utkey => $utval ) {
	    if ( in_array( $utval, get_option( 'wpeu_enable_auto_updates', array() ), true ) ) {
	      	$upt_style   = 'style="background-color: #dff0d8;border-color: #d6e9c6;color: #4B8A3B; padding: 8px;border-bottom: solid thin;"';
	      	$upotchecked = 'checked';
	      	echo EnableAutoUpdate::checkbox( $utval, $upotchecked, $upt_style ); // @codingStandardsIgnoreLine
	    } else {
		    $upt_style   = 'style="background-color: #F5F5F5;color: #555555; padding: 8px;"';
		    $upotchecked = '';
		    echo EnableAutoUpdate::checkbox( $utval, $upotchecked, $upt_style ); // @codingStandardsIgnoreLine
	    }
	}
	echo '<p/>';


	// generate nonce_field.
	$this->form()->nonce();

	// submit button.
	echo $this->form()->submit_button( 'Save Settings', 'primary large', 'submit_auto_update' ); // @codingStandardsIgnoreLine
		?>
		</form>
	<br/>
</div><!--frmwrap-->
