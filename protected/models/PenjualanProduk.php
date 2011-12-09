<?php

/**
 * This is the model class for table "tonisis.penjualan_produk".
 *
 * The followings are the available columns in table 'tonisis.penjualan_produk':
 * @property integer $id_pemesanan
 * @property integer $id_barang
 * @property integer $kuantitas
 * @property string $harga
 */
class PenjualanProduk extends CActiveRecord
{
	public function primaryKey()
	{
		return array('id_pemesanan', 'id_barang');
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return PenjualanProduk the static model class
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
		return 'tonisis.penjualan_produk';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_pemesanan, id_barang', 'required'),
			array('id_pemesanan, id_barang, kuantitas', 'numerical', 'integerOnly'=>true),
			array('harga', 'length', 'max'=>12),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_pemesanan, id_barang, kuantitas, harga', 'safe', 'on'=>'search'),
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
			'produk' => array(self::BELONGS_TO, 'Produk', 'id_barang')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pemesanan' => 'ID Pesanan',
			'id_barang' => 'ID Barang',
			'kuantitas' => 'Kuantitas',
			'harga' => 'Harga',
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

		$criteria->compare('id_pemesanan',$this->id_pemesanan);
		$criteria->compare('id_barang',$this->id_barang);
		$criteria->compare('kuantitas',$this->kuantitas);
		$criteria->compare('harga',$this->harga,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}