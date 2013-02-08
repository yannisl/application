
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
<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1" /><link rel="Shortcut Icon" href="http://www.bjornblomquist.com/favicon.ico" type="image/x-icon" /> 

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
 
 
 
 
<!-- Styles --> 
 
<style type="text/css">	
table {width:50%;margin-right:10px;float:right;margin-bottom:10px} 
table td{border:1px solid #bebebe;} 
table th{border:1px solid #bebebe;}  
.set-title{text-align:center;}  
pre.dotted{border:1px dotted #bebebe;font-size:11px;line-height:1.0}
.nutshell{background:#fafafa url(http://localhost/CodeIgniter/images/nutshell.png) 10px 10px no-repeat;width:600px;border:1px solid #000000;min-height:80px;padding-left:50px}
.warning{background:#fafafa url(http://localhost/CodeIgniter/images/warning.png) 10px 10px no-repeat;width:600px;border:1px solid #000000;min-height:80px;padding-left:50px}

.sandbox{background:#fafafa url(http://localhost/CodeIgniter/images/sandbox.png) 10px 10px no-repeat;width:580px;border:1px solid #000000;min-height:80px;padding-left:70px;}

.pinnote {
background:#F7F7F7 url(http://www.latenightengineer.com/images/bg-pin.gif) no-repeat scroll left top;
border:1px solid #DDDDDD;
padding:10px 10px 10px 50px;
}

.stickynote {
background:#F7F7F7 url(http://www.latenightengineer.com/images/bg-sticky.gif) no-repeat scroll left top;
border:1px solid #DDDDDD;
padding:10px 10px 10px 50px;
}

.download{
background:#F7F7F7 url(http://localhost/CodeIgniter/images/download.png) no-repeat scroll left top;
padding:10px 10px 10px 50px;border:1px solid #DDDDDD;
}

.clipnote {
background:#F7F7F7 url(http://www.latenightengineer.com/images/bg-clip.gif) no-repeat scroll left top;
border:1px solid #DDDDDD;
padding:10px 10px 10px 50px;
}



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

<h1><span style="font-family:georgia;weight:bold;color:#000;font-size:36px;padding-left:0.6em"><?php echo 'Photo&middot;Ikons';?></span>FINE PHOTOGRAPHY</h1>
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

<ul class="LHnav" style="margin-left:0px;width:210px">

  <?php 
 
   
  
//create menu automatically needs to come from model/controller
  
  foreach ($list as $key=>$value){
    $value=str_replace( '.dat', '', $value );
    $value=str_replace( '/blog/', 'post/', $value );
   echo '<li><a href="'.$value.'">'.$value.'</a></li>';
  
 }
  echo '</ul>';
  
?>  
  
 <ul id="LHnav" style="margin-left:0px;width:210px">
  
</ul>  
  
  
  
</div>
			
</div>
			<!-- Start: Side 2 -->
			<div class="span-17">
			<?php //echo 'title is'.$title;?>
			<?php echo '<a href="http://localhost/CodeIgniter/admin/post/edit/'.$title.'">[edit]</a>';?>
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
	
	