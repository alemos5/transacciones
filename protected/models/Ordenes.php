<?php

/**
 * This is the model class for table "ordenes".
 *
 * The followings are the available columns in table 'ordenes':
 * @property integer $id_orden
 * @property string $ware_reciept
 * @property integer $numero_guia
 * @property string $tracking
 * @property string $courier
 * @property integer $id_ope
 * @property string $code_cliente
 * @property string $nombre_cliente
 * @property double $alto
 * @property double $ancho
 * @property double $largo
 * @property double $peso
 * @property string $descripcion
 * @property double $costo
 * @property integer $status
 * @property integer $instrucciones
 * @property integer $orden
 * @property integer $seguro
 * @property string $fecha
 * @property integer $pt
 * @property double $cost_env
 * @property string $env_email
 * @property integer $recargo
 * @property integer $status_recargo
 * @property integer $cant
 * @property integer $peli
 * @property string $tienda
 * @property integer $doc
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
 * @property string $descripcion1
 * @property string $direccion_cliente
 * @property string $ciudad
 * @property string $telefono
 * @property string $ultima_milla
 * @property integer $estatus_manifiesto
 * @property string $info_extra
 */
class Ordenes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ordenes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cant, id_tipo_envio, pagada, tarifa, costo, peso, tienda,  direccion_cliente', 'required'),
			array('pagada, id_tipo_envio, numero_guia, id_ope, status, instrucciones, orden, seguro, pt, recargo, status_recargo, cant, peli, doc, estatus_manifiesto', 'numerical', 'integerOnly'=>true),
			array('alto, ancho, tarifa, peli, largo, peso, costo, cost_env, tasa_de_cambio, int_manejo, int_documentacion, int_gastos_administrativos, int_reempaque, int_descuento, int_devolucion, int_almacenaje, int_comision_tc, int_desaduanamiento', 'numerical'),
			array('ware_reciept, courier, doc', 'length', 'max'=>50),
			array('tracking, code_cliente, nombre_cliente', 'length', 'max'=>100),
			array('env_email', 'length', 'max'=>60),
			array('tienda', 'length', 'max'=>150),
			array('numero_guia', 'length', 'max'=>20),
                        array('numero_guia', 'unique', 'message'=>'Ya el número de guia existe'),
			array('telefono', 'length', 'max'=>20),
			array('descripcion, fecha, descripcion1, ciudad, ultima_milla, info_extra', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_orden, ware_reciept, numero_guia, tracking, courier, id_ope, code_cliente, nombre_cliente, alto, ancho, largo, peso, descripcion, costo, status, instrucciones, orden, seguro, fecha, pt, cost_env, env_email, recargo, status_recargo, cant, peli, tienda, doc, tasa_de_cambio, int_manejo, int_documentacion, int_gastos_administrativos, int_reempaque, int_descuento, int_devolucion, int_almacenaje, int_comision_tc, int_desaduanamiento, descripcion1, direccion_cliente, ciudad, telefono, ultima_milla, estatus_manifiesto, info_extra', 'safe', 'on'=>'search'),
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
            'idTipoEnvio' => array(self::BELONGS_TO, 'TipoEnvio', 'id_tipo_envio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_orden' => 'Id Orden',
			'ware_reciept' => 'Ware Reciept',
			'numero_guia' => 'Numero Guia',
			'tracking' => 'Tracking',
			'courier' => 'Courier',
			'id_ope' => 'Id Ope',
			'code_cliente' => 'Code Cliente',
			'nombre_cliente' => 'Nombre Cliente',
			'alto' => 'Alto',
			'ancho' => 'Ancho',
			'largo' => 'Largo',
			'peso' => 'Peso',
			'descripcion' => 'Descripcion',
			'costo' => 'Costo',
			'status' => 'Status',
			'instrucciones' => 'Instrucciones',
			'orden' => 'Orden',
			'seguro' => 'Seguro',
			'fecha' => 'Fecha',
			'pt' => 'Pt',
			'cost_env' => 'Costo de Envío',
			'env_email' => 'Env Email',
			'recargo' => 'Recargo',
			'status_recargo' => 'Status Recargo',
			'cant' => 'Cant',
			'peli' => 'Peli',
			'tienda' => 'Tienda',
			'doc' => 'Doc',
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
			'descripcion1' => 'Descripcion1',
			'direccion_cliente' => 'Direccion Cliente',
			'ciudad' => 'Ciudad',
			'telefono' => 'Telefono',
			'ultima_milla' => 'Ultima Milla',
			'estatus_manifiesto' => 'Estatus Manifiesto',
			'info_extra' => 'Info Extra',
            'id_tipo_envio'=>'Tipo de Envío',
            'tarifa'=>'Tarifa',
            'pagada'=>'Pagada',


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

		$criteria->compare('id_orden',$this->id_orden);
		$criteria->compare('ware_reciept',$this->ware_reciept,true);
		$criteria->compare('numero_guia',$this->numero_guia);
		$criteria->compare('tracking',$this->tracking,true);
		$criteria->compare('courier',$this->courier,true);
		$criteria->compare('id_ope',$this->id_ope);
		$criteria->compare('code_cliente',$this->code_cliente,true);
		$criteria->compare('nombre_cliente',$this->nombre_cliente,true);
		$criteria->compare('alto',$this->alto);
		$criteria->compare('ancho',$this->ancho);
		$criteria->compare('largo',$this->largo);
		$criteria->compare('peso',$this->peso);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('costo',$this->costo);
		$criteria->compare('status',$this->status);
		$criteria->compare('instrucciones',$this->instrucciones);
		$criteria->compare('orden',$this->orden);
		$criteria->compare('seguro',$this->seguro);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('pt',$this->pt);
		$criteria->compare('cost_env',$this->cost_env);
		$criteria->compare('env_email',$this->env_email,true);
		$criteria->compare('recargo',$this->recargo);
		$criteria->compare('status_recargo',$this->status_recargo);
		$criteria->compare('cant',$this->cant);
		$criteria->compare('peli',$this->peli);
		$criteria->compare('tienda',$this->tienda,true);
		$criteria->compare('doc',$this->doc);
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
		$criteria->compare('descripcion1',$this->descripcion1,true);
		$criteria->compare('direccion_cliente',$this->direccion_cliente,true);
		$criteria->compare('ciudad',$this->ciudad,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('ultima_milla',$this->ultima_milla,true);
		$criteria->compare('estatus_manifiesto',$this->estatus_manifiesto);
		$criteria->compare('info_extra',$this->info_extra,true);
                $criteria->order = 'id_orden DESC';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function searchPersonal($correo = NULL)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_orden',$this->id_orden);
		$criteria->compare('ware_reciept',$this->ware_reciept,true);
		$criteria->compare('numero_guia',$this->numero_guia);
		$criteria->compare('tracking',$this->tracking,true);
		$criteria->compare('courier',$this->courier,true);
		$criteria->compare('id_ope',$this->id_ope);
		$criteria->compare('code_cliente',$this->code_cliente,true);
		$criteria->compare('nombre_cliente',$this->nombre_cliente,true);
		$criteria->compare('alto',$this->alto);
		$criteria->compare('ancho',$this->ancho);
		$criteria->compare('largo',$this->largo);
		$criteria->compare('peso',$this->peso);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('costo',$this->costo);
		$criteria->compare('status',$this->status);
		$criteria->compare('instrucciones',$this->instrucciones);
		$criteria->compare('orden',$this->orden);
		$criteria->compare('seguro',$this->seguro);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('pt',$this->pt);
		$criteria->compare('cost_env',$this->cost_env);
		$criteria->compare('env_email',$this->env_email,true);
		$criteria->compare('recargo',$this->recargo);
		$criteria->compare('status_recargo',$this->status_recargo);
		$criteria->compare('cant',$this->cant);
		$criteria->compare('peli',$this->peli);
		$criteria->compare('tienda',$this->tienda,true);
		$criteria->compare('doc',$this->doc);
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
		$criteria->compare('descripcion1',$this->descripcion1,true);
		$criteria->compare('direccion_cliente',$this->direccion_cliente,true);
		$criteria->compare('ciudad',$this->ciudad,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('ultima_milla',$this->ultima_milla,true);
		$criteria->compare('estatus_manifiesto',$this->estatus_manifiesto);
		$criteria->compare('info_extra',$this->info_extra,true);

                $criteria->join = 'INNER JOIN clientes b on t.code_cliente=b.code_cliente';
                $criteria->condition = 'b.email="'.$correo.'" and (t.instrucciones=5 or t.instrucciones=0 or t.instrucciones=2) and t.orden != 2 ORDER BY t.fecha DESC';
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ordenes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
