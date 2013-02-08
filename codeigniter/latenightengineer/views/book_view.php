
<?php 
//TEMPLATE
//article_view
//deals with articles
//
 define('BASEPATH1','../egypt/');
 define('ROOT',$_SERVER['SERVER_NAME']);
 
 
 //include_once(BASEPATH1.'define.php');
 //include_once(BASEPATH1.'table.php'); 
 include_once('menu.php');
  ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head> 
<title>lateNightEngineer:USA</title> 
<meta http-equiv="Content-Type" content="text/html;charset=utf-08" /><link rel="Shortcut Icon" href="http://www.bjornblomquist.com/favicon.ico" type="image/x-icon" /> 

<link rel="stylesheet" type="text/css" media="all" href="http://localhost/strings/code_files/userguide.css" />

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
 

</head> 


<body style="background:#000;margin-top:0">

<!-- Start: Sidcontainer -->

<div class="container clearfix" style="border-top:3px solid #000000;width:1000px">

<!-- START NAVIGATION -->
<div style="overflow: hidden; height: 0px;" id="nav">
  <div id="nav_inner">
    <script type="text/javascript">create_menu('null');</script>
    <table cellspacing="0" style="width: 98%;" cellpadding="0">
    <tbody>
    <tr>
    <td class="td" valign="top"></td>
    </tr>
    </tbody>
    </table>
  </div>
</div>


<div id="nav2" class="clearfix" style="margin-right:0;padding-right:70px">
<a name="top"></a><a href="javascript:void(0);" onclick="myHeight.toggle();">
<img src="http://localhost/strings/code_files/nav_toggle.jpg" style="display:block;float:right" title="Toggle Table of Contents" alt="Toggle Table of Contents"  height="44" width="153" />
</a>

</div>


<div id="masthead" style="background:#fff;width:100%;padding-left:0;margin-left:0">

<h1><span style="font-family:georgia;weight:bold;color:#000;font-size:36px;padding-left:0.6em">
<?php echo ' Photo&middot;Ikons ';?>
</span> <span style="color:#999999">FINE BOOKS</span></h1>
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
<?php echo markdown($author) ?>

			
</div>

			<!-- Start: Side 2 -->
			<div class="span-17">
          
          <?php echo '<p><a href="http://localhost/CodeIgniter/admin/post/edit/'.$title.'">[edit]</a></p>';
            echo '<p>'.$next.'</p>';
          ?>
          <?php //echo markdown($booktitle) ?>
			
          <?php echo ($content); 
             
          //$this->benchmark->mark('code_end');

          //echo //$this->benchmark->elapsed_time('code_start', 'code_end');?>
          <?php //echo '  '.$this->benchmark->elapsed_time();?>
          <?php //echo '  '.$this->benchmark->memory_usage();?>
			</div>
		</div>
	</div>
	<!-- Start: Sidfot -->
	<?php include('footer.php');?>
	
	