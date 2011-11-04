<?php

class ToniCore {
	private $instance;
	
	protected function __construct() {
	}
	
	static public function getInstance() {
		if(!isset(self::$instance))
			self::$instance=new ToniCore();
		return self::$instance;
	}
	
	public function init() {
		
	}
	
	
	static public function clean($str) {
		return htmlspecialchars($str);
	}
	
	static public function createUrl($ctrl_action,$params=array()) {
		list($controller,$action)=explode('/',$ctrl_action);
		$params['c']=$controller;
		$params['i']=$action;
		return BASE_URL.'/index.php?'.http_build_query($params);
	}
}