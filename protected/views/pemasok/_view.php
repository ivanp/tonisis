<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('perusahaan')); ?>:</b>
	<?php echo CHtml::encode($data->perusahaan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_telepon')); ?>:</b>
	<?php echo CHtml::encode($data->no_telepon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat1')); ?>:</b>
	<?php echo CHtml::encode($data->alamat1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat2')); ?>:</b>
	<?php echo CHtml::encode($data->alamat2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kota')); ?>:</b>
	<?php echo CHtml::encode($data->kota); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('provinsi')); ?>:</b>
	<?php echo CHtml::encode($data->provinsi); ?>
	<br />

	*/ ?>

</div>