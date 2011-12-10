<?php
$this->breadcrumbs=array(
	'Pelanggans'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Daftar Pelanggan', 'url'=>array('index')),
	array('label'=>'Buat Pelanggan Baru', 'url'=>array('create')),
	array('label'=>'Update Data Pelanggan', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Hapus Pelanggan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Hapus pelanggan ini?')),
);
?>

<h1>View Pelanggan #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
		'telepon',
		'alamat1',
		'alamat2',
		'kota',
		'provinsi',
		'kodepos',
		'tgl_buat',
	),
)); ?>
