<?php

/**
 * This is the model class for table "tarifa_producto".
 *
 * The followings are the available columns in table 'tarifa_producto':
 * @property integer $id_tarifa_producto
 * @property string $tarifa_producto
 * @property integer $id_pais
 * @property integer $estatus
 * @property integer $id_usuario_registro
 * @property string $fecha_registro
 * @property integer $id_usuario_modifica
 * @property string $fecha_modifica
 */
class TarifaProducto extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tarifa_producto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_pais, id_producto, estatus, id_usuario_registro, id_usuario_modifica', 'numerical', 'integerOnly'=>true),
			array('tarifa_producto', 'length', 'max'=>10),
			array('fecha_registro, fecha_modifica', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_tarifa_producto, tarifa_producto, id_pais, estatus, id_usuario_registro, fecha_registro, id_usuario_modifica, fecha_modifica', 'safe', 'on'=>'search'),
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
            'idProducto' => array(self::BELONGS_TO, 'Producto', 'id_producto'),
            'idEstatus' => array(self::BELONGS_TO, 'Estatus', 'estatus'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
		    'id_producto'=>'Producto',
			'id_tarifa_producto' => 'ID Tarifa Producto',
			'tarifa_producto' => 'Tarifa Producto',
			'id_pais' => 'País',
			'estatus' => 'Estatus',
			'id_usuario_registro' => 'Id Usuario Registro',
			'fecha_registro' => 'Fecha Registro',
			'id_usuario_modifica' => 'Id Usuario Modifica',
			'fecha_modifica' => 'Fecha Modifica',
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

		$criteria->compare('id_tarifa_producto',$this->id_tarifa_producto);
		$criteria->compare('tarifa_producto',$this->tarifa_producto,true);
		$criteria->compare('id_pais',$this->id_pais);
		$criteria->compare('estatus',$this->estatus);
		$criteria->compare('id_usuario_registro',$this->id_usuario_registro);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('id_usuario_modifica',$this->id_usuario_modifica);
		$criteria->compare('fecha_modifica',$this->fecha_modifica,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TarifaProducto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
