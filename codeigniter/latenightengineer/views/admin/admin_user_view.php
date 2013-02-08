
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
		
	
		<h3>User Management</h3>
		
		  <!-- First Box-->
			
			<div style="background:url(http://localhost/egypt/service_shadow.png) repeat-y;background-repeat:no-repeat;width:23.5%;float:left">
			 <h4 style="text-align:center"><a style="text-align:center;color:#bebebe;margin-left:10px"><span style="margin:0 auto">Files</span></a></h4>
		   <img src="http://localhost/egypt/box.png" style="display:block;margin:0 auto"  />
		   <ul style="list-style-type:none;">
		    <li>Access Rules</li>
		    <li>Permissions</li>
		    <li>Profiles</li>
		    <li><a href="admin_user_roles_view">Roles</a></li>
		    <li>User Settings</li>
		    <li>User</li>
		    
		   </ul>
		  </div>
		  
		  
		   <div style="background:url(http://localhost/egypt/service_shadow.png) repeat-y;background-repeat:no-repeat;width:70%;float:left;padding-left:20px;margin-left:20px">    			
			{{block: ../CodeIgniter/data/block-user-menu.dat}}
	  	{{block: ../CodeIgniter/data/block-user-menu1.dat}}
		  {{block: ../CodeIgniter/data/block-user-menu2.dat}}
		  </div>
	</div>		   
     
     
	</div>		
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
  

		<?php include('footer.php');?>
</div>
	
	
	
	