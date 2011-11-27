<?php
$this->breadcrumbs=array(
	'Merks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Merk', 'url'=>array('index')),
	array('label'=>'Create Merk', 'url'=>array('create')),
	array('label'=>'View Merk', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Merk', 'url'=>array('admin')),
);
?>

<h1>Update Merk <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>