<?php
$this->breadcrumbs=array(
	'Pemasok'
);

$this->menu=array(
	array('label'=>'Tambahkan Pemasok', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('pemasok-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Daftar Pemasok</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pemasok-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
			'name'=>'nama',
			'type'=>'raw',
			'value'=>'CHtml::link($data->nama, array("view","id"=>$data->id))',
		),
		'perusahaan',
		'no_telepon',
		'alamat1',
		'alamat2',
		/*
		'kota',
		'provinsi',
		*/
//		array(
//			'class'=>'CButtonColumn',
//		),
	),
)); ?>
