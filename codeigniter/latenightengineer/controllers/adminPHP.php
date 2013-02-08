<?php

include_once('../strings/markdown.php');
class adminPHP extends Controller {
    //maincontroller for administration

   const portal='php';
   const portaledit='editpostPHP';
    private $TEMPLATEPATH="./learnPHP/tutorials/";

    function Index($view='php_view',$title="introduction")
    {
        //$this->load->view('stamps/'.$view,$data);
        self::show($view,$title);
    }

    function post($action='edit',$dir="php",$title='introduction',$type='dat'){

        // preview is not saving TODO
        if ($action=='preview'){
            redirect(TEMPLATEPATH.$dir.'/'.$title);
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
            $data['portal']=self::portal;
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

            //this will need to be renamed in a generic manner
            $this->load->view('editpostPHP',$data);
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
            $data['portal']=self::portal;
            $this->load->library('filterclass');
            //$this->filterclass->category($data['content'));
            $this->load->view('editpostPHP',$data);};



        #### SAVE ACTION #####
        
        if ($action=='save'){
            $this->load->helper('file');
            $content=$_POST['content'];
            $file_name=$_POST['save_as'];
            //echo 'SAVE AS'.$file_name;break;
            $data=$_POST;
            //echo $dir.' '.$title;break;

            write_file('../'.$dir.'/'.$file_name.'.dat', $content);
            if ( ! write_file('../'.$dir.'/'.$title.'.dat', $content))
            {
                echo 'Unable to write the file';
            }
            else
            {
                echo 'File written!';
            }
            // learnlua='/learnlua we use the $dir to achive what we need
            redirect('/learn'.$dir.'/tutorials/'.$dir.'/'.$file_name);
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
            $this->load->view('editpostPHP',$data);
        }

    }
}





    ?>