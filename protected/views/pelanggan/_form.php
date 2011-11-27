<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pelanggan-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telepon'); ?>
		<?php echo $form->textField($model,'telepon',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'telepon'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alamat1'); ?>
		<?php echo $form->textField($model,'alamat1',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'alamat1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alamat2'); ?>
		<?php echo $form->textField($model,'alamat2',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'alamat2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kota'); ?>
		<?php echo $form->textField($model,'kota',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'kota'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'provinsi'); ?>
		<?php echo $form->textField($model,'provinsi',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'provinsi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kodepos'); ?>
		<?php echo $form->textField($model,'kodepos',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'kodepos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tgl_buat'); ?>
		<?php echo $form->textField($model,'tgl_buat'); ?>
		<?php echo $form->error($model,'tgl_buat'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->