<?php
$this->breadcrumbs=array(
	'Pemasoks',
);

$this->menu=array(
	array('label'=>'Create Pemasok', 'url'=>array('create')),
	array('label'=>'Manage Pemasok', 'url'=>array('admin')),
);
?>

<h1>Pemasoks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
