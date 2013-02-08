
<?php 

define('FOUR','http://localhost/egypt/');
include_once('define.php');
// include_once('table.php');
include_once('menu.php');
// include_once('markdown.php');

define('GALLERYPATH','../egypt/'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title><?php echo $title;  ?></title>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
    <!--<meta http-equiv="Content-Language" content="mul" />-->
    <link rel="Shortcut Icon" href="http://localhost/CodeIgniter/images/favicon.ico" type="image/x-icon" />
    <!--revised -->
    <link rel="stylesheet" type="text/css" media="all" href="/codeigniter/css/userguide.css">
    <!--
<link rel="stylesheet" href="http://localhost/CodeIgniter/css/general.css" type="text/css" />
    reviewed  and removed combined with typography-->
    <link rel="stylesheet" href="http://localhost/CodeIgniter/css/screen.css" type="text/css" />


    <link rel="stylesheet" href="http://localhost/CodeIgniter/css/typography.css" type="text/css" />
    <!--   <link type="text/css" href="http://localhost/CodeIgniter/css/smoothness/jquery-ui-1.7.1.custom.css" rel="Stylesheet" />-->
    <link type="text/css" href="http://localhost/CodeIgniter/css/measures.css" rel="Stylesheet" />

    <link type="text/css" media="screen" rel="stylesheet" href="/CodeIgniter/colorbox/example1/colorbox.css" />




    <!--    <script type="text/javascript" defer="true" src="http://localhost/codeIgniter/js/jslint.js" id="scriptjsLint" class="scriptjsLint" charset="utf-8"></script>



<!--    <script type="text/javascript" src="http://localhost/CodeIgniter/js/jquery.ajaxContent.js"></script>
<script type="text/javascript" src="http://localhost/CodeIgniter/js/jquery.form.js" />-->
<!--   <script type="text/javascript" src="http://localhost/CodeIgniter/js/ajax.js"></script>-->
<!--   <script defer="true" type="text/javascript" src="http://localhost/codeigniter/js/formatter.js" ></script>


<!--<script defer="true" type="text/javaScript" src="http://localhost/CodeIgniter/js/prototype_part2.js"></script>-->

    <!-- best way -->
    <script type="text/javascript" src="http://localhost/CodeIgniter/js/jquery-1.3.2.min.js"></script>
    <!-- <script type="text/javascript" src="http://localhost/CodeIgniter/js/jquery-ui-1.7.1.custom.min.js"></script>-->
<!--   <script type="text/javascript" src="http://localhost/CodeIgniter/js/goog/base.js"></script>
<script type="text/javascript" src="http://localhost/CodeIgniter/js/goog/deps.js"></script>
<script type="text/javascript" src="http://localhost/CodeIgniter/js/goog/dom/annotate.js"></script>
    -->
    <script type="text/javascript" src="http://localhost/CodeIgniter/colorbox/colorbox/jquery.colorbox.js"></script>
    <script type="text/javascript" src="http://localhost/CodeIgniter/js/timeout.js"></script>


    <meta name="author" content="Y Lazarides" />
    <meta name="copyright" content="Dr Y Lazarides" />
    <meta name="robots" content="all" />
    <meta name="imagetoolbar" content="no" />
    <meta name="keywords" content="<?php //echo $keywords;    ?>" />
    <meta name="description" content="An automatic website builder" />





    <style type="text/css">
        .country {color:#fff;background:rgb(192,67,67);padding:1px}
        .country a:link,.country a:hover,.country a:visited{color:#fff}
        .closure {color:#fff;background:rgb(188,29,29);padding:1px}
        .closure a:link,.closure a:hover,.closure a:visited{color:#fff}
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
        p {font-size:14px;font-family:arial;}
        div#pagehead ul#menu li.active{
            background-color:#fafafa;}
        div#pagehead ul#menu li.active a:link{color:#666}

        div#pagehead ul#menu li.active a:visited{color:#666}
        div#pagehead ul#menu li.active a:hover{color:#fff}
        img.image-large{width:100%;display:block;margin:0;}
        img.image-small{width:90%;margin-left:15px;}
        #author-bio{padding:15px;color:#fff;}
        #author-bio h1,#author-bio h2{color:#999;}

    }
}
    </style>
    <script>
        //this is the only function that is used to toggle the top menu
        //plenty others can be used like this
        //essentially all the info boxes in order not
        //to clutter pages
        $(document).ready(function(){
            //$('#nav_inner').toggle();
            // loads the menu using Ajax
            // simple loading no tests
            $('#nav_inner').load('/CodeIgniter/js/jquery_menu.html');
            //TODO
            //  $('#sidemenu1').load('/CodeIgniter/js/sidemenu-gallery.html');
            /*    $.getScript('/CodeIgniter/js/tokens.js');
$.getScript('/CodeIgniter/js/parse.js');
$.getScript('/CodeIgniter/js/json2.js');
             */
            $('#nav-img').click(function() {
                $('#nav_inner').toggle();
                var h= $('.menu-column').eq(0);
                h1=h.css('height');
                // change to capture highest
                // to refactor later
                $('.menu-column').css('height',h1);
                return false;
            });
            // on click closes hidden menu
            $('#nav_inner').click(function(){
                $(this).toggle();
            });

            $('#subheading').live('click',function(){
                $('#subheading1').toggle();
            });

            /*      var blocks=$('.code');
function highL(){

//alert(blocks.length);
for (var j=0;j<blocks.length;j++){
var anId='js'+j;
//   alert(anId);
goog.dom.setProperties(blocks[j],{'id': 'js' + j});
// alert('js'+j);
}
}


highL();
for(var i=0;i<blocks.length;i++){

anId='js'+i;
// alert($('#'+anId).text());
tinyHighlighter({automaticSelector:anId});
}
var options = {
automatic: true,
automaticSelector: "js" + 0,
lineNumbers: false,
zebraLines: false,
recipeLoading: true,
cssFolder: "",
// if not in recipes folder
highLights: ['test'] // a list of words to be highlighted
// within the code
}
//$.tinyHighlighter(options);
//
             */

        })
        //end document ready




        $(document).ready(function(){
            //Examples of how to assign the ColorBox event to elements
            $("a[rel='example1']").colorbox();
            $("a[rel='example2']").colorbox({transition:"fade"});
            $("a[rel='example3']").colorbox({transition:"none", width:"80%", height:"60%"});
            $("a[rel='example4']").colorbox({slideshow:true});


            //Example of preserving a JavaScript event for inline calls.
            $("#click").click(function(){
                $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
                return false;
            });
        });




    </script>


</head>

<body>
    <div class="container clearfix" style="border-top:3px solid #000000;width:1000px;margin:0 auto;background:#fafafa">
        <!-- START NAVIGATION TOP HIDDEN -->
        <div id="nav">
            <div id="nav_inner" class="clearfix nopad hidden">
                <!-- hidden menu goes here -->
            </div>

        </div>
        <!-- end hidden menu -->

        <div id="nav2" class="clearfix" style="margin-right:0;padding-right:70px;">
            <a id="nav-img" href="#"><img  src= "http://localhost/strings/code_files/nav_toggle.jpg"
                                               style="display:block;float:right" title  "Toggle Table of Contents" alt="Toggle Table of Contents" border="0" />
                                           </a>


        </div>



        <div class="masthead" style="background:#fff;width:100%;padding-left:0;margin-left:0;border-bottom:0">
            <div id="pagehead" style="margin-bottom:0;height:60px;width:95%;margin-top:0px;padding-top:15px">
                <h1 style="width:56%;margin-top:0;padding:0;padding-left:0">
                    <span style="background-color:rgb(255,255,248);font-family:arial;color:rgb(188,188,188);
                          font-size:36px;line-height:1.3;padding:10px">
                photoSnaps<sup style="font-size:12px">&copy;</sup>&nbsp;&nbsp;&nbsp;</span></h1>
                <ul id="menu" style="background-image:url(/codeigniter/images/icons/assets/nav_bg.gif);">
                    <li class="active">
                    <a  href="http://127.0.0.1/CodeIgniter/index.php/Blogs/tutorials/blog/home">Home</a></li>
                    <li class="active" style="background-color:rgb(188,29,29);">
                    <a style="color:#fff" href="http://127.0.0.1/CodeIgniter/index.php/Blogs/tutorials/jQuery/Introduction">Notes</a></li>

                    <!--  <li class="active" style="background-color:rgb(206,123,0)"><a href="http://127.0.0.1/CodeIgniter/index.php/Blogs/excerpt">Archive</a></li>-->
                    <li class="active"><a href="//localhost/CodeIgniter/blogs/gallery/jack-ratcliffe/1">Galleries</a></li>
                    <!--    <li class="active"><a href="http://localhost/CodeIgniter/upload/">Upload</a></li>-->
                    <li class="active" ><a  href="http://localhost/CodeIgniter/blogs/stamps/general/introduction/">Blog</a></li>
                    <!--   <li class="active"><a href="http://localhost/CodeIgniter/admin/">Admin</a></li>-->
                    <li class="active"><a href="http://www.bjornblomquist.com/contact.html">Contact</a></li>
                    <li class="active"><a href="//localhost/CodeIgniter/auth/login/">Login</a></li>
                </ul>
            </div>


        </div>

        <!-- END NAVIGATION -->
        <div id="pagehead" style="width:980px;margin-top:0;background:#fff url(/codeigniter/images/spacer.jpg)no-repeat;color:#fff">

        </div>

        <!-- Start: Side 1 -->
        <div id="pagecontent" class="clearfix" style="width:980px;background:#fff;">
            <!-- Start: Contentrad -->
            <!--ALL PAGE -->
            <div class="content-row clearfix" style="background:#fff;padding-top:0;margin:0" >
                <!-- Start: Inneh�llsklumn 1 -->
                <div class="span-7 clearfix" style="padding-top:0;background:#fff">
                    <div style="color:#fff"><?php echo count($imgs_small);?></div>
                    <h3 style="color:rgb(188,29,29);
                        padding-left:20px;
                        background:#fff;" >

                        Eugenio Rencuenco Gallery 5
                    </h3>
                    <div id="side-promo" style="background:#fff;padding-top:25px">
                        <?php
                        //$limit=count($imgs_small);

                        if ($page<count($imgs_small)){
                            echo $imgs_small[$page-1]; // caters for zero

                        }

                        if ($page<count($imgs_small)-1){
                            echo $imgs_small[$page];   // next image
                            echo $imgs_small[$page+1];   //second image check
                        }
                        else
                        {
                            // equal
                            echo $imgs_small[11];
                        }
                        ?>
                    </div>




                    <div class="span-5 clearfix" style="margin:0 0 0 15px">
                        <ul id="LHnav" style="margin-left:0px;width:210px">
                            <!--Main side Menu -->
                            <div id="sidemenu"></div>


                        </ul>

                    </div>

                </div>


                <!-- Start: Side 2 -->
                <div class="span-17" style="background:#000;color:#fff;">
                    <div style="background:rgb(0,0,0);color:#fff;width:98%">
                        <!-- NEXT -->
                        <div class="clearfix" style="padding-bottom:5px;padding-left:7px;padding-right:7px">

                            <?php if ($page<=1){$previous=1;}else{$previous=$page-1;

                                echo'<a href="';
                                echo $previous.'">';
                                echo '<img src="http://localhost/egypt/previous.gif" style="float:left;margin-top:10px" /></a>';}?>


                            <?php
                            // on equa1 does not show
                            if ($page+1>count($imgs_small)){$next=count($imgs_small);}else{$next=$page+1;
                                echo '<a href="';
                                echo ($next).'">';
                                echo '<img src="http://localhost/egypt/next.gif" style="float:right;clear:right;margin-top:10px" /></a>';}
                            ?>
                        </div>





                        <div class="clearfix" style="padding-bottom:3px;padding-left:7px;padding-right:7px">
                            <img src="http://localhost/egypt/photography.gif" style="float:left;margin-top:10px" />
                            <span style="color:#fff;font-family:verdana;font-size:13px;text-transform:uppercase;float:left;margin-top:3px"> | <?php echo ucfirst($gallery) ?></span>
                            <?php
                            //main image
                            ?>
                            <div style="float:right">
                                <img src="http://localhost/egypt/PAGE.gif" />
                                <span style="color:#fff;font-size:13px;font-weight:400;font-family:verdana">
                                    <?php echo $page;?> OF <?php  echo count($imgs);?>
                                </span>
                            </div>
                        </div>
                        <?php
                        //Main image display need to change for portrait galleries
                        echo $imgs[$page-1];
                        ?>

                        <!-- NEXT -->
                        <div class="clearfix" style="padding-bottom:13px;padding-left:7px;padding-right:7px">

                            <?php if ($page<=1){$previous=1;}else{$previous=$page-1;
                                echo'<a href="';
                                echo $previous.'">';
                                echo '<img src="'.FOUR.'/previous.gif" style="float:left;margin-top:10px" /></a>';}?>


                            <?php
                            if ($page+1>count($imgs_small)){$next=count($imgs_small);}else{$next=$page+1;
                                echo '<a href="';
                                echo ($next).'">';
                                echo '<img src="'.FOUR.'/next.gif" style="float:right;clear:right;margin-top:10px" /></a>';}?>

                            <img src="http://localhost/egypt/photography_gallery.gif" style="float:right;;margin-top:4px;clear:both" />

                        </div>

                        <!-- END NEXT-->
                        <div style="clear:both"></div>

                    </div>

                    <div id="author-bio" style="padding:15px">
                        <?php if ($post=@file_get_contents($path.'/data.php')) {
                            //echo_array($m);
                            echo markdown($post);

                        }?>
                    </div>

                </div>



                <div class="clearfix" style="background:#fff;color:#666;float:left;margin-top:20px">
                    <div class="span-5" style="float:left;margin-left:20px">
                        <ul id="LHnav" class="span-5">
                            <?php
                            echo '<h3 style="margin-bottom:5px">Eugenio Recuenco </h3>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/eugenio-01/1" >Eugenio Recuenco Gallery 1</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/eugenio-02/1" >Eugenio Recuenco Gallery 2</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/eugenio-03/1" >Eugenio Recuenco Gallery 3</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/eugenio-04/1" >Eugenio Recuenco Gallery 4</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/eugenio-05/1" >Eugenio Recuenco Gallery 5</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/eugenio-06/1">Eugenio Recuenco Gallery 6</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/eugenio-07/1">Eugenio Recuenco Gallery 7</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/eugenio-08/1">Eugenio Recuenco Gallery 8</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/eugenio-09/1">Eugenio Recuenco Gallery 9</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/eugenio-010/1">Eugenio Recuenco Gallery 10</a></li>';

                            ?>
                        </ul>
                        <?php echo $imgs_random[0]; ?>
                    </div>
                    <div class="span-5" style="float:left;margin-left:20px">
                        <ul id="LHnav" class="span-5">
                            <?php
                            echo '<h3 style="margin-bottom:5px">Eugenio Recuenco </h3>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/eugenio-011/1" >Eugenio Recuenco Gallery 11</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/eugenio-012/1" >Eugenio Recuenco Gallery 12</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/eugenio-013/1" >Eugenio Recuenco Gallery 13</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/eugenio-014/1" >Eugenio Recuenco Gallery 14</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/eugenio-015/1" >Eugenio Recuenco Gallery 15</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/eugenio-016/1">Eugenio Recuenco Gallery 16</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/eugenio-017/1">Eugenio Recuenco Gallery 17</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/eugenio-018/1">Eugenio Recuenco Gallery 18</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/eugenio-019/1">Eugenio Recuenco Gallery 19</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/eugenio-020/1">Eugenio Recuenco Gallery 20</a></li>';

                            ?>
                        </ul>
                        <?php echo $imgs_random[1]; ?>
                    </div>





                    <div class="span-5" style="float:left;margin-left:20px">
                        <ul id="LHnav" class="span-5">
                            <?php
                            echo '<h3 style="margin-bottom:5px">Commercial</h3>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/miles-aldridge/1">Miles Aldridge</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/pin-up-art/100" >Olivia Berardinis</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/bruno-dayan-01/1" >Bruno Dayan Gallery 1</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/bruno-dayan-02/1" >Bruno Dayan Gallery 2</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/bruno-dayan-03/1" >Bruno Dayan Gallery 3</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/bruno-dayan-04/1" >Bruno Dayan Gallery 4</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/paolo-zambalti-01/1" >Paolo Zambalti 1</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/paolo-zambalti-02/1" >Paolo Zambalti 2</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/paolo-zambalti-03/1" >Paolo Zambalti 3</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/paolo-zambalti-04/1" >Paolo Zambalti 4</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/paolo-zambalti-05/1" >Paolo Zambalti 5</a></li>';

                            ?>
                        </ul>
                        <?php echo $imgs_random[2]; ?>
                    </div>



                    <div class="span-5 clearfix" style="float:left;margin-left:20px">
                        <ul id="LHnav" class="span-5" >
                            <?php
                            echo '<h3 style="margin-bottom:5px">Classic Masters</h3>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/Louis-Hine/1">Louis Hine</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/dorothea-lange/1">Dorothea de Lange</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/august-sander/1">August Sander</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/rondal-partidge/1">Rondal Partidge</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/imogen-cunningham/1">Imogen Cunningham</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/elliott-erwitt/1">Elliott Erwitt</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/peter-turnley/1">Peter Turnley</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/rodney-smith/1">Rodney Smith</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/che-guevara/1">Magnum Photographers</a></li>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/helen-levitt/1">Helen Levitt</a></li>';
 echo '<li><a href="http://localhost/codeigniter/blogs/gallery/marc-riboud/1">Marc Riboud</a></li>';
echo '<li><a href="http://localhost/codeigniter/blogs/gallery/mapplethorpe/3">Robert Mapplethorpe</a></li>';?>

<?php echo $imgs_random[3]; ?>

                        </ul>
                       
                    </div>


                </div>


                <div class="clearfix" style="background:#fff;color:#666;float:left;margin-top:20px">
                    <div class="span-5" style="float:left;margin-left:20px">
                        <ul id="LHnav" class="span-5">
                            <?php
                            echo '<h3 style="margin-bottom:5px">Jose Aragon </h3>';
 echo'<li><a href="http://localhost/codeigniter/blogs/gallery/jose-aragon-01/1">Jose Aragon Gallery 1</a></li>';
 echo'<li><a href="http://localhost/codeigniter/blogs/gallery/jose-aragon-02/1">Jose Aragon Gallery 2</a></li>';
 echo'<li><a href="http://localhost/codeigniter/blogs/gallery/jose-aragon-03/1">Jose Aragon Gallery 3</a></li>';
 echo'<li><a href="http://localhost/codeigniter/blogs/gallery/jose-aragon-04/1">Jose Aragon Gallery 4</a></li>';

                            ?>
                        </ul>
                        <?php echo $imgs_random[0]; ?>
                    </div>


                    <div class="span-5" style="float:left;margin-left:20px">
                        <ul id="LHnav" class="span-5">
                            <?php
           echo '<h3 style="margin-bottom:5px">Aneta Kowalczyk</h3>';
           echo'<li><a href="http://localhost/codeigniter/blogs/gallery/aneta-kowalczyk/1">Aneta Kowalczyk Gallery 1</a></li>';
 echo'<li><a href="http://localhost/codeigniter/blogs/gallery/aneta-kowalczyk-01/1">Aneta Kowalczyk Gallery 2</a></li>';
 echo'<li><a href="http://localhost/codeigniter/blogs/gallery/aneta-kowalczyk-02/1">Aneta Kowalczyk Gallery 3</a></li>';
 




       ?>
                        </ul>
                        <?php echo $imgs_random[1]; ?>
                    </div>





                    <div class="span-5" style="float:left;margin-left:20px">
                        <ul id="LHnav" class="span-5">
                            <?php
                            echo '<h3 style="margin-bottom:5px">Nazif Topcuoglu</h3>';
                            echo '<li><a href="http://localhost/CodeIgniter/blogs/gallery/nazif-01/1">Nazif Gallery 1</a></li>';
echo '<li><a href="http://localhost/CodeIgniter/blogs/gallery/nazif-02/1">Nazif Topcuoglu Gallery 2</a></li>';
echo '<li><a href="http://localhost/CodeIgniter/blogs/gallery/nazif-03/1">Nazif Gallery 3</a></li>';
                           

                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/pin-up-art/100" >Olivia Berardinis</a></li>';
                            
                            ?>
                        </ul>
                        <?php echo $imgs_random[2]; ?>
                    </div>



                    <div class="span-5 clearfix" style="float:left;margin-left:20px">
                        <ul id="LHnav" class="span-5" >
                            <?php
                            echo '<h3 style="margin-bottom:5px">Milen Lesemann</h3>';
                            echo '<li><a href="http://localhost/codeigniter/blogs/gallery/milen-lesemann-01/1">Milen Lesemann Gallery 1</a></li>';
                           echo '<li><a href="http://localhost/codeigniter/blogs/gallery/milen-lesemann-02/1">Milen Lesemann Gallery 2</a></li>';
                     echo '<li><a href="http://localhost/codeigniter/blogs/gallery/milen-lesemann/1">Milen Lesemann Gallery 3</a></li>';
                                      
                            
                            ?>
                            
                        </ul>
                     <?php echo $imgs_random[3]; ?>
                    </div>


                </div>



                <div class="clearfix" style="background:#fff;color:#666;float:left;margin-top:20px">
                    <div class="span-5" style="float:left;margin-left:20px">
                        <ul id="LHnav" class="span-5">
                            <?php
                            echo '<h3 style="margin-bottom:5px">Jody Rogan </h3>';
 echo'<li><a href="http://localhost/codeigniter/blogs/gallery/jody-rogan/1">Jody Rogan - Dream Catcher</a></li>';
 echo'<li><a href="http://localhost/codeigniter/blogs/gallery/jody-rogan-01/1">Jody Rogan - Khan Lee (fashion)</a></li>';

                            ?>
                        </ul>
                        <?php echo $imgs_random[0]; ?>
                    </div>


                    <div class="span-5" style="float:left;margin-left:20px">
                        <ul id="LHnav" class="span-5">
                            <?php
           echo '<h3 style="margin-bottom:5px">Allan Amato</h3>';
   echo'<li><a href="http://localhost/codeigniter/blogs/gallery/amato-01/1">Allan Amato (Portraits)</a></li>';


       ?>
                        </ul>
                        <?php echo $imgs_random[1]; ?>
                    </div>





                    <div class="span-5" style="float:left;margin-left:20px">
                        <ul id="LHnav" class="span-5">
                            <?php
                            echo '<h3 style="margin-bottom:5px">Akif Hakan Celebi</h3>';
  echo'<li><a href="http://localhost/codeigniter/blogs/gallery/hakan/17">Akif Hakan Celebi</a></li>';
                            ?>
                        </ul>
                        <?php echo $imgs_random[2]; ?>
                    </div>



                    <div class="span-5 clearfix" style="float:left;margin-left:20px">
                        <ul id="LHnav" class="span-5" >
                            <?php
                            echo '<h3 style="margin-bottom:5px">Ilan Hamra</h3>';
          echo'<li><a href="http://localhost/codeigniter/blogs/gallery/ilan-hamra/1">Ilan Hamra</a></li>';
                            ?>

                        </ul>
                     <?php echo $imgs_random[3]; ?>
                    </div>


                </div>

                





            </div>


            <!-- Start: footer -->
            <div style="margin-top:0;padding-left:70px;padding-right:100px;padding-top:30px;padding-bottom:30px;
                 background:#fff url(/codeigniter/images/spacer-bottom.jpg) no-repeat;">
                <?php
                echo $pagination;
                ?>



                <p style="font-size:11px;width:98%;text-align:center">

                    This site does not claim ownership of any of the pictures displayed in this gallery.
                    The tag is there only to show that the picture was originally posted here or scanned or capped exclusively for this site. All pictures are copyright to their respective owner. No infringement intended. We believe we are using these images for fan purposes only, within the laws of the Fair Use Copyright Law 107. However, if you are unhappy with our usage of pictures that belong to you, please contact us and we will remove the image(s) immediately. We will always co-operate, there is no need to threaten us. Please, credit the site when reposting the images you found in this gallery.
                    And download pictures for private usage only!
                    Rest of Content &copy; Dr Y.Lazarides +46 (0) 738 -19 15 03 egypt (a) latenightengineer.com
                </p>
                <p style="float:none;margin:0 auto;font-size:11px;text-align:center">Data Policy |
                    Accessibility | Contact Info | Privacy Policy |
                Copyright</p>

            </div>
            <div id="footer-promo" style="width:100%;margin:0 auto"><?php echo $imgs[$page-1];?></div>

        </div>

    </div>

</body>
<!--   <?php echo $imgs_random[3];
                        foreach($image_names as $name){
                            echo $name.' ';
                        }?>-->
