
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

<div style="overflow: hidden; height: 0px;" id="nav">
  <div id="nav_inner">
  <script type="text/javascript">create_menu('null');</script>
  <table cellspaceing="0" style="width: 98%;" border="0" cellpadding="0"><tbody><tr>
  <td class="td" valign="top">
  </table>
  </div>
</div>

<div id="nav2" class="clearfix" style="margin-right:0;padding-right:70px" >
<a name="top"></a><a href="javascript:void(0);" onclick="myHeight.toggle();">
<img src="http://localhost/strings/code_files/nav_toggle.jpg" style="display:block;float:right" title="Toggle Table of Contents" alt="Toggle Table of Contents" border="0" height="44" width="153">
</a>
	<?php //showMenu($main_menu) ?>
</div>



<div id="masthead" style="background:#fff;width:100%;padding-left:0;margin-left:0;" >

<h1><span style="font-family:georgia;font-weight:bold;color:#000;font-size:36px;padding-left:0.6em">
<?php //echo ucfirst($location).'&middot; ';?></span><img src="http://localhost/CodeIgniter/images/Brain.gif" width="40px" ><span style="color:#000040"><?php echo $title ?></span></h1>
</div>
<!-- END NAVIGATION -->


<div id="pagehead" style="width:980px;margin-top:0;" class="clearfix">

    <?php showMenu($main_admin_menu) ?>
    <h4>Thinking Designs</h4>
</div>
    <!--End Top Menu-->	
	
    <!-- Page Content -->
    <div id="pagecontent" class="clearfix" >
		
    
       			
			
	   
		<div style="width:90%;margin:0 auto" class="clearfix">  
		<h3>Manage Your Databases</h3>	
		  <!-- First Box-->
			
			
		   {{html: ../CodeIgniter/data/block-db-menu.php}}    			
			<!-- Second Box-->
			
				  
		 <!-- Third Box-->
			<h2 style="margin-top:0px"><?php echo $title ?></h2>
			 <p class="description">You can edit, browse, repair and do many other things with your tables in your {{wi:database}}.</p>
			 <p>Click links for actions</p>
			 
			       
			 
			<div style="width:70%;float:left;padding-left:20px;margin-left:20px;overflow:auto">
			  
			 <div> </div>
			 
			 <div id="resizable" style="
            background: #eee;
            border-top:1px dotted #Bebebe;
            border-bottom:1px dotted #B5B8C8;width:70%;float:left;margin-left:40px;padding:2px;padding-left:20px" >
            <?php echo $content;  ?></div>
			 
			  
			
			 
		  </div>

      <!-- Google Conversation Element Code -->
<iframe frameborder="0" marginwidth="0" marginheight="0" border="0" style="border:0;margin:0;width:250px;height:440px;" src="http://www.google.com/friendconnect/discuss?scope=site" scrolling="no" allowtransparency="true"></iframe>

	<h3>Registration Form</h3>
     <form id="myform1">

	<!-- username -->
	<label for="username">Username</label>
	<input id="username" />
	<div class="tooltip">Must be at least 8 characters.</div><br/>

	<!-- password -->
	<label for="password">Password</label>
	<input id="password" type="password" />
	<div class="tooltip">Try to make it hard to guess.</div><br />

	<!-- email -->
	<label for="username">Email</label>
	<input id="email" />
	<div class="tooltip">We won't send you any marketing material.</div><br />

	<!-- message -->
	<label for="body">Message</label>
	<textarea id="body"></textarea>
	<div class="tooltip">What's on your mind?</div><br />

</form>
 





 <script>
     // execute your scripts when the DOM is ready. this is a good habit
     $(function() {



         // select all desired input fields and attach tooltips to them
         $("#myform :input").tooltip({

             // place tooltip on the right edge
             position: ['top', 'right'],

             // a little tweaking of the position
             offset: [-2, 10],

             // use a simple show/hide effect
             effect: 'toggle',

             // custom opacity setting
             opacity: 0.7
         });
     });
 </script>
		   
		 
	</div>		   
     
     
	</div>		
	
	<?php include('footer.php');?>
</div>
	
	
	
	