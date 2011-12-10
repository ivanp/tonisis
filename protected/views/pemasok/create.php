<?php
$this->breadcrumbs=array(
	'Pemasok'=>array('index'),
	'Tambahkan Pemasok',
);

$this->menu=array(
	array('label'=>'Daftar Pemasok', 'url'=>array('index')),
);
?>

<h1>Create Pemasok</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>