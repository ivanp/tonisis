<?php

class PenjualanController extends Controller
{
	public function actions()
  {
    return array(
      'produk_list'=>array(
        'class'=>'application.extensions.EAutoCompleteAction',
        'model'=>'Produk',
				'attribute_key'=>'id',
        'attribute_value'=>'nama',
      ),
    );
  }
	
	public function actionIndex()
	{
		$model=new FormPenjualan;

		if(isset($_POST['FormPenjualan']))
		{
			$model->attributes=$_POST['FormPenjualan'];
			if(isset($_POST['Produk']))
			{
				foreach($_POST['Produk'] as $k=>$v)
				{
					$produk=Produk::model()->findByPk($k);
					$produk->attributes=$v;
					$model->items[]=$produk;
				}
			}
			if($model->addProdukId)
			{
				$model->items[]=Produk::model()->findByPk($model->addProdukId);
				$model->addProdukId=null;
				$model->addProdukName='';
			}
			
			
			//var_dump($_POST['FormPenjualan']);
			//
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