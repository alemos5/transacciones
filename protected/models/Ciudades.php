<?php

/**
 * This is the model class for table "ciudades".
 *
 * The followings are the available columns in table 'ciudades':
 * @property integer $id_ciudad
 * @property integer $id_estado
 * @property string $ciudad
 * @property integer $capital
 *
 * The followings are the available model relations:
 * @property Estado $idEstado
 * @property Oficina[] $oficinas
 */
class Ciudades extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ciudades';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_estado, ciudad', 'required'),
			array('id_estado, capital', 'numerical', 'integerOnly'=>true),
			array('ciudad', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_ciudad, id_estado, ciudad, capital', 'safe', 'on'=>'search'),
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
			'idEstado' => array(self::BELONGS_TO, 'Estado', 'id_estado'),
			'oficinas' => array(self::HAS_MANY, 'Oficina', 'id_ciudad'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_ciudad' => 'Id City',
			'id_estado' => 'Id State',
			'ciudad' => 'City',
			'capital' => 'Capital',
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

		$criteria->compare('id_ciudad',$this->id_ciudad);
		$criteria->compare('id_estado',$this->id_estado);
		$criteria->compare('ciudad',$this->ciudad,true);
		$criteria->compare('capital',$this->capital);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ciudades the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
