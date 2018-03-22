<?php

/**
 * This is the model class for table "estatus_operacion".
 *
 * The followings are the available columns in table 'estatus_operacion':
 * @property integer $id_estatus_operacion
 * @property string $estatus_operacion
 * @property string $observacion
 * @property integer $estatus
 * @property integer $id_usuario_sistema_reg
 * @property string $fecha_reg
 * @property string $ip_reg
 * @property integer $id_usuario_sistema_mod
 * @property string $fecha_mod
 * @property string $ip_mod
 *
 * The followings are the available model relations:
 * @property Operacion[] $operacions
 */
class EstatusOperacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'estatus_operacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('estatus_operacion, id_usuario_sistema_reg, fecha_reg, ip_reg', 'required'),
			array('estatus, id_usuario_sistema_reg, id_usuario_sistema_mod', 'numerical', 'integerOnly'=>true),
			array('estatus_operacion', 'length', 'max'=>250),
			array('ip_reg, ip_mod', 'length', 'max'=>20),
			array('observacion, fecha_mod', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_estatus_operacion, estatus_operacion, observacion, estatus, id_usuario_sistema_reg, fecha_reg, ip_reg, id_usuario_sistema_mod, fecha_mod, ip_mod', 'safe', 'on'=>'search'),
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
			'operacions' => array(self::HAS_MANY, 'Operacion', 'id_estatus_operacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_estatus_operacion' => 'Identificador',
			'estatus_operacion' => 'Tipo de Operación',
			'observacion' => 'Observación',
			'estatus' => 'Estatus',
			'id_usuario_sistema_reg' => 'Id Usuario Sistema Reg',
			'fecha_reg' => 'Fecha Reg',
			'ip_reg' => 'Ip Reg',
			'id_usuario_sistema_mod' => 'Id Usuario Sistema Mod',
			'fecha_mod' => 'Fecha Mod',
			'ip_mod' => 'Ip Mod',
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

		$criteria->compare('id_estatus_operacion',$this->id_estatus_operacion);
		$criteria->compare('estatus_operacion',$this->estatus_operacion,true);
		$criteria->compare('observacion',$this->observacion,true);
		$criteria->compare('estatus',$this->estatus);
		$criteria->compare('id_usuario_sistema_reg',$this->id_usuario_sistema_reg);
		$criteria->compare('fecha_reg',$this->fecha_reg,true);
		$criteria->compare('ip_reg',$this->ip_reg,true);
		$criteria->compare('id_usuario_sistema_mod',$this->id_usuario_sistema_mod);
		$criteria->compare('fecha_mod',$this->fecha_mod,true);
		$criteria->compare('ip_mod',$this->ip_mod,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EstatusOperacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
