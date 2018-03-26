<?php

/**
 * This is the model class for table "cuenta_bancaria".
 *
 * The followings are the available columns in table 'cuenta_bancaria':
 * @property integer $id_cuenta_bancaria
 * @property string $alias_cuenta_bancaria
 * @property integer $id_banco
 * @property integer $tipo_cunta
 * @property string $cbu
 * @property string $Cuenta
 * @property integer $tipo_documento
 * @property string $documentacion
 * @property string $correo
 * @property string $img
 * @property string $id_pais
 * @property integer $id_usuario_registro
 * @property string $fecha_registro
 * @property integer $id_usuario_modificacion
 * @property string $fecha_modificacion
 * @property integer $estatus
 */
class CuentaBancaria extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cuenta_bancaria';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_banco, tipo_cunta, tipo_documento, id_usuario_registro, id_usuario_modificacion, estatus', 'numerical', 'integerOnly'=>true),
			array('alias_cuenta_bancaria, img, id_pais', 'length', 'max'=>45),
			array('cbu, Cuenta', 'length', 'max'=>250),
			array('documentacion, correo', 'length', 'max'=>145),
			array('fecha_registro, fecha_modificacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_cuenta_bancaria, alias_cuenta_bancaria, id_banco, tipo_cunta, cbu, Cuenta, tipo_documento, documentacion, correo, img, id_pais, id_usuario_registro, fecha_registro, id_usuario_modificacion, fecha_modificacion, estatus', 'safe', 'on'=>'search'),
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
            'idBanco' => array(self::BELONGS_TO, 'Banco', 'id_banco'),
            'idPais' => array(self::BELONGS_TO, 'Pais', 'id_pais'),
            'idEstatus' => array(self::BELONGS_TO, 'Estatus', 'estatus'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_cuenta_bancaria' => 'Id Cuenta Bancaria',
			'alias_cuenta_bancaria' => 'Alias Cuenta Bancaria',
			'id_banco' => 'Banco',
			'tipo_cunta' => 'Tipo Cunta',
			'cbu' => 'Cbu',
			'Cuenta' => 'Cuenta',
			'tipo_documento' => 'Tipo Documento',
			'documentacion' => 'Documentación',
			'correo' => 'Correo',
			'img' => 'Img',
			'id_pais' => 'Id Pais',
			'id_usuario_registro' => 'Id Usuario Registro',
			'fecha_registro' => 'Fecha Registro',
			'id_usuario_modificacion' => 'Id Usuario Modificacion',
			'fecha_modificacion' => 'Fecha Modificacion',
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

		$criteria->compare('id_cuenta_bancaria',$this->id_cuenta_bancaria);
		$criteria->compare('alias_cuenta_bancaria',$this->alias_cuenta_bancaria,true);
		$criteria->compare('id_banco',$this->id_banco);
		$criteria->compare('tipo_cunta',$this->tipo_cunta);
		$criteria->compare('cbu',$this->cbu,true);
		$criteria->compare('Cuenta',$this->Cuenta,true);
		$criteria->compare('tipo_documento',$this->tipo_documento);
		$criteria->compare('documentacion',$this->documentacion,true);
		$criteria->compare('correo',$this->correo,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('id_pais',$this->id_pais,true);
		$criteria->compare('id_usuario_registro',$this->id_usuario_registro);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('id_usuario_modificacion',$this->id_usuario_modificacion);
		$criteria->compare('fecha_modificacion',$this->fecha_modificacion,true);
		$criteria->compare('estatus',$this->estatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CuentaBancaria the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
