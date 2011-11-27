<?php
$this->breadcrumbs=array(
	'Merks',
);

$this->menu=array(
	array('label'=>'Create Merk', 'url'=>array('create')),
	array('label'=>'Manage Merk', 'url'=>array('admin')),
);
?>

<h1>Merks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
