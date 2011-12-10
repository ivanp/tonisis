<?php
$this->breadcrumbs=array(
	'Laporan'=>array('/laporan'),
	'Persediaan',
);

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
		<div id="sale_receipt">Laporan Persediaan Barang</div>
	</div>
 
	<table id="receipt_items">
	<tr>
	<th style="width:30%;">Nama Barang</th>
	<th style="width:35%;">Kode Barang</th>
	<th style="width:35%;">Jumlah Stok</th>
	</tr>
	<?php
	foreach($semua_produk as $produk)
	{
if($produk instanceof Produk);
		?>
		<tr>
		<td><span class='long_name'><?php echo $produk->nama ?></span></td>
		<td style="text-align: right"><?php echo $produk->id ?></td>
		<td style='text-align:right;'><?php echo $produk->jumlah ?></td>
		</tr>
	<?php
	}
	?>

	</table>

</div>