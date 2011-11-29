<?php
$this->breadcrumbs=array(
	'Produks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Tambah Barang Baru', 'url'=>array('create')),
	array('label'=>'View Barang', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Barang', 'url'=>array('admin')),
);
?>

<h1>Update Produk <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>