<?php

/**
 * This is the model class for table "ordenes_estatus".
 *
 * The followings are the available columns in table 'ordenes_estatus':
 * @property integer $id_orden_estatus
 * @property string $ware_reciept
 * @property integer $estatus
 * @property string $fecha_orden
 * @property integer $tipo
 */
class OrdenesEstatus extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ordenes_estatus';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ware_reciept, estatus, fecha_orden', 'required'),
			array('estatus, tipo', 'numerical', 'integerOnly'=>true),
			array('ware_reciept', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_orden_estatus, ware_reciept, estatus, fecha_orden, tipo', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_orden_estatus' => 'Id Orden Estatus',
			'ware_reciept' => 'Ware Reciept',
			'estatus' => 'Estatus',
			'fecha_orden' => 'Fecha Orden',
			'tipo' => 'Tipo',
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

		$criteria->compare('id_orden_estatus',$this->id_orden_estatus);
		$criteria->compare('ware_reciept',$this->ware_reciept,true);
		$criteria->compare('estatus',$this->estatus);
		$criteria->compare('fecha_orden',$this->fecha_orden,true);
		$criteria->compare('tipo',$this->tipo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OrdenesEstatus the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
