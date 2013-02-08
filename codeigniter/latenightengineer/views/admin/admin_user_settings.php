
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

tr.shaded, .shaded{background:#fafafa} 
hr {background:#fff}
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
		<h3>User Management: Settings</h3>	
		

		
		  <!-- First Box-->
	
			<div style="background:url(http://localhost/egypt/service_shadow.png) repeat-y;background-repeat:no-repeat;width:23.5%;float:left">
			 <h4 style="text-align:center"><a style="text-align:center;color:#bebebe;margin-left:10px"><span style="margin:0 auto">Users</span></a></h4>
		   <img src="http://localhost/egypt/demo.jpg" style="display:block;margin:0 auto"  />
		   <ul style="list-style-type:none;">
		    <li>Access Rules</li>
		    <li>Permissions</li>
		    <li>Profiles</li>
		    <li >Roles</li>
		    <li style="color:red">User Settings</li>
		    <li>User</li>
		    
		   </ul>
		  </div>
		  <div style="background:url(http://localhost/egypt/service_shadow.png) repeat-y;background-repeat:no-repeat;width:70%;float:left;padding-left:20px">     			
			


 <form action="/drupal/?q=admin/user/settings"  accept-charset="UTF-8" method="post" id="user-admin-settings"> 
<div><fieldset><legend>User registration settings</legend><div class="form-item"> 
 <label>Public registrations: </label> 
 <div class="form-radios"><div class="form-item" id="edit-user-register-0-wrapper"> 
 <label class="option"><input type="radio" name="user_register" value="0"   class="form-radio" /> Only site administrators can create new user accounts.</label> 
</div> 
<div class="form-item" id="edit-user-register-1-wrapper"> 
 <label class="option"><input type="radio" name="user_register" value="1"  checked="checked"  class="form-radio" /> Visitors can create accounts and no administrator approval is required.</label> 
</div> 
<div class="form-item" id="edit-user-register-2-wrapper"> 
 <label class="option"><input type="radio" name="user_register" value="2"   class="form-radio" /> Visitors can create accounts but administrator approval is required.</label> 
</div> 
</div> 
</div> 
<div class="form-item" id="edit-user-email-verification-wrapper"> 
 <label class="option"><input type="checkbox" name="user_email_verification" id="edit-user-email-verification" value="1"  checked="checked"  class="form-checkbox" /> Require e-mail verification when a visitor creates an account</label> 
 <div class="description">If this box is checked, new users will be required to validate their e-mail address prior to logging into the site, and will be assigned a system-generated password. With it unchecked, users will be logged in immediately upon registering, and may select their own passwords during registration.</div> 
</div> 
<div class="form-item" id="edit-user-registration-help-wrapper"> 
 <label for="edit-user-registration-help">User registration guidelines: </label> 
 <textarea cols="60" rows="5" name="user_registration_help" id="edit-user-registration-help"  class="form-textarea resizable"></textarea> 
 <div class="description">This text is displayed at the top of the user registration form and is useful for helping or instructing your users.</div> 
</div> 
</fieldset> 
<fieldset><legend>User e-mail settings</legend><div class="description">Drupal sends emails whenever new users register on your site, and optionally, may also notify users after other account actions. Using a simple set of content templates, notification e-mails can be customized to fit the specific needs of your site.</div><fieldset class=" collapsible collapsed"><legend>Welcome, new user created by administrator</legend><div class="description">Customize welcome e-mail messages sent to new member accounts created by an administrator. Available variables are: !username, !site, !password, !uri, !uri_brief, !mailto, !date, !login_uri, !edit_uri, !login_url.</div><div class="form-item" id="edit-user-mail-register-admin-created-subject-wrapper"> 
 <label for="edit-user-mail-register-admin-created-subject">Subject: </label> 
 <input type="text" maxlength="180" name="user_mail_register_admin_created_subject" id="edit-user-mail-register-admin-created-subject" size="60" value="An administrator created an account for you at !site" class="form-text" /> 
</div> 
<div class="form-item" id="edit-user-mail-register-admin-created-body-wrapper"> 
 <label for="edit-user-mail-register-admin-created-body">Body: </label> 
 <textarea cols="60" rows="15" name="user_mail_register_admin_created_body" id="edit-user-mail-register-admin-created-body"  class="form-textarea resizable">!username,
 
A site administrator at !site has created an account for you. You may now log in to !login_uri using the following username and password:
 
username: !username
password: !password
 
You may also log in by clicking on this link or copying and pasting it in your browser:
 
!login_url
 
This is a one-time login, so it can be used only once.
 
After logging in, you will be redirected to !edit_uri so you can change your password.
 
 
--  !site team</textarea> 
</div> 
</fieldset> 
<fieldset class=" collapsible"><legend>Welcome, no approval required</legend><div class="description">Customize welcome e-mail messages sent to new members upon registering, when no administrator approval is required. Available variables are: !username, !site, !password, !uri, !uri_brief, !mailto, !date, !login_uri, !edit_uri, !login_url.</div><div class="form-item" id="edit-user-mail-register-no-approval-required-subject-wrapper"> 
 <label for="edit-user-mail-register-no-approval-required-subject">Subject: </label> 
 <input type="text" maxlength="180" name="user_mail_register_no_approval_required_subject" id="edit-user-mail-register-no-approval-required-subject" size="60" value="Account details for !username at !site" class="form-text" /> 
</div> 
<div class="form-item" id="edit-user-mail-register-no-approval-required-body-wrapper"> 
 <label for="edit-user-mail-register-no-approval-required-body">Body: </label> 
 <textarea cols="60" rows="15" name="user_mail_register_no_approval_required_body" id="edit-user-mail-register-no-approval-required-body"  class="form-textarea resizable">!username,
 
Thank you for registering at !site. You may now log in to !login_uri using the following username and password:
 
username: !username
password: !password
 
You may also log in by clicking on this link or copying and pasting it in your browser:
 
!login_url
 
This is a one-time login, so it can be used only once.
 
After logging in, you will be redirected to !edit_uri so you can change your password.
 
 
--  !site team</textarea> 
</div> 
</fieldset> 
<fieldset class=" collapsible collapsed"><legend>Welcome, awaiting administrator approval</legend><div class="description">Customize welcome e-mail messages sent to new members upon registering, when administrative approval is required. Available variables are: !username, !site, !password, !uri, !uri_brief, !mailto, !date, !login_uri, !edit_uri, !login_url.</div><div class="form-item" id="edit-user-mail-register-pending-approval-subject-wrapper"> 
 <label for="edit-user-mail-register-pending-approval-subject">Subject: </label> 
 <input type="text" maxlength="180" name="user_mail_register_pending_approval_subject" id="edit-user-mail-register-pending-approval-subject" size="60" value="Account details for !username at !site (pending admin approval)" class="form-text" /> 
</div> 
<div class="form-item" id="edit-user-mail-register-pending-approval-body-wrapper"> 
 <label for="edit-user-mail-register-pending-approval-body">Body: </label> 
 <textarea cols="60" rows="8" name="user_mail_register_pending_approval_body" id="edit-user-mail-register-pending-approval-body"  class="form-textarea resizable">!username,
 
Thank you for registering at !site. Your application for an account is currently pending approval. Once it has been approved, you will receive another e-mail containing information about how to log in, set your password, and other details.
 
 
--  !site team</textarea> 
</div> 
</fieldset> 
<fieldset class=" collapsible collapsed"><legend>Password recovery email</legend><div class="description">Customize e-mail messages sent to users who request a new password. Available variables are: !username, !site, !password, !uri, !uri_brief, !mailto, !date, !login_uri, !edit_uri, !login_url.</div><div class="form-item" id="edit-user-mail-password-reset-subject-wrapper"> 
 <label for="edit-user-mail-password-reset-subject">Subject: </label> 
 <input type="text" maxlength="180" name="user_mail_password_reset_subject" id="edit-user-mail-password-reset-subject" size="60" value="Replacement login information for !username at !site" class="form-text" /> 
</div> 
<div class="form-item" id="edit-user-mail-password-reset-body-wrapper"> 
 <label for="edit-user-mail-password-reset-body">Body: </label> 
 <textarea cols="60" rows="12" name="user_mail_password_reset_body" id="edit-user-mail-password-reset-body"  class="form-textarea resizable">!username,
 
A request to reset the password for your account has been made at !site.
 
You may now log in to !uri_brief by clicking on this link or copying and pasting it in your browser:
 
!login_url
 
This is a one-time login, so it can be used only once. It expires after one day and nothing will happen if it&#039;s not used.
 
After logging in, you will be redirected to !edit_uri so you can change your password.</textarea> 
</div> 
</fieldset> 
<fieldset class=" collapsible collapsed"><legend>Account activation email</legend><div class="description">Enable and customize e-mail messages sent to users upon account activation (when an administrator activates an account of a user who has already registered, on a site where administrative approval is required). Available variables are: !username, !site, !password, !uri, !uri_brief, !mailto, !date, !login_uri, !edit_uri, !login_url.</div><div class="form-item" id="edit-user-mail-status-activated-notify-wrapper"> 
 <label class="option"><input type="checkbox" name="user_mail_status_activated_notify" id="edit-user-mail-status-activated-notify" value="1"  checked="checked"  class="form-checkbox" /> Notify user when account is activated.</label> 
</div> 
<div class="form-item" id="edit-user-mail-status-activated-subject-wrapper"> 
 <label for="edit-user-mail-status-activated-subject">Subject: </label> 
 <input type="text" maxlength="180" name="user_mail_status_activated_subject" id="edit-user-mail-status-activated-subject" size="60" value="Account details for !username at !site (approved)" class="form-text" /> 
</div> 
<div class="form-item" id="edit-user-mail-status-activated-body-wrapper"> 
 <label for="edit-user-mail-status-activated-body">Body: </label> 
 <textarea cols="60" rows="15" name="user_mail_status_activated_body" id="edit-user-mail-status-activated-body"  class="form-textarea resizable">!username,
 
Your account at !site has been activated.
 
You may now log in by clicking on this link or copying and pasting it in your browser:
 
!login_url
 
This is a one-time login, so it can be used only once.
 
After logging in, you will be redirected to !edit_uri so you can change your password.
 
Once you have set your own password, you will be able to log in to !login_uri in the future using:
 
username: !username
</textarea> 
</div> 
</fieldset> 
<fieldset class=" collapsible collapsed"><legend>Account blocked email</legend><div class="description">Enable and customize e-mail messages sent to users when their accounts are blocked. Available variables are: !username, !site, !password, !uri, !uri_brief, !mailto, !date, !login_uri, !edit_uri, !login_url.</div><div class="form-item" id="edit-user-mail-status-blocked-notify-wrapper"> 
 <label class="option"><input type="checkbox" name="user_mail_status_blocked_notify" id="edit-user-mail-status-blocked-notify" value="1"   class="form-checkbox" /> Notify user when account is blocked.</label> 
</div> 
<div class="form-item" id="edit-user-mail-status-blocked-subject-wrapper"> 
 <label for="edit-user-mail-status-blocked-subject">Subject: </label> 
 <input type="text" maxlength="180" name="user_mail_status_blocked_subject" id="edit-user-mail-status-blocked-subject" size="60" value="Account details for !username at !site (blocked)" class="form-text" /> 
</div> 
<div class="form-item" id="edit-user-mail-status-blocked-body-wrapper"> 
 <label for="edit-user-mail-status-blocked-body">Body: </label> 
 <textarea cols="60" rows="3" name="user_mail_status_blocked_body" id="edit-user-mail-status-blocked-body"  class="form-textarea resizable">!username,
 
Your account on !site has been blocked.</textarea> 
</div> 
</fieldset> 
<fieldset class=" collapsible collapsed"><legend>Account deleted email</legend><div class="description">Enable and customize e-mail messages sent to users when their accounts are deleted. Available variables are: !username, !site, !password, !uri, !uri_brief, !mailto, !date, !login_uri, !edit_uri, !login_url.</div><div class="form-item" id="edit-user-mail-status-deleted-notify-wrapper"> 
 <label class="option"><input type="checkbox" name="user_mail_status_deleted_notify" id="edit-user-mail-status-deleted-notify" value="1"   class="form-checkbox" /> Notify user when account is deleted.</label> 
</div> 
<div class="form-item" id="edit-user-mail-status-deleted-subject-wrapper"> 
 <label for="edit-user-mail-status-deleted-subject">Subject: </label> 
 <input type="text" maxlength="180" name="user_mail_status_deleted_subject" id="edit-user-mail-status-deleted-subject" size="60" value="Account details for !username at !site (deleted)" class="form-text" /> 
</div> 
<div class="form-item" id="edit-user-mail-status-deleted-body-wrapper"> 
 <label for="edit-user-mail-status-deleted-body">Body: </label> 
 <textarea cols="60" rows="3" name="user_mail_status_deleted_body" id="edit-user-mail-status-deleted-body"  class="form-textarea resizable">!username,
 
Your account on !site has been deleted.</textarea> 
</div> 
</fieldset> 
</fieldset> 
<fieldset><legend>Signatures</legend><div class="form-item"> 
 <label>Signature support: </label> 
 <div class="form-radios"><div class="form-item" id="edit-user-signatures-0-wrapper"> 
 <label class="option"><input type="radio" name="user_signatures" value="0"  checked="checked"  class="form-radio" /> Disabled</label> 
</div> 
<div class="form-item" id="edit-user-signatures-1-wrapper"> 
 <label class="option"><input type="radio" name="user_signatures" value="1"   class="form-radio" /> Enabled</label> 
</div> 
</div> 
</div> 
</fieldset> 
<fieldset><legend>Pictures</legend><div class="user-admin-picture-radios"><div class="form-item"> 
 <label>Picture support: </label> 
 <div class="form-radios"><div class="form-item" id="edit-user-pictures-0-wrapper"> 
 <label class="option"><input type="radio" name="user_pictures" value="0"  checked="checked"  class="form-radio" /> Disabled</label> 
</div> 
<div class="form-item" id="edit-user-pictures-1-wrapper"> 
 <label class="option"><input type="radio" name="user_pictures" value="1"   class="form-radio" /> Enabled</label> 
</div> 
</div> 
</div> 
</div><div class="user-admin-picture-settings js-hide"><div class="form-item" id="edit-user-picture-path-wrapper"> 
 <label for="edit-user-picture-path">Picture image path: </label> 
 <input type="text" maxlength="255" name="user_picture_path" id="edit-user-picture-path" size="30" value="pictures" class="form-text" /> 
 <div class="description">Subdirectory in the directory <em>sites/default/files/</em> where pictures will be stored.</div> 
</div> 
<div class="form-item" id="edit-user-picture-default-wrapper"> 
 <label for="edit-user-picture-default">Default picture: </label> 
 <input type="text" maxlength="255" name="user_picture_default" id="edit-user-picture-default" size="30" value="" class="form-text" /> 
 <div class="description">URL of picture to display for users with no custom picture selected. Leave blank for none.</div> 
</div> 
<div class="form-item" id="edit-user-picture-dimensions-wrapper"> 
 <label for="edit-user-picture-dimensions">Picture maximum dimensions: </label> 
 <input type="text" maxlength="10" name="user_picture_dimensions" id="edit-user-picture-dimensions" size="15" value="85x85" class="form-text" /> 
 <div class="description">Maximum dimensions for pictures, in pixels.</div> 
</div> 
<div class="form-item" id="edit-user-picture-file-size-wrapper"> 
 <label for="edit-user-picture-file-size">Picture maximum file size: </label> 
 <input type="text" maxlength="10" name="user_picture_file_size" id="edit-user-picture-file-size" size="15" value="30" class="form-text" /> 
 <div class="description">Maximum file size for pictures, in kB.</div> 
</div> 
<div class="form-item" id="edit-user-picture-guidelines-wrapper"> 
 <label for="edit-user-picture-guidelines">Picture guidelines: </label> 
 <textarea cols="60" rows="5" name="user_picture_guidelines" id="edit-user-picture-guidelines"  class="form-textarea resizable"></textarea> 
 <div class="description">This text is displayed at the picture upload form in addition to the default guidelines. It's useful for helping or instructing your users.</div> 
</div> 
</div></fieldset> 
<input type="submit" name="op" id="edit-submit" value="Save configuration"  class="form-submit" /> 
<input type="submit" name="op" id="edit-reset" value="Reset to defaults"  class="form-submit" /> 
<input type="hidden" name="form_build_id" id="form-1f4dbc05ab26c5213c940193794b8ae9" value="form-1f4dbc05ab26c5213c940193794b8ae9"  /> 
<input type="hidden" name="form_token" id="edit-user-admin-settings-form-token" value="a95a6d154380be43b3e56e17e14d070c"  /> 
<input type="hidden" name="form_id" id="edit-user-admin-settings" value="user_admin_settings"  /> 
 
</div></form> 













		  </div> 
		 
	</div>		   
     
     
	</div>		
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
  

		<?php include('footer.php');?>
</div>
	
	
	
	