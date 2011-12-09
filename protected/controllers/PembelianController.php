<?php

class PembelianController extends Controller
{
	public function actionReceipt()
	{
		if(!isset($_GET['id']))
			throw new CHttpException(400);
		$pembelian=Pembelian::model()->findByPk($_GET['id']);
		if(!($pembelian instanceof Pembelian))
			throw new CHttpException(404,'Receipt tidak ditemukan');
		$this->render('receipt',array(
			'pembelian'=>$pembelian
		));
	}
	
	public function actionIndex()
	{
		$model=new FormPembelian;
		if(isset($_POST['FormPembelian']))
		{
			$model->attributes=$_POST['FormPembelian'];
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
				$produk=Produk::model()->findByPk($model->addProdukId);
				if($produk instanceof Produk);
				$produk->harga=(int)$produk->harga;
				$model->items[]=$produk;
				$model->addProdukId=null;
				$model->addProdukName='';
			}
			if($model->validate() && !empty($_POST['selesai']))
			{
				$db=Yii::app()->db;
				$trans=$db->beginTransaction();
				try
				{
					// Save data penjualan
					$pembelian=new Pembelian;
					$pembelian->id_pemasok=$model->pemasokId;
					$pembelian->tanggal=date('Y-m-d H:i:s');
					$pembelian->no_po=$model->suratJalan;
					if (!$pembelian->save())
						throw new FormMultiModelsErrorException($pembelian);
					// Save produknya
					foreach($model->items as $item)
					{
						if($item instanceof Produk);
						$p_beli=new PembelianProduk;
						$p_beli->id_produk=$item->id;
						$p_beli->jumlah=$item->kuantitas;
						$p_beli->biaya=$item->biaya;
						$p_beli->id_pembelian=$pembelian->id;
						if(!$p_beli->save())
							throw new FormMultiModelsErrorException($p_beli);
						// Save inventaris
						if($item instanceof Produk);
						$inv=new Inventaris;
						$inv->id_produk=$item->id;
						$inv->kuantitas=$item->kuantitas;
						$inv->keterangan='Pembelian';
						$inv->tanggal=date('Y-m-d H:i:s');
						if(!$inv->save())
							throw new FormMultiModelsErrorException($inv);
						// Kurangi jumlah produk tersedia
						$item->jumlah+=$item->kuantitas;
						if(!$item->save())
							throw new FormMultiModelsErrorException($item);
					}
					$trans->commit();
					$this->redirect(array('/pembelian/receipt','id'=>$pembelian->id));
				}
				catch (FormMultiModelsErrorException $e)
				{
					$model->addErrors($e->getModel()->getErrors());
					$trans->rollback();
				}
				catch (Exception $e)
				{
					$model->addError('error', 'Terjadi kesalahan fatal: '.$e->getMessage());
					$trans->rollback();
				}
			}
		}

		$this->render('index',array(
			'model'=>$model,
		));
	}

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
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