
<?php 

define('BASEPATH1','../egypt/');
define('ROOT',$_SERVER['SERVER_NAME']);
include_once(BASEPATH1.'define.php');
include_once('menu.php');
?>

{{html: ../CodeIgniter/data/head2.dat}}
<body style="background:#ececec;margin-top:0;border-top:8px solid #c58325">
<!-- Start: Sidcontainer -->
<div class="container clearfix" style="width:1000px">

    <!-- START NAVIGATION -->
    <div id="nav" class="clearfix" style="display:none">
        <div id="nav_inner" >
            <script type="text/javascript">create_menu('null');</script>
            <table cellspaceing="0" style="width: 98%;" border="0" cellpadding="0"><tbody><tr>
                <td class="td" valign="top">
            </table>
        </div>
    </div>

    <div id="nav2" class="clearfix" style="margin-right:0;margin-bottom:0;padding-right:70px;">
       <a id="toc" href="#">
      <img src="http://localhost/strings/code_files/nav_toggle.jpg" style="display:block;float:right" title="Toggle Table of Contents" alt="Toggle Table of Contents" border="0" height="44" width="153">
       </a>
   
    </div>


    <div id="masthead" style="width:100%;padding-left:0;margin-left:0;border-bottom:0;background:#fff" >

        <h1><span style="font-family:georgia;font-weight:bold;color:#000;font-size:36px;padding-left:0.6em">
        <?php //echo ucfirst($location).'&middot; ';?>
        </span><span style="color:#000040">
        <?php echo $title ?></span></h1>
    </div>
    <!-- END NAVIGATION -->


    <div id="pagehead" style="width:980px;margin:0;" class="clearfix">
        <?php showMenu($main_admin_menu) ?>
    </div>
    <!--End Top Menu-->

    <!-- Page Content -->
    <div id="pagecontent" class="clearfix" style="width:100%;background:#ececec;padding:0;margin:0" >

        <div  style="margin:0 auto" class="clearfix">


            <?php echo $content;  ?>

           






        </div>
        <?php include('footer2.php');?>
    </div>
</div>


