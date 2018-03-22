<?php

/**
 * This is the model class for table "servicio_usuario".
 *
 * The followings are the available columns in table 'servicio_usuario':
 * @property integer $id_servicio_usuario
 * @property integer $id_servicio
 * @property integer $id_usuario
 * @property string $costo_servicio
 * @property string $costo_especial
 * @property integer $estatus
 */
class ServicioUsuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'servicio_usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_servicio', 'required'),
			array('id_impuesto, id_empresa, id_servicio, id_usuario, estatus', 'numerical', 'integerOnly'=>true),
			array('costo_servicio, costo_especial', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_impuesto, id_empresa, id_servicio_usuario, id_servicio, id_usuario, costo_servicio, costo_especial, estatus', 'safe', 'on'=>'search'),
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
                    'idServicio' => array(self::BELONGS_TO, 'Servicio', 'id_servicio'),
                    'idUsuario' => array(self::BELONGS_TO, 'Usuario', 'id_usuario'),
                    'idImpuesto' => array(self::BELONGS_TO, 'Impuesto', 'id_impuesto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
                        'id_empresa' => 'Empresa',
			'id_servicio_usuario' => 'Id Servicio Usuario',
			'id_servicio' => 'Id Servicio',
			'id_usuario' => 'Id Usuario',
			'costo_servicio' => 'Costo Servicio',
			'costo_especial' => 'Costo Especial',
			'estatus' => 'Estatus',
			'id_impuesto' => 'Id Impuesto',
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

		$criteria->compare('id_servicio_usuario',$this->id_servicio_usuario);
		$criteria->compare('id_empresa',$this->id_empresa);
		$criteria->compare('id_servicio',$this->id_servicio);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('costo_servicio',$this->costo_servicio,true);
		$criteria->compare('costo_especial',$this->costo_especial,true);
		$criteria->compare('estatus',$this->estatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ServicioUsuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
