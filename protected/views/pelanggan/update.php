<?php
$this->breadcrumbs=array(
	'Pelanggan'=>array('index'),
	$model->nama=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Daftar Pelanggan', 'url'=>array('index')),
	array('label'=>'Tambah Pelanggan Baru', 'url'=>array('create')),
	array('label'=>'Lihat Detail Pelanggan', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update Pelanggan <?php echo $model->nama; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>