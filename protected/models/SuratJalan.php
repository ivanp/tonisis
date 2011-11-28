<?php

/**
 * This is the model class for table "tonisis.surat_jalan".
 *
 * The followings are the available columns in table 'tonisis.surat_jalan':
 * @property integer $id
 * @property integer $id_pemesanan
 * @property string $tanggal
 * @property string $status
 *
 * The followings are the available model relations:
 * @property Penjualan $penjualan
 */
class SuratJalan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SuratJalan the static model class
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
		return 'tonisis.surat_jalan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_pemesanan', 'required'),
			array('id_pemesanan', 'numerical', 'integerOnly'=>true),
			array('status', 'length', 'max'=>7),
			array('tanggal', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_pemesanan, tanggal, status', 'safe', 'on'=>'search'),
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
			'penjualan' => array(self::BELONGS_TO, 'Penjualan', 'id_pemesanan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_pemesanan' => 'ID Pemesanan',
			'tanggal' => 'Tanggal',
			'status' => 'Status',
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
		$criteria->compare('id_pemesanan',$this->id_pemesanan);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	protected function beforeSave()
	{
		$this->tanggal=date('Y-m-d H:i:s');
		return parent::beforeSave();
	}
}