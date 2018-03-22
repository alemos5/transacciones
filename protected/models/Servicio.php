<?php

/**
 * This is the model class for table "servicio".
 *
 * The followings are the available columns in table 'servicio':
 * @property integer $id_servicio
 * @property string $servicio
 * @property string $precio_neto
 * @property string $precio_impuesto
 * @property string $gasto_operativo
 * @property string $precio_sugerido
 * @property string $porcentaje_ganacia
 * @property integer $estatus
 *
 * The followings are the available model relations:
 * @property ServicioImpuesto[] $servicioImpuestos
 */
class Servicio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'servicio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('servicio, id_empresa', 'required'),
			array('estatus', 'numerical', 'integerOnly'=>true),
			array('servicio', 'length', 'max'=>250),
			array('precio_neto, precio_impuesto, gasto_operativo, precio_sugerido, porcentaje_ganacia', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_servicio, id_empresa, servicio, precio_neto, precio_impuesto, gasto_operativo, precio_sugerido, porcentaje_ganacia, estatus', 'safe', 'on'=>'search'),
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
                        
                        'idEmpresa' => array(self::BELONGS_TO, 'Empresa', 'id_empresa'),
			'servicioImpuestos' => array(self::HAS_MANY, 'ServicioImpuesto', 'id_servicio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_servicio' => 'Id Servicio',
                        'id_empresa' => 'Empresa',
			'servicio' => 'Servicio',
			'precio_neto' => 'Precio Neto',
			'precio_impuesto' => 'Precio Impuesto',
			'gasto_operativo' => 'Gasto Operativo',
			'precio_sugerido' => 'Precio Sugerido',
			'porcentaje_ganacia' => 'Porcentaje Ganacia',
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

		$criteria->compare('id_servicio',$this->id_servicio);
		$criteria->compare('id_empresa',$this->id_empresa);
		$criteria->compare('servicio',$this->servicio,true);
		$criteria->compare('precio_neto',$this->precio_neto,true);
		$criteria->compare('precio_impuesto',$this->precio_impuesto,true);
		$criteria->compare('gasto_operativo',$this->gasto_operativo,true);
		$criteria->compare('precio_sugerido',$this->precio_sugerido,true);
		$criteria->compare('porcentaje_ganacia',$this->porcentaje_ganacia,true);
		$criteria->compare('estatus',$this->estatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Servicio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
