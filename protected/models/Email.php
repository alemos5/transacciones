<?php

/**
 * This is the model class for table "email".
 *
 * The followings are the available columns in table 'email':
 * @property integer $id_email
 * @property string $code_cliente
 * @property integer $tipo_email
 * @property integer $estatus
 * @property integer $id_orden
 * @property string $descripcion
 * @property string $mensaje
 */
class Email extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'email';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo_email, estatus, id_orden', 'numerical', 'integerOnly'=>true),
			array('code_cliente, mensaje', 'length', 'max'=>250),
			array('descripcion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_email, code_cliente, tipo_email, estatus, id_orden, descripcion, mensaje', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_email' => 'Id Email',
			'code_cliente' => 'Code Cliente',
			'tipo_email' => 'Tipo Email',
			'estatus' => 'Estatus',
			'id_orden' => 'Id Orden',
			'descripcion' => 'Descripcion',
			'mensaje' => 'Mensaje',
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

		$criteria->compare('id_email',$this->id_email);
		$criteria->compare('code_cliente',$this->code_cliente,true);
		$criteria->compare('tipo_email',$this->tipo_email);
		$criteria->compare('estatus',$this->estatus);
		$criteria->compare('id_orden',$this->id_orden);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('mensaje',$this->mensaje,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Email the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
