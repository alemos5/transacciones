<?php

/**
 * This is the model class for table "consolidaciones".
 *
 * The followings are the available columns in table 'consolidaciones':
 * @property integer $id_con
 * @property integer $id_cliente
 * @property string $ware_reciept
 * @property string $direccion
 * @property double $alto
 * @property double $ancho
 * @property double $largo
 * @property double $peso
 * @property integer $instruccion
 * @property integer $status
 * @property integer $seguro
 * @property integer $pt
 * @property double $cost_env
 * @property string $fecha
 * @property double $cost_orden
 * @property double $tasa_de_cambio
 * @property double $int_manejo
 * @property double $int_documentacion
 * @property double $int_gastos_administrativos
 * @property double $int_reempaque
 * @property double $int_descuento
 * @property double $int_devolucion
 * @property double $int_almacenaje
 * @property double $int_comision_tc
 * @property double $int_desaduanamiento
 * @property string $cliente_manifiesto
 * @property string $ultima_milla
 * @property integer $estatus_manifiesto
 * @property string $info_extra
 */
class Consolidaciones extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'consolidaciones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_cliente, instruccion, status, seguro, pt, estatus_manifiesto', 'numerical', 'integerOnly'=>true),
			array('alto, ancho, largo, peso, cost_env, cost_orden, tasa_de_cambio, int_manejo, int_documentacion, int_gastos_administrativos, int_reempaque, int_descuento, int_devolucion, int_almacenaje, int_comision_tc, int_desaduanamiento', 'numerical'),
			array('ware_reciept', 'length', 'max'=>40),
			array('direccion, fecha, cliente_manifiesto, ultima_milla, info_extra', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_con, id_cliente, ware_reciept, direccion, alto, ancho, largo, peso, instruccion, status, seguro, pt, cost_env, fecha, cost_orden, tasa_de_cambio, int_manejo, int_documentacion, int_gastos_administrativos, int_reempaque, int_descuento, int_devolucion, int_almacenaje, int_comision_tc, int_desaduanamiento, cliente_manifiesto, ultima_milla, estatus_manifiesto, info_extra', 'safe', 'on'=>'search'),
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
                    'idCliente' => array(self::BELONGS_TO, 'Clientes', 'id_cliente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_con' => 'Id Con',
			'id_cliente' => 'Id Cliente',
			'ware_reciept' => 'Ware Reciept',
			'direccion' => 'Direccion',
			'alto' => 'Alto',
			'ancho' => 'Ancho',
			'largo' => 'Largo',
			'peso' => 'Peso',
			'instruccion' => 'Instruccion',
			'status' => 'Status',
			'seguro' => 'Seguro',
			'pt' => 'Pt',
			'cost_env' => 'Cost Env',
			'fecha' => 'Fecha',
			'cost_orden' => 'Cost Orden',
			'tasa_de_cambio' => 'Tasa De Cambio',
			'int_manejo' => 'Int Manejo',
			'int_documentacion' => 'Int Documentacion',
			'int_gastos_administrativos' => 'Int Gastos Administrativos',
			'int_reempaque' => 'Int Reempaque',
			'int_descuento' => 'Int Descuento',
			'int_devolucion' => 'Int Devolucion',
			'int_almacenaje' => 'Int Almacenaje',
			'int_comision_tc' => 'Int Comision Tc',
			'int_desaduanamiento' => 'Int Desaduanamiento',
			'cliente_manifiesto' => 'Cliente Manifiesto',
			'ultima_milla' => 'Ultima Milla',
			'estatus_manifiesto' => 'Estatus Manifiesto',
			'info_extra' => 'Info Extra',
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

		$criteria->compare('id_con',$this->id_con);
		$criteria->compare('id_cliente',$this->id_cliente);
		$criteria->compare('ware_reciept',$this->ware_reciept,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('alto',$this->alto);
		$criteria->compare('ancho',$this->ancho);
		$criteria->compare('largo',$this->largo);
		$criteria->compare('peso',$this->peso);
		$criteria->compare('instruccion',$this->instruccion);
		$criteria->compare('status',$this->status);
		$criteria->compare('seguro',$this->seguro);
		$criteria->compare('pt',$this->pt);
		$criteria->compare('cost_env',$this->cost_env);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('cost_orden',$this->cost_orden);
		$criteria->compare('tasa_de_cambio',$this->tasa_de_cambio);
		$criteria->compare('int_manejo',$this->int_manejo);
		$criteria->compare('int_documentacion',$this->int_documentacion);
		$criteria->compare('int_gastos_administrativos',$this->int_gastos_administrativos);
		$criteria->compare('int_reempaque',$this->int_reempaque);
		$criteria->compare('int_descuento',$this->int_descuento);
		$criteria->compare('int_devolucion',$this->int_devolucion);
		$criteria->compare('int_almacenaje',$this->int_almacenaje);
		$criteria->compare('int_comision_tc',$this->int_comision_tc);
		$criteria->compare('int_desaduanamiento',$this->int_desaduanamiento);
		$criteria->compare('cliente_manifiesto',$this->cliente_manifiesto,true);
		$criteria->compare('ultima_milla',$this->ultima_milla,true);
		$criteria->compare('estatus_manifiesto',$this->estatus_manifiesto);
		$criteria->compare('info_extra',$this->info_extra,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function searchPersonal()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_con',$this->id_con);
		$criteria->compare('id_cliente',$this->id_cliente);
		$criteria->compare('ware_reciept',$this->ware_reciept,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('alto',$this->alto);
		$criteria->compare('ancho',$this->ancho);
		$criteria->compare('largo',$this->largo);
		$criteria->compare('peso',$this->peso);
		$criteria->compare('instruccion',$this->instruccion);
		$criteria->compare('status',$this->status);
		$criteria->compare('seguro',$this->seguro);
		$criteria->compare('pt',$this->pt);
		$criteria->compare('cost_env',$this->cost_env);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('cost_orden',$this->cost_orden);
		$criteria->compare('tasa_de_cambio',$this->tasa_de_cambio);
		$criteria->compare('int_manejo',$this->int_manejo);
		$criteria->compare('int_documentacion',$this->int_documentacion);
		$criteria->compare('int_gastos_administrativos',$this->int_gastos_administrativos);
		$criteria->compare('int_reempaque',$this->int_reempaque);
		$criteria->compare('int_descuento',$this->int_descuento);
		$criteria->compare('int_devolucion',$this->int_devolucion);
		$criteria->compare('int_almacenaje',$this->int_almacenaje);
		$criteria->compare('int_comision_tc',$this->int_comision_tc);
		$criteria->compare('int_desaduanamiento',$this->int_desaduanamiento);
		$criteria->compare('cliente_manifiesto',$this->cliente_manifiesto,true);
		$criteria->compare('ultima_milla',$this->ultima_milla,true);
		$criteria->compare('estatus_manifiesto',$this->estatus_manifiesto);
		$criteria->compare('info_extra',$this->info_extra,true);

                $criteria->join = 'Inner JOIN clientes b on t.id_cliente=b.id_cliente';
                $criteria->condition = 'b.email="'.$correo.'" ORDER BY t.fecha DESC';
                
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Consolidaciones the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
