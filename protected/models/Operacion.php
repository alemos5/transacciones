<?php

/**
 * This is the model class for table "operacion".
 *
 * The followings are the available columns in table 'operacion':
 * @property integer $id_operacion
 * @property integer $id_exchange
 * @property integer $id_moneda
 * @property integer $id_estatus_operacion
 * @property integer $id_tipo_operacion
 * @property string $venta_en
 * @property string $target1
 * @property string $target11
 * @property string $porcentaje1
 * @property integer $estado1
 * @property string $target2
 * @property string $target22
 * @property string $porcentaje2
 * @property integer $estado2
 * @property string $target3
 * @property string $target33
 * @property string $porcentaje3
 * @property integer $estado3
 * @property string $target4
 * @property string $target44
 * @property string $porcentaje4
 * @property integer $estado4
 * @property string $target5
 * @property string $target55
 * @property string $porcentaje5
 * @property integer $estado5
 * @property string $stop_loss
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
 * @property EstatusOperacion $idEstatusOperacion
 * @property Exchange $idExchange
 * @property Moneda $idMoneda
 * @property TipoOperacion $idTipoOperacion
 */
class Operacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'operacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_exchange, id_moneda, id_estatus_operacion, id_tipo_operacion, stop_loss, porcentaje_stop_loss', 'required'),
			array('id_exchange, id_moneda, id_estatus_operacion, id_tipo_operacion, estado1, estado2, estado3, estado4, estado5, estatus, id_usuario_sistema_reg, id_usuario_sistema_mod', 'numerical', 'integerOnly'=>true),
			array('compra1, compra2, venta_en, porcentaje_venta_en, target1, target11, target2, target22, target3, target33, target4, target44, target5, target55, stop_loss', 'length', 'max'=>10),
			array('porcentaje1, porcentaje_stop_loss,porcentaje2, porcentaje3, porcentaje4, porcentaje5', 'length', 'max'=>5),
			array('ip_reg, ip_mod', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_operacion, id_exchange, id_moneda, id_estatus_operacion, id_tipo_operacion, venta_en, target1, target11, porcentaje1, estado1, target2, target22, porcentaje2, estado2, target3, target33, porcentaje3, estado3, target4, target44, porcentaje4, estado4, target5, target55, porcentaje5, estado5, stop_loss, observacion, estatus, id_usuario_sistema_reg, fecha_reg, ip_reg, id_usuario_sistema_mod, fecha_mod, ip_mod', 'safe', 'on'=>'search'),
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
			'idEstatusOperacion' => array(self::BELONGS_TO, 'EstatusOperacion', 'id_estatus_operacion'),
			'idExchange' => array(self::BELONGS_TO, 'Exchange', 'id_exchange'),
			'idMoneda' => array(self::BELONGS_TO, 'Moneda', 'id_moneda'),
			'idTipoOperacion' => array(self::BELONGS_TO, 'TipoOperacion', 'id_tipo_operacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_operacion' => 'Identificador Operación',
			'id_exchange' => 'Exchange',
			'id_moneda' => 'Moneda',
			'id_estatus_operacion' => 'Tipo de Operación',
			'id_tipo_operacion' => 'Resultado',
			'compra1' => 'Compra en',
			'compra2' => 'Compra hasta',
			'venta_en' => 'Venta en',
                        'porcentaje_venta_en' => '% Venta',
			'target1' => 'Target1 ',
			'target11' => 'Target1 hasta',
			'porcentaje1' => 'Porcentaje',
			'estado1' => 'Estado1',
			'target2' => 'Target2 ',
			'target22' => 'Target2 hasta',
			'porcentaje2' => 'Porcentaje',
			'estado2' => 'Estado2',
			'target3' => 'Target3 ',
			'target33' => 'Target3 hasta',
			'porcentaje3' => 'Porcentaje',
			'estado3' => 'Estado3',
			'target4' => 'Target4',
			'target44' => 'Target44',
			'porcentaje4' => 'Porcentaje4',
			'estado4' => 'Estado4',
			'target5' => 'Target5',
			'target55' => 'Target55',
			'porcentaje5' => 'Porcentaje5',
			'estado5' => 'Estado5',
			'stop_loss' => 'Stop Loss',
			'porcentaje_stop_loss' => '% stop Loss',
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

		$criteria->compare('id_operacion',$this->id_operacion);
		$criteria->compare('id_exchange',$this->id_exchange);
		$criteria->compare('id_moneda',$this->id_moneda);
		$criteria->compare('id_estatus_operacion',$this->id_estatus_operacion);
		$criteria->compare('id_tipo_operacion',$this->id_tipo_operacion);
		$criteria->compare('venta_en',$this->venta_en,true);
		$criteria->compare('porcentaje_venta_en',$this->porcentaje_venta_en,true);
		$criteria->compare('target1',$this->target1,true);
		$criteria->compare('target11',$this->target11,true);
		$criteria->compare('porcentaje1',$this->porcentaje1,true);
		$criteria->compare('estado1',$this->estado1);
		$criteria->compare('target2',$this->target2,true);
		$criteria->compare('target22',$this->target22,true);
		$criteria->compare('porcentaje2',$this->porcentaje2,true);
		$criteria->compare('estado2',$this->estado2);
		$criteria->compare('target3',$this->target3,true);
		$criteria->compare('target33',$this->target33,true);
		$criteria->compare('porcentaje3',$this->porcentaje3,true);
		$criteria->compare('estado3',$this->estado3);
		$criteria->compare('target4',$this->target4,true);
		$criteria->compare('target44',$this->target44,true);
		$criteria->compare('porcentaje4',$this->porcentaje4,true);
		$criteria->compare('estado4',$this->estado4);
		$criteria->compare('target5',$this->target5,true);
		$criteria->compare('target55',$this->target55,true);
		$criteria->compare('porcentaje5',$this->porcentaje5,true);
		$criteria->compare('estado5',$this->estado5);
		$criteria->compare('stop_loss',$this->stop_loss,true);
		$criteria->compare('observacion',$this->observacion,true);
		$criteria->compare('estatus',$this->estatus);
		$criteria->compare('id_usuario_sistema_reg',$this->id_usuario_sistema_reg);
		$criteria->compare('fecha_reg',$this->fecha_reg,true);
		$criteria->compare('ip_reg',$this->ip_reg,true);
		$criteria->compare('id_usuario_sistema_mod',$this->id_usuario_sistema_mod);
		$criteria->compare('fecha_mod',$this->fecha_mod,true);
		$criteria->compare('ip_mod',$this->ip_mod,true);
                $criteria->order = 'id_operacion DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Operacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
