<?php
Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
 
$this->breadcrumbs=array(
	'Laporan'=>array('/laporan'),
	'Penjualan',
);


?>

<h1>Input Laporan Penjualan</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'form-penjualan',
	'enableAjaxValidation'=>false,
)); 
if($form instanceof CActiveForm);
if($model instanceof LaporanPenjualanForm);
?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'jangkaWaktu'); ?>
		
		<?php
		$options=$model->getWaktuOptions();
		foreach($options as $k=>$opt):
		?>
		<?php echo $form->radioButton($model, 'jangkaWaktu',array('value'=>$k,'uncheckValue'=>null)); ?>
		<?php echo $opt; ?><br/>
		
		
		<?php endforeach; ?>
		<?php echo $form->radioButton($model, 'jangkaWaktu',array('value'=>LaporanPenjualanForm::TglPilih,'uncheckValue'=>null)); ?>
		
		Sejak: <?php
    $this->widget('CJuiDateTimePicker',array(
        'model'=>$model, //Model object
        'attribute'=>'waktuDari', //attribute name
                'mode'=>'date', //use "time","date" or "datetime" (default)
        'options'=>array(
					'dateFormat'=>'dd-mm-yy'
				) // jquery plugin options
    ));
?>
		
		Hingga: <?php
    $this->widget('CJuiDateTimePicker',array(
        'model'=>$model, //Model object
        'attribute'=>'waktuHingga', //attribute name
                'mode'=>'date', //use "time","date" or "datetime" (default)
        'options'=>array(
					'dateFormat'=>'dd-mm-yy'
				) // jquery plugin options
    ));
?>
		
		<?php echo $form->error($model,'jangkaWaktu'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Lanjutkan'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->