<?php
$this->breadcrumbs=array(
	'Produks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Tambah Produk Baru', 'url'=>array('create')),
	array('label'=>'View Produk', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Daftar Produk', 'url'=>array('index')),
);
?>

<h1>Update Produk <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>