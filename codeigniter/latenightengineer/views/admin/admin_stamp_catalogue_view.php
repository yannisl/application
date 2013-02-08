
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
		   <div style="height:290px;width:98%"></div>
		   <img src="http://localhost/egypt/australia/SG1.jpg" style="display:block;width:32.5%;display:block;float:left"  />
		   <img src="http://localhost/egypt/australia/SG3.jpg" style="display:block;width:32.5%;display:block;float:left"  />	   
		   <img src="http://localhost/egypt/australia/SG4.jpg" style="display:block;width:32.5%;display:block;float:left"  />	  
		   <hr/> 
		    <img src="http://localhost/egypt/australia/SG5.jpg" style="display:block;width:32.5%;display:block;float:left"  />	
		     <img src="http://localhost/egypt/us-stamps/Scott-10.jpg" style="display:block;width:32.5%;display:block;float:left"  />
		     <img src="http://localhost/egypt/us-stamps/Scott-11.jpg" style="display:block;width:32.5%;display:block;float:left"  />	 	 
		  </div>
		    
			
		  
		  
		  
		  
		  
		  
<div style="background:url(http://localhost/egypt/service_shadow.png) repeat-y;background-repeat:no-repeat;width:70%;float:left;padding-left:20px">     			
		
<h3><?php echo $set_country ?> Stamp catalogue</h3>



	
	<div style="border:1px solid red;width:98%;visibility:<?php echo $visibility ?>">	<?php echo 'Form Status'.$message; ?> </div>
	
	<p>Please type in all value carefully. YOu start by first capturing information about the set,
	and then entering stamp sone by one. You can also first capture all the sets and then come back for the stamps or vice versa.</p>	
 
 <form action="<?php echo $set_country ?>"  accept-charset="UTF-8" method="post" id="user-admin-new-role"> 

 <div <?php echo $form_visibility ?> >
 
 

<p><strong>Set Data <?php echo $set_id ?></strong></p>

<?php 
  //some hidden first to preserve info
  
  //since the country is coming from the controller we will
  //preserve it
  echo form_hidden('set_country', $set_country);
  echo form_hidden('set_id', $set_id);  
   $this->load->helper('form');
   
   
   
   
   
   echo form_label('Year', 'Year');
   //$data['value']=('set_year'); 
   $data = array(
              'name'        => 'set_year',
              'id'          => 'set_year',
              'value'       => $set_year,
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:30%;float:left;',
            );
    echo form_input($data); 
    //echo $this->set_value('60');?>
    <hr/>
      
   <?php
   echo form_label('Description', 'set_description');
   $data = array(
              'name'        => 'set_description',
              'id'          => 'set_description',
              'value'       => $set_description,
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:30%;float:left;',
            );
    echo form_input($data);   
   ?>
   
   
   <hr/>
   <?php
   echo form_label('<a href="help/5">Long Description</a>', 'Set Description');
   $data = array(
              'name'        => 'set_long_description',
              'id'          => 'set_long_description',
              'value'       => $set_long_description,
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:50%;float:left;',
            );
    echo form_textarea($data);        
    ?>
    <!-- Perforation box-->
    <div style="width:40%;height:250px;border:0px solid #bebebe;float:left;margin-left:10px">
   
   <?php   
   
   echo form_label('Design', 'Perforation');
    $data = array(
              'name'        => 'set_design',
              'id'          => 'set_design',
              'value'       => $set_design,
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:98%;float:left;margin-bottom:3px',
            );
            
    echo form_input($data).'<br />'; 
    
     echo form_label('Perforation', 'Perforation');
       $data = array(
              'name'        => 'set_perforation',
              'id'          => 'set_perforation',
              'value'       => $set_perforation,
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:98%;float:left;margin-bottom:3px',
            );
    echo form_input($data).'<br/>'; 
    
    echo form_label('Printed by:', '');
        $data = array(
              'name'        => 'set_printer',
              'id'          => 'set_printer',
              'value'       => $set_printer,
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:98%;float:left;margin-bottom:3px',
            );
    echo form_input($data).'<br />'; 
     
       echo form_label('Paper:', '');
       $data = array(
              'name'        => 'set_paper',
              'id'          => 'set_paper',
              'value'       => $set_paper,
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:98%;float:left;margin-bottom:3px',
            );
    echo form_input($data).'<br />'; 
    echo form_label('Watermark:', '');
    
       $data = array(
              'name'        => 'set_watermark',
              'id'          => 'set_watermark',
              'value'       => $set_watermark,
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:98%;float:left;margin-bottom:3px',
            );
    echo form_input($data); 
    
       
    
    
    
    
    
    
    
    
    
    
    ?>
    
       
    </div> 
    <!-- End of Perforation Box -->
    <!-- STAMPS -->
    <hr/>
    <?php  
    echo form_label('Numbering Based on <br />', '');
    $options = array(
                  'SG'  => 'Stanley Gibbons, 2009',
                  'Scott'    => 'Scott, 2009',
                  'Yvert'   => 'Yvert & Tellier, 2008',
                  'Hellas' => 'Hellas, 2008',
                  'Michel'=>'Michelle, 2009'
                );

   echo form_dropdown('set_cat_type', $options, $set_cat_type).'<br />';      
   $data = array(
              'name'        => 'set_from',
              'id'          => 'set_from',
              'value'       => $set_from,
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:10%;float:left;',
            );
    echo form_label('from no ', '');   echo form_label('<span style="margin-left:10px"> to no</span>', '');          
    echo form_input($data);        
       
   $data = array(
              'name'        => 'set_to',
              'id'          => 'set_to',
              'value'       => $set_to,
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:10%;float:left;margin-left:10px',
            );

  

  echo form_input($data);?>
  <hr/>
  
  
  <?php
  echo ('<div style="border: 1px solid #bebebe" class="clearfix"> ');
   for ($i=0;$i<5;$i++){
		//echo form_checkbox('newsletter', 'accept', TRUE);
		//echo form_label('cat number','description');
		
		//catalogue number
		
		echo ('<div style="width:70%;float:left;border:1px solid #bebebe;padding:5px">');
   		$data = array(
              'name'        => 'stamp_cat',
              'id'          => 'id_'.$i,
              'value'       => 'SG-100',
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:10%;float:left;',
            );

    echo form_input($data);
		//catalogue number var
   		$data = array(
              'name'        => 'stamp_cat_var',
              'id'          => 'username',
              'value'       => 'a',
              'maxlength'   => '4',
              'size'        => '4',
              'style'       => 'width:5%;float:left;margin-left:10px',
            );

    echo form_input($data);
		
		//value
		$data = array(
              'name'        => 'stamp_value',
              'id'          => 'username',
              'value'       => '$1',
              'maxlength'   => '10',
              'size'        => '10',
              'style'       => 'width:10%;float:left;margin-left:10px',
            );
		echo form_input($data);
		
		$data = array(
              'name'        => 'username',
              'id'          => 'username',
              'value'       => 'Pyramid and Sphinx',
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:50%;float:left;margin-left:10px',
            );
         
    echo form_input($data).'<hr />';
		
		$data = array(
              'name'        => 'stamp_value',
              'id'          => 'username',
              'value'       => '$100',
              'maxlength'   => '10',
              'size'        => '10',
              'style'       => 'width:10%;float:left;margin-left:10px',
            );
		echo form_input($data);
		
		$data = array(
              'name'        => 'stamp_value',
              'id'          => 'username',
              'value'       => '$100',
              'maxlength'   => '10',
              'size'        => '10',
              'style'       => 'width:10%;float:left;margin-left:10px',
            );
		echo form_input($data);
		
		$data = array(
              'name'        => 'stamp_value',
              'id'          => 'username',
              'value'       => '$100',
              'maxlength'   => '10',
              'size'        => '10',
              'style'       => 'width:10%;float:left;margin-left:10px',
            );
		echo form_input($data);
		//echo //'<img src="http://localhost/egypt/CMS/spinner.gif" style="visibility:visible"/>';
		echo ('</div>');
		echo ('<div style="width:27%;float:left;border:1px solid #bebebe">');
		$img_number=170+$i;
		echo ('<img src="http://localhost/egypt/us-stamps/Scott-'.$img_number.'.jpg" style="padding:3px;width:80%;margin:0 auto;display:block" />');
		echo ('</div>');
		
		}?>
		</div>
		<hr/>
		
				

    <!-- Give people a chance to add more rows -->
    
    <form> 
			<table id="tabdata"> 
				
				<tbody> 
					<tr> 
						<td><a id="addnew" href="">Add</a></td> 
						<td><input id="n0_1" name="n0_1" type="text" /></td> 
						<td><input id="n0_2" name="n0_2" type="text" /></td> 
						<td><input id="n0_3" name="n0_3" type="text" /></td> 
						<td></td> 
					</tr> 
				</tbody> 
			</table> 
			
			<input id="go" name="go" type="submit" value=" Save " /> 
		</form> 



<!--<input type="button" onclick="example_ajax_request()" value="Click Me!" />-->
<div id="stats">
  <p>Placeholding text</p>
</div>



 

</form> 

</hr>



<script type="text/javascript">$('#date').datepicker();</script>


<input type="text" name="date" id="date" />





</div>
			
</div>			
		
		

			
			
			
			
			
			
<!-- Wow too much divitis -->			
			
</div>			
</div>			
			
	<?php include('footer.php');?>
</div>
	

	
	
	
	