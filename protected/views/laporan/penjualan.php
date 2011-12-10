<?php
$numberFormatter=Yii::app()->locale->getNumberFormatter();
$dateFormatter=Yii::app()->locale->getDateFormatter();
//$cs=Yii::app()->g
$cs=Yii::app()->clientScript;
if($cs instanceof CClientScript);
$cs->registerCssFile(Yii::app()->baseUrl.'/css/receipt.css');
?>
<div id="receipt_wrapper">
	<div id="receipt_header">
		<div id="company_name">PT. Paradise Jaya Tehnik</div>
		<div id="company_address">Jl. Danau Sunter Utara blok F20 No. 29-30, Jakarta Utara</div>
		<div id="company_phone">021-27156783</div>
		<div id="sale_receipt">Laporan Penjualan</div>
		<div id="sale_time">Periode: <?php echo $dateFormatter->formatDateTime($dari, 'medium', null) ?> hingga <?php echo $dateFormatter->formatDateTime($hingga, 'medium', null) ?></div>
	</div>
 
	<table id="receipt_items">
	<tr>
	<th style="width:30%;">Tanggal</th>
	<th style="width:35%;text-align:right;">Total</th>
	<th style="width:35%;text-align:right;">Profit</th>
	</tr>
	<?php
	foreach($rows as $row)
	{
	?>
		<tr>
		<td><span class='long_name'><?php echo $dateFormatter->formatDateTime($row['tgl'], 'medium', null) ?></span></td>
		<td style="text-align: right"><?php echo $numberFormatter->formatCurrency($row['total_harga'],'IDR') ?></td>
		<td style='text-align:right;'><?php echo $numberFormatter->formatCurrency($row['profit'],'IDR'); ?></td>
		</tr>
	<?php
	}
	?>
	<tr>
	<th style='text-align:right;border-top:2px solid #000000;'>Total</th>
	<th style='text-align:right;border-top:2px solid #000000;'><?php echo $numberFormatter->formatCurrency($total, 'IDR') ?></th>
	<th style='text-align:right;border-top:2px solid #000000;'><?php echo $numberFormatter->formatCurrency($profit,'IDR') ?></th>
	</tr>

	</table>

</div>