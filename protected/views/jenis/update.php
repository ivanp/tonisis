<?php
$this->breadcrumbs=array(
	'Jenis Barang'=>array('index'),
	$model->nama=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Daftar Jenis Barang', 'url'=>array('index')),
	array('label'=>'Tambah Jenis Barang', 'url'=>array('create')),
	array('label'=>'Lihat Detail Jenis Barang', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update Jenis Barang <?php echo $model->nama; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>