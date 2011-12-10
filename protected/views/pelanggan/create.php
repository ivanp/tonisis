<?php
$this->breadcrumbs=array(
	'Pelanggan'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Daftar Pelanggan', 'url'=>array('index')),
);
?>

<h1>Create Pelanggan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>