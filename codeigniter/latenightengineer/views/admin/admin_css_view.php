
<?php 

 define('BASEPATH1','../egypt/');
 define('ROOT',$_SERVER['SERVER_NAME']);
 include_once(BASEPATH1.'define.php');
 include_once('menu.php');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head> 
<title>Stamps and Postal History:<?php //echo $title;  ?><</title> 
<meta http-equiv="Content-Type" content="text/html;charset=utf08" /><link rel="Shortcut Icon" href="http://www.bjornblomquist.com/favicon.ico" type="image/x-icon" /> 

<link rel="stylesheet" type="text/css" media="all" href="http://localhost/strings/code_files/userguide.css">

<script type="text/javascript" src="http://localhost/strings/code_files/nav.js"></script>
<script type="text/javascript" src="http://localhost/strings/code_files/prototype.js"></script>
<script type="text/javascript" src="http://localhost/strings/code_files/moo.js"></script>
<script type="text/javascript" src="http://localhost/strings/code_files/user_guide_menu.js"></script>


<link rel="stylesheet" href="http://localhost/egypt/two_files/general.css" type="text/css" /> 
<link rel="stylesheet" href="http://localhost/egypt/screen.css" type="text/css" /> 
<link rel="stylesheet" href="http://localhost/CodeIgniter/css/typography.css" type="text/css" /> 
<meta name="author" content="Y Lazarides" /> 
<meta name="copyright" content="Dr Y Lazarides" /> 
<meta name="robots" content="all" /> 
<meta name="imagetoolbar" content="no" /> 
<meta name="keywords" content="<?php //echo $keywords;    ?>" /> 
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
  margin: 8px;
  padding-left: 5px;
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

<div id="nav2" class="clearfix" style="margin-right:0;padding-right:70px">
<a name="top"></a><a href="javascript:void(0);" onclick="myHeight.toggle();">
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
		<h3>Manage CSS Files and Components</h3>	
		  <!-- First Box-->
			
			<div style="background:url(http://localhost/egypt/service_shadow.png) repeat-y;background-repeat:no-repeat;width:23.5%;float:left">
			 <h4 style="text-align:center"><a style="text-align:center;color:#bebebe;margin-left:10px"><span style="margin:0 auto">Files</span></a></h4>
		   <img src="http://localhost/egypt/box.png" style="display:block;margin:0 auto"  />
		   <ul style="list-style-type:none;">
		    <li><strong>CSS</strong><br/> Manage CSS files. Add, delete, edit, create.</li>
		    <li>Javascript</li>
		    <li>Images</li>
		    <li>Robots.txt</li>
		    <li>Sitemap</li>
		   </ul>
		  </div>
		       			
			<!-- Second Box-->
			
			<div style="background:url(http://localhost/egypt/service_shadow.png) repeat-y;background-repeat:no-repeat;width:23.5%;float:left">
			 <h4 style="text-align:center"><a style="text-align:center;color:#bebebe;margin-left:10px"><span style="margin:0 auto">CSS Components</span></a></h4>
		   <img src="http://localhost/egypt/box.png" style="display:block;margin:0 auto"  />
		   <ul style="list-style-type:none;">
		    <li><strong>CSS</strong><br/> Manage CSS components.</li>
		    <li>Javascript</li>
		    <li>Images</li>
		    <li>Robots.txt</li>
		    <li>Sitemap</li>
		   </ul>
		  </div>
		  
		 <!-- Third Box-->
			
			<div style="background:url(http://localhost/egypt/service_shadow.png) repeat-y;background-repeat:no-repeat;width:45%;float:left;padding-left:20px">
			 <h2 style="margin-top:0px">Cascade Style Sheets</h2>
			 <p>Here, you will be able to add or
			 into sections and we use <a href="http://localhost/CodeIgniter/Blogs/post/blog/Convention_over_Configuration">Convention over Configuration</a>.</p>
			 <p>Some files are common to all templates and they are rquired, if you want the CMS to help you edit them quickly. These are:</p>
			 
			 <?php echo $content ?>;
			 
			 
			 
			 
			 
			 
		  </div>
		  
		   
		 
	</div>		   
     
     
	</div>		
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
  

		<?php include('footer.php');?>
</div>
	
	
	
	