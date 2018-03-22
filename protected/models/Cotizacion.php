<?php

/**
 * This is the model class for table "cotizacion".
 *
 * The followings are the available columns in table 'cotizacion':
 * @property integer $id_cotizacion
 * @property string $n_cotizacion
 * @property integer $id_usuario_cotizacion
 * @property integer $id_usuario_registro
 * @property integer $id_usuario_modificacion
 * @property string $fecha_registro
 * @property integer $id_estatus_cotizacion
 */
class Cotizacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cotizacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('n_cotizacion, id_usuario_cotizacion, id_usuario_registro, id_usuario_modificacion, fecha_registro, id_estatus_cotizacion', 'required'),
			array('porcentaje_impuesto, monto_impuesto, monto_total, id_usuario_cotizacion, id_usuario_registro, id_usuario_modificacion, id_estatus_cotizacion', 'numerical', 'integerOnly'=>true),
			array('n_cotizacion', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_cotizacion, n_cotizacion, id_usuario_cotizacion, id_usuario_registro, id_usuario_modificacion, fecha_registro, id_estatus_cotizacion', 'safe', 'on'=>'search'),
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
                    'idUsuario' => array(self::BELONGS_TO, 'Usuario', 'id_usuario_cotizacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_cotizacion' => 'Id Cotizacion',
			'n_cotizacion' => 'N Cotizacion',
			'id_usuario_cotizacion' => 'Id Usuario Cotizacion',
			'id_usuario_registro' => 'Id Usuario Registro',
			'id_usuario_modificacion' => 'Id Usuario Modificacion',
			'fecha_registro' => 'Fecha Registro',
			'id_estatus_cotizacion' => 'Id Estatus Cotizacion',
                        'porcentaje_impuesto' => 'Porcentaje de Impuesto', 
                        'monto_impuesto' => 'Monto de impuesto', 
                        'monto_total'=>'Monto del impuesto', 
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

		$criteria->compare('id_cotizacion',$this->id_cotizacion);
		$criteria->compare('n_cotizacion',$this->n_cotizacion,true);
		$criteria->compare('id_usuario_cotizacion',$this->id_usuario_cotizacion);
		$criteria->compare('id_usuario_registro',$this->id_usuario_registro);
		$criteria->compare('id_usuario_modificacion',$this->id_usuario_modificacion);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('id_estatus_cotizacion',$this->id_estatus_cotizacion);
                if(Yii::app()->user->id_perfil_sistema != 1){
                    $criteria->addCondition('id_usuario_cotizacion ='.Yii::app()->user->id_usuario_sistema.' OR id_usuario_registro ='.Yii::app()->user->id_usuario_sistema);
                }
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cotizacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
