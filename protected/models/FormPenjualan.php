<?php

class FormPenjualan extends CFormModel
{
	const ModeSale=1;
	const ModeReturn=2;
	
	public $registerMode;
	public $customerId;
	public $payment;
	
	public $itemSsearch;
	
	public $items=array();
	
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('payment', 'required'),
			array('payment', 'numerical', 'min'=>0, 'integerOnly'=>true),
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
			'registerMode'=>'Mode Penjualan',
			'customerId'=>'Pelanggan',
			'payment'=>'Pembayaran',
			'itemSearch'=>'Cari Barang',
		);
	}
}