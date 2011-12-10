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
					if($model->registerMode==FormPenjualan::ModeReturn)
					{
						if ($produk->kuantitas>0)
						{
							$produk->kuantitas=0-$produk->kuantitas;
						}
					}
					$model->items[]=$produk;
				}
			}
			if($model->addProdukId)
			{
				$produk=Produk::model()->findByPk($model->addProdukId);
				if($produk instanceof Produk);
				$produk->harga=(int)$produk->harga;
				if($model->registerMode==FormPenjualan::ModeReturn)
				{
					if ($produk->kuantitas>0)
					{
						$produk->kuantitas=0-$produk->kuantitas;
					}
				}
				$model->items[]=$produk;
				$model->addProdukId=null;
				$model->addProdukName='';
			}
			if(!empty($_POST['selesai']))
			{
				if(empty($model->payment))
				{
					$model->payment=$model->getGrandTotal();
				}
				
				$db=Yii::app()->db;
				$trans=$db->beginTransaction();
				try
				{
					// Save data penjualan
					$penjualan=new Penjualan;
					if(!empty($model->customerId))
						$penjualan->id_pelanggan=$model->customerId;
					$penjualan->tanggal=date('Y-m-d H:i:s');
					$penjualan->save();
					// Save produknya
					foreach($model->items as $item)
					{
						if($item instanceof Produk);
						$p_jual=new PenjualanProduk;
						$p_jual->id_barang=$item->id;
						$p_jual->kuantitas=$item->kuantitas;
						$p_jual->harga=$item->harga;
						$p_jual->id_pemesanan=$penjualan->id;
						$p_jual->save();
						// Save inventaris
						if($item instanceof Produk);
						$inv=new Inventaris;
						$inv->id_produk=$item->id;
						$inv->kuantitas=$item->kuantitas;
						$inv->keterangan='Penjualan';
						$inv->tanggal=date('Y-m-d H:i:s');
						$inv->save();
						// Kurangi jumlah produk tersedia
						$item->jumlah-=$item->kuantitas;
						$item->save();
					}
					// Simpan pembayaran
					$pembayaran=new Pembayaran;
					$pembayaran->penjualan_id=$penjualan->id;
					$pembayaran->cara='Cash';
					$pembayaran->jumlah=$model->payment;
					$pembayaran->save();
					$trans->commit();
					$this->redirect(array('/penjualan/receipt','id'=>$penjualan->id));
				}
				catch (Exception $e)
				{
					$trans->rollback();
				}
			}
		}

		$this->render('index',array(
			'model'=>$model,
		));
	}
	
	public function actionReceipt()
	{
		if(!isset($_GET['id']))
			throw new CHttpException(400);
		$penjualan=Penjualan::model()->findByPk($_GET['id']);
		if(!($penjualan instanceof Penjualan))
			throw new CHttpException(404,'Receipt tidak ditemukan');
		$this->render('receipt',array(
			'penjualan'=>$penjualan
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