<?php
$this->breadcrumbs=array(
	'Daftar Pelanggan'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Daftar Pelanggan', 'url'=>array('index')),
	array('label'=>'Daftar Pelanggan Baru', 'url'=>array('create')),
	array('label'=>'Lihat Detail Pelanggan', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update Pelanggan <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>