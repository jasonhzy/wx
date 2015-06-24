<?php
require_once(COMMON_PATH.'/Branch.php');
require_once(COMMON_PATH.'/ServiceHelper.php');
class WeixinAction extends Action 
{
	private $token;
	private $data=array();
	public $wxuser;
	public $siteUrl;
	public $user;
    public function index()  {
		$this->siteUrl=C('site_url');
		if (!class_exists('SimpleXMLElement')){
			exit('SimpleXMLElement class not exist');
		}
		if (!function_exists('dom_import_simplexml')){
			exit('dom_import_simplexml function not exist');
		}
		$this->token = $this->_get('token', "htmlspecialchars");
		if(!preg_match("/^[0-9a-zA-Z]{3,42}$/", $this->token)){
			exit('error token');
		}
		$weixin = new Wechat($this->token, $this->wxuser);
		$this->wxuser = S('wxuser_'.$this->token);
		if (!$this->wxuser){
			$this->wxuser = D('Wxuser')->where(array('token'=>$this->token))->find();
			S('wxuser_'.$this->token, $this->wxuser);
		}
		$this->user=M('Users')->where(array('id'=>$this->wxuser['user_id']))->find();
		$this->data = $weixin->request();
		
		if ($this->data) {
			list($content, $type) = $this->reply($this->data);
			$weixin->response($content, $type);
		}
    }
    
    private function reply($data){
        if (isset($data['Event'])) {
        	$wx_event = strtolower($data['Event']);
        	switch ($wx_event) {
        		case 'subscribe':
        			break;
        		case 'unsubscribe':
        			break;
        		case 'click':
                	$this->data['Content'] = $data['EventKey'];
        			break;
        		case 'voice':
        			break;
        		case 'scan':
        			break;
        		case 'location':
        			break;
        		case 'masssendjobfinish':
        			break;
        		default:
        			break;
        	}
            $keyword = $this->data['Content'];
            $this->keyword($keyword);
        }
    }
    
    private function keyword( $keyword='' ){
    	
    
    }
}