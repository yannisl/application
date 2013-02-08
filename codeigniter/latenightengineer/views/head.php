<?php
include_once('page-builder.php');
define("SITENAME", "lateNightEngineer:USA");
$sitename=SITENAME;

$main=new pageCollector;
$s=$main->docType('xhtml-strict');
$s.=__('<head>');
$s.=$main->addTitle(SITENAME);
//$s.=$main->meta('charset','',$attribute=array('charset'=>'ISO-8859-1'));
$s.='<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1" />';
$s.=$main->meta('icon', $url ='http://www.bjornblomquist.com/favicon.ico');
//$s.=$main->addCSS(array('mother'=>'http://latenightengineer.com/play/themes/aberdeen-5.x-1.7/aberdeen/aberdeen-liquid/style.css'));
$s.=$main->addCSS(array('local'=>'http://localhost/egypt/two_files/general.css'));
$s.=$main->addCSS(array('local'=>'http://localhost/egypt/screen.css'));
$s.=$main->addCSS(array('local'=>'http://localhost/egypt/typography.css'));


$s.=$main->meta('meta','',$attribute=array('name'=>'author','content'=>'Y Lazarides'));
$s.=$main->meta('meta','',$attribute=array('name'=>'copyright','content'=>'Dr Y Lazarides'));
$s.=$main->meta('meta','',$attribute=array('name'=>'robots','content'=>'all'));
$s.=$main->meta('meta','',$attribute=array('name'=>'imagetoolbar','content'=>'no'));
$s.=$main->meta('meta','',$attribute=array('name'=>'keywords','content'=>'keyword1,keyword2,keyword3'));
$s.=$main->meta('meta','',$attribute=array('name'=>'description','content'=>'An automatic website builder'));
echo $s;
echo '



<!-- Styles -->
 
<style type="text/css">	
table {width:50%;margin-right:10px;float:right;margin-bottom:10px} 
table td{border:1px solid #bebebe;} 
table th{border:1px solid #bebebe;}  
.set-title{text-align:center;}  
</style>	
';
$s=__('</head>');
echo $s;

?>