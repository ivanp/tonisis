<?php
$this->breadcrumbs=array(
	'Merk Barang'
);

$this->menu=array(
	array('label'=>'Tambah Merk Baru', 'url'=>array('create')),
);

?>

<h1>Merk Barang</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'merk-grid',
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
