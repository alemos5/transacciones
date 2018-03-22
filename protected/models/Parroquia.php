<?php

/**
 * This is the model class for table "parroquia".
 *
 * The followings are the available columns in table 'parroquia':
 * @property integer $id_parroquia
 * @property integer $id_municipio
 * @property string $nombre
 * @property integer $estatus
 *
 * The followings are the available model relations:
 * @property Socio[] $socios
 * @property Representante[] $representantes
 * @property Municipio $idMunicipio
 */
class Parroquia extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'parroquia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_municipio, nombre', 'required'),
			array('id_municipio, estatus', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_parroquia, id_municipio, nombre, estatus', 'safe', 'on'=>'search'),
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
			'socios' => array(self::HAS_MANY, 'Socio', 'id_parroquia'),
			'representantes' => array(self::HAS_MANY, 'Representante', 'id_parroquia'),
			'idMunicipio' => array(self::BELONGS_TO, 'Municipio', 'id_municipio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_parroquia' => 'Id Parish',
			'id_municipio' => 'Id Municipality',
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

		$criteria->compare('id_parroquia',$this->id_parroquia);
		$criteria->compare('id_municipio',$this->id_municipio);
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
	 * @return Parroquia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
