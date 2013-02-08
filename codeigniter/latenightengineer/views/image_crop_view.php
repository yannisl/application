<?php 
//TEMPLATE
//article_view
//deals with articles
//
 define('BASEPATH1','../egypt/');
 define('ROOT',$_SERVER['SERVER_NAME']);
 
 
 include_once(BASEPATH1.'define.php');
 include_once(BASEPATH1.'table.php'); 
 include_once(BASEPATH1.'menu.php');
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
<link rel="stylesheet" href="http://localhost/egypt/two_files/general.css" type="text/css" /> 
<link rel="stylesheet" href="http://localhost/egypt/screen.css" type="text/css" /> 
<link rel="stylesheet" href="http://localhost/egypt/typography.css" type="text/css" /> 
<meta name="author" content="Y Lazarides" /> 
<meta name="copyright" content="Dr Y Lazarides" /> 
<meta name="robots" content="all" /> 
<meta name="imagetoolbar" content="no" /> 
<meta name="keywords" content="keyword1,keyword2,keyword3" /> 
<meta name="description" content="An automatic website builder" /> 
 
<script src="http://localhost/CodeIgniter/js/jquery.pack.js"></script>
<script src="http://localhost/CodeIgniter/js/jquery.Jcrop.pack.js"></script>
 
<link rel="stylesheet" href="http://localhost/CodeIgniter/css/jquery.Jcrop.css" type="text/css" />
<link rel="stylesheet" href="demo_files/demos.css" type="text/css" />

		<script language="Javascript">

			// Remember to invoke within jQuery(window).load(...)
			// If you don't, Jcrop may not initialize properly
			jQuery(document).ready(function(){

				jQuery('#cropbox').Jcrop({
					onChange: showCoords,
					onSelect: showCoords
				});

			});

			// Our simple event handler, called from onChange and onSelect
			// event handlers, as per the Jcrop invocation above
			function showCoords(c)
			{
				jQuery('#x').val(c.x);
				jQuery('#y').val(c.y);
				jQuery('#x2').val(c.x2);
				jQuery('#y2').val(c.y2);
				jQuery('#w').val(c.w);
				jQuery('#h').val(c.h);
			};

		</script>

 
 
 
<!-- Styles --> 
 
<style type="text/css">	
table {width:50%;margin-right:10px;float:right;margin-bottom:10px} 
table td{border:1px solid #bebebe;} 
table th{border:1px solid #bebebe;}  
.set-title{text-align:center;}  
pre.dotted{border:1px dotted #bebebe;font-size:11px;line-height:1.0}
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
		<?php showMenu($main_menu) ?>
	</div>
	<!-- Start: Sidinneh�ll -->
	<div id="pagecontent" class="clearfix" >
		<!-- Start: Contentrad -->
		<div class="content-row"  >
			<!-- Start: Inneh�llsklumn 1 -->
			<div class="span-7">
				<h2 style="color:#dd0000">Templating with PHP</h2>
        
 

<!-- The feature Image -->
<?php echo '<img src="http://'.ROOT.'/egypt/lev-daichik/5570030-md.jpg" style="width:90%;margin-left:15px;" alt="" title="" />'?>      

<!-- The feature -->
<?php //echo '<h3>'.$feature.'</h3>'?>

<div class="span-5 clearfix" style="margin:0 0 0 15px">


  
  
  
</div>
			
</div>
			<!-- Start: Side 2 -->
			<div class="span-17">
      

 <h3>IMAGE CROP VIEW</h3>

 <?//php if (!isset($upload_data)) $upload=$data;?>

<p><?php echo anchor('upload', 'Upload Another File!'); ?></p>
<div>
<?php echo '<img src="http://localhost/CodeIgniter/uploads/'.$raw_name.$file_ext.'"  id="cropbox" />' ?>

<h4><?php echo 'uploaded file-name: '.$raw_name  ?></h4>
<ul style="font-size:11px;">

<?php //foreach($upload_data as $item => $value):?>
<li style="display:inline"><?php //echo $item;?>:<?php //echo $value.' |';?></li>
<?php //endforeach; ?>
</ul>

</div>

<div>
<?php echo '<img src="http://localhost/CodeIgniter/uploads/'.$raw_name.'_thumb'.$file_ext.'" />'; ?>
</div>

<form action="crop" method="post" onsubmit="return checkCoords();">
			<input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
			<input type="hidden" id="w" name="w" />
			<input type="hidden" id="h" name="h" />
			<input type="hidden" id="filename" name="raw_name" value="<?Php echo $raw_name ?>" />
			<input type="hidden" id="file" name="file_ext" value="<?Php echo '.jpg' ?>" />
			
			<input type="hidden" id="image"  name="image" value=" <?php echo $raw_name.$file_ext ?>" />
			<input type="submit" value="crop Image" />
</form>


<div>
<?php echo '<img src="http://localhost/CodeIgniter/uploads/'.'crop_'.$raw_name.$file_ext.'" />' ?>
</div>











			</div>
		</div>
	</div>
	<!-- Start: Sidfot -->
	<?php include('footer.php');?>
	
	