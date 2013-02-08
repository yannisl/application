<script src="http://localhost/CodeIgniter/js/jquery.Jcrop.pack.js"></script>

<link rel="stylesheet" href="http://localhost/CodeIgniter/css/jquery.Jcrop.css" type="text/css" />
<link rel="stylesheet" href="demo_files/demos.css" type="text/css" />

<script language="Javascript">

    // Remember to invoke within jQuery(window).load(...)
    // If you don't, Jcrop may not initialize properly
    jQuery(document).ready(function(){

        jQuery('#cropbox').Jcrop({
            onChange: showCoords,
            onSelect: showCoords
        });

    });

    // Our simple event handler, called from onChange and onSelect
    // event handlers, as per the Jcrop invocation above
    function showCoords(c)
    {
        jQuery('#x').val(c.x);
        jQuery('#x-1').val(c.x);
        jQuery('#y').val(c.y);
        jQuery('#y-1').val(c.y);
        jQuery('#x2').val(c.x2);
        jQuery('#y2').val(c.y2);
        jQuery('#w').val(c.w);
        jQuery('#w-1').val(c.w);
        jQuery('#h').val(c.h);
        jQuery('#h-1').val(c.h);
    };

</script>




<!-- Styles --> 

<style type="text/css">	
    table {width:50%;margin-right:10px;float:right;margin-bottom:10px}
    table td{border:1px solid #bebebe;}
    table th{border:1px solid #bebebe;}
    .set-title{text-align:center;}
    pre.dotted{border:1px dotted #bebebe;font-size:11px;line-height:1.0}
</style>	




<div style="width:50%;float:left;">
    <?php echo '<img src="http://localhost/CodeIgniter/uploads/'.$raw_name.$file_ext.'"  id="cropbox" />' ?>

    <h4><?php echo 'uploaded file-name: '.$raw_name  ?></h4>
    <ul style="font-size:11px;">

        <?php //foreach($upload_data as $item => $value):?>
        <li style="display:inline"><?php //echo $item;?>:<?php //echo $value.' |';?></li>
        <?php //endforeach; ?>
    </ul>

</div>
<form action="crop" method="post" onsubmit="return checkCoords();">
<table style="margin-top: 1em;width:17%;float:left" class="draggable curvy">

    <thead>
        <tr>
            <th colspan="2" style="font-size: 110%; font-weight: bold; text-align: left; padding-left: 0.1em;">
                Coordinates
            </th>
            <th colspan="2" style="font-size: 110%; font-weight: bold; text-align: left; padding-left: 0.1em;">
                Dimensions
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="width: 10%;"><b>X<sub>1</sub>:</b></td>
            <td style="width: 30%;"><input type="text" id="x" name="x" value="-" /></td>
            <td style="width: 20%;"><b>Width:</b></td>
            <td><input type="text" value="-" id="w" name="w" /></td>
        </tr>
        <tr>
            <td><b>Y<sub>1</sub>:</b></td>
            <td><input type="text" id="y" value="-" name="y" /></td>
            <td><b>Height:</b></td>
            <td><input type="text" id="h" value="-" name="h" /></td>
        </tr>
        <tr>
            <td><b>X<sub>2</sub>:</b></td>
            <td><input type="text" id="x2" value="-" name="x2" /></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><b>Y<sub>2</sub>:</b></td>
            <td><input type="text" id="y2" value="-" name="y2" /></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
         <td><strong>image</strong></td>
         <td> <input type="text" id="filename" name="raw_name" value="<?Php echo $raw_name ?>" /></td>
         <td></td>
         <td> 
         
    
   <!-- <input type="hidden" id="y" name="y" />
    <input type="hidden" id="w" name="w" />
    <input type="hidden" id="h" name="h" />-->
   
    <input type="hidden" id="file" name="file_ext" value="<?Php echo '.jpg' ?>" />
    <input type="hidden" id="image"  name="image" value=" <?php echo $raw_name.$file_ext ?>" />
  

         
         
        

         </td>

        </tr>

        <tr>
        <td>  <input type="submit" value="crop Image" /></td>
        </tr>
    </tbody>
</table>
 </form>

<div>
    <?php echo '<img src="http://localhost/CodeIgniter/uploads/'.$raw_name.'_thumb'.$file_ext.'" class="draggable" />'; ?>
</div>




<div>
 <?php echo '<img src="http://localhost/CodeIgniter/uploads/'.'crop_'.$raw_name.$file_ext.'" class="draggable" />' ?>
</div>

<div id='chart_div'></div>
 <script type='text/javascript' src='http://www.google.com/jsapi'></script>
    <script type='text/javascript'>
      google.load('visualization', '1', {packages:['gauge']});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Label');
        data.addColumn('number', 'Value');
        data.addRows(4);
        data.setValue(0, 0, 'Memory');
        data.setValue(0, 1, 80);
        data.setValue(1, 0, 'Labour Cost');
        data.setValue(1, 1, 55);
        data.setValue(2, 0, 'Network');
        data.setValue(2, 1, 68);
        data.setValue(2, 0, 'Materials');
        data.setValue(2, 1, 68);
        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));
        var options = {width: 400, height: 180, redFrom: 80, redTo: 100,
            yellowFrom:75, yellowTo: 90, minorTicks: 5};
        chart.draw(data, options);
      }
    </script>

