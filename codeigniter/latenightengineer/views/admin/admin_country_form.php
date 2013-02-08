
<?php 
 define('BASEPATH1','../egypt/');
 include_once('menu.php');
 include_once('head2.php');
?>



<body style="background:#000;margin-top:0">
<!-- Start: Sidcontainer -->
<div class="container clearfix" style="border-top:3px solid #000000;width:1000px">

<!-- START NAVIGATION -->
<div style="overflow: hidden;visibility:hidden;" class="clearfix" id="nav">
  <div id="nav_inner" style="visibility:visible;background-color:#5d5d5d;" class="clearfix">
  <table cellspacing="0" style="width: 98%;" border="0" cellpadding="0"><tbody><tr>
  <td class="td" valign="top">
   <script type="text/javascript">create_menu('null');</script>
  </table>
  </div>
</div>

<!-- Space for the toggle button -->
<div id="nav2" class="clearfix" style="margin-right:0;padding-right:70px">
<a name="top"></a><a href="test to sitemap" id="toc">
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
	  <h3><a style="color:#bebebe;">Stamps Database</span></a></h3>
		
		
		
		
		
		  <!-- First Box-->
			
			<div style="width:25%;float:left">
			
		   <img src="http://localhost/egypt/CMS/catalogue.jpg" style="display:block;margin:0 auto;width:90%;"  />
		   <ul style="list-style-type:none;">
		    <li>Add Stamps</li>
		    <li>Add Catalogue</li>
		    <li></li>
		    <li style="color:red" class="active">Roles</li>
		    <li></li>
		    <li></li>
		    
		   </ul>
		   </div>	  
		  
		  
		  
		  
		  
<div style="background:url(http://localhost/egypt/service_shadow.png) repeat-y;background-repeat:no-repeat;width:70%;float:left;padding-left:20px">     			
		
<h3>Stamp catalogue</h3>



	
	<div style="border:1px solid red;width:98%;visibility:<?php echo $visibility ?>"><?php echo 'Form Status'.$message; ?> </div>
	
	<p>Please type in all value carefully. You start by first capturing information about the set,
	and then entering stamp sone by one. You can also first capture all the sets and then come back for the stamps or vice versa.</p>	
 
 <div style="width:90%;margin:0 auto">
 <img src="http://localhost/egypt/CMS/continents.png" style="width:98%;margin:0 auto" />
 
 
 <span style="background-color: rgb(255, 215, 0);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;<i>Africa</i> <span style="background-color: rgb(0, 128, 0);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;<i>Americas</i> <span style="background-color: rgb(255, 69, 0);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;<i>Asia</i> <span style="background-color: rgb(153, 0, 51);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;<i>Europe</i> <span style="background-color: rgb(204, 51, 153);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;<i>Oceania</i> <span style="background-color: rgb(0, 51, 255);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;<i>Antarctica</i>
</div>
 
 
 <form action="<?php echo 'action' ?>"  accept-charset="UTF-8" method="post" id="user-admin-new-role"> 

 <div <?php echo $form_visibility ?> >
 
 


<?php 
  //some hidden first to preserve info
  
  //since the country is coming from the controller we will
  //preserve it
  //echo form_hidden('set_country', $set_country);
  //echo form_hidden('set_id', $set_id);  
   $this->load->helper('form');
   
 ?>  
   
    <?php  
    echo form_label('Numbering Based on <br />', '');
    $options = array(
                  'SG'  => 'Albania',
                  'Scott'    => 'Aitutaki',
                  'Yvert'   => 'Greece',
                  'Hellas' => 'Cyprus',
                  'Michel'=>'Australia'
                );

   echo form_dropdown('set_cat_type', $options, '').'<br />';      
   
    
 ?> 

 <a href="http://localhost/CodeIgniter/sets/add/country" >Go</a>
  
</form> 

</div>
</div>

</div>





			

		
		

			
			
			
			
			
			
<!-- Wow too much divitis -->			
			
			
</div>			
			
	<?php include('footer.php');?>
</div>
	

	
	
	
	