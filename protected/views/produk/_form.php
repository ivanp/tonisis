<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'produk-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_jenis_barang'); ?>
		<?php echo $form->textField($model,'id_jenis_barang'); ?>
		<?php echo $form->error($model,'id_jenis_barang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_merk'); ?>
		<?php echo $form->textField($model,'id_merk'); ?>
		<?php echo $form->error($model,'id_merk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_pemasok'); ?>
		<?php echo $form->textField($model,'id_pemasok'); ?>
		<?php echo $form->error($model,'id_pemasok'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deskripsi'); ?>
		<?php echo $form->textArea($model,'deskripsi',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'deskripsi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tgl_buat'); ?>
		<?php echo $form->textField($model,'tgl_buat'); ?>
		<?php echo $form->error($model,'tgl_buat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tgl_update'); ?>
		<?php echo $form->textField($model,'tgl_update'); ?>
		<?php echo $form->error($model,'tgl_update'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jumlah'); ?>
		<?php echo $form->textField($model,'jumlah'); ?>
		<?php echo $form->error($model,'jumlah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'biaya'); ?>
		<?php echo $form->textField($model,'biaya',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'biaya'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'harga'); ?>
		<?php echo $form->textField($model,'harga',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'harga'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->