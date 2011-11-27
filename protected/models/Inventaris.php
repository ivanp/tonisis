<?php

/**
 * This is the model class for table "tonisis.inventaris".
 *
 * The followings are the available columns in table 'tonisis.inventaris':
 * @property integer $id
 * @property integer $id_produk
 * @property string $tanggal
 * @property integer $kuantitas
 * @property string $keterangan
 *
 * The followings are the available model relations:
 * @property Produk $idProduk
 */
class Inventaris extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Inventaris the static model class
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
		return 'tonisis.inventaris';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_produk', 'required'),
			array('id_produk, kuantitas', 'numerical', 'integerOnly'=>true),
			array('tanggal, keterangan', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_produk, tanggal, kuantitas, keterangan', 'safe', 'on'=>'search'),
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
			'idProduk' => array(self::BELONGS_TO, 'Produk', 'id_produk'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_produk' => 'Id Produk',
			'tanggal' => 'Tanggal',
			'kuantitas' => 'Kuantitas',
			'keterangan' => 'Keterangan',
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
		$criteria->compare('id_produk',$this->id_produk);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('kuantitas',$this->kuantitas);
		$criteria->compare('keterangan',$this->keterangan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}