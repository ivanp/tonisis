<?php

/**
 * This is the model class for table "tonisis.pelanggan".
 *
 * The followings are the available columns in table 'tonisis.pelanggan':
 * @property integer $id
 * @property string $nama
 * @property string $telepon
 * @property string $alamat1
 * @property string $alamat2
 * @property string $kota
 * @property string $provinsi
 * @property string $kodepos
 * @property string $tgl_buat
 *
 * The followings are the available model relations:
 * @property Penjualan[] $penjualans
 */
class Pelanggan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Pelanggan the static model class
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
		return 'tonisis.pelanggan';
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
			array('telepon, kota, provinsi', 'length', 'max'=>45),
			array('alamat1, alamat2', 'length', 'max'=>80),
			array('kodepos', 'length', 'max'=>5),
			array('tgl_buat', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama, telepon, alamat1, alamat2, kota, provinsi, kodepos, tgl_buat', 'safe', 'on'=>'search'),
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
			'semua_penjualan' => array(self::HAS_MANY, 'Penjualan', 'id_pelanggan'),
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
			'telepon' => 'Telepon',
			'alamat1' => 'Alamat 1',
			'alamat2' => 'Alamat 2',
			'kota' => 'Kota',
			'provinsi' => 'Provinsi',
			'kodepos' => 'Kode Pos',
			'tgl_buat' => 'Tanggal Buat',
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
		$criteria->compare('telepon',$this->telepon,true);
		$criteria->compare('alamat1',$this->alamat1,true);
		$criteria->compare('alamat2',$this->alamat2,true);
		$criteria->compare('kota',$this->kota,true);
		$criteria->compare('provinsi',$this->provinsi,true);
		$criteria->compare('kodepos',$this->kodepos,true);
		$criteria->compare('tgl_buat',$this->tgl_buat,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	protected function beforeSave()
	{
		if($this->getIsNewRecord())
			$this->tgl_buat=date('Y-m-d H:i:s');
		return $this->beforeSave();
	}
}