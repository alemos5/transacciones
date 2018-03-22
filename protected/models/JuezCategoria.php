<?php

/**
 * This is the model class for table "juez_categoria".
 *
 * The followings are the available columns in table 'juez_categoria':
 * @property integer $id_juez_categoria
 * @property integer $id_juez
 * @property integer $id_competencia
 * @property integer $id_categoria
 */
class JuezCategoria extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'juez_categoria';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_juez, id_competencia, id_categoria', 'required'),
			array('id_juez, id_competencia, id_categoria', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_juez_categoria, id_juez, id_competencia, id_categoria', 'safe', 'on'=>'search'),
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
                    'idCategoria' => array(self::BELONGS_TO, 'Categoria', 'id_categoria'),
                    'idCompetencia' => array(self::BELONGS_TO, 'Competencia', 'id_competencia'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_juez_categoria' => 'Id Juez Categoria',
			'id_juez' => 'Id Juez',
			'id_competencia' => 'Id Competencia',
			'id_categoria' => 'Id Categoria',
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

		$criteria->compare('id_juez_categoria',$this->id_juez_categoria);
		$criteria->compare('id_juez',$this->id_juez);
		$criteria->compare('id_competencia',$this->id_competencia);
		$criteria->compare('id_categoria',$this->id_categoria);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return JuezCategoria the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
