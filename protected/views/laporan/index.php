<?php
$this->breadcrumbs=array(
	'Laporan',
);?>
<h1>Laporan</h1>

<table width="100%" class="nav_depan">
	<tr>
		<td><a href="<?php echo $this->createUrl('/laporan/penjualan')?>"><img src="<?php echo Yii::app()->baseUrl ?>/images/icon_report_sales.jpg"/></a></td>
		<td><a href="<?php echo $this->createUrl('/laporan/persediaan')?>"><img src="<?php echo Yii::app()->baseUrl ?>/images/icon_report_inventory.jpg"/></a></td>
	</tr>
	<tr>
		<td>Laporan Penjualan</td>
		<td>Laporan Persediaan Barang</td>
	</tr>
</table>