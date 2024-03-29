<?php

/**
 * This is the model class for table "tonisis.pembayaran".
 *
 * The followings are the available columns in table 'tonisis.pembayaran':
 * @property integer $penjualan_id
 * @property string $cara
 * @property string $jumlah
 *
 * The followings are the available model relations:
 * @property Penjualan $penjualan
 */
class Pembayaran extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Pembayaran the static model class
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
		return 'tonisis.pembayaran';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('penjualan_id', 'required'),
			array('penjualan_id', 'numerical', 'integerOnly'=>true),
			array('cara', 'length', 'max'=>45),
			array('jumlah', 'length', 'max'=>12),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('penjualan_id, cara, jumlah', 'safe', 'on'=>'search'),
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
			'penjualan' => array(self::BELONGS_TO, 'Penjualan', 'penjualan_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'penjualan_id' => 'Penjualan',
			'cara' => 'Cara',
			'jumlah' => 'Jumlah',
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

		$criteria->compare('penjualan_id',$this->penjualan_id);
		$criteria->compare('cara',$this->cara,true);
		$criteria->compare('jumlah',$this->jumlah,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}