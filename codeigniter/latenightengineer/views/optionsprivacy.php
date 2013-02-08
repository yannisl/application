<?php 

 define('BASEPATH1','../egypt/');
 define('ROOT',$_SERVER['SERVER_NAME']);
 
 
 include_once(BASEPATH1.'define.php');
 include_once(BASEPATH1.'table.php'); 
 include_once(BASEPATH1.'menu.php');
 
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
	<!-- Start: Sidinnehåll -->
	<div id="pagecontent" class="clearfix">
		<!-- Start: Contentrad -->
		
			
			
	<!--Single Column-->		
	
     



<div style="width:98%" class="clearfix">

<div class="wrap">
<h2>Privacy Options</h2>
<form method="post" action="options.php" style="height:600px">

<div style="width:80%">
<input name="_wpnonce" value="eaa7c07720" type="hidden" />
<input name="_wp_http_referer" value="/wp-admin/options-privacy.php" type="hidden" />
</div>

<table class="optiontable">


<tbody><tr valign="top">
<th scope="row">Blog visibility: </th>
<td>
<p><input id="blog-public" name="blog_public" value="1" checked="checked" type="radio">
<label for="blog-public">I would like my blog to be visible to everyone, including search engines (like Google, Sphere, Technorati) and archivers</label></p>
<p><input id="blog-norobots" name="blog_public" value="0" type="radio" />
<label for="blog-norobots">I would like to block search engines, but allow normal visitors</label></p>
</td>
</tr>
</tbody></table>

<p class="submit"><input name="Submit" value="Update Options »" type="submit" />
<input name="action" value="update" type="hidden">

<input name="page_options" value="blog_public" type="hidden" />
</p>
</form>

</div>




</div>


			
	</div>
	<!-- Start: Sidfot -->
	<?php include('footer.php');?>




































