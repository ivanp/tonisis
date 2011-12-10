<?php
$this->breadcrumbs=array(
	'Produk'=>array('index'),
	'Tambah Baru',
);

$this->menu=array(
	array('label'=>'Daftar Produk', 'url'=>array('index')),
);
?>

<h1>Tambah Produk Baru</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>