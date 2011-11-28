<?php

/**
 * This is the model class for table "tonisis.produk".
 *
 * The followings are the available columns in table 'tonisis.produk':
 * @property integer $id
 * @property integer $id_jenis_barang
 * @property integer $id_merk
 * @property integer $id_pemasok
 * @property string $nama
 * @property string $deskripsi
 * @property string $tgl_buat
 * @property string $tgl_update
 * @property integer $jumlah
 * @property string $biaya
 * @property string $harga
 *
 * The followings are the available model relations:
 * @property Inventaris[] $semua_inventaris
 * @property Pembelian[] $semua_pembelian
 * @property Penjualan[] $semua_penjualan
 * @property JenisBarang $jenis
 * @property Merk $merk
 * @property Pemasok $pemasok
 */
class Produk extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Produk the static model class
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
		return 'tonisis.produk';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_jenis_barang, id_merk, id_pemasok, nama, jumlah, biaya, harga', 'required'),
			array('id_jenis_barang, id_merk, id_pemasok, jumlah', 'numerical', 'integerOnly'=>true),
			array('nama', 'length', 'max'=>80),
			array('biaya, harga', 'length', 'max'=>12),
			array('deskripsi, tgl_buat, tgl_update', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_jenis_barang, id_merk, id_pemasok, nama, deskripsi, tgl_buat, tgl_update, jumlah, biaya, harga', 'safe', 'on'=>'search'),
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
			'semua_inventaris' => array(self::HAS_MANY, 'Inventaris', 'id_produk'),
			'semua_pembelian' => array(self::MANY_MANY, 'Pembelian', 'pembelian_produk(id_produk, id_pembelian)'),
			'semua_penjualan' => array(self::MANY_MANY, 'Penjualan', 'penjualan_produk(id_barang, id_pemesanan)'),
			'jenis' => array(self::BELONGS_TO, 'JenisBarang', 'id_jenis_barang'),
			'merk' => array(self::BELONGS_TO, 'Merk', 'id_merk'),
			'pemasok' => array(self::BELONGS_TO, 'Pemasok', 'id_pemasok'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_jenis_barang' => 'Jenis',
			'id_merk' => 'Merk',
			'id_pemasok' => 'Pemasok',
			'nama' => 'Nama',
			'deskripsi' => 'Deskripsi',
			'tgl_buat' => 'Tanggal Buat',
			'tgl_update' => 'Tanggal Update',
			'jumlah' => 'Jumlah',
			'biaya' => 'Biaya',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('id_jenis_barang',$this->id_jenis_barang);
		$criteria->compare('id_merk',$this->id_merk);
		$criteria->compare('id_pemasok',$this->id_pemasok);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('deskripsi',$this->deskripsi,true);
		$criteria->compare('tgl_buat',$this->tgl_buat,true);
		$criteria->compare('tgl_update',$this->tgl_update,true);
		$criteria->compare('jumlah',$this->jumlah);
		$criteria->compare('biaya',$this->biaya,true);
		$criteria->compare('harga',$this->harga,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	protected function beforeSave()
	{
		if($this->getIsNewRecord())
			$this->tgl_buat=date('Y-m-d H:i:s');
		$this->tgl_update=date('Y-m-d H:i:s');
		return $this->beforeSave();
	}
}