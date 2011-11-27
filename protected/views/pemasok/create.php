<?php
$this->breadcrumbs=array(
	'Pemasoks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pemasok', 'url'=>array('index')),
	array('label'=>'Manage Pemasok', 'url'=>array('admin')),
);
?>

<h1>Create Pemasok</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>