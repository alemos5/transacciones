<?php

/**
 * This is the model class for table "manifiesto".
 *
 * The followings are the available columns in table 'manifiesto':
 * @property integer $id_manifiesto
 * @property string $vchar_nombre
 * @property string $vchar_numero
 * @property double $float_peso
 * @property integer $id_instruccion
 * @property string $dt_registro
 * @property integer $id_status
 * @property string $ref
 * @property string $vchar_comprador
 * @property string $vchar_rif
 * @property string $vchar_direccion
 * @property integer $vchar_telefono
 * @property string $vchar_atencion
 * @property string $vchar_codigoi_manifiesto
 * @property integer $status
 * @property string $AWB
 */
class Manifiesto extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'manifiesto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vchar_nombre, vchar_numero, float_peso, id_instruccion, dt_registro', 'required'),
			array('id_instruccion, id_status, vchar_telefono, status', 'numerical', 'integerOnly'=>true),
			array('float_peso', 'numerical'),
			array('vchar_nombre, vchar_numero, vchar_comprador, vchar_rif, vchar_atencion', 'length', 'max'=>100),
			array('ref', 'length', 'max'=>50),
			array('vchar_direccion', 'length', 'max'=>255),
			array('vchar_codigoi_manifiesto', 'length', 'max'=>10),
			array('AWB', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_manifiesto, vchar_nombre, vchar_numero, float_peso, id_instruccion, dt_registro, id_status, ref, vchar_comprador, vchar_rif, vchar_direccion, vchar_telefono, vchar_atencion, vchar_codigoi_manifiesto, status, AWB', 'safe', 'on'=>'search'),
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
			'id_manifiesto' => 'Id Manifiesto',
			'vchar_nombre' => 'Vchar Nombre',
			'vchar_numero' => 'Vchar Numero',
			'float_peso' => 'Float Peso',
			'id_instruccion' => 'Id Instruccion',
			'dt_registro' => 'Dt Registro',
			'id_status' => 'Id Status',
			'ref' => 'Ref',
			'vchar_comprador' => 'Vchar Comprador',
			'vchar_rif' => 'Vchar Rif',
			'vchar_direccion' => 'Vchar Direccion',
			'vchar_telefono' => 'Vchar Telefono',
			'vchar_atencion' => 'Vchar Atencion',
			'vchar_codigoi_manifiesto' => 'Vchar Codigoi Manifiesto',
			'status' => 'Status',
			'AWB' => 'Awb',
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

		$criteria->compare('id_manifiesto',$this->id_manifiesto);
		$criteria->compare('vchar_nombre',$this->vchar_nombre,true);
		$criteria->compare('vchar_numero',$this->vchar_numero,true);
		$criteria->compare('float_peso',$this->float_peso);
		$criteria->compare('id_instruccion',$this->id_instruccion);
		$criteria->compare('dt_registro',$this->dt_registro,true);
		$criteria->compare('id_status',$this->id_status);
		$criteria->compare('ref',$this->ref,true);
		$criteria->compare('vchar_comprador',$this->vchar_comprador,true);
		$criteria->compare('vchar_rif',$this->vchar_rif,true);
		$criteria->compare('vchar_direccion',$this->vchar_direccion,true);
		$criteria->compare('vchar_telefono',$this->vchar_telefono);
		$criteria->compare('vchar_atencion',$this->vchar_atencion,true);
		$criteria->compare('vchar_codigoi_manifiesto',$this->vchar_codigoi_manifiesto,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('AWB',$this->AWB,true);
                $criteria->order = 'id_manifiesto DESC';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Manifiesto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
