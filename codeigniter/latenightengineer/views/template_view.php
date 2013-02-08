
<?php 
//the parser fetches all the data and replaces wiki links
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
</style>	
</head> 


<?Php
//include(BASEPATH.'head.php'); 
//include('view.php');
//include('view.class.php');
 //$parse=new parser();
 //$view=new View();
 //need to include the data here also as info is
 //lost when arriving here from url
 //should consider inserting the table in the url
?>
 

<?php
/*
define('GALLERYPATH','../../egypt/');
if (isset($gallery) && $gallery !=''){
    $path=GALLERYPATH.$gallery.'/';}else{
//$path='../egypt/martin-schoeller/';
//$path='../egypt/simon-procter/';
//$path='../egypt/zemotion_files';
$path='../../egypt/mariano-vivanco';}


//';
//$path='../egypt/zemotion_files/';
$dir = new RecursiveIteratorIterator(
           new RecursiveDirectoryIterator($path), true);
  foreach ( $dir as $file ) {
    if (preg_match("/\.jpe?g$/",$file)){
    $file=str_replace("\\",'/',$file);
    $file=preg_replace('%\s%','',$file);
    $f=preg_match("%[\/]([a-zA-Z0-9\-\_\%]+\.jpe?g$)%",$file,$values);
    $filename[]=$values[1]; //filename only array
    $image[]=$file;//full path file
    //echo '<div style="color:#fff">';
    //echo($values[1]);
    //echo '</div>';
   }
  }
*/
?>

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
        
 

<?php echo '<img src="http://'.ROOT.'/egypt/lev-daichik/5570030-md.jpg" style="width:90%;margin-left:15px;" alt="" title="" />'?>      


<div class="span-5 clearfix" style="margin:0 0 0 15px">
 <h4 style="margin-bottom:0px">TEMPLATES</h4>
<ul class="LHnav" style="margin-left:0px;width:210px">
 
  <?php 
  define('GALLERYPATH','');
 echo '<li><a href="'.'photographer_gallery.php?gallery=tomchambers&amp;page=1" >Separating the Business Logic</a></li>';
 echo '<li><a href="'.GALLERYPATH.'photographer_gallery.php?gallery=simon-procter&amp;page=1" >A Simple PHP Template System</a></li>';
   
  ?> 
  </ul>
  
 <h4 style="margin-bottom:5px">SMARTY</h4>

 <ul id="LHnav" style="margin-left:0px;width:210px">
  <?php echo '<li><a href="'.GALLERYPATH.'photographer_gallery.php?gallery=tomchambers&amp;page=1" >Smarty Template Engine</a></li>';

  ?>
</ul>  
  
  
  
</div>
			
</div>
			<!-- Start: Innehållsklumn 2 -->
			<div class="span-17">
   


<h2>Separating the Business Logic from the Presentation</h2>
<?php echo '<img src="http://'.ROOT.'/egypt/templating.png'.'" style="'.'float:right"'.' alt=""'.' title="" />'	?>
<p>Templating and templating frameworks can help separate the business logic from the presentation. Separating the program logic from the presentation has many advantages in terms of maintaining code and for groups to be more tightly integrated. When the programmer changes the code the designer who is busy designing the template is not affected.
Web developers are not necessarily good designers. Most companies divide the task of building Web sites between two teams. Normally, one team is responsible for the design content of a page, and the other team is responsible for the application logic. Even personally as a sole developer, I find that wgen designing I have a different hat and it is not unknown for me to have forgotten what something is suppose to do.!
</p>

<h3>But PHP is a templating language</h3>

<p>Granted when PHP was developed it was developed mostly as a templating language. Many PHP programmers actually still find it easier to write PHP code rather than go through the trouble of learning a 'templating language'. Personally I think there is room for both schools of thought. Whatever route one takes nevertheless separating the business logic from the presentation is good practice.</p>

<h3>A Simple PHP Template System</h3>

<p>A simple PHP templating class should be able to display the template as well as do some parsing if necessary. In addition it needs to do some caching. Note what we are caching is the PHP file and not the final html code.</p>


<p>This class provides an excellent method of templating and caching of you files. As it uses PHP within the template, it does away with the need for another, (pointless) layer. After all, PHP is an embedded language. Before we look at the code to display a template, a template file is needed. Here is a simple one to get started.</p>

<pre style="width:98%;font-size:0.75em;overflow:scroll;height:300px;border:1px dotted #bebebe;line-height:1.2;margin=0;padding:0">
<?php highlight_file((htmlentities(BASEPATH.'template2.class.php'))) ?>
</pre>

<h3>The Index File</h3>

<p>The index file would fetch the data and send it to the template. It will then dispaly the template.</p>

<pre style="width:98%;font-size:0.75em;overflow:scroll;height:300px;border:1px dotted #bebebe;line-height:1.2;margin=0;padding:0">
<?php highlight_file((htmlentities(BASEPATH.'template-main.php'))) ?>
</pre>

<p>The data is of the form</p>

<pre style="width:98%;font-size:0.75em;border:1px dotted #bebebe;line-height:1.2;margin=0;padding:0">

 $template->heading   = "LateNightEngineer";
 $template->slogan    = "FINE PHP";
 $template->content   = "Our content goes here";';
 highlight_string(htmlentities($text));
</pre>

<h3>The Template File</h3>

<p>Of course, you will still need a template file to go along with this script, here is one we prepared earlier.
Copy the code below and save it in a file <tt>template.tpl</tt>. Most programmers and templating systems will save template files with the extension <tt>.tpl</tt> files. You can actually save it with any extension you want, but it is good practice to save it with a <tt>.tpl</tt> extension.

</p>

<pre style="width:98%;font-size:0.75em;border:1px dotted #bebebe;line-height:1.2;margin=0;padding:0">
&lt;html&gt;
&lt;body&gt;
&lt;h1&gt;<?php //echo //$heading; ?>&lt;/h1&gt;
&lt;p&gt;PHPRO Templating at work.&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;

</pre>


<p>In a production application, the data would be provided by a database. Many programmers would also provide some of this data, by reading a configuration file. Whatever you do, do not fetch the data at the template.</p> 

<h3>Extending our Simple Template</h3>
		  
<p>The simplest template can just be a tag-replacing template. Let us develop one quickly. 
Although people might just disagree {$title} avoiding PHp and just typing {$title} might for some people be easier. Personally,
I like to extend this to similar other items.

The aim of this template is to replace some tags marked up between curly brackets with links to wikipedia. 
By including the tags {{wi:ansel adams}}, our templating engine would replace the tags with a link to wikipedia. We can also extend our strategy to other common variables such as website title {{blogTitle}}, {{keywords:best website, gallery, beautiful}}. Really you are on your own here if you want to develop your own special 'language'.</p>

<p>What we will need is the following:</p>

<ul>

<li>The Template engine, in our case this will include the parser.</li>
<li>The template file, we will call it <tt>page.tpl</tt>.</li>
<li>The View PHP file. <tt>View.php</tt></li>
<li>The controller file. In our case the controller file will just be a simple index.php.</li>

</ul>

<p>Although all this sounds rather simplistic and one would argue is best to put everything in one file, once you have worked through the examples, you will get you aha! moment when you will realize that this is a better approach.</p>

<p><strong>The Model: </strong> In a model view controller architecture the Model is normally the part that talks to the database. There is no need though to complicate our life creating a database, tables and the like at this stage. Our model will just pull data from a text file and parse it. It can jsut be a simple configuration file.</p> 		  

<h3>The Template</h3>

<p>We will keep our template simple at this stage in order to present the highlights of this tutorial in a clearer manner. We will expand them later on to a full working website. Just bear with me and be patient.</p>

<pre>
&lt;html>
 &lt;head>
 &lt;/head>
  &lt;body>
    Our article will go here. The template engine
    will parse this portion before loading it and echo back
    the correct html version.
  &lt;/body>
&lt;/html>
</pre>

<h4>Part of the Parser Routine</h4>

<p>To make life simpler we will only include one function at this stage in our <tt>template.class.php</tt>. This function will parse the article and just replace all links with wikipedia links. All Wikipedia links are undescored.</p>
<?php function wikiLink($query){
//creates link for wiki
 $query=strtolower(trim($query));
 $query=ucwords($query);
 $query=str_replace(' ','_',$query);
 $s='http://en.wikipedia.org/wiki/'.$query;
 return $s;
}?>
<pre>
function wikiLink($query){
//creates link for wiki
 $query=strtolower(trim($query));
 $query=ucwords($query);
 $query=str_replace(' ','_',$query);
 $s='http://en.wikipedia.org/wiki/'.$query;
 return $s;
}
</pre>

<p>Calling this function will just return a string pointing to the correct Wikipedia link</p>

<blockquote>
 <p>This article is about <?php echo '<a href="'.wikiLink('Template_engine(web)').'"'.'>Templating Engines</a>'?>.</p>
</blockquote>

<p>In most cases the above simple routine would hit the right link to a wikipedia article. By the way the above article is fairly good as an introduction to templating for the web with a good evaluation guide of various templating engines.</p>

<p>Wikipedia itself uses templating extensively. We can extend our functions list to include loading information from files. Here are some examples.</p>
<pre>
 {{file:article1.txt}}
 {{img:image01.jpg}}
 {{image-container:Her Red Boots
    |redboots.jpg
    |Girl with Red Boots|credit
    }}
</pre>

<p>The last one can be very powerful if used in conjunction with CSS Components. It will produce an image as follows:</p>

  <div style="width:35%;float:left;margin-right:8px">
    <img src="Scott-14000.jpg" style="width:100%" alt="" title="" />
  </div>

<p>The function will return the correct mark-up and we can extend it if we wish to include the correct CSS to display an image container, float it to the left or right and add a title, caption give credit to the photographer and the like.
</p>


<p>An alternative way and better would be to make the routine more general and pull the data from the database and our tag would consist simply as:</p>

<pre>
  {{image-container:$image_data}}
</pre>

<p><tt>$image_data</tt> would simply hold all the information for the image that we want to display. This way we can allow entry of images either through the user in textboxes or programmatically, via the template and templating engine.Designing the templating engine to handle varaiables is the second requirement for a good templating engine.</p>

<p>Template engines typically include features common to most high-level programming languages, with an emphasis on features for processing plain text.</p>

<p>Such features include:</p>

<ol>
    <li>text replacement</li>
    <li> variables</li>
    <li>function</li>
    <li> file inclusion (or transclusion)</li>
    <li>conditional evaluation and loops</li>
</ol>

<p>So far if I have not lost you we have included for the first two.</p>

<h4>Functions</h4>

<p>So far we have touched on a number of internal methods or functions that the templating engine must include. Let us peek at this stage at what other people our doing such as Smarty.</p>

<p>Every Smarty tag either prints a variable or invokes some sort of function. These are processed and displayed by enclosing the function and its attributes within delimiters like so: {funcname attr1='val1' attr2='val2'}.</p>

<p>Example 3-3. function syntax</p>

<pre>
{config_load file='colors.conf'}

{include file='header.tpl'}
{insert file='banner_ads.tpl' title='Smarty is cool'}

{if $logged_in}
    Welcome, 
{else}
    hi, {$name}
{/if}

{include file='footer.tpl' ad=$random_id}
</pre>

<p>Here is where most of the criticism -including mine- of existing tempalte engines lie. For the designer it might be more readable (I think people underestimate the intelligence of designers) but for the programmer, this would be more obscure:</p>
<pre>{include file='header.tpl'}</pre>
<p>rather than:</p>	
<pre>include('header.tpl');</pre>

<p>My suggestion is allow PHP code but without the &lt;?php</p>

<pre>{{include('header.tpl')}}</pre>

<p>As you will see I have allowed for the semi-colon to be omitted -people do tend to forget it and the parser can allow for both cases transparently. The same can be utilized for functions. The syntax shown below will capitalize the text in the parenthesis and this way we also allow for variables to be included in one go.</p>
	
	
<p>{{capitalize($text)}}</p>
	
	
<p>In my opinion doing anything more than this you will just end-up writing the code in the template. Wordpress has a similar approach where they do not actually embed much code in templates.</p>

		  
<h3>Be Smart and Use Smarty</h3>

<p>
One of the most popular templating engines is Smarty. Smarty has been widely accepted as a templating engine. 
Although Smarty is known as a "Template Engine", it would be more accurately described as a "Template/Presentation Framework." Samrty provides the programmer and template designer with a wealth of tools to automate tasks commonly dealt with at the presentation layer of an application. Smarty is not a simple tag-replacing template engine. Although it can be used for such a simple purpose, its focus is on quick and painless development and deployment of your application, while maintaining high-performance, scalability, security and future growth.</p>

<p>Smarty has found wide acceptance by open source programmers. For example <a href="http://gallery.menalto.com">Gallery</a> use it. I mentioned Gallery as is one of the few open source projects with a well designed Model View Controller architecture. Many other projects use it and even TinyMVC has a suggested wrapper for it in the documentation. This particular project is intriguing is that it has probably the skinniest code for a Model View Controller architecture.</p>

<p>Some of the features of Smarty</p>

<p>Here are some of the more notable features of Smarty:</p>

<p><strong>Caching:</strong> Smarty provides fine-grained caching features for caching all or parts of a rendered web page, or leaving parts uncached. Programmers can register template functions as cacheable or non-cachable, group cached pages into logical units for easier management, etc.</p>

<p><strong>Configuration Files:</strong> Smarty can assign variables pulled from configuration files. Template designers can maintain values common to several templates in one location without intervention from the programmer, and config variables can easily be shared between the programming and presentation portions of the application.</p>

<p><strong>Security:</strong> Templates do not contain PHP code. Therefore, a template designer is not unleashed with the full power of PHP, but only the subset of functionality made available to them from the programmer (application code.) Personally I am not sure how much of a feature this is.</p>

<p><strong>Easy to Use and Maintain:</strong> Web page designers are not dealing with PHP code syntax, but instead an easy-to-use templating syntax not much different than plain HTML. The templates are a very close representation of the final output, dramatically shortening the design cycle.</p>

<p><strong>Variable Modifiers:</strong> The content of assigned variables can easily be adjusted at display-time with modifiers, such as displaying in all upper-case, html-escaped, formatting dates, truncating text blocks, adding spaces between characters, etc. Again, this is accomplished with no intervention from the programmer.</p>

<p><strong>Template Functions:</strong> Many functions are available to the template designer to handle tasks such as generating HTML code segments (dropdowns, tables, pop-ups, etc.), displaying content from other templates in-line, looping over arrays of content, formatting text for e-mail output, cycling though colors, etc.</p>

<p><strong>Filters:</strong> The programmer has complete control of template output and compiled template content with pre-filters, post-filters and output-filters.</p>

<p><strong>Resources:</strong> Templates can be pulled from any number of sources by creating new resource handlers, then using them in the templates.</p>

<p><strong>Plugins:</strong> Almost every aspect of Smarty is controlled through the use of plugins. They are generally as easy as dropping them into the plugin directory and then mentioning them in the template or using them in the application code. Many user-community contributions are also available. (See the plugins section of the forum and wiki.)</p>

<p>Add-ons: Many user-community contributed Add-ons are available such as Pagination, Form Validation, Drop Down Menus, Calander Date Pickers, etc. These tools help speed up the development cycle, there is no need to re-invent the wheel or debug code that is already stable and ready for deployment. (see the Add-ons section of the forum and wiki.)</p>

<p>Debugging: Smarty comes with a built-in debugging console so the template designer can see all of the assigned variables and the programmer can investigate template rendering speeds.</p>

<p><strong>Compiling:</strong> Smarty compiles templates into PHP code behind the scenes, eliminating run-time parsing of templates. Actually this is not a strict compilation that is generating binary code but rather Smarty will generate and cache PHP code.</p>

<p><strong>Performance:</strong> Smarty performs extremely well, despite its vast feature set. Most of Smarty's capabilities lie in plugins that are loaded on-demand. Smarty comes with numerous presentation tools, minimizing your application code and resulting in quicker, less error-prone application development/deployment. Smarty templates get compiled to PHP files internally (once), eliminating costly template file scans and leveraging the speed of PHP op-code accelerators.</p>

<p>So is Smarty right for you? What it comes down to is using the right tool for the job. If you want simple variable replacement, you might want to look at something simpler or even roll your own. If you want a robust templating framework with numerous tools to assist you as your application evolves into the future, Smarty is likely a good choice. 
</p>

<h2>Smarty Custom Functions AKA Plugins</h2>

<p>One of the powerful features of Smarty is its ability of the programmer to add custom functions. Here we will have a quick look at how to add custom functions to Smarty</p>

<pre style="margin:0;padding:0;width:90%;overflow:scroll;border:1px dotted #bebebe">
&lt;?php
// the smarty function name has to start with "smarty_function" and end with "_your_function_name"
// also, all of the attributes are being passed into one array, which we're calling "params".
// finally, we include access to the parent smarty object with the nifty "&amp;$smarty" var, which will let us pass it //values for error messages without breaking the page load.
	
function smarty_function_latenightengineer($params='Hi!', &amp;$smarty) {

// This line of code makes "greeting" a required attribute, and sends an 
//error through the smarty object if it's not  set
if (empty($params['greeting'])) {
 $smarty->_trigger_fatal_error("[latenightengineer] param 'greeting' cannot be empty ");
	return;
}
// since we're not requiring "name" as an attribute, 
//we're setting a default value for it if it's not set
		if (isset($params['name'])) {
			$name = $params['name'];
		} else {
			$name = '(whoever you are).';
		}

// now we build a string to return to the page 
//calling this function

 $return = '&lt;div class="myclass"&gt;';
 $return .= $params['greeting'] . ', ' . $name;
 $return .= '&lt;/div&gt;';

// finally, we return the string, which will be compiled and echo'd
		return $return;
	}
?>

</pre>

<h2>Tips and Tricks in Developing your Templates</h2>

<p>Whatever you do a tempalte can get a bit messy, especially if you go the PHP route. This is what works for me and hoping it can work for you:</p>

<ol>
 <li>Create a template in plain HTML first. Yes do not worry about <tt>head.php</tt>, <tt>footer.php</tt> and the like at this point.</li>
 <li>Use a CSS framework that worked for you in the past or if you starting from scratch use Blueprint.</li>
 <li>Make any layout changes you need first.</li>
 <li>Validate the code.</li>
 <li>Insert all the PHP or template tags you need.</li>
 <li>Check and debug.</li>
 <li>If parts of the template are going to be repeated in other templates, cut and paste <tt>head.php</tt>, <tt>footer.php</tt> and adjust your template accordingly.
 Remember that you may want to add items in the head.php such as the title and keywords.
 </li>
</ol>


			</div>
		</div>
	</div>
	<!-- Start: Sidfot -->
	<?php include('footer.php');?>
	
	