<?php

/**
 * This is the model class for table "categoria".
 *
 * The followings are the available columns in table 'categoria':
 * @property integer $id_categoria
 * @property string $categoria
 * @property string $descripcion
 * @property integer $edad_min
 * @property integer $edad_max
 * @property integer $competidor_min
 * @property integer $competidor_max
 * @property integer $id_tipo_categoria
 * @property integer $id_bloque
 *
 * The followings are the available model relations:
 * @property TipoCategoria $idTipoCategoria
 * @property Bloque $idBloque
 * @property CategoriaItemCalificacion[] $categoriaItemCalificacions
 * @property CompetenciaCategoria[] $competenciaCategorias
 */
class Categoria extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'categoria';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('categoria, estatus, id_tipo_categoria, id_bloque', 'required'),
			array('edad_min, id_categoria_tipo, estatus, edad_max, competidor_min, competidor_max, id_tipo_categoria, id_bloque', 'numerical', 'integerOnly'=>true),
			array('categoria', 'length', 'max'=>250),
			array('descripcion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_categoria, id_categoria_tipo, categoria, descripcion, edad_min, edad_max, competidor_min, competidor_max, id_tipo_categoria, id_bloque', 'safe', 'on'=>'search'),
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
			'idTipoCategoria' => array(self::BELONGS_TO, 'TipoCategoria', 'id_tipo_categoria'),
			'idBloque' => array(self::BELONGS_TO, 'Bloque', 'id_bloque'),
			'categoriaItemCalificacions' => array(self::HAS_MANY, 'CategoriaItemCalificacion', 'id_categoria'),
			'competenciaCategorias' => array(self::HAS_MANY, 'CompetenciaCategoria', 'id_categoria'),
			'idCategoriaTipo' => array(self::BELONGS_TO, 'CategoriaTipo', 'id_categoria_tipo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_categoria' => __('Category ID'),
			'categoria' => __('Category'),
			'descripcion' => __('Description'),
			'edad_min' => __('Minimum age'),
			'edad_max' => __('Maximum age'),
			'competidor_min' => __('Minimum competitors'),
			'competidor_max' => __('Maximum competitors'),
			'id_tipo_categoria' => __('Category Type ID'),
			'id_bloque' => __('Block ID'),
			'estatus' => __('Status'),
                        'id_categoria_tipo' => __('Category Type')
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

		$criteria->compare('id_categoria',$this->id_categoria);
		$criteria->compare('categoria',$this->categoria,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('edad_min',$this->edad_min);
		$criteria->compare('edad_max',$this->edad_max);
		$criteria->compare('competidor_min',$this->competidor_min);
		$criteria->compare('competidor_max',$this->competidor_max);
		$criteria->compare('id_tipo_categoria',$this->id_tipo_categoria);
		$criteria->compare('id_bloque',$this->id_bloque);
		$criteria->compare('estatus',$this->estatus);
		$criteria->compare('id_categoria_tipo',$this->id_categoria_tipo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Categoria the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
