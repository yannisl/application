
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head> 
<title>Stamps and Postal History:<?php //echo $title;  ?><</title> 
<meta http-equiv="Content-Type" content="text/html;charset=utf08" /><link rel="Shortcut Icon" href="http://www.bjornblomquist.com/favicon.ico" type="image/x-icon" /> 
<link rel="stylesheet" type="text/css" media="all" href="http://localhost/strings/code_files/userguide.css">


<link type="text/css" href="http://localhost/CodeIgniter/css/smoothness/jquery-ui-1.7.1.custom.css" rel="Stylesheet" />	
<script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery-ui-1.7.1.custom.min.js"></script>
<script type="text/javascript" src="http://localhost/strings/code_files/nav.js"></script>
<script type="text/javascript" src="http://alexgorbatchev.com/pub/sh/2.0.320/scripts/shCore.js"></script>
<script type="text/javascript" src="http://alexgorbatchev.com/pub/sh/2.0.320/scripts/shBrushBash.js"></script>

<link rel="stylesheet" href="http://localhost/egypt/two_files/general.css" type="text/css" /> 
<link rel="stylesheet" href="http://localhost/egypt/screen.css" type="text/css" /> 
<link rel="stylesheet" href="http://localhost/CodeIgniter/css/typography.css" type="text/css" />

</script>
<meta name="author" content="Y Lazarides" /> 
<meta name="copyright" content="Dr Y Lazarides" /> 
<meta name="robots" content="all" /> 
<meta name="imagetoolbar" content="no" /> 
<meta name="keywords" content="<?php //echo $keywords;    ?>" /> 
<meta name="description" content="An automatic website builder" /> 

 
 
<style type="text/css"> 
<!-- Styles --> 
 #toc {
  border: 1px solid #bebebe ;
  background-color:rgb(238,238,238);
  margin: 0 0 5px 12px;
  float:right;
  width:300px;
}

#toc ol{font-size:13px}
#toc ol {
  margin: 8px;
  padding-left: 5px;
}
.country {color:#fff;background:#C04343;}
.country a:link,.country a:hover,.country a:visited{color:#fff}
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

.description{font-size:smaller;margin-top:7px}
.form-required{color:#f60}
fieldset{border:none}



</style>

<script>
$(document).ready(function() {
 // hides the slickbox as soon as the DOM is ready
 // (a little sooner than page load)
  $('#nav').hide();
 // shows the slickbox on clicking the noted link  
  $('a#test2').click(function() {
    $('#nav').show('medium');
    return false;
  });
 // hides the slickbox on clicking the noted link  
  $('a#test2').click(function() {
    $('#nav').hide('fast');
    return false;
  });
 
 // toggles the slickbox on clicking the noted link  
  $('a#test2').click(function() {
    $('#nav').toggle(400);
    return false;
  });
  
  //this is the only function that is used to toggle the top menu
  //plenty others can be used like this
  //essentially all the info boxes in order not
  //to clutter pages
  $('a#toc').click(function() {
    $('#nav').toggle(330);
    return false;
  });
  
  //show datepicker
  $('#date').datepicker();
  
  //$('#stats').load('http://localhost/blog/introduction.dat');
  
  
});

$(function(){
			// start a counter for new row IDs
			// by setting it to the number
			// of existing rows
			var newRowNum = 10;
		
			// bind a click event to the "Add" link
			$('#addnew').click(function(){
				// increment the counter
				newRowNum += 1;
						
				// get the entire "Add" row --
				// "this" refers to the clicked element
				// and "parent" moves the selection up
				// to the parent node in the DOM
				var addRow = $(this).parent().parent();
				
				// copy the entire row from the DOM
				// with "clone"
				var newRow = addRow.clone();
				
				// set the values of the inputs
				// in the "Add" row to empty strings
				$('input', addRow).val('');
				
				// replace the HTML for the "Add" link 
				// with the new row number
				$('td:first-child', newRow).html(newRowNum);
				
				// insert a remove link in the last cell
				$('td:last-child', newRow).html('<a href="" class="remove">Remove<\/a>');
				
				// loop through the inputs in the new row
				// and update the ID and name attributes
				$('input', newRow).each(function(i){
					var newID = newRowNum + '_' + i;
					$(this).attr('id',newID).attr('name',newID);
				});
				
				// insert the new row into the table
				// "before" the Add row
				addRow.before(newRow);
				
				// add the remove function to the new row
				$('a.remove', newRow).click(function(){
					$(this).parent().parent().remove();
					return false;				
				});
			
				// prevent the default click
				return false;
			});
		});



</script>
















</head> 





