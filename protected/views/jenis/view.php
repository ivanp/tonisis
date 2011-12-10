<?php
$this->breadcrumbs=array(
	'Jenis Barang'=>array('index'),
	$model->nama,
);

$this->menu=array(
	array('label'=>'Daftar Jenis Barang', 'url'=>array('index')),
	array('label'=>'Tambahkan Jenis Barang', 'url'=>array('create')),
	array('label'=>'Update Detail Jenis Barang', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Hapus JenisBarang', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Anda yakin mau menghapus jen?')),
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
