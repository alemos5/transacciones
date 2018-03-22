<?php

/**
 * This is the model class for table "municipio".
 *
 * The followings are the available columns in table 'municipio':
 * @property integer $id_municipio
 * @property integer $id_estado
 * @property string $nombre
 * @property integer $estatus
 *
 * The followings are the available model relations:
 * @property Socio[] $socios
 * @property Representante[] $representantes
 * @property Parroquia[] $parroquias
 * @property Estado $idEstado
 */
class Municipio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'municipio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_estado, nombre', 'required'),
			array('id_estado, estatus', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_municipio, id_estado, nombre, estatus', 'safe', 'on'=>'search'),
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
			'socios' => array(self::HAS_MANY, 'Socio', 'id_municipio'),
			'representantes' => array(self::HAS_MANY, 'Representante', 'id_municipio'),
			'parroquias' => array(self::HAS_MANY, 'Parroquia', 'id_municipio'),
			'idEstado' => array(self::BELONGS_TO, 'Estado', 'id_estado'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_municipio' => 'Id Municipality',
			'id_estado' => 'Id State',
			'nombre' => 'Name',
			'estatus' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_municipio',$this->id_municipio);
		$criteria->compare('id_estado',$this->id_estado);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('estatus',$this->estatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Municipio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
