<?php
// Controller to Upload an Image and do some basic manipulations
// uses jQuery to crop the image
// works well but looks very ugly
// also need a bit of documentation
include_once('../strings/markdown.php');

class Alchemy extends Controller {

    //upload function+

    function __construct()
    {
        parent::Controller();
        $this->load->helper(array('form', 'url'));
        $this->load->library('alchemy/module/AlchemyAPI');
        echo 'module loaded';
        // Create an AlchemyAPI object.
        $alchemyObj = new AlchemyAPI();


        // Load the API key from disk.
        $alchemyObj->loadAPIKey("api_key.txt");
        // Categorize a web URL.
        $result = $alchemyObj->URLGetCategory("http://en.wikipedia.org/wiki/larnaka");
        echo "$result<br/><br/>\n";

        // Extract a ranked list of named entities from a web URL.
$result = $alchemyObj->URLGetRankedNamedEntities("http://en.wikipedia.org/wiki/larnaka");
echo "$result<br/><br/>\n";
//$result = $alchemyObj->URLGetKeywords("http://en.wikipedia.org/wiki/Fidel_Castro");
echo "$result<br/><br/>\n";
     /*   $htmlFile = file_get_contents("../codeigniter/system/latenightengineer/libraries/Alchemy/example/data/example.html");
        $result = $alchemyObj->HTMLGetCategory($htmlFile, "http://www.test.com/");
echo "$result<br/><br/>\n"; */
$result = $alchemyObj->URLGetText("http://en.wikipedia.org/wiki/larnaka");
echo "$result<br/><br/>\n";
        break;
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