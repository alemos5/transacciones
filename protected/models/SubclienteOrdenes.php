<?php

/**
 * This is the model class for table "subcliente_ordenes".
 *
 * The followings are the available columns in table 'subcliente_ordenes':
 * @property integer $id_subcliente_ordenes
 * @property integer $id_cliente
 * @property integer $id_subcliente
 * @property integer $orden
 * @property string $peso
 * @property string $descripcion
 * @property string $costo_global
 * @property string $courier
 * @property string $fecha_registro
 * @property integer $estatus
 */
class SubclienteOrdenes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'subcliente_ordenes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('costo_global, courier, descripcion, peso, id_cliente, id_subcliente, fecha_registro', 'required'),
			array('orden, id_orden, id_cliente, id_subcliente, orden, estatus', 'numerical', 'integerOnly'=>true),
			array('peso, costo_global', 'length', 'max'=>10),
			array('ware_reciept, courier', 'length', 'max'=>250),
			array('descripcion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_subcliente_ordenes, id_cliente, id_subcliente, orden, peso, descripcion, costo_global, courier, fecha_registro, estatus', 'safe', 'on'=>'search'),
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
                    'idClientes' => array(self::BELONGS_TO, 'Clientes', 'id_cliente'),
                    'idSubClientes' => array(self::BELONGS_TO, 'Clientes', 'id_subcliente'),
//                    'idOrden' => array(self::HAS_MANY, 'Ordenes', 'id_orden'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_subcliente_ordenes' => 'Id Subcliente Ordenes',
			'id_cliente' => 'Id Cliente',
			'id_subcliente' => 'Id Subcliente',
			'orden' => 'Orden',
			'peso' => 'Peso',
			'descripcion' => 'Descripcion',
			'costo_global' => 'Costo Global',
			'courier' => 'Courier',
			'fecha_registro' => 'Fecha Registro',
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

		$criteria->compare('id_subcliente_ordenes',$this->id_subcliente_ordenes);
		$criteria->compare('id_cliente',$this->id_cliente);
		$criteria->compare('id_subcliente',$this->id_subcliente);
		$criteria->compare('orden',$this->orden);
		$criteria->compare('peso',$this->peso,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('costo_global',$this->costo_global,true);
		$criteria->compare('courier',$this->courier,true);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('estatus',$this->estatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SubclienteOrdenes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
