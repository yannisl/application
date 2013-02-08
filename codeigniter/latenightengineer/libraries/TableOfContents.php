<?php

/*
Plugin Name: Table of Contents Generator
Plugin URI: http://fucoder.com/code/toc-generator/
Description: Scans through HTML headings and creates a "Table of Contents" list for
your posts/pages. Access it via either <!--TOC--> inside your post, or PHP variable
$post->post_toc
Version: 0.3 (20060628)
Author: Scott Yang
Author URI: http://scott.yang.id.au/
*/

class TableOfContents {

    
    
    function add_toc($level, $tocid, $text) {
        $this->toc[] = array($this->pagenum, $level, $tocid, $text);
        $this->minlevel = min($this->minlevel, $level);
    }
    
    function get_tocid($text) {
        //$text = sanitize_title_with_dashes($text);
        $text = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '', $text);
        $tocid = $text;
        $count = 0;
        while (isset($this->tocmap[$tocid]))
            $tocid = $text.strval(++ $count);
        $this->tocmap[$tocid] = true;
        return "toc-$tocid";
    }

    function get_toc() {
       //echo_array($this->toc);
       //break;
        $stack=array(-1);
        $link='';
        $html = "<div id=\"toc\" style=\"margin-top:40px\" ><h3>Page Contents</h3>\n";
        $permalink = '';
        for ($i = 0; $i < sizeof($this->toc); $i ++) {
            list($pagenum, $level, $tocid, $text) = $this->toc[$i];
            $link = $permalink;
            if ($pagenum > 1) {
                if ($wp_rewrite->using_permalinks())
                    $link = trailingslashit($link)."$pagenum/";
                else
                    $link .= "&page=$pagenum";
            }
            $link = "<a href=\"$link#$tocid\">$text</a>";
            if ($i == 0) {
                $level = min($level, $this->minlevel);
                $stack = array($level);
                $html .= "<ol><li>$link";
            } else {
                $prev = $stack[sizeof($stack)-1];
                if ($level == $prev) {
                    $html .= "</li>\n<li>$link";
                } elseif ($level < $prev) {
                    while (sizeof($stack) > 1) {
                        array_pop($stack);
                        $html .= "</li></ol>";
                        $prev = $stack[sizeof($stack)-1];
                        if ($level >= $prev)
                            break;
                    }
                    $html .= "</li>\n<li>$link";
                } else {
                    $stack[] = $level;
                    $html .= "\n<ol><li>$link";
                }
            }
        }
        while (sizeof($stack) > 0) {
            array_pop($stack);
            $html .= "</li></ol>";
        }
        
        $this->toccache = $html . '</div>';
        return $this->toccache;
    }
    
    function replace_heading($match) {
        if ($match[0] == '<!--nextpage-->') {
            error_log('next');
            $this->pagenum ++;
            return $match[0];
        }
        $tocid = $this->get_tocid($match[3]);
        $this->add_toc(intval($match[1]), $tocid, $match[3]);
        return "<h$match[1] id=\"$tocid\"$match[2]>$match[3]</h$match[1]>";
    }
    
    // "the_content" was originally designed to be a filter for "the_content" 
    // so it takes original content and replace with content with TOC added.
    function the_content($content) {
       //intialize variables
        $this->toc = array();
        $this->tocmap = array();
        $this->toccache = null;
        $this->minlevel = 6;
        $this->pagenum = 1;
        //$regex = '#<h([1-6])(.*?)>(.*?)</h\1>|<!--nextpage-->#';
        $regex = '#<h([1-6])(.*?)>(.*?)</h\1>#isx';
        $content = preg_replace_callback($regex, 
        array(&$this, 'replace_heading'), $content);
       
        //$this->toc=$this->get_toc();
        $content=preg_replace('|(<p>)?<!--\s*TOC\s*-->(</p>)?|', $this->get_toc(),
            $content);
        return $content;
       
    }

    function the_toc($content) {
       //intialize variables
        $this->toc = array();
        $this->tocmap = array();
        $this->toccache = null;
        $this->minlevel = 6;
        $this->pagenum = 1;
        //$regex = '#<h([1-6])(.*?)>(.*?)</h\1>|<!--nextpage-->#';
        $regex = '#<h([1-6])(.*?)>(.*?)</h\1>#isx';
        $content = preg_replace_callback($regex, 
        array(&$this, 'replace_heading'), $content);
       
        //$this->toc=$this->get_toc();
        return $this->get_toc();
        return preg_replace('|(<p>)?<!--TOC-->(</p>)?|', $this->get_toc(),
            $content);
    }

    function the_post($text) {
    //main function to call
      $text = $this->the_content($text);
      return $text;
    }

}

//add_filter('the_posts', array(new YLSY_TableOfContents, 'the_posts'));

function toc($text){
 $tableofcontents=new TableOfContents;

 $text=$tableofcontents->the_post($text);
return $text;
}

function toc_menu($text){
$table=new TableOfContents;
 $text=$table->the_toc($text);
return $text;

}

 //$text=file_get_contents('../books/1864-h/1864-h.htm');



?>
