<?php
## Main Admin controller for
## various posts
## - creates new documents
## - renames documents
## - clones documents
## - responsible for all edit/save/delete functions

define("ROOT",'C:/wamp/www/application/');
//define("COLLECTION",'C:/wamp/www/countries/');
define("MASTER_TEX_TEMPLATES",'../tex-templates/');
define("CSS_PATH",'C:/wamp/www/application/CodeIgniter/css/');
define('JS_PATH','C:/wamp/www/application/CodeIgniter/js/');

define('TEX_PREAMBLE_FILE','preamble.tex');

include_once('markdown.php');

class AdminSTAMPS extends Controller {

    function __construct()
    {
        parent::Controller();
        $this->load->helper('form');
        $this->load->helper('file');
        $this->load->library('filterclass');
        $this->load->library('texfilter');
    }

    function Index($view='admin_view',$title="Admin View")
    {
        //$this->load->view('stamps/'.$view,$data);
        //self::show($view,$title);
    }

    # Function to echo a message and log it if necessary (needs to go to common?)
    function _message($msg, $log_flag= 0){
        if(flag==1){
            echo $msg;
        } else {
            //
        }

    }



    # used in ajax examples in tutorials needs to be moved
    #
    function api($action='save', $dir="js", $file_name='test.js',  $title='alexander-sheversky',$type='js'){
        $file_content = $_POST['code1'];
        //$this->load->helper('file');
        // common loading at top
        //echo_array($_POST);
        //echo('../CodeIgniter/'.$dir.'/'.$file_name);
        // break;
        if ( ! write_file('../CodeIgniter/'.$dir.'/'.$file_name, $file_content)){
            $_message('...Unable to save the file');
        }
        else{
            $_message('...server says...'.$file_name.'... saved!');
        }
    }

public static function deleteDir($dirPath) {
    if (! is_dir($dirPath)) {
        throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            self::deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
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



    # initializes and creates all folders
    # copies all documents as necessary
    # for method statements etc need to copy all standard
    # files
    # so we need to copy from standard sections
    # in all files
    # COLLECTION (i.e., $portal path for countries ../countries/
    
    private function initialize_folder ($portal='countries', $dir='test'){
        if ((isset($_POST['newdoc']) && (strlen($_POST['newdoc'])>1) )){
            $dir = $_POST['newdoc'];
        } else {
            return false;
        }
        // create the directory
        mkdir(ROOT.'/'.$portal.'/'.$dir);
        mkdir('../stamp-images/'.$dir);
        $contents_ini = file_get_contents(MASTER_TEX_TEMPLATES.'settings.ini');
        file_put_contents(ROOT.'/'.$portal.'/'.$dir.'/'.$_POST['newdoc'].'.ini',$contents_ini);
        file_put_contents(ROOT.'/'.$portal.'/'.$dir.'/introduction.dat','\chapter{Introduction}'."\n".'\lorem');
        file_put_contents(ROOT.'/'.$portal.'/'.$dir.'/titlepage.dat','\title{'.$_POST['newdoc'].'}');
        $template_string = '<div style="width:230px">'."\n".
'<ul id="LHnav" style="margin-left:0px;width:210px">
<li><a href="../'.$dir.DIRECTORY_SEPARATOR.'introduction">Historical Background.</a></li>
<li><a href="../'.$dir.DIRECTORY_SEPARATOR.'introduction">Postal History Introduction</a></li>
</ul>
<h4 class="country" style="background:#000040">...</h4>
<ul id="LHnav" style="margin-left:0px;width:210px">
  <li><a href="../'.$dir.'/  ">...</a></li>
  <li><a href="../'.$dir.'/ ">...</a></li>
</ul>
</div>';
        file_put_contents(ROOT.'/'.$portal.'/'.$dir.DIRECTORY_SEPARATOR.$dir.'.menu', $template_string);
        return true;
    }

    private function save_post_data($portal, $dir, $filename, $content){
     $content=$_POST['content'];
            $file_name=$_POST['save_as'];
            $data=$_POST;
            if ( ! write_file($portal.'/'.$dir.'/'.$file_name.'.dat', $content))
            {
                message('Unable to write the file');
            }
            else
            {
                //echo '...File written!';
            }
    }
    private function save_tex_data($dir, $filename, $content){
     ### Texify put file in different directory?
            ### Make directory if it does not exist

            if (!is_dir(COLLECTION.$dir.'/tex')) {
                mkdir(COLLECTION.$dir.'/tex');
            }
            $texcontent=$this->texfilter->filterall($content);
            $message= '% Generated by system'."\n\n";
            $texcontent=$message.$texcontent;
            // write_file('../'.$dir.'/tex/'.$file_name.'.tex', $texcontent);
            if ( ! write_file(COLLECTION.$dir.'/tex/'.$file_name.'.tex', $texcontent))
            {
                message('Unable to write the TeX file');
            }
            else
            {
                //echo 'TeX File written!';
            }
    }
    private function save_master_tex_preamble($dir,$filename, $content){
     //$tex_textarea=$_POST['code3'];
            if ( !write_file(MASTER_TEX_TEMPLATES.'preamble.tex', $content))
            {
                //echo 'Unable to write the file'; break;
            }
            else
            {
                //echo 'File written!';
            }
    }
    
    private function save_local_ini($src, $filename, $content){
           
            if ( ! write_file($src.DIRECTORY_SEPARATOR.$filename.'.ini', $content))
            {
                echo 'could not save the file';
            }
            else
            {
                // echo $src.DIRECTORY_SEPARATOR.$filename.'.ini';break;
            }
    }

/*
|---------------------------------------------------------------
| POST
|---------------------------------------------------------------
| Posts data from editform and variousmenus
| ACTIONS
|   - edit
|   - save
|   - saveus
|   - savepreamble etc..
|   - newdoc
|   - clonedoc
|  
| 13.12.2012 Y Lazarides
*/
    function post($action='edit', $portal="countries", $dir="aden",$title='alexander-sheversky',
                  $file_name='test',$type='dat'){
        // preview is not saving TODO
                
        if ($action=='preview'){
            redirect('/Blogs/stamps/'.$dir.'/'.$title);
        }
        // newdoc creates a new folder and copies some files in portal directory
        if ($action == 'newdoc'){
            if ($this->initialize_folder($portal, $dir)){
                redirect('/Blogs/stamps/'.$portal.'/'.$_POST['newdoc'].'/introduction');}
            else {
                echo "ERROR IN CREATING DIRECTORY";break;

            }
        }
        
/*
|---------------------------------------------------------------
| EDIT ACTION
|---------------------------------------------------------------
| Posts data from editform and variousmenus
| ACTIONS
|   - edit
|
|
| 13.12.2012 Y Lazarides
*/
        if ($action=='edit'){

            //echo $portal;break;
            
            $data['message']='Edit Post';
            $data['content']=(@file_get_contents(ROOT.$portal.'/'.$dir.'/'.$title.'.'.$type));
            $data['content']=htmlentities($data['content']);
            $data['texcontent']=file_get_contents(MASTER_TEX_TEMPLATES.'/preamble.tex');
            $data['documentsettings']=file_get_contents(ROOT.$portal.'/'.$dir.'/'.$dir.'.ini');
            $data['preview']=false;
            $data['title']=$title;
            $data['location']=$dir;
            $data['portal'] = $portal;
            $category=$this->filterclass->category($data['content']);//'book, other, boer';
            if (is_array($category)){
                $s='test';
                foreach ($category as $key=>$value){
                    $s.=$value;
                }
            }
            else{
                $data['category']=$category;}
            $this->load->view('editpostSTAMPS',$data);
        }

/*
|---------------------------------------------------------------
| CREATE/NEW ACTION
|---------------------------------------------------------------
| creates a new file untitled.dat file in the directory, and
| puts it in edit mode.
| 13.12.2012 Y Lazarides
*/
        if (($action=='create')||($action=='new')){
            $content='\chapter{Write your title here}';
            $file_name='untitled';  // with no extension
            if ( ! write_file(ROOT.$portal.'/'.$dir.'/'.$file_name.'.dat', $content))
            {
                //echo 'Unable to write the file';
            }
            else
            {
                //echo 'File written!';
            }
            $data['content']= file_get_contents(ROOT.$portal.'/'.$dir.'/'.$file_name.'.dat');
            //$data['content'] = '\chapter{Enter your title here}';
            $data['preview']=false;
            $data['title']=$file_name;
            $data['filename']=$file_name;
            $data['location']=$dir;
            $data['portal'] = $portal;
            $data['category']='';
            $data['message']='Create New';
            //$this->load->library('filterclass');
            //$this->filterclass->category($data['content'));
            $this->load->view('editpostSTAMPS',$data);}


/*
|---------------------------------------------------------------
| SAVE ACTION
|---------------------------------------------------------------
|
| saves the filename.dat file in the directory, and it also creates
| the LaTeX file filename.tex, but without a preamble. Later if a
| main.tex exists, it can be used to process the file (see also sandbox).
| 13.12.2012 Y Lazarides
*/
        if ($action=='save'){
            $content=$_POST['content'];
            $file_name=$_POST['save_as'];
            $data=$_POST;
            $this->save_post_data(ROOT.$portal.'/'.$dir, $filename, $content); //.dat file
            //$this->save_tex_data($dir, $filename, $content); //.tex file
            redirect('/Blogs/stamps/'.$portal.'/'.$dir.'/'.$file_name);
        }
        
        /*
         *
         *  CSS SAVES
         *  New added to save by type css */
        if ($action=='saveCSS'){
            $dirCSS="CSS";
            $css_textarea=$_POST['code2'];
            //echo 'SAVE AS'.$css_textarea;break;
            //$dir='CSS';  //write to CSS directory
            $this->load->helper('file');
            $file_name=$_POST['save_as'];
            //echo 'SAVE AS'.$file_name;break;
            $data=$_POST;
            //echo $dir.' '.$title;break;

            //write_file('/CSS/'.'screen_bak1.css', $css_textarea);
            if ( ! write_file('../CodeIgniter/'.$dirCSS.'/'.'localCSS_bak2.css', $css_textarea))
            {
                echo 'Unable to write the file';
            }
            else
            {
                echo 'File written!';
            }
            // change this for general was stamps
            redirect('/Blogs/tutorials/'.$dir.'/'.$file_name);
        }


        if ($action=='saveAsLocalCSS'){
            $dirCSS="CSS";
            $css_textarea=$_POST['localCSSCode'];

            //echo 'SAVE AS'.$css_textarea;break;
            //$dir='CSS';  //write to CSS directory
            $this->load->helper('file');
            $file_name=$_POST['save_as'];
            //echo 'SAVE AS'.$file_name;break;
            $data=$_POST;
            //echo $dir.' '.$title;break;

            //write_file('/CSS/'.'screen_bak1.css', $css_textarea);
            if ( ! write_file('../CodeIgniter/'.$dirCSS.'/'.'localCSS_bak2.css', $css_textarea))
            {
                echo 'Unable to write the file';
            }
            else
            {
                echo 'File written!';
            }
            // change this for general was stamps
            redirect('/Blogs/tutorials/'.$dir.'/'.$file_name);
        }

        /*  SAVE AS JAVASCRIPT */
        if ($action=='saveAsJS'){
            $dirJS="js";
            $css_textarea=$_POST['code1'];
            //echo 'SAVE AS'.$css_textarea;break;
            //$dir='CSS';  //write to CSS directory
            //$this->load->helper('file');
            //$file_name=$_POST['save_as'];
            //echo 'SAVE AS'.$file_name;break;
            //$data=$_POST;
            //echo_array($_POST);break;
            //echo $file_name.' '.$title;break;
            //write_file('/CSS/'.'screen_bak1.css', $css_textarea);
            if ( ! write_file('../CodeIgniter/'.$dirJS.'/'.'AAACtest.js', $css_textarea))
            {
                echo 'Unable to write the file';
            }
            else
            {
                //echo 'File written!';
            }
            // Redirect back to originating page for confirmation
            redirect('/Blogs/tutorials/'.$dir.'/'.$title);
        }

/*
|---------------------------------------------------------------
| SAVE MASTER TEX PREAMBLE
| 
|---------------------------------------------------------------
|
| saves the filename.tex file in the MASTER_TEX_TEMPLATES.
| 13.12.2012 Y Lazarides
*/
        if ($action=='savePreamble'){
            $tex_textarea=$_POST['code3'];
            //dir and filename not used
            $this->save_master_tex_preamble($dir,$filename, $tex_textarea);
            redirect('/Blogs/stamps/'.$dir.'/'.$title);
        }

/*

|---------------------------------------------------------------
| SAVE DOCUMENT SETTINGS (.ini file)
|
|---------------------------------------------------------------
|
| saves the filename.ini file in the Current directory. UPDATED
| 13.12.2012 Y Lazarides
*/
        if ($action=='saveDocumentSettings'){
            $ini_textarea=$_POST['code4'];

            $this->save_local_ini(ROOT.$portal.DIRECTORY_SEPARATOR.$dir, $dir, $ini_textarea);

            ## Redirect back to originating page for confirmation

            $src = '/Blogs/stamps/'.$portal.'/'.$dir.'/'.$title;
            redirect('/Blogs/stamps/'.$portal.'/'.$dir.'/'.$title);
        }

/*
|---------------------------------------------------------------
| DELETE ACTION  /admin/delete/<directory>/<pagename>
|
|---------------------------------------------------------------
|
| deletes the filename.dat file in the Current directory.
| 13.12.2012 Y Lazarides
*/
        if ($action=='delete'){
            if (is_file(ROOT.$portal.DIRECTORY_SEPARATOR.$dir.DIRECTORY_SEPARATOR.$title.'.dat') )
            {
                unlink(ROOT.$portal.DIRECTORY_SEPARATOR.$dir.DIRECTORY_SEPARATOR.$title.'.dat');
                //echo 'file deleted';break;
            }
            else
            {
                //echo 'unable written!';
            }
            redirect('/Blogs/stamps/'.$portal.DIRECTORY_SEPARATOR.$dir.'/'.'introduction');
        }

        if ($action=='deletedocument'){
            $dirPath = ROOT.$portal.DIRECTORY_SEPARATOR.$dir.DIRECTORY_SEPARATOR;
            $this->deleteDir($dirPath);
            // need to decide to where to redirect
            redirect('/Blogs/stamps/'.$portal.DIRECTORY_SEPARATOR.'china/'.'introduction');
        }


 /*
  *
  *
  *
  *
|---------------------------------------------------------------
| ZIPPING
|
|---------------------------------------------------------------
|
| saves the filename.ini file in the Current directory.
| 13.12.2012 Y Lazarides
*/
        if ($action=='zip'){
            // zip all folders iteratively in $dir
            // force download
            $folder_name='c://wamp/www/countries/'.$dir.'/';
         
            // load library
            $this->load->library('zip');
    
            
            $this->zip->read_dir($folder_name, TRUE);
            $this->zip->archive('$folder_name.compressed.zip');
            // Write the zip file to a folder on your server. Name it "my_backup.zip"
            //$this->zip->archive('/path/to/directory/my_backup.zip');

            // Download the file to your desktop. Name it "my_backup.zip"
            //$this->zip->download('compressed.zip');
            //$this->zip->download('my_backup.zip');
            //$this->zip($folder_name, $folder_name.'compressed.zip');
            //redirect('/Blogs/stamps/'.$dir.'/'.$title);
        }
        //break;
        
        
   /*
    * RENAME A FILE ON DISK UPDATED FOR PORTAL
    */
    if ($action=='renamedoc'){
             //echo $portal;break;
             $oldname = $title.'dat' ;
             $oldbackup = $title.'dat';
             $newname = $_POST['newdocname'];
             $oldfilepath = ROOT.$portal.DIRECTORY_SEPARATOR.$dir.DIRECTORY_SEPARATOR.$title.'.dat';
             $newfilepath = ROOT.$portal.DIRECTORY_SEPARATOR.$dir.DIRECTORY_SEPARATOR.$newname.'.dat';
             // we back the old one in a bak file
             // can then be removed manually
             $oldbackuppath = ROOT.$portal.DIRECTORY_SEPARATOR.$dir.DIRECTORY_SEPARATOR.$title.'-bak.dat';
            // echoPRE($_POST['newdocname']).'in rename';break;
             if (is_file(ROOT.$portal.DIRECTORY_SEPARATOR.$dir.DIRECTORY_SEPARATOR.$title.'.dat') )
            {
                copy($oldfilepath, $oldbackuppath);
                rename($oldfilepath, $newfilepath);
                //echo 'file renamed';break;
            }
            else
            {
                //echo 'unable to rename!';break;
            }

             $src = '/Blogs/stamps/'.$portal.'/'.$dir.'/'.$newname ;
             //echo $src;break;
             redirect($src);
         }
/*
 * RENAME A PORTAL - no back-up
 */
        if ($action=='renameportal'){
            //echo $portal;break;
            $oldname = $portal ;
            // $oldbackup = $title.'dat';
            $newname = $_POST['renameportalname'];
            $oldfilepath = ROOT.$portal.DIRECTORY_SEPARATOR.$dir.DIRECTORY_SEPARATOR;
            $newdirectory = ROOT.$portal.DIRECTORY_SEPARATOR.$newname.DIRECTORY_SEPARATOR;
            if (is_dir(ROOT.$portal.DIRECTORY_SEPARATOR.$dir) )
            {

                rename($oldfilepath, $newdirectory);

            }
            else
            {
                echo 'unable to rename!';break;
            }

            $src = '/Blogs/stamps/'.$portal.'/'.$newname ;
            //echo $src;break;
            redirect($src);
        }

        if ($action=='clonedoc'){
            // needs xcopy under utilities
            //$this->xcopy( $source, $target );
            $clonename = $_POST['clonedoc'];
            $source = ROOT.$portal.DIRECTORY_SEPARATOR.$dir.DIRECTORY_SEPARATOR;
            $target = ROOT.$portal.DIRECTORY_SEPARATOR.$clonename.DIRECTORY_SEPARATOR;
            // we also need to rename ini etc
            $sourceini = ROOT.$portal.DIRECTORY_SEPARATOR.$clonename.DIRECTORY_SEPARATOR.$dir.'.ini';
            $targetini = ROOT.$portal.DIRECTORY_SEPARATOR.$clonename.DIRECTORY_SEPARATOR.$clonename.'.ini';
            //echo $sourceini.' '.$targetini;break;

            if (is_dir(ROOT.$portal.DIRECTORY_SEPARATOR.$dir) )
            {
                $this->xcopy($source, $target);
                rename($sourceini, $targetini);
            }
            else
            {
                echo 'unable to clone!';break;
            }

            $src = '/Blogs/stamps/'.$portal.'/'.$clonename ;
            //echo $src;break;
            redirect($src);
        }





    }
   /*
 

/*

/*
 *
 *
 */
    function menu($action='edit',$portal="countries", $dir="aden",$title='introduction',$file_name='test',$type='menu'){
        $this->load->library('filterclass');

        if ($action=='edit'){
            $src = ROOT.$portal.'/'.$dir.'/'.$dir.'.'.$type;
            //echo $src;break;
            $data['message']='Edit Post';
            if (file_exists($src)) {
                $data['content']=@file_get_contents($src);
                $data['content']=$this->filterclass->filterAll(($data['content']));
            }
            else
            {

                $template_string = '<div style="width:230px">
<ul id="LHnav" style="margin-left:0px;width:210px">
<li><a href="../'.$dir.'/introduction">Historical Background.</a></li>
<li><a href="../'.$dir.'/introduction">Postal History Introduction</a></li>
</ul>

<h4 class="country" style="background:#000040">...</h4>
<ul id="LHnav" style="margin-left:0px;width:210px">
  <li><a href="../'.$dir.'/  ">...</a></li>
  <li><a href="../'.$dir.'/ ">...</a></li>
</ul>
</div>';
                file_put_contents($src, $template_string);
                $data['content']=file_get_contents($src);
            }


            // need to have it set based on some config
            // like Drupal
            $data['content']=htmlentities($data['content']);
            $data['preview']=false;
            $data['title']= $dir.'.menu';
            $data['location']=$dir;
            $data['portal'] = $portal;

            //*$this->load->library('filterclass');
            //$this->filterclass->category($data['content'));
            //$data['category']=$this->filterclass->category($data['content']);//'book, other, boer';
            $data['category']='books';
            //*$category=$this->filterclass->category($data['content']);//'book, other, boer';

            $this->load->view('editmenuSTAMPS',$data);
        }


/* This creates a new file and save it
   We first create a blank file
   Then we send info to template
   Since 'untitled' may exist we read




        if (($action=='create')||($action=='new')){
            $content='##Your Title Here';
            $file_name='untitled.dat';
            //$this->load->helper('file');
            write_file('../'.$dir.'/'.$file_name, $content);
            if ( ! write_file('../'.$dir.'/'.$file_name, $content))
            {
                echo 'Unable to write the file';
            }
            else
            {
                echo 'File written!';
            }

            $data['content']=(file_get_contents('../'.$dir.'/'.$file_name));
            $data['preview']=false;
            $data['title']=$file_name;
            $data['filename']=$file_name;
            $data['location']=$dir;
            $data['category']='';
            $data['message']='Create New';
            $this->load->library('filterclass');
            //$this->filterclass->category($data['content'));
            $this->load->view('editpost',$data);}
*/


        #### SAVE ACTION FOR MENU #####
        #### both save and save as works from here

        if ($action=='save'){
            $this->load->helper('file');
            $content=$_POST['content'];
            $file_name=$_POST['save_as'];
            $data=$_POST;
            $src = ROOT.$portal.'/'.$dir.'/'.$dir.'.menu';
            if ( ! write_file(ROOT.$portal.'/'.$dir.'/'.$dir.'.menu', $content))
            {
                echo 'Unable to write the file';
            }
            else
            {
                //echo '...File written!';
            }
            //break;
            // change this for general was stamps
            redirect('/Blogs/stamps/'.$portal.'/'.$dir.'/introduction'); // must not need this
        }

        /*
        if ($action=='saveCSS'){
            $dirCSS="CSS";
            $css_textarea=$_POST['code2'];
            //echo 'SAVE AS'.$css_textarea;break;
            //$dir='CSS';  //write to CSS directory
            $this->load->helper('file');
            $file_name=$_POST['save_as'];
            //echo 'SAVE AS'.$file_name;break;
            $data=$_POST;
            //echo $dir.' '.$title;break;

            //write_file('/CSS/'.'screen_bak1.css', $css_textarea);
            if ( ! write_file('../CodeIgniter/'.$dirCSS.'/'.'localCSS_bak2.css', $css_textarea))
            {
                echo 'Unable to write the file';
            }
            else
            {
                echo 'File written!';
            }
            // change this for general was stamps
            redirect('/Blogs/tutorials/'.$dir.'/'.$file_name);
        }


        if ($action=='saveAsLocalCSS'){
            $dirCSS="CSS";
            $css_textarea=$_POST['localCSSCode'];




            //echo 'SAVE AS'.$css_textarea;break;
            //$dir='CSS';  //write to CSS directory
            $this->load->helper('file');
            $file_name=$_POST['save_as'];
            //echo 'SAVE AS'.$file_name;break;
            $data=$_POST;
            echo $dir.' '.$title;break;

            //write_file('/CSS/'.'screen_bak1.css', $css_textarea);
            if ( ! write_file('../CodeIgniter/'.$dirCSS.'/'.'localCSS_bak2.css', $css_textarea))
            {
                echo 'Unable to write the file';
            }
            else
            {
                echo 'File written!';
            }
            // change this for general was stamps
            redirect('/Blogs/tutorials/'.$dir.'/'.$file_name);
        }

        /*
         *
         */
        /*
        if ($action=='saveAsJS'){
            $dirJS="js";
            $css_textarea=$_POST['code1'];
            //echo 'SAVE AS'.$css_textarea;break;
            //$dir='CSS';  //write to CSS directory
            $this->load->helper('file');
            //$file_name=$_POST['save_as'];
            //echo 'SAVE AS'.$file_name;break;
            //$data=$_POST;

            //echo_array($_POST);break;
            //echo $file_name.' '.$title;break;

            //write_file('/CSS/'.'screen_bak1.css', $css_textarea);
            if ( ! write_file('../CodeIgniter/'.$dirJS.'/'.'AAACtest.js', $css_textarea))
            {
                echo 'Unable to write the file';
            }
            else
            {
                //echo 'File written!';
            }
            // Redirect back to originating page for confirmation
            redirect('/Blogs/tutorials/'.$dir.'/'.$title);
        }



        if ($action=='delete'){

            if (is_file('../blog/'.$title.'dat') )
            {
                echo 'file deleted';
                unlink('../blog/'.$title.'dat');
            }
            else
            {
                echo 'File deleted!';
            }
            $this->load->view('editpost',$data);
        }
*/
    }





/* Provides a series of helper functions to
   edit/delete etc
   CSS, template files and the like
   default is stylesheet


*/

    function template($action='edit',$dir="aden",$title='stylesheet',$type='css'){
        $dir='../CodeIgniter/css';
        if ($action=='preview'){
            redirect('/Blogs/stamps/'.$dir.'/'.$title);
        }
        if ($action=='edit'){
            $data['message']='Edit CSS';
            $data['content']=(file_get_contents($dir.'/'.$title.'.'.$type));
            $data['preview']=false;
            $data['title']=$title;
            $data['location']=$dir;
            $data['category']='css files';
            $this->load->view('editcss',$data);
        }

/* This creates a new file and save it
   We first create a blank file
   Then we send info to template
   Since 'untitled' may exist we read
*/   
        $file_name='untitled.dat';
        $content='##Your Title Here';
        if (($action=='create')||($action=='new')){
            $this->load->helper('file');
            write_file('../'.$dir.'/'.$file_name, $content);
            if ( ! write_file('../'.$dir.'/'.$title.'dat', $content))
            {
                echo 'Unable to write the file';
            }
            else
            {
                echo 'File written!';
            }

            $data['content']=(file_get_contents('../'.$dir.'/'.$file_name));
            $data['preview']=false;
            $data['title']='';
            $data['filename']=$file_name;
            $data['location']=$dir;
            $data['category']='';
            $data['message']='Create New';
            $this->load->library('filterclass');
            //$this->filterclass->category($data['content'));
            $this->load->view('editpost',$data);}



        #### SAVE ACTION #####

        if ($action=='save'){
            $this->load->helper('file');
            $content=$_POST['content'];
            $file_name=$_POST['save_as'];
            $data=$_POST;
            //echo $dir.' '.$title;break;
            echo $file_name;break;
            write_file($dir.'/'.$file_name.'.'.$type, $content);
            if ( ! write_file($dir.'/'.$title.'.'.$type, $content))
            {
                echo 'Unable to write the file';
            }
            else
            {
                echo 'File written!';
            }


            //redirect('/Blogs/stamps/'.$dir.'/'.$file_name);

        }



        if ($action=='delete'){

            if (is_file('../blog/'.$title.'dat') )
            {
                echo 'file deleted';
                unlink('../blog/'.$title.'dat');
            }
            else
            {
                echo 'File written!';
            }
            $this->load->view('editpost',$data);
        }

    }


    //end class
}





?>