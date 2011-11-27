<?php
$this->breadcrumbs=array(
	'Jenis Barangs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List JenisBarang', 'url'=>array('index')),
	array('label'=>'Manage JenisBarang', 'url'=>array('admin')),
);
?>

<h1>Create JenisBarang</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>