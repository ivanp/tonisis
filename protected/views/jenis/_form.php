<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'jenis-barang-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Simpan'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->