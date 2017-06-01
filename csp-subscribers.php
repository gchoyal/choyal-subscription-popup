<div class="wrap">
<h1 class="wp-heading-inline">Pages</h1>

 <a href="http://localhost/wp-test/wp-admin/post-new.php?post_type=page" class="page-title-action">Add New</a>
<hr class="wp-header-end">


<h2 class="screen-reader-text">Filter pages list</h2>

<form id="posts-filter" method="get">

<p class="search-box">
	<label class="screen-reader-text" for="post-search-input">Search Pages:</label>
	<input type="search" id="post-search-input" name="s" value="">
	<input type="submit" id="search-submit" class="button" value="Search Pages">
</p>

<input type="hidden" name="post_status" class="post_status_page" value="all">
<input type="hidden" name="post_type" class="post_type_page" value="page">

<input type="hidden" id="_wpnonce" name="_wpnonce" value="a4f2f8cf1a"><input type="hidden" name="_wp_http_referer" value="/wp-test/wp-admin/edit.php?post_type=page">	<div class="tablenav top">

	<div class="alignleft actions bulkactions">
			<label for="bulk-action-selector-top" class="screen-reader-text">Select bulk action</label><select name="action" id="bulk-action-selector-top">
<option value="-1">Bulk Actions</option>
	<option value="edit" class="hide-if-no-js">Edit</option>
	<option value="trash">Move to Trash</option>
</select>
<input type="submit" id="doaction" class="button action" value="Apply">
	</div>
				<div class="alignleft actions">
		<label for="filter-by-date" class="screen-reader-text">Filter by date</label>
		<select name="m" id="filter-by-date">
			<option selected="selected" value="0">All dates</option>
<option value="201705">May 2017</option>
		</select>
<input type="submit" name="filter_action" id="post-query-submit" class="button" value="Filter">		</div>
<div class="tablenav-pages one-page"><span class="displaying-num">1 item</span>
<span class="pagination-links"><span class="tablenav-pages-navspan" aria-hidden="true">«</span>
<span class="tablenav-pages-navspan" aria-hidden="true">‹</span>
<span class="paging-input"><label for="current-page-selector" class="screen-reader-text">Current Page</label><input class="current-page" id="current-page-selector" type="text" name="paged" value="1" size="1" aria-describedby="table-paging"><span class="tablenav-paging-text"> of <span class="total-pages">1</span></span></span>
<span class="tablenav-pages-navspan" aria-hidden="true">›</span>
<span class="tablenav-pages-navspan" aria-hidden="true">»</span></span></div>
		<br class="clear">
	</div>
<h2 class="screen-reader-text">Pages list</h2><table class="wp-list-table widefat fixed striped pages">
	<thead>
		<tr>
			<td id="cb" class="manage-column column-cb check-column"><label class="screen-reader-text" for="cb-select-all-1">Select All</label><input id="cb-select-all-1" type="checkbox"></td>
			<th scope="col" id="title" class="manage-column column-title column-primary sortable desc"><span>Title</span></th>
			<th scope="col" id="author" class="manage-column column-author">Author</th>
			<th scope="col" id="date" class="manage-column column-date sortable asc"><span>Date</span></th>	
		</tr>
	</thead>

	<tbody id="the-list">
					
		<tr id="post-2" class="iedit author-self level-0 post-2 type-page status-publish hentry">
			<th scope="row" class="check-column">			<label class="screen-reader-text" for="cb-select-2">Select Sample Page</label>
			<input id="cb-select-2" type="checkbox" name="post[]" value="2">
			<div class="locked-indicator">
				<span class="locked-indicator-icon" aria-hidden="true"></span>
				<span class="screen-reader-text">“Sample Page” is locked</span>
			</div>
		</th>
		
		<td class="title column-title has-row-actions column-primary page-title" data-colname="Title"><div class="locked-info"><span class="locked-avatar"></span> <span class="locked-text"></span></div>
<strong><a class="row-title" href="http://localhost/wp-test/wp-admin/post.php?post=2&amp;action=edit" aria-label="“Sample Page” (Edit)">Sample Page</a></strong>

<div class="hidden" id="inline_2">
	<div class="post_title">Sample Page</div><div class="post_name">sample-page</div>
	<div class="post_author">1</div>
	<div class="comment_status">closed</div>
	<div class="ping_status">open</div>
	<div class="_status">publish</div>
	<div class="jj">31</div>
	<div class="mm">05</div>
	<div class="aa">2017</div>
	<div class="hh">06</div>
	<div class="mn">27</div>
	<div class="ss">15</div>
	<div class="post_password"></div><div class="post_parent">0</div><div class="page_template">default</div><div class="menu_order">0</div></div><div class="row-actions"><span class="edit"><a href="http://localhost/wp-test/wp-admin/post.php?post=2&amp;action=edit" aria-label="Edit “Sample Page”">Edit</a> | </span><span class="inline hide-if-no-js"><a href="#" class="editinline" aria-label="Quick edit “Sample Page” inline">Quick&nbsp;Edit</a> | </span><span class="trash"><a href="http://localhost/wp-test/wp-admin/post.php?post=2&amp;action=trash&amp;_wpnonce=25847febd5" class="submitdelete" aria-label="Move “Sample Page” to the Trash">Trash</a> | </span><span class="view"><a href="http://localhost/wp-test/sample-page/" rel="permalink" aria-label="View “Sample Page”">View</a></span></div><button type="button" class="toggle-row"><span class="screen-reader-text">Show more details</span></button></td><td class="author column-author" data-colname="Author"><a href="edit.php?post_type=page&amp;author=1">admin</a></td><td class="comments column-comments" data-colname="Comments">		<div class="post-com-count-wrapper">
		<span aria-hidden="true">—</span><span class="screen-reader-text">No comments</span><span class="post-com-count post-com-count-pending post-com-count-no-pending"><span class="comment-count comment-count-no-pending" aria-hidden="true">0</span><span class="screen-reader-text">No comments</span></span>		</div>
	</td>
		
		<td class="date column-date" data-colname="Date">Published<br><abbr title="2017/05/31 6:27:15 am">7 hours ago</abbr></td>		
		
	</tr>
	
	</tbody>

	<tfoot>
	<tr>
		<td class="manage-column column-cb check-column"><label class="screen-reader-text" for="cb-select-all-2">Select All</label><input id="cb-select-all-2" type="checkbox"></td><th scope="col" class="manage-column column-title column-primary sortable desc"><a href="http://localhost/wp-test/wp-admin/edit.php?post_type=page&amp;orderby=title&amp;order=asc"><span>Title</span><span class="sorting-indicator"></span></a></th><th scope="col" class="manage-column column-author">Author</th><th scope="col" class="manage-column column-comments num sortable desc"><a href="http://localhost/wp-test/wp-admin/edit.php?post_type=page&amp;orderby=comment_count&amp;order=asc"><span><span class="vers comment-grey-bubble" title="Comments"><span class="screen-reader-text">Comments</span></span></span><span class="sorting-indicator"></span></a></th><th scope="col" class="manage-column column-date sortable asc"><a href="http://localhost/wp-test/wp-admin/edit.php?post_type=page&amp;orderby=date&amp;order=desc"><span>Date</span><span class="sorting-indicator"></span></a></th>	</tr>
	</tfoot>

</table>

	<div class="tablenav bottom">

		<div class="alignleft actions bulkactions"><label for="bulk-action-selector-bottom" class="screen-reader-text">Select bulk action</label>
			
			<select name="action2" id="bulk-action-selector-bottom">
				<option value="-1">Bulk Actions</option>
				<option value="edit" class="hide-if-no-js">Edit</option>
				<option value="trash">Move to Trash</option>
			</select>
			
			<input type="submit" id="doaction2" class="button action" value="Apply">
			
		</div>
		
		<div class="alignleft actions"></div>
		
		<div class="tablenav-pages one-page">
			<span class="displaying-num">1 item</span>
			<span class="pagination-links"><span class="tablenav-pages-navspan" aria-hidden="true">«</span>
			<span class="tablenav-pages-navspan" aria-hidden="true">‹</span>
			<span class="screen-reader-text">Current Page</span><span id="table-paging" class="paging-input"><span class="tablenav-paging-text">1 of <span class="total-pages">1</span></span></span>
			<span class="tablenav-pages-navspan" aria-hidden="true">›</span>
			<span class="tablenav-pages-navspan" aria-hidden="true">»</span></span>
		</div>
		
		<br class="clear">
	
	</div>

</form>


	<form method="get"><table style="display: none"><tbody id="inlineedit">
		
		<tr id="inline-edit" class="inline-edit-row inline-edit-row-page inline-edit-page quick-edit-row quick-edit-row-page inline-edit-page" style="display: none"><td colspan="5" class="colspanchange">

		<fieldset class="inline-edit-col-left">
			<legend class="inline-edit-legend">Quick Edit</legend>
			<div class="inline-edit-col">
	
			<label>
				<span class="title">Title</span>
				<span class="input-text-wrap"><input type="text" name="post_title" class="ptitle" value=""></span>
			</label>

			<label>
				<span class="title">Slug</span>
				<span class="input-text-wrap"><input type="text" name="post_name" value=""></span>
			</label>

	
				<fieldset class="inline-edit-date">
			<legend><span class="title">Date</span></legend>
				<div class="timestamp-wrap"><label><span class="screen-reader-text">Month</span>
				
			<select name="mm">
				<option value="01" data-text="Jan">01-Jan</option>
				<option value="02" data-text="Feb">02-Feb</option>
				<option value="03" data-text="Mar">03-Mar</option>
				<option value="04" data-text="Apr">04-Apr</option>
				<option value="05" data-text="May" selected="selected">05-May</option>
				<option value="06" data-text="Jun">06-Jun</option>
				<option value="07" data-text="Jul">07-Jul</option>
				<option value="08" data-text="Aug">08-Aug</option>
				<option value="09" data-text="Sep">09-Sep</option>
				<option value="10" data-text="Oct">10-Oct</option>
				<option value="11" data-text="Nov">11-Nov</option>
				<option value="12" data-text="Dec">12-Dec</option>
			</select>

</label> <label><span class="screen-reader-text">Day</span><input type="text" name="jj" value="31" size="2" maxlength="2" autocomplete="off"></label>, <label><span class="screen-reader-text">Year</span><input type="text" name="aa" value="2017" size="4" maxlength="4" autocomplete="off"></label> @ <label><span class="screen-reader-text">Hour</span><input type="text" name="hh" value="06" size="2" maxlength="2" autocomplete="off"></label>:<label><span class="screen-reader-text">Minute</span><input type="text" name="mn" value="27" size="2" maxlength="2" autocomplete="off"></label></div><input type="hidden" id="ss" name="ss" value="15">			</fieldset>
			<br class="clear">
	
			<label class="inline-edit-author">
				<span class="title">Author</span>
				<select name="post_author" class="authors">
					<option value="1">admin (admin)</option>
				</select>
			</label>
			
			<div class="inline-edit-group wp-clearfix">
				
				<label class="alignleft">
					<span class="title">Password</span>
					<span class="input-text-wrap"><input type="text" name="post_password" class="inline-edit-password-input" value=""></span>
				</label>

				<em class="alignleft inline-edit-or">–OR–</em>
				
				<label class="alignleft inline-edit-private">
					<input type="checkbox" name="keep_private" value="private">
					<span class="checkbox-title">Private</span>
				</label>
				
			</div>

	
		</div></fieldset>

	
		<fieldset class="inline-edit-col-right"><div class="inline-edit-col">

				<label>
				<span class="title">Parent</span>
	<select name="post_parent" id="post_parent">
	<option value="0">Main Page (no parent)</option>
	<option class="level-0" value="2">Sample Page</option>
</select>
			</label>

	
			<label>
				<span class="title">Order</span>
				<span class="input-text-wrap"><input type="text" name="menu_order" class="inline-edit-menu-order-input" value="0"></span>
			</label>

	
	
	
	
			<div class="inline-edit-group wp-clearfix">
							<label class="alignleft">
					<input type="checkbox" name="comment_status" value="open">
					<span class="checkbox-title">Allow Comments</span>
				</label>
						</div>

	
			<div class="inline-edit-group wp-clearfix">
				<label class="inline-edit-status alignleft">
					<span class="title">Status</span>
					<select name="_status">
												<option value="publish">Published</option>
						<option value="future">Scheduled</option>
												<option value="pending">Pending Review</option>
						<option value="draft">Draft</option>
					</select>
				</label>

	
			</div>

	
		</div></fieldset>

			<p class="submit inline-edit-save">
			<button type="button" class="button cancel alignleft">Cancel</button>
			<input type="hidden" id="_inline_edit" name="_inline_edit" value="11ff81f211">				<button type="button" class="button button-primary save alignright">Update</button>
				<span class="spinner"></span>
						<input type="hidden" name="post_view" value="list">
			<input type="hidden" name="screen" value="edit-page">
						<span class="error" style="display:none"></span>
			<br class="clear">
		</p>
		</td></tr>
	
		<tr id="bulk-edit" class="inline-edit-row inline-edit-row-page inline-edit-page bulk-edit-row bulk-edit-row-page bulk-edit-page" style="display: none">
		
		<td colspan="5" class="colspanchange">

		<fieldset class="inline-edit-col-left">
			<legend class="inline-edit-legend">Bulk Edit</legend>
			<div class="inline-edit-col">
				<div id="bulk-title-div">
				<div id="bulk-titles"></div>
			</div>

	
	
	
		</div>
	</fieldset>

	
		<fieldset class="inline-edit-col-right">
		
			<div class="inline-edit-col">

				<label class="inline-edit-author">
					<span class="title">Author</span>
					<select name="post_author" class="authors">
						<option value="-1">— No Change —</option>
						<option value="1">admin (admin)</option>
					</select>
				</label>

				<label>
					<span class="title">Parent</span>
					<select name="post_parent" id="post_parent">
						<option value="-1">— No Change —</option>
						<option value="0">Main Page (no parent)</option>
						<option class="level-0" value="2">Sample Page</option>
					</select>
				</label>
		
				<div class="inline-edit-group wp-clearfix">
					<label class="alignleft">
						<span class="title">Comments</span>
						<select name="comment_status">
							<option value="">— No Change —</option>
							<option value="open">Allow</option>
							<option value="closed">Do not allow</option>
						</select>
					</label>
				</div>

		
				<div class="inline-edit-group wp-clearfix">
					
					<label class="inline-edit-status alignleft">
						<span class="title">Status</span>
						<select name="_status">
							<option value="-1">— No Change —</option>
							<option value="publish">Published</option>
							<option value="private">Private</option>
							<option value="pending">Pending Review</option>
							<option value="draft">Draft</option>
						</select>
					</label>

		
				</div>

		
			</div>
		
		</fieldset>

		<p class="submit inline-edit-save">
			<button type="button" class="button cancel alignleft">Cancel</button>
			<input type="submit" name="bulk_edit" id="bulk_edit" class="button button-primary alignright" value="Update">			<input type="hidden" name="post_view" value="list">
			<input type="hidden" name="screen" value="edit-page">
			<span class="error" style="display:none"></span>
			<br class="clear">
		</p>
			
		</td></tr>
			</tbody></table></form>

<div id="ajax-response"></div>
<br class="clear">
</div>