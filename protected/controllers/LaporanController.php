<?php

class LaporanController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
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
	
	public function actionPenjualan()
	{
//		var_dump(date('Y-m-d H:i:s', strtotime('1st january now')));exit;
		
		$model=new LaporanPenjualanForm;
		if(isset($_POST['LaporanPenjualanForm']))
		{
			$model->attributes=$_POST['LaporanPenjualanForm'];
			if ($model->validate())
			{
//				echo '<blockquote><pre>';
//				var_dump($_POST['LaporanPenjualanForm'],$model);
//				echo '</pre></blockquote>';exit;
				switch($model->jangkaWaktu)
				{
					case LaporanPenjualanForm::TglHariIni:
						$from=$to=time();
						break;
					case LaporanPenjualanForm::TglKemarin:
						$from=$to=strtotime('yesterday');
						break;
					case LaporanPenjualanForm::Tgl7HariTerakhir:
						$from=strtotime('last week');
						$to=time();
						break;
					case LaporanPenjualanForm::TglBulanIni:
						$from=strtotime('first day of this month');
						$to=time();
						break;
					case LaporanPenjualanForm::TglTahunini:
						$from=strtotime('1st january now');
						$to=time();
						break;
					case LaporanPenjualanForm::TglSemua:
						$from=0;
						$to=time();
						break;
					case LaporanPenjualanForm::TglPilih:
						$from=DateTime::createFromFormat('d-m-Y H:i:s',$model->waktuDari.' 00:00:00');
						$from=$from->getTimestamp();
						$to=DateTime::createFromFormat('d-m-Y H:i:s',$model->waktuDari.' 23:59:59');
						$to=$to->getTimestamp();
						break;
				}
				
//				echo sprintf('Dari %s ke %s',date('Y-m-d',$from),date('Y-m-d',$to));exit;

				$conn=Yii::app()->db;
				$cmd=$conn->createCommand('SELECT DATE( t1.tanggal ) AS tgl, SUM( t2.harga ) AS total_harga, SUM( t3.biaya ) AS total_biaya
	FROM  `penjualan` t1
	JOIN penjualan_produk t2 ON t1.id = t2.id_pemesanan
	JOIN produk t3 ON t2.id_barang = t3.id
	WHERE DATE( t1.tanggal ) >= :dari AND DATE( t1.tanggal ) <= :hingga
	GROUP BY tgl
	ORDER BY tgl');
				$cmd->bindValue(':dari', date('Y-m-d',$from));
				$cmd->bindValue(':hingga', date('Y-m-d',$to));
				$rows=$cmd->queryAll();
				$total=0;
				$profit=0;
				foreach($rows as $k=>$row)
				{
					$total+=$row['total_harga'];
					$rows[$k]['profit']=$row['total_harga']-$row['total_biaya'];
					$profit+=$rows[$k]['profit'];
				}

				$this->render('penjualan',array(
					'dari'=>$from,
					'hingga'=>$to,
					'rows'=>$rows,
					'total'=>$total,
					'profit'=>$profit
				));
				Yii::app()->end();
			}
		}
		$this->render('form_penjualan',array(
			'model'=>$model,
		));
	}
	
	public function actionPersediaan()
	{
		$daftar_produk=Produk::model()->findAll();
		
		$this->render('persediaan',array(
			'semua_produk'=>$daftar_produk,
		));
	}
}