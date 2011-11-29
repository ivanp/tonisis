<?php
$this->breadcrumbs=array(
	'Barang'=>array('index'),
	'Tambah Baru',
);

$this->menu=array(
	array('label'=>'Daftar Barang', 'url'=>array('admin')),
	array('label'=>'Manage Barang', 'url'=>array('admin')),
);
?>

<h1>Tambah Produk Baru</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>