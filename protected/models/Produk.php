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
 * @property Inventaris[] $inventarises
 * @property Pembelian[] $pembelians
 * @property Penjualan[] $penjualans
 * @property JenisBarang $idJenisBarang
 * @property Merk $idMerk
 * @property Pemasok $idPemasok
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
			array('id_jenis_barang, id_merk, id_pemasok', 'required'),
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
			'inventarises' => array(self::HAS_MANY, 'Inventaris', 'id_produk'),
			'pembelians' => array(self::MANY_MANY, 'Pembelian', 'pembelian_produk(id_produk, id_pembelian)'),
			'penjualans' => array(self::MANY_MANY, 'Penjualan', 'penjualan_produk(id_barang, id_pemesanan)'),
			'idJenisBarang' => array(self::BELONGS_TO, 'JenisBarang', 'id_jenis_barang'),
			'idMerk' => array(self::BELONGS_TO, 'Merk', 'id_merk'),
			'idPemasok' => array(self::BELONGS_TO, 'Pemasok', 'id_pemasok'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_jenis_barang' => 'Id Jenis Barang',
			'id_merk' => 'Id Merk',
			'id_pemasok' => 'Id Pemasok',
			'nama' => 'Nama',
			'deskripsi' => 'Deskripsi',
			'tgl_buat' => 'Tgl Buat',
			'tgl_update' => 'Tgl Update',
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
}