<?php
$this->breadcrumbs=array(
	'Merk Barang'=>array('index'),
	'Tambah Baru',
);

$this->menu=array(
	array('label'=>'Daftar Merk Barang', 'url'=>array('index')),
);
?>

<h1>Tambah Merk Barang</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>