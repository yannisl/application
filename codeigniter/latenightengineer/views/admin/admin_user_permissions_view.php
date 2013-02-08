
<?php 

 define('BASEPATH1','../egypt/');
 define('ROOT',$_SERVER['SERVER_NAME']);
 include_once(BASEPATH1.'define.php');
 include_once('menu.php');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head> 
<title>Stamps and Postal History:<?php //echo $title;  ?><</title> 
<meta http-equiv="Content-Type" content="text/html;charset=utf08" /><link rel="Shortcut Icon" href="http://www.bjornblomquist.com/favicon.ico" type="image/x-icon" /> 

<link rel="stylesheet" type="text/css" media="all" href="http://localhost/strings/code_files/userguide.css">

<script type="text/javascript" src="http://localhost/strings/code_files/nav.js"></script>
<script type="text/javascript" src="http://localhost/strings/code_files/prototype.js"></script>
<script type="text/javascript" src="http://localhost/strings/code_files/moo.js"></script>
<script type="text/javascript" src="http://localhost/strings/code_files/user_guide_menu.js"></script>


<link rel="stylesheet" href="http://localhost/egypt/two_files/general.css" type="text/css" /> 
<link rel="stylesheet" href="http://localhost/egypt/screen.css" type="text/css" /> 
<link rel="stylesheet" href="http://localhost/CodeIgniter/css/typography.css" type="text/css" /> 
<meta name="author" content="Y Lazarides" /> 
<meta name="copyright" content="Dr Y Lazarides" /> 
<meta name="robots" content="all" /> 
<meta name="imagetoolbar" content="no" /> 
<meta name="keywords" content="<?php //echo $keywords;    ?>" /> 
<meta name="description" content="An automatic website builder" /> 
 
 
 
<style type="text/css"> 
<!-- Styles --> 
 #toc {
  border: 1px solid #bebebe ;
  background:#bebebe;
  margin: 0 0 5px 12px;
  float:right;
  width:300px;
}

#toc ol{font-size:13px}
#toc ol {
  margin: 8px;
  padding-left: 5px;
}
.country {color:#fff;background:#C04343;}
.country a:link,.country a:hover,.country a:visited{color:#fff}
.arial11 {
  color:#303000;
  font-family:Arial,Helvetica,Verdana;
  font-size:11px;
  font-style:normal;
  font-weight:bold;
  line-height:13px;}
  
table td{font-size:11px;} 

tr.shaded, .shaded, tr.even, {background:#fafafa} 
hr {background:#fff}
.active{background-color:#bebebe}
</style>
</head> 


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
		<h3>User Management: Roles</h3>	
		

		
		  <!-- First Box-->
			
			<div style="background:url(http://localhost/egypt/service_shadow.png) repeat-y;background-repeat:no-repeat;width:23.5%;float:left">
			 <h4 style="text-align:center"><a style="text-align:center;color:#bebebe;margin-left:10px"><span style="margin:0 auto">User Roles</span></a></h4>
		   <img src="http://localhost/egypt/demo.jpg" style="display:block;margin:0 auto"  />
		   <ul style="list-style-type:none;">
		    <li>Access Rules</li>
		    <li>Permissions</li>
		    <li>Profiles</li>
		    <li style="color:red" class="active">Roles</li>
		    <li>User Settings</li>
		    <li>User</li>
		    
		   </ul>
		  </div>
		  <div style="background:url(http://localhost/egypt/service_shadow.png) repeat-y;background-repeat:no-repeat;width:70%;float:left;padding-left:20px">     			
			<p>	
Roles allow you to fine tune the security and administration of your CMS. 
A role defines a group of users that have certain privileges as defined in user permissions. Examples of roles include: anonymous user, authenticated user, {{wi:moderator}}, administrator and so on. In this area you will define the role names of the various roles. To delete a role choose "edit".

By default, the {{cuil:CMS}} comes with two user roles:

<ul>
<li>Anonymous user: this role is used for users that don't have a user account or that are not authenticated.</li>
<li>Authenticated user: this role is automatically granted to all logged in users.</li>
</ul>
</p>		


<form action="/drupal/?q=admin/user/permissions"  accept-charset="UTF-8" method="post" id="user-admin-perm"> 
<div><table id="permissions" class="sticky-enabled"> 
 <thead><tr><th>Permission</th><th>anonymous user</th><th>authenticated user</th><th>author</th> </tr></thead> 
<tbody> 
 <tr class="odd"><td class="module" id="module-block" colspan="13">block module</td> </tr> 
 <tr class="even"><td class="permission">administer blocks</td><td class="checkbox" title="anonymous user : administer blocks"><div class="form-item" id="edit-1-administer-blocks-wrapper"> 
 <label class="option"><input type="checkbox" name="1[administer blocks]" id="edit-1-administer-blocks" value="administer blocks"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : administer blocks"><div class="form-item" id="edit-2-administer-blocks-wrapper"> 
 <label class="option"><input type="checkbox" name="2[administer blocks]" id="edit-2-administer-blocks" value="administer blocks"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : administer blocks"><div class="form-item" id="edit-3-administer-blocks-wrapper"> 
 <label class="option"><input type="checkbox" name="3[administer blocks]" id="edit-3-administer-blocks" value="administer blocks"  checked="checked"  class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="odd"><td class="permission">use PHP for block visibility</td><td class="checkbox" title="anonymous user : use PHP for block visibility"><div class="form-item" id="edit-1-use-PHP-for-block-visibility-wrapper"> 
 <label class="option"><input type="checkbox" name="1[use PHP for block visibility]" id="edit-1-use-PHP-for-block-visibility" value="use PHP for block visibility"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : use PHP for block visibility"><div class="form-item" id="edit-2-use-PHP-for-block-visibility-wrapper"> 
 <label class="option"><input type="checkbox" name="2[use PHP for block visibility]" id="edit-2-use-PHP-for-block-visibility" value="use PHP for block visibility"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : use PHP for block visibility"><div class="form-item" id="edit-3-use-PHP-for-block-visibility-wrapper"> 
 <label class="option"><input type="checkbox" name="3[use PHP for block visibility]" id="edit-3-use-PHP-for-block-visibility" value="use PHP for block visibility"  checked="checked"  class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="even"><td class="module" id="module-blog" colspan="13">blog module</td> </tr> 
 <tr class="odd"><td class="permission">create blog entries</td><td class="checkbox" title="anonymous user : create blog entries"><div class="form-item" id="edit-1-create-blog-entries-wrapper"> 
 <label class="option"><input type="checkbox" name="1[create blog entries]" id="edit-1-create-blog-entries" value="create blog entries"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : create blog entries"><div class="form-item" id="edit-2-create-blog-entries-wrapper"> 
 <label class="option"><input type="checkbox" name="2[create blog entries]" id="edit-2-create-blog-entries" value="create blog entries"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : create blog entries"><div class="form-item" id="edit-3-create-blog-entries-wrapper"> 
 <label class="option"><input type="checkbox" name="3[create blog entries]" id="edit-3-create-blog-entries" value="create blog entries"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="even"><td class="permission">delete any blog entry</td><td class="checkbox" title="anonymous user : delete any blog entry"><div class="form-item" id="edit-1-delete-any-blog-entry-wrapper"> 
 <label class="option"><input type="checkbox" name="1[delete any blog entry]" id="edit-1-delete-any-blog-entry" value="delete any blog entry"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : delete any blog entry"><div class="form-item" id="edit-2-delete-any-blog-entry-wrapper"> 
 <label class="option"><input type="checkbox" name="2[delete any blog entry]" id="edit-2-delete-any-blog-entry" value="delete any blog entry"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : delete any blog entry"><div class="form-item" id="edit-3-delete-any-blog-entry-wrapper"> 
 <label class="option"><input type="checkbox" name="3[delete any blog entry]" id="edit-3-delete-any-blog-entry" value="delete any blog entry"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="odd"><td class="permission">delete own blog entries</td><td class="checkbox" title="anonymous user : delete own blog entries"><div class="form-item" id="edit-1-delete-own-blog-entries-wrapper"> 
 <label class="option"><input type="checkbox" name="1[delete own blog entries]" id="edit-1-delete-own-blog-entries" value="delete own blog entries"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : delete own blog entries"><div class="form-item" id="edit-2-delete-own-blog-entries-wrapper"> 
 <label class="option"><input type="checkbox" name="2[delete own blog entries]" id="edit-2-delete-own-blog-entries" value="delete own blog entries"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : delete own blog entries"><div class="form-item" id="edit-3-delete-own-blog-entries-wrapper"> 
 <label class="option"><input type="checkbox" name="3[delete own blog entries]" id="edit-3-delete-own-blog-entries" value="delete own blog entries"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="even"><td class="permission">edit any blog entry</td><td class="checkbox" title="anonymous user : edit any blog entry"><div class="form-item" id="edit-1-edit-any-blog-entry-wrapper"> 
 <label class="option"><input type="checkbox" name="1[edit any blog entry]" id="edit-1-edit-any-blog-entry" value="edit any blog entry"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : edit any blog entry"><div class="form-item" id="edit-2-edit-any-blog-entry-wrapper"> 
 <label class="option"><input type="checkbox" name="2[edit any blog entry]" id="edit-2-edit-any-blog-entry" value="edit any blog entry"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : edit any blog entry"><div class="form-item" id="edit-3-edit-any-blog-entry-wrapper"> 
 <label class="option"><input type="checkbox" name="3[edit any blog entry]" id="edit-3-edit-any-blog-entry" value="edit any blog entry"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="odd"><td class="permission">edit own blog entries</td><td class="checkbox" title="anonymous user : edit own blog entries"><div class="form-item" id="edit-1-edit-own-blog-entries-wrapper"> 
 <label class="option"><input type="checkbox" name="1[edit own blog entries]" id="edit-1-edit-own-blog-entries" value="edit own blog entries"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : edit own blog entries"><div class="form-item" id="edit-2-edit-own-blog-entries-wrapper"> 
 <label class="option"><input type="checkbox" name="2[edit own blog entries]" id="edit-2-edit-own-blog-entries" value="edit own blog entries"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : edit own blog entries"><div class="form-item" id="edit-3-edit-own-blog-entries-wrapper"> 
 <label class="option"><input type="checkbox" name="3[edit own blog entries]" id="edit-3-edit-own-blog-entries" value="edit own blog entries"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="even"><td class="module" id="module-blogapi" colspan="13">blogapi module</td> </tr> 
 <tr class="odd"><td class="permission">administer content with blog api</td><td class="checkbox" title="anonymous user : administer content with blog api"><div class="form-item" id="edit-1-administer-content-with-blog-api-wrapper"> 
 <label class="option"><input type="checkbox" name="1[administer content with blog api]" id="edit-1-administer-content-with-blog-api" value="administer content with blog api"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : administer content with blog api"><div class="form-item" id="edit-2-administer-content-with-blog-api-wrapper"> 
 <label class="option"><input type="checkbox" name="2[administer content with blog api]" id="edit-2-administer-content-with-blog-api" value="administer content with blog api"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : administer content with blog api"><div class="form-item" id="edit-3-administer-content-with-blog-api-wrapper"> 
 <label class="option"><input type="checkbox" name="3[administer content with blog api]" id="edit-3-administer-content-with-blog-api" value="administer content with blog api"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="even"><td class="module" id="module-book" colspan="13">book module</td> </tr> 
 <tr class="odd"><td class="permission">access printer-friendly version</td><td class="checkbox" title="anonymous user : access printer-friendly version"><div class="form-item" id="edit-1-access-printer-friendly-version-wrapper"> 
 <label class="option"><input type="checkbox" name="1[access printer-friendly version]" id="edit-1-access-printer-friendly-version" value="access printer-friendly version"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : access printer-friendly version"><div class="form-item" id="edit-2-access-printer-friendly-version-wrapper"> 
 <label class="option"><input type="checkbox" name="2[access printer-friendly version]" id="edit-2-access-printer-friendly-version" value="access printer-friendly version"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : access printer-friendly version"><div class="form-item" id="edit-3-access-printer-friendly-version-wrapper"> 
 <label class="option"><input type="checkbox" name="3[access printer-friendly version]" id="edit-3-access-printer-friendly-version" value="access printer-friendly version"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="even"><td class="permission">add content to books</td><td class="checkbox" title="anonymous user : add content to books"><div class="form-item" id="edit-1-add-content-to-books-wrapper"> 
 <label class="option"><input type="checkbox" name="1[add content to books]" id="edit-1-add-content-to-books" value="add content to books"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : add content to books"><div class="form-item" id="edit-2-add-content-to-books-wrapper"> 
 <label class="option"><input type="checkbox" name="2[add content to books]" id="edit-2-add-content-to-books" value="add content to books"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : add content to books"><div class="form-item" id="edit-3-add-content-to-books-wrapper"> 
 <label class="option"><input type="checkbox" name="3[add content to books]" id="edit-3-add-content-to-books" value="add content to books"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="odd"><td class="permission">administer book outlines</td><td class="checkbox" title="anonymous user : administer book outlines"><div class="form-item" id="edit-1-administer-book-outlines-wrapper"> 
 <label class="option"><input type="checkbox" name="1[administer book outlines]" id="edit-1-administer-book-outlines" value="administer book outlines"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : administer book outlines"><div class="form-item" id="edit-2-administer-book-outlines-wrapper"> 
 <label class="option"><input type="checkbox" name="2[administer book outlines]" id="edit-2-administer-book-outlines" value="administer book outlines"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : administer book outlines"><div class="form-item" id="edit-3-administer-book-outlines-wrapper"> 
 <label class="option"><input type="checkbox" name="3[administer book outlines]" id="edit-3-administer-book-outlines" value="administer book outlines"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="even"><td class="permission">create new books</td><td class="checkbox" title="anonymous user : create new books"><div class="form-item" id="edit-1-create-new-books-wrapper"> 
 <label class="option"><input type="checkbox" name="1[create new books]" id="edit-1-create-new-books" value="create new books"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : create new books"><div class="form-item" id="edit-2-create-new-books-wrapper"> 
 <label class="option"><input type="checkbox" name="2[create new books]" id="edit-2-create-new-books" value="create new books"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : create new books"><div class="form-item" id="edit-3-create-new-books-wrapper"> 
 <label class="option"><input type="checkbox" name="3[create new books]" id="edit-3-create-new-books" value="create new books"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="odd"><td class="module" id="module-comment" colspan="13">comment module</td> </tr> 
 <tr class="even"><td class="permission">access comments</td><td class="checkbox" title="anonymous user : access comments"><div class="form-item" id="edit-1-access-comments-wrapper"> 
 <label class="option"><input type="checkbox" name="1[access comments]" id="edit-1-access-comments" value="access comments"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : access comments"><div class="form-item" id="edit-2-access-comments-wrapper"> 
 <label class="option"><input type="checkbox" name="2[access comments]" id="edit-2-access-comments" value="access comments"  checked="checked"  class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : access comments"><div class="form-item" id="edit-3-access-comments-wrapper"> 
 <label class="option"><input type="checkbox" name="3[access comments]" id="edit-3-access-comments" value="access comments"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="odd"><td class="permission">administer comments</td><td class="checkbox" title="anonymous user : administer comments"><div class="form-item" id="edit-1-administer-comments-wrapper"> 
 <label class="option"><input type="checkbox" name="1[administer comments]" id="edit-1-administer-comments" value="administer comments"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : administer comments"><div class="form-item" id="edit-2-administer-comments-wrapper"> 
 <label class="option"><input type="checkbox" name="2[administer comments]" id="edit-2-administer-comments" value="administer comments"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : administer comments"><div class="form-item" id="edit-3-administer-comments-wrapper"> 
 <label class="option"><input type="checkbox" name="3[administer comments]" id="edit-3-administer-comments" value="administer comments"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="even"><td class="permission">post comments</td><td class="checkbox" title="anonymous user : post comments"><div class="form-item" id="edit-1-post-comments-wrapper"> 
 <label class="option"><input type="checkbox" name="1[post comments]" id="edit-1-post-comments" value="post comments"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : post comments"><div class="form-item" id="edit-2-post-comments-wrapper"> 
 <label class="option"><input type="checkbox" name="2[post comments]" id="edit-2-post-comments" value="post comments"  checked="checked"  class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : post comments"><div class="form-item" id="edit-3-post-comments-wrapper"> 
 <label class="option"><input type="checkbox" name="3[post comments]" id="edit-3-post-comments" value="post comments"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="odd"><td class="permission">post comments without approval</td><td class="checkbox" title="anonymous user : post comments without approval"><div class="form-item" id="edit-1-post-comments-without-approval-wrapper"> 
 <label class="option"><input type="checkbox" name="1[post comments without approval]" id="edit-1-post-comments-without-approval" value="post comments without approval"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : post comments without approval"><div class="form-item" id="edit-2-post-comments-without-approval-wrapper"> 
 <label class="option"><input type="checkbox" name="2[post comments without approval]" id="edit-2-post-comments-without-approval" value="post comments without approval"  checked="checked"  class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : post comments without approval"><div class="form-item" id="edit-3-post-comments-without-approval-wrapper"> 
 <label class="option"><input type="checkbox" name="3[post comments without approval]" id="edit-3-post-comments-without-approval" value="post comments without approval"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="even"><td class="module" id="module-contact" colspan="13">contact module</td> </tr> 
 <tr class="odd"><td class="permission">access site-wide contact form</td><td class="checkbox" title="anonymous user : access site-wide contact form"><div class="form-item" id="edit-1-access-site-wide-contact-form-wrapper"> 
 <label class="option"><input type="checkbox" name="1[access site-wide contact form]" id="edit-1-access-site-wide-contact-form" value="access site-wide contact form"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : access site-wide contact form"><div class="form-item" id="edit-2-access-site-wide-contact-form-wrapper"> 
 <label class="option"><input type="checkbox" name="2[access site-wide contact form]" id="edit-2-access-site-wide-contact-form" value="access site-wide contact form"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : access site-wide contact form"><div class="form-item" id="edit-3-access-site-wide-contact-form-wrapper"> 
 <label class="option"><input type="checkbox" name="3[access site-wide contact form]" id="edit-3-access-site-wide-contact-form" value="access site-wide contact form"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="even"><td class="permission">administer site-wide contact form</td><td class="checkbox" title="anonymous user : administer site-wide contact form"><div class="form-item" id="edit-1-administer-site-wide-contact-form-wrapper"> 
 <label class="option"><input type="checkbox" name="1[administer site-wide contact form]" id="edit-1-administer-site-wide-contact-form" value="administer site-wide contact form"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : administer site-wide contact form"><div class="form-item" id="edit-2-administer-site-wide-contact-form-wrapper"> 
 <label class="option"><input type="checkbox" name="2[administer site-wide contact form]" id="edit-2-administer-site-wide-contact-form" value="administer site-wide contact form"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : administer site-wide contact form"><div class="form-item" id="edit-3-administer-site-wide-contact-form-wrapper"> 
 <label class="option"><input type="checkbox" name="3[administer site-wide contact form]" id="edit-3-administer-site-wide-contact-form" value="administer site-wide contact form"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="odd"><td class="module" id="module-filter" colspan="13">filter module</td> </tr> 
 <tr class="even"><td class="permission">administer filters</td><td class="checkbox" title="anonymous user : administer filters"><div class="form-item" id="edit-1-administer-filters-wrapper"> 
 <label class="option"><input type="checkbox" name="1[administer filters]" id="edit-1-administer-filters" value="administer filters"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : administer filters"><div class="form-item" id="edit-2-administer-filters-wrapper"> 
 <label class="option"><input type="checkbox" name="2[administer filters]" id="edit-2-administer-filters" value="administer filters"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : administer filters"><div class="form-item" id="edit-3-administer-filters-wrapper"> 
 <label class="option"><input type="checkbox" name="3[administer filters]" id="edit-3-administer-filters" value="administer filters"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="odd"><td class="module" id="module-menu" colspan="13">menu module</td> </tr> 
 <tr class="even"><td class="permission">administer menu</td><td class="checkbox" title="anonymous user : administer menu"><div class="form-item" id="edit-1-administer-menu-wrapper"> 
 <label class="option"><input type="checkbox" name="1[administer menu]" id="edit-1-administer-menu" value="administer menu"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : administer menu"><div class="form-item" id="edit-2-administer-menu-wrapper"> 
 <label class="option"><input type="checkbox" name="2[administer menu]" id="edit-2-administer-menu" value="administer menu"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : administer menu"><div class="form-item" id="edit-3-administer-menu-wrapper"> 
 <label class="option"><input type="checkbox" name="3[administer menu]" id="edit-3-administer-menu" value="administer menu"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="odd"><td class="module" id="module-node" colspan="13">node module</td> </tr> 
 <tr class="even"><td class="permission">access content</td><td class="checkbox" title="anonymous user : access content"><div class="form-item" id="edit-1-access-content-wrapper"> 
 <label class="option"><input type="checkbox" name="1[access content]" id="edit-1-access-content" value="access content"  checked="checked"  class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : access content"><div class="form-item" id="edit-2-access-content-wrapper"> 
 <label class="option"><input type="checkbox" name="2[access content]" id="edit-2-access-content" value="access content"  checked="checked"  class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : access content"><div class="form-item" id="edit-3-access-content-wrapper"> 
 <label class="option"><input type="checkbox" name="3[access content]" id="edit-3-access-content" value="access content"  checked="checked"  class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="odd"><td class="permission">administer content types</td><td class="checkbox" title="anonymous user : administer content types"><div class="form-item" id="edit-1-administer-content-types-wrapper"> 
 <label class="option"><input type="checkbox" name="1[administer content types]" id="edit-1-administer-content-types" value="administer content types"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : administer content types"><div class="form-item" id="edit-2-administer-content-types-wrapper"> 
 <label class="option"><input type="checkbox" name="2[administer content types]" id="edit-2-administer-content-types" value="administer content types"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : administer content types"><div class="form-item" id="edit-3-administer-content-types-wrapper"> 
 <label class="option"><input type="checkbox" name="3[administer content types]" id="edit-3-administer-content-types" value="administer content types"  checked="checked"  class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="even"><td class="permission">administer nodes</td><td class="checkbox" title="anonymous user : administer nodes"><div class="form-item" id="edit-1-administer-nodes-wrapper"> 
 <label class="option"><input type="checkbox" name="1[administer nodes]" id="edit-1-administer-nodes" value="administer nodes"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : administer nodes"><div class="form-item" id="edit-2-administer-nodes-wrapper"> 
 <label class="option"><input type="checkbox" name="2[administer nodes]" id="edit-2-administer-nodes" value="administer nodes"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : administer nodes"><div class="form-item" id="edit-3-administer-nodes-wrapper"> 
 <label class="option"><input type="checkbox" name="3[administer nodes]" id="edit-3-administer-nodes" value="administer nodes"  checked="checked"  class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="odd"><td class="permission">create book content</td><td class="checkbox" title="anonymous user : create book content"><div class="form-item" id="edit-1-create-book-content-wrapper"> 
 <label class="option"><input type="checkbox" name="1[create book content]" id="edit-1-create-book-content" value="create book content"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : create book content"><div class="form-item" id="edit-2-create-book-content-wrapper"> 
 <label class="option"><input type="checkbox" name="2[create book content]" id="edit-2-create-book-content" value="create book content"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : create book content"><div class="form-item" id="edit-3-create-book-content-wrapper"> 
 <label class="option"><input type="checkbox" name="3[create book content]" id="edit-3-create-book-content" value="create book content"  checked="checked"  class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="even"><td class="permission">create page content</td><td class="checkbox" title="anonymous user : create page content"><div class="form-item" id="edit-1-create-page-content-wrapper"> 
 <label class="option"><input type="checkbox" name="1[create page content]" id="edit-1-create-page-content" value="create page content"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : create page content"><div class="form-item" id="edit-2-create-page-content-wrapper"> 
 <label class="option"><input type="checkbox" name="2[create page content]" id="edit-2-create-page-content" value="create page content"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : create page content"><div class="form-item" id="edit-3-create-page-content-wrapper"> 
 <label class="option"><input type="checkbox" name="3[create page content]" id="edit-3-create-page-content" value="create page content"  checked="checked"  class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="odd"><td class="permission">create story content</td><td class="checkbox" title="anonymous user : create story content"><div class="form-item" id="edit-1-create-story-content-wrapper"> 
 <label class="option"><input type="checkbox" name="1[create story content]" id="edit-1-create-story-content" value="create story content"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : create story content"><div class="form-item" id="edit-2-create-story-content-wrapper"> 
 <label class="option"><input type="checkbox" name="2[create story content]" id="edit-2-create-story-content" value="create story content"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : create story content"><div class="form-item" id="edit-3-create-story-content-wrapper"> 
 <label class="option"><input type="checkbox" name="3[create story content]" id="edit-3-create-story-content" value="create story content"  checked="checked"  class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="even"><td class="permission">delete any book content</td><td class="checkbox" title="anonymous user : delete any book content"><div class="form-item" id="edit-1-delete-any-book-content-wrapper"> 
 <label class="option"><input type="checkbox" name="1[delete any book content]" id="edit-1-delete-any-book-content" value="delete any book content"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : delete any book content"><div class="form-item" id="edit-2-delete-any-book-content-wrapper"> 
 <label class="option"><input type="checkbox" name="2[delete any book content]" id="edit-2-delete-any-book-content" value="delete any book content"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : delete any book content"><div class="form-item" id="edit-3-delete-any-book-content-wrapper"> 
 <label class="option"><input type="checkbox" name="3[delete any book content]" id="edit-3-delete-any-book-content" value="delete any book content"  checked="checked"  class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="odd"><td class="permission">delete any page content</td><td class="checkbox" title="anonymous user : delete any page content"><div class="form-item" id="edit-1-delete-any-page-content-wrapper"> 
 <label class="option"><input type="checkbox" name="1[delete any page content]" id="edit-1-delete-any-page-content" value="delete any page content"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : delete any page content"><div class="form-item" id="edit-2-delete-any-page-content-wrapper"> 
 <label class="option"><input type="checkbox" name="2[delete any page content]" id="edit-2-delete-any-page-content" value="delete any page content"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : delete any page content"><div class="form-item" id="edit-3-delete-any-page-content-wrapper"> 
 <label class="option"><input type="checkbox" name="3[delete any page content]" id="edit-3-delete-any-page-content" value="delete any page content"  checked="checked"  class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="even"><td class="permission">delete any story content</td><td class="checkbox" title="anonymous user : delete any story content"><div class="form-item" id="edit-1-delete-any-story-content-wrapper"> 
 <label class="option"><input type="checkbox" name="1[delete any story content]" id="edit-1-delete-any-story-content" value="delete any story content"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : delete any story content"><div class="form-item" id="edit-2-delete-any-story-content-wrapper"> 
 <label class="option"><input type="checkbox" name="2[delete any story content]" id="edit-2-delete-any-story-content" value="delete any story content"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : delete any story content"><div class="form-item" id="edit-3-delete-any-story-content-wrapper"> 
 <label class="option"><input type="checkbox" name="3[delete any story content]" id="edit-3-delete-any-story-content" value="delete any story content"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="odd"><td class="permission">delete own book content</td><td class="checkbox" title="anonymous user : delete own book content"><div class="form-item" id="edit-1-delete-own-book-content-wrapper"> 
 <label class="option"><input type="checkbox" name="1[delete own book content]" id="edit-1-delete-own-book-content" value="delete own book content"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : delete own book content"><div class="form-item" id="edit-2-delete-own-book-content-wrapper"> 
 <label class="option"><input type="checkbox" name="2[delete own book content]" id="edit-2-delete-own-book-content" value="delete own book content"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : delete own book content"><div class="form-item" id="edit-3-delete-own-book-content-wrapper"> 
 <label class="option"><input type="checkbox" name="3[delete own book content]" id="edit-3-delete-own-book-content" value="delete own book content"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="even"><td class="permission">delete own page content</td><td class="checkbox" title="anonymous user : delete own page content"><div class="form-item" id="edit-1-delete-own-page-content-wrapper"> 
 <label class="option"><input type="checkbox" name="1[delete own page content]" id="edit-1-delete-own-page-content" value="delete own page content"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : delete own page content"><div class="form-item" id="edit-2-delete-own-page-content-wrapper"> 
 <label class="option"><input type="checkbox" name="2[delete own page content]" id="edit-2-delete-own-page-content" value="delete own page content"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : delete own page content"><div class="form-item" id="edit-3-delete-own-page-content-wrapper"> 
 <label class="option"><input type="checkbox" name="3[delete own page content]" id="edit-3-delete-own-page-content" value="delete own page content"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="odd"><td class="permission">delete own story content</td><td class="checkbox" title="anonymous user : delete own story content"><div class="form-item" id="edit-1-delete-own-story-content-wrapper"> 
 <label class="option"><input type="checkbox" name="1[delete own story content]" id="edit-1-delete-own-story-content" value="delete own story content"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : delete own story content"><div class="form-item" id="edit-2-delete-own-story-content-wrapper"> 
 <label class="option"><input type="checkbox" name="2[delete own story content]" id="edit-2-delete-own-story-content" value="delete own story content"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : delete own story content"><div class="form-item" id="edit-3-delete-own-story-content-wrapper"> 
 <label class="option"><input type="checkbox" name="3[delete own story content]" id="edit-3-delete-own-story-content" value="delete own story content"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="even"><td class="permission">delete revisions</td><td class="checkbox" title="anonymous user : delete revisions"><div class="form-item" id="edit-1-delete-revisions-wrapper"> 
 <label class="option"><input type="checkbox" name="1[delete revisions]" id="edit-1-delete-revisions" value="delete revisions"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : delete revisions"><div class="form-item" id="edit-2-delete-revisions-wrapper"> 
 <label class="option"><input type="checkbox" name="2[delete revisions]" id="edit-2-delete-revisions" value="delete revisions"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : delete revisions"><div class="form-item" id="edit-3-delete-revisions-wrapper"> 
 <label class="option"><input type="checkbox" name="3[delete revisions]" id="edit-3-delete-revisions" value="delete revisions"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="odd"><td class="permission">edit any book content</td><td class="checkbox" title="anonymous user : edit any book content"><div class="form-item" id="edit-1-edit-any-book-content-wrapper"> 
 <label class="option"><input type="checkbox" name="1[edit any book content]" id="edit-1-edit-any-book-content" value="edit any book content"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : edit any book content"><div class="form-item" id="edit-2-edit-any-book-content-wrapper"> 
 <label class="option"><input type="checkbox" name="2[edit any book content]" id="edit-2-edit-any-book-content" value="edit any book content"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : edit any book content"><div class="form-item" id="edit-3-edit-any-book-content-wrapper"> 
 <label class="option"><input type="checkbox" name="3[edit any book content]" id="edit-3-edit-any-book-content" value="edit any book content"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="even"><td class="permission">edit any page content</td><td class="checkbox" title="anonymous user : edit any page content"><div class="form-item" id="edit-1-edit-any-page-content-wrapper"> 
 <label class="option"><input type="checkbox" name="1[edit any page content]" id="edit-1-edit-any-page-content" value="edit any page content"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : edit any page content"><div class="form-item" id="edit-2-edit-any-page-content-wrapper"> 
 <label class="option"><input type="checkbox" name="2[edit any page content]" id="edit-2-edit-any-page-content" value="edit any page content"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : edit any page content"><div class="form-item" id="edit-3-edit-any-page-content-wrapper"> 
 <label class="option"><input type="checkbox" name="3[edit any page content]" id="edit-3-edit-any-page-content" value="edit any page content"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="odd"><td class="permission">edit any story content</td><td class="checkbox" title="anonymous user : edit any story content"><div class="form-item" id="edit-1-edit-any-story-content-wrapper"> 
 <label class="option"><input type="checkbox" name="1[edit any story content]" id="edit-1-edit-any-story-content" value="edit any story content"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : edit any story content"><div class="form-item" id="edit-2-edit-any-story-content-wrapper"> 
 <label class="option"><input type="checkbox" name="2[edit any story content]" id="edit-2-edit-any-story-content" value="edit any story content"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : edit any story content"><div class="form-item" id="edit-3-edit-any-story-content-wrapper"> 
 <label class="option"><input type="checkbox" name="3[edit any story content]" id="edit-3-edit-any-story-content" value="edit any story content"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="even"><td class="permission">edit own book content</td><td class="checkbox" title="anonymous user : edit own book content"><div class="form-item" id="edit-1-edit-own-book-content-wrapper"> 
 <label class="option"><input type="checkbox" name="1[edit own book content]" id="edit-1-edit-own-book-content" value="edit own book content"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : edit own book content"><div class="form-item" id="edit-2-edit-own-book-content-wrapper"> 
 <label class="option"><input type="checkbox" name="2[edit own book content]" id="edit-2-edit-own-book-content" value="edit own book content"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : edit own book content"><div class="form-item" id="edit-3-edit-own-book-content-wrapper"> 
 <label class="option"><input type="checkbox" name="3[edit own book content]" id="edit-3-edit-own-book-content" value="edit own book content"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="odd"><td class="permission">edit own page content</td><td class="checkbox" title="anonymous user : edit own page content"><div class="form-item" id="edit-1-edit-own-page-content-wrapper"> 
 <label class="option"><input type="checkbox" name="1[edit own page content]" id="edit-1-edit-own-page-content" value="edit own page content"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : edit own page content"><div class="form-item" id="edit-2-edit-own-page-content-wrapper"> 
 <label class="option"><input type="checkbox" name="2[edit own page content]" id="edit-2-edit-own-page-content" value="edit own page content"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : edit own page content"><div class="form-item" id="edit-3-edit-own-page-content-wrapper"> 
 <label class="option"><input type="checkbox" name="3[edit own page content]" id="edit-3-edit-own-page-content" value="edit own page content"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="even"><td class="permission">edit own story content</td><td class="checkbox" title="anonymous user : edit own story content"><div class="form-item" id="edit-1-edit-own-story-content-wrapper"> 
 <label class="option"><input type="checkbox" name="1[edit own story content]" id="edit-1-edit-own-story-content" value="edit own story content"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : edit own story content"><div class="form-item" id="edit-2-edit-own-story-content-wrapper"> 
 <label class="option"><input type="checkbox" name="2[edit own story content]" id="edit-2-edit-own-story-content" value="edit own story content"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : edit own story content"><div class="form-item" id="edit-3-edit-own-story-content-wrapper"> 
 <label class="option"><input type="checkbox" name="3[edit own story content]" id="edit-3-edit-own-story-content" value="edit own story content"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="odd"><td class="permission">revert revisions</td><td class="checkbox" title="anonymous user : revert revisions"><div class="form-item" id="edit-1-revert-revisions-wrapper"> 
 <label class="option"><input type="checkbox" name="1[revert revisions]" id="edit-1-revert-revisions" value="revert revisions"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : revert revisions"><div class="form-item" id="edit-2-revert-revisions-wrapper"> 
 <label class="option"><input type="checkbox" name="2[revert revisions]" id="edit-2-revert-revisions" value="revert revisions"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : revert revisions"><div class="form-item" id="edit-3-revert-revisions-wrapper"> 
 <label class="option"><input type="checkbox" name="3[revert revisions]" id="edit-3-revert-revisions" value="revert revisions"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="even"><td class="permission">view revisions</td><td class="checkbox" title="anonymous user : view revisions"><div class="form-item" id="edit-1-view-revisions-wrapper"> 
 <label class="option"><input type="checkbox" name="1[view revisions]" id="edit-1-view-revisions" value="view revisions"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : view revisions"><div class="form-item" id="edit-2-view-revisions-wrapper"> 
 <label class="option"><input type="checkbox" name="2[view revisions]" id="edit-2-view-revisions" value="view revisions"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : view revisions"><div class="form-item" id="edit-3-view-revisions-wrapper"> 
 <label class="option"><input type="checkbox" name="3[view revisions]" id="edit-3-view-revisions" value="view revisions"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="odd"><td class="module" id="module-path" colspan="13">path module</td> </tr> 
 <tr class="even"><td class="permission">administer url aliases</td><td class="checkbox" title="anonymous user : administer url aliases"><div class="form-item" id="edit-1-administer-url-aliases-wrapper"> 
 <label class="option"><input type="checkbox" name="1[administer url aliases]" id="edit-1-administer-url-aliases" value="administer url aliases"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : administer url aliases"><div class="form-item" id="edit-2-administer-url-aliases-wrapper"> 
 <label class="option"><input type="checkbox" name="2[administer url aliases]" id="edit-2-administer-url-aliases" value="administer url aliases"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : administer url aliases"><div class="form-item" id="edit-3-administer-url-aliases-wrapper"> 
 <label class="option"><input type="checkbox" name="3[administer url aliases]" id="edit-3-administer-url-aliases" value="administer url aliases"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="odd"><td class="permission">create url aliases</td><td class="checkbox" title="anonymous user : create url aliases"><div class="form-item" id="edit-1-create-url-aliases-wrapper"> 
 <label class="option"><input type="checkbox" name="1[create url aliases]" id="edit-1-create-url-aliases" value="create url aliases"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : create url aliases"><div class="form-item" id="edit-2-create-url-aliases-wrapper"> 
 <label class="option"><input type="checkbox" name="2[create url aliases]" id="edit-2-create-url-aliases" value="create url aliases"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : create url aliases"><div class="form-item" id="edit-3-create-url-aliases-wrapper"> 
 <label class="option"><input type="checkbox" name="3[create url aliases]" id="edit-3-create-url-aliases" value="create url aliases"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="even"><td class="module" id="module-search" colspan="13">search module</td> </tr> 
 <tr class="odd"><td class="permission">administer search</td><td class="checkbox" title="anonymous user : administer search"><div class="form-item" id="edit-1-administer-search-wrapper"> 
 <label class="option"><input type="checkbox" name="1[administer search]" id="edit-1-administer-search" value="administer search"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : administer search"><div class="form-item" id="edit-2-administer-search-wrapper"> 
 <label class="option"><input type="checkbox" name="2[administer search]" id="edit-2-administer-search" value="administer search"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : administer search"><div class="form-item" id="edit-3-administer-search-wrapper"> 
 <label class="option"><input type="checkbox" name="3[administer search]" id="edit-3-administer-search" value="administer search"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="even"><td class="permission">search content</td><td class="checkbox" title="anonymous user : search content"><div class="form-item" id="edit-1-search-content-wrapper"> 
 <label class="option"><input type="checkbox" name="1[search content]" id="edit-1-search-content" value="search content"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : search content"><div class="form-item" id="edit-2-search-content-wrapper"> 
 <label class="option"><input type="checkbox" name="2[search content]" id="edit-2-search-content" value="search content"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : search content"><div class="form-item" id="edit-3-search-content-wrapper"> 
 <label class="option"><input type="checkbox" name="3[search content]" id="edit-3-search-content" value="search content"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="odd"><td class="permission">use advanced search</td><td class="checkbox" title="anonymous user : use advanced search"><div class="form-item" id="edit-1-use-advanced-search-wrapper"> 
 <label class="option"><input type="checkbox" name="1[use advanced search]" id="edit-1-use-advanced-search" value="use advanced search"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : use advanced search"><div class="form-item" id="edit-2-use-advanced-search-wrapper"> 
 <label class="option"><input type="checkbox" name="2[use advanced search]" id="edit-2-use-advanced-search" value="use advanced search"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : use advanced search"><div class="form-item" id="edit-3-use-advanced-search-wrapper"> 
 <label class="option"><input type="checkbox" name="3[use advanced search]" id="edit-3-use-advanced-search" value="use advanced search"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="even"><td class="module" id="module-system" colspan="13">system module</td> </tr> 
 <tr class="odd"><td class="permission">access administration pages</td><td class="checkbox" title="anonymous user : access administration pages"><div class="form-item" id="edit-1-access-administration-pages-wrapper"> 
 <label class="option"><input type="checkbox" name="1[access administration pages]" id="edit-1-access-administration-pages" value="access administration pages"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : access administration pages"><div class="form-item" id="edit-2-access-administration-pages-wrapper"> 
 <label class="option"><input type="checkbox" name="2[access administration pages]" id="edit-2-access-administration-pages" value="access administration pages"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : access administration pages"><div class="form-item" id="edit-3-access-administration-pages-wrapper"> 
 <label class="option"><input type="checkbox" name="3[access administration pages]" id="edit-3-access-administration-pages" value="access administration pages"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="even"><td class="permission">access site reports</td><td class="checkbox" title="anonymous user : access site reports"><div class="form-item" id="edit-1-access-site-reports-wrapper"> 
 <label class="option"><input type="checkbox" name="1[access site reports]" id="edit-1-access-site-reports" value="access site reports"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : access site reports"><div class="form-item" id="edit-2-access-site-reports-wrapper"> 
 <label class="option"><input type="checkbox" name="2[access site reports]" id="edit-2-access-site-reports" value="access site reports"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : access site reports"><div class="form-item" id="edit-3-access-site-reports-wrapper"> 
 <label class="option"><input type="checkbox" name="3[access site reports]" id="edit-3-access-site-reports" value="access site reports"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="odd"><td class="permission">administer actions</td><td class="checkbox" title="anonymous user : administer actions"><div class="form-item" id="edit-1-administer-actions-wrapper"> 
 <label class="option"><input type="checkbox" name="1[administer actions]" id="edit-1-administer-actions" value="administer actions"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : administer actions"><div class="form-item" id="edit-2-administer-actions-wrapper"> 
 <label class="option"><input type="checkbox" name="2[administer actions]" id="edit-2-administer-actions" value="administer actions"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : administer actions"><div class="form-item" id="edit-3-administer-actions-wrapper"> 
 <label class="option"><input type="checkbox" name="3[administer actions]" id="edit-3-administer-actions" value="administer actions"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="even"><td class="permission">administer files</td><td class="checkbox" title="anonymous user : administer files"><div class="form-item" id="edit-1-administer-files-wrapper"> 
 <label class="option"><input type="checkbox" name="1[administer files]" id="edit-1-administer-files" value="administer files"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : administer files"><div class="form-item" id="edit-2-administer-files-wrapper"> 
 <label class="option"><input type="checkbox" name="2[administer files]" id="edit-2-administer-files" value="administer files"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : administer files"><div class="form-item" id="edit-3-administer-files-wrapper"> 
 <label class="option"><input type="checkbox" name="3[administer files]" id="edit-3-administer-files" value="administer files"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="odd"><td class="permission">administer site configuration</td><td class="checkbox" title="anonymous user : administer site configuration"><div class="form-item" id="edit-1-administer-site-configuration-wrapper"> 
 <label class="option"><input type="checkbox" name="1[administer site configuration]" id="edit-1-administer-site-configuration" value="administer site configuration"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : administer site configuration"><div class="form-item" id="edit-2-administer-site-configuration-wrapper"> 
 <label class="option"><input type="checkbox" name="2[administer site configuration]" id="edit-2-administer-site-configuration" value="administer site configuration"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : administer site configuration"><div class="form-item" id="edit-3-administer-site-configuration-wrapper"> 
 <label class="option"><input type="checkbox" name="3[administer site configuration]" id="edit-3-administer-site-configuration" value="administer site configuration"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="even"><td class="permission">select different theme</td><td class="checkbox" title="anonymous user : select different theme"><div class="form-item" id="edit-1-select-different-theme-wrapper"> 
 <label class="option"><input type="checkbox" name="1[select different theme]" id="edit-1-select-different-theme" value="select different theme"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : select different theme"><div class="form-item" id="edit-2-select-different-theme-wrapper"> 
 <label class="option"><input type="checkbox" name="2[select different theme]" id="edit-2-select-different-theme" value="select different theme"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : select different theme"><div class="form-item" id="edit-3-select-different-theme-wrapper"> 
 <label class="option"><input type="checkbox" name="3[select different theme]" id="edit-3-select-different-theme" value="select different theme"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="odd"><td class="module" id="module-taxonomy" colspan="13">taxonomy module</td> </tr> 
 <tr class="even"><td class="permission">administer taxonomy</td><td class="checkbox" title="anonymous user : administer taxonomy"><div class="form-item" id="edit-1-administer-taxonomy-wrapper"> 
 <label class="option"><input type="checkbox" name="1[administer taxonomy]" id="edit-1-administer-taxonomy" value="administer taxonomy"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : administer taxonomy"><div class="form-item" id="edit-2-administer-taxonomy-wrapper"> 
 <label class="option"><input type="checkbox" name="2[administer taxonomy]" id="edit-2-administer-taxonomy" value="administer taxonomy"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : administer taxonomy"><div class="form-item" id="edit-3-administer-taxonomy-wrapper"> 
 <label class="option"><input type="checkbox" name="3[administer taxonomy]" id="edit-3-administer-taxonomy" value="administer taxonomy"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="odd"><td class="module" id="module-upload" colspan="13">upload module</td> </tr> 
 <tr class="even"><td class="permission">upload files</td><td class="checkbox" title="anonymous user : upload files"><div class="form-item" id="edit-1-upload-files-wrapper"> 
 <label class="option"><input type="checkbox" name="1[upload files]" id="edit-1-upload-files" value="upload files"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : upload files"><div class="form-item" id="edit-2-upload-files-wrapper"> 
 <label class="option"><input type="checkbox" name="2[upload files]" id="edit-2-upload-files" value="upload files"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : upload files"><div class="form-item" id="edit-3-upload-files-wrapper"> 
 <label class="option"><input type="checkbox" name="3[upload files]" id="edit-3-upload-files" value="upload files"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="odd"><td class="permission">view uploaded files</td><td class="checkbox" title="anonymous user : view uploaded files"><div class="form-item" id="edit-1-view-uploaded-files-wrapper"> 
 <label class="option"><input type="checkbox" name="1[view uploaded files]" id="edit-1-view-uploaded-files" value="view uploaded files"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : view uploaded files"><div class="form-item" id="edit-2-view-uploaded-files-wrapper"> 
 <label class="option"><input type="checkbox" name="2[view uploaded files]" id="edit-2-view-uploaded-files" value="view uploaded files"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : view uploaded files"><div class="form-item" id="edit-3-view-uploaded-files-wrapper"> 
 <label class="option"><input type="checkbox" name="3[view uploaded files]" id="edit-3-view-uploaded-files" value="view uploaded files"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="even"><td class="module" id="module-user" colspan="13">user module</td> </tr> 
 <tr class="odd"><td class="permission">access user profiles</td><td class="checkbox" title="anonymous user : access user profiles"><div class="form-item" id="edit-1-access-user-profiles-wrapper"> 
 <label class="option"><input type="checkbox" name="1[access user profiles]" id="edit-1-access-user-profiles" value="access user profiles"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : access user profiles"><div class="form-item" id="edit-2-access-user-profiles-wrapper"> 
 <label class="option"><input type="checkbox" name="2[access user profiles]" id="edit-2-access-user-profiles" value="access user profiles"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : access user profiles"><div class="form-item" id="edit-3-access-user-profiles-wrapper"> 
 <label class="option"><input type="checkbox" name="3[access user profiles]" id="edit-3-access-user-profiles" value="access user profiles"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="even"><td class="permission">administer permissions</td><td class="checkbox" title="anonymous user : administer permissions"><div class="form-item" id="edit-1-administer-permissions-wrapper"> 
 <label class="option"><input type="checkbox" name="1[administer permissions]" id="edit-1-administer-permissions" value="administer permissions"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : administer permissions"><div class="form-item" id="edit-2-administer-permissions-wrapper"> 
 <label class="option"><input type="checkbox" name="2[administer permissions]" id="edit-2-administer-permissions" value="administer permissions"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : administer permissions"><div class="form-item" id="edit-3-administer-permissions-wrapper"> 
 <label class="option"><input type="checkbox" name="3[administer permissions]" id="edit-3-administer-permissions" value="administer permissions"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="odd"><td class="permission">administer users</td><td class="checkbox" title="anonymous user : administer users"><div class="form-item" id="edit-1-administer-users-wrapper"> 
 <label class="option"><input type="checkbox" name="1[administer users]" id="edit-1-administer-users" value="administer users"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : administer users"><div class="form-item" id="edit-2-administer-users-wrapper"> 
 <label class="option"><input type="checkbox" name="2[administer users]" id="edit-2-administer-users" value="administer users"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : administer users"><div class="form-item" id="edit-3-administer-users-wrapper"> 
 <label class="option"><input type="checkbox" name="3[administer users]" id="edit-3-administer-users" value="administer users"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
 <tr class="even"><td class="permission">change own username</td><td class="checkbox" title="anonymous user : change own username"><div class="form-item" id="edit-1-change-own-username-wrapper"> 
 <label class="option"><input type="checkbox" name="1[change own username]" id="edit-1-change-own-username" value="change own username"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="authenticated user : change own username"><div class="form-item" id="edit-2-change-own-username-wrapper"> 
 <label class="option"><input type="checkbox" name="2[change own username]" id="edit-2-change-own-username" value="change own username"   class="form-checkbox" /> </label> 
</div> 
</td><td class="checkbox" title="author : change own username"><div class="form-item" id="edit-3-change-own-username-wrapper"> 
 <label class="option"><input type="checkbox" name="3[change own username]" id="edit-3-change-own-username" value="change own username"   class="form-checkbox" /> </label> 
</div> 
</td> </tr> 
</tbody> 
</table> 
<div class="form-checkboxes"></div><div class="form-checkboxes"></div><div class="form-checkboxes"></div><input type="submit" name="op" id="edit-submit" value="Save permissions"  class="form-submit" /> 
<input type="hidden" name="form_build_id" id="form-13f12e993388604a5874da417e062884" value="form-13f12e993388604a5874da417e062884"  /> 
<input type="hidden" name="form_token" id="edit-user-admin-perm-form-token" value="cb494b42348b63756cb839f3e96ee6ce"  /> 
<input type="hidden" name="form_id" id="edit-user-admin-perm" value="user_admin_perm"  /> 
 
</div></form> 
















		  </div> 
		 
	</div>		   
     
     
	</div>		
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
  

		<?php include('footer.php');?>
</div>
	
	
	
	