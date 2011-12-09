<?php
$numberFormatter=Yii::app()->locale->getNumberFormatter();
//var_dump(Yii::app()->locale->getNumberFormatter()->formatCurrency(500000,'IDR'));exit;
//$numberFormatter->formatCurrency(500000,'IDR');
if($model instanceof FormPenjualan);

//$cs=Yii::app()->clientScript;
//if($cs instanceof CClientScript);
//$cs->registerCoreScript('jquery');
//$script=<<<SCRIPT
//
//SCRIPT;
//$cs->registerScript('registerModeScript', $script, CClientScript::POS_READY);

$this->breadcrumbs=array(
	'Pembelian',
);?>
<h1>Form <?php echo ($model->registerMode==FormPembelian::ModeTerima) ? 'Penerimaan Barang' : 'Retur Barang'; ?></h1>


<div class="form">

<?php

$form=$this->beginWidget('CActiveForm', array(
	'id'=>'produk-pembelian-form',
	'enableAjaxValidation'=>false,
));
if($form instanceof CActiveForm);


?>

	<?php echo $form->errorSummary($model); ?>

	

	
	<div id="content_area">
<div id="register_wrapper">
	
<table width="100%">
	<tr>
		<td>
				<?php echo $form->dropDownList($model,'registerMode',FormPembelian::getRegisterModeOptions(),array('id'=>'pilRegisterMode')); ?>
			<?php echo $form->error($model,'registerMode'); ?>
		</td>
		<td style="text-align: right;">
			<?php echo $form->labelEx($model,'suratJalan'); ?>
		</td>
		<td>
			<?php echo $form->textField($model,'suratJalan') ?>
			<?php echo $form->error($model,'suratJalan'); ?>
		</td>
		<td style="text-align: right">
				<?php echo $form->dropDownList($model,'pemasokId',Pemasok::model()->getOptions()); ?>
			<?php echo $form->error($model,'pemasokId'); ?>
		</td>
	</tr>
</table>
			
	

<table id="cash_register">
<thead>
<tr>
<th style="width: 11%;">&nbsp;</th>
<th style="width: 11%;">Kode Barang</th>
<th style="width: 39%;">Nama Barang</th>
<th style="width: 11%;">Harga</th>
<th style="width: 11%;">Kuantitas</th>
<th style="width: 25%;">Total</th>
</tr>
</thead>
<tbody id="cart_contents">
	<?php
	if(count($model->items)) 
	{
		
		foreach($model->items as $item)
		{
			
?>
			<tr produk_id="<?php echo $item->id ?>">
				<td class="produk_aksi"><?php echo CHtml::linkButton('Hapus',array('class'=>'delBtn','produk_id'=>$item->id)) ?></td>
				<td class="produk_id"><?php echo CHtml::encode($item->id) ?></td>
				<td style=""><?php echo CHtml::encode($item->nama) ?></td>
				<td><?php
					echo $form->hiddenField($item, '['.$item->id.']harga'); 
					//$form->textField($item, '['.$item->id.']harga', array('id'=>'harga_'.$item->id,'class'=>'money updateblur'));
					echo $numberFormatter->formatCurrency($item->harga,'IDR');
				?></td>
				<td><?php
					echo $form->textField($item, '['.$item->id.']kuantitas', array('class'=>'money updateblur','style'=>'width: 40px'));
				?></td>
				<td style="text-align: right"><?php echo $numberFormatter->formatCurrency($item->getTotalHarga(),'IDR')?></td>
			</tr>
<?php
		}
	}
?>
	
		<tr style="height: 3px;">
		<td colspan="6" style="background-color: white;">
			<?php
			echo $form->hiddenField($model, 'addProdukId',array('id'=>'addProdukId'));
			 $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
      'attribute'=>'addProdukName',
        'model'=>$model,
        'sourceUrl'=>array('penjualan/produk_list'),
        'name'=>'my_input_name',
        'options'=>array(
          'minLength'=>'1',
					'autoFocus'=>true,
					'select'=>'js: function(event,ui) {
						$("#addProdukId").val(ui.item.id);
						$(this).parents("form").submit();
						}'
        ),
        'htmlOptions'=>array(
          'size'=>45,
          'maxlength'=>45,
        ),
  ));
			?>
		</td>
		</tr>		
		
		<tr>
			<td colspan="4">&nbsp;</td>	
			<th>Total</th>
			<th style="text-align: right"><?php echo $numberFormatter->formatCurrency($model->getGrandTotal(),'IDR')?></th>
		</tr>
		
		<?php if(count($model->items)): ?>
		<tr>
			<td colspan="6" style="text-align: right">
				<?php echo CHtml::submitButton('Selesai',array('name'=>'selesai')); ?>
			</td>
		</tr>
		<?php endif; ?>
	</tbody>

</table>
</div>

	</div>


</div>
<?php
//$this->widget('application.extensions.moneymask.MMask',array(
//					'element'=>'input.money',
//					'config'=>array(
//							'symbol'=>'Rp',
//							'showSymbol'=>true,
//							'symbolStay'=>false,
//							'allowNegative'=>true,
//							'decimal'=>',',
//							'thousands'=>'.',
//							'precision'=>0,
//					)
//			));
?>
<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
	$(function() {
		// Mode beli atau retur
		$('#pilRegisterMode').change(function() {
			$(this).parents('form').submit();
		});
		
		$('#cash_register input.money.updateblur').focus(function() {
			var that=$(this);
			var oldval=that.val();
			that.blur(function() {
				that.unbind('blur');
				if(oldval!=that.val())
				{
					$(this).parents('form').submit();
				}
			});
		});
		
		$('#cash_register td.produk_aksi a.delBtn').click(function() {
			if(window.confirm("Anda yakin ingin menghapus item ini?")) {
				var that=$(this);
				var form=that.parents('form');
				that.parents('tr').remove();
				form.submit();
			}
			return false;
		});
		
		$('input#input_bayar').blur(function() {
			$(this).parents('form').submit();
		});
		
		// Pertanyaan form penjualan
		$('input[name=selesai]').click(function() {
			return window.confirm("Pembelian selesai?");
		});
		
		// Fokus di add produk
		$('#my_input_name').focus();
	});
</script>