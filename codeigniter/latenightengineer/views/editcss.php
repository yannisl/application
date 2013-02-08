<?php 
 define('BASEPATH1','../egypt/');
 define('ROOT',$_SERVER['SERVER_NAME']);
 include_once(BASEPATH1.'define.php');
 include_once(BASEPATH1.'table.php'); 
 include_once('menu.php');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head> 
<title>lateNightEngineer:USA</title> 
<meta http-equiv="Content-Type" content="text/html;charset=utf-08" /><link rel="Shortcut Icon" href="http://www.bjornblomquist.com/favicon.ico" type="image/x-icon" /> 
<link rel="stylesheet" href="http://localhost/egypt/two_files/general.css" type="text/css" /> 
<link rel="stylesheet" href="http://localhost/CodeIgniter/css/screen.css" type="text/css" /> 
<link rel="stylesheet" href="http://localhost/CodeIgniter/css/typography.css" type="text/css" /> 
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


<form method="post" action="http://localhost/CodeIgniter/admin/template/save/<?php echo $title  ?>" >




<!-- Start: Sidcontainer -->
<div class="container clearfix" style="border-top:3px solid #dd0000;width:1000px">

	<!-- Start: Sidhuvud -->
<div id="pagehead" style="width:980px;margin-top:0 ">
<div id="internship" style="margin-top:0;padding-top:0">
<img src="http://localhost/egypt/two_files/internship.png" alt="logo" title="promo block image" />
</div>
		<h1><span style="font-family:georgia;weight:bold"><?php echo 'Photo&middot;Ikons ';?></span>FINE PHOTOGRAPHY</h1>
		<?php showMenu($main_menu) ?>
	</div>
	<!-- Start: Sidinnehåll -->
	<div id="pagecontent" class="clearfix" >
		<!-- Start: Contentrad -->
		<div class="content-row" style="float:right" >
			<!-- Start: Innehållsklumn 1 -->
			<div class="span-7" style="float:right">
				<h2 style="color:#dd0000"><?php echo $message ?></h2>
        
 

<!-- The feature Image -->
<?php //echo '<img src="http://'.ROOT.'/egypt/lev-daichik/5570030-md.jpg" style="width:90%;margin-left:15px;" alt="" title="" />'?>      

<!-- The feature -->
<?php //echo '<h3>'.$feature.'</h3>'?>

<div class="span-5 clearfix" style="margin:0 0 0 15px">
<!-- Other meta data -->

 <label>categories</label>
 <textarea name="category" style="width:90%;height:200px;font-family:georgia;font-size:12px;text-indent:0" >
<?php echo trim($category) ?>
 </textarea>
 
<!-- The Save Us Field --> 
<label>Save As </label> 
<input type="text" value="<?php echo $title ?>" name="save_as" style="width:98%;font-family:georgia;font-size:12px" />
 
<input type="submit" name="mysubmit" value="Save" />

<!-- End Save As ---> 
 
<ul class="LHnav" style="margin-left:0px;width:210px">

  <?php 
  define('GALLERYPATH','');
 echo '<li><a href="http://localhost/CodeIgniter/admin/template/save/'.$location.'/'.$title.'">Save</a></li>';
  echo '<li><a href="http://localhost/CodeIgniter/admin/template/save/'.$location.'/'.$title.'">Save and Publish</a></li>';
 echo '<li><a href="'.'http://localhost/CodeIgniter/Blogs/stamps/'.$location.'/'.$title.'" >Preview</a></li>';
  echo '</ul>';
  
?>
 
  
<input type="submit" name="mysubmit" value="Submit Post!" />
 
  
</div>
			
</div>
			<!-- Start: Side 1 -->
<div class="span-17" style="margin-left:20px">
 <?php //echo //$success; ?>

<?php //echo form_open('form'); ?>
 
  <label>Title</label> 
  <input type="text" value="<?php echo $title ?>" name="title" style="width:98%;font-family:georgia;font-size:18px" />
<textarea name="content" style="width:98%;height:1000px;font-family:georgia;font-size:18px">
<?php echo $content; ?>
</textarea>
  
  
  
 <input type="submit" name="mysubmit" value="Submit Post!" />
  
  </form>
</div>
	<p>Edit Post Template</p>		
		</div>
	</div>
	<!-- Start: Sidfot -->
	<?php include('footer.php');?>
	
