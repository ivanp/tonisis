<?php
$this->breadcrumbs=array(
	'Pelanggan'=>array('index'),
	'Daftar Pelanggan',
);

$this->menu=array(
	array('label'=>'Tambah Pelanggan Baru', 'url'=>array('create')),
);

//Yii::app()->clientScript->registerScript('search', "
//$('.search-button').click(function(){
//	$('.search-form').toggle();
//	return false;
//});
//$('.search-form form').submit(function(){
//	$.fn.yiiGridView.update('pelanggan-grid', {
//		data: $(this).serialize()
//	});
//	return false;
//});
//");
?>

<h1>Daftar Pelanggan</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pelanggan-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'enableSorting'=>false,
	'columns'=>array(
		'id',
//		'nama',
		array(
			'name'=>'nama',
			'type'=>'raw',
			'value'=>'CHtml::link($data->nama, array("view","id"=>$data->id))',
		),
		'telepon',
		'fax',
		'alamat1',
		'alamat2',
		'kota',
		/*
		'provinsi',
		'kodepos',
		'tgl_buat',
		*/
//		array(
//			'class'=>'CButtonColumn',
//		),
	),
)); ?>
