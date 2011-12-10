<?php
$this->breadcrumbs=array(
	'Jenis Barang'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Tambahkan Jenis Barang', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('jenis-barang-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Jenis Barangs</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'jenis-barang-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
			'name'=>'nama',
			'type'=>'raw',
			'value'=>'CHtml::link($data->nama, array("view","id"=>$data->id))',
		),
//		array(
//			'class'=>'CButtonColumn',
//		),
	),
)); ?>
