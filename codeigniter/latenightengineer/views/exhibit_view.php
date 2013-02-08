
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
<title>Stamps and Postal History:<?php echo $title;  ?><</title> 
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
<meta name="keywords" content="<?php echo $keywords;    ?>" /> 
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
.country a:link,.country a:hover,.country a:visited{color:#fff}
.arial11 {
  color:#303000;
  font-family:Arial,Helvetica,Verdana;
  font-size:11px;
  font-style:normal;
  font-weight:bold;
  line-height:13px;}
  
table td{font-size:11px;} 

tr.shaded, .shaded{background:#fafafa} 
hr {background:#fff}
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

<div id="nav2" class="clearfix" style="margin-right:0;padding-right:70px;width:38%:float:left">
<a name="top"></a><a href="javascript:void(0);" onclick="myHeight.toggle();">
<img src="http://localhost/strings/code_files/nav_toggle.jpg" style="display:block;float:right" title="Toggle Table of Contents" alt="Toggle Table of Contents" border="0" height="44" width="153"></a>
</a>
	<?php //showMenu($main_menu) ?>
</div>

<div id="nav3" class="clearfix" style="margin-right:0;padding-right:70px;width:5%;float:right">
<a name="top"></a><a href="javascript:void(0);" onclick="myHeight.toggle();">
<img src="http://localhost/strings/code_files/nav_toggle.jpg" style="display:block;float:right" title="Toggle Table of Contents" alt="Toggle Table of Contents" border="0" height="44" width="153"></a>
</a>
	<?php //showMenu($main_menu) ?>
</div>

<div id="masthead" style="background:#fff;width:100%;padding-left:0;margin-left:0">

<h1><span style="font-family:georgia;weight:bold;color:#000;font-size:36px;padding-left:0.6em">
<?php echo ucfirst($location).'&middot; ';?></span><span style="color:#000040">STAMPS AND POSTAL HISTORY</span></h1>
</div>
<!-- END NAVIGATION -->



	<!-- Start: Sidhuvud -->
<div id="pagehead" style="width:980px;margin-top:0 ">
    <div id="internship" style="margin-top:0;padding-top:0">
      <a href="#"><img src="http://localhost/egypt/two_files/internship.png" alt="logo" title="promo block image" /></a>
    </div>
				<?php showMenu($main_menu) ?>
	</div>
	<!-- Start: Sidinnehåll -->
	<div id="pagecontent" class="clearfix" style="border:1px solid black">
		<!-- Start: Contentrad -->
		
		<div class="span-18" style="float:none;margin:0 auto;border:1px solid #000">
			<?php //echo 'title is'.$title;?>
			<?php echo '<a href="http://localhost/CodeIgniter/admin/post/edit/'.$location.'/'.$title.'">[edit]</a>';?>
			<?php echo '<a href="http://localhost/CodeIgniter/admin/post/new/'.$location.'/'.$title.'">[new]</a>';
			?>
			
<div style="background:#000;color:#fff;width:30%;float:right;margin-bottom:3px"> 
<!-- NEXT -->   
<div class="clearfix" style="padding-bottom:5px;padding-left:7px;padding-right:7px">
    
<a href="<?php echo $prev?>"><img src="http://localhost/egypt/previous.gif" style="float:left;margin-top:10px" /></a>    
    
<a href="<?php echo $next?>"><img src="../../../../egypt/next.gif" style="float:right;clear:right;margin-top:10px" /></a>    
 
</div> 
</div>
			
<div style="clear:both"></div>	
	   
       <?php echo $content; ?>
      <div style="clear:both"></div>
      
       <h2><?php echo $exhibit_title?></h2>	
	     <h2><?php echo $exhibit_owner?></h2>
<div style="clear:both"></div>
<div style="background:#000;color:#fff;width:30%;float:right;margin-bottom:3px"> 
<!-- NEXT -->   
<div class="clearfix" style="padding-bottom:5px;padding-left:7px;padding-right:7px">
    
<a href="<?php echo $prev?>"><img src="http://localhost/egypt/previous.gif" style="float:left;margin-top:10px" title="<?php echo $prev ?>" /></a>    
    
<a href="<?php echo $next?>" title="<?php echo $next ?>"><img src="../../../../egypt/next.gif" style="float:right;clear:right;margin-top:10px"  /></a>    
 
</div> 
</div>
<div style="clear:both"></div>
<?php echo '<p><a href="http://localhost/CodeIgniter/admin/post/edit/'.$location.'/'.$title.'">edit</a></p>'; 
              $this->benchmark->mark('code_end');

echo $this->benchmark->elapsed_time('code_start', 'code_end');echo '  '.$this->benchmark->elapsed_time();?>
<?php echo '  '.$this->benchmark->memory_usage();?>
			</div>
			
			
		</div>
		<!-- Start: Sidfot -->
	<?php include('footer.php');?>
	</div>
	

	
	