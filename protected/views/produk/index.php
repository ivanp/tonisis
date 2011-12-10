<?php
$this->breadcrumbs=array(
	'Produk'=>array('index'),
	'Semua Produk',
);

$this->menu=array(
	array('label'=>'Tambah Produk Baru', 'url'=>array('create')),
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

<h1>Daftar Produk</h1>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'produk-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'enableSorting'=>false,
	'columns'=>array(
		'id',
		array(
			'name'=>'nama',
			'type'=>'raw',
			'value'=>'CHtml::link($data->nama, $data->createViewUrl())',
		),
		array(
			'name'=>'id_jenis_barang',
			'value'=>'$data->jenis->nama',
		),
		array(
			'name'=>'id_merk',
			'value'=>'$data->merk->nama',
		),
		array(
			'name'=>'id_pemasok',
			'value'=>'$data->pemasok->nama',
		),
//		'nama',
//		'deskripsi',
		array(
			'name'=>'biaya',
			'value'=>'$data->getFormattedBiaya()'
		),
		array(
			'name'=>'harga',
			'value'=>'$data->getFormattedHarga()'
		),
		array(
			'header'=>'Stok',
			'value'=>'$data->jumlah'
		),
		//'harga',
		/*
		'tgl_buat',
		'tgl_update',
		'jumlah',
		'biaya',
		'harga',
		*/
//		array(
//			'class'=>'CButtonColumn',
//		),
	),
)); ?>
