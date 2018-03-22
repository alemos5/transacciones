<?php

/**
 * This is the model class for table "inventario_usuario".
 *
 * The followings are the available columns in table 'inventario_usuario':
 * @property integer $idinventario_usuario
 * @property integer $id_usuario_sistema
 * @property string $code_cliente
 * @property string $producto
 * @property string $peso
 * @property string $precio
 * @property integer $id_registrador
 * @property string $fecha_registro
 * @property integer $id_modificador
 * @property string $fecha_modificacion
 */
class InventarioUsuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'inventario_usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usuario_sistema, cantidad,  id_registrador, id_modificador', 'numerical', 'integerOnly'=>true),
			array('code_cliente, precio', 'length', 'max'=>45),
			array('producto, distribuidor, descripcion', 'length', 'max'=>200),
			array('peso', 'length', 'max'=>10),
			array('fecha_registro, fecha_modificacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idinventario_usuario, id_usuario_sistema, code_cliente, producto, peso, precio, id_registrador, fecha_registro, id_modificador, fecha_modificacion', 'safe', 'on'=>'search'),
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
                    'idClientes' => array(self::BELONGS_TO, 'Clientes', 'id_usuario_sistema'),
                    'idClienteHijo' => array(self::BELONGS_TO, 'Clientes', 'id_cliente_hijo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idinventario_usuario' => 'Idinventario Usuario',
			'id_usuario_sistema' => 'Id Usuario Sistema',
			'code_cliente' => 'Code Cliente',
			'producto' => 'Producto',
			'peso' => 'Peso',
			'precio' => 'Precio',
			'id_registrador' => 'Id Registrador',
			'fecha_registro' => 'Fecha Registro',
			'id_modificador' => 'Id Modificador',
			'fecha_modificacion' => 'Fecha Modificacion',
            'distribuidor' => 'Distribuidor',
            'cantidad'=>'Cantidad',
            'descripcion'=>'Descripcion',
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

		$criteria->compare('idinventario_usuario',$this->idinventario_usuario);
		$criteria->compare('id_usuario_sistema',$this->id_usuario_sistema);
		$criteria->compare('code_cliente',$this->code_cliente,true);
		$criteria->compare('producto',$this->producto,true);
		$criteria->compare('peso',$this->peso,true);
		$criteria->compare('precio',$this->precio,true);
		$criteria->compare('id_registrador',$this->id_registrador);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('id_modificador',$this->id_modificador);
		$criteria->compare('fecha_modificacion',$this->fecha_modificacion,true);
        if(Yii::app()->user->id_perfil_sistema!='1'){
            $criteria->condition = " code_cliente LIKE '".Yii::app()->user->code_cliente."' ORDER BY idinventario_usuario DESC";
        }
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return InventarioUsuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
