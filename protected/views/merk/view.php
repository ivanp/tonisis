<?php
$this->breadcrumbs=array(
	'Merk Barang'=>array('index'),
	$model->nama,
);

$this->menu=array(
	array('label'=>'Daftar Merk Barang', 'url'=>array('index')),
	array('label'=>'Tambah Merk Barang', 'url'=>array('create')),
	array('label'=>'Update Detail Merk Barang', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Hapus Merk', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Yakin ingin menghapus merk ini?')),
);
?>

<h1><?php echo $model->nama; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
	),
)); ?>
