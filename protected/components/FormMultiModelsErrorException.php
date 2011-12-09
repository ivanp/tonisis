<?php

class FormMultiModelsErrorException extends CException
{
	private $model;
	
	public function __construct(CModel $model)
	{
		$this->model=$model;
	}
	
	/**
	 *
	 * @return CModel
	 */
	public function getModel()
	{
		return $this->model;
	}
}