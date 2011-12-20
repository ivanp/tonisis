<?php

class FormPembelian extends CFormModel
{
	const ModeTerima=1;
	const ModeRetur=2;
	
	public $registerMode=self::ModeTerima;
	
	public $pemasokId;
	public $pemasokName;
	
	public $itemSsearch;
	
	public $suratJalan;
	
	public $items=array();
	
	public $addProdukId;
	public $addProdukName;
	
	const StatusBuka=0;
	const StatusTutup=1;
	
	public $status=0;
	
	public $selesai=false;
	
	public static function getRegisterModeOptions()
	{
		return array(
			self::ModeTerima=>'Mode: Penerimaan Barang',
			self::ModeRetur=>'Mode: Retur Barang'
		);
	}
	
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('pemasokId', 'exist','allowEmpty'=>false,'className'=>'Pemasok','attributeName'=>'id','message'=>'Pemasok harus dipilih'),
			array('addProdukId', 'exist','allowEmpty'=>true,'className'=>'Produk','attributeName'=>'id'),
			array('registerMode,pemasokId,pemasokName,suratJalan,addProdukId,addProdukName,selesai', 'safe'),
			array('pemasokId,suratJalan','required'),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'registerMode'=>'Mode Penerimaan',
			'pemasokId'=>'Pemasok',
			'itemSearch'=>'Cari Barang',
			'suratJalan'=>'Surat Jalan'
		);
	}
	
	public function getGrandTotal()
	{
		$total=0;
		foreach($this->items as $item)
		{
			$total+=$item->getTotalBiaya();
		}
		return $total;
	}
}