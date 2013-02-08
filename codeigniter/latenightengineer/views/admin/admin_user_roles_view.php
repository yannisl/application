
<?php 
 define('BASEPATH1','../egypt/');
 include_once('menu.php');
 include_once('../CodeIgniter/data/head.dat');
?>



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
    <h4>Define what a user can do and not do</h4>		

		<?php $this->load->helper('form');echo 'test';
		echo form_checkbox('newsletter', 'accept', TRUE);
		$data = array(
              'name'        => 'username',
              'id'          => 'username',
              'value'       => 'johndoe',
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:50%',
            );

    echo form_input($data);

		echo form_input($data);
		
		echo form_button('name','content');
		
		
		
		
		?>
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


 <form action="/drupal/?q=admin/user/roles"  accept-charset="UTF-8" method="post" id="user-admin-new-role"> 
<div><input type="hidden" name="form_build_id" id="form-f6cc0ae2ead271e5f0a48ddb0ae9eac2" value="form-f6cc0ae2ead271e5f0a48ddb0ae9eac2"  /> 
<input type="hidden" name="form_token" id="edit-user-admin-new-role-form-token" value="5d90bb27a4f4a4fb664a78e96982524c"  /> 
<input type="hidden" name="form_id" id="edit-user-admin-new-role" value="user_admin_new_role"  /> 

<table class="sticky"> 
 <thead><tr><th>Name</th><th colspan="2">Operations</th> </tr></thead> 
<tbody> 
 <tr class="odd"><td>anonymous user</td><td>locked</td><td><a href="/drupal/?q=admin/user/permissions/1">edit permissions</a></td> </tr> 
 <tr class="even"><td>authenticated user</td><td>locked</td><td><a href="/drupal/?q=admin/user/permissions/2">edit permissions</a></td> </tr> 
 <tr class="odd"><td>author</td><td><a href="/drupal/?q=admin/user/roles/edit/3">edit role</a></td><td><a href="/drupal/?q=admin/user/permissions/3">edit permissions</a></td> </tr> 
 <tr class="even"><td>engineer</td><td><a href="/drupal/?q=admin/user/roles/edit/4">edit role</a></td><td><a href="/drupal/?q=admin/user/permissions/4">edit permissions</a></td> </tr> 
 <tr class="odd"><td><div class="form-item" id="edit-name-wrapper"> 
 <input type="text" maxlength="64" name="name" id="edit-name" size="32" value="" class="form-text" /> 
</div> 
</td><td colspan="2"><input type="submit" name="op" id="edit-submit" value="Add role"  class="form-submit" /> 
</td> </tr> 
</tbody> 
</table> 
 
</div></form> 





 












		  </div> 
		 
	</div>		   
     
     
	</div>		
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
  

		<?php include('footer.php');?>
</div>
	
	
	
	