<?php
# Main Controller
#
#
# 
#
# version 10.01

include_once('../strings/markdown.php');

class book extends Controller {
//controller for articles rather than galleries
//it can also send images etc
//missing is how to get the data
//this is for to-morrow

public $info_box;

function Book($t='wp_options')
    {
      parent::Controller();
        $this->load->scaffolding($t);
   }


function remove_stop_words($newtext){
//$values=array_unique($values);
$text=file_get_contents('../strings/stop-words.txt');
$pattern='/\n/sx';
$values=preg_split($pattern,$text);
for ($i=0;$i<count($values);$i++){                  
  $pattern=trim($values[$i]);
  $newtext=preg_replace('%\b'.$pattern.'\b%isx','',low($newtext));
}

return $newtext;
}
 
 /**
 * Remove HTML tags, including invisible text such as style and
 * script code, and embedded objects.  Add line breaks around
 * block-level tags to prevent word joining after tag removal.
 */

 
 function html2txt($document){
$search = array('@<script[^>]*?>.*?</script>@si',  // Strip out javascript
               '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
               '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
               '@<![\s\S]*?--[ \t\n\r]*>@'        // Strip multi-line comments including CDATA
);
$text = preg_replace($search, '', $document);
return $text;
}
 	
function show($title="Che_Guevara",$page="0",$anchor='')
	{
	 // $this->session;
    //$session = $this->session->all_userdata();
   // $this->session->set_userdata('login_status', 'TRUE');
   // if ($this->session->userdata('login_status')){;}
    
	  $this->benchmark->mark('code_start');
	  //need to check this
	  $this->load->model('booksmodel');
	  //put name of book in property
	  $this->booksmodel->book_name="../books/$title/".$title;//.'.txt';
	  $data['content']=$this->booksmodel->get_book();
	  
	  
    if ($this->booksmodel->file_extension=='txt') {
      //if is text file some different techniques are required
      //to automatically change it to html
      
      $data['content']=preg_replace('/(INTRODUCTION)/sx','<h2>$1</h2>',$data['content']);
      $data['content']=preg_replace('/(CHAPTER[A-Z\d\s\-]+)\./isx','<h2>$1</h2>',$data['content']);
      
      
      //$data['content']=preg_replace('/\n\r[[:upper:]]+\n\r/isx','<h2>$0</h2>',$data['content']);   
      
      //$data['content']=markdown($data['content']);
    
    }
    
    
  $data['author']=g_author($data['content']);
  
  preg_match_all('#<h([1-6])(.*?)>(.*?)</h\1>#isx',$data['content'],$values);
      //echo_array($values[0]);
  
   //$data['booktitle']=g_clean($s[0]);
/*

	  $original=$data['content'];
	  $s=g_book_title($data['content']);
	  
	
	  $data['feature']=$s[0];
	
	  
	  //breaks text into smaller chunks in plugins 
	  $array=chapterize($data['content']);
	  	 	  
	  if (isset($array[$page])){
      $data['content']=$array[$page];
      }
      else
      {$page=0;}
    
    if ($page<0){$page=0;}
    
    //filter only the page not the whole book for speed 
*/    
    $pattern='/images\//isx';
	  $data['content']=preg_replace($pattern,'http://localhost/books/'.$title.'/'.'$0',$data['content']);
	  $data['content']=g_remove_notes($data['content']);
	   //$data['content']=preg_replace('/<\/big>/isx','',$data['content']);
	  $original=$data['content'];
    
    $this->load->library('filterclass');
    $data['content']=$this->filterclass->filterAll($data['content']);
    $data['previous']= '';
	  $data['title']=$title;
	  //paginate
	  $this->load->library('pagination');
    $config['base_url'] = 'http://localhost/CodeIgniter/index.php/book/show/'.$title.'/';
    //$config['total_rows'] = count($array);
    $config['per_page'] = 1;
    $config['num_links'] =10 ;//number of links before and after
    $config['uri_segment'] = 4;
    $config['num_tag_open'] = ' ';
    $config['num_tag_close'] = ' ';
    
    $this->pagination->initialize($config);

    $data['next']=$this->pagination->create_links();
    $data['content']=toc(($data['content']));
	  $data['toc']=toc_menu(($data['content']));
 //$data['content']=get_tidy_body($data['content']);
    
//    $text=$this->remove_stop_words($data['content']);
    
    //in plugins strip class
    
    //$text=strip_html($text);
    
    //preprocessor
    //$text=remove_punctuation($text);
        
    //$vocabulary=vocabulary($text);
    //echo_array($vocabulary);break;
    //foreach($vocabulary as $key=>$value){
     //if ($value>15 &&$key!=='p'&& $key!=='id' && $key!=='class' && $key!=='center' &&$key!=='href' &&$key!=='mdash'){$data['content']=preg_replace('/\b'.$key.'\b/','<b>'.$key.'</b>',$data['content']);}
     //echo $key;
    //}
    //$data['content']=$original;
    
    //$data['content']=get_persons($data['content']);
    $time=60*60*24830;
    $this->output->cache(0);
	  //let us view what we got by sending data and choosing the view
	  $data['feature']='';
    $this->load->view('book_view',$data);
    
 	}

 
}
?>