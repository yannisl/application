<?php
## The Controller Sandbox primarily
## handles the execution of commands
## at system level.

include_once('markdown.php');

class Sandbox extends Controller {

    //upload function

    function Upload()
    {
        parent::Controller();
        $this->load->helper(array('form', 'url'));
    }

    //displays the upload form

    function default_data(){
        $data['content']='';
        $data['title']='Image Crop';
        $data['file_name']='';
        $data['file_type']='';
        $data['file_path']='';
        $data['raw_name']='angela';
        $data['orig_name']='';
        $data['file_ext']='.jpg';
        $data['file_size']='';
        $data['is_image']='';
        $data['image_width']='';
        $data['image_height']='';
        $data['image_type']='';
        $data['image_size']='';
        return $data;

    }

    //main upload everything is empty
    function index()
    {
        //call some deafaults not to spoil template
        $data=$this->default_data();
        $this->template($data);
    }


    function template($data){
        $this->load->library('tcontrol');
        $this->load->library('tpanel');
        $class="tpanel";
        $s=$this->tpanel->get('date',$data);
        $s.=$this->tpanel->get('navigation_menu',$data);
        $s.=$this->tpanel->get('ajax_menu',$data);
        $s.=$this->tpanel->get('spacer',$data);
        $s.=$this->tpanel->get('upload_form_view',$data);
        $s.=$this->tpanel->get('spacer-bottom',$data);
        $s.=$this->load->view('image_lab_view',$data,TRUE);
        $data['title']='Image Lab';
        $data['content']=$s;
        $data['panel']='';
        $view='admin/demo_view';  //'admin/admin_simple_view';
        //load the view into a variable first
        $template=$this->load->view($view,$data,true);
        $this->load->library('filterclass');
        $template=$this->filterclass->filterAll($template);
        //configure tidy
        $config=array(
          'indent'=>true,
          'indent-spaces'=>2,
          'output-xhtml'=>true,
          'wrap'=>68,
          'force-output'=>true
        );
        //clean with tidy
        $template = tidy_parse_string($template, $config,'utf8');
        tidy_clean_repair($template);
        $this->output->set_output($template);
    }

    // function to crop image

    function _crop(){
        echo_array($_POST);

        if (!empty($_POST['x'])) { $x=$_POST['x'];}else{$x=100;}
        if (!empty($_POST['y'])) { $y=$_POST['y'];}else{$y=100;}
        if (!empty($_POST['w'])) { $w=$_POST['w'];}else{$w=100;}
        if (!empty($_POST['h'])) { $h=$_POST['h'];}else{$h=100;}
        $data['raw_name']=$_POST['raw_name'];
        $data['file_ext']=$_POST['file_ext'];
        $targ_w =$w; $targ_h = $h;
        $jpeg_quality = 90;
        $src = './uploads/'.trim($_POST['image']);
        $img_r = imagecreatefromjpeg($src);
        $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
        imagecopyresampled($dst_r,$img_r,0,0,$x,$y,
            $targ_w,$targ_h,$w,$h);
        $dst=imagefilter($dst_r, IMG_FILTER_GRAYSCALE);
        imagefilter($dst_r,IMG_FILTER_COLORIZE,80,60,40); //sepia
        imagejpeg($dst_r, './uploads/'.'crop_'.trim($_POST['image']), 80);
        //echo_array($data);
        $this->load->library('tcontrol');
        $this->load->library('tpanel');
        $class="tpanel";
        $s=$this->tpanel->get('date',$data);
        $s.=$this->tpanel->get('navigation_menu',$data);
        $s.=$this->tpanel->get('ajax_menu',$data);
        $s.=$this->tpanel->get('spacer',$data);

        $s.=$this->load->view('image_lab_view',$data,TRUE);
        $data['title']='The Tlist Class';
        $data['content']=$s;
        $data['panel']='';

        $this->template($data) ;
        //$this->load->view('image_crop_view', $data);

        ;}

    function get_file(){
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '1000';
        $config['max_width']  = '1024';
        $config['max_height']  = '1000';
        $this->load->library('upload', $config);
        //successful upload
        if ($this->upload->do_upload()){
            echo_array($this->upload->data());
            // place data in correct placeholder
            $data = array('upload_data' => $this->upload->data());
            return $data;
        }
        //unsuccesful upload
        else
        {
            $error = array('error' => $this->upload->display_errors());
            //$this->template($data);
            $this->load->view('image_lab_view', $error);

        }
    }


    function thumbs($data){
        $this->load->library('image_lib');
        $config['source_image'] = '../CodeIgniter/uploads/'.$data['upload_data']['raw_name'].$data['upload_data']['file_ext'];
        echo $config['source_image'];
        //'/path/to/image/mypic.jpg';
        $config['wm_text'] = 'Copyright 2006 - John Doe';
        $config['wm_type'] = 'text';
        $config['wm_font_path'] = '../CodeIgniter/system/fonts/arial.ttf';
        $config['wm_font_size'] = '16';
        $config['wm_font_color'] = 'ffffff';
        $config['wm_vrt_alignment'] = 'bottom';
        $config['wm_hor_alignment'] = 'center';
        $config['wm_padding'] = '20';
        //thumbs
        $config['image_library'] = 'gd2';
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 200;
        $config['height'] = 300;
        $config['dynamic_output']=false;
        $config['thumb_marker']= '_thumb';
        //$config['new_image']= '../CodeIgniter/uploads/test.jpg';

        //intialize configuaration variables for GD librray
        $this->image_lib->initialize($config);
        //crop
        //re-size image
        $this->image_lib->resize();


    }

    function do_upload($action=''){

        if ($action=="crop"){

            self::_crop();
        }
        else{

            $data=$this->get_file();
            echo_array($this->upload->data());
            // place data in correct placeholder
            $data = array('upload_data' => $this->upload->data());
            //creates thumbs
            $this->thumbs($data);
            //success function
            // $this->template($data);
            $this->load->view('upload_success', $data);

        }

    }

    

    // need to expand on this

    function error_($output,$msg=''){
        // Manually parse output for errors and
        // generate usable information for the user
        // especially content of error-lines.

        // error messages syntax
        $pattern = '/^\s*.+\s*error\s*:(.+) in (.+) on line (\d+)\s*$/m';
        // we strip tags from
        // PHP send the error msg with <b> etc
        $z=preg_match_all($pattern,strip_tags($output),$values);
        echo 'TEST';
        $s='<div class="error" >Error: ';
        $s.=$values[1][0].' '.$msg.'on line '.$values[3][0].'</div>';
        return $s;
    }

    // Gets options via POST Array
    // @response sends

function display_error($e){
  $s='';
  $s.='Exception: '.$e->getCode().': '.$e->getMessage().' in '.$e->getFile().' on line'.$e->getLine().'';
  return $s;
}

function fatal_error_handler($buffer) {
  if (ereg("(error</b>:)(.+)(<br)", $buffer, $regs) ) {
    $err = preg_replace("/<.*?>/","",$regs[2]);
    error_log($err);
    return "ERROR CAUGHT check log file";
  }
  return $buffer;
}

function handle_error ($errno, $errstr, $errfile, $errline)
{
    error_log("$errstr in $errfile on line $errline");
    if($errno == FATAL || $errno == ERROR){
        ob_end_flush();
        echo "ERROR CAUGHT check log file";
        exit(0);
    }
}

  

   // function for Perl Ajax sandbox
   // very simple at this stage
   // 
   function Perl($data='angela'){

        if (!empty($_POST)){
            $code=$_POST['ascript'];
        }
        
        $s ="#!c:/perl/bin/perl.exe

            use CGI qw/:standard/;

            use CGI::Carp 'fatalsToBrowser';

            print header;
            print start_html('Simple Script');
            ";
        $code=$s.$code.'
           print end_html; ';
        $f='/ZZZ.pl';
        $res = file_put_contents('C:/wamp/www'.$f, trim($code));
        $d=file_get_contents($f,$code);
        //echo $res;break;

       // echo $d;break;
        $check=virtual($f);

        ob_start();
        // Do eval()
        // echo 'before the throw line';
        //$check = eval($code);
        
        $output = ob_get_contents();
        register_shutdown_function('shutdown',$output,$check);
        // Send output or report errors
        // does not need ob_end_clean
        // ob_end_clean();
        if ($check === true) {
            //echo $output;
        } else {
           // echo $this->error_($output);
        }


    }

  // this function will get Lua code
  // from a screen textbox
  // will execute and return contents
  // need checking for SAFE need to switch off here
  // and back on when finished

   function lua($data=''){
        if (!empty($_POST)){
            $code=$_POST['ascript'];
        }
        $f='ZZZ.lua';
        $res = file_put_contents('C:/lua/'.$f, trim($code));
        ob_start();
        $z=shell_exec(addslashes('lua -e dofile("C:\\lua\\ZZZ.lua") 2>&1 '));
        $out2 = ob_get_contents();
        ob_end_clean();
        echo ($z);
    }

 function test(){
     $str=exec("ping 127.0.0.1",$a,$a1);
  print "<table>";
  if(strlen($str)>1){
     print"<tr><td >$a.$a1</td></tr>";
  }else{
     print"<tr><td>$a</td></tr>";
  }
 print "</table> ";
    }

  // this function will get C/C++ code
  // from a screen textbox
  // will compile and return contents
  

   function cpp($data='angela'){
        if (!empty($_POST)){
            $code=$_POST['ascript'];
        }
        $f='ZZZ.cpp';  //scratch file
        $res = file_put_contents('C:/cpp/'.$f, trim($code));
        ob_start();
        //$z=shell_exec('cd\\');
        chdir('c:/lcc/bin/');
        //$z=shell_exec('C:/test/string1.exe 2>&1');
        $z=shell_exec('c:/lcc/bin/lcc.exe -A c:/cpp/ZZZ.cpp');
        //$z=shell_exec('cl c:/cpp/ZZZ.cpp 2>&1 ');
        $out2 = ob_get_contents();
        ob_end_clean();
        echo $z.'TESTING ';
    }



    // experimental Clojure
    // test
    function clojure($data='angela'){
        if (!empty($_POST)){
            $code=$_POST['ascript'];
        }
        $f='ZZZ.clj';
        $res = file_put_contents('C:/clojure/sandbox/'.$f, trim($code));
        ob_start();
        $z=shell_exec('java -cp C:/clojure/clojure.jar clojure.main c:/clojure/sandbox/ZZZ.clj 2>&1 ');
        $out2 = ob_get_contents();
        ob_end_clean();
        echo '<pre>'.htmlspecialchars($z).'</pre>';
    }

     // experimental Clojure
    // test
    function python($data='angela'){
        if (!empty($_POST)){
            $code=$_POST['ascript'];
        }
        $f='ZZZ.py';
        $res = file_put_contents('C:/clojure/sandbox/'.$f, trim($code));
        ob_start();
        $z=shell_exec('C:/python26/python.exe c:/clojure/sandbox/ZZZ.py 2>&1');
        $out2 = ob_get_contents();
        ob_end_clean();
        echo '<pre>'.htmlspecialchars($z).'</pre>';
    }

  // experimental haskel operation
   function haskell($data='angela'){
        if (!empty($_POST)){
            $code=$_POST['ascript'];
        }
        $f='ZZZ.hs';
        $res = file_put_contents('C:/haskell/examples/'.$f, trim($code));
        ob_start();
        $t='C:/haskell/bin/runhaskell c:/haskell/examples/ZZZ.hs 2>&1';
        echo '<pre>'.shell_exec($t).'<pre>';
        //$z=shell_exec('erl');
        //$out2 = ob_get_contents();
        //ob_end_clean();
        //echo $z;
    }

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

    // experimental pdflatex output
    // when we generate a pdflatex file a number of steps
    // happen. First we we load the head of the main file
    // from the folder tex-main.
 function pdflatex($country='',$file_name='testing',$class='article', $copy=0){
    ## Load some helper classes
    $this->load->helper('file');
    ## allow for post checking if we need to capture more stuff.
    ## temporary convenience commands
    ## copies every time and can slow down terribly processing.
    ## will be removed later
    $src = 'C:/wamp/www/stamp-images/'.$country.'/' ;
    $dest = 'C:/wamp/www/countries/'.$country.'/'.$country.'/' ;;
    self::xcopy($src,$dest);

    if (!empty($_POST)){
        $code=$_POST['ascript'];
    }

   //echo_array($_POST);break;
    
    # We set all paths based on global settings
    #
    $document_root= $this->config->item('document_root');// C:/wamp/www/ returns with a slash
    $main_data_folder = $this->config->item('main_data_folder'); // 'countries' ;
    //$main_data_folder = "tutorials"; //$this->config->item('main_tutorials_folder');

    # We define three main paths, one for the .dat files and another for
    # the .tex files
    # and .pdf files

    $data_src = $document_root.$main_data_folder.'/'.$country.'/'.$file_name.'.dat' ; //c;wamp/www/countries
    $tex_data_src = $document_root.$main_data_folder.'/'.$country.'/tex/'.$file_name.'.tex' ; //c;wamp/www/countries
    $pdf_src = $document_root.$main_data_folder.'/'.$country.'/tex/'.$file_name.'.pdf';

    //echo $pdf_src; break;
    # We define the tex templates path and the default preamble file.
    ## in configuration files.
    $tex_template_directory=$document_root.$this->config->item('tex_templates_folder').'/';
    ## we fetch the default configuration preamble.tex
    $tex_header_file= $this->config->item('tex_header_file');
    $tex_template_src = $tex_template_directory.$tex_header_file;
    
    ## First we load the preamble.text to attach to the main body
    ## we need to check if it exists or fall back.
    
    $this->load->library('texfilter');
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
        echo 'TeX File written!';
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





 // experimental jsut hangs!
   function erlang($data='angela'){
        if (!empty($_POST)){
            $code=$_POST['ascript'];
        }
        $f='ZZZ.er';
      //  $res = file_put_contents('C:/lua/'.$f, trim($code));
        ob_start();
        //$t='C:/haskell/bin/ghci c:/haskell/examples/tut1.hs 2>&1';
        $t='C:\erlang\bin\werl /c 2>&1';
        echo shell_exec($t);
        //$z=shell_exec('erl');
        //$out2 = ob_get_contents();
        //ob_end_clean();
        //echo $z;
    }




    function PHP($data='angela'){

        if (!empty($_POST)){
            $code=$_POST['ascript'];
        }
        // Append a return true to php-code to check on errors
       // $status=1;
       // $result=$this->safe_eval($code,&$status);
       // echo 'result '.$result.' '.$status;
        
        $code.= "\nreturn true;";

        // Send any output to buffer
        ob_start();
        // Do eval()

        // echo 'before the throw line';
        // since this is PHP we just evaluate the code only
         $check = eval($code);
     
        $output = ob_get_contents();
        register_shutdown_function('shutdown',$output,$check);
        // Send output or report errors
         ob_end_clean();

        if ($check === true) {
            //echo $output;
        } else {
           // echo $this->error_($output);
        }
        

    }

    // Gets options via POST Array
    // @response sends image
    function ajax_thumbs($data='angela'){
        if ($data=='test'){
            $s='$x=12;
function test($x=11){
switch ($x)
{case 1:echo "Number 1";
break;
case 2:echo "Number 2";
break;
case 3:
  echo "Number 3";
  break;
default:
  echo "No number between 1 and 3";
}
;}
test(12);';
            echo  eval($s);
        }
        $this->load->library('image_lib');

        $d=$image=$this->uri->segment(3);

        // defaults
        $config['width'] = 100;
        $config['height'] = 150;


        // if no image in API assume is coming from form
        // update as necessary
        if (!empty($_POST)){
            $image=$_POST['name'];
            $config['width'] = $_POST['width'];
            $config['height'] = $_POST['height'];
        }
        $config['source_image'] = '../CodeIgniter/images/'.$image.'.jpg';
        //thumbs
        $config['image_library'] = 'gd2';
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;

        $config['master_dim']="width";
        $config['dynamic_output']=false;
        $config['thumb_marker']= '_thumb';
        // $config['new_image']= '../CodeIgniter/uploads/'.$image.'.jpg';
        // $config['new_image']= '../CodeIgniter/uploads/'.$image.'.jpg';

        //intialize config variables for GD librray
        $this->image_lib->initialize($config);
        //re-size image
        $this->image_lib->resize();
        echo '<img src="http://localhost/codeigniter/images/'.$image.'_thumb.jpg?" />'  ;


    }


    // Gets options via POST Array
    // @response sends image
    function ajax_thumbs2($data='angela'){
        if ($data=='test'){
            $s='$x=12;
function test($x=11){
switch ($x)
{case 1:echo "Number 1";
break;
case 2:echo "Number 2";
break;
case 3:
  echo "Number 3";
  break;
default:
  echo "No number between 1 and 3";
}
;}
test(12);';
            echo  eval($s);
        }
        $this->load->library('image_lib');

        $d=$image=$this->uri->segment(3);

        // defaults
        $config['width'] = 100;
        $config['height'] = 150;


        // if no image in API assume is coming from form
        // update as necessary
        if (!empty($_POST)){
            $image=$_POST['name'];
            $config['width'] = $_POST['width'];
            $config['height'] = $_POST['height'];
        }
        $config['source_image'] = '../CodeIgniter/images/'.$image.'.jpg';
        //thumbs
        $config['image_library'] = 'gd2';
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;

        $config['master_dim']="width";
        $config['dynamic_output']=false;
        $config['thumb_marker']= '_thumb';
        // $config['new_image']= '../CodeIgniter/uploads/'.$image.'.jpg';
        // $config['new_image']= '../CodeIgniter/uploads/'.$image.'.jpg';

        //intialize config variables for GD librray
        $this->image_lib->initialize($config);
        //re-size image
        $this->image_lib->resize();
        echo '<img src="http://localhost/codeigniter/images/'.$image.'_thumb.jpg?" />'  ;


    }

function safe_eval($code,&$status) { //status 0=failed,1=all clear
    //Signs
        //Can't assign stuff
    $bl_signs =array("="); //=

    //Language constructs
    $bl_constructs = array("print","echo","require","include","if","else",
"while","for","foreach","switch","exit","break","array");

    //Functions
    $funcs = get_defined_functions();
    $funcs = array_merge($funcs['internal'],$funcs['user']);

    //Functions allowed
    //Math cant be evil, can it?
    $whitelist = array("pow","exp","abs","sin","cos","tan","array");

    //Remove whitelist elements
    foreach($whitelist as $f) {
        unset($funcs[array_search($f,$funcs)]);
    }
    //Append '(' to prevent confusion (e.g. array() and array_fill())
    foreach($funcs as $key => $val) {
        $funcs[$key] = $val."(";
    }
    $blacklist = array_merge($bl_signs,$bl_constructs,$funcs);

    //Check
    $status=1;
    echo_array($whitelist);break;
    foreach($blacklist as $nono) {
        if(strpos($code,$nono) !== false) {
            $status = 0;
            echo $nono.'<br/> ttt ';
            //return 0;
        }
    }

    //Eval
    return $code;
    //return @eval($code);
}

    //end controller
}
?>