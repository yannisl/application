<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><title>Welcome to CodeIgniter : CodeIgniter User Guide</title>



<link rel="stylesheet" type="text/css" media="all" href="http://localhost/strings/code_files/userguide.css">

<script type="text/javascript" src="http://localhost/strings/code_files/nav.js"></script>
<script type="text/javascript" src="http://localhost/strings/code_files/prototype.js"></script>
<script type="text/javascript" src="http://localhost/strings/code_files/moo.js"></script>
<script type="text/javascript" src="http://localhost/strings/code_files/user_guide_menu.js"></script>

<meta http-equiv="expires" content="-1">
<meta http-equiv="pragma" content="no-cache">
<meta name="robots" content="all">
<meta name="author" content="ExpressionEngine Dev Team">
<meta name="description" content="ERE-CMS User Guide"></head><body>

<!-- START NAVIGATION -->
<div style="overflow: hidden; height: 0px;" id="nav">
  <div id="nav_inner"><script type="text/javascript">create_menu('null');</script><table cellspaceing="0" style="width: 98%;" border="0" cellpadding="0"><tbody><tr><td class="td" valign="top"></table>
  </div>
</div>

<div id="nav2"><a name="top"></a><a href="javascript:void(0);" onclick="myHeight.toggle();"><img src="code_files/nav_toggle.jpg" title="Toggle Table of Contents" alt="Toggle Table of Contents" border="0" height="44" width="153"></a></div>


<div id="masthead">
<table style="width: 100%;" border="0" cellpadding="0" cellspacing="0">
<tbody><tr>
<td><h1>MEPIgniter User Guide Version 1.6.3</h1></td>
<td id="breadcrumb_right"><a href="http://codeigniter.com/user_guide/toc.html">Table of Contents Page</a></td>
</tr>
</tbody></table>
</div>
<!-- END NAVIGATION -->


<table style="width: 100%;" border="0" cellpadding="0" cellspacing="0">
<tbody><tr>
<td id="breadcrumb">
<a href="http://codeigniter.com/">CodeIgniter Home</a> &nbsp;›&nbsp; CodeIgniter User Guide
</td>
<td id="searchbox"><form method="get" action="http://www.google.com/search"><input name="as_sitesearch" id="as_sitesearch" value="codeigniter.com/user_guide/" type="hidden">Search User Guide&nbsp; <input class="input" style="width: 200px;" name="q" id="q" size="31" maxlength="255" value="" type="text">&nbsp;<input class="submit" name="sa" value="Go" type="submit"></form></td>
</tr>
</tbody></table>



<br clear="all">

<div class="center"><img src="code_files/ci_logo_flame.jpg" alt="CodeIgniter" border="0" height="164" width="150"></div>


<!-- START CONTENT -->
<div id="content">
<h2>Creating User Interfaces for Large Websites</h2>

<p>You are all creating sitemaps, but site maps in most cases are missing logical flow. There is nothing like a table of contents menu. But, what do you do when a website is so large that you need plenty of website estate to use it? Create a hidden menu like the one shown here. When you click it, it drops down and you can have as musch info in it as you like. Websites that I know that use this principle is codeigniter.com, bbc.co.uk and the like.</p>

<h2>Technologies</h2>
<p>To be able to produce a menu like the above, it is necessary to use Javascript, a library (to avoid developing code from scratch), PHP and sometimes a database. In this case the jVision parser is used to simplify all of the above. </p>

<p>The contents can be simply be typed in a text file. The text file is parsed and the menu is created as a javascript file and cached. If the text file is changed (we might be picking up the content dynamically) then the file will be re-parsed. It is also possible to get the values straight from the databse.</p>


<code>
 toc{type:table-contents;
      data:nav.txt;
      wrap:aclass;
      id:nav1;
     } 
</code>

<p>jVision will produce two files. The one file is the necessary javscript and the second will be an html only file for the table of contents.</p>

<!-- START NAVIGATION -->
<div id="nav2"><a name="top"></a><a href="javascript:void(0);" onclick="myHeight1.toggle();"><img src="code_files/nav_toggle.jpg" title="Toggle Table of Contents" alt="Toggle Table of Contents" border="0" height="44" width="153"></a></div>
<div style="overflow: hidden; height: 0px;" id="nav1">
  <div id="nav_inner"><script type="text/javascript">create_menu('null');</script><table cellspaceing="0" style="width: 98%;" border="0" cellpadding="0" style="color:#000000"><tbody><tr><td class="td" valign="top"></table>
  </div>
</div>

















<h2>Welcome to the ERE Document Management System</h2>



</div>
<!-- END CONTENT -->


<div id="footer">
<p><a href="#top">Top of Page</a></p>
<p><a href="http://erecontracting.com/">ERE</a> &nbsp;·&nbsp; Copyright © 2006-2008 &nbsp;·&nbsp; <a href="http://ellislab.com/">Visionlabs, Inc.</a></p>
</div>



</body></html>