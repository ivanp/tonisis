<?php
$numberFormatter=Yii::app()->locale->getNumberFormatter();
$dateFormatter=Yii::app()->locale->getDateFormatter();
//$cs=Yii::app()->g
$cs=Yii::app()->clientScript;
if($cs instanceof CClientScript);
$cs->registerCssFile(Yii::app()->baseUrl.'/css/receipt.css');
if($pembelian instanceof Pembelian);
?>
<div id="receipt_wrapper">
	<div id="receipt_header">
		<div id="company_name">PT. Paradise Jaya Tehnik</div>
		<div id="company_address">Jl. Danau Sunter Utara blok F20 No. 29-30, Jakarta Utara</div>
		<div id="company_phone">021-27156783</div>
		<div id="sale_receipt">
			<?php if($pembelian->getTotal()>0):?>
				Pembelian Barang
			<?php else: ?>
				Return Pembelian
			<?php endif; ?>
		</div>
		<div id="sale_time"><?php echo $dateFormatter->formatDateTime($pembelian->tanggal) ?></div>
	</div>
	<div id="receipt_general_info">
			<div id="customer">Pemasok: <?php echo $pembelian->pemasok->nama; ?></div>
		<div id="sale_id">ID Penjualan: <?php echo $pembelian->id; ?></div>
		<div id="sale_id">Nomor Surat Jalan: <?php echo $pembelian->no_po; ?></div>
	</div>

	<table id="receipt_items">
	<tr>
	<th style="width:50%;">Barang</th>
	<th style="width:17%;">Harga</th>
	<th style="width:16%;text-align:center;">Kuantitas</th>
	<th style="width:17%;text-align:right;">Total</th>
	</tr>
	<?php
	foreach($pembelian->detil_produk as $detil)
	{
		$produk=$detil->produk;
		if($produk instanceof Produk);
	?>
		<tr>
		<td><span class='long_name'><?php echo $produk->nama ?></span><span class='short_name'><?php echo $produk->nama ?></span></td>
		<td style="text-align: right"><?php echo $numberFormatter->formatCurrency($produk->biaya,'IDR') ?></td>
		<td style='text-align:center;'><?php echo $detil->jumlah ?></td>
		<td style='text-align:right;'><?php echo $numberFormatter->formatCurrency($produk->biaya*$detil->jumlah,'IDR'); ?></td>
		</tr>
	<?php
	}
	?>
	<tr>
	<td colspan="3" style='text-align:right;border-top:2px solid #000000;'>Total</td>
	<td colspan="2" style='text-align:right;border-top:2px solid #000000;'><?php echo $numberFormatter->formatCurrency($pembelian->getTotal(), 'IDR') ?></td>
	</tr>

	</table>

</div>