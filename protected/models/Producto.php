<?php

/**
 * This is the model class for table "producto".
 *
 * The followings are the available columns in table 'producto':
 * @property integer $id_producto
 * @property integer $id_tipo_producto
 * @property string $producto
 * @property string $descripcion
 * @property integer $estatus
 * @property integer $id_usuario_registro
 * @property string $fecha_registro
 * @property integer $id_usuario_modifica
 * @property string $fecha_modifica
 * @property string $img
 */
class Producto extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'producto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_tipo_producto, estatus, id_usuario_registro, id_usuario_modifica', 'numerical', 'integerOnly'=>true),
			array('producto', 'length', 'max'=>250),
			array('img', 'length', 'max'=>145),
			array('descripcion, fecha_registro, fecha_modifica', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_producto, id_tipo_producto, productoc, descripcion, estatus, id_usuario_registro, fecha_registro, id_usuario_modifica, fecha_modifica, img', 'safe', 'on'=>'search'),
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
            'idTipoProducto' => array(self::BELONGS_TO, 'TipoProducto', 'id_tipo_producto'),
            'idEstatus' => array(self::BELONGS_TO, 'Estatus', 'estatus'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_producto' => 'Id Producto',
			'id_tipo_producto' => 'Tipo Producto',
			'productoc' => 'Producto',
			'descripcion' => 'Descripción',
			'estatus' => 'Estatus',
			'id_usuario_registro' => 'Id Usuario Registro',
			'fecha_registro' => 'Fecha Registro',
			'id_usuario_modifica' => 'Id Usuario Modifica',
			'fecha_modifica' => 'Fecha Modifica',
			'img' => 'Img',
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

		$criteria->compare('id_producto',$this->id_producto);
		$criteria->compare('id_tipo_producto',$this->id_tipo_producto);
		$criteria->compare('producto',$this->producto,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('estatus',$this->estatus);
		$criteria->compare('id_usuario_registro',$this->id_usuario_registro);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('id_usuario_modifica',$this->id_usuario_modifica);
		$criteria->compare('fecha_modifica',$this->fecha_modifica,true);
		$criteria->compare('img',$this->img,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Producto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
