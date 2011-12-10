<?php
$this->breadcrumbs=array(
	'Pemasok'=>array('index'),
	$model->nama=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pemasok', 'url'=>array('index')),
	array('label'=>'Tambahkan Pemasok', 'url'=>array('create')),
	array('label'=>'Lihat Detil Pemasok', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update Pemasok <?php echo $model->nama; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>