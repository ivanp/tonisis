<?php
$numberFormatter=Yii::app()->locale->getNumberFormatter();

$this->breadcrumbs=array(
	'Produk'=>array('index'),
	$model->nama,
);

$this->menu=array(
	array('label'=>'Tambah Produk Baru', 'url'=>array('create')),
	array('label'=>'Update Produk', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Hapus Produk', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Daftar Produk', 'url'=>array('index')),
);
?>

<h1><?php echo $model->nama; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
			'label'=>'Jenis',
			'value'=>$model->jenis->nama
		),
		array(
			'label'=>'Merk',
			'value'=>$model->merk->nama
		),
		array(
			'label'=>'Pemasok',
			'value'=>$model->pemasok->nama
		),
		'nama',
		'deskripsi',
		'tgl_buat',
		'tgl_update',
		'jumlah',
		'biaya',
		'harga',
	),
)); ?>
