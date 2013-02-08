<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 Basic class for drag and drop containers

 consists of two objects
 *
      Draggable
      and Droppable
      The droppable object
      is normally just a container

 * 
 *   Based on the jQuery Library
 *   and a bit of imagination
 */



class TDroppable extends Tcontrol {

// Common functions to all controls
// has
// Type - visual or other
// properties: attributes;
// get_attributes
// render
// persistent
// from file etc..
//
//
// new TControl 
// or extends TControl is better
// active=enable or disable - sets attribute, if not exist provide 
// 
//   
// Each list can contain an enabled and disabled

    public $properties=array('name'=>'name',
                             'datasource'=>'filesystem',
                             'path'=>'../egypt/yves-krief-01/',
                             'items'=>array(),
                             'template'=>'image_list',
                             );
    public $file_names_raw=array();
    public $images=array('name'=>array(
                'image_name'=>'image_name',
                ),
                'sprites'=>'name',
                'image'=>'image_name',
            );
    public $image;
    public $image_store=array();  //
    public $image_lists=array();  //    array of arrays of all image lists
                                
    public $db_enabled=array();   //
    public $Control = array();    //
    public $gallery='illusions';
    public $image_path='../egypt/illusions/';             //
    //public $droppable_path=.'/egypt/yves-krief-01/';

    public $droppable_path='../../../../../../egypt/illusions/';
    public $image_path_http='http://localhost/egypt/illusions/';
    // http://localhost/egypt/yves-krief-01/yves-01.jpg

    function TDroppable($control = array(), $formId = '')
    {
        // initialize parent class
        parent::TControl();
        
        // Instantiate the CI libraries so we can work with them
        $CI =& get_instance();
              
        $CI->load->helper('file');
        //initialize all necessary libraries
        $images=$CI->load->library('timagelist');
      
        log_message('debug', 'Loaded TImagelist');
       
        
     }

    function get_all(){
        $CI=&get_instance();
        $CI->load->model('filesystem');
        $v=$CI->filesystem->get_all($this->image_path);
        return $v;
    }

    function init()
    {

        // Globalize $CI super object so we can use CI libaries like validation
        global $CI;
            $CI =& get_instance();
        // Return an instance of this form object
        return $this;
    }

  // main function calls all routines
  // to set a new List
  // or to read an existing one from the cache
  // Available options
  // FROMPATH from directory
  // FROMSTORE if not exists it will create
  // CACHE     will cache after create
  // empty or AUTO will create a default one form directory
  // if no directory is provided then good luck will return
  // empty!
  // paths are giving me problems
  
  function main($list='',$path='',$options='CACHE'){
     // $list='169,170,180,190';
      if (((isset($list))&&(!empty($list)))){
        $list=explode(',',$list);
        //echo_array($list);break;
      }
      else
      {
      $file_names=$this->get_all($this->image_path);
      $list=$this->file_names_raw=$file_names;

      //echo 'TEST '.echo_array($list);break;
      }
      $new=$this->set_image_default_properties($list);
           
      //dumps array to yaml
      $new=$this->to_yaml($new);

      //saves array to yaml
      $result=$this->save_to_yaml($new,DATADIR.'image_list_01.yml');

      //reads from yamldefine('CONTROLSDIR','../CodeIgniter/data/components/');
      $result=$this->yaml_file_to_array(DATADIR.'image_list_01.yml');
      //echo_array($result);
      $s=$this->example($result);
      //break;
      return $s;
  }

/* Puts defaults in a way into an array
 * [023.png] => Array
        (
            [name] => 023.png
            [alias] => 023.png
            [title] => An Image
            [alt] => An Image
 *
 *
 *
*/


  function set_image_default_properties($list=''){
      foreach ($list as $name){
          
          //$image_src=$this->html_image($name,$path);
          $new[$name]=array('name'=>$name,
                      'alias'=>$name,
                      'title'=>'Image'.$name,        //although not necessary for list
                      'alt'=>'An Image'.$name,
           );  // necessary for usability in random components etc
      }
      return $new;
  }

 
   function html_image($image_name='',$path=''){
     $path=$this->image_path_http;
     $s='<img style="display:block;width:98%;margin:0 auto;overflow:hidden"   src="'.$path.$image_name.'" />';
     return $s;
   }

 


  

  //just a silly example for testing
  function example($v){
       $js=$this->js();
       $s='';
       foreach($v as $key=>$value){
           if (is_array($value)){
              $s.= '<div id="sortable" class="curvy sortable draggable" style="width:50px;float:left;
                     border:1px solid #eeeeec";overflow:hidden>';
              $s.='<div  class="sortable" style="width:98%;float:left;
                     overflow:hidden;z-index:2000">';
               $s.=line($this->html_image($value['name']));
              // $s.=line('<p style="text-align:center;font-size:11px;float:none;width:98%;display:block;margin:0 auto">'.$value['name']."</p>");
               $s.='</div>';
               $s.='</div>';
           }
      
       }
       $data['js']=$js;
       $data['content']=$s;
       $data['ul']=$this->container_html($v);
       $s=$this->view('drag_and_drop_function',$data,TRUE);
      
     return $s;
    
    
  }

function container_html($v){
 $ul='<ul id="gallery" class="gallery ui-helper-reset ui-helper-clearfix">';
 $s=$ul;
 $li='';
 $path=$this->droppable_path;
 //$path='../../../../egypt/Scott-8000/';
 $path2=$this->image_path_http;
 $gallery=$this->gallery;
 foreach($v as $key=>$value){
 if (is_array($value)){
 $file_name=$value['name'];
 $li.=sprintf(' <li class="ui-widget-content ui-corner-tr" style="z-index:9999">
	   <h5 class="ui-widget-header">%s</h5>
	<img src="%s"  alt="The peaks of Sexy" width="96" height="72" />
	<a href="%s" title="View larger image" class="ui-icon ui-icon-zoomin">View larger</a>
	<a href="link/to/trash/script/when/we/have/js/off" title="Delete this image" class="ui-icon ui-icon-trash">Delete image</a>
 </li>',$gallery,$path.$file_name,'../'.$path.$file_name);
 }
 }
 $s.=$li;
 
 $s.='</ul>';
 return $s;
}



//typical javascript for drag and drop function
//jQuery. Can change to other libraries, simply extend this class

  function js()
  {

  
  $gallery='$gallery';    //the collection to drop
  $trash='$trash';
  $trash2='$trash2';    //the container id
  $item='$item';
  $list='$list';
  $link='$link';
  $target='$target';
  $modal='$modal';
  $galleryID='gallery';
  $trashID='trash';

$s=<<<EOD
<script type="text/javascript">
			$(function() {
				// there's the gallery and the trash
				var $gallery = $('#gallery'), $trash = $('.trash');

				// let the gallery items be draggable
				$('li',$gallery).draggable({
					cancel: 'a.ui-icon',// clicking an icon won't initiate dragging
					revert: 'invalid', // when not dropped, the item will revert back to its initial position
					containment: $('#demo-frame').length ? '#demo-frame' : 'document', // stick to demo-frame if present
					helper: 'clone',
					cursor: 'move'
				});

				// let the trash be droppable, accepting the gallery items
				$trash.droppable({
					accept: '#gallery > li',
					activeClass: 'ui-state-highlight',
					drop: function(ev, ui) {
						deleteImage(ui.draggable);
					}
				});
               
				// let the gallery be droppable as well, accepting items from the trash
				$gallery.droppable({
					accept: '.trash li',                     //changed from id
					activeClass: 'custom-state-active',
					drop: function(ev, ui) {
						recycleImage(ui.draggable);
					}
				});

				// image deletion function
				var recycle_icon = '<a href="link/to/recycle/script/when/we/have/js/off" title="Recycle this image" class="ui-icon ui-icon-refresh">Recycle image</a>';
				function deleteImage($item) {
					$item.fadeOut(function() {
						var $list = $('ul',$trash).length ? $('ul',$trash) : $('<ul class="gallery ui-helper-reset"/>').appendTo($trash);

						$item.find('a.ui-icon-trash').remove();
						$item.append(recycle_icon).appendTo($list).fadeIn(function() {
							$item.animate({ width: '48px' }).find('img').animate({ height: '36px' });
						});
					});
				}

				// image recycle function
				var trash_icon = '<a href="link/to/trash/script/when/we/have/js/off" title="Delete this image" class="ui-icon ui-icon-trash">Delete image</a>';
				function recycleImage($item) {
					$item.fadeOut(function() {
						$item.find('a.ui-icon-refresh').remove();
						$item.css('width','96px').append(trash_icon).find('img').css('height','72px').end().appendTo($gallery).fadeIn();
					});
				}

				// image preview function, demonstrating the ui.dialog used as a modal window
				function viewLargerImage($link) {
					var src = $link.attr('href');
					var title = $link.siblings('img').attr('alt');
					var $modal = $('img[src$="'+src+'"]');

					if ($modal.length) {
						$modal.dialog('open')
					} else {
						var img = $('<img alt="'+title+'" style="padding:0;margin:0;display:none;width:90%;margin:0 auto;display:block" />')
							.attr('src',src).appendTo('body');
						setTimeout(function() {
							img.dialog({
									title: title,
									width: 600,
									modal: true
								});
						}, 1);
					}
				}

				// resolve the icons behavior with event delegation
				$('ul.gallery > li').click(function(ev) {
					var $item = $(this);
					var $target = $(ev.target);

					if ($target.is('a.ui-icon-trash')) {
						deleteImage($item);
					} else if ($target.is('a.ui-icon-zoomin')) {
						viewLargerImage($target);
					} else if ($target.is('a.ui-icon-refresh')) {
						recycleImage($item);
					}

					return false;
				});
			});
		</script>
EOD;
 return $s;
  }


















   
}