<?php

/**
 * This is the model class for table "categoria_item_calificacion".
 *
 * The followings are the available columns in table 'categoria_item_calificacion':
 * @property integer $id_categoria_item_calificacion
 * @property integer $id_categoria
 * @property integer $id_item_calificacion
 * @property string $rango_min
 * @property string $rango_max
 * @property integer $estatus
 *
 * The followings are the available model relations:
 * @property Calificacion[] $calificacions
 * @property Categoria $idCategoria
 * @property ItemCalificacion $idItemCalificacion
 */
class CategoriaItemCalificacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'categoria_item_calificacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_categoria, id_item_calificacion', 'required'),
			array('id_categoria, id_item_calificacion, estatus', 'numerical', 'integerOnly'=>true),
			array('rango_min, rango_max', 'length', 'max'=>4),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_categoria_item_calificacion, id_categoria, id_item_calificacion, rango_min, rango_max, estatus', 'safe', 'on'=>'search'),
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
			'calificacions' => array(self::HAS_MANY, 'Calificacion', 'id_categoria_item_calificacion'),
			'idCategoria' => array(self::BELONGS_TO, 'Categoria', 'id_categoria'),
			'idItemCalificacion' => array(self::BELONGS_TO, 'ItemCalificacion', 'id_item_calificacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_categoria_item_calificacion' => 'Id Categoria Item Calificacion',
			'id_categoria' => 'Id Categoria',
			'id_item_calificacion' => 'Id Item Calificacion',
			'rango_min' => 'Rango Min',
			'rango_max' => 'Rango Max',
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

		$criteria->compare('id_categoria_item_calificacion',$this->id_categoria_item_calificacion);
		$criteria->compare('id_categoria',$this->id_categoria);
		$criteria->compare('id_item_calificacion',$this->id_item_calificacion);
		$criteria->compare('rango_min',$this->rango_min,true);
		$criteria->compare('rango_max',$this->rango_max,true);
		$criteria->compare('estatus',$this->estatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CategoriaItemCalificacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
