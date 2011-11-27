<?php

/**
 * This is the model class for table "tonisis.pemasok".
 *
 * The followings are the available columns in table 'tonisis.pemasok':
 * @property integer $id
 * @property string $nama
 * @property string $perusahaan
 * @property string $no_telepon
 * @property string $alamat1
 * @property string $alamat2
 * @property string $kota
 * @property string $provinsi
 *
 * The followings are the available model relations:
 * @property Pembelian[] $pembelians
 * @property Produk[] $produks
 */
class Pemasok extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Pemasok the static model class
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
		return 'tonisis.pemasok';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama', 'length', 'max'=>20),
			array('perusahaan', 'length', 'max'=>80),
			array('no_telepon, alamat1, alamat2, kota, provinsi', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama, perusahaan, no_telepon, alamat1, alamat2, kota, provinsi', 'safe', 'on'=>'search'),
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
			'semua_pembelian' => array(self::HAS_MANY, 'Pembelian', 'id_pemasok'),
			'semua_produk' => array(self::HAS_MANY, 'Produk', 'id_pemasok'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama' => 'Nama',
			'perusahaan' => 'Perusahaan',
			'no_telepon' => 'No Telepon',
			'alamat1' => 'Alamat 1',
			'alamat2' => 'Alamat 2',
			'kota' => 'Kota',
			'provinsi' => 'Provinsi',
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
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('perusahaan',$this->perusahaan,true);
		$criteria->compare('no_telepon',$this->no_telepon,true);
		$criteria->compare('alamat1',$this->alamat1,true);
		$criteria->compare('alamat2',$this->alamat2,true);
		$criteria->compare('kota',$this->kota,true);
		$criteria->compare('provinsi',$this->provinsi,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}