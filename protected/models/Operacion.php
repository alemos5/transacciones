<?php

/**
 * This is the model class for table "operacion".
 *
 * The followings are the available columns in table 'operacion':
 * @property integer $id_operacion
 * @property string $code_operacion
 * @property integer $id_tipo_operacion
 * @property integer $id_pais
 * @property string $monto_operacion
 * @property integer $id_moneda_origen
 * @property integer $id_moneda_destino
 * @property string $monto_cierre
 * @property string $fecha_operacion
 * @property string $monto_oficial
 * @property string $porcentaje_oficial
 * @property string $monto_ganancia
 * @property string $porcentaje_ganancia
 * @property integer $id_producto
 * @property string $tarifa
 * @property integer $id_cuenta_salida
 * @property integer $id_cuenta_entrada
 * @property integer $id_usuario_registro
 * @property string $fecha_registro
 * @property integer $id_usuario_modifica
 * @property string $fecha_modifica
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
			array('id_tipo_operacion, estatus, id_pais, id_moneda_origen, id_moneda_destino, id_producto, id_cuenta_salida, id_cuenta_entrada, id_usuario_registro, id_usuario_modifica', 'numerical', 'integerOnly'=>true),
			array('code_operacion', 'length', 'max'=>45),
			array('monto_operacion, monto_cierre, monto_oficial, porcentaje_oficial, monto_ganancia, porcentaje_ganancia, tarifa', 'length', 'max'=>10),
			array('fecha_operacion, fecha_registro, fecha_modifica', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_operacion, code_operacion, id_tipo_operacion, id_pais, monto_operacion, id_moneda_origen, id_moneda_destino, monto_cierre, fecha_operacion, monto_oficial, porcentaje_oficial, monto_ganancia, porcentaje_ganancia, id_producto, tarifa, id_cuenta_salida, id_cuenta_entrada, id_usuario_registro, fecha_registro, id_usuario_modifica, fecha_modifica', 'safe', 'on'=>'search'),
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
            'idPais' => array(self::BELONGS_TO, 'Pais', 'id_pais'),
            'idEstatus' => array(self::BELONGS_TO, 'Estatus', 'estatus'),
            'idMonedaOrigen' => array(self::BELONGS_TO, 'Moneda', 'id_moneda_origen'),
            'idMonedaDestino' => array(self::BELONGS_TO, 'Moneda', 'id_moneda_destino'),
            'idProducto' => array(self::BELONGS_TO, 'Producto', 'id_producto'),
            'idCuentaEntrada' => array(self::BELONGS_TO, 'CuentaBancaria', 'id_cuenta_entrada'),
            'idCuentaSalida' => array(self::BELONGS_TO, 'CuentaBancaria', 'id_cuenta_salida'),
            'idTipoProducto' => array(self::BELONGS_TO, 'TipoProducto', 'id_tipo_operacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_operacion' => 'Id Operacion',
			'code_operacion' => 'Code Operacion',
			'id_tipo_operacion' => 'Tipo Operacion',
			'id_pais' => 'País',
			'monto_operacion' => 'Monto Operacion',
			'id_moneda_origen' => 'Moneda Origen',
			'id_moneda_destino' => 'Moneda Destino',
			'monto_cierre' => 'Monto Cierre',
			'fecha_operacion' => 'Fecha Operación',
			'monto_oficial' => 'Monto Oficial',
			'porcentaje_oficial' => 'Porcentaje Oficial',
			'monto_ganancia' => 'Monto Ganancia',
			'porcentaje_ganancia' => 'Porcentaje Ganancia',
			'id_producto' => 'Producto',
			'tarifa' => 'Tarifa',
			'id_cuenta_salida' => 'Cuenta bancaria Salida',
			'id_cuenta_entrada' => 'Cuenta bancaria Entrada',
			'id_usuario_registro' => 'Id Usuario Registro',
			'fecha_registro' => 'Fecha Registro',
			'id_usuario_modifica' => 'Id Usuario Modifica',
			'fecha_modifica' => 'Fecha Modifica',
            'estatus' => 'Estatus',
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
		$criteria->compare('code_operacion',$this->code_operacion,true);
		$criteria->compare('id_tipo_operacion',$this->id_tipo_operacion);
		$criteria->compare('id_pais',$this->id_pais);
		$criteria->compare('monto_operacion',$this->monto_operacion,true);
		$criteria->compare('id_moneda_origen',$this->id_moneda_origen);
		$criteria->compare('id_moneda_destino',$this->id_moneda_destino);
		$criteria->compare('monto_cierre',$this->monto_cierre,true);
		$criteria->compare('fecha_operacion',$this->fecha_operacion,true);
		$criteria->compare('monto_oficial',$this->monto_oficial,true);
		$criteria->compare('porcentaje_oficial',$this->porcentaje_oficial,true);
		$criteria->compare('monto_ganancia',$this->monto_ganancia,true);
		$criteria->compare('porcentaje_ganancia',$this->porcentaje_ganancia,true);
		$criteria->compare('id_producto',$this->id_producto);
		$criteria->compare('tarifa',$this->tarifa,true);
		$criteria->compare('id_cuenta_salida',$this->id_cuenta_salida);
		$criteria->compare('id_cuenta_entrada',$this->id_cuenta_entrada);
		$criteria->compare('id_usuario_registro',$this->id_usuario_registro);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('id_usuario_modifica',$this->id_usuario_modifica);
        $criteria->compare('fecha_modifica',$this->fecha_modifica,true);
        $criteria->compare('estatus',$this->estatus,true);

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
