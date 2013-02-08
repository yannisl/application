<?php
/* SVN FILE: $Id: object_8php-source.html 565 2008-06-07 14:45:54Z gwoo $ */
/**
00004  * Object class, allowing __construct and __destruct in PHP4.
00005  *
00006  * Also includes methods for logging and the special method RequestAction,
00007  * to call other Controllers' Actions from anywhere.
00008  *
00009  * PHP versions 4 and 5
00010  *
00011  * CakePHP(tm) :  Rapid Development Framework <http://www.cakephp.org/>
00012  * Copyright 2005-2008, Cake Software Foundation, Inc.
00013  *                              1785 E. Sahara Avenue, Suite 490-204
00014  *                              Las Vegas, Nevada 89104
00015  *
00016  * Licensed under The MIT License
00017  * Redistributions of files must retain the above copyright notice.
00018  *
00019  * @filesource
00020  * @copyright       Copyright 2005-2008, Cake Software Foundation, Inc.
00021  * @link                http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
00022  * @package         cake
00023  * @subpackage      cake.cake.libs
00024  * @since           CakePHP(tm) v 0.2.9
00025  * @version         $Revision: 565 $
00026  * @modifiedby      $LastChangedBy: gwoo $
00027  * @lastmodified    $Date: 2008-06-07 09:45:54 -0500 (Sat, 07 Jun 2008) $
00028  * @license         http://www.opensource.org/licenses/mit-license.php The MIT License
00029  */
/**
00031  * Object class, allowing __construct and __destruct in PHP4.
00032  *
00033  * Also includes methods for logging and the special method RequestAction,
00034  * to call other Controllers' Actions from anywhere.
00035  *
00036  * @package     cake
00037  * @subpackage  cake.cake.libs
00038  */
class Object {
 /**
00041  * Log object
00042  *
00043  * @var object
00044  * @access protected
00045  */
         var $_log = null;
/**
00048  * A hack to support __construct() on PHP 4
00049  * Hint: descendant classes have no PHP4 class_name() constructors,
00050  * so this constructor gets called first and calls the top-layer __construct()
00051  * which (if present) should call parent::__construct()
00052  *
00053  * @return Object
00054  */
     function Object() {
         $args = func_get_args();
         if (method_exists($this, '__destruct')) {
             register_shutdown_function (array(&$this, '__destruct'));
         }
         call_user_func_array(array(&$this, '__construct'), $args);
     }
/**
00063  * Class constructor, overridden in descendant classes.
00064  */
      function __construct() {
     }
 /**
00069  * Object-to-string conversion.
00070  * Each class can override this method as necessary.
00071  *
00072  * @return string The name of this class
00073  * @access public
00074  */
   function toString() {
         $class = get_class($this);
         return $class;
   }



 /**
00131  * Stop execution of the current script
00132  *
00133  * @param $status see http://php.net/exit for values
00134  * @return void
00135  * @access public
00136  */
    function _stop($status = 0) {
          exit($status);
    }
 /**
00141  * API for logging events.
00142  *
00143  * @param string $msg Log message
00144  * @param integer $type Error type constant. Defined in app/config/core.php.
00145  * @access public
00146  */
     function log($msg, $type = LOG_ERROR) {
        if (!class_exists('CakeLog')) {
             uses('cake_log');
         }
         if (is_null($this->_log)) {
             $this->_log = new CakeLog();
         }
         if (!is_string($msg)) {
             $msg = print_r($msg, true);
         }
         return $this->_log->write($type, $msg);
     }
 /**
00160  * Allows setting of multiple properties of the object in a single line of code.
00161  *
00162  * @param array $properties An associative array containing properties and corresponding values.
00163  * @access protected
  *     can be used throughout the scripts!! very good one
  *     saves a lot of work, but needs to be modified for arrays
  *     if property does not exist just goes
  *     needs to do recursion, I hate recursion
00164  */
   function _set($properties = array()) {
         //echo_array($properties);
         if (is_array($properties) && !empty($properties)) {
             $vars = get_object_vars($this);
            
             foreach ($properties as $key => $val) {
                 if (array_key_exists($key, $vars)) {
                     $this->{$key} = $val;
                  }
                
             }
         }
          //echo_array($vars);
     }
 /**
00176  * Used to report user friendly errors.
00177  * If there is a file app/error.php this file will be loaded
00178  * error.php is the AppError class it should extend ErrorHandler class.
00179  *
00180  * @param string $method Method to be called in the error class (AppError or ErrorHandler classes)
00181  * @param array $messages Message that is to be displayed by the error class
00182  * @return error message
00183  * @access public
00184  */
   function cakeError($method, $messages = array()) {
         if (!class_exists('ErrorHandler')) {
             App::import('Core', 'Error');
 
             if (file_exists(APP . 'error.php')) {
                 include_once (APP . 'error.php');
             } elseif (file_exists(APP . 'app_error.php')) {
                 include_once (APP . 'app_error.php');
             }
         }
 
         if (class_exists('AppError')) {
             $error = new AppError($method, $messages);
         } else {
             $error = new ErrorHandler($method, $messages);
         }
         return $error;
  }
/**
00204  * Checks for a persistent class file, if found file is opened and true returned
00205  * If file is not found a file is created and false returned
00206  * If used in other locations of the model you should choose a unique name for the persistent file
00207  * There are many uses for this method, see manual for examples
00208  *
00209  * @param string $name name of the class to persist
00210  * @param string $object the object to persist
00211  * @return boolean Success
00212  * @access protected
00213  * @todo add examples to manual
00214  */
   function _persist($name, $return = null, &$object, $type = null) {
        $file = CACHE . 'persistent' . DS . strtolower($name) . '.php';
         if ($return === null) {
            if (!file_exists($file)) {
                return false;
             } else {
                 return true;
             }
         }
 
        if (!file_exists($file)) {
            $this->_savePersistent($name, $object);
             return false;
         } else {
             $this->__openPersistent($name, $type);
          return true;
         }
     }
/**
00234  * You should choose a unique name for the persistent file
00235  *
00236  * There are many uses for this method, see manual for examples
00237  *
00238  * @param string $name name used for object to cache
00239  * @param object $object the object to persist
00240  * @return true on save, throws error if file can not be created
00241  * @access protected
00242  */
   function _savePersistent($name, &$object) {
        $file = 'persistent' . DS . strtolower($name) . '.php';
         $objectArray = array(&$object);
         $data = str_replace('\\', '\\\\', serialize($objectArray));
         $data = '<?php $' . $name . ' = \'' . str_replace('\'', '\\\'', $data) . '\' ?>';
         cache($file, $data, '+1 day');
    }
/**
00251  * Open the persistent class file for reading
00252  * Used by Object::_persist()
00253  *
00254  * @param string $name Name of persisted class
00255  * @param string $type Type of persistance (e.g: registry)
00256  * @access private
00257  */
     function __openPersistent($name, $type = null) {
         $file = CACHE . 'persistent' . DS . strtolower($name) . '.php';
         include($file);
         switch($type) {
             case 'registry':
                 $vars = unserialize(${$name});
                 foreach ($vars['0'] as $key => $value) {
                     App::import('Model', Inflector::classify($key));
                }
                 unset($vars);
                 $vars = unserialize(${$name});
                 foreach ($vars['0'] as $key => $value) {
                     foreach ($vars['0'][$key]->Behaviors->_attached as $behavior) {
                         App::import('Behavior', $behavior);
                     }
                     ClassRegistry::addObject($key, $value);
                     unset ($value);
                 }
                 unset($vars);
             break;
             default:
                 $vars = unserialize(${$name});
                 $this->{$name} = $vars['0'];
                 unset($vars);
             break;
         }
     }
 }
?>