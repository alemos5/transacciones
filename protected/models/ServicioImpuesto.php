<?php

/**
 * This is the model class for table "servicio_impuesto".
 *
 * The followings are the available columns in table 'servicio_impuesto':
 * @property integer $id_servicio_impuesto
 * @property integer $id_impuesto
 * @property integer $id_servicio
 * @property string $porcentaje
 * @property string $precio_impuesto
 * @property integer $estatus
 */
class ServicioImpuesto extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'servicio_impuesto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_servicio, precio_impuesto', 'required'),
			array('kg_c, lb_c, id_calculo_a, id_unidad_medida, id_tipo_cobro, id_impuesto, id_servicio, estatus', 'numerical', 'integerOnly'=>true),
			array('precio_sugerido, porcentaje, precio_impuesto', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('kg_c, lb_c, precio_sugerido, id_calculo_a, id_servicio_impuesto, id_impuesto, id_servicio, porcentaje, precio_impuesto, estatus', 'safe', 'on'=>'search'),
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
                    'idServicio' => array(self::BELONGS_TO, 'Servicio', 'id_servicio'),
                    'idImpuesto' => array(self::BELONGS_TO, 'Impuesto', 'id_impuesto'),
                    'idUnidadMedida' => array(self::BELONGS_TO, 'UnidadMedida', 'id_unidad_medida'),
                    'idTipoCobro' => array(self::BELONGS_TO, 'TipoCobro', 'id_tipo_cobro'),
                    'idCalculoA' => array(self::BELONGS_TO, 'CalculoA', 'id_calculo_a'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_servicio_impuesto' => 'Id Servicio Impuesto',
			'id_impuesto' => 'Id Impuesto',
			'id_servicio' => 'Id Servicio',
			'porcentaje' => 'Porcentaje',
			'precio_impuesto' => 'Precio Impuesto',
			'estatus' => 'Estatus',
                        'id_unidad_medida' => 'Unidad de Medida', 
                        'id_tipo_cobro' => 'Tipo de Cobro',
                        'id_calculo_a' => 'Calculo por',
                        'precio_sugerido' => 'Precio Sugerido',
                        'kg_c' => 'Kilo Calculo', 
                        'lb_c'=>'Libra Calculo' 
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

		$criteria->compare('id_servicio_impuesto',$this->id_servicio_impuesto);
		$criteria->compare('id_impuesto',$this->id_impuesto);
		$criteria->compare('id_servicio',$this->id_servicio);
		$criteria->compare('porcentaje',$this->porcentaje,true);
		$criteria->compare('precio_impuesto',$this->precio_impuesto,true);
		$criteria->compare('estatus',$this->estatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ServicioImpuesto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
