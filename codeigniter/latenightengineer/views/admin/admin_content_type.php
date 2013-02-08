
<?php 
 include_once('menu.php');
?>

{{html: ../CodeIgniter/data/head.dat}}
 

<body style="background:#000;margin-top:0">
<!-- Start: Sidcontainer -->
<div class="container clearfix" style="border-top:3px solid #000000;width:1000px">

<!-- START NAVIGATION -->
<div style="overflow: hidden; height: 0px;" id="nav">
  <div id="nav_inner">
  <script type="text/javascript">create_menu('null');</script>
  <table cellspaceing="0" style="width: 98%;" border="0" cellpadding="0"><tbody><tr>
  <td class="td" valign="top">
  </table>
  </div>
</div>

<div id="nav2" class="clearfix" style="margin-right:0;padding-right:70px">
<a name="top"></a><a href="javascript:void(0);" onclick="myHeight.toggle();">
<img src="http://localhost/strings/code_files/nav_toggle.jpg" style="display:block;float:right" title="Toggle Table of Contents" alt="Toggle Table of Contents" border="0" height="44" width="153"></a>
</a>
</div>


<div id="masthead" style="background:#fff;width:100%;padding-left:0;margin-left:0;" >

<h1><span style="font-family:georgia;weight:bold;color:#000;font-size:36px;padding-left:0.6em">
<?php //echo ucfirst($location).'&middot; ';?></span><span style="color:#000040"><?php echo $title ?></span></h1>
</div>
<!-- END NAVIGATION -->


<div id="pagehead" style="width:980px;margin-top:0;" class="clearfix">

    <?php showMenu($main_admin_menu) ?>
</div>
    <!--End Top Menu-->	
	
    <!-- Page Content -->
    <div id="pagecontent" class="clearfix" >
		
    
       			
			
	   
		<div style="width:90%;margin:0 auto" class="clearfix"> 
		
	
		<h3>Content Management</h3>
		
		
		  <!-- First Box-->
					   
		  {{block: ../CodeIgniter/data/block-content-menu.dat}}
		   
		  
		  
		   <div style="background:url(http://localhost/egypt/service_shadow.png) repeat-y;background-repeat:no-repeat;width:70%;float:left;padding-left:20px;margin-left:20px">    			
		
        <h2>Add Content Type</h2>
  {{bulb:To create a new content type, enter the human-readable name, the machine-readable name, and all other relevant fields that are on this page. Once created, users of your site will be able to create posts that are instances of this content type.}}
  
 <form action="/drupal/?q=admin/content/types/add"  accept-charset="UTF-8" method="post" id="node-type-form"> 
<div><fieldset><legend>Identification</legend><div class="form-item" id="edit-name-wrapper"> 
 <label for="edit-name">Name: <span class="form-required" title="This field is required.">*</span></label> 
 <input type="text" maxlength="128" name="name" id="edit-name" size="60" value="" class="form-text required" /> 
 <div class="description">The human-readable name of this content type. This text will be displayed as part of the list on the <em>create content</em> page. It is recommended that this name begin with a capital letter and contain only letters, numbers, and <strong>spaces</strong>. This name must be unique.</div> 
</div> 
<div class="form-item" id="edit-type-wrapper"> 
 <label for="edit-type">Type: <span class="form-required" title="This field is required.">*</span></label> 
 <input type="text" maxlength="32" name="type" id="edit-type" size="60" value="" class="form-text required" /> 
 <div class="description">The machine-readable name of this content type. This text will be used for constructing the URL of the <em>create content</em> page for this content type. This name must contain only lowercase letters, numbers, and underscores. Underscores will be converted into hyphens when constructing the URL of the <em>create content</em> page. This name must be unique.</div> 
</div> 
<div class="form-item" id="edit-description-wrapper"> 
 <label for="edit-description">Description: </label> 
 <textarea cols="60" rows="5" name="description" id="edit-description"  class="form-textarea resizable"></textarea> 
 <div class="description">A brief description of this content type. This text will be displayed as part of the list on the <em>create content</em> page.</div> 
</div> 
</fieldset> 
<fieldset class=" collapsible collapsed"><legend>Submission form settings</legend><div class="form-item" id="edit-title-label-wrapper"> 
 <label for="edit-title-label">Title field label: <span class="form-required" title="This field is required.">*</span></label> 
 <input type="text" maxlength="128" name="title_label" id="edit-title-label" size="60" value="Title" class="form-text required" /> 
</div> 
<div class="form-item" id="edit-body-label-wrapper"> 
 <label for="edit-body-label">Body field label: </label> 
 <input type="text" maxlength="128" name="body_label" id="edit-body-label" size="60" value="Body" class="form-text" /> 
 <div class="description">To omit the body field for this content type, remove any text and leave this field blank.</div> 
</div> 
<div class="form-item" id="edit-min-word-count-wrapper"> 
 <label for="edit-min-word-count">Minimum number of words: </label> 
 <select name="min_word_count" class="form-select" id="edit-min-word-count" ><option value="0" selected="selected">0</option><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="75">75</option><option value="100">100</option><option value="125">125</option><option value="150">150</option><option value="175">175</option><option value="200">200</option></select> 
 <div class="description">The minimum number of words for the body field to be considered valid for this content type. This can be useful to rule out submissions that do not meet the site's standards, such as short test posts.</div> 
</div> 
<div class="form-item" id="edit-help-wrapper"> 
 <label for="edit-help">Explanation or submission guidelines: </label> 
 <textarea cols="60" rows="5" name="help" id="edit-help"  class="form-textarea resizable"></textarea> 
 <div class="description">This text will be displayed at the top of the submission form for this content type. It is useful for helping or instructing your users.</div> 
</div> 
</fieldset> 
<fieldset class=" collapsible collapsed"><legend>Workflow settings</legend><div class="form-item"> 
 <label>Default options: </label> 
 <div class="form-checkboxes"><div class="form-item" id="edit-node-options-status-wrapper"> 
 <label class="option"><input type="checkbox" name="node_options[status]" id="edit-node-options-status" value="status"  checked="checked"  class="form-checkbox" /> Published</label> 
</div> 
<div class="form-item" id="edit-node-options-promote-wrapper"> 
 <label class="option"><input type="checkbox" name="node_options[promote]" id="edit-node-options-promote" value="promote"  checked="checked"  class="form-checkbox" /> Promoted to front page</label> 
</div> 
<div class="form-item" id="edit-node-options-sticky-wrapper"> 
 <label class="option"><input type="checkbox" name="node_options[sticky]" id="edit-node-options-sticky" value="sticky"   class="form-checkbox" /> Sticky at top of lists</label> 
</div> 
<div class="form-item" id="edit-node-options-revision-wrapper"> 
 <label class="option"><input type="checkbox" name="node_options[revision]" id="edit-node-options-revision" value="revision"   class="form-checkbox" /> Create new revision</label> 
</div> 
</div> 
 <div class="description">Users with the <em>administer nodes</em> permission will be able to override these options.</div> 
</div> 
<div class="form-item"> 
 <label>Attachments: </label> 
 <div class="form-radios"><div class="form-item" id="edit-upload-0-wrapper"> 
 <label class="option"><input type="radio" name="upload" value="0"   class="form-radio" /> Disabled</label> 
</div> 
<div class="form-item" id="edit-upload-1-wrapper"> 
 <label class="option"><input type="radio" name="upload" value="1"  checked="checked"  class="form-radio" /> Enabled</label> 
</div> 
</div> 
</div> 
</fieldset> 
<input type="hidden" name="form_build_id" id="form-9c43fc3e5f6ab63c579d9b635e1ba339" value="form-9c43fc3e5f6ab63c579d9b635e1ba339"  /> 
<input type="hidden" name="form_token" id="edit-node-type-form-form-token" value="78bfe526257142600b23e4281b21e525"  /> 
<input type="hidden" name="form_id" id="edit-node-type-form" value="node_type_form"  /> 
<fieldset class=" collapsible collapsed"><legend>Comment settings</legend><div class="form-item"> 
 <label>Default comment setting: </label> 
 <div class="form-radios"><div class="form-item" id="edit-comment-0-wrapper"> 
 <label class="option"><input type="radio" name="comment" value="0"   class="form-radio" /> Disabled</label> 
</div> 
<div class="form-item" id="edit-comment-1-wrapper"> 
 <label class="option"><input type="radio" name="comment" value="1"   class="form-radio" /> Read only</label> 
</div> 
<div class="form-item" id="edit-comment-2-wrapper"> 
 <label class="option"><input type="radio" name="comment" value="2"  checked="checked"  class="form-radio" /> Read/Write</label> 
</div> 
</div> 
 <div class="description">Users with the <em>administer comments</em> permission will be able to override this setting.</div> 
</div> 
<div class="form-item"> 
 <label>Default display mode: </label> 
 <div class="form-radios"><div class="form-item" id="edit-comment-default-mode-1-wrapper"> 
 <label class="option"><input type="radio" name="comment_default_mode" value="1"   class="form-radio" /> Flat list - collapsed</label> 
</div> 
<div class="form-item" id="edit-comment-default-mode-2-wrapper"> 
 <label class="option"><input type="radio" name="comment_default_mode" value="2"   class="form-radio" /> Flat list - expanded</label> 
</div> 
<div class="form-item" id="edit-comment-default-mode-3-wrapper"> 
 <label class="option"><input type="radio" name="comment_default_mode" value="3"   class="form-radio" /> Threaded list - collapsed</label> 
</div> 
<div class="form-item" id="edit-comment-default-mode-4-wrapper"> 
 <label class="option"><input type="radio" name="comment_default_mode" value="4"  checked="checked"  class="form-radio" /> Threaded list - expanded</label> 
</div> 
</div> 
 <div class="description">The default view for comments. Expanded views display the body of the comment. Threaded views keep replies together.</div> 
</div> 
<div class="form-item"> 
 <label>Default display order: </label> 
 <div class="form-radios"><div class="form-item" id="edit-comment-default-order-1-wrapper"> 
 <label class="option"><input type="radio" name="comment_default_order" value="1"  checked="checked"  class="form-radio" /> Date - newest first</label> 
</div> 
<div class="form-item" id="edit-comment-default-order-2-wrapper"> 
 <label class="option"><input type="radio" name="comment_default_order" value="2"   class="form-radio" /> Date - oldest first</label> 
</div> 
</div> 
 <div class="description">The default sorting for new users and anonymous users while viewing comments. These users may change their view using the comment control panel. For registered users, this change is remembered as a persistent user preference.</div> 
</div> 
<div class="form-item" id="edit-comment-default-per-page-wrapper"> 
 <label for="edit-comment-default-per-page">Default comments per page: </label> 
 <select name="comment_default_per_page" class="form-select" id="edit-comment-default-per-page" ><option value="10">10</option><option value="30">30</option><option value="50" selected="selected">50</option><option value="70">70</option><option value="90">90</option><option value="150">150</option><option value="200">200</option><option value="250">250</option><option value="300">300</option></select> 
 <div class="description">Default number of comments for each page: more comments are distributed in several pages.</div> 
</div> 
<div class="form-item"> 
 <label>Comment controls: </label> 
 <div class="form-radios"><div class="form-item" id="edit-comment-controls-0-wrapper"> 
 <label class="option"><input type="radio" name="comment_controls" value="0"   class="form-radio" /> Display above the comments</label> 
</div> 
<div class="form-item" id="edit-comment-controls-1-wrapper"> 
 <label class="option"><input type="radio" name="comment_controls" value="1"   class="form-radio" /> Display below the comments</label> 
</div> 
<div class="form-item" id="edit-comment-controls-2-wrapper"> 
 <label class="option"><input type="radio" name="comment_controls" value="2"   class="form-radio" /> Display above and below the comments</label> 
</div> 
<div class="form-item" id="edit-comment-controls-3-wrapper"> 
 <label class="option"><input type="radio" name="comment_controls" value="3"  checked="checked"  class="form-radio" /> Do not display</label> 
</div> 
</div> 
 <div class="description">Position of the comment controls box. The comment controls let the user change the default display mode and display order of comments.</div> 
</div> 
<div class="form-item"> 
 <label>Anonymous commenting: </label> 
 <div class="form-radios"><div class="form-item" id="edit-comment-anonymous-0-wrapper"> 
 <label class="option"><input type="radio" name="comment_anonymous" value="0"  checked="checked"  disabled="disabled" class="form-radio" /> Anonymous posters may not enter their contact information</label> 
</div> 
<div class="form-item" id="edit-comment-anonymous-1-wrapper"> 
 <label class="option"><input type="radio" name="comment_anonymous" value="1"   disabled="disabled" class="form-radio" /> Anonymous posters may leave their contact information</label> 
</div> 
<div class="form-item" id="edit-comment-anonymous-2-wrapper"> 
 <label class="option"><input type="radio" name="comment_anonymous" value="2"   disabled="disabled" class="form-radio" /> Anonymous posters must leave their contact information</label> 
</div> 
</div> 
 <div class="description">This option is enabled when anonymous users have permission to post comments on the <a href="/drupal/?q=admin/user/permissions#module-comment">permissions page</a>.</div> 
</div> 
<div class="form-item"> 
 <label>Comment subject field: </label> 
 <div class="form-radios"><div class="form-item" id="edit-comment-subject-field-0-wrapper"> 
 <label class="option"><input type="radio" name="comment_subject_field" value="0"   class="form-radio" /> Disabled</label> 
</div> 
<div class="form-item" id="edit-comment-subject-field-1-wrapper"> 
 <label class="option"><input type="radio" name="comment_subject_field" value="1"  checked="checked"  class="form-radio" /> Enabled</label> 
</div> 
</div> 
 <div class="description">Can users provide a unique subject for their comments?</div> 
</div> 
<div class="form-item"> 
 <label>Preview comment: </label> 
 <div class="form-radios"><div class="form-item" id="edit-comment-preview-0-wrapper"> 
 <label class="option"><input type="radio" name="comment_preview" value="0"   class="form-radio" /> Optional</label> 
</div> 
<div class="form-item" id="edit-comment-preview-1-wrapper"> 
 <label class="option"><input type="radio" name="comment_preview" value="1"  checked="checked"  class="form-radio" /> Required</label> 
</div> 
</div> 
 <div class="description">Forces a user to look at their comment by clicking on a 'Preview' button before they can actually add the comment</div> 
</div> 
<div class="form-item"> 
 <label>Location of comment submission form: </label> 
 <div class="form-radios"><div class="form-item" id="edit-comment-form-location-0-wrapper"> 
 <label class="option"><input type="radio" name="comment_form_location" value="0"  checked="checked"  class="form-radio" /> Display on separate page</label> 
</div> 
<div class="form-item" id="edit-comment-form-location-1-wrapper"> 
 <label class="option"><input type="radio" name="comment_form_location" value="1"   class="form-radio" /> Display below post or comments</label> 
</div> 
</div> 
</div> 
</fieldset> 
<input type="submit" name="op" id="edit-submit" value="Save content type"  class="form-submit" /> 
 
</div></form> 
		  
		  </div>
	</div>		   
     
     
	</div>		
			
			
			
			
		
			
			
			
			
			
			
			
			
			
			
			
			
			
  

		<?php include('footer.php');?>
</div>
	
	
	
	