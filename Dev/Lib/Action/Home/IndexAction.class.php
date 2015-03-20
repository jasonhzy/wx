<?php
/**
 * Desc: index action for home page
 *
 * @author jason hu
 * @since 2015-3-20
 */
class IndexAction extends BaseAction{
	
	public function index(){
		header('Location: ./index.php?g=Home&m=Index&a=login');
	}
	
	function  login() {
		$this->display();
	}
}