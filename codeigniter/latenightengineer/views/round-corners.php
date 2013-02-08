
<?php 
 define('BASEPATH1','../egypt/');
 define('ROOT',$_SERVER['SERVER_NAME']);
 
 
 include_once(BASEPATH1.'define.php');
 include_once(BASEPATH1.'table.php'); 
 include_once('menu.php');

?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head> 
<title>lateNightEngineer:USA</title> 
<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1" />
<link rel="Shortcut Icon" href="http://www.bjornblomquist.com/favicon.ico" type="image/x-icon" /> 
<link rel="stylesheet" href="http://localhost/egypt/two_files/general.css" type="text/css" /> 
<link rel="stylesheet" href="http://localhost/egypt/screen.css" type="text/css" /> 
<link rel="stylesheet" href="http://localhost/egypt/typography.css" type="text/css" /> 
<meta name="author" content="Y Lazarides" /> 
<meta name="copyright" content="Dr Y Lazarides" /> 
<meta name="robots" content="all" /> 
<meta name="imagetoolbar" content="no" /> 
<meta name="keywords" content="keyword1,keyword2,keyword3" /> 
<meta name="description" content="An automatic website builder" /> 
 
 
<!-- Styles --> 
 
<style type="text/css">	
table {width:50%;margin-right:10px;float:right;margin-bottom:10px} 
table td{border:1px solid #bebebe;} 
table th{border:1px solid #bebebe;}  
.set-title{text-align:center;}  
pre.dotted{border:1px dotted #bebebe;font-size:11px;line-height:1.0}
.percent70{width:70%}
.percent20{width:20%}
.percent35{width:35%}
.fleft{float:left}
</style>	
</head> 


<body style="background:#000000">
<!-- Start: Sidcontainer -->
<div class="container clearfix" style="border-top:3px solid #dd0000;width:1000px">

	<!-- Start: Sidhuvud -->
<div id="pagehead" style="width:980px;margin-top:0 ">
<div id="internship" style="margin-top:0;padding-top:0">
<img src="http://localhost/egypt/two_files/internship.png" alt="logo" title="promo block image" />
</div>
		<h1><span style="font-family:georgia;weight:bold"><?php echo 'Photo&middot;Ikons';?></span>FINE PHOTOGRAPHY</h1>
		<?php showMenu($main_menu); echo '-';?>
	</div>
	<!-- Start: Sidinnehåll -->
	<div id="pagecontent" class="clearfix" >
		<!-- Start: Contentrad -->
		<div class="content-row"  >
			<!-- Start: Innehållsklumn 1 -->
			<div class="span-7">
				<h2 style="color:#dd0000">Curved Corners on Images</h2>
        
 

<!-- The feature Image -->
<?php echo '<img src="http://'.ROOT.'/egypt/imogen-cunningham/1.jpg" style="width:90%;margin-left:15px;" alt="" title="" />'?>      

<!-- The feature -->
<?php //echo '<h3>'.$feature.'</h3>'?>

<div class="span-5 clearfix" style="margin:0 0 0 15px">

<ul class="LHnav" style="margin-left:0px;width:210px">

  <?php 
  define('GALLERYPATH','');
 echo '<li><a href="'.'photographer_gallery.php?gallery=tomchambers&amp;page=1" >Separating the Business Logic</a></li>';
 echo '<li><a href="'.GALLERYPATH.'photographer_gallery.php?gallery=simon-procter&amp;page=1" >A Simple PHP Template System</a></li>';
   
  

  echo '</ul>';
  
  ?>
  
 <h4 style="margin-bottom:5px">SMARTY</h4>

 <ul id="LHnav" style="margin-left:0px;width:210px">
  <?php echo '<li><a href="'.GALLERYPATH.'photographer_gallery.php?gallery=tomchambers&amp;page=1" >Smarty Template Engine</a></li>';

  ?>
</ul>  
  
  
  
</div>
			
</div>
			<!-- Start: Side 2 -->
			
	
	
<div class="fleft clearfix" style="border:1px solid #bebebe;width:65%" >
<img src="<?php echo $original_image ?>"  style="width:45%;float:left" />
<img src="http://localhost/CodeIgniter/uploads/curv.jpg" style="width:45%;float:right" />


<div style="width:65%;clear:both">
<?php 
foreach ($colors as $key=>$value){
echo '<div style="width:10px;height:30px;float:left;background:'.$value.';" ></div>';
}

?>
</div>

</div>


<?php echo markdown($content); 
echo 'template round-corners';
?>



</div>
	
	</div>
	<!-- Start: Sidfot -->
	<?php include('footer.php');?>
