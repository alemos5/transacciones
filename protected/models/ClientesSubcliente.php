<?php

/**
 * This is the model class for table "clientes_subcliente".
 *
 * The followings are the available columns in table 'clientes_subcliente':
 * @property integer $id_clientes_subcliente
 * @property integer $id_cliente
 * @property string $code_cliente_padre
 * @property string $code_cliente_hijo
 * @property string $code_padre_hijo
 * @property string $fecha_registro
 * @property integer $estatus
 * @property string $descripcioon
 */
class ClientesSubcliente extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'clientes_subcliente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_cliente_hijo, id_cliente, code_cliente_padre, code_cliente_hijo, code_padre_hijo, fecha_registro', 'required'),
			array('id_cliente_hijo, id_cliente, estatus', 'numerical', 'integerOnly'=>true),
			array('code_cliente_padre, code_cliente_hijo, code_padre_hijo', 'length', 'max'=>250),
			array('descripcioon', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_clientes_subcliente, id_cliente, code_cliente_padre, code_cliente_hijo, code_padre_hijo, fecha_registro, estatus, descripcioon', 'safe', 'on'=>'search'),
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
                        'idClienteHijo' => array(self::BELONGS_TO, 'Clientes', 'id_cliente_hijo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_clientes_subcliente' => 'Id Clientes Subcliente',
			'id_cliente' => 'Id Cliente',
			'code_cliente_padre' => 'Code Cliente Padre',
			'code_cliente_hijo' => 'Code Cliente Hijo',
			'code_padre_hijo' => 'Code Padre Hijo',
			'fecha_registro' => 'Fecha Registro',
			'estatus' => 'Estatus',
			'descripcioon' => 'Descripcioon',
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

		$criteria->compare('id_clientes_subcliente',$this->id_clientes_subcliente);
		$criteria->compare('id_cliente',$this->id_cliente);
		$criteria->compare('code_cliente_padre',$this->code_cliente_padre,true);
		$criteria->compare('code_cliente_hijo',$this->code_cliente_hijo,true);
		$criteria->compare('code_padre_hijo',$this->code_padre_hijo,true);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('estatus',$this->estatus);
		$criteria->compare('descripcioon',$this->descripcioon,true);
//                $criteria->addCondition('GROUP BY id_cliente');
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ClientesSubcliente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
