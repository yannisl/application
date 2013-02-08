<?php 
//define('BASEPATH1','../egypt/');
//define('ROOT',$_SERVER['SERVER_NAME']);
//include_once(BASEPATH1.'define.php');
//include_once(BASEPATH1.'table.php'); 
//include_once('menu.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title><?php echo $title;  ?></title>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />

        <meta http-equiv="Content-Language" content="mul" />
        <link rel="Shortcut Icon" href="http://localhost/CodeIgniter/images/favicon.ico" type="image/x-icon" />
        <!--revised -->
        <link rel="stylesheet" type="text/css" media="all" href="/codeigniter/css/userguide.css" />
        <!--
<link rel="stylesheet" href="http://localhost/CodeIgniter/css/general.css" type="text/css" />
        reviewed  and removed combined with typography-->
        <link rel="stylesheet" href="http://localhost/CodeIgniter/css/screen.css" type="text/css" />


        <link rel="stylesheet" href="http://localhost/CodeIgniter/css/typography.css" type="text/css" />
        <link type="text/css" href="http://localhost/CodeIgniter/css/smoothness/jquery-ui-1.7.1.custom.css" rel="Stylesheet" />
        <link type="text/css" href="http://localhost/CodeIgniter/css/measures.css" rel="Stylesheet" />






        <script type="text/javascript"  src="http://localhost/codeIgniter/js/jslint.js" id="scriptjsLint" charset="utf-8">
        </script>



        <!--    <script type="text/javascript" src="http://localhost/CodeIgniter/js/jquery.ajaxContent.js"></script>
<script type="text/javascript" src="http://localhost/CodeIgniter/js/jquery.form.js" />-->
        <!--   <script type="text/javascript" src="http://localhost/CodeIgniter/js/ajax.js"></script>-->
        <script  type="text/javascript" src="http://localhost/codeigniter/js/formatter.js" ></script>


        <!--<script defer="true" type="text/javaScript" src="http://localhost/CodeIgniter/js/prototype_part2.js"></script>-->

        <!-- best way -->
        <script type="text/javascript" src="http://localhost/CodeIgniter/js/jquery-1.3.2.min.js"></script>
        <!--<script src="http://code.jquery.com/jquery-1.4a2.js"></script>-->
        <script type="text/javascript" src="http://localhost/CodeIgniter/js/jquery-ui-1.7.1.custom.min.js"></script>
        <script type="text/javascript" src="http://localhost/CodeIgniter/js/goog/base.js"></script>
        <script type="text/javascript" src="http://localhost/CodeIgniter/js/goog/deps.js"></script>
        <script type="text/javascript" src="http://localhost/CodeIgniter/js/goog/dom/annotate.js"></script>



        <script  type="text/javascript" src="http://localhost/CodeIgniter/js/U.js"></script>
        <script type="text/javaScript" src="http://localhost/CodeIgniter/js/yl1.js"></script>
        <script type="text/javaScript" src="http://localhost/CodeIgniter/js/yl6.js"></script>
        <script type="text/javaScript" src="http://localhost/CodeIgniter/js/highlighter.js"></script>
        <script src="/codeigniter/js/jquery.form.js" ></script>
       

        <meta name="author" content="Y Lazarides" />
        <meta name="copyright" content="Dr Y Lazarides" />
        <meta name="robots" content="all" />
        <meta name="imagetoolbar" content="no" />
        <meta name="keywords" content="<?php //echo $keywords;    ?>" />
        <meta name="description" content="An automatic website builder" />





        <style type="text/css">
            
            .country {color:#fff;background:green;padding:1px}
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

            #droplogin, #droplogin label {color:#fff
            }
            #droplogin label{width:85px}
            #droplogin input{font-size:11px;
                height:14px;margin-bottom:3px;
                border:none;
            }
            .loginLink {background-color:rgb(102,102,102);
                color:#fff;
            }

            a.loginLink:link {background-color:rgb(102,102,102);
                color:#fff;
            }

            a#lost-password:link, a#lost-password:hover, a#lost-password:visited {color:#fff;text-decoration:underline;
            }
        </style>

        <script>
            UI.login={}
            UI.login.show=function(){
                $('#login a').addClass('loginLink');
                $('#pagehead').height('450px');
                $("#droplogin").show('slow')
            }
            UI.login.hide=function(){
                $('#pagehead').height('100px');
                $("#droplogin").hide()

            }

            UI.lostPassword={}

            UI.lostPassword.showRequest=function(formData, jqForm, options) {
                // formData is an array; here we use $.param to convert it to a string to display it
                // but the form plugin does this for you automatically when it submits the data
                var queryString = $.param(formData);

                return true;
            }
            // post-submit callback
            UI.lostPassword.showResponse=function(responseText, statusText) {
                $('#lost-password-status-wrapper').animate({backgroundColor:'yellow'}).animate({backgroundColor:'rgb(102,102,102)'});
                $('#lost-password-spinner').hide();
                setTimeout(function(){
                    $('#droplogin').hide('slow');
                    UI.floatingNotices('Thank You!. <br/>Check your email.\n\
Thank You!');
                    UI.login.hide();
                },5000);
                // alert(('status: ' + statusText + '\n\nresponseText: \n' + responseText + '\n\nThe output div should have already been updated with the responseText.').entityify());
            }

            UI.lostPassword.show=function(){
                $('#lost-password-form').show('slow');
                $('#login-form').hide('slow');
            }
            UI.lostPassword.hide=function(){
                UI.login.hide();
            }

            


            $(document).ready(function(){
                // toggle for login/register button
                $('#login').toggle(function(){
                    UI.login.show();
                    return false ;
                },
                function(){
                    //$(this).find('a').removeClass('loginLink');
                    UI.login.hide();
                    return false ;
                });

                UI.login.options = {
                    target: '#login-status',
                    // target element(s) to be updated with server response
                    beforeSubmit: showRequest,
                    // pre-submit callback
                    success: showResponse,
                    // post-submit callback
                    url: '/codeigniter/upload/ajax_login/',
                    type: 'POST'
                }
           
                // bind form using 'ajaxForm'
                $('#login-form').ajaxForm(UI.login.options);

                $('#login-button').live('click',function(){
                    $('#login-form').submit();
                    return false;
                })


                // pre-submit callback
                function showRequest(formData, jqForm, options) {
                    // formData is an array; here we use $.param to convert it to a string to display it
                    // but the form plugin does this for you automatically when it submits the data
                    var queryString = $.param(formData);
                    $('#spinner').show();
                    return true;
                }

                // post-submit callback
                function showResponse(responseText, statusText) {
                    $('#login-status-wrapper').animate({backgroundColor:'yellow'}).animate({backgroundColor:'rgb(102,102,102)'});
                    $('#spinner').hide();
                    setTimeout(function(){
                        $('#droplogin').hide('slow');
                        UI.floatingNotices('Thank You!. <br/>Check your email.\n\
                        Thank You!');
                        UI.login.hide();
                    },5000);
                    // alert(('status: ' + statusText + '\n\nresponseText: \n' + responseText + '\n\nThe output div should have already been updated with the responseText.').entityify());
                }
                //-----------------------------------------------------------------------------------------------------------------
                // LOST PASSWORDS BEGIN HERE
                // set up all options
                UI.lostPassword.options = {
                    target: '#lost-password-status',
                    // target element(s) to be updated with server response
                    beforeSubmit: UI.lostPassword.showRequest,
                    // pre-submit callback
                    success: UI.lostPassword.showResponse,
                    // post-submit callback
                    url: '/codeigniter/upload/ajax_lost_password/',
                    type: 'POST'
                }

                // bind form
                $('#lost-password-form').ajaxForm(UI.lostPassword.options);

                // show form
                $('a#lost-password').live('click',function(){
                    UI.lostPassword.show();
                    return false;
                })
                // password submit bind
                // lost passwords
                $('a#lost-password').live('click',function(){
                    UI.lostPassword.show();
                    return false;
                })
                $('#lost-password-button').live('click',function(){
                    $('#lost-password-status-wrapper').show();
                    $('#lost-password-spinner').show();
                    $('#lost-password-form').submit();
                    return false;
                })
            });
        </script>




    </head>


    <body style="background:url('/codeigniter/images/body_bg.gif')">
        <div class="container clearfix" style="border-top:3px solid #000000;width:1000px;margin:0 auto">
            <!-- START NAVIGATION TOP HIDDEN -->
            <div id="nav">
                <div id="nav_inner" class="clearfix nopad hidden">
                    <!-- hidden menu goes here -->


                </div>

            </div>
            <!-- end hidden menu -->

            <div id="nav2" class="clearfix" style="margin-right:0;padding-right:70px;">
                <a id="nav-img" href="#"><img  src= "http://localhost/strings/code_files/nav_toggle.jpg"
                                                   style="display:block;float:right;border:none" title="Toggle Table of Contents" alt="Toggle Table of Contents" />
                </a>


            </div>



            <div class="masthead" style="background:#fff;width:100%;padding-left:0;margin-left:0;border-bottom:0">
                <div class="clearfix" id="pagehead" style="margin-bottom:0;width:95%;margin-top:0px;padding-top:15px">
                    <h1 style="width:56%;margin-top:0;padding:0;padding-left:0">
                        <span style="background-color:rgb(255,255,248);font-family:arial;color:rgb(188,29,29);font-size:36px;line-height:1.3;padding:10px">
                    <?php echo $logo; ?><sup style="font-size:12px">&copy;</sup>&nbsp;&nbsp;&nbsp;</span></h1>
                    <ul id="menu" style="background-image:url(/codeigniter/images/icons/assets/nav_bg.gif);">
                        <li class="active">
                        <a  href="http://127.0.0.1/CodeIgniter/index.php/Blogs/tutorials/blog/home">Home</a></li>
                        <li  style="background-color:rgb(188,29,29);">
                        <a style="color:#fff" href="/CodeIgniter/LearnPHP/tutorials/php/Introduction">phpNotes</a></li>

                        <li class="active">
                        <a href="http://127.0.0.1/CodeIgniter/index.php/Blogs/tutorials/jQuery/Introduction">Notes</a></li>

                        <!--  <li class="active" style="background-color:rgb(206,123,0)"><a href="http://127.0.0.1/CodeIgniter/index.php/Blogs/excerpt">Archive</a></li>-->
                        <li class="active"><a href="//localhost/CodeIgniter/blogs/gallery/eugenio-018/6">Galleries</a></li>
                        <!--    <li class="active"><a href="http://localhost/CodeIgniter/upload/">Upload</a></li>-->
                        <li class="active" ><a  href="http://localhost/CodeIgniter/blogs/stamps/general/introduction/">Blog</a></li>
                        <!--   <li class="active"><a href="http://localhost/CodeIgniter/admin/">Admin</a></li>-->
                        <!--  <li class="active"><a href="http://www.bjornblomquist.com/contact.html">Contact</a></li>-->
                        <li id="login" class="active"><a  href="">Login/Register</a></li>

                    </ul>
                    <div id="droplogin" class="curvy clearfix" style="
                         z-index:9999;
                         padding:10px;display:none;
                         margin-top:-18px;
                         width:250px;
                         float:right;
                         margin-right:20px;
                         background:#fafafa;">

                        <div style="padding:10px;background:rgb(102,102,102)">
                            <form id="login-form">
                                <div id="login-status-wrapper" class="curvy" style="color:#fff;font-size:11px;
                                     padding:5px;border:1px solid #fff">Status: <span id="login-status"></span>
                                <img id="spinner" style="display:block;display:none;float:right" src="/codeigniter/images/spinner.gif" /></div>
                                <label>Login:</label><br/><br/>
                                <label>user name</label>
                                <input type="text" value="user" name="user_name" id="user_name" /><br/>
                                <label>password</label>
                                <input type="text" value="email" name="user_password" id="email" /><br />
                                <label>Remember me</label>
                                <input type="checkbox" style="color:black"/><br/><br/>
                                <label>Register:</label><br/><br/>
                                <label>user name</label>
                                <input type="text" value="register_user" name="register_user" /><br/>
                                <label>email</label>
                                <input type="text" value="register_email" name="register_email" /><br/>
                                <label>password</label>
                                <input type="text" value="register_password" name="register_password" /><br />
                                <button id="login-button" style="position:relative;right:-150px;border:none;
                                        background-color:rgb(76,76,76);height:20px;width:50px;padding:0;line-height:1.3">submit</button><br/><br/><br/>
                            </form>

                            <span style="font-size:11px;color:#fff">&nbsp;<a href="" id="lost-password">Lost password</a> | privacy </span>
                            <form id="lost-password-form" style="display:none">
                                <div id="lost-password-status-wrapper" class="curvy" style="color:#fff;font-size:11px;
                                     padding:5px;border:1px solid #fff;display:none">Status: <span id="lost-password-status"></span>
                                    <img id="lost-password-spinner" style="display:block;display:none;float:right" src="/codeigniter/images/spinner.gif" />
                                </div>
                                <p style="font-size:11px;padding:0;margin:0;color:#fff">Enter your user name and email and we will email you details to recover your passsword:</p><br/><br/>
                                <label>user name</label>
                                <input type="text" value="register_user" name="register_user" /><br/>
                                <label>email</label>
                                <input type="text" value="register_email" name="register_email" /><br/>

                                <button id="lost-password-button" style="position:relative;right:-150px;border:none;
                                        background-color:rgb(76,76,76);height:20px;width:50px;padding:0;line-height:1.3">submit</button><br/><br/><br/>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
            <!-- END NAVIGATION -->
            <div id="pagehead-spacer" style="width:980px;margin-top:0;
                 background:#fff url(/codeigniter/images/spacer.jpg) no-repeat;">

            </div>
            <!-- TOP MENU NAVIGATION -->

            <!-- Start: Sidinneh�ll -->
            <div id="pagecontent" class="clearfix" >
                <!-- Start: Contentrad -->
                <div id="left" class="content-row"  >
                    <!-- Start: Inneh�llsklumn 1 -->
                    <div id="left-menu" class="span-7">
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
                        <div id="demo-area" class="curvy clearfix  hidden" style="border:1px solid #bebebe;margin-right:20px;">

                        </div>


                        <div id="sidemenu"></div>

                        <?php



                        //create menu automatically needs to come from model/controller
                        echo '<ul>';
                        foreach ($list as $key=>$value){
                            $value=str_replace( '.dat', '', $value );
                            $value=str_replace( '/'.$location.'/', '', $value );
                            $this->load->helper('inflector');

                            echo '<li><a href="'.$value.'">'.ucfirst(r('_',' ',$value)).'</a></li>';

                        }
                        echo '</ul>';

                        ?>
                    </div>
                    <!-- Start: Side 2 -->
                    <div class="span-17">
                        <?php //echo 'title is'.$title;?>
                        <?php echo '<a href="http://localhost/CodeIgniter/admin/post/edit/'.$location.'/'.$title.'">[edit]</a>';?>
                        <?php echo '<a href="http://localhost/CodeIgniter/admin/post/new/'.$location.'/'.$title.'">[new]</a>';
                        ?>
                        <?php echo $date ?>


                        <!--
<?php echo $prev?><img src="http://localhost/egypt/previous.gif" style="float:left;margin-top:10px" />

<a href="<?php echo $next?>"><img src="http://localhost/egypt/next.gif" style="float:right;clear:right;margin-top:10px" /></a>
-->


                        <div style="clear:both"></div>
                        <?php echo $user ?>

                        <div id="main-content" class="clearfix">
                            <?php echo markdown($content); ?>
                        </div>
                        <div style="clear:both"></div>
                        <div style="background:#000;color:#fff;width:30%;float:right;margin-bottom:3px">
                            <!-- NEXT -->
                            <div class=" draggable clearfix" style="padding-bottom:5px;padding-left:7px;padding-right:7px">

                                <a href="<?php echo $prev?>"><img class="draggable" src="http://localhost/egypt/previous.gif" style="float:left;margin-top:10px" alt= "" title="<?php echo $prev ?>" /></a>

                                <a href="<?php echo $next?>" title="<?php echo $next ?>"><img  src="http://localhost/egypt/next.gif" style="float:right;clear:right;margin-top:10px" alt="" /></a>

                            </div>
                        </div>
                        <div style="clear:both"></div>
                        <div style="font-size:10px">
                            <?php echo '<p><a href="http://localhost/CodeIgniter/admin/post/edit/'.$location.'/'.$title.'">edit</a></p>';
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


        </div>
        <div id="floating-notices" style="width:200px;margin:0;padding:0;
             display:none;position:fixed;right:20px;bottom:20px;
             font-size:11px;" class="clearfix">
        </div>


    </body>
</html>
























