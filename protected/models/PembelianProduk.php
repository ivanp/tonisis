<?php

/**
 * This is the model class for table "tonisis.pembelian_produk".
 *
 * The followings are the available columns in table 'tonisis.pembelian_produk':
 * @property integer $id_pembelian
 * @property integer $id_produk
 * @property integer $jumlah
 * @property string $biaya
 */
class PembelianProduk extends CActiveRecord
{
	public function primaryKey()
	{
		return array('id_pembelian', 'id_produk');
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return PembelianProduk the static model class
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
		return 'tonisis.pembelian_produk';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_pembelian, id_produk', 'required'),
			array('id_pembelian, id_produk, jumlah', 'numerical', 'integerOnly'=>true),
			array('biaya', 'length', 'max'=>12),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_pembelian, id_produk, jumlah, biaya', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pembelian' => 'ID Pembelian',
			'id_produk' => 'ID Produk',
			'jumlah' => 'Jumlah',
			'biaya' => 'Biaya',
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

		$criteria->compare('id_pembelian',$this->id_pembelian);
		$criteria->compare('id_produk',$this->id_produk);
		$criteria->compare('jumlah',$this->jumlah);
		$criteria->compare('biaya',$this->biaya,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}