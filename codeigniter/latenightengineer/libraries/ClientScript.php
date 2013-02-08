
<?php
/**
 * CClientScript class file.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright Copyright &copy; 2008-2009 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

/**
 * CClientScript manages JavaScript and CSS stylesheets for views.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @version $Id: CClientScript.php 1090 2009-06-04 19:59:55Z qiang.xue $
 * @package system.web
 * @since 1.0
 */
class CClientScript extends CApplicationComponent
{
	/**
	 * The script is rendered in the head section right before the title element.
	 */
	const POS_HEAD=0;
	/**
	 * The script is rendered at the beginning of the body section.
	 */
	const POS_BEGIN=1;
	/**
	 * The script is rendered at the end of the body section.
	 */
	const POS_END=2;
	/**
	 * The script is rendered inside window onload function.
	 */
	const POS_LOAD=3;
	/**
	 * The body script is rendered inside a jQuery ready function.
	 */
	const POS_READY=4;

	/**
	 * @var boolean whether JavaScript should be enabled. Defaults to true.
	 */
	public $enableJavaScript=true;
	/**
	 * @var array the mapping between script file names and the corresponding script URLs.
	 * The array keys are script file names (without directory part) and the array values are the corresponding URLs.
	 * If an array value is false, the corresponding script file will not be rendered.
	 * If an array key is '*.js' or '*.css', the corresponding URL will replace all
	 * all JavaScript files or CSS files, respectively.
	 *
	 * This property is mainly used to optimize the generated HTML pages
	 * by merging different scripts files into fewer and optimized script files.
	 * @since 1.0.3
	 */
	public $scriptMap=array();
	/**
	 * @var array the registered CSS files (CSS URL=>media type).
	 * @since 1.0.4
	 */
	protected $cssFiles=array();
	/**
	 * @var array the registered JavaScript files (position, key => URL)
	 * @since 1.0.4
	 */
	protected $scriptFiles=array();
	/**
	 * @var array the registered JavaScript code blocks (position, key => code)
	 * @since 1.0.5
	 */
	protected $scripts=array();

	private $_hasScripts=false;
	private $_packages;
	private $_dependencies;
	private $_baseUrl;
	private $_coreScripts=array();
	private $_css=array();
	private $_metas=array();
	private $_links=array();

	/**
	 * Cleans all registered scripts.
	 */
	public function reset()
	{
		$this->_hasScripts=false;
		$this->_coreScripts=array();
		$this->cssFiles=array();
		$this->_css=array();
		$this->scriptFiles=array();
		$this->scripts=array();
		$this->_metas=array();
		$this->_links=array();

		$this->recordCachingAction('clientScript','reset',array());
	}

	/**
	 * Renders the registered scripts.
	 * This method is called in {@link CController::render} when it finishes
	 * rendering content. CClientScript thus gets a chance to insert script tags
	 * at <code>head</code> and <code>body</code> sections in the HTML output.
	 * @param string the existing output that needs to be inserted with script tags
	 */
	public function render(&$output)
	{
		if(!$this->_hasScripts)
			return;

		$this->renderCoreScripts();

		if(!empty($this->scriptMap))
			$this->remapScripts();

		$this->renderHead($output);
		if($this->enableJavaScript)
		{
			$this->renderBodyBegin($output);
			$this->renderBodyEnd($output);
		}
	}

	/**
	 * Uses {@link scriptMap} to re-map the registered scripts.
	 * @since 1.0.3
	 */
	protected function remapScripts()
	{
		$cssFiles=array();
		foreach($this->cssFiles as $url=>$media)
		{
			$name=basename($url);
			if(isset($this->scriptMap[$name]))
			{
				if($this->scriptMap[$name]!==false)
					$cssFiles[$this->scriptMap[$name]]=$media;
			}
			else if(isset($this->scriptMap['*.css']))
			{
				if($this->scriptMap['*.css']!==false)
					$cssFiles[$this->scriptMap['*.css']]=$media;
			}
			else
				$cssFiles[$url]=$media;
		}
		$this->cssFiles=$cssFiles;

		$jsFiles=array();
		foreach($this->scriptFiles as $position=>$scripts)
		{
			$jsFiles[$position]=array();
			foreach($scripts as $key=>$script)
			{
				$name=basename($script);
				if(isset($this->scriptMap[$name]))
				{
					if($this->scriptMap[$name]!==false)
						$jsFiles[$position][$this->scriptMap[$name]]=$this->scriptMap[$name];
				}
				else if(isset($this->scriptMap['*.js']))
				{
					if($this->scriptMap['*.js']!==false)
						$jsFiles[$position][$this->scriptMap['*.js']]=$this->scriptMap['*.js'];
				}
				else
					$jsFiles[$position][$key]=$script;
			}
		}
		$this->scriptFiles=$jsFiles;
	}

	/**
	 * Renders the specified core javascript library.
	 * @since 1.0.3
	 */
	public function renderCoreScripts()
	{
		if($this->_packages===null)
			return;
		$baseUrl=$this->getCoreScriptUrl();
		$cssFiles=array();
		$jsFiles=array();
		foreach($this->_coreScripts as $name)
		{
			foreach($this->_packages[$name] as $path)
			{
				$url=$baseUrl.'/'.$path;
				if(substr($path,-4)==='.css')
					$cssFiles[$url]='';
				else
					$jsFiles[$url]=$url;
			}
		}
		// merge in place
		if($cssFiles!==array())
		{
			foreach($this->cssFiles as $cssFile=>$media)
				$cssFiles[$cssFile]=$media;
			$this->cssFiles=$cssFiles;
		}
		if($jsFiles!==array())
		{
			if(isset($this->scriptFiles[self::POS_HEAD]))
			{
				foreach($this->scriptFiles[self::POS_HEAD] as $url)
					$jsFiles[$url]=$url;
			}
			$this->scriptFiles[self::POS_HEAD]=$jsFiles;
		}
	}

	/**
	 * Inserts the scripts in the head section.
	 * @param string the output to be inserted with scripts.
	 */
	public function renderHead(&$output)
	{
		$html='';
		foreach($this->_metas as $meta)
			$html.=CHtml::metaTag($meta['content'],null,null,$meta);
		foreach($this->_links as $link)
			$html.=CHtml::linkTag(null,null,null,null,$link);
		foreach($this->cssFiles as $url=>$media)
			$html.=CHtml::cssFile($url,$media)."\n";
		foreach($this->_css as $css)
			$html.=CHtml::css($css[0],$css[1])."\n";
		if($this->enableJavaScript)
		{
			if(isset($this->scriptFiles[self::POS_HEAD]))
			{
				foreach($this->scriptFiles[self::POS_HEAD] as $scriptFile)
					$html.=CHtml::scriptFile($scriptFile)."\n";
			}

			if(isset($this->scripts[self::POS_HEAD]))
				$html.=CHtml::script(implode("\n",$this->scripts[self::POS_HEAD]))."\n";
		}

		if($html!=='')
		{
			$count=0;
			$output=preg_replace('/(<title\b[^>]*>|<\\/head\s*>)/is','<###head###>$1',$output,1,$count);
			if($count)
				$output=str_replace('<###head###>',$html,$output);
			else
				$output=$html.$output;
		}
	}

	/**
	 * Inserts the scripts at the beginning of the body section.
	 * @param string the output to be inserted with scripts.
	 */
	public function renderBodyBegin(&$output)
	{
		$html='';
		if(isset($this->scriptFiles[self::POS_BEGIN]))
		{
			foreach($this->scriptFiles[self::POS_BEGIN] as $scriptFile)
				$html.=CHtml::scriptFile($scriptFile)."\n";
		}
		if(isset($this->scripts[self::POS_BEGIN]))
			$html.=CHtml::script(implode("\n",$this->scripts[self::POS_BEGIN]))."\n";

		if($html!=='')
		{
			$count=0;
			$output=preg_replace('/(<body\b[^>]*>)/is','$1<###begin###>',$output,1,$count);
			if($count)
				$output=str_replace('<###begin###>',$html,$output);
			else
				$output=$html.$output;
		}
	}

	/**
	 * Inserts the scripts at the end of the body section.
	 * @param string the output to be inserted with scripts.
	 */
	public function renderBodyEnd(&$output)
	{
		if(!isset($this->scriptFiles[self::POS_END]) && !isset($this->scripts[self::POS_END])
			&& !isset($this->scripts[self::POS_READY]) && !isset($this->scripts[self::POS_LOAD]))
			return;

		$fullPage=0;
		$output=preg_replace('/(<\\/body\s*>)/is','<###end###>$1',$output,1,$fullPage);
		$html='';
		if(isset($this->scriptFiles[self::POS_END]))
		{
			foreach($this->scriptFiles[self::POS_END] as $scriptFile)
				$html.=CHtml::scriptFile($scriptFile)."\n";
		}
		$scripts=isset($this->scripts[self::POS_END]) ? $this->scripts[self::POS_END] : array();
		if(isset($this->scripts[self::POS_READY]))
		{
			if($fullPage)
				$scripts[]="jQuery(document).ready(function() {\n".implode("\n",$this->scripts[self::POS_READY])."\n});";
			else
				$scripts[]=implode("\n",$this->scripts[self::POS_READY]);
		}
		if(isset($this->scripts[self::POS_LOAD]))
		{
			if($fullPage)
				$scripts[]="window.onload=function() {\n".implode("\n",$this->scripts[self::POS_LOAD])."\n};";
			else
				$scripts[]=implode("\n",$this->scripts[self::POS_LOAD]);
		}
		if(!empty($scripts))
			$html.=CHtml::script(implode("\n",$scripts))."\n";

		if($fullPage)
			$output=str_replace('<###end###>',$html,$output);
		else
			$output=$output.$html;
	}

	/**
	 * Returns the base URL of all core javascript files.
	 * If the base URL is not explicitly set, this method will publish the whole directory
	 * 'framework/web/js/source' and return the corresponding URL.
	 * @return string the base URL of all core javascript files
	 */
	public function getCoreScriptUrl()
	{
		if($this->_baseUrl!==null)
			return $this->_baseUrl;
		else
			return $this->_baseUrl=Yii::app()->getAssetManager()->publish(YII_PATH.'/web/js/source');
	}

	/**
	 * Sets the base URL of all core javascript files.
	 * This setter is provided in case when core javascript files are manually published
	 * to a pre-specified location. This may save asset publishing time for large-scale applications.
	 * @param string the base URL of all core javascript files.
	 */
	public function setCoreScriptUrl($value)
	{
		$this->_baseUrl=$value;
	}

	/**
	 * Registers a core javascript library.
	 * @param string the core javascript library name
	 * @see renderCoreScript
	 */
	public function registerCoreScript($name)
	{
		if(isset($this->_coreScripts[$name]))
			return;

		if($this->_packages===null)
		{
			$config=require(YII_PATH.'/web/js/packages.php');
			$this->_packages=$config[0];
			$this->_dependencies=$config[1];
		}
		if(!isset($this->_packages[$name]))
			return;
		if(isset($this->_dependencies[$name]))
		{
			foreach($this->_dependencies[$name] as $depName)
				$this->registerCoreScript($depName);
		}

		$this->_hasScripts=true;
		$this->_coreScripts[$name]=$name;
		$params=func_get_args();
		$this->recordCachingAction('clientScript','registerCoreScript',$params);
	}

	/**
	 * Registers a CSS file
	 * @param string URL of the CSS file
	 * @param string media that the CSS file should be applied to. If empty, it means all media types.
	 */
	public function registerCssFile($url,$media='')
	{
		$this->_hasScripts=true;
		$this->cssFiles[$url]=$media;
		$params=func_get_args();
		$this->recordCachingAction('clientScript','registerCssFile',$params);
	}

	/**
	 * Registers a piece of CSS code.
	 * @param string ID that uniquely identifies this piece of CSS code
	 * @param string the CSS code
	 * @param string media that the CSS code should be applied to. If empty, it means all media types.
	 */
	public function registerCss($id,$css,$media='')
	{
		$this->_hasScripts=true;
		$this->_css[$id]=array($css,$media);
		$params=func_get_args();
		$this->recordCachingAction('clientScript','registerCss',$params);
	}

	/**
	 * Registers a javascript file.
	 * @param string URL of the javascript file
	 * @param integer the position of the JavaScript code. Valid values include the following:
	 * <ul>
	 * <li>CClientScript::POS_HEAD : the script is inserted in the head section right before the title element.</li>
	 * <li>CClientScript::POS_BEGIN : the script is inserted at the beginning of the body section.</li>
	 * <li>CClientScript::POS_END : the script is inserted at the end of the body section.</li>
	 * </ul>
	 */
	public function registerScriptFile($url,$position=self::POS_HEAD)
	{
		$this->_hasScripts=true;
		$this->scriptFiles[$position][$url]=$url;
		$params=func_get_args();
		$this->recordCachingAction('clientScript','registerScriptFile',$params);
	}

	/**
	 * Registers a piece of javascript code.
	 * @param string ID that uniquely identifies this piece of JavaScript code
	 * @param string the javascript code
	 * @param integer the position of the JavaScript code. Valid values include the following:
	 * <ul>
	 * <li>CClientScript::POS_HEAD : the script is inserted in the head section right before the title element.</li>
	 * <li>CClientScript::POS_BEGIN : the script is inserted at the beginning of the body section.</li>
	 * <li>CClientScript::POS_END : the script is inserted at the end of the body section.</li>
	 * <li>CClientScript::POS_LOAD : the script is inserted in the window.onload() function.</li>
	 * <li>CClientScript::POS_READY : the script is inserted in the jQuery's ready function.</li>
	 * </ul>
	 */
	public function registerScript($id,$script,$position=self::POS_READY)
	{
		$this->_hasScripts=true;
		$this->scripts[$position][$id]=$script;
		if($position===self::POS_READY)
			$this->registerCoreScript('jquery');
		$params=func_get_args();
		$this->recordCachingAction('clientScript','registerScript',$params);
	}

	/**
	 * Registers a meta tag that will be inserted in the head section (right before the title element) of the resulting page.
	 * @param string content attribute of the meta tag
	 * @param string name attribute of the meta tag. If null, the attribute will not be generated
	 * @param string http-equiv attribute of the meta tag. If null, the attribute will not be generated
	 * @param array other options in name-value pairs (e.g. 'scheme', 'lang')
	 * @since 1.0.1
	 */
	public function registerMetaTag($content,$name=null,$httpEquiv=null,$options=array())
	{
		$this->_hasScripts=true;
		$options['content']=$content;
		if($name!==null)
			$options['name']=$name;
		if($httpEquiv!==null)
			$options['http-equiv']=$httpEquiv;
		$this->_metas[serialize($options)]=$options;
		$params=func_get_args();
		$this->recordCachingAction('clientScript','registerMetaTag',$params);
	}

	/**
	 * Registers a link tag that will be inserted in the head section (right before the title element) of the resulting page.
	 * @param string rel attribute of the link tag. If null, the attribute will not be generated.
	 * @param string type attribute of the link tag. If null, the attribute will not be generated.
	 * @param string href attribute of the link tag. If null, the attribute will not be generated.
	 * @param string media attribute of the link tag. If null, the attribute will not be generated.
	 * @param array other options in name-value pairs
	 * @since 1.0.1
	 */
	public function registerLinkTag($relation=null,$type=null,$href=null,$media=null,$options=array())
	{
		$this->_hasScripts=true;
		if($relation!==null)
			$options['rel']=$relation;
		if($type!==null)
			$options['type']=$type;
		if($href!==null)
			$options['href']=$href;
		if($media!==null)
			$options['media']=$media;
		$this->_links[serialize($options)]=$options;
		$params=func_get_args();
		$this->recordCachingAction('clientScript','registerLinkTag',$params);
	}

	/**
	 * Checks whether the CSS file has been registered.
	 * @param string URL of the CSS file
	 * @return boolean whether the CSS file is already registered
	 */
	public function isCssFileRegistered($url)
	{
		return isset($this->cssFiles[$url]);
	}

	/**
	 * Checks whether the CSS code has been registered.
	 * @param string ID that uniquely identifies the CSS code
	 * @return boolean whether the CSS code is already registered
	 */
	public function isCssRegistered($id)
	{
		return isset($this->_css[$id]);
	}

	/**
	 * Checks whether the JavaScript file has been registered.
	 * @param string URL of the javascript file
	 * @param integer the position of the JavaScript code. Valid values include the following:
	 * <ul>
	 * <li>CClientScript::POS_HEAD : the script is inserted in the head section right before the title element.</li>
	 * <li>CClientScript::POS_BEGIN : the script is inserted at the beginning of the body section.</li>
	 * <li>CClientScript::POS_END : the script is inserted at the end of the body section.</li>
	 * </ul>
	 * @return boolean whether the javascript file is already registered
	 */
	public function isScriptFileRegistered($url,$position=self::POS_HEAD)
	{
		return isset($this->scriptFiles[$position][$url]);
	}

	/**
	 * Checks whether the JavaScript code has been registered.
	 * @param string ID that uniquely identifies the JavaScript code
	 * @param integer the position of the JavaScript code. Valid values include the following:
	 * <ul>
	 * <li>CClientScript::POS_HEAD : the script is inserted in the head section right before the title element.</li>
	 * <li>CClientScript::POS_BEGIN : the script is inserted at the beginning of the body section.</li>
	 * <li>CClientScript::POS_END : the script is inserted at the end of the body section.</li>
	 * <li>CClientScript::POS_LOAD : the script is inserted in the window.onload() function.</li>
	 * <li>CClientScript::POS_READY : the script is inserted in the jQuery's ready function.</li>
	 * </ul>
	 * @return boolean whether the javascript code is already registered
	 */
	public function isScriptRegistered($id,$position=self::POS_READY)
	{
		return isset($this->scripts[$position][$id]);
	}

	/**
	 * Records a method call when an output cache is in effect.
	 * This is a shortcut to Yii::app()->controller->recordCachingAction.
	 * In case when controller is absent, nothing is recorded.
	 * @param string a property name of the controller. It refers to an object
	 * whose method is being called. If empty it means the controller itself.
	 * @param string the method name
	 * @param array parameters passed to the method
	 * @see COutputCache
	 * @since 1.0.5
	 */
	protected function recordCachingAction($context,$method,$params)
	{
		if(($controller=Yii::app()->getController())!==null)
			$controller->recordCachingAction($context,$method,$params);
	}
}