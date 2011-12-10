<?php
$this->breadcrumbs=array(
	'Merk Barang'=>array('index'),
	$model->nama=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Daftar Merk Barang', 'url'=>array('index')),
	array('label'=>'Tambah Merk Barang', 'url'=>array('create')),
	array('label'=>'Lihat Detail Merk Barang', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update Merk <?php echo $model->nama; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>