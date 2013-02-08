
<?php 
//TEMPLATE
//article_view
//deals with articles
//
 define('BASEPATH1','../egypt/');
 define('ROOT',$_SERVER['SERVER_NAME']);
 
 
 include_once(BASEPATH1.'define.php');
 //include_once(BASEPATH1.'table.php'); 
 include_once('menu.php');


?>


{{html:../CodeIgniter/data/head2.dat}}


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
<?php //echo ucfirst($location).'&middot; ';?></span><span style="color:#000040">ADMIN VIEW</span></h1>
</div>
<!-- END NAVIGATION -->


<div id="pagehead" style="width:980px;margin-top:0;" class="clearfix">

    <?php showMenu($main_admin_menu) ?>
</div>
    <!--End Top Menu-->	
	
    <!-- Page Content -->
    <div id="pagecontent" class="clearfix" >
		
    
       <div style="width:90%;margin:0 auto" class="clearfix">
		    <h3>Main Administration Area</h3>
		    <p>
		     Getting Started
Web developers: hit the ground running when you build your next website with DiamondGears.
		     
		   </p>	
		   <!-- First Box-->
		   <div style="background:url(http://localhost/egypt/service_shadow.png) repeat-y;background-repeat:no-repeat;width:23%;float:left" class="clearfix bordered curvy">
		   <h4 style="text-align:center";><a style="text-align:center;color:#bebebe;margin-left:10px">Content</a></h4>
		    <img src="http://localhost/egypt/download.jpg" style="display:block;margin:0 auto"  />
		   <ul style="list-style-type:none;">
		    <li><strong>Content</strong>
		    View, edit, and delete your site's content.
		    </li>
		    <li><strong>Content Types</strong>
		    Manage posts by content type, including default status, front page promotion, etc.</li>
		    <li><a href="http://localhost/CodeIgniter/admin/show/admin_content_post_settings">Post Settings</a></li>
		    <li>RSS Publishing</li>
		    <li>Taxonomy</li>
		    <li>Search</li>
		   </ul>
		   </div>
		   <?php //echo $content  ?>
		   
      			
			<!-- Second Box-->
			
			<div style="background:url(http://localhost/CodeIgniter/images/icon/assets/sidebar.png) no-repeat;width:23.5%;float:left" class="bordered curvy draggable">
			 <h4 style="text-align:center"><a style="text-align:center;color:#bebebe;margin-left:10px"><span style="margin:0 auto">Files</span></a></h4>
		   <img src="http://localhost/egypt/box.png" style="display:block;margin:0 auto"  />
		   <ul style="list-style-type:none;">
		    <li><strong>CSS</strong><br/> <a href="http://localhost/CodeIgniter/admin/show/admin_css_view">Manage CSS files</a>. Add, delete, edit, create.</li>
		    <li>Javascript</li>
		    <li>Images</li>
		    <li>Robots.txt</li>
		    <li>Sitemap</li>
		   </ul>
		  </div>
		  
		  <!-- Third Box --> 
		  <div style="background:url(http://localhost/egypt/service_shadow.png) repeat-y;background-repeat:no-repeat;width:23.5%;float:left">
		  <h4 style="text-align:center";><a style="color:#bebebe;margin-left:10px">Look and Feel</a></h4>
		   <img src="http://localhost/egypt/support.gif" style="display:block;margin:0 auto"  />
		  <ul style="list-style-type:none;">
		    <li>Blocks</li>
		    <li>Templates</li>
		    <li>Themes</li>
		    <li>Database</li>
		    
		    <li>Help</li>
		   </ul>
		  </div>
		   
		  <div style="background:url(http://localhost/egypt/service_shadow.png);background-repeat:no-repeat;
		  width:23.5%;float:left">
		  <h4 style="text-align:center";><a href="http://localhost/CodeIgniter/admin/show/admin_user_view" style="color:#bebebe;margin-left:10px">Users</a></h4>
		   <img src="http://localhost/egypt/demo.jpg" style="display:block;margin:0 auto"  />
		   
		    <ul style="list-style-type:none;">
		    <li><a href="http://localhost/CodeIgniter/backend/users">Users</a></li>
		    <li><a href="http://localhost/CodeIgniter/backend/roles">Roles</a></li>
		    <li><a href="http://localhost/CodeIgniter/backend/uri_permissions">URI permissions</a></li>
		    <li><a href="http://localhost/CodeIgniter/backend/custom_permissions">Custom permissions</a></li>
		    <li></li>
		   </ul>
		  </div> 
		  
		 
	</div>	   
		 <div style="width:90%;margin:0 auto" class="clearfix"> 
		   {{block: ../CodeIgniter/data/block-db-menu.dat}} 
		   {{block:../CodeIgniter/data/block-db-catalogue-menu.dat}}
		 
		 
		 
		 
		 
		 </div>
   
   
   
   
   
   
   
     
	</div>		
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
  

		<?php include('footer.php');?>
</div>
	
	
	
	