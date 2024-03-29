<?php

class FormPenjualan extends CFormModel
{
	const ModeSale=1;
	const ModeReturn=2;
	
	public $registerMode=self::ModeSale;
	
	public $customerId;
	public $customerName;
	
	public $payment=false;
	
	public $itemSsearch;
	
	public $items=array();
	
	public $addProdukId;
	public $addProdukName;
	
	public $selesai=false;
	
	public static function getRegisterModeOptions()
	{
		return array(
			self::ModeSale=>'Mode: Penjualan',
			self::ModeReturn=>'Mode: Retur Barang'
		);
	}
	
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('payment', 'validPayment'),
//			array('payment', 'numerical', 'min'=>0, 'integerOnly'=>true),
//			array('customerId', 'exist','allowEmpty'=>true,'className'=>'Pelanggan','attributeName'=>'id'),
//			array('addProdukId', 'exist','allowEmpty'=>true,'className'=>'Produk','attributeName'=>'id'),
			array('registerMode,customerId,customerName,payment,addProdukId,addProdukName,selesai', 'safe'),
		);
	}
	
	public function validPayment($attribute,$params)
	{
		$validator=new CNumberValidator();
		$validator->attributes=array('payment');
		$validator->min=$this->getGrandTotal();
		$validator->message='Pembayaran tidak mencukupi';
		$validator->validate($this);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'registerMode'=>'Mode Penjualan',
			'customerId'=>'Pelanggan',
			'payment'=>'Pembayaran',
			'itemSearch'=>'Cari Barang',
		);
	}
	
	public function getGrandTotal()
	{
		$total=0;
		foreach($this->items as $item)
		{
			$total+=$item->getTotalHarga();
		}
		return $total;
	}
}