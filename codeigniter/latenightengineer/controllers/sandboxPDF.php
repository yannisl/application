<?php
## The Controller SandboxPDF primarily
## handles the execution of commands
## at system level. back-up sandbox 1

include_once('markdown.php');

define("ROOT",'C:/wamp/www/');
define("MASTER_TEX_TEMPLATES",'../tex-templates/');
define("CSS_PATH",'C:/wamp/www/CodeIgniter/css/');
define('JS_PATH','C:/wamp/www/CodeIgniter/js/');
define("MASTER_IMAGES_PATH",'C:/wamp/www/stamp-images/');


class SandboxPDF extends Controller {

    function __construct() {
        parent::Controller();
        ## Load some helper classes
        $this->load->helper('file');
        $this->load->library('texfilter');
    }
    
    //main upload everything is empty
    function index()
    {
        //call some deafaults not to spoil template
        $data=$this->default_data();
        $this->template($data);
    }
/*
|---------------------------------------------------------------
| xcopy
|---------------------------------------------------------------
|
| copies recursively all directories.
|
| 13.12.2012 Y Lazarides
*/
  
function xcopy( $source, $target ) {
	if (is_dir( $source ) ) {
		@mkdir( $target );
		$d = dir( $source );
		while ( FALSE !== ( $entry = $d->read() ) ) {
			if ( $entry == '.' || $entry == '..' ) {
				continue;
			}
			$Entry = $source . '/' . $entry;
			if ( is_dir( $Entry ) ) {
				self::xcopy( $Entry, $target . '/' . $entry );
				continue;
			}
			copy( $Entry, $target . '/' . $entry );
		}

		$d->close();
	}else {
		copy( $source, $target );
	}
}

/*
|---------------------------------------------------------------
| pdflatex
|---------------------------------------------------------------
|
| sets up and process the pdfLaTeX file.
| 
|
| 13.01.2013 Y Lazarides
*/

 function pdflatex($portal='', $country='',$file_name='testing',$class='article', $copy=0){
    
    ## allow for post checking if we need to capture more stuff.
    ## temporary convenience commands
    ## copies every time and can slow down terribly processing.
    ## will be removed later
    $src = MASTER_IMAGES_PATH.$country.'/' ;
    $dest = ROOT.$portal.DIRECTORY_SEPARATOR.$country.'/'.$country.'/' ;

    ## temporary solution for a screw-up
    self::xcopy($src,$dest);

    if (!empty($_POST)){
        $code=$_POST['ascript'];
    }

    # We set all paths based on global settings
    #
    $document_root= $this->config->item('document_root');// C:/wamp/www/ returns with a slash
    $main_data_folder = $portal;//this->config->item('main_data_folder'); // 'countries' ;
    //$main_data_folder = "tutorials"; //$this->config->item('main_tutorials_folder');

    # We define three main paths, one for the .dat files and another for
    # the .tex files
    # and .pdf files

$data_src = ROOT.$portal.'/'.$country.'/'.$file_name.'.dat' ; //c;wamp/www/countries
    $tex_data_src = ROOT.$portal.'/'.$country.'/tex/'.$file_name.'.tex' ; //c;wamp/www/countries
    $pdf_src = ROOT.$portal.'/'.$country.'/tex/'.$file_name.'.pdf';
 
    # We define the tex templates path and the default preamble file.
    ## in configuration files.
    $tex_template_directory=MASTER_TEX_TEMPLATES;
    ## we fetch the default configuration preamble.tex
    $tex_header_file= $this->config->item('tex_header_file');
    $tex_template_src = $tex_template_directory.$tex_header_file;
    
    ## First we load the preamble.text to attach to the main body
    ## we need to check if it exists or fall back.
    
    
    ## $content is the contents in the .dat file
    $content =file_get_contents($data_src); //$data_src

   

    $preamble = file_get_contents($tex_template_src);

    ## we filter the pre-amble for variables.
    ## enable class and class options to be set at this time
    ## will do all these from a screen eventually.
    ## global settings are kept in a configuration file
    ## called 'tex_config'.
    $this->config->load('tex_config');
    $document_class= $this->config->item('class');
    $document_options = $this->config->item('options');
    $patterns[] = '/(\[\[class\]])/x'; $replacements[]= $document_class; //remove \hline
    $patterns[] = '/(\[\[\[options\]\]\])/';$replacements[] = $document_options;
    $patterns[] = '/(\[\[macrohook\]\])/';$replacements[] = $this->config->item('macrohook');
    $patterns[] = '/(\[\[coverpage\]\])/';$replacements[] = $this->config->item('coverpage');
    $patterns[] = '/(\[\[country\]\])/';$replacements[] = $country;
    $patterns[] = '/(\[\[country1\]\])/';$replacements[] = $country;
    //echo 'macrohook'.$this->config->item('macrohook'); break;

    $preamble = preg_replace($patterns,$replacements,$preamble);
    //echoPRE($preamble);
    //break;
    ## the filename comes from the header
    ## we first load the .dat file, texify and then save as tex
    ## we then re-load it.
    if (!is_dir('../'.$main_data_folder.'/'.$country.'/tex')) {
        mkdir('../'.$main_data_folder.'/'.$country.'/tex');
    }
    
    ## filter tex contents
    $texcontent=$this->texfilter->filterall($content);
    //echoPRE($texcontent);break;
    ## 
    write_file($tex_data_src, $texcontent);
    if ( ! write_file($tex_data_src, $texcontent))
    {
        echo 'Unable to write the TeX file';
    }
    else
    {
        //echo 'TeX File written!';
    }


    //$f=$file_name.'.tex';
        /**
        $preamble='\documentclass{article}'."\n".
                    '\title{Stamps and Postal History of Guinea}  % Declares the document\'s title.
                    \author{Dr. Yiannis Lazarides}      % Declares the author\'s name.
                    %\date{January 21, 1994}      % Deleting this command produces today\'s date.
                    \begin{document}'."\n\maketitle";
         *
         */
    $postamble='\end{document}';

    ## now we have the full TeX file build up
    ## including preamble, body and postamble
    $content=$preamble."\n".$texcontent."\n".$postamble;

    //echoPRE($content);break;

    ## we need to save it again fully in order to process it
    $res=file_put_contents($tex_data_src,$content);
    chdir($document_root.$main_data_folder.'/'.$country.'/tex/');

    ## we redirect standard error=2 to stdin=1 in case of error we can
    ## then echo the string to the browser
    ## We now build the pdflatex string and shell execute to create the
    ## pdf file
    $t='pdflatex.exe '.$tex_data_src.' 2>&1';
    $z=shell_exec($t);
    //echoPRE($z);break;

    ## Test for error in execution. TeX will issue a Fatal error
    ## using t he following string. We look for the string in the output
    ## to determine if there is an error.
    $pattern="/! Emergency stop\.[\s[:alnum:][:punct:]\$\&]*/im";
     //echoPRE($z);
   // break;
        
    if (preg_match_all($pattern,$z,$values))
    {
        echoPRE($z);
        break;

    }
    else
    {
        // although we TeXing a document for full names
        // we don't want to save it on the disk as such
        // we resave the file in its original state.
        
        $res=file_put_contents($tex_data_src, $texcontent);
       

        $att = "inline;";
        $fp = fopen($pdf_src, "rb");
           $data = fread($fp, filesize($pdf_src));
        fclose($fp);

        
        ## we build the headers for the pdf
        ## need to revisit this to check all are ok.
        ## also to check for caching
        header('Cache-control: max-age=31536000');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-Length: '.filesize($name).'');
        header('Content-Type: application/pdf; name="'.$file_name.'.pdf "');
        header('Content-Disposition:'.$att.' filename="'.$file_name.'.pdf"');
        header('Content-Transfer-Encoding: binary');
        echo $data;
    }

}

    //end controller
}
?>