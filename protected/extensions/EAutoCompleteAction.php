<?php

class EAutoCompleteAction extends CAction {

	public $model;
	public $attribute_key;
	public $attribute_value;
	private $results = array();

	public function run() {
		if (isset($this->model, $this->attribute_key, $this->attribute_value)) {
			$criteria = new CDbCriteria();
			$criteria->compare($this->attribute_value, $_GET['term'], true);
			$model = new $this->model;
			foreach ($model->findAll($criteria) as $m) {
				$this->results[] = array('id'=>$m->{$this->attribute_key},'value'=>$m->{$this->attribute_value});
//				$this->results[] = $m->{$this->attribute_value};
			}
		}
		echo CJSON::encode($this->results);
	}

}
