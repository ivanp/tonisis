<?php
$this->breadcrumbs=array(
	'Produk'=>array('index'),
	'Tambah Baru',
);

$this->menu=array(
	array('label'=>'List Produk', 'url'=>array('index')),
	array('label'=>'Manage Produk', 'url'=>array('admin')),
);
?>

<h1>Tambah Produk Baru</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>