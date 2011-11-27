<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_jenis_barang')); ?>:</b>
	<?php echo CHtml::encode($data->id_jenis_barang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_merk')); ?>:</b>
	<?php echo CHtml::encode($data->id_merk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pemasok')); ?>:</b>
	<?php echo CHtml::encode($data->id_pemasok); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deskripsi')); ?>:</b>
	<?php echo CHtml::encode($data->deskripsi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_buat')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_buat); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_update')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_update); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jumlah')); ?>:</b>
	<?php echo CHtml::encode($data->jumlah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('biaya')); ?>:</b>
	<?php echo CHtml::encode($data->biaya); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('harga')); ?>:</b>
	<?php echo CHtml::encode($data->harga); ?>
	<br />

	*/ ?>

</div>