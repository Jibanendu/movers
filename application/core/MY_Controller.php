<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
	@ Extending Basic CI_Controller Class with some additional functionality,
	@ You can use all functions of Controller class
	@ Here Auth, Templating has been integrated and some function have been local referenced(overloading)
	
	@ -- Courtesy Soumen  Gorai
*/
class  MY_Controller  extends CI_Controller  
{

	private $_layout;
	private $_moduleName	=	'';
	private $_data;
	private $_metaData		= array();
	
	private static $_HTML_head	= array('js'=>'', 'js_arr'=>array() ,'css'=>'', 'css_arr'=>array() );

	/*
	@ $args = array( 'moduleName' => String,'auth' => Boolean)
	
	*/

    function __construct ($args = array()) 
	{
        parent::__construct();

		$moduleName	=	(isset($args['moduleName']) && $args['moduleName'] > '')?$args['moduleName']:'';

		switch($moduleName){
			case ADMIN:
				$this->_moduleName	=	$moduleName.'/';
				if(isset($args['auth']) && $args['auth']){
					if(!$this->authCheck('admin_loggedin')){
						$this->redirect(base_url().'index.php/admin/login');
					}
				}

				break;
			default:
				// Write Auth code
				if(isset($args['auth']) && $args['auth']){
					if(!$this->authCheck('front_loggedin')){
						$this->session->set_flashdata('flash_msg','You need to login for accessing this section.');
						$this->redirect(base_url().'index.php/login');
					}
				}
				break;
		}

		$this->_data=array(
			'_metaData'				=>$this->setMetaData(),
			'_resource_url'			=>base_url().RESOURCE.'/'.$this->_moduleName,
			'_base_url'				=>base_url().$this->_moduleName,
			'_content_for_layout'	=>'',
		);
    }
	
	
	/**
	Check authentication and set accordingly
	@param : $key : Authentication key
	@param : $explicit = Tell function to set explicitly. default =  FALSE
	@return :  Boolean
	*/
	public function authCheck($key, $explicit = FALSE)
	{
		if(!$this->session->userdata($key) || $explicit){	
			$this->session->set_userdata($key.'_navigationHistory', $_SERVER['REQUEST_URI']);			
			return FALSE;
		}else{
			return TRUE;
		}
	}

	public function getLayout()
	{
		return $this->_layout;
	}
	
	private function setLayout($layout)
	{
		$this->_layout		=	$this->_moduleName.'layout/'.$layout;
	}
	
	public function setData($data)
	{
			is_array($data)? $this->_data	=		$data : NULL;
	}
	
	public function setMetaData($_metaData=NULL)
	{	
		$this->_metaData	=	array(
			'title'			=>	'',
			'keywords'		=>	'',
			'description'	=>	'',
			'js'			=>	'',
			'css'			=>	'',
		);
		is_array($_metaData)?$this->_metaData	=	array_merge($this->_metaData, $_metaData):NULL;
	}

	/***********************************************************************************************/
	/**
	@ function pushHead() ==> is used to put js/css code in the layout head section 
	@ USES	=> View/Controller  Files calls this function
	@ param 
	$data	=	String [can be src path of the js/css file OR source code to be embaded]
	$which	=	String [Either js or css]
	$type	=	String [Either 'src' or 'link' default is src {src = source/raw code ; link = path of the file}]
	@ return =	void
	*/

	static function pushHead($data, $which, $type = 'src')
	{
		$data	=	(string)$data;
		
		switch($which){
			case 'js':
					if($type == 'src'){
						self::$_HTML_head['js']			.= "\n".$data;
					}
					if($type == 'link'){
						self::$_HTML_head['js_arr'][]	=	$data;
					}
				break;
			case 'css':
					if($type == 'src'){
						self::$_HTML_head['css']			.= "\n".$data;
					}
					if($type == 'link'){
						self::$_HTML_head['css_arr'][]	=	$data;
					}
				break;
		}
	}

	/**
	@ function content_for_js() ==> is used to put js code in the layout head section 
	@ USES		=> layout Files calls this function
	@ param		=> VOID

	@ return	=> String
	*/
	private function content_for_js()
	{
		$retval = '';
		
		if(count(self::$_HTML_head['js_arr'])){
			foreach(self::$_HTML_head['js_arr'] as $v){
				$retval .= 	'<script type="text/javascript" src="'.$this->_data['_resource_url'].$v.'" > </script>';
			}
		}
		if(self::$_HTML_head['js'] > ''){
			$retval .= '<script type="text/javascript">/*<![CDATA[ */'.self::$_HTML_head['js']."/*]]>*/</script>";
		}
		return $retval;
	}
	
	/**
	@ function content_for_css() ==> is used to put css code in the layout head section 
	@ USES		=> layout Files calls this function
	@ param		=> VOID

	@ return	=> String
	*/
	private function content_for_css()
	{
		$retval = '';
		if(self::$_HTML_head['css'] > ''){
			$retval .= '<style type="text/css">'.self::$_HTML_head['css']."</style>";
		}
		if(count(self::$_HTML_head['css_arr'])){
			foreach(self::$_HTML_head['css_arr'] as $v){
				$retval .= 	'<link href="'.$this->_data['_resource_url'].$v.'" rel="stylesheet" type="text/css" />';
			}
		}
		return $retval;
	}

	/***********************************************************************************************/
	
	
	/**
	@ function	: Render HTML Body of the page
	@ param	
	$view		=> name of view file
	$data		=> data of the page
	$layout		=> name of view layout file
	@ return	:  String
	*/
	protected function renderView($view = NULL,	$data = array(),	$layout = 'default')
	{	

		$this->_data						=	array_merge($this->_data, is_array($data)?$data:array());
		$this->_data['_content_for_layout']	=	$view?$this->load->view($this->_moduleName.$view,$this->_data,TRUE):'';
		
		$this->setLayout($layout);

		$this->_data['_content_for_js']		=	$this->content_for_js();
		$this->_data['_content_for_css']	=	$this->content_for_css();
		
		$this->_data['_metaData']			=	$this->_metaData;

		$this->load->view($this->_layout,$this->_data);
	}

	
	/**
	@ function	: Render Email Body from Template
	@ param		: as like renderView
	$data['heading']	=> is used for Sub-heading
	@ return	:  String
	*/
	protected function renderEmail($view = NULL,	$data = array(),	$layout = 'email')
	{	
		$email_data							=	array(
											'_resource_url'			=>	$this->base_url(TRUE).RESOURCE.'/'.$this->_moduleName,
											'_base_url'				=>	$this->base_url(TRUE).$this->_moduleName,
											'_content_for_layout'	=>	'',
											);
		
		$email_data							=	array_merge($email_data, is_array($data)?$data:array());
		$email_data['_content_for_layout']	=	$view?$this->load->view($this->_moduleName.'email/'.$view,$email_data,TRUE):'';

		$this->setLayout($layout);
		$email_data['_title_for_layout']	=	(isset($data['heading']) && $data['heading'] > '')?$data['heading'] : '';
		
		return $this->load->view($this->_layout,$email_data,TRUE);
	}


	/**
	@ function	: Get Referer URL Link
	@ param		: $set : BOOL: whether to set at function calling
	@ param		: $key : String : Navigation key
	@ return	:  String (anchor href Link)
	*/
	protected function referer_uri($set=FALSE, $key = 'my')
	{	
		$set?$this->set_referer_uri($key):NULL;
		return $this->session->userdata($key.'_navigationHistory');
	}// referer_uri()

	/**
	@ function	: Set Referer URL Link
	@ param		: $key : String : Navigation key
	@ return	: void
	*/
	private function set_referer_uri($key = 'my')
	{	
		if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] > ''){
			$this->session->set_userdata($key.'_navigationHistory', $_SERVER['HTTP_REFERER']);
		}else{
			if(!$this->session->userdata($key.'_navigationHistory')){	
				$this->session->set_userdata($key.'_navigationHistory', $this->base_url());			
			}
		}
		
	}// set_referer_uri()


	/***********************************************************************************************/
	/*
		Overloading(For local reference) redirect method of Helper Class
	*/
	public function redirect($uri = '', $method = 'location', $http_response_code = 302)
	{
		redirect($this->_moduleName.$uri, $method, $http_response_code);
	}

	/*
		Overloading(For local reference) base_url method of Helper Class
		@param :full_url : BOOL = whether u require baseURL with http
	*/
	public function base_url($full_url = FALSE)
	{
		return (($full_url?'http://'.$_SERVER['HTTP_HOST']:'').base_url().$this->_moduleName);
	}

	/***********************************************************************************************/
	
} // END CLASS

/* End of file MY_Controller.php */
/* Location: ./system/application/libraries/MY_Controller.php */