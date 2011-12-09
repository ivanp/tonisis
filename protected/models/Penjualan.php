<?php

/**
 * This is the model class for table "tonisis.penjualan".
 *
 * The followings are the available columns in table 'tonisis.penjualan':
 * @property integer $id
 * @property integer $id_pelanggan
 * @property string $tanggal
 *
 * The followings are the available model relations:
 * @property Pembayaran $pembayaran
 * @property Pelanggan $pelanggan
 * @property Produk[] $daftar_produk
 * @property SuratJalan[] $surat_jalan
 * @property detil_produk[] $detil_produk
 */
class Penjualan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Penjualan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tonisis.penjualan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_pelanggan', 'numerical', 'integerOnly'=>true),
			array('tanggal', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_pelanggan, tanggal', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'pembayaran' => array(self::HAS_ONE, 'Pembayaran', 'penjualan_id'),
			'pelanggan' => array(self::BELONGS_TO, 'Pelanggan', 'id_pelanggan'),
			'daftar_produk' => array(self::MANY_MANY, 'Produk', 'penjualan_produk(id_pemesanan, id_barang)'),
			'surat_jalan' => array(self::HAS_MANY, 'SuratJalan', 'id_pemesanan'),
			'detil_produk' => array(self::HAS_MANY, 'PenjualanProduk', 'id_pemesanan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_pelanggan' => 'ID Pelanggan',
			'tanggal' => 'Tanggal Penjualan',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_pelanggan',$this->id_pelanggan);
		$criteria->compare('tanggal',$this->tanggal,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	protected function beforeSave()
	{
		$this->tanggal=date('Y-m-d H:i:s');
		return parent::beforeSave();
	}
	
	public function getTotal()
	{
		static $total;
		if(!isset($total))
		{
			$total=0;
			foreach($this->detil_produk as $detil)
			{
				$total+=$detil->kuantitas*$detil->harga;
			}
		}
		return $total;
	}
	
	public function getKembalian()
	{
		$total=$this->getTotal();
		$bayar=$this->pembayaran->jumlah;
		return $bayar-$total;
	}
}