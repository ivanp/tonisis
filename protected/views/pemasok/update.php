<?php
$this->breadcrumbs=array(
	'Pemasoks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pemasok', 'url'=>array('index')),
	array('label'=>'Create Pemasok', 'url'=>array('create')),
	array('label'=>'View Pemasok', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Pemasok', 'url'=>array('admin')),
);
?>

<h1>Update Pemasok <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>