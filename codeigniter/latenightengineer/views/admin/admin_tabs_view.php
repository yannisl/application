<?php 
define('BASEPATH1','../egypt/');
define('ROOT',$_SERVER['SERVER_NAME']);
include_once(BASEPATH1.'define.php');
include_once('menu.php');
?>
{{html: ../CodeIgniter/data/head2.dat}}
<body style="background:#000;margin-top:0;width:99%">
<!-- Start: Sidcontainer -->
<div class="container clearfix" style="border-top:3px solid #000000;width:1000px">

<div style="overflow: hidden;display:none" id="nav" >
    <div id="nav_inner" >
        <script type="text/javascript">create_menu('null');</script>
        <table cellspaceing="0" style="width: 98%;" border="0" cellpadding="0"><tbody><tr>
            <td class="td" valign="top">
        </table>
    </div>
</div>

<div id="nav2" class="clearfix" style="margin-right:0;padding-right:70px;border:0" >
    <a id="toc" href="#">
        <img src="http://localhost/strings/code_files/nav_toggle.jpg" style="display:block;
             float:right" title="Toggle Table of Contents" alt="Toggle Table of Contents" >
    </a>
    <?php //showMenu($main_menu) ?>
</div>



<div id="masthead" style="background:#fff;width:100%;padding-left:0;margin-left:0;" >

    <h1>
        <span style="font-family:georgia;font-weight:bold;color:#000;font-size:36px;padding-left:0.6em">
            <?php //echo ucfirst($location).'&middot; ';?>
        </span>
        <img src="http://localhost/CodeIgniter/images/Brain.gif" width="40px" >
        <span style="color:#000040">
            <?php echo $title ?>
        </span>
    </h1>
</div>
<!-- END NAVIGATION -->


<div id="pagehead" style="width:98%;margin-top:0;" class="clearfix">

    <?php showMenu($main_admin_menu) ?>
    <h4>Thinking Designs</h4>
</div>
<!--End Top Menu-->	

<!-- Page Content -->
<div id="pagecontent" class="clearfix" style="width:98%;border:1px solid #bebebe" >





    <div style="width:98%" class="clearfix">

        <!--sidebar-->
        <div style="width:30%;margin:0 auto;float:left" class="clearfix">


            <div  style="
                  background: #fff;
                  width:99%;float:left" >
                <?php echo $content;  ?>

            </div>




        </div>





        <div id="resizable" style="width:27%;float:left;border:1px dotted #bebebe">
            <h2 style="margin-top:0px"><?php echo $title ?></h2>
            <p class="description">The {{wi:accordion_(GUI)}}</p>
        </div>

        <div id="resizable2" style="width:27%;float:left;border:1px dotted #bebebe">
            <h2 style="margin-top:0px"><?php echo $title ?></h2>
            <p class="description">The {{wi:accordion_(GUI)}}</p>
        </div>

        <div class="draggable" style="width:27%;float:left;border:1px dotted #bebebe">
            <h2 style="margin-top:0px"><?php echo $title ?></h2>
            <p class="description">The {{wi:accordion_(GUI)}}</p>
        </div>

        <div class="draggable" style="width:27%;float:left;border:1px dotted #bebebe">
            <h2 style="margin-top:0px"><?php echo $title ?></h2>
            <p class="description">The {{wi:accordion_(GUI)}}</p>
        </div>

        <div class="draggable" style="width:27%;float:left;border:1px solid #bebebe">
            {{pinnote: test}}
            <textarea style="border:0;font-weight:bold">The {{wi:accordion_(GUI)}}</textarea>
        </div>




        <div  class="draggable" style="width:28%;float:left;border-bottom:1px solid #bebebe;
              background-image:url(http://localhost/CodeIgniter/images/sticky-notes-01.JPG);
              position:relative;left:-100px;top:-300px;">

            <textarea id="hide-show" style="font-family:cursive;width:200px;font-weight:bold;position:relative;left:0px;top:0px;
                      height:230px;padding-left:30px;
                      padding-right:40px;overflow:hidden;

                      border:0;
                      opacity: 0.60;
                      -ms-filter: "alpha(opacity=50)";
                      filter: alpha(opacity=50);
                      zoom: 1;>The {{wi:accordion_(GUI)}}</textarea>

            <div  style="background:#f7f7f7 ;
                  width:98%;float:right;padding:1px;border-bottom:1px solid #f0f0f0"  >
                <a href="#"><img src="http://localhost/CodeIgniter/images/icon/16/096.png" style="display:block;
                                 float:left;border-right:1px solid #f0f0f0" /></a>
                <a id="button-toggle" href="#"><img src="http://localhost/CodeIgniter/images/icon/16/140.png" style="display:block;
                                                    float:right;border-right:1px solid #f0f0f0" /></a>

                <img  src="http://localhost/CodeIgniter/images/icon/16/062.png" style="display:block;float:left" />
            </div>
        </div>


      

    </div>

  <?php include('footer.php');?>


</div>



