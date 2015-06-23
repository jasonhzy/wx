<?php
class UserAction extends BaseAction {
	public $token;
	protected function _initialize() {
		parent::_initialize();
		$this->token = session('token');
        $this->uid = session('uid');
		if ($this->uid) {
				$this->redirect('Home/Index/login');
		}
	}
}

?>