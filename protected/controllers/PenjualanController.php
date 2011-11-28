<?php

class PenjualanController extends Controller
{
	public function actionIndex()
	{
		$model=new FormPenjualan;

		if(isset($_POST['FormPenjualan']))
		{
			$model->attributes=$_POST['FormPenjualan'];
			var_dump($_POST['FormPenjualan']);
//			if($model->save())
//			{
//				// tambahkan pesan flash disini
//				$this->redirect(array('index'));
//			}
		}

		$this->render('index',array(
			'model'=>$model,
		));
	}

	public function filters()
	{
		return array(
			'accessControl', 
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',
				'users'=>array('@'),
			),
			array('deny',
				'users'=>array('*'),
			),
		);
	}
}