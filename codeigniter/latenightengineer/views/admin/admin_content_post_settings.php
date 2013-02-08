
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
					   
		  {{block: ../CodeIgniter/data/block-content-post-settings-menu.dat}}
		   
		  
		  
		   <div style="background:url(http://localhost/egypt/service_shadow.png) repeat-y;background-repeat:no-repeat;width:70%;float:left;padding-left:20px;margin-left:20px">    			
		
<h3>Manage your Posts Settings</h3>		
<form action="/drupal/?q=admin/content/node-settings"  accept-charset="UTF-8" method="post" id="node-configure"> 
<div><div class="form-item" id="edit-default-nodes-main-wrapper"> 
 <label for="edit-default-nodes-main">Number of posts on main page: </label> 
 <select name="default_nodes_main" class="form-select" id="edit-default-nodes-main" ><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10" selected="selected">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="30">30</option></select> 
 <div class="description">The default maximum number of posts to display per page on overview pages such as the main page.</div> 
</div> 
<div class="form-item" id="edit-teaser-length-wrapper"> 
 <label for="edit-teaser-length">Length of trimmed posts: </label> 
 <select name="teaser_length" class="form-select" id="edit-teaser-length" ><option value="0">Unlimited</option><option value="200">200 characters</option><option value="400">400 characters</option><option value="600" selected="selected">600 characters</option><option value="800">800 characters</option><option value="1000">1000 characters</option><option value="1200">1200 characters</option><option value="1400">1400 characters</option><option value="1600">1600 characters</option><option value="1800">1800 characters</option><option value="2000">2000 characters</option></select> 
 <div class="description">The maximum number of characters used in the trimmed version of a post. Drupal will use this setting to determine at which offset long posts should be trimmed. The trimmed version of a post is typically used as a teaser when displaying the post on the main page, in XML feeds, etc. To disable teasers, set to 'Unlimited'. Note that this setting will only affect new or updated content and will not affect existing teasers.</div> 
</div> 
<div class="form-item"> 
 <label>Preview post: </label> 
 <div class="form-radios"><div class="form-item" id="edit-node-preview-0-wrapper"> 
 <label class="option"><input type="radio" name="node_preview" value="0"  checked="checked"  class="form-radio" /> Optional</label> 
</div> 
<div class="form-item" id="edit-node-preview-1-wrapper"> 
 <label class="option"><input type="radio" name="node_preview" value="1"   class="form-radio" /> Required</label> 
</div> 
</div> 
 <div class="description">Must users preview posts before submitting?</div> 
</div> 
<input type="submit" name="op" id="edit-submit" value="Save configuration"  class="form-submit" /> 
<input type="submit" name="op" id="edit-reset" value="Reset to defaults"  class="form-submit" /> 
<input type="hidden" name="form_build_id" id="form-5539ed467582e58a6d83fed6e3ad0bc2" value="form-5539ed467582e58a6d83fed6e3ad0bc2"  /> 
<input type="hidden" name="form_token" id="edit-node-configure-form-token" value="0e618fdac749abff0d8f4fd98e3a2ca2"  /> 
<input type="hidden" name="form_id" id="edit-node-configure" value="node_configure"  /> 
 
</div></form> 
		  
		  </div>
	</div>		   
     
     
	</div>		
			
			
			
			
		
			
			
			
			
			
			
			
			
			
			
			
			
			
  

		<?php include('footer.php');?>
</div>
	
	
	
	