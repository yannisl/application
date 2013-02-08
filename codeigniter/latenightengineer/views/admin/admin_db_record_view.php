
<?php 

define('BASEPATH1','../egypt/');
define('ROOT',$_SERVER['SERVER_NAME']);
include_once(BASEPATH1.'define.php');
include_once('menu.php');
?>

{{html: ../CodeIgniter/data/head2.dat}}
<body style="background:#000;margin-top:0">
<!-- Start: Sidcontainer -->
<div class="container clearfix" style="border-top:3px solid #000000;width:1000px">

    <!-- START NAVIGATION -->
    <div style="overflow: hidden; height: 0px;" id="nav">
        <div id="nav_inner">
            <script type="text/javascript">create_menu('null');</script>
            <table cellspaceing="0" style="width: 98%;" border="0" cellpadding="0"><tbody><tr>
                <td class="td" valign="top">
            </table>
        </div>
    </div>

    <div id="nav2" class="clearfix" style="margin-right:0;padding-right:70px">
        <a name="top"></a><a href="javascript:void(0);" onclick="myHeight.toggle();">
        <img src="http://localhost/strings/code_files/nav_toggle.jpg" style="display:block;float:right" title="Toggle Table of Contents" alt="Toggle Table of Contents" border="0" height="44" width="153"></a>
        </a>
    </div>


    <div id="masthead" style="background:#fff;width:100%;padding-left:0;margin-left:0;" >

        <h1><span style="font-family:georgia;weight:bold;color:#000;font-size:36px;padding-left:0.6em">
        <?php //echo ucfirst($location).'&middot; ';?></span><span style="color:#000040"><?php echo $title ?></span></h1>
    </div>
    <!-- END NAVIGATION -->


    <div id="pagehead" style="width:980px;margin-top:0;" class="clearfix">

        <?php showMenu($main_admin_menu) ?>
    </div>
    <!--End Top Menu-->

    <!-- Page Content -->
    <div id="pagecontent" class="clearfix" >





        <div  style="border:1px solid #bebebe width:90%;margin:0 auto" class="clearfix">
            <h3>Manage Your Databases</h3>
            <!-- First Box-->


            {{html: ../CodeIgniter/data/accordion.dat}}
            <!-- Second Box-->


<!-- Third Box-->

            <h4 class="curvy shadow" style="background:#efefef;width:67%;float:left;padding-left:20px;margin-left:20px;border:1px solid #bebebe"><?php echo $title    ?></h4>
            <p class="curvy" style="font-family: Verdana;
               font-size: 13px;width:67%;float:left;margin-left:20px;padding-left:20px;margin-top:0;margin-bottom:2px">You can edit, browse, repair and do many other
            things with your tables in your database.</p>


            <div class="curvy" style="width:67%;float:left;padding-left:20px;margin-left:20px;border:1px solid #eeeeec">

                <?php echo $content;  ?>
            </div>

            <div class="curvy" style="height:auto;width:67%;float:left;padding-left:20px;
                 margin-left:20px;margin-top:3px;border:1px solid #eeeeec">
            

                <div class="curvy" style="font-family: Verdana;
                      font-size: 13px;width:97%;float:left;margin-bottom:2px;">
                   <img src="http://localhost/CodeIgniter/images/icons/database.png"
                         style="float:left;display:block;margin-right:3px;margin-top:13px">

                    <p>You can edit, browse, repair and do many other
                        things with your tables in your database.

                        Cras dictum. <span class="highlight">Pellentesque habitant</span> morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia mauris vel est.

                        Suspendisse eu nisl. Nullam ut libero. {{em: Integer dignissim consequat lectus}} . Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                    </p>
                </div>
                <div  style="font-family: Verdana;
                      font-size: 13px;width:97%;float:left;margin-bottom:2px">
                       <img src="http://localhost/CodeIgniter/images/icons/database.png"
                         style="float:left;display:block;margin-right:3px;margin-top:13px">

                      <p>You can edit, browse, repair and do many other
                    things with your tables in your database.

                    Cras dictum. <span class="highlight">Pellentesque habitant</span> morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia mauris vel est.

                    Suspendisse eu nisl. Nullam ut libero. {{em: Integer dignissim consequat lectus}} . Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                </p>
                </div>
                <div  style="font-family: Verdana;
                      font-size: 13px;width:97%;float:left;margin-bottom:2px">
                       <img src="http://localhost/CodeIgniter/images/icons/database.png"
                         style="float:left;display:block;margin-right:3px;margin-top:13px">

                      <p>You can edit, browse, repair and do many other
                    things with your tables in your database.

                    Cras dictum. <span class="highlight">Pellentesque habitant</span> morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia mauris vel est.

                    Suspendisse eu nisl. Nullam ut libero. {{em: Integer dignissim consequat lectus}} . Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                </p>
                </div>

            </div>
        </div>


    </div>

    <?php include('footer.php');?>
</div>



