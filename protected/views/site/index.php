<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Selamat datang di <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<table width="100%" class="nav_depan">
	<tr>
		<td><a href="<?php echo $this->createUrl('/penjualan')?>"><img src="<?php echo Yii::app()->baseUrl ?>/images/icon_pos.jpg"/></a></td>
		<td><a href="<?php echo $this->createUrl('/pelanggan')?>"><img src="<?php echo Yii::app()->baseUrl ?>/images/icon_pelanggan.jpg"/></a></td>
		<td><a href="<?php echo $this->createUrl('/pemasok')?>"><img src="<?php echo Yii::app()->baseUrl ?>/images/icon_supplier.jpg"/></a></td>
	</tr>
	<tr>
		<td>Penjualan</td>
		<td>Pelanggan</td>
		<td>Pemasok</td>
	</tr>
</table>

<table width="100%" class="nav_depan">
	<tr>
		<td><a href="<?php echo $this->createUrl('/produk')?>"><img src="<?php echo Yii::app()->baseUrl ?>/images/icon_produk.jpg"/></a></td>
		<td><a href="<?php echo $this->createUrl('/pembelian')?>"><img src="<?php echo Yii::app()->baseUrl ?>/images/icon_penerimaan.gif"/></a></td>
		<td><a href="<?php echo $this->createUrl('/laporan')?>"><img src="<?php echo Yii::app()->baseUrl ?>/images/icon_laporan.jpg"/></a></td>
	</tr>
	<tr>
		<td>Maintenance Produk</td>
		<td>Pembelian</td>
		<td>Laporan</td>
	</tr>
</table>