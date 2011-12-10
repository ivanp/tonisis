<?php

class LaporanPenjualanForm extends CFormModel
{
	const TglHariIni=1;
	const TglKemarin=2;
	const Tgl7HariTerakhir=3;
	const TglBulanIni=4;
	const TglTahunini=5;
	const TglSemua=6;
	const TglPilih=7;
	
	public $jangkaWaktu=self::TglHariIni;
	
	public $waktuDari;
	public $waktuHingga;
	
	public function init() 
	{
		parent::init();
		$this->waktuDari=date('d-m-Y');
		$this->waktuHingga=date('d-m-Y');
	}
	
	public function attributeLabels()
	{
		return array(
			'jangkaWaktu'=>'Jangka waktu',
		);
	}
	
	public function getWaktuOptions()
	{
		return array(
			self::TglHariIni=>'Hari ini',
			self::TglKemarin=>'Kemarin',
			self::Tgl7HariTerakhir=>'7 hari terakhir',
			self::TglBulanIni=>'Bulan ini',
			self::TglTahunini=>'Tahun ini',
			self::TglSemua=>'Semua penjualan',
		);
	}
	
	public function getPilihanOptions()
	{
		return array(
			self::PilSet=>'',
			self::PilTgl=>''
		);
	}
	
	public function rules()
	{
		return array(
			array('jangkaWaktu', 'required'),
			array('jangkaWaktu,waktuDari,waktuHingga', 'safe'),
			array('jangkaWaktu', 'cekJangkaWaktu')
		);
	}
	
	public function cekJangkaWaktu($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			if($this->jangkaWaktu==self::TglPilih)
			{
				$validator=new CDateValidator;
				$validator->format='dd-MM-yyyy';
				$validator->attributes=array('waktuDari','waktuHingga');
				$validator->validate($this);
			}
		}
		
	}
}