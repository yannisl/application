<?php

define('BASEPATH1','../egypt/');
define('ROOT',$_SERVER['SERVER_NAME']);
include_once(BASEPATH1.'define.php');
include_once('menu.php');
?>

{{html: ../CodeIgniter/data/head3.dat}}
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
        $('#sidemenu').load('/CodeIgniter/js/sidemenu.html');
        $.getScript('/CodeIgniter/js/tokens.js');
        $.getScript('/CodeIgniter/js/parse.js');
        $.getScript('/CodeIgniter/js/json2.js');

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

        var blocks=$('.code');
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
    })
    $("#draggable").draggable();
</script>

<body>
<div class="container clearfix" style="background:#fff;border-top:3px solid #000000;width:1000px;margin:0 auto">
    <!-- START NAVIGATION TOP HIDDEN -->
    {{html: ../CodeIgniter/data/hidden_top_menu.php}}
    
    
    <!-- END HIDDEN MENU -->

    
    <!-- TOP NAVIGATION REGION -->
    {{html: ../CodeIgniter/data/masthead.dat}}
    <!-- END NAVIGATION -->
            
    <!-- Page Content -->
    <!-- MAIN CONTAINER CONTAINS ALL BLOCKS JUST ADD DIVS -->
    <div  class="clearfix" style="padding:0;margin:0;border:1px solid #fff">
        <div style="padding-left:20px;padding-right:20px;margin:0 auto;background:#fff" class="clearfix">
            <!-- FIRST BOX -->
            {{html: ../CodeIgniter/data/block-db-menu.php}}
            <!-- Second Box-->

            <!-- Third Box-->
             <div style="width:70%;float:left;padding-left:20px;margin-left:20px;overflow:auto">
            <h2 style="margin-top:0px"><?php echo $article_title ?></h2>
            <p class="description">You can edit, browse, repair and do many other things with your tables in your {{wi:database}}.</p>
            <p>Click links for actions</p>
             <div><?php echo $content;  ?></div>

            </div>

        </div>


    </div>

  {{html: ../CodeIgniter/data/footer.php}}
</div>



