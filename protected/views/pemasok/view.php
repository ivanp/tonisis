<?php
$this->breadcrumbs=array(
	'Pemasoks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Pemasok', 'url'=>array('index')),
	array('label'=>'Create Pemasok', 'url'=>array('create')),
	array('label'=>'Update Pemasok', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Pemasok', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pemasok', 'url'=>array('admin')),
);
?>

<h1>View Pemasok #<?php echo $model->id; ?></h1>

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
