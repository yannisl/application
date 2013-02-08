
<?php 
//the parser fetches all the data and replaces wiki links
//
define('THREE','../../../'); //for images
define('FOUR','../../../..');
 include_once('define.php');
 include_once('table.php'); 
 include_once('menu.php');
 include_once('markdown.php');
 //include_once('utilities.php');
 //include_once('template.class.php');
 //include_once('page-builder.php');
 //include_once('photos-03.dat.php');
 //include_once('view.class.php');
 //include_once('view.php');
 //include_once('settings.php');
 //$templ=new Template;
 
//timer_start();
		//this is a router get what you need from user URL
      
      
       //echo_array($_GET);
 /*      $s=$_SERVER['REQUEST_URI'];
       $article=$_GET['article'];
       $article='1';
       $post=$_GET['post'];        //values from DB
       $set=$_GET['set'];
       $gallery=$_GET['gallery'];
       
       
       $title=$_GET['title'];
       $image=$_GET['image'];
       $page=$_GET['page'];
       $pattern="/(\d*)\-(\d*)/";
      
       $z=preg_match_all($pattern,$set,$values);
       $set_start=$values[1][0];  //values to obtain
       
       
 */      
       //$set_end=$values[2][0];    //values to obtain
       //$set_start=1;$set_end=2;
       //$gallery=$gallery_name;
       //$title="Fine Gallery";
       $page=$page_num;
       
       //$page=$data['page'];
       //echo_array($values);
 
 //load values from DB
 //This is the Model
 
 //output this is the view 
  
       
  
  
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
<?php
define('GALLERYPATH','../egypt/');
define('PHOTOPATH','http://localhost/egypt/');
if (isset($gallery) && $gallery !=''){
$path=GALLERYPATH.$gallery.'/';}else{
$path='../egypt/martin-schoeller/';
$path='../egypt/simon-procter/';
$path='../egypt/zemotion_files';
$path='../egypt/mariano-vivanco';}


$dir = new RecursiveIteratorIterator(
           new RecursiveDirectoryIterator($path), true);
foreach ( $dir as $file ) {
    if ((preg_match("/\.jpe?g$/isx",$file))||(preg_match("/\.png$/isx",$file))){
    //echo str_repeat(" – - ", $dir->getDepth()) . " $file\n <br />";}

    $file=str_replace("\\",'/',$file);
    $file=preg_replace('%\s%','',$file);
    $image[]=$file;
    //echo $file.'<br />';
    }
    //echo($image[0]);
}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head> 
<title>lateNightEngineer:USA</title> 
<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1" /><link rel="Shortcut Icon" href="http://www.bjornblomquist.com/favicon.ico" type="image/x-icon" /> 
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
</style>	
</head> 





<body style="background:#000000">
<!-- Start: Sidcontainer -->
<div class="container clearfix" style="border-top:3px solid #dd0000;width:960px">

	<!-- Start: Sidhuvud -->
<div id="pagehead" style="width:940px;margin-top:0 ">
<div id="internship" style="margin-top:0;padding-top:0">
<img src="http://localhost/egypt/two_files/internship.png" alt="" title="">
</div>
		<h1><span><?php echo 'PHILATELIC&middot;IKONS';?></span>philately</h1>
		<?php showMenu($main_menu) ?>
	</div>
	<!-- Start: Sidinnehåll -->
	<div id="pagecontent" class="clearfix" style="width:940px">
		<!-- Start: Contentrad -->
		<div class="content-row"  >
			<!-- Start: Innehållsklumn 1 -->
			<div class="span-5">
				<h2 style="color:#dd0000">
         <?php echo $title ?>

       </h2>
       
       
      
  <?php 
  if ($page<count($image)){
  
  echo '<a href="../../'.$image[$page].'">;
  <img src="../../../'.$image[$page-1].'" style="width:90%;margin-left:15px" /></a>';
   echo '<img src="../../../'.$image[$page].'" style="width:90%;margin-left:15px" /></a>';
 echo '<a href="'.$image[$page].'">';
 }
 
  if ($page+1<count($image)){
   echo '<img src="../../../'.$image[$page+1].'" style="width:90%;margin-left:15px;" />';
  }
  else
  {
  echo '<img src="../../../'.$image[$page-1].'" style="width:90%;margin-left:15px;" />';
  }
 ?>      



<?php $root = 'http://'.$_SERVER['SERVER_NAME'].'/egypt';?>

<div  class="clearfix" ><span style="padding-top:0px">
<img src="<?php echo $root?>/galleri.gif" style="display:block;float:left;padding:0;margin:0;margin-right:3px" />
</span> 
<?php 
 //findAllProperties($file='usa.php');
  echo '<span style="margin-top:1px;display:block;float:left"> '.ucfirst($gallery).'</span>' ?></div>


<div class="span-10 clearfix" style="margin:0 0 0 15px">
<ul id="LHnav" style="margin-left:0px;width:210px">
   
  <?php 
  //function to make life easy with menu
  $m=array();
  $this->load->helper('inflector');
  function li($href,$msg){
   $s=sprintf('<li><a href="../%s/1" >%s</a></li>',$href,humanize($msg));
    $m[]=$s;
   echo $s;
   }
 
 
  li('UK_Volume_I','UK Stamps Philips Collection Volume I (01)');
  li('UK_Volume_II','UK Stamps Philips Collection Volume II (02)');
  li('UK_Volume_III','UK Stamps Philips Collection Volume III (03)');
   li('UK_Volume_IV','UK Stamps Philips Collection Volume IV (04)'); 
   li('UK_Volume_V','UK Stamps Philips Collection Volume V (05)');
   li('UK_Volume_VI','UK Stamps Philips Collection Volume VI (06)'); 
   li('UK_Volume_VII','UK Stamps Philips Collection Volume VII (07)'); 
   li('UK_Volume_VIII','UK Stamps Philips Collection Volume VIII (08)'); 
   li('UK_Volume_IX','UK Stamps Philips Collection Volume IX (09)'); 
   li('UK_Volume_X','UK Stamps Philips Collection Volume X (10)'); 
   li('UK_Volume_XI','UK Stamps Philips Collection Volume XI (11)');
   li('UK_Volume_XII','UK Stamps Philips Collection Volume XII (12)');
   li('UK_Volume_XIII','UK Stamps Philips Collection Volume XIII (13)');
   li('UK_Volume_XIV','UK Stamps Philips Collection Volume XIV (14)');
   li('UK_Volume_XV','UK Stamps Philips Collection Volume XV (15)');
   li('UK_Volume_XVI','UK Stamps Philips Collection Volume XVI (16)');
   li('UK_Volume_XVII','UK Stamps Philips Collection Volume XVII (17)');
   li('UK_Volume_XVIII','UK Stamps Philips Collection Volume XVIII (18)');
   li('UK_Volume_XIX','UK Stamps Philips Collection Volume XIX (19)');
   li('UK_Volume_XX','UK Stamps Philips Collection Volume XX (20)');
   li('UK_Volume_XXI','UK Stamps Philips Collection Volume XXI (21)'); 
   li('UK_Volume_XXII','UK Stamps Philips Collection Volume XXII (22)'); 
   li('UK_Volume_XXIII','UK Stamps Philips Collection Volume XXIII (23)');   
   li('UK_Volume_XXIV','UK Stamps Philips Collection Volume XXIV (24)'); 
   li('UK_Volume_XXV','UK Stamps Philips Collection Volume XXV (25)');
    li('UK_Volume_XXVI','UK Stamps Philips Collection Volume XXVI (26)');
     li('UK_Volume_XXVII','UK Stamps Philips Collection Volume XXVII (27)'); 
    li('UK_Volume_XXVIII','UK Stamps Philips Collection Volume XXVIII (28)'); 
   li('UK_Volume_XXIX','UK Stamps Philips Collection Volume XXIX (29)'); 
   li('UK_Volume_XXX','UK Stamps Philips Collection Volume XXX (30)');
       
   li('UK_Volume_XXXI','UK Stamps Philips Collection Volume XXXI (31)');   
   li('UK_Volume_XXXII','UK Stamps Philips Collection Volume XXXII (32)');      
   li('UK_Volume_XXXIII','UK Stamps Philips Collection Volume XXXIII (33)');   
  li('UK_Volume_XXXIV','UK Stamps Philips Collection Volume XXXIV (34)');
  li('UK_Volume_XXXV','UK Stamps Philips Collection Volume XXXV (35)');
   li('UK_Volume_XXXVI','UK Stamps Philips Collection Volume XXXVI (36)');
     li('UK_Volume_XXXVII','UK Stamps Philips Collection Volume XXXVII (37)');
     li('UK_Volume_XXXVIII','UK Stamps Philips Collection Volume XXXVIII (38)');
      li('UK_Volume_XXXIX','UK Stamps Phillips Collection Volume XXXIX (39)');
      li('UK_Volume_XL','UK Stamps Philips Collection Volume XL (40)');
     li('UK_Volume_XLI','UK Stamps Philips Collection Volume XLI (41)');
      li('UK_Volume_XLII','UK Stamps Philips Collection Volume XLII (42)');
         li('UK_Volume_XLIII','UK Stamps Philips Collection Volume XLIII (43)');
           li('UK_Volume_XLIV','UK Stamps Phillips Collection Volume XLIV (44)');
   li('UK_Volume_XLV','UK Stamps Phillips Collection Volume XLV (45)');
  
 li('Westley','Cancellations of London (Westley)');
                            

  ?> 
 
 
 
 
 
  </ul>
 
</div>
			
</div>
			<!-- Start: Side 2 -->
			<div class="span-18">
   <div style="background:#000;color:#fff"> 
  <!-- NEXT -->   
    <div class="clearfix" style="padding-bottom:5px;padding-left:7px;padding-right:7px">
    
    <?php if ($page<=1){$previous=1;}else{$previous=$page-1;
    
    echo'<a href="';
    echo $previous.'">'; 
    echo '<img src="http://localhost/egypt/previous.gif" style="float:left;margin-top:10px" /></a>';}?>
    
    
    <?php 
    if ($page+1>count($image)){$next=count($image);}else{$next=$page+1;
    echo '<a href="';
    echo ($next).'">';
    echo '<img src="'.FOUR.'/egypt/next.gif" style="float:right;clear:right;margin-top:10px" /></a>';}?>
    
   
    
    </div>   
   
   
   
   
    			
      <div class="clearfix" style="padding-bottom:3px;padding-left:7px;padding-right:7px"><img src="http://localhost/egypt/photography.gif" style="float:left;margin-top:10px" /></a><span style="color:#fff;font-family:verdana;font-size;13px;font-transform:uppercase;float:left;margin-top:3px"> | <?php echo ucfirst($gallery) ?></span>
      <?php
      //main image       
      ?>
     <div style="float:right"><img src="http://localhost/egypt/PAGE.gif" /> <span style="color:#fff;font-size:13px;font-weight:400;font-family:verdana"><?php echo $page;?> OF <?php 
    
     echo count($image);?><span></div>
      </div>
   <?php
   //MAin image display need to change for portrait galleries
  
   
    echo "<img src=";
    echo  '"../../../'.$image[$page-1].'" style="width:100%;border:0;display:block;margin:0 auto"  /><p></p>';
    
    //echo '<img src="../'.$image[2].' " />';
    ?>
    <!-- NEXT -->   
    <div class="clearfix" style="padding-bottom:13px;padding-left:7px;padding-right:7px">
    
    <?php if ($page<=1){$previous=1;}else{$previous=$page-1;
    echo'<a href="';
    echo $previous.'">'; 
    echo '<img src="'.FOUR.'/egypt/previous.gif" style="float:left;margin-top:10px" /></a>';}?>
    
    
    <?php 
    if ($page+1>count($image)){$next=count($image);}else{$next=$page+1;
    echo '<a href="';
    echo ($next).'">';
    echo '<img src="'.FOUR.'/egypt/next.gif" style="float:right;clear:right;margin-top:10px" /></a>';}?>
    
    <img src="http://localhost/egypt/photography_gallery.gif" style="float:right;;margin-top:4px;clear:both" />
    
    </div>  
    
    <!-- END NEXT--> 
    <div style="clear:both"></div>  
 
    </div>  
		  
		<div>  
<?php if ($post=@file_get_contents($path.'data.php')) {
    
  echo markdown($post);

}?>
</div>



       
       
		  </div>

	  
	

<div class="span-5" style="float:left">
<ul id="LHnav" class="span-5" style="margin-left:0px;">
<?php
echo '<h3 style="margin-bottom:5px">Milen Lesemann</h3>';
echo '<li><a href="'.GALLERYPATH.'photographer_gallery.php?gallery=milen-lesemann&page=1" >Milen Lesemann Fine Nudes Color</a></li>';
echo '<li><a href="'.GALLERYPATH.'photographer_gallery.php?gallery=milen-lesemann-01&page=1" >Milen Lesemann fashion gallery</a></li>';
echo '<li><a href="'.GALLERYPATH.'photographer_gallery.php?gallery=milen-lesemann-02&page=1" >Milen Lesemann fashion gallery</a></li>';
echo '<li><a href="'.GALLERYPATH.'photographer_gallery.php?gallery=berenice-abbott&page=1" >Berenice Abbott gallery 1</a></li>';  
echo '<li><a href="'.GALLERYPATH.'photographer_gallery.php?gallery=berenice-abbott-01&page=1" >Berenice Abbott gallery 2</a></li>';
  echo '<li><a href="'.GALLERYPATH.'photographer_gallery.php?gallery=dorothea-lange&page=1" >Dorothea de Lange</a></li>';
 echo '<li><a href="'.GALLERYPATH.'photographer_gallery.php?gallery=louis-hine&page=1" >Louis Hine</a></li>';


?>
</ul>
<image src="../../../../egypt/milen-lesemann/6395980-lg.jpg" style="width:100%"/>
</div>	

	<div class="span-5" style="float:left">
<ul id="LHnav" class="span-5" style="margin-left:0px;">
<?php
echo '<h3 style="margin-bottom:5px">Milen Lesemann</h3>';
echo '<li><a href="'.GALLERYPATH.'photographer_gallery.php?gallery=milen-lesemann&page=1" >Milen Lesemann Fine Nudes Color</a></li>';
echo '<li><a href="'.GALLERYPATH.'photographer_gallery.php?gallery=milen-lesemann-01&page=1" >Milen Lesemann fashion gallery</a></li>';
echo '<li><a href="'.GALLERYPATH.'photographer_gallery.php?gallery=milen-lesemann-02&page=1" >Milen Lesemann fashion gallery</a></li>';
echo '<li><a href="'.GALLERYPATH.'photographer_gallery.php?gallery=berenice-abbott&page=1" >Berenice Abbott gallery 1</a></li>';  
echo '<li><a href="'.GALLERYPATH.'photographer_gallery.php?gallery=berenice-abbott-01&page=1" >Berenice Abbott gallery 2</a></li>';
  echo '<li><a href="'.GALLERYPATH.'photographer_gallery.php?gallery=dorothea-lange&page=1" >Dorothea de Lange</a></li>';
  
 echo '<li><a href="'.'../egypt/template-main.php">Templating with PHP an easy PHP templating class</a></li>';


?>
</ul>
<image src="../../../../egypt/milen-lesemann/6395980-lg.jpg" style="width:100%"/>
</div>	

<div class="span-5" style="float:left">
<ul id="LHnav" class="span-5" style="margin-left:0px;">
<?php
echo '<h3 style="margin-bottom:5px">Classic Masters</h3>';
echo '<li><a href="'.GALLERYPATH.'photographer_gallery.php?gallery=milen-lesemann&page=1" >Milen Lesemann Fine Nudes Color</a></li>';
echo '<li><a href="'.GALLERYPATH.'photographer_gallery.php?gallery=milen-lesemann-01&page=1" >Milen Lesemann fashion gallery</a></li>';
echo '<li><a href="'.GALLERYPATH.'photographer_gallery.php?gallery=milen-lesemann-02&page=1" >Milen Lesemann fashion gallery</a></li>';
echo '<li><a href="'.GALLERYPATH.'photographer_gallery.php?gallery=berenice-abbott&page=1" >Berenice Abbott gallery 1</a></li>';  
echo '<li><a href="'.GALLERYPATH.'photographer_gallery.php?gallery=berenice-abbott-01&page=1" >Berenice Abbott gallery 2</a></li>';
  echo '<li><a href="'.GALLERYPATH.'photographer_gallery.php?gallery=dorothea-lange&page=1" >Dorothea de Lange</a></li>';
 echo '<li><a href="'.GALLERYPATH.'photographer_gallery.php?gallery=louis-hine&page=1" >Louis Hine</a></li>';


?>
</ul>
<image src="<?php echo '../../../'.$image[rand(0,5)]; ?>" style="width:100%"/>
</div>	

		  
		   <p style="text-align:left">
		    
		   </p>
<?php //$view->feature() 
echo 'PHOTOGRAPHER_template';?>
<?php



//echo_array($_SERVER);
   
?>

			<p style="margin-top:20px"></p>
			
		</div>
	</div>
	<!-- Start: Sidfot -->
	<?php include('footer.php');?>
	
	