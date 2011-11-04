<?php

abstract class Controller {
	public $name;
	
	public $layout='default';
	
	public $title='Default Title';
	
	public $menu=array(
		array('title'=>'Home','url'=>'home/index'),
		array('title'=>'Help','url'=>'home/help')
	);
	
	public function __construct() {
		$this->name=strtolower(get_class($this));
	}
		
	public function render($name,$params=array()) {
		extract($params);
		require 'views/'.$name.'/'.$name.'.php';
	}
	
	public function renderPageTitle() {
		return 'ToniSis :: '.$this->title;
	}
	
	public function renderMenu() {
		foreach($this->menu as $item) {
			
		}
	}
}