
<?php 
//TEMPLATE
//article_view
//deals with articles
//
 define('BASEPATH1','../egypt/');
 define('ROOT',$_SERVER['SERVER_NAME']);
 
 
 include_once(BASEPATH1.'define.php');
 include_once(BASEPATH1.'table.php'); 
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
	<div id="pagecontent" class="clearfix" >
		<!-- Start: Contentrad -->
		<div class="content-row"  >
			<!-- Start: Innehållsklumn 1 -->
			<div class="span-7">
				<h2 style="color:#dd0000">Templating with PHP</h2>
        
 

<!-- The feature Image -->
<?php echo '<img src="http://'.ROOT.'/egypt/lev-daichik/5570030-md.jpg" style="width:90%;margin-left:15px;" alt="" title="" />'?>      

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
			<div class="span-17">
     <?php echo $success; ?>

<?php echo form_open('form'); ?>

<fieldset>
<label>User Registration</label>
<h5>Username</h5>
<?php echo $this->validation->username_error; ?>
<input type="text" name="username" value="<?php echo $this->validation->username;?>" size="50" />

<h5>Password</h5>
<?php echo $this->validation->password_error; ?>
<input type="password" name="password" value="<?php echo $this->validation->password;?>" size="50" />

<h5>Password Confirm</h5>
<?php echo $this->validation->passconf_error; ?>
<input type="password" name="passconf" value="<?php echo $this->validation->passconf;?>" size="50" />

<h5>Email Address</h5>
<?php echo $this->validation->email_error; ?>
<input type="text" name="email" value="<?php echo $this->validation->email;?>" size="50" />

<h5>Image Title</h5>
<input type="text" name="image_title" value="<?php echo $this->validation->image_title;?>" size="50" />
<h5>Image Caption</h5>
<input type="text" name="image_caption" value="<?php echo $this->validation->image_caption;?>" size="50" />

<h5>Image Credit</h5>
<input type="text" name="image_credit" value="<?php echo $this->validation->image_credit;?>" size="50" />
</fieldset>

<div><input type="submit" value="Submit" /></div>

</form>
</div>
			</div>
		</div>
	</div>
	<!-- Start: Sidfot -->
	<?php include('footer.php');?>
	
