
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
    <div id="nav" class="clearfix" style="display:none">
        <div id="nav_inner" >
            <script type="text/javascript">create_menu('null');</script>
            <table cellspaceing="0" style="width: 98%;" border="0" cellpadding="0"><tbody><tr>
                <td class="td" valign="top">
            </table>
        </div>
    </div>

    <div id="nav2" class="clearfix" style="margin-right:0;padding-right:70px">
        <a id="toc" href="#">
        <img src="http://localhost/strings/code_files/nav_toggle.jpg" style="display:block;float:right" title="Toggle Table of Contents" alt="Toggle Table of Contents" border="0" height="44" width="153"></a>
        
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
    <div id="pagecontent" class="clearfix" style="width:98%" >

        <div  style="margin:0 auto" class="clearfix">
            
            <div style="width:26%;float:left" class="draggable">
            
           
            {{html: ../CodeIgniter/data/accordion_02.dat}}
                  

            <!-- Second Box-->
            </div>

<!-- Third Box-->

           

            <div class="content-panel draggable" style="width:65%;font-size:13px;font-family: Verdana;float:left;margin-left:20px;">

                <?php echo $content;  ?>
            </div>

            <div class="curvy draggable" style="height:auto;width:67%;float:left;padding-left:20px;
                 margin-left:20px;margin-top:3px;border:1px solid #eeeeec">
            

                <div class="curvy" style="
                      width:97%;float:left;margin-bottom:2px;">
                   <img src="http://localhost/CodeIgniter/images/icons/database.png"
                         style="float:left;display:block;margin-right:3px;margin-top:13px">

                    <p>You can edit, browse, repair and do many other
                        things with your tables in your database.

                        Cras dictum. <span class="highlight">Pellentesque habitant</span> morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia mauris vel est.

                        Suspendisse eu nisl. Nullam ut libero. {{em: Integer dignissim consequat lectus}} . Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                    </p>
                </div>
                <div  style="
                      width:97%;float:left;margin-bottom:2px">
                       <img src="http://localhost/CodeIgniter/images/icons/database.png"
                         style="float:left;display:block;margin-right:3px;margin-top:13px">

                      <p>You can edit, browse, repair and do many other
                    things with your tables in your database.

                    Cras dictum. <span class="highlight">Pellentesque habitant</span> morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia mauris vel est.

                    Suspendisse eu nisl. Nullam ut libero. {{em: Integer dignissim consequat lectus}} . Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                </p>
                </div>
                
            </div>
<div class="puff-container" style="width:925px;margin:0 auto" >
 <div class="puff-container" style="width:185px;float:left">
                 <div class="puff-top">
                   <div class="puff-sides">
                       <div class="puff-padding"><div class="clear-simple padding-top-3"></div>
                           <h3 class="section-heading link-666 " target="_top">SIR PETER STOTHARD</h3>

                           <div class="clear-simple padding-top-3"></div>
                           <div class="clear-simple padding-top-3"></div>
                           <div class="padding-bottom-5">
                               <a href="http://timescolumns.typepad.com/stothard">
                               <img src="http://localhost/CodeIgniter/images/options.jpg" alt="Sir Peter Stothard" style="width:160px"></img>
                               </a>
                           </div>
                           <p class="small">The latest posts on books, people and politics from the Editor of the TLS</p>
                           <ul class="chevron-list chevron-blue padding-top-5 padding-bottom-5 link-666 clearfix" style="padding-left:0px;">
                               <li class="chevron-list"><a href="" >uno</a></li>
                               <li class="chevron-list"><a href="" >duo</a></li>
                               <li class="chevron-list"><a href="" >trio</a></li>

                           </ul>
                       </div>
                   </div>
               </div>
           </div>



            <div class="puff-container" style="width:185px;float:left"><div class="puff-top">
                   <div class="puff-sides">
                       <div class="puff-padding"><div class="clear-simple padding-top-3"></div>
                           <h3 class="section-heading link-666 " target="_top">SIR PETER STOTHARD</h3>

                           <div class="clear-simple padding-top-3"></div>
                           <div class="clear-simple padding-top-3"></div>
                           <div class="padding-bottom-5">
                               <a href="http://timescolumns.typepad.com/stothard">
                               <img src="http://localhost/CodeIgniter/images/options.jpg" alt="Sir Peter Stothard" style="width:160px"></img>
                               </a>
                           </div>
                           <p class="small">The latest posts on books, people and politics from the Editor of the TLS</p>
                           <ul class="chevron-list chevron-blue padding-top-5 padding-bottom-5 link-666 clearfix" style="padding-left:0px;">
                               <li class="chevron-list"><a href="" >uno</a></li>
                               <li class="chevron-list"><a href="" >duo</a></li>
                               <li class="chevron-list"><a href="" >trio</a></li>

                           </ul>
                       </div>
                   </div>
               </div>
           </div>

           <div class="puff-container" style="width:185px;float:left"><div class="puff-top">
                   <div class="puff-sides">
                       <div class="puff-padding"><div class="clear-simple padding-top-3"></div>
                           <h3 class="section-heading link-666 " target="_top">SIR PETER STOTHARD</h3>

                           <div class="clear-simple padding-top-3"></div>
                           <div class="clear-simple padding-top-3"></div>
                           <div class="padding-bottom-5">
                               <a href="http://timescolumns.typepad.com/stothard">
                               <img src="http://localhost/CodeIgniter/images/options.jpg" alt="Sir Peter Stothard" style="width:160px"></img>
                               </a>
                           </div>
                           <p class="small">The latest posts on books, people and politics from the Editor of the TLS</p>
                           <ul class="chevron-list chevron-blue padding-top-5 padding-bottom-5 link-666 clearfix" style="padding-left:0px;">
                               <li class="chevron-list"><a href="" >uno</a></li>
                               <li class="chevron-list"><a href="" >duo</a></li>
                               <li class="chevron-list"><a href="" >trio</a></li>

                           </ul>
                       </div>
                   </div>
               </div>
           </div>
           <div class="puff-container" style="width:185px;float:left"><div class="puff-top">
                   <div class="puff-sides">
                       <div class="puff-padding"><div class="clear-simple padding-top-3"></div>
                           <h3 class="section-heading link-666 " target="_top">SIR PETER STOTHARD</h3>

                           <div class="clear-simple padding-top-3"></div>
                           <div class="clear-simple padding-top-3"></div>
                           <div class="padding-bottom-5">
                               <a href="http://timescolumns.typepad.com/stothard">
                               <img src="http://localhost/CodeIgniter/images/options.jpg" alt="Sir Peter Stothard" style="width:160px"></img>
                               </a>
                           </div>
                           <p class="small">The latest posts on books, people and politics from the Editor of the TLS</p>
                           <ul class="chevron-list chevron-blue padding-top-5 padding-bottom-5 link-666 clearfix" style="padding-left:0px;">
                               <li class="chevron-list"><a href="" >uno</a></li>
                               <li class="chevron-list"><a href="" >duo</a></li>
                               <li class="chevron-list"><a href="" >trio</a></li>

                           </ul>
                       </div>
                   </div>
               </div>
           </div>

        </div>

        <div class="puff-container draggable" style="width:185px;float:left"><div class="puff-top">
                   <div class="puff-sides">
                       <div class="puff-padding"><div class="clear-simple padding-top-3"></div>
                           <h3 class="section-heading link-666 " target="_top">SIR PETER STOTHARD</h3>

                           <div class="clear-simple padding-top-3"></div>
                           <div class="clear-simple padding-top-3"></div>
                           <div class="padding-bottom-5">
                               <a href="http://timescolumns.typepad.com/stothard">
                               <img src="http://localhost/CodeIgniter/images/options.jpg" alt="Sir Peter Stothard" style="width:160px"></img>
                               </a>
                           </div>
                           <p class="small">The latest posts on books, people and politics from the Editor of the TLS</p>
                           <ul class="chevron-list chevron-blue padding-top-5 padding-bottom-5 link-666 clearfix" style="padding-left:0px;">
                               <li class="chevron-list"><a href="" >uno</a></li>
                               <li class="chevron-list"><a href="" >duo</a></li>
                               <li class="chevron-list"><a href="" >trio</a></li>

                           </ul>
                       </div>
                   </div>
               </div>
           </div>

 </div>




</div>
    <?php include('footer.php');?>
</div>



