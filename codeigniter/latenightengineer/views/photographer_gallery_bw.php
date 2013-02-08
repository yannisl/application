
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
		<h1><span><?php echo 'PHOTO&middot;IKONS';?></span>fine photography</h1>
		<?php showMenu($main_menu) ?>
	</div>
	<!-- Start: Sidinnehåll -->
	<div id="pagecontent" class="clearfix" style="width:940px">
		<!-- Start: Contentrad -->
		<div class="content-row"  >
			<!-- Start: Innehållsklumn 1 -->
			<div class="span-7">
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


<div class="span-5 clearfix" style="margin:0 0 0 15px">
<ul id="LHnav" style="margin-left:0px;width:210px">
   
  <?php 
  //function to make life easy with menu
  function li($href,$msg){
   $s=sprintf('<li><a href="../%s/1" >%s</a></li>',$href,$msg);
   echo $s;
  }
  
  li('tom-chambers','TOM CHAMBERS Gallery'); 
  li('simon-procter','Simon Procter Gallery');
  li('martin-schoeller','MARTIN SCHOELLER  Portraits Gallery');
  li('zemotion_files','Zemotion amazing gallery');
  li('mariano-vivanco','Mariano Vivanco photography');
  li('loretta-lux','LORETTA LUX Gallery');
  
  li('eugenio-recuenco','Eugenio Recuenco gallery');
  li('eugenio-china','Eugenio Recuenco China Posters'); 
  li('eugenio-01','Eugenio Recuenco 01'); 
  li('eugenio-02','Eugenio Recuenco 02'); 
  li('eugenio-03','Eugenio Recuenco 03'); 
  li('eugenio-04','Eugenio Recuenco 04'); 
  li('eugenio-05','Eugenio Recuenco 05'); 
  li('eugenio-06','Eugenio Recuenco 06'); 
  li('eugenio-07','Eugenio Recuenco 07'); 
  li('eugenio-08','Eugenio Recuenco 08'); 
  li('eugenio-09','Eugenio Recuenco 09'); 
  li('eugenio-010','Eugenio Recuenco 010');
  li('eugenio-011','Eugenio Recuenco 011');
  li('eugenio-012','Eugenio Recuenco 012');
  li('eugenio-013','Eugenio Recuenco 013');
  li('eugenio-014','Eugenio Recuenco 014');
  li('eugenio-015','Eugenio Recuenco 015');
  li('eugenio-016','Eugenio Recuenco 016');
  li('eugenio-017','Eugenio Recuenco 017');
  li('eugenio-018','Eugenio Recuenco 018');
  li('eugenio-019','Eugenio Recuenco 019');
  li('eugenio-020','Eugenio Recuenco 020');
  
  li('paolo-zambalti-01','Paolo Zamabalti 01');
  li('paolo-zambalti-02','Paolo Zamabalti 02');
  li('paolo-zambalti-03','Paolo Zamabalti 03');
  li('paolo-zambalti-04','Paolo Zamabalti 04');
  li('paolo-zambalti-05','Paolo Zamabalti 05');
   
  li('jose-aragon-01','Jose Aragon 01 Gallery');
  li('jose-aragon-02','Jose Aragon 02 Gallery');
  li('jose-aragon-03','Jose Aragon 03 Gallery');
  li('jose-aragon-04','Jose Aragon 04 Gallery');
  li('nazif-01','Nazif Topcuoglu 01 Gallery');
  li('nazif-02','Nazif Topcuoglu 02 Gallery');
  li('nazif-03','Nazif Topcuoglu 03 Gallery');
  li('bruno-dayan-01','Bruno Dayan 01 Gallery');
  li('bruno-dayan-02','Bruno Dayan 02 Gallery');
  li('bruno-dayan-03','Bruno Dayan 03 Gallery');
  li('bruno-dayan-04','Bruno Dayan 04 Gallery');
  li('yves-krief-01','Yves Krief 01 Gallery');
  li('lev-daichik','Lev daichik');
  li('rudolf-kartelin','Rudolf Kartelin');
  li('alexei-nikishin','Alexei Nikishin');
  li('massimo-santoni','Massimo Santoni');
  li('pavel-kaplun','Pavel Kaplun');
  li('jacqueline-roberts','Jacqueline Roberts');
  li('noel-tri-rahardjo','Noel Tri Rahardjo');  
  li('musin-yohan','Musin Yohan');  
  li('hataiiia','Hataiiia');
  li('hataiiia-01','Hataiiia 01');
  li('hataiiia-02','Hataiiia 02');
  li('hataiiia-03','Hataiiia 03');
  li('tony-dudley','Tony Dudley');
  li('t-carlos','T carlos');
  li('katerina-lomonosov','Katerina Lomonosov');
  li('i-dani','I Dani (photonet)');
  li('maurizio-moro','maurizio Moro');
  li('axel-bueckert','Axel Bueckert');
  li('valery-lemberg','Vlery Lemberg');
  li('massimiliano-uccelletti','Massimiliano Ucceletti (photonet)');
  li('normunds-laizans','Normunds Laizans (photonet)');
  li('Vladimir-Arkhipov','Vladimir Archipov (archipov.ru)');
  li('Vladimir-Arkhipov-01','Vladimir Archipov 02 (archipov.ru)');


echo '<h3 style="margin-bottom:5px">Milen Lesemann</h3>';
   li('milen-lesemann','Milen Lesemann Fine Nudes Color');
   li('milen-lesemann-01','Milen Lesemann Fashion');
   li('milen-lesemann-02','Milen Lesemann Fashion 2');
   li('berenice-abbott','berenice-abbott-01');
   li('berenice-abbott-01','berenice-abbott 02');
   li('dorothea-lange','Dorothea Lange');
   li('louis-hine','Louis Hine');
   li('helen-levitt','Helen Levitt');
   //li('pin-up-art/olivia-berardinis','Olivia Berardinis');
   li('ilan-hamra','Ilan hamra');
   li('aneta-kowalczyk','Aneta Kowalczyk Gallery');
    li('aneta-kowalczyk-01','Aneta Kowalczyk Gallery 01');
     li('aneta-kowalczyk-02','Aneta Kowalczyk Gallery 02');
      li('jack-ratcliffe','Jack Radcliffe');
     li('ritze-van-brug','Ritze-van-brug (behance)');
    li('herman-leonard','Herman Leonard');
   li('august-sander','August Sander');
    li('lee-friedlander','Lee Friedlander');
    li('elliott-erwitt','Elliott Erwitt - six decades');
   li('walker_evans','Walker Evans');
   li('che-guevara','Che Guevara');
   li('Scott-8000','Betty');
   li('horst','Horst');
    li('horst-01','Horst');
    li('arthur-leipzig','Arthur Leipzig');
    li('marc-riboud','Marc Riboud');
     li('willy-ronis','Willy Ronis');
   li('athena-01','Athena & Wei in China');
   
    li('steve-hanks','Steve Hanks');
    li('alexander-sheversky','Alexander Sheversky');
    li('imogen-cunningham','Imogen Cunningham');
     li('rondal-partidge','Rondal Partidge');
     li('suza-scalora','Suza Scalora');
     
     li('peter-turnley','Peter Turnley');
       li('marcus-ohlsson','Marcus Ohlsson');
          li('marko-photographer','Marko Photographer');
  //echo '<li><a href="'.GALLERYPATH.'photographer_gallery.php?gallery=pin-up-art/olivia-berardinis&page=1" >Olivia Berardinis</a></li>';
 //echo '<li><a href="'.GALLERYPATH.'photographer_gallery.php?gallery=pin-up-art/vargas&page=1">Vargas</a></li>';
 //echo '<li><a href="'.GALLERYPATH.'photographer_gallery.php?gallery=ilan-hamra&page=1">Ilan Hamra</a></li>';
  ?> 
 
 
 
 
 
  </ul>
</div>
			
</div>
			<!-- Start: Side 2 -->
			<div class="span-16">
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
<?php if ($post=file_get_contents($path.'data.php')) {

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
	
	