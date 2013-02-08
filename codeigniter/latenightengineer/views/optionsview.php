<?php 

 define('BASEPATH1','../egypt/');
 define('ROOT',$_SERVER['SERVER_NAME']);
 
 

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

<h2>General Options</h2>


<form method="post" action="http://localhost/CodeIgniter/admin/options" style="width:98%">


<fieldset style="border:0">
<input name="_wpnonce" value="" type="hidden" />
<input name="_wp_http_referer" value="/wp-admin/options-general.php" type="hidden" />
<input name="Submit" value="Update Options »" type="submit" style="float:right" />
</fieldset>




<table style="width:85%;float:left">
<tbody>
<tr valign="top">
<th scope="row">Blog title:</th>
<td><input name="blogname" id="blogname" value="<?php __($blogname)?>" size="40" type="text" /></td>
</tr>
<tr valign="top">
<th scope="row">Tagline:</th>
<td><input name="blogdescription" id="blogdescription" style="width: 95%;" value="<?php __($blogdescription) ?>" size="45" type="text" />
<br />

In a few words, explain what this blog is about.</td>
</tr>
<tr valign="top">
<th scope="row">WordPress address (URL):</th>
<td><input name="siteurl" id="siteurl" value="<?php __($siteurl)?>" size="40" class="code" type="text"/></td>
</tr>
<tr valign="top">
<th scope="row">Blog address (URL):</th>
<td><input name="home" id="home" value="<?php __($home) ?>" size="40" class="code" type="text" /><br />Enter the address here if you want your blog homepage <a href="http://codex.wordpress.org/Giving_WordPress_Its_Own_Directory">to be different from the directory</a> you installed WordPress.</td>
</tr>

<tr valign="top">
<th scope="row">E-mail address: </th>
<td><input name="admin_email" id="admin_email" value="<?php __($admin_email) ?>" size="40" class="code" type="text" />
<br />
This address is used only for admin purposes.</td>
</tr>
<tr valign="top">
<th scope="row">Membership:</th>
<td> 
<label for="users_can_register">
<input name="users_can_register[]" id="users_can_register" value="1" checked="checked" type="checkbox" />
<label for="users_can_register">
<input name="users_can_register[]" id="users_can_register" value="1" checked="checked" type="checkbox" />


Anyone can register</label><br />
<label for="comment_registration">

<input name="comment_registration" id="comment_registration" value="0" type="checkbox" />
Users must be registered and logged in to comment</label>
</td>
</tr>
<tr valign="top">
<th scope="row">New User Default Role:</th>
<td><label for="default_role">
<select name="default_role" id="default_role">
	<option selected="selected" value="subscriber">Subscriber</option>
	<option value="administrator">Administrator</option>
	<option value="editor">Editor</option>

	<option value="author">Author</option>
	<option value="contributor">Contributor</option></select></label>
</td>
</tr>
</tbody></table>

<div style="clear:both"></div>

<fieldset>
<legend>Date and Time </legend>


<div style="clear:both"></div>


<table style="width:100%"> 
<tbody>
<tr>
<th scope="row"><abbr title="Coordinated Universal Time">UTC</abbr> time is: </th>

<td><code>2008-09-14 3:16:07 pm</code></td>
</tr>
<tr>
<th scope="row">Times in the blog should differ by: </th>
<td><input name="gmt_offset" id="gmt_offset" size="2" value="<?php __($gmt_offset) ?>" type="text" />
hours (Your timezone offset, for example <code>-6</code> for Central Time.)</td>
</tr>
<tr>
<th scope="row">Default date format:</th>
<td><input name="date_format" id="date_format" size="30" value="<?php __($date_format) ?>" type="text" /><br />

Output: <strong><?php echo date($date_format);?></strong></td>
</tr>
<tr>
<th scope="row">Default time format:</th>
<td><input name="time_format" id="time_format" size="30" value="<?php __($time_format) ?>" type="text" /><br />
Output: <strong>3:16 pm</strong></td>
</tr>
<tr>
<th scope="row">&nbsp;</th>
<td><a href="http://codex.wordpress.org/Formatting_Date_and_Time">Documentation on date formatting</a>. Click "Update options" to update sample output. </td>

</tr>
<tr>
<th scope="row">Weeks in the calendar should start on:</th>
<td><select name="start_of_week" id="<?php __($start_of_week);?>"  />
<?php
  for ($i=0;$i<7;$i++){$z[$i]='';}
  $z[$start_of_week]='selected="selected"';

?>
	<option value="0" <?php echo $z[0] ?>>Sunday</option>
	<option value="1" <?php echo $z[1] ?>>Monday</option>
	<option value="2" <?php echo $z[2] ?>>Tuesday</option>
	<option value="3" <?php echo $z[3] ?>>Wednesday</option>

	<option value="4"<?php echo $z[4] ?> >Thursday</option>
	<option value="5" <?php echo $z[5] ?>>Friday</option>
	<option value="6" <?php echo $z[6] ?>>Saturday</option></select></td>
</tr>
</tbody>
</table>
</fieldset>

<p class="submit"><input name="Submit" value="Update Options »" type="submit" />
<input name="action" value="update" type="hidden" />
<!--list here all page options easier decluuters-->
<input name="page_options" 
  value="siteurl,
        home,blogname,blogdescription,
        admin_email,
        users_can_register,
        gmt_offset,
        date_format,
        time_format,
        start_of_week,
        comment_registration,
        default_role" 
        type="hidden" />
</p>
</form>

</div>


			
	</div>
	<!-- Start: Sidfot -->
	<?php include('footer.php');?>




































