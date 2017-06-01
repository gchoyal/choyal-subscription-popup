<div class="wrap">
	
	<h1 class="wp-heading-inline">Subscribers</h1>

	<a href="#" class="page-title-action" onclick="document.getElementById('id01').style.display='block'" >Add New</a>
	
	<hr class="wp-header-end">

	<form id="posts-filter" method="get">

		<p class="search-box">
			<label class="screen-reader-text" for="post-search-input">Search Subscribers:</label>
			<input type="search" id="post-search-input" name="s" value="">
			<input type="submit" id="search-submit" class="button" value="Search Pages">
		</p>

		<div class="tablenav top">

			<div class="alignleft actions bulkactions">
				
				<label for="bulk-action-selector-top" class="screen-reader-text">Select bulk action</label>
				
				<select name="action" id="bulk-action-selector-top">
					<option value="-1">Bulk Actions</option>
					<option value="trash">Delete</option>
				</select>
				
				<input type="submit" id="doaction" class="button action" value="Apply">
				
			</div>
				
			<br class="clear">
			
		</div>
		
		<h2 class="screen-reader-text">Pages list</h2>
	
		<table class="wp-list-table widefat fixed striped pages">
		
			<thead>
				<tr>
					<td id="cb" class="manage-column column-cb check-column"><label class="screen-reader-text" for="cb-select-all-1">Select All</label><input id="cb-select-all-1" type="checkbox"></td>
					<th scope="col" id="Email Address" class="manage-column column-title column-primary desc"><span>Email</span></th>
					<th scope="col" id="First Name" class="manage-column column-title column-primary desc"><span>First Name</span></th>
					<th scope="col" id="Last Name" class="manage-column column-title column-primary desc"><span>Last  Name</span></th>
				</tr>
			</thead>

			<tbody id="the-list">
					
				<?php foreach ( $cspArySubscribers as $cspsubscriber ) { ?>
				
				<tr id="post-2" class="iedit author-self level-0 post-2 type-page status-publish hentry">
					
					<th scope="row" class="check-column">			
					
						<input id="cb-select-2" type="checkbox" name="post[]" value="2">
						
					</th>
					
					<td class="has-row-actions column-primary">
					
						<span><?php echo $cspsubscriber->email; ?></span>

						<div class="row-actions"> <span class="trash"><a href="#<?php echo $cspsubscriber->id; ?>" class="submitdelete" >Delete</a></span> </div>

					</td>
			 
					<td><span><?php echo $cspsubscriber->fname; ?></span></td>
					
					<td>		
						<span><?php echo $cspsubscriber->lname; ?></span>
					</td>
					
				</tr>
			
				<?php } ?>	
				
			</tbody>

			<tfoot>
				<tr>
					<td id="cb" class="manage-column column-cb check-column"><label class="screen-reader-text" for="cb-select-all-1">Select All</label><input id="cb-select-all-1" type="checkbox"></td>
					<th scope="col" id="Email Address" class="manage-column column-title column-primary desc"><span>Email</span></th>
					<th scope="col" id="First Name" class="manage-column column-title column-primary desc"><span>First Name</span></th>
					<th scope="col" id="Last Name" class="manage-column column-title column-primary desc"><span>Last  Name</span></th>
				</tr>
			</tfoot>

		</table>

		<div class="tablenav bottom">

			<div class="alignleft actions bulkactions">
			
				<select name="action2" id="bulk-action-selector-bottom">
					<option value="-1">Bulk Actions</option>
					<option value="trash">Delete</option>
				</select>
				
				<input type="submit" id="doaction2" class="button action" value="Apply">
				
			</div>
			
			<div class="alignleft actions"></div>
			
			<br class="clear">
		
		</div>

	</form>

<br class="clear">
</div>

<style>
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

.modal-content {
    background-color: #fefefe;
    margin: 5px auto; /* 15% from the top and centered */
	border-top: 3px solid black;
    width: 50%; /* Could be more or less, depending on screen size */
	padding: 25px 35px;
}

.closeCSP{
	font-size: 25px;
    font-weight: bold;
	float: right;
	cursor: pointer;
}

.closeCSP:hover{
	
	color: red;
	
}

.csp_btn, .csp_btn :hover{
	border: 1px solid #333;
    background: black;
    color: white;
    font-weight: normal;
    text-transform: capitalize;
    border-radius: 3px;
    padding: 10px 15px;
    width: 100%;
    box-shadow: 0 0 5px grey;
}

.csp_btn img{ margin: -10px 5px; }

.csp_loader{ display: none; }

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.3s;
    animation: animatezoom 0.3s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}
</style>

<!-- The Modal -->
<div id="id01" class="modal">
  
	<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal"></span>

	<!-- Modal Content -->
	<form class="modal-content animate" action="" method="post" id="csp-add-new-subscriber" >
		
		<span onclick="document.getElementById('id01').style.display='none'" class="closeCSP" title="Close Modal">&times;</span>

		<h1>Add New Subscriber</h1>
		
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row"><label for="email">Email</label></th>
					<td><input name="email" type="email" id="email" value="" class="regular-text" required></td>
				</tr>
				
				<?php if( !$disableFnameLname || $disableFnameLname == 'no' ){ ?>
				
				<tr>
					<th scope="row"><label for="fname">First Name</label></th>
					<td><input name="fname" type="text" id="fname" value="" class="regular-text"></td>
				</tr>
				
				<tr>
					<th scope="row"><label for="lname">Last Name</label></th>
					<td><input name="lname" type="text" id="lname" value="" class="regular-text"></td>
				</tr>
				
				<?php } ?>
				
				<?php if( !$mailChimpActivate || $mailChimpActivate == 'yes' ){ //MailChimp Subscribe ?>
				
				<tr>
				
					<th scope="row">
						<label for="mailchimp">Add to MailChimp List </label>
					</th>
					<td>
					
						<input name="mailchimp" type="checkbox" id="mailchimp" value="yes">
						<a href="https://mailchimp.com/" target="_blank" >
							<img src="<?php echo CSP_ASSETS_PATH. 'img/freddie_wink.svg'; ?>" width="20" height="20" alt="MailChimp logo" class="freddie-logo" style="margin: 0 0 -6px 0;" >
						</a>
						
					</td>
				</tr>
				
				<?php } ?>
				
			</tbody>
		</table>
		
		<p class="submit"><button type="submit" name="csp_submit" class="csp_btn" >Save <img class="csp_loader" src="<?php echo CSP_ASSETS_PATH.'/img/ripple.svg'; ?>" onerror="this.src='<?php echo CSP_ASSETS_PATH.'/img/ripple.gif'; ?>'"></button></p>
		
	</form>
	
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<script>
jQuery(document).ready(function(){
	
	var csp_ajax_url = '<?php echo admin_url('admin-ajax.php'); ?>';
	
	jQuery('#csp-add-new-subscriber').submit(function(){
		
		jQuery('.csp_loader').show();
		
		var data = {
			'action': 'csp_admin_add_subscriber',
			'whatever': 1234
		};

		
		jQuery.ajax({
			
			type: "post",
			url: csp_ajax_url,
			data: data,
			success: function(response){
				
				console.log(response);
				
				jQuery('.csp_loader').hide();
				
			}
			
		});
		
		return false;
		
	});
	
});
</script>