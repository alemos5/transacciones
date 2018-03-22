<?php

/**
 * This is the model class for table "competencia_categoria".
 *
 * The followings are the available columns in table 'competencia_categoria':
 * @property integer $id_competencia_categoria
 * @property integer $id_copetencia
 * @property string $costo
 * @property integer $id_categoria
 *
 * The followings are the available model relations:
 * @property Competencia $idCopetencia
 * @property Categoria $idCategoria
 */
class CompetenciaCategoria extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'competencia_categoria';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_copetencia, id_categoria', 'required'),
			array('hora, minuto, reproducida, anio, mes, dia, orden, validado, id_copetencia, id_categoria', 'numerical', 'integerOnly'=>true),
			array('costo', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('hora, minuto, reproducida, anio, mes, dia, orden, validado, id_competencia_categoria, id_copetencia, costo, id_categoria', 'safe', 'on'=>'search'),
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
			'idCopetencia' => array(self::BELONGS_TO, 'Competencia', 'id_copetencia'),
			'idCategoria' => array(self::BELONGS_TO, 'Categoria', 'id_categoria'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_competencia_categoria' => __('Id Competence category'),
			'id_copetencia' => __('Id competence'),
			'costo' => __('Price'),
			'id_categoria' => __('Id category'),
			'orden' => __('Order'),
			'validado' => __('Validated'),
			'anio' => __('Year'),
			'mes' => __('Month'),
			'dia' => __('Day'),
                        'reproducida' => __('Reproduced'),
                        'hora' => __('Hour'),
                        'minuto' => __('Minutes')
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

		$criteria->compare('id_competencia_categoria',$this->id_competencia_categoria);
		$criteria->compare('id_copetencia',$this->id_copetencia);
		$criteria->compare('costo',$this->costo,true);
		$criteria->compare('id_categoria',$this->id_categoria);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CompetenciaCategoria the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
