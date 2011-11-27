<?php

/**
 * This is the model class for table "tonisis.pembelian".
 *
 * The followings are the available columns in table 'tonisis.pembelian':
 * @property integer $id
 * @property integer $id_pemasok
 * @property string $tanggal
 * @property string $no_po
 * @property string $total
 *
 * The followings are the available model relations:
 * @property Pemasok $idPemasok
 * @property Produk[] $produks
 */
class Pembelian extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Pembelian the static model class
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
		return 'tonisis.pembelian';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_pemasok', 'required'),
			array('id_pemasok', 'numerical', 'integerOnly'=>true),
			array('no_po', 'length', 'max'=>30),
			array('total', 'length', 'max'=>12),
			array('tanggal', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_pemasok, tanggal, no_po, total', 'safe', 'on'=>'search'),
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
			'idPemasok' => array(self::BELONGS_TO, 'Pemasok', 'id_pemasok'),
			'produks' => array(self::MANY_MANY, 'Produk', 'pembelian_produk(id_pembelian, id_produk)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_pemasok' => 'Id Pemasok',
			'tanggal' => 'Tanggal',
			'no_po' => 'No Po',
			'total' => 'Total',
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
		$criteria->compare('id_pemasok',$this->id_pemasok);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('no_po',$this->no_po,true);
		$criteria->compare('total',$this->total,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}