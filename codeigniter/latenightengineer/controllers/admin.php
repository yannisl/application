<?php

//include_once('../strings/markdown.php');
class Admin extends Controller {
    //controller for articles rather than galleries
    //it can also send images etc
    //missing is how to get the data
    //this is for to-morrow

    private $tmpl = array ( 'row_alt_start'  => '<tr style="background-color:#eee">' ,
                'heading_cell_start'   => '<td style="background-color:#222;color:#fff">',
    );
    private $tmpl_normal = array ( 'row_alt_start'  => '<tr style="background-color:inherit">' ,
                'heading_cell_start'   => '<td style="background-color:#bbb;color:#fff">',
    );


    

    //fragments of page views i.e., in this case forms

    private $fragments=array();

    private $ds;

    private $dbform=array(
                      'attributes'=>array(),
                      'controls'=>array(),
                        'action'=>array(),
                          'keys'=>array('submit',
                                  'cancel',
                                  'reset'),
                    'template'=>'grid_view',   //template  can be a partial
                    'pre_render'=>'add_js',     //hooks for actions i.e add javascript to head
                    'persistent'=>'%s.yaml'    // Can store all values to file
    );




    function Admin()
    {
        parent::Controller();
        $this->load->library('table','filterclass');
        $this->load->library('filterclass');
        $this->load->library('pagebuilder');
        $this->load->helper('form');
         $this->load->helper('file');
        $this->load->model('generic/generic');
        $this->load->library('parsecontrols');
        $this->load->library('spyc');
        $this->load->library('Tcontrol');
        $this->load->library('Tpanel');
        $this->load->library('Tlist');
        $this->load->dbutil();
        //$zobject=new test;
        //$session=$this->session;
        //echo_array($this->session->all_userdata());
        //$this->user=$this->session->userdata('DX_username');

    }

    function Index($view='admin_view',$title="Admin View")
    {
        //$this->load->view('stamps/'.$view,$data);
        self::show($view,$title);
    }



    function __tidy($template)
    {
        $config=array(
          'indent'=>true,
          'indent-spaces'=>2,
          'output-xhtml'=>true,
          'wrap'=>68,
          'force-output'=>true);
        $template = tidy_parse_string($template, $config);
        tidy_clean_repair($template);
        return $template;

    }
/* function to show a simple template

*/

    function show($view='admin_view',$title="Admin View"){
        //$this->load->view('stamps/'.$view,$data);
        $this->load->helper('inflector');
        $data['title']=humanize($title);
        //the true returns the final output here rather than the browser for
        //transclusions
        $template=$this->load->view('/admin/'.$view,$data,true);
        $template=$this->filterclass->filterAll($template);
        $this->__tidy($template);
        echo $template;

    }


    //create an input element
    //from old code needs to be in a library or extend forms!
    //places each control in a div with a special class

    function __input($v){
        //prepares a checkbox
        //properties 'name'=>'name="%s" ',
        $attribute='';

        foreach ($v as $key=>$value){
            //echo $key .', ';
            if (array_key_exists(trim($key),$this->parsecontrols->properties)){
                $attribute .=sprintf($this->parsecontrols->properties[$key],$value);
            }
        }

        $s="<div>\n";
        if (isset($v['before'])) {$s.=$v['before'];}
        $s.=sprintf('<input %s />'."\n",$attribute);
        if (isset($v['after'])) {$s.=$v['after'];}
        $s.="</div>\n";
        return $s;
    }
    //Internal for Yaml
    //creates a button
    function __button($v){
        //prepares a button
        //properties 'name'=>'name="%s" ',
        $attribute='';
        //echo_array($v);
        foreach ($v as $key=>$value){
            //echo $key .', ';
            if (array_key_exists(trim($key),$this->parsecontrols->properties)){
                $attribute .=sprintf($this->parsecontrols->properties[$key],$value);
            }
        }
        $s="<div>\n";
        if (isset($v['before'])) {$s.=$v['before'];}
        $s.=sprintf('<input %s />'."\n",$attribute);
        if (isset($v['after'])) {$s.=$v['after'];}
        $s.="</div>\n";
        return $s;
    }

    function __button2($v){
        //prepares a button
        //properties 'name'=>'name="%s" ',
        $attribute='';
        //echo_array($v);
        foreach ($v as $key=>$value){
            //echo $key .', ';
            if (array_key_exists(trim($key),$this->parsecontrols->properties)){
                $attribute .=sprintf($this->parsecontrols->properties[$key],$value);
            }
        }
        $s="<div>\n";
        if (isset($v['before'])) {$s.=$v['before'];}
        $s.=sprintf('<button %s />'."\n",$attribute);
        if (isset($v['text'])) {$s.=$v['text'];}
        if (isset($v['img'])) {$s.=''.$v['img'].'';}
        $s.='</button>';
        if (isset($v['after'])) {$s.=$v['after'];}
        $s.="</div>\n";
        return $s;
    }

    function __textarea($v){
        //prepares a button
        //properties 'name'=>'name="%s" ',
        $attribute='';
        //echo_array($v);
        foreach ($v as $key=>$value){
            //echo $key .', ';
            if (array_key_exists(trim($key),$this->parsecontrols->properties)){
                $attribute .=sprintf($this->parsecontrols->properties[$key],$value);
            }
        }
        $s="<div>\n";
        if (isset($v['before'])) {$s.=$v['before'];}
        $s.=sprintf('<textarea %s >'."\n",$attribute);
        if (isset($v['text'])) {$s.=$v['text'];}
        if (isset($v['img'])) {$s.=''.$v['img'].'';}
        $s.='</textarea>';
        if (isset($v['after'])) {$s.=$v['after'];}
        $s.="</div>\n";
        return $s;
    }

    function __getAttributes($val){
        $attribute='';
        foreach ($val as $k1=>$v1){
            if (array_key_exists(trim($k1),$this->parsecontrols->properties)){
                $attribute .=sprintf($this->parsecontrols->properties[$k1],$v1);
            }
        }
        return $attribute;
    }

    function __select($v){
        //selct attributes from yaml file
        //prepares a select

        //prepare the attributes for the select

        $attribute='';
        foreach ($v as $key=>$value){
            if (array_key_exists(trim($key),$this->parsecontrols->properties)){
                $attribute .=sprintf($this->parsecontrols->properties[$key],$value);
            }
        }
        $s='<div style="width:45%;border:1px solid #ff0000;float:left">';
        $s.='<p>'.$v['caption'].'</p>';
        $s.='<select '.$attribute.'" style="width:80%"'.'">"';
        //echo $attribute;
        //load file
        $array = $this->spyc->YAMLLoad('../CodeIgniter/data/country.yaml');
        //echo_array($array);
        $option_string='';
        //This would be better recursive but I was feeling
        //sleepy!
        foreach($array as $key=>$value){
            //check for optgroup first
            $option_string.=sprintf('<optgroup label="%s">'."\n",$key);
            if (is_array($value)){
                foreach($value as $k=>$val){
                    //check if the option has properties
                    //if is array it is assumed to have properties
                    if (is_array($val)){$theVal=$k;
                        $attribute= $this->__getAttributes($val);
                        $option_string.=sprintf('<option label="%s" %s >%s',$k, $attribute, $theVal);
                        $option_string.=sprintf('</option>'."\n");
                    }
                    else
                    {$theVal=$val;
                        $option_string.=sprintf('<option label="%s">%s',$k,$theVal);
                        $option_string.=sprintf('</option>'."\n");
                    }

                }
                $option_string.=sprintf('</optgroup>'."\n");
            }
        }
        //echoPRE(htmlentities($option_string));
        $s.=$option_string;
        $s.='</select>';
        $s.='</div>';
        $s.='<div style="clear:both"></div>';
        return $s;




    }

 function yaml($title='registration'){
 /*loads a yaml file
 this is not actually the place. It should be loaded in model
 but is here for convenience
 $title is the full path to yaml file but no extension
 */

        //load the Parsecontrols library
        $this->load->library('parsecontrols');
        //load YAML parser
        $this->load->library('spyc');
        //load all the yaml info into an array variable
        $array = $this->spyc->YAMLLoad('../CodeIgniter/data/'.$title.'.yaml');
        //echo '<pre><a href="../CodeIgniter/data/'.$title.'">spyc.yaml</a> loaded into PHP:<br/>';
        //first check what type of component it is!
        $s='';

        //parse outer for name, buttons and text
        foreach ($array as $outer_key=>$outer_value){

            foreach ($array['form'] as $key=>$value){

                //if is array it goes deeper

                if (is_array($value)){
                    foreach($array['form'][$key] as $k=>$v){
                        //v is an array
                        //checks type

                        //only one level so slightly different from fields
                        //so we call it only on dts
                        if ( $key =='datasource' && $v=='dts'){
                            //calls the datasource for the table. If table does not exist it will
                            //created automatically
                            //need to be set after fields are parsed;

                            //$msg=$this->__datasource($value);
                        }

                        if (isset($v['type']) && $v['type'] =='text'){
                            //pr($v['type']);
                            //echo_array($array['form'][$key][$k]);
                            $s.=$this->__input($v);
                        }

                        if (isset($v['type']) && $v['type'] =='checkbox'){
                            $s.=$this->__input($v);
                        }

                        if (isset($v['type']) && $v['type'] =='radio'){
                            //pr($v['type']);
                            //echo_array($array['form'][$key][$k]);
                            $s.=$this->__input($v);
                        }
                        if (isset($v['type']) && ($v['type'] =='submit'||$v['type'] =='reset')){
                            //pr($v['type']);
                            //echo_array($array['form'][$key][$k]);
                            $s.=$this->__button($v);
                        }
                        if (isset($v['type']) && $v['type'] =='button'){
                            //pr($v['type']);
                            //echo_array($array['form'][$key][$k]);
                            $s.=$this->__button2($v);
                        }
                        if (isset($v['type']) && $v['type'] =='textarea'){
                            //pr($v['type']);
                            //echo_array($array['form'][$key][$k]);
                            $s.=$this->__textarea($v);
                        }
                        if (isset($v['type']) && $v['type'] =='select'){
                            //pr($v['type']);
                            //echo_array($array['form'][$key][$k]);
                            $s.=$this->__select($v);
                        }

                    }
                }


            }


            $this->parsecontrols->html_text[]="The final form <br />";
            $this->parsecontrols->html_text[]=$s;
            //$this->parsecontrols->render();
            $data['title']='View of Yaml File '.$title.' as a PHP array';
            $data['feature']='Yaml and more yaml!';
            $data['content']=$array;
            //place into $data all the form details
            //at this point we should use tidy maybe as fragment
            $data['form']=$s;
            //print_r($array);
            //echo '</pre>';
            $this->load->view('yaml_view',$data);

        }
    }
    /** API for saving files
     *  this is non ajax for defaulting
     *  need to have an ajax one as well
     *  keep forgetting how to in PHP
     */
   function api($action='save', $dir="js", $file_name='test.js',  $title='alexander-sheversky',$type='js'){
       $file_content = $_POST['code1'];
       //$this->load->helper('file');
       // common loading at top
       //echo_array($_POST);
       //echo('../CodeIgniter/'.$dir.'/'.$file_name);
      // break;
       if ( ! write_file('../CodeIgniter/'.$dir.'/'.$file_name, $file_content)){
           echo 'Unable to save the file';
       }
       else{
           echo 'server says...'.$file_name.'... saved!';
       }
   }

    

    function post($action='edit',$dir="aden",$title='alexander-sheversky',$file_name='test',$type='dat'){

        // preview is not saving TODO
        if ($action=='preview'){
            redirect('/Blogs/tutorials/'.$dir.'/'.$title);
        }

        // actioning for edit major routine
        if ($action=='edit'){
            //example how to get one post and edit it!
            $data['message']='Edit Post';
            $data['content']=(file_get_contents('../'.$dir.'/'.$title.'.'.$type));
            // need to have it set based on some config
            // like Drupal
            $data['content']=htmlentities($data['content']);
            $data['preview']=false;
            $data['title']=$title;
            $data['location']=$dir;

            $this->load->library('filterclass');
            //$this->filterclass->category($data['content'));
            //$data['category']=$this->filterclass->category($data['content']);//'book, other, boer';
            //$data['category']='books';
            $category=$this->filterclass->category($data['content']);//'book, other, boer';
            if (is_array($category)){
                $s='';
                foreach ($category as $key=>$value){
                    $s.=$value;
                }
            }
            else{
                $data['category']=$category;}


            $this->load->view('editpost',$data);
        }

/* This creates a new file and save it
   We first create a blank file
   Then we send info to template
   Since 'untitled' may exist we read
*/   
       

        $content='##Your Title Here';
         if (($action=='create')||($action=='new')){
            $file_name='untitled.dat';
            $this->load->helper('file');
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



        #### SAVE ACTION #####
        #### both save and save as works from here
        
        if ($action=='save'){
            $this->load->helper('file');
            $content=$_POST['content'];
            $file_name=$_POST['save_as'];
            $data=$_POST;
            //echo $dir.' '.$title;
            //echo $file_name;
            //echo $_POST['save_as'];
            //echo_array($_POST);
           // break;
            write_file('../'.$dir.'/'.$file_name.'.dat', $content);
            if ( ! write_file('../'.$dir.'/'.$file_name.'.dat', $content))
            {
                echo 'Unable to write the file';
            }
            else
            {
                echo '...File written!';
            }
            // change this for general was stamps
            redirect('/Blogs/tutorials/'.$dir.'/'.$file_name);
        }

        /* CSS SAVES
         *  New added to save by type css */

        /* CSS SAVES
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

        /*  SAVE AS JAVASCRIPT */
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
                echo 'File written!';
            }
            $this->load->view('editpost',$data);
        }

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


    

    function __optimize_table($db,$table='user'){

        if ($this->dbutil->optimize_table($table))
        {
            echo 'Success!';
        }
    }


    function __repair_table($db,$table='user'){

        if ($this->dbutil->repair_table($table))
        {
            echo 'Success!';
        }
    }

/* Creates a new database
*/
    function __create_db_form()
    {
        //returning from form
        if (!empty($_POST)){
            $dbname=$_POST['dbname'];

            if ($this->dbforge->create_database($dbname))
            {
                $s='Database created!';

                $s.='SUCCESSFULLY CREATED NEW DATA BASE WITH NAME '.$dbname;
                $s.='<hr />';
                $s.=anchor('admin/dbutil/create-db','click here to create another one');
                $s.='<hr />';
            }
        }
        else
        {
            $dbname='database name default';

            $this->load->helper('form');
            $s=form_open('admin/dbutil/create-db/1');
            $data = array(
              'name'        => 'dbname',
              'id'          => 'dbname',
              'value'       => $dbname,
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:50%',
            );
            $s.=form_input($data);
            $data = array(
    'name' => 'button',
    'id' => 'button',
    'value' => 'true',
    'type' => 'submit',
    'content' => 'create'
            );
            $s.=form_button($data);
            $s.=form_close();
            $s.='<hr/>';
        }

        return $s;
    }


    function __create_db($db_name='test2'){
        //show form for input

        $s=$this->__create_db_form();
        $data['content']=$s;
        $database_list=$this->__list_db($db_name);
        $data['content'].=$this->__print_table($database_list);

        return $data['content'];
    }

/* Creates a new database
*/
    function __drop_db_form()
    {
        $dbname=$this->uri->segment(4);
        //echo $dbname;break;
        //returning from form
        if (!empty($_POST) && (isset($_POST['confirm']))){
            $dbname=$_POST['dbname'];
            if (!$_POST['confirm']=='true'){redirect('/CodeIgniter/admin/dbutil/drop-db/');}

            //echo_array($_POST);break;

            {
                if ($this->dbforge->drop_database($dbname)){
                    $s='Successfully dropped data base: '.$dbname;
                    $s.='<hr />';
                    $s.=anchor('admin/dbutil/create-db','click here to create another one');
                    $s.='<hr />';}
            }
        }
        else
        {
            //$dbname='database name default';

            $this->load->helper('form');
            $s=form_open('admin/dbutil/drop-db/');
            $data = array(
              'name'        => 'dbname',
              'id'          => 'dbname',
              'value'       => $dbname,
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:50%',
            );
            $s.=form_label('Please confirm that you want to delete this database');
            $s.=form_input($data);
            $data = array(
    'name' => 'confirm',
    'id' => 'button',
    'value' => 'true',
    'type' => 'submit',
    'content' => 'confirm'
            );
            $s.=form_button($data);
            $data = array(
    'name' => 'button',
    'id' => 'button',
    'value' => 'true',
    'type' => 'submit',
    'content' => 'abort'
            );
            $s.=form_button($data);
            $s.=form_close();
            $s.='<hr/>';
        }

        return $s;
    }

/*******************************************
  Function to drop a database
  call with care or back-up your database
  please!

*********************************************/

    function __drop_db($db_name='test2'){
        //show form for input

        $s=$this->__drop_db_form();
        $data['content']=$s;
        $database_list=$this->__list_db($db_name);
        $data['content'].=$this->__print_table($database_list);

        return $data['content'];
    }


/**********************************************


***********************************************/

    function __print_table($data){

        $this->table->set_heading('edit','drop','database','tables','back-up','repair','optimize');
        $this->table->set_template($this->tmpl);

        foreach ($data as $key=>$value)
        {
            $link_edit=sprintf('<a href="/CodeIgniter/admin/dbutil/edit-db/%s"><img src="http://localhost/egypt/CMS/b_edit.png" title="%s" /></a>',$value,$value);
            $link_drop=sprintf('<a href="/CodeIgniter/admin/dbutil/drop-db/%s"><img src="http://localhost/egypt/CMS/b_drop.png" title="%s" /><a>',$value,$value);
            $link_optimize=sprintf('<a href="/CodeIgniter/admin/dbutil/optimize-db/'.$value.' ttle="optimize">tables</a>',$value);
            $this->table->add_row($link_edit,$link_drop,
                $value,'<a href="/CodeIgniter/admin/dbutil/list-tables/'.$value.'">tables</a>','back-up','repair',$link_optimize);
        }
        return $this->table->generate();

    }


/*************************************************

 Prepares and returns a string with a table
 listing all the tables in a db

*************************************************/
    function __print_tables_list($db_name,$data)
    {
        $this->table->set_heading('table','fields','back-up','repair','optimize');
        $this->table->set_template($this->tmpl);
        foreach ($data as $key=>$value)
        {

            $table_link=sprintf('<a href="/CodeIgniter/admin/dbutil/browse/%s/%s">%s</a>',$db_name,$value,$value);
            $this->table->add_row($table_link,'<a href="/CodeIgniter/admin/dbutil/list-fields/'.$db_name.'/'.$value.'">fields</a>','back-up','repair','optimize');
        }
        return $this->table->generate();

    }

    //-------------------------------------------------------


/**

 Displays a list of all fields and their properties
 in a table

*/
    function __print_fields_list($db_name,$data){
        $this->load->library('table');
        $this->table->set_heading('field','type','constraint','default','primary index','View');
        $this->table->set_template($this->tmpl);
        foreach ($data as $field)
        {
            $field_type=$field->type;
            $field_max_length=$field->max_length;
            $this->table->add_row($field->name,$field_type,$field_max_length,$field->default,$field->primary_key,'<img src="http://localhost/egypt/CMS/b_browse.png" title="browse distinct values"');
        }
        return $this->table->generate();
    }

    //------------------------------------------------------------



   function __print_tables_browse($db_name,$table_name,$headings,$data,$message='retrieved successfully')

    {

        $img=array('<input type="checkbox" />',
 '<img src="http://localhost/egypt/CMS/b_edit.png" title="edit" />',
 '<img src="http://localhost/egypt/CMS/b_drop.png" title="delete" />'
        );

        $z=array_values($headings);
        $z=array_merge($img,$z);
        $this->table->set_heading($z);
        $tmpl = array ( 'row_alt_start'  => '<tr style="background-color:#eee">' ,
                'heading_cell_start'   => '<td style="background-color:#f60;color:#000">',
        );
        $this->table->set_caption('Colors');
        $this->table->set_template($this->tmpl);


        $i=0;
        foreach ($data->result() as $row)
        {
            $values='';
            $j=0;
            foreach ($row as $key=>$value){

                if ($j<1){
                    $checkbox_link=sprintf('<a href="http://localhost/CodeIgniter/admin/dbutil/show_record/%s/%s/%s/%s">',
                        $db_name,$table_name,$key,$value);

                    $delete_link=sprintf('%s/%s/%s/%s',
                        $db_name,$table_name,$key,$value);

                    $img2=array('<input type="checkbox" />',$checkbox_link
                        .'<img src="http://localhost/egypt/CMS/b_edit.png" title="edit row '.$value.'" /></a>',
 '<a href="http://localhost/CodeIgniter/admin/dbutil/delete_record/'.$delete_link.'"><img src="http://localhost/egypt/CMS/b_drop.png" title="delete" /></a>'
                    );}
                //echo_array($value);

                $values[]=$value;
                $j=$j+1;
            }



            // $values=array_merge($img,$values);
            $this->table->add_row(array_merge($img2,$values));
            $i=$i+1;
        }
        //echo $values;break;
        return $this->table->generate();

    }


   function __connect($db_name='WORDPRESS',$table_name='wp_postmeta',
        $result='')
    {
        $config['hostname'] = "localhost";
        $config['username'] = "root";
        $config['password'] = "";
        $config['database'] = $db_name;
        $config['dbdriver'] = "mysql";
        $config['dbprefix'] = "";
        $config['pconnect'] = TRUE;
        $config['db_debug'] = TRUE;
        $config['cache_on'] = FALSE;
        $config['cachedir'] = "";
        $config['char_set'] = "utf8";
        $config['dbcollat'] = "utf8_general_ci";

        $DB=$this->load->database($config,TRUE);
        return $DB;
    }

    //provides information on MySQL
    //can be expanded a bit further actually for all function
    function __DB_info()
    {
        $functions_array=array('mysql_get_client_info',
                            'mysql_get_server_info',
                            'mysql_list_processes',
                            'mysql_proto_info',
                            'mysql_get_host_info',
                            'mysql_stat',
                            'mysql_client_encoding',
                            'mysql_list_processes');
        $ds=$this->db->conn_id;
        //echo $ds;
        $link = mysql_connect('localhost', 'root', '');
        foreach ($functions_array as $function){
            if (function_exists($function))
            {
                $result[]=call_user_func($function);
                echo $function.'  ';
            }
        }
        echo_array($result);break;
        return $result;

    }

    function __browse($db_name='WORDPRESS',$table_name='wp_postmeta',$action=1,$sql='')
    {
        //connect to database
        $DB3=$this->__connect($db_name,$table_name);
        $query=$DB3->get($table_name);
        //headings for table
        $fields = $DB3->list_fields($table_name);
        //echo_array($fields);
        //we need to iterate to get all results from all rows
        foreach($query->result() as $row){
            //foreach ($fields as $key=>$value)

        }
        $table_values=$this->__print_tables_browse($db_name,$table_name,$fields,$query,
            $message='retrieved successfully');
        return $table_values;
    }




    function __list_tables($dbname){
        $DB1=$this->__connect($dbname);
        $tables=$DB1->list_tables();
        return $tables;
    }


    function __list_fields($dbname,$table_name){

        $DB1=$this->__connect($dbname,$table_name);
        $fields = $DB1->list_fields($table_name);
        $fields_data = $DB1->field_data($table_name);
        foreach ($fields_data as $field)
        {
            echo $field->name;
            echo $field->type;
            echo $field->max_length;
            echo $field->primary_key;
        }
        return($fields);
    }



    function __list_fields_data($dbname,$table_name){
        $DB1=$this->__connect($dbname,$table_name);
        $fields = $DB1->list_fields($table_name);
        $fields_data = $DB1->field_data($table_name);
        return($fields_data);
    }

    //Gets the primary field
    //If it does not exist
    //assumes the first field is the
    //primary
    //needs a bit of work

    function _get_primary($fields)
    {
        //finds the primary field if it exists

        foreach ($fields as $field){
            if ($field->primary_key){
                $index=$field->name;
            }
            $field_names[]=$field->name;
        }

        if (!isset($index))
        {
            $index=$field_names[0];
        }
        return $index;
    }



    function __table_status($dbname,$table_name){
        $sql = 'SHOW TABLE STATUS FROM `photo_ikons`';
    }

    //---------------------------------------------------------------


/*
This function is used to show a record automatically from
a database and a table based on some selection criteria
*/

    function show_record($dbname='MEP',$table_name='role',
        $record_number=1,$sql='')
    {
        //connect and get field names, index etc;
        $record_number=$this->uri->segment(7);
        $DB1=$this->__connect($dbname,$table_name);
        $fields_data=$this->__list_fields_data($dbname,$table_name);
        $index=$this->_get_primary($fields_data);

        $sql= "SELECT *
        FROM ".$table_name ." WHERE ".$index."='".$record_number."' LIMIT 0 , 30" ;
        $query=$DB1->query($sql);
        $query->result_array();
        foreach ($query->result_array[0] as $key=>$value){
            $fields[]=$key;
            $values[]=$value;
        }

        $i=0;
        for ($i=0;$i<(count($query->result_array[0]));$i++)
        {

            $input_data = array(
                'name'        => $fields[$i],
                'id'          => $fields[$i],
                'value'       => $values[$i],
                'maxlength'   => '100',
                'size'        => '50',
                'style'       => 'width:50%',
                'info'        =>'image'
            );

            $input_string=form_input_special($input_data);

            $this->table->add_row($fields[$i],$input_string);

        }

        $this->table->set_heading('field','edit');
        $this->table->set_caption('Show Record Table');
        $this->table->set_template($this->tmpl);


        $attributes = array('class' => 'email',
                             'id' => 'myform');
        $s=form_open('admin/dbutil/save_record/'.$dbname.'/'.$table_name.'/'.'/'.$index.'/'.$record_number);
        $s.=$this->table->generate();
        $s.=form_submit('mysubmit', 'Submit Post!');
        $s.=form_close();
        return $s;
    }

    //------------------------------------------------------------------------


/***************************************************************
  This function is used to add a record automatically from
  a database and a table based on some selection criteria

****************************************************************/

    function add_record($dbname='MEP',$table_name='role',
        $record_number=1,$sql='')
    {
        $this->output->enable_profiler(TRUE);
        $this->load->library('Tcontrol');
        $this->load->library('dropdown');
        //  we get all the table meta data
        //  everything you want to know about fields
        //  and more

        $this->load->library('tablesmeta');
        $table_meta=$this->tablesmeta->main($dbname,$table_name);

        //set output table vars
        $this->table->set_template($this->tmpl_normal);
        $this->table->set_heading('field','edit');
        $this->table->set_caption('add record');

       // set the rows, made up of blocks
       // of inputs
        
        foreach ($table_meta as $block )

        {
            foreach ($block as $obj){
               // echoPRE('IN ADMIN');
               // echo_array($obj);//exit;
                //echo_array($obj);exit;
                switch ($obj['name']['input']){
                    case 'textarea_input':
                        //echo_array($obj);
                        $attributes=$obj['attributes'];
                        $attributes['rows'] = '8';
                        //$attributes['cols'] = $obj['max_length'];
                        // 'style'       => 'width:70%;height:150px',
                        //now get text area string
                        $s=$this->dropdown->textarea($attributes);
                        $this->table->add_row($obj['human_name'],$s);
                        // $this->table->set_template($this->tmpl_normal);
                        break;
                    case 'text_input':
                        $attributes=$obj['attributes'];
                        //get the form input
                        $input_element=form_input_special($attributes);
                        //add row with human readable fieldname
                        $this->table->add_row($obj['human_name'],$input_element);
                        // echoPRE('IN SWITCH');echo_array($obj);break;
                        break;
                    case 'int_input':
                        $attributes=$obj['attributes'];
                        //get the form input
                        $input_element=form_input($attributes);
                        //add row with human readable fieldname
                        $this->table->add_row($obj['human_name'],$input_element);
                        break;

                    case 'datepicker':
                        $this->load->library('Tcontrol');
                        $this->load->library('dropdown');
                        $attributes=$obj['attributes'];
                        $s=$this->dropdown->datepicker($attributes);
                        $this->table->add_row($obj['human_name'],$s);
                        
                        break;

                    case 'option_input':
                        //echo 'in option input ';exit;
                        $this->load->library('Tcontrol');
                        $this->load->library('tabs');
                        $attributes=$obj['attributes'];
                        $s=$this->tabs->example_tabs($attributes);
                       // $this->table->add_row($obj['human_name'],$s);

                         $list3 = $this->spyc->YAMLLoad('../CodeIgniter/data/month.yml');
                         $s=$this->dropdown->check_box_list($list3,4);
                         $this->table->add_row($obj['human_name'],$s);

                        break;
                     case 'accordion_input':
                        //echo 'in option input ';exit;
                        $this->load->library('Tcontrol');
                        $this->load->library('accordion');
                        $attributes=$obj['attributes'];
                        $accordion['id']='accordion2';
                        $accordion['autoHeight']='false';
                        $accordion['active']='4';
                        $accordion['tab_titles']=array('CodeIgniter','Sexy','Very Sexy',
                                    'Top Girl','To Die For','Che Again',
                                     'More','More Che');
                        $s=$this->accordion->get_accordion($accordion);
                        $s='<div style="width:50%">'.$s.'</div>';
                       // $this->table->add_row($obj['human_name'],$s);

                         $this->table->add_row($obj['human_name'],$s);

                        break;


                    default:
                        
                        //balance default as text inputs
                        //get all attributes for rendering from object
                        $attributes=$obj['attributes'];

                        //get the form input
                        $input_element=form_input($attributes);

                        //add row with human readable fieldname
                        $this->table->add_row($obj['human_name'],$input_element);
                        //echoPRE('IN DEFAULT');
                    }

                }
            }
            //render form
            $index=$this->uri->segment(6);
            $record_number=$this->uri->segment(7);
            //echo $index.'  ';
            //echo $record_number;

            //  now we create the form
            //  first we call the library auto_form
            //  we need to give the form a unique id
            $content=$this->table->generate();
            $form_id='add_record';
            $form_class='add_record';
            $action='admin/dbutil/insert_record/'.$dbname.'/'.$table_name.'/'.$index.'/'.$record_number;
            $button='submit';
            $button_name='mysubmit';
            $attributes = array('class' =>$form_class,
                               'id' =>$form_id,
                               'action'=>$action,
                $button=>$button_name,
                               'submit_message'=>'Submit Post',
                               'content'=>$content
            );

            $this->load->library('formsauto');
            $s=$this->formsauto->render($attributes);
        /*$s=form_open('admin/dbutil/insert_record/'.$dbname.'/'.$table_name.'/'.$index.'/'.$record_number);
        $s.=$content;
        $s.=form_submit('mysubmit', 'Submit Post!');
        $s.=form_close();*/
            return $s;
        }





/*
This function is used to save a record automatically from
a database and a table based on some selection criteria
*/

        function save_record($dbname='MEP',$table_name='role',$record_number=1,$sql=''){
            $index=$this->uri->segment(6);
            $record_number=$this->uri->segment(7);

            $this->__connect($dbname,$table_name);

            $fields_data=$this->__list_fields_data($dbname,$table_name);
            $index=$this->_get_primary($fields_data);



            foreach ($fields_data as $field){
                if ($field->primary_key){
                    $index=$field->name;
                }
                else
                {
                    $field_names[]=$field->name;}
            }




            foreach ($field_names as $key=>$value)
            {
                $data[$value]=$_POST[$value];
                //echo $value;
            }

            //echo_array($data);break;
            $this->db->where($index, $record_number);
            $this->db->update($table_name, $data);

            $keys=(array_keys($data));
            $values=(array_values($data));

            //map to table
            $this->load->library('table');
            $i=0;
            $num_fields=count($keys);
            for ($i=0;$i<$num_fields;$i++){
                $this->table->add_row($keys[$i],$values[$i]);
            }

            $this->table->set_heading('field','Value');
            $this->table->set_caption('Save Table');
            $this->table->set_template($this->tmpl);
            $s=$this->table->generate();
            $s.='<a href="http://localhost/CodeIgniter/admin/dbutil/browse/'.$dbname.'/'.$table_name.'">Click to Edit More</a>';
            return $s;
        }


/*******************************************************

  This function is used to insert a record automatically from
  a database and a table based on some selection criteria
  $this->db->where('id', $id);
  $this->db->delete('mytable');

*********************************************************/

        function insert_record($dbname='MEP',$table_name='role',$record_number=1,$sql='')
        {
            $index=$this->uri->segment(6);
            $record_number=$this->uri->segment(7);
            $this->generic->index=$this->uri->segment(6);
            $this->generic->record_number=$this->uri->segment(7);
            $this->generic->dbname=$dbname;
            $this->generic->table_name=$table_name;
            //perform the action by going to the generic
            //model
            //return with string fragment for view
            $s=$this->generic->insert_record();
            //check default actions after insert
            return $s;
        }

/*************************************************************

  This function is used to DELETE a record automatically from
  a table based on some selection criteria

***************************************************************/
        function delete_record($dbname='',$table_name='',$record_number=1,$sql='')
        {
            $this->generic->index=$this->uri->segment(6);
            $this->generic->record_number=$this->uri->segment(7);
            $this->generic->dbname=$dbname;
            $this->generic->table_name=$table_name;
            $this->generic->delete_record();
            $s='<a href="http://localhost/CodeIgniter/admin/dbutil/browse/'.$dbname.'/'.$table_name.'">Click to Delete More</a>';
            return $s;
        }

/*****************************************************************

  This function optimizes a database, unfortunately so far only
  works with current database

*****************************************************************/

        function __optimize_db($dbname='WORDPRESS',$table_name=''){
            //needs work dbutil does not seem to be working

            $this->__connect($dbname,$table_name);
            $this->load->dbutil();
            $result = $this->dbutil->optimize_database();

            if ($result !== FALSE)
            {
                $this->load->library('table');
                $this->table->set_heading('Table','Optimize Status');
                $this->table->set_caption('Save Table');
                $this->table->set_template($this->tmpl);

                foreach ($result as $key=>$value)
                {
                    $this->table->add_row($key,implode($value,', '));
                }

                $s=$this->table->generate();
            }

            return $s;
        }







        function __backup_db(){

            // Load the DB utility class
            $this->load->dbutil();
            $prefs = array(

                'format'      => 'txt',             // gzip, zip, txt
                'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
                'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
                'newline'     => "\n"               // Newline character used in backup file
            );

            // Backup your entire database and assign it to a variable
            $backup =$this->dbutil->backup($prefs);

            // Load the file helper and write the file to your server
            $this->load->helper('file');
            write_file('CodeIgniter/data/mybackup.txt', $backup);

            // Load the download helper and send the file to your desktop
            $this->load->helper('download');
            force_download('mybackup.txt', $backup);
        }

        // --------------------------------------------------------------
/** Creates a table based on user input
/*  Totally based on MySQL
    althought tried to jave it as best as possible
*/

        function __create_table($dbname="photo_ikons",$table_name='new_table')
        {

            //loads all standard drop downs - they are in plugin
            $this->load->plugin('controls');
            $field_types=drop_down('field_types');
            $collation_types=drop_down('collation_types');
            $attributes=drop_down('attributes');
            $null=drop_down('null');
            //loads libraries etc
            $this->load->helper('form');
            $this->load->library('table');
            //set table output and templates
            $this->table->set_template($this->tmpl_normal);
            $this->table->set_caption('Create Table');
            $this->table->set_heading('field','attributes','Null');

            for ($i=0;$i<5;$i++){
                $field_input=form_input('field','');
                $s=$field_types;
                $length=form_input('Length/values','');
                $default=form_input('field','');
                $extra=form_input('extra','');
                //$this->table->add_row($field_input,$attributes,$null);
                $this->table->add_row($field_input,
                        'type',
                    $field_types);
                $this->table->add_row('',
                        'length/value',
                    $length);
                $this->table->add_row('',
                        'attributes',
                    $attributes);
                $this->table->add_row('',
                        'null',
                    $null);
                $this->table->add_row('',
                        'default',
                    $extra);
                $this->table->add_row('',
                        'collation',
                    $collation_types);
                $this->table->add_row('',
                        'extra',
                    $extra);

                $data = array(
                    'name'        => 'key'.$i,
                    'id'          => 'key',
                    'value'       => 'accept',
                    'checked'     => TRUE,
                    'style'       => 'margin:5px',
                );

                $this->table->add_row('','Primary ',form_radio($data));
                $this->table->add_row('','Index',form_radio($data));
                $this->table->add_row('','Unique',form_radio($data));
                $this->table->add_row('','No Key',form_radio($data));
                $data = array(
      'name'        => 'full_text',
      'id'          => 'full_text',
      'value'       => 'accept',
      'checked'     => FALSE,
      'style'       => 'margin:10px',
                );

                $this->table->add_row('','Full text',form_checkbox($data));
                // Would produce
                $this->table->add_row('','','');
            }
            $s=form_open('/admin/dbutil/create-table/r');
            if (isset($_POST)&&!empty($_POST))
            {
                $this->load->dbforge();

                $fields = array(
                        'blog_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 5,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                    ),
                        'blog_title' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                    ),
                        'blog_author' => array(
                                                 'type' =>'VARCHAR',
                                                 'constraint' => '100',
                                                 'default' => 'King of Town',
                    ),
                        'blog_description' => array(
                                                 'type' => 'TEXT',
                                                 'null' => TRUE,
                    ),
                );

                $this->dbforge->add_field($fields);
                $this->dbforge->add_key('blog_id');
                // gives PRIMARY KEY `blog_id` (`blog_id`)



                $this->dbforge->create_table('a_table', TRUE);
                // gives CREATE TABLE IF NOT EXISTS table_name
                // gives KEY `blog_name_blog_label` (`blog_name`, `blog_label`)
                $s.=anchor('admin/dbutil/create-table/?','Click here to create another one');
                $s.='SUCCESSFUL';
                $s.=echo_array($_POST);
            }
            else
            {
                $s.=form_label('Create new table on database '.$dbname.' with table name : ');
                $s.=form_input($table_name,$table_name,array('enabled'=>'false'));
                $s.=$this->table->generate();
                $s.= form_submit('submit','submit');
                $s.=form_close();
            }

            //return all data as view for output to template
            return $s;

        }

        //get the table with a select all from model
        //loads a generic model
        function get_all($dbname,$table_name)
        {
            $this->generic->init($this->uri->segment(4),$this->uri->segment(5));
            $s=$this->generic->get_all($dbname,$table_name);
            return $s;
        }

        //just a convenience method for testing
        //filtering
        //needs work
        //should go to generic

        function __get_filtered_query($dbname='project',$table_name='document_types',
            $column='doc_description',$limit='20',$asc='asc')
        {
            $this->__connect($dbname, $table_name);
            $this->db->select($column);
            $this->db->order_by($column,$asc);
            $this->db->from($table_name);
            $this->db->limit($limit);
            $query = $this->db->get();
            foreach ($query->result() as $row)
            {
                $list[$row->$column]=$row->$column;
            }
            return $list;
        }

        function menu_list()
        {
            $this->load->library('Tcontrol');
            $this->load->library('Timagelist');
            $this->load->library('Tlist');
            $v=$this->tlist->create('axel-01','',TRUE);
           // echo_array($v);
            $s=$this->tlist->parse_template($v);

            $blog=(file_get_contents('../cms/Classes_Tlist.dat'));
            $s.=markdown($blog);
            $data['title']='The Tlist Class';
            $data['content']=$s;
            $data['panel']='';

            $view='admin/admin_generic_view';

            return $s;
        }






/******************************************************************

 *
 *  Main router function
 *  for components
 *  examples
 *
 *

******************************************************************/

 function component($function='list-db',$dbname='photo_ikons',$table_name='country',
            $view='admin_view',$var2='NUL',$var3='NUL',$result='false')

        {
            $data['title']='TESTING COMPONENTS';
            $data['article_title']='DEFAULT';
            $data['content']='';
            $data['panel']='';

            $data=array(
                'title'=>'Downloaded a back-up of the '.$dbname ,
                'content'=>' ',
            );
            $view='/admin/admin_plain_view';

            
            if ($function=='utilities'){
                $this->load->library('tpanel');
                $class="tpanel";
                $s=$this->tpanel->get('date',$data);
                $s.=$this->tpanel->get('navigation_menu',$data);
               // $s.=$this->tpanel->get('masthead',$data);
                $s.=$this->tpanel->get('spacer',$data);
                $this->load->library('tcontrol');
                $this->load->library('ttable');
                $s.=$this->ttable->parse_template('list-db','1');
                $s.=$this->ttable->parse_template('list-db','0');
                $data['footnote']='footnote';
                $data['title']='List of Databases';
                $data['article_title']='TEST';
                $blog=(file_get_contents('../cms/Classes_Ttable.dat'));
                $s.=markdown($blog);
                $data['title']='The Tlist Class';
                $data['content']=$s;
                $data['panel']='';
                $view='/admin/admin_simple_view';
            }

            if ($function=='four_column'){
                //capture the uri
                $dir=$this->uri->segment(4);
                $this->load->library('tpanel');
                $class="tpanel";
                $s=$this->tpanel->get('date',$data);
                $s.=$this->tpanel->get('navigation_menu',$data);
                $s.=$this->tpanel->get('ajax_menu',$data);
                $s.=$this->tpanel->get('spacer',$data);
                $data['title']='List of Databases';
                $post=$this->uri->segment(5);
                $blog=(file_get_contents('../'.$dir.'/'.$post.'.dat'));
                $s.=markdown($blog);
                $data['title']='The Tlist Class';
                $data['content']=$s;
                $data['panel']='';
                $view='/admin/admin_simple_view';
            }
            if ($function=='create-db'){
                $data['title']='Create a Database';
                $data['content']=$this->__create_db();
                $view='/admin/admin_db_view';

            }

            if ($function=='drop-db'){
                $data['title']='Drop a Database';
                $data['content']=$this->__drop_db();
                $view='/admin/admin_db_view';

            }

            if ($function=='optimize-db'){
                $data['title']='Optimize a Database';
                $data['content']=$this->__optimize_db();
                $view='/admin/admin_db_view';
            }

            if ($function=='optimize-table'){
                $database_list=$this->__optimize_table($dbname);

                break;
            }

            if (($function=='backup-db') || ($function=='backup_db')){
                $data['title']='Optimize a Database';
                $data['content']='';
                $view='/admin/admin_db_view';
                $this->__backup_db($dbname);
            }


            if ($function=='repair-table'){
                $database_list=$this->__optimize_table($dbname);
                $data['title']='Optimize a Database';
                $view='/admin/admin_db_view';
                break;
            }
            if ($function=='table-status'){

                $this->table_status($dbname,$table_name);

                break;
            }
            // WORKS ON NEW TEMPLATE VERY WELL
            // NEEDS TO THINK OF PAGING FUNCTION
            if ($function=='list-tables'){
               $s='';
                $s.=$this->tpanel->get('date',$data);
                $table_list=$this->__list_tables($dbname);
                $s.=$this->__print_tables_list($dbname, $table_list);
                $data['article_title']='New table in '.$dbname.' database';
                $data['content']=$s;
                $view='/admin/admin_db_view';
            }

            if ($function=='create-table'){
                $data['content']=$this->__create_table($dbname,$table_name);
                //echo_array($data);break;
                $data['article_title']='New Table in '.($dbname).' database';
                $view='/admin/admin_db_view';

            }
            if ($function=='list-fields'){
                $fields_list=$this->__list_fields_data($dbname,$table_name);
                $data['content']=$this->__print_fields_list($dbname, $fields_list);
                $data['title']='Fields in '.up($table_name).' Table';
                $view='/admin/admin_db_view';

                //admin_db_record_view
            }
            if ($function=='browse'){
                // adds button should have all buttons but others disabled
                $data['content']='<div style="color:red;float:right">'.anchor('admin/dbutil/add_record/'.$dbname.'/'.$table_name.'/id/4','Add').'</div>';
                $data['content'].=$this->__browse($dbname,$table_name,$action=1,$sql='');
                $data['article_title']='Browsing in '.up($table_name).' Table';
                $view='/admin/admin_db_view';
            }
            if ($function=='show_record')
            {
                $data['content']=$this->show_record($dbname,$table_name,$sql='');
                $data['title']='Edit record '.up($table_name).' Table';
                $view='/admin/admin_db_view';

                ;}

            if ($function=='add_record')
            {
                $data['content']=$this->add_record($dbname,$table_name,$sql='');
                $data['title']='add record '.up($table_name).' Table';
                $view='/admin/admin_db_view';

                ;}
            //updates and saves record
            if ($function=='save_record')
            {
                $data['content']=$this->save_record($dbname,$table_name,$sql='');
                $data['title']='save record '.up($table_name).' Table';
                $view='admin/admin_db_view';

                ;}

            if ($function=='insert_record')
            {
                $data['content']=$this->insert_record($dbname,$table_name,$sql='');
                $data['title']='insert record '.up($table_name).' Table';
                $view='admin/admin_db_view';

                ;}

            if ($function=='delete_record')
            {
                $data['content']=$this->delete_record($dbname,$table_name,$sql='');
                $data['title']='delete record '.up($table_name).' Table';
                $view='admin/admin_db_view';

                ;}

            if ($function=='field_to_select')
            {
                //to develop
            }

            //LINKS DON'T WORK
            // PAGING IS NECESSARY
            if ($function=='get_all')
            {

                $data['content']=$this->get_all($dbname,$table_name,$sql='');

                $data['article_title']='Browsing in '.up($table_name).' Table';
                $view='admin/demo_view';
                //to develop
            }

            //testing tabelsmeta
            if ($function=='meta')
            {
                $this->load->library('tablesmeta');
                $table_meta=$this->tablesmeta->main($dbname,$table_name);
                echo_array($table_meta);

                $data['content']=$table_meta;
                $data['article_title']='Browsing in '.up($table_name).' Table';
                $view='admin/admin_db_view';
                //to develop
            }


            // a little area to run tests!
            if ($function=='test')
            {
                //$this->__get_filtered_query();break;
                $data['title']='TESTING ROUTINE OR LIBRARY';
                $this->load->library('Tcontrol');
                $this->load->library('dropdown');
                $s='<form id="myform4">';
                $attributes=array(
            'id'=>'create-user',
            'class'=>'MyFirstClass',
            'type'=>'text',
            'readonly'=>'readonly' ,
            'onclick'=>'someclick()',
            'onkeypress'=>'onkeyevent()',
            'value'=>'default value',
            'title'=>'This is for tooltip',
            'before'=>'A Testing Input ',
            'after'=>'<span style="color:#f60">*</span>');
                //$attributes['value']=serialize($attributes['id']);
                $s.=$this->dropdown->text_input($attributes);
                $attributes['type']='checkbox ';
                $attributes['checked']='checked';
                $s.=$this->dropdown->text_input($attributes);

                //radio example
                $attributes['type']='radio ';
                $attributes['checked']='checked';
                $s.=$this->dropdown->text_input($attributes);
                $s.=$this->dropdown->text_input($attributes);

                //datepicker 1
                $attributes=array(
            'id'=>'datepicker',
            'class'=>'MyFirstClass',
            'type'=>'text',
            'onclick'=>'someclick()',
            'onkeypress'=>'onkeyevent()',
            'value'=>'readonly',
            'title'=>'This is for tooltip',
            'before'=>'From Date ',
            'after'=>'<span style="color:#f60">*</span>');
                $s.=$this->dropdown->datepicker($attributes);

                //datepicker 1
                $attributes=array(
            'id'=>'datepicker_2',
            'class'=>'MyFirstClass',
            'type'=>'text',
            'onclick'=>'someclick()',
            'onkeypress'=>'onkeyevent()',
            'value'=>'readonly',
            'title'=>'This is for tooltip',
            'before'=>'To Date ',
            'after'=>'<span style="color:#f60">*</span>');
                $s.=$this->dropdown->datepicker($attributes);

                $s.=$this->dropdown->dialog($attributes);



                //text area example
                unset($attributes['after']);
                $attributes['before']='This is a Textarea';
                $s.=$this->dropdown->textarea($attributes);


                //checkbox_list
                $list1=$this->__get_filtered_query();
                $s.=$this->dropdown->check_box_list($list1);
                $this->load->library('spyc');
                $list2 = $this->spyc->YAMLLoad('../CodeIgniter/data/month.yml');
                //$list2=$this->__get_filtered_query('photo_ikons','states','name');
                $s.=$this->dropdown->check_box_list($list2);

                $list3 = $this->spyc->YAMLLoad('../CodeIgniter/data/weekdays.yml');
                $s.=$this->dropdown->check_box_list($list3);
                //button example
                $button_attributes['type']='reset';
                $button_attributes['value']='Click to Save';
                $button_attributes['title']='Click to save your data!';
                $s.=$this->dropdown->button($button_attributes);
                // echo htmlentities($s);break;
                $s.='</form>';
                $this->load->library('Tcontrol');
                $this->load->library('tabs');
                $s.=$this->tabs->example_tabs();
                $data['content']=$s;
               // $view='admin/admin_auto_form';
               $view='admin/demo_view';

            }

            //simple image list example
            if ($function=='image_list'){
                $this->load->library('Tcontrol');
                $this->load->library('Timagelist');
                $this->load->library('tpanel');
                $class="tpanel";
                $s=$this->tpanel->get('date',$data);
                $s.=$this->tpanel->get('navigation_menu',$data);
                 //$s.=$this->tpanel->get('three_column',$data);
                 $s.=$this->tpanel->get('spacer',$data);
                 //$s.=$this->tpanel->get('navigation_buttons',$data);
                  $s.=$this->tpanel->get('drag_and_drop_function',$data);
                $s.=$this->timagelist->main();
                $s.=$this->{$class}->get('home_text',$data);
                $s.=$this->{$class}->get('spacer-bottom',$data);
                $data['title']='Image Lists';
                $data['content']=$s;
                $view='admin/demo_view';
            }

              //simple image list example
            if ($function=='droppable'){
                $this->load->library('Tcontrol');
                $this->load->library('Tdroppable');
                $this->load->library('tpanel');
                $class="tpanel";
                $s=$this->tpanel->get('date',$data);
                $s.=$this->tpanel->get('navigation_menu',$data);
                $s.=$this->tpanel->get('masthead4',$data);
              // $s.=$this->tpanel->get('three_column',$data);
                $s.=$this->tpanel->get('spacer',$data);
                $s.=$this->tpanel->get('navigation_buttons',$data);
                $s.=$this->tdroppable->main();
               // echo $s;break;
               // $s.=$this->timagelist->main();
                $s.=$this->{$class}->get('three_column',$data);
               // $s.=$this->{$class}->get('spacer-bottom',$data); NOT NEEDED JUST KEEP HERE
                $data['article_title']='Droppable';
                $data['content']=$s;
                $view='admin/demo_view';
            }



              if ($function=='menu_list'){
                $this->load->library('Tcontrol');
                $this->load->library('tpanel');

                $s=$this->tpanel->get('date',$data);
                $s.=$this->tpanel->get('navigation_menu',$data);
               // $s.=$this->tpanel->get('masthead',$data);
                //$s.=$this->tpanel->get('three_column',$data);
               // $s.=$this->tpanel->get('spacer',$data);
                $s.=$this->tpanel->get('navigation_buttons',$data);
                $s.=$this->menu_list();
                //$s.=$this->tpanel->get('spacer-bottom',$data);
                $data['article_title']='The Tlist Class';
                $data['content']=$s;
                $view='admin/demo_view';
            }



            if ($function=='panel'){
              $this->load->library('tcontrol');
              $this->load->library('tpanel');
              $properties=array('items'=>
                            array(
                                'one',
                                'two',
                                'three',
                                '<a href="http://localhost/CodeIgniter/admin/dbutil/sortable">Sortable</a>',
                                'draggable',
                                '<a href="http://localhost/CodeIgniter/admin/dbutil/accordion">Accordion</a>',
                                 ),
                                'css'=>array('style'=>'padding:0px;width:38%;float:left'),
                               'wrapper'=>array(
                               'element'=> 'div',
                               'style'=>'"width:40%;float:left;margin-right:15px" class="bordered curvy clearfix shadowed"'
        ),);
               $s=$this->tpanel->example_puff();
               $s.=$this->tpanel->example();
               $s.=$this->tpanel->example();
               $s.=$this->tpanel->example_sidebar('editable1','edi11','Inspection 1');
               $data['panel']=$this->tpanel->example_sidebar('other1','otherlink1','Inspection 2');
               $s.=$this->tpanel->example_sidebar('another1','anotherlink1','Inspection 3');
               //$blog=(file_get_contents('../cms/Classes_Tlist.dat'));
               //$s.=markdown($blog);
                $data['article_title']='The TPanel Class';
                $data['content']=$s;
                $view='admin/demo_view';
                //$view='admin/demo_view';
            }

            if ($function=='container'){
              $this->load->library('tcontrol');
              $this->load->library('tcontainer');
              $properties=array('items'=>
                            array(
                                'one',
                                'two',
                                'three',
                                '<a href="http://localhost/CodeIgniter/admin/dbutil/sortable">Sortable</a>',

                                'draggable',
                                '<a href="http://localhost/CodeIgniter/admin/dbutil/accordion">Accordion</a>',
                                                               ),
                                'css'=>array('style'=>'padding:0px;width:48%;float:left'),
                               'wrapper'=>array(
                               'element'=> 'div',
                               'style'=>'"width:50%;float:left;margin-right:15px" class="bordered curvy clearfix shadowed"'
        ),);
               $s=$this->tcontainer->example();

                $data['article_title']='The TContainer Class';
                $this->load->library('filterclass');

                $data['feature_image']=$this->filterclass->parseField('feature-image',$s);

                $data['content']=$s;

                $view='admin/admin_simple_view';
                //$view='admin/admin_generic_view';
            }

            if ($function=='tabs'){
                $this->load->library('Tcontrol');
                $this->load->library('tabs');
                $this->load->library('Timagelist');
                $this->load->library('Tcontrol');
                $this->load->library('tpanel');
                $class="tpanel";
                $s=$this->tabs->example_tabs();
                $data['title']='Tab Controls';
                $data['article_title']='The tabs component';
                $data['content']=$s;
                $data['panel']='';
                $data['content']=$s;
                $view='admin/demo_view';
            }


             if ($function=='toolbar'){
                $this->load->library('Tcontrol');
                $this->load->library('dropdown');
                $s=$this->dropdown->toolbar_button();
                $data['article_title']='Toolbar Button';
                $data['content']=$s;
                $view='admin/admin_db_view';
            }

            if ($function=='accordion'){
                $this->load->library('Tcontrol');
                $this->load->library('accordion');
                $accordion['id']='accordion';
                $accordion['autoHeight']='false';
                $accordion['active']='4';
                $accordion['tab_titles']=array('CodeIgniter','Sexy','Very Sexy',
                                    'Top Girl','To Die For','Che Again',
                                     'More','More Che');
                $s=$this->accordion->get_accordion($accordion);
                $data['article_title']='The Accordion Control';
                $data['content']='<div style="width:40%">';
                $data['content'].=$s;
                $data['content'].='</div>';
               // echo $data['content'];
                $view='admin/demo_view';
            }

            if ($function=='sortable'){
                $this->load->library('Tcontrol');
                $this->load->library('sortable');
                $sortable['id']='sortable';
                $sortable['active']='2';

                // the title items
                $sortable['items']=array('CodeIgniter','Sexy','Very Sexy',
                                    'Top Girl','To Die For','Che Again',
                                    'More','More Che');
                $s=$this->sortable->render($sortable);
                $data['article_title']='The Sortable Control';
                $data['content']='<div style="width:98%;height:800px">';
                $data['content'].=$s;
                $data['content'].='</div>';
                $view='admin/admin_db_view';
            }

            if ($function=='filesystem'){
                $this->load->model('filesystem');
                $this->filesystem->get_all('../CodeIgniter/Images/icon/10/');
                $data['title']='Tab Controls';
                $data['content']='';
                $view='admin/admin_test_view';
            }



 /*
  *
  *
  *
  *
  *
  *
  *
  *
  *  Let us do  some house-keeping here
    We tidy up the output a bit for readability
    We use the Filter class for anything that has been filtered
    To enable filters to be dispalyed properly if marked so in the
    Template ie {{wi:}} {{block}} etc
 */

            //load the view into a variable first
            $template=$this->load->view($view,$data,true);
            // filter all transclusion
            $template=$this->filterclass->filterAll($template);

            //configure tidy
            $config=array(
          'indent'=>true,
          'indent-spaces'=>1,
          'output-xhtml'=>true,
          'wrap'=>68,
          'force-output'=>true
            );

            //clean with tidy
            $template = tidy_parse_string($template, $config,'utf8');
            tidy_clean_repair($template);


           $this->output->set_output($template);
        }

function _housekeeping($view,$data){

          $template=$this->load->view($view,$data,true);
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



/******************************************************************

 *
 *  Main router function
 *
 *
 *

******************************************************************/

        function dbutil($function='list-db',$dbname='photo_ikons',$table_name='country',
            $view='admin_db_view',$var2='NUL',$var3='NUL',$result='false')
        {
            $data['title']='Downloaded a Back-up of the Database';
            $data['content']='';
            $data['panel']='';

            $data=array(
                'title'=>'Downloaded a back-up of the '.$dbname ,
                'content'=>' ',
            );
            // default view
            $view='/admin/admin_db_view';

            //load the database utilities
            $this->load->dbutil();


            if ($function=='info'){

                $data['content']= $this->__DB_info();
                $data['title']='MySQL Info';
                $view='/admin/admin_plain_view';

            }

            if ($function=='list-db'){
                $this->load->library('tcontrol');
                $this->load->library('ttable');
                $data['content']=$this->ttable->parse_template('list-db');
                $data['footnote']='footnote';
                $data['title']='List of Databases';
                $data['article_title']="List of databases";
                //$view='/admin/admin_simple_view';
                $view='/admin/admin_db_view';
            }

            if ($function=='create-db'){
                $data['title']='Create a Database';
                $data['content']=$this->__create_db();
                $data['article_title']='create-db';
                $view='/admin/admin_db_view';

            }

            if ($function=='drop-db'){
                $data['title']='Drop a Database';
                $data['content']=$this->__drop_db();
                $view='/admin/admin_db_view';

            }

            if ($function=='optimize-db'){
                $data['title']='Optimize a Database';
                $data['content']=$this->__optimize_db();
                $view='/admin/admin_db_view';
            }

            if ($function=='optimize-table'){
                $database_list=$this->__optimize_table($dbname);

                break;
            }

            if (($function=='backup-db') || ($function=='backup_db')){
                $data['title']='Optimize a Database';
                $data['content']='';
                $view='/admin/admin_db_view';
                $this->__backup_db($dbname);
            }


            if ($function=='repair-table'){
                $database_list=$this->__optimize_table($dbname);
                $data['title']='Optimize a Database';
                $view='/admin/admin_db_view';
                break;
            }
            if ($function=='table-status'){

                $this->table_status($dbname,$table_name);

                break;
            }
            if ($function=='list-tables'){
              
                $this->load->library('tpanel');
                $class="tpanel";
                $s=$this->tpanel->get('date',$data);
                $s.=$this->tpanel->get('navigation_menu',$data);
                $s.=$this->tpanel->get('masthead4',$data);
                $s.=$this->{$class}->get('spacer-bottom',$data);
                $table_list=$this->__list_tables($dbname);
                $s.=$this->__print_tables_list($dbname, $table_list);
                $s.=$this->tpanel->get('spacer',$data);
                $s.=$this->tpanel->get('navigation_buttons',$data);
                $data['article_title']='New table in '.$dbname.' database';
                $data['content']=$s;
                $view='/admin/admin_db_view';

            }

            if ($function=='create-table'){
                $data['content']=$this->__create_table($dbname,$table_name);
                //echo_array($data);break;
                $data['article_title']='New Table in '.($dbname).' database';
                $view='/admin/admin_db_view';

            }
            if ($function=='list-fields'){
                $fields_list=$this->__list_fields_data($dbname,$table_name);
                $data['content']=$this->__print_fields_list($dbname, $fields_list);
                $data['article_title']='Fields in '.up($table_name).' Table';
                $view='/admin/admin_db_view';

                //admin_db_record_view
            }
            if ($function=='browse'){
                $data['content']='<div style="color:red;float:right">'.anchor('admin/dbutil/add_record/'.$dbname.'/'.$table_name.'/id/4','Add').'</div>';
                $data['content'].=$this->__browse($dbname,$table_name,$action=1,$sql='');

                //$fields_list=$this->__list_fields_data($dbname,$table_name);
                // $data['content']=$this->__print_fields_list($dbname, $fields_list);
                $data['title']='Browsing in '.up($table_name).' Table';
                $data['article_title']='Browsing in '.up($table_name).' Table';
                $view='/admin/admin_db_view';
            }
            if ($function=='show_record')
            {
                $data['content']=$this->show_record($dbname,$table_name,$sql='');
                $data['article_title']='Edit record '.up($table_name).' Table';
                $view='/admin/admin_db_view';

                ;}

            if ($function=='add_record')
            {
                $data['content']=$this->add_record($dbname,$table_name,$sql='');
                $data['article_title']='add record '.up($table_name).' Table';
                $view='/admin/admin_db_view';

                ;}
            //updates and saves record
            if ($function=='save_record')
            {
                $data['content']=$this->save_record($dbname,$table_name,$sql='');
                $data['article_title']='save record '.up($table_name).' Table';
                $view='admin/admin_db_view';

                ;}

            if ($function=='insert_record')
            {
                $data['content']=$this->insert_record($dbname,$table_name,$sql='');
                $data['article_title']='insert record '.up($table_name).' Table';
                $view='admin/admin_view';

                ;}

            if ($function=='delete_record')
            {
                $data['content']=$this->delete_record($dbname,$table_name,$sql='');
                $data['article_title']='delete record '.up($table_name).' Table';
                $view='admin/admin_db_view';

                ;}

            if ($function=='field_to_select')
            {
                //to develop
            }
            if ($function=='get_all')
            {

                $data['content']=$this->get_all($dbname,$table_name,$sql='');


                $data['article_title']='Browsing in '.up($table_name).' Table';
                $view='admin/admin_db_view';
                //to develop
            }

            //testing tabelsmeta
            if ($function=='meta')
            {
                $this->load->library('tablesmeta');
                $table_meta=$this->tablesmeta->main($dbname,$table_name);
                echo_array($table_meta);
            
                $data['content']=$this->get_all($dbname,$table_name,$sql='');
                $data['title']='Browsing in '.up($table_name).' Table';
                $view='admin/admin_db_view';
                //to develop
            }


            

            if ($function=='filesystem'){
                $this->load->model('filesystem');
                $this->filesystem->get_all('../CodeIgniter/Images/icon/10/');
                $data['title']='Tab Controls';
                $data['content']='';
                $view='admin/admin_test_view';
            }



 /*   We call housekeeping
  *   at end of function call
  *   this will essentially
  *   call the filterclass to ensure
  *   all filtering i sdone
  *   for translusion and use tidy to output tidy
  *   you can commnet out or use options
  */
           $this->_housekeeping($view,$data);
    }



        //end class
    }





    ?>