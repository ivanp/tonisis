<?php
$this->breadcrumbs=array(
	'Barang'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Tambah Barang Baru', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('produk-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manajemen Barang</h1>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'produk-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'id_jenis_barang',
		'id_merk',
		'id_pemasok',
		'nama',
		'deskripsi',
		/*
		'tgl_buat',
		'tgl_update',
		'jumlah',
		'biaya',
		'harga',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
