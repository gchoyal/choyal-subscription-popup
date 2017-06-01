<?php 
/**
Plugin Name: Choyal Subscription Popup
Plugin URI: https://wordpress.org/plugins/choyal-subscription-popup/
Description: Choyal Subscription Popup is plugin that can be use as newsletter subscription and support mailchimp. Popup is fully customizable in term of design and structure, many inbuilt animation available for subscription model. You can change color, text and background image of model.
Author: Girdhari choyal
Version: 1.0
Author URI: https://about.me/gchoyal
*/

define( 'CSP_ASSETS_PATH', plugin_dir_url( __FILE__ ) . 'assets/' );
define( 'CSP_MAILCHIMP_API_KEY', get_option('mail-chimp-api-key') );
define( 'CSP_MAILCHIMP_SELECTED_LIST_ID', get_option('mail-chimp-list-id') );
	
function csp_enqueue_style() {
	
	$disablePopup = get_option('disable-popup');
	
	if( !$disablePopup || $disablePopup == 'no' ){
		
		wp_enqueue_style( 'csp-style', CSP_ASSETS_PATH. 'css/style.css', false ); 
	
	}
	
}

function csp_enqueue_script() {
	
	$disablePopup = get_option('disable-popup');
	
	if( !$disablePopup || $disablePopup == 'no' ){
		
		wp_enqueue_script( 'csp-js-validate', CSP_ASSETS_PATH. 'js/jquery.validate.min.js', array('jquery', 'csp-js'), '1.0.0', true );
		wp_enqueue_script( 'csp-js', CSP_ASSETS_PATH. 'js/script.js', array('jquery'), '1.0.0', true );
		
		wp_localize_script( 'csp-js', 'csp_ajax', array(
			'ajax_url' => admin_url( 'admin-ajax.php' )
		));
	
	}
	
}

add_action( 'wp_enqueue_scripts', 'csp_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'csp_enqueue_script' );

function csp_model_html(){
	
	$disablePopup = get_option('disable-popup');
	$disableFnameLname = get_option('disable-fname-lname');
	
	if( !$disablePopup || $disablePopup == 'no' ){
	
	?>
	
	<a class="csp_subscribe_btn" href="#" title="subscribe" >
		<img src="<?php echo CSP_ASSETS_PATH.'/img/mail.png'; ?>" class="csp_btn_img_icon" >
	</a>
	
	<div class="csp_overlay" >
	
		<div class="csp_model" >
	
			<div class="csp_content" >
				
				<div class="csp_close"></div>
				
				<div class="csp_api_msg"></div>
				
				<h1>Join our subscribers</h1>
				
				<p>Sign up here and we'll keep you in the loop on all things product</p>
				
				<form action="" method="post" id="email-subscription-form" >
					
					<?php if( !$disableFnameLname || $disableFnameLname == 'no' ){ ?>
					
					<div class="scp_half_row" >
					
						<div class="csp_row">
							<label for="csp_fname">First Name</label>
						</div>
						
						<div class="csp_row csp_row_input">
							<input type="text" id="csp_fname" name="csp_fname" class="csp_input" required>
						</div>
					
					</div>
					
					<div class="scp_half_row" >
					
						<div class="csp_row">
							<label for="csp_lname">Last Name</label>
						</div>
						
						<div class="csp_row csp_row_input">
							<input type="text" id="csp_lname" name="csp_lname" class="csp_input" required>
						</div>
						
					</div>
					
					<?php } ?>
					
					<div class="csp_row">
						<label for="csp_email">Email</label>
					</div>
					
					<div class="csp_row csp_row_input">
						<input type="email" id="csp_email" name="csp_email" class="csp_input" required>
					</div>
					
					<div class="csp_row">
						<button type="submit" name="csp_submit" class="csp_btn" >Subscribe Now <img class="csp_loader" src="<?php echo CSP_ASSETS_PATH.'/img/ripple.svg'; ?>" onerror="this.src='<?php echo CSP_ASSETS_PATH.'/img/ripple.gif'; ?>'"></button>
					</div>
					
					<div class="csp_row csp_brand_icon" >
						<a href="https://mailchimp.com/" target="_blank" >
							<img src="<?php echo CSP_ASSETS_PATH. 'img/freddie_wink.svg'; ?>" width="20" height="20" alt="MailChimp logo" class="freddie-logo" style="margin: 0 0 -6px 0;" > mailchimp.com Support
						</a>
					</div>
					
				</form>
	
			</div>
	
		</div>
	
	</div>
	
	<?php
	
	}
	
}

add_action( 'wp_footer', 'csp_model_html' );

function csp_design_setting(){
	
	$overlay = false;
	
	$style = '<style>';
	
	if( $overlay ){
		
		$style .= '.csp_overlay{
					width: 100%;
					height:1200px;
					position: fixed;
					background: rgba(0,0,0,0.4);
					z-index: 99999999;
					top: 0;
					left: 0;
				}';
	
	}
	
	$style .= '</style>';
	
	echo $style;
	
}

add_action( 'wp_head', 'csp_design_setting' );


function csp_submit() {
	
	global $wpdb;
	
	$subscribersTable = $wpdb->prefix . 'csp_subscribers';
	
	if( is_array($_POST['data']) ){
		
		//Get settings
		$mailChimpActivate = get_option('mail-chimp-activate');
		
		$formData = $_POST['data'];

		$email_key = csp_is_field( $formData, 'csp_email' );
		$fname = '';
		$lname = '';
		
		//Email Address
		if( isset($formData[$email_key]['value']) && !filter_var($formData[$email_key]['value'], FILTER_VALIDATE_EMAIL) === false ){
			
			$fname_key = csp_is_field( $formData, 'csp_fname' );
			$lname_key = csp_is_field( $formData, 'csp_lname' );
			
			if( isset($fname_key) ){
				$fname = $formData[$fname_key]['value'];
			
			}
			
			if( isset($lname_key) ){
				
				$lname = $formData[$lname_key]['value'];
			
			}
			
			$email = $formData[$email_key]['value'];
			
			$mailChimpEmailValidation = true;
			
			if( !$mailChimpActivate || $mailChimpActivate == 'yes' ){ //MailChimp Subscribe
					
				
				$mailChimpSubData = csp_mailchimp_subscription( 'subscribed',  $email, $fname, $lname );
				
				if( $mailChimpSubData['code'] == 400 ){
					
					$mailChimpEmailValidation = false;
					
				}
				
				
			}
			
			//Insert into DB 
			$wpdb->get_results('SELECT * FROM '. $subscribersTable .' WHERE email="'. $email .'"');
			
			if( $mailChimpEmailValidation == true ){
					
				if( $wpdb->num_rows > 0 ) { 
			
					//$response['response']['code'] 
					$subscriptionStatus = array( 'operation' => 'error', 'msg' => '<p class="csp-popup-error-msg" >Your already our subscriber.</p>' );
					
				} else {
					
					$wpdb->insert( $subscribersTable, 
						array( 
							'fname' => $fname, 
							'lname' => $lname,
							'email' => $email
						), 
						array( 
							'%s', 
							'%s',
							'%s'
						) 
					);
					
					$subscriptionStatus = array( 'operation' => 'success', 'msg' => '<p class="csp-popup-success-msg" >You have successfully subscribed.</p>'  );
					
				}
			
			}else{
				
				$subscriptionStatus = array( 'operation' => 'error', 'msg' => $mailChimpSubData['msg'] );
				
			}
			
			wp_send_json( $subscriptionStatus );
			
		}
		
	
	}
	
	die(0);
	
}

add_action( 'wp_ajax_nopriv_csp_submit', 'csp_submit' );
add_action( 'wp_ajax_csp_submit', 'csp_submit' );

//mailchimp Subscribe and unsubscribe 
function csp_mailchimp_subscription( $status, $email, $fname = '', $lname = '' ){
	
	// status: unsubscribed, subscribed, cleaned, pending
	
	$argsBody = array(
			'email_address' => $email,
			'status'        => $status
		);
	
	if( $fname!='' || $lname!='' ){
		
		$argsBody['merge_fields'] = array( 
				'FNAME' => $fname,
				'LNAME' => $lname
			);
		
	}
	
	$args = array(
		'method' => 'PUT',
		'headers' => array(
			'Authorization' => 'Basic ' . base64_encode( 'user:'. CSP_MAILCHIMP_API_KEY )
		),
		'body' => json_encode( $argsBody )
	);
	
	$response = wp_remote_post( 'https://' . substr(CSP_MAILCHIMP_API_KEY,strpos(CSP_MAILCHIMP_API_KEY,'-')+1) . '.api.mailchimp.com/3.0/lists/' . CSP_MAILCHIMP_SELECTED_LIST_ID . '/members/' . md5(strtolower($email)), $args );
	 
	$body = json_decode( $response['body'] );
	 
	if ( $response['response']['code'] == 200 && $body->status == $status ) {
		
		return array( 'operation' => 'success', 'code' => $response['response']['code'], 'msg' => '<p class="csp-popup-success-msg" >You have successfully ' . $status . '.</p>'  );
		
	} else {
		
		//$response['response']['code'] 
		return array( 'operation' => 'error', 'code' => $response['response']['code'], 'msg' => '<p class="csp-popup-error-msg" >' . $body->detail. '</p>' );
	
	}
	
}

//Setting page 
function csp_register_setting_menu_page() {
	
    add_menu_page(
        'Subscription Popup Setting',
        'CSP Settings',
        'manage_options',
        'csp-setting',
        'csp_settings',
        plugins_url( 'choyal-subscription-popup/assets/img/mail-admin-icon.png' ),
        6
    );
	
	add_submenu_page(
        'csp-setting',
        'CSP Subscribers',
        'Subscribers List',
        'manage_options',
        'csp-subscribers',
        'csp_subscribers_submenu' );
	
}
add_action( 'admin_menu', 'csp_register_setting_menu_page' );

//Subscribers listing page 
function csp_subscribers_submenu() {
	
	global $wpdb;
	
	$subscribersTable = $wpdb->prefix . 'csp_subscribers';
	
	$cspArySubscribers = $wpdb->get_results( 'SELECT * FROM '. $subscribersTable .' ORDER BY id DESC' );
	
	$mailChimpActivate = get_option('mail-chimp-activate');
	
	$disableFnameLname = get_option('disable-fname-lname');
		
    include_once('csp-subscribers.php');
	
}

function csp_settings(){
	
	//Handle Setting Form 
	if( isset($_POST['submit']) ){
		
		$arySettings = array();
		
		//popup 
		if( isset($_POST['csp_popup_disable']) && $_POST['csp_popup_disable']!='' ){
		
			$arySettings['disable-popup'] = $_POST['csp_popup_disable'];
			
		}else{
			
			$arySettings['disable-popup'] = 'no';
			
		}
		
		if( isset($_POST['csp_popup_fname_lname']) && $_POST['csp_popup_fname_lname']!='' ){
		
			$arySettings['disable-fname-lname'] = $_POST['csp_popup_fname_lname'];
		
		}else{
			
			$arySettings['disable-fname-lname'] = 'no';
			
		}
		
		if( isset($_POST['csp_popup_mailchimp_integration']) && $_POST['csp_popup_mailchimp_integration']!='' ){
		
			$arySettings['mail-chimp-activate'] = $_POST['csp_popup_mailchimp_integration'];
		
		}else{
			
			$arySettings['mail-chimp-activate'] = 'no';
			
		}
		
		//MailChimp 
		if( isset($_POST['csp_mailchimp_api_key']) && $_POST['csp_mailchimp_api_key']!='' ){
		
			$arySettings['mail-chimp-api-key'] = $_POST['csp_mailchimp_api_key'];
		
		}
		
		if( isset($_POST['csp_mailchimp_list_id']) && $_POST['csp_mailchimp_list_id']!='' ){
		
			$arySettings['mail-chimp-list-id'] = $_POST['csp_mailchimp_list_id'];
		
		}
		
		//save setting in option table
		
		foreach( $arySettings as $keySetting => $valueSetting ){
			
			if ( get_option( $keySetting ) !== false ) {
				update_option( $keySetting, $valueSetting );
			} else {
				$deprecated = null;
				$autoload = 'no';
				add_option( $keySetting, $valueSetting, $deprecated, $autoload );
			}
			
		}
		
	}
	
	include_once('csp-settings.php');
	
}

//Check if field exist and return key
function csp_is_field( $formData, $fieldname ){ //Arg1 array of form data, field name to check  
	
	foreach($formData as $key => $value){
		
		if(is_array($value) && $value['name'] == $fieldname){
			  
			  return $key;
			  
		}
		
	}
	
	return false;
	
}

//Create Subscribers table 
function csp_subscribers_install() {
	
	global $wpdb;

	$table_name = $wpdb->prefix . 'csp_subscribers';
	
	if( $wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name ){
			
		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			fname varchar(250) DEFAULT '' NOT NULL,
			lname varchar(250) DEFAULT '' NOT NULL,
			email varchar(250) DEFAULT '' NOT NULL,
			PRIMARY KEY  (id)
		) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
		
	}
	
}

register_activation_hook( __FILE__, 'csp_subscribers_install' );

//Ajax function of admin subscriber add
function csp_admin_add_subscriber(){
	
	global $wpdb;
	
	$subscribersTable = $wpdb->prefix . 'csp_subscribers';
	
	if( is_array($_POST['data']) ){
		
		//Get settings
		$mailChimpActivate = get_option('mail-chimp-activate');
		
		$formData = $_POST['data'];

		$email_key = csp_is_field( $formData, 'csp_email' );
		$fname = '';
		$lname = '';
		
		//Email Address
		if( isset($formData[$email_key]['value']) && !filter_var($formData[$email_key]['value'], FILTER_VALIDATE_EMAIL) === false ){
			
			$fname_key = csp_is_field( $formData, 'csp_fname' );
			$lname_key = csp_is_field( $formData, 'csp_lname' );
			$mailchimp_key = csp_is_field( $formData, 'csp_mailchimp' );
			
			if( isset($fname_key) ){
				$fname = $formData[$fname_key]['value'];
			
			}
			
			if( isset($lname_key) ){
				
				$lname = $formData[$lname_key]['value'];
			
			}
			
			if( isset($mailchimp_key) ){
				
				$mailchimp = $formData[$mailchimp_key]['value'];
			
			}
			
			$email = $formData[$email_key]['value'];
			
			$mailChimpEmailValidation = true;
			
			if( ( !$mailChimpActivate || $mailChimpActivate == 'yes') && ( isset($mailchimp) && $mailchimp == 'yes'  ) ){ //MailChimp Subscribe
					
				
				$mailChimpSubData = csp_mailchimp_subscription( 'subscribed',  $email, $fname, $lname );
				
				if( $mailChimpSubData['code'] == 400 ){
					
					$mailChimpEmailValidation = false;
					
				}
				
				
			}
			
			//Insert into DB 
			$wpdb->get_results('SELECT * FROM '. $subscribersTable .' WHERE email="'. $email .'"');
			
			if( $mailChimpEmailValidation == true ){
					
				if( $wpdb->num_rows > 0 ) { 
			
					//$response['response']['code'] 
					$subscriptionStatus = array( 'operation' => 'error', 'msg' => '<p class="csp-popup-error-msg" >Email address already exist in subscriber list.</p>' );
					
				} else {
					
					$wpdb->insert( $subscribersTable, 
						array( 
							'fname' => $fname, 
							'lname' => $lname,
							'email' => $email
						), 
						array( 
							'%s', 
							'%s',
							'%s'
						) 
					);
					
					$subscriptionStatus = array( 'operation' => 'success', 'msg' => '<p class="csp-popup-success-msg" >Email address addded successfully to subscriber list.</p>'  );
					
				}
			
			}else{
				
				$subscriptionStatus = array( 'operation' => 'error', 'msg' => $mailChimpSubData['msg'] );
				
			}
			
			wp_send_json( $subscriptionStatus );
			
		}
		
	
	}
	
	die(0);
	
}

add_action( 'wp_ajax_csp_admin_add_subscriber', 'csp_admin_add_subscriber' );

//Delete Subscriber
function csp_admin_delete_subscriber(){
	
	global $wpdb;
	
	$subscribersTable = $wpdb->prefix . 'csp_subscribers';
	
	if( is_array($_POST['data']) ){
		
		$subscriberID = $_POST['data']['subscriberDeleteForm'];
		$removeMailchimp = $_POST['data']['csp_delete_removefrom_mailchimp'];

		if( isset($removeMailchimp) && $removeMailchimp == 'yes' ){
			
			//get email address using id
			$subscriberMail = $wpdb->get_row('SELECT email FROM '. $subscribersTable .' WHERE id="'. $subscriberID .'"');
			
			if( $wpdb->num_rows > 0 ) { 
			
				$args = array(
					'method' => 'DELETE',
					'headers' => array(
						'Authorization' => 'Basic ' . base64_encode( 'user:'. CSP_MAILCHIMP_API_KEY )
					)
				);
				 
				wp_remote_post( 'https://' . substr(CSP_MAILCHIMP_API_KEY,strpos(CSP_MAILCHIMP_API_KEY,'-')+1) . '.api.mailchimp.com/3.0/lists/' . CSP_MAILCHIMP_SELECTED_LIST_ID . '/members/' . md5(strtolower( $subscriberMail->email )), $args );
				
			}
			
		}
		
		
		$wpdb->delete( $subscribersTable, array( 'id' => $subscriberID ), array( '%d' ) );
		
		echo '<p class="csp-popup-success-msg" >Subscriber deleted successfully.</p>';

	}
	
	die(0);
	
}

add_action( 'wp_ajax_csp_admin_delete_subscriber', 'csp_admin_delete_subscriber' );

//Bulk delete subscriber
function csp_admin_bulk_delete_subscribers(){
	
	global $wpdb;
	
	$subscribersTable = $wpdb->prefix . 'csp_subscribers';
	
	print_r($_POST['data']);
	
	if( is_array($_POST['data']) ){
		
		foreach( $_POST['data'] as $subscriber ){
			
			//echo $subscriber['value'];
			
		}
		
	}
	exit;
	
	if( is_array($_POST['data']) ){
		
		$subscriberID = $_POST['data']['subscriberDeleteForm'];
		$removeMailchimp = $_POST['data']['csp_delete_removefrom_mailchimp'];

		if( isset($removeMailchimp) && $removeMailchimp == 'yes' ){
			
			//get email address using id
			$subscriberMail = $wpdb->get_row('SELECT email FROM '. $subscribersTable .' WHERE id="'. $subscriberID .'"');
			
			if( $wpdb->num_rows > 0 ) { 
			
				$args = array(
					'method' => 'DELETE',
					'headers' => array(
						'Authorization' => 'Basic ' . base64_encode( 'user:'. CSP_MAILCHIMP_API_KEY )
					)
				);
				 
				wp_remote_post( 'https://' . substr(CSP_MAILCHIMP_API_KEY,strpos(CSP_MAILCHIMP_API_KEY,'-')+1) . '.api.mailchimp.com/3.0/lists/' . CSP_MAILCHIMP_SELECTED_LIST_ID . '/members/' . md5(strtolower( $subscriberMail->email )), $args );
				
			}
			
		}
		
		
		$wpdb->delete( $subscribersTable, array( 'id' => $subscriberID ), array( '%d' ) );
		
		echo '<p class="csp-popup-success-msg" >Subscriber deleted successfully.</p>';

	}
	
	
	die(0);
	
}

add_action( 'wp_ajax_csp_admin_bulk_delete_subscribers', 'csp_admin_bulk_delete_subscribers' );