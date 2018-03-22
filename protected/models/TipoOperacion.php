<?php

/**
 * This is the model class for table "tipo_operacion".
 *
 * The followings are the available columns in table 'tipo_operacion':
 * @property integer $id_tipo_operacion
 * @property string $tipo_operacion
 * @property string $observacion
 * @property integer $estatus
 * @property integer $id_usuario_sistema_reg
 * @property string $fecha_reg
 * @property integer $id_usuario_sistema_mod
 * @property string $ip_reg
 * @property string $fecha_mod
 * @property string $ip_mod
 *
 * The followings are the available model relations:
 * @property Operacion[] $operacions
 */
class TipoOperacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tipo_operacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo_operacion, observacion', 'required'),
			array('estatus, id_usuario_sistema_reg, id_usuario_sistema_mod', 'numerical', 'integerOnly'=>true),
			array('tipo_operacion', 'length', 'max'=>250),
			array('ip_reg, ip_mod', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_tipo_operacion, tipo_operacion, observacion, estatus, id_usuario_sistema_reg, fecha_reg, id_usuario_sistema_mod, ip_reg, fecha_mod, ip_mod', 'safe', 'on'=>'search'),
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
			'operacions' => array(self::HAS_MANY, 'Operacion', 'id_tipo_operacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_tipo_operacion' => 'Identificador',
			'tipo_operacion' => 'Resultado',
			'observacion' => 'Observación',
			'estatus' => 'Estatus',
			'id_usuario_sistema_reg' => 'Id Usuario Sistema Reg',
			'fecha_reg' => 'Fecha Reg',
			'id_usuario_sistema_mod' => 'Id Usuario Sistema Mod',
			'ip_reg' => 'Ip Reg',
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

		$criteria->compare('id_tipo_operacion',$this->id_tipo_operacion);
		$criteria->compare('tipo_operacion',$this->tipo_operacion,true);
		$criteria->compare('observacion',$this->observacion,true);
		$criteria->compare('estatus',$this->estatus);
		$criteria->compare('id_usuario_sistema_reg',$this->id_usuario_sistema_reg);
		$criteria->compare('fecha_reg',$this->fecha_reg,true);
		$criteria->compare('id_usuario_sistema_mod',$this->id_usuario_sistema_mod);
		$criteria->compare('ip_reg',$this->ip_reg,true);
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
	 * @return TipoOperacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
