<?php
$this->breadcrumbs=array(
	'Pemasok'=>array('index'),
	$model->nama,
);

$this->menu=array(
	array('label'=>'Daftar Pemasok', 'url'=>array('index')),
	array('label'=>'Tambahkan Pemasok', 'url'=>array('create')),
	array('label'=>'Update Data Pemasok', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Hapus Pemasok', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Hapus Pemasok ini?')),
);
?>

<h1><?php echo $model->nama; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
		'perusahaan',
		'no_telepon',
		'alamat1',
		'alamat2',
		'kota',
		'provinsi',
	),
)); ?>
