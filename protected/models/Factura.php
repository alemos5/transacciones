<?php

/**
 * This is the model class for table "factura".
 *
 * The followings are the available columns in table 'factura':
 * @property integer $id_fac
 * @property integer $id_orden
 * @property integer $status
 * @property integer $tipo
 * @property string $no_factura
 * @property string $fecha
 * @property string $observacion
 * @property string $firma
 * @property string $nombre
 * @property string $direccion
 * @property string $ciudad
 * @property string $rif
 * @property string $telefono
 */
class Factura extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'factura';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_orden, status, tipo', 'numerical', 'integerOnly'=>true),
			array('no_factura, nombre, direccion, ciudad, rif, telefono', 'length', 'max'=>255),
			array('firma', 'length', 'max'=>250),
			array('fecha, observacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_fac, id_orden, status, tipo, no_factura, fecha, observacion, firma, nombre, direccion, ciudad, rif, telefono', 'safe', 'on'=>'search'),
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
			'id_fac' => 'Id Fac',
			'id_orden' => 'Id Orden',
			'status' => 'Status',
			'tipo' => 'Tipo',
			'no_factura' => 'No Factura',
			'fecha' => 'Fecha',
			'observacion' => 'Observacion',
			'firma' => 'Firma',
			'nombre' => 'Nombre',
			'direccion' => 'Direccion',
			'ciudad' => 'Ciudad',
			'rif' => 'Rif',
			'telefono' => 'Telefono',
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

		$criteria->compare('id_fac',$this->id_fac);
		$criteria->compare('id_orden',$this->id_orden);
		$criteria->compare('status',$this->status);
		$criteria->compare('tipo',$this->tipo);
		$criteria->compare('no_factura',$this->no_factura,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('observacion',$this->observacion,true);
		$criteria->compare('firma',$this->firma,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('ciudad',$this->ciudad,true);
		$criteria->compare('rif',$this->rif,true);
		$criteria->compare('telefono',$this->telefono,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Factura the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
