<!DOCTYPE html>
<html lang=en>
<head>
  <title><?php echo $title;  ?></title>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <meta http-equiv="Content-Language" content="mul" />
  <link rel="Shortcut Icon" href="http://localhost/CodeIgniter/images/favicon.ico" type="image/x-icon" />
  <!-- revised style sheets -->
  
 <!-- <link rel="stylesheet" href="http://localhost/CodeIgniter/css/general.css" type="text/css" /> -->
  <link rel="stylesheet" href="http://localhost/CodeIgniter/css/screen.css" type="text/css" />
  <link rel="stylesheet" type="text/css" media="all" href="/codeigniter/css/userguide.css" /> 
  <link rel="stylesheet" href="http://localhost/CodeIgniter/css/typography.css" type="text/css" />
  <link type="text/css" href="http://localhost/CodeIgniter/css/smoothness/jquery-ui-1.7.1.custom.css" rel="Stylesheet" />

<!--  <link type="text/css" href="http://localhost/CodeIgniter/css/measures.css?" rel="Stylesheet" />
  <!-- various blocks for pinnotes, sandboxes code etc -->
  <link type="text/css" href="http://localhost/CodeIgniter/css/bootstrap.css?" rel="Stylesheet" />
   <link type="text/css" href="http://localhost/CodeIgniter/css/boxes.css?" rel="Stylesheet" />
   <link type="text/css" href="http://localhost/CodeIgniter/css/codeblocks.css?" rel="Stylesheet" /> 
   <link type="text/css" href="http://localhost/CodeIgniter/css/forms.css?" rel="Stylesheet" />
   <link type="text/css" href="http://localhost/CodeIgniter/css/navigation.css?" rel="Stylesheet" />
  <!-- <link type="text/css" href="http://localhost/CodeIgniter/css/tables.css?" rel="Stylesheet" /> -->
  

  <script type="text/javascript"  src="http://localhost/codeIgniter/js/jslint.js" id="scriptjsLint" charset="utf-8"></script>
  <!--    <script type="text/javascript" src="http://localhost/CodeIgniter/js/jquery.ajaxContent.js"></script> -->
  <script type="text/javascript" src="http://localhost/codeigniter/js/jquery.js">
           
        <!---1.3.2.min<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript">-->
  </script>
  <script type="text/javascript" src="http://localhost/CodeIgniter/js/jquery.form.js" />
  <!--   <script type="text/javascript" src="http://localhost/CodeIgniter/js/ajax.js"></script>-->
  <script  type="text/javascript" src="http://localhost/codeigniter/js/formatter.js" ></script>

 

        <!-- best way -->
        
       <!--<script src="http://code.jquery.com/jquery-1.4a2.js"></script>-->
       <script type="text/javascript" src="http://localhost/CodeIgniter/js/jquery-ui-1.7.1.custom.min.js"></script> 
      <!--  <script type="text/javascript"  src="http://localhost/codeIgniter/js/monitter/monitter.min.js" ></script> -->


        <script type="text/javascript" src="http://localhost/CodeIgniter/js/goog/base.js"></script>
        <script type="text/javascript" src="http://localhost/CodeIgniter/js/goog/deps.js"></script>
       <script type="text/javascript" src="http://localhost/CodeIgniter/js/goog/dom/annotate.js"></script> 
       

        <script  type="text/javascript" src="http://localhost/CodeIgniter/js/U.js"></script>
        <script type="text/javaScript" src="http://localhost/CodeIgniter/js/stamps.js"></script>
        <script type="text/javaScript" src="http://localhost/CodeIgniter/js/highlighter.js"></script> 

      
        <script defer="true" type="text/javascript" src="http://localhost/CodeIgniter/js/tokens.js"></script>
        <script defer="true" type="text/jacascript"   src="http://localhost/CodeIgniter/js/parse.js"></script>
        <script defer="true" type="text/javascript" src="http://localhost/codeigniter/js/json2.js"></script>
       <link type="text/css" media="screen" rel="stylesheet" href="/CodeIgniter/colorbox/example1/colorbox.css" />
       <script type="text/javascript" src="http://localhost/CodeIgniter/colorbox/colorbox/jquery.colorbox.js"></script>
       <script type="text/javascript" src="http://localhost/CodeIgniter/js/timeout.js"></script>
   
       <script type="text/javascript" src="http://localhost/CodeIgniter/js/bootstrap.js"></script>

     


        <meta name="author" content="Y Lazarides" />
        <meta name="copyright" content="Dr Y Lazarides" />
        <meta name="robots" content="all" />
        <meta name="imagetoolbar" content="no" />
        <meta name="keywords" content="<?php //echo $keywords;    ?>" />
        <meta name="description" content="Stamps and Postal History" />
        
 </head>


<body style="background:url('/codeigniter/images/body_bg.gif')">
<!-- Some modal forms -->


<!-- css in userguide -->
<div class="container clearfix" style="border-top:3px solid #000000;width:1000px;margin:0 auto">
<!-- START NAVIGATION TOP HIDDEN -->
<div id="nav">
    <div  class="nav_inner  clearfix hidden" >
        <!-- hidden menu goes here -->
    </div>
    <div id="nav_inner2" class="clearfix hidden" >
        <!-- hidden menu2  goes here -->
    </div>
</div> <!-- end hidden menu -->

<!-- Start toggle buttons  -->
<div id="nav2" class="clearfix">
    <!-- button group  -->
    <div  class="btn-toolbar pull-right" style="margin-top:-0px;">
        <div class="btn-group" style="padding-right:0px;text-align:left">
            <button class="btn btn-inverse dropdown-toggle btn-small" data-toggle="dropdown">Table of Contents <span class="caret"></span></button>
            <ul class="dropdown-menu hidden">
                <li><a id="nav-img" href="#"> All Countries  </a></li>
                <li><a id="nav-img2" href="#">System </a></li>
                <li><a>Test </a></li>
            </ul>
        </div><!-- /btn-group -->

    </div><!-- /btn-toolbar -->
<!--
<a id="nav-img" href="#"><img  src= "http://localhost/strings/nav_toggle2.jpg"
style="display:block;float:right;border:none" title="Toggle Table of Contents" alt="Toggle Table of Contents" />
</a>-->
<!--
<a id="nav-img3"  class="hidden" href="#"><img  src= "http://localhost/strings/nav_toggle2.jpg?"
style="display:block;float:right;border:none" title="Toggle Table of Contents" alt="Toggle Table of Contents" />
</a>-->
</div>
           
<!-- end button group -->

    <div class="masthead" style="background:#fff;width:100%;padding-left:0;margin-left:0;border-bottom:0">
                <div id="pagehead" style="margin-bottom:0;height:60px;width:95%;margin-top:0px;padding-top:15px">
                    <h1 style="width:56%;margin-top:0;padding:0;padding-left:0;height:auto">
                        <span style="background-color:rgb(255,255,248);font-family:arial;color:rgb(188,29,29);
                        font-size:36px;line-height:1.3;padding:10px;height:auto;" class="sitename">
                    <?php echo $web_name ?><sup style="font-size:12px"><!--&copy;--></sup>&nbsp;&nbsp;&nbsp;</span></h1>
                    <ul id="menu">
                        <li class="active">
                        <a  href="http://127.0.0.1/CodeIgniter/index.php/Blogs/stamps/blog/home">Home</a></li>
                        <li class="active" style="background-color:rgb(188,29,29);">
                        <a style="color:#fff" href="http://127.0.0.1/CodeIgniter/index.php/Blogs/tutorials/jQuery/Introduction">Notes</a></li>

                        <!--  <li class="active" style="background-color:rgb(206,123,0)"><a href="http://127.0.0.1/CodeIgniter/index.php/Blogs/excerpt">Archive</a></li>-->
                        <!--<li class="active"><a href="//localhost/CodeIgniter/blogs/gallery/eugenio-018/6">Galleries</a></li>-->
                        <!--    <li class="active"><a href="http://localhost/CodeIgniter/upload/">Upload</a></li>-->
                        <li class="active" ><a  href="http://localhost/CodeIgniter/blogs/stamps/<?php echo$portal?>/general/introduction">Blog</a></li>
                        <!--   <li class="active"><a href="http://localhost/CodeIgniter/admin/">Admin</a></li>-->
                        <!--  <li class="active"><a href="http://www.bjornblomquist.com/contact.html">Contact</a></li>-->
                        <li class="active"><a href="//localhost/CodeIgniter/auth/login/">Login</a></li>
                    </ul>
                </div>


            </div>
            <!-- END NAVIGATION -->
            <div id="pagehead-spacer" style="width:950px;height:30px;padding:15px 50px 0px 0px;margin-bottom:0px;
                 background:#fff url(/codeigniter/images/spacer.jpg) no-repeat;">
                <!-- button group  -->
                <div class="btn-toolbar pull-right">
                 <div class="btn-group">
                        <button class="btn btn-inverse dropdown-toggle btn-small" data-toggle="dropdown">Portals <span class="caret"></span></button>
                        <ul class="dropdown-menu hidden">
                            <li><?php echo '<a data-toggle="modal" href="#newdocModal" class="">New Portal</a>';?> </li>
                            <li><?php echo '<a data-toggle="modal" href="#clonedocModal" class="">Clone Portal</a>';?> </li>
                            <li><a href="#"><?php echo '<a data-toggle="modal" href="#renameportalModal" class="">Rename Portal</a>'; ?> </a></li>
                            <li><?php echo '<a href="http://localhost/CodeIgniter/adminSTAMPS/post/deletedocument/'.$portal.'/'.$location.'/'.$title.'">Delete Portal </a>'; ?> </li>
                            <li><?php echo '<a href="http://localhost/CodeIgniter/adminSTAMPS/post/deletedocument/'.$portal.'/'.$location.'/'.$title.'">Portal Settings </a>'; ?> </li>


                            <li class="divider"></li>
 <li><?php echo '<a href="http://localhost/CodeIgniter/adminSTAMPS/post/zip/'.$location.'/'.$title.'">Export PORTAL as .zip</a>'; ?> </li>
                        </ul>
                    </div><!-- /btn-group -->










                    <div class="btn-group">
                        <button class="btn btn-inverse dropdown-toggle btn-small" data-toggle="dropdown">Document <span class="caret"></span></button>
                        <ul class="dropdown-menu hidden">
                            <li><?php echo '<a data-toggle="modal" href="#newdocModal" class="">New Document</a>';?> </li>
                            <li><?php echo '<a data-toggle="modal" href="#clonedocModal" class="">Clone Document</a>';?> </li>
                            <li><a href="#"><?php echo '<a data-toggle="modal" href="#renameportalModal" class="">Rename Document </a>'; ?> </a></li>
                            <li><?php echo '<a href="http://localhost/CodeIgniter/adminSTAMPS/post/deletedocument/'.$portal.'/'.$location.'/'.$title.'">Delete Document </a>'; ?> </li>
                            <li class="divider"></li>
 <li><?php echo '<a href="http://localhost/CodeIgniter/adminSTAMPS/post/zip/'.$location.'/'.$title.'">Export as .zip</a>'; ?> </li>
                        </ul>
                    </div><!-- /btn-group -->

                    <div class="btn-group">
                        <button class="btn btn-inverse dropdown-toggle btn-small" data-toggle="dropdown">Page <span class="caret"></span></button>
                        <ul class="dropdown-menu hidden">
                            <li><a href="#"><?php echo '<a href="http://localhost/CodeIgniter/adminSTAMPS/post/edit/'.$portal.'/'.$location.'/'.$title.'">Edit Page </a> ';?> </a></li>
                            <li><a href="#"><?php echo '<a href="http://localhost/CodeIgniter/adminSTAMPS/post/new/'.$portal.'/'.$location.'/'.$title.'">New Page </a>'; ?> </a></li>
                            <li><a href="#"><?php echo '<a href="http://localhost/CodeIgniter/adminSTAMPS/post/delete/'.$portal.'/'.$location.'/'.$title.'">Delete Page </a>'; ?> </a></li>
                            <li><a href="#"><?php echo '<a data-toggle="modal" href="#renamedocModal" class="">Rename Page </a>'; ?> </a></li>
                            <li><?php echo '<a target="_blank" href="http://localhost/CodeIgniter/sandboxPDF/pdflatex/'.$portal.'/'.$location.'/'.$title.'?='.time().'">Texify</a>';
                            ?> </li>
                            <li class="divider"></li>
                            <li><a href="#"><?php echo '<a href="http://localhost/CodeIgniter/adminSTAMPS/post/edit/'.$location.'/'.$title.'">Settings </a> ';?> </a></li>
                        </ul>
                    </div><!-- /btn-group -->
                </div><!-- /btn-toolbar -->
                    <!-- end button group -->
            </div>
            <!-- TOP MENU NAVIGATION -->

            <!-- Start: Sidinneh�ll -->
            <div id="pagecontent" class="clearfix" >
                <!-- Start: Contentrad -->
                <div id="left" class="content-row"  >
                    <!-- Start: Left Menu -->
                    <div id="left-menu" class="span-6" style="padding-right:15px">
                        <!--  <h2 style="color:#dd0000">Feature Image</h2>-->
<!-- The feature Image -->
<?php if (!isset($feature_image)){echo '';}else{

    echo '<img id="feature-image" src="'.$feature_image.'" style="margin-left:15px;width:220px" alt="" title="" />';}?>

<?php if (!isset($credit)){echo '';}else{
    echo '<div style="margin-left:20px;width:80%;text-align:right"><span style="font-size:10px;color:#666">Credit: </span><a id="feature-image-credit" class="image-credit" href="'.$credit.'" style="font-size:10px;width:220px" alt="" title="" >'.$credit_source.'</a></div>';
}
?>


<!-- The feature -->
<?php echo '<h3 id="feature" class="draggable" style="width:88%;color:#acacac;margin-left:15px">'.$feature.'</h3>'?>

<!--
<div id="demo-area" class="curvy clearfix  hidden" style="border:1px solid #bebebe;margin-right:20px;">
</div>
-->

<!-- Specific Country Menu Side Menu-->
<h4  class="country" style="width:98%">
  <?php
    $this->load->helper('inflector');
    $value=str_replace('-',' ',$location);
    echo ucwords($value);
  ?>
</h4>

   
<?php

 echo $countrymenu; //country specific menu
                        //create menu automatically needs to come from model/controller
 echo '<ul  style="margin-left:0px;width:200px" class="nav">';
 foreach ($list as $key=>$value){
 $value=str_replace( '.dat', '', $value );
 $value=str_replace('/'.$portal.'/'.$location.'/', '', $value );
 $this->load->helper('inflector');
    echo '<li><a style="padding-left:3px" href="'.$value.'">'.ucfirst(r('_',' ',$value)).'</a></li>';
  }
  echo '</ul>';
?>
<?php echo $pdftitle?>
<div id="sidemenu-disable"></div>
 <!-- used for demos -->
</div>


  <!-- Start: Side 2 -->
<div class="span-16">
<!--
 <div class="clearfix" style="width:90%;">

</div> -->

<!-- button group  -->
  
<!-- end button group -->


<!--
<?php echo $prev?><img src="http://localhost/egypt/previous.gif" style="float:left;margin-top:10px" />

<a href="<?php echo $next?>"><img src="http://localhost/egypt/next.gif" style="float:right;clear:right;margin-top:10px" /></a>
-->

                        <div id="main-content" class="clearfix" >
                            <?php echo $content; ?>
                        </div>
                        <div style="clear:both"></div>
                        <div  style="background:#000;color:#fff;width:30%;float:right;margin-bottom:3px">
                            <!-- NEXT -->
                            <div class=" draggable clearfix" style="padding-bottom:5px;padding-left:7px;padding-right:7px">

                                <a href="<?php echo $prev?>"><img class="draggable" src="http://localhost/egypt/previous.gif" style="float:left;margin-top:10px" alt= "" title="<?php echo $prev ?>" /></a>

                                <a href="<?php echo $next?>" title="<?php echo $next ?>"><img  src="http://localhost/egypt/next.gif" style="float:right;clear:right;margin-top:10px" alt="" /></a>

                            </div>




                        </div>
                        <div style="clear:both"></div>
                        <div style="font-size:10px">
                            <?php echo '<p><a href="http://localhost/CodeIgniter/adminSTAMPS/post/edit/'.$location.'/'.$title.'">edit</a></p>';
                            echo '<p><a href="http://localhost/CodeIgniter/adminSTAMPS/post/delete/'.$location.'/'.$title.'">delete page</a>';
                            echo '<p><a href="http://localhost/CodeIgniter/adminSTAMPS/menu/edit/'.$portal.'/'.$location.'/'.$title.'">edit side menu</a></p>';
                            $this->benchmark->mark('code_end');

                            echo $this->benchmark->elapsed_time('code_start', 'code_end');echo '  '.$this->benchmark->elapsed_time();?>
                            <?php echo '  '.$this->benchmark->memory_usage();?>
                        </div>
                    </div>


                </div>
            </div>
            <!-- Start: footer -->
            <div style="margin-top:0;padding-left:70px;padding-right:100px;padding-top:30px;padding-bottom:30px;
                 background:#fff url(http://localhost/codeigniter/images/spacer-bottom.jpg) no-repeat;">
                <p style="width:98%;line-height:1.3;text-align:center" class="footer">
                    This site does not claim ownership of any of the pictures displayed unless otherwise stated.
                    The tag is there only to show that the picture was originally posted here or scanned or
                    capped exclusively for this site. All pictures are copyright to their respective owner.
                    No infringement intended. We believe we are using these images for educational purposes only,
                    within the laws of the Fair Use Copyright Law 107. However, if you are unhappy with our usage
                    of pictures that belong to you, please contact us and we will remove the image(s)
                    immediately. We will always co-operate, there is no need to threaten us. Please,
                    credit the site when reposting the images you found here and or original owners.
                    And download pictures for private usage only!
                    Rest of Content &copy; Dr Y.Lazarides +46 (0) 738 -19 15 03 egypt (a) latenightengineer.com
                </p>
                <p style="float:none;margin:0 auto;font-size:11px;text-align:center">Data Policy |
                    Accessibility | Contact Info | Privacy Policy |
                Copyright</p>
            </div>


        </div>
        <div id="floating-notices" style="width:200px;margin:0;padding:0;
                 display:none;position:fixed;right:20px;bottom:20px;
                 font-size:11px;" class="clearfix">
        </div>

<!-- Hidden menu modals -->
<!----- NEW DOCUMENT MODAL FORM --->
<div id="newdocModal" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<form id="newDocForm" method="post"
         action="/CodeIgniter/adminSTAMPS/post/newdoc/<?php echo $portal.'/'.$location.'/'.$title;?>">
<div class="modal-header">
 <button type="button" class="close" data-dismiss="modal"></button>
<h3 id="myModalLabel">New Document</h3>
New document name
<?php echo '<input class="newdoc" id="newdoc" name="newdoc" type="text">'?>
</div>
<div class="modal-body">
    <p>Enter the new document (folder) name. The system will create all
       the necessary directories and you will be re-directed to the new document.</p>
</div>
<div class="modal-footer">
  <?php echo '<button class="btn-submit" type="submit" width="13px">Submit</button>';?>
 <!-- <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  <button class="btn btn-primary">Save changes</button> -->
  </div>
</form>
</div>
<!-- New document -->

<!-- Hidden menu modals -->
<div id="clonedocModal" class="modal hide" tabindex="-1"
          role="dialog" aria-labelledby="myModalLabel">
  <form id="cloneDocForm" method="post"
         action="/CodeIgniter/adminSTAMPS/post/clonedoc/<?php echo$portal.'/'.$location.'/'.$title;?>">
<div class="modal-header">
 <button type="button" class="close" data-dismiss="modal"></button>
<h3 id="myModalLabel">Clone Document</h3>
Name of cloned document
<?php echo '<input class="clonedoc" id="clonedoc" name="clonedoc" type="text">'?>
</div>
<div class="modal-body">
    <p>One fine body</p>
</div>
<div class="modal-footer">
   <?php echo '<button class="btn-submit" type="submit" width="13px">Submit</button>';?>
 <!-- <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  <button class="btn btn-primary">Save changes</button> -->
  </div>
  </form>
</div>

<!-- This is the modal for renaming a document -->
<div id="renamedocModal" class="modal hide" tabindex="-1"
          role="dialog" aria-labelledby="myModalLabel">
  <form id="renameDocForm" method="post"
         action="/CodeIgniter/adminSTAMPS/post/renamedoc/<?php echo $portal.'/'.$location.'/'.$title;?>">
<div class="modal-header">
 <button type="button" class="close" data-dismiss="modal"></button>
<h3 id="myModalLabel">Rename this Page</h3>
<p>New page name</p>
<?php echo '<input  id="newdocname" name="newdocname" type="text">'?>
</div>
<div class="modal-body">
    <p>Renaming of the page (old page name will not be available any longer)</p>
</div>
<div class="modal-footer">
   <?php echo '<button class="btn-submit" type="submit" width="13px">Submit</button>';?>
 <!-- <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  <button class="btn btn-primary">Save changes</button> -->
  </div>
  </form>
</div>

<!-- This is the modal for renaming a portal -->
<div id="renameportalModal" class="modal hide" tabindex="-1"
          role="dialog" aria-labelledby="myModalLabel">
  <form id="renameportalForm" method="post"
         action="/CodeIgniter/adminSTAMPS/post/renameportal/<?php echo $portal.'/'.$location.'/'.$title;?>">
<div class="modal-header">
 <button type="button" class="close" data-dismiss="modal"></button>
<h3 id="myModalLabel">Rename this Page</h3>
<p>New page name</p>
<?php echo '<input  id="renameportalname" name="renameportalname" type="text">'?>
</div>
<div class="modal-body">
    <p>Renaming of the portal (old p name will not be available any longer)</p>
</div>
<div class="modal-footer">
   <?php echo '<button class="btn-submit" type="submit" width="13px">Submit</button>';?>
 <!-- <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  <button class="btn btn-primary">Save changes</button> -->
  </div>
  </form>
</div>

<!-- New document -->




</body>


<script type="text/javascript" src=<?php echo $mathjaxurl?> >
MathJax.Hub.Config({
extensions: ["tex2jax.js","TeX/AMSmath.js","TeX/AMSsymbols.js"],
jax: ["input/TeX", "output/HTML-CSS"],
tex2jax: {
inlineMath: [  ["\\(","\\)"] ],
displayMath: [ ["\\[","\\]"] ]
},
"HTML-CSS": { availableFonts: ["TeX"] }
});
</script>

<!--  Top navigation Menus         -->
<script type="text/javascript">
$(document).ready(function(){
    //$('#nav_inner').toggle();
    // loads the menu using Ajax
    // simple loading no tests
     $('#nav-img').click(function() {
        $('.nav_inner').toggle();
        var h= $('.menu-column').eq(0);
        h1=h.css('height');
        // change to capture highest
        // to refactor later
        $('.menu-column').css('height',h1);
        return false;
    });
    // on click closes hidden menu
    $('.nav_inner').click(function(){
        $(this).toggle();
    });
    $('#nav_inner2').load('/CodeIgniter/js/portals_menu.html');
    $('.nav_inner').load('/CodeIgniter/js/<?php echo "countries_menu.html"?>'); //<!-- change to jquery menu-->
    // load the content for the second menu
   
    // load the countries sidemenu and hide
    $('#sidemenu').load('/CodeIgniter/js/countries_sidemenu.html');
    // opens the new document panel


   
  // we hide the menus by manipulating their heights
  // less problems with css
   $('#nav-img2').<?php echo$nav_button2;?>click(function() {
        $('#nav_inner2').toggle();
        var h= $('.menu-column').eq(0);
        h1=h.css('height');
        // change to capture highest
        // to refactor later
        $('.menu-column').css('height',h1);
        return false;
    });
   // on click closes hidden menu
    $('#nav_inner2').click(function(){
        $(this).toggle();
    });
   

});

        $(document).ready(function(){
            //Examples of how to assign the ColorBox event to elements
            //$("a[rel='example1']").colorbox();
            $("a[rel='example2']").colorbox({transition:"fade"});
            $("a[rel='example1']").colorbox({transition:"none", width:"70%", height:"70%"});
            $("a[rel='example4']").colorbox({slideshow:true});
            $(".single").colorbox({}, function(){
                alert('Howdy, this is an example callback.');
            });
            $(".ajax").colorbox();
            $(".flash").colorbox({href:"http://localhost/CodeIgniter/colorbox/content/flash.html"});
            $(".iframe").colorbox({width:"80%", height:"80%", iframe:true});
            $(".inline").colorbox({width:"50%", inline:true, href:"#inline_example1"});

            //Example of preserving a JavaScript event for inline calls.
            $("#click").click(function(){
                $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
                return false;
            });

    $('.dropdown-menu').find('form').click(function (e) {
        e.stopPropagation();
    });



        });


</script>

</html>
























