
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
 //include_once(BASEPATH1.'utilities.php');
 //include_once(BASEPATH1.'template.class.php');
// include_once(BASEPATH1.'page-builder.php');
 //include_once(BASEPATH1.'photos-03.dat.php');
 //include_once(BASEPATH1.'view.class.php');
 //include_once(BASEPATH1.'view.php');
 //include_once(BASEPATH1.'photos-03.dat.php');
 //include_once(BASEPATH1.'photos.dat.php');
 

 //include_once('settings.php');
 //$templ=new Template;
 
//timer_start();
		//this is a router get what you need from user URL
 /*     
       //echo_array($_GET);
       $s=$_SERVER[REQUEST_URI];
       $article=$_GET['article'];
       $post=$_GET['post'];        //values from DB
       $set=$_GET['set'];
       $gallery=$_GET['gallery'];
       $title=$_GET['title'];
       $image=$_GET['image'];
       $page=$_GET['page'];
       $pattern="/(\d*)\-(\d*)/";
      
       $z=preg_match_all($pattern,$set,$values);
       $set_start=$values[1][0];  //values to obtain
       $set_end=$values[2][0];    //values to obtain
       //echo_array($values);
 
 //load values from DB
 //This is the Model
 
 //output this is the view 
  
       
 */
  
//include main template needs to be corrected for footer etc
//also for other stuff
//page build-up

  //if ((isset($_GET['template']))&& ($_GET['template']!=NULL)) {$template1=$_GET['template'].'.php';}
         //else $template1='template_set.php';
  //$data=$_GET;
  //include($template1); //body template
  //$templ->includeTemplate('footer.php','path',''); 
  //timer_end(1);

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head> 
<title>lateNightEngineer:USA</title> 
<meta http-equiv="Content-Type" content="text/html;charset=utf08" /><link rel="Shortcut Icon" href="http://www.bjornblomquist.com/favicon.ico" type="image/x-icon" /> 

<link rel="stylesheet" type="text/css" media="all" href="http://localhost/strings/code_files/userguide.css">

<script type="text/javascript" src="http://localhost/strings/code_files/nav.js"></script>
<script type="text/javascript" src="http://localhost/strings/code_files/prototype.js"></script>
<script type="text/javascript" src="http://localhost/strings/code_files/moo.js"></script>
<script type="text/javascript" src="http://localhost/strings/code_files/user_guide_menu.js"></script>





<link rel="stylesheet" href="http://localhost/egypt/two_files/general.css" type="text/css" /> 
<link rel="stylesheet" href="http://localhost/egypt/screen.css" type="text/css" /> 
<link rel="stylesheet" href="http://localhost/egypt/typography.css" type="text/css" /> 
<meta name="author" content="Y Lazarides" /> 
<meta name="copyright" content="Dr Y Lazarides" /> 
<meta name="robots" content="all" /> 
<meta name="imagetoolbar" content="no" /> 
<meta name="keywords" content="keyword1,keyword2,keyword3" /> 
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
  margin: 15px;
  padding-left: 10px;
}
.country {color:#fff;background:#C04343;}

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
	<?php //showMenu($main_menu) ?>
</div>


<div id="masthead" style="background:#fff;width:100%;padding-left:0;margin-left:0">

<h1><span style="font-family:georgia;weight:bold;color:#000;font-size:36px;padding-left:0.6em">
CP 26 MEP <?php echo ucfirst($location).'&middot; ';?></span>MEP SERVICES</h1>
</div>
<!-- END NAVIGATION -->

















	<!-- Start: Sidhuvud -->
<div id="pagehead" style="width:980px;margin-top:0 ">
<div id="internship" style="margin-top:0;padding-top:0">
<img src="http://localhost/egypt/two_files/internship.png" alt="logo" title="promo block image" />
</div>
				<?php showMenu($main_menu) ?>
	</div>
	<!-- Start: Sidinnehåll -->
	<div id="pagecontent" class="clearfix" >
		<!-- Start: Contentrad -->
		<div class="content-row"  >
			<!-- Start: Innehållsklumn 1 -->
			<div class="span-7">
				<h2 style="color:#dd0000"><?php //if (isset($title)){echo $title;}?></h2>
        
 

<!-- The feature Image -->
<?php if (!isset($feature_image)){echo '<img src="http://'.ROOT.'/egypt/lev-daichik/5570030-md.jpg" style="width:90%;margin-left:15px;" alt="" title="" />';}else{

 echo '<img src="'.$feature_image.'" style="width:90%;margin-left:15px;" alt="" title="" />';}?> 

<!-- The feature -->
<?php echo '<h3 style="width:88%;color:#acacac;margin-left:15px">'.$feature.'</h3>'?>

<div class="span-5 clearfix" style="margin:0 0 0 15px">
<?php e('<div style="border:1px solid #bebebe">');echo $toc;e('</div>');?>
<ul class="LHnav" style="margin-left:0px;width:210px">

  <?php 
 
   
  
//create menu automatically needs to come from model/controller
  
  foreach ($list as $key=>$value){
    $value=str_replace( '.dat', '', $value );
    $value=str_replace( '/'.$location.'/', '', $value );
    $this->load->helper('inflector');
    
   echo '<li><a href="'.$value.'">'.ucfirst(r('_',' ',$value)).'</a></li>';
  
 }
  echo '</ul>';
  
?>  
<h4 class="country">HVAC</h4>
<ul id="LHnav" style="margin-left:0px;width:210px">
<li><a href="http://localhost/CodeIgniter/blogs/gallery/UK/1">Chillers</a></li>  
<li><a href="http://localhost/CodeIgniter/blogs/stamps/malta/introduction">Cooling Towers</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/levant/introduction">Pumps</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/long-island/introduction">Air Separators</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/long-island/introduction">Expansion Tanks</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/transvaal/introduction">Water Filters</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/transvaal/introduction">Water Softeners</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/transvaal/introduction">Chemical Treatment</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/long-island/introduction">Air Handling Units</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/transvaal/introduction">VRV</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/transvaal/introduction">VAV</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/long-island/introduction">Pre-insulated Piping</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/long-island/introduction">Black Steel Piping</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/long-island/introduction">Black Steel Fittings</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/long-island/introduction">Valves</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/long-island/introduction">Flanges</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/long-island/introduction">Supports</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/long-island/introduction">Anchors</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/long-island/introduction">Structural Members</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/long-island/introduction">Consumables</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/transvaal/introduction">Sleeves</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/transvaal/introduction">Ducting</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/transvaal/introduction">Ducting Accessories</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/transvaal/introduction">Grilles and Diffusers</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/transvaal/introduction">Louvres</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/transvaal/introduction">Sand Trap Louvres</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/transvaal/introduction">Insulation</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/transvaal/introduction">Dust Extraction System</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/transvaal/introduction">PCA</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/north-african-campaigns/introduction">Vibration Isolators</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/north-african-campaigns/introduction">Silencers</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/north-african-campaigns/introduction">Identification</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/north-african-campaigns/introduction">Controls</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/north-african-campaigns/introduction">Dielectric Unions</a></li>


</ul> 


<h4 class="country">PLUMBING</h4>
<ul id="LHnav" style="margin-left:0px;width:210px">
<li><a href="http://localhost/CodeIgniter/blogs/cyprus/cyprus-postal-history/Introduction">Plumbing Pumps</a></li>  
<li><a href="http://localhost/CodeIgniter/blogs/cyprus/cyprus-postal-history/Introduction">Cast Iron</a></li>  
<li><a href="http://localhost/CodeIgniter/blogs/stamps/malta/introduction">GRE</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/levant/introduction">Copper</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/long-island/introduction">Drains</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/malta/introduction">Sanitary Fixtures</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/malta/introduction">Valves</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/malta/introduction">Water Heaters</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/malta/introduction">Interceptors</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/malta/introduction">Priming</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/malta/introduction">Air Admittance valves</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/NDIA/drainage/Drainage_Part_I">Underground Pipes</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/transvaal/introduction">Disinfection</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/transvaal/introduction">Eye Wash Stations</a></li>
</ul> 


<h4 class="country">FIRE PROTECTION</h4>
<ul id="LHnav" style="margin-left:0px;width:210px">
<li><a href="http://localhost/CodeIgniter/blogs/stamps/afghanistan/introduction">Pipes</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/hong-kong/introduction">Pumps</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/india/introduction">Foam system</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/china_postal_history/The_large_Dragons">Supports</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/china_postal_history/The_large_Dragons">Fire Hose Reels</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/china_postal_history/The_large_Dragons">Victaulics</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/transvaal/introduction">Fire Sealant</a></li>
</ul>

<h4 class="country">FIRE ALARM</h4>
<ul id="LHnav" style="margin-left:0px;width:210px">
<li><a href="http://localhost/CodeIgniter/blogs/stamps/afghanistan/introduction">Fire Alarm</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/afghanistan/introduction">Fire Alarm - Explosion Proof</a></li>

<li><a href="http://localhost/CodeIgniter/blogs/stamps/afghanistan/introduction">Public Address System</a></li>
</ul>



<h4 class="country">ELECTRICAL-POWER</h4>
<ul id="LHnav" style="margin-left:0px;width:210px">
<li><a href="http://localhost/CodeIgniter/blogs/stamps/Basutoland/introduction">Cables</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/cape-of-good-hope/introduction">Cable Trays</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/mafeking/introduction">Conduits</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/pietersburg/introduction">Earthing System</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/swaziland/introduction">Lightning Protection system</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/transvaal/introduction">Explosion Proof</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/transvaal/introduction">Accessories</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/transvaal/introduction">Transformers</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/transvaal/introduction">Switchgear</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/transvaal/introduction">Specialties</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/transvaal/introduction">Supports</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/transvaal/introduction">UPS</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/transvaal/introduction">Standby Generators</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/transvaal/introduction">Motor Control Centers</a></li>

</ul> 

<h4 class="country">ELECTRICAL - LV</h4>
<ul id="LHnav" style="margin-left:0px;width:210px">
<li><a href="http://localhost/CodeIgniter/blogs/stamps/British-East-Africa/introduction">Telecommunications</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/uganda/introduction">Smoke Detection</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/sudan/introduction">Access Control</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/north-african-campaigns/introduction">Security</a></li>
<li><a href="http://localhost/CodeIgniter/blogs/stamps/north-african-campaigns/introduction">Clean Agent</a></li>


</ul>









  
</div>
			
</div>
			<!-- Start: Side 2 -->
			<div class="span-17">
			<?php //echo 'title is'.$title;?>
			<?php echo '<a href="http://localhost/CodeIgniter/admin/post/edit/'.$title.'">[edit]</a>';
			
			?>
			
       <?php echo markdown($content); 
              echo '<p><a href="http://localhost/CodeIgniter/admin/post/edit/'.$title.'">edit</a></p>'; 
              $this->benchmark->mark('code_end');

echo $this->benchmark->elapsed_time('code_start', 'code_end');?>
<?php echo '  '.$this->benchmark->elapsed_time();?>
<?php echo '  '.$this->benchmark->memory_usage();?>
			</div>
		</div>
	</div>
	<!-- Start: Sidfot -->
	<?php include('footer.php');?>
	
	