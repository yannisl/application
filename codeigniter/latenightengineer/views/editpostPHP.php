<?php 
define('BASEPATH1','../egypt/');
define('ROOT',$_SERVER['SERVER_NAME']);
define('ADMINCONTROLLER','adminPHP');
include_once(BASEPATH1.'define.php');
include_once(BASEPATH1.'table.php'); 
//include_once('menu.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title><?php echo $title;  ?></title>

    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta http-equiv="Content-Language" content="mul" />
    <link rel="Shortcut Icon" href="http://localhost/CodeIgniter/images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="http://localhost/egypt/two_files/general.css" type="text/css" />
    <link rel="stylesheet" href="http://localhost/egypt/screen.css" type="text/css" />
    <link rel="stylesheet" href="http://localhost/egypt/typography.css" type="text/css" />
    <link rel="stylesheet" href="http://localhost/egypt/measures.css" type="text/css" />

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
        #main-edit{font-family:verdana; font-size:13px }
    </style>
</head> 


<body>

<!-- Start: Sidcontainer -->
<div class="container clearfix" style="border-top:3px solid #dd0000;width:1000px">

    <!-- Start: Sidhuvud -->
    <div id="pagehead" style="width:980px;margin-top:0 ">

       
<h1><span style="font-family:georgia;font-weight:bold"><?php echo 'learn&middot;PHP ';?></span>fine code</h1>
 
</div>

        <!-- Start: Sidinneh�ll -->
        <div id="pagecontent" class="clearfix" >
            <!-- Start: Contentrad -->
            <div class="content-row" style="float:right" >
                <!-- Start: Inneh�llsklumn 1 -->
                <div class="span-17" style="margin-left:20px;float:left">


                    <p></p>
                    <label>Title <?php echo $portal ?></label>
  <form method= "post" action="http://localhost/CodeIgniter/adminPHP/post/save/<?php echo $location.'/'.$title?>" >
<input type="hidden" value="<?php echo $portal ?>" name="portal" style="width:98%;font-family:georgia;font-size:18px" />

                    <input type="text" value="<?php echo $title ?>" name="title" style="width:98%;font-family:georgia;font-size:18px" />
                    <textarea id="main-edit" name="content" style="width:98%;height:1000px;"><?php echo $content; ?>
                    </textarea>



                    <input type="submit" name="mysubmit" value="Submit Another Post!" />
                </div>




                <div class="span-7" style="float:left">
                <h2 style="color:#dd0000"><?php echo $message ?></h2>




                <!-- Start: Side 1 -->

                <div class="span-5 clearfix" style="margin:0 0 0 15px;float:left">
                    <!-- Other meta data -->

                    <label>categories</label>
                    <textarea name="category" rows="100" cols="100" style="width:90%;height:200px;font-family:georgia;font-size:12px;text-indent:0" >
<?php echo trim($category) ?>
                    </textarea>


                    <label>Save As </label>
                    <input type="text" value="<?php echo $title ?>" name="save_as" style="width:98%;font-family:georgia;font-size:12px" />

                    <input type="submit" name="mysubmit" value="Save" />



                    <ul class="LHnav" style="margin-left:0px;width:210px">

                        <?php
                        define('GALLERYPATH','');
                        echo '<li><a href="http://localhost/CodeIgniter/'.ADMINCONTROLLER.'/post/save/'.$location.'/'.$title.'">Save</a></li>';
                        echo '<li><a href="http://localhost/CodeIgniter/'.ADMINCONTROLLER.'/post/save/'.$location.'/'.$title.'">Save and Publish</a></li>';
                        echo '<li><a href="'.'http://localhost/CodeIgniter/learnPHP/tutorials/'.$location.'/'.$title.'" >Preview</a></li>';

                        ?>
                    </ul>

                    <input type="submit" name="mysubmit" value="Submit Post!" />

                </div>

                </form>
            </div>


            <div class="curvy" style="border:1px solid #bebebe;width:260px;float:right">
                <p>Add to Menu</p>
                <select name="menus">
                    <option>top</option>
                    <option>sidemenu</option>
                    <option>sitemap</option>
                    <option>other</option>
                </select>
                <br/>
                <select name="cat">
                    <option>Cyprus</option>
                    <option>Qatar</option>
                    <option>Personal</option>
                    <option>Other</option>
                </select><br/>
                <input type="text" value="jQuery/Ajax"/>
            </div>


            <p>Edit Post Template1</p>
        </div>
    </div>

    <div id="pagefooter" style="border:0">
        <span style="font-size:smaller;width:80%;text-align:center">
           test template:editpost
        </span>
        <p class="copyright">Rest of Content &copy; Dr Y.Lazarides</p><p>+46 (0) 738 -19 15 03</p><p>egypt (a) latenightengineer.com</p>
    </div>
    </div>
</div>

</body>
</html>
