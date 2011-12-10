<?php
$this->breadcrumbs=array(
	'Jenis Barang'=>array('index'),
	'Tambah Baru',
);

$this->menu=array(
	array('label'=>'Daftar Jenis Barang', 'url'=>array('index')),
);
?>

<h1>Tambah Jenis Barang</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>